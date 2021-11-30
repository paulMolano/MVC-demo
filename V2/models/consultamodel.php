<?php
include_once 'models/alumno.php';

class ConsultaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query('SELECT * FROM ALUMNOS');
            while ($row = $query->fetch()) {
                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];

                array_push($items, $item);
            }
            return $items;
        } catch (Exception $e) {
            return [];
        }
    }

    public function getById($id)
    {
        $item = new Alumno();

        $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE matricula = :matricula");

        try {
            $query->execute(['matricula' => $id]);
            while ($row = $query->fetch()) {
                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
            }

            return $item;
        } catch (Exception $e) {
            return null;
        }
    }

    public function update($item)
    {
        //editar item en la db
        $query = $this->db->connect()->prepare('UPDATE alumnos SET nombre=:nombre, APELLIDO = :apellido WHERE matricula = :matricula');

        try {
            $query->execute(
                [
                    'matricula' => $item['matricula'],
                    'nombre' => $item['nombre'],
                    'apellido' => $item['apellido']
                ]
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE matricula = :matricula');

        try {
            $query->execute(
                [
                    'matricula' => $id,
                ]
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
