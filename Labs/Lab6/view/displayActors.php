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
        <title>Actors</title>
    </head>
    <body>
        <div class="container">
            <div class ="page-header">
                <h1>Current Actors</h1>
            </div>
            <form class = "form-inline" role="search" id="searchForm" name="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="text">Search  </label>
                    <input type="text" class="form-control" id="search" placeholder="Ex) minsu" id="searchField" name="searchField" value="<?php echo isset($searchParam) ? $searchParam : ""?>" ">
                </div>
                <button type="submit" class="btn btn-default" id="btnSearch" >Submit</button>
            </form><br/>
            <?php
                if(!empty($lastOperationResults)):
            ?>
            <h2><?php echo $lastOperationResults; ?></h2>
            <?php
                endif;
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Actor ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Last Update</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($arrayOfActors as $actor):

                        ?>
                            <tr>
                                <td><?php echo $actor->getID(); ?></td>
                                <td><?php echo $actor->getFirstName(); ?></td>
                                <td><?php echo $actor->getLastName(); ?></td>
                                <td><?php echo $actor->getLastUpdate(); ?></td>
                                <td>
                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idUpdate=<?php echo $actor->getID(); ?>">
                                        <img src="../public/images/edit_icon.png" height="25px" width="25px"/>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idDelete=<?php echo $actor->getID(); ?>">
                                        <img src="../public/images/delete_icon.jpg" height="25px" width="25px"/>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    ?>
                </tbody>
                <tfoot></tfoot>
            </table>
            <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF']; ?>?idInsert=OK" role="button">Add Actor</a>
        </div><br/>
    </body>
</html>
