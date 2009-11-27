<?php 
/* SVN FILE: $Id$ */
/* Project Test cases generated on: 2009-11-27 20:26:02 : 1259349962*/
App::import('Model', 'Project');

class ProjectTestCase extends CakeTestCase {
	var $Project = null;
	var $fixtures = array('app.project', 'app.relation');

	function startTest() {
		$this->Project =& ClassRegistry::init('Project');
	}

	function testProjectInstance() {
		$this->assertTrue(is_a($this->Project, 'Project'));
	}

	function testProjectFind() {
		$this->Project->recursive = -1;
		$results = $this->Project->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Project' => array(
			'id'  => 1,
			'wp_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'entire_bank_process'  => 1,
			'entire_bank_knowledge'  => 1,
			'entire_bank_risk'  => 1,
			'entire_bank_information'  => 1,
			'marketing_process'  => 1,
			'marketing_knowledge'  => 1,
			'marketing_risk'  => 1,
			'marketing_information'  => 1,
			'production_process'  => 1,
			'production_knowledge'  => 1,
			'production_risk'  => 1,
			'production_information'  => 1,
			'it_process'  => 1,
			'it_knowledge'  => 1,
			'it_risk'  => 1,
			'it_information'  => 1,
			'costs'  => 1,
			'Emp. Ext. IT required'  => 1,
			'Emp. Ext. Man. required'  => 1,
			'Emp. Ext. Org. required'  => 1,
			'Emp. IT Dev. required'  => 1,
			'Emp. Man. required'  => 1,
			'Emp. Serv. Sav. required'  => 1,
			'Emp. Org. required'  => 1,
			'Emp. Mark. required'  => 1,
			'Emp. S&M Loans required'  => 1,
			'Emp. Orig. Loans required'  => 1,
			'Emp. Serv. Loans required'  => 1,
			'Emp. S&M Sav. required'  => 1,
			'Emp. Orig. Sav. required'  => 1,
			'Comm. required'  => 1,
			'Server required'  => 1,
			'Storage required'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>