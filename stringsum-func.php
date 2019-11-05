<?php

/**
 * Вариант сложения двух положительных целых чисел представленных в виде строк
 * с использованием внутренних php функций
 */

/**
 * Функция посимвольной проверки на положительное целое число
 * Возвращает количество символов в строке
 *
 * @param string $number Входящая строка состоящая из чисел от 0 до 9
 * @return int Количество символов в строке
 * @throws Exception Ошибка при не соблюдении условий входных данных
 */
function strLengthNumber(string $number): int
{
    if (preg_match('/^[1-9]+\d*$/', $number) !== 1) {
        throw new Exception('The number must be positive');
    }

    return strlen($number);
}

/**
 * Вычисление суммы двух чисел представленных в виде двух строк
 * Каждая строка должна представлять из себя положительное число
 * из символов от 0 до 9
 *
 * @param string $numFirst Первое строковое представление числа
 * @param string $numSecond Второе строковое представление числа
 * @return string Сумма двух чисел в виде строки
 * @throws Exception Ошибка при не соблюдении условий входных данных
 */
function stringSum(string $numFirst, string $numSecond): string
{
    $numFirstLength = strLengthNumber($numFirst);
    $numSecondLength = strLengthNumber($numSecond);
    $maxLength = max($numFirstLength, $numSecondLength);

    $result = '';
    $transfer = 0;
    for ($i = 1; $i <= $maxLength; $i++) {
        $sum = $transfer
            + ($i <= $numFirstLength ? $numFirst[$numFirstLength - $i] : 0)
            + ($i <= $numSecondLength ? $numSecond[$numSecondLength - $i] : 0);
        if ($sum > 9) {
            $transfer = 1;
            $sum -= 10;
        } else {
            $transfer = 0;
        }
        $result = $sum . $result;
    }

    if ($transfer > 0) {
        $result = $transfer . $result;
    }

    return $result;
}
