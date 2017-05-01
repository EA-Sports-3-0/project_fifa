<?php
require_once ("header.php");
?>

<body>
    <div class="container">
        <header>
            <div class="page-header">
                <h1>FIFA Dev Edition</h1>
                <div class="navbar-default"><a href="login.php">Login</a><a href="overzicht.php">Home</a><a href="register.php">Register</a><a
                            href="resultaten.php">Resultaten</a></div>
            </div>
        </header>
        <div class="container" id="overzichtinhoud">
            <div class="overzicht">
            <h3>Overzicht</h3>
                <div class="resultatenoverzicht">
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
                            <form action="">
                                <p>Aantal goals</p>
                                <input type="text">
                            </form>
                            <form action="">
                                <p>Aantal goals</p>
                                <input type="text">
                            </form>
                        </div>
                        <div class="scoorderselect">
                            <form action="">
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
                                <input type="submit" value="submit" class="btn btn-primary" id="scoorderbutton">
                            </form>
                            <form action="">
                                <input type="submit" value="submit" class="btn btn-primary" id="scoorderbutton">
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
                            </form>
                        </div>
                    </div>
                    <div class="submitoverzicht">
                        <input type="submit" value="submit" class="btn btn-primary" id="submitoverzicht">
                    </div>
                </div>
            </div>
            <div class="tijdschema">
                <h3>Tijdschema</h3>
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
        <div class="pouletitel">
            <h3>Poulestanden</h3>
        </div>
        <div class="poulestanden">

            <table width="90%">
                <h3>poule A</h3>
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
            <table width="90%">
                <h3>poule B</h3>
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
        <div class="topscoorder">
            <h3><b>Topscoorder</b></h3>
            <h4>Team 3 Ik Natuurlijk</h4>
            <h3><b>Aantal goals</b></h3>
            <h2>6</h2>
        </div>
    </div>
</body>