<?php
header( 'content-type: text/html; charset=utf-8' );
$page_title = "Videos";
include_once '../cabecalho/header.php';
// include database and object files
include_once '../classes/database.php';
include_once '../classes/videos.php';
include_once '../initial.php';

// for pagination purposes
//$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$vcat = isset($_GET['id']) ? $_GET['id'] : 0;
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 15; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page;


$pessoa = isset($_SESSION["appmlidpess"]) ? $_SESSION["appmlidpess"] : 0;

$cmd = new Videos($db);
// include header file

?>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
}

.header {
  text-align: center;
  padding: 32px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 50%;
  padding: 30px 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 80%;
    flex: 80%;
    max-width: 80%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}

#mySidenav a {
  position: fixed;
  bottom: 0;
 margin-left:5%;
  transition: 0.2s;
  padding: 15px;
  width: 60px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 20px 15px 15px 20px;
 
}

#mySidenav a:hover {
  top: 80%;
}

#filme {
  left: 0px;
  background-color: #04AA6D;
}

#musical {
  left: 60px;
  background-color: #2196F3;
}

#esport {
  left: 120px;
  background-color: #f44336;
}

#educativo {
  left: 180px;
  background-color: #555
}
#novo {
  right: 30px;
  background-color: #f44336;
  border: 3px solid dodgerblue;
	background:rgba(62, 162, 27, 0.8);
	backdrop-filter:blur(2px);
	border-radius:40px;
	padding:20px;
}
</style>
<div class="header">
  <h2>代行 SNSギャラリー</h2>
 <hr>
 
</div>


<?php
include_once 'pagination.php';
if($vcat==0){
$prep_state = $cmd->getAll($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
}else {
	$prep_state = $cmd->getcat($vcat,$from_record_num, $records_per_page);
}
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<div class='col mb-4'>";
    echo "<tr>";
	echo "<th></th>";
  
    echo "<th></th>";
    echo "</tr></thead><tbody>";
 echo "<div class='row'><div id='message'></div>";
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

       echo "<hr>";
	   echo "";
  echo "<div class='column' id=''>";
  
		echo "<td><div class='card'><h4>$row[v_titulo]</h4><iframe src=https://www.youtube.com/embed/$row[v_url]?controls=1&modestbranding=1&showinfo=0&playsinline=0 frameborder='0'  allowfullscreen autohide id='$row[v_id]'></iframe>";
				if($priv==1) {
echo "<div class='container'>
    <a class='btn btn-primary' href='edit.php?id=" . $v_id . "' style='background:green'><i class='fa fa-pencil-square' aria-hidden='true'></i> ビデオアップデート</a>
    <a class='btn btn-primary' href='delete.php?id=" . $v_id . "' style='background:red'><i class='fa fa-trash-o' aria-hidden='true'></i> 消去</a>
    </div></div>
";
 echo "</td>";
}else
	{
    echo "";
	}
        echo "<hr>";
		
       	echo "</div>";
			}	
   echo "<br>";  
   echo "<br>";
        echo "</div>";	
		
	echo "</tbody><tfoot><tr>";
	echo "<th></th>";
    
    
    echo "<th></th>";
   
									echo "</tr>
								</tfoot>
							</table>
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
<?php

include_once "../cabecalho/footer.php";

?>
<script>

function grupo(grux,ree){
	
   
    var vd = grux;
	 var ps = ree;
	 
$.ajax({
        type: "POST",
        url: "salvaclick.php",
        data: {
			video: vd,
            pessoa: ps
        },
        success: (data, status, jqXHR) => {
           clearInterval(monitor);
           
 //alert("salvo com sucesso")
         
        },
    })
}

var monitor = setInterval(function(){
    var elem = document.activeElement;
    if(elem && elem.tagName == 'IFRAME'){
				//message.innerHTML = 'Clicked ' + elem.id + '-'+<?php echo $pessoa; ?>;
				grupo(elem.id,<?php echo $pessoa; ?>)
         //
    } else {
        		//message.innerHTML = '---';
    }

}, 500);

</script>