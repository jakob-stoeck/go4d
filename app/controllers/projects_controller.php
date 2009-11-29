<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $helpers = array('Html', 'Form');
	var $uses = array('Project', 'Relation','ProjectsUsers','User');

    function graph() {
        $projects = $this->Project->findAll(null, null, 'id ASC');

        $projects = Set::combine($projects, '{n}.Project.id', '{n}.Project.name');
        $relations = $this->Relation->findAll(null, null, 'project_preceding_id ASC');

        $graphname = 'workpackages';

	    $dot = $this->Project->dot($projects, $relations, $graphname);

	    $this->set(compact('graphname'));
    }

	function index() {
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
	}
	
	function plan() {
		$this->ProjectsUsers->syncPuEntries($this->Auth->user('id'));
		$puProjects = $this->ProjectsUsers->find('all',array(
			'conditions' => array('ProjectsUsers.user_id'=>$this->Auth->user('id')),
			'order' => 'ProjectsUsers.project_id'
		));
		$this->set(compact('puProjects'));
	}
	
	function analyze() {
		$user = $this->User->find('first',array(
			'conditions'=>array('User.id'=>$this->Auth->user('id')),
			'recursive' => -1
		));

		$savedCalculus = unserialize($user['User']['saved_calculus']);
		
		if ($d =& $this->data) {
			$savArr = array();
			foreach ($d['ProjectsUsers'] as $project_id => $puArr) {
				$savArr[] = array(
					'user_id' => $this->Auth->user('id'),
					'project_id' => $project_id,
					'done' => $puArr['done'],
					'wanted' => $puArr['wanted']
				);
			}
			$this->ProjectsUsers->deleteAll(array('ProjectsUsers.user_id'=>$this->Auth->user('id')),false);
			$this->ProjectsUsers->saveAll($savArr);
			$savedCalculus = $this->Project->getBestPath($this->Auth->user('id'));
		}
//		debug($savedCalculus);
		$rounds = $this->Project->orderProjects($savedCalculus['projectIds']);
//		debug($rounds);
		$orderedTableData = $this->_orderForAnalyzeTable($rounds);
		$this->set(compact('rounds','orderedTableData'));
	}
	function _orderForAnalyzeTable($rounds) {
		$details = array_keys($rounds[0][0]['Project']);
		
		$tableHeader = array('Runde');
		$tableCells = array();
		foreach ($rounds as $rnr => $round) $tableHeader[] = $rnr+1;
		
		foreach ($details as $detail) {
			$tableRow = array($detail);
			
			foreach ($rounds as $round) {
				$detailValues = array();
				foreach ($round as $project) {
					if ($detail == 'id') {
						$detailValues[] = 'WP000'.$project['Project'][$detail];
					}
					elseif ($detail=="name") {
						$detailValues[] = substr($project['Project'][$detail],0,20).'&hellip;';
					}
					else {
						$detailValues[] = $project['Project'][$detail];
					}
				}
//				debug($detailValues);
				
				$detailOutput = null;
				if (is_numeric(reset($detailValues))) {
					$detailOutput = 0;
					foreach ($detailValues as $dv) $detailOutput += $dv;
				}
				else {
					$detailOutput = implode(', ',$detailValues);
				}
				$tableRow[] = $detailOutput;
	//			$tableRow[] = implode($detailValues,', ');
					
			}
			
			$tableCells[] = $tableRow;
		}
		return compact('tableHeader','tableCells');		
	}	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Project.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The Project has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Project could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Project', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The Project has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->del($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>