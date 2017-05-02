<?php require("head.php"); session_start();?>

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
							echo '<li role="presentation"><a href="invoeren_T&S.php">invoeren T&S</a></li>';
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
	                <!-- the table's need to be redone in php to make then chance depending on the teams. (line 32-143) -->
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
	            <!-- the topscoorder needs to chance depending on the current points (line 72-77) -->
			    <div class="topscoorder">
		            <h3><b>Topscoorder</b></h3>
		            <h2>Team 3</h2>
		            <h3><b>Aantal goals</b></h3>
		            <h2>6</h2>
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
	        </div>
			<!-- stop content -->
			<div class="buffer"></div>
		</div>
    </div>

<?php require("foot.php");