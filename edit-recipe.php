<?php require "template/header.php"; ?>
<?php 

$recipeId = $_GET["recipe-id"];
$recipeSQL = "SELECT * FROM `blogs` WHERE `blog__id` = $recipeId";
$recipeQuery = mysqli_query($con, $recipeSQL);
$recipeRow = mysqli_fetch_row($recipeQuery);

// Get all columns of current recipe
$blog__id = $recipeRow[0];
$blog__title = $recipeRow[1];
$blog__thumb = $recipeRow[2];
$blog__content = nl2br($recipeRow[3]);
$blog__time = nl2br($recipeRow[4]);
$blog__user__id = $recipeRow[5];
$blog__date = $recipeRow[6];

if (isset($_POST["editRecipeSubmit"]))
{
	// Get data from form
	$blogTitle = strip_tags($_POST["blogTitle"]);
	$blogThumb = $_FILES["blogThumbFileToUpload"]["name"];
	$blogContent = strip_tags($_POST["blogContent"]);
	$blogTime = strip_tags($_POST["blogTime"]);

	$blogThumbLocation = $blog__thumb;
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

	if (strlen($blogTitle) > 2)
	{
		$editRecipeSQL = "UPDATE `blogs`
							SET 
								`blog__title` = '$blogTitle',
								`blog__thumb` = '$blogThumbLocation',
								`blog__content` = '$blogContent',
								`blog__time` = '$blogTime'
							WHERE `blog__id` = $recipeId";
		$editRecipeQuery = mysqli_query($con, $editRecipeSQL);

		/*
		if (empty($blogThumb))
		{
			$blogThumbLocation = $blog__thumb;
		}*/

		// If image is ok, upload
		if ($imageOK == 1)
		{
			move_uploaded_file($blogThumbFileTMP, $blogThumbLocation);
		}

		header("Location: edit-recipe.php?recipe-id=$recipeId");

		$_SESSION["recipe-edited-message"] = "The recipe was edited!";
	}
}

?>

<div class="container" style="margin-top: 150px;">
	<?php if ($sessionUserId == $blog__user__id): ?>
	<?php if (isset($_SESSION["recipe-edited-message"])): ?>
		<div class="alert alert-info alert-dismissable">
			<?php echo $_SESSION["recipe-edited-message"]; ?>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php if (!isset($_POST["editRecipeSubmit"])): ?>
				<?php unset($_SESSION["recipe-edited-message"]); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<h1>Edit <?php echo $blog__title; ?> recipe</h1>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="blogTitle" value="<?php echo $blog__title; ?>" placeholder="Blog title" class="form-control input-lg">
				</div>

				<div class="form-group">
					<textarea name="blogContent" placeholder="Blog content" rows="4" class="form-control"><?php echo $blog__content; ?></textarea>
				</div>

				<div class="form-group">
					<textarea name="blogTime" placeholder="Blog time" rows="4" class="form-control"><?php echo $blog__time; ?></textarea>
				</div>

				<div class="form-group">
					<input type="file" name="blogThumbFileToUpload" class="form-control input-lg">
					<img src="<?php echo $blog__thumb; ?>" height="300" width="300">
				</div>

				<div class="form-group">
					<input type="submit" name="editRecipeSubmit" value="Edit" class="">
				</div>
			</form>
		</div>
	</div>
	<?php else: ?>
		<div  class="alert alert-danger">Do not try to edit other user recipe!!</div>
	<?php endif; ?>
</div>

<?php require "template/footer.php"; ?>