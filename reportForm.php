



<?php include 'include/header.php';?>


<?php

global $connection;
if (isset($_POST["create_report"])) {

     //$description = $_POST["submit"];

     $description = $_POST["desc"];
    
     $chekstatus = $_POST["status"];
     
     $post_image_temp = $_FILES['image']['tmp_name'];
     $post_image = $_FILES['image']['name'];
     
 
     
     move_uploaded_file($post_image_temp,"upload/$post_image");
    
     $query = "INSERT INTO incident(incident_description,incident_image,incident_status,date)";
     $query .= "VALUE('$description','$post_image','$chekstatus',now())";
     
    mysqli_query($connection,$query);  
    
    header("Location: empRePage.php");
}

?>




<!-- Navbar -->

<?php include 'include/navigation.php';?>
<div  class="container">

<div class="row justify-content-md-center ">
	<div class="col-md-5  ">
		<div class="form-area">
			<form action='reportForm.php' method='POST' enctype='multipart/form-data'>
				<br style="clear: both">
				<h3 style="margin-bottom: 25px; text-align: center;">Report-Incident</h3>
				
				<br>
				
				<label for="title">Report/Description</label>
				<div class="form-group">

					<input type="text" class="form-control " id="name" name="desc">
				</div>
				
				<br>


<br>
				<div class="form-group">
					<label for="">Select OPT</label>
					<select name="status" class="form-control" >
					
						<option value=''>Select</option>
						
							<option value='Pending'>Pending</option>
					</select>
				</div>



				
				<br>
				
				<label for="title">Image-Report</label>
				<div class="form-group">

					<input type="file" class="form-control" id="image" name="image">
				</div>

				<br>

				<input class="btn btn-primary " type="submit" name="create_report">
			</form>
		</div>
	</div>
</div>
</div>
<?php include 'include/footer.php';?>

