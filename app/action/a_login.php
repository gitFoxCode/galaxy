<?php 
include("../init.php");

if(isset($_POST['email'])){

	$CORE->Template->setData("input_email", $_POST['email']);
	$CORE->Template->setData("input_pass", $_POST['pass']);

	if($_POST['email'] == '' || $_POST['pass'] == ''){

		$_SESSION['login-error'] = "Uzupełnij wymagane pola!";
		$CORE->Template->redirect(SITE_PATH . 'login');

	}else if($CORE->Auth->validateLogin($CORE->Template->getData("input_email"),$CORE->Template->getData("input_pass")) == false){

		$_SESSION['login-error'] = "Niepawidłowy login lub hasło";
		$CORE->Template->redirect(SITE_PATH . 'login');

	}else{
		$CORE->Auth->setUserData($CORE->Template->getData("input_email"));
		$CORE->Template->redirect(SITE_PATH . 'list');
		//$CORE->Template->load(APP_PATH . "views/v_loginin.php");
	}

} else{
	$CORE->Template->redirect(SITE_PATH . 'login');
}

