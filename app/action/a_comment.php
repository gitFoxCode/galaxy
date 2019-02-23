<?php 
include("../init.php");
if(isset($_POST['comment'])){
	if(isset($_POST['path'])){
		$path = $_POST['path'];
	}else{
		$path = '/';
	}
	$comment = $_POST['comment'];
	$episode = intval($_POST['episode_id']);
	$serie = intval($_POST['series_id']);
	$user_id = $_SESSION['id'];
	$comment = htmlspecialchars ($comment,ENT_QUOTES);
	if($sql = $CORE->Database->prepare("INSERT INTO comments VALUES (NULL,'$episode','$serie','$user_id','$comment',NOW())")){
			$sql->execute();
			$sql->close();
			$CORE->Template->redirect($path.'#comments');
			exit;
		} else{
			echo 'Wystąpił błąd, skontaktuj się z administratorem.';
			die();
		}
}else{
	$CORE->Template->redirect($path.'#comments');
	exit;
}


?>