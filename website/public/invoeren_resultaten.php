<?php require("head.php"); session_start();?>

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
		                            <select name="team1">
		                                <option value="team1">team 1</option>
		                                <option value="team2">team 2</option>
		                                <option value="team3">team 3</option>
		                                <option value="team4">team 4</option>
		                                <option value="team5">team 5</option>
		                                <option value="team6">team 6</option>
		                                <option value="team7">team 7</option>
		                                <option value="team8">team 8</option>
		                                <option value="team9">team 9</option>
		                                <option value="team10">team 10</option>
		                                <option value="team11">team 11</option>
		                                <option value="team12">team 12</option>
		                                <option value="team13">team 13</option>
		                                <option value="team14">team 14</option>
		                                <option value="team15">team 15</option>
		                                <option value="team16">team 16</option>
		                            </select>
		                            <select name="team2">
		                                <option value="team1">team 1</option>
		                                <option value="team2">team 2</option>
		                                <option value="team3">team 3</option>
		                                <option value="team4">team 4</option>
		                                <option value="team5">team 5</option>
		                                <option value="team6">team 6</option>
		                                <option value="team7">team 7</option>
		                                <option value="team8">team 8</option>
		                                <option value="team9">team 9</option>
		                                <option value="team10">team 10</option>
		                                <option value="team11">team 11</option>
		                                <option value="team12">team 12</option>
		                                <option value="team13">team 13</option>
		                                <option value="team14">team 14</option>
		                                <option value="team15">team 15</option>
		                                <option value="team16">team 16</option>
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
		                                <option value="speler1">speler 1</option>
		                                <option value="speler2">speler 2</option>
		                                <option value="speler3">speler 3</option>
		                                <option value="speler4">speler 4</option>
		                                <option value="speler5">speler 5</option>
		                                <option value="speler6">speler 6</option>
		                                <option value="speler7">speler 7</option>
		                                <option value="speler8">speler 8</option>
		                                <option value="speler9">speler 9</option>
		                                <option value="speler10">speler 10</option>
		                            </select>
		                            <input type="submit" value="Add1" class="btn btn-primary">
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
	                            	<input type="submit" value="Add2" class="btn btn-primary">
	                                <select name="scoorder2">
	                                    <option value="speler1">speler 1</option>
		                                <option value="speler2">speler 2</option>
		                                <option value="speler3">speler 3</option>
		                                <option value="speler4">speler 4</option>
		                                <option value="speler5">speler 5</option>
		                                <option value="speler6">speler 6</option>
		                                <option value="speler7">speler 7</option>
		                                <option value="speler8">speler 8</option>
		                                <option value="speler9">speler 9</option>
		                                <option value="speler10">speler 10</option>
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
	                <!-- the table's need to be redone in php to make then chance depending on the teams. (line 115-216) -->
		                <table width="90%">
		                    <tr>
		                        <th>Team</th>
		                        <th>Team</th>
		                        <th>Tijd</th>
		                    </tr>
		                    <tr>
		                        <th>Team 1</th>
		                        <th>Team 2</th>
		                        <th>10:00</th>
		                    </tr>
		                    <tr>
		                        <th>Team 1</th>
		                        <th>Team 2</th>
		                        <th>10:00</th>
		                    </tr>
		                    <tr>
		                        <th>Team 1</th>
		                        <th>Team 2</th>
		                        <th>10:00</th>
		                    </tr>
		                    <tr>
		                        <th>Team 1</th>
		                        <th>Team 2</th>
		                        <th>10:00</th>
		                    </tr>
		                    <tr>
		                        <th>Team 1</th>
		                        <th>Team 2</th>
		                        <th>10:00</th>
		                    </tr>
		                    <tr>
		                        <th>Team 1</th>
		                        <th>Team 2</th>
		                        <th>10:00</th>
		                    </tr>
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

<?php require("foot.php");