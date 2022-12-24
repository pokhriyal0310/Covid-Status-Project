<?php
session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    <style type="text/css">
		.header {
			background-image: url('cool-background.png');
			width: 40%;
			font-family: 'Niconne';
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
					0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 20px;
			background-size: auto;
		}

		.middle {
			margin-top: 60px;
			opacity: 1.0;
			border-radius: 20px;
			background-color: #f2f2f2;
			background-image: url('cool-background3.png');
			background-size: auto;
			padding: 20px;
		}

		th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}

		td,
		th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #ddd;
		}
  </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome - <?php $_SESSION['username']?></title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome </h4>  - <?php //echo $_SESSION['username']?>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php// echo $_SESSION['username']?>. You successfully read this important alert message. You are now able to keep the track of corona state-wise. Stay aware of the latest COVID-19 information by regularly checking updates <br> •Get vaccinated as soon as it’s your turn and follow local guidance on vaccination. <br>
	  •Keep physical distance of at least 1 metre from others, even if they don’t appear to be sick.<br> •Avoid crowds and close contact.<br>
	  •Wear a properly fitted mask when physical distancing is not possible and in poorly ventilated settings.<br>
	  •Clean your hands frequently with alcohol-based hand rub or soap and water.<br>
	  •Cover your mouth and nose with a bent elbow or tissue when you cough or sneeze.<br> •Dispose of used tissues immediately and clean hands regularly. <br>
If you develop symptoms or test positive for COVID-19, self-isolate until you recover.</p>

      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php"> using this link.</a></p>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <center>
		<div class="header">
			<h1>Covid19 Tracker</h1>
		</div>

		<div class="middle">
			<h2>
				Latest Updates of Covid19
				about States and Union
				Territories of India
			</h2>
		</div>

		<div style="overflow-x:auto;">
			<table border="1px ">
				<?php
				$data=file_get_contents(
	'https://api.covid19india.org/data.json');

	$coronalive =json_decode($data,true);

	// echo $coronalive['statewise'][1]['state'];
	$satecount = count($coronalive['statewise']);
				?>
				<tr>
					<th>State</th>
					<th>Confirmed Cases</th>
					<th>Active Cases</th>
					<th>Recovered Cases</th>
					<th>Death Cases</th>
				</tr>
				<?php
				$i = 1;
				while($i < 38) {
				?>
				<tr>
					<td>
<?php echo $coronalive['statewise'][$i]['state'] ?>
					</td>

					<td>
<?php echo $coronalive['statewise'][$i]['confirmed'] ?>
					</td>

					<td>
<?php echo $coronalive['statewise'][$i]['active'] ?>
					</td>

					<td>
<?php echo $coronalive['statewise'][$i]['recovered'] ?>
					</td>

					<td>
<?php echo $coronalive['statewise'][$i]['deaths'] ?>
					</td>
				</tr>
				<?php $i++;
				}
				?>
			</table>
		</div>
	</center>
  </body>
</html>