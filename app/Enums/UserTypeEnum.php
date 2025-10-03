<?php

namespace App\Enums;

enum UserTypeEnum: string
{
    case ADMIN = 'Admin';
    case USER = 'User';
    case FARMER = 'Farmer';
    case EXTENSIONOFFICER = 'ExtensionOfficer';
    case SYSTEMUSER = 'SystemUser';
}
