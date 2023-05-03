<?php
include '../includes/connectdb.php';

/**
 * Change the stuffs before if statement inside the if statement
 */
if($_SESSION['client_sid']==session_id())
{

  $clUrID = $_SESSION['clUrID'];

  $userQuery = mysqli_query($connectdb, "SELECT * FROM tbusers where clUrID = $clUrID");
    while($row = mysqli_fetch_array($userQuery)){
      $clUrUsername = $row['clUrUsername'];
      $clUrFirstname = $row['clUrFirstname'];
      $clUrLastname = $row['clUrLastname'];
      $clUrcontact_num = $row['clUrcontact_num'];
      $clUremail = $row['clUremail'];
      $clUraddress = $row['clUraddress'];
    }
		?>
<!DOCTYPE html>
<html lang="en">
   <head>
	<title>Erovoutika - Exam</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
	/>

    <!-- Bootstrap Script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/UserProfileStyle.css">
</head>

<body>
	<header class="bg-white border-5 border-bottom border-primary">
        <nav class="navbar navbar-expand-lg navbar-light ms-4 me-4">
            <a class="navbar-brand mr-07" href="#"><img src="../images/Logo2.png" style="height: 60px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-7" id="navbarTogglerDemo03">
                <div class="navbar-nav float-end text-end pr-3">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-item nav-link text-dark mt-3" href="../webexam/UserExamList.php">Exam List</a></li>
                        <li class="nav-item">
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="UserProfile.php"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="../webclient/UserTransaction.php"><span class="bi-credit-card me-2"></span>Transactions</a></li>
                        <li>
                          <?php echo
                            '<a class="dropdown-item" href="Settings.php?clUrID='.$clUrID.'">'
                            ?>
                          <i class="bi bi-gear-fill me-2"></i>Settings</li>
                        <li><a class="dropdown-item" href="../includes/logout.php"><span class="glyphicon me-2">&#xe017;</span>Logout</a></li>
                      </ul>
                    </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>

        <div class="container-fluid bg-light">
            <div class="main-body">
                  <div class="row mt-5">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <caption>List of Recorded Transactions</caption>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Exam</th>                                    
                                    <th scope="col">Username</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Transaction Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT t.ID, t.transactionID, e.clExName, u.clUrUsername, t.transactionMthd, t.transactionAmt, t.transactionDate, t.transactionStat FROM tbtransaction AS t INNER JOIN tbexam AS e INNER JOIN tbusers AS u ON t.ExID = e.clExID AND t.transactionUserID = u.clUrID WHERE t.transactionUserID = ".$clUrID."";
                                $result = $connectdb->query($sql);
                                        
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_array(MYSQLI_NUM)) {

                                        echo'<tr>';
                                            echo'<th scope="row">'.$row[0].'</th>';
                                            echo'<td>'.$row[1].'</td>';
                                            echo'<td>'.$row[2].'</td>';
                                            echo'<td>'.$row[3].'</td>';
                                            echo'<td>'.$row[4].'</td>';
                                            echo'<td>'.$row[5].'</td>';
                                            echo'<td>'.$row[6].'</td>';
                                            echo'<td>'.$row[7].'</td>';
                                    }            
                                        echo '</tr>';
                                }    
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

    </body>
</html>
<?php
    }else
	{
		if($_SESSION['admin_sid']==session_id()){
			header("location:../includes/error.php");		
		}
		else{
				header("location:../login_template.php");
			}
	}
?>