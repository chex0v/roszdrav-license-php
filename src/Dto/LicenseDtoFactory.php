<?php

namespace Lh\RoszdravLicensePhp\Dto;

class LicenseDtoFactory
{
    public static function getDto(): string
    {
        return LicenseDto::class;
    }
}
