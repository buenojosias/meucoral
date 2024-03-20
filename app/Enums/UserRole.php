<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = "admin";
    case Gestor = 'manager';
    case Coralista = 'chorister';
}
