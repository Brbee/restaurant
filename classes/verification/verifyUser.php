<?php
    if(isset($_GET['vkey']))
    {
        $vkey = $_GET['vkey'];
        $dbConn = new PDO('mysql:host=localhost:3308;dbname=restaurant','root','root');
        $resultSet = $dbConn->prepare("SELECT * FROM users inner join verification on users.user_id = verification.user_id WHERE code = ?");
        if($resultSet->execute(array($vkey))) {
            echo $resultSet->rowCount();
            if($resultSet->rowCount() == 1) {
                $update = $dbConn->query("UPDATE verification SET verified = 1 WHERE code = '$vkey' LIMIT 1");
    
                if($update) {
                    header('Location:http://localhost/restaurant/pages/login.php?page=navbar&success=true');
                }
                else {
                    header('Location:http://localhost/restaurant/pages/login.php?page=navbar&success=false');
                }
            } else {
                header("Location:http://localhost/restaurant/pages/login.php?page=navbar&successSelect=false");
            }
        }
        else {
            print_r($resultSet->errorInfo());
        }
    }
    else {
        die('Something went wrong');
    }
?>