<!DOCTYPE html>
<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/includes/connectdb.php';
require_once($_SERVER["DOCUMENT_ROOT"].'/src/payment/paymongo_instance.php');



$uid = mysqli_real_escape_string($connectdb, $_GET['uid']);
$eid = mysqli_real_escape_string($connectdb, $_GET['eid']);
$pid = mysqli_real_escape_string($connectdb, $_GET['pid']);

$result = $connectdb->query("SELECT `transactionID`, `ExID` FROM `tbtransaction`
							 WHERE (transactionID = '$pid' AND ExID = $eid)");
$check = $result->fetch_row()[0] ?? false;

if(!$check) header('location:includes/error.php');

$res = $connectdb->query("SELECT * FROM `tbexam` WHERE clExID = ".$_GET['eid']);
$row = $res->fetch_array(MYSQLI_NUM);


try {
	// $client->webhooks->disable('hook_HUG7qDyQrfUrwv5Z8UwC2a49');
	// $paymentLink = $client->links->create([
	// 		"amount" => $row[9]*100,
	// 		"description" => "Payment to Erovoutika for the Exam $row[1]",
			// "remark" => "Good day!"
			// "reference_number" => "cPVWSdM"
	// ]);
	// echo "<pre>";
	// var_dump($paymentLink) ;

	// $content = $paymentLink->checkout_url ?? null;
	// echo "</pre>";
} catch(\Paymongo\Exceptions\InvalidRequestException $e){
	// echo 'ERROR';
}

?>

<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment Portal</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="/src/css/payment.css">
</head>

<body>
	<main class="container d-flex flex-column col-12 col-sm-10 col-md-8 col-lg-6 mx-md-auto mw-50 border" style="height: 100vh">
		<section class="position-relative py-sm-3 px-lg-3 flex-fill lh-sm flex-justify-center">
			<span class="position-absolute bottom-0">
				You have chosen
			<h1>
				<?php echo " ".$row[1]." "; ?>
			</h1>
			</span>
			
		</section>
		<section class="position-relative flex-fill p-3 col-fluid text-white ml-md-3 rounded-top shadow" style="background: #29469d;">
			<span class="position-absolute c-top c-end rem-s">
				Payment ID: <?php echo $pid; ?>
			</span>
			<span>Amount: </span>
				<p style=" font-size: 3rem">
				<?php echo $row[9];?>
				</p>

			<form action="/src/payment/payment_method.php" method="POST">

				<legend> PAYMENT </legend>
				
				<span>Payment Method: </span>

				<label for="gcash">
				<input type="radio" id="gcash" name="pmethod" value="gcash">
				<img src="/src/images/gcash.webp" alt="paymaya-logo">
				</label>

				<label for="gpay">
				<input type="radio" id="gpay" name="pmethod" value="grab_pay"> 
				<img src="/src/images/grabpay.jpg" alt="paymaya-logo">
				</label>

				<label for="maya"> 
				<input type="radio" id="maya" name="pmethod" value="paymaya"> 
				<img src="/src/images/maya.jpg" alt="paymaya-logo">
				</label> 
				
				
				
				 <br>

				<span><label for="plan">Plan: </label></span>
				<select class="form-select mb-5" name="plan" id="plan">
					<option value="onetime"> One-time Payment </option>
					<option value="install"> Installment </option>
				</select>

				<input type="hidden" name="price" value="<?php echo $row[9];?>">
				<input type="hidden" name="pid" value="<?php echo $pid;?>">
				<input type="hidden" name="eid" value="<?php echo $eid;?>">

				<button id="toReg" class="btn btn-danger">
					Cancel 
				</button>
			
				<button class="btn btn-success" type="submit">
					Proceed
				</button>
				
			
			</form>
		</section>
	</main>
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