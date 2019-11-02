<?php

/**
 * Вариант сложения двух положительных целых чисел представленных в виде строк
 * без использования внутренних php функций
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
    $cur = 0;
    $notJustZeros = false;
    while (@$number[$cur] != '') {
        if ($number[$cur] >= 0 && $number[$cur] <= 9) {
            if ($number[$cur] > 0) {
                $notJustZeros = true;
            }
            $cur++;
        } else {
            throw new Exception('An invalid character was found');
        }
    }

    if ($notJustZeros === false) {
        throw new Exception('The number must be positive');
    }

    return $cur;
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

    if ($numFirstLength > $numSecondLength) {
        $maxLength = $numFirstLength;
    } else {
        $maxLength = $numSecondLength;
    }

    $result = '';
    $transfer = 0;
    for ($i = 1; $i <= $maxLength; $i++) {
        $sum = $transfer;
        if ($i <= $numFirstLength) {
            $sum += $numFirst[$numFirstLength - $i];
        }

        if ($i <= $numSecondLength) {
            $sum += $numSecond[$numSecondLength - $i];
        }

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
