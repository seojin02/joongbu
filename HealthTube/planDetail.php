<?php
include 'api/dbconn.php';

$conn = new DBC();
$conn->DBI();

if($_GET['date_from'] == null){
  $date_from = date("Y-m-d");
}
?>
<?include 'header.php';?>
<div class="container" style="min-height:1100px;">
	<div class="row">
		<div class="col-md-12">

			<!-- /Contents 여기에 넣어-->

		</div>
		<!-- /col-md-12-->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
<?php include 'footer.php';?>
