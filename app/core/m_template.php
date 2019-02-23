<?php

class Template{

	private $data;
	private $alertTypes;

	function __construct(){

	}

	function getPage(){
		//return isset($_GET['page']) ? $_GET['page'] : "index";
		return explode('/', trim($_SERVER['REQUEST_URI'], '/'));

		//str_replace($_SERVER['REQUEST_URI'], "")
		//$_SERVER['REQUEST_URI'];
	}

	function redirect($url){
		header("Location: " . $url);
	}

	function load($url){
		include($url);
	}

	function setAlertTypes($types){
		$this->setAlertTypes = $types;
	}

	function setAlert($value, $type = null){
		if($type == ''){
			$type = $this->alertTypes[0];
		}
		$_SESSION[$type][] = $value;
	}

	function getAlerts(){
		$data = '';
		foreach($this->setAlertTypes as $alert){
			if(isset($_SESSION[$alert])){
				foreach($_SESSION[$alert] as $value){
					$data .= '<li class="alert alert-' . $alert . '">' . $value . '</li>';
				}
				unset($_SESSION[$alert]);
			}
		}
		return $data;
	}

	function setData($name,$value,$clean = true){
		if($clean){
			$this->data[$name] = htmlentities($value, ENT_QUOTES);
		}else{
			$this->data[$name] = $value;
		}
	}

	function getData($name){
		if(isset($this->data[$name])){
			return $this->data[$name];
		}else{
			return "";
		}
	}

	function showError($type){
		if($type == 'login'){
			if(isset($_SESSION['login-error'])){
				$errorbox = '<div class="error-box-l"> <span class="bold">Błąd: </span>'. $_SESSION['login-error'] .' </div>';
				unset($_SESSION['login-error']);
				return $errorbox;
			}
		} else if($type == 'redeem'){
			if(isset($_SESSION['redeem-error'])){
				$errorbox = '<div class="error-box-r"> <span class="bold">Błąd: </span>'. $_SESSION['redeem-error'] .' </div>';
				unset($_SESSION['redeem-error']);
				return $errorbox;
			}
		}


	}



	function checkHistory($userId, $value){
		// Check if user history has $value of rows
		global $CORE;
		if($sql = $CORE->Database->prepare("SELECT COUNT(us.id) FROM users_history as us WHERE us.user_id = ?")){
			$sql->bind_param("s", $userId);
			$sql->execute();
			$results = $sql->get_result()->fetch_row();

			if($results[0]>=$value){
				return true;
			}else{
				return false;
			}

		}else{
			$sql->close();
			return false;
			die();
		}
	}

	function addHistory($userId,$episodeId){
		global $CORE;
		$historyLimit = 10;
		if($sql = $CORE->Database->prepare("SELECT us.id, us.episode_id FROM users_history as us WHERE us.user_id = ? ORDER BY us.id DESC")){
			$sql->bind_param("s", $userId);
			$sql->execute();

			$last = $sql->get_result()->fetch_row();
			//$lastEp = $last[1];
			//$lastId = $last[0];
			if($last[1] == $episodeId){
				return 'BYLO';
			}else{
				if($sql = $CORE->Database->prepare("SELECT COUNT(us.id) FROM users_history as us WHERE us.user_id = ?")){
					$sql->bind_param("s", $userId);
					$sql->execute();

					$results = $sql->get_result()->fetch_row();

					if($results[0]>=$historyLimit){

						if($sql = $CORE->Database->prepare("DELETE FROM users_history WHERE users_history.user_id = ? LIMIT 1")){
							$sql->bind_param("s", $userId);
							$sql->execute();
							

							$sql = $CORE->Database->prepare("INSERT INTO users_history VALUES (NULL, ?,?)");
							$sql->bind_param("ss", $userId,$episodeId);
							$sql->execute();
							return true;

						}else{
							return false;
							die();
						}
					}else{
						$sql = $CORE->Database->prepare("INSERT INTO users_history VALUES (NULL, ?,?)");
						$sql->bind_param("ss", $userId,$episodeId);
						$sql->execute();
						return true;
					}
				}else{
					return false;
					echo 'database error!';
					die();
				}
			}

		}
	}

	function getHistory($userId, $limit = ''){
		global $CORE;
		if($limit != ''){
			$limit = 'LIMIT '.$limit;
		}
		if($sql = $CORE->Database->prepare("SELECT s.description as descr, s.avatar as s_avatar, e.title as title,e.season as season,e.episode as episode,e.avatar as avatar, s.name as name from users_history as us, episodes as e, users as u, series as s WHERE s.id = e.series_id AND u.id = us.user_id AND us.episode_id = e.id AND us.user_id = ? ORDER BY us.id DESC ".$limit."")){
			$sql->bind_param("s", $userId);
			$sql->execute();

			$results = $sql->get_result();
			if($results->num_rows > 0){

				$result = [];
				while($row = $results->fetch_assoc()) {
					$result[] = [ 
						'title' => $row['title'],
						'season' => $row['season'],
						'episode' => $row['episode'],
						'avatar' => $row['avatar'],
						'name' => $row['name'],
						's_avatar' => $row['s_avatar'],
						'desc' => $row['descr']
					];
				}

		        $sql->close();
				return $result;
			}else{
				$sql->close();
				return false; // false - no history
			}
		} else{
			return false;
			die();
		}
	}

	function generateHearts($n){
		$result = [];
		$decimal = $n - floor($n);
		$n = intval($n);
		for($i = 0; $i < $n; $i++){
			array_push($result,'<div class="list-rate-heart colored"></div>');
		}
		if($decimal >= 0.5){
			array_push($result,'<div class="list-rate-heart half"></div>');
		}
		while(count($result) != 10){
			array_push($result,'<div class="list-rate-heart"></div>');
		}
		return implode("",$result);
	}

}