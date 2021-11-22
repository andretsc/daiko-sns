<?php

if(!isset($_SESSION)){
    	session_start();
	}

	//$id_user = $_SESSION['appmluser'];

	if(isset ($_SESSION['appmluser'])) {
    	header('Location: videos/');
	}
?>
<html lang="en" class>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/header-colors.css" />
    <title>Login</title>
	<style>
	*{
	padding:0;
	margin:0;
	box-sizing:border-box;
	}
	body{
	width:100%;
	min-height:100vh;
	display:flex;
	justify-content:center;
	align-items:center;
	
	background-color:white;
	background-image:url(img/back.jpg);
	}
	span{
	position:absolute;
	width:50%;
	height:50%;
	filter: blur(150px);
	}
	span:nth-child(1){
	top:0;
	left:0;
	background-color:blue;
	}
	span:nth-child(2){
	top:0;
	right:0;
	background-color:red;
	}
	span:nth-child(3){
	bottom:0;
	left:0;
	background-color:red;
	}
	span:nth-child(4){
	bottom:0;
	right:0;
	background-color:white;
	}
	.container{
	width:500px;
	height:500px;
	padding:20px;
	position:relative;
	left:0;
	span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
	
	}
	form{
	width:100%;
	height:100%;
	border: 4px solid red;
	background:#0002;
	backdrop-filter:blur(10px);
	border-radius:20%;
	padding:30px;
	margin-bottom:50px;
	}
	form h1{
	color: #fff;
	text-transform:capitalize;
	margin-bottom:50px;
	position:center;
	}
	form h1::after{
	content:'';
	position:absolute;
	width:5%;
	height:7px;
	left:0;
	bottom:-10px;
	background:fff;
	}
	form input{
	width:80%;
	height:40px;
	margin-bottom:30px;
	outline:none;
	border:1px solid#fff6;
	background:transparent;
	font-size1.2rem;
	border-radius:10px;
	padding:10px;
	color: #fff
	}
	form input::placeholder{
	color: #fff
	}
	.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}
	.blocos{
	background:#fff2;
	border:1px solid #fff6;
	position:absolute;
	animation: anima 2s infinite;
	
	}
	
	
	}
	
.icon {
  padding: 10px;
  color: white;
  min-width: 50px;
  text-align: center;
}
.icon2 {
  padding: 10px;
  color: white;
  min-width: 50px;
  text-align: center;
}
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}
a{
text-transform:uppercase;
transform-style:preserve-3d;
position: relative;
transition: .5s;
transform-origin:right;
transform:translateX(-100%)
rotateY(90deg);
}
a::after{
content:attr(placeholder);
position:absolute;
top:0;
left:0;
padding:15px 25px;
background:#0002;
color:#fff;
border: 1px solid #000;
transition:.5s;
transform-origin:left;
transform:translateX(0%)
rotateY(0deg);
}
a::before{
content:attr(title);
position:absolute;
top:0;
left:0;
padding:15px 25px;
background:#fff2;
color:#000;
border: 1px solid #000;
transition:.5s;
transform-origin:left;
transform:translateX(0%)
rotateY(0deg);
}
a:hover::before{
transform:translateX(0) rotateY(0deg);
}
a:hover::after{
transform:translateX(100%) rotateY(90deg);
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 20%;
  top: 0;
  width: 50%; /* Full width */
  height: 50%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
 
}


/* Modal Content */
.modal-content2 {
  position: relative;
  text-align: center;
  margin: auto;
  padding: 0;
  color:#fff;
  border: 1px solid #888;
  width: 100%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
 
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: black;
  color: white;
}

.modal-body {padding: 2px 16px;
background-color: white;
  color: black;
}
.modal-footer {
  padding: 2px 16px;
  background-color: black;
  color: white;
}
	</style>
	</head>
	<body>
	<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content2">
    <span class="close">&times;</span>
    <h2>ログインエラー</h2>
  </div>

</div>



	<span></span><span></span>
	<span></span><span></span>
	
	
	<div class="container">
	
										
								
	<form id="formlogin"  action="" method="post">
	
      <h1>ログイン</h1>  
    
	  <div class="input-container">
	  
    <i class="fa fa-user icon"></i>
    <input  type="text" id="users_cpf" placeholder="メールアドレス" name="users_cpf" required>
  </div>
  
  <div class="input-container" ">
    
    <input  type="password" id="users_senha" placeholder="パスワード" name="users_senha" required>
  </div>

  <a  title="ログイン" id="enviar" placeholder="ログイン" ></a>
 <br><br> <br><br> 
   <a  href="videos/registrar.php" title="Registrar"  placeholder="Registrar" ></a>
   <br><br><br>


	
	</form>
	
	</div>
	
	<script>
var form = document.getElementById("formlogin");

document.getElementById("enviar").addEventListener("click", function () {
  form.submit();
});
    function versenha(y) {
y.classList.toggle("fa-eye-slash");
  var x = document.getElementById("users_senha");
  var h = document.getElementById("senhax");
  if (x.type === "password") {
    x.type = "text";
	//h.style.background= 'green';
  } else {
    x.type = "password";
	//h.style.background= 'red';
  }
}
setTimeout(function() {
        $('.modal-content2').fadeOut();
      }, 3000);
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function  menssagem() {
  modal.style.display = "block";
}
function  drogas() {
  modal1.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<?php

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



  include_once 'classes/database.php';
  include_once 'classes/pessoa.php';
  include_once 'initial.php';
  if (isset($_POST) &&(!empty($_POST))){
	  
	  
  $tipo=1; 
  $secretHash = $_POST['users_cpf'];	  
  $cpf= addslashes($_POST['users_cpf']);	
  $senha = encrypt_decrypt($tipo, addslashes($_POST['users_senha']),$secretHash);
  $valida = new Pessoa($db);
  
  $valido=$valida->login($cpf, $senha);
  
  
  
if ($valido==1){
 $usuario = new Pessoa($db);
  $userx = $usuario->unicologin($cpf);

    if($userx == 1) {
  
  session_start();
 
 
      $_SESSION['appmluser'] = $cpf;
	  $_SESSION['appmlidpess'] =$usuario->id_pess;
	  $_SESSION['appmlpriv'] =$usuario->category_id;
	
     ?><script>
window.location.replace("videos/");
</script>
<?php
	}else{
		
	
		
		?><script>
window.location.replace("inicial/");
</script>
<?php
	}
}
else
{


?>
<script>
menssagem();
</script>
<?php
		
		
	}
	
	
		
		exit;	
	}
	
	
  
?>
	</body>
	</html>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/app.js"></script>