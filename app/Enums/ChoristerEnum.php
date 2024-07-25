<?php

namespace App\Enums;

enum ChoristerEnum: string
{
    case ATIVO = 'Ativo(a)';
    case INATIVO = 'Inativo(a)';
    case AFASTADO = 'Afastado(a)';
    case DESISTENTE = 'Desistente';
}
