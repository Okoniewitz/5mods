<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles\\styleLogin.css">
    <title>Gta5-mods.com</title>
</head>
<body>
    <h1>Log In</h1>
    <form method="post">
        Username<br>
        <input type="text" name="login"><br>
        Password<br>
        <input type="password" name="password"><br><br>
        <input id="submit" style="color: white;" name="submit" type="submit" value="Log In">
    <?php
    if(isset($_POST['submit']))
    {
    $wykonano=false;
    $login=$_POST['login'];
    $pass=$_POST['password'];
    $connect = mysqli_connect("localhost","mods","password","5mods");
    $ePass = sha1($pass);
    $query = "select login, haslo from uzytkownicy where login=\"$login\"";
    $response = mysqli_query($connect,$query);
    while($row = mysqli_fetch_array($response))
    {
        $wykonano=true;
        if($row[1]==$ePass)
        {
        setcookie("login",$login, time()+60*60);
        header("Location:http://localhost/5mods/index.php");
        }
        else {
            echo "
            <div id=\"wrongPassword\">
            Wrong password, try again
            </div>
            ";
        }
    }
    if(!$wykonano)
    echo "
    <div id=\"wrongPassword\">
    Wrong login, try again
    </div>
    ";    mysqli_close($connect);
    }
    ?>
        </form>

    Forgot Password?<br><br>
    Don't have an account? Register here.
</body>
</html>