<?php


// function extractToken(){
//     $token = 'Bearer 111|Nenh9dMcL4hSjHVHgkr7MDTxouYAY5dRJaoy4fp4';
//     $token = str_starts_with($token, '|');
//     echo $token;
//     return $token;

// }

// echo extractToken();

// 2===========================================================

function extractToken(){
    $token = 'Bearer 200000|Nenh9dMcL4hSjHVHgkr7MDTxouYAY5dRJaoy4fp4';
    $token = trim($token,'Bearer ');
    $find   = strpos($token,'|');
    $token   =  str_split($token,$find);

    return $token[0];
}






// 1======================================================================

// function extractToken(){
//     $token = 'Bearer 125|Nenh9dMcL4hSjHVHgkr7MDTxouYAY5dRJaoy4fp4';
//     $arr   =  str_split($token,7);
//     unset($arr[0]);
//     $arr   = implode($arr);
//     $find  = strpos($arr,'|');
//     $arr   =  str_split($arr,$find);


//     return $arr[0];
// }


print_r(extractToken());
