	<header>
		<nav class="nav">
			<div class="logo-box">
				<img src="http://localhost/galaktykabajek/app/res/icons/logo.png" alt="GalaktykaBajek" class="nav-logo">
				<h1 class="nav-logotype">
					<span class="logotype-line">Galaktyka</span>Bajek
				</h1>
			</div>
				<?php if($CORE->Auth->checkLoginStatus()){
					if($_SESSION['rank'] > 0){
						$CORE->Template->load('app/views/v_nav_user_premium.php');
					}else{
						$CORE->Template->load('app/views/v_nav_user.php');
					}

				} else{
					$CORE->Template->load('app/views/v_nav_default.php');
				}
				 ?>
		</nav>
	</header>