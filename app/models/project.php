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
            $data .= $id . ' [label="' . $id . ': ' . $name . '"]'."\n";
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
	    $neededProjectIds = array();
	    foreach ($lpVariables[0] as $lpVar=>$needed) {
	    	if ($needed) $neededProjectIds[] = $projects[$lpVar]['Project']['id'];
	    } 
	    lpsolve('delete_lp',$lp);
//		debug($lpObjective);
//		debug($lpVariables);
		debug($neededProjectIds);
		$savedCalculus = array(
			'costs' => $lpObjective,
			'projectIds' =>$neededProjectIds
		);
		debug($savedCalculus);
		
		App::import('Model','User'); $userClass = new User();
		$userClass->save(array(
			'id' => $userId,
			'saved_calculus' => serialize($savedCalculus)
		));
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
		
		foreach ($projects as $p) {
			
		}
		debug($relations);
	}
	function linearizeProject($project) {
		return (double) $project['costs'];
	}
}
?>