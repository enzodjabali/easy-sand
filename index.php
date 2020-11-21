<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>EasySand - Uploadez vos fichiers</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	if($theme === "classic"){
		$favicon = '<link rel="icon" type="image/png" href="assets/images/classic-favicon.png">';
		$css = '<link rel="stylesheet" type="text/css" href="assets/css/classic.css">';
	}
	if($theme === "dark"){
		$favicon = '<link rel="icon" type="image/png" href="assets/images/dark-favicon.png">';
		$css = '<link rel="stylesheet" type="text/css" href="assets/css/dark.css">';
	}
	echo $favicon;
	echo $css;
	?>
</head>
<body>
	<div class="main-content" id="main-content">
		<center>
			<form method="post" action='' enctype="multipart/form-data">
				<br><br>
				<?php
				if($theme === "classic"){
					$logo = '<img src="assets/images/classic-logo.png" width="100px">';
					echo $logo;
				}
				if($theme === "dark"){
					$logo = '<img src="assets/images/dark-logo.png" width="100px">';
					echo $logo;
				}
				?> 
				<h1>EasySand</h1><br>
				<label for="file">Séléctionner des fichiers</label><br>
			    <input  type="file" name="file[]" id="file" multiple>
			    <?php
			    if($mdp){
			    	echo '
			    	<br><br>
					<label for="codefile">Ajouter un code</label><br>
					<input type="password" name="codefile" id="codefile" placeholder="Code de sécurité (facultatif)">';
			    }
			    ?>
				<?php
				if($timelimit){
					echo '<br><br>
					<label for="time-select">Limite de temps</label><br>
					<select name="time-select" id="time-select">
						<option value="jour">Un jour</option>
						<option value="semaine">Une semaine</option>
						<option value="mois">Un mois</option>
					</select>';
				}
				?>
				<br><br>
				<input type="submit" name="submitsend" value="Uploader">
			</form>
		</center>
		<script type="text/javascript">
			function masquer_montrer(){
			document.getElementById("main-content").style.display="none";
		}
		</script>
		<br>
	</div>
