<?php
include_once('connect.php');
$groups = "SELECT * FROM groups";
$Gresult = mysqli_query($connect,$groups);
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>


  <section class="w-100 px-5">
    <header class="d-flex align-items-center justify-content-between mb-5" >
    <img src="./images/FIFA.png" alt="" style="width:12rem">
    <h1>RESULTS</h1>
    </header>

    <form action="" method="POST" class="row d-flex justify-content-center my-5 gap-3 w-75 mx-auto" >
      <input type="submit" id="ALL" value="ALL" name="ALL" class="col-md-2" >
      <?php
        while ($rt = mysqli_fetch_assoc($Gresult))
        {?>
        <input active class="col-md-1" type="submit" name="<?php echo $rt ["IDgroup"]?>" value="<?php echo $rt ["NAMEgroup"]?>">
        <?php
        }
      ?>
    </form>
  </section>




<div class="container">
<div class="row gap-3 justify-content-center">


  <?php
  $Gresult = mysqli_query($connect, $groups);
  foreach($_POST as $key => $value) {
    if($key == 'ALL') {
      while ($row = mysqli_fetch_assoc($Gresult)) 
      {
        $group = $row ["IDgroup"];
      ?>
  <div class="carda col-1 d-flex align-items-center justify-content-center" style="width: 18rem;height:20rem;cursor:pointer">
<div class="card col-1 d-flex align-items-center justify-content-center" style="width: 18rem;height:20rem;cursor:pointer">
    <div class="FRONT position-absolute">
                <h1 class="text-center">
                GROUPE <?php echo $row ["NAMEgroup"]?>
                </h1>
    </div>
        <div class="BACK position-absolute">

      <?php
$teams = "SELECT * FROM teams WHERE IDGROUP = $group";
$Tresult = mysqli_query($connect,$teams);
while ($roww = mysqli_fetch_assoc($Tresult)) 
{

      ?>


<div class="FIRST d-flex align-items-center fw-bold gap-2" style = "background-color:#ececec;">
                        <img src="<?php echo $roww  ["IMG"] ?>" alt="" class="w-25">
                        <h5><?php echo $roww ["NAMETEAM"] ?></h4>
                    </div>




      <?php
       }
       ?>

         </div>
    </div>
    </div>
    
       <?php
      }

    }
    else {
      $re = "SELECT * FROM teams where IDGROUP = $key";
      $result = mysqli_query($connect,$re);

      while ($row = mysqli_fetch_assoc ($result)) {
        
          echo '<div class="card col-md-6 px-0" style="width:16rem;" data-bs-toggle="modal" data-bs-target="#exampleModal_' . $row["IDteam"] . '">
            <img src="'.$row["IMG"].'" alt="" class="w-75 mx-auto">
            <h4 class="text-center">'.$row["NAMETEAM"].'</h4>
          </div>
          
          <div class="modal fade" id="exampleModal_' . $row["IDteam"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header d-flex flex-column align-items-center justify-content-center">
      <img src = "'.$row ["IMG"] .'" alt = "flag" class="w-75">
      <h3>'.$row ["NAMETEAM"].'</h3>
    </div>
    <div class="modal-body">
      <p>NUMBER OF PLAYERS : '.$row ["NUMplayers"].'</p>
      <p>CONTINENT : '.$row ["CONTINENTteam"].'</p>
      <p>CAPITAL : '.$row ["CAPITALteam"].'</p>
    </div>
    <div class="modal-footer">
      
    </div>
  </div>
</div>
</div>
          
          ';

        

      };
    }
  }
?>



</div>
</div>





    <script src="javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>