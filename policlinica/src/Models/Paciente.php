<?php
namespace Models;
use Lib\BaseDatos;

class Paciente extends BaseDatos{

    private string $id;
    private string $nombre;
    private string $apellidos;
    private string $correo;
    private string $password;
    
    public function __construct(
        
        ){
          parent::__construct();
        }

    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function getApellidos(): string{
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos){
        $this->apellidos = $apellidos;
    }

    public function getCorreo(): string{
        return $this->correo;
    }

    public function setCorreo(string $correo){
        $this->correo = $correo;
    }
    
    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }
    
    public function getAll(): ?array{
        $this->consulta("SELECT * FROM pacientes");
        return $this->extraer_todos();
    }
   
}