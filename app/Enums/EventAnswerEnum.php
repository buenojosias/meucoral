<?php

namespace App\Enums;

enum EventAnswerEnum: string
{
    case SIM = 'Sim';
    case NAO = 'Não';
    case TALVEZ = 'Talvez';

    public function getColor()
    {
        return match($this) {
            self::SIM => 'green',
            self::NAO => 'red',
            self::TALVEZ => 'yellow',
        };
    }
}
