<?php 
include("../init.php");

if(isset($_POST['email'])){
	$CORE->Template->setData("input_email", $_POST['email']);
	$CORE->Template->setData("input_pass", $_POST['pass']);
	$CORE->Template->setData("input_repass", $_POST['repass']);
	if($_POST['email'] == '' || $_POST['pass'] == ''|| $_POST['repass'] == ''){
		$_SESSION['login-error'] = "Uzupełnij wymagane pola!";
		$CORE->Template->redirect(SITE_PATH . 'register');
	}else{
		if($_POST['pass'] !== $_POST['repass']){
			$_SESSION['login-error'] = "Podane hasła są różne!";
			$CORE->Template->redirect(SITE_PATH . 'register');
		} else if($CORE->Auth->validateRegister($CORE->Template->getData("input_email"),$CORE->Template->getData("input_pass")) == true){


			$_SESSION['login-error'] = $CORE->Auth->validateRegister($CORE->Template->getData("input_email"),$CORE->Template->getData("input_pass"));
			$CORE->Template->redirect(SITE_PATH . 'register');

		} else{
			$CORE->Auth->setUserData($CORE->Template->getData("input_email"));
			$CORE->Template->redirect(SITE_PATH . 'list');
		}
	}

}else{
	$CORE->Template->redirect(SITE_PATH . 'register');
}