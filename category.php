<html>
    <head>
        <title>
            GT5-Mods.com - Your GTA 5 Mods source
        </title>
        <script src="https://kit.fontawesome.com/f65f31974b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles\\style.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include 'includes/header.php';
        include 'includes/nav.php';
        ?>
        <div id="main">
            <?php
            $catid = $_GET['catid'];
            $connect = mysqli_connect("localhost","mods","password","5mods");
            $query = "select zdjecie, pobran, polubien, nazwa, uzytkownicy.login, mody.id from mody join uzytkownicy on uzytkownik_id=uzytkownicy.id where kategoria=$catid order by mody.id desc";
            $response = mysqli_query($connect,$query);
            $wykonano=false;
            while($row = mysqli_fetch_array($response))
            {
                $wykonano=true;
                if($admin==0)
            echo "
            <a href=\"mod.php?id=$row[5]\"><div id=\"mainItem\">
                <div id=\"mainPhoto\">
                    <img width=310 height=175 src=\"mods/$row[0]\">
                    <div id=\"mainInfo\"><i class=\"fas fa-download\"></i> $row[1] <i class=\"fas fa-thumbs-up\"></i> $row[2]</div> 
                </div></a>
                <div id=\"mainText\">
                    <div id=\"title\">$row[3]</div>
                    <div id=\"autor\">By $row[4]</div>
                </div>
            </div>
            ";
            else 
            echo "
            <a href=\"mod.php?id=$row[5]\"><div id=\"mainItem\">
                <div id=\"mainPhoto\">
                    <img width=310 height=175 src=\"mods/$row[0]\">
                    <div id=\"mainInfo\"><i class=\"fas fa-download\"></i> $row[1] <i class=\"fas fa-thumbs-up\"></i> $row[2]<a href=\"http://localhost/5mods/index.php?rmid=$row[5]\"> <i class=\"fas fa-trash\"></i></a></div> 
                    </div></a>
                <div id=\"mainText\">
                    <div id=\"title\">$row[3]</div>
                    <div id=\"autor\">By $row[4]</div>
                </div>
            </div>
            ";

            }
            if(!$wykonano) 
            {
                echo "
                <b>No files found!</b>
                ";
            }
            mysqli_close($connect);
            ?>
            </div>
    </body>
</html>