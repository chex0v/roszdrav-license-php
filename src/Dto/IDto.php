<?php

namespace Lh\RoszdravLicensePhp\Dto;

interface IDto
{
    public static function from(IDtoData $data);

    public function to();
}
