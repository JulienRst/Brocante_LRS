$(document).ready(function(){
	var url = window.location.href;
	var valuePossible = ["Main","Vente","Profil"];
	for(var i in valuePossible){
		if(url.indexOf(valuePossible[i]) != -1){
			$('.nav-pills li').removeClass('active');
			$('.nav-pills li:eq('+i+')').addClass('active');
		}
		//Si tu vois objet dans l'url (donc si c'est pas égale au rang -1)
		if(url.indexOf("Objet") != -1){
			//tu mets l'onglet en bleu sur le 2 donc armoire
			$('.nav-pills li').removeClass('active');
			$('.nav-pills li:eq(2)').addClass('active');
		}
	}
});

// Ce script est une manière un peu brutale de modifier la nav en fonction de l'url pour bien placer la class .active 