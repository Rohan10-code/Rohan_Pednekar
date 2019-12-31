
 <?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="moviedb";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if(isset($_POST['submit']))
{
	$title=mysqli_real_escape_string($conn,$_POST['title']);
	$launch=$_POST['Launch_date'];	
	$move_length=$_POST['time'];	
	$lang_count=count($_POST['lang']);
	$lang_value="";
	$movie_value="";
	$director_count=count($_POST['Director_Fname']);	
	$director_value="";
	$production_company=mysqli_real_escape_string($conn,$_POST['production']);
	$actor_count=count($_POST['Actor_Fname']);
	$actor_value="";
	$movie_description=mysqli_real_escape_string($conn,$_POST['movie_details']);
	$cover_pic_name=$_FILES['cover_pic']['name'];
	$cover_pic_name_temp=$_FILES['cover_pic']['tmp_name'];
	$cover_pic_size=$_FILES['cover_pic']['size'];
	$cover_pic_error=$_FILES['cover_pic']['error'];
	$cover_pic_type=$_FILES['cover_pic']['type'];
	$cover_pic_extension=explode('.',$cover_pic_name);
	$cover_pic_actual_extension=strtolower(end($cover_pic_extension));

	
	
	$video_name=$_FILES['video']['name'];
	$video_name_temp=$_FILES['video']['tmp_name'];
	$video_size=$_FILES['video']['size'];
	$video_error=$_FILES['video']['error'];
	$video_type=$_FILES['video']['type'];
	$video_extension=explode('.',$video_name);
	$video_actual_extension=strtolower(end($video_extension));
	
	
	
	if(empty($title)|| empty($launch) || empty($production_company) || empty($movie_description) || empty($move_length)|| $lang_count == 0  || $director_count == 0 || $actor_count == 0  )
	{
		echo '<script type="text/javascript" >alert("data filed is empty");</script>';
		//header("Location: index.php? data filed is empty ");
		exit();
	}
	
	else{
		
		$allowed_cover = array ('jpeg','png','jpg');
		$allowed_video = array ('mp4','webm','3gp','mkv');
		
		if(in_array($cover_pic_actual_extension,$allowed_cover) && in_array($video_actual_extension,$allowed_video) ){
			
			if($cover_pic_error==0 && $video_error==0)
			{
				//if($cover_pic_size < 50000 && $video_size<5000000)
				//{
					
					$cover_pic_new_name=uniqid('',true).".".$cover_pic_actual_extension;
					$video_new_name=uniqid('',true).".".$video_actual_extension;
					
					$cover_destination='cover/'.$cover_pic_new_name;
					$video_destination='video/'.$video_new_name;
					
					
					//code to insert new movie 
					
					
					$sql="SELECT * FROM movies WHERE title='$title' and year='$launch'";
					$result=mysqli_query($conn,$sql) or die("Bad sql : $sql");
					$rowCount=mysqli_num_rows($result);
					
 
					if($rowCount<=0)
					{
						$sql="INSERT INTO movies (title,year,length,description,video_name,image_name) VALUES ('$title','$launch','$move_length','$movie_description','$video_new_name','$cover_pic_new_name')";
						
						mysqli_query($conn,$sql) or die("Bad sql: $sql");
						
						
						
						/// code to insert new language;
						
						$sql="INSERT INTO movie_lang (title,year,lang) VALUES";
						$sqlValues="";
						for($i=0;$i<$lang_count ;$i++)
						{
							if(!empty($_POST['lang'][$i]) ){
								$lang_value++;
								if($sqlValues!=""){
									$sqlValues .=",";
								}
								$sqlValues .="( '".$_POST['title']."' , '".$_POST['Launch_date']."' , '".$_POST['lang'][$i]."')";
							}
						}
						
						$query=$sql.$sqlValues;
						if($lang_value!=0)
						{
							mysqli_query($conn,$query) or die("Bad sql : $query");
						}
						
						////code to insert new genar
						
						$sql="INSERT INTO movie_genres (title,year,genres) VALUES";
						$sqlValues="";
						
						foreach($_POST['CheckboxGroupLanguage'] as $selected ){
							$movie_value++;
							if($sqlValues !="")
							{
								$sqlValues .=",";
							}
							$sqlValues .="( '".$_POST['title']."' , '".$_POST['Launch_date']."' , '$selected' )";
						}
						
						$query="";
						$query=$sql.$sqlValues;
						if($movie_value!=0)
						{
							mysqli_query($conn,$query) or die("Bad sql : $query");
						}
						
						
						///insert actor 
						$sql="";
						$sql="INSERT INTO actors (Fname,Lname,DOB) VALUES ";
						$sqlValues="";
						for($i=0;$i<$actor_count;$i++)
						{
							if(!empty($_POST['Actor_Fname'][$i]) || !empty($_POST['Actor_Lname'][$i]) || !empty($_POST['Actor_DOB'][$i] )) {
								
								$query="";
								$query="SELECT * FROM actors WHERE Fname='".$_POST['Actor_Fname'][$i]."' and  Lname='".$_POST['Actor_Lname'][$i]."'";
								
								$result=mysqli_query($conn,$query) or die("Bad sql : $query ");
								$rowCount=mysqli_num_rows($result);
								
								if($rowCount<=0)
								{
									$actor_value++;
									if($sqlValues!="")
									{
										$sqlValues .=",";
									}
									$sqlValues .="( '".$_POST['Actor_Fname'][$i]."' , '".$_POST['Actor_Lname'][$i]."' , '".$_POST['Actor_DOB'][$i]."' )";
									
								}
	
							}
						}
						$query="";
						$query=$sql.$sqlValues;
						if($actor_value!=0)
						{
							mysqli_query($conn,$query) or die("Bad sql : $query");
						}
						
						//insert into performed_ny
						
						$performe_value="";
						
						$sql= "INSERT INTO performed_by ( title , year ,  Fname , Lname , cast ) VALUES ";
						$sqlValues="";
						for($i=0;$i<$actor_count;$i++)
						{
							if(!empty($_POST['Actor_Fname'][$i]) || !empty($_POST['Actor_Lname'][$i]) || !empty($_POST['Actor_Character'][$i] ) ){
								
								$performe_value++;
								if($sqlValues!="")
								{
									$sqlValues .=",";
								}
								
								$sqlValues .="(  '$title' , '$launch' , '".$_POST['Actor_Fname'][$i]."' , '".$_POST['Actor_Lname'][$i]."' , '".$_POST['Actor_Character'][$i]."' )";	
							}												
						}
						$query="";
						$query=$sql.$sqlValues;
						if($performe_value!=0)
						{
							mysqli_query($conn,$query) or die("Bad sql : $query ");
						}
						
						
						///insert director details 
					
						$sql="";
						$sql="INSERT INTO director (Fname,Lname,DOB) VALUES ";
						$sqlValues="";
						for($i=0;$i<$actor_count;$i++)
						{
							if(!empty($_POST['Director_Fname'][$i]) || !empty($_POST['Director_Lname'][$i]) || !empty($_POST['Director_DOB'][$i] )) {
								
								$query="";
								$query="SELECT * FROM director WHERE Fname='".$_POST['Director_Fname'][$i]."' and  Lname='".$_POST['Director_Lname'][$i]."' ";
								
								$result=mysqli_query($conn,$query) or die("Bad sql : $query ");
								$rowCount=mysqli_num_rows($result);
								
								if($rowCount<=0)
								{
									$director_value++;
									if($sqlValues!="")
									{
										$sqlValues .=",";
									}
									$sqlValues .="( '".$_POST['Director_Fname'][$i]."' , '".$_POST['Director_Lname'][$i]."' , '".$_POST['Director_DOB'][$i]."' )";
									
								}
	
							}
						}
						$query="";
						$query=$sql.$sqlValues;
						if($director_value!=0)
						{
							mysqli_query($conn,$query) or die("Bad sql : $query");
						}
						
					////insert into directed_by
						$directed_value="";
						
						$sql="INSERT INTO directed_by (title,year,Fname,Lname) VALUES ";
						$sqlValues="";
						for($i=0;$i<$actor_count;$i++)
						{
							if(!empty($_POST['Director_Fname'][$i]) || !empty($_POST['Director_Lname'][$i]) ){
								
								$directed_value++;
								if($sqlValues!="")
								{
									$sqlValues .=",";
								}
								
								$sqlValues .="( '$title' , '$launch' , '".$_POST['Director_Fname'][$i]."' , '".$_POST['Director_Lname'][$i]."' )";	
							}												
						}
						$query="";
						$query=$sql.$sqlValues;
						if($directed_value!=0)
						{
							mysqli_query($conn,$query) or die("Bad sql : $query ");
						}
						
					//// insert details of production company
						$sql="";
					$sql="SELECT * FROM production_companies WHERE name= '$production_company' ";
					$result=mysqli_query($conn,$sql) or die("Bad sql : $sql");
					$rowCount=mysqli_num_rows($result);
					
					if($rowCount<=0)
					{
						$sql="INSERT INTO production_companies (name) VALUES('$production_company')";
						mysqli_query($conn,$sql) or die("Bad sql : $sql ");
					}
					$sql=" INSERT INTO produce (title,year,name) VALUES('$title','$launch','$production_company')";
					mysqli_query($conn,$sql) or die("Bad sql : $sql ");	
						
						
					//move files to destination 
						
					move_uploaded_file($cover_pic_name_temp,$cover_destination);
					move_uploaded_file($video_name_temp,$video_destination);
						
					header("Location: upload_page.php?upload_was_successfull");	
					}
					
				//}
				//else{
					//echo '<script type="text/javascript" >alert("cover image is too large to store ");</script>';
				//}
				
			}
			else{
				header("Location: upload_page.php?error in uploading cover image");	
			}
		}else{
			header("Location: upload_page.php?you cannot upload cover image");
			
		}
		
		
	}
}
else{
	
	header("Location: upload_page.php?database conection fails ");
	exit();
}

?>

