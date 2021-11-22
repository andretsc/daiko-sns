<?php
$page_title = "ユーザー";
include_once '../cabecalho/header.php';
// include database and object files
include_once '../classes/database.php';
include_once '../classes/pessoa.php';
include_once '../classes/category.php';
include_once '../initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and user object
$user = new Pessoa($db);
$category = new Category($db);

// include header file
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


// create user button


// select all users
$prep_state = $user->getAllUsers($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){
echo "<br><br><br>";
    echo "<table class='table table-hover table-responsive table-bordered'><br>";
    echo "<tr>";
    echo "<th>氏名</th>";
    echo "<th>メールアドレス</th>";
    echo "<th>レベル</th>";
    echo "<th>オプション</th>";
    echo "</tr>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";

        echo "<td>$row[pess_nome]</td>";
        echo "<td>$row[pess_email]</td>";
        

        echo "<td>";
                    $category->id = $category_id;
					$category->getName();
					echo $category->name;
        echo "</td>";

        echo "<td>";
        // edit user button
        echo "<a href='edit.php?id=" . $id_pess . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</a>";

        // delete user button
        echo "<a href='delete.php?id=" . $id_pess . "' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // include pagination file
    include_once 'pagination.php';
}

// if there are no user
else{
    echo "<div> No User found. </div>";
    }
?>

