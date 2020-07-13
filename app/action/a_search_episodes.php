<?php 
include("../init.php");
	if(isset($_GET['q'])){
		$q = htmlspecialchars ($_GET['q'],ENT_QUOTES);
	} else{
		$q = '';
	}
	$name = $_GET['name'];
	// SELECT e.title, e.video, e.season, e.episode, e.views, e.dubbing, e.rate, e.time FROM episodes as e, series as s WHERE s.id = e.series_id AND s.name = '".$name."' AND e.title LIKE '%".$q."%' ORDER BY e.id DESC LIMIT 20

//if($sql = $CORE->Database->prepare("SELECT * FROM episodes WHERE title LIKE '%".$q."%'ORDER BY id DESC LIMIT 20")){

if($sql = $CORE->Database->prepare("SELECT e.title, e.video, e.avatar as avatar, e.season, e.episode, e.views, e.dubbing, e.rate, e.time FROM episodes as e, series as s WHERE s.id = e.series_id AND s.name = '".$name."' AND e.title LIKE '%".$q."%' ORDER BY e.id DESC LIMIT 20")){

			$sql->execute();

			//$episodes = $sql->get_result()->fetch_assoc();

			$episodes = $sql->get_result();
			if($episodes->num_rows > 0){
			 while($row = $episodes->fetch_assoc()) 
			    {
			        echo '				<section class="watch-list-box">
					<section class="watch-list-card-content-box">
						<div class="list-card-avatar" style="background: url('.APP_RES.'img/'.$row['avatar'].'.jpg)">
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Odcinek
						</div>
						<div class="watch-list-card-desc-i">
							S'. sprintf("%02d", $row['season']) .'E'. sprintf("%02d", $row['episode']) .'
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Tytuł
						</div>
						<div class="watch-list-card-desc-i watch-title">
							'. $row['title'] .'
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Wyświetleń
						</div>
						<div class="watch-list-card-desc-i">
							'. $row['views'] .'
						</div>
					</section>
					<section class="watch-list-card-content-box">
						<div class="watch-list-card-title-i">
							Ocena
						</div>
						<div class="watch-list-card-desc-i">
							'.$row['rate'].'/10
						</div>
					</section>
					<section class="watch-list-card-content-box watch-list-card-box-btn">
						<div class="watch-list-card-watch-btn">
							<a href="'. $name .'/'.'s'. sprintf("%02d", $row['season']) .'e'. sprintf("%02d", $row['episode']) .'pl">Oglądaj</a>
						</div>
					</section>
					<div class="watch-watchtime-box">
						'. substr($row['time'],3) .'
					</div>
				</section>';
			    }
			}else{
				if($q == ''){
					echo '<h2 class="empty">Brak odcinków w bazie!</h2>';
				}else{
					echo '<h2 class="empty">Brak odcinka o tytule <span class="galaxy-red">' .$q.'</span> w bazie!</h2>';
				}

				$sql->close();
			}

		} else{
			die();
		}
				?>