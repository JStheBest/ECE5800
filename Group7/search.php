<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<?php
    require "header.php";
    require "configDB.php";
?>
<body>
	<main>
    <div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:50%;height:800px;border-radius:25px;border-style:inset;border-width:large">
                <section>
                <div class="table-responsive">
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Departure Time</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Day of Week</th>
                    <th scope="col">Route ID</th>
                    <!--th scope="col">FromAddress ID</th>
                    <th scope="col">ToAddress ID</th-->
                    <th scope="col"> </th>
                </tr>
                </thead>
                <form action="bookticket.php" method="post">
                    <?php
                        if (isset($_POST['search-submit']))
                        {
                            if (isset($_POST['from']))
                            {
                                $from = $_POST['from'];
                            }
                            if (isset($_POST['to']))
                            {
                                $to = $_POST['to'];
                            }
                            if (isset($_POST['depTime']))
                            {
                                $depTime = $_POST['depTime'];
                            }

                            $sun=$mon=$tue=$wed=$thu=$fri=$sat=NULL;
                            if (isset($_POST['sun']))
                            {
                                $sun = $_POST['sun'];

                            }
                            if (isset($_POST['mon']))
                            {
                                $mon = $_POST['mon'];

                            }
                            if (isset($_POST['tue']))
                            {
                                $tue = $_POST['tue'];

                            }
                            if (isset($_POST['wed']))
                            {
                                $wed = $_POST['wed'];

                            }
                            if (isset($_POST['thu']))
                            {
                                $thu = $_POST['thu'];

                            }
                            if (isset($_POST['fri']))
                            {
                                $fri = $_POST['fri'];

                            }
                            if (isset($_POST['sat']))
                            {
                                $sat = $_POST['sat'];
                            }
                            $search1 = "$sun, $mon, $tue, $wed, $thu, $fri, $sat";
                            //echo "search1: ". $search1;
                            $search_arr = explode(", ", $search1);
                            //echo"search arr :";
                            //print_r ($search_arr);
                            $out = array("0","0","0","0","0","0","0");
                            for ( $i= 0; $i<7;$i++ )
                            {
                                if ($search_arr[$i] != NULL){
                                    $out[$i] = "1";
                                }  
                            }
                            $week = implode("",$out);
                            //echo "week days: ". $week ;

                            //TODO: be more "lenient" about searching by days of week.
                            //e.g. if the user searches for Mon Wed Fri,
                            //they should also see routes that go on Mon Tue Wed Thu Fri.
                            $sql = "SELECT Route.RouteID,Route.DepartureTime,Route.ArrivalTime, Route.FromAddress, Route.ToAddress, Route.DaysofWeek, A1.AddressID, A2.AddressID, A1.Name, A2.Name
                                    FROM Address AS A1
                                    JOIN Address AS A2
                                    INNER JOIN Route ON (A1.AddressID = Route.FromAddress) AND Route.ToAddress=A2.AddressID
                                    WHERE A1.Name Like '$from' AND A2.Name Like '$to' AND Route.SeatsLeft >0 AND Route.DaysofWeek LIKE '$week'
                                    AND ADDTIME('$depTime','-00:15:00') <= Route.DepartureTime 
                                    AND Route.DepartureTime <= ADDTIME('$depTime','00:15:00')
                                    ORDER BY ABS(TIMEDIFF(Route.DepartureTime,'$depTime')) ASC";
                            $result = mysqli_query($conn, $sql) ;
                            echo"<tbody>";
                                while ($row = mysqli_fetch_array($result))
                                {
                                    $currentRoute = $row['RouteID'];
                                    //echo " ".$currentRoute;
                                    echo "<tr>";
                                    echo "<td>".$from."</td>";
                                    echo "<td>".$to."</td>";
                                    echo "<td>".$row['DepartureTime']."</td>";
                                    echo "<td>".$row['ArrivalTime']."</td>";
                                    echo "<td>".$row['DaysofWeek']."</td>";
                                    echo "<td>".$row['RouteID']."</td>";
                                    //echo "<td>".$row['FromAddress']."</td>";
                                    //echo "<td>".$row['ToAddress']."</td>";

                                    echo '<td><button type="submit" class="btn btn-primary" name="bookticket-submit" value='.$currentRoute.'>Reserve</button></td>';
                                }
                            echo '</tr></tbody>';
                            //echo $currentRoute;
                        }

                        echo'<div class="form-group" style="margin-left:26rem">';
                                    
                            if (isset($_GET['error']))
                            {
                                if ($_GET['error'] == "needPay")
                                {
                                    echo '<large class="text-danger"> Fill in Your Payment in Settings! </large>';
                                }
                                else if ($_GET['error'] == "needAccountSetting")
                                {
                                    echo '<large class="text-danger"> Fill in Your Account in Settings! </large>';
                                }
                                else 
                                {
                                    echo '<large class="text-danger"> Please contact us! </large>';
                                }
                            }
                            else if (isset($_GET['search'])=="success" )
                            {
                                echo '<large class="text-success"> Success! </large>';
                            }

                        echo'</div>'									
                                                                
                        ?>
                    </section>
                    </div>
                </div>
            </form>
        </table>
    <br>
    <br>
    <br>
    <br>
    </div>
    </main>
</body>
</html>