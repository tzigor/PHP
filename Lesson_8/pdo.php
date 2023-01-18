<?php
$pdo = new PDO('sqlite:database.db');
// $query = 'CREATE TABLE students(
//     id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,

//     name VARCHAR(100) NOT NULL
// )';

// $statement = $pdo->query($query);
// var_dump($statement);

// $studentName = "Иванов Иван";
// $statement = $pdo->prepare("INSERT INTO `students` (`name`) VALUES (?)");
// $result = $statement->execute([$studentName]);

// $statement = $pdo->prepare('SELECT * FROM `students` WHERE `id` = ?');
// $statement->execute([1]);
$statement = $pdo->prepare('SELECT * FROM `students`');
$statement->execute();
$studentData = $statement->fetchall(PDO::FETCH_ASSOC); // Устанавливаем режим
print_r($studentData);
