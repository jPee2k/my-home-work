<?php

namespace Home\Work\Hexlet\Challenges\Functions\Barchart;

/*
 * https://ru.hexlet.io/challenges/php_functions_barchart
 * Столбчатая диаграмма
 
 * BarChart.php
 * Реализуйте функцию barChart(), которая выводит на экран столбчатую 
 * диаграмму. Функция принимает в качестве параметра последовательность 
 * чисел, длина которой равна количеству столбцов диаграммы. Размер 
 * диаграммы по вертикали должен определяться входными данными.

 * Примеры
 * <?php

 * use function App\Solution\barChart;

// barChart([5, 10, -5, -3, 7]);
// =>  *   
//     *   
//     *   
//     *  *
//     *  *
//    **  *
//    **  *
//    **  *
//    **  *
//    **  *
//      ## 
//      ## 
//      ## 
//      #  
//      #  

// barChart([5, -2, 10, 6, 1, 2, 6, 4, 8, 1, -1, 7, 3, -5, 5]);
// =>   *            
//      *            
//      *     *      
//      *     *  *   
//      **  * *  *   
//    * **  * *  *  *
//    * **  ***  *  *
//    * **  ***  ** *
//    * ** ****  ** *
//    * ******** ** *
//     #        #  # 
//     #           # 
//                 # 
//                 # 
//                 # 

*/

function barChart($values)
{
    $result = [];
    $data = arrayFilling($values);
    $max = max($values);
    $min = min($values);

    while ($max > $min) {
        $result[] = implode('', array_map(function ($val) use (&$max) {
            return isset($val[$max]) ? $val[$max] : ' ';
        }, $data));
        $max--;
    }

    printResult($result);
    return true;
}

function arrayFilling($values)
{
    return array_reduce($values, function ($acc, $val) {
        if ($val < 0) {
            $acc[] = array_fill_keys(range(0, $val + 1), '#');
        } else {
            $acc[] = array_fill_keys(range($val, 1), '*');
        }
        return $acc;
    }, []);
}

function printResult($result)
{
    foreach ($result as $key => $str) {
        if ($key === 0) {
            print_r(' => ' . $str . PHP_EOL);
        }
        print_r('    ' . $str . PHP_EOL);
    }
}

// $values = [5, -2, 10, 6, 1, 2, 6, 4, 8, 1, -1, 7, 3, -5, 5];

// barChart($values);