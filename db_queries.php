<!--
Make sure you run the script to make all the tables first or have already made the tables-->

<html>
    <head>
        <title>Hockey League Database</title>
    </head>

    <body>
        <h2>Insert A New Player into Players (NO DUPLICATES)</h2>
        <form method="POST" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertPlayerQueryRequest" name="insertPlayerQueryRequest">
            JerseyNo: <input type="text" name="insPNo"> <br /><br />
            Name: <input type="text" name="insPName"> <br /><br />
			Age: <input type="text" name="insPAge"> <br /><br />
			Position(C,RW,LW,D,GK): <input type="text" name="insPPos"> <br /><br />
			isCaptain(T or F): <input type="text" name="insPCaptain"> <br /><br />

            <input type="submit" value="Insert" name="insertPlayerSubmit"></p>
        </form>
<h2>Delete a Player from Player Table (Will cascade into PlaysFor, PlayerContract, and PlayerStats)</h2>
        <form method="POST" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="DeletePlayerQueryRequest" name="DeletePlayerQueryRequest">
            JerseyNo: <input type="text" name="DelPNo"> <br /><br />
            Name: <input type="text" name="DelPName"> <br /><br />
			
            <input type="submit" value="Delete" name="DeletePlayerSubmit"></p>
        </form>
		
		<h2>Insert A New Player into PlaysFor (NO DUPLICATES)</h2>
        <form method="POST" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertPlaysForQueryRequest" name="insertPlaysForQueryRequest">
            JerseyNo: <input type="text" name="insPFNo"> <br /><br />
            Name: <input type="text" name="insPFName"> <br /><br />
			TeamID: <input type="text" name="insPFTeamID"> <br /><br />
            <input type="submit" value="Insert" name="insertPlaysForSubmit"></p>
        </form>

        <hr />
		<h2>Update PlayersStats after a Game(Increases GamesPlayed By 1, Adds assists/goals to total count)</h2>
        <p>Must provide a valid JerseyNo, PlayerName, and Year.</p>

        <form method="POST" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updatePlayerStatsRequest" name="updatePlayerStatsRequest">
            JerseyNo: <input type="text" name="JerseyNo"> <br /><br />
            Name: <input type="text" name="Name"> <br /><br />
			Year: <input type="text" name="Year"> <br /><br />
            Goals: <input type="text" name="Goals"> <br /><br />
            Assists: <input type="text" name="Assists"> <br /><br />


            <input type="submit" value="Update" name="updatePlayerStatsSubmit"></p>
        </form>
		
		<hr />
		<h2> Display the Tuples in Player</h2>
		<form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
			<input type="hidden" id ="displayPlayerTupleRequest" name="displayPlayerTupleRequest">
			<input type="submit" name="displayPlayerTuples"></p>
		</form>
	<hr />
		<h2> Display the Tuples in PlaysFor</h2>
		<form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
			<input type="hidden" id ="displayPlaysForTupleRequest" name="displayPlaysForTupleRequest">
			<input type="submit" name="displayPlaysForTuples"></p>
		</form>
	<hr />
	
			<h2> Display the Tuples in PlayerStats</h2>
		<form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
			<input type="hidden" id ="displayPlayerStatsTupleRequest" name="displayPlayerStatsTupleRequest">
			<input type="submit" name="displayPlayerStatsTuples"></p>
		</form>
	<hr />
	

        <h2>Find All Player's with More than X Goals or more than Y Assists</h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="selectionQueryRequest" name="selectionQueryRequest">
            Goals: <input type="text" name="Goals"> <br /><br />
            Assists: <input type="text" name="Assists"> <br /><br />

            <input type="submit" value="Selection" name="selectionRequest"></p>
        </form>	
	<hr />
<h2>Projection of just the Name, Position, and JerseyNumber for all Players</h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="projectionQueryRequest" name="projectionQueryRequest">
            <input type="submit" value="Projection" name="projectionRequest"></p>
        </form>		

	<hr />
