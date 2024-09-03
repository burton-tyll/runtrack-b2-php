<?php  

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'lp_official';

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    function findAllStudents($bdd): array{
        $query = 'SELECT * FROM student';
        $stmt = $bdd->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    var_dump(findAllStudents($bdd));

?>