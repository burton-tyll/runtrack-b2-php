<?php

require_once('class/Student.php');
require_once('class/Floor.php');
require_once('class/Room.php');
require_once('class/Grade.php');
require_once('Functions.php');

$functions = new Functions();

//$student = new Student(null,1, "burtontyll@gmail.com", "Burton TYLL", "2000-09-28", "male");
$student = new Student();

$student->setGrade(1);
$student->setEmail("burtontyll@gmail.com");
$student->setFullname("Burton TYLL");
$student->setBirthdate("2000-09-28");
$student->setGender("male");


//recupérer tous les étudiants d'une promo

$grade = $functions->findOneGrade(2);
$students = $grade->getStudents();
//var_dump($students)

//recupérer toutes les promos d'une salle
$room = $functions->findOneRoom(6);
$grades = $room->getGrades();
//var_dump($grades);


//Récupérer les salles d'un étage
$floor = $functions->findOneFloor(3);
$rooms = $floor->getRooms();
var_dump($rooms);
