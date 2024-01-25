<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles\\styleLogin.css">
    <title>Gta5-mods.com</title>
</head>
<body>
    <h1>Register</h1>
    <form method="post">
        Username<br>
        <input type="text" name="login"><br>
        Password<br>
        <input type="password" name="password"><br>
        Confirm password<br>
        <input type="password" name="password2"><br>
        <input type="checkbox" name="tos"> I agree to TOS<br><br>
        <input id="submit" style="color: white;" name="submit" type="submit" value="Register">
    <?php
    if(isset($_POST['submit']))
    {
    $error=0;
    $login=$_POST['login'];
    $pass=$_POST['password'];
    $pass2=$_POST['password2'];
    $connect = mysqli_connect("localhost","mods","password","5mods");
    $ePass = sha1($pass);
    $query = "select login from uzytkownicy where login=\"$login\"";
    $response = mysqli_query($connect,$query);
    while($row = mysqli_fetch_array($response)) $error=4;
    if($pass!=$pass2) $error=3;
    if($login=="" || $pass==""|| $pass2=="") $error=2;
    if(!isset($_POST['tos'])) $error=1;

    $query = "INSERT INTO `uzytkownicy` (`login`, `haslo`, `avatar`) VALUES ('$login', '$ePass', \"users/0.jpg\")";
    if($error==0) { mysqli_query($connect,$query); setcookie("login",$login, time()+60*60);     Header("Location: https://jwegrzyn.pl/5mods/index.php");     }

    if($error==1)     echo "
    <div id=\"wrongPassword\">
    You must agree to ToS.
    </div>";
    if($error==2)     echo "
    <div id=\"wrongPassword\">
    You must fill all the fields.
    </div>";
    if($error==3)     echo "
    <div id=\"wrongPassword\">
    Passwords don't match.
    </div>";
    if($error==4)     echo "
    <div id=\"wrongPassword\">
    User already exists.
    </div>";

    mysqli_close($connect);
    }
    ?>
        </form>

    Forgot Password?<br><br>
    Don't have an account? Register here.
</body>
</html>