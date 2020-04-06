<?php

  include('config/connect.php');

  // write query for all pizzas
  $sql = 'SELECT dep_name, prof_name, student_name, project_name, project_url, id
          FROM projects WHERE prof_name="Bishu Panja" ORDER BY created_at';

  // make query and get result
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as an array
  $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free result from memory
  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);

  //explode(',', $pizzas[0]['ingredients']);
 ?>



 <!DOCTYPE html>
 <html >
 <?php include ('templates/header.php') ?>

 <section class="container grey-text">


     <table>
       <thead>
         <tr>
           <th>Department</th>
           <th>Professor</th>
           <th>Student</th>
           <th>Project</th>
           <th>URL</th>
         </tr>
       </thead>

       <tbody>
         <?php foreach($projects as $oneproject): ?>
         <tr>
           <th><?php echo htmlspecialchars($oneproject['dep_name']); ?></th>
           <th><?php echo htmlspecialchars($oneproject['prof_name']); ?></th>
           <th><?php echo htmlspecialchars($oneproject['student_name']); ?></th>
           <th><?php echo htmlspecialchars($oneproject['project_name']); ?></th>
           <th><?php echo htmlspecialchars($oneproject['project_url']); ?></th>
         </tr>
         <?php endforeach; ?>
       </tbody>

     </table>
   </section>
   <?php include ('templates/footer.php') ?>

 </html>
