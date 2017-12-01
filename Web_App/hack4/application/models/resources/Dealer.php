<?php

class Application_Resource_Dealer extends Zend_Db_Table_Abstract {

    protected $_name = 'dealer';
    protected $_primary = 'id';
    protected $_rowClass = 'Application_Resource_Dealer_Item';

    public function init() {
        //provadfd
    }

    public function getNegByDealerId($id) {
        return $this->fetchRow($this->select()->where('id = ?', $id));
    }

    public function getDealerByID($id) {
        return $this->fetchRow($this->select()
                                ->from(array('dealer'), array('nome'))
                                ->where('id = ?', $id));
    }

    public function addDealer($info) {
        unset($info[role]);
        unset($info[mail]);
        unset($info[data_reg]);
        unset($info[password]);
        $this->insert($info);
    }

}
