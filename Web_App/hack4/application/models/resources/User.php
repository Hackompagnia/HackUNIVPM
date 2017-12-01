<?php

class Application_Resource_User extends Zend_Db_Table_Abstract {

    protected $_name = 'user';
    protected $_primary = 'id';
    protected $_rowClass = 'Application_Resource_User_Item';

    public function init() {
        //provadfd
    }

    public function getMailByCustomer($id) {
        return $this->fetchRow($this->select()->where('id = ?', $id));
    }

    public function getUserByMail($mail) {
        return $this->fetchRow($this->select()->where('mail = ?', $mail));
    }

    public function getUserIdByMail($mail) {
        $select = $this->select()
                ->from(array('user'), array('id'))
                ->where('mail = ?', $mail);
        return $this->fetchRow($select);
    }


    public function addUser($values) {
        unset($values[nome]);
        unset($values[cognome]);
        if($values['role']== 'dealer'){
            unset($values[nome_negozio]);
            unset($values[p_iva]);
        }
        $this->insert($values);
    }

    public function getUserVerifyByMail($mail) {
        return $this->fetchRow($this->select('verify')->where('mail = ?', $mail));
    }

    public function uptoken($info) {
        $this->update($info, 'id = ' . $info['id']);
    }
    

}
