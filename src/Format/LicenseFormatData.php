<?php

namespace Lh\RoszdravLicensePhp\Format;

use Lh\RoszdravLicensePhp\Dto\IDto;
use Lh\RoszdravLicensePhp\Dto\LicenseDtoFactory;
use Lh\RoszdravLicensePhp\Service\LicenseDataFromService;

class LicenseFormatData implements IFormatData
{
    public function format($data)
    {
        if (!isset($data['data'])) {
            $message = $arrData['message'] ?? 'Документов не найдено.';
            throw new \Exception($message);
        }
        /** @var IDto $class */
        $class = LicenseDtoFactory::getDto();
        return $class::from(new LicenseDataFromService($data));
    }
}
