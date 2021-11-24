<?php

namespace Lh\RoszdravLicensePhp\Service;

interface IClientLicenseService
{
    public function getUrl();

    public function sendRequest(string $licenseNumber);
}
