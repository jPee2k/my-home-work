<?php

namespace Home\Work\Hexlet\Challenges\Functions\FilterAnagrams;

// https://ru.hexlet.io/challenges/php_functions_filter_anagrams

/*
 * Анаграммы — это слова, которые образуются путём перестановки 
 * букв. Слова-анаграммы состоят из одного и того же набора букв 
 * и имеют одинаковую длину. Например:

 * спаниель — апельсин
 * карат — карта — катар
 * топор — ропот — отпор
 
 * src/Solution.php
 * Реализуйте функцию filterAnagrams, которая находит все анаграммы 
 * слова. Функция принимает исходное слово и список для проверки (массив), 
 * а возвращает массив всех анаграмм. Если в списке слов отсутствуют 
 * анаграммы, то возвращается пустой массив.

 * Примеры
 * <?php

 * use function App\Solution\filterAnagrams;

 * filterAnagrams('abba', ['aabb', 'abcd', 'bbaa', 'dada']);
 * // ['aabb', 'bbaa']

 * filterAnagrams('racer', ['crazer', 'carer', 'racar', 'caers', 'racer']);
 * // ['carer', 'racer']

 * filterAnagrams('laser', ['lazing', 'lazy',  'lacer']);
 * // []
 * 
 */

function filterAnagrams($word, $checkWords)
{
    return array_filter($checkWords, function ($anagram) use ($word) {
        $symbols = str_split($anagram);
        $count = 0;
        for ($i = 0, $length = strlen($word); $i < $length; $i++) {
            if (in_array($word[$i], $symbols)) {
                $key = array_search($word[$i], $symbols);
                unset($symbols[$key]);
                $count++;
            }
        }
        return $count === $length && empty($symbols) ? true : false;
    });
}

// $word = 'abba';
// $col = ['aabb', 'abcd', 'bbaa', 'dada'];

// $word1 = 'racer';
// $col1 = ['crazer', 'carer', 'racar', 'caers', 'racer'];

// $word2 = 'laser';
// $col2 = ['lazing', 'lazy',  'lacer'];

//print_r(filterAnagrams($word, $col));