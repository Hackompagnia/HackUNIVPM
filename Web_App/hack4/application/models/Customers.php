<?php

class Application_Model_Customers extends App_Model_Abstract
{
     public function __construct()
    {
		$this->_logger = Zend_Registry::get('log');  	
	}
        
    public function addCustomer($info) {
        return $this->getResource('customer')->addCustomer($info);
    }
}