<h2>Join. Find all games played between a Team and an Opponent and give the score and result</h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
		    Team: <input type="text" name="Team"> <br /><br />
            Opponent: <input type="text" name="Opponent"> <br /><br />
            <input type="hidden" id="JoinQueryRequest" name="JoinQueryRequest">
            <input type="submit" value="Join" name="JoinRequest"></p>
        </form>				
<hr />
<h2>Group By. Display how many total wins each team has. </h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="GroupByQueryRequest" name="GroupByQueryRequest">
            <input type="submit" value="GroupBy" name="GroupByRequest"></p>
        </form>	
<hr />
<h2>Group By w/ Having. Display all Teams with a Player older than provided Age. </h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
			Age: <input type="text" name="Age"> <br /><br />
            <input type="hidden" id="GroupByHavingQueryRequest" name="GroupByHavingQueryRequest">
            <input type="submit" value="GroupByHaving" name="GroupByHavingRequest"></p>
        </form>				
<hr />
<h2>Nested Agg. Find all teams with average player age greater than the average age of all players. </h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="NestedAggQueryRequest" name="NestedAggQueryRequest">
            <input type="submit" value="NestedAgg" name="NestedAggRequest"></p>
        </form>	
		<hr />
<h2>Division. Find all teams who played in all seasons. </h2>
        <form method="GET" action="db_queries.php"> <!--refresh page when submitted-->
            <input type="hidden" id="DivisionQueryRequest" name="DivisionQueryRequest">
            <input type="submit" value="Division" name="DivisionRequest"></p>
        </form>	
        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }
        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_ryanp3", "a30672166", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }		
		function handleUpdatePlayerStatsRequest() {
            global $db_conn;
// get the data from html
            $jersey_no = $_POST['JerseyNo'];
            $Name = $_POST['Name'];
			$Year = $_POST['Year'];
			$Goals = $_POST['Goals'];
			$Assists = $_POST['Assists'];
			// add to old to get new values
			$getCurrent = executePlainSQL("SELECT * From PlayerStats WHERE NAME='".$Name."' AND JerseyNo='".$jersey_no."'AND Year='".$Year."'");
			$row = oci_fetch_row($getCurrent);
			$oldGamesPlayed = $row[3];
			$oldAssists = $row[4];
			$oldGoals = $row[5];
			$newGamesPlayed = $oldGamesPlayed+1;
			$newAssists = $oldAssists+$Assists;
			$newGoals = $oldGoals+$Goals;
			// execute sql to put new into old values
            executePlainSQL("UPDATE PlayerStats SET GamesPlayed='" . $newGamesPlayed . "' WHERE Name='" . $Name . "' AND JerseyNo='" . $jersey_no . "' AND Year ='".$Year."'");
			executePlainSQL("UPDATE PlayerStats SET Assists='" . $newAssists . "' WHERE Name='" . $Name . "' AND JerseyNo='" . $jersey_no . "' AND Year ='".$Year."'");
			executePlainSQL("UPDATE PlayerStats SET Goals='" . $newGoals . "' WHERE Name='" . $Name . "' AND JerseyNo='" . $jersey_no . "' AND Year ='".$Year."'");
            OCICommit($db_conn);
        }
        function handleInsertPlayerRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insPNo'],
                ":bind2" => $_POST['insPName'],
				":bind3" => $_POST['insPAge'],
				":bind4" => $_POST['insPPos'],
				":bind5" => $_POST['insPCaptain']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into Player values (:bind1, :bind2, :bind3, :bind4, :bind5)", $alltuples);
            OCICommit($db_conn);
        }
 function handleDeletePlayerRequest() {
            global $db_conn;
			// get values to search for delete
                $Player_Jersey_no = $_POST['DelPNo'];
                $Player_Name = $_POST['DelPName'];
			// delete player given
            executePlainSQL("DELETE FROM Player WHERE Name ='".$Player_Name."' AND JerseyNo='".$Player_Jersey_no."'");
            OCICommit($db_conn);
        }		
		 function handleInsertPlaysForRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insPFNo'],
                ":bind2" => $_POST['insPFName'],
				":bind3" => $_POST['insPFTeamID'],
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into PlaysFor values (:bind1, :bind2, :bind3)", $alltuples);
            OCICommit($db_conn);
        }

		function handleDisplayPlayerRequest() {
			global $db_conn;
			//creating table to display
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">JerseyNo</font></b> </td>
				<td> <b><font face="Arial">Name</font></b> </td>
				<td> <b><font face="Arial">Age</font></b> </td>
				<td> <b><font face="Arial">Position</font></b> </td>
				<td> <b><font face="Arial">isCaptain</font></b> </td>
			</tr>';
			$result = executePlainSQL("SELECT * FROM Player");
			// fitting values into table
			echo "<br> Retrieved data from table Player: <br>";
			while(($row = oci_fetch_row($result)) != false){
				$field1name = $row[0];
				$field2name = $row[1];
				$field3name = $row[2];
				$field4name = $row[3];
				$field5name = $row[4];
				
				echo '<tr>
				<td>'.$field1name.'</td>
				<td>'.$field2name.'</td>
				<td>'.$field3name.'</td>
				<td>'.$field4name.'</td>
				<td>'.$field5name.'</td>
				</tr>';
		}
		}
		function handleDisplayPlaysForRequest() {
			global $db_conn;
			//creating table to display
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">JerseyNo</font></b> </td>
				<td> <b><font face="Arial">Name</font></b> </td>
				<td> <b><font face="Arial">TeamID</font></b> </td>
			</tr>';
			$result = executePlainSQL("SELECT * FROM PlaysFor");
			//fitting values into table
			echo "<br> Retrieved data from table PlaysFor: <br>";
			while(($row = oci_fetch_row($result)) != false){
				$field1name = $row[0];
				$field2name = $row[1];
				$field3name = $row[2];				
				echo '<tr>
				<td>'.$field1name.'</td>
				<td>'.$field2name.'</td>
				<td>'.$field3name.'</td>
				</tr>';
		}
		}
		function handleDisplayPlayerStatsRequest() {
			global $db_conn;
			//creating table for display
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">Year</font></b> </td>
				<td> <b><font face="Arial">JerseyNo</font></b> </td>
				<td> <b><font face="Arial">Name</font></b> </td>
				<td> <b><font face="Arial">GamesPlayed</font></b> </td>
				<td> <b><font face="Arial">Assists</font></b> </td>
				<td> <b><font face="Arial">Goals</font></b> </td>
				</tr>';
			$result = executePlainSQL("SELECT * FROM PlayerStats");
			//fitting values into table
			echo "<br> Retrieved data from table PlayerStats: <br>";
			while(($row = oci_fetch_row($result)) != false){
				$field1name = $row[0];
				$field2name = $row[1];
				$field3name = $row[2];				
				$field4name = $row[3];
				$field5name = $row[4];
				$field6name = $row[5];	
				echo '<tr>
				<td>'.$field1name.'</td>
				<td>'.$field2name.'</td>
				<td>'.$field3name.'</td>
				<td>'.$field4name.'</td>
				<td>'.$field5name.'</td>
				<td>'.$field6name.'</td>
				</tr>';
		}
		}		
		function handleSelectionRequest(){
			global $db_conn;
            $Goals = $_GET['Goals'];
			$Assists = $_GET['Assists'];
			//setting up the html table
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">Year</font></b> </td>
				<td> <b><font face="Arial">Name</font></b> </td>
				<td> <b><font face="Arial">JerseyNo</font></b> </td>
				<td> <b><font face="Arial">Assists</font></b> </td>
				<td> <b><font face="Arial">Goals</font></b> </td>
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT * FROM PlayerStats WHERE Goals >='".$Goals."' OR Assists >='".$Assists."'");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							$field2name = $row[1];
							$field3name = $row[2];
							$field4name = $row[4];// dont want gamesplayed here
							$field5name = $row[5];							
							echo '<tr>
							<td>' .$field1name.'</td>
							<td>'.$field2name.'</td>
							<td>' .$field3name.'</td>
							<td>'.$field4name.'</td>							
							<td>'.$field5name.'</td>
							</tr>';
						}
		}

