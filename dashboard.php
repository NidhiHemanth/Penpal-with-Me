<?php 

	session_start();

	if(!isset($_SESSION['logged_in'])) {
		header('Location: http://localhost/PHPfiles/PenPals/index.php');
		exit;
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "DBMS";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
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
        <button type="button" class="btn btn-warning setting" data-bs-toggle="modal" data-bs-target="#settingModal">
			<i class="fa fa-gear fa-spin" style="font-size:24px"></i>
		</button>
        <div class="modal fade" id="settingModal" tabindex="-1" aria-labelledby="settingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="settingModalLabel">Profile Settings</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
                	<div class="modal-body">
                    	<div class="accordion" id="accordionPanelsStayOpenExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingOne">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
										Your info ;)
									</button>
								</h2>
								<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
									<div class="accordion-body">
										<strong>Hey, <?php echo $_SESSION['username'];?>.</strong> <br>
										We are extremely grateful that you chose to use your website! 
										We hope you have an excellent day ^-^
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
										Update Interests
									</button>
								</h2>
								<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
									<div class="accordion-body">
										<form action="./php/update_interest.php" method="post">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Art" name="interest[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Art (Painting / Sketching etc)
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Anime" name="interest[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Anime
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Gaming" name="interest[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Gaming
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Music" name="interest[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Music
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Binge_Watch" name="interest[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Movies / TV Shows
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Tech" name="interest[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Tech field
												</label>
											</div>
											<button type="submit" name="submit_interest" class="btn btn-primary set-profile">Save changes</button>
										</form>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
										Update Languages
									</button>
								</h2>
								<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
									<div class="accordion-body">
										<form action="./php/update_lang.php" method="post">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="English" name="lang[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													English
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Hindi" name="lang[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Hindi
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Spanish" name="lang[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Spanish
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Chinese" name="lang[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Chinese
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Japanese" name="lang[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Japanese
												</label>
											</div>
												<button type="submit" name="submit_lang" class="btn btn-primary set-profile">Save changes</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-primary">Save changes</button>
							<a type="button" class="btn btn-secondary" href="./php/logout.php">Log Out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="container first-card">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<h1>Welcome, <?php echo $_SESSION['username'];?>!</h1>
				<div class="intro">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio exercitationem odit alias necessitatibus placeat repellendus tempora laborum facere inventore quaerat dicta officiis consequatur, sunt nostrum, amet nam corporis veniam! Voluptate.
				</div>
				<form action = "./php/Addpenpal.php" method="POST">
			        <button type="submit" class="btn btn-secondary btn-lg" 
						name="AddPenpal"
                    	class="button" 
						value="Get a Penpal!"
					>
						Get a Penpal!
					</button>                        
		        </form>
            </div>
		</div>
	</div>
   
    <div class="container">
    	<div class="row">
        	<?php error_reporting(0);
           
            	$i = 1; 
            
				while($i<=$_SESSION['numOfPenpals']) 
				{
					echo '     
						<div class="col-sm-10 col-md-6 col-lg-4">                   
							<div class="card">
								<h5 class="card-header">'; echo "Penpal ".$i;echo '</h5>
								<div class="card-body"> 
									<h5 class="card-title">';
										$sql = "SELECT name FROM Users WHERE email = '".$_SESSION['pal_'.$i]."'";
										$result=$conn->query($sql);
										$row = $result->fetch_assoc();
										$_SESSION['pal_name'.$i] = $row['name'];
																
										echo $row['name'].'
									</h5>
									<p class="card-text">';
										$sql = "SELECT pen_id FROM Penpals WHERE (user1 = '".$_SESSION['email']."' AND user2 = '".$_SESSION['pal_'.$i]."') OR (user2 = '".$_SESSION['username']."' AND user1 = '".$_SESSION['pal_'.$i]."');";
										$result = $conn->query($sql);

										if (mysqli_num_rows($result) > 0)
										{ 
											$row = $result->fetch_assoc();
											$pen_id = $row['pen_id'];

											$sql = "SELECT time FROM 
													(SELECT MAX(whens) AS time, content FROM Messages 
													WHERE route = (
													SELECT route FROM Route WHERE 
													sender = '".$_SESSION['email']."' AND pen_id = ".$pen_id.")
													) AS A";
											$result = $conn->query($sql);
							
											if (mysqli_num_rows($result) > 0)
											{    
												$row = $result->fetch_assoc();                                                        
												$date1 = $row['time']; 

												$sql = "SELECT TIMESTAMPDIFF(SECOND,'".$date1."', NOW()) AS B";                                
												$result = $conn->query($sql);

												if (mysqli_num_rows($result) > 0)
												{ 
													$row = $result->fetch_assoc();
													$diff = $row['B'];                                  
												}
									
												$seconds = $diff; 

												if($seconds >= 60)
												{
													$minutes = floor($seconds/60);     
												
													if($minutes >= 60)
													{
														$hours = floor($minutes/60); 
												
														if($hours >= 24)
														{
															$days = floor($hours/24);
																		
															if($days >= 30)
															{
																$months = floor($days/30);
																if($months >= 30)
																	{
																		$years = floor($months/12);                          
																		$toprint=$years." years";
						
																	}
																	else $toprint = $months." months";                           
																
						
															}
															else 
																$toprint = $days." days";   
														}
														else 
															$toprint = $hours." hours";   
													}
													else 
														$toprint = $minutes." minutes";
												}
												else if($seconds != '') 
												{
													$toprint = $seconds." seconds";
												}
										
												if($toprint != '')
												{
													echo "Last message ".$toprint." ago ";
												}
												else 
												{
													echo "No messages sent!";
												}
											}
											else
											{
												echo "No messages sent!";
											}
										}
										else
										{
											echo "No messages sent!";
										}                 

					echo '</p>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal'.$i.'">
										Send Message!
									</button>
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop'.$i.'">Delete Penpal</button>
									<div class="modal fade" id="messageModal'.$i.'" tabindex="-1" aria-labelledby="messageModalLabel'.$i.'" aria-hidden="true">
										<div class="modal-dialog modal-fullscreen">
											<div class="modal-content modal-content-message">
												<div class="modal-header">
													<h5 class="modal-title" id="messageModalLabel'.$i.'"> ';
														echo $_SESSION['pal_name'.$i] .' ';
														echo '
													</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="container">
													<div class="row d-flex justify-content-center">
														<div class="col-md-5">
															<div class="modal-body">
																<!-- PenPal description -->
																<h3>Send a message to  ';
																	echo $_SESSION['pal_name'.$i].' ';
																	echo '
																</h3>
																<div class="mb-3">
																<form method="GET" action="./php/SendMessage.php">
																<textarea name ="Message" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
																<button type="submit" class="btn btn-outline-secondary" name = "Sends'.$i.'" value = "'.$i.'">Send it!</button>
																</form>
																</div>
															
																</div>
															</div>    
														</div>
													</div>
												</div>';
												echo'
												<div class="container">
													<div class="row d-flex justify-content-center">
														<div class="col-md-5">
															<div class="msg-body">
																<h5>';
																
																$sql = "select content from (select Max(whens) AS time ,content from Messages where route = (
																select route from Route where sender ='".$_SESSION['email']."' AND pen_id = ".$pen_id."
																																)
																) AS A";
																
																$result = $conn->query($sql);
															
															if (mysqli_num_rows($result) > 0)
															{    
																$row = $result->fetch_assoc();                                                        
																$Lmessage = $row['content'];
																if(!is_NULL($Lmessage)) echo $Lmessage;
																else echo "You are sending your first message!"; 
															}
															else echo "You are sending your first message!"; 
																
																echo '</h5>
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
									<div class="modal fade" id="staticBackdrop'.$i.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel'.$i.'" aria-hidden="true">
										<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel'.$i.'">Confirm deletion of  ';
												echo $_SESSION['pal_name_'.$i].' ';
												
												echo '
											</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
											<h5>Are you sure you want to remove ';
												echo $_SESSION['pal_name_'.$i].' ';                                          
												echo '
											</h5>
											<form method="GET" action="./php/delete_pal.php">
												<div class="input-group">
													<input type="password" name="confirm_delete" placeholder="Password" class="form-control">
													<button type="submit" class="btn btn-outline-secondary" name = "button'.$i.'" value = "'.$i.'">
													Confirm identity
													</button> 
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">I changed my mind</button>
										</div>
		
										</div>
									</div>
								</div>
							</div>
						</div>';

						$i++;
					}
				?>
			</div>
		</div> 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
