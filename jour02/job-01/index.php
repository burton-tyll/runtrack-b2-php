<?php  

    function find_all_students($bdd): array{
        $query = 'SELECT * FROM student';
        $stmt = $bdd->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'lp_official';

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        table{
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 2px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Grade</th>
            <th>Mail</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Genre</th>
        </thead>
        <tbody>
            <?php 
                $students = find_all_students($bdd); 
                foreach($students as $student){
                    echo '<tr>
                        <td>'.$student['grade_id'].'</td>
                        <td>'.$student['email'].'</td>
                        <td>'.$student['fullname'].'</td>
                        <td>'.$student['birthdate'].'</td>
                        <td>'.$student['gender'].'</td>
                    </tr>';
                };
            ?>
        </tbody>
    </table>
</body>
</html>