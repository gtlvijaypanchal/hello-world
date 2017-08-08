<?php
tet123


//echo truncate_number(8.88, 1).'<br>';
    
/*    echo bcdiv(2.56789, 1, 1).'<br>';  // 2.5
echo bcdiv(2.56789, 1, 2);  // 2.56
echo bcdiv(2.56789, 1, 3);  // 2.567
echo bcdiv(-2.56789, 1, 1); // -2.5
echo bcdiv(-2.56789, 1, 2); // -2.56
echo bcdiv(-2.56789, 1, 3); // -2.567*/

$url = 'http://api.ekomi.de/v2/getSnapshot?auth=26370|fyep8G9tmYoFovF3UCv1YGf1c&version=cust-0.0.2';


    $response = file_get_contents($url);
    $response_array = unserialize($response);
    $review = $response_array['info']['fb_avg_detail'];
    $total = 10 * $review / 5;
    echo $CompanyReview=truncate_number($total, 1);
    //$CompanyReview = round($total, 1);



function truncate_number( $number, $precision = 2) {
    // Zero causes issues, and no need to truncate
    if ( 0 == (int)$number ) {
        return $number;
    }
    // Are we negative?
    $negative = $number / abs($number);
    // Cast the number to a positive to solve rounding
    $number = abs($number);
    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);
    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
    return floor( $number * $precision ) / $precision * $negative;
}

?>