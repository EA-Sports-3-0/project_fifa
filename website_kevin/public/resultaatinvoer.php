<?php
require_once("header.php");
?>
<body>
    <div class="container">
        <header>
            <div class="page-header">
                <h1>FIFA dev edition</h1>
                <div class="navbar-default">
                    <a href="resultaten.php">resultaten</a><a href="resultaatinvoer.php">invoer</a><a href="toernooioverzicht.php">toernooi overzicht</a><a href="teaminvoerspelers.php">Team Invoer</a>
                </div>
            </div>
        </header>
        <section class="section1">
            <div class="sectioninhoud">
                <h3>Invoer resultaten</h3>
                <div class="teamselect">
                    <select name="teams">
                        <option value="team1">team 1</option>
                        <option value="team2">team 2</option>
                        <option value="team3">team 3</option>
                    </select>
                    <select name="teams">
                        <option value="team1">team 1</option>
                        <option value="team2">team 2</option>
                        <option value="team3">team 3</option>
                    </select>
                </div>
                <div class="aantalgoals">
                    <form>
                        <input type="text">
                    </form>
                    <form>
                        <input type="text">
                    </form>
                </div>
                <div class="scoorderselect">
                    <select name="speler">
                        <option value="speler1">speler 1</option>
                        <option value="speler2">speler 2</option>
                        <option value="speler3">speler 3</option>
                    </select>
                    <input type="submit" value="OK" class="btn primary-btn">
                    <input type="submit" value="OK" class="btn primary-btn">
                    <select name="speler">
                        <option value="speler1">speler 1</option>
                        <option value="speler2">speler 2</option>
                        <option value="speler3">speler 3</option>
                    </select>
                </div>
                <div class="submitoverzicht">
                    <input type="submit" value="submit" class="btn primary-btn" id="resultaatsubmit">
                </div>
            </div>
        </section>
        <section class="poulestandsection">
            <h3>Poule Standen</h3>
            <h4>Poule A</h4>
            <div class="poulestanden">
                <table width="80%">
                    <tr>
                        <th>Team</th>
                        <th>Score</th>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                </table>
                <h4>Poule B</h4>
                <table width="80%">
                    <tr>
                        <th>Team</th>
                        <th>Score</th>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Team1</td>
                        <td>7</td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="schemasection">
            <div class="tijdschema">
                <h3>Tijd Schema</h3>
                <table style="width:95%">
                    <tr>
                        <td><b>Team</b></td>
                        <td><b>Team</b></td>
                        <td><b>Tijd</b></td>
                    </tr>
                    <tr>
                        <td>team1</td>
                        <td>team1</td>
                        <td>10:00</td>
                    </tr>
                    <tr>
                        <td>team1</td>
                        <td>team1</td>
                        <td>10:00</td>
                    </tr>
                    <tr>
                        <td>team1</td>
                        <td>team1</td>
                        <td>10:00</td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="topscoorder">
                <h4><b>Topscoorder</b></h4>
                <h5>Team 3 Ik Natuurlijk</h5>
                <h4><b>Aantal goals</b></h4>
                <h3>6</h3>
        </section>
    </div>
</body>
