<?php 
use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shipping\Shipping ;
final class ShippingTest extends TestCase{


    public function test_inside_part_sefareshi()
    {
        $weight = 5000 ; 
        $price  = 100000 ; 

        $SourceIdOne = 13 ; //mazanderan 
        $DestinationIdOne = 13 ; //mazanderan
        $ShippingOne = Shipping::sefarshi($SourceIdOne , $DestinationIdOne  , $weight , $price )->getPrice();

        $SourceIdTwo = 10 ; // qom 
        $DestinationIdTwo = 10 ; //qom
        $ShippingTwo = Shipping::sefarshi($SourceIdTwo , $DestinationIdTwo  , $weight , $price )->getPrice();
        
        return $this->assertEquals( $ShippingOne , $ShippingTwo  );
    }

    public function test_config_helper()
    {
        $this->assertIsArray( config("shipping") ) ;
    }

}