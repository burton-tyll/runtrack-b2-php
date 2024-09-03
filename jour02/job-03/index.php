<?php  

    require_once('../bdd.php');
    $database = new Bdd();
    $bdd = $database->getConnection();

    function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId): void{
        global $bdd;
        $sql = 'INSERT INTO Student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :gradeId)';
        $stmt = $bdd->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':fullname' => $fullname,
            ':gender' => $gender,
            ':birthdate' => $birthdate->format('Y-m-d'), // Formate la date pour l'insertion SQL
            ':gradeId' => $gradeId
        ]);
    }


    if(isset($_POST['input-email']) && isset($_POST['input-fullname']) && isset($_POST['input-gender']) && isset($_POST['input-birthdate']) && isset($_POST['input-grade_id'])){
        $email = $_POST['input-email'];
        $fullname = $_POST['input-fullname'];
        $gender = $_POST['input-gender'];
        $birthdate = $_POST['input-birthdate'];
        $grade = $_POST['input-grade_id'];

        insert_student($email, $fullname, $gender, new DateTime($birthdate), $grade);
    }else{
        var_dump('erreur');die;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            width: 100%;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 40%;
            gap: 10px;
            margin: auto;
        }

        input, button{
            padding: 10px;
        }

        button{
            background-color: #8ef99c;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Veuillez entrer les informations du nouvel utilisateur!</h1>
    <form action="" method="POST" name="newUser">
        <input type="text" name="input-email" placeholder="Entrez un email">
        <input type="text" name="input-fullname" placeholder="Entrez un nom">
        <select name="input-gender" id="">
            <option value="" style="display: none">Sélectionnez un genre</option>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select>
        <input type="date" name="input-birthdate" placeholder="Entrez une date de naissance">
        <input type="number" name="input-grade_id" placeholder="Entrez un grade">
        <button type="submit">Créer</button>
    </form>
</body>
</html>