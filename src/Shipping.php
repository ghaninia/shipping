<?php 
namespace GhaniniaIR\Shipping  ; 

class Shipping {

    private $type ; // pishtaz or sefarshi
    private $sourcePartId; // id source 
    private $partId; // id destination 
    private $weight; // weight marsole
    private $cost = 0 ; // cost marsole

    public static function __callStatic($name, $arguments){
        if( in_array( strtolower($name) , ["pishtaz" , "sefarshi"]) && sizeof($arguments) >= 3 ){
            $class = new self()  ;
            $class->type = strtolower($name) ;
            $class->sourcePartId = $arguments[0] ;
            $class->partId = $arguments[1] ;
            $class->weight = $arguments[2] ;
            if( isset($arguments[3]) ){
                $class->cost = $arguments[3] ;
            }
            return $class ; 
        }
        return false ; 
    }

    public function getPrice( $codRequest = false ){
        $bime = config("shipping.bime") ;
        $tax  = config("shipping.maliat") ;
        $inSideKarmozd = config("shipping.inSideKarmozd") ;
        $outSideKarmozd = config("shipping.outSideKarmozd") ;
        $haghSabt = config("shipping.haghsabt") ;
        $getPart = $this->setPart() ;
        $cod = config("shipping.cod") ;
        $cost = $this->cost ; 
        $price = $this->setPrice() ;

        if( $cost ){
            
            if( $cost <= 8000000 ){
                $price += $bime ; 
            }

            if( $getPart == "insidePart" ){
                $price += $inSideKarmozd * $cost / 100 ;
            }else{
                $price += $outSideKarmozd * $cost / 100;
            }
        }
        if( $codRequest ){
            $price += $cod ; 
        }

        $price += $price * $tax ;
        $price += $haghSabt ;

        return $price ; 
    }

    private function setPrice(){
        $type = $this->type ;
        $weight = $this->weight  ;
        $weightType = $this->setWeight() ;
        $partType = $this->setPart() ; 
        $price = config(sprintf("shipping.%s.tariff.%s.%s" , $type , $weightType , $partType )) ; 

        if(  in_array( $weightType , ["higher" , 5000] ) ){
            $tariff = config( sprintf("shipping.%s.tariff" , $type ) ) ; // از تنظیمات تعرفه رو گرفتیم
            $twiceLastKey =  array_keys($tariff)[sizeof( $tariff ) - 2] ;
            $twiceLastValue = $tariff[ $twiceLastKey ] ;
            $twiceLastPart = $twiceLastValue[ $partType ] ;
            
            $convertWeight = ( ($weight - $twiceLastKey) / 1000 ) ; // به ازای هر کیلوگرم
            if( !( $type == "sefarshi" && $weightType == 5000  && $partType == "insidePart" ) ){
                $price = ($convertWeight * $price) + $twiceLastPart ;
            }
        }

        return $price ;
    }

    private function setPart()
    {

        $partType = null ; 
        if( in_array( $this->partId , $this->postInsidePart( $this->sourcePartId ) ) ){
            // در صورتی که همجوار باشند
            $partType = "edgePart" ;
        }else if ( $this->partId == $this->sourcePartId ) {
            // در صورتی که داخل استان باشند
            $partType = "insidePart" ;
        }else {
            // در صورتی که از استان دور باشند
            $partType = "outsidePart" ;
        }

        return $partType ;
    }

    private function setWeight()
    {

        $type = $this->type ;
        $weightType = 0 ;

        if ($this->weight <= 500)
        {
            $weightType = 500 ;
        }
        else if ($this->weight >= 501 && $this->weight <= 1000)
        {
            $weightType = 1000 ;
        }
        else if ($this->weight >= 1001 && $this->weight <= 2000)
        {
            $weightType = 2000 ;
        }
        else if ($this->weight >= 2001 && $this->weight <= 3000)
        {
            $weightType = 3000 ;
        }
        else if ($this->weight >= 3001 && $this->weight <= 5000 && $type == "sefarshi" )
        {
            $weightType = 5000 ;
        }
        else if($this->weight > 3001 ){
            $weightType = "higher" ;
        }
        return $weightType ; 
    }

    private function postInsidePart($sourcePartId)
    {
        $result = array();
        switch ($sourcePartId) {
            case 1:
                $result = array(13,31,11,10,9);
                break;
            case 2:
                $result = array(15,12,8,13);
                break;
            case 3:
                $result = array(15,12,16);
                break;
            case 4:
                $result = array(27,20,24,28,21);
                break;
            case 5:
                $result = array(21,28,6,25,22,23);
                break;
            case 6:
                $result = array(5,25,9,10,11,20,24,28);
                break;
            case 7:
                $result = array(29,9,30,25);
                break;
            case 8:
                $result = array(2,12,17,11,31,13);
                break;
            case 9:
                $result = array(6,25,7,29,14,13,1,10);
                break;
            case 10:
                $result = array(1,6,9,11);
                break;
            case 11:
                $result = array(6,10,1,31,8,17,20);
                break;
            case 12:
                $result = array(3,16,15,2,8,17,18);
                break;
            case 13:
                $result = array(14,2,1,31,8,9);
                break;
            case 14:
                $result = array(29,9,13);
                break;
            case 15:
                $result = array(3,2,12);
                break;
            case 16:
                $result = array(3,12,18);
                break;
            case 17:
                $result = array(18,19,12,8,11,20);
                break;
            case 18:
                $result = array(17,19,12,16);
                break;
            case 19:
                $result = array(18,17,20,27);
                break;
            case 20:
                $result = array(11,17,19,27,6,24,4);
                break;
            case 21:
                $result = array(23,5,28,4);
                break;
            case 22:
                $result = array(26,23,5,25,30);
                break;
            case 23:
                $result = array(26,22,5,21);
                break;
            case 24:
                $result = array(6,28,4,20);
                break;
            case 25:
                $result = array(30,6,5,22,9,7);
                break;
            case 26:
                $result = array(23,22,30);
                break;
            case 27:
                $result = array(4,20,19);
                break;
            case 28:
                $result = array(6,24,4,21,5);
                break;
            case 29:
                $result = array(14,9,7);
                break;
            case 30:
                $result = array(26,22,25,7);
                break;
            case 31:
                $result = array(13,8,1,11);
                break;
            default:
                $result = 0;
                break;
        }
        return $result;
    }
}