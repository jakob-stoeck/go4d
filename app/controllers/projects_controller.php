<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $helpers = array('Html', 'Form');
	var $uses = array('Project', 'Relation','ProjectsUsers');

    function graph() {
        $projects = $this->Project->findAll(null, null, 'id ASC');

        $projects = Set::combine($projects, '{n}.Project.id', '{n}.Project.name');
        $relations = $this->Relation->findAll(null, null, 'project_preceding_id ASC');

        $graphname = 'workpackages';

	    $dot = $this->Project->dot($projects, $relations, $graphname);

	    $this->set(compact('graphname'));
    }

	function index() {
		debug($this->Auth->user());
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
	}
	
	function plan() {
		$this->ProjectsUsers->syncPuEntries($this->Auth->user('id'));
		
		$puProjects = $this->ProjectsUsers->find('all',array(
			'conditions' => array('ProjectsUsers.user_id'=>$this->Auth->user('id'))
		));
		
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