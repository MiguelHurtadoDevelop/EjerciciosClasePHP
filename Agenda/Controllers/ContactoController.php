<?php

namespace Controllers;

use Models\Contacto;
use Services\ContactoService;
use src\Lib\Pages;

class ContactoController

{
    private ContactoService $service;
    private Contacto $contact;
    private Pages $pages;

    function __construct(){
        $this->service = new ContactoService();
        $this->pages = new Pages();
    }



    function listar(){
        $contactos = $this->service->findAll();
        $this->pages->render("contacto/showContacts", ['contactos'=>$contactos]);
    }
}