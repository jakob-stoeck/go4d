<?php
class ProjectsUser extends AppModel {

	var $name = 'ProjectsUser';
	var $validate = array(
		'id' => array('decimal'),
		'project_id' => array('decimal'),
		'user_id' => array('decimal'),
		'done' => array('decimal'),
		'wanted' => array('decimal')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>