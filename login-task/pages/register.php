<?php

require_once '../config/dbconnection.php';


if (isset($_POST['submit'])) {
      
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $sql = "INSERT INTO user_data (`username`,`pass`) VALUES ('$username','$password')";

    if ($connetion->query($sql) === TRUE) {
        header("Location: http://todoapp.test/");
      } else
       {
          echo "something went to wrong...!" ;
      }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<div>

  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">Register here</h2>

    <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-white rounded-5 shadow-lg" ">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

          <form  method="POST">
              <div class="form-group">
                <label style="color: black;">Enter username</label><br><br>
                <input type="text" name="username"   class="form-control" placeholder="Enter username">
              </div>
              <br>
              <div class="form-group">
                <label style="color: black;">Enter password</label><br><br>
                <input type="password" name="password"   class="form-control" placeholder="Enter password">
              </div>
            <br>
            <input type="submit" name="submit" value="submit"  class="form-control bg-primary" style="color:aliceblue" >

            </form>
<br>
            
            
          </div>
        </div>
      </div>

      

    </div>
  </div>

 
</div>


</body>
</html>