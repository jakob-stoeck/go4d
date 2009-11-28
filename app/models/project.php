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
			$targetFunctionVector[] =  $project['ProjectsUsers']['done'] ? 1 : $this->linearizeProject($project['Project']);
		}
		
//		create restrictions
		$restrictionsMatrix = array();
		foreach($relations as $relation) {
			$specificRestrArr = array();
			foreach($projects as $project) {
				if ($relation['Relation']['project_preceding_id']==$project['Project']['id']) {
					$specificRestrArr[] = -1;
				}
				elseif ($relation['Relation']['project_id']==$project['Project']['id']) {
					$specificRestrArr[] = 1;
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

		
		debug($targetFunctionVector);
		debug($restrictionsMatrix);
		debug($restrictionTargetArray);
		debug($inequalityArray);
		//generate lp...
		
		$lp = lp_maker($targetFunctionVector,$restrictionsMatrix,$restrictionTargetArray,$inequalityArray);
		lpsolve('set_minim', $lp); //helper sets to maximize
		
		//recycle inequalityArray for setting the binary vars..
	    for ($i = 0; $i < count($inequalityArray); $i++) {
		    lpsolve('set_binary', $lp, $inequalityArray[$i], 1);
	    }
		
	    lpsolve('solve',$lp);
	    $lpObjectives = lpsolve('get_objective',$lp);
	    $lpVariables = lpsolve('get_variables',$lp);
	    
	    lpsolve('delete_lp',$lp);
		debug($lpObjectives);
		debug($lpVariables);
		
	}
	
	
	function linearizeProject($project) {
		return (double) $project['costs'];
	}
}
?>