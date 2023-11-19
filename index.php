<?php
include_once('connect.php');
$groups = "SELECT * FROM groups";
$Gresult = mysqli_query($connect,$groups);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


    <header class="ps-2 py-2" style="background: rgb(17,20,24);color:white" >
        <h4>FIFA<span class="fs-6" style="color:red" >.20<span style="color:green" >23</span></span></h4>
    </header>
    <div class="ps-5 d-flex align-items-center justify-content-between px-5" style="background:black" >
        <img src="./images/FIFA.png" style="width: 10rem;" alt="">
        <h1 style="color:white" >RESULT</h1>
    </div>


    <section class="w-100 px-5">
    <form action="" method="POST" class="row d-flex justify-content-center my-5 gap-3 w-75 mx-auto" >
      <input type="submit" id="ALL" value="ALL" name="ALL" class="col-md-2 bg-danger">
      <?php
        while ($rt = mysqli_fetch_assoc($Gresult))
        {?>
        <input active class="col-md-1" id="groups" type="submit" name="<?php echo $rt ["IDgroup"]?>" value="<?php echo $rt ["NAMEgroup"]?>">
        <?php
        }
      ?>
    </form>
  </section>




<div class="container my-5">
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
    <div class="FRONT position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
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
        
?>
<div class="card col-md-6 px-0" style="width:16rem;" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row["IDteam"] ?>">
            <img src="<?php echo $row ["IMG"]?>" alt="" class="w-75 mx-auto">
            <h4 class="text-center"><?php echo $row["NAMETEAM"]?></h4>
          </div>
          <div class="modal fade" id="exampleModal_<?php echo $row["IDteam"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header d-flex flex-column align-items-center justify-content-center">
      <img src = "<?php echo $row["IMG"] ?>" alt = "flag" class="w-75">
      <h3><?php echo $row["NAMETEAM"] ?></h3>
    </div>
    <div class="modal-body">
      <h4>NUMBER OF PLAYERS : <?php echo $row["NUMplayers"] ?></p>
      <h4>CONTINENT : <?php echo $row["CONTINENTteam"] ?></p>
      <h4>CAPITAL : <?php echo $row["CAPITALteam"] ?></p>
    </div>
    <div class="modal-footer">
      
    </div>
  </div>
</div>
</div>
<?php

        

      };
      ?>
      <div class="STADS d-flex justify-content-center flex-column align-items-center my-4">
      <?php
      $S = "SELECT * FROM stadiums WHERE IDGROUP = $key";
    $Sresult = mysqli_query ($connect,$S);
    while ($r = mysqli_fetch_assoc($Sresult)){
        ?>
                        <h4>STADIUM</h4>
                        <p class="fw-bold"><?php echo $r ["NAMEstad"]?></p>
                        <h5>LOCATION</h5>
                        <p class="fw-bold"><?php echo $r ["LOCATIONstad"]?></p>

        <?php
    }
    ?>
    </div>
    <?php
    }
  }
?>



</div>
</div>


<script src="js.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>