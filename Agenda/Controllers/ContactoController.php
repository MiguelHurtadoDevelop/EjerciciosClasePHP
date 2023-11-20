<?php

namespace Controllers;

use Models\Contacto;
use Lib\Pages;

class ContactoController
{
    private Contacto $contact;
    private Pages $pages;

    function __construct(){
        $this->contact = new Contacto();
        $this->pages = new Pages();
    }

    function showAll(){
        $contactos = $this->contact->findAll();
        $this->pages->render("contacto/showContacts", ['contactos'=>$contactos]);
    }
}