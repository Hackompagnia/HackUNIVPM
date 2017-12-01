<?php

class Application_Resource_Receipt extends Zend_Db_Table_Abstract
{
    protected $_name    = 'receipt';
    protected $_primary  = 'id_scontrino';
    protected $_rowClass = 'Application_Resource_Receipt_Item';

	public function init()
    {

    }
    
    public function getReceiptsByDealer($id)
    {
        return $this->fetchAll($this->select()->where('id_dealer = ?', $id));
    }
    
    public function getReceiptByCustomerId($id_user)
    {
        $select = $this->select()->where('id_customer = ?', $id_user);
        return $this->fetchAll($select);
    }
}