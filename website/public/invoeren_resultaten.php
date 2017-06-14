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

if (isset($_POST['team1'])) {
	$_SESSION['team1'] = $_POST['team1'];
	unset($_SESSION['scoorder1']);
}
if (isset($_POST['team2'])) {
	$_SESSION['team2'] = $_POST['team2'];
	unset($_SESSION['scoorder2']);
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
							echo '<li role="presentation"><a href="finals_admin.php">finals</a></li>';
						}
						else{
							echo '<li role="presentation"><a href="resultaten.php">resultaten</a></li>';
							echo '<li role="presentation"><a href="finals.php">finals</a></li>';
						}
					?>
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
		                            <div class="teamname">
		                            	<?php 
		                            	if (isset($_POST['team1'])) {
		                            		$sql = $db->prepare("SELECT `name` FROM `tbl_teams` WHERE `id` = ?");
		                            		$sql->execute(array($_POST['team1']));
											$obj = $sql->fetch(PDO::FETCH_ASSOC);
    										echo "<p>".$obj['name']."</p>";
		                            	}
		                            	 ?>
		                            </div>
		                            <div class="teamname">
		                            	<?php 
		                            	if (isset($_POST['team2'])) {
		                            		$sql = $db->prepare("SELECT `name` FROM `tbl_teams` WHERE `id` = ?");
		                            		$sql->execute(array($_POST['team2']));
											$obj = $sql->fetch(PDO::FETCH_ASSOC);
    										echo "<p>".$obj['name']."</p>";
		                            	}
		                            	 ?>
		                            </div>
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
										echo '<option>Select scoorder</option>';
										if (isset($_SESSION['team1'])) {
											$sql = $db->prepare("SELECT * FROM `tbl_players` WHERE `team_id` = ?");
											$sql->execute(array($_SESSION['team1']));
											$playerCount = $sql->rowCount();
				                            $id = 0;
											for ($i=0; $i <= $playerCount; $i++) { 
												$sql = $db->prepare("SELECT `first_name`, `last_name`, `id` FROM `tbl_players` WHERE `id` > $id AND `team_id` = ?");
												$sql->execute(array($_SESSION['team1']));
												$obj = $sql->fetch(PDO::FETCH_ASSOC);
				                            	$players = $obj;
				                            	$id = $obj['id'];
				                            	if ($obj['first_name'] != "" || $obj['last_name'] != "") {
				                            		echo "<option value='".$obj['first_name']." ".$obj['last_name']."'>".$obj['first_name']." ".$obj['last_name']."</option>";
				                            	}
			                            	}
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
										echo '<option>Select scoorder</option>';
										if (isset($_SESSION['team2'])) {
											$sql = $db->prepare("SELECT * FROM `tbl_players` WHERE `team_id` = ?");
											$sql->execute(array($_SESSION['team2']));
											$playerCount = $sql->rowCount();
				                            $id = 0;
											for ($i=0; $i <= $playerCount; $i++) { 
												$sql = $db->prepare("SELECT `first_name`, `last_name`, `id` FROM `tbl_players` WHERE `id` > $id AND `team_id` = ?");
												$sql->execute(array($_SESSION['team2']));
												$obj = $sql->fetch(PDO::FETCH_ASSOC);
				                            	$players = $obj;
				                            	$id = $obj['id'];
				                            	if ($obj['first_name'] != "" || $obj['last_name'] != "") {
				                            		echo "<option value='".$obj['first_name']." ".$obj['last_name']."'>".$obj['first_name']." ".$obj['last_name']."</option>";
				                            	}
			                            	}
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
	            <form action="../app/download.php">
                	<input type="submit" value="download matches.csv">
                </form>
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
	                            $matchCount = $db->query($sql)->rowCount();
	                            $id = 0;
	                            for ($i=0; $i < $matchCount; $i++) { 

	                            	$sql = "SELECT * FROM `tbl_matches` WHERE `id` > '$id'";
	                            	$result = $db->query($sql);
	                            	$base = $result->fetch(PDO::FETCH_ASSOC);
	                            	$id = $base['id'];
	                            	
	                            	$sql = $db->prepare("SELECT `name` FROM `tbl_teams` WHERE `id` = ?");
	                            	$sql->execute(array($base['team_id_a']));
									$row = $sql->fetch(PDO::FETCH_ASSOC);
	                            	$team1 = $row['name'];

	                            	$sql = $db->prepare("SELECT `name` FROM `tbl_teams` WHERE `id` = ?");
	                            	$sql->execute(array($base['team_id_b']));
									$row = $sql->fetch(PDO::FETCH_ASSOC);
	                            	$team2 = $row['name'];

	                            	echo "
	                            	<tr>
	                            		<th>$team1</th>
	                            		<th>$team2</th>
	                            		<th>".$base['start_time']."</th>
	                            	<form method='post' action='#'>
	                            		<input type='hidden' name='team1' value='".$base['team_id_a']."' class='btn btn-primary'>
                            			<input type='hidden' name='team2' value='".$base['team_id_b']."' class='btn btn-primary'>";
                            			if(isset($base['team_id_a']) && isset($base['team_id_b'])){
                            				if (isset($base['score_team_a']) || isset($base['score_team_b'])) {
                            					echo "<th><i class='glyphicon glyphicon-ok'></i> ".$base['score_team_a']." / ".$base['score_team_b']."</th>";
                            				}
                            				else{
                            					echo "<th><i class='glyphicon glyphicon-pencil'></i> <input type='submit' value='edit'></th>";
                            				}
			        					}

		        						echo "</form>
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
				                <?php 	

	                            $sql = "SELECT * FROM `tbl_teams` WHERE `poule_id` = 1";
	                            $matchCount = $db->query($sql)->rowCount();
	                            $id = 0;
	                            for ($i=0; $i < $matchCount; $i++) { 
	                            	$points = 0;

	                            	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > '$id' AND `poule_id` = 1";
	                            	$result = $db->query($sql);
	                            	$base = $result->fetch(PDO::FETCH_ASSOC);
	                            	$id = $base['id'];

	                            	$sql = "SELECT * FROM `tbl_players` WHERE `team_id` = $id";
	                            	$matchCount2 = $db->query($sql)->rowCount();
	                            	$id2 = 0;
	                            	for ($i2=0; $i2 < $matchCount2; $i2++) { 
	                            		$sql = "SELECT * FROM `tbl_players` WHERE `id` > '$id2' AND `team_id` = $id";
	                            		$result = $db->query($sql);
	                            		$player = $result->fetch(PDO::FETCH_ASSOC);
	                            		$id2 = $player['id'];
	                            		$points += $player['goals'];
	                            	}

	                            	$team = $base['name'];
	                            	echo "
	                            	<tr>
				                    	<th>$team</th>
				                    	<th>$points</th>
				                	</tr>
									";
	                            }

				                ?>
				            </table>
			            </div>
			            <h3>poule B</h3>
			            <div class="content">
				            <table width="90%">
				                <tr>
				                    <th>Team</th>
				                    <th>Score</th>
				                </tr>
				                <?php 	
				                
	                            $sql = "SELECT * FROM `tbl_teams` WHERE `poule_id` = 2";
	                            $matchCount = $db->query($sql)->rowCount();
	                            $id = 0;
	                            for ($i=0; $i < $matchCount; $i++) { 
	                            	$points = 0;

	                            	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > '$id' AND `poule_id` = 2";
	                            	$result = $db->query($sql);
	                            	$base = $result->fetch(PDO::FETCH_ASSOC);
	                            	$id = $base['id'];

	                            	$sql = "SELECT * FROM `tbl_players` WHERE `team_id` = $id";
	                            	$matchCount2 = $db->query($sql)->rowCount();
	                            	$id2 = 0;
	                            	for ($i2=0; $i2 < $matchCount2; $i2++) { 
	                            		$sql = "SELECT * FROM `tbl_players` WHERE `id` > '$id2' AND `team_id` = $id";
	                            		$result = $db->query($sql);
	                            		$player = $result->fetch(PDO::FETCH_ASSOC);
	                            		$id2 = $player['id'];
	                            		$points += $player['goals'];
	                            	}

	                            	$team = $base['name'];
	                            	echo "
	                            	<tr>
				                    	<th>$team</th>
				                    	<th>$points</th>
				                	</tr>
									";
	                            }

				                ?>
			            </table>
		            </div>
		        </div>
		        <div class="topscoorder">
			        
			        	<?php 

			        	$sql = "SELECT * FROM `tbl_players`";
	                    $matchCount = $db->query($sql)->rowCount();
	                    $id = 0;
	                    $pouls = array();
	                    for ($i=0; $i < $matchCount; $i++) { 
	                    	$sql = "SELECT * FROM `tbl_players` WHERE `id` > '$id'";
	                    	$result = $db->query($sql);
	                    	$row = $result->fetch(PDO::FETCH_ASSOC);
	                    	$goals = $row['goals'];
	                    	$name = "".$row['first_name']." ".$row['last_name']."";
	                    	$id = $row['id'];

	                    	if (isset($poule["$name"])) {
		                		$poule["$name"] = $goals + $poule["$name"];
		                	}
		                	else{
		                		$poule["$name"] = $goals;
		                	}
	                    }
						if (!empty($poule)) {
	                    	arsort($poule);

	                    	$name = key($poule);
	                    	$goals = array_shift($poule);
	                    	
	                    	echo "
	                    	<h3><b>Topscoorder</b></h3>
				            <h2>$name</h2>
				            <h3><b>Aantal goals</b></h3>
				            <h2>$goals</h2>
							";
	                    }

	                    unset($poule);

			        	?>
		        </div>
	        </div>
	        
			<!-- stop content -->
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php"); ?>

