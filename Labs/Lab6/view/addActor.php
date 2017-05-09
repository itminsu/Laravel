<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Add Actors</title>
    </head>
    <body>
        <div class="container">
            <div class ="page-header">
                <h1>Add Actors</h1>
            </div>
            <form id="formInsert" name="formInsert" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="text">First Name:</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required="required"/>
                </div>
                <div class="form-group">
                    <label for="text">Last Name:</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name"  required="required"/>
                </div>
                <button type="submit" class="btn btn-default" name="InsertBtn" id="InsertBtn" onclick="return confirm('Really Add?')"/>Submit</button>
                <a href="../public/index.php" class="btn btn-default" role="button">Cancel</a>
            </form>
        </div><br/>
    </body>
</html>
