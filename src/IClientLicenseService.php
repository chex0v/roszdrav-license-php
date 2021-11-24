<?php

namespace Lh\RoszdravLicensePhp;

interface IClientLicenseService
{
    public function getUrl();
    public function sendRequest(string $licenseNumber);
}
