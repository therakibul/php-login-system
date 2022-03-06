<?php 
    require "db-connection.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>

<body class="bg-info mt-2">
    <div class="container ">
        <div class="wrapper w-50 mx-auto d-flex flex-column">
            <h3 class="text-center">Create Account</h3>
            <p class="text-center">Get started with your free account</p>
            <?php  
                if(isset($_POST["submit"])){
                    $username = mysqli_real_escape_string($connection, $_POST["name"]);
                    $email = mysqli_real_escape_string($connection, $_POST["email"]);
                    $mobile = mysqli_real_escape_string($connection, $_POST["mobile"]);
                    $password = mysqli_real_escape_string($connection, $_POST["password"]);
                    $cpassword = mysqli_real_escape_string($connection, $_POST["cpassword"]);

                    $pass = password_hash($password, PASSWORD_BCRYPT);
                    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

                    $email_query = "SELECT * FROM registation WHERE email = '{$email}'";
                    $email_query_exe = mysqli_query($connection, $email_query);
                    $email_count = mysqli_num_rows($email_query_exe);
                    if($email_count > 0){
                        echo "Email already exists";
                    }else{
                        if($password === $cpassword){
                            $insert_query = "INSERT INTO registation (name, email, mobile, password, cpassword)";
                            $insert_query .= "VALUES ('{$username}', '{$email}', '{$mobile}', '{$pass}', '{$cpass}')";
                            $query = mysqli_query($connection, $insert_query);
                            if($query){
                                ?>
            <script>
            alert("Insert successful");
            </script>
            <?php
                            }else{
                                ?>
            <script>
            alert("Cant't insert");
            </script>
            <?php
                            }
                        }else{
                            echo "Password not match";
                        }
                    }
                }
            
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Create password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Create password" required>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Repeat password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword"
                        placeholder="Repeat password" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-success" name="submit" value="Sign Up">
                </div>

                <a class="btn btn-success  d-block" href="login.php">Login</a>
            </form>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>