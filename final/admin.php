<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminstyle.css">
    <title>Admin</title>
</head>
<body>
    <div class="admin-head">
        <div class="container">
            <div class="row">
                <h1 class="col-lg-6 col-md-6 col-sm-6 col-xs-8">Admin</h1>
                <a href="admin_logout.php" class="col-lg-6 col-md-6 col-sm-6 col-xs-4 text-right">Logout</a>
            </div>
        </div>
    </div>
    <div class="admin-box container">
        <div class="add row">
            <a href="add.php"><button class="btn col-lg-2 col-md-2 col-xs-6" style="background: #F66A85;color: #fff;">Add New</button></a>
        </div>

       <div class="table-responsive">
           <table class="table table-striped table-hover">
               <thead>
               <tr>
                   <th>title</th>
                   <th>picture</th>
                   <th>classify</th>
                   <th>create time</th>
                   <th>price $</th>
                   <th>operate</th>
               </tr>
               </thead>
               <tbody>
               <?php
               include "./phps.php";

               $phps = new phps();

               $phps->getData();
               ?>
               <!-- <tr>
                   <td>5</td>
                   <td>Bangalore</td>
                   <td><img src="./image/custo5.png"></td>
                   <td>2019-10-10 12:55:00</td>
                   <td>
                       <a href=""><button style="background-color: #4caf50;">edt</button></a>
                       <a href=""><button style="background-color: #e20f0f">del</button></a>
                   </td>
               </tr> -->
               </tbody>
           </table>
       </div>
        
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>