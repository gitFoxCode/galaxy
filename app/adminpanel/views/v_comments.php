<div class="card">
	<div class="card-title">
		Komentarze
		<div class="card-options-box">
			<input type="text" class="options-search" id="comments"  placeholder="Wyszukaj...">
			<button type="button" class="options-btn"><span class="fas fa-search"></span></button>
			<div class="card-options">
				<span class="fas fa-comment"></span> <?= $CORE->Admin->getCountOf('comments') ?>
			</div>
		</div>
	</div>
	<div class="card-content">
		<table>
		  <thead>
			  <tr>
			    <th>Serial</th>
			    <th>Odcinek</th>
			    <th>Autor</th>
			    <th>Komentarz</th>
			    <th>Opcje</th>
			  </tr>
		  </thead>
		  <tbody class="table-content">
			  <tr>
			    <td>Wodogrzmoty Małe</td>
			    <td>S01E01</td>
			    <td>foxcode@gmail.com</td>
			    <td class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
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

		xmlhttp.open("GET","<?= SITE_PATH ?>app/adminpanel/action/a_search.php?d="+database+"&q="+value,true);

		xmlhttp.send();
	}

	search();

</script>