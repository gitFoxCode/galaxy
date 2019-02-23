<?php

include('../init.php');


// $startdate = 'now';
// $expire = strtotime($startdate. ' - 1 days');
// $date = new DateTime();
// $expireDate = $date->setTimestamp($expire);
// print_r($mydate);
// echo '<br>';
// echo '<br>';
// $expireTime = $expireDate->setTimestamp($expire)->format('Y-m-d H:i:s');
// echo $mydate;

		// $startdate = 'now';
		// $expire = strtotime($startdate. '+ 1 days');
		// $dt = new DateTime();
		// $dt->setTimestamp($expire);
		// $expirex = $dt->date;
		// echo $expirex;
echo $CORE->Auth->setPremium(4,'+ 1 minutes');





// $resultini = $CORE->Template->addHistory(4,2);
// if($resultini){
// 	echo 'Udalo sie. Dodalismy do twojej historii id 1';
// }else{
// 	echo 'Nie dodalismy nic.';
// }


// $resultini = $CORE->Template->getHistory(4);

// echo 'Twoja historia oglądania:';
// echo '<br><br>';
// foreach ($resultini as $key => $value) {
// 	echo '<a href="http://localhost/galaktykabajek/watch/'.$value['name'].'">';
// 	echo $value['title'] . ' - ';
// 	echo 's0'. $value['season'] . 'e'.$value['episode'].'</a> <br>';
// }