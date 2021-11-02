<?php

namespace Lh\RoszdravLicensePhp;

class LicenseDto
{
    public $license;
    public $name;
    public $date; //  Дата регистрации
    public $address;
    public $ogrn;
    public $inn;
    public $grantLicense; // Дата принятия решения о предоставлении лицензии
    public $dateStart;
    public $dateEnd;

    /**
     * @param array $data
     * @return array
     */
    public static function fromServiceArray(array $data)
    {
        $collections = [];
        $data = $data['data'];

        foreach ($data as $_data) {
            $value = static::fromService($_data);
            if ($value) {
                $collections[] = $value->toArray();
            }
        }
        return $collections;
    }

    /**
     * Преобразования данных из массива от сервиса в объектный вид
     *
     * @param array $data
     * @return LicenseDto
     */
    public static function fromService(array $data): LicenseDto
    {
        $dto = new self();
        $dto->license = $data['col1']['label'];
        $dto->date = $data['col2']['label'];
        $dto->address = $data['col5']['label'];
        $dto->ogrn = $data['col6']['label'];
        $dto->inn = $data['col7']['label'];
        $dto->grantLicense = $data['col10']['label'];
        $dto->dateStart = $data['col11']['label'];
        $dto->dateEnd = $data['col12']['label'];
        $dto->name = $data['col4']['label'];
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'license' => $this->license,
            'date' => $this->date,
            'address' => $this->address,
            'ogrn' => $this->ogrn,
            'inn' => $this->inn,
            'grant_license' => $this->grantLicense,
            'date_start' => $this->dateStart,
            'date_end' => $this->dateEnd,
            'name' => $this->name
        ];
    }
}
