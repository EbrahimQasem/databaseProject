<?php


 ?>



 <!DOCTYPE html>
 <html >
 <?php include ('templates/header.php') ?>

 <section class="container grey-text">

     <h4 class="center">Project Records</h4>
     <form class="white" action="records.php" method="POST">
       <label>Department Name: </label>
       <input type="text" name="dep_name" value="">
       <div class="red-text">
       </div>
       <label>Professor Name: </label>
       <input type="text" name="prof_name" value="">
       <div class="red-text">
       </div>
       <label>Student Name: </label>
       <input type="text" name="student_name" value="">
       <div class="red-text">
       </div>
       <label>Project Name: </label>
       <input type="text" name="project_name" value="">
       <div class="red-text">
       </div>
       <div class="center">
         <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">

       </div>
     </form>

   </section>
   <?php include ('templates/footer.php') ?>

 </html>
