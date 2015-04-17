$(document).ready(function(){
	var url = window.location.href;
	var valuePossible = ["Main","Enchere","sProfil"];
	for(var i in valuePossible){
		if(url.indexOf(valuePossible[i]) != -1){
			$('.nav-pills li').removeClass('active');
			$('.nav-pills li:eq('+i+')').addClass('active');
		}
	}
});

// Ce script est une manière un peu brutale de modifier la nav en fonction de l'url pour bien placer la class .active 