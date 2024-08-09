<?php

namespace App\Enums;

enum ContactTypeEnum: string
{
    case WHATSAPP = 'WhatsApp';
    case FONE = 'Telefone fixo';
    case EMAIL = 'E-mail';
}