function handleprojectionRequest(){
			global $db_conn;
			//setting up the html table
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">Name</font></b> </td>
				<td> <b><font face="Arial">Position</font></b> </td>
				<td> <b><font face="Arial">JerseyNo</font></b> </td>
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT Name, Position, JerseyNo FROM Player");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							$field2name = $row[1];
							$field3name = $row[2];				
							echo '<tr>
							<td>' .$field1name.'</td>
							<td>'.$field2name.'</td>
							<td>' .$field3name.'</td>
							</tr>';
						}
		}
function handleJoinRequest(){
			global $db_conn;
			//setting up the html table
			$Team = $_GET['Team'];
			$Opponent = $_GET['Opponent'];
			
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">TeamName</font></b> </td>
				<td> <b><font face="Arial">OpponentName</font></b> </td>
				<td> <b><font face="Arial">Score</font></b> </td>
				<td> <b><font face="Arial">Result</font></b> </td>
				<td> <b><font face="Arial">Date</font></b> </td>
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT T1.Name, T2.Name, GP.Score, ST.MatchResult, GP.DatePlayed FROM Team T1, Team T2, GamePlayed GP, ScoreTable ST 
			WHERE T1.Name = '".$Team."' AND T2.Name='".$Opponent."' AND T1.TeamID = GP.TeamID AND T2.TeamID = GP.OpponentID AND ST.Score = GP.Score");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							$field2name = $row[1];
							$field3name = $row[2];				
							$field4name = $row[3];
							$field5name = $row[4];	
							echo '<tr>
							<td>' .$field1name.'</td>
							<td>'.$field2name.'</td>
							<td>' .$field3name.'</td>
							<td>'.$field4name.'</td>
							<td>' .$field5name.'</td>
							</tr>';
						}
		}				
