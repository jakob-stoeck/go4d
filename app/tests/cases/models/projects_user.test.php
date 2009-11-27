<?php 
/* SVN FILE: $Id$ */
/* ProjectsUser Test cases generated on: 2009-11-27 20:26:40 : 1259350000*/
App::import('Model', 'ProjectsUser');

class ProjectsUserTestCase extends CakeTestCase {
	var $ProjectsUser = null;
	var $fixtures = array('app.projects_user', 'app.project', 'app.user');

	function startTest() {
		$this->ProjectsUser =& ClassRegistry::init('ProjectsUser');
	}

	function testProjectsUserInstance() {
		$this->assertTrue(is_a($this->ProjectsUser, 'ProjectsUser'));
	}

	function testProjectsUserFind() {
		$this->ProjectsUser->recursive = -1;
		$results = $this->ProjectsUser->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ProjectsUser' => array(
			'id'  => 1,
			'project_id'  => 1,
			'user_id'  => 1,
			'done'  => 1,
			'wanted'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>