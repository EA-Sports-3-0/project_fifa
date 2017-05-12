<?php require("head.php"); 
session_start();
require("../app/database.php");
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
							echo '<li role="presentation" class="active"><a href="invoeren_TS.php">invoeren T&S</a></li>';
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
			
			<form method="post" action="../app/TS_handler.php" id="teaminvoer">
				<div class="teamnaam">
		            <div class="form-group">
		                <label for="teamname">Team naam</label>
		                <input type="text" id="teamname" name="teamname" class="form-control" maxlength="14">
		                <button>create new team</button>
		            </div>
		            <ul>
		                <?php 

		                $id = 0;
		                $sql = "SELECT * FROM `tbl_teams`";
                        $teamCount = mysqli_num_rows(mysqli_query($db, $sql));
                        for ($i=1; $i <= $teamCount; $i++) { 
                        	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
                        	$result = mysqli_query($db, $sql);
                        	$obj = mysqli_fetch_object($result);
                        	$id = $obj->id;
                        	echo "
                        	<div class='teamlist-item'>
	                        	<button name='".$obj->name."'>".$obj->name."</button>
	                        	<input type='submit' name='".$obj->name."' value='X'>
                        	</div>";
                        }

		                 ?>
		            </ul>
		        </div>
		        <div class="spelerinvoer">
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name1" placeholder="first name">
			        	<input type="text" id="speler" name="last_name1" placeholder="last name">
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name2" placeholder="first name">
			        	<input type="text" id="speler" name="last_name2" placeholder="last name">
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name3" placeholder="first name">
			        	<input type="text" id="speler" name="last_name3" placeholder="last name">
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name4" placeholder="first name">
			        	<input type="text" id="speler" name="last_name4" placeholder="last name">
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name5" placeholder="first name">
			        	<input type="text" id="speler" name="last_name5" placeholder="last name">
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name6" placeholder="first name">
			        	<input type="text" id="speler" name="last_name6" placeholder="last name">
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name7" placeholder="first name">
			        	<input type="text" id="speler" name="last_name7" placeholder="last name">
			        </div>
		        </div>
		        <div class="invoerbutton">
		            <button name="submit" type="submit">Team Invoeren</button>
		        </div>
	        </form>
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php");