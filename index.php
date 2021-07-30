<!DOCTYPE html>
<?php
				     
					 if(isset($_POST["search"]))
		             {
	                           
               	     $host='localhost';
                     $user='root';
					 $pass='';
                     $db='database';
					 
					 $con=mysqli_connect($host,$user,$pass,$db);
					
					
                    $fromm = $_POST["fromm"];
					$too = $_POST["too"];
					$departure_date = $_POST["departure_date"];
					$departure_time = $_POST["departure_time"];
					$passenger_no = $_POST['passenger_no'];
					
					
					
					$ok=15;
                    $query= "select * from `at_instance` where id='$ok'";
				    $data=mysqli_query($con,$query);
					$row=mysqli_fetch_array($data);
					$memid=$row['Member_id'];
					$logstat=$row['login_stat'];
					
					
					$sql1= "select * from cities where city_name='$fromm'";
					$data1=mysqli_query($con,$sql1);
					$row1=mysqli_fetch_array($data1);
					$dpart_ctid=$row1['ct_id'];
					//echo "$dpart_ctid";
					
					$sql2= "select * from cities where city_name='$too'";
					$data2=mysqli_query($con,$sql2);
					$row2=mysqli_fetch_array($data2);
					$desti_ctid=$row2['ct_id'];
					//echo "$desti_ctid";
                    
					$sql3= "select * from dates where date='$departure_date'";
					$data3=mysqli_query($con,$sql3);
					$row3=mysqli_fetch_array($data3);
					$date_id=$row3['date_id'];
					//echo "$date_id";
                    
					$sql4= "select * from time where time='$departure_time'";
					$data4=mysqli_query($con,$sql4);
					$row4=mysqli_fetch_array($data4);
					$time_iid=$row4['time_id'];
                    //echo "$time_iid";		

                    $master_sql= "select * from master where depart_city_id='$dpart_ctid' && desti_city_id='$desti_ctid' && depart_date_id='$date_id' && depart_time_id='$time_iid'";
                    $master_data=mysqli_query($con,$master_sql);					
                    $rowcount=mysqli_num_rows($master_data);
					$master_row=mysqli_fetch_array($master_data);
					$serid=$master_row['ser_id'];
					$null="Null";
					$zero=0;
					if($logstat==1){
					          
					  $up_insta = "UPDATE `at_instance` SET `seridd`='$serid' WHERE id=15";
                      mysqli_query($con,$up_insta);
					  $ins_user = "INSERT INTO `user_flight_info` (`Member_id`, `ser_id`, `c_id`, `mel_id`, `seat_id`, `tot_pass`, `booking_stat`, `total_fare`, `payment_stat`, `txn_id`) VALUES ('$memid',  '$serid', '$null', '$null', '$null', '$passenger_no', '$null', '$zero', '$null', '$null')";
                      mysqli_query($con,$ins_user);
					}
					else{
						 header('location:fail.php');
					}
					
					
					if($rowcount>0)
							 { 
							         
								if($passenger_no==1)
				                {
					              header('location:book1.php');
					            }
			                       if($passenger_no==2)
				                 {header('location:book2.php');}
			                      if($passenger_no==3)
				                 {header('location:book3.php');}
			                      if($passenger_no==4)
				                  {header('location:book4.php');}
			                       if($passenger_no==5)
				                  {header('location:book5.php');}
			                      if($passenger_no==6)
				                  {header('location:book6.php');}
									 
									 //echo $master_row['ser_id'];
									 //$sql = "UPDATE `login` SET `Stat`=1 WHERE Member_id='$login_id'";
									 //mysqli_query($con,$sql);
									 //header('location:index.php');
							 }
					           else
								 {
						
									 //header('location:fail.php');
								 }	 
					

			}  
				 
          ?>	

               
<html lang="en">
  <head>
    <title>Aircrypi.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
