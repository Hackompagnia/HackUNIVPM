<?php
    
class Zend_View_Helper_Mail extends Zend_View_Helper_Abstract
{
    protected $_usersModel;
    
    public function Mail($id)
    {
        $this->_usersModel = new Application_Model_Users();//istanza adoperata per ottenere risposte a delle query dal model
        $a= $this->_usersModel->getMailByCustomer($id);
        return $a->mail;
    }
}
