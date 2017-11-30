<?php
class Application_Form_Public_Reg_Registration extends Zend_Form
{
	
	public function init()
	{
		$this->setMethod('post');
		$this->setName('newreg');
		$this->setAction('');
		$this->setAttrib('enctype', 'multipart/form-data');

		$this->addElement('text', 'name', array(
            'label' => 'Nome',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength',true, array(1,25))),
		));
		
		$this->addElement('text', 'surname', array(
            'label' => 'Cognome',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength',true, array(1,25))),
		));
		
		$this->addElement('text', 'mail', array(
            'label' => 'mail',
            'filters' => array('StringTrim'),
            'required' => true,

            'validators' => array(array('StringLength',true, array(1,25))),
		));
		
		$this->addElement('password', 'password', array(
            'label' => 'Password',
            'filters' => array('StringTrim'),
            'required' => true,

            'validators' => array(array('StringLength',true, array(1,25))),
		));
		
		$this->addElement('text', 'address', array(
            'label' => 'Address',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength',true, array(1,25))),
		));

		$this->addElement('submit', 'registration', array(
            'label' => 'Registrati',
		));
	}
}