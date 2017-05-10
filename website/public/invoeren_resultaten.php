<?php require("head.php"); 
require("../app/database.php");
session_start();?>

<?php 
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

if (isset($_POST['scoorder1'])) {
	if (!isset($_SESSION['scoorder1'])) {
    	$_SESSION['scoorder1'] = array();
	}
	array_push($_SESSION['scoorder1'], $_POST['scoorder1']);
}

if (isset($_POST['scoorder2'])) {
	if (!isset($_SESSION['scoorder2'])) {
    	$_SESSION['scoorder2'] = array();
	}
	array_push($_SESSION['scoorder2'], $_POST['scoorder2']);
}
?>

    <div class="container">
		<div class="page-header">
			<div class="title col-md-6 col-md-offset-3">
				<h1>FIFA Dev Edition</h1>
				<span>invoeren resultaten</span>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="index.php">Home</a></li>
					<?php 
						if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
							echo '<li role="presentation" class="active"><a href="invoeren_resultaten.php">invoeren resultaten</a></li>';
							echo '<li role="presentation"><a href="invoeren_TS.php">invoeren T&S</a></li>';
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
		<div class="main-content" id="invoeren_resultaten">
			<div class="container" id="overzichtinhoud">
	            <div class="overzicht">
	            	<h3>Overzicht</h3>
	                <div class="resultatenoverzicht">
	                	<form method="post" class="points" action="../app/resultaten_handler.php">
		                    <div class="overzichtteam">
		                        <div class="teamselect">
		                            <select name="team1" id="team1">
		                            	<?php 
		                            	echo '<option>Select Team.</option>';
			                            
			                            $sql = "SELECT * FROM `tbl_teams`";
			                            $teamCount = mysqli_num_rows(mysqli_query($db, $sql));
			                            for ($i=1; $i <= $teamCount; $i++) { 
			                            	$sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = $i";
			                            	$result = mysqli_query($db, $sql);
			                            	$obj = mysqli_fetch_object($result);
			                            	echo "<option value='".$obj->name."'>".$obj->name."</option>";
			                            }
			                            ?>
		                            </select>
		                            <select name="team2" id="team2"">
		                            	<?php 
		                            	echo '<option>Select Team.</option>';
			                            
			                            $sql = "SELECT * FROM `tbl_teams`";
			                            $teamCount = mysqli_num_rows(mysqli_query($db, $sql));
			                            for ($i=1; $i <= $teamCount; $i++) { 
			                            	$sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = $i";
			                            	$result = mysqli_query($db, $sql);
			                            	$obj = mysqli_fetch_object($result);
			                            	echo "<option value='".$obj->name."'>".$obj->name."</option>";
			                            }
			                            ?>
		                            </select>
		                        </div>
		                        <div class="aantalgoals">
		                            <div>
		                                <p>Aantal goals</p>
		                                <input name="point1" type="text" class="a_goals" maxlength="2" placeholder="00">
		                            </div>
		                            <div>
		                                <p>Aantal goals</p>
		                                <input name="point2" type="text" class="a_goals" maxlength="2" placeholder="00">
		                            </div>
		                        </div>
		                    </div>
		                    <div class="submitoverzicht">
		                        <input type="submit" value="submit" class="btn btn-primary" id="submitoverzicht">
		                    </div>
	                    </form>
	                    <div class="scoorderselect">
                            <div class="scoorder1">
                            	<form method="post" action="#">
		                            <select name="scoorder1">

										<?php 
										echo '<option>Select scoorder.</option>';

										$sql = "SELECT * FROM `tbl_players`";
			                            $playerCount = mysqli_num_rows(mysqli_query($db, $sql));
										for ($i=1; $i <= $playerCount; $i++) { 
											$sql = "SELECT `first_name`, `last_name` FROM `tbl_players` WHERE `id` = $i";
											$result = mysqli_query($db, $sql);
			                            	$obj = mysqli_fetch_object($result);
			                            	$players = $obj;
			                            	echo "<option value='".$obj->first_name." ".$obj->last_name."'>".$obj->first_name." ".$obj->last_name."</option>";
		                            	}
										?>

		                            </select>
		                            <input type="submit" value="Add" class="btn btn-primary">
                                </form>
                                <ul>
                                	<?php 
                                	if (isset($_SESSION['scoorder1'])) {
                                		foreach ($_SESSION['scoorder1'] as $scoorder) {
                                			echo "<li>$scoorder</li>";
                                		}
                                	}
                                	?>
                                	<div class="buffer"></div>
                                </ul>
                            </div>
                            <div class="scoorder2">
	                            <form method="post" action="#">
	                            	<input type="submit" value="Add" class="btn btn-primary">
	                                <select name="scoorder2">
	                                    
										<?php 
										echo '<option>Select scoorder.</option>';

										$sql = "SELECT * FROM `tbl_players`";
			                            $playerCount = mysqli_num_rows(mysqli_query($db, $sql));
										for ($i=1; $i <= $playerCount; $i++) { 
											$sql = "SELECT `first_name`, `last_name` FROM `tbl_players` WHERE `id` = $i";
											$result = mysqli_query($db, $sql);
			                            	$obj = mysqli_fetch_object($result);
			                            	$players = $obj;
			                            	echo "<option value='".$obj->first_name." ".$obj->last_name."'>".$obj->first_name." ".$obj->last_name."</option>";
		                            	}
										?>

		                            </select>
                                </form>
                                <ul>
                                	<?php 
                                	if (isset($_SESSION['scoorder2'])) {
                                		foreach ($_SESSION['scoorder2'] as $scoorder) {
                                			echo "<li>$scoorder</li>";
                                		}
                                	}
                                	?>
                                	<div class="buffer"></div>
                                </ul>
                            </div>
                        </div>
	                </div>
	            </div>
	            <div class="tijdschema">
	                <h3>Tijdschema</h3>
	                <div class="content">
		                <table width="90%">
		                    <tr>
		                        <th>Team</th>
		                        <th>Team</th>
		                        <th>Tijd</th>
		                    </tr>
		                    <?php 

		                    $sql = "SELECT * FROM `tbl_matches`";
                            $matchCount = mysqli_num_rows(mysqli_query($db, $sql));
                            $id = 0;
                            for ($i=0; $i < $matchCount; $i++) { 

                            	$sql = "SELECT * FROM `tbl_matches` WHERE `id` > '$id'";
                            	$result = mysqli_query($db, $sql);
                            	$base = mysqli_fetch_object($result);
                            	$id = $base->id;

                            	$sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base->team_id_a."'";
                            	$result = mysqli_query($db, $sql);
                            	$row = mysqli_fetch_object($result);
                            	$team1 = $row->name;

                            	$sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base->team_id_b."'";
                            	$result = mysqli_query($db, $sql);
                            	$row = mysqli_fetch_object($result);
                            	$team2 = $row->name;

                            	echo "
                            	<tr>
                            		<th>$team1</th>
                            		<th>$team2</th>
                            		<th>$base->start_time</th>
                            	</tr>";
                            }
		                    ?>
		                </table>
		            </div>
	            </div>
	        </div>
	        <div class="container" id="poulestanden">
	        	<div class="pouletitel">
	            	<h3>Poulestanden</h3>
		        </div>
		        <div class="poulestanden">
		        	<h3>poule A</h3>
			        <div class="content">
			            <table width="90%">
			                <tr>
			                    <th>Team</th>
			                    <th>Score</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			            </table>
		            </div>
		            <h3>poule B</h3>
		            <div class="content">
			            <table width="90%">
			                <tr>
			                    <th>Team</th>
			                    <th>Score</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			                <tr>
			                    <th>Team 1</th>
			                    <th>3</th>
			                </tr>
			            </table>
		            </div>
		        </div>
		        <!-- the topscoorder needs to chance depending on the current points (line 220-225) -->
		        <div class="topscoorder">
		            <h3><b>Topscoorder</b></h3>
		            <h2>Team 3</h2>
		            <h3><b>Aantal goals</b></h3>
		            <h2>6</h2>
		        </div>
	        </div>
	        
			<!-- stop content -->
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php"); ?>