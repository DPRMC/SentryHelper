<?php

namespace DPRMC\FIMS\Helpers;

use Exception;

/**
 * Class SentryHelper
 * @package DPRMC\FIMS\Helpers
 */
class SentryHelper {

    const USD = 146;
    const EUR = 49;
    const GBP = 21;
    const JPY = 74;
    const AUD = 8;
    const AZN = 159;
    const CAD = 26;
    const GEL = 157;
    const HKD = 64;
    const KZT = 158;
    const NZD = 100;
    const NOK = 104;
    const RUB = 156;
    const SEK = 133;
    const CHF = 134;
    const CNY = 152;
    const AFA = 1;
    const ALL = 2;
    const DZD = 3;
    const ADP = 4;
    const AOK = 5;
    const ARS = 6;
    const AWG = 7;
    const ATS = 9;
    const BSD = 10;
    const BHD = 11;
    const BDT = 12;
    const BBD = 13;
    const BEF = 14;
    const BZD = 15;
    const BMD = 16;
    const BTN = 17;
    const BOB = 18;
    const BWP = 19;
    const BRL = 20;
    const BND = 22;
    const BGL = 23;
    const BUK = 24;
    const BIF = 25;
    const CVE = 27;
    const KYD = 28;
    const CLP = 29;
    const CLF = 30;
    const COP = 31;
    const KMF = 32;
    const CRC = 33;
    const CUP = 34;
    const CYP = 35;
    const CSK = 36;
    const DKK = 37;
    const YDD = 38;
    const DEM = 39;
    const DJF = 40;
    const DOP = 41;
    const TPE = 44;
    const ECS = 45;
    const EGP = 46;
    const SVC = 47;
    const ETB = 48;
    const FKP = 50;
    const FJD = 51;
    const FIM = 52;
    const FRF = 53;
    const GMD = 54;
    const GHC = 55;
    const GIP = 56;
    const GTQ = 58;
    const GNF = 59;
    const GWP = 60;
    const GYD = 61;
    const HTG = 62;
    const HNL = 63;
    const HUF = 65;
    const ISK = 66;
    const INR = 67;
    const IRR = 68;
    const IQD = 69;
    const ILS = 71;
    const ITL = 72;
    const JMD = 73;
    const JOD = 75;
    const KHR = 76;
    const KES = 77;
    const KWD = 78;
    const LAK = 79;
    const LBP = 80;
    const LSL = 81;
    const LRD = 82;
    const LYD = 83;
    const LUF = 84;
    const MOP = 85;
    const MGF = 86;
    const MWK = 87;
    const MYR = 88;
    const MVR = 89;
    const MTL = 90;
    const MRO = 91;
    const MUR = 92;
    const MXN = 93;
    const MNT = 94;
    const MAD = 95;
    const MZM = 96;
    const NPR = 97;
    const ANG = 98;
    const YUD = 99;
    const NIC = 101;
    const NGN = 102;
    const KPW = 103;
    const OMR = 105;
    const PKR = 106;
    const PAB = 107;
    const PGK = 108;
    const PYG = 109;
    const PEI = 110;
    const PHP = 111;
    const PLZ = 112;
    const PTE = 113;
    const QAR = 114;
    const ROL = 115;
    const RWF = 116;
    const WST = 117;
    const STD = 118;
    const SAR = 119;
    const SCR = 120;
    const SLL = 121;
    const SGD = 122;
    const SBD = 123;
    const SOS = 124;
    const ZAR = 125;
    const KRW = 126;
    const ESP = 127;
    const LKR = 128;
    const SHP = 129;
    const SDP = 130;
    const SRG = 131;
    const SZL = 132;
    const SYP = 135;
    const TWD = 136;
    const TZS = 137;
    const THB = 138;
    const TOP = 139;
    const TTD = 140;
    const TND = 141;
    const TRL = 142;
    const UGS = 143;
    const AED = 144;
    const UYP = 145;
    const SUR = 147;
    const VUV = 148;
    const VEB = 149;
    const VND = 150;
    const YER = 151;
    const ZRZ = 153;
    const ZMK = 154;
    const ZWD = 155;


