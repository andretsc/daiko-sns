<?php
// set page headers
$page_title = "ビデオアップデート";
include_once "../cabecalho/header.php";

$pessoa=$_SESSION["appmlidpess"];

?>
<br><br><br>
<?php
// read user button
echo "<div class='left-button-margin'>";
    echo "<a href='index.php' class='btn btn-warning'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span><i class='fa fa-chevron-circle-left' aria-hidden='true'></i>  ホームビデオ ";
    echo "</a>";
echo "</div><br><br><br>";

// isset() is a PHP function used to verify if ID is there or not
$cmd_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object user file
include_once '../classes/database.php';
include_once '../classes/videos.php';
include_once '../initial.php';

// instantiate user object
$cmd = new Videos($db);
$cmd->v_id = $cmd_id;
$cmd->getName();

// check if the form is submitted
if($_POST)
{
$cmd = new Videos($db);

function youtube($nome) {
	
	if (mb_strpos($nome, 'youtube') !== false) {
		
	return $nome;
}
else{
	?>
	<script>
	alert('Link não Valido');
	 window.history.go(-1);
	</script>
	<?php
  
 
  exit;
  
	}
}
 
$link= str_replace("https://www.youtube.com/watch?v=","",youtube($_POST['cmd_nome']));


		 
		 
    $cmd->v_url = $link;
    $cmd->v_date = htmlentities(trim($_POST['cmd_datacad']));
	$cmd->v_titulo = htmlentities(trim($_POST['cmd_titulo']));
	$cmd->v_categoria = $_POST['cat_id'];
    $cmd->v_idpess = $_POST['cmd_pmcad'];
	$cmd->v_id = $cmd_id;
	

    // Edit user
    if($cmd->update()){ 
        echo "<div class=\"alert alert-success\">";
         
            echo "アップデートをしました.";
        echo "</div>";
    }

    // if unable to edit user
    else{
        echo "<div class=\"alert alert-danger\">";
            
            echo "エラー!アップデートできません";
        echo "</div>";
    }
	
}

?>
<br><br><br>
    <!-- Bootstrap Form for updating a user -->
    <form action='edit.php?id=<?php echo $cmd_id; ?>' method='post'>
<br><br><br><br><br><br>
        <table class='table table-hover table-responsive table-bordered'>

   <tr>
                <td>Titulo</td>
                 <td><input type='text' id='cmd_titulo' value='<?php echo $cmd->v_titulo;?>' name='cmd_titulo' size="50" class='form-control' placeholder="Titulo" required></td>
           
            </tr>
			 <tr>
            <td>Categoria</td>
            <td>
                <?php
                    // choose user categories
                    include_once '../classes/catvideo.php';

                    $category = new Catvideo($db);
                    $prep_state = $category->getAll();
                    echo "<select class='form-control' name='cat_id'>";

                        echo "<option>--- Select Categoria ---</option>";

                        while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_category);
                        if($cmd->v_cat == $id){ //if user category_id is equal to category id,
                            echo "<option value='$id' selected>"; //Specifies that an option should be pre-selected when the page loads
                        }else{
                            echo "<option value='$id'>";
                        }

						echo "$name </option>";
                    }
                    echo "</select>";
                ?>
            </td>
        </tr>
            <tr>
                <td>Video</td>
                 <td><input type='text' id='cmd_nome' name='cmd_nome' value='https://www.youtube.com/watch?v=<?php echo $cmd->v_url;?>' size="50" class='form-control' placeholder="Video" required></td>
           
            </tr>
            
			 <td><input type='hidden' name='cmd_pmcad' value='<?php echo $pessoa; ?>'  class='form-control'  required></td>
           
			
                
                <td><input type='hidden' name='cmd_datacad' value='<?php echo date("Y-m-d h:i:s");?>' class='form-control' ></td>
           
		
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> 変更
                    </button>
                </td>
            </tr>

        </table>
    </form>
 </div>
<?php
include_once "../cabecalho/footer.php";
?>
