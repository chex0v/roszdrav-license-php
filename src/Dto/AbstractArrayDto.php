<?php

namespace Lh\RoszdravLicensePhp\Dto;


abstract class AbstractArrayDto
{
    /**
     * Array of data
     *
     * @var array
     */
    public $data = [];

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
}
