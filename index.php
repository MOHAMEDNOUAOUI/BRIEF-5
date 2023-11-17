<?php
$cnc = mysqli_connect("localhost", "root", "", "worldcup");
function test($cnc) {
  
  $GROUPS = "SELECT * FROM groups;";
  $GROUPSCNC = mysqli_query($cnc,$GROUPS);



  while ($row = mysqli_fetch_assoc($GROUPSCNC)) {
    $groupId = $row["IDgroup"];
  echo '<div class="card col-md-3 d-flex align-items-center px-0" style="width:15rem;background-color:transparent;border:none">
    
  <h1 class="text-center bg-danger w-100 fs-4" style = "color:white;">GROUP '.$row ["NAMEgroup"].'</h1>

  <div class="d-flex justify-content-between flex-column w-100 gap-2 pt-1">';
  $TEAMS = "SELECT * FROM teams WHERE IDGROUP = $groupId;";
  $TEAMSCNC = mysqli_query($cnc,$TEAMS);

  while ($roww = mysqli_fetch_assoc($TEAMSCNC)) {

    echo '
    <div class="FIRST d-flex align-items-center fw-bold gap-2" style = "background-color:#ececec;">
        <img src="'.$roww ["IMG"].'" alt="" class="w-25">
        <h5>'.$roww ["NAMETEAM"].'</h4>
      </div>';
  }

  echo '
  </div>
  </div>
  ';

}
};


function buttons () {
  $cnc = mysqli_connect("localhost", "root", "", "worldcup");
  $GROUPS = "SELECT * FROM groups;";
  $GROUPSCNC = mysqli_query($cnc,$GROUPS);

  while ($row = mysqli_fetch_assoc($GROUPSCNC)) {
    echo '<input type="submit" name="'.$row ["IDgroup"].'" value="GROUP '.$row ["NAMEgroup"].'" class="col-1 bg-danger w-auto px-2" style="color:white;border:none;">';
  }
};

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css">
</head>

<body>



<section class="targeted" style="background-image: url(./images/NEW.jfif);background-size: cover;
    background-position: center;
    width: 100%;
    height: 190vh;">
<div class="NOTHING d-flex align-items-center justify-content-between px-5">
<img src="./images/FIFA.png" alt="" style="width: 10rem;height:10rem;">
<h2>RESULTS</h2>
</div>


<div class="row d-flex justify-content-center gap-2 mt-5 px-5">
  <form action="" method="POST" class="row d-flex justify-content-center gap-2 mt-5 px-5">
    <input type="submit" name="ALL" value="ALL" class="col-2 hihi bg-danger pt-2 pb-2 w-auto px-5" style="color:white;border:none;">
    <?php
    buttons ();
    ?>

    
    
    
  </form>

</div>

    
  
    <!--affichage du groups-->     
    <div id="hamid">
      <div class="row gap-5 justify-content-center w-100 mt-5 ">
      <?php 
    foreach($_POST as $key => $values) {
      if ($key == 'ALL') {
        test ($cnc);
      }
      else
      {
        $cnc = mysqli_connect ("localhost","root","","worldcup");
        $re = "SELECT * FROM teams where IDGROUP = $key";
        $result = mysqli_query($cnc,$re);

        while ($row = mysqli_fetch_assoc ($result)) {
          
            echo '<div class="card col-md-6 px-0" style="width:16rem;" data-bs-toggle="modal" data-bs-target="#exampleModal_' . $row["IDteam"] . '">
              <img src="'.$row["IMG"].'" alt="" class="w-75 mx-auto">
              <h4 class="text-center">'.$row["NAMETEAM"].'</h4>
            </div>
            
            <div class="modal fade" id="exampleModal_' . $row["IDteam"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-header d-flex flex-column align-items-center justify-content-center">
        <img src = "'.$row ["IMG"] .'" alt = "flag">
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
  
</section>

<!-- Button trigger modal -->


<!-- Modal -->






      <script src="js.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>