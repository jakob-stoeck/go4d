<?php
class ProjectsUsers extends AppModel {

	var $name = 'ProjectsUsers';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
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
		$puProjectIds = $this->find('list',array('fields'=>array('ProjectsUsers.project_id')));
		
		$notYetThereProjectIds = array_diff($projectIds,$puProjectIds);

		$savArr = array('ProjectsUsers'=>array());
		foreach ($notYetThereProjectIds as $nytpid) {
			$this->create();
			$this->save(array(
				'project_id' => $nytpid,
				'user_id' => $userId,
			));
		}
		
	}

}
?>