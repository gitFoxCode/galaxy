let modal = document.querySelector(".modal-box") ? document.querySelector(".modal-box") : false;
console.log(modal);
if(modal){
	document.querySelector('body').classList.add("outlet");
	let closeBtn = document.querySelector(".modal-close");
	let a = document.querySelector("#checkOffert");
	closeBtn.addEventListener("click", modalClose, false);
	a.addEventListener("click", modalClose, false);
}
function modalClose(){
		modal.style.display = 'none';
		document.querySelector('body').classList.remove("outlet")
		modal = false;
}