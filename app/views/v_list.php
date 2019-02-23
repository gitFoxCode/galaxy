<section class="main-box">
	<?php echo"get: "; print_r($_GET)?>
	<h1 class="content-title">Lista Bajek</h1>
	<section class="content-box">
		<div class="search-options-box">
			<label class="search-icon-i"><input type="search" class="search-input" placeholder="Szukaj bajki..." id="search_series"></label>
			<div class="search-sort-options">
				<span class="search-sort-text">Sortuj od</span>
				<select>
					<option value="rate">Ocen</option>
					<option value="DESC">Najnowsze</option>
					<option value="ASC">Najstarsze</option>
					<option value="alfa">Alfabetycznie</option>
				</select>
			</div>
		</div>
		<div class="content-inner">
<?php 
		// if($sql = $CORE->Database->prepare("SELECT * FROM series ORDER BY rate DESC")){
		// 	$sql->execute();

		// 	//$episodes = $sql->get_result()->fetch_assoc();

		// 	$episodes = $sql->get_result();
		// 	if($episodes){
		// 	 while($row = $episodes->fetch_assoc()) 
		// 	    {
		// 	        echo '<section class="list-card">
		// 	<section class="list-card-content-box">
		// 		<div class="list-card-avatar" style="background: url(app/res/img/avatars/'.$row['avatar'].'.jpg)">
		// 			<div class="list-card-age">'.$row['PEGI'].'</div>
		// 		</div>
		// 	</section>
		// 	<section class="list-card-content-box">
		// 		<div class="list-card-title-i">
		// 			'.$row['title'].'
		// 		</div>
		// 		<div class="list-card-desc-i">
		// 			'.$row['tv'].'
		// 		</div>
		// 		<div class="list-card-footer">
		// 			2 Sezony
		// 		</div>
		// 	</section>
		// 	<section class="list-card-content-box">
		// 		<div class="list-card-title">
		// 			Opis
		// 		</div>
		// 		<div class="list-card-desc">
		// 			'.$row['description'].'
		// 		</div>
		// 	</section>
		// 	<section class="list-card-content-box">
		// 		<div class="list-card-title">
		// 			Ocena
		// 		</div>
		// 		<div class="list-card-desc">
		// 			<div class="list-rate-value">'.$row['rate'].'/10</div>
		// 			<div class="list-rate-box">
		// 				'.$CORE->Template->generateHearts($row['rate']).'
		// 			</div>
		// 		</div>
		// 	</section>
		// 	<section class="list-card-content-box">
		// 		<div class="list-card-title">
		// 			Dubbing
		// 		</div>
		// 		<div class="list-card-desc">
		// 			<div class="flags-box">
		// 				<div class="flag-icon i-polish"></div>
		// 				<div class="flag-icon i-english"></div>
		// 			</div>
		// 		</div>
		// 	</section>
		// 	<section class="list-card-content-box">
		// 		<div class="list-card-title">
		// 			Dostępny
		// 		</div>
		// 		<div class="list-card-desc">
		// 		';
		// 		if($CORE->Auth->checkLoginStatus()){
		// 			echo '<a href="'.SITE_PATH.'watch/'.$row['name'].'">
		// 				<div class="play-button i-play"></div>
		// 			</a>';
		// 			}else{
		// 			echo '<span class="list-card-success">Tak</span>';
		// 		};
		// 		echo '
		// 		</div>
		// 	</section>
		// </section>';
		// 	    }
		// 	}else{
		// 		echo $sql->num_rows();
		// 		echo '<h2>Brak bajek w bazie!</h2>';
		// 		$sql->close();
		// 	}

		// } else{
		// 	die();
		// }
				?>

