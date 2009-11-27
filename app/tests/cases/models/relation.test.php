<?php 
/* SVN FILE: $Id$ */
/* Relation Test cases generated on: 2009-11-27 20:27:00 : 1259350020*/
App::import('Model', 'Relation');

class RelationTestCase extends CakeTestCase {
	var $Relation = null;
	var $fixtures = array('app.relation', 'app.parent_project', 'app.project');

	function startTest() {
		$this->Relation =& ClassRegistry::init('Relation');
	}

	function testRelationInstance() {
		$this->assertTrue(is_a($this->Relation, 'Relation'));
	}

	function testRelationFind() {
		$this->Relation->recursive = -1;
		$results = $this->Relation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Relation' => array(
			'id'  => 1,
			'parent_project_id'  => 1,
			'project_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>