<?php





	//$page = isset($_GET['page']) ? $_GET['page'] : "index";
	if($_SERVER['REQUEST_URI']=='/galaktykabajek/'){
		header('location: index');
	}

	include('app/init.php');


if(isset($_SESSION['until']) && $_SESSION['until']){
	$ex = strtotime($_SESSION['until']);
	$today = strtotime("now");
	if($today >= $ex){
	   // echo "expired";
	} else {
	   // echo "active";
	}
}

	$page = $CORE->Template->getPage();
	$nowPage = $page[1];


	if($nowPage == 'adminpanel'){
			include('app/adminpanel/views/v_index.php');
			return;
		}



	if($nowPage == "index" && $CORE->Auth->checkLoginStatus() && $_SESSION['rank']>=1) $nowPage = 'main';



	 ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
	<link rel="stylesheet" type="text/css" href="http://localhost/galaktykabajek/app/res/css/reset.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/galaktykabajek/app/res/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/galaktykabajek/app/res/css/index.css">
	<?php if($nowPage=='main') echo '<link rel="stylesheet" type="text/css" href="http://localhost/galaktykabajek/app/res/css/logged.css">'; ?>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900|PT+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700,900" rel="stylesheet">
	<title>GalaktykaBajek - Zbiór wielu bajek specialnie dla Ciebie!</title>

	<?php //$FOX->head(); ?>
</head>
<body>
	<?php
	//echo "URI: " . $_SERVER['REQUEST_URI'];
	//echo '<br>';
	//$essa = explode('/', trim($_SERVER['REQUEST_URI'], '/')) ;
	//echo "URI ARR: "; print_r($essa); echo "<Br>";
	//echo "GET: "; print_r($_GET); ?>

	<?php //$FOX->toolbar(); ?>
<!--
<div class="modal-box">
	<button type="button" class="modal-close">&times;</button>
	<div class="modal-title">Witaj przybyszu!</div>
	<div class="modal-logo-box">
		<img src="app/res/icons/logo.png" alt="GalaktykaBajek" class="modal-logo">
		<h1 class="nav-logotype">
			<span class="logotype-line">Galaktyka</span>Bajek
		</h1>
	</div>
	<div class="modal-content">
		Dołącz już dzisiaj do naszej społeczności! Kup konto na GALAKTYKABAJEK i ciesz się wszystkimi odcinkami znanych bajek i kreskówek po polsku! Tysiące różnorakich kreskówek, wszystkie sezony w jednym miejscu! Miliony odcinków na wyciągnięcie ręki! GalaktykaBajek to prawdziwa galaktyka przeróżnych światów!<br>
		Sprawdz <a href="#" id="checkOffert">naszą ofertę</a>!
	</div>
	<div class="modal-btns">
		<button type="button" class="modal-btn green-primary">Dołącz już dzisiaj!</button>
	</div>
</div>
-->

<div id="wrapper">
<?php include("app/views/v_nav.php"); ?>

<?php 
	if(strpos($nowPage, '?') !== false){
		$nowPage = substr($nowPage, 0, strpos($nowPage, "?"));
	}
	//$file = APP_VIEWS.'v_'. $nowPage . '.php';
	$file = 'app/views/v_'. $nowPage . '.php';
	//echo "Problem: " . $nowPage . " < > ";

	if( file_exists($file) ){
		if(isset($page[2]) && $nowPage == 'watch'){
			$_GET['watch'] = $page[2];
			if(isset($page[3])){
				$_GET['play'] = $page[3];
			}
		}
		include('app/views/v_'. $nowPage . '.php');
	} else{
		include('app/views/v_404.php');
		echo $nowPage . " 404.<br>";
		echo $file ." not exist :p";
	}
	
?>

<br><br><br><br><br><br><br>
	<?php //include('app/views/v_footer.php'); ?>
	<?php $CORE->footer() ?>
</div>
<script src="<?= APP_RES ?>js/global.js"></script>
<script src="<?= APP_RES ?>js/index.js"></script>
</body>
</html>