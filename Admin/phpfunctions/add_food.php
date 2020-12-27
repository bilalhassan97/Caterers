<?php
include "../Classes/Category.php";
$i=new Category(1,"Rice","rice_image.jpg");
$result=$i->viewCategories();
$result1=$i->viewIngredients();

#echo $f->display();
#header("Location:../user.php");
?>

<html>

<head>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Caterars</title>
      
      <link rel="stylesheet" href="../cssfiles/bootstrap.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="../cssfiles/fontastic.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="../cssfiles/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../cssfiles/custom.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
      
      
</head>
<body>

<nav class="navbar navbar-expand-md navbar-custom">
                  <ul style="padding-left:50px;" class="navbar-nav">
                        <li class="nav-item">
                              <h3 style="color:white;">Admin</h3>
                        </li>
                  </ul>
                  <ul style="padding-left:30px;" class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="../dashboard.php">Dashboard</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="../user.php">User</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="../order.php">Order</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="../food.php">Food</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="feedback.php">Feedback</a>
                        </li>
                  </ul>
            </nav>
      </div>

      <div class="row" style="padding-left:300px; padding-top:20px;">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4> Add Food Details</h4>
                </div>
                <div class="card-body">
                  <p>Provide the Food Details</p>
                  <form enctype="multipart/form-data" method="POST" action="add_food_working.php">
                 <div class="form-group">       
                    <label>Category ID : </label>
                    <select name="cate_id" style="margin-left:10px;">
                    <?php while($row=$result->fetch()){ ?>
                        <option value="<?php echo $row['cate_id']?>"><?php echo $row['name']?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">       
                    <label>Ingredients : </label><br>
                    <?php while($row=$result1->fetch()){ ?>
                    <input type="checkbox" name="check_list[]" value="<?php echo $row['in_id']?>"><label><?php echo $row['name']?></label>
                    <?php } ?>
                    </div>
                    <div class="form-group">       
                    <label>Name : </label>
                  <input name="name" type="text" placeholder="Name" required class="form-control">
                    </div>
                    <div class="form-group">       
                    <label>Unit Price : </label>
                  <input name="unit_price" type="text" placeholder="Unit Price" required class="form-control">
                    </div>
                    <div class="form-group">       
                    <label>Description : </label>
                  <textarea name="description" type="textarea" placeholder="Description" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">       
                    <label>Image : </label>
                  <input name="picture" type="file" class="form-control" required>
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="Confirm" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
</body>
</html>