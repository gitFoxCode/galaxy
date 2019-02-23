<?php

class Galaxy_Core{

	public $Template, $Auth, $Admin, $Database;

	function __construct($server, $user, $pass, $db){
		$this->Database = new mysqli($server, $user, $pass, $db);
		$this->Database->set_charset("utf8");

		/* Obiekt Template */
		
		include(APP_PATH . "core/m_template.php");
		$this->Template = new Template();
		$this->Template->setAlertTypes(['success', 'warning', 'error','info']);
		

		/* Obiekt Autoryzacji */
		
		include("m_auth.php");
		$this->Auth = new Auth();

		/* Obiekt Administracji  */

		include("m_admin.php");
		$this->Admin = new Admin();
		

		/* Start Sesji */
		session_start();
	}

	function __destruct(){
		$this->Database->close();
	}

	function head(){
		if($this->Auth->checkLoginStatus()){
			include(APP_PATH . "core/templates/t_head.php");
		}
		if(isset($_GET['login']) && !$this->Auth->checkLoginStatus()){
			include(APP_PATH . "core/templates/t_login.php");
		}
	}

	function toolbar(){
		if($this->Auth->checkLoginStatus()){
			include(APP_PATH . "core/templates/t_toolbar.php");
		}
	}

	function login_link(){
		if($this->Auth->checkLoginStatus()){
			echo "<a href='". SITE_PATH . "app/logout.php' class='btn-logout'>Wyloguj</a>";
		}else{
			echo "<a href='?login' class='btn-login'>Zaloguj się</a>";
		}
	}

	function nav(){
		include(APP_PATH . "views/v_nav.php");
	}

	function footer(){
		include(APP_PATH . "views/v_footer.php");
	}

}