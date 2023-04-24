<!DOCTYPE html>
<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/includes/connectdb.php';

require_once($_SERVER["DOCUMENT_ROOT"].'/src/payment/paymongo_instance.php');

$res = $connectdb->query("SELECT * FROM tbExam WHERE clExID = ".$_GET['id']);
$row = $res->fetch_array(MYSQLI_NUM);

try {
	// $client->webhooks->disable('hook_HUG7qDyQrfUrwv5Z8UwC2a49');
	$paymentLink = $client->links->all([
			// "amount" => $row[9]*100,
			// "description" => "Payment to Erovoutika for the Exam $row[1]",
			// "remark" => "Good day!"
			"reference_number" => "cPVWSdM"
	]);
	echo "<pre>";
	var_dump($paymentLink) ;

	$content = $paymentLink->data[0]->checkout_url ?? null;
	
	echo $content." IM THE CONTENT";
	echo "</pre>";
} catch(\Paymongo\Exceptions\InvalidRequestException $e){
	echo 'ERROR';
}


?>
<html>
<head>
	<title></title>
</head>
<?php
$plan = $_GET['plan'];
$method = $_GET['method'];
$planText;
$methodText;
switch($plan){
	case 1:
	$planText = "595 6 Monthly Payments";
	break;
	case 2:
	$planText = "2995 One Time Payment";
	break;
}
switch($method){
	case 1:
	$methodText = "mastercard";
	break;
	case 2:
	$methodText = "gcash";
	break;
	case 3:
	$methodText = "maya";
	break;
	case 4:
	$methodText = "bpi";
	break;
}
?>
<body>
	<h1>You have chosen
		<?php
            	echo " ".$row[1]." ";
		?>
		Exam
	</h1>
	<h1>Plan: <?php echo strtoupper($planText);?> </h1>
	<h1>Payment Method: <?php echo strtoupper($methodText);?> </h1>
	<h1>Amount: <?php echo $row[9];?> </h1>


	<button id="toReg">Proceed to Exam </button>

	<a href="<?php echo $content?>"><button id="toReg">Proceed to Paymongo </button></a>
</body>
</html>
<script>
	var toReg = document.getElementById("toReg");
	var sessionId;
	sessionId = '<?php echo (isset($_SESSION['client_sid']))?$_SESSION['client_sid']:''; ?>';
	function proceed(){
		
		if (sessionId != ''){
			window.location.href="examportal_template.php?clExID=<?php echo $_GET['id']; ?>";
		}
		else if(sessionId == ''){
			window.location.href="login.php";
		}
	}
	toReg.addEventListener("click",proceed);
</script>