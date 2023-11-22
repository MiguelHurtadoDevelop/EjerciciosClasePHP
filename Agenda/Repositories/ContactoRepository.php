<?php

namespace Repositories;
use Lib\BaseDatos;
use Models\Contacto;
use PDO;
use PDOException;
class ContactoRepository
{
    private BaseDatos $conexion;

    function __construct(){
        $this->conexion = new BaseDatos();
    }

    public function findAll ():?array{
        $this->conexion->consulta('SELECT * FROM contactos');
        return $this->extractAll();
    }

    public function extractAll():?array{
        $contactos=[];
        $contactosData = $this->conexion->extraer_todos();
        foreach ($contactosData as $contactoData){
            $contactos[] = Contacto::fromArray($contactoData);
        }
        return $contactos;
    }

    public function extraer_registro(): ?Contacto{
        return($contacto = $this->conexion->extraer_registro())?Contacto::fromArray($contacto):null;
    }

    public function read(int $id): ?Contacto{
        $consulta = "SELECT id, nombre, apellidos FROM contactos WHERE id = :id";
        $stmt = $this->conexion->prepara($consulta);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt=null;
        return $this->conexion->extraer_registro();
    }

    public function filasAfectadas(): int{
        return $this->conexion->filasAfectadas();
    }

    public function save(){
        //Funcion que compurebe al guardar un nuevo contacto, si este ya esta en la base de datos
        //podemos editar ese contacto y si no existe lo creamos
    }
    /*public function create(array $datos):string|int{
        try{
            $stmt = $this->conexion->prepara("INSERT INTO contactos(id,nombre,correo,direccion,telefono,fecha_nacimiento
        )values(:id,:nombre,:correo,:direccion,:telefono,:fecha_nacimiento))");

        }catch (){

        }
    }*/
}