<?php 
    session_start();

    if(!isset($_SESSION['logged_in'])) {
        header('Location: http://localhost/PHPfiles/PenPals/index.php');
        exit;
    }
?>
<!DOCTYPE html>
<head>
    <title>PenPals</title>
    <link rel="shortcut icon" href="./assets//icon.ico">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid header">
        <button type="button" class="btn btn-warning setting" data-bs-toggle="modal" data-bs-target="#settingModal"><i class="fa fa-gear fa-spin" style="font-size:24px"></i></button>
        <div class="modal fade" id="settingModal" tabindex="-1" aria-labelledby="settingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="settingModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="container first-card">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <h1>Welcome,  <?php echo $_SESSION['username'].' ';?>!</h1>
                <div class="intro">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio exercitationem odit alias necessitatibus placeat repellendus tempora laborum facere inventore quaerat dicta officiis consequatur, sunt nostrum, amet nam corporis veniam! Voluptate.
                </div>
                <button type="button" class="btn btn-secondary btn-lg">Get a PenPal</button>
                <div class="new-penpal">username?</div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-sm-10 col-md-6 col-lg-4">
    <?php 
            $i = 1;
            while($i <= 3) {
                echo '                        <div class="card">
                            <h5 class="card-header">'; echo "Penpal ".$i;echo '</h5>
                            <div class="card-body"> <h5 class="card-title">';echo $_SESSION['pal_'.$i].' ';echo ' </h5>
                                <p class="card-text">{ description }</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal">
                                    Send Message!
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete Penpal</button>
                                <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content modal-content-message">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="messageModalLabel"> ';
                     echo $_SESSION['pal_'.$i].' ';

                     echo ' </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="container">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-md-5">
                                                        <div class="modal-body">
                                                            <!-- PenPal description -->
                                                            <h3>Send a message to  ';
                    echo $_SESSION['pal_'.$i].' ';
                    
                    echo '</h3>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-md-5">
                                                        <div class="msg-body">
                                                            <h5>Last message</h5>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer modal-footer-message">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back to Dashboard</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Confirm deletion of  ';
                 echo $_SESSION['pal_'.$i].' ';
                 
                 echo '</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to remove ';
                echo $_SESSION['pal_'.$i].' ';
                echo '</h5>
                                            <label for="confirmDeletePassword" class="form-label">Enter Password for confirmation</label>
                                            <input type="password" id="confirmDeletePassword" class="form-control" aria-describedby="passwordHelpBlock">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">I changed my mind</button>
                                          <button type="button" class="btn btn-primary">Yes, I`m sure</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                  
            ';
                $i++;
            }
        ?>
         </div>
                </div> </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>


