<html>
<p>fhgfthfthftyf</p>
</html>
<?php
  echo "jyhygyjgfhfgtyfty";
       $connect = mysqli_connect("localhost","root","","sample");
	   if($connect)
		   echo "database connect";
	   else
		   echo "Failed";
	   if(isset($_POST["query"]))
	   {
		   $output = '';
		   $query = "SELECT * FROM counrty WHERE name LIKE '%".$_POST["query"]."%'";
		   $result = mysqli_query($connect,$query);
		   $output = '<ul class="list-unstyled">';
		   if(mysqli_num_rows($result) > 0)
		   {
			   while($row = mysqli_fetch_array($result))
			   {
				   $output .= '<li>'.$row["name"].'</li>';
			   }
		   }
		   else
		   {
			   $output .= '<li>country not found</li>';
		   }
		   $output .= '</ul>';
		   echo $output;
	   }
	   ?>
	   