    /**
     * @var array Sentry currency code id mapped to currency abbreviation.
     */
    public static $currencyCodeDescriptions = [
        self::USD => 'USD',
        self::EUR => 'EUR',
        self::GBP => 'GBP',
        self::JPY => 'JPY',
        self::AUD => 'AUD',
        self::AZN => 'AZN',
        self::CAD => 'CAD',
        self::GEL => 'GEL',
        self::HKD => 'HKD',
        self::KZT => 'KZT',
        self::NZD => 'NZD',
        self::NOK => 'NOK',
        self::RUB => 'RUB',
        self::SEK => 'SEK',
        self::CHF => 'CHF',
        self::CNY => 'CNY',
        self::AFA => 'AFA',
        self::ALL => 'ALL',
        self::DZD => 'DZD',
        self::ADP => 'ADP',
        self::AOK => 'AOK',
        self::ARS => 'ARS',
        self::AWG => 'AWG',
        self::ATS => 'ATS',
        self::BSD => 'BSD',
        self::BHD => 'BHD',
        self::BDT => 'BDT',
        self::BBD => 'BBD',
        self::BEF => 'BEF',
        self::BZD => 'BZD',
        self::BMD => 'BMD',
        self::BTN => 'BTN',
        self::BOB => 'BOB',
        self::BWP => 'BWP',
        self::BRL => 'BRL',
        self::BND => 'BND',
        self::BGL => 'BGL',
        self::BUK => 'BUK',
        self::BIF => 'BIF',
        self::CVE => 'CVE',
        self::KYD => 'KYD',
        self::CLP => 'CLP',
        self::CLF => 'CLF',
        self::COP => 'COP',
        self::KMF => 'KMF',
        self::CRC => 'CRC',
        self::CUP => 'CUP',
        self::CYP => 'CYP',
        self::CSK => 'CSK',
        self::DKK => 'DKK',
        self::YDD => 'YDD',
        self::DEM => 'DEM',
        self::DJF => 'DJF',
        self::DOP => 'DOP',
        self::TPE => 'TPE',
        self::ECS => 'ECS',
        self::EGP => 'EGP',
        self::SVC => 'SVC',
        self::ETB => 'ETB',
        self::FKP => 'FKP',
        self::FJD => 'FJD',
        self::FIM => 'FIM',
        self::FRF => 'FRF',
        self::GMD => 'GMD',
        self::GHC => 'GHC',
        self::GIP => 'GIP',
        self::GTQ => 'GTQ',
        self::GNF => 'GNF',
        self::GWP => 'GWP',
        self::GYD => 'GYD',
        self::HTG => 'HTG',
        self::HNL => 'HNL',
        self::HUF => 'HUF',
        self::ISK => 'ISK',
        self::INR => 'INR',
        self::IRR => 'IRR',
        self::IQD => 'IQD',
        self::ILS => 'ILS',
        self::ITL => 'ITL',
        self::JMD => 'JMD',
        self::JOD => 'JOD',
        self::KHR => 'KHR',
        self::KES => 'KES',
        self::KWD => 'KWD',
        self::LAK => 'LAK',
        self::LBP => 'LBP',
        self::LSL => 'LSL',
        self::LRD => 'LRD',
        self::LYD => 'LYD',
        self::LUF => 'LUF',
        self::MOP => 'MOP',
        self::MGF => 'MGF',
        self::MWK => 'MWK',
        self::MYR => 'MYR',
        self::MVR => 'MVR',
        self::MTL => 'MTL',
        self::MRO => 'MRO',
        self::MUR => 'MUR',
        self::MXN => 'MXN',
        self::MNT => 'MNT',
        self::MAD => 'MAD',
        self::MZM => 'MZM',
        self::NPR => 'NPR',
        self::ANG => 'ANG',
        self::YUD => 'YUD',
        self::NIC => 'NIC',
        self::NGN => 'NGN',
        self::KPW => 'KPW',
        self::OMR => 'OMR',
        self::PKR => 'PKR',
        self::PAB => 'PAB',
        self::PGK => 'PGK',
        self::PYG => 'PYG',
        self::PEI => 'PEI',
        self::PHP => 'PHP',
        self::PLZ => 'PLZ',
        self::PTE => 'PTE',
        self::QAR => 'QAR',
        self::ROL => 'ROL',
        self::RWF => 'RWF',
        self::WST => 'WST',
        self::STD => 'STD',
        self::SAR => 'SAR',
        self::SCR => 'SCR',
        self::SLL => 'SLL',
        self::SGD => 'SGD',
        self::SBD => 'SBD',
        self::SOS => 'SOS',
        self::ZAR => 'ZAR',
        self::KRW => 'KRW',
        self::ESP => 'ESP',
        self::LKR => 'LKR',
        self::SHP => 'SHP',
        self::SDP => 'SDP',
        self::SRG => 'SRG',
        self::SZL => 'SZL',
        self::SYP => 'SYP',
        self::TWD => 'TWD',
        self::TZS => 'TZS',
        self::THB => 'THB',
        self::TOP => 'TOP',
        self::TTD => 'TTD',
        self::TND => 'TND',
        self::TRL => 'TRL',
        self::UGS => 'UGS',
        self::AED => 'AED',
        self::UYP => 'UYP',
        self::SUR => 'SUR',
        self::VUV => 'VUV',
        self::VEB => 'VEB',
        self::VND => 'VND',
        self::YER => 'YER',
        self::ZRZ => 'ZRZ',
        self::ZMK => 'ZMK',
        self::ZWD => 'ZWD',
    ];

