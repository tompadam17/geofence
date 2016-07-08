<?php
function decodePolylineToArray($encoded)
{
  $length = strlen($encoded);
  $index = 0;
  $points = array();
  $lat = 0;
  $lng = 0;

  while ($index < $length)
  {
    // Temporary variable to hold each ASCII byte.
    $b = 0;

    // The encoded polyline consists of a latitude value followed by a
    // longitude value.  They should always come in pairs.  Read the
    // latitude value first.
    $shift = 0;
    $result = 0;
    do
    {
      // The `ord(substr($encoded, $index++))` statement returns the ASCII
      //  code for the character at $index.  Subtract 63 to get the original
      // value. (63 was added to ensure proper ASCII characters are displayed
      // in the encoded polyline string, which is `human` readable)
      $b = ord(substr($encoded, $index++)) - 63;

      // AND the bits of the byte with 0x1f to get the original 5-bit `chunk.
      // Then left shift the bits by the required amount, which increases
      // by 5 bits each time.
      // OR the value into $results, which sums up the individual 5-bit chunks
      // into the original value.  Since the 5-bit chunks were reversed in
      // order during encoding, reading them in this way ensures proper
      // summation.
      $result |= ($b & 0x1f) << $shift;
      $shift += 5;
    }
    // Continue while the read byte is >= 0x20 since the last `chunk`
    // was not OR'd with 0x20 during the conversion process. (Signals the end)
    while ($b >= 0x20);

    // Check if negative, and convert. (All negative values have the last bit
    // set)
    $dlat = (($result & 1) ? ~($result >> 1) : ($result >> 1));

    // Compute actual latitude since value is offset from previous value.
    $lat += $dlat;

    // The next values will correspond to the longitude for this point.
    $shift = 0;
    $result = 0;
    do
    {
      $b = ord(substr($encoded, $index++)) - 63;
      $result |= ($b & 0x1f) << $shift;
      $shift += 5;
    }
    while ($b >= 0x20);

    $dlng = (($result & 1) ? ~($result >> 1) : ($result >> 1));
    $lng += $dlng;

    // The actual latitude and longitude values were multiplied by
    // 1e5 before encoding so that they could be converted to a 32-bit
    // integer representation. (With a decimal accuracy of 5 places)
    // Convert back to original values.
    $points[] = array($lat * 1e-5, $lng * 1e-5);
  }

  return $points;
}

$data = decodePolylineToArray($_GET['loc']);

//print_r($data);





$point = array($_GET['lat'],$_GET['lng']);

//print_r($point);

function pointInPolygon($point, $polygon){//http://alienryderflex.com/polygon/
     $return = 'outside';
     foreach($polygon as $k=>$p){
        if(!$k) $k_prev = count($polygon)-1;
        else $k_prev = $k-1;

        if(($p[1]< $point[1] && $polygon[$k_prev][1]>=$point[1] || $polygon[$k_prev][1]< $point[1] && $p[1]>=$point[1]) && ($p[0]<=$point[0] || $polygon[$k_prev][0]<=$point[0])){
           if($p[0]+($point[1]-$p[1])/($polygon[$k_prev][1]-$p[1])*($polygon[$k_prev][0]-$p[0])<$point[0]){
              $return = 'inside';
           }
        }
     }
     return $return;
  }


  $state = pointInPolygon($point,$data);

  echo "$state";

?>