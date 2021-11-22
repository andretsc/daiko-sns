<?php

class Pessoa
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "pessoa";

    // object properties
    public $id_pess ;
    public $pess_nome;
    public $pess_login;
	public $pess_senha;
    public $pess_email;
   

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " 
		SET 
		pess_nome = ?, 
		pess_login = ?,
		pess_senha = ?,
		pess_email = ?
		";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->pess_nome);
        $prep_state->bindParam(2, $this->pess_login);
		$prep_state->bindParam(3, $this->pess_senha);
        $prep_state->bindParam(4, $this->pess_email);
		
        if ($prep_state->execute()) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id_pess  FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " 
		SET 
		pess_nome = :pess_nome,
		pess_login = :pess_login,
		pess_email = :pess_login,
		category_id = :category_id
		WHERE id_pess  = :id_pess ";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':pess_nome', $this->pess_nome);
        $prep_state->bindParam(':pess_login', $this->pess_login);
        $prep_state->bindParam(':category_id', $this->category_id);
        $prep_state->bindParam(':id_pess', $this->id_pess);
		
		

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }
    }

    function getAllUsers($from_record_num, $records_per_page)
    {
        $sql = "SELECT * FROM " . $this->table_name . " ORDER BY pess_nome ASC LIMIT ?, ?";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

	function delete($id_pess)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id_pess= :id_pess";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id_pess', $this->id_pess);

        if ($prep_state->execute(array(":id_pess" => $_GET['id']))) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }
    }
	
   
	function getNome($nome)
    {
        $sql = "SELECT * FROM " . $this->table_name . "  where pess_nome like '%$nome%' ";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

	
	function getTodos()
    {
        $sql = "SELECT * FROM " . $this->table_name . " ORDER BY pess_nome ASC";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // for edit user form when filling up
    function getUser()
    {
        $sql = "select *  FROM " . $this->table_name . " WHERE id_pess  = :id_pess";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id_pess', $this->id_pess);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->pess_nome = $row['pess_nome'];
        $this->pess_login = $row['pess_login'];
        $this->category_id = $row['category_id'];
		
	
    }

 // Verifica se já existe re escolhido
     function unico($login) {

      $unic = "SELECT * FROM " . $this->table_name . " WHERE pess_login = '$login'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	   $row = $prep_state->fetch(PDO::FETCH_ASSOC);
	  $this->pess_nome = $row['pess_nome'];
       $num = $prep_state->rowCount(); 
      return $num;
    }
	
	function getName()
    {

        $sql = "SELECT * FROM " . $this->table_name . " WHERE id_pess  = ? limit 0,1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->id_pess ); // und somit der Platzhalter der SQL Anweisung :id durch die angegebene Variable $id ersetzt.
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->pess_nome = $row['pess_nome'];
		$this->pess_login = $row['pess_login'];
		$this->pess_email = $row['pess_email'];
    }
	
	
	
	 function unicologin($login) {

      $unic = "SELECT * FROM " . $this->table_name . " WHERE pess_login = '$login'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	  $row = $prep_state->fetch(PDO::FETCH_ASSOC);
       $num = $prep_state->rowCount(); 
	   $this->id_pess = $row['id_pess'];
	   $this->pess_senha = $row['pess_senha'];
	  $this->pess_login = $row['pess_login'];
	  $this->category_id = $row['category_id'];
      return $num;
    }
function login($login, $senha) {

      $sql = "SELECT * FROM " . $this->table_name . " WHERE pess_login = '".$login."' AND pess_senha = '".$senha."'";

      $prep_state = $this->db_conn->prepare($sql);
      $prep_state->execute();
	  $num = $prep_state->rowCount(); 
      return $num;
    }
    // cadastra o usu?rio
     function cadastra($login,$senha,$nome,$email) {

      $sql = "INSERT INTO " . $this->table_name . " 
	  (pess_login,pess_senha,pess_nome,pess_email) 
	  VALUES ('$login','$senha','$nome','$email')";

     $prep_state = $this->db_conn->prepare($sql);
     $prep_state->execute();

      $num = $prep_state->rowCount(); 
      return $num;
    }

    // efetua logout
     function logout() {

      session_start();

      session_destroy();

      //setcookie("login" , "" , time()-60*5);
      header("Location:index.php?success=logout");
      exit();
    }
	
}







