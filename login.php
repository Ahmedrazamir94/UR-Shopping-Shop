<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include 'link.php'; ?>
</head>
<body>
    <center>
       
        <br><br><br><br><br><br><br>
    <form method= "post" id= "login_form">
<br>
        <h1>
            Login
        </h1>
        <br>
        <label>Email:</label>
        <input type="text" name="email" id="login" placeholder= "Enter Your Email">
        <br><br>
        <label>Password:</label>
        <input type="password" name="pass" id="login" placeholder= "Enter Your Password">
        <br><br>
        <input type="submit" value="Login" name= "login_btn" id= "login_btn">
        <br>
        <span>if you don't have any account so,<a href="registration form.php">click here</a></span>


    </form>
    </center>

    <?php

    include 'connection.php';

    if(isset($_POST["login_btn"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $query = "select * from sign_up where email='$email' && password='$pass'";

        $final = mysqli_query($con,$query);

        $rows = mysqli_num_rows($final);  

        while($data = mysqli_fetch_assoc($final)) {
            
                $role = $data["role"];
    
        if($rows>=1 && $role=="user") {
            header('location: user.php?email=' . $data["email"]); 
        }
        elseif($rows>= 1 && $role=="admin") {
            header("location:admin.php");
        }
        // ENF OF WHILE }
    } 
// ENF OF WHILE }
        if($data)
        {
                echo "successfully<br><br>";
        }
        else {
            echo "<center><alert>Invalid Password</alert></center>";

        }
    }

?>

</body>
</html>