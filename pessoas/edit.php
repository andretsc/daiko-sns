<?php
// set page headers
$page_title = "Edit User";
include_once "../cabecalho/header.php";

// read user button
echo "<div class='left-button-margin'><br><br>";
    echo "<a href='index.php' class='btn btn-info pull-left'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Usuários ";
    echo "</a>";
echo "</div>";


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
// isset() is a PHP function used to verify if ID is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object user file
include_once '../classes/database.php';
include_once '../classes/pessoa.php';
include_once '../initial.php';

// instantiate user object
$user = new Pessoa($db);
$user->id_pess = $id;
$user->getUser();


	
error_reporting(E_ERROR | E_PARSE);

// check if the form is submitted
if($_POST)
{

    // set user property values
    $user->pess_nome = htmlentities(trim($_POST['pess_nome']));
    $user->pess_login = htmlentities(trim($_POST['pess_login']));
    $user->category_id = $_POST['category_id'];

    // Edit user
    if($user->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Atualizado com sucesso.";
        echo "</div>";
    }

    // if unable to edit user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Unable to edit user.";
        echo "</div>";
    }
}
?>

    <!-- Bootstrap Form for updating a user -->
    <form action='edit.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>Nome</td>
                <td><input type='text' name='pess_nome' value='<?php echo $user->pess_nome;?>' class='form-control' placeholder="Enter First Name" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='text' name='pess_login' value='<?php echo $user->pess_login;?>' class='form-control' placeholder="Enter Last Name" required></td>
            </tr>

            

            <tr>
                <td>Privilegio</td>
                <td>

                    <?php
                    // read the user categories from the database
                    include_once '../classes/category.php';

                    $category = new Category($db);
                    $prep_state = $category->getAll();

                    // put them in a select drop-down
                    echo "<select class='form-control' name='category_id'>";
                    echo "<option>--- Selecione o privilegio ---</option>";

                    while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){
                        extract($row_category);

                        // current category of the person must be selected
						if($user->category_id == $id){ //if user category_id is equal to category id,
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
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> 変更
                    </button>
                </td>
            </tr>

        </table>
    </form>
