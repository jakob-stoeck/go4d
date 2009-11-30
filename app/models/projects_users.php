<?php
class ProjectsUsers extends AppModel {

	var $name = 'ProjectsUsers';

	var $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id'
		)
	);
	
	function syncPuEntries($userId) {
		App::import('Model','Project');
		$projectClass = new Project();
		$projectIds = $projectClass->find('list',array('fields'=>array('Project.id')));
		$puProjectIds = $this->find('list',array(
			'conditions' => array('ProjectsUsers.user_id'=>$userId),
			'fields'=>array('ProjectsUsers.project_id')
		));
		
		$notYetThereProjectIds = array_diff($projectIds,$puProjectIds);

		$savArr = array();
		foreach ($notYetThereProjectIds as $nytpid) {
			$savArrEntry = array(
				'project_id' => $nytpid,
				'user_id' => $userId,
			);
			$savArr[] = $savArrEntry;
		}		
		$this->saveAll($savArr);
	}

}
?>