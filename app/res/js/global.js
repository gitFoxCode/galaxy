const navBtn = document.querySelectorAll('.nav-btn');


for(let i = 0; i <= navBtn.length-1; i++){
	navBtn[i].addEventListener("click", newActiveButton,false);
}
function newActiveButton(){
	if(!this.classList.contains('active')){
		this.classList.add("active");
		for(let i = 0; i <= navBtn.length-1; i++){
			if(!(this == navBtn[i])) navBtn[i].classList.remove("active");
		}
	}
}

const settingsBtn = (document.querySelector('.nav-settings-btn') ? document.querySelector('.nav-settings-btn') : false );
if(settingsBtn){
	let settingsBox = document.querySelector('.nav-user-box');


	settingsBtn.addEventListener("click", ()=>{
		if(settingsBox.style.display == "block"){
			settingsBtn.classList.remove("open");
			settingsBox.style.display = "none";
		}else{
			settingsBtn.classList.add("open");
			settingsBox.style.display = "block";
		}


	    document.addEventListener('click', clickOutside, false);

		function clickOutside(event) {
	        let isClicked = settingsBox.contains(event.target);
	        let isClickedBtn = settingsBtn.contains(event.target);
	        if (isClicked || isClickedBtn) {
	        	///
	        }
	        else {
	          settingsBox.style.display = "none";
	          settingsBtn.classList.remove("open");
	          document.removeEventListener('click', clickOutside);
	        }
	    }
    
	},false);
}


