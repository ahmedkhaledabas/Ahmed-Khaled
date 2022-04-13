<?php

$users=[
    (object)[
        'id'=>1,
      'name'=>'Ahmed',
      'gender'=>(object)[
          "gender" => 'Male'
      ],
      'hobbies' =>[
          'running','swiming'
      ],
      'activities' => [
          "school" => 'painting',
          "home" => 'drawing'
      ],
      'email'=>'abas@gmail.com'
    ],
    (object)[
        'id'=>2,
      'name'=>'Khaled',
      'gender'=>(object)[
          "gender" => 'Male'
      ],
      'hobbies' =>[
          'running', 'swiming'
      ],
      'activities' => [
          "school" => 'painting',
          "home" => 'drawing'
      ]
    ],
    (object)[
        'id'=>3,
      'name'=>'Abas',
      'gender'=>(object)[
          "gender" => 'Male'
      ],
      'hobbies' =>[
          'running', 'swiming'
      ],
      'activities' => [
          "school" => 'painting',
          "home" => 'drawing'
      ],
      
    ],
];

function createTable($users){
    if(!empty($users)){

        $table='<table class="table">
        <thead>
            <tr>';
    foreach($users[0] as $column => $value ){
        $table.="<th >{$column}</th>";
    }                                                                                                           
         $table.= "</tr>
        </thead>
        <tbody>";
        foreach($users as $user){
        $table.= "<tr>";
        foreach($user as $property => $value_1){
           $table.= "<td>";
           if(gettype($value_1)== 'array'  || gettype($value_1)=='object'){
                foreach($value_1 as $key => $value){
                    $table.= $value.' , ';
                }
           }else{
               $table.=$value_1;
           }
           $table.="</td>";
        }
            $table.="</tr>";
    }
      $table.=  "</tbody>
        </table>";

        return $table;

    }else{
        return false;
    }
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

    <?=(createTable($users));
    ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>