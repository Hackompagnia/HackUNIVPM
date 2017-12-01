<?php

class DealerController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout('dealer/dealer'); // richiama il layout main.phtml
        $this->_logger = Zend_Registry::get('log'); //istanza adoperata per la persistenza dell'autenticazione
        $this->_authService = new Application_Service_Auth(); //istanza adoperata per l'autenticazione
        $this->_receiptModel = new Application_Model_Receipts();
        $this->_usersModel = new Application_Model_Users();
    }

    public function indexAction() {
        $name = $this->_usersModel->getDealerByID($this->_authService->getIdentity()->id);
		$this->view->name_dealer=$name;
    }

    public function logoutAction() {
        $this->_authService->clear();
        return $this->_helper->redirector('index', 'public');
    }

    public function receiptAction() {
        $this->_helper->layout->setLayout('dealer/dealerfatt');
        //estrae tutti gli scontrini erogati dal venditore
        $scontrini=$this->_receiptModel->getReceiptsByDealer($this->_authService->getIdentity()->id);
        $this->view->scontrini=$scontrini;      
    }

}
