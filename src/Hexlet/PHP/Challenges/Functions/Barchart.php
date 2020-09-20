<?php

namespace Home\Work\Hexlet\PHP\Challenges\Functions\Barchart;

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

function barChart(array $numbers)
{
    $top = abs(max($numbers));
    $bottom = abs((min($numbers)));
    $height = $top + $bottom;

    $lines = [];

    for ($i = $height; $i > 0; $i -= 1) {
        $row = array_map(function ($number) use ($bottom, $i) {
            if ($i > $bottom) {
                return $number >= $i - $bottom ? '*' : ' ';
            }
            return $number < $i - $bottom ? '#' : ' ';
        }, $numbers);

        $lines[] = implode('', $row);
    }

    print_r(implode("\n", $lines));
}

// $values = [1, 5, -3, 0, 4];
// barChart($values);
