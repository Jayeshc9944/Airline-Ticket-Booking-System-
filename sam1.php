<!DOCTYPE html>
  
  <html>
      <head>
	    <title>Auto Complete Country</title>
		  <!-- Latest compiled and minified CSS -->
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

          <!-- jQuery library -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

         <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		<style>
		ul{
			background-color:#eee;
			cursor:pointer;
		}
		li{
			 padding:12px;
		}
		</style>
		</head>
 
    <body>
	    <br /><br />
		<div class = "container" style="width:500px;">
		<h3 align="center">AutoComplete TextBoxes Using </h3>
		<label>Enter Country Name</label>
		<input type="text" name="country" id="country" class = "form-control" placeholder="Enter Country Name">
		<div id="countryList"></div>
		</div>
		</body>
		</html>
		
		<script>
		
		$(document).ready(function(){
			   $('#country').keyup(function(){
				    var query = $(this).val();
					if(query != '')
					{ 
						$.ajax({
							 url:"ser.php",
							 method:"post",
                             data:{query:query},
                             success:function(data)
							 {
								 $('#countryList').fadeIn();
								 $('#countryList').html(data);
							 }							 
						});
					}
              else{
				  $('#countryList').fadeOut();
				  $('#countryList').html("");
			  }
			 });
			 
			 $(document).on('click','li',function(){
				 $('#country').val($(this).text());
				 $('#countryList').fadeOut();
			 });
		});
</script>		
				  
 		
			 