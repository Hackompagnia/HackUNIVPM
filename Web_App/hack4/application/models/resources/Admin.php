<?php

class Application_Resource_Admin extends Zend_Db_Table_Abstract
{
    protected $_name    = 'admin';
    protected $_primary  = 'id';
    protected $_rowClass = 'Application_Resource_Admin_Item';

	public function init()
    {

    }
       
    public function getAdminByID($id_admin)
	{
		return $this->fetchRow($this->select()
                               ->from(array('admin'),array('nome'))
                               ->where('id = ?' , $id_admin));
	}
}