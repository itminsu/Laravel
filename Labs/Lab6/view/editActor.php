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
        <title>Update Actors</title>
    </head>
    <body>
        <div class="container">
            <div class ="page-header">
                <h1>Edit Actors</h1>
            </div>
            <form id="formUpdate" name="formUpdate" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="text">Actor ID:</label>
                    <input type="text" class="form-control" readonly="readonly" name="editActId" id="editActId" value="<?php echo $currentActor->getID();?>"/>
                </div>
                <div class="form-group">
                    <label for="text">First Name:</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $currentActor->getFirstName();?>"/>
                </div>
                <div class="form-group">
                    <label for="text">Last Name:</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $currentActor->getLastName();?>"/>
                </div>
                <button type="submit" class="btn btn-default" name="UpdateBtn" id="UpdateBtn" value="Update" onclick="return confirm('Really Update?')"/>Submit</button>
                <a href="../public/index.php" class="btn btn-default" role="button">Cancel</a>
            </form>
        </div><br/>
    </body>
</html>
