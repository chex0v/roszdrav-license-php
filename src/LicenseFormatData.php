<?php

namespace Lh\RoszdravLicensePhp;

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
