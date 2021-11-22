<?php

class Videos
{
    // table name definition and database connection
    private $db_conn;
    private $table_name = "videos";

    // object properties
    public $v_id ;
    public $v_url;
    public $v_date;
	public $v_idpess;
	public $c_idvideo;
	public $c_idpessoa;
	public $v_titulo;
	public $v_cat;
	
    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET 
		v_url = ?,
		v_date = ?,
		v_idpess = ?,
		v_titulo = ?,
		v_cat = ?
		";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->v_url);
        $prep_state->bindParam(2, $this->v_date);
        $prep_state->bindParam(3, $this->v_idpess);
		$prep_state->bindParam(4, $this->v_titulo);
		$prep_state->bindParam(5, $this->v_cat);
		
 
        if ($prep_state->execute()) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }

    }
	 function createclique()
    {
        //write query
        $sql = "INSERT INTO cliques SET 
		c_idvideo = ?,
		c_idpessoa = ?
		";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->c_idvideo);
        $prep_state->bindParam(2, $this->c_idpessoa);

		
 
        if ($prep_state->execute()) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }

    }
	function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET 
		v_url =:v_url,
		v_titulo =:v_titulo, 
		v_cat =:v_categoria
		WHERE v_id  =:v_id";
        // prepara query
        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(':v_url', $this->v_url);
		$prep_state->bindParam(':v_titulo', $this->v_titulo);
        $prep_state->bindParam(':v_categoria', $this->v_categoria);
        $prep_state->bindParam(':v_id', $this->v_id);

        // executa a query
        if ($prep_state->execute()) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }
    }

	function delete($v_id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE v_id=:v_id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':v_id', $this->v_id);

        if ($prep_state->execute(array(":v_id" => $_GET['id']))) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }
    }
    // usado pelo create.php e edit.php para selecionar categoria
    function getAll($from_record_num, $records_per_page)
    {
        //seleciona todos os Dados Limitando
        $sql = "SELECT * FROM " . $this->table_name . "  ORDER BY v_id desc LIMIT ?, ?";

		
		
        $prep_state = $this->db_conn->prepare($sql);
		
		$prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Interger do DB.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);
		
        $prep_state->execute();

        return $prep_state;
    }
	 function gettodos()
    {
        //select all data
        $sql = "SELECT * FROM " . $this->table_name . " ";

		
		
        $prep_state = $this->db_conn->prepare($sql);
		
		
        $prep_state->execute();

        return $prep_state;
    }
	 function getcat($vcat,$from_record_num, $records_per_page)
    {
        //Selecionatodos os dados por categoria e limites
        $sql = "SELECT * FROM " . $this->table_name . " where v_cat='$vcat' ORDER BY v_id desc LIMIT ?, ?";

        $prep_state = $this->db_conn->prepare($sql);
		$prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);
		$prep_state->bindParam(3, $vcat, PDO::PARAM_INT);
        $prep_state->execute();

        return $prep_state;
    }
	 function getMyvideos($idpess)
    {
        //select all data
        $sql = "SELECT v_id , v_url FROM " . $this->table_name . "  WHERE v_idpess = '$idpess'";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        return $prep_state;
    }
function unicovideo($nome) {

      $unic = "SELECT * FROM " . $this->table_name . " WHERE v_url = '$nome'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	  $row = $prep_state->fetch(PDO::FETCH_ASSOC);
      $num = $prep_state->rowCount(); 
	 
      return $num;
    }
    // used by index.php to read category name
    function getName()
    {

        $sql = "SELECT * FROM " . $this->table_name . " WHERE v_id  = ? limit 0,1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->v_id ); // und somit der Platzhalter der SQL Anweisung :id durch die angegebene Variable $id ersetzt.
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->v_url = $row['v_url'];
		 $this->v_titulo = $row['v_titulo'];
		 $this->v_cat = $row['v_cat'];
    }
}


