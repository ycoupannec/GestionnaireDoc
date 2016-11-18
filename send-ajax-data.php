<?php

/*	$email = $_REQUEST['tMail'];

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    echo 'Cet email est correct.';
	} else {
	    echo 'Cet email a un format non adapté.';
	}*/


	/*---------------------------------------------------------------------------------------------------------------------*/

	/*	$fonctiAppel : est une variable qui contient un entier. Elle permettra d'appeler la fonction demandé.
			- 0 : fonction openDoc()
			- 1 : fonction backDoc()



	*/
	$fonctiAppel=$_REQUEST['fonctiAppel'];
	/*---------------------------------------------------------------------------------------------------------------------*/
	/*	$param : est une variable qui contient une chaine de caractere. Elle permettra de passer les parametres utilisé dans les fonctions.*/
	$param=$_REQUEST['param'];
	/*---------------------------------------------------------------------------------------------------------------------*/
	/* $retourne : est une variable qui contient une chaine de caractere. Elle permettra de contenir les infos renvoyé. */
	$retourne="";

	
	switch ($fonctiAppel) {
		case 0:

			/*system.out.println("some");*/
			/*openDoc() fonction pour ouvrir le document selectionné.*/
			if($dossier = opendir($param)){

				while(false !== ($fichier = readdir($dossier)))
				{	

					if($fichier != '.' && $fichier != '..')
					{


						if (strpos($fichier,".")===false){
								echo '<article class="col-xs-3" onclick="OpenDoc(this)" id="' . $fichier . '"><div >' . $fichier . '</div></article>';	
							}else {
								echo '<article class="col-xs-3"><a href="' . $fichier . '" download=' . $fichier . '>' . $fichier . '</a></article>';	
								
							}
					}	 

				}
				closedir($dossier);
			}else{
				echo'Le dossier n\'a pas pu être ouvert.';
				
			}

			/*echo $retourne;*/


			# code...
			break;
		case 1:

			if($dossier = opendir($param)){
				$test= dirname( $param );
				echo  $test;
			}

			# code...
			break;
		case 2:
			$param=$_SERVER["DOCUMENT_ROOT"];

			if($dossier = opendir($param)){

				while(false !== ($fichier = readdir($dossier)))
				{	

					if($fichier != '.' && $fichier != '..')
					{


						if (strpos($fichier,".")===false){
								echo '<article class="col-xs-3" onclick="OpenDoc(this)" id="' . $fichier . '"><div >' . $fichier . '</div></article>';	
							}else {
								echo '<article class="col-xs-3"><a href="' . realpath ($fichier). '" download=' . $fichier . '>' . $fichier . '</a></article>';	
								
							}
					}	 

				}
				closedir($dossier);
			}else{
				echo'Le dossier n\'a pas pu être ouvert.';
				
			}

		 	

			# code...
			break;
		
		default:
			# code...
			break;
	}

?>
