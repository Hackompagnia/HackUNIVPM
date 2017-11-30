<?php

class PublicController extends Zend_Controller_Action {

    protected $_usersModel;
    protected $_form;
    protected $_formreg;

    public function init() {
        // richiama il layout main.phtml
        $this->_helper->layout->setLayout('main');

        //istanza adoperata per la persistenza dell'autenticazione
        $this->_logger = Zend_Registry::get('log');

        //istanza adoperata per l'autenticazione
        $this->_authService = new Application_Service_Auth();

        //istanza adoperata per ottenere risposte a delle query dal model
        $this->_usersModel = new Application_Model_Users();

        //istanza adoperata per la form di login
        $this->view->loginForm = $this->getLoginForm();

        //istanza adoperata per la form di registrazione
        $this->view->regForm = $this->getRegForm();
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
        //Controllo verifica registrazione//
        /*$verify = $this->_authService->getIdentity()->verify;
        if ($verify == "N") {
            $this->_authService->clear();
            return $this->_helper->redirector('index');
        }*/
        //Tutto ok//
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
    public function registrationAction() {
        
    }

    public function regnoncompleteAction() {
        
    }

    public function regcompleteAction() {
        
    }

    public function newregAction() {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $formreg = $this->_formreg;
        if (!$formreg->isValid($_POST)) {
            return $this->render('registration');
        }
        $values = $formreg->getValues();
        $values['token'] = '0';

        try {
            $this->_usersModel->addUser($values);
        } catch (Exception $e) {
            return $this->_helper->redirector('regnoncomplete');
        }

        $appiggio = $this->_usersModel->getUserIdByMail($values['mail']);
        $id = $appiggio['id']->toArray();
        $values['id'] = $id['id'];
        $values['token'] = $this->cryptid($id['id']);
        $this->_usersModel->updatetoken($values);
        $this->sendMail($values['mail'], $values['token']);
        $this->_helper->redirector('regcomplete');
    }

    private function getRegForm() {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_formreg = new Application_Form_Public_Reg_Registration();
        $this->_formreg->setAction($urlHelper->url(array(
                    'controller' => 'public',
                    'action' => 'newreg'), 'default'
        ));
        return $this->_formreg;
    }

    private function sendMail($mail, $token) {
        /* $mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
          'auth'     => 'login',
          'username' => 'hackompagnia@gmail.com',
          'password' => 'hackunivpm',
          'port'     => '587',
          'ssl'      => 'tls',
          ));
          Zend_Mail::setDefaultTransport($mailTransport);
          $mail = new Zend_Mail();
          $mail->setBodyText('verifica emai www.cazzo.it?token='.$token);
          $mail->setFrom('hackompagnia@gmail.com', 'sender');
          $mail->addTo($mail, 'receiver');
          $mail->setSubject('Verify');
          $mail->send(); */

        $mailhost = 'smtp.gmail.com';
        $mailconfig = array(
            'auth' => 'login',
            'username' => 'hackompagnia@gmail.com',
            'password' => 'hackunivpm',
            'port' => '587',
            'ssl' => 'tls',
        );
        $transport = new Zend_Mail_Transport_Sendmail($mailhost, $mailconfig);
        Zend_Mail::setDefaultTransport($transport);


        $mail2 = new Zend_Mail();
        $mail2->setBodyText('verifica emai http://localhost/hack/public/public/validate?token=' . $token);
        $mail2->setFrom('hackompagnia@gmail.com', 'sender');
        $mail2->addTo($mail, 'receiver');
        $mail2->setSubject('Verify');
        $mail2->send();
    }

    public function validateAction() {

    }
    private function cryptid($id) {
        $a = array();
        for ($i = 0; $i < strlen($id); $i++) {
            switch ($id[$i]) {
                case '0':
                    $a[$i] = 'H';
                    break;
                case '1':
                    $a[$i] = 'i';
                    break;
                case '2':
                    $a[$i] = 'F';
                    break;
                case '3':
                    $a[$i] = '7';
                    break;
                case '4':
                    $a[$i] = 'u';
                    break;
                case '5':
                    $a[$i] = 'W';
                    break;
                case '6':
                    $a[$i] = 'l';
                    break;
                case '7':
                    $a[$i] = 'g';
                    break;
                case '8':
                    $a[$i] = 'G';
                    break;
                case '9':
                    $a[$i] = '5';
                    break;
                default:
                    break;
            }
        }
        return implode("", $a);
    }

}
