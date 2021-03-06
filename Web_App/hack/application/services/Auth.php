<?php

class Application_Service_Auth
{
    protected $_usersModel;
    protected $_auth;

    public function __construct()
    {
        $this->_usersModel = new Application_Model_Users();
    }
    
    public function authenticate($credentials)
    {
        $adapter = $this->getAuthAdapter($credentials);
        $auth    = $this->getAuth();
        $result  = $auth->authenticate($adapter);
		
        if (!$result->isValid())
			{
				return false;
			}
        $userId = $this->_usersModel->getUserIdByMail($credentials['mail']);
        $auth->getStorage()->write($userId);
        return true;
    }
    
    public function getAuth()
    {
        if (null === $this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
        return $this->_auth;
    }
   
    public function getIdentity()
    {
        $auth = $this->getAuth();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity();
        }
        return false;
    }
    
    public function clear()
    {
        $this->getAuth()->clearIdentity();
    }
    
    public function getAuthAdapter($values)
    {
		$authAdapter = new Zend_Auth_Adapter_DbTable(
			Zend_Db_Table_Abstract::getDefaultAdapter(),
			'user',
			'mail',
			'password'
		);
		$authAdapter->setIdentity($values['mail']);
		$authAdapter->setCredential($values['password']);
        return $authAdapter;
    }
}
