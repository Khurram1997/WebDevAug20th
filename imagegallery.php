<?php
//execute the following if action taken
if(isset($_POST["action"]))
{
	//connecting to the databse
	$connect = mysqli_connect("localhost", "root", "", "userlogin");
	if($_POST["action"] == "fetch")
	{
		//query fetches data from database table
		$query = "SELECT * FROM profilegallery ORDER BY id DESC";
		//connect to databse and store result of query
		$result = mysqli_query($connect, $query);
		//store image data in html format in a table: different columns in table
		$output = '
		<table class="table table-bordered table-striped">  
		<tr>
		 <th width="10%">ID</th>
		 <th width="70%">Image</th>
		 <th width="10%">Change</th>
		 <th width="10%">Remove</th>
		</tr>
		';
		//storing query result inside row
		while($row = mysqli_fetch_array($result))
		{
			//<td>$row[id] will print image in. 
			//img tag will display image from database
			//button tags know the image id so update and deletion of images can occur
			//https://www.php.net/manual/en/function.base64-encode.php
			$output .= '
			<tr>
			<td>'.$row["id"].'</td>
			<td>
			<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="60" width="75" class="img-thumbnail" />
			</td>
			<td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">Change</button></td>
			<td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button></td>
			</tr>
			';
		}
		//to send data to ajax request
		//so this image data will display on webpage under tag <div>image_data
		$output .= '</table>';
		echo $output;
	}
	//to insert image data into database
	//to check if the value is equal to insert: then execute the following 
	if($_POST["action"] == "insert")
	{
		//gets contents and stores them in $file variable
		//https://www.w3schools.com/php7/func_string_addslashes.asp
		//this addslashes() function returns a string with backslashes in front of predefined characters		
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		//insert image into database
		$query = "INSERT INTO profilegallery(name) VALUES ('$file')";
		//if query is successfull
		if(mysqli_query($connect, $query))
		{
			echo 'photo added!';
		}
	}
	//for update of image data into database
	//if update button clicked then do the following (checks if action value is equal to update; then execute)
	if($_POST["action"] == "update")
	{
		//gets contents and stores them in $file variable
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		//insert new update image into database
		$query = "UPDATE profilegallery SET name = '$file' WHERE id = '".$_POST["image_id"]."'";
		if(mysqli_query($connect, $query))
		{
			echo 'photo updated!';
		}
	}
	//for deletion of image data from database
	//checks if value of action variable is equal to delete: if os execute
	if($_POST["action"] == "delete")
	{
		//deleting from database query using image id
		$query = "DELETE FROM profilegallery WHERE id = '".$_POST["image_id"]."'";
		//execute query
		if(mysqli_query($connect, $query))
		{
			echo 'photo deleted';
		}
		
	}
}
?>