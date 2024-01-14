<?php

namespace Models;

use PDOException;
use src\Lib\BaseDatos;

class ContactoExtend extends BaseDatos
{
    private mixed $stmt = null;

    public function __construct(
        private ?string $id = null,
        private string $nombre = '',
        private string $apellidos = '',
        private string $correo = '',
        private string $direccion = '',
        private string $telefono = '',
        private string $fecha_nacimiento = ''
    ) {
        parent::__construct(); // Llama al constructor de la clase padre (BaseDatos)
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


    public function insert(): int
    {
        try {
            $query = "INSERT INTO contactos(nombre, apellidos, correo, direccion, telefono, fecha_nacimiento)
                      VALUES (:nombre, :apellidos, :correo, :direccion, :telefono, :fecha_nacimiento)";

            $this->stmt = $this->prepara($query);

            $this->stmt->bindValue(':nombre', $this->nombre);
            $this->stmt->bindValue(':apellidos', $this->apellidos);
            $this->stmt->bindValue(':correo', $this->correo);
            $this->stmt->bindValue(':direccion', $this->direccion);
            $this->stmt->bindValue(':telefono', $this->telefono);
            $this->stmt->bindValue(':fecha_nacimiento', $this->fecha_nacimiento);

            $this->stmt->execute();
            $result = $this->stmt->rowCount();
        } catch (PDOException $e) {
            $result = 0; // O cualquier valor que desees en caso de error
            // Log del error o manejo adicional si es necesario
        } finally {
            if ($this->stmt !== null) {
                $this->stmt->closeCursor();
            }
        }

        return $result;
    }
}
