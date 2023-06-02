<?php
namespace App\Enums;

enum RequestStatusEnum:string {

    case Rejected = '-1';
    case Pending  = '0';
    case Accepted = '1';

    public static function getAllValues()
    {
      return [
        self::Rejected->value,
        self::Pending->value,
        self::Accepted->value,
      ];
    }
}

