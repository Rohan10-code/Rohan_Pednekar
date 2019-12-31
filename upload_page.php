<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<script>
	
	/// language
function addMoreLanguage() {
	$("<div>").load("language.php", function() {
			$("#lang").append($(this).html());
	});	
}
function deleteRowLanguage() {
	$('div.lang-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}

	///// directore
function addMoreDirector() {
	$("<div>").load("Director.php", function() {
			$("#director").append($(this).html());
	});	
}
function deleteRowDirector() {
	$('div.director-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
	////// actore
	function addMoreActor() {
	$("<div>").load("Actor.php", function() {
			$("#actor").append($(this).html());
	});	
}
function deleteRowActor() {
	$('div.actor-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
	
	</script>
				  
</head>

<style>
	#field{
		background-color:#8FDDED;
		padding-top:10px;
		padding-right: 20px;
		padding-left: 20px;
		padding-bottom: 20px;
	}
	
	div {
		padding-bottom: 10px;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif";
		font-size: 13px;
	}
</style>
	
	
<body>
	
<?php require_once("header.php") ?>
<fieldset id="field" >
	<h3 > Fill movie details </h3>
<form action="upload.php" method="post" enctype="multipart/form-data" >
	<div>
	<label > Title of movie </label><br>
	  <input name="title" type="text"><br>
	</div>
	<div>
	<label>Launch date</label><br>
		<input type="text" name="Launch_date" placeholder="YYYY-MM-DD" required pattern="(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"/><br>
	</div>
	
	<div>
		<label>Movie Length</label><br>
		<input type="text" name="time" placeholder="HH:MM:SS" required pattern="(?:[01]\d|2[0123]):(?:[012345]\d):(?:[012345]\d)" >
	</div>
	<div>
	<label>Select cover picture</label><br>
		<input name="cover_pic" type="file"><br>
	</div>
	
	<div>
	<label>Select video file </label><br>
		<input name="video" type="file"><br>
	</div>
	
	<div>
	<lable> Movie language </lable><br>
	<div id="lang">
		<?php require_once("language.php") ?>
	</div>
		<div>
		<input type="button" name="add_item" value="Add More" onClick="addMoreLanguage();" />
		<input type="button" name="del_item" value="Delete" onClick="deleteRowLanguage();" />
			</div>
	</div>
	
	<div> 
	<label>Movies genre</label><br>
    <table width="200">
      <tr>
        <td><label>
          <input type="checkbox" name="CheckboxGroupLanguage[]" value="Sci-Fi" id="CheckboxGroupLanguage_1">
          Sci-Fi</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="checkbox" name="CheckboxGroupLanguage[]" value="Action" id="CheckboxGroupLanguage_2">
          Action</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="checkbox" name="CheckboxGroupLanguage[]" value="Adventure" id="CheckboxGroupLanguage_3">
          Adventure</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="checkbox" name="CheckboxGroupLanguage[]" value="Comedy" id="CheckboxGroupLanguage_4">
          Comedy</label></td>
      </tr>
    </table>
    </div> 
	
	<div>
		<label>Directed by</label><br>
		<div id="director"> 
		<?php require_once("director.php") ?>
		</div>
		<input type="button" name="add_item" value="Add More" onClick="addMoreDirector();" />
		<input type="button" name="del_item" value="Delete" onClick="deleteRowDirector();" />
		</div>
	
	
	<div> 
	<label>Name of production company</label><br>
		<input name="production" type="text" >
	</div>
	
	
	
	<div><label>actors details</label><br>
		<div id="actor">
			<?php require_once("actor.php") ?>
		</div>
		<input type="button" name="add_item" value="Add More" onClick="addMoreActor();" />
		<input type="button" name="del_item" value="Delete" onClick="deleteRowActor();" />	
	</div>
		<div>
			<label> Enter move description </label><br>
			<textarea  rows="10" cols="40" name="movie_details">
				</textarea>
			
	</div>
	<div>

	<input name="submit" type="submit" />	
	</div>
</form>
	
</fieldset>
	
</body>
</html>


<script type="text/javascript">
	
	
</script>