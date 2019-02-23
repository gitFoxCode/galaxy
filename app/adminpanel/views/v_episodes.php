<div class="card">
	<div class="card-title">
		Odcinki bajek
		<div class="card-options-box">
			<input type="text" class="options-search" id="episodes" placeholder="Wyszukaj...">
			<button type="button" class="options-btn"><span class="fas fa-search"></span></button>
			<div class="card-options">
				<span class="fas fa-file-video"></span> <?= $CORE->Admin->getCountOf('episodes') ?>
			</div>
		</div>
	</div>
	<div class="card-content">
		<table>
		  <thead>
			  <tr>
			    <th>Serial</th>
			    <th>Tytuł</th>
			    <th>Sezon/Odcinek</th>
			    <th>Wyświetlenia</th>
			    <th>Dubbing</th>
			    <th>Ocena</th>
			    <th>Czas</th>
			    <th>Opcje</th>
			  </tr>
		  </thead>
		  <tbody class="table-content">
			  <tr>
			    <td>Wodogrzmoty Małe</td>
			    <td>Atak na coś</td>
			    <td>S01E01</td>
			    <td>12000</td>
			    <td>EN,PL</td>
			    <td>9</td>
			    <td>12:54</td>
			    <td>
			    	<button type="button" class="table-btn edit-btn" title="Edit"> <span class="fas fa-pen"></span> </button>
			    	<button type="button" class="table-btn delete-btn" title="Delete"> <span class="fas fa-trash-alt"></span> </button>
			    </td>
			  </tr>
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

		xmlhttp.open("GET","http://localhost/galaktykabajek/app/adminpanel/action/a_search.php?d="+database+"&q="+value,true);

		xmlhttp.send();
	}

	search();

</script>