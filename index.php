

<link rel="stylesheet" href="css/w3.css">
<link href="font/css/font-awesome.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body id="pagina" onload="entrar()" >


    

 
</body>
<script>
function entrar() {
	window.location.replace("videos");
	
}



    function horas() {
  var greeting;
   var pag = document.getElementById("pagina");
  var time = new Date().getHours();
  if (time < 12 ) {
    pag.style.background= "url(images/dia.jpg) 50% 0";
  } else if (time < 18 && time > 12) {
    greeting = "url(img/tarde.jpg) 50% 0";
  } else {
    greeting = "url(img/noite.jpg) 50% 0";
  }
  document.getElementById("demo").innerHTML = greeting;
}
</script>