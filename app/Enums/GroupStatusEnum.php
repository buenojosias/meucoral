<?php

namespace App\Enums;

enum GroupStatusEnum: string
{
    case ATIVO = 'Ativo';
    case FINALIZADO = 'Finalizado';
    case ARQUIVADO = 'Arquivado';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
