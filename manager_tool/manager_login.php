<!DOCTYPE html>
<html>

<head>
	<title>manager Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    
    <div class = "row">
    <div class = "col-sm-4"></div>
    <div class = "col-sm-4">
        <h1 class = "text-center">WELCOM MANAGER</h1>
            <form method = "post" action = "login_pass.php">
            <div class = "box">
                <input type = "text" class = "form-control" name = "id"/>
                <br>
                <input type = "password" class = "form-control" name = "pass" class = "iText"/>
                <br>
            </div>
            <input type = "submit" class = "btn btn-default btn-block" value="LOGIN">
        </form>
    </div>
    <div class = "col-sm-4"></div>
    </div>
</body>

</html>