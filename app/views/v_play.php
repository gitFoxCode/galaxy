<?php 
if(!$CORE->Auth->checkLoginStatus()){
	$CORE->Template->redirect(SITE_PATH.'index');
	exit;
}


	$seriesName = $_GET['watch'];
		//echo "Ogladasz: " . $seriesName;
		if($sql = $CORE->Database->prepare("SELECT * FROM series WHERE name = '$seriesName'")){
			$sql->execute();

			//$episodes = $sql->get_result()->fetch_assoc();

			$series = $sql->get_result()->fetch_assoc();
			if($series){
				$s_id = $series['id'];
				$s_avatar = APP_RES.'img/avatars/' .$series['avatar'];
				$s_title = $series['title'];
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

		$video = substr($_GET['play'], 0, -2);
	if($sql = $CORE->Database->prepare("SELECT e.id as id, e.avatar as avatar, e.title as title, e.views as views, e.rate as rate, e.dubbing as dubbing FROM episodes as e, series as s WHERE e.video = '$video' AND e.series_id = s.id AND s.id = '$s_id' ")){
			$sql->execute();

			//$episodes = $sql->get_result()->fetch_assoc();

			$episodes = $sql->get_result()->fetch_assoc();
			if($episodes){
				$e_id = $episodes['id'];
				$title = $episodes['title'];
				$views = $episodes['views'];
				$rate = $episodes['rate'];
				$dubbing = $episodes['dubbing'];

				// Add this episode to user history:
				echo $CORE->Template->addHistory($_SESSION['id'],$e_id);

			}else{
				echo $sql->num_rows();
				echo '<h2 class="no-more">Brak tej bajki!</h2>';
				echo '<p class="no-more">Nie ma odcinka<span class="galaxy-red"> '. $video .'</span> w naszej bazie!</p>';
				echo '<a href="'.SITE_PATH.'list" class="no-more">Wróć do listy </a>';
				$sql->close();
				exit;
			}

		} else{
			echo 'BRAK TAKIEJ BAJKI';
			die();
		}
?>

?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.4.7/plyr.css">
<!-- <link rel="stylesheet" href="path/to/plyr.css"> -->


<section class="container">


	<main>
		
	<h1 class="buy-h1"><?= $s_title ?> - <?= $title ?> <span class="galaxy-red bold"><?= $_GET['play'] ?></span> </h1>
	<div class="buy-container">
		<div class="video-container">
			<video poster="<?= APP_RES ?>videos/<?= $s_id ?>/thumb/<?= $video ?>.png" id="player" playsinline controls>
			    <source src="<?= APP_RES ?>videos/<?= $s_id ?>/<?= $video ?>pl.mp4" type="video/mp4">

			    <!-- Captions are optional -->
			    <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default>
			</video>
		</div>
		<hr class="line">
		<h2 class="left-titles">Komentarze:</h2 id="comments">
		<div class="comments-box">
			<form action="<?= APP_ACTION ?>a_comment.php" method="POST">
				<div class="comment-user">
					<textarea placeholder="Napisz komentarz" cols="80" rows="3" class="comment-input" name="comment" id="comment-input"></textarea>
					<input type="hidden" value="<?=$e_id?>" name="episode_id">
					<input type="hidden" value="<?=$s_id?>" name="series_id">
					<input type="hidden" value="<?=$_SERVER['REQUEST_URI']?>" name="path">
				</div>
			</form>

			<div class="comments-box-c">
<?php

	if($sql = $CORE->Database->prepare("SELECT c.id as cid, c.comment,c.author_id,c.date,u.email,e.id as eid,u.premium as rank 
FROM comments as c, users as u, episodes as e, series as s WHERE u.id = c.author_id AND e.id = c.episode_id AND s.id = e.series_id AND c.episode_id = '$e_id' AND c.series_id = '$s_id' ORDER BY c.id DESC")){
			$sql->execute();


			//$episodes = $sql->get_result()->fetch_assoc();

			$episodes = $sql->get_result();
			if($episodes->num_rows > 0){
			 while($row = $episodes->fetch_assoc()) 
			    {	
			    	$user = substr($row['email'], 0, strpos($row['email'], "@"));
 					if($user == $_SESSION['user'] || $CORE->Auth->isAdmin()){
			    		echo '<div class="comments-content my-comment">';
			    		echo '<button type="button" class="comment-btn i-remove" title="Usuń komentarz" data-id="'.$row['cid'].'" data-eid="'.$e_id.'" data-sid="'.$s_id.'"></button>';
 					}else{
			    		echo '<div class="comments-content">';	
 					}

			    	
			    	$date = new DateTime($row['date']);
					
					echo '<div class="comment-box">'.
					'<div class="comment-user-info">';
					if($row['rank']>1){
						echo '<span class="comment-author galaxy-red">'.$user.'</span>';
					}else{
						echo '<span class="comment-author">'.$user.'</span>';
					}
						
					
					echo '<span class="comment-time">'.$date->format('Y-m-d').'</span>'.
					'</div>'.
					'<span class="comment-content">'.$row['comment'].'</span>';
					echo'</div>';
					echo '</div>';
					
				}
			}else{
				echo '<span class="empty-info">Brak komentarzy...</span>';
				$sql->close();
				
			}

		} else{
			echo 'BRAK TAKIEJ BAJKI';
			die();
		}

?>

<!-- 				<div class="comment-box">
					<div class="comment-user-info">
						<span class="comment-author">Luxyren</span>
						<span class="comment-time">13.01.2019</span>
					</div>
					<span class="comment-content">Świetny odcinek!</span>
				</div> -->
			<!-- </div> -->
		</div>
		</div>
	</div>
	</main>
</section>
<script src="https://cdn.plyr.io/3.4.7/plyr.js"></script>
<!-- <script src="<?= APP_RES ?>js/plyr.js"></script> -->
<script>
//const player = new Plyr('#player');

const player = new Plyr('#player', {
   // "controls": ['mute']
   volume: 1,
   muted: false,

    controls: [
        'play-large',
        // 'restart',
        // 'rewind',
        'play',
        // 'fast-forward',
        'progress',
        'current-time',
        'mute',
        'volume',
        'captions',
        'settings',
        'pip',
        'airplay',
        // 'download',
        'fullscreen',
    ],
       speed: {
        selected: 1,
        options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2],
    },
    i18n: {
        restart: 'Restart',
        rewind: 'Rewind {seektime}s',
        play: 'Play',
        pause: 'Pause',
        fastForward: 'Forward {seektime}s',
        seek: 'Seek',
        seekLabel: '{currentTime} of {duration}',
        played: 'Played',
        buffered: 'Buffered',
        currentTime: 'Current time',
        duration: 'Czas',
        volume: 'Głośność',
        mute: 'Wycisz',
        unmute: 'Odcisz',
        enableCaptions: 'Włącz napisy',
        disableCaptions: 'Wyłącz napisy',
        download: 'Download',
        enterFullscreen: 'Fullscreen',
        exitFullscreen: 'Wyjdź z fullscreen',
        frameTitle: 'Player for {title}',
        captions: 'Napisy',
        settings: 'Ustawienia',
        menuBack: 'Wróć',
        speed: 'Prędkość',
        normal: 'Normalna',
        quality: 'Jakość',
        loop: 'Zapętl',
        start: 'Start',
        end: 'Koniec',
        all: 'All',
        reset: 'Reset',
        disabled: 'Wyłączone',
        enabled: 'Włączone',
        advertisement: 'Ad',
        qualityBadge: {
            2160: '4K',
            1440: 'HD',
            1080: 'HD',
            720: 'HD',
            576: 'SD',
            480: 'SD',
        },
    },
});

function submitOnEnter(event){
    if(event.which === 13 && !event.shiftKey){
    	document.querySelector('form').submit();
        //event.target.form.dispatchEvent(new Event("submit", {cancelable: true}));
        event.preventDefault(); 
        console.log("tak.");
    }
}

document.getElementById("comment-input").addEventListener("keypress", submitOnEnter);

const removeBtn = document.querySelectorAll(".i-remove") ? document.querySelectorAll(".i-remove") : false;
if(removeBtn){
	for(let i = 0; i <= removeBtn.length -1; i++){
		removeBtn[i].addEventListener("click", deleteComment, false);
	}
}

function deleteComment(e){

	let comment_id = this.dataset.id;
	let s_id = this.dataset.sid;
	let e_id = this.dataset.eid;
	console.log(comment_id);
	
	 xmlhttp = new XMLHttpRequest();
	 xmlhttp.onreadystatechange = function() {
	 	if (this.readyState == 4 && this.status == 200) {
	 		document.querySelector('.comments-box-c').innerHTML = this.responseText;
	 	}
	 };
	 xmlhttp.open("GET",`http://${window.location.hostname}/app/action/a_delete_comment.php?id=`+comment_id+'&e_id='+e_id+'&s_id='+s_id,true);
	 console.log('?id='+comment_id+'&e_id='+e_id+'&s_id='+s_id);
	 

	 xmlhttp.send();
}

</script>