<?php
	include('../../config.php');
	if(isset($_POST['access']))
	{
		if(isset($_POST['code']) AND !empty($_POST['code']))
		{
			$accesscode = htmlspecialchars($_POST['code']);
			header('Location:'.$accesscode.'/');
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>EasySand - Code de sécurité</title>
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
			<h3>Code de sécurité :</h3>
			<form method="post">
			<input type="password" name="code" placeholder="Entrez le code d'accès">
			<input type="submit" name="access" value="Accéder">
			</form>
			<br><br><br>
        </center>
    </div>
    <center><i><font size="2rem">Code source : <a target="_blank" href="https://github.com/enzodjab/">https://github.com/enzodjab/</a></font></i></center>
</body>
</html>