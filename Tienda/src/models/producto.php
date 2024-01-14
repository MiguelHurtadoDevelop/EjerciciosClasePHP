<?php

namespace src\models;

use PDO;
use PDOException;
use src\Lib\BaseDatos;

class producto
{

    private int $id;
    private int $categoriaId;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;
    private string $oferta;
    private string $fecha;
    private string $imagen;

    private BaseDatos $db;

    /**
     * @param BaseDatos $db
     */
    public function __construct()
    {
        $this->db = new BaseDatos();
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

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getOferta(): string
    {
        return $this->oferta;
    }

    public function setOferta(string $oferta): void
    {
        $this->oferta = $oferta;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getDb(): BaseDatos
    {
        return $this->db;
    }

    public function setDb(BaseDatos $db): void
    {
        $this->db = $db;
    }






    public function desconecta(){
        $this->db->close();
    }

    public function delete(){
        $id=$this->getId();

        try {

            $ins = $this->db->prepara("DELETE FROM productos WHERE id = :id");
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
        $nombre = $this->getNombre();
        $descripcion = $this->getDescripcion();
        $precio = $this->getPrecio();
        $stock = $this->getStock();
        $oferta = $this->getOferta();
        $fecha = $this->getFecha();
        $imagen = $this->getImagen();

        try {
            $ins = $this->db->prepara("INSERT INTO productos (id, categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) VALUES (:id, :categoriaId, :nombre, :descripcion, :precio, :stock, :oferta, :fecha, :imagen)");

            $ins->bindValue(':id', $id);
            $ins->bindValue(':categoriaId', $categoriaId);
            $ins->bindValue(':nombre', $nombre);
            $ins->bindValue(':descripcion', $descripcion);
            $ins->bindValue(':precio', $precio);
            $ins->bindValue(':stock', $stock);
            $ins->bindValue(':oferta', $oferta);
            $ins->bindValue(':fecha', $fecha);
            $ins->bindValue(':imagen', $imagen);

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