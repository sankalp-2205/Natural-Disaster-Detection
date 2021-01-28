<?php
include 'conn.php';
date_default_timezone_set('Asia/Kolkata');
$sql2 = "DELETE FROM news";
$count = 0;
if($result2 = $link ->query($sql2))
{
 if (($h = fopen("output.csv", "r")) !== FALSE) 
 {
  // Convert each line into the local $data variable
  while (($data = fgetcsv($h, 2000, ",")) !== FALSE) 
  {		
    $title = $data[0];
    $desc = $data[1];
    $date = $data[2];
    $time = $data[3];
    $mylink = $data[4];
    $image = $data[5];
    $site = $data[7];
    $sql = "INSERT INTO news(title,description,date,time,link, image, site) VALUES ('$title', '$desc', '$date', '$time', '$mylink', '$image' , '$site')";
        if(!$result = $link ->query($sql))
           {
               $count++;  
           }
    
  }
  fclose($h);
 }
 $sql = "SELECT * FROM news LIMIT 15";

if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    { 
        $title = $rows['title'];
        $desc = $rows['description'];
        $date = $rows['date'];
        $time = $rows['time'];
        $mylink = $rows['link'];
        $image = $rows['image'];
        $site = $rows['site'];
        echo "<div class='col-md-6'>
         <div class='card flex-md-row mb-4 shadow-sm h-md-250'>
            <div class='card-body d-flex flex-column align-items-start'>
               <strong class='d-inline-block mb-2 text-primary'>World</strong>
               <h6 class='mb-0'>
                  <a class='text-dark' href='$mylink'>$title</a>
               </h6>
               <div class='mb-1 text-muted small'>$date</div>
               <p class='card-text mb-auto'>$desc</p>
               <a class='btn btn-outline-primary btn-sm' role='button' href='$mylink'>Continue reading</a>
            </div>
            <img class='card-img-right flex-auto d-none d-lg-block' alt='Thumbnail [200x250]' src='$image' style='width: 200px; height: 250px;'>
         </div>
      </div>";
    }
 }
}

?>