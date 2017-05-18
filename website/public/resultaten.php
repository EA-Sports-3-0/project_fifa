<?php require("head.php"); 
require("../app/database.php");
session_start();?>

    <div class="container">
		<div class="page-header">
			<div class="title col-md-6 col-md-offset-3">
				<h1>FIFA Dev Edition</h1>
				<span>resultaten</span>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="index.php">Home</a></li>
					<?php 
						if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
							echo '<li role="presentation"><a href="invoeren_resultaten.php">invoeren resultaten</a></li>';
							echo '<li role="presentation"><a href="invoeren_TS.php">invoeren T&S</a></li>';
						}
						else{
							echo '<li role="presentation" class="active"><a href="resultaten.php">resultaten</a></li>';
						}
					?>
					<li role="presentation"><a href="finals.php">finals</a></li>
				</ul>
			</div>
			<div class="buffer"></div>
		</div>
		<div class="main-content" id="resultaten">
			
			<!-- start content -->
			<div class="container" id="overzichtinhoud">
				<div class="overzichttitel">
	            	<h3>Overzicht</h3>
		        </div>
		        <div class="tijdschema" id="resultaten">
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

                                $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base['team_id_a']."'";
                                $result = $db->query($sql);
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $team1 = $row['name'];

                                $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base['team_id_b']."'";
                                $result = $db->query($sql);
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $team2 = $row['name'];

                                echo "
                                <tr>
                                    <th>$team1</th>
                                    <th>$team2</th>
                                    <th>".$base['start_time']."</th>
                                </tr>";
                            }
                            ?>
                        </table>
		            </div>
	            </div>
	            <!-- the topscoorder needs to chance depending on the current points (line 72-77) -->
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

                            $sql = "SELECT * FROM `tbl_matches` WHERE `poule_id` = 1";
                            $matchCount = $db->query($sql)->rowCount();
                            $id = 0;
                            $pouls = array();
                            for ($i=0; $i < $matchCount; $i++) { 

                                // get the match
                                $sql = "SELECT * FROM `tbl_matches` WHERE `id` > '$id' AND `poule_id` = 1";
                                $result = $db->query($sql);
                                $base = $result->fetch(PDO::FETCH_ASSOC);
                                $id = $base['id'];

                                // get team1
                                $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base['team_id_a']."'";
                                $result = $db->query($sql);
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $team1 = $row['name'];

                                $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base['team_id_b']."'";
                                $result = $db->query($sql);
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $team2 = $row['name'];

                                // get score team 1
                                $sTeam1 = $base['score_team_a'];

                                // get score team 2
                                $sTeam2 = $base['score_team_b'];

                                if ($sTeam1 > $sTeam2) {
                                    $scTeam1 = 2;
                                    $scTeam2 = 0;
                                }
                                elseif ($sTeam1 < $sTeam2) {
                                    $scTeam1 = 0;
                                    $scTeam2 = 2;
                                }
                                else{
                                    $scTeam1 = 1;
                                    $scTeam2 = 1;
                                }

                                if (isset($poule["$team1"])) {
                                    $poule["$team1"] = $scTeam1 + $poule["$team1"];
                                }
                                else{
                                    $poule["$team1"] = $scTeam1;
                                }
                                if (isset($poule["$team2"])) {
                                    $poule["$team2"] = $scTeam2 + $poule["$team2"];
                                }
                                else{
                                    $poule["$team2"] = $scTeam2;
                                }
                            }
                            if (!empty($poule)) {
                                arsort($poule);

                                foreach ($poule as $key => $points) {
                                    echo "
                                    <tr>
                                        <th>$key</th>
                                        <th>$points</th>
                                    </tr>
                                    ";
                                }
                            }
                            
                            unset($poule);

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

                            $sql = "SELECT * FROM `tbl_matches` WHERE `poule_id` = 2";
                            $matchCount = $db->query($sql)->rowCount();
                            $id = 0;
                            $pouls = array();
                            for ($i=0; $i < $matchCount; $i++) { 

                                // get the match
                                $sql = "SELECT * FROM `tbl_matches` WHERE `id` > '$id' AND `poule_id` = 2";
                                $result = $db->query($sql);
                                $base = $result->fetch(PDO::FETCH_ASSOC);
                                $id = $base['id'];

                                $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base['team_id_a']."'";
                                $result = $db->query($sql);
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $team1 = $row['name'];

                                $sql = "SELECT `name` FROM `tbl_teams` WHERE `id` = '".$base['team_id_b']."'";
                                $result = $db->query($sql);
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $team2 = $row['name'];

                                // get score team 1
                                $sTeam1 = $base['score_team_a'];

                                // get score team 2
                                $sTeam2 = $base['score_team_b'];

                                if ($sTeam1 > $sTeam2) {
                                    $scTeam1 = 2;
                                    $scTeam2 = 0;
                                }
                                elseif ($sTeam1 < $sTeam2) {
                                    $scTeam1 = 0;
                                    $scTeam2 = 2;
                                }
                                else{
                                    $scTeam1 = 1;
                                    $scTeam2 = 1;
                                }

                                if (isset($poule["$team1"])) {
                                    $poule["$team1"] = $scTeam1 + $poule["$team1"];
                                }
                                else{
                                    $poule["$team1"] = $scTeam1;
                                }
                                if (isset($poule["$team2"])) {
                                    $poule["$team2"] = $scTeam2 + $poule["$team2"];
                                }
                                else{
                                    $poule["$team2"] = $scTeam2;
                                }
                            }
                            if (!empty($poule)) {
                                arsort($poule);

                                foreach ($poule as $key => $points) {
                                    echo "
                                    <tr>
                                        <th>$key</th>
                                        <th>$points</th>
                                    </tr>
                                    ";
                                }
                            }
                            
                            unset($poule);

                            ?>
                        </table>
                    </div>
                </div>
	        </div>
			<!-- stop content -->
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php");