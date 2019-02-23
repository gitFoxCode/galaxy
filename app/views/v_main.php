<section class="main-box-container">
	<div class="flex-between">
		<div class="site-title-box">
			<h1 class="title-logotype">
				<span class="logotype-line">Galaktyka</span>Bajek
			</h1>
			<p class="title-desc">Najlepsze bajki i kreskówki w jednym miejscu!</p>
		</div>
		<div class="user-banner-box">
			<h2><?= $_SESSION['user'] ?></h2>
			<div class="user-banner-info-box">
				<div class="user-banner-info">
					<div class="user-banner-info-title">
						Konto wygasa:
					</div>
					<div class="user-banner-info-value galaxy-red">
						<?php if(!$_SESSION['until']){
							echo "Nigdy.";
						}else{
							echo $_SESSION['until'];
						}?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<main>

		<section class="card-box">
			<h2 class="card-box-title"><span class="card-box-title-line">Popularne</span></h2>
			<section class="card-box-content">
				<article class="card" style="background: url(app/res/img/adventure-time.jpg)" >
					<h3 class="card-title">Pora na Przygodę!</h3>
					<p class="card-desc"><span class="card-desc-text-box">Finn i pies Jake bronią mieszkańców krainy Ooo przed wrogami.</span></p>
					<button type="button" class="watch-btn">Sprawdź</button>
				</article>
				<article class="card" style="background: url(app/res/img/gravity-falls.jpg)" >
					<h3 class="card-title">Wodogrzmoty małe</h3>
					<p class="card-desc"><span class="card-desc-text-box">Podczas wakacji spędzanych u wujka, bliźniaki Dipper i Mabel odkrywają tajemnice miasteczka Gravity Falls. </span></p>
					<button type="button" class="watch-btn">Sprawdź</button>
				</article>
				<article class="card" style="background: url(app/res/img/dexter.jpg)" >
					<h3 class="card-title">Labolatorium Dextera</h3>
					<p class="card-desc"><span class="card-desc-text-box">Młody naukowiec buduje w domu tajne laboratorium, o czym wie tylko jego irytująca siostra.</span></p>
					<button type="button" class="watch-btn">Sprawdź</button>
				</article>
				<article class="card" style="background: url(app/res/img/edd.jpg)" >
					<h3 class="card-title">Ed, Edd i Eddy</h3>
					<p class="card-desc"><span class="card-desc-text-box">Serial opowiadający przygody trzech kumpli o dość podobnych imionach.</span></p>
					<button type="button" class="watch-btn">Sprawdź</button>
				</article>
			</section>
		</section>

		<?php 
			if($CORE->Template->checkHistory($_SESSION['id'],4)){
				echo '<section class="card-box">
				<h2 class="card-box-title"><span class="card-box-title-line">Ostatnie</span></h2>
				<section class="card-box-content">';

				$historyData = $CORE->Template->getHistory($_SESSION['id'],4);
				foreach ($historyData as $key => &$history) {
					
					echo '<article class="card" style="background: url(app/res/img/'.$history['s_avatar'].'.jpg)" >';
					echo '<h3 class="card-title">'.$history['title'].'</h3>';
					echo '<p class="card-desc"><span class="card-desc-text-box">'.$history['desc'].'</span></p>';
					echo '<a href="'.SITE_PATH.'watch/'.$history['name'].'"><button type="button" class="watch-btn">Sprawdź</button></a>
						</article>';

				}

				echo '</section>
				</section>';
			}
		?>
	
	</main>
</section>