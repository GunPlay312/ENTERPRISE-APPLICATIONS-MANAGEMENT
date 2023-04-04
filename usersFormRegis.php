
<?php include 'include/header.php';?>



<?php 

if(isset($_POST['submit'])){
   
    
    $firstname23 = $_POST['firstname'];
    
    $lastname = $_POST['lastname'];
    
    $email23 = $_POST['email'];
    
    $selectOpt = $_POST['Saff_Roles'];
    
    $password= $_POST['password'];
    
    $user_unique_id = $_POST['user_unique_id'];

    
    if(!empty($firstname23) && !empty($lastname) && !empty($email23) &&!empty($selectOpt) && !empty($password) && !empty($user_unique_id)){
        global $connection;
        $firstname23 = mysqli_real_escape_string($connection, $firstname23);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $email23 = mysqli_real_escape_string($connection, $email23);
        $selectOpt = mysqli_real_escape_string($connection, $selectOpt);
        $password = mysqli_real_escape_string($connection, $password);
        $user_unique_id = mysqli_real_escape_string($connection, $user_unique_id);
        
        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
        
        
    $query = "INSERT INTO users(user_firstname,user_lastname,user_email,user_role,password,users_un_id,date)";
    $query .="VALUE('$firstname23','$lastname','$email23','$selectOpt','$password','$user_unique_id',now())";
    
    mysqli_query($connection, $query);
   
    }
   
    
    
}



?>
  <?php 
  
  if ($_SESSION['user_role'] == 'Employer' ||$_SESSION['user_role'] == 'Enginnering' ){
      
      header("Location: reportForm.php");
  }
  
  
  
  ?>
  
  


<?php include 'include/navigation.php';?>
	
	


	
	<div class="signup-form  ">
	
    <form action="usersFormRegis.php" method="post"  >
		<h2> Register </h2>
		
		
		
        <div class="form-group ">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
			</div>        	
        </div>
        
        <div class="form-group">
        	<input type="text" class="form-control" name="lastname" placeholder="last Name" required="required">
        </div>
        
        
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        
        <div class="form-group">
        <select name="Saff_Roles" class="form-select" >
       <option value="" >Select Staff roles</option>
       <option value="Employer">Employer</option>
       <option value="Enginnering">Enginnering</option>
       <option value="Admin">Admin</option>
      </select>
        
       </div>
        
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required" >
        </div>
        
         
            
            
            <div class="form-group">
        	<input type="text" class="form-control" name="user_unique_id" placeholder="user_unique_id" required="required" >
        </div>
        
            
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        
    </form>
	
	
	</div>






 <?php include 'include/footer.php';?>

