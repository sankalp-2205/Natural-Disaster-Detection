<?php
include 'conn.php';
date_default_timezone_set('Asia/Kolkata');
$textCnt  = "prediction.csv";
$contents = file_get_contents($textCnt);
$arrfields = explode(',', $contents);

$cyclone =  $arrfields[0]; 
$earthquake =  $arrfields[1]; 
$flood =  $arrfields[2]; 
$wildfire = $arrfields[3]; 
$ts =  $arrfields[4]; 


$sql2 = "DELETE FROM prediction_probability";
if($result2 = $link ->query($sql2))
   {
       //if($result2->num_rows == 0)
       //{
        $sql = "INSERT INTO prediction_probability(cyclone,earthquake,flood,wildfire,timestamp) VALUES ('$cyclone', '$earthquake', '$flood', '$wildfire', '$ts')";
        if(!$result = $link ->query($sql))
           {
               echo "Error Inserting row";
               exit;     
           }
       //}
   }
$sql = "SELECT * FROM prediction_probability ORDER BY timestamp DESC LIMIT 1";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    { 
        $cyclone = $rows['cyclone'];
        $earthquake = $rows['earthquake'];
        $flood = $rows['flood'];
        $wildfire = $rows['wildfire'];
    }
    $disaster = array("Cyclone"=>$cyclone,"Earthquake"=>$earthquake,"Flood"=>$flood, "Wildfire"=>$wildfire);
    $max = max(array_values($disaster));
    $key = array_search($max, $disaster);
    echo $key;
}
?>