<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title-->
    <title>Login Page</title>
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="Icons/favicon.svg">
    <!--CSS File Link-->
    <link href="login.css" rel="stylesheet" type="text/css" />
    <!--LINK FONT 1-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <!--LINK FONT 2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <!--Buttons-->
  <button class="navbar"></button>
  <a href="rules.html"><button class="rule_box" id="zoom_in">Rules</button></a>
  <a href="who.html"><button class="who_box" id="zoom_in">Who we are</button></a>
  <a href="login.php"><button class="login_box" id="zoom_in">Login</button></a>
  <!--LOGO-->
  <a href="home.html"><img src="Icons/logo.png" alt="Logo" class="logo"></a>
  
  <!--Login DIV-->
  <div class="container">
    <h2 class="scritta">Login</h2>
    <form method="post" action="">
      <input type="email" name="email" placeholder="Email" autocomplete="off" required>
      <input type="password" name="password" placeholder="Password" autocomplete="off" required>
      <button type="submit" name="button">Login</button>
      <p>Non hai un account? <a href="#signin" id="signin-link">registrati quì</a></p>
    </form>
  </div>

  <div class="container" id="signin">
        <h2 class="scritta">Registrazione</h2>
        <form action="#" method="post">
            <input type="email" placeholder="Email Address" name="email" autocomplete="off" required>
            <input type="text" placeholder="Username" name="username" autocomplete="off" required>
            <input type="password" placeholder="Password" name="password" autocomplete="off" required>
            <input type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" required>
            <button type="submit" name="signin_btn">Registrati</button>
        </form>
    </div>


  <?php
        $conn = mysqli_connect("localhost", "root","","blackjack");

        if(isset($_POST['signin_btn'])){
            // now we access all input fields with name attribute
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            //now we store data into our table
            $sql = "INSERT INTO users (username, email, password, cpassword) VALUES('$username', '$email', '$password', '$cpassword')";
            $rs = mysqli_query($conn, $sql);
            
            // if query is successful
            if($rs){
              echo "user registered successfully";
            }
            // if query is failed 
            else {
              echo "user registration failed";
            }
        } else if(isset($_POST['button'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email = '$email' ";
            $rs = mysqli_query($conn, $sql);

            if($rs){
              echo "user login success";
            } else{
              echo "use login failed";
            }
        }
    ?>

    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#signin-link").click(function(){
                $("#signin").show();
                $("#signup").hide();
            });
        })
    </script> 
</body>
</html>
