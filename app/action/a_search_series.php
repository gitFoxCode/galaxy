<?php 
include("../init.php");

	if(isset($_GET['q'])){
		$q = htmlspecialchars ($_GET['q'],ENT_QUOTES);
	} else{
		$q = '';
	}
		if($sql = $CORE->Database->prepare("SELECT * FROM series WHERE title LIKE '%".$q."%' ORDER BY rate DESC LIMIT 20")){
			$sql->execute();

			//$episodes = $sql->get_result()->fetch_assoc();

			$episodes = $sql->get_result();
			if($episodes->num_rows > 0){
			 while($row = $episodes->fetch_assoc()) 
			    {
			        echo '<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/avatars/'.$row['avatar'].'.jpg)">
					<div class="list-card-age">'.$row['PEGI'].'</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					'.$row['title'].'
				</div>
				<div class="list-card-desc-i">
					'.$row['tv'].'
				</div>
				<div class="list-card-footer">
					2 Sezony
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Opis
				</div>
				<div class="list-card-desc">
					'.$row['description'].'
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">'.$row['rate'].'/10</div>
					<div class="list-rate-box">
						'.$CORE->Template->generateHearts($row['rate']).'
					</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Dubbing
				</div>
				<div class="list-card-desc">
					<div class="flags-box">
						<div class="flag-icon i-polish"></div>
						<div class="flag-icon i-english"></div>
					</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					';
					if($CORE->Auth->checkPremium()){
						echo 'Oglądaj';
					}else{
						echo 'Dostępny';
					}
					echo '
				</div>
				<div class="list-card-desc">
				';
				if($CORE->Auth->checkPremium()){
					echo '<a href="'.SITE_PATH.'watch/'.$row['name'].'">
						<div class="play-button i-play"></div>
					</a>';
					}else{
					echo '<span class="list-card-success">Tak</span>';
				};
				echo '
				</div>
			</section>
		</section>';
			    }
			    if($q==''){
				 echo '<div class="more-box">
				<button type="button" class="more-btn"> Załaduj więcej </button>
			</div>';
				}
			}else{
				echo '<h2 class="empty">Brak bajki o nazwie <span class="galaxy-red">' .$q.'</span> w bazie!</h2>';
				$sql->close();
			}

		} else{
			die();
		}
				?>