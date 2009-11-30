<?php
class AppController extends Controller {
	var $helpers = array('Html', 'Form','Javascript','Ajax');
	var $components = array('Auth','RequestHandler');

	//var $components = array('Auth');

	function successRedir($message = null, $redir = null) {
		$this->Session->setFlash($message);
		$this->redirect($redir);
	}

	function beforeFilter() {
	    //Configure AuthComponent
//	    $this->Auth->authorize = 'actions';
	    $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'plan');
	    $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
//	    $this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'add');
	}
}
?>