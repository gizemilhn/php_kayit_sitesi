<?php

include("connection.php");

if(isset($_POST["signup"]))
{
    /*FORMDA ALDIĞIMIZ VERİLERİ DEĞİŞKENLERE ATAMA*/
    $username=$_POST["username"];
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $email=$_POST["email"];
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

    /*BU DEĞİŞKENLERİ VERİTABANINDAKİ TABLOLARIMIZA EKLEME*/ 
    $add="INSERT INTO users(user_name, name, surname , email, password) VALUES('$username','$name','$surname','$email','$password')";
    $addrun=mysqli_query($connection,$add);
    if ($addrun) {
        echo '.<div class="alert alert-success" role="alert">
                Registration created successfully!
                </div>';
    }
    else
    {
       echo' <div class="alert alert-danger" role="alert">
             There was a problem in sign-up,Please check the information again.
            </div>';

    }
    mysqli_close($connection);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>ÜYE KAYIT FORMU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-5">
        <div class="card p-5 ">
        <form action="log_in.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username">
    
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surname</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="surname">
                
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
    
            <button type="submit"name="signup" class="btn btn-primary">SIGN UP</button>
             </form>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>