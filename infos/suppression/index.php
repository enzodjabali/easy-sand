<?php
	include('../../config.php'); 
	if(isset($_POST['goback'])){
		header('Location:'.$domaine);
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
        $logo = '<img src="../../../assets/images/classic-logo.png" width="100px">';
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
			<h3>Ce lien a été supprimé</h3>
		    <br>
			<form method="post">
				<input type="submit" name="goback" value="Retour à EasySand">
			</form>
			<br><br>
        </center>
    </div>
    <center><i><font size="2rem">Code source : <a target="_blank" href="https://github.com/enzodjab/">https://github.com/enzodjab/</a></font></i></center>
</body>
</html>