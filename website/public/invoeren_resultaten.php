<?php require("head.php"); session_start();?>

    <div class="container">
		<div class="page-header">
			<div class="title col-md-6 col-md-offset-3">
				<h1>FIFA Dev Edition</h1>
				<span>invoeren resultaten.</span>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="index.php">Home</a></li>
					<?php 
						if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
							echo '<li role="presentation" class="active"><a href="invoeren_resultaten.php">invoeren resultaten</a></li>';
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
		<div class="main-content" id="invoeren_resultaten">
			<div class="container" id="overzichtinhoud">
	            <div class="overzicht">
	            <h3>Overzicht</h3>
	                <div class="resultatenoverzicht">
	                <!-- action still needs a send location. (line 24) -->
	                	<form method="post" action="">
		                    <div class="overzichtteam">
		                        <div class="teamselect">
		                            <select name="teams">
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
		                            <select name="teams">
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
		                                <input type="text" class="a_goals" maxlength="2" placeholder="00">
		                            </div>
		                            <div>
		                                <p>Aantal goals</p>
		                                <input type="text" class="a_goals" maxlength="2" placeholder="00">
		                            </div>
		                        </div>
		                        <div class="scoorderselect">
		                            <div>
		                                <select name="scoorder">
		                                    <option value="speler">speler 1</option>
		                                    <option value="speler">speler 2</option>
		                                    <option value="speler">speler 3</option>
		                                    <option value="speler">speler 4</option>
		                                    <option value="speler">speler 5</option>
		                                    <option value="speler">speler 6</option>
		                                    <option value="speler">speler 7</option>
		                                    <option value="speler">speler 8</option>
		                                    <option value="speler">speler 9</option>
		                                    <option value="speler">speler 10</option>
		                                </select>
		                            </div>
		                            <div>
		                                <select name="scoorder">
		                                    <option value="speler">speler 1</option>
		                                    <option value="speler">speler 2</option>
		                                    <option value="speler">speler 3</option>
		                                    <option value="speler">speler 4</option>
		                                    <option value="speler">speler 5</option>
		                                    <option value="speler">speler 6</option>
		                                    <option value="speler">speler 7</option>
		                                    <option value="speler">speler 8</option>
		                                    <option value="speler">speler 9</option>
		                                    <option value="speler">speler 10</option>
		                                </select>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="submitoverzicht">
		                        <input type="submit" value="submit" class="btn btn-primary" id="submitoverzicht">
		                    </div>
	                    </form>
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