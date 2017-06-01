<?php 
require("head.php"); 
session_start();
require("../app/database.php");
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
							echo '<li role="presentation"><a href="finals_admin.php">finals</a></li>';
						}
						else{
							echo '<li role="presentation"><a href="resultaten.php">resultaten</a></li>';
							echo '<li role="presentation" class="active"><a href="finals.php">finals</a></li>';
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
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'wwwww'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					if(isset($place)){
						echo "<p>".$name."</p>";
                    }
                    else{
                    	echo "...";
                    }

                     ?>
                </div>
            </div>
        </div>
        <h2>Finale</h2>
        <div class="finale">
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'www1'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'www2'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
        </div>
        <h2>Halve finales</h2>
        <div class="halvefinales">
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'ww1'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'ww2'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'ww3'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'ww4'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
        </div>
        <h2>Kwart finales</h2>
        <div class="kwartfinales">
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w1'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w2'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w3'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w4'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w5'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w6'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="wedstrijd">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w7'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = 'w8'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
        </div>
        <h2>Groeps fase</h2>
        <div class="groepsfase">
            <div class="groepen">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '1'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '2'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '3'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '4'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="groepen">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '5'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '6'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '7'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '8'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="groepen">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '9'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '10'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '11'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '12'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
            <div class="groepen">
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '13'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '14'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
                <div class="teams">
                    <?php 

                    $sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '15'";
                    $result = $db->query($sql);
    				$obj = $result->fetch(PDO::FETCH_ASSOC);
					$place = $obj['place_id'];
					$name = $obj['name'];

					$sql = "SELECT * FROM `tbl_teams` WHERE `place_id` = '16'";
                    $result2 = $db->query($sql);
    				$obj2 = $result2->fetch(PDO::FETCH_ASSOC);
					$place2 = $obj2['place_id'];
					$name2 = $obj2['name'];

					if(isset($place)){
						echo "<p> ".$name." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }
                    echo "<p> .VS. </p>";
                    if(isset($place2)){
						echo "<p> ".$name2." </p>";
                    }
                    else{
                    	echo "<p> ... </p>";
                    }

                     ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="poulestanden">
	        	<div class="pouletitel">
	            	<h3>Poulestanden</h3>
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