var id="explorer";
var chemin="..";
var docCourant="";


function firstInit(){
	suppContenu();
	

	$.get('./send-ajax-data.php',{
		param : "../" ,
		/*$('#text').val()*/
		fonctiAppel:2,

	})
    .done(function(data) {
        document.getElementById(id).innerHTML=data;
    })
    .fail(function(data) {
        alert('Error: ' + data);
    });
    disablBouton();
    barreNav();
}

function OpenDoc(champ){
	suppContenu();
	
	
	chemin+="/"+champ.id;
	/*console.log(chemin);*/
	$.get('./send-ajax-data.php',{
		param : chemin ,
		/*$('#text').val()*/
		fonctiAppel:0,

	})
    .done(function(data) {
        /*alert(data);*/
       	document.getElementById(id).innerHTML=data;
    })
    .fail(function(data) {
        alert('Error: ' + data);
    });
    disablBouton();
    barreNav();
    


}

function suppContenu(){
	docCourant=chemin;
	/*console.log(document.getElementById(id).innerHTML);*/
	/*if (document.getElementById(id)!=null){
		document.getElementById(id).innerHTML="";
	}*/
	/*document.getElementById(id).innerHTML="<article class='col-xs-3'><a href="' . $fichier . '">' . $fichier . '</a></article>";*/
	
}
function retourParent(){
	if (chemin!=".."){
		suppContenu();
		barreNav();
		

		
		/*console.log(chemin);*/
		$.get('./send-ajax-data.php',{
			param : chemin ,
			/*$('#text').val()*/
			fonctiAppel:1,

		})
	    .done(function(data) {
	        OpenRetourDoc(data);
	        chemin=data;
/*	        console.log(chemin);*/
	       	/*document.getElementById(id).innerHTML=data;*/
	    })
	    .fail(function(data) {
	        alert('Error: ' + data);
	    });
	}
	disablBouton();
	barreNav();


}
function OpenRetourDoc(name){
	suppContenu();

	chemin=name;
	$.get('./send-ajax-data.php',{
		param : name ,
		/*$('#text').val()*/
		fonctiAppel:0,

	})
    .done(function(data) {
        /*alert(data);*/
       	document.getElementById(id).innerHTML=data;

    })
    .fail(function(data) {
        alert('Error: ' + data);
    });
    /*retourVarChemin();*/


}
function disablBouton(){

	if (chemin==".."){
		document.getElementById('test').disabled  = true;
	}else{
		document.getElementById('test').disabled  = false;
	}
	
}

function barreNav(){

	$.get('./send-ajax-data.php',{
		param : chemin ,
		/*$('#text').val()*/
		fonctiAppel:3,

	})
    .done(function(data) {
        /*alert(data);*/
       	document.getElementById("barNav").innerHTML=data;


    })
    .fail(function(data) {
        alert('Error: ' + data);
    });

}

function retourVarChemin(name){
	/*console.log(chemin);*/
/*	tabChemin=chemin.split("/");
	
	for (var i = 0 ; tabChemin.length > i; i++) {
		if(docCourant!=tabChemin[i]){
			chemin
		}
	}*/
	/*console.log(name);*/
	chemin=name.id;
	suppContenu();

	$.get('./send-ajax-data.php',{
		param : name.id ,
		/*$('#text').val()*/
		fonctiAppel:4,

	})
    .done(function(data) {
        /*alert(data);*/
       	document.getElementById(id).innerHTML=data;

    })
    .fail(function(data) {
        alert('Error: ' + data);
    });
    disablBouton();
	barreNav();

}
