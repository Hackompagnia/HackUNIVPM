<?php

class Application_Model_Dealers extends App_Model_Abstract
{
     public function __construct()
    {
		$this->_logger = Zend_Registry::get('log');  	
	}
    
    public function getNegByDealerId($info)
    {
        return $this->getResource('dealer')->getNegByDealerId($info);
    }
    
    public function addDealer($info) {
        return $this->getResource('dealer')->addDealer($info);
    }
}