<?php

declare(strict_types=1);

function main(): void {
    $name = getInput("Введите имя: ");
    $surname = getInput("Введите фамилию: ");
    $patronymic = getInput("Введите отчество: ");

    // Формирование полного ФИО
    $fullname = ucwords("$surname $name $patronymic");

    // Формирование фамилии с инициалами
    $initials = strtoupper(mb_substr($name, 0, 1)) . ". " . strtoupper(mb_substr($patronymic, 0, 1)) . ".";
    $surnameAndInitials = "$surname $initials";

    // Формирование сокращенного ФИО
    $fio = strtoupper(mb_substr($surname, 0, 1)) . strtoupper(mb_substr($name, 0, 1)) . strtoupper(mb_substr($patronymic, 0, 1));

    // Вывод результатов
    echo "Полное ФИО: $fullname\n";
    echo "Фамилия и инициалы: $surnameAndInitials\n";
    echo "Сокращенное ФИО: $fio\n";
}

function getInput(string $prompt): string {
    echo $prompt;
    $input = trim(fgets(STDIN));

    while (empty($input) || !preg_match('/^[\p{Cyrillic}]+$/u', $input)) {
        echo "Некорректный ввод. Пожалуйста, введите только буквы кириллицы: ";
        $input = trim(fgets(STDIN));
    }

    return $input;
}

main();# hmfx
