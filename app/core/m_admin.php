<?php 

class Admin{

	function __construct(){

	}

	function getAdminMessage($text, $status = ""){
		global $CORE;


		if($status == 'error'){
			$adminMessage = '<section class="admin-info-box">
					<span class="admin-info-title error"><span class="fas fa-exclamation-triangle"></span> Panel Administracyjny</span>
						<span class="admin-info-content">'.$text.'</span>
				</section>';
		}else{
			$adminMessage = '<section class="admin-info-box">
				<span class="admin-info-title"><span class="fas fa-info-circle"></span> Panel Administracyjny</span>
					<span class="admin-info-content">'.$text.'</span>
			</section>';	
		}

		return $adminMessage;


	}

	function getCountOf($name){
		global $CORE;
		if($sql = $CORE->Database->prepare("SELECT COUNT(id) FROM ".$name)){
			//$sql->bind_param("s", $name);
			$sql->execute();
			$results = $sql->get_result()->fetch_row();

			return $results[0];
			$sql->close();

		}else{
			return false;
			$sql->close();
			die();
		}
	}

}