<?php


class SentryHelperTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     */
    public function twentySixShouldReturnStringBuy() {
        $string = \DPRMC\FIMS\Helpers\SentryHelper::transactionTypeText(26);
        $this->assertEquals('Buy', $string);
    }


    /**
     * @test
     */
    public function invalidTransactionCodeShouldThrowException() {
        $this->expectException(Exception::class);
        $string = \DPRMC\FIMS\Helpers\SentryHelper::transactionTypeText(99999999);
    }

    /**
     * @test
     */
    public function boolStringShouldReturnBoolValue(){
        $bool = \DPRMC\FIMS\Helpers\SentryHelper::translateFieldSentryToFimsBoolean('true');
        $this->assertTrue($bool);
    }

    /**
     * @test
     */
    public function falseStringShouldReturnFalseBoolValue(){
        $bool = \DPRMC\FIMS\Helpers\SentryHelper::translateFieldSentryToFimsBoolean('false');
        $this->assertFalse($bool);
    }


    /**
     * @test
     */
    public function slugifyNameShouldReturnSluggedName(){
        $name = "some name";
        $slugged = \DPRMC\FIMS\Helpers\SentryHelper::slugifyName($name);
        $this->assertEquals('some@name', $slugged);
    }


    /**
     * @test
     */
    public function unslugifyNameShouldReturnUnsluggedName(){
        $name = "some@name";
        $unslugged = \DPRMC\FIMS\Helpers\SentryHelper::unslugifyName($name);
        $this->assertEquals('some name', $unslugged);
    }


    /**
     * @test
     */
    public function prettifyCDSNameShouldReturnPrettierName(){
        $name = "CMBX_A_CDSI_S1 1/1_CDS1";
        $unslugged = \DPRMC\FIMS\Helpers\SentryHelper::prettifyCDSName($name);
        $this->assertEquals('CMBX A CDSI S1 1/1 CDS1', $unslugged);
    }



}