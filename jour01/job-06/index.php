<?php

function my_array_sort(array $arrayToSort, string $order): array {
    foreach ($arrayToSort as $key => $value) {
        for($i = 0; $i < count($arrayToSort); $i++) {
            if($arrayToSort[$i] < $arrayToSort[$key] && $order === 'DESC') {
                $temp = $arrayToSort[$i];
                $arrayToSort[$i] = $arrayToSort[$key];
                $arrayToSort[$key] = $temp;
            }elseif($arrayToSort[$i] > $arrayToSort[$key] && $order === 'ASC') {
                $temp = $arrayToSort[$i];
                $arrayToSort[$i] = $arrayToSort[$key];
                $arrayToSort[$key] = $temp;
            }
        }
    }

    return $arrayToSort;
}

var_dump(my_array_sort([1, 7, 8, 10, 2, 3, 9], 'DESC'));