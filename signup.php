<!-- OOP -->


<?php
session_start();

include("connection.php");
include("functions.php");

class RegistrationHandler {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function handleRegistration() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                $user_id = random_num(20);
                $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
                mysqli_query($this->con, $query);
                header("Location: login.php");
                die;
            }
        }
    }
}

$registrationHandler = new RegistrationHandler($con);
$registrationHandler->handleRegistration();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<article class="box">

    <form method="post">
        <label>New User Name</label>
        <input type="text" name="user_name" placeholder="voornaam en achternaam"><br><br>

        <label>New Password</label>
        <input type="password" name="password" placeholder="wachtwoord"><br><br>

        <input class="submit__button" type="submit" value="SIGN UP"><br><br>

        <a href="login.php">Click to Login</a><br><br>
        <a class="return" href="index.php">Terug  naar de home pagina</a><br><br>
    </form>

    </article>
    
</body>
</html>