<?php
session_start();
//connect to db
include ('lib/connect.php');
$username=$_SESSION['username'];
$sql="SELECT * FROM users WHERE UserName='$username'";
$result=mysqli_query($con,$sql);
$rows=mysqli_num_rows($result);
if($rows>0){
	$array=mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--scripts and css files used for bottom half of profile page (photo gallery)-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
<link rel="stylesheet" type="text/css" href="css/rpagestyle.css"/>
<title>Profile!</title>
</head>
<body background="images/profile.jpg">
	<a href="logout.php"><button class="loginbutton" type="submit">LOGOUT</button></a>
	<br></br>
	<a href="index.php"><button class="loginbutton" type="submit">Go to Home</button></a>
	<br></br>
	<br></br>
	<br></br>
	<a href="mybookings.php"><button class="loginbutton" type="submit">Go My Bookings</button></a>
	<br></br>
	<br></br>
	<div id="section">
		<h1>Welcome to your Profile!</h1>
		<form method="post" action="">
			<input type="text" value="<?php echo $array['UserName'];?>" readonly></input>
			<input type="email" value="<?php echo $array['Email'];?>" readonly></input>
			<a style="display:block;color=orange;margin-top:10px;" href="changepassword.php">Change Password</a>
		</form>
	</div>
	<br></br>
	<br></br>
	
	
	
	<!--PHOTO GALLERY SECTION-->
	<div class="container" style="width:900px;">  
	
		<h3 align="center">!!!CUSTOMIZE PROFILE!!!<br>MY HOLIDAY PHOTOS</h3>  
		<br>
		
		<div align="right">
		
			<!--clicking this button will pop up modal on webpage for user to add an image-->
			<button type="button" name="add" id="add" class="btn btn-success">Add</button>
		</div>
		
		<br>
		
		<!--fetch images data from database: display images in table format-->
		<div id="image_data"></div>
		
	</div>
	
</body>
</html>

<!--POP UPS for image uplading functionality
class: adding fade effect to pop up -->
<div id="imageModal" class="modal fade" role="dialog">

	<!--this class sets the proper width and margin of the modal-->
	<div class="modal-dialog">

		<div class="modal-content">
		
			<!--class defines the style of the header of the modal-->
			<div class="modal-header">
			
				<!--button used to close bootstrap modal
				https://www.w3schools.com/bootstrap/bootstrap_modal.asp-->
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Image</h4>
			</div>
			
			<!--class used to define the style of the modal body-->
			<div class="modal-body">
			
				<!--enctype needed whwen uploading file to server-->
				<form id="image_form" method="post" enctype="multipart/form-data">
				
					 <p><label>Select Image</label>
					 <!--tag used to selecting an image to insert into database-->
					 <input type="file" name="image" id="image" /></p><br />
					 <!--this tag used to define the action of insert whule submitting in this form-->
					 <input type="hidden" name="action" id="action" value="insert" />
					 <!--store id of image and use it when uodating-->
					 <input type="hidden" name="image_id" id="image_id" />
					 <!--when clicked data will be submitted to server-->
					 <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" /> 
				</form>
			</div>
			<!--close button in modal to close the pop up on webpage-->
			<div class="modal-footer">
			
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			
		</div>
		
	</div>
	
</div>
 

<script>

	//https://www.sitepoint.com/community/t/uploading-and-storing-image/20384
	//https://api.jquery.com/jquery.getjson/
	//https://www.w3schools.com/jquery/event_on.asp
	//https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/		
	//get images through image data from database and display them in the table 
	$(document).ready(
	function()
	{
		//function is called to get and display the data
		fetch_data();
		
		function fetch_data()
		{
			
			//to use action.php to fetch image data from database
			var action = "fetch";
			//request for server
			$.ajax
			({
				
				url:"imagegallery.php",
				//to send data to server
				method:"POST",
				//what data to send to server
				data:{action:action},
				//function called if request is successfully completed
				success:function(data)
				{		
				
					//function will receive data from database table from which can be accessed by this database argument
					$('#image_data').html(data);
				}
			})
		}
		
		
		//when add button clicked code will exceute function:
		//to pop up modal onto webpage once add button in the table is clicked
		$('#add').click
		(function()
		{
			
			//this method will pop up the modal in webpage
			$('#imageModal').modal('show');
			//this will reset image form value when clicked
			$('#image_form')[0].reset();
			//this will show modal title when it pops up
			$('.modal-title').text("add photo");
			//after modal pops up, this clears the value of image id hidden tag
			$('#image_id').val('');
			//set hiddent action value tag to insert; for inserting image
			$('#action').val('insert');
			//set submit button value to insert
			$('#insert').val("Insert");
		});
		
		
		//submit form data to server for inserting image into to daatabse
		$('#image_form').submit(function(event)
		{
			
			//(https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault)following method will stop submitting form to server
			event.preventDefault();
			//get name of selected file and store into varibale val
			var image_name = $('#image').val();
			//if a file has not been selected, alert will pop up and tell user to choose an image
			if(image_name == '')
			{
				
				alert("pick a photo");
				return false;
			}
			//if a file is selected: then do this;
			else
			{
				
				//to validate extension of selected file (folowing extensions can be uploaded)
				//https://stackoverflow.com/questions/7041854/how-can-the-file-extension-be-validated-in-an-input-type-file-using-jquery
				var extension = $('#image').val().split('.').pop().toLowerCase();
				//check if extension file is present
				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
				{
					
					//if invalid this code will remove selected file from file tag
					alert("file not supported");
					$('#image').val('');
					return false;
				}
				
				//if selected image file extension is valid then do the following
				else
				{
					
					//ajax request
					$.ajax
					({
						
						//method to send data to server
						url:"imagegallery.php",
						method:"POST",
						//defines what data to send to server and uploading data using this formdata object
						data:new FormData(this),
						//***
						contentType:false,
						processData:false,
						//calls this function if request completed successfully	
						success:function(data)
						{
							
							//to show alerts and fetch data from server to display on webpage
							alert(data);
							fetch_data();
							//this method will reset form fields 
							$('#image_form')[0].reset();
							//to hide moadl from webpage
							$('#imageModal').modal('hide');
						}
						
					});
					
				}
				
			}
			
		});
		
		
		<!--if update button clicked then do the following-->
		$(document).on('click', '.update', function()
		{
			
			//get the image that needs to be updated using id
			$('#image_id').val($(this).attr("id"));
			//change value of action from insert to update
			$('#action').val("update");
			//change modal title
			$('.modal-title').text("update image");
			//to change submit button from insert to update
			$('#insert').val("Update");
			//to show modal on webpage (pop-up)
			$('#imageModal').modal("show");
		});
		
		
		////if delete button clicked then following function will execute
		$(document).on('click', '.delete', function()
		{
			
			//get image id of image to be deleted and store in attr var
			var image_id = $(this).attr("id");
			//action set to delete: use in php code to carry out delete operation
			var action = "delete";
			//user asked to confirm deletion of image, if yes: execute the following
			if(confirm("are you sure you would like to delete this photo?"))
			{
				
				//if yes: execute;
				$.ajax
				({
					
					//to send data from server
					url:"imagegallery.php",
					method:"POST",
					//defines what data to send to server
					data:{image_id:image_id, action:action},
					//called if request completed sucessfully and receive data 
					success:function(data)
					{
						
						alert(data);
						//fetches image data from server in html table format
						//display the available image data on webpage
						fetch_data();
					}
					
				})
				
			}
			else
			{
				
				return false;
			}
			
		});
		
	}); 
	
</script>