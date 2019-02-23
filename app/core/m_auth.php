<?php

class Auth{

	function __construct(){

	}

	function setUserData($email){
		global $CORE;
		if($sql = $CORE->Database->prepare("SELECT * FROM users WHERE email = ?")){
			$sql->bind_param("s", $email);
			$sql->execute();

			$user = $sql->get_result()->fetch_assoc();

			if(count($user) > 0){
				$_SESSION['id'] = $user['id'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['rank'] = $user['premium'];
				$_SESSION['user'] = substr($email, 0, strpos($email, "@"));
				if($_SESSION['rank']>=1){
					$_SESSION['until'] = ($user['ptime'] === NULL) ? false : $user['ptime'];
				}

				$sql->close();
				return true;
			}else{
				$sql->close();
				return false;
			}
		} else{
			die();
		}
	}

	function validateLogin($email, $pass){
		global $CORE;

		if($sql = $CORE->Database->prepare("SELECT * FROM users WHERE email = ?")){
			$sql->bind_param("s", $email);
			$sql->execute();

			$user = $sql->get_result()->fetch_assoc();

			if(count($user) > 0 || password_verify($pass, $user['pass'])){
				$sql->close();
				return true;
			}else{
				$sql->close();
				return false;
			}
		} else{
			die();
		}
	}

	function validateRegister($email, $pass){
		global $CORE;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    return "Email jest niepoprawny!";
		} else{
			if(strlen($pass) <= 6){
				return "Hasło powinno mieć ponad 6 znaków!";
			} else if($sql = $CORE->Database->prepare("SELECT * FROM users WHERE email = ?")){
				$sql->bind_param("s", $email);
				$sql->execute();

				//$sql->get_result();
				$user = $sql->get_result()->fetch_assoc();

				if(count($user) > 0){
					$sql->close();
					return "Ten email jest już używany!";
				}else{
					if($sql = $CORE->Database->prepare("INSERT INTO users VALUES (NULL, ?,?,0,NULL)")){
						$pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
						$sql->bind_param("ss", $email,$pass_hashed);
						$sql->execute();
						$sql->close();
						return false;
					} else{
						die();
					}

				}
			} else{
				die();
			}
		}
	}

	function checkLoginStatus(){
		if(isset($_SESSION['email'])){
			return true;
		}else{
			return false;
		}
	}


	function logout(){
		session_destroy();
		session_start();
	}

	function checkPremium(){
		if(isset($_SESSION['rank'])){
			if($_SESSION['rank']>=1){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function isAdmin(){
		if(isset($_SESSION['rank'])){
			if($_SESSION['rank']>1){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function setPremium($userId, $time){
		global $CORE;
		// ("+1 week 2 days 4 hours 2 seconds")
		// $time - 1 days / 1 months / 1 years

		// $startdate = 'now';
		// $expire = strtotime($startdate. ' + '.$time);
		// $dt = new DateTime();
		// $dt->setTimestamp($expire);
		// $expireTime = $dt->setTimestamp($dt)->format('Y-m-d H:i:s');

		$startdate = 'now';
		$expire = strtotime($startdate. ''.$time);
		$date = new DateTime();
		$expireDate = $date->setTimestamp($expire);
		$expireTime = $expireDate->setTimestamp($expire)->format('Y-m-d H:i:s');
		//return $expirex;
		$_SESSION['until'] = $expireTime;

		if($sql = $CORE->Database->prepare("UPDATE users SET ptime = '$expireTime' WHERE users.id = ?")){
				$sql->bind_param("s", $userId);
				$sql->execute();
				return true;
		}else{
			$sql->close();
			return false;
		}

	}


	function checkExpire($userId){

	}

}