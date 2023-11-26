<?php

namespace App\Enums;

use ReflectionClass;

class PermissionEnum
{

    const adminDashboard = 'admin-dashboard';


    public static function getAllPermissions()
    {
        $oClass = new ReflectionClass(__CLASS__);

        return array_values($oClass->getConstants());
    }
}
