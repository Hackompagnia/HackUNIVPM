<?php

class Application_Model_Receipts extends App_Model_Abstract {

    public function __construct() {
        $this->_logger = Zend_Registry::get('log');
    }

    public function getReceiptsByDealer($info) {
        return $this->getResource('receipt')->getReceiptsByDealer($info);
    }

    public function getReceiptByCustomerId($info)
    {
        return $this->getResource('receipt')->getReceiptByCustomerId($info);
    }
}
