<?php

namespace App\Enums;

enum KinshipEnum: string
{
    case PAI = 'Pai';
    case MÃE = 'Mãe';
    case TIO = 'Tio';
    case TIA = 'Tia';
    case AVÔ = 'Avô';
    case AVÓ = 'Avó';
    case PRIMO = 'Primo';
    case PRIMA = 'Prima';
    case PADRINHO = 'Padrinho';
    case MADRINHA = 'Matrinha';
    case OUTRO = 'Outro';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
