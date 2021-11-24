<?php

namespace Lh\RoszdravLicensePhp\Service;

use Lh\RoszdravLicensePhp\Dto\AbstractArrayDto;
use Lh\RoszdravLicensePhp\Dto\IDtoData;

class LicenseDataFromService extends AbstractArrayDto implements IDtoData
{
    public function getData(): array
    {
        return $this->data;
    }
}
