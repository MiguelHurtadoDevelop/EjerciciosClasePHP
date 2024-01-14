<?php

namespace src\models;
use PDO;
use PDOException;
use src\Lib\BaseDatos;


class Categoria
{
    private ?string $id;
    private string $nombre;
    private BaseDatos $db;

    public function __construct()
    {

        $this->db = new BaseDatos();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }



    public function create(): bool{
        $nombre=$this->getNombre();
        $coincidencia=$this->buscaNombre($nombre);
        $result = false;
        if(!$coincidencia){
            try {
                $ins = $this->db->prepara("INSERT INTO categorias (nombre) values (:nombre)");


                $ins->bindValue(':nombre', $nombre);


                $ins->execute();

                $result = true;
            } catch (PDOException $error){
                $result = false;
            }
            $ins->closeCursor();
            $ins=null;


        }
        return $result;
    }

    public function desconecta(){
        $this->db->close();
    }
    public static function getAll(){
        $categoria = new Categoria();
        $categoria->db->consulta("SELECT * FROM categorias ORDER BY id DESC;");
        $categorias = $categoria->db->extraer_todos();
        $categoria->db->close();

        return $categorias;
    }

    public function buscaNombre($nombre){
        $select = $this->db->prepara("SELECT * FROM categorias WHERE nombre=:nombre");
        $select->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $result = false;
        try {
            $select->execute();
            if ($select && $select->rowCount() == 1){
                $result = $select->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $err){
            $result = false;
        }
        return $result;
    }

}