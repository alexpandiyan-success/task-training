<?php
session_start();

if ($_SESSION['user_id']!='') {
    header("Location:../pages/store.php"); 
  }
  
  require_once '../config/dbconnection.php';

  if(isset($_POST['submit'])){
      
     $username = $_POST['username'];

     $password = $_POST['password'];

       $query = $connetion->query("SELECT id,username,pass FROM user_data WHERE username = '$username' AND pass = '$password'");

    //    $e = mysqli_query($connetion,$query);

    // print_r($query);

    $getuserdata = $query->fetch_array();

        $count = $query->num_rows;
    //    echo ( $query->num_rows);

      if ($count === 1) {
          $_SESSION['user_id'] =  $getuserdata['id'];
          header("Location:store.php");         
      }else{
          $wrongcredentials = "<p style='color:red'>Invalid username or password</p>";
        
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
    <h2 class="pb-2 border-bottom">Login To Do App</h2>

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
<?php  
echo $wrongcredentials;  
?>
            <p style="color:black;float:righ">Don't have accout ?<a href="../pages/register.php">   click here to register  </a>   </p>
            
          </div>
        </div>
      </div>

      

    </div>
  </div>

 
</div>


</body>
</html>