-->
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Air<span>crypi</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="mybooking.php" class="nav-link">My Bookings</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Check-Inn</a></li>
	          <li class="nav-item"><a href="car.html" class="nav-link">Schedule</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">About Us</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
			  <li class="nav-item"><a href="log.php" class="nav-link">Login/Sign Up</a></li> 
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/background.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center">
          <div class="col-lg-6 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text">
	            <h1 class="mb-4">Don't <span>Just fly,</span> <span>Fly Better.</span></h1>
	            <p style="font-size: 18px;">Whether it’s your first flight or simply your latest, we work to anticipate your every need</p>
	           <!-- <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div> 
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for Booking Tickets !</span>
	            	</div>
	            </a>-->
            </div>
          </div>
          <div class="col-lg-2 col"></div>
          <div class="col-lg-4 col-md-6 mt-0 mt-md-5 d-flex">
          	<form method="Post" class="request-form ftco-animate">
          		<h2>Make your trip</h2>
	    				<div class="form-group">
	    					<label for="" class="label">From</label>
		                     <select name="fromm"  class="form-control">
		                      	<option value="none">Select Departure City</option>
		                        <option value="Mumbai,India">Mumbai,India</option>
		                        <option value="Delhi,India">Delhi,India</option>
		                        <option value="Pune,India">Pune,India</option>
								</select>
							
	    				</div>
	    				<div class="form-group">
	    					<label  class="label">Destination</label>
	    					<select name="too"  class="form-control">
		                      	<option value="none">Select Destination City</option>
		                      <option value="Mumbai,India">Mumbai,India</option>
		                        <option value="Delhi,India">Delhi,India</option>
		                        <option value="Pune,India">Pune,India</option>
								</select>	
							</div>
	    				<div class="d-flex">
	    					<div class="form-group mr-2">
	                <label for="" class="label">Departure Date</label>
	                <input type="text" class="form-control" name="departure_date" id="book_pick_date" placeholder="Date">	             
				 </div>
	              <div class="form-group ml-2">
	                <label  class="label">Departure Time</label>
	                <select name="departure_time"  class="form-control">
		                      	<option value="none">Select Departure Time</option>
		                        <option value="9:00 am">9:00 am</option>
		                        <option value="3:00 pm">3:00 pm</option>
		                        <option value="8:00 pm">8:00 pm</option>
								</select>
	              </div>
              </div>
              <div class="form-group">
                <label  class="label">Passengers</label>
                <input type="text" name="passenger_no" class="form-control"  placeholder="1,2,3 . . ">
              </div>
	            <div class="form-group">
	              <button type="submit" name="search" class="btn btn-primary py-3 px-4">Search Flights</button>
	            </div>

		 		
        </form>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate mb-5">
							<form action="#" class="search-property-1">
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        	
		        					<div class="form-field">
		          					<div class="select-wrap">
		                     
		                      </select>
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		       
		        					<div class="form-field">
		          					<div class="select-wrap">
		                     
		                      
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group"
		       
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        				
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				            
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
    </section>

    <section class="ftco-section services-section ftco-no-pt ftco-no-pb">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Our Services</span>
            <h2 class="mb-2">Our Services</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-customer-support"></span></div>
	                <h3 class="heading mb-0 pl-3">24/7 Flight Support</h3>
                </div>
                <p>Whether it’s your first flight or simply your latest, we work to anticipate your every need</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-route"></span></div>
	                <h3 class="heading mb-0 pl-3">Lots of location</h3>
                </div>
                <p>Turn Miles Into Memories</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-online-booking"></span></div>
	                <h3 class="heading mb-0 pl-3">Reservation</h3>
                </div>
                <p>Reserve or cancel your tickets within 24 hours of booking at no extra cost as long as your travel is at least 7 days in future.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-rent"></span></div>
	                <h3 class="heading mb-0 pl-3">Rental Cars</h3>
                </div>
                <p>Rental Cars From Air Port To Your Hotel .ENjoy</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Choose Your Dream Destination</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url('images/winter-wandering-get-inspired.jpg');">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs.2500000</span>
    							<p class="from-day">
    								<span>10</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Winter Wandering</a></h2>
    						<span>Cold</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/honeymooning-home-page.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs.250000</span>
    							<p class="from-day">
    								<span>10</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Honeymooning In</a></h2>
    						<span>Mood</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs250000</span>
    							<p class="from-day">
    								<span>10</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Shopping Delight</a></h2>
    						<span>Shop</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs250000</span>
    							<p class="from-day">
    								<span>10</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Beachy Holiday</a></h2>
    						<span>Hoilday</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs250000</span>
    							<p class="from-day">
    								<span>10</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Culture & Heritage</a></h2>
    						<span>Audi</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs2500</span>
    							<p class="from-day">
    								<span>10</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Food Tripping</a></h2>
    						<span>Food</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs25000</span>
    							<p class="from-day">
    								<span>From</span>
    								<span>/Day</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Lone Island</a></h2>
    						<span>Island</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="car-wrap ftco-animate">
    					<div class="img d-flex align-items-end" style="background-image: url(images/.jpg);">
    						<div class="price-wrap d-flex">
    							<span class="rate">Rs15000</span>
    							<p class="from-day">
    								<span>3</span>
    								<span>Days</span>
    							</p>
    						</div>
    					</div>
    					<div class="text p-4 text-center">
    						<h2 class="mb-0"><a href="#">Epic Cities</a></h2>
    						<span>Cities</span>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-black btn-outline-black mr-1">Book now</a> <a href="#" class="btn btn-black btn-outline-black ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section services-section img" style="background-image: url(images/.jpg);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Work flow</span>
            <h2 class="mb-3">How it works</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                <h3>Pick Destination</h3>
                <p>Choose Your Dream Destination From Domestic To International</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-select"></span></div>
                <h3>Select Suitable Dates</h3>
                <p>Choose From Wide Range Of Filghts</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                <h3>Confirm Your Booking</h3>
                <p>Its Easy Booing And Secure Paying :)</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-review"></span></div>
                <h3>Enjoy The Air On The Clouds</h3>
                <p>Enjoy A Smooth Ride On The Clouds</p>
              </div>
            </div>      
          </div>
    		</div>
    	</div>
    </section>


		

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our</span>
            <h2>Mighty Planes</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">September. 15, 2019</a></div>
                  <div><a href="#">Pushpak</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">This Huge Baby Can Take You TO Greater Heights</a></h3>
                <p>Beautifully Interior And Luxury Seats But When Its Comes To Strenght This Beauty is the Beast</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">October. 30, 2019</a></div>
                  <div><a href="#">Cyborge</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">This Huge Baby Can Take You TO Greater Heights</a></h3>
                <p>Beautifully Interior And Luxury Seats But When Its Comes To Strenght This Beauty is the Beast</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">October. 24, 2019</a></div>
                  <div><a href="#">Flying McQeen</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">This Huge Baby Can Take You TO Greater Heights</a></h3>
                <p>Beautifully Interior And Luxury Seats But When Its Comes To Strenght This Beauty is the Beast </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>		

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About </h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-->
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

 