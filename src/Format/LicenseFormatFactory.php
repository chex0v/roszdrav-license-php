<?php

namespace Lh\RoszdravLicensePhp\Format;

class LicenseFormatFactory
{
    public static function getFormat(): IFormatData
    {
        return new LicenseFormatData();
    }
}
