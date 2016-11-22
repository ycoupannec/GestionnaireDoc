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
								echo '<article class="col-xs-6 col-md-3" onclick="OpenDoc(this)" id="' . $fichier . '"><div class="glyphicon glyphicon-folder-close" ><p class="filename" >' . $fichier . '</div></article>';	
							}else {
								$stat=stat( realpath ($param.'/'.$fichier));

								echo '<article class="col-xs-6 col-md-3"><a class="glyphicon glyphicon-file" href="' .$param.'/'. $fichier. '" download=' . $fichier . '><p class="filename" >' . $fichier.'' ;	
								if (!$stat){
									echo ' Appel à stat() a échoué...';
								}else{
									echo '<div class="infoFichier"> Modif. :'.date ("F d Y H:i:s.", $stat["mtime"]).'</br>Taille. :'.$stat["size"].' octets';
								}
								echo'</div></p></a></article>';
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
			/*$param=$_SERVER["DOCUMENT_ROOT"];*/

			/*if($dossier = opendir($param)){

				while(false !== ($fichier = readdir($dossier)))
				{	

					if($fichier != '.' && $fichier != '..')
					{


						if (strpos($fichier,".")===false){
								echo '<article class="col-xs-6 col-md-3" onclick="OpenDoc(this)" id="' . $fichier . '"><div class="glyphicon glyphicon-folder-close" ><p class="filename" >' . $fichier . '</div></article>';	
							}else {
								$stat=stat( realpath ($param.'/'.$fichier));

								echo '<article class="col-xs-6 col-md-3"><a class="glyphicon glyphicon-file" href="' .$param.'/'. $fichier. '" download=' . $fichier . '><p class="filename" >' . $fichier.'' ;	
								if (!$stat){
									echo ' Appel à stat() a échoué...';
								}else{
									echo '<div class="infoFichier"> Modif. :'.date ("F d Y H:i:s.", $stat["mtime"]).'</br>Taille. :'.$stat["size"].' octets';
								}
								echo'</div></p></a></article>';
							}
					}	 

				}
				closedir($dossier);
			}else{
				echo'Le dossier n\'a pas pu être ouvert.';
				
			}
*/
		 	

			# code...
			break;
		
		case 3:
			
			$champ = explode("/", $param);
			$lienChemin="";

			
			foreach ($champ as $value) {
				if ($value!=""){
						$lienChemin.=$value."/";
			    		echo '<a class="breadcrumb-item" onclick="retourVarChemin(this)" id="' . $lienChemin . '" >'.$value.'</a>';	
				}
				
			}
			
			# code...
			break;
		case 4:

			/*$param=$_SERVER["DOCUMENT_ROOT"];*/
			/*echo $param;*/
			$files=scandir($param);
			/*echo $param;*/

			/*if($dossier = opendir($files)){*/

				foreach ($files as $value)
				{	

					if($value != '.' && $value != '..')
					{


						if (strpos($value,".")===false){
								echo '<article class="col-xs-6 col-md-3" onclick="OpenDoc(this)" id="' . $value . '"><div class="glyphicon glyphicon-folder-close" ><p class="filename" >' . $value . '</div></article>';	
							}else {
								$stat=stat( realpath ($param.'/'.$value));

								echo '<article class="col-xs-6 col-md-3"><a class="glyphicon glyphicon-file" href="' .$param.'/'. $value. '" download=' . $value . '><p class="filename" >' . $value.'' ;	
								if (!$stat){
									echo ' Appel à stat() a échoué...';
								}else{
									echo '<div class="infoFichier"> Modif. :'.date ("F d Y H:i:s.", $stat["mtime"]).'</br>Taille. :'.$stat["size"].' octets';
								}
								echo'</div></p></a></article>';
							}
					}	 

				}
				/*closedir($dossier);*/
			/*}else{
				echo'Le dossier n\'a pas pu être ouvert.';
				
			}*/

			break;
		default:
			# code...
			break;
	}

?>
