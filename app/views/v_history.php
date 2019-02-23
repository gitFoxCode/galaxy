<?php 
if(!$CORE->Auth->checkLoginStatus()){
	$CORE->Template->redirect(SITE_PATH.'index');
	exit;
}



?>
<section class="container">

	<main>
		
	<h1 class="buy-h1">Ostatnio oglądane - <span class="galaxy-red bold"><?= $_SESSION['user'] ?></span> </h1>
	<div class="buy-container">


<?php 
$historyData = $CORE->Template->getHistory($_SESSION['id']);
if($historyData){
	echo '<div class="history-list-box">';
	foreach ($historyData as $key => &$history) {
		echo '<a href="'.SITE_PATH.'watch/'.$history['name'].'">';
		echo '<div class="history-list" style="background: url('.APP_RES.'img/avatars/'.$history['avatar'].'.jpg)">';
			echo '<div class="history-list-avatar" style="background: url('.APP_RES.'img/avatars/'.$history['avatar'].'.jpg)"></div>';
			echo '<div class="history-list-content">';
				echo $history['title'] . ' - ';
				echo 's0'. $history['season'] . 'e'.$history['episode'];
			echo '</div>';
		echo '</div></a>';
	}
	echo '</div>';
}else{
	echo '<h2 class="big-empty">Brak histori oglądania<h2>';
}


?>


	</div>



	</main>
</section>