<?php 
	include('../../init.php');
	if(isset($_POST['code'])){
		if(isset($_POST['time']) && $_POST['time'] != 0){
			if(isset($_POST['count']) && $_POST['count'] != 0){
				if($sql = $CORE->Database->prepare("SELECT code FROM codes WHERE code = ?")){
					$sql->bind_param("s", $_POST['code']);
					$sql->execute();

					$results = $sql->get_result();
					if($results->num_rows > 0){
						echo $CORE->Admin->getAdminMessage("Kod jest już aktywowany!","error");
						exit;
					} else{
						$code = htmlspecialchars ($_POST['code'],ENT_QUOTES);
						$time = intval($_POST['time']);
						$count = intval($_POST['count']);
							if($sql = $CORE->Database->prepare("INSERT INTO codes VALUES (NULL,'$code','$count','$time')")){
								$sql->execute();
								$sql->close();
								echo $CORE->Admin->getAdminMessage("Dodano kod <span class='bold'>".$code."</span> do bazy!");
							} else{
								echo $CORE->Admin->getAdminMessage("Kod jest już aktywowany!","error");
								die();
							}
					}
				}
		}else{
			echo $CORE->Admin->getAdminMessage("Podaj liczbę użyć dla kodu!","error");
			exit;
		}
	}else{
		echo $CORE->Admin->getAdminMessage("Podaj czas (w godzinach) na ile kod ma aktywować konto!","error");
		exit;
	}
}else{
	echo $CORE->Admin->getAdminMessage("<span class='bold'>Error:</span> Podaj kod","error");
	exit;
}
	?>
