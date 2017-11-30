<?php 

class Application_Model_Acl extends Zend_Acl
{
	public function __construct()
	{
		// ACL per ruolo di default
		$this->addRole(new Zend_Acl_Role('unregistered'))
			 ->add(new Zend_Acl_Resource('public'))
			 ->add(new Zend_Acl_Resource('error'))
			 ->add(new Zend_Acl_Resource('index'))
			 ->allow('unregistered', array('public','error','index'));
			 
		// ACL per utente
		$this->addRole(new Zend_Acl_Role('user'), 'unregistered')
			 ->add(new Zend_Acl_Resource('user'))
			 ->allow('user','user');
				   
		// ACL per amministratore
		$this->addRole(new Zend_Acl_Role('admin'), 'user')
			 ->add(new Zend_Acl_Resource('admin'))
			 ->allow('admin','admin');
			 
		// ACL per staff
		$this->addRole(new Zend_Acl_Role('staff'), 'unregistered')
			 ->add(new Zend_Acl_Resource('staff'))
			 ->allow('staff','staff');
	}
}