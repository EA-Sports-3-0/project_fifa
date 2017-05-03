<?php require("head.php"); session_start();?>

    <div class="container">
		<div class="page-header">
			<div class="title col-md-6 col-md-offset-3">
				<h1>FIFA Dev Edition</h1>
				<span>Login voor toegang</span>
				<ul class="nav nav-pills">
					<li role="presentation" class="active"><a href="index.php">Home</a></li>
					<?php 
						if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
							echo '<li role="presentation"><a href="invoeren_resultaten.php">invoeren resultaten</a></li>';
							echo '<li role="presentation"><a href="invoeren_T&S.php">invoeren T&S</a></li>';
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
			<div class="par col-md-6 col-md-offset-3">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quisquam totam beatae suscipit ad quis provident expedita distinctio voluptate necessitatibus earum perferendis accusantium tempore labore, quo recusandae officia perspiciatis, ex? ipsum dolor sit amet, consectetur adipisicing elit. Similique, placeat? Ab non enim pariatur perferendis, minima, animi, corrupti quia quidem deleniti nihil dolore numquam? Quisquam quo assumenda vero, molestiae a.</p>
				<?php 
					if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
				echo '	<form method="post" action="../app/logout.php" class="col-md-6 col-md-offset-3 col-xs-6 col-sm-4">
							<div class="input-group">
								<input type="submit" name="submit" id="submit" value="logout">
							</div>
						</form>';
					}
					else{
				echo '	<form method="post" action="../app/login.php" class="col-md-6 col-md-offset-3 col-xs-6 col-sm-4 col-xs-offset-4 col-sm-offset-3">
							<div class="input-group">
								<input type="text" name="username" id="username" placeholder="username">
								<input type="password" name="password" id="password" placeholder="password">
								<input type="submit" name="submit" id="submit" value="login">
							</div>
						</form>';
					}
				 ?>
				
			</div>
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php");