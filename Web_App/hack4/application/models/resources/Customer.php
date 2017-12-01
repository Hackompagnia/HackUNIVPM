<?php

class Application_Resource_Customer extends Zend_Db_Table_Abstract {

    protected $_name = 'customer';
    protected $_primary = 'id';
    protected $_rowClass = 'Application_Resource_Customer_Item';

    public function init() {
        
    }

    public function getCustomerByID($id) {
        return $this->fetchRow($this->select()
                                ->from(array('customer'), array('nome'))
                                ->where('id = ?', $id));
    }

    public function addCustomer($info) {
        unset($info[role]);
        unset($info[mail]);
        unset($info[data_reg]);
        unset($info[password]);
        $this->insert($info);
    }

}
