Игра в 15 или пятнашки — популярная головоломка, придуманная в 1878 году Ноем Чепмэном. Представляет собой набор одинаковых квадратных костяшек с нанесёнными числами, заключённых в квадратную коробку. Длина стороны коробки в четыре раза больше длины стороны костяшек для набора из 15 элементов, соответственно в коробке остаётся незаполненным одно квадратное поле. Цель игры — перемещая костяшки по коробке, добиться упорядочивания их по номерам, желательно сделав как можно меньше перемещений.

application.js
Реализуйте игру в соответствии со следующими требованиями:

Размер поля должен быть 4x4

В начальной позиции пустым всегда является правый нижний квадрат

Элементы формируются случайным образом по следующему алгоритму: сначала они перемешиваются используя randomize(values), а затем они наполняют таблицу.

Таблица должна заполняться значениями сверху вниз, то есть таким образом:

1	5	9	13
2	6	10	14
3	7	11	15
4	8	12
Перемещение костяшек происходит с помощью стрелок: при нажатии →, левая костяшка, сдвинется вправо, в пустую область.

Так как тесты завязаны на верстку (Bootstrap), то к ней предъявляются особые требования. Вот как выглядит начальная позиция:

<div class="gem-puzzle">
    <table class="table-bordered">
        <tbody>
            <tr>
                <td class="p-3">10</td>
                <td class="p-3">11</td>
                <td class="p-3">6</td>
                <td class="p-3">4</td>
            </tr>
            <tr>
                <td class="p-3">14</td>
                <td class="p-3">2</td>
                <td class="p-3">12</td>
                <td class="p-3">1</td>
            </tr>
            <tr>
                <td class="p-3">3</td>
                <td class="p-3">13</td>
                <td class="p-3">9</td>
                <td class="p-3">8</td>
            </tr>
            <tr>
                <td class="p-3">5</td>
                <td class="p-3">7</td>
                <td class="p-3">15</td>
                <td class="p-3 table-active"></td>
            </tr>
        </tbody>
    </table>
</div>

- Класс таблицы постоянен
- У каждой ячейки проставлен класс p-3
- Пустая ячейка не содержит текста.
- У пустой ячейки добавляется класс table-active

Подсказки
- Нажатие на клавиши генерирует код, по которому можно понять что за клавиша была нажата
- Коды для стрелок можно подсмотреть в тестах
- Для получения нажатой клавиши из события используйте свойство key из объекта события
- Используйте событие keyup
