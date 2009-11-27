<?php 
/* SVN FILE: $Id$ */
/* Relation Fixture generated on: 2009-11-27 20:27:00 : 1259350020*/

class RelationFixture extends CakeTestFixture {
	var $name = 'Relation';
	var $table = 'relations';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parent_project_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'project_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'parent_project_id'  => 1,
		'project_id'  => 1
	));
}
?>