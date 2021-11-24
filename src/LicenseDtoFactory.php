<?php

namespace Lh\RoszdravLicensePhp;

class LicenseDtoFactory
{
    public static function getDto(): string
    {
        return LicenseDto::class;
    }
}
