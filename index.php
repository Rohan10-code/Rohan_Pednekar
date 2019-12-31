
<?php require_once("header.php") ?>
<html>
	
<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="moviedb";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sample movies</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}


/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  background:#B0E0E6 ;
  padding: 20px;
}


article {
  float: left;
  padding: 20px;
  width: 70%;
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}


/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
	
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}
	
hover .image {
  opacity: 0.3;
}
	
#pagination_link{
		padding: 10px;
	}
	
	span{
		botton:10px;
	}

</style>
</head>
<body >


	
<section>
  <nav>
	  <lable><b>search base on movie title </b></lable>
	  <input type="search" id="search" class="search" placeholder="Search">
	  <br>
	  <br>
	  
	<label>Filter :</label>
	  <br>
	  <br>
    <label>Language :</label>
	  <select name="language" class="language" id="language">
		<option value="all">Select Language</option>
		  <?php
		  $sql="SELECT  DISTINCT lang FROM movie_lang";
		  $result=mysqli_query($conn,$sql) or die("Bad Sql : $sql");
		  
		  while($row=mysqli_fetch_array($result))
		  {
			  echo '<option value="'.$row['lang'].'">'.$row['lang'].'</option>';
		  }
		  ?>
	  </select>
	  <br>
	  <br>
	  <label>genres :</label> 
	  <select name="genres" class="genres" id="genres">
		<option value="all">Select genres</option>
		  <?php
		  $sql="SELECT  DISTINCT genres FROM movie_genres";
		  $result=mysqli_query($conn,$sql) or die("Bad Sql : $sql");
		  
		  while($row=mysqli_fetch_array($result))
		  {
			  echo '<option value="'.$row['genres'].'">'.$row['genres'].'</option>';
		  }
		  ?>
	  </select>
	  
	  <br>
	  <br>
	  
	  <lable><b> order By : </b></lable>
		  <select name="order" class="order" id="order">
			  <option value='null'> select order</option>
			  <option value="DESC">descending order of title</option>
			  <option value="ASC">ascending order of title</option>
			  </select>
	  
  </nav>
  
  <article>
	  <center>
		  <div name='pagination_link' id="pagination_link">
			  
			  </div>
		  
		  </center>

  </article>
</section>

</body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script type="text/javascript">

$(document).ready(function()
{
var lang="all";
var genres="all";
var order="null";
var search
	
	load_data();
	function load_data(page)
	{
		$.ajax({
			type: 'POST',
			url: 'fatch.php',
			data: {lang:lang,genres:genres, order:order, search:search, page:page},
			cache: false,
			success: function(data)
			{
				$('#pagination_link').html(data);
			} 
		});
		
	}

	
	$('#language').change(function()
	{
		
		lang=$(this).val();
		load_data(1); 
	});
	
			
	$('#genres').change(function()
	{
		genres=$(this).val();
		load_data(1); 
	});
	
	$('#order').change(function()
	{
		order=$(this).val();
		load_data(1);
	});
		
	 $("#search").keyup(function()
	{
		search=$(this).val();
		 load_data(1);
	 });

	$(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      }); 
});
</script>	
	
	
</html>

<?php
mysqli_close($conn);
require_once("footer.php") ?>

