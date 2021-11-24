<?php

namespace Lh\RoszdravLicensePhp;

class LicenseFormatFactory
{
    public static function getFormat(): IFormatData
    {
        return new LicenseFormatData();
    }
}
