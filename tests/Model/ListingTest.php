<?php

namespace SimpleviewTest\Model;

use SapphireTest;
use Simpleview\Model;
use PHPUnit_Framework_Constraint_IsType as isType;

/**
 * Listing model test.
 * 
 * Testing class for the listing formatter.
 * 
 * @category Simpleview
 * @package  Format
 * 
 * @author   Jed Diaz
 * @since    03 August 2018
 */
class ListingTest extends SapphireTest
{

    /**
     * Tests that the listing orm method saved single listing data.
     * 
     * @covers Format::testSave
     * 
     * @return void
     */
    public function testSave ()
    {
        $this->markTestSkipped("saveTest DOES NOT WORK because there IS NO SVLISTING CLASS");
        $db = new Model\Listing();

        $list = array();
        $list['SimpleviewID'] = '5931';
        $list['ClassName'] = 'SVListing';
        $list['LastEdited'] = date("Y-m-d H:i:s");
        $list['Created'] = date("Y-m-d H:i:s");
        $list['Name'] = 'Travel Agency';
        $list['Source'] = 'Labes, Janey';
        $list['URLSlug'] = 'walter-peak-cycling-excursions-real-journeys';
        $list['CompanyName'] = 'World Travellers Frankton';
        $list['MonthsOperation'] = 'Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec';
        $list['Email'] = 'frankton@worldtravellers.co.nz';
        $list['Website'] = 'http://www.worldtravellers.co.nz/stores/store/frankton-toby-stanton/';
        $list['Phone'] = '+6434414660';
        $list['FreePhone'] = '+64800232320';
        $list['Street'] = 'Level 1, Aurum House, Terrace Junction';
        $list['Suburb'] = 'Frankton';
        $list['City'] = 'Queenstown';
        $list['State'] = '';
        $list['PostCode'] = '9300';
        $list['Summary'] = 'We look after all of your international travel requirements, such as airfares, package holidays, cruises, tours, car rental, travel insurance and more';
        $list['Description'] = '<p>We are a small, dynamic team that prides itself on being able to offer the best travel advice and incredible personal service. In fact, if you can’t come to us, we can come to you – at your home, workplace or even your favourite café.</p><p>We are all passionate about travel and often find ourselves with the itch to explore new places. We share the joy of the travel booking experience with our clients, and are always dedicated to making sure your next trip is great value and a hassle free experience.</p><p>Our clients love our service so much, that we often find that repeat travellers come back year after year to book their next holiday. We have also been voted as finalists in the last two TAANZ Travel Awards!</p>';
        $list['MinPrice'] = '0.00';
        $list['MaxPrice'] = '0.00';
        $list['PriceInfo'] = '**Note: Special Events & New Year rates differ from those advertised**';
        $list['MinAge'] = '20';
        $list['BookingURL'] = 'https://www.whitelawdesign.com';
        $list['FacebookID'] = 'https://www.facebook.com/WhitelawMitchell';
        $list['TwitterID'] = 'https://twitter.com/whitelawmitchel';
        $list['YoutubeID'] = 'WhitelawDesign';
        $list['YoutubeChannelID'] = 'https://www.youtube.com/user/WhitelawDesign';
        $list['InstagramID'] = 'https://www.instagram.com/whitelaw_mitchell';
        $list['OfficialHashtag'] = '#whitelawmitchell';
        $list['TwentyFourSeven'] = 0;
        $list['isSuitableForGroups'] = 1;
        $list['GroupInfo'] = 'Great tour for small groups of family, friends or avid wine enthusiasts.';
        $list['GroupReservationEmail'] = 'events_queenstown@hilton.com';
        $list['isTransportAvailable'] = 0;
        $list['TransportInfo'] = 'This tour includes transport from central Queenstown and selected accommodation.';

        $list = (object) $list;

        $result = $db->saveTest($list);

        $this->assertInternalType(isType::TYPE_INT, $result);    
    }

    /**
     * Tests that the listing orm method save multiple listings.
     * 
     * @covers Format::testSave
     * 
     * @return void
     */
    public function testSaveAll ()
    {
        $this->markTestSkipped('Not working right now.');
        $db = new Model\Listing();
        $list = [
            ["SimpleviewID" => 1],
            ["SimpleviewID" => 2],
            ["SimpleviewID" => 3],
            ["SimpleviewID" => 4],
        ];

        $result = $db->saveAllTest( $list );

        $this->assertInternalType(isType::TYPE_OBJECT, $result);   
    }
    
}