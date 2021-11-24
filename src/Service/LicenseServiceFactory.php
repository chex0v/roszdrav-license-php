<?php

namespace Lh\RoszdravLicensePhp\Service;

class LicenseServiceFactory
{
    public static function getService(): IClientLicenseService
    {
        return LicenseClientService::getInstance();
    }
}