    const BUY                                 = 26;
    const SELL                                = 19;
    const BUY_TO_CLOSE                        = 125;
    const BUY_TO_OPEN                         = 126;
    const CLOSE_SHORT_TRS                     = 515;
    const SELL_SHORT                          = 22;
    const DEPOSIT_FUNDS                       = 23;
    const INTEREST_INCOME                     = 37;
    const BUY_TO_COVER                        = 39;
    const INTEREST_INCOME_ON_CASH_BALANCE     = 28; // IOB
    const MARGIN_BALANCE_DECREASE             = 317;
    const TRANSFER_OUT_LONG_IN_KIND           = 336;
    const PAYDOWN_OF_PRINCIPAL                = 3;
    const DIVIDEND_PAYMENT                    = 20;
    const TRANSFERRED_ACCRUED_INTEREST_OUT    = 481;
    const BUY_PROTECTION                      = 15;
    const UPFRONT_FEE_PAY                     = 263;
    const ACCRUED_PREMIUM_RECEIVE             = 119;
    const PREMIUM_PAYMENT                     = 47;
    const INTEREST_PAYMENT                    = 41;
    const PARTIAL_CLOSE_IRS                   = 405;
    const IRS_SETTLEMENT_AMOUNT               = 404;
    const OPEN_IRS                            = 402;
    const CLOSE_IRS                           = 403;
    const TRANSACTION_COMMISSION              = 558;
    const CLEARING_FEE                        = 560;
    const RECEIVE_SHARES                      = 2;
    const UNWIND_REPO                         = 260;
    const RECEIVE_REPO                        = 261;
    const OPEN_SHORT_TRS                      = 513;
    const TOTAL_RETURN_SWAP_PAYMENT           = 482;
    const TRANSFER_IN_LONG_IN_KIND            = 337;
    const DIVIDEND_INCOME                     = 18;
    const UPFRONT_FEE_RECEIVE                 = 262;
    const ROLL_IN_AMOUNT                      = 7;
    const SPLIT_SHARES_RECEIVED               = 16;
    const SPLIT_SHARES_DELIVERED              = 17;
    const COST_BASIS_ADJUSTMENT               = 12;
    const CASH_ADJUSTMENT                     = 6;
    const DELIVER_SHARES                      = 32;
    const SELL_TO_OPEN                        = 128;
    const SELL_TO_CLOSE                       = 127;
    const TERMINATE_PROTECTION_BOUGHT         = 50;
    const ACCRUED_PREMIUM_PAY                 = 120;
    const REPO_WITHDRAW_FUNDS                 = 430;
    const TRANSFERRED_ACCRUED_INTEREST_IN     = 480;
    const PARTIAL_TERMINATE_PROTECTION_BOUGHT = 306;
    const OPTION_EXERCISE_LONG                = 413;
    const OPEN_FUTURES_CONTRACT_LONG          = 268;
    const CLOSE_FUTURES_CONTRACT_LONG         = 270;
    const VARIATION_MARGIN                    = 9;
    const OPEN_CURRENCY_CONTRACT              = 438;
    const CLOSE_CURRENCY_CONTRACT             = 439;
    const DELIVER_SHORT                       = 276;
    const REPO_DEPOSIT_FUNDS                  = 440;
    const PREMIUM_INCOME                      = 4;
    const MATURED_SHORT                       = 592;
    const SELL_PROTECTION                     = 25;
    const SELL_PROTECTION_FOR_FUNDED_CDS      = 79;
    const SELL_FORWARD                        = 116;
    const BUY_PROTECTION_FOR_FUNDED_CDS       = 80;
    const BUY_FORWARD                         = 115;
    const PARTIAL_TERMINATE_PROTECTION_SOLD   = 308;
    const TERMINATE_PROTECTION_SOLD           = 51;
    const CLOSE_TRS                           = 473;
    const OPEN_TRS                            = 472;
    const CLOSE_TRS_LONG_FROM_UPSIZE          = 539;
    const CLOSE_TRS_SHORT_FROM_UPSIZE         = 540;
    const OPEN_TRS_LONG_FROM_UPSIZE           = 537;
    const OPEN_TRS_SHORT_FROM_UPSIZE          = 538;
    const CLOSE_FUTURES_CONTRACT_SHORT        = 271;
    const OPEN_FUTURES_CONTRACT_SHORT         = 269;
    const SPO_PAYABLE                         = 396;


