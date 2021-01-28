<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Disaster Prediction Model</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
<style>


.share:hover {
        text-decoration: none;
    opacity: 0.8;
}
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.footer {
		  position: fixed;
		  left: 0;
		  bottom: 0;
		  width: 100%;
		  background-color: black;
		  color: white;
		  text-align: center;
		}

</style>
</head>
<body>
<div class="topnav">
		<a class="active" href="#">NEWS RELATED TO EVENT </a>
	  </div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<div class="container">
   <h3 class="pb-3 mb-4 font-italic border-bottom">
   </h3>
   <div class="row" id="news">
      
   </div>
   <hr>
</div>
<div class="footer">
		  <p>THIS PROJECT IS MADE BY RIA AHLAWAT, SANKALP AGRAWAL AND SHYAM AGARWAL</p>
</div>
<script>
$("#news").html("LOADING...");
     $(function(){  
          $.ajax({
        url: "get_news.php",
        type: "POST",
        success: function(data){
                    if(data !== "Error Inserting row")
                        {
                            $("#news").html(data);
                        }
        },
        error: function(){
            console.log("No");
        }
    });
     });  
</script>
</body>
</html>