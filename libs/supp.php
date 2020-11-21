<?php
	include('../../config.php');
	$liste_rep = scandir("fichiers/");
    $i = 2;
    $num = count($liste_rep);

    if(isset($_POST['validsupp']))
    {
    	$outputPWD = shell_exec('pwd');

    	shell_exec('rm -r '.$outputPWD);
    	header('Location:../../infos/suppression/');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>EasySand - Suppression du lien</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if($theme === "classic"){
        $favicon = '<link rel="icon" type="image/png" href="../../assets/images/classic-favicon.png">';
        $css = '<link rel="stylesheet" type="text/css" href="../../assets/css/classic.css">';
        $logo = '<img src="../../assets/images/classic-logo.png" width="100px">';
    }
    if($theme === "dark"){
        $favicon = '<link rel="icon" type="image/png" href="../../assets/images/dark-favicon.png">';
        $css = '<link rel="stylesheet" type="text/css" href="../../assets/css/dark.css">';
        $logo = '<img src="../../assets/images/dark-logo.png" width="100px">';
    }
    echo $favicon;
    echo $css;
    ?>
</head>
<body>
	<div class="main-content">
        <center>
            <br><br>
                <?= $logo ?>
                <h1>EasySand</h1>
			<h3>Vous êtes sur le point de supprimer :</h3>
			<?php
				while($i < $num){
			    echo "<a>$liste_rep[$i]</a><br>";
			    $i++;
			    }
		    ?>
		    <br>
			<form method="post">
				<input type="submit" name="validsupp" value="Supprimer">
			</form>
			<br><br>
        </center>
    </div>
    <center><i><font size="2rem">Code source : <a target="_blank" href="https://github.com/enzodjab/">https://github.com/enzodjab/</a></font></i></center>
</body>
</html>