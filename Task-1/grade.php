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
        <div class="row text-center">
            <div class="col-12">
                <h2>Your Grades</h2>
            </div>
            <div class="col-12">
                <form method="get">
                    <label class="mt-3 text-info">Physics : </label>
                    <input class="mt-3" type="number" name="physics" id="" placeholder="Enter Your Grade">
                    <br>
                    <label class="mt-3 text-info">Chemistry : </label>
                    <input class="mt-3" type="number" name="chemistry" id="" placeholder="Enter Your Grade">
                    <br>
                    <label class="mt- text-info">Biology : </label>
                    <input class="mt-3" type="number" name="biology" id="" placeholder="Enter Your Grade">
                    <br>
                    <label class="mt-3 text-info">Mathmatics : </label>
                    <input class="mt-3" type="number" name="math" id="" placeholder="Enter Your Grade">
                    <br>
                    <label class="mt-3 text-info">Computer : </label>
                    <input class="mt-3" type="number" name="computer" id="" placeholder="Enter Your Grade">
                    <br>
                    <button class="btn btn-primary mt-3">My Total Grade</button>
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

<?php

$percentage='';
$grade='';
if ($_GET) {
    $total = $_GET['computer'] + $_GET['chemistry'] + $_GET['biology'] + $_GET['math'] + $_GET['physics'];
    $percentage = ($total * 100) / 250;
    if ($percentage < 40) {
        $grade = 'F';
    } elseif ($percentage >= 40 && $percentage < 60) {
        $grade = 'E';
    } elseif ($percentage >= 60 && $percentage < 70) {
        $grade = 'D';
    } elseif ($percentage >= 70 && $percentage < 80) {
        $grade = 'c';
    } elseif ($percentage >= 80 && $percentage < 90) {
        $grade = 'B';
    } elseif ($percentage >= 90) {
        $grade = 'A';
    }
    
    echo('<div class="mt-5 text-center text-danger"><h3>Your Persentage = '.$percentage.' % . <br> Your Grade is ( ' . $grade . ' ) . </h3></div>');
    

};

?>