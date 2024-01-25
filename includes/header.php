<div id="header">
        <script>
            var enabledSearch=false;
            var enabledProfile=false;

            function pokaSearch()
            {
                if(!enabledSearch)
                {
                    enabledSearch=true;
                document.getElementById("headerSearch").style.display="block";
                document.getElementById("searchInput").focus();
                if(enabledProfile)
                {
                    enabledProfile=false;
                    document.getElementById("headerProfile").style.display="none";
                }
                } else 
                {
                    enabledSearch=false;
                document.getElementById("headerSearch").style.display="none";
                }
            }
            function pokaProfil()
            {
                if(!enabledProfile)
                {
                    enabledProfile=true;
                document.getElementById("headerProfile").style.display="block";
                if(enabledSearch)
                {
                    enabledSearch=false;
                document.getElementById("headerSearch").style.display="none";
                }
                } else 
                {
                    enabledProfile=false;
                document.getElementById("headerProfile").style.display="none";
                }
            }
            </script>
        <div id="header1">
            <a href="index.php"><div id="headerItemL" style="padding: 0; margin:5 5;"><img width="90" height="40" src="images/logo.png"></div></a>
        </div>
        <div id="header2">
        <div id="headerItem" onclick="pokaSearch()" onfocusout="lostFocus()" style="line-height: 150%"><br><i class="fas fa-search"></i></div>

            <?php
            if(!isset($_COOKIE['login']))
            {
                $admin=0;
                echo "
            <a href=\".\\register.php\"><div id=\"headerItem\"><i class=\"fas fa-user-plus\"></i> Register</div></a>
            <a href=\".\\login.php\"><div id=\"headerItem\"><i class=\"fas fa-sign-in-alt\"></i> Login</div></a>
            ";
            }
            else {
                setcookie("login",$_COOKIE['login'],time()+60*60);
                $connect = mysqli_connect("localhost","mods","password","5mods");
                $query = "select login, avatar, admin, id from uzytkownicy where login=\"".$_COOKIE['login']."\"";
                $response = mysqli_query($connect,$query);
                global $login;
                global $id;
                $zdjecie="";
                global $admin;
                while($row=mysqli_fetch_array($response))
                {
                    $login=$row[0];
                    $zdjecie=$row[1];
                    if($zdjecie==null) $zdjecie = "users/0.jpg";
                    $admin=$row[2];
                    $id=$row[3];
                }
                if($admin==1)
                {
                    if(isset($_GET['rmid']))
                    {
                        $rmid = $_GET['rmid'];
                        mysqli_query($connect, "delete from mody where id = $rmid");
                    }
                }
                mysqli_close($connect);
                echo "
                <div onclick=\"pokaProfil()\" id=\"headerItem\"";if($admin==1)echo"style=\"color: red;\"";echo">
                <div id=\"headerNick\"><b>".$login." <i class=\"fas fa-caret-down\"></i></b></div>
                <img id=\"headerAvatar\" src=\"$zdjecie\">
                </div>
                <a href=\".\\upload.php\"><div id=\"headerItem\"><i class=\"fas fa-upload\"></i> Upload</div></a>";}
                ?>
                <div style="display: none;" id="headerSearch">
                    <form method="get" action="search.php">
                        <div id="searchBar">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" autocomplete="off" placeholder="Search GTA 5 mods..." name="q">
                        </div>
                            <input type="submit" id="searchButton" value="Search">
                    </form>
                </div>
                <div style="display: none;" id="headerProfile">
                <div id="headerProfileButton"><i class="fas fa-user-alt"></i> My Profile</div>
                <div id="headerProfileButton"><i class="fas fa-upload"></i> My Uploads</div>
                <div id="headerProfileButton"><i class="fas fa-thumbs-up"></i> My Liked Files</div>
                <div id="headerProfileButton"><i class="fas fa-cog"></i> Account Settings</div>
                <hr>
                <a href=".\logout.php"><div id="headerProfileButton"><i class="fas fa-sign-out-alt"></i> Log Out</div></a>
                </div>
        </div>
        </div>