<?php
if(isset($_POST['submitsend'])){

 	$countfiles = count($_FILES['file']['name']);

 	function genererChaineAleatoire($longueur = 10){
		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($longueur/strlen($x)) )),1,$longueur);
	}
	$randomlink = genererChaineAleatoire();

	function genSupp($longueurSupp = 5){
		return substr(str_shuffle(str_repeat($xSupp='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($longueurSupp/strlen($xSupp)) )),1,$longueurSupp);
	}
	$randomlinkSupp = genSupp();

 	for($i=0;$i<$countfiles;$i++){
 		$filename = $_FILES['file']['name'][$i];

		if(isset($_POST['codefile']) AND !empty($_POST['codefile'])){
			$codefile = htmlspecialchars($_POST['codefile']);

			shell_exec('mkdir uploads/'.$randomlink. '&& mkdir uploads/'.$randomlink.'/'.$codefile.'/ && mkdir uploads/'.$randomlink.'/'.$codefile.'/fichiers/ && cp libs/code.php uploads/'.$randomlink.'/ && mv uploads/'.$randomlink.'/code.php uploads/'.$randomlink.'/index.php && cp libs/list-code.php uploads/'.$randomlink.'/'.$codefile.'/ && mv uploads/'.$randomlink.'/'.$codefile.'/list-code.php uploads/'.$randomlink.'/'.$codefile.'/index.php && cp libs/code-supp.php uploads/'.$randomlink.'/ && mv uploads/'.$randomlink.'/code-supp.php uploads/'.$randomlink.'/'.$randomlinkSupp.'.php');

	        move_uploaded_file($_FILES["file"]["tmp_name"][$i], 'uploads/'.$randomlink.'/'.$codefile.'/fichiers/' . $filename);

        	echo '<script type="text/javascript">masquer_montrer()</script>';
        	$LinkTelechCode = $domaine.'uploads/'.$randomlink.'/';
        	$LinkSuppCode = $domaine.'uploads/'.$randomlink.'/'.$randomlinkSupp.'.php';
        	$resultcode = '<div class="main-content">
				<center>
				<form method="post" enctype="multipart/form-data">
					<br><br>
					<h1>EasySand</h1>
					'.$logo.'
					<h3>Fichiers chargés avec succès !</h3><br>
					<b>Lien de téléchargement : <input type="button" value="Copier" class="js-copy" data-target="#tocopy"></b><br>
					<font size="2rem"><a target="_blank" href="'.$LinkTelechCode.'" style="text-decoration:none"><i><span id="tocopy">'.$LinkTelechCode.'</span></i></a></font><br><br>
					<b>Lien de suppression : <input type="button" value="Copier" class="js-copy2" data-target="#tocopy2"></b><br>
					<font size="2rem"><a target="_blank" href="'.$LinkSuppCode.'" style="text-decoration:none"><i><span id="tocopy2">'.$LinkSuppCode.'</span></i></a></font>
			</center>
			<br><br>
			</div>';
		}else{
		shell_exec('mkdir uploads/'.$randomlink. '&& mkdir uploads/'.$randomlink.'/fichiers && cp libs/list.php uploads/'.$randomlink. '&& mv uploads/'.$randomlink.'/list.php uploads/'.$randomlink.'/index.php && cp libs/supp.php uploads/'.$randomlink.'/ && mv uploads/'.$randomlink.'/supp.php uploads/'.$randomlink.'/'.$randomlinkSupp.'.php');

        move_uploaded_file($_FILES["file"]["tmp_name"][$i], 'uploads/'.$randomlink.'/fichiers/' .$filename);
    	echo '<script type="text/javascript">masquer_montrer()</script>';

    	$LinkTelech = $domaine.'uploads/'.$randomlink.'/';
    	$LinkSupp = $domaine.'uploads/'.$randomlink.'/'.$randomlinkSupp.'.php';
    	$result = '<div class="main-content">
				<center>
				<form method="post" enctype="multipart/form-data">
					<br><br>
					'.$logo.'
					<h1>EasySand</h1>
					<h3>Fichiers chargés avec succès !</h3><br>
					<b>Lien de téléchargement : <input type="button" value="Copier" class="js-copy" data-target="#tocopy"></b><br>
					<font size="2rem"><a target="_blank" href="'.$LinkTelech.'" style="text-decoration:none"><i><span id="tocopy">'.$LinkTelech.'</span></i></a></font><br><br>
					<b>Lien de suppression : <input type="button" value="Copier" class="js-copy2" data-target="#tocopy2"></b><br>
					<font size="2rem"><a target="_blank" href="'.$LinkSupp.'" style="text-decoration:none"><i><span id="tocopy2">'.$LinkSupp.'</span></i></a></font>
			</center>
			<br><br>
			</div>';
		}
	}
	if($timelimit){
		if($_POST['time-select'] === "jour"){
			shell_exec('cp libs/jour.sh uploads/'.$randomlink.' && screen -S "EasySand-jour-'.$randomlink.'" -dm bash -c "cd uploads/'.$randomlink.'/; sh jour.sh"');
		}
		if($_POST['time-select'] === "semaine"){
			shell_exec('cp libs/semaine.sh uploads/'.$randomlink.' && screen -S "EasySand-semaine-'.$randomlink.'" -dm bash -c "cd uploads/'.$randomlink.'/; sh semaine.sh"');
		}
		if($_POST['time-select'] === "mois"){
			shell_exec('cp libs/mois.sh uploads/'.$randomlink.' && screen -S "EasySand-mois-'.$randomlink.'" -dm bash -c "cd uploads/'.$randomlink.'/; sh mois.sh"');
		}
	}
	if(isset($result)){
		echo $result;
	}
	if(isset($resultcode)){
		echo $resultcode;
	}
}
?>
<center><i><font size="2rem">Code source : <a target="_blank" href="https://github.com/enzodjab/">https://github.com/enzodjab/</a></font></i></center>
</body>
<script type="text/javascript" src="assets/js/copy.js"></script>
</html>