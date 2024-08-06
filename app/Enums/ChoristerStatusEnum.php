<?php

namespace App\Enums;

enum ChoristerStatusEnum: string
{
    case ATIVO = 'Ativo(a)';
    case INATIVO = 'Inativo(a)';
    case AFASTADO = 'Afastado(a)';
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
