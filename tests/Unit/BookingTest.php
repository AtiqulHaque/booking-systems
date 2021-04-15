<?php
use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{
    protected $unitPrice;

    protected $fareManagerMock;

    public  function setUp(): void
    {
        parent::setUp();

        $this->setFareManagerMock();
    }

    public function setFareManagerMock()
    {
        $this->fareManagerMock = $this->getMockBuilder(FareManager::class)->setMethods([
            'getPrimaryDiscountConfig',
            'getSurgeBoostConfig',
            'getUnitPriceConfig',
            'getCouponConfig',
            'getDynamicDiscountConfig'
        ])->getMock();

        $this->fareManagerMock->expects($this->any())->method('getUnitPriceConfig')->willReturn($this->getDummyUnitPriceConfig());
    }

    public function getDummyRequestConfig()
    {
        return [

        ];
    }



    public function testBookingFare()
    {
        $mock = $this->fareManagerMock;
        $this->fareManagerMock->expects($this->any())->method('getSurgeBoostConfig')->willReturn([null, null]);


        $mock->setConfigs($this->getDummyRequestConfig());
        $fare = $mock->getFare();

        $this->assertInstanceOf(ShohozFare::class, $fare);
        $this->assertEquals(66, $fare->getTripFare());
    }
}
