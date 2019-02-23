<section class="main-box main-login-box">
	<h1 class="content-title">Zaloguj sie</h1>
	<section class="content-box login-content">
		<section class="login-box-left">
		</section>
		<section class="login-box-right">
			<h2>Witamy ponownie!</h2>
			<p>Zaloguj się na konto poniżej</p>
			<div class="login-box">
				<!-- <form action=" <?= APP_PATH . 'action/a_login.php' ?>" method="POST"> -->
				<form action="app/action/a_login.php" method="POST">
					<span class="login-text">Email</span>
					<input type="email" required placeholder="JanKowalski@email.com" name="email">
					<span class="login-text">Hasło</span>
					<input type="password" required placeholder="Hasło" name="pass">
					<?php 
						$error = $CORE->Template->showError('login');
						if($error != ''){
							echo $error;
						}
					?>
					<input type="submit" value="Zaloguj się" class="login-btn">
					<button type="button" class="login-btn-facebook">Zaloguj się przez facebook</button>
					<span class="login-text-addton"> Nie posiadasz konta? </span>
					<a href="register"><button type="button" class="login-register-btn">Zarejestruj się</button></a>
					<a href="#"><span class="login-text-addton">Zapomniałem hasło</span></a>
				</form>
			</div>
		</section>
	</section>
</section>