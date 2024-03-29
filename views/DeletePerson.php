<?php include('../controllers/SessionController.php');
include('../models/DBConn.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Person</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand"><?="Welcome ".$_SESSION['user']."!";?></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="menu.php">Home</a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Person
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="RegisterPerson.php">Register</a></li>
                        <li><a class="dropdown-item" href="ListPerson.php">List</a></li>
                        <li><a class="dropdown-item" href="UpdatePerson.php">Update</a></li>
                        <li><a class="dropdown-item" href="DeletePerson.php">Delete</a></li>
                    </ul>
                </div>
            </ul>
            <a class="navbar-brand" href="../controllers/logoutController.php" >
            Logout
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
            </svg>
            </a>
        </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="container vh-100 d-flex align-items-center">
        <div class="col-md-4"></div> 
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                    <form action="deletePerson.php" method="post">
                        <div class="input-group">
                            <input type ="text" name="id" placeholder="Person ID" class="form-control" required >
                        </div>
                        <br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">DELETE</button>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_POST['id'])){
                    $personID = "id=". $_POST['id'];
                    $db = DBConn::getInstance();
                    try {
                        $db->delete("pessoas", $personID);
                        $ext_message = 'Person deleted.';
                    } catch (PDOException $e) {
                        $ext_message = "Error while deleting";
                    }
                ?>
                <div class="card-footer text-center">
                    <?php echo $ext_message;?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-4"></div> 
    </div>

</body>
</html>