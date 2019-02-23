const navBtns = [...document.querySelectorAll('.nav-btn')];
const generate = document.querySelector(".generate-box") ? document.querySelector(".generate-box") : false;
const statsBox = document.querySelector(".stats-content") ? document.querySelector(".stats-content") : false;

if(generate){

	generate.querySelector(".generate-btn").addEventListener("click",generateCode,false);
	
	generateCode();

	function generateCode(){
		let codeBox = generate.querySelector(".generate-input");
		codeBox.value = makeCode();
	}
}




navBtns.forEach(navBtn => navBtn.addEventListener('click', changeActive));

function changeActive(e){
	if(this.classList.contains('active')){
		return false;
	}else{
		this.classList.add('active');
		navBtns.forEach(navBtn => {
			if(navBtn != this && navBtn.classList.contains('active')) {
				navBtn.classList.remove('active');
			}
		});
	}
}

function makeCode() {
  let text = "";
  let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (let i = 0; i < 20; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}


///////////////////////////////////
//////// CHART.JS ////////////////
//////////////////////////////////
if(statsBox){

	var ctx = document.getElementById("users-activity").getContext('2d');
	var myLineChart = new Chart(ctx, {
	    type: 'line',
	    data: {
    labels: ['0:00','9:00','12:00','18:00','24:00'],
    datasets: [{ 
        data: [100,450,600,750,1500,132],
        label: "No-logged user",
        borderColor: "#94989e",
        fill: false
      }, { 
        data: [10,112,452,851,1645,78],
        label: "User",
        borderColor: "#3975ce",
        fill: false
      }, { 
        data: [200,500,800,900,3000,240],
        label: "Premium",
        borderColor: "#c037f2",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Dzisiejsza aktywnośc użytkowników',
      fontSize: 20,
    },
     legend: {
        labels: {
        	fontColor: '#333'

        }
    }
  }
	});


new Chart(document.getElementById("users-globe"), {
    type: 'pie',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,16000,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Wszyscy użytkownicy (pochodzenie)',
         fontSize: 20,
      }
    }
});


};