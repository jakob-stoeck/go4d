<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	
	
	var $uses = array('Project', 'Relation','ProjectsUsers','User');
	
	function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
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
	
    function graph($filtertype = null) {
        $projects = $this->Project->findAll(null, null, 'id ASC');

        $projects = Set::combine($projects, '{n}.Project.id', '{n}.Project.name');
        $relations = $this->Relation->findAll(null, null, 'project_preceding_id ASC');

        
        $user = $this->User->find('first',array(
			'conditions'=>array('User.id'=>$this->Auth->user('id')),
			'recursive' => -1
		));
		$savedCalculus = unserialize($user['User']['saved_calculus']);
	    $dot = $this->Project->dot($projects, $relations, $this->Auth->user('id'),$savedCalculus['projectIds'],$filtertype);
	    $this->set(array('graphFilename'=>$this->Auth->user('id')));
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
		$rounds = $this->Project->orderProjects($savedCalculus['projectIds'],$this->Auth->user('id'));
//		debug($rounds);
		$orderedTableData = $this->_orderForAnalyzeTable($rounds);
		$this->set(compact('rounds','orderedTableData'));
	}
	function _orderForAnalyzeTable($rounds) {
		
		$doneProjectIds = $this->ProjectsUsers->find('list',array(
			'conditions' => array(
				'ProjectsUsers.user_id'=>$this->Auth->user('id'),
				'ProjectsUsers.done' => 1,
			),
			'fields' => array('ProjectsUsers.project_id')
		));
		
		$details = array_keys($rounds[0][0]['Project']);
		
		$tableHeader = array('Runde');
		$tableCells = array();
		foreach ($rounds as $rnr => $round) $tableHeader[] = $rnr;
		$tableHeader[] = 'Sparkline';
		
		foreach ($details as $detail) {
			$tableRow = array($detail);
			
			$sparklineArr = array(); //sparkline goes over multiple rounds..

			foreach ($rounds as $round) {
				$detailValues = array();
				foreach ($round as $project) {
					if ($detail=="name") {
						$detailValues[$project['Project']['id']] = substr($project['Project'][$detail],0,20).'&hellip;';
					}
					elseif ($detail=="id") {
						$detailValues[$project['Project']['id']] = 'WP00'.$project['Project'][$detail];
					}
					else {
						$detailValues[$project['Project']['id']] = $project['Project'][$detail];
					}
				}
				
				$detailOutput = null; $correctedDetailOutput = null;
				if (is_numeric(reset($detailValues))) {
					$detailOutput = 0;
					foreach ($detailValues as $pId =>$dv) {
						$detailOutput += $dv;
						if (!in_array($pId,$doneProjectIds)) $correctedDetailOutput += $dv;
					}
					$tableRow[] = $detailOutput;
					$sparklineArr[] = $detailOutput;
				}
				else {
					$tableRow[] = implode(', ',$detailValues);
				}					
			}
			
		
			if ($sparklineArr) {
				$max = max($sparklineArr) < 10 ? 10 : max($sparklineArr);
				$tableRow[] = '<img src="http://chart.apis.google.com/chart?cht=bvs&chds=0,'.$max.'&chs=200x30&chd=t:'.implode(',',$sparklineArr).'" />';
			}
			$tableCells[] = $tableRow;
		}
		return compact('tableHeader','tableCells');		
	}	
}
?>