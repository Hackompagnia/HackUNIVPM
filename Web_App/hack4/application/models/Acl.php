<?php 

class Application_Model_Acl extends Zend_Acl
{
	public function __construct()
	{
		// ACL per ruolo di default
		$this->addRole(new Zend_Acl_Role('unregistered'))
			 ->add(new Zend_Acl_Resource('public'))
			 ->add(new Zend_Acl_Resource('error'))
			 ->allow('unregistered', array('public','error'));
			 
		// ACL per l'acquirente
		$this->addRole(new Zend_Acl_Role('customer'), 'unregistered')
			 ->add(new Zend_Acl_Resource('customer'))
			 ->allow('customer','customer');
                
                // ACL per il venditore
		$this->addRole(new Zend_Acl_Role('dealer'), 'unregistered')
			 ->add(new Zend_Acl_Resource('dealer'))
			 ->allow('dealer','dealer');
				   
		// ACL per amministratore
		$this->addRole(new Zend_Acl_Role('admin'), 'customer', 'dealer')
			 ->add(new Zend_Acl_Resource('admin'))
			 ->allow('admin','admin');
			 
		// ACL per staff
		$this->addRole(new Zend_Acl_Role('staff'), 'unregistered')
			 ->add(new Zend_Acl_Resource('staff'))
			 ->allow('staff','staff');
	}
}