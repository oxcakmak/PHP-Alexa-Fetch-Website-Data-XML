<?php
/*
Author: Osman Çakmak
Skype: oxcakmak
Email: oxcakmak@hotmail.com
Website: http://oxcakmak.com/
Country: Turkey [TR]
*/

function findAlexaDataInformation($websiteURL, $returnData){
    $alexaXML = simplexml_load_file("http://data.alexa.com/data?cli=10&dat=snbamz&url=".$websiteURL);
    $alexaJson = json_decode(json_encode($alexaXML),true);
    switch($returnData){
        case "globalRank":
        echo substr(number_format($alexaJson['SD'][1]['POPULARITY']['@attributes']['TEXT'], 3), 0, -4);
        break;
        case "countryName":
        echo $alexaJson['SD'][1]['COUNTRY']['@attributes']['NAME'];
        break;
        case "countryCode":
        echo $alexaJson['SD'][1]['COUNTRY']['@attributes']['CODE'];
        break;
        case "countryRank":
        echo substr(number_format($alexaJson['SD'][1]['COUNTRY']['@attributes']['RANK'], 3), 0, -4);
        break;
    }
}

?>
