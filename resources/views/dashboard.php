<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="" style="background-color:#e2e2e2;">


    <div class="container vh-100 " style="margin-top: 50px;width:540px;">
        <div class="row justify-content-center">
            <div class="card w-100 my-auto shadow border-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

                <div class="card-body " style="background-color:#FFFFFF;"> 
                    <form action="create" method="post" >
                        <div class="form-group text-right">
                            <input type="submit" name="create" class="btn btn-success" value="Add new">
                            <a href="login" class="btn btn-danger">Logout</a>
                        </div>
                    </form>
                    <table class="border-collapse: collapse; border: none; "; width="100%"id="dataTable" style="background-color:#FFFFFF; color: #646464;">

                        <thead id="thread"  >
                            <tr>
                                <th class="text-center"style="font-style:bold;" >ID</th>
                                <th class="text-center"style="font-style:bold;">USERNAME</th>
                                <th class="text-center"style="font-style:bold;">LASTNAME</th>
                                <th class="text-center"style="font-style:bold;">FIRSTNAME</th>
                                <th class="text-center"style="font-style:bold;">EDIT</th>
                                <th class="text-center"style="font-style:bold;">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id;
                            $username;
                            $firstname;
                            $lastname;
                            if (!empty($id)) {
                                for ($x = 0; $x < count($id); $x++) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $id[$x]->id; ?></td>
                                        <td class="text-center"><?php echo $username[$x]->username; ?></td>
                                        <td class="text-center"><?php echo $firstname[$x]->firstname; ?></td>
                                        <td class="text-center"><?php echo $lastname[$x]->lastname; ?></td>
                                        <td class="text-center">
                                            <form action="edit" method="post">
                                                <input type="hidden" name="edit_id" value="<?php echo $id[$x]->id; ?>">
                                                <button type="submit" name="btn_edit" class="material-icons"style="color:white;background-color:orange;">&#xe3c9;</button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="delete" method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $id[$x]->id; ?>">
                                                <button type="submit" class="material-icons" style="color:white;background-color:red;">&#xe872;</button>
                                            </form>

                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No record found.";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
</body>

</html>