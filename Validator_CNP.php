<?php

function isCnpValid(string $value): bool {
    
    if(!is_numeric( $value ))
        return false;

    $year_short = $value[1] . $value[2];
    $county_number =  (int)($value[7] . $value[8]);

    if(strlen($value) != 13)
        return false;
        

    if($value[0] == '0')
        return false;

    switch ($value[0]) {
        case '1':
            $year = '19'. $year_short;
            break;
        
        case '2':
            $year = '19'. $year_short;
            break;
    
        case '3':
            $year = '18'. $year_short;
            break;
        
        case '4':
            $year = '18'. $year_short;
            break;
        
        case '5':
            $year = '20'. $year_short;
            break;

        case '6':
            $year = '20'. $year_short;
            break;

        case '7':
            $year = '19'. $year_short;
            break;

        case '8':
            $year = '19'. $year_short;
            break;

        case '9':
            $year = '19'. $year_short;
            break;

        default:
           return false;
           break;
    }

    if(!checkdate ( $value[3] . $value[4], $value[5] . $value[6], $year ))
        return false;

    if( !($county_number >= 1 &&  $county_number <= 52) )
        return false;

    $control_number = ($value[0]*2+ $value[1]*7+ $value[2]*9+ $value[3]*1+ $value[4]*4+ $value[5]*6+ $value[6]*3+ $value[7]*5+ $value[8]*8+ $value[9]*2+ $value[10]*7+ $value[11]*9) % 11;
    if($control_number == 10)
        $control_number = 1;

    if($control_number != $value[12])
        return false;
    
    return true;
}
