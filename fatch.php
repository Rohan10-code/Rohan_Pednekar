<?php

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="moviedb";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

$results_per_page=8;
$page='';
$output='';
$like='';
if (!isset($_POST['page'])) 
	{
  	$page = 1;
	} 
	else
	{
  	$page = $_POST['page'];
	}



$this_page_first_result = ($page-1)*$results_per_page;

	
	$lang= $_POST['lang'];
	$genres=$_POST['genres'];
	$order=$_POST['order'];


	$whereCl="";
	$TableG="";
	$TableL="";
	$WhereGen="";
	$WhereLang="";
	$Distict="";
	$and="";
	$orderkey="";

	if(!empty(isset($_POST['search'])) )
	{
	
		if($lang=='all' && $genres=='all' )
		{
			$like=" WHERE movies.title LIKE '%{$_POST['search']}%' ";
		}
		else{
			$like=" AND  movies.title LIKE '%{$_POST['search']}%' ";
		}
	
	}

	if($order!="null")
	{
		$orderkey=" ORDER BY movies.title $order ";
	}
	else{
		$orderkey=" ORDER BY movies.year ASC ";
	}

	if($lang!='all' && $genres!='all')
	{
		$Distict="DISTINCT";
		$and="AND";
		
	}
	
	if($lang!='all' || $genres!='all')
	{
		$whereCl="WHERE";
	}
		
	if($lang!='all')
	{
		$TableL=", movie_lang";
		$WhereLang="movie_lang.title=movies.title  AND  movie_lang.year=movies.year  AND  movie_lang.lang= '$lang'";
	}
	
	if($genres!='all')
	{
		$TableG=", movie_genres";
		$WhereGen="movie_genres.title=movies.title AND movie_genres.year=movies.year AND  movie_genres.genres='$genres'";
	}
	
	

	$sql="SELECT $Distict movies.title, movies.year ,movies.image_name
	FROM movies $TableL $TableG
	$whereCl  $WhereGen $and $WhereLang $like $orderkey LIMIT $this_page_first_result ,$results_per_page ";
	$result=mysqli_query($conn,$sql) or die("Bad sql : $sql");

	$output.="<table class='table table-bordered'>";
	
	
	$i=0;
	while($row=mysqli_fetch_array($result) )
	{
		
		if($i%4 == 0)
		{
			$output.= "<tr>";
		}
		
		$output.= "<td>
		<center><a href='moveinfo.php?title={$row['title']} & year={$row['year'] }'><img class ='image' src='cover/{$row['image_name']}' alt='{$row['title']}'></a></center>
		</td>";
		
		
		if($i%4 == 3)
		{
			$output.= "</tr>";
		}
		
		$i++;
	}

	 $output.='</table><br /><div align="center">'; 
	
	$sql="SELECT $Distict movies.title, movies.year ,movies.image_name
	FROM movies $TableL $TableG
	$whereCl  $WhereGen $and $WhereLang $like ";

	$result=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	$number_of_results=mysqli_num_rows($result);
	
	$number_of_pages = ceil($number_of_results/$results_per_page);
	
	
	for ($page=1;$page<=$number_of_pages;$page++) {
		 $output.="<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$page."'><b>".$page."</b></span>";
	}


	 $output.='</div><br><br>';
	echo $output;

?>