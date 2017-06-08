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
		<div class="main-content">
		<?php 
		if (isset($_SESSION['selectTeam'])) {
	        $team = $_SESSION['selectTeam'];

	        $sql = $db->prepare("SELECT * FROM `tbl_teams` WHERE `name` = ?");
	        $sql->execute(array($team));
			$obj = $sql->fetch(PDO::FETCH_ASSOC);
			$teamid = $obj['id'];

	        $sql = $db->prepare("SELECT * FROM `tbl_players` WHERE `team_id` = ?");
	        $matchCount = $sql->execute(array($teamid))->rowCount();
	        $id = 0;
	        $fnames = array("no.0");
			$lnames = array("no.0");
	        for ($i=0; $i < $matchCount; $i++) { 
	        	$sql = $db->prepare("SELECT * FROM `tbl_players` WHERE `team_id` = ? AND `id` > '$id'");
	        	$sql->execute(array($teamid));
				$obj = $sql->fetch(PDO::FETCH_ASSOC);
				$id = $obj['id'];

	        	$fname = $obj['first_name'];
	        	$lname = $obj['last_name'];

	    		array_push($fnames, "$fname");
	    	                    	
	    		array_push($lnames, "$lname");
			}
		}
        ?>
			<form method="post" action="../app/TS_handler.php" id="teaminvoer">
				<div class="teamnaam">
		            <div class="form-group">
		                <label for="teamname">Team naam</label>
		                <input type="text" id="teamname" name="teamname" placeholder="team naam" class="form-control" minlength="2" maxlength="14" autocomplete="off" <?php 
		                if (isset($team)) {
		                	echo "value='$team'";
		                }
		                ?>>
		            </div>
		            <ul>
		            	<input type="submit" name="createNew" value="new team">
		                <?php 

		                $id = 0;
		                $sql = "SELECT * FROM `tbl_teams`";
                        $teamCount = $db->query($sql)->rowCount();
                        for ($i=1; $i <= $teamCount; $i++) { 
                        	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
                        	$result = $db->query($sql);
            				$obj = $result->fetch(PDO::FETCH_ASSOC);
                        	$id = $obj['id'];
                        	echo "
                        	<div class='teamlist-item'>
	                        	<input type='submit' name='".$obj['name']."' value='".$obj['name']."'>
	                        	<input type='submit' name='".$obj['name']."' value='X'>
                        	</div>";
                        }

		                 ?>
		            </ul>
		        </div>
		        <div class="spelerinvoer">
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name1" placeholder="first name" <?php 
			        	if (isset($fnames['1'])) {
			        		echo "value='".$fnames['1']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name1" placeholder="last name" <?php 
			        	if (isset($fnames['1'])) {
			        		echo "value='".$lnames['1']."'";
			        	}
			        	?>>
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name2" placeholder="first name" <?php 
			        	if (isset($fnames['2'])) {
			        		echo "value='".$fnames['2']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name2" placeholder="last name" <?php 
			        	if (isset($lnames['2'])) {
			        		echo "value='".$lnames['2']."'";
			        	}
			        	?>>
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name3" placeholder="first name" <?php 
			        	if (isset($fnames['3'])) {
			        		echo "value='".$fnames['3']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name3" placeholder="last name" <?php 
			        	if (isset($lnames['3'])) {
			        		echo "value='".$lnames['3']."'";
			        	}
			        	?>>
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name4" placeholder="first name" <?php 
			        	if (isset($fnames['4'])) {
			        		echo "value='".$fnames['4']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name4" placeholder="last name" <?php 
			        	if (isset($lnames['4'])) {
			        		echo "value='".$lnames['4']."'";
			        	}
			        	?>>
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name5" placeholder="first name" <?php 
			        	if (isset($fnames['5'])) {
			        		echo "value='".$fnames['5']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name5" placeholder="last name" <?php 
			        	if (isset($lnames['5'])) {
			        		echo "value='".$lnames['5']."'";
			        	}
			        	?>>
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name6" placeholder="first name" <?php 
			        	if (isset($fnames['6'])) {
			        		echo "value='".$fnames['6']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name6" placeholder="last name" <?php 
			        	if (isset($lnames['6'])) {
			        		echo "value='".$lnames['6']."'";
			        	}
			        	?>>
			        </div>
			        <div class="playername">
			        	<input type="text" id="speler" name="first_name7" placeholder="first name" <?php 
			        	if (isset($fnames['7'])) {
			        		echo "value='".$fnames['7']."'";
			        	}
			        	?>>
			        	<input type="text" id="speler" name="last_name7" placeholder="last name" <?php 
			        	if (isset($lnames['7'])) {
			        		echo "value='".$lnames['7']."'";
			        	}
			        	?>>
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