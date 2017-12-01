<?php

class Application_Form_Public_Auth_Login extends App_Form_Abstract
{
	public function init()
    {               
        
                // (1) Impostiamo gli attributi "action", "method" e "id" del form
                $this->setAction('')
                        ->setMethod('post')
                        ->setAttrib('id', 'loginForm');
 
                /************************ Textbox nome utente *************************/
                // (2) creiamo un elemento di tipo "text".....
                $nomeutente = $this->createElement('text', 'mail');
 
                //...gli associamo una etichetta
                $nomeutente  ->setLabel('Mail');
                 
                // (3) impostiamo i filtri e i validatori per questo elemento HTML
                $nomeutente  ->setRequired(TRUE)
                             ->addFilter('StringTrim');

 
                $nomeutente ->setAttrib('size', 35)
							->setAttrib('placeholder', "Mail")
							->setAttrib('autocomplete', "off");
                //Aggiungiamo l'oggetto appena creato nel nostro form
                $this->addElement($nomeutente);
 
                /************************ Textbox password *************************/
 
                $password = $this->createElement('password', 'password');
			    $password->setRequired(TRUE)
						 ->setAttrib('size', 35)
						 ->setAttrib('placeholder', "Password")
						 ->setLabel('Password')
						 ->addValidator('stringLength', true, array(8))
                         ->addFilter('StringTrim');
                 
                $password->getValidator('stringLength')->setMessage('La password deve contenere 8 caratteri');
                 
                $this->addElement($password);
                 
                //Aggiungiamo al form il pulsante di invio
				$btnLog = $this->createElement('submit', 'submit');
				$btnLog->setLabel('Login');
                $this->addElement($btnLog);
    }
}
