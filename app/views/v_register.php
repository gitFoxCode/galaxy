<section class="main-box main-login-box">
	<h1 class="content-title">Zarejestruj sie</h1>
	<section class="content-box login-content">
		<section class="login-box-left register-box-left">
		</section>
		<section class="login-box-right">
			<h2>Odkrywaj galaktykę!</h2>
			<p>Zajerestruj się poniżej</p>
			<div class="login-box register-box">
				<form action="app/action/a_register.php" method="post">
					<span class="login-text">Email</span>
					<input type="email" required placeholder="JanKowalski@email.com" name="email">
					<span class="login-text">Hasło</span>
					<input type="password" required placeholder="Hasło" name="pass">
					<span class="login-text">Powtórz hasło</span>
					<input type="password" required placeholder="Hasło" name="repass">
					<?php 
						$error = $CORE->Template->showError('login');
						if($error != ''){
							echo $error;
						}
					?>
					<input type="submit" value="Zarejestruj się" class="login-register-btn">
					<button type="button" class="login-btn-facebook">Zaloguj przez facebook</button>
					<span class="login-text-addton">Posiadasz konto? <a href="login">Zaloguj się</a></span>
				</form>
			</div>
		</section>
	</section>
</section>