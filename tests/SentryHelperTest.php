<?php

use DPRMC\FIMS\Helpers\SentryHelper;
use PHPUnit\Framework\TestCase;

class SentryHelperTest extends TestCase {

    public function testTransactionTypeTextReturnsDescriptionForKnownTransactionCode() {
        $this->assertEquals( 'Buy', SentryHelper::transactionTypeText( SentryHelper::BUY ) );
    }


    public function testTransactionTypeTextThrowsExceptionForUnknownTransactionCode() {
        $this->expectException( Exception::class );

        SentryHelper::transactionTypeText( 99999999 );
    }


    public function testCurrencyCodeDescriptionsMapsCurrencyIdsToAbbreviations() {
        $this->assertEquals( 'USD', SentryHelper::$currencyCodeDescriptions[ SentryHelper::USD ] );
        $this->assertEquals( 'EUR', SentryHelper::$currencyCodeDescriptions[ SentryHelper::EUR ] );
        $this->assertEquals( 'GBP', SentryHelper::$currencyCodeDescriptions[ SentryHelper::GBP ] );
    }


    public function testTransactionCodeDescriptionsMapsTransactionIdsToDescriptions() {
        $this->assertEquals( 'Buy', SentryHelper::$transactionCodeDescriptions[ SentryHelper::BUY ] );
        $this->assertEquals( 'Sell', SentryHelper::$transactionCodeDescriptions[ SentryHelper::SELL ] );
        $this->assertEquals( 'Dividend Withholding', SentryHelper::$transactionCodeDescriptions[ SentryHelper::DW ] );
    }


    public function testTransactionCodeTradeActionsMapsTradeTransactionsToActions() {
        $this->assertEquals( 'buy', SentryHelper::$transactionCodeTradeActions[ SentryHelper::BUY ] );
        $this->assertEquals( 'sell', SentryHelper::$transactionCodeTradeActions[ SentryHelper::SELL ] );
        $this->assertEquals( 'misc', SentryHelper::$transactionCodeTradeActions[ SentryHelper::RECEIVE_SHARES ] );
    }


    public function testTranslateFieldSentryToFimsBooleanReturnsTrueForTrueString() {
        $this->assertTrue( SentryHelper::translateFieldSentryToFimsBoolean( 'true' ) );
        $this->assertTrue( SentryHelper::translateFieldSentryToFimsBoolean( 'True' ) );
    }


    public function testTranslateFieldSentryToFimsBooleanReturnsFalseForFalseString() {
        $this->assertFalse( SentryHelper::translateFieldSentryToFimsBoolean( 'false' ) );
        $this->assertFalse( SentryHelper::translateFieldSentryToFimsBoolean( 'False' ) );
    }


    public function testTranslateFieldSentryToFimsBooleanReturnsNullForNullInput() {
        $this->assertNull( SentryHelper::translateFieldSentryToFimsBoolean( NULL ) );
    }


    public function testTranslateFieldSentryToFimsBooleanReturnsFalseForUnknownNonNullString() {
        $this->assertFalse( SentryHelper::translateFieldSentryToFimsBoolean( 'yes' ) );
    }


    public function testSlugifyNameReplacesSpacesAndSlashes() {
        $this->assertEquals( 'ABC@Loan~Series@1', SentryHelper::slugifyName( 'ABC Loan/Series 1' ) );
    }


    public function testUnslugifyNameRestoresSpacesAndSlashes() {
        $this->assertEquals( 'ABC Loan/Series 1', SentryHelper::unslugifyName( 'ABC@Loan~Series@1' ) );
    }


    public function testPrettifyCDSNameReplacesUnderscoresWithSpaces() {
        $name = 'CMBX_A_CDSI_S1 1/1_CDS1';

        $this->assertEquals( 'CMBX A CDSI S1 1/1 CDS1', SentryHelper::prettifyCDSName( $name ) );
    }


    public function testSplitCDSNameReturnsDisplayNameAndLotNumber() {
        $this->assertEquals(
            [
                'name' => 'CDX NA IG',
                'lot'  => '12',
            ],
            SentryHelper::splitCDSName( 'CDX_NA_IG_CDS12' )
        );
    }


    public function testWappReturnsWeightedAveragePurchasePrice() {
        $rows = [
            [ 'quantity' => 10, 'price' => 99 ],
            [ 'quantity' => 20, 'price' => 102 ],
        ];

        $this->assertEquals( 101, SentryHelper::wapp( $rows, 'quantity', 'price' ) );
    }


    public function testWappReturnsNullWhenTotalQuantityIsZero() {
        $rows = [
            [ 'quantity' => 0, 'price' => 99 ],
            [ 'quantity' => 0, 'price' => 102 ],
        ];

        $this->assertNull( SentryHelper::wapp( $rows, 'quantity', 'price' ) );
    }

}
