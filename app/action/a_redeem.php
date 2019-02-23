<?php
include("../init.php");
if(isset($_POST['submit'])){
	if(isset($_POST['code']) && $_POST['code'] != ''){
		$code = $_POST['code'];
		echo $code;
		$code = htmlentities($code,ENT_QUOTES);
		echo "Kod stworzony: " . $code;
		if($sql = $CORE->Database->prepare("SELECT * FROM codes WHERE code = '".$code."'")){
			$sql->execute();
			$results = $sql->get_result();
			if($results->num_rows > 0){
				$row = $results->fetch_assoc();
				if($row['active'] == 1){
					$sql =  $CORE->Database->prepare("UPDATE codes SET activ= 0 WHERE code = '".$code."' ");
					$sql->execute();
					echo "Sukces, kod poprawnie aktywowany!";
					exit;
				}else{
					$_SESSION['redeem-error'] = "Kod już był aktywowany!";
					$CORE->Template->redirect(SITE_PATH.'buy');
					exit;
				}
			}else{
				$_SESSION['redeem-error'] = "Kod nieprawidłowy!";
				$CORE->Template->redirect(SITE_PATH.'buy');
				exit;
			}
		}else{
			$_SESSION['redeem-error'] = "Błąd bazy danych!";
			$CORE->Template->redirect(SITE_PATH.'buy');
			exit;
		}
	}else{
		$_SESSION['redeem-error'] = "Kod nieprawidłowy!";
		$CORE->Template->redirect(SITE_PATH.'buy');
		exit;
	}
}else{
	$CORE->Template->redirect(SITE_PATH.'buy');
	exit;
}
?>