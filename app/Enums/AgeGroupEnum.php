<?php

namespace App\Enums;

enum AgeGroupEnum: string
{
    case INFANTIL = 'Infantil';
    case INFANTOJUVENIL = 'Infanto-juvenil';
    case ADOLESCENTE = 'Adolescente';
    case JOVEM = 'Jovem';
    case ADULTO = 'Adulto';
    case TECEIRAIDADE = 'Terceira idade';
    case MISTO = 'Misto';
}
