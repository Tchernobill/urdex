<?php

/**
 *Allo Manon, ici vas les fonctions generals pour le site
 *
 * En passant, jete un oeil a http://manual.phpdoc.org/HTMLSmartyConverter/HandS/phpDocumentor/tutorial_phpDocumentor.quickstart.pkg.html
 * ca donne un peu le standard presque officiel pour ecrire une entete (en comments) aux fonctions, comme ca quand tu t'en sert des mois plus tard,
 * Il te montre directement dans l'editeur quel parametres ta fonction prend, sans que t'ai a aller voir son code.
 *
 *
*/



/**
 * Fonction qui genere le HTML pour la quantité d'articles demandé
 * @todo -Implémenter du code pour cree du vrai html a partir de la DB plutot que des placeholders.
 * @author Yan
 * @version 0.1a
 * @param int $num
 * @return string
 */
function randomArticles($num){	
	for($i=0;$i<=$num;$i++)
	{	
		echo
		'<!--Thumbnail ', $num, ' Start-->',
		'<div class="mega-entry cat-all cat-one cat-four" id="entry-', $num, '" data-src="http://placehold.it/504x400" data-width="504" data-height="400">',
			
			'<!--Hover Effect Start-->',
			'<div class="mega-hover alone">',
			
				'<!--Title and Subtitle-->',
				'<div class="mega-hovertitle">This is ', $num, '',
					'<div class="mega-hoversubtitle">gallery subtitle</div>',
				'</div>',
				
				'<!-- Preview Button -->',
				'<a class="fancybox" data-fancybox-group="group" href="http://placehold.it/504x400">',
					'<div class="mega-hoverview mega-zoom"></div>',
				'</a>',
				
			'</div>',
			'<!--Hover Effect End-->',
		'</div><!--Thumbnail  ', $num, ' End-->';
	}
 }


/**
 * Fonction qui cree un object contenant la conection a la DB
 * @todo -Le login / pass / DB sont hardcoder dedant, ils devrai etres 
 * dans un fichiers config separé, sous forme d'array que la conction receverai
 * en parametre ?
 * @author Yan
 * @version 0.5
 * @return connection object
 */
function connect()
{
	$dsn = "mysql:host=urdex.db.10723639.hostedresource.com;dbname=urdex";
	$dbUsername = 'urdex';
	$dbPassword = 'Poutine08!';
	
	try {
			$bdd = new PDO($dsn, $dbUsername, $dbPassword);
	//      echo ('Connection was a success!');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $bdd;
	}
	catch(PDOException $e) {
			return $e->getMessage();
	}
}

/**
 * Fonction qui ajoute les users dans la DB, elle prend tout ses variables
 * du array $_POST[]
 * @return int
 * @todo Un javascript sur la page du form devra validé le formatage des infos
 * - Nick; Deja utilisé dans la db ?
 * - Pass; 8 lettres ou plus, avec nombres et majuscule
 * - Email; XXXX @ XXXX . XXX (Regex power baby !!)
 * - Phone; XXX - xxx - xxxx (Regex power baby !!)
 * @author Yan
 * @version 0.7
 * @return int
 */
function add_user(){
	$mem_name=$_POST['mem_name'];
	$mem_user_name=$_POST['mem_user_name'];
	$mem_password=md5($_POST['mem_password']); //Encrypte le mot de passe
    $mem_email=$_POST['mem_email'];
    $mem_phone=$_POST['mem_phone'];
    $fk_mem_lvl=$_POST['fk_mem_lvl'];
    $fk_mem_access_lvl=$_POST['fk_mem_access_lvl'];

	try
	{
		$bdd = connect();

        // Then you can prepare a statement and execute it.
        $stmt = $bdd->prepare("CALL ADD_MEMBER(?, ?, ?, ?, ?, ?, ?)");
        // One bindParam() call per parameter
        $stmt->bindParam(1, $mem_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $mem_user_name, PDO::PARAM_STR);
        $stmt->bindParam(3, $mem_password, PDO::PARAM_STR);
        $stmt->bindParam(4, $mem_email, PDO::PARAM_STR);
        $stmt->bindParam(5, $mem_phone, PDO::PARAM_STR);
        $stmt->bindParam(6, $fk_mem_lvl, PDO::PARAM_INT);
        $stmt->bindParam(7, $fk_mem_access_lvl, PDO::PARAM_INT);

        // call the stored procedure
        $stmt->execute();

        //Yan: Cette nouvelle fonction ne semble pas retourner le ID du membre nouvellement cree, Ca prend le ID pour validé dans la boire verte que ca a bien fonctioné.

        /**
        $req = $bdd->prepare('INSERT INTO members(mem_name, mem_user_name, mem_password, mem_email, mem_phone, fk_mem_lvl, fk_mem_access_id) VALUES(:mem_name, :mem_user_name, :mem_password, :mem_email, :mem_phone, :fk_mem_lvl, :fk_mem_access_id)') or die(print_r($bdd->errorInfo()));
		//$req et execute() sont utiliser parce que il faut injecter des parametres variable dans la requete, via prepare(). Si aucune variable serai necessaires, on pourait harcoder la requete.
		$req->execute(array(
			'mem_name' => $mem_name,
			'mem_user_name' => $mem_user_name,
			'mem_password' => $mem_password,
			'mem_email' => $mem_email,
			'mem_phone' => $mem_phone,
			'fk_mem_lvl' => $fk_mem_lvl,
			'fk_mem_access_id' => $fk_mem_access_lvl
			));
			
		$mem_id = $bdd->lastInsertId(); //Remplis $mem_id avec le id fraichement crée, et le retourne
		$req->closeCursor(); // Termine le traitement de la requête
		return $mem_id;
         * **/
	}
	catch(PDOException $e) {
		return $e->getMessage();
	}
}