<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Show</title>
</head>
<body>
    <div class="text-center bg-warning">
        <h2>List All Books</h2>
    </div>
<div>
<table class="table border border-success">
  <thead class="text-center">
    <tr>
      <th scope="col">Book ID</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody class="text-center">
      <?php
        include("./db.php");
        $read = "select * from written_by;";
        $result = mysqli_query($con,$read);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                    <td><?php echo $row['bid'] ?></td>
                    <td><?php echo $row['author'] ?></td>
                    </tr>
                <?php
            }
        }
      ?>
  </tbody>
</table>
</div>
<div class="container">
    <div class="text-end">
        <form action="" method="POST">
            <label for="author">Author Name</label>
            <input type="text" name="author" id="author"> 
            <button type="submit" name="search">Search</button>
        </form>
    </div>
    <?php
        if(isset($_POST['search'])){
            ?>
<h2 class="text-center bg-info">Author's Book</h2>
    <div>
    <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Book ID</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody class="text-center">
      <?php
        include("./db.php");
        $read = "select * from written_by natural join book where author='".$_POST['author']."';";
        $result = mysqli_query($con,$read);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                    <td><?php echo $row['bid'] ?></td>
                    <td><?php echo $row['author'] ?></td>
                    </tr>
                <?php
            }
        }
      ?>
  </tbody>
</table>
    </div>

<?php
        }
    ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>