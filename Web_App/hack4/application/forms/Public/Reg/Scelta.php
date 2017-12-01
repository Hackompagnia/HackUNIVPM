<?php

class Application_Form_Public_Reg_Scelta extends Zend_Form {

    public function init() {
        $this->setMethod('post');
        $this->setName('choise');
        $this->setAction('');
        $this->setAttrib('enctype', 'multipart/form-data');

        $this->addElement('select', 'type', array(
            'label' => 'Tipo',
            'required' => true,
            'multiOptions' => array('customer'=>'Cliente',
                                    'dealer'=>'Titolare'),
        ));

        $this->addElement('submit', 'choise', array(
            'label' => 'Scegli',
        ));
    }

}
