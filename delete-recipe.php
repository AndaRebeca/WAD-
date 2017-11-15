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

if (isset($_POST["deleteRecipeSubmit"]))
{
	$deleteRecipeSQL = "DELETE FROM `blogs` WHERE `blog__id` = $recipeId";
	$deleteRecipeQuery = mysqli_query($con, $deleteRecipeSQL);

	header("Location: account.php");

	$_SESSION["recipe-deleted-message"] = "The recipe was deleted!";
}

?>

<div class="container" style="margin-top: 150px;">
	<h1>Delete <?php echo $blog__title; ?></h1>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form action="" method="post" onSubmit="return confirm('Are you sure you want to delete the <?php echo $blog__title; ?> recipe?')">
				<div class="form-group">
					<input type="submit" name="deleteRecipeSubmit" value="Delete recipe" class="">
				</div>
			</form>
		</div>
	</div>
</div>

<?php require "template/footer.php"; ?>