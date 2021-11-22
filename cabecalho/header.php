<?php
if(!isset($_SESSION)){
    	session_start();
		
	}
	

	$host = $_SERVER['HTTP_HOST'];
	
	?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/w3.css" rel="stylesheet">
 <link href="../css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
		 <script src="../js/jquery.min.js"></script>
<title>DAIKO SNS　ギャラリー　代行　SNS</title>
<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}
/* Dropdown Button */


/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: absolute;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.btn:hover, .dropdown:hover .btn  {
  background-color: #0b7dda;
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 350px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>

<?php  
$priv=isset($_SESSION['appmlpriv']) ? $_SESSION['appmlpriv'] : 3;
if($priv==1) {
	
	
	?>
<div class="navbar">

<!-- Top Navigation Menu -->

 
  <div id="myLinks" style="display: none;">
    <a href="../videos/index.php"><i class="fa fa-youtube-square" aria-hidden="true"></i>  すべての動画</a>
   
	<?php
		if(isset ($_SESSION['appmluser'])) {
		echo "<a href='../videos/myvideos.php'><i class='fa fa-file-video-o' aria-hidden='true'></i> 私のページ</a>";
		 echo "<a href='../pessoas/index.php'><i class='fa fa-users' aria-hidden='true'></i> ユーザーコントロール</a>";
    	 echo "<a href='../logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i> ログオフ</a>";
	}else
	{
    echo "<a href='../login.php'><i class='fa fa-sign-in' aria-hidden='true'></i> ログイン</a>";
	}
   
	?>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?php } else{

	?>
	<div class="navbar">

<!-- Top Navigation Menu -->

 
  <div id="myLinks" style="display: none;">
    <a href="index.php"><i class="fa fa-youtube-square" aria-hidden="true"></i>  すべての動画</a>
   
	<?php
		if(isset ($_SESSION['appmluser'])) {
		echo "<a href='myvideos.php'><i class='fa fa-file-video-o' aria-hidden='true'></i> 私の動画</a>";
    	 echo "<a href='../logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i> ログオフ</a>";
	}else
	{
    echo "<a href='../login.php'><i class='fa fa-sign-in' aria-hidden='true'></i> ログイン</a>";
	}
   
	?>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
	
	
	
	<?php 
	} 

	?>
<div class="main">