function handleGroupByRequest(){
			global $db_conn;
			//setting up the html table
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">Name</font></b> </td>
				<td> <b><font face="Arial">Total Wins</font></b> </td>
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT T.Name, COUNT (*) FROM GamePlayed GP, Team T, ScoreTable ST WHERE ST.MatchResult = 'Win' 
			AND T.TeamID = GP.TeamID AND ST.Score = GP.Score GROUP BY T.Name ");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							$field2name = $row[1];
							echo '<tr>
							<td>' .$field1name.'</td>
							<td>'.$field2name.'</td>
							</tr>';
						}
		}	
function handleGroupByHavingRequest(){
			global $db_conn;
			//setting up the html table
			$Age = $_GET['Age'];
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">TeamName</font></b> </td>
				<td> <b><font face="Arial">PlayerName</font></b> </td>				
				<td> <b><font face="Arial">PlayerAge</font></b> </td>
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT T.Name, P.Name, P.Age From Team T, PlaysFor PF, Player P WHERE PF.TeamID = T.TeamID AND P.Name = PF.Name AND P.JerseyNo = PF.JerseyNo
			GROUP BY T.Name, P.Name, P.Age HAVING P.Age >'".$Age."'");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							$field2name = $row[1];
							$field3name = $row[2];
							echo '<tr>
							<td>' .$field1name.'</td>
							<td>' .$field2name.'</td>
							<td>' .$field3name.'</td>
							</tr>';
						}
		}			