<!-- 		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-gravityfalls.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Wodogrzmoty Małe
				</div>
				<div class="list-card-desc-i">
					DisneyXD
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
					Podczas wakacji spędzanych u wujka, bliźniaki Dipper i Mabel odkrywają tajemnice miasteczka Gravity Falls. 
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">8/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<div class="play-button i-play"></div>
				</div>
			</section>
		</section>

		<section class="list-card">
					<section class="list-card-content-box">
						<div class="list-card-avatar" style="background: url(app/res/img/img-adventuretime.jpg)">
							<div class="list-card-age">6</div>
						</div>
					</section>
					<section class="list-card-content-box">
						<div class="list-card-title-i">
							Pora na przygodę
						</div>
						<div class="list-card-desc-i">
							DisneyXD
						</div>
						<div class="list-card-footer">
							6 Sezonów
						</div>
					</section>
					<section class="list-card-content-box">
						<div class="list-card-title">
							Opis
						</div>
						<div class="list-card-desc">
							Finn i pies Jake bronią mieszkańców krainy Ooo przed wrogami
						</div>
					</section>
					<section class="list-card-content-box">
						<div class="list-card-title">
							Ocena
						</div>
						<div class="list-card-desc">
							<div class="list-rate-value">8,5/10</div>
							<div class="list-rate-box">
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart half"></div>
								<div class="list-rate-heart"></div>
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
							Dostępny
						</div>
						<div class="list-card-desc">
							<span class="list-card-success">Tak</span>
						</div>
					</section>
		</section>

		<section class="list-card">
					<section class="list-card-content-box">
						<div class="list-card-avatar" style="background: url(app/res/img/img-ededdandeddy.jpg)">
							<div class="list-card-age">6</div>
						</div>
					</section>
					<section class="list-card-content-box">
						<div class="list-card-title-i">
							Ed, Edd i Eddy
						</div>
						<div class="list-card-desc-i">
							Cartoon Network
						</div>
						<div class="list-card-footer">
							6 Sezonów
						</div>
					</section>
					<section class="list-card-content-box">
						<div class="list-card-title">
							Opis
						</div>
						<div class="list-card-desc">
							Serial opowiadający przygody trzech kumpli o dość podobnych imionach. Mieszkają na przedmieściu USA, borykają się z problemami typowych nastolatków i mają ze sobą wiele wspólnego
						</div>
					</section>
					<section class="list-card-content-box">
						<div class="list-card-title">
							Ocena
						</div>
						<div class="list-card-desc">
							<div class="list-rate-value">7,5/10</div>
							<div class="list-rate-box">
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart colored"></div>
								<div class="list-rate-heart half"></div>
								<div class="list-rate-heart"></div>
								<div class="list-rate-heart"></div>
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
							Dostępny
						</div>
						<div class="list-card-desc">
							<span class="list-card-success">Tak</span>
						</div>
					</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-dexter.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Laboratorium Dextera
				</div>
				<div class="list-card-desc-i">
					Cartoon Network
				</div>
				<div class="list-card-footer">
					4 Sezony
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Opis
				</div>
				<div class="list-card-desc">
					Młody naukowiec buduje w domu tajne laboratorium, o czym wie tylko jego irytująca siostra. 
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">8/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-ben10.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Ben 10
				</div>
				<div class="list-card-desc-i">
					Cartoon Network
				</div>
				<div class="list-card-footer">
					4 Sezony
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Opis
				</div>
				<div class="list-card-desc">
					Ben jest przeciętnym chłopcem do dnia, w którym znajduje niesamowite urządzenie zwane Omnitrix, które pozwala mu zmieniać się w kosmitów 
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">9/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-fosterhouse.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Dom dla zmyślonych przyjaciół pani Foster
				</div>
				<div class="list-card-desc-i">
					Cartoon Network
				</div>
				<div class="list-card-footer">
					6 Sezony
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Opis
				</div>
				<div class="list-card-desc">
					Historia stworzenia Bloo w domu dla porzuconych zmyślonych przyjaciół
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">7/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-brenda.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Brenda i pan Whiskers
				</div>
				<div class="list-card-desc-i">
					DisneyChannel
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
					Kiedy suczka i królik wypadają z samolotu prosto w Amazońską dżungle, postanawiają wrócić do domu
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">6/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-gravityfalls.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Wodogrzmoty Małe
				</div>
				<div class="list-card-desc-i">
					DisneyXD
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
					Podczas wakacji spędzanych u wujka, bliźniaki Dipper i Mabel odkrywają tajemnice miasteczka Gravity Falls. 
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">8/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-gravityfalls.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Wodogrzmoty Małe
				</div>
				<div class="list-card-desc-i">
					DisneyXD
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
					Podczas wakacji spędzanych u wujka, bliźniaki Dipper i Mabel odkrywają tajemnice miasteczka Gravity Falls. 
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">8/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section>

		<section class="list-card">
			<section class="list-card-content-box">
				<div class="list-card-avatar" style="background: url(app/res/img/img-gravityfalls.jpg)">
					<div class="list-card-age">6</div>
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title-i">
					Wodogrzmoty Małe
				</div>
				<div class="list-card-desc-i">
					DisneyXD
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
					Podczas wakacji spędzanych u wujka, bliźniaki Dipper i Mabel odkrywają tajemnice miasteczka Gravity Falls. 
				</div>
			</section>
			<section class="list-card-content-box">
				<div class="list-card-title">
					Ocena
				</div>
				<div class="list-card-desc">
					<div class="list-rate-value">8/10</div>
					<div class="list-rate-box">
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart colored"></div>
						<div class="list-rate-heart"></div>
						<div class="list-rate-heart"></div>
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
					Dostępny
				</div>
				<div class="list-card-desc">
					<span class="list-card-success">Tak</span>
				</div>
			</section>
		</section> -->
	</div>



	</section>
</section>
<script src="app/res/js/search.js"></script>