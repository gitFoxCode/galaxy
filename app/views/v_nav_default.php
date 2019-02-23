<?php $nowPage = explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1]; ?>
			<div class="nav-box">

				<span class="search-icon"><input type="text" placeholder="Szukaj bajek..." class="nav-search"></span>
				<a href="<?= SITE_PATH ?>index"><button type="button" class="nav-btn <?php echo ($nowPage == "index" ? "active" : "")?>">Strona głowna</button></a>
				<a href="<?= SITE_PATH ?>list"><button type="button" class="nav-btn <?php echo ($nowPage == "list" ? "active" : "")?>">Lista bajek</button></a>
				<a href="<?= SITE_PATH ?>login"><button type="button" class="nav-btn <?php echo (($nowPage == "login" || $nowPage == "register") ? "active" : "")?>">Zaloguj się</button></a>
			</div>