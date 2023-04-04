<?php include 'include/header.php';?>


<?php 

if ($_SESSION['user_role'] == 'Employer'){
    
    header("Location: usersFormRegis.php");
}
 


?>
	<!-- Navbar -->

<?php include 'include/navigation.php';?>
	

	

	<div  class="container">
	<form action="search.php" method="post">
  <div  class="position-absolute top-25 start-50 translate-middle">
	
		<div class=" input-group  d-flex justify-content-center" >
  <input type="search" name="search" class="form-control rounded" placeholder="Search"  />
  <button type="submit" name="Submit" class="btn btn-outline-primary">search</button>
  </div>
 
  </div>
   </form>
  </div>

<br>
<br>
	<div  class="container">
	


	<div class="row  ">
	<div class=" col col-sm-12 ">



			<table  id="example" class="  table table-bordered table-hover table-sm ">
				<thead >
					<tr >
						<th >ID</th>
						<th >Descrip_Fault</th>
						<th >Image</th>
						<th>Status</th>
					
							<th>Solve</th>
							<th>Pending</th>
							<th>Add Comment</th>
							<th>Date</th>
						
						
					</tr>
				</thead>
				<tbody>
				
				
				
					
             <?php
             
             $per_page = 5;
             
             $post_query_count = "SELECT * FROM incident ";
             
             $find_count = mysqli_query($connection, $post_query_count);
             
             $count = mysqli_num_rows($find_count);
             
             $count = ceil($count / $per_page) ;
             
            
           if(isset($_GET['page'])){
              
              $per_page = 5;
              
              // how to find get req 
             $page =  $_GET['page'];
          } else {
              
              $page = "";
          }
          
          // how to find pge 1 
          if($page =="" || $page ==1){
              $page_1 =0;
          } else {
              
              $page_1 = ($page * $per_page ) - $per_page;
          }
          
          
        
          
            
            $query = "SELECT * FROM incident  LIMIT {$page_1}, $per_page ";

            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {

                $incident_id = $row['incident_id'];

                $incident_description = $row['incident_description'];

                 $incident_image = $row['incident_image'];
                
                $ncident_status = $row['incident_status'];
                $incident_date = $row['date'];
                
                
                 echo "<tr  class='text-nowrap' >";
               
                echo " <td  >$incident_id</td>";
                
                echo " <td >$incident_description</td>";
                
                echo " <td  ><img src='upload/$incident_image' width= 100></td>";
                echo " <td >$ncident_status</td>";
               
                echo "<td ><a href='empRePage.php?Resolve=$incident_id'>Approved </a></td>";
                echo "<td ><a href='empRePage.php?Pend=$incident_id'>Pending </a></td>";
                echo "<td ><a href='AddCommentForm.php?p_id=$incident_id'>comment </a></td>";
                
                echo " <td >$incident_date</td>";
                
                echo "</tr>";
            }
            
            ?>
            
           

				</tbody>

			</table>




<nav aria-label="Page navigation center">
  <ul class="pagination">
  
    
    <?php 
     for($i =1; $i <= $count; ++$i ){
         
       echo  "<li class='page-item'><a class='page-link' href='empRePage.php?page={$i}'>$i</a></li>";
     }
     
     
     ?>
    
  </ul>
</nav>


<?php 



if (isset($_GET['Resolve'])) {
    
    $incident_id = $_GET['Resolve'];
    
    $query = "UPDATE incident SET incident_status = 'resolved' WHERE incident_id = $incident_id ";
    
    $unapprove_comments_query = mysqli_query($connection, $query);
    
    
    header("Location: empRePage.php");
}


if (isset($_GET['Pend'])) {
    
    $incident_id = $_GET['Pend'];
    
    $query = "UPDATE incident SET incident_status = 'Pending' WHERE incident_id = $incident_id ";
    
    $unapprove_comments_query = mysqli_query($connection, $query);
    
    
    header("Location: empRePage.php");
}
?>






</div>


		</div>
	</div>






 <?php include 'include/footer.php';?>

