<?php
class Application_Form_Public_Reg_Regdealer extends Zend_Form
{
	
	 public function init() {
        $this->setMethod('post');
        $this->setName('newreg');
        $this->setAction('');
        $this->setAttrib('enctype', 'multipart/form-data');

        $this->addElement('hidden', 'role', array(
            'value' => 'dealer',
        ));
        
        $this->addElement('hidden', 'data_reg', array(
            'data-date' => date("Y-m-d", strtotime("+1 day")),
            'data-date-format' => 'yyyy-mm-dd',
            'value' => date("Y-m-d")
        ));

        $this->addElement('text', 'nome', array(
            'label' => 'Nome',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength', true, array(1, 25))),
        ));

        $this->addElement('text', 'cognome', array(
            'label' => 'Cognome',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength', true, array(1, 25))),
        ));

        $this->addElement('text', 'mail', array(
            'label' => 'mail',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength', true, array(1, 25))),
        ));
        
        $this->addElement('text', 'nome_negozio', array(
            'label' => 'Nome Negozio',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength', true, array(1, 25))),
        ));
        
        $this->addElement('text', 'p_iva', array(
            'label' => 'partita iva',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength', true, array(1, 25))),
        ));

        $this->addElement('password', 'password', array(
            'label' => 'Password',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength', true, array(1, 25))),
        ));

        $this->addElement('submit', 'registration', array(
            'label' => 'Registrati',
        ));
    }
}