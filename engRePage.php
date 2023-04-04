<?php include 'include/header.php';?>


<?php 

if ($_SESSION['user_role'] == 'Employer'){
    
    header("Location: usersFormRegis.php");
}
 


?>

	<!-- Navbar -->

<?php include 'include/navigation.php';?>
	
	

	<div class="container ">
		<div class="row justify-content">



			<table id="example" class="  text-center table table-bordered table-hover table-sm ">
				<thead >
					<tr >
						<th>ID</th>
						<th>Case-ID</th>
						<th>Image</th>
						<th>Enginnering-comment</th>
						
						
				
						
					</tr>
				</thead>
				<tbody>
					
             <?php
            global $connection;
            
            $query = 'SELECT * FROM incident INNER JOIN comments ON incident.incident_id = comments.comment_fk ';
            
            //$query = 'SELECT * FROM incident ';

            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {

                $incident_id = $row['incident_id'];
                
                $case_id = $row['comment_fk'];
                
                $commentFrom_comment_table = $row['comment'];

                 $incident_image = $row['incident_image'];
                
                 
                $ncident_status = $row['incident_status'];
                $incident_date = $row['date'];
                
                
                 echo "<tr  class='text-center' >";
               
                echo " <td  >$incident_id</td>";
                
                echo " <td  >$case_id</td>";
                
                echo " <td  ><img src='upload/$incident_image' width= 100></td>";
                
                echo " <td >$commentFrom_comment_table</td>";
                
               
             
               
            
               
                
               echo "</tr>";
            }

            ?>
            
               
						
					




				</tbody>

			</table>


		</div>
	</div>






 <?php include 'include/footer.php';?>

