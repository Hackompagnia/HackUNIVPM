<?php

class UserController extends Zend_Controller_Action
{	
    public function init()
    {
        $this->_helper->layout->setLayout('user');// richiama il layout main.phtml
		$this->_logger = Zend_Registry::get('log');//istanza adoperata per la persistenza dell'autenticazione
		$this->_authService = new Application_Service_Auth();//istanza adoperata per l'autenticazione
    }
    public function indexAction()
    {
       $name = $this->_authService->getIdentity()->name;
	   $surname = $this->_authService->getIdentity()->surname;
	   $v = $this->_authService->getIdentity()->verify;
	   $this->view->a=$name." ".$surname." ".$v;
    }
 }