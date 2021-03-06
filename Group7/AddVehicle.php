<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>

<?php
    require "header.php"
?>
<!--html lang="en"-->
<body>
  <main>
    <div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
    <br>
    <br>
      <div class="container bg-white" style="width:50%;border-radius:25px;border-style:inset;border-width:large">

        <div class="container">
          <?php
          if (isset($_GET['error']))
          {
            if ($_GET['error'] == "emptyfields")
            {
              echo '<small class="text-danger"> Fill in all fields! </small>';
            }else{
              echo '<small class="text-danger"> An internal error occurred; please contact us for assistance. </small>';
            }
          }else if (isset($_GET['create']))
          {
            if ( $_GET['create'] == "success") {
              echo '<small class="text-success"> Vehicle successfully added! </small>';
            }
          }
          ?>
          <h2>Add Vehicle</h2>
          <p>Please fill out the following information to add a vehicle</p>
          <form action="AddVehicle.inc.php" method="post">
            <div class="form-group">
              <label for="licPlateInput">License Plate:</label>
              <input type="text" class="form-control" id="licPlateInput" name="licPlate">
            </div>
            <div class="form-group">
              <label for="makeInput">Make:</label>
              <input type="text" class="form-control" id="makeInput" name="make">
            </div>
            <div class="form-group">
              <label for="yearInput">Year:</label>
              <input type="number" class="form-control" id="yearInput" name="year">
            </div>
            <div class="form-group">
              <label for="modelInput">Model:</label>
              <input type="text" class="form-control" id="modelInput" name="model">
            </div>
            <div class="form-group">
              <label for="colorInput">Color:</label>
              <input type="text" class="form-control" id="colorInput" name="color">
            </div>
            <div class="form-group">
              <label for="capacityInput">Max Capacity (excluding driver):</label>
              <input type="number" class="form-control" id="capacityInput" name="capacity">
            </div>
            <button type="submit" name="AddVehicle-submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <br>
        <br>
      </div>
    <br>
    <br>
    <br>
    <br>
  </main>
</body>
</html>
