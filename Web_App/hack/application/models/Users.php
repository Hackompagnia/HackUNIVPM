<?php

class Application_Model_Users extends App_Model_Abstract
{ 

    public function __construct()
    {
		$this->_logger = Zend_Registry::get('log');  	
	}

    public function getUserByMail($info)
    {
    	return $this->getResource('user')->getUserByMail($info);
	}
        
	public function getUserIdByMail($info)
    {
    	return $this->getResource('user')->getUserIdByMail($info);
	}
        
        public function getUserIdByToken($info)
        {
            return $this->getResource('user')->getUserIdByToken($info);
        }
        
	public function addUser($info)
    {
    	return $this->getResource('user')->addUser($info);
	}
	
	public function getUserVerifyByMail($info)
	{
		return $this->getResource('user')->getUserVerifyByMail($info);
	}
        
        public function updatetoken($info)
        {
            return $this->getResource('user')->uptoken($info);
        }
}