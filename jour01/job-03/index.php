<?php

function my_is_multiple(int $divider, int $multiple) : bool {
    if($divider % $multiple === 0) {
        print('true');
        return true;
    }else{
        print('false');
        return false;
    }
}

my_is_multiple(10,5);