<?php 
if($CORE->Auth->checkPremium()){
	$CORE->Template->redirect(SITE_PATH.'index');
	exit;
}
if(!isset($_GET['plan'])){
	$_GET['plan'] = 'month';
}
switch ($_GET['plan']) {
    case 'day':
        $plan = (object) [
        	'name' => 'Jeden dzień',
        	'price' => '10$',
        	'abonament' => false,
        ];
        break;
    case 'month':
        $plan = (object) [
        	'name' => 'Miesiąc',
        	'price' => '30$/ms',
        	'abonament' => true,
        ];
        break;
    case 'year':
        $plan = (object) [
        	'name' => 'Miesiąc',
        	'price' => '300$/y',
        	'abonament' => true,
        ];
        break;
    default:
       $CORE->Template->redirect(SITE_PATH.'index#buy-offer');
       break;
}
?>
<section class="container">

	<main>
		
	<h1 class="buy-h1">Skonfiguruj płatności - <span class="galaxy-red bold"><?= $plan->name ?></span> ( <span class="galaxy-red"><?= $plan->price?></span>)</h1>
	<div class="buy-container">
		<h2>Strona nie zrealizowana (w budowie)</h2>
		<p>Aby aktywować konto skontaktuj się z administratorem.</p>
		<form action="app/action/a_redeem.php" method="POST">
			<div class="buy-code-box">
					<?php 
						$error = $CORE->Template->showError('redeem');
						if($error != ''){
							echo $error;
						}
					?>
				<label for="code-input" class="code-text">Wpisz specialny galaktyczny kod</label>
				<input type="text" class="code-input" id="code-input" name="code" maxlength="20">
				<input type="submit" value="Sprawdź" class="code-submit" name="submit">
			</div>
		</form>
	</div>
	</main>
</section>