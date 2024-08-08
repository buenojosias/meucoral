<?php

namespace App\Enums;

enum ChoristerStatusEnum: string
{
    case ATIVO = 'Ativo';
    case INATIVO = 'Inativo';
    case AFASTADO = 'Afastado';
    case DESISTENTE = 'Desistente';

    public function color(): string
    {
        return match($this) {
            self::ATIVO => 'green',
            self::INATIVO => 'orange',
            self::AFASTADO => 'orange',
            self::DESISTENTE => 'red',
        };
    }
}
