<?php 
	include('../../init.php');
	if(isset($_GET['q'])){
		$q = htmlspecialchars ($_GET['q'],ENT_QUOTES);
	} else{
		$q = '';
	}
	if(isset($_GET['d'])){
		$d = htmlspecialchars ($_GET['d'],ENT_QUOTES);
	} else{
		$d = '';
	}

switch ($d) {
    case "episodes":
		if($sql = $CORE->Database->prepare(" SELECT s.title as serialName, e.title,e.views,e.dubbing,e.id,e.season,e.episode,e.rate,e.time FROM episodes as e, series as s 
			WHERE e.series_id = s.id 
			AND (s.title LIKE '%".$q."%' 
			OR e.title LIKE '%".$q."%') ")){
					$sql->execute();
					$results = $sql->get_result();
					if($results->num_rows > 0){
					 while($row = $results->fetch_assoc()) 
					    {
					        echo '
										  <tr data-id="'.$row['id'].'">
										    <td>'.$row['serialName'].'</td>
										    <td>'.$row['title'].'</td>
										    <td>'. sprintf("%02d", $row['season']) .'E'. sprintf("%02d", $row['episode']) .'</td>
										    <td>'.$row['views'].'</td>
										    <td>';
							if($row['dubbing']>=2) echo "EN,PL";
							if($row['dubbing']==1) echo "EN";
							echo '</td>
										    <td>'.$row['rate'].'</td>
										    <td>'.substr($row['time'],3).'</td>
										    <td>
										    	<button type="button" class="table-btn edit-btn" title="Edit"> <span class="fas fa-pen"></span> </button>
										    	<button type="button" class="table-btn delete-btn" title="Delete"> <span class="fas fa-trash-alt"></span> </button>
										    </td>
										  </tr>';
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
    break;
	case "series":
		if($sql = $CORE->Database->prepare(" SELECT s.title, s.id, s.tv, s.description, s.rate, s.PEGI, s.avatar,s.name FROM series as s WHERE (s.title LIKE '%".$q."%' OR s.name LIKE '%".$q."%' ) ")){

					$sql->execute();
					$results = $sql->get_result();
					if($results->num_rows > 0){
					while($row = $results->fetch_assoc()) 
					    {
					        echo '
										  <tr data-id="'.$row['id'].'">
										    <td class="comment-small">'.$row['title'].'</td>
										    <td>'.$row['tv'].'</td>
										    <td class="comment-small">'.$row['description'].'</td>
										    <td>'.$row['rate'].'</td>
										    <td>'.$row['PEGI'].'</td>
										    <td>'.$row['avatar'].'</td>
										    <td>'.$row['name'].'</td>
										    <td class="options">
										    	<button type="button" class="table-btn edit-btn" title="Edit"> <span class="fas fa-pen"></span> </button>
										    	<button type="button" class="table-btn delete-btn" title="Delete"> <span class="fas fa-trash-alt"></span> </button>
										    </td>
										  </tr>';
					    }
					}else{
						if($q == ''){
							echo '<h2 class="empty">Brak seriali w bazie!</h2>';
						}else{
							echo '<h2 class="empty">Brak serialu o tytule <span class="galaxy-red">' .$q.'</span> w bazie!</h2>';
						}

						$sql->close();
					}

				} else{
					die();
				}
    break;
	case "users":
		if($sql = $CORE->Database->prepare(" SELECT u.id, u.email, u.premium, u.ptime FROM users as u WHERE u.email LIKE '%".$q."%' ")){

					$sql->execute();
					$results = $sql->get_result();
					if($results->num_rows > 0){
					while($row = $results->fetch_assoc()) 
					    {
					        echo '
							  <tr data-id="'.$row['id'].'">
							    <td>'.$row['email'].'</td>
							    ';
							    if($row['premium']>1){
							    	echo '<td class="admin">Admin</td>';
							    }
							    if($row['premium']==1){
							    	echo '<td class="premium">Użytkownik premium</td>';
							    }
							    if($row['premium']==0){
							    	echo '<td>Użytkownik</td>';
							    }
							    if(!$row['ptime']){
							    	echo '<td>Never</td>';
							    }else{
							    	echo '<td>'.$row['ptime'].'</td>';
							    }
							echo '
							    <td>
							    	<button type="button" class="table-btn edit-btn" title="Edit user"> <span class="fas fa-user-edit"></span> </button>
							    	<button type="button" class="table-btn delete-btn" title="Delete user"> <span class="fas fa-user-minus"></span> </button>
							    </td>
							  </tr>';
					    }
					}else{
						if($q == ''){
							echo '<h2 class="empty">Brak użytkowników w bazie!</h2>';
						}else{
							echo '<h2 class="empty">Brak użytkownika o nazwie <span class="galaxy-red">' .$q.'</span> w bazie!</h2>';
						}

						$sql->close();
					}

				} else{
					die();
				}
    break;
	case "comments":
		if($sql = $CORE->Database->prepare(" SELECT c.id as 'comment_id', s.id, e.id, u.id, u.email, e.episode, e.season, s.title, c.comment, c.date
FROM comments as c, episodes as e, users as u, series as s
WHERE s.id = c.series_id AND e.id = c.episode_id AND u.id = c.author_id AND e.series_id = s.id
AND (c.comment LIKE '%".$q."%' OR s.title LIKE '%".$q."%' ) ORDER BY c.id DESC ")){

					$sql->execute();
					$results = $sql->get_result();
					if($results->num_rows > 0){
					while($row = $results->fetch_assoc()) 
					    {
					        echo '
							  <tr>
							    <td>'.$row['title'].'</td>
							    <td>'. 's'. sprintf("%02d", $row['season']) .'e'. sprintf("%02d", $row['episode'])
							    .'</td>
							    <td>'.$row['email'].'</td>
							    <td class="comment">'.$row['comment'].'</td>
							    <td>
							    	<button type="button" class="table-btn edit-btn" title="Edit"> <span class="fas fa-pen"></span> </button>
							    	<button type="button" class="table-btn delete-btn" title="Delete"> <span class="fas fa-trash-alt"></span> </button>
							    </td>
							  </tr>';
					    }
					}else{
						if($q == ''){
							echo '<h2 class="empty">Brak komentarzy w bazie!</h2>';
						}else{
							echo '<h2 class="empty">Brak komentarza o treści <span class="galaxy-red">' .$q.'</span> w bazie!</h2>';
						}

						$sql->close();
					}

				} else{
					die();
				}
    break;
	case "codes":
		if($sql = $CORE->Database->prepare(" SELECT id, code, active, time FROM codes WHERE (code LIKE '%".$q."%' OR 'time' LIKE '%".$q."%') ")){

					$sql->execute();
					$results = $sql->get_result();
					if($results->num_rows > 0){
					while($row = $results->fetch_assoc()) 
					    {
					        echo '
							  <tr>
							    <td>'.$row['code'].'</td>
							    <td>'.$row['time'].'</td>';
							    if($row['active']){
							    	if($row['active']>1){
							    		echo '<td>Tak ('.$row['active'].')</td>';
							    	}else{
							    		echo '<td>Tak</td>';	
							    	}
							    }else{
							    	echo '<td>Nie</td>';
							    }
							    echo '
							    <td class="options">
							    	<button type="button" class="table-btn edit-btn" title="Edit"> <span class="fas fa-pen"></span> </button>
							    	<button type="button" class="table-btn delete-btn" title="Delete"> <span class="fas fa-trash-alt"></span> </button>
							    </td>
							  </tr>';
					    }
					}else{
						if($q == ''){
							echo '<h2 class="empty">Brak kodów rabatowych!</h2>';
						}else{
							echo '<h2 class="empty">Brak kodu <span class="galaxy-red">' .$q.'</span> w bazie!</h2>';
						}

						$sql->close();
					}

				} else{
					die();
				}
    break;
    default: 
   		echo $d;
    	echo "Brak.";
    	break;
}








?>