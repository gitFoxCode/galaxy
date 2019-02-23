<?php $page = explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1]; ?>
			<div class="nav-box">

				<span class="search-icon"><input type="text" placeholder="Szukaj bajek..." class="nav-search"></span>
				<a href="<?= SITE_PATH ?>index"><button type="button" class="nav-btn <?php echo ($page == "index" ? "active" : "")?>">Strona głowna</button></a>
				<a href="<?= SITE_PATH ?>list"><button type="button" class="nav-btn <?php echo ($page == "list" ? "active" : "")?>">Lista bajek</button></a>
				<button type="button" class="nav-settings-btn"> <span class="galaxy-red">Moje Konto</span> </button>
				<div class="nav-user-box">
					<div class="nav-user-text-box">
						<?php if($_SESSION['rank'] > 1){
							echo '<span class="nav-user-text-icon i-admin"></span>';
						}else{
							echo '<span class="nav-user-text-icon i-premium" title="Konto z dostępem"></span>';
						} ?>
						
						<span class="nav-user-text">Witaj, <span class="bold"><?= $_SESSION['user'] ?></span>!</span>
					</div>
					<?php if($_SESSION['rank'] > 1){
						echo '<a href="'.SITE_PATH.'adminpanel"><button type="button" class="nav-user-btn i-admin">Admin Panel</button></a>';
					} ?>
					<a href="#"><button type="button" class="nav-user-btn i-watch">Oglądaj</button></a>
					<a href="<?= SITE_PATH ?>history"><button type="button" class="nav-user-btn i-history">Historia</button></a>
					<a href="<?= SITE_PATH ?>settings"><button type="button" class="nav-user-btn i-settings">Ustawienia</button></a>
					<a href="<?= SITE_PATH ?>logout"><button type="button" class="nav-user-btn i-logout"><span class="galaxy-red">Wyloguj się</span></button></a>
				</div>
			</div>