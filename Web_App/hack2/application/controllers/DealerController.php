<?php

class DealerController extends Zend_Controller_Action
{	
    public function init()
    {
        $this->_helper->layout->setLayout('dealer');// richiama il layout main.phtml
		$this->_logger = Zend_Registry::get('log');//istanza adoperata per la persistenza dell'autenticazione
		$this->_authService = new Application_Service_Auth();//istanza adoperata per l'autenticazione
    }
    public function indexAction()
    {

    }
 }