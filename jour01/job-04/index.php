<?php

function my_fizz_buzz(int $length): array{
    $numbers = [];

    for($i=1; $i<=$length; $i++){
        if($i % 3 == 0 && $i % 5 == 0){
            $numbers[] = 'FizzBuzz';
        }elseif($i % 3 == 0){
            $numbers[] = 'Fizz';
        }elseif($i % 5 == 0){
            $numbers[] = 'Buzz';
        }else{
            $numbers[] = $i;
        }
    }
    return $numbers;
}

var_dump(my_fizz_buzz(100));