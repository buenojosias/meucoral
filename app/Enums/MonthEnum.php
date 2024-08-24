<?php

namespace App\Enums;

enum MonthEnum: int
{
    case JAN = 1;
    case FEV = 2;
    case MAR = 3;
    case ABR = 4;
    case MAI = 5;
    case JUN = 6;
    case JUL = 7;
    case AGO = 8;
    case SET = 9;
    case OUT = 10;
    case NOV = 11;
    case DEZ = 12;

    public static function values(): array
    {
        $months = array_column(self::cases(), 'value');
        return array_combine(range(1, count($months)), $months);
    }

    public function label()
    {
        return match($this) {
            self::JAN => 'Janeiro',
            self::FEV => 'Fevereiro',
            self::MAR => 'Março',
            self::ABR => 'Abril',
            self::MAI => 'Maio',
            self::JUN => 'Junho',
            self::JUL => 'Julho',
            self::AGO => 'Agosto',
            self::SET => 'Setembro',
            self::OUT => 'Outubro',
            self::NOV => 'Novembro',
            self::DEZ => 'Dezembro',
        };
    }

    public function abbr()
    {
        return match($this) {
            self::JAN => 'Jan',
            self::FEV => 'Fev',
            self::MAR => 'Mar',
            self::ABR => 'Abr',
            self::MAI => 'Mai',
            self::JUN => 'Jun',
            self::JUL => 'Jul',
            self::AGO => 'Ago',
            self::SET => 'Set',
            self::OUT => 'Out',
            self::NOV => 'Nov',
            self::DEZ => 'Dez',
        };
    }
}
