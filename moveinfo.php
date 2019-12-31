<?php

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="moviedb";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

$title=$_GET['title'];
$year=$_GET['year'];


if(!$conn || empty($title))
{
	echo '<script "type=text/javascript"> alert("database connection failed");</script>' ;
	exit();
	
}
else
{
	
	$sql=" SELECT * FROM movies WHERE title='$title' and year='$year'";
	$result_movie=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	$row=mysqli_fetch_array($result_movie);
	
	echo"<center> 
		<h2> '{$row['title']}'</h2>
		<video width='800' height='400' controls>
		<source src='video/{$row['video_name']}'>
		</video>
		<h3>description</h3>
		<p>{$row['description']}</p>
		<lable><b>Audio</b></lable>";
	
	$sql="SELECT movie_lang.lang
	FROM movies
	INNER JOIN movie_lang ON movies.title=movie_lang.title and movies.year=movie_lang.year
	WHERE movies.title='$title' AND movies.year='$year'";
	$result_movie_language=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	
		
	
	while($row=mysqli_fetch_array($result_movie_language))
	{
		
		echo"<lable><br>{$row['lang']} </lable>";
	}
	
	$sql="SELECT movie_genres.genres
	FROM movies
	INNER JOIN movie_genres ON movies.title=movie_genres.title and movies.year=movie_genres.year
	WHERE movies.title='$title' AND movies.year='$year'";
	$result_movie_geners=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	echo "<br><br><lable> <b>Geners</b> </lable>";
	while($row=mysqli_fetch_array($result_movie_geners))
	{
		
		echo"<lable><br>{$row['genres']} </lable>";
	}
	
	echo "<br><br><lable> <b>Cast</b> </lable>";
	
	$sql="SELECT actors.Fname ,actors.Lname ,actors.DOB ,performed_by.cast
	FROM movies,performed_by,actors
	WHERE movies.title=performed_by.title AND movies.year=performed_by.year AND performed_by.Fname=actors.Fname AND performed_by.Lname=actors.Lname  AND  movies.title='$title' AND movies.year='$year' ;";
	$result_performed_by=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	echo "<table><tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Born On</th>
	<th>Cast</th>
	</tr>";
	
	while($row=mysqli_fetch_array($result_performed_by))
	{
		echo"<tr>
		<td>{$row['Fname']}</td>
		<td>{$row['Lname']}</td>
		<td>{$row['DOB']}</td>
		<td>{$row['cast']}</td>
		</tr>";
	}
	
	echo"</table> 
		<br><br><lable> <b>Directed By</b> </lable>";
	
	$sql="SELECT director.Fname ,director.Lname ,director.DOB 
	FROM movies,directed_by,director
	WHERE movies.title=directed_by.title AND movies.year=directed_by.year AND directed_by.Fname=director.Fname AND directed_by.Lname=director.Lname  AND  movies.title='$title' AND movies.year='$year' ;";
	$result_directed_by=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	echo "<table><tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Born On</th>
	</tr>";
	
	while($row=mysqli_fetch_array($result_directed_by))
	{
		echo"<tr>
		<td>{$row['Fname']}</td>
		<td>{$row['Lname']}</td>
		<td>{$row['DOB']}</td>
		</tr>";
	}
	
	echo"</table> 
		<br><br><lable> <b>Produce By</b> </lable>";
	
	$sql="SELECT produce.name 
	FROM movies,produce
	WHERE movies.title=produce.title AND movies.year=produce.year AND movies.title='$title' AND movies.year='$year' ";
	$result_produce=mysqli_query($conn,$sql) or die("Bad sql : $sql");
	
	$row=mysqli_fetch_array($result_produce);
	echo" <br><lable> {$row['name']} </lable>
		</center>";
	
	
}

?>