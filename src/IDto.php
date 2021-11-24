<?php

namespace Lh\RoszdravLicensePhp;

interface IDto
{
    public static function from(IDtoData $data);

    public function to();
}
