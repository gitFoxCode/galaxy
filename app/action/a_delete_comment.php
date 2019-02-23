<?php 
include("../init.php");

if(isset($_GET['id']) && isset($_GET['e_id']) && isset($_GET['s_id'])){
	$comment_id = intval($_GET['id']);
	$e_id = intval($_GET['e_id']);
	$s_id = intval($_GET['s_id']);
	$user_id = $_SESSION['id'];
	if($sql = $CORE->Database->prepare("SELECT c.id FROM comments as c,users as u WHERE c.author_id = u.id AND c.id = ? AND u.id = ?")){
				$sql->bind_param("ss", $comment_id,$user_id);
				$sql->execute();

				//$sql->get_result();
				$comments = $sql->get_result()->fetch_assoc();

				if(count($comments) > 0){
					$sql->close();
					// Istnieje taki komentarz i uzytkownik jest autorem, idziemy dalej->
					if($sql = $CORE->Database->prepare("DELETE FROM comments WHERE comments.author_id = ? AND comments.id = ?")){
						$sql->bind_param("ss", $user_id,$comment_id);
						$sql->execute();
						showComments($CORE,$e_id,$s_id);
					} else{
						echo 'usuwa jako s';
						return false;
						exit;
					}
				}else{
					// Nie istnieje taki komentarz lub uzytkownik usuwajacy nie jest jego autorem!
					if(($sql = $CORE->Database->prepare("SELECT c.id FROM comments as c,users as u WHERE c.id = ?")) && $CORE->Auth->isAdmin()){
						if($sql = $CORE->Database->prepare("DELETE FROM comments WHERE comments.id = ?")){
							$sql->bind_param("s", $comment_id);
							$sql->execute();
							echo 'usuwa jako admin';
							showComments($CORE,$e_id,$s_id);
						} else{
							echo "blad tutaj 1";
							return false;
							exit;
						}
					} else{
							echo "blad tutaj 2";
						return false;
						exit;
					}

				}
			} else{
				die();
			}
}else{
								echo "blad tutaj 3";
	return false;
	exit;
}
/*todo: GLOBAL $e_id,$s_id,$CORE*/
function showComments($CORE, $e_id,$s_id){
	if($sql = $CORE->Database->prepare("SELECT c.id as cid, s.id, c.comment,c.author_id,c.date,u.email FROM comments as c, users as u, episodes as e, series as s WHERE u.id = c.author_id AND e.id = c.episode_id AND e.id= '$e_id' AND s.id = '$s_id' ORDER BY c.id DESC ")){
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
					'<div class="comment-user-info">'.
						'<span class="comment-author">'.$user.'</span>'.
						'<span class="comment-time">'.$date->format('Y-m-d').'</span>'.
					'</div>'.
					'<span class="comment-content">'.$row['comment'].'</span>';
					echo'</div>';
					echo '</div>';
				}
			}else{
				echo '<span class="empty-info">Brak komentarzy...</span>';
				$sql->close();
				return;
			}

		} else{
			echo 'BRAK TAKIEJ BAJKI';
			die();
		}
}






?>