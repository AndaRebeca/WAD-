<?php require "template/header.php"; ?>
<?php 

if (isset($_POST["addNewRecipeSubmit"]))
{
	// Get data from form
	$blogTitle = strip_tags($_POST["blogTitle"]);
	$blogThumb = $_FILES["blogThumbFileToUpload"]["name"];
	$blogContent = strip_tags($_POST["blogContent"]);
	$blogTime = strip_tags($_POST["blogTime"]);

	$blogThumbLocation = "";
	$imageOK = 1;

	if (!empty($blogThumb))
	{
		$blogThumbFileTMP = $_FILES["blogThumbFileToUpload"]["tmp_name"];
		$blogThumbFileType = $_FILES["blogThumbFileToUpload"]["type"];
		$blogThumbFileName = $blogThumb;
		$blogThumbLocation = "uploads/blogs/$blogThumb";

		// Get image type (jpg, png, gif)
		$itemThumbFileType = pathinfo($blogThumbLocation, PATHINFO_EXTENSION);
		$extensions = ["jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF"];

		// Verify if file has extension jpeg, png, or gif
		in_array($itemThumbFileType, $extensions) ? $imageOK = 1 : $imageOK = 0;

		// Verify if file exists, add extra name
		if (file_exists($blogThumbLocation))
		{
			switch ($blogThumbFileType)
			{
				case "image/jpg":
					$blogThumbLocation = substr($blogThumbLocation, 0, -4);
					$blogThumbLocation = $blogThumbLocation . "-" . rand(1, 99999999) . ".jpg";
				break;

				case "image/png":
					$blogThumbLocation = substr($blogThumbLocation, 0, -4);
					$blogThumbLocation = $blogThumbLocation . "-" . rand(1, 99999999) . ".png";
				break;

				case "image/gif":
					$blogThumbLocation = substr($blogThumbLocation, 0, -4);
					$blogThumbLocation = $blogThumbLocation . "-" . rand(1, 99999999) . ".gif";
				break;

				default:
					$blogThumbLocation = substr($blogThumbLocation, 0, -4);
					$blogThumbLocation = $blogThumbLocation . "-" . rand(1, 99999999) . ".jpg";
				break;
			}
		}
	}

	// If everything is ok
	if (strlen($blogTitle) > 2)
	{
		$addNewRecipeSQL = "INSERT INTO `blogs` (
								`blog__id`,
								`blog__title`,
								`blog__thumb`,
								`blog__content`,
								`blog__time`,
								`blog__user__id`,
								`blog__date`
							)

							VALUES (
							NULL, '$blogTitle', '$blogThumbLocation', '$blogContent', '$blogTime', $user__id, CURRENT_TIMESTAMP);";
		$addNewRecipeQuery = mysqli_query($con, $addNewRecipeSQL);

		// If image is ok, upload
		if ($imageOK == 1)
		{
			move_uploaded_file($blogThumbFileTMP, $blogThumbLocation);
		}

		header("Location: add-new-recipe.php");

		$_SESSION["recipe-added-message"] = "The recipe was added! Thank you!";
	}
}

?>

<div class="container" style="margin-top: 150px;">
	<?php if (isset($_SESSION["recipe-added-message"])): ?>
		<div class="alert alert-success alert-dismissable">
			<?php echo $_SESSION["recipe-added-message"]; ?>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php if (!isset($_POST["addNewRecipeSubmit"])): ?>
				<?php unset($_SESSION["recipe-added-message"]); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<h1>Add new recipe</h1>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="blogTitle" placeholder="Blog title" class="form-control input-lg">
				</div>

				<div class="form-group">
					<textarea name="blogContent" placeholder="Blog content" rows="4" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<textarea name="blogTime" placeholder="Blog time" rows="4" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<input type="file" name="blogThumbFileToUpload" class="form-control">
				</div>

				<div class="form-group">
					<input type="submit" name="addNewRecipeSubmit" value="Add new recipe">
				</div>
			</form>
		</div>
	</div>
</div>

<?php require "template/footer.php"; ?>