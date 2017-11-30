<?php
    
class Zend_View_Helper_Verify extends Zend_View_Helper_Abstract
{
    protected $_usersModel;
    
    public function verify($token)
    {
        $this->_usersModel = new Application_Model_Users();//istanza adoperata per ottenere risposte a delle query dal model
        $a= $this->_usersModel->getUserIdByToken($token);
        return $a;
    }
}