    const FACTOR_PIK = 62;
    const PADJ       = 46;


    public static $transactionCodeDescriptions = [
        self::BUY                                 => 'Buy',
        self::SELL                                => 'Sell',
        self::SELL_SHORT                          => 'Sell Short',
        self::BUY_TO_COVER                        => 'Buy to Cover',
        self::TRANSFER_OUT_LONG_IN_KIND           => 'Transfer Out Long In Kind',
        self::INTEREST_INCOME                     => 'Interest Income',
        self::PAYDOWN_OF_PRINCIPAL                => 'Paydown of Principal',
        self::DIVIDEND_PAYMENT                    => 'Dividend Payment',
        self::TRANSFERRED_ACCRUED_INTEREST_OUT    => 'Transferred Accrued Interest Out',
        self::BUY_PROTECTION                      => 'Buy Protection',
        self::UPFRONT_FEE_PAY                     => 'Upfront Fee Pay',
        self::ACCRUED_PREMIUM_RECEIVE             => 'Accrued Premium Receive',
        self::PREMIUM_PAYMENT                     => 'Premium Payment',
        self::BUY_TO_OPEN                         => 'Buy to Open',
        self::BUY_TO_CLOSE                        => 'Buy to Close',
        self::INTEREST_PAYMENT                    => 'Interest Payment',
        self::PARTIAL_CLOSE_IRS                   => 'Partial Close IRS',
        self::IRS_SETTLEMENT_AMOUNT               => 'IRS Settlement Amount',
        self::OPEN_IRS                            => 'Open IRS',
        self::CLOSE_IRS                           => 'Close IRS',
        self::TRANSACTION_COMMISSION              => 'Transaction Commission',
        self::CLEARING_FEE                        => 'Clearing Fee',
        self::RECEIVE_SHARES                      => 'Receive Shares',
        self::UNWIND_REPO                         => 'Unwind Repo',
        self::RECEIVE_REPO                        => 'Receive Repo',
        self::OPEN_SHORT_TRS                      => 'Open Short TRS',
        self::TOTAL_RETURN_SWAP_PAYMENT           => 'Total Return Swap Payment',
        self::TRANSFER_IN_LONG_IN_KIND            => 'Transfer In Long In Kind',
        self::DIVIDEND_INCOME                     => 'Dividend Income',
        self::UPFRONT_FEE_RECEIVE                 => 'Upfront Fee Receive',
        self::ROLL_IN_AMOUNT                      => 'Roll in Amount',
        self::SPLIT_SHARES_RECEIVED               => 'Split Shares Received',
        self::SPLIT_SHARES_DELIVERED              => 'Split Shares Delivered',
        self::COST_BASIS_ADJUSTMENT               => 'Cost Basis Adjustment',
        self::CASH_ADJUSTMENT                     => 'Cash Adjustment',
        self::DELIVER_SHARES                      => 'Deliver Shares',
        self::SELL_TO_OPEN                        => 'Sell to Open',
        self::SELL_TO_CLOSE                       => 'Sell to Close',
        self::TERMINATE_PROTECTION_BOUGHT         => 'Terminate Protection Bought',
        self::ACCRUED_PREMIUM_PAY                 => 'Accrued Premium Pay',
        self::REPO_WITHDRAW_FUNDS                 => 'Repo Withdraw Funds',
        self::TRANSFERRED_ACCRUED_INTEREST_IN     => 'Transferred Accrued Interest In',
        self::PARTIAL_TERMINATE_PROTECTION_BOUGHT => 'Partial Terminate Protection Bought',
        self::OPTION_EXERCISE_LONG                => 'Option Exercise Long',
        self::CLOSE_SHORT_TRS                     => 'Close Short TRS',
        self::OPEN_FUTURES_CONTRACT_LONG          => 'Open Futures Contract Long',
        self::CLOSE_FUTURES_CONTRACT_LONG         => 'Close Futures Contract Long',
        self::VARIATION_MARGIN                    => 'Variation Margin',
        self::OPEN_CURRENCY_CONTRACT              => 'Open Currency Contract',
        self::CLOSE_CURRENCY_CONTRACT             => 'Close Currency Contract',
        self::DELIVER_SHORT                       => 'Deliver Short',
        self::REPO_DEPOSIT_FUNDS                  => 'Repo Deposit Funds',
        self::PREMIUM_INCOME                      => 'Premium Income',
        self::MATURED_SHORT                       => 'Matured Short',
        self::SELL_PROTECTION                     => 'Sell Protection',
        self::SELL_PROTECTION_FOR_FUNDED_CDS      => 'Sell Protection for Funded CDS',
        self::SELL_FORWARD                        => 'Sell Forward',
        self::BUY_PROTECTION_FOR_FUNDED_CDS       => 'Buy Protection for Funded CDS',
        self::BUY_FORWARD                         => 'Buy Forward',
        self::PARTIAL_TERMINATE_PROTECTION_SOLD   => 'Partial Terminate Protection Sold',
        self::TERMINATE_PROTECTION_SOLD           => 'Terminate Protection Sold',
        self::CLOSE_TRS                           => 'Close TRS',
        self::OPEN_TRS                            => 'Open TRS',
        self::CLOSE_TRS_LONG_FROM_UPSIZE          => 'Close TRS Long from Upsize',
        self::CLOSE_TRS_SHORT_FROM_UPSIZE         => 'Close TRS Short from Upsize',
        self::OPEN_TRS_LONG_FROM_UPSIZE           => 'Open TRS Long from Upsize',
        self::OPEN_TRS_SHORT_FROM_UPSIZE          => 'Open TRS Short from Upsize',
        self::CLOSE_FUTURES_CONTRACT_SHORT        => 'Close futures contract short',
        self::OPEN_FUTURES_CONTRACT_SHORT         => 'Open futures contract short',
        self::FACTOR_PIK                          => 'Factor PIK',
        self::PADJ                                => 'Principal Adjustment',
        self::SPO_PAYABLE                         => 'SPO Payable',
    ];

