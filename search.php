<?php include 'include/header.php';?>



<?php 

if ($_SESSION['user_role'] == 'Employer'){
    
    header("Location: usersFormRegis.php");
}
 




// global $connection;
// if (isset($_POST['Submit'])) {
//     echo  $search = $_POST['search'];
    
//     $query = "SELECT * FROM incident WHERE incident_description LIKE '%$search%' " ;
    
    
//     $search_query = mysqli_query($connection, $query);
    
    
//     if(!$search_query){
//         die("query failed " . mysqli_error($connection));
//     }
    
    
    
//     $count1 = mysqli_num_rows($search_query);
    
//     if($count1 == 0){
        
//         echo "<h1> no data found </h1>";
        
//     } else {
        
//         echo " ";
//     }
// }

?>

<?php include 'include/navigation.php';?>




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
             
           
          
             if (isset($_POST['Submit']) ) {
                 echo  $search = $_POST['search'];
                 
          
            
                 $query = "SELECT * FROM incident WHERE incident_description LIKE '%$search%' " ;

                 $search_query = mysqli_query($connection, $query);
             }
             
             if(!$search_query){
                 
                 die("query failed " . mysqli_error($connection));
             }
             $count1 = mysqli_num_rows($search_query);
             
             if($count1 <0 || $count1 ==''){
                 
                 echo "<h1> no data found </h1>";

                 
             } else {
                 
                 while ($row = mysqli_fetch_assoc($search_query)) {
                     
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
             }
             
             
            
            
            ?>
            
           

				</tbody>

			</table>




<nav aria-label="Page navigation center">
  <ul class="pagination">
  
    
    
    
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


