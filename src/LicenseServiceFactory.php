<?php

namespace Lh\RoszdravLicensePhp;


class LicenseServiceFactory
{
    public static function getService(): IClientLicenseService
    {
        return LicenseClientService::getInstance();
    }
}
