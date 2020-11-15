<!DOCTYPE html>

<html>

<head>
    <title>CREATE NEW USER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="" style="background-color:#e2e2e2;">
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-50 my-auto shadow border-0">
                <!-- card header -->
                <div class="navbar navbar-expand-lg navbar-dark bg-dark">
                </div>
                <!-- card body -->
                <div class="card-body">
                    <form action="create-user" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" required>
                        </div>
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" name="add" class="btn btn-success" value="Create">
                            <a href="dashboard" class="btn btn-danger">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>