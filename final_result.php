<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Prediction Model</title>
  <meta name="description" content="Disaster Prediction Model">
  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>
<style>
    body{
		background: linear-gradient(90deg, #e8e8e8 50%, #3d009e 50%);
	}
	.portfolio{
		padding:6%;
		text-align:center;
	}
	.heading{
		background: #fff;
		padding: 1%;
		text-align: left;
		box-shadow: 0px 0px 4px 0px #545b62;
	}
	.heading img{
		width: 10%;
	}
	.bio-info{
		padding: 5%;
		background:#fff;
		box-shadow: 0px 0px 4px 0px #b0b3b7;
	}
	.name{
		font-family: 'Charmonman', cursive;
		font-weight:600;
	}
	.bio-image{

    background-size: cover;
    width:200px;
    height:200px;
	}
	.bio-image img{
		border-radius:50%;
	}
	.bio-content{
		text-align:left;
	}
	.bio-content p{
		font-weight:600;
		font-size:30px;
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
.danger {background-color: #f44336;} 
.danger:hover {background: #da190b;}
</style>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="topnav">
		<a class="active" href="#home">DISASTER CLASSIFICATION</a>
		<a href="#">OUR PREDICTION</a>
</div>

<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">				
				<img src="https://image.ibb.co/cbCMvA/logo.png" />
			</div>
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div >
							<img class="bio-image" src="\uploads\disaster.jpg" alt="image" />
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="bio-content">
					<h1><span id = "disaster"></span></h1>
					<h6 id = "stats"></h6>
					<p></p>
					<button onclick="location.href = 'news.php';" class="btn danger">Get Recent Events</button>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="footer">
		  <p>THIS PROJECT IS MADE BY RIA AHLAWAT, SANKALP AGRAWAL AND SHYAM AGARWAL</p>
</div>
<script>
     $(function(){  
          $.ajax({
        url: "predict.php",
        type: "POST",
        success: function(data){
                    if(data)
                        {
                             $("#disaster").html(data);
                             if(data == "Flood")
                             {
                                $("#stats").html("Floods cause more than <b>$40 billion</b> in damage worldwide annually, according to the Organization for Economic Cooperation and Development. In the U.S., losses average close to <b>$8 billion</b> a year. Death tolls have increased in recent decades to more than 100 people a year.");

                             }
                             if(data == "Cyclone")
                             {
                                $("#stats").html("The Indian subcontinent is one of the worst affected regions in the world. The subcontinent with a long coastline of 8,041 kilometers is exposed to nearly 10% of the world’s tropical cyclones . Majority of cyclones in India have their genesis over the Bay of Bengal and usually strike the east coast of India. On an average, five to six tropical cyclones form every year, of which two or three could be destructive");

                             }
                             if(data == "Earthquake")
                             {
                                $("#stats").html("It is estimated that there are 500,000 detectable earthquakes in the world each year. 100,000 of those can be felt, and 100 of them cause damage.The largest recorded earthquake in the world was a magnitude 9.5 (Mw) in Chile on May 22, 1960.");

                             }
                             if(data == "Wildfire")
                             {
                                $("#stats").html("In 2019 there were 50,477 wildfires compared with 58,083 wildfires in 2018, according to the National Interagency Fire Center . About 4.7 million acres were burned in 2019 while there were 8.8 million acres burned in 2018. ... About 8.8 million acres were burned in 2018, compared with 10 million in 2017..");

                             }
                        }
        },
        error: function(){
            $("#disaster").html("<div class = 'alert alert-danger'>Unable to detect </div>");
        }
    });
     });  
</script>
</body>
</html>