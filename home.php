<?php  
    session_start();
    if(!isset($_SESSION["username"])){
        echo "You are logout";
        header("Location: ". "login.php");
    }
?>

<h3>Hello, <?php echo $_SESSION["username"];?></h3>
<a href="logout.php">Logout</a>