<?php

namespace Lh\RoszdravLicensePhp;

use GuzzleHttp\Exception\GuzzleException;
use Lh\RoszdravLicensePhp\Format\LicenseFormatFactory;
use Lh\RoszdravLicensePhp\Service\LicenseServiceFactory;

/**
 * Facade for parsing license RF from https://roszdravnadzor.gov.ru
 */
class Parser
{

    /**
     * Parser information from https://roszdravnadzor.gov.ru/services/licenses
     *
     * @param string $license Номер лицензии
     *
     * @return array
     * @throws GuzzleException
     */
    public static function find(string $license): array
    {
        return LicenseFormatFactory::getFormat()
            ->format(LicenseServiceFactory::getService()->sendRequest($license));
    }
}
