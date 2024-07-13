<?php

namespace App\Enums;

enum ChoirCategoryEnum: string
{
    case ESCOLAR = 'Escolar';
    case CATOLICO = 'Católico';
    case EVANGELICO = 'Evangélico';
    case CULTURAL = 'Cultural';
    case INDEPENDENTE = 'Independente';
    case GOVERNAMENTAL = 'Governamental';
    case EMPRESARIAL = 'Empresarial';
}
