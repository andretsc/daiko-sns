<?php

//set page headers
$page_title = "Excluir Video";
include_once "../cabecalho/header.php";
?>

<?php
include_once '../classes/database.php';
include_once '../classes/videos.php';
include_once '../initial.php';
// get database connection

$cmd = new Videos($db);
// check if the submit button yes was clicked
if (isset($_POST['del-btn']))
{
    $cmd_id = $_GET['id'];
    $cmd->delete($cmd_id);
   //header("Location: delete.php?deleted");
	?><script>
window.location.replace("delete.php?deleted");
</script>
<?php
}
      // check if the user was deleted
      if(isset($_GET['deleted'])){
      echo "<div class=\"alert alert-success\">";
         
            echo "ビデオは削除されました";
      }
?>

<!-- Bootstrap Form for deleting a user -->
<?php
    if (isset($_GET['id'])) {
        echo "<form method='post'>";
            echo "<table class='table table-hover table-responsive table-bordered'>";
                echo "<input type='hidden' name='id' value='id' />";
                    echo"<div class='alert alert-warning'>";
					 echo"<br><br><br>";
                        echo"本当に削除しますか？";
                    echo"</div>";
                echo"<button type='submit' class='btn btn-danger' name='del-btn'>";
                    echo"はい";
                echo"</button>";
                    echo str_repeat('&nbsp;', 2);
                echo"<a href='index.php' class='btn btn-default' role='button'>";
                    echo" いええ";
                echo"</a>";
            echo"</table>";
        echo"</form>";
    }
else {  // Back to the first page
        echo"<a href='index.php' class='btn btn-large btn-success'><span class='glyphicon glyphicon-backward'></span> トップ </a>";
		?><script>
window.location.replace("index.php");
</script>
<?php
     }
?>

<?php
include_once "../cabecalho/footer.php";
?>