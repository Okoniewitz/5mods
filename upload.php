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
            <h2 style="margin: 0 0 5 0;">Upload a new file</h2>
            <form method="get">
                <div id="mainLeft">
                <h4>File Name:</h4><br>
                <input type="text" name="nazwa"><br>
                <h4>Category:</h4><br>
                <select name="kategoria">
                    <option selected value="0" disabled>Select a category...</option>
                    <option value="1">Tools</option>
                    <option value="2">Vehicles</option>
                    <option value="3">Paint jobs</option>
                    <option value="4">Weapons</option>
                    <option value="5">Scripts</option>
                    <option value="6">Player</option>
                    <option value="7">Maps</option>
                    <option value="8">Misc</option>
                </select>
                <h4>Description:</h4><br>
                <textarea rows=19 style="width=100%" placeholder="Provide information and installation instructions if necessary..." name="opis"></textarea>
            </div>
            <div id="mainRight">
                <h4 style="margin: 0 0 -10 0">Add screenshots</h4><br>
                <input type="button" value="wybierz pliki">
            </div>
            <div id="mainRight">
            <h4 style="margin: 0 0 -10 0">Add files</h4><br>
            <input type="button" value="wybierz pliki">
            </div>
            <div id="mainRight" style="background-color: #f9f9f9">
                Please ensure you uploaded an in-game image or representative art of your mod.
                Please ensure the following is in your description:
                    <ul>
                        <li>Mod description</li>
                        <li>Bugs and features</li>
                        <li>Summary of installation instructions</li>
                        <li>Credits and, if applicable, notices of permission for content re-use</li>
                    </ul>
                Failing to provide the necessary details will result in your mod being rejected.
                You can upload your mod files on the next page.
            </div>
            <a href="index.php"><input id="UploadButton2" type="button" value="Cancel" name="submit"></a>
                <input style="float: left;" id="UploadButton" type="submit" value="Submit" name="submit">
            </form>
            <br>
            <h3 style="clear: both; padding: 30 0 0 0; margin: 0 0 -5 0;">Upload rules</h3>
            <div id="MainBottom">
                DO NOT upload any of the following items - breaking these rules will cause your file to be deleted without notice:
                <ul>
                    <li>Any files besides .zip, .rar, .7z and .oiv archives</li>
                    <li>Any file you don't have permission to upload, including part of other mods or mod packs</li>
                    <li>Any archive containing only original game files</li>
                    <li>Any file that can be used for cheating online</li>
                    <li>Any file containing or giving access to pirated or otherwise copyrighted content including game cracks, movies, television shows and music</li>
                    <li>Any file containing a virus or malware or any EXE file with a positive anti-virus result</li>
                    <li>Any file containing nude or semi-nude pornographic images</li>
                    <li>Any file depicting a political figure or ideology that is, at the complete discretion of the administrator, deemed to be something that will cause unnecessary debates in the comments section</li>
                    <li>Any file that does not contain Single Player-installable content, with an exception for tools</li>
                    <li>For a full list of our rules and regulations please see: Rules and Regulations</li>
                </ul>            
            </div>
            <?php
            if(isset($_GET["submit"]))
            {
            if($id==0) header("Location:https://jwegrzyn.pl/5mods/index.php");
            $connect = mysqli_connect("localhost","mods","password","5mods");
            $nazwa= $_GET["nazwa"];
            $opis = $_GET["opis"];
            $kategoria= $_GET["kategoria"];
            $query = "INSERT INTO `mody` (`nazwa`, `kategoria`, `opis`, `zdjecie`, `plik`, `uzytkownik_id`, `pobran`, `polubien`) VALUES (\"$nazwa\", \"$kategoria\", \"$opis\", 'mod1.jpg', NULL, $id, 0, 0)";
            $response= mysqli_query($connect, $query);
            mysqli_close($connect);
            if($id==0) header("Location:https://jwegrzyn.pl/5mods/index.php");
            }
            ?>
        </div>
    </body>
</html>