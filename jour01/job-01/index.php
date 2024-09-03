<?php
function my_str_search(string $haystack, string $needle ): int{
    $counter = 0;

    for ($i = 0; $i < strlen($needle); $i++) {
        if($needle[$i] === $haystack){
            $counter++;
        }
    }

    return $counter;
}

print_r(my_str_search('c', 'coucou'));