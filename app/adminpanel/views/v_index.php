<?php 
	if(!$CORE->Auth->isAdmin()){
		$CORE->Template->redirect(SITE_PATH);
		exit;
	}
	include('app/adminpanel/views/v_head.php');
	if(!isset($page[2])){
		$page[2] = 'stats'; // Set default page
	}

?>
<div class="admin-infos-box">
<!-- 	<section class="admin-info-box">
		<span class="admin-info-title"><span class="fas fa-info-circle"></span> Panel Administracyjny</span>
		<span class="admin-info-content">Dodałeś <b>14</b> kodów dostępu na <b>24</b>h Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam </span>
	</section> -->
</div>

<div class="wrapper">
	<aside class="nav">
		<div class="nav-logo">Galaktyka<span class="galaxy-red">Bajek</span></div>
		<nav class="nav-content">
			<div class="nav-content-name"> Głowne </div>
			<a href="<?=ADMIN_PATH?>stats">
				<button type="button" class="nav-btn <?= ($page[2] == "stats" ? "active" : "")?>">
					<span class="fas fa-chart-pie"></span> Statystyki
				</button>
			</a>
			<div class="nav-content-name"> Seriale </div>
			<a href="<?=ADMIN_PATH?>series">
				<button type="button" class="nav-btn <?= ($page[2] == "series" ? "active" : "")?>">
					<span class="fas fa-video"></span> Lista bajek
				</button>
			</a>
			<a href="<?=ADMIN_PATH?>episodes">
				<button type="button" class="nav-btn <?= ($page[2] == "episodes" ? "active" : "")?>">
					<span class="fas fa-file-video"></span> Lista odcinków
				</button>
			</a>
			<a href="<?=ADMIN_PATH?>add-serie"> 
				<button type="button" class="nav-btn <?= ($page[2] == "add-serie" ? "active" : "")?>">
					<span class="fas fa-plus"></span> Dodaj serial
				</button>
			</a>
			<a href="<?=ADMIN_PATH?>add-episode">
				<button type="button" class="nav-btn <?= ($page[2] == "add-episode" ? "active" : "")?>">
					<span class="fas fa-plus"></span> Dodaj odcinek serialu
				</button>
			</a>
			<div class="nav-content-name"> Użytkownicy </div>
			<a href="<?=ADMIN_PATH?>users">
				<button type="button" class="nav-btn <?= ($page[2] == "users" ? "active" : "")?>">
					<span class="fas fa-users"></span> Użytkownicy
				</button>
			</a>
			<a href="<?=ADMIN_PATH?>comments">
				<button type="button" class="nav-btn <?= ($page[2] == "comments" ? "active" : "")?>">
					<span class="fas fa-comments"></span> Komentarze
				</button>
			</a>
			<a href="<?=ADMIN_PATH?>redeem">
				<button type="button" class="nav-btn <?= ($page[2] == "redeem" ? "active" : "")?>">
					<span class="fas fa-ticket-alt"></span> Kody
				</button>
			</a>
			<a href="<?=ADMIN_PATH?>make-redeem">
				<button type="button" class="nav-btn <?= ($page[2] == "make-redeem" ? "active" : "")?>">
					<span class="fas fa-hat-wizard"></span> Generuj kod
				</button>
			</a>
		</nav>
		<a href="<?=SITE_PATH?>"><button class="back-btn">Wróć do galaktyki</button></a>
	</aside>
	<section class="content-box">
		<section class="user-nav">
			<span class="user-nav-username">
						<?= $_SESSION['user'] ?>
			</span>
		</section>
		<section class="content">
			
			<?php

			if(isset($page[2])){
				$file = 'app/adminpanel/views/v_'. $page[2] . '.php';
				if (file_exists($file)){
					include($file);
				}else{
					include('app/adminpanel/views/v_404.php');
					//return;
				}
				
			}else{
				echo 'Error, '. $_SESSION['user'] . ' skontaktuj się z administratorem!';
			}

			 ?>

		</section>
	</section>
</div>
<script src="<?=APP_RES?>js/admin.js"></script>
</body>
</html>



