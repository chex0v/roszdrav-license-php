<?php

namespace Lh\RoszdravLicensePhp\Tests\Unit;

use Lh\RoszdravLicensePhp\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testReturnStandardLicence()
    {
        $result = Parser::find('ЛО-67-01-001066');
        $this->assertNotEmpty($result);
        $this->assertEquals($result, [
            [
                'license' => 'ЛО-67-01-001066',
                'date' => '29.02.2016',
                'address' => "216410, Россия, Смоленская область, Шумячский район, пос. Шумячи, ул. Санаторная школа, д. 1",
                'ogrn' => '1026700839175',
                'inn' => '6720002806',
                'grant_license' => '31.05.2012. Приказ: П67-118/12',
                'date_start' => '29.02.2016',
                'date_end' => 'Бессрочно',
                'name' => 'смоленское областное государственное бюджетное образовательное учреждение для детей, нуждающихся в длительном лечении, "Шумячская санаторная школа-интернат"'
            ]
        ],                  'Стандартный ответ не совпадает с ответом сервиса');
    }

    public function testNoResult()
    {
        $this->expectException(\Exception::class);
        Parser::find('null');
    }

    public function testMoreResult()
    {
        $result = Parser::find('11111');
        $this->assertGreaterThan(1, count($result), "Должно быть несколько вариантов для поиска номера лицензии");
    }

    protected function setUp(): void
    {
        parent::setUp();
    }
}
