<?php 
/* SVN FILE: $Id$ */
/* ProjectsUser Fixture generated on: 2009-11-27 20:26:40 : 1259350000*/

class ProjectsUserFixture extends CakeTestFixture {
	var $name = 'ProjectsUser';
	var $table = 'projects_users';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'project_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'user_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'done' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'wanted' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'project_id'  => 1,
		'user_id'  => 1,
		'done'  => 1,
		'wanted'  => 1
	));
}
?>