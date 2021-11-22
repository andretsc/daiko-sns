	<?php

// set page headers
$page_title = "Registrar";
include_once "../cabecalho/header.php";
?>

<?php

// get database connection
include_once '../classes/database.php';
include_once '../initial.php';
include_once '../classes/pessoa.php';
$user = new Pessoa($db);

// check if the form is submitted
if ($_POST){

    // instantiate user object
function encrypt_decrypt($action, $string,$secret_key) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
   
    $secret_iv = '56032ef690f523e173ff37a11ce5965';
	// hash de 256bits
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ( $action == 1 ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 2 ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}




$tipo=1;
$secretHash = $_POST['users_email'];
		$nome=$_POST['users_nome'];
		$senha = encrypt_decrypt($tipo, $_POST['senha'],$secretHash);
		$login=$_POST['users_email'];
        $email=$_POST['users_email'];
		
		 $prep_state = $user->unico($email);

    if($prep_state == 1) {
		?>
<script>
alert("O usuário já existe");
</script>
<?php
	}else{
		if($user->cadastra($login,$senha,$nome,$email)){
    // if the user able to create
   // $user->create()
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "登録をしました。";
        echo "</div>";
		?>
<script>
setTimeout(function() {
            window.location.href = "index.php";
        }, 2000);
</script>
<?php
    }

    // if the user unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "エラー登録できません";
        echo "</div>";
    }
}
}
?>
<style>	
{box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 10px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 500px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
			
  <div class="row">
	<div class="col-xl-9 mx-auto">
	
	<br><br><br>
	<h2 class="mb-0 text-uppercase">登録ページ</h2>
						<hr/>
							<div class="card-body">
								<div class="p-4 border rounded">
	<form action='registrar.php' role='form' method='POST' enctype='multipart/form-data' class="row g-3 was-validated">
		<div class="col-md-4">
			<label for="validationServer01" class="form-label">氏名</label>
			<input type="text" class="form-control is-invalid" id="validationServer01" name='users_nome' required>
			
		</div>
		
		<div class="col-md-4">
			<label for="validationServerUsername" class="form-label">メールアドレス</label>
			<div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend3">@</span>
				<input type="text" class="form-control is-invalid" id="validationServerUsername" name='users_email'  
				aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
				
			</div>
		</div>
    
		<div class="col-md-4">
			<label for="validationServer05" class="form-label">パスワード</label>
			<input type="password" class="form-control is-invalid" id="senha" aria-describedby="validationServer05Feedback" name="senha" required required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}'>
    	<div id='message'> 
  <h3>Senha:</h3>
  <p id='letter' class='invalid'>1 <b>小文字</b></p>
  <p id='capital' class='invalid'>1 <b>大文字</b></p>
  <p id='number' class='invalid'>1 <b>番号</b></p>
  <p id='length' class='invalid'>合計で <b>8 桁</b></p>
</div>
			
		</div>
		
		
		<div class="col-12">				
				<label class="form-check-label" for="invalidCheck3" > <a href='termos.php' target='blank'> >> プライバシーポリシーします！ >> </a></label>
				<input  type="checkbox"  id='check'  required onclick='inserir()'>
        
        
      </div>
	  </div>
        <button class="btn btn-light" type="submit" id='btnx' disabled>登録する</button>
		</div>
	</form>
								</div>
							</div>
						</div>
				</div>
						</div>		
							<?php

include_once "cabecalho/footer.php";
?>
<script>
var myInput = document.getElementById("senha");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

      

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
function inserir(){

	var h = document.getElementById("btnx");
	if (document.getElementById('check').checked) {
   
	document.getElementById('btnx').disabled=false;
	
	//h.style.background= 'green';
  } else {
   document.getElementById('btnx').disabled=true;
  }
}
		
	</script>

