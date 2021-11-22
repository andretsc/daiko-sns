<?php

// set page headers
$page_title = "登録ページ";
include_once "../cabecalho/header.php";

// read user button



// isset() is a PHP function used to verify if ID is there or not
 
// get database connection
include_once '../classes/database.php';
include_once '../classes/videos.php';
include_once '../initial.php';

// check if the form is submitted
if ($_POST){


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

$valido=$cmd->unicovideo($link);
 
 if($valido<=0){
   // set user property values
   $cmd->v_url = $link;
    $cmd->v_date = htmlentities(trim($_POST['cmd_datacad']));
    $cmd->v_idpess = htmlentities(trim($_POST['cmd_pmcad']));
	$cmd->v_titulo = htmlentities(trim($_POST['cmd_titulo']));
	$cmd->v_cat = $_POST['cat_id'];


    // if the user able to create
    if($cmd->create()){
        echo "<div class=\"alert alert-success\">";
         
            echo "Sucesso! Cadastrado com sucesso.";
        echo "</div>";
				?><script>
window.location.replace("create.php");
</script>
<?php
       
    }

    // if the user unable to create
    else{
        echo "<div class=\"alert alert-danger\">";
            
            echo "登録エラー、含めることはできません！";
        echo "</div>";
    }
	
 }else{
	 echo "ビデオはすでに登録されています、エラー！";
 }
}
?>
<br><br><br>
<!-- Bootstrap Form for creating a user -->
 <?php 
			  echo "<div class='left-button-margin'>";
echo "<a href='index.php' class='btn btn-warning'>";
echo "<span class='glyphicon glyphicon-plus'></span><i class='fa fa-chevron-circle-left' aria-hidden='true'></i> ホームビデオ";
echo "</a>";
echo "</div>";
 
   ?>
<form action='create.php' role="form" method='post'>
<br><br><br><br><br><br>
    <table class='table table-hover table-responsive table-bordered'>

       
                
              <tr>
                <td>題名</td>
                 <td><input type='text' id='cmd_titulo' name='cmd_titulo' size="50" class='form-control' placeholder="題名" required></td>
           
            </tr>
			 <tr>
            <td>タイプ</td>
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

                            echo "<option value='$id'> $name </option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>
           <tr>
                <td>動画URL</td>
                 <td><input type='text' id='cmd_nome' name='cmd_nome' size="50" class='form-control' placeholder="https://www.youtube.com/watch?v=iKNlnwz1Czg" required></td>
           
            </tr>
            
			 <td><input type='hidden' name='cmd_pmcad' value='<?php echo $_SESSION["appmlidpess"]; ?>'  class='form-control'  required></td>
           
			
                
                <td><input type='hidden' name='cmd_datacad' value='<?php echo date("Y-m-d h:i:s");?>' class='form-control' ></td>
           
		
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> 登録する
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "../cabecalho/footer.php";
?>
 
