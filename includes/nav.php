
<?php
if(isset($mainPage))
echo "<div id=\"menu\">"; else 
echo "<div style=\"height: 235; line-height: 125%;\" id=\"menu\">";
?>
            <br><br><br><br>
            <?php
            if(isset($mainPage))
            {
                echo "
            <h1>Welcome to GTA5-Mods.com</h1>
            <h4>Select one of the following categories</h4>
            "; 
            }else echo "<br><br>";
            $catid=0;
            $idmod = 0;
            if(isset($_GET['catid']))
            $catid=$_GET['catid'];
            if(isset($_GET['id']))
            {
            $idmod = $_GET['id'];
            $connect = mysqli_connect("localhost","mods","password","5mods");
            $query = "select kategoria from mody where id=$idmod";
            $response = mysqli_query($connect,$query);
            while($row = mysqli_fetch_array($response))
            {
                $catid=$row[0];
            }
            mysqli_close($connect);
            }
            echo "
            <a href=\"category.php?catid=1\"><div id=\"menuItem\">
                <div "; if($catid==1) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo "></div>
                <div "; if($catid==1) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Tools</div>
            </div></a>
            <a href=\"category.php?catid=2\"><div id=\"menuItem\">
                <div "; if($catid==2) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -130px;\"></div>
                <div "; if($catid==2) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Vehicles</div>
            </div></a>
            <a href=\"category.php?catid=3\"><div id=\"menuItem\">
                <div "; if($catid==3) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -900px;\"></div>
                <div "; if($catid==3) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Paint Jobs</div>
            </div></a>
            <a href=\"category.php?catid=4\"><div id=\"menuItem\">
                <div "; if($catid==4) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -260px;\"></div>
                <div "; if($catid==4) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Weapons</div>
            </div></a>
            <a href=\"category.php?catid=5\"><div id=\"menuItem\">
                <div "; if($catid==5) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -390px;\"></div>
                <div "; if($catid==5) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Scripts</div>
            </div></a>
            <a href=\"category.php?catid=6\"><div id=\"menuItem\">
                <div "; if($catid==6) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -520px;\"></div>
                <div "; if($catid==6) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Player</div>
            </div></a>
            <a href=\"category.php?catid=7\"><div id=\"menuItem\">
                <div "; if($catid==7) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -650px;\"></div>
                <div "; if($catid==7) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Maps</div>
            </div></a>
            <a href=\"category.php?catid=8\"><div id=\"menuItem\">
                <div "; if($catid==8) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -780px;\"></div>
                <div "; if($catid==8) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Misc</div>
            </div></a>
            <a href=\"forums.php\"><div id=\"menuItem\">
                <div "; if($catid==9) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -1040px;\"></div>
                <div "; if($catid==9) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">Forums</div>
            </div></a>
            <a href=\"wtf.php\"><div id=\"menuItem\">
                <div "; if($catid==10) echo "id=\"menuTopChosen\""; else echo "id=\"menuTop\""; echo " style=\"background-position-y: -1170px;\"></div>
                <div "; if($catid==10) echo "id=\"menuDown2\""; else echo "id=\"menuDown\""; echo ">More</div>
            </div></a>
            ";
            ?>
        </div>