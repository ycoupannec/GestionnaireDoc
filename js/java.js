var testet="test";


var id="explorer";
var chemin="..";


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
}

function OpenDoc(champ){
	suppContenu();
	
	chemin+="/"+champ.id;
	console.log(chemin);
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
    


}

function suppContenu(){
	/*console.log(document.getElementById(id).innerHTML);*/
	if (document.getElementById(id)!=null){
		document.getElementById(id).innerHTML="";
	}
	/*document.getElementById(id).innerHTML="<article class='col-xs-3'><a href="' . $fichier . '">' . $fichier . '</a></article>";*/
	
}
function retourParent(){
	if (chemin!=".."){
		suppContenu();

		
		console.log(chemin);
		$.get('./send-ajax-data.php',{
			param : chemin ,
			/*$('#text').val()*/
			fonctiAppel:1,

		})
	    .done(function(data) {
	        OpenRetourDoc(data);
	       	/*document.getElementById(id).innerHTML=data;*/
	    })
	    .fail(function(data) {
	        alert('Error: ' + data);
	    });
	}
	disablBouton();



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


}
function disablBouton(){

	console.log(chemin);
	if (chemin==".."){
		document.getElementById('test').disabled  = true;
	}else{
		document.getElementById('test').disabled  = false;
	}
	
}

