<div class="card">
	<div class="card-title">
		Użytkownicy
		<div class="card-options-box">
			<input type="text" class="options-search" id="users" placeholder="Wyszukaj...">
			<button type="button" class="options-btn"><span class="fas fa-search"></span></button>
			<div class="card-options spacious">
				<span class="fas fa-users"></span> <?= $CORE->Admin->getCountOf('users') ?>
			</div>
		</div>
	</div>
	<div class="card-content">
		<table>
		  <thead>
			  <tr>
			    <th>email</th>
			    <th>rank</th>
			    <th>expired</th>
			    <th>options</th>
			  </tr>
		  </thead>
		  <tbody class="table-content">

			</tbody>
		</table>
	</div>
</div>
<script>
	const input = document.querySelector(".options-search");
	input.addEventListener("keyup",search,false);
	let database = input.id;

	function search(){

		let value = this.value ? this.value : "";
		
		console.log(database);
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.table-content').innerHTML = this.responseText;
			}
		};

		xmlhttp.open("GET","<?= SITE_PATH ?>app/adminpanel/action/a_search.php?d="+database+"&q="+value,true);

		xmlhttp.send();
	}

	search();

</script>