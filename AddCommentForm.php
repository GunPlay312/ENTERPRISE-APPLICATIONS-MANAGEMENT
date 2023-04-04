


<?php include 'include/header.php';?>



 <?php 
 

  if (isset($_GET["p_id"])) {
      
      $XX  = $_GET["p_id"];
      
  }
  ?>
  <?php 
 
      if (isset($_POST["create_comment"])) {
    
   
     
      $report = $_POST['repo'];
      
      $report = mysqli_real_escape_string($connection, $report);
      
      $XX = mysqli_real_escape_string($connection, $XX);
      
      $query = "INSERT INTO comments(comment,comment_fk)";
      $query .= "VALUE('$report','$XX')";

    
     
      mysqli_query($connection,$query); 
      
      header("Location: engRePage.php");
  }


  

  
//incident_conmment

?>





<!-- Navbar -->

<?php include 'include/navigation.php';?>


<div class="row justify-content-md-center ">
	<div class="col-md-5  ">
		<div class="form-area">
		
		
		
			<form action="" method='POST' >
			<br>
				
				
				<h3 style="margin-bottom: 25px; text-align: center;">Report-Incident</h3>
				
		
				<br>
			


				<label for="title">Report/Description</label>
				<div class="form-group">
				
					
					 <textarea class="form-control"  rows="3" id="" name="repo">
					 
					
					 
					 </textarea>
					
				</div>
				

				
				<br>
				
				

				<br>

				<input class="btn btn-primary" type="submit" name="create_comment">
			</form>
		</div>
	</div>
</div>

<?php include 'include/footer.php';?>

