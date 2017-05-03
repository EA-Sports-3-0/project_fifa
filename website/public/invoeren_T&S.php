<?php require("head.php"); session_start();?>

<?php 
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}
?>

    <div class="container">
		<div class="page-header">
			<div class="title col-md-6 col-md-offset-3">
				<h1>FIFA Dev Edition</h1>
				<span>invoeren Teams & Spelers</span>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="index.php">Home</a></li>
					<?php 
						if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
							echo '<li role="presentation"><a href="invoeren_resultaten.php">invoeren resultaten</a></li>';
							echo '<li role="presentation" class="active"><a href="invoeren_T&S.php">invoeren T&S</a></li>';
						}
						else{
							echo '<li role="presentation"><a href="resultaten.php">resultaten</a></li>';
						}
					?>
					<li role="presentation"><a href="finals.php">finals</a></li>
				</ul>
			</div>
			<div class="buffer"></div>
		</div>
		<div class="main-content">
			
			

			
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php");