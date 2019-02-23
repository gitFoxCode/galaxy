
<?php 
	if(isset($_GET['play'])){
		include('v_play.php');
		return;
	}
		$seriesName = $_GET['watch'];
		echo "Ogladasz: " . $seriesName;
		if($sql = $CORE->Database->prepare("SELECT * FROM series WHERE name = '$seriesName'")){
			$sql->execute();

			//$episodes = $sql->get_result()->fetch_assoc();

			$series = $sql->get_result()->fetch_assoc();
			if($series){
				$avatar = APP_RES.'img/avatars/' .$series['avatar'];
				$title = $series['title'];
				$Pegi = $series['PEGI'];
				$rate = $series['rate'];
				$tv = $series['tv'];
				$desc = $series['description'];
				$name = $series['name'];
			}else{
				echo $sql->num_rows();
				echo '<h2 class="no-more">Brak tej bajki!</h2>';
				echo '<p class="no-more">Nie ma <span class="galaxy-red">'. $seriesName .'</span> w naszej bazie!</p>';
				echo '<a href="'.SITE_PATH.'" class="no-more">Wróć do strony głównej</a>';
				$sql->close();
				exit;
			}

		} else{
			echo 'BRAK TAKIEJ BAJKI';
			die();
		}
				?>
<section class="main-box">
	<h1 class="content-title"> <?= $title ?> </h1>
	<section class="watch-box">
		<section class="watch-c1">
			<section class="watch-content-box">
				<div class="watch-avatar" style="background: url(<?= $avatar ?>.jpg)"></div>
				<div class="watch-rates-box">
					<span class="watch-rates"><span class="bold">4231</span> osób oceniło</span>
					<div class="watch-rate-box">
						<span class="watch-rate-heart"></span>
						<span class="watch-rate-count"><?= $rate ?></span>
					</div>
				</div>
				<div class="watch-rate-hearts-box">
					<?= $CORE->Template->generateHearts($rate); ?>
					<!--<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart colored"></div>
					<div class="list-rate-heart half"></div> -->
				</div>
			</section>
			<section class="watch-content-box">
				<p><span class="bold">Nazwa: </span>  <?= $title ?> </p>
				<p><span class="bold">Od lat: </span> <?= $Pegi ?></p>
				<p><span class="bold">Odcinków: </span>1234</p>
				<p><span class="bold">Producent: </span> <?= $tv ?></p>
				<p><span class="bold">Dubbing: </span>Polski,Angielski</p>
				<p><span class="bold">Opis: </span><?= $desc ?></p>
			</section>
			<section class="watch-media-box">
				<a href="#">f</a>
			</section>
		</section>
		<section class="watch-c2">
			<section class="watch-content-box-big">
			<div class="search-options-box">
				<label class="search-icon-i"><input type="text" class="search-input" placeholder="Szukaj bajki..." id="search_episodes"></label>
				<input type="hidden" id="name" value="<?=$name?>">
				<div class="search-sort-options">
					<span class="search-sort-text">Sortuj od</span>
					<select>
						<option value="DESC">Najnowsze</option>
						<option value="ASC">Najstarsze</option>
						<option value="rate">Ocen</option>
						<option value="alfa">Alfabetycznie</option>
					</select>
				</div>
			</div>
			<div class="content-inner">
				<?php 
		// if($sql = $CORE->Database->prepare("SELECT * FROM episodes ORDER BY id DESC")){
		// 	$sql->execute();

		// 	//$episodes = $sql->get_result()->fetch_assoc();

		// 	$episodes = $sql->get_result();
		// 	if($episodes){
		// 	 while($row = $episodes->fetch_assoc()) 
		// 	    {
		// 	        echo '				<section class="watch-list-box">
		// 			<section class="watch-list-card-content-box">
		// 				<div class="list-card-avatar" style="background: url(http://localhost/galaktykabajek/app/res/img/img-gravityfalls.jpg)">
		// 				</div>
		// 			</section>
		// 			<section class="watch-list-card-content-box">
		// 				<div class="watch-list-card-title-i">
		// 					Odcinek
		// 				</div>
		// 				<div class="watch-list-card-desc-i">
		// 					S'. sprintf("%02d", $row['season']) .'E'. sprintf("%02d", $row['episode']) .'
		// 				</div>
		// 			</section>
		// 			<section class="watch-list-card-content-box">
		// 				<div class="watch-list-card-title-i">
		// 					Tytuł
		// 				</div>
		// 				<div class="watch-list-card-desc-i watch-title">
		// 					'. $row['title'] .'
		// 				</div>
		// 			</section>
		// 			<section class="watch-list-card-content-box">
		// 				<div class="watch-list-card-title-i">
		// 					Wyświetleń
		// 				</div>
		// 				<div class="watch-list-card-desc-i">
		// 					'. $row['views'] .'
		// 				</div>
		// 			</section>
		// 			<section class="watch-list-card-content-box">
		// 				<div class="watch-list-card-title-i">
		// 					Ocena
		// 				</div>
		// 				<div class="watch-list-card-desc-i">
		// 					'.$row['rate'].'/10
		// 				</div>
		// 			</section>
		// 			<section class="watch-list-card-content-box watch-list-card-box-btn">
		// 				<div class="watch-list-card-watch-btn">
		// 					Oglądaj
		// 				</div>
		// 			</section>
		// 			<div class="watch-watchtime-box">
		// 				'. substr($row['time'],3) .'
		// 			</div>
		// 		</section>';
		// 	    }
		// 	}else{
		// 		echo $sql->num_rows();
		// 		echo '<h2>Brak epizodow dla tej bajki!</h2>';
		// 		$sql->close();
		// 	}

		// } else{
		// 	die();
		// }
				?>

				<!-- 
				<section class="watch-list-box">
					<section class="watch-list-card-content-box">
						<div class="list-card-avatar" style="background: url(app/res/img/img-gravityfalls.jpg)">
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Odcinek
						</div>
						<div class="watch-list-card-desc-i">
							S01E01
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Tytuł
						</div>
						<div class="watch-list-card-desc-i watch-title">
							Lorem ipsum dolor sit amet, consectetur adipisicing
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Wyświetleń
						</div>
						<div class="watch-list-card-desc-i">
							15486
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Ocena
						</div>
						<div class="watch-list-card-desc-i">
							9/10
						</div>
					</section>
					<section class="watch-list-card-content-box watch-list-card-box-btn">
						<div class="watch-list-card-watch-btn">
							Oglądaj
						</div>
					</section>
					<div class="watch-watchtime-box">
						13:51
					</div>
				</section>
			-->
		</div>
			</section>
		</section>
	</section>
</section>
<script src="<?= APP_RES ?>js/search.js"></script>