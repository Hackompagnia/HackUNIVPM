<?php

class AdminController extends Zend_Controller_Action
{
	protected $_usersModel;
	
    public function init()
    {
        $this->_helper->layout->setLayout('admin/admin');// richiama il layout main.phtml
		$this->_logger = Zend_Registry::get('log');//istanza adoperata per la persistenza dell'autenticazione
		$this->_authService = new Application_Service_Auth();//istanza adoperata per l'autenticazione
        $this->_usersModel = new Application_Model_Users();
    }
    public function indexAction()
    {
		$name = $this->_usersModel->getAdminByID($this->_authService->getIdentity()->id);
		$this->view->name_admin=$name;
    }
	
//-----------------------------------FUNZIONI CHE L'ADMIN SVOLGE SUI SUOI DATI PERSONALI--------------------------	
	public function logoutAction()
	{
		$this->_authService->clear();
		return $this->_helper->redirector('index','public');		
	}
	
	public function moddatiAction()
	{
		$this->_helper->layout->setLayout('admin/adminmod');
	}
	
	public function creautenteAction()
	{
		$this->_helper->layout->setLayout('admin/admincrea');
	}
	
 }
 
 
 
 
 
 //----------------------------------------------------------------------------------------------------------------
 
 
 //-------------------------------FUNZIONI CHE L'ADMIN SVOLGE SUI DATI DEL DEALER----------------------
 
 
 
 
 
 
 //-------------------------------FUNZIONI CHE L'ADMIN SVOLGE SUI DATI DEL CUSTOMER---------------------