<?php

class Zend_View_Helper_Neg extends Zend_View_Helper_Abstract
{   
    protected $_dealersModel;

    public function neg ($id_dealer)
    {
        $this->_dealersModel = new Application_Model_Dealers();
        $neg = $this->_dealersModel->getNegByDealerId($id_dealer);
        return $neg->nome_negozio;
    }
}