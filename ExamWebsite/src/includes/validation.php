<?php
include '../includes/connectdb.php';
$success=false;

$username = $connectdb -> real_escape_string($_POST['username']);
$password = $connectdb -> real_escape_string($_POST['password']);

/**
 * Simplify the fetched information by storing the data then passing it.
 * 
 */

$result = $connectdb->execute_query('SELECT * FROM tbusers WHERE clUrUsername= ? AND  clUrPassword= ? AND clUrLevel="0"', [$username,$password]);
//$result = mysqli_query($connectdb, "SELECT * FROM tbusers WHERE clUrUsername='$username' AND clUrPassword='$password' AND clUrLevel='0';");
while($row = $result->fetch_assoc()){
	$success = true;
	$clUrID = $row['clUrID'];
    $clUrUsername = $row['clUrUsername'];
	$clUrFirstname = $row['clUrFirstname'];
}

if($success == true){
	$_SESSION['admin_sid']=session_id();
	$_SESSION['clUrID'] = $clUrID;
    $_SESSION['clUrUsername'] = $clUrUsername;
    session_start();

    //------- Update latest login date
    $sql = "UPDATE tbusers SET clUrLastLogin = date_format(now(), '%Y-%m-%d %H:%i:%s') WHERE clUrID = $clUrID;";
    $result = $connectdb->query($sql);

	header("location: ../webadmin/AdminHome.php");
}else{
        $result = mysqli_query($connectdb, "SELECT * FROM tbusers WHERE clUrUsername='$username' AND clUrPassword='$password' AND clUrLevel='1';");
        while($row = mysqli_fetch_array($result))
        {
        $success = true;
        $clUrID = $row['clUrID'];
        $clUrFirstname = $row['clUrFirstname'];
        $clUrUsername = $row['clUrUsername'];
        $clUrLevel= $row['clUrLevel'];
        }
        if($success == true)
        {
            $_SESSION['client_sid']=session_id();
            $_SESSION['clUrID'] = $clUrID;
            $_SESSION['clUrLevel'] = $clUrLevel;	
            $_SESSION['clUrUsername'] = $clUrUsername;
            session_start();	

            //------- Update latest login date
            $sql = "UPDATE tbusers SET clUrLastLogin = date_format(now(), '%Y-%m-%d %H:%i:%s') WHERE clUrID = $clUrID;";
            $result = $connectdb->query($sql);

            header("location: ../webclient/UserProfile.php");
        }
        else
        {  echo "<script>
			alert('Invalid username or password.');  
			window.location = '../login.php';
			</script>"; 
        }
}
?>
