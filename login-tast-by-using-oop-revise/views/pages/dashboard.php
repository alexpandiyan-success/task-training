<?php 
session_start();

if ($_SESSION['user_id']!='') {
    header("Location: ../../views/pages/dashboard.php"); 
  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Dashboard</title>

    <?php  require '../../assets/bootstrap.php'; ?>

</head>
<body>

<div>

  <div class="container px-4 py-5" id="custom-cards">
              
    <h2 class="pb-2 border-bottom">Welcome To Do App <?php session_start(); echo $_SESSION['name'] ; ?>  </h2> 
    <a href="../../auth/auth-actions/logout.php"><button>Logout</button></a>
    <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-white rounded-5 shadow-lg" ">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

            <form action="../view-actions/dashboard-action.php" method="POST">
              <div class="form-group">
                <label style="color: black;">Enter Task</label><br><br>

                <input type="text" name="task"  required class="form-control" placeholder="Enter task">
              </div>
            <br>
              <button  class="btn btn-primary" style="float: right;">Submit</button>
            </form>
            
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-white rounded-5 shadow-lg">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">S.NO</th>
                  <th scope="col">Task</th>

                </tr>
              </thead>
              <tbody>
              <?php 
                      require ('../../config/Database.php');

                      $obj = new Database;
                      
                      $getdata =  $obj->getAllData();
                      
                      foreach($getdata as $all)
                      {          
?>
                <tr>
                  <th scope="row"><?php  print_r($all['id']);  ?> </th>
                  <td><?php print_r($all['work']);  ?></td>
                </tr>
                <?php  }?>


              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

 
</div>


</body>
</html>