<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container vh-100 d-flex align-items-center">
        <div class="col-md-4"></div> 
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    LOGIN
                </div>
                <div class="card-body">
                    <form action="controllers/AuthenticationController.php" method="post">
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </span>
                            <input type ="text" name="user" placeholder="User" class="form-control" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg>
                            </span>
                            <input type ="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_GET['msg'])){
                    $ext_message = $_GET['msg'] == 'login_error' ? 'Invalid User or Password.' : 'You need to login.';
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