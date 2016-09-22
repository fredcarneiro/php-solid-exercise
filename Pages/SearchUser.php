<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();

function loadClass($class)
{
	require_once '../class/'.$class.'.php';
}

spl_autoload_register('loadClass');

$login = new Login();
$isLogged = $login->checkSession($_SESSION);

if (!$isLogged) 
{
	echo "<pre>".$_SESSION["no_access"]."</pre>";
	echo "<a href='../index.php'>Back to Index</a>";
	unset($_SESSION['no_access']);
	die();	
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HelloFresh Test</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <div class="container ui-widget">
        <h2>Search</h2>
        <br/>
        <form>
        	<label for="query">Type the Name or E-mail</label>
        	<input id="query" type="text" />
        </form>
        <br />
        <a href='Logout.php'>LogOut</a>

    </div>


    
  
</body>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
	    $( "#query" ).autocomplete({
			source: function (request, response) {
			    $.ajax({
				  type: "POST",
				  url:"../api/SearchUserAPI.php",
				  data: request,
				  success: response,
				  dataType: 'json'
				});
			}
	    });

    });
</script>

</html>
