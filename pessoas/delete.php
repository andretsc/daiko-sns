<?php

//set page headers
$page_title = "Excluir";
include_once "../cabecalho/header.php";
include_once '../classes/database.php';
include_once '../classes/pessoa.php';
include_once '../initial.php';
// get database connection

$user = new Pessoa($db);
if($_SESSION['appmlpriv']!=1 )
	{
		
			?>
<script>
setTimeout(function() {
            window.location.href = "../videos";
        }, 100);
</script>
<?php
	}
	
error_reporting(E_ERROR | E_PARSE);



// check if the submit button yes was clicked
if (isset($_POST['del-btn']))
{
    $id = $_GET['id'];
    $user->delete($id);
    header("Location: delete.php?deleted");
}
      // check if the user was deleted
      if(isset($_GET['deleted'])){
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                    &times;
              </button>";
        echo "Success! Excluido com sucesso.";
        echo "</div>";
      }
?>
<!-- Bootstrap Form for deleting a user -->
<?php
    if (isset($_GET['id'])) {
        echo "<form method='post'>";
            echo "<table class='table table-hover table-responsive table-bordered'>";
                echo "<input type='hidden' name='id' value='id' />";
                    echo"<div class='alert alert-warning'>";
                        echo"Deseja realmente excluir?";
                    echo"</div>";
                echo"<button type='submit' class='btn btn-danger' name='del-btn'>";
                    echo"Sim";
                echo"</button>";
                    echo str_repeat('&nbsp;', 2);
                echo"<a href='index.php' class='btn btn-default' role='button'>";
                    echo" Nao";
                echo"</a>";
            echo"</table>";
        echo"</form>";
    }
else {  // Back to the first page
        echo"<a href='index.php' class='btn btn-large btn-success'><span class='glyphicon glyphicon-backward'></span> Home </a>";
     }
?>
