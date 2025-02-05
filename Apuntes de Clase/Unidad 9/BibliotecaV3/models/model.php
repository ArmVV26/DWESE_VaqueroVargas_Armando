<?php

include_once "db.php";

// MODELO GENÉRICO

class Model {

  protected $table;    // Aquí guardaremos el nombre de la tabla a la que estamos accediendo
  protected $idColumn; // Aquí guardaremos el nombre de la columna que contiene el id (por defecto, "id")
  protected $db;       // Y aquí la capa de abstracción de datos

  public function __construct()  {
    $this->db = new Db();
  }

  public function getAll() {
    if ($this->table == "libros") {
      $resultado = $this->db->dataQuery(
        "SELECT * FROM libros
        INNER JOIN escriben ON libros.idLibro = escriben.idLibro
        INNER JOIN personas ON escriben.idPersona = personas.idPersona
        ORDER BY libros.titulo"
      );
      return $resultado;

    } else {
      $list = $this->db->dataQuery("SELECT * FROM ".$this->table);
      return $list;
    }
  }

  public function get($id) {
    $record = $this->db->dataQuery("SELECT * FROM ".$this->table." WHERE ".$this->idColumn."= $id");
    return $record;
  } 

  public function delete($id) {
    $result = $this->db->dataManipulation("DELETE FROM ".$this->table." WHERE ".$this->idColumn." = $id");
    return $result;
  }
}