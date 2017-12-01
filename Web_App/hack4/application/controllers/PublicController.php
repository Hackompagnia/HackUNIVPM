<?php

class PublicController extends Zend_Controller_Action {

    protected $_usersModel;
    protected $_customerModel;
    protected $_dealerModel;
    protected $_form;
    protected $_formreg;
    protected $_formregcustomer;
    protected $_formregdealer;

    public function init() {
        // richiama il layout main.phtml
        $this->_helper->layout->setLayout('main');

        //istanza adoperata per la persistenza dell'autenticazione
        $this->_logger = Zend_Registry::get('log');

        //istanza adoperata per l'autenticazione
        $this->_authService = new Application_Service_Auth();

        //istanza adoperata per ottenere risposte a delle query dal model
        $this->_usersModel = new Application_Model_Users();
        $this->_customerModel = new Application_Model_Customers();
        $this->_dealerModel = new Application_Model_Dealers();
        //istanza adoperata per la form di login
        $this->view->loginForm = $this->getLoginForm();

        //istanza adoperata per la form di registrazione
        $this->view->regForm = $this->getRegForm();
        $this->view->regcustomerForm = $this->getRegcustomerForm();
        $this->view->regdealerForm = $this->getRegdealerForm();
    }

    public function indexAction() { //Funzione principale, sempre esguita
        
    }

    //_________LOGIN________________________________________//
    /*public function loginAction() { //Funzione di login
        
    }*/

    public function authenticateAction() { //Funzione di autenticazione
        //Controllo della post//
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('index');
        }
        //Controllo di validità richiesta//	
        $form = $this->_form;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('index');
        }
        //Controllo validità autenticazione//
        if (false === $this->_authService->authenticate($form->getValues())) {
            $form->setDescription('Autenticazione fallita. Riprova');
            return $this->render('index');
        }
        return $this->_helper->redirector('index', $this->_authService->getIdentity()->role);
    }

    private function getLoginForm() { //Funzine privata per creare l'istanza _form con la relativa azione da compiere dopo il login
        $urlHelper = $this->_helper->getHelper('url');
        $this->_form = new Application_Form_Public_Auth_Login();
        $this->_form->setAction($urlHelper->url(array(
                    'controller' => 'public',
                    'action' => 'authenticate'), 'default'
        ));
        return $this->_form;
    }
    

    //____________REGISTRAZIONE_____________________________//	
    public function sceltaAction() {
        
    }

    
    public function regdealerAction() {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $formreg = $this->_formregdealer;
        if (!$formreg->isValid($_POST)) {
            return $this->render('registration');
        }
        $values = $formreg->getValues();
        try {
            $this->_usersModel->addUser($values);
            
            $id=$this->_usersModel->getUserIdByMail($values['mail']);
            $values['id']=$id->id;
            $this->_dealerModel->addDealer($values);           
        } catch (Exception $e) {
            return $this->_helper->redirector('regnoncomplete');
        }
        $this->_helper->redirector('regcomplete');
    }
    
    
    public function regcustomerAction() {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $formreg = $this->_formregcustomer;
        if (!$formreg->isValid($_POST)) {
            return $this->render('registration');
        }
        $values = $formreg->getValues();
        try {
            $this->_usersModel->addUser($values);
            
            $id=$this->_usersModel->getUserIdByMail($values['mail']);
            $values['id']=$id->id;
            $this->_customerModel->addCustomer($values);           
        } catch (Exception $e) {
            return $this->_helper->redirector('regnoncomplete');
        }
        $this->_helper->redirector('regcomplete');
    }
    
    public function registrationAction() {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $formreg = $this->_formreg;
        if (!$formreg->isValid($_POST)) {
            return $this->render('scelta');
        }
        $values = $formreg->getValues()['type'];
        $this->view->tipo=$values;
    }
    
    public function regnoncompleteAction() {
        
    }

    public function regcompleteAction() {
        
    }


    private function getRegForm() {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_formreg = new Application_Form_Public_Reg_Scelta();
        $this->_formreg->setAction($urlHelper->url(array(
                    'controller' => 'public',
                    'action' => 'registration'), 'default'
        ));
        return $this->_formreg;
    }
    
    private function getRegdealerForm() {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_formregdealer = new Application_Form_Public_Reg_Regdealer();
        $this->_formregdealer->setAction($urlHelper->url(array(
                    'controller' => 'public',
                    'action' => 'regdealer'), 'default'
        ));
        return $this->_formregdealer;
    }
    
    private function getRegcustomerForm() {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_formregcustomer = new Application_Form_Public_Reg_Regcustomer();
        $this->_formregcustomer->setAction($urlHelper->url(array(
                    'controller' => 'public',
                    'action' => 'regcustomer'), 'default'
        ));
        return $this->_formregcustomer;
    }

}
