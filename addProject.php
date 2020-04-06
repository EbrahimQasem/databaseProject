<?php
  // config
  include('config/connect.php');

  //error messages
  $dep_name = $class_name = $prof_name = $student_name = '';
  $errors = array('dep_name'=>'', 'class_name'=>'', 'prof_name'=>'','student_name'=>'', 'project_name'=>'', 'project_url'=>'');

  if(isset($_POST['submit'])){

      // check department name
      if(empty($_POST['dep_name'])){
        $errors['dep_name'] = "A deprtment name is required <br />";
      } else {
        $dep_name = $_POST['dep_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $dep_name)){
          $errors['dep_name'] = "Department name must be a vlid Department name";
        }
      }

      //check class name
      if(empty($_POST['class_name'])){
        $errors['class_name'] = "A class name is required <br />";
      } else {
        $class_name = $_POST['class_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $class_name)){
          $errors['class_name'] = "Class name must be a vlid class name";
        }
      }

      //check professor name
      if(empty($_POST['prof_name'])){
        $errors['prof_name'] = "A professor name is required <br />";
      } else {
        $prof_name = $_POST['prof_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $prof_name)){
          $errors['prof_name'] = "Professor name must be a vlid professor name";
        }
      }

      //check student name
      if(empty($_POST['student_name'])){
        $errors['student_name'] = "A student name is required <br />";
      } else {
        $student_name = $_POST['student_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $student_name)){
          $errors['student_name'] = "Student name must be a vlid student name";
        }
      }




      if(array_filter($errors)){
        //echo 'errors in the form';
      } else{

        $dep_name = mysqli_real_escape_string($conn, $_POST['dep_name']);
        $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
        $prof_name = mysqli_real_escape_string($conn, $_POST['prof_name']);
        $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
        $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
        $project_url = mysqli_real_escape_string($conn, $_POST['project_url']);

        //create sqlsrv_begin_transaction
        $sql = "INSERT INTO projects(dep_name, class_name, prof_name, student_name, project_name, project_url)
                 VALUES('$dep_name', '$class_name', '$prof_name', '$student_name', '$project_name', '$project_url')";


        // save to database and check database
        if(mysqli_query($conn, $sql)){
          //success
        } else {
          // error
          echo 'query error: ' . mysqli_error($conn);
        }

      }
  }
 ?>

 <!DOCTYPE html>
 <html >
 <?php include ('templates/header.php') ?>

 <section class="container grey-text">

     <h4 class="center">Add a Project</h4>
     <form class="white" action="index.php" method="POST">
       <label>Department Name: </label>
       <input type="text" name="dep_name" value="<?php echo htmlspecialchars($dep_name) ?>">
       <div class="red-text">
         <?php echo $errors['dep_name'] ?>
       </div>
       <label>Class Name: </label>
       <input type="text" name="class_name" value="<?php echo htmlspecialchars($class_name) ?>">
       <div class="red-text">
         <?php echo $errors['class_name'] ?>
       </div>
       <label>Professor Name: </label>
       <input type="text" name="prof_name" value="<?php echo htmlspecialchars($prof_name) ?>">
       <div class="red-text">
         <?php echo $errors['prof_name'] ?>
       </div>
       <label>Student Name: </label>
       <input type="text" name="student_name" value="<?php echo htmlspecialchars($student_name) ?>">
       <div class="red-text">
         <?php echo $errors['student_name'] ?>
       </div>
       <label>Project Name: </label>
       <input type="text" name="project_name" value="">
       <div class="red-text">
       </div>
       <label>Project Link: </label>
       <input type="text" name="project_url" value="">
       <div class="red-text">
       </div>
       <div class="center" >
         <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
       </div>
     </form>

   </section>
   <?php include ('templates/footer.php') ?>

 </html>
