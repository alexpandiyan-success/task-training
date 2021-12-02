<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login To Do</title>
    <?php  require '../../assets/bootstrap.php'; ?>
</head>
<body>

<div>

  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">Login To Do App</h2>

    <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-white rounded-5 shadow-lg" ">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

            <form action="../auth-actions/login-action.php" method="POST">
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
// echo $wrongcredentials;  
?>
            <p style="color:black;float:righ">Don't have accout ?<a href="user-register.php">   click here to register  </a>   </p>
            
          </div>
        </div>
      </div>

      

    </div>
  </div>

 
</div>


</body>
</html>