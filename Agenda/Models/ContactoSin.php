<?php

namespace Models;

use PDOException;
use src\Lib\BaseDatos;

class ContactoSin
{
    private BaseDatos $conexion;
    private mixed $stmt;

    private string|null $id = null;
    private string $nombre = '';
    private string $apellidos = '';
    private string $correo = '';
    private string $direccion = '';
    private string $telefono = '';
    private string $fecha_nacimiento = '';

    public function __construct()
    {
        $this->conexion = new BaseDatos();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getFechaNacimiento(): string
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(string $fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function insert()
    {
        try {
            $this->stmt = $this->conexion->prepara("INSERT INTO contactos(id, nombre, apellidos, correo, direccion, telefono, fecha_nacimiento)
                values (:id, :nombre, :apellidos, :correo, :direccion, :telefono, :fecha_nacimiento)");
            $id = null;
            $nombre = $this->nombre;
            $apellidos = $this->apellidos;
            $correo = $this->correo;
            $direccion = $this->direccion;
            $telefono = $this->telefono;
            $fecha_nacimiento = $this->fecha_nacimiento;

            $this->stmt->bindValue(':id', $id);
            $this->stmt->bindValue(':nombre', $nombre);
            $this->stmt->bindValue(':apellidos', $apellidos);
            $this->stmt->bindValue(':correo', $correo);
            $this->stmt->bindValue(':direccion', $direccion);
            $this->stmt->bindValue(':telefono', $telefono);
            $this->stmt->bindValue(':fecha_nacimiento', $fecha_nacimiento);

            $this->stmt->execute();
            $result = $this->stmt->rowCount();
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        $this->stmt->closeCursor();
        $this->stmt = null;
        return $result;
    }
}