    public static $transactionCodeTradeActions = [
        self::BUY                                 => 'buy',
        self::SELL                                => 'sell',
        self::SELL_SHORT                          => 'sell',
        self::BUY_TO_COVER                        => 'buy',
        self::BUY_TO_CLOSE                        => 'buy',
        self::BUY_TO_OPEN                         => 'buy',
        self::SELL_TO_CLOSE                       => 'sell',
        self::SELL_TO_OPEN                        => 'sell',
        self::BUY_PROTECTION                      => 'buy',
        self::SELL_PROTECTION                     => 'sell',
        self::SELL_PROTECTION_FOR_FUNDED_CDS      => 'sell',
        self::SELL_FORWARD                        => 'sell',
        self::BUY_PROTECTION_FOR_FUNDED_CDS       => 'buy',
        self::BUY_FORWARD                         => 'buy',
        self::PARTIAL_TERMINATE_PROTECTION_BOUGHT => 'misc',
        self::PARTIAL_TERMINATE_PROTECTION_SOLD   => 'misc',
        self::TERMINATE_PROTECTION_BOUGHT         => 'misc',
        self::TERMINATE_PROTECTION_SOLD           => 'misc',
        self::CLOSE_IRS                           => 'sell',
        self::OPEN_IRS                            => 'buy',
        self::PARTIAL_CLOSE_IRS                   => 'sell',
        self::CLOSE_TRS                           => 'sell',
        self::CLOSE_SHORT_TRS                     => 'sell',
        self::OPEN_TRS                            => 'buy',
        self::OPEN_SHORT_TRS                      => 'buy',
        self::CLOSE_TRS_LONG_FROM_UPSIZE          => 'buy',
        self::CLOSE_TRS_SHORT_FROM_UPSIZE         => 'sell',
        self::OPEN_TRS_LONG_FROM_UPSIZE           => 'buy',
        self::OPEN_TRS_SHORT_FROM_UPSIZE          => 'buy',
        self::CLOSE_FUTURES_CONTRACT_LONG         => 'sell',
        self::CLOSE_FUTURES_CONTRACT_SHORT        => 'sell',
        self::OPEN_FUTURES_CONTRACT_LONG          => 'buy',
        self::OPEN_FUTURES_CONTRACT_SHORT         => 'buy',


        // The following Trade Actions are included to paint a clear picture in the position reports but are not included
        // in the TradesOnly group of transaction codes used to filter trade transactions in Sentry Transaction Browser

        self::UNWIND_REPO             => 'buy',
        self::RECEIVE_REPO            => 'sell',
        self::REPO_DEPOSIT_FUNDS      => 'misc',
        self::OPEN_CURRENCY_CONTRACT  => 'buy',
        self::CLOSE_CURRENCY_CONTRACT => 'sell',
        self::REPO_WITHDRAW_FUNDS     => 'misc',
        self::RECEIVE_SHARES          => 'misc',


    ];

