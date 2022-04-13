<?php



if($_POST){
     
$monthPerYear=12;
$userName=$_POST['name'];
$loanAmount=$_POST['amount'];
$loanYears=$_POST['years'];
if($loanYears<=3){
    $interestRate=0.10*$loanAmount*$loanYears;
}else{
    $interestRate=0.15*$loanAmount*$loanYears;
}

$loanAfterInterest=$interestRate+$loanAmount;
$monthly=$loanAfterInterest/($monthPerYear*$loanYears);

}


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <div class="container">
      <div class="row text-center p-4">
          <div class="col-12">
              <h3>Bank</h3>
          </div>
          <div class="col-12">
              <form action="" method="post">
                  <h4 class="mb-3 text-info">User Name</h4>
                  <input class="mb-3" type="text" name="name" value="<?= $userName??""  ?>">
                  <h4 class="mb-3 text-info">Loan Amount</h4>
                  <input class="mb-3" type="number" name="amount" value="<?= $loanAmount??""  ?>">
                  <h4 class="mb-3 text-info">Loan Years</h4>
                  <input class="mb-3" type="number" name="years" value="<?= $loanYears??""  ?>">
                  <br>
                  <button class="btn btn-primary">Calculate</button>
              </form>
          </div>
      </div>

     <?php
     if($_POST){
       ?>
 <table class="table table-dark">
  <thead>
    <tr>
      <th class="text-info" scope="col">User Name</th>
      <th class="text-info" scope="col">Interest rate</th>
      <th class="text-info" scope="col">Loan after interest</th>
      <th class="text-info" scope="col">Monthly</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>  <?= $userName??""  ?> </td>
      <td><?= $interestRate??""  ?></td>
      <td><?= $loanAfterInterest??""  ?></td>
      <td> <?= $monthly??"" ?> </td>
    </tr>
  </tbody>
</table>
  </div>
  <?php
     }
     ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
