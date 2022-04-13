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
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h3>Biggest Number</h3>
            </div>
            <div class="col-12 text-center">
                <form method="get">
                    <input class="mt-4" type="number" name="num-1" placeholder="Enter Number 1"><br>
                    <input class="mt-3" type="number" name="num-2" placeholder="Enter Number 2"><br>
                    <input class="mt-3" type="number" name="num-3" placeholder="Enter Number 3"><br>
                    <button class="btn btn-primary mt-3">Big Number</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php

if ($_GET) {
    if ($_GET['num-1'] > $_GET['num-2'] && $_GET['num-1'] > $_GET['num-3']) {
        print_r('<div class="mt-5 text-center text-danger"><h3>Biggest Number = '.$_GET['num-1'] .'</h3></div>');
    } elseif ($_GET['num-2'] > $_GET['num-1'] && $_GET['num-2'] > $_GET['num-3']) {
        print_r('<div class="mt-5 text-center text-danger"><h3>Biggest Number = ' . $_GET['num-2'] . '</h3></div>');
    } else {
        print_r('<div class="mt-5 text-center text-danger"><h3>Biggest Number = ' . $_GET['num-3'] . '</h3></div>');
    };
}

?>