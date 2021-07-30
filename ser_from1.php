<?php
       $connect = mysqli_connect("localhost","root","","database");
	   //if($connect)
		 //  echo "connected";
	   if(isset($_POST["query"]))
	   {
		   $output = '';
		   $query = "SELECT * FROM cities WHERE city_name LIKE '%".$_POST["query"]."%'";
		   $result = mysqli_query($connect,$query);
		   $r = mysqli_num_rows($result);
		   $output = '<ul class="list-unstyled">';
		   if( $r > 0)
		   {
			   while($row = mysqli_fetch_array($result))
			   {
				   $output .= '<lil>'.$row["city_name"].'</lil>'.'<br>';
			   }
		   }
		   else
		   {
			   $output .= '<lil>city not found</lil>';
		   }
		   $output .= '</ul>';
		   echo $output;
	   }
	   ?>
	   