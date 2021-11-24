<?php

namespace Lh\RoszdravLicensePhp;

class LicenseDataFromService extends AbstractArrayDto implements IDtoData
{
    public function getData(): array
    {
        return $this->data;
    }
}
