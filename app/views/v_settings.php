<?php 
if(!$CORE->Auth->checkLoginStatus()){
	$CORE->Template->redirect(SITE_PATH.'index');
	exit;
}



?>
<section class="container">

	<main>
		
	<h1 class="buy-h1">Ustawienia konta - <span class="galaxy-red bold"><?= $_SESSION['user'] ?></span> </h1>
	<div class="buy-container">
<!-- 		<h2>Strona nie zrealizowana (w budowie)</h2>
		<p>Aby aktywować konto skontaktuj się z administratorem.</p> -->

		<div class="cards-box">
			<div class="card-box">
				<span class="card-box-title">
					Nickname
				</span>
				<span class="card-box-value">
					<input type="text" readonly value="<?= $_SESSION['user'] ?>">
				</span>
			</div>
			<div class="card-box">
				<span class="card-box-title">
					E-mail
				</span>
				<span class="card-box-value">
					<input type="text" readonly value="<?= $_SESSION['email'] ?>">
				</span>
			</div>
			<div class="card-box">
				<span class="card-box-title">
					Premium
				</span>
				<span class="card-box-value">
					<?php if($_SESSION['rank'] > 1){
						echo '<input type="text" readonly value="Administrator">';
					}else if($_SESSION['rank']==1){
						echo '<input type="text" readonly value="Aktywowane">';
					}else{
						echo '<input type="text" readonly value="Brak">';
					}
					?>
				</span>
			</div>
		</div>

	</div>
	</main>
</section>