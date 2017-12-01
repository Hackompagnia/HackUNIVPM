<?php

class Application_Model_Users extends App_Model_Abstract {

    public function __construct() {
        $this->_logger = Zend_Registry::get('log');
    }

    public function getMailByCustomer($info) {
        return $this->getResource('user')->getMailByCustomer($info);
    }

    public function getUserByMail($info) {
        return $this->getResource('user')->getUserByMail($info);
    }

    public function getUserIdByMail($info) {
        return $this->getResource('user')->getUserIdByMail($info);
    }


    public function addUser($info) {
        return $this->getResource('user')->addUser($info);
    }

    public function getUserVerifyByMail($info) {
        return $this->getResource('user')->getUserVerifyByMail($info);
    }

    public function updatetoken($info) {
        return $this->getResource('user')->uptoken($info);
    }

    public function getAdminByID($info) {
        return $this->getResource('admin')->getAdminByID($info);
    }

    public function getDealerByID($info) {
        return $this->getResource('dealer')->getDealerByID($info);
    }

    public function getCustomerByID($info) {
        return $this->getResource('customer')->getCustomerByID($info);
    }

}
