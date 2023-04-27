<!DOCTYPE html>
<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/includes/connectdb.php';

require_once($_SERVER["DOCUMENT_ROOT"].'/src/payment/paymongo_instance.php');

$res = $connectdb->query("SELECT * FROM tbExam WHERE clExID = ".$_GET['uid']);
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
	<main class="d-flex flex-column flex-lg-row flex-md-row col-7 row-4 mx-md-auto w-md-100 " style="height: 100vh">
		<section class="py-sm-3 px-lg-3 flex-fill lh-sm flex-justify-center">
			<span>
				You have chosen
			<h1>
				<?php echo " ".$row[1]." "; ?>
			</h1>
			
				Exam
			</span>
		</section>
		<section class="flex-fill p-3 col-fluid text-white ml-md-3" style="background: royalblue;">
			<span>Amount: </span>
				<p style=" font-size: larger">
				<?php echo $row[9];?>
				</p>

			<form action="">

				<legend> FILL OUT YOUR INFORMATION: </legend>
				
				<input type="radio" id="gcash" name="gcash" value="gcash">
				<label for="gcash"> GCASH </label> <br>

				<input type="radio" id="gpay" name="gpasy" value="gpay"> 
				<label for="gpay"> GRAP PAY </label> <br>
				
				<input type="radio" id="maya" name="maya" value="maya"> 
				<label for="maya"> MAYA </label> <br>
				
				
				<span>Payment Method: </span>	
				<p>
					
				</p>	
				
				<span>Plan: </span>
			
				<button id="toReg" class="btn btn-danger">
					Cancel 
				</button>
			
				<a href="<?php /*echo $content*/ ?>">
					<button id="toReg" class="btn btn-success">
						Proceed to Paymongo
					</button>
				</a>
			
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