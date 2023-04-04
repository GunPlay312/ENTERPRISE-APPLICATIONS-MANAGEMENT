




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
	crossorigin="anonymous" />
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
	rel="stylesheet" />
<link rel="stylesheet" href="include/style.css" />
<title>Login-Page</title>





  <div class="container">
    <div class="row">
        <div class="col-12">
            <img class="mx-auto d-block" src="upload/sheffiled.png">  
        </div>
    </div>
</div>

	
	<div class="signup-form  ">
	
	
    <form action="loginFunc.php" method="post"  >
    
		<h2> Login </h2>
	
         
        
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        
        
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
        
        
           
            
		<div class="form-group">
            <button type="submit" name="submit_login" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
        
    </form>
	
	
	</div>






 <?php include 'include/footer.php';?>

