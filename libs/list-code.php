<?php include('../../../config.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <title>EasySand - Contenu du lien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if($theme === "classic"){
        $favicon = '<link rel="icon" type="image/png" href="../../../assets/images/classic-favicon.png">';
        $css = '<link rel="stylesheet" type="text/css" href="../../../assets/css/classic.css">';
        $logo = '<img src="../../../assets/images/classic-logo.png" width="100px">';
    }
    if($theme === "dark"){
        $favicon = '<link rel="icon" type="image/png" href="../../../assets/images/dark-favicon.png">';
        $css = '<link rel="stylesheet" type="text/css" href="../../../assets/css/dark.css">';
        $logo = '<img src="../../../assets/images/dark-logo.png" width="100px">';
    }
    echo $favicon;
    echo $css;
    ?>
</head>
<body>
    <div class="main-content" id="main-content">
        <center>
            <br><br>
                <?= $logo ?>
                <h1>EasySand</h1>
                <h3>Contenu du lien :</h3>
            <?php
            	$liste_rep = scandir("fichiers/");
                $i = 2;
                $num = count($liste_rep);
                while($i < $num){
                echo "<br><a>$liste_rep[$i]</a><br>";
                echo '<a href="fichiers/'.$liste_rep[$i].'"><input type="submit" value="Télécharger"></a><br>';
                echo "_________________________<br>";
                $i++;
                }
            ?>
            <br><br>
        </center>
    </div>
    <center><i><font size="2rem">Code source : <a target="_blank" href="https://github.com/enzodjab/">https://github.com/enzodjab/</a></font></i></center>
</body>
</html>