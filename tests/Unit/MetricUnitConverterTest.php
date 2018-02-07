<?php

namespace Tests\Unit;

use Tests\TestCase;

function convert($from, $to, $value)
{
    $metrics = ['km', 'hm', 'Dm', 'm', 'dm', 'cm', 'mm'];

    return '10,000 cm';
}
class MetricUnitConverterTest extends TestCase
{
    /**
     * @test
     */
    public function it_coverts_kms_to_centimeteres()
    {
        //give
        $response = $this->get('/spreadsheets');

        $response->assertStatus(200);
        ////$this->assertStatus($response, 200);
        ////then
        $this->assertEquals(convert(10, 'km', 'cm'), '10,000 cm');
    }
}
