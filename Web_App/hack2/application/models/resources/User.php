<?php

class Application_Resource_User extends Zend_Db_Table_Abstract
{
    protected $_name    = 'user';
    protected $_primary  = 'id';
    protected $_rowClass = 'Application_Resource_User_Item';

	public function init()
    {
		//provadfd
    }
       
    public function getUserByMail($mail)
    {
        return $this->fetchRow($this->select()->where('mail = ?', $mail));
    }
    
    public function getUserIdByMail($mail)
    {
                $select = $this->select()
                                ->from(array('user'),array('id'))
                                ->where('mail = ?', $mail);
                return $this->fetchAll($select);
    }
    
    public function getUserIdByToken($token)
    {
                $select = $this->select()
                                ->from(array('user'),array('id'))
                                ->where('token = ?', $token);
                return $this->fetchAll($select);
    }
	
	public function addUser($values)
	{
		$this->insert($values);
	}
	
	public function getUserVerifyByMail($mail)
	{
		return $this->fetchRow($this->select('verify')->where('mail = ?', $mail));
	}
        
        public function uptoken($info)
        {
            $this->update($info, 'id = '.$info['id']);
        }
}