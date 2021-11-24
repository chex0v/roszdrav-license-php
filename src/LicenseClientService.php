<?php

namespace Lh\RoszdravLicensePhp;

use GuzzleHttp\Client;

class LicenseClientService implements IClientLicenseService
{
    private static $instances = [];

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): LicenseClientService
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    protected function __construct()
    {
        $this->client = new Client(
            [
                'base_uri' => $this->getUrl(),
                'timeout' => 60,
            ]
        );
    }

    public function getUrl(): string
    {
       return 'https://roszdravnadzor.gov.ru/';
    }

    public function sendRequest(string $licenseNumber)
    {
        $params = $this->getBodyRequest();
        $params['q_no'] = $licenseNumber;
        $response = $this->client->post('ajax/services/licenses', [
            'form_params' => $params,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Accept' => 'application/json, text/javascript, */*; q=0.01',
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Нет ответа от сервиса');
        }

        $string = $response->getBody()->getContents();

        return json_decode($string, true);
    }

    protected function getBodyRequest(): array
    {
        $columns = [];
        foreach (range(1, 19) as $number) {
            $columns[] = [
                'data' => "col{$number}.label",
                'name' => '',
                'searchable' => true,
                'search' => [
                    'value' => '',
                    'regex' => false
                ]
            ];
        }
        return [
            "draw" => 3,
            'columns' => $columns,
            'start' => 0,
            'length' => 100,
            'search' => [
                'value' => '',
                'regex' => false
            ],
            'prev_total' => 1,
            'q_activity' => '',
            'q_org_inn' => '',
            'q_active' => 0,
            'q_region' => '',
            'q_type' => 1,
            'q_org_ogrn' => '',
            'dt_from' => '',
            'dt_to' => '',
            'q_org_label' => ''
        ];
    }
}
