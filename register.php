<?php
	include_once('models/fonctions.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="container">
      <!-- Example row of columns -->
      
      <?php 
	  	//Si $_POST
	  	if(isset($_POST['action'])) {

		$test_me = add_user();
		//echo $test_me;
      
        if(is_numeric($test_me))
		{ 
		?>
		<div class="row">
            <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert alert-success"><strong><?php echo $_POST['mem_user_name']; ?></strong> a bienété ajouté comme membre.
                    </div>
                </div>
            <div class="col-lg-3"></div>
          </div>
		<?php
		} else {
		?>
          <div class="row">
            <div class="col-lg-3"></div>
                <div class="col-lg-6">                
                    <div class="alert alert-danger"><strong>FAILED!</strong>< /br><?php echo $test_me; ?></div>
                    </div>
                </div>
            <div class="col-lg-3"></div>
          </div>				
		<?php
			}
		}	  
		?>
      
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="navbar-form navbar-right">
        <input type="hidden" name="action" id="add_member">
        <input type="hidden" name="fk_mem_access_lvl" id="fk_mem_access_lvl" value="1">
        
            <div class="form-group">
              <input name="mem_name" type="text" class="form-control" placeholder="Nom" maxlength="50">
            </div>
            <div class="form-group">
              <input name="mem_user_name" type="text" class="form-control" placeholder="Avatar">
            </div>
            <div class="form-group">
              <input name="mem_password" type="text" class="form-control" placeholder="Pass">
            </div>
            <div class="form-group">
              <input name="mem_email" type="text" class="form-control" placeholder="Courriel">
            </div>
            <div class="form-group">
              <input name="mem_phone" type="text" class="form-control" placeholder="Telephone">
            </div>

            <div class="form-group">
            <label for="fk_mem_lvl"></label>

            <?php
            //MODIFICATIONS APPORTE PAR MANON DIM. 22DEC - REMPLIS LE SELECT AVEC LES ITEMS DE LA BASE DE DONNEES
            $conn = new mysqli('urdex.db.10723639.hostedresource.com', 'urdex', 'Poutine08!', 'urdex')
            or die ('Cannot connect to db');

            $result = $conn->query("SELECT lvl_id, lvl_short_desc FROM urbex_levels");

            echo "<select name = fk_mem_lvl>";

            while ($row = $result->fetch_assoc()) {

                unset($id, $name);
                $id = $row['lvl_id'];
                $desc = $row['lvl_short_desc'];
                echo '<option value="'.$id.'">'.$desc.'</option>';

            }

            echo "</select>";
            //FIN DE MODIFICATIONS
            ?>
          </div>




          <div class="form-group">
              <button type="submit" class="btn btn-success">Soumetre</button>
            </div>
          </form>
        
        </div>
        <div class="col-lg-3"></div>
      </div>
    </div> <!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
