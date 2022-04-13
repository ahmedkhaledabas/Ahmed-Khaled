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
        <div class="row p-5 text-center">
            <div class="col-12">
                <h3>Smart Invoice</h3>
            </div>
            <div class="col-12 text-center">
                <form method="post">
                    <input type="number" name="killo" placeholder="Enter electricity unit">
                    <br>
                    <button class="btn btn-primary mt-3"> My Invoice</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


<!-- unit price
price aftter unit price
vat 
total price after vat  -->


<?php

if ($_POST) {
    if ($_POST['killo'] > 0 && $_POST['killo'] <= 50) {
        $unitPrice = 0.50;
    } elseif ($_POST['killo'] > 50 && $_POST['killo'] <= 100) {
        $unitPrice = 0.75;
    } elseif ($_POST['killo'] > 100 && $_POST['killo'] <= 200) {
        $unitPrice = 1.20;
    } else {
        $unitPrice = 1.50;
    };
    $priceAfterUnitPrice = $unitPrice * $_POST['killo'];
    $Vat = 0.20;
    $totalPriceAfterVat = $priceAfterUnitPrice + ($priceAfterUnitPrice * $Vat);

    echo ('<div class="alert alert-success">
            <ul>
                <li> Unit Price = ' . $unitPrice . ' EGP . </li>
                <li> Price After Unit Price = ' . $priceAfterUnitPrice . ' EGP . </li>
                <li> Vat = ' . ($Vat * 100) . ' % </li>
                <li> Total Price After Vat = ' . $totalPriceAfterVat . ' EGP . </li>
            </ul>
        </div>');
}

?>