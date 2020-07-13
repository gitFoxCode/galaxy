const input = document.querySelector('.search-input');
const name = document.getElementById("name") ? document.getElementById("name").value : false;

input.addEventListener("keyup", search,false);

function search(){

	let value = this.value ? this.value : "";
	
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.querySelector('.content-inner').innerHTML = this.responseText;
		}
	};
	if(name){
		xmlhttp.open("GET",`http://${window.location.hostname}/app/action/a_`+input.id+".php?q="+value+"&name="+name,true);
	}else{
		xmlhttp.open("GET",`http://${window.location.hostname}/app/action/a_`+input.id+".php?q="+value,true);
	}

	xmlhttp.send();
}

search();