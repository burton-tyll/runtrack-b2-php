<?php

require_once ('Database.php');
require_once ('class/Student.php');

Class Functions extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    public function findOneStudent(int $id): Student{
        $query = "SELECT * FROM student WHERE id = :id";
        $bdd = $this->getConnection();
        $stmt = $bdd->prepare($query);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $student = new Student($data['id'], $data['grade_id'], $data['email'], $data['fullname'], $data['birthdate'], $data['gender']);

        return $student;
    }

    public function findOneGrade(int $id): Grade{
        $query = "SELECT * FROM grade WHERE id = :id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $grade = new Grade($data['id'], $data['room_id'], $data['name'], $data['year']);

        return $grade;
    }

    public function findOneFloor(int $id): Floor{
        $query = "SELECT * FROM floor WHERE id = :id";
        $bdd = $this->getConnection();
        $stmt = $bdd->prepare($query);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $floor = new Floor($data['id'], $data['name'], $data['level']);

        return $floor;
    }

    public function findOneRoom(int $id): Room{
        $query = "SELECT * FROM room WHERE id = :id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $room = new Room($data['id'], $data['floor_id'], $data['name'], $data['capacity']);

        return $room;
    }
}
