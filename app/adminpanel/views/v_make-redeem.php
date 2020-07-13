<div class="card">
	<div class="card-title">
		Generuj kod
		<div class="card-options-box">
			<div class="card-options">
				<span class="fas fa-ticket-alt"></span> <?= $CORE->Admin->getCountOf('codes') ?>
			</div>
		</div>
	</div>
	<div class="card-content">
			<div class="generate-box">
				<input type="text" readonly class="generate-input" name="code">
				<button type="button" class="generate-btn">Generuj nowy kod</button>
			</div>

			<div class="generate-box">
				<span class="generate-text">Godzin konta premium:</span>
				<input type="number" class="generate-input" placeholder="1" name="time">
			</div>

			<div class="generate-box">
				<span class="generate-text">Ilość użyć dla kodu:</span>
				<input type="number" class="generate-input" placeholder="1" name="count">
			</div>

			<div class="add-content-options">
				<button type="button" class="add-btn"><span class="fas fa-plus"></span> Wyślij</button>
			</div>
	</div>
</div>
<script>
	const btn = document.querySelector(".add-btn");
	btn.addEventListener("click",sendData,false);

	function sendData(){
		let code = document.querySelector("input[name='code']").value;
		let time = document.querySelector("input[name='time']").value;
		let count = document.querySelector("input[name='count']").value;

		console.log(code);
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.admin-infos-box').innerHTML = this.responseText;
			}
		};

		xmlhttp.open("POST","<?= SITE_PATH ?>app/adminpanel/action/a_generateCodes.php",true);
		xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xmlhttp.send(`code=${code}&time=${time}&count=${count}`);
	}


</script>
<!--  TO DO: zrobić z prawej strony info co sie wykonalo   -->