    /**
     * @param int $transactionCodeId
     * @return string
     * @throws Exception
     */
    public static function transactionTypeText( int $transactionCodeId ): string {
        if ( !isset( self::$transactionCodeDescriptions[ $transactionCodeId ] ) ):
            throw new Exception( "We don't have this transactionCodeDescriptions set for transactionCodeId [" . $transactionCodeId . "] in the SentryHelper file." );
        endif;
        return self::$transactionCodeDescriptions[ $transactionCodeId ];
    }

    /**
     * Sentry sends and receives boolean values as the strings True and False.
     * FIMS requires those to be translated into actual boolean values.
     * @param string|NULL $bool
     * @return bool Will return NULL if the $bool parameter passed in is NULL.
     */
    public static function translateFieldSentryToFimsBoolean( string $bool = NULL ): bool {
        if ( is_null( $bool ) ) return NULL;
        $bool = strtolower( $bool );
        if ( 'true' == $bool ):
            return TRUE;
        endif;
        return FALSE;
    }


    /**
     * This method got moved into this class as a static method, because we found we needed it in more than one location.
     * @param string $name
     * @return string
     */
    public static function slugifyName( string $name ): string {
        $name = str_replace( "/", '~', $name );
        $name = str_replace( ' ', '@', $name );
        return $name;
    }

    /**
     * The sister function to slugifyName().
     * @param string $slug
     * @return string
     */
    public static function unslugifyName( string $slug ): string {
        $slug = str_replace( '@', ' ', $slug );
        $slug = str_replace( '~', '/', $slug );
        return $slug;
    }
}