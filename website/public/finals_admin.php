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
				<span>Finals</span>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="index.php">Home</a></li>
					<?php 
						if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
							echo '<li role="presentation"><a href="invoeren_resultaten.php">invoeren resultaten</a></li>';
							echo '<li role="presentation"><a href="invoeren_TS.php">invoeren T&S</a></li>';
							echo '<li role="presentation" class="active"><a href="finals_admin.php">finals</a></li>';
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
		<div class="main-content" id="finals">
			
			<div class="container" id="toernooilayout">
        <h2>Winnaar</h2>
        <div class="winnaar">
            <div class="wedstrijd">
                <div class="teams">
                    <p>team 1</p>
                </div>
            </div>
        </div>
        <h2>Finale</h2>
        <div class="finale">
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
        </div>
        <h2>Halve finales</h2>
        <div class="halvefinales">
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
        </div>
        <h2>Kwart finales</h2>
        <div class="kwartfinales">
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
        </div>
        <h2>Groeps fase</h2>
        <div class="groepsfase">
            <div class="groepen">
                <div class="teams">
                    <p>1</p>
                    <p>vs</p>
                    <p>2</p>
                </div>
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="groepen">
                <div class="teams">
                    <p>1</p>
                    <p>vs</p>
                    <p>2</p>
                </div>
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="groepen">
                <div class="teams">
                    <p>1</p>
                    <p>vs</p>
                    <p>2</p>
                </div>
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
            <div class="groepen">
                <div class="teams">
                    <p>1</p>
                    <p>vs</p>
                    <p>2</p>
                </div>
                <div class="teams">
                    <p>3</p>
                    <p>VS</p>
                    <p>4</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="poulestanden">
	        	<div class="pouletitel">
	            	<h3>Poulestanden</h3>
	            	<form method='post' action='../app/game_creator.php'>
                		<input type='hidden' value="true" name='create'>
                		<input type="submit" value="create game!">
            		</form>
		        </div>
		        <div class="content" id="pouleitems">
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
	        </div>


			
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php");