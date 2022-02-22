<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Book Inventory</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="header mb-3 text-center bg-danger"> 
        <h1>Book Inventory</h1>
    </div>
    <br>
    <div class="text-end"><button class="btn btn-warning"><a href="./show.php" style="text-decoration: none;">Show</a></button></div>
    <div class=" container cont w-50">
    <form method="POST" class="cont">
  <div class="mb-3">
    <label for="title" class="form-label">Book Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  <div class="mb-3">
    <label for="spos" class="form-label">Stock Position</label>
    <input type="number" class="form-control" id="spos" name="spos">
  </div>
  <div class="mb-3">
    <label for="bpid" class="form-label">Publisher ID</label>
    <input type="text" class="form-control" id="bpid" name="bpid">
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author 1</label>
    <input type="text" class="form-control" id="author1" name="author1">
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author 2</label>
    <input type="text" class="form-control" id="author2" name="author2">
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author 3</label>
    <input type="text" class="form-control" id="author3" name="author3">
  </div>
  <button type="submit" name="add" class="btn btn-primary">ADD</button>
</form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
include("./db.php");
if(isset($_POST['add'])){
    $query = "insert into book(title,price,stock_position,b_pid) value('".$_POST['title']."','".$_POST['price']."','".$_POST['spos']."','".$_POST['bpid']."');";
    if( mysqli_query($con,$query)){
        $read ="select MAX(bid) from book;";
        $result = mysqli_query($con,$read);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                if($_POST['author1']){
                    $query1 = "insert into written_by(bid,author) value('".$row['MAX(bid)']."','".$_POST['author1']."');";
                    mysqli_query($con,$query1);
                }
                if($_POST['author2']){
                    $query1 = "insert into written_by(bid,author) value('".$row['MAX(bid)']."','".$_POST['author2']."');";
                    mysqli_query($con,$query1);
                }
                if($_POST['author3']){
                    $query1 = "insert into written_by(bid,author) value('".$row['MAX(bid)']."','".$_POST['author3']."');";
                    mysqli_query($con,$query1);
                }

            }
        }
        
        ?>
        <script>alert("Book added Successfully")</script>
        <?php
    }else{
        echo mysqli_error($con);
    }
    
}    


?>
