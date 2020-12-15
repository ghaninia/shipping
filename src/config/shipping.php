<?php 
return [
    // سال 99 
    // هزینه ارسال از تهران و مراکز استان ها
    "pishtaz" => [
        "tariff" => [
            "500" => [ // تا 500 گرم
                "insidePart" => 63250,  // درون استانی
                "edgePart" => 85800, // استان همجوار
                "outsidePart" => 92400 // استان دور
            ] ,
            "1000" => [// تا 1000 گرم
                "insidePart" => 7400,
                "edgePart" => 110000,
                "outsidePart" => 123200
            ] ,
            "2000" => [// تا 2000 گرم
                "insidePart" => 107800, 
                "edgePart" => 139700,
                "outsidePart" => 154000
            ] ,
            "3000" => [// تا 3000 گرم
                "insidePart" => 135300, 
                "edgePart" => 139700 ,
                "outsidePart" => 154000
            ] ,
            "higher" => [ 
                "insidePart" => 10000 , // به ازای هر کیلو این مقدار به پاییه ماقبل اضافه میشود
                "edgePart" => 10000 , // به ازای هر کیلو این مقدار به پاییه ماقبل اضافه میشود
                "outsidePart" => 10000 // به ازای هر کیلو این مقدار به پاییه ماقبل اضافه میشود
            ]
        ] ,
    ] ,
    "sefarshi" => [
        "tariff" => [
            "500" => [
                "insidePart" => 40480,  // درون استانی
                "edgePart" => 53900, // استان همجوار
                "outsidePart" => 58300 // استان دور
            ] ,
            "1000" => [
                "insidePart" => 53130,
                "edgePart" => 74360,
                "outsidePart" => 80080
            ] ,
            "2000" => [
                "insidePart" => 75900, 
                "edgePart" => 96800,
                "outsidePart" => 104500
            ] ,
            "3000" => [
                "insidePart" => 73370, 
                "edgePart" => 118800,
                "outsidePart" => 127600
            ] ,
            "5000" => [
                "insidePart" => 73370 , // تا حداکثر 5 کیلوگرم
                "edgePart" => 10000 ,
                "outsidePart" => 10000
            ] 
        ] ,
    ] , 

    "maliat" => 0.09 , //درصد مالیات
    "bime" => 8000 , // بیمه تا مبلغ 8 میلیون ریال 
    "inSideKarmozd" => 3 , // برون شهری ۳ درصد هزینه جنس
    "outSideKarmozd" => 1.5 , // برون شهری ۳ درصد هزینه جنس
    "cod" => 11000 ,
    "haghsabt" => 5000
] ;