<?php  

    function find_one_student($bdd, string $email): array{
        $query = 'SELECT * FROM student WHERE email = :email';
        $stmt = $bdd->prepare($query);
        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'lp_official';

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

   if(isset($_GET['input-email-student'])){
        $email = $_GET['input-email-student'];
        $student = find_one_student($bdd, $email);
   }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        input{
            padding: 5px;
        }

        table{
            border-collapse: collapse;
            width: 100%;
            margin-top: 50px;
        }
        td, th{
            border: 2px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="input-email-student" placeholder="Entrez une adresse e-mail">
        <button type="submit">Click on me! Click me on!</button>
    </form>

    <?php if (isset($student)): ?>
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
                    echo '<tr>
                        <td>'.$student['grade_id'].'</td>
                        <td>'.$student['email'].'</td>
                        <td>'.$student['fullname'].'</td>
                        <td>'.$student['birthdate'].'</td>
                        <td>'.$student['gender'].'</td>
                    </tr>';
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <h1>L'étudiant demandé n'existe pas!</h1>
    <?php endif ?>
</body>
</html>