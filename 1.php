<?php

declare(strict_types=1);

function main(): void {
    $name = getInput("Введите имя: ");
    $surname = getInput("Введите фамилию: ");
    $patronymic = getInput("Введите отчество: ");

    // Формирование полного ФИО с использованием mb_convert_case
    $fullname = mb_convert_case("$surname $name $patronymic", MB_CASE_TITLE, "UTF-8");

    // Формирование фамилии с инициалами
    $initials = mb_strtoupper(mb_substr($name, 0, 1, "UTF-8")) . ". " . mb_strtoupper(mb_substr($patronymic, 0, 1, "UTF-8")) . ".";
    $surnameAndInitials = mb_convert_case($surname, MB_CASE_TITLE, "UTF-8") . " " . $initials;

    // Формирование сокращенного ФИО
    $fio = mb_strtoupper(mb_substr($surname, 0, 1, "UTF-8")) . mb_strtoupper(mb_substr($name, 0, 1, "UTF-8")) . mb_strtoupper(mb_substr($patronymic, 0, 1, "UTF-8"));

    // Вывод результатов
    echo "Полное ФИО: $fullname\n";
    echo "Фамилия и инициалы: $surnameAndInitials\n";
    echo "Сокращенное ФИО: $fio\n";
}

function getInput(string $prompt): string {
    echo $prompt;
    $input = trim(fgets(STDIN));

    // Проверка на пустой ввод и корректность ввода с учетом кириллицы
    while (empty($input) || !preg_match('/^[\p{Cyrillic} ]+$/u', $input)) {
        echo "Некорректный ввод. Пожалуйста, введите только буквы кириллицы: ";
        $input = trim(fgets(STDIN));
    }

    return $input;
}

main();