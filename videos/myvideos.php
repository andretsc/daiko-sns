<?php
header( 'content-type: text/html; charset=utf-8' );
$page_title = "Videos";
include_once '../cabecalho/header.php';
// include database and object files
include_once '../classes/database.php';
include_once '../classes/videos.php';
include_once '../initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 50; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and user object

$cmd = new Videos($db);
// include header file

?>

<br><br>
<?php
$idpess=$_SESSION['appmlidpess'];
if(isset ($_SESSION['appmluser'])  ) {// create user button
echo "<br><br><div class='left-button-margin'>";
echo "<a href='create.php' class='btn btn-primary'>";
echo "<span class='glyphicon glyphicon-plus'></span> 登録する";
echo "</a>";
echo "</div>";
}
// select all users
$prep_state = $cmd->getMyvideos($idpess); 

$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<div class='card'>
					<div class='card-body'>
						<div class='table-responsive'>
							<table id='example2' class='table table-striped table-bordered'>
								<thead>";
    echo "<tr>";
	echo "<th></th>";
  
    echo "<th></th>";
    echo "</tr></thead><tbody>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";

        echo "<td>";
        echo "<br>";
		echo "<iframe id='firstembed' width='300' height='250' src=https://www.youtube.com/embed/$row[v_url] frameborder='0' controls='0'  allowfullscreen></iframe>";
        echo "<br>";
        
        
        // edit user button
        
// edit user button

		if(isset ($_SESSION['appmluser']) ) {
echo "
    <a class='btn btn-primary' href='edit.php?id=" . $v_id . "' style='background:green'><i class='fa fa-pencil-square' aria-hidden='true'></i> 変更</a>
    <a class='btn btn-primary' href='delete.php?id=" . $v_id . "' style='background:red'><i class='fa fa-trash-o' aria-hidden='true'></i> 消去</a>
    
  </div>
</div>";
 echo "</td>";
}else
	{
    echo "";
	}
									
			echo "</tr>";	}					
	echo "</tbody><tfoot><tr>";
	echo "<th></th>";
    
    
    echo "<th></th>";
   
									echo "</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>";

    // include pagination file
    //include_once 'pagination.php';

}
// if there are no user
else{
    echo "<div> No User found. </div>";
    }
?>
<script src="jquery.min.js"></script>
  <script>
  var iframe = $('#firstembed').contents();
iframe.find("src").click(function(){
   alert("test");
});
  </script>

<?php
include_once "../cabecalho/footer.php";
?>
