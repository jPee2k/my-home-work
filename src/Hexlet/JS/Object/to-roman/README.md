Для записи цифр римляне использовали буквы латинского алфафита: I, V, X, L, C, D, M. Например:

1 обозначалась с помощью буквы I
10 с помощью Х
7 с помощью VII
Число 2020 в римской записи — это MMXX (2000 = MM, 20 = XX).

solution.js
Реализуйте и экспортируйте функцию toRoman(), которая переводит арабские числа в римские. Функция принимает на вход целое число в диапазоне от 1 до 3000, а возвращает строку с римским представлением этого числа.

Реализуйте и экспортируйте функцию toArabic(), которая переводит число в римской записи в число, записанное арабскими цифрами. Если переданное римское число не корректно, то функция должна вернуть значение false.

Примеры
toRoman(1);
// 'I'
toRoman(59);
// 'LIX'
toRoman(3000);
// 'MMM'

toArabic('I');
// 1
toArabic('LIX');
// 59
toArabic('MMM');
// 3000

toArabic('IIII');
// false
toArabic('VX');
// false
Подсказки
Подробнее о римской записи — https://ru.wikipedia.org/wiki/Римские_цифры
