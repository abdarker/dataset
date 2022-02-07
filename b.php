<?php
  include "auth/connection.php";
  session_start();
  $conn = connect();
  $m="";
  include ('navbar.php');
  $user= $_SESSION['user'];
  $id= $_SESSION['userid'];
  $sq= "SELECT * FROM users WHERE id='$id'";
  $thisUser= mysqli_fetch_assoc($conn->query($sq));

  if(isset($_POST['submit'])){
    $item= $_POST['item'];
    $weight= $_POST['weight'];
    $details= $_POST['details'];
    $contact= $_POST['contact'];
    $author= $_POST['author'];
    $sql= "INSERT INTO post(item,weight,details,contact, author) VALUES ('$item', '$weight','$details','$contact', '$author')";
          if($conn->query($sql)===true){
            header('Location:profile.php');
              $m= "Posted";
          }
  }
?>

<!doctype html>
<html lang="en">
  <head>


    <!-- Bootstrap core CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->

<link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">

<meta name="theme-color" content="#7952b3">

<style>



body{
    margin-top:20px;
    background:#fff;
}

.avatar {
    position: relative;
    display: inline-block;
    width: 40px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom
    
}

.avatar i {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 10px;
    height: 10px;
    border: 2px solid #fff;
    border-radius: 100%
}

.avatar img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border: 0 none;
    border-radius: 1000px;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.avatar-online i {
    background-color: #4caf50
}

.avatar-off i {
    background-color: #616161
}

.avatar-busy i {
    background-color: #ff9800
}

.avatar-away i {
    background-color: #f44336
}

.avatar-100 {
    width: 100px
}

.avatar-100 i {
    height: 20px;
    width: 20px
}

.avatar-lg {
    width: 50px
}

.avatar-lg i {
    height: 12px;
    width: 12px
}

.avatar-sm {
    width: 30px
}

.avatar-sm i {
    height: 8px;
    width: 8px
}

.avatar-xs {
    width: 20px
}

.avatar-xs i {
    height: 7px;
    width: 7px
}

.list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff;
   /* border: 1px solid transparent; */
}


</style>

</head>

<body>
<br>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-md-6 col-xs-12 col-md-offset-3">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Post</h3>
        </div>
        <div class="panel-body">
            <!-- form start -->
        <form method="POST" action="home.php" style="padding:55px" class="row g-3">
<div class="col-md-6">
  <label for="exampleFormControlInput1" class="form-label">Wastage Item</label>
  <input type="text" name="item" class="form-control" id="exampleFormControlInput1" require>
</div>
<div class="col-md-6">
  <label for="exampleFormControlInput1" class="form-label">Approximate Weight</label>
  <input type="number" name="weight" class="form-control" id="exampleFormControlInput1" require>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Wastage Details</label>
  <textarea type="text" name="details" class="form-control" id="exampleFormControlTextarea1" rows="2" required></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Contact Number</label>
  <input type="number" name="contact" class="form-control" id="exampleFormControlTextarea1" required></input>
</div>
<div class="mb-3">
  <input type="hidden" name="author" value="<?php echo $thisUser['name'];?>" class="form-control" id="exampleFormControlTextarea1" required></input>
</div>
<div class="col-12">
<button type="submit" value="submit" class="btn btn-primary" name="submit">Post</button>
</div>
</div>
</form>



          <div class="clearfix"></div>
          <hr class="margin-bottom-10">
          <ul class="list-group list-group-dividered list-group-full">
            <li class="list-group-item">
              <div class="media">
                <div class="media-left">
                  <a class="avatar avatar-online" href="javascript:void(0)">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
                    <i></i>
                  </a>
                </div>
                <div class="media-body">
                  <small class="text-muted pull-right">Just now</small>
                  <h4 class="media-heading">@Ramon Dunn</h4>
                  <div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">Recycle Item</li>
                      <li class="list-group-item">Recycle Weight</li>
                     <li class="list-group-item">Recycle details</li>
                     <li class="list-group-item">contact number</li>
  
                 </ul>
                      

                  </div>
                </div>
              </div>
            </li>
            
          </ul>
          
        </div>
      </div>
    </div>
</div>

</div>


</body>

</html>