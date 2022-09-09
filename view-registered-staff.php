<?php 

	include 'include/connection.php';
?>
<html>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fa-icon/css/font-awesome.min.css">
<body>
<br>
<br>
<div class="container">
	<h2 class="jumbotron text-center">REGISTERED STAFF TABLE</h2>
	
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th class="success">#</th>
					<th class="success">Staff Name</th>
					<th class="success">Username</th>
					<th class="success">Privilege</th>
					<th class="success">Registered Date</th>
					<th class="success">Action</th>
				</tr>
			</thead>
			<tbody>
			
					<?php 
					$i = 0;
					$sql = "SELECT * FROM staff, privilege WHERE staff.p_id = privilege.privilege_id ORDER BY staff_id DESC";
					$result = $connection->query($sql);
					 while ($row = $result->fetch_array()) {
						$i++;
						$name = $row['staff_name'];
						$uname = $row['username'];
						$privilege = $row['privilege'];
						$date = $row['date_registered'];

						$changedate = date("d F Y h:i", strtotime($date));

							echo '<tr>';
							echo '<td>'.$i.'</td>
							<td>'.$name.'</td>
							<td>'.$uname.'</td>
							<td>'.$privilege.'</td>
							<td>'.$changedate.'</td>
							<td><a onclick="PrintPage()" href="" id="printbutton" class="btn btn-success">Print</a></td>
							';
							echo '</tr>';
						}
					?>
			</tbody>
		</table>

		<button class="btn btn-primary" id="backbutton" onclick="ReturnTo()">Back</button>
	</div>
</div>

<style>
	@media print{
		#printbutton {
			display: none;
		}
	} 
	@media print{
		.table th, td :nthchild{
			display: none;
		}
	}
	@media print{
		#backbutton{
			display: none;
		}
	}
	@page{
		margin: 0 auto;
	}
</style>

<script src="js/jquery-1.9.1.min.js"></script>	
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
	function PrintPage() {
        window.print();
    }
    document.loaded = function(){
        
    }
    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(function(){ window.close() },750)

    });
</script>
<script>
	function ReturnTo(){
		window.open("index.php", "_self");
	}
</script>	
</body>
</html>