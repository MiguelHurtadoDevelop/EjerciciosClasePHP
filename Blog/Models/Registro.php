<?php

namespace Models;

use Lib\BaseDatos;

use PDO;
use PDOException;

class Registros
{

    private int $id;
    private int $categoriaId;

    private int $usuarioId;
    private string $titulo;
    private string $descripcion;


    private BaseDatos $db;

    /**
     * @param BaseDatos $db
     */
    public function __construct()
    {
        $this->db = new BaseDatos();
    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }

    public function setUsuarioId(int $usuarioId): void
    {
        $this->usuarioId = $usuarioId;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCategoriaId(): int
    {
        return $this->categoriaId;
    }

    public function setCategoriaId(int $categoriaId): void
    {
        $this->categoriaId = $categoriaId;
    }



    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }


    public function desconecta(){
        $this->db->close();
    }

    public function delete(){
        $id=$this->getId();

        try {

            $ins = $this->db->prepara("DELETE FROM registros WHERE id = :id");
            $ins->bindValue(':id', $id);
            $ins->execute();

            $result = true;
        } catch (PDOException $error) {
            $result = false;

        }

        $ins->closeCursor();
        $ins = null;

        return $result;
    }



    public function create(): bool {
        $id = NULL;
        $categoriaId = $this->getCategoriaId();
        $usuarioId = $this->getUsuarioId();
        $titulo = $this->getTitulo();
        $descripcion = $this->getDescripcion();
        $fecha = $this->getFecha();


        try {
            $ins = $this->db->prepara("INSERT INTO registros (id, categoria_id, usuario_id,titulo, descripcion, fecha) VALUES (:id, :categoriaId, :usuarioId, :titulo, :descripcion, :fecha)");

            $ins->bindValue(':id', $id);
            $ins->bindValue(':categoriaId', $categoriaId);
            $ins->bindValue(':usuarioId', $usuarioId);
            $ins->bindValue(':titulo', $titulo);
            $ins->bindValue(':descripcion', $descripcion);
            $ins->bindValue(':fecha', $fecha);


            $ins->execute();

            $result = true;
        } catch (PDOException $error) {
            $result = false;
        }

        $ins->closeCursor();
        $ins = null;

        return $result;
    }


    public static function getAll(){
        $producto = new Producto();
        $producto->db->consulta("SELECT * FROM productos ORDER BY id ASC;");
        $categorias = $producto->db->extraer_todos();
        $producto->db->close();

        return $categorias;
    }

    public function buscaId($id){
        $select = $this->db->prepara("SELECT * FROM usuarios WHERE id=:id");
        $select->bindValue(':id', $id, PDO::PARAM_STR);

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