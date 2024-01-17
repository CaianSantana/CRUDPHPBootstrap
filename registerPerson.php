<?php include('SessionValidator.php');
include('DBConn.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Person</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container vh-100 d-flex align-items-center">
        <div class="col-md-4"></div> 
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                    <form action="registerPerson.php" method="post">
                        <div class="input-group">
                            <input type ="text" name="name" placeholder="Name" class="form-control" required >
                        </div>
                        <br>
                        <div class="input-group">
                        <input type ="text" name="fname" placeholder="FName" class="form-control" required>
                        </div>
                        <br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">REGISTER</button>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_POST['name']) && isset($_POST['fname'])){
                    $person = array('name'=>$_POST['name'],'fname'=>$_POST['fname']);
                    $db = DBConn::getInstance();
                    try {
                        $db->insert("pessoas", $person);
                        $ext_message = 'Person registered.';
                    } catch (PDOException $e) {
                        $ext_message = "Error while registering";
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