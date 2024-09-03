<?php

function my_str_reverse(string $string): string {
    $newString = '';
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $newString .= $string[$i];
    }

    return $newString;
}

print(my_str_reverse("Je suis a l'envers!"));