function handleNestedAggRequest(){
			global $db_conn;
			//setting up the html table
			$Age = $_GET['Age'];
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">TeamName</font></b> </td>
				<td> <b><font face="Arial">AverageAge</font></b> </td>				
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT T.Name, AVG(P.Age) From Team T, PlaysFor PF, Player P 
			WHERE PF.TeamID = T.TeamID AND P.Name = PF.Name AND P.JerseyNo = PF.JerseyNo
			GROUP BY T.Name HAVING AVG(P.AGE) > (SELECT AVG(Age) FROM PLAYER)");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							$field2name = $row[1];
							echo '<tr>
							<td>' .$field1name.'</td>
							<td>' .$field2name.'</td>
							</tr>';
						}
		}	
function handleDivisionRequest(){
			global $db_conn;
			//setting up the html table
			$Age = $_GET['Age'];
			echo '<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td> <b><font face="Arial">TeamName</font></b> </td>			
				</tr>';
			// executing SELECT Statement
			$result = executePlainSQL("SELECT T.Name FROM Team T
			WHERE NOT EXISTS (SELECT S.Year FROM SEASON S
			WHERE NOT EXISTS (SELECT PS.Year FROM PlayedInSeason PS WHERE PS.TeamID = T.TeamID AND PS.Year = S.Year))");
				// loop for inserting into table
			 			while(($row = oci_fetch_row($result)) != false){
							$field1name = $row[0];
							echo '<tr>
							<td>' .$field1name.'</td>
							</tr>';
						}
		}		
        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                 if (array_key_exists('insertPlayerQueryRequest', $_POST)) {
                    handleInsertPlayerRequest();
                } else if (array_key_exists('insertPlaysForQueryRequest', $_POST)){
					handleInsertPlaysForRequest();
				} else if (array_key_exists('updatePlayerStatsRequest', $_POST)){
					handleUpdatePlayerStatsRequest();
				} else if (array_key_exists('DeletePlayerQueryRequest', $_POST)){
					handleDeletePlayerRequest();
				}
                disconnectFromDB();
            }
        }

      //   HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
				if(array_key_exists('displayPlayerTuples', $_GET)) {
					handleDisplayPlayerRequest();
				}
					else if(array_key_exists('selectionRequest', $_GET)) {
					handleSelectionRequest();
				}
					else if(array_key_exists('displayPlaysForTuples', $_GET)) {
					handleDisplayPlaysForRequest();
				}
					else if(array_key_exists('displayPlayerStatsTuples', $_GET)) {
					handleDisplayPlayerStatsRequest();
				}
					else if(array_key_exists('projectionRequest', $_GET)) {
					handleprojectionRequest();
				} else if(array_key_exists('JoinQueryRequest', $_GET)){
					handleJoinRequest();
				} else if(array_key_exists('GroupByQueryRequest', $_GET)){
					handleGroupByRequest();
				} else if(array_key_exists('GroupByHavingQueryRequest', $_GET)){
					handleGroupByHavingRequest();
				} else if(array_key_exists('NestedAggQueryRequest', $_GET)){
					handleNestedAggRequest();
				} else if(array_key_exists('DivisionQueryRequest', $_GET)){
					handleDivisionRequest();
				}
                disconnectFromDB();
            }
        }

		if (isset($_POST['insertPlayerSubmit']) || isset($_POST['DeletePlayerSubmit'])
			|| isset($_POST['updatePlayerStatsSubmit']) || isset($_POST['insertPlaysForSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['displayPlayerTupleRequest']) || isset($_GET['displayPlaysForTupleRequest']) || isset($_GET['NestedAggRequest'])
		|| isset($_GET['JoinQueryRequest']) || isset($_GET['GroupByQueryRequest']) || isset($_GET['GroupByHavingQueryRequest'])
		|| isset($_GET['displayPlayerStatsTupleRequest']) || isset($_GET['projectionQueryRequest']) || isset($_GET['DivisionRequest'])
		|| isset($_GET['selectionQueryRequest'])) {
            handleGETRequest();
        }
		
		?>
	</body>
</html>