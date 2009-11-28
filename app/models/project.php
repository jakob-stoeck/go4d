<?php
class Project extends AppModel {

	var $name = 'Project';

	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
//	var $hasMany = array(
//		'Relation' => array(
//			'className' => 'Relation',
//			'foreignKey' => 'project_id'
//		)
//	);
//
//	var $hasAndBelongsToMany = array(
//		'User' => array(
//			'className' => 'User',
//			'joinTable' => 'projects_users',
//			'foreignKey' => 'project_id',
//			'associationForeignKey' => 'user_id',
//			'unique' => true
//		)
//	);

    function dot($projects, $relations, $graphname = 'workpackages') {
        // TODO secure $graphname!

        $data = 'digraph ' . $graphname . ' {'."\n";

        foreach($projects as $id => $name) {
            $data .= $id . ' [label="' . $name . '"]'."\n";
        }

        foreach($relations as $r) {
            $data .= $r['Relation']['project_preceding_id'] . ' -> ' . $r['Relation']['project_id'].($r['Relation']['type']=='constraint'?' [color=green]':'')."\n";
        }


        $file = new File(WWW_ROOT . '/graph/' . $graphname . '.dot', true);
        $file->write($data);
        $file->close();

        $graph = shell_exec('dot -Tpng -o"img/' . $graphname . '.png" graph/' . $graphname . '.dot');

        return $graph;
    }

	function getBestPath($userId) {
		App::import('Vendor', 'phplpsolve/lp_maker');
		App::import('Model','ProjectsUsers'); App::import('Model','Relation');
		
		$projectsUsersClass = new ProjectsUsers();
		$relationClass = new Relation();
		$this->bindModel(array('hasOne'=>array('ProjectsUsers'=>array('conditions'=>array('ProjectsUsers.user_id'=>$userId)))));
		$projects = $this->find('all');
		$projectIds = Set::extract($projects,'{n}.Project.id');
		$relations = $relationClass->find('all',array(
			'conditions'=>array(
				'Relation.project_id' => $projectIds,
				'Relation.project_preceding_id' => $projectIds
			)
		));

//		create target function
		$targetFunctionVector = array();
		foreach ($projects as $project) {
			$targetFunctionVector[] =  $project['ProjectsUsers']['done'] ? 0.0 : $this->linearizeProject($project['Project']);
		}
		
//		create restrictions
		$restrictionsMatrix = array();
		foreach($relations as $relation) {
			$specificRestrArr = array();
			foreach($projects as $project) {
				if ($relation['Relation']['project_preceding_id']==$project['Project']['id']) {
					$specificRestrArr[] = 1;
				}
				elseif ($relation['Relation']['project_id']==$project['Project']['id']) {
					$specificRestrArr[] = -1;
				}
				else {
					$specificRestrArr[] = 0;
				}
			}
			$restrictionsMatrix[] = $specificRestrArr;
		}
		$inequalityArray = array();
		$restrictionTargetArray = array();
		for ($i = 0; $i < count($restrictionsMatrix); $i++) {
			$inequalityArray[] = 1;
			$restrictionTargetArray[] = 0;
		} 

		//add now all things we want and we have.. XXX extend all 3 arrays!
		foreach ($projects as $vectorId => $project) {
			if ($project['ProjectsUsers']['done'] || $project['ProjectsUsers']['wanted']) {
				$specificRestrArr = array();
				for ($i = 0; $i< count($projects); $i++) {
					$specificRestrArr[] = ($i == $vectorId) ? 1 : 0;
				}				
				$restrictionsMatrix[] = $specificRestrArr;
				$inequalityArray[] = 0;
				$restrictionTargetArray[] = 1;
			}
		}
		
//		debug($targetFunctionVector);
//		debug($restrictionsMatrix);
//		debug($restrictionTargetArray);
//		debug($inequalityArray);
		//generate lp...
		
		$lp = lp_maker($targetFunctionVector,$restrictionsMatrix,$restrictionTargetArray,$inequalityArray);
		lpsolve('set_minim', $lp); //helper sets to maximize
		
		//recycle inequalityArray for setting the binary vars..
	    for ($i = 0; $i < count($restrictionsMatrix[0]); $i++) {
		    lpsolve('set_binary', $lp, 1, 1);
	    }
		
	    lpsolve('solve',$lp);
	    $lpObjective = lpsolve('get_objective',$lp);
	    $lpVariables = lpsolve('get_variables',$lp);
	    lpsolve('delete_lp',$lp);

	    
	    $neededProjectIds = array();
	    foreach ($lpVariables[0] as $lpVar=>$needed) {
	    	if ($needed) $neededProjectIds[] = $projects[$lpVar]['Project']['id'];
	    } 
	    
//		debug($lpObjective);
//		debug($lpVariables);
		$savedCalculus = array(
			'costs' => $lpObjective,
			'projectIds' =>$neededProjectIds
		);
		
		App::import('Model','User'); $userClass = new User();
		$userClass->save(array(
			'id' => $userId,
			'saved_calculus' => serialize($savedCalculus)
		));
		return $savedCalculus;
	}
	
	function orderProjects($projectIds) {
		App::import('Model','Relation'); $relationClass = new Relation();
		
		$projects = $this->find('all',array('conditions'=> array('Project.id'=>$projectIds)));
		$relations = $relationClass->find('all',array(
			'conditions'=>array(
				'Relation.project_id' =>$projectIds,
				'Relation.project_preceding_id' =>$projectIds
			)
		));
		$rounds = array();
		$relationsList = Set::combine($relations,'{n}.Relation.id','{n}.Relation','{n}.Relation.project_id');
		
		$projectsAdded = array();
		$curRound = 0;
		$antiCrash = 0;
		while (count($projectsAdded)< count($projectIds) && $antiCrash < 100) {
			$antiCrash++;
			$addedInThisRound = 0;
			
			$diffProjects = array_diff($projects,$projectsAdded);
			
			$projectIdsForRequirements = array();
			for ($i = 0; $i < count($rounds)-1; $i++) {
				foreach ($rounds[$i] as $roundProject) {
					$projectIdsForRequirements[] = $roundProject['Project']['id'];
				}
			}
			$projectIdsForRequirements = array_unique($projectIdsForRequirements);
			
			$projectIdsForConstraints = array();
			for ($i = 0; $i < count($rounds); $i++) {
				foreach ($rounds[$i] as $roundProject) {
					$projectIdsForConstraints[] = $roundProject['Project']['id'];
				}
			}
			$projectIdsForConstraints = array_unique($projectIdsForConstraints);
			
			foreach ($diffProjects as $p) {
				if (isset($relationsList[$p['Project']['id']])) {
					$addIt = true;
					foreach ($relationsList[$p['Project']['id']] as $r) {

						if (($r['type']=='req') && (in_array($r['project_preceding_id'],$projectIdsForRequirements))) {
							//do nothing, check other things.. 
						}
						elseif (($r['type']=='constraint') && (in_array($r['project_preceding_id'],$projectIdsForConstraints))) {
							//do nothing, check other things.. 
						}
						else {
							$addIt = false;
							break;
						}							
					}
					if ($addIt) {
						$rounds[$curRound][] = $p;
						$projectsAdded[] = $p;
						$addedInThisRound++;
					}
				}
				else {
					$rounds[$curRound][] = $p;
					$projectsAdded[] = $p;
					$addedInThisRound++;
				}
			}
			if ($addedInThisRound==0) $curRound++;
		}
		debug($rounds);
		
	}
	function linearizeProject($project) {
		return (double) $project['costs'];
	}
}
?>