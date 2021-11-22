<?php

include_once '../classes/database.php';
include_once '../classes/videos.php';
include_once '../initial.php';


if ($_POST){

    // instantiate user object
    include_once '../classes/user.php';
	$videos = new Videos($db);

$videos->c_idvideo = $_POST['video'];
$videos->c_idpessoa = $_POST['pessoa'];

            
          
  if($videos->createclique()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Successo! Cadastrado.";
			//header("Location: escala.php");
        echo "</div>";
    }

    // if the user unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Não pode cadastrar.";
        echo "</div>";
    }

}
?>