<?php

function my_is_prime(int $number): bool{
    for($i=2; $i<100; $i++) {
        if ($number % $i === 0 && $i != $number) {
            return false;
        } else {
            return true;
        }
    }
    return false;
}

var_dump(my_is_prime(8));