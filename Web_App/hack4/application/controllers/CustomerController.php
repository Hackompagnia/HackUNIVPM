<?php

class CustomerController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout('customer/customer'); // richiama il layout main.phtml
        $this->_logger = Zend_Registry::get('log'); //istanza adoperata per la persistenza dell'autenticazione
        $this->_authService = new Application_Service_Auth(); //istanza adoperata per l'autenticazione
        $this->_ReceiptsModel = new Application_Model_Receipts();
        $this->_usersModel = new Application_Model_Users();
    }

    public function indexAction() {
        $name = $this->_usersModel->getCustomerByID($this->_authService->getIdentity()->id);
        $this->view->name_customer = $name;
    }

    //__________________________Sezione_____________________Transazioni_________________________________________________//
    public function transAction() {
        $this->_helper->layout->setLayout('customer/customertrans');
        $id = $this->_authService->getIdentity()->id;
        $scont = $this->_ReceiptsModel->getReceiptByCustomerId($id);
        $this->view->scont = $scont;
    }

    //__________________________Fine______________________Sezione__________________________________Transazioni_________//
    
    //__________________________Sezione_____________________Abbonamento_________________________________________________//
    
    Public function abboAction()
    {
        $this->_helper->layout->setLayout('customer/customerabbo');
    }
    
    //__________________________Fine______________________Sezione__________________________________Abbonamento_________//

    public function logoutAction() {
        $this->_authService->clear();
        return $this->_helper->redirector('index', 'public');
    }

}
