<html>

<head>
  <title>SEFI Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="formstyle.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    function fillin() 
		{
      var array = ["we're soaring, flying...", "knock, knock, knocking on heaven's doh-aor", "mr hanky, the christmas, i love him like he loves you", "watch me whip", "im gonna pop some tags", "walk into the club like whaddup got a big co-"];
      var index = Math.floor(Math.random() * array.length);
      var message = array[index];
      document.getElementById("description").innerHTML = message;
    }

  </script>
</head>

<body>
  <!--- Header for application. Containts title, SEFI logo and MSU logo --->
  <div id="header" class="jumbotron">
    <h1>Socio-Emotional Formation Initiative (SEFI)</h1>
  </div>