<?php
class Relation extends AppModel {

	var $name = 'Relation';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'ProjectPreceeding' => array(
			'className' => 'Project',
			'foreignKey' => 'project_preceding_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>