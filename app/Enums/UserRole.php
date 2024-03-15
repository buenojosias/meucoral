<?php

namespace App\Enums;

enum UserRole: string
{
    case Superadmin = "superadmin";
    case Gestor = 'manager';
    case Coralista = 'chorister';
}
