<html>
    <head>
        <title>
            GT5-Mods.com - Your GTA 5 Mods source
        </title>
        <script src="https://kit.fontawesome.com/f65f31974b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles\\style.css">
        <link rel="stylesheet" href="styles\\styleMod.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        $id=0;
        include 'includes/header.php';
        include 'includes/nav.php';        
        $connect = mysqli_connect("localhost","mods","password","5mods");
        $modId= $_GET['id'];
        $query = "select nazwa, kategoria, opis, mody.zdjecie, plik, polubien, pobran, uzytkownik_id, login, avatar from mody join uzytkownicy on mody.uzytkownik_id = uzytkownicy.id where mody.id=$modId";
        $response = mysqli_query($connect, $query);
        $nazwa = "";
        $kategoria = 0;
        $opis = "";
        $zdj = "";
        $plik = "";
        $polubien= 0;
        $pobran = 0;
        $uzytkownikID = 0;
        $login = "";
        $avatar = "";
        $liked = 0;
        $likeId =0;
        $removeLike=null;
        if(isset($_GET['rml']))
        $removeLike = $_GET['rml'];
        while($row = mysqli_fetch_array($response))
        {
            $nazwa=$row[0];
            $kategoria = $row[1];
            $opis = $row[2];
            $zdj = $row[3];
            if($zdj==null) $zdj="mods/mod1.jpg";
            $plik = $row[4];
            $polubien= $row[5];
            $pobran = $row[6];
            $uzytkownikID = $row[7];
            $login = $row[8];
            $avatar= $row[9];
            if($avatar==null) $avatar="users/0.jpg";
        }
        $query = "select id from polubienia where uzytkownik_id = $id and mod_id=$modId";
        $response = mysqli_query($connect,$query);
        while($row=mysqli_fetch_array($response))
        {
            $likeId=$row[0];
            $liked=1;
        }
        if($removeLike==1 && $id!=0 && $liked==1)
        {
            $query = "delete from polubienia where uzytkownik_id = $id and mod_id=$modId";
            mysqli_query($connect,$query);
            $liked=0;
        }
        if($removeLike==2 && $id!=0 && $liked==0)
        {
            $query = "INSERT INTO `polubienia`(`uzytkownik_id`, `mod_id`) VALUES ('$id','$modId')";
            mysqli_query($connect,$query);
            $liked=1;
        }
        $query = "select count(mod_id) from polubienia where mod_id=$modId";
        $response = mysqli_query($connect,$query);
        while($row=mysqli_fetch_array($response))
        {
            $polubien = $row[0];
        }
        mysqli_query($connect, "UPDATE `mody` SET `polubien` = $polubien WHERE `mody`.`id` = $modId");
        mysqli_close($connect);
        if(isset($_POST['submit']))
        {
            $trescKom = $_POST['trescKom'];
            $connect = mysqli_connect("localhost","mods","password","5mods");
            $query1 = "select tresc from komentarze where uzytkownik_id=$id and mod_id=$modId order by id desc limit 1";
            $response = mysqli_query($connect,$query1);
            $lastUsersComment="";
            while($row = mysqli_fetch_array($response)) $lastUsersComment=$row[0];
            $query = "INSERT INTO `komentarze`(`uzytkownik_id`, `mod_id`, `czas`, `tresc`) VALUES ('$id','$modId','0','$trescKom')";
            if($lastUsersComment!=$trescKom && $trescKom!="")
            mysqli_query($connect,$query);
            mysqli_close($connect);
        }
        echo "

        <div id=\"MainMod\">
            <div id=\"NazwaModa\"> $nazwa</div>
            <a href=\"$plik\">
                <div id=\"PobierzModa\">
                    <i class=\"fas fa-download\"></i> Download
                </div>
            </a>"; 
            if($liked) {echo "<a href=\"?id=$modId&rml=1\"><div id=\"PolubModa2\">";} 
            else echo "<a href=\"?id=$modId&rml=2\"><div id=\"PolubModa\">"; 
            echo "<i class=\"far fa-thumbs-up\"></i>
            </div></a>
            <img src=\"mods/$zdj\" id=\"ZdjecieModa\">
            
            <div id=\"AutorModa\">
                <img src=\"$avatar\" id=\"ZdjAutorModa\">
                <div id=\"NazwaAutorModa\">$login</div>
            </div>
            <div id=\"OpisModa\">
                <center><h4>Mod Description:</h4></center>$opis
            </div>
            <div id=\"komentarze\">";
            $connect = mysqli_connect("localhost","mods","password","5mods");
            $query = "select avatar, login, tresc from komentarze join uzytkownicy on komentarze.uzytkownik_id=uzytkownicy.id where mod_id=$modId";
            $response = mysqli_query($connect,$query);
            mysqli_close($connect);
            while ($row = mysqli_fetch_array($response))
            {
                $picture = $row[0];
                if($picture==null)$picture="users/0.jpg";
                echo "
                <div id=\"komentarz\">
                    <div id=\"komentarzZdjecie\"><img id=\"komentarzZdjecie2\" src=\"$picture\"></div>
                    <div id=\"komentarzTekst\">
                        <div id=\"komentarzAutor\">$row[1]</div>
                        <div id=\"komentarzTresc\">$row[2]</div>
                    </div>
                </div>";
            }
            echo "
            <div id=\"komentarz\">
            <div id=\"komentarzZdjecie\"><img id=\"komentarzZdjecie2\" src=\"$zdjecie\"></div>
            <form method=\"post\" action=\"mod.php?id=$modId\">
            <textarea id=\"komentarzTekstDodaj\" rows=3 placeholder=\"Add your comment...\" name=\"trescKom\"></textarea>
            <input id=\"UploadButton\" style=\"margin: 1% 0% 0% 1%; width:150px;\" name=\"submit\" type=\"submit\" value=\"Post comment\">
            </form>
            <p style=\"clear:both; font-size: 80%; margin: 0% 0% 0% 7%; padding-top: 5px;\">By commenting you are agreeing to follow the GTA5-Mods.com community guidelines.</p>
            </div>
            </div>
            <div id=\"PolubieniaModa\">
            <i class=\"fas fa-cloud-download-alt\"></i>
            $pobran
            <i class=\"far fa-thumbs-up\"></i>
            $polubien
            </div>
            ";
            ?>
        </div>
    </body>
</html>