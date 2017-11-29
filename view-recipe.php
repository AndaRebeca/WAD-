<?php include('template/header.php'); ?>
<?php 

// Get a current recipe ID
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

// Users
$userSQL = "SELECT * FROM `users` WHERE `id` = $blog__user__id";
$userQuery = mysqli_query($con, $userSQL);
$userRow = mysqli_fetch_row($userQuery);

$user__id = $userRow[0];
$user__name = $userRow[1];

$blogDateArr1 = explode (" ", $blog__date);
$blogDate1 = $blogDateArr1[0];

$blogDateArr2 = explode ("-", $blogDate1);

$blogDateYear = $blogDateArr2[0]; // Year
$blogDateMonth = $blogDateArr2[1]; // Month
$blogDateDay = $blogDateArr2[2]; // Day

$monthArr = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

if (substr($blogDateMonth, 0, 1) == "0")
{
	$blogDateMonth = substr($blogDateMonth, 1, 1);
}

$blogDateMonth = $monthArr[$blogDateMonth];

?>

<!-- BEGIN SINGLE PAGE CONTAINER -->
<div class="single-page-container">
	<div class="container-fluid no-padding">
		<div class="single-page-thumbnail" style="background: url('<?php echo $blog__thumb; ?>');"></div><!-- .single-page-thumbnail -->
	</div><!-- .container-fluid -->

	<div class="container">
		<div class="row">
			<div class="single-page-header">
				<!--<h3 class="single-page-date">September 20, 2017</h3>--><!-- .single-page-date -->
				<h3 class="single-page-date"><?php echo $blogDateMonth . " " . $blogDateDay; ?>, <?php echo $blogDateYear; ?></h3><!-- .single-page-date -->
				<h1 class="single-page-title"><?php echo $blog__title; ?></h1><!-- .single-page-title -->
				<h4 class="single-page-post-author">Posted by <?php echo $user__name; ?></h4> <!-- .single-page-post-author -->

				<?php if ($sessionUserId == $user__id): ?>
					<a href="edit-recipe.php?&amp;recipe-id=<?php echo $recipeId; ?>" class="btn btn-edit">
						<span class="icon-pencil"></span> Edit
					</a>
					<a href="delete-recipe.php?&amp;recipe-id=<?php echo $recipeId; ?>" class="btn btn-edit">
						<span class="icon-trash"></span> Delete
					</a>
				<?php endif; ?>
			</div><!-- .single-page-header -->
			<div class="single-page-entry-content col-sm-8 col-sm-offset-2">
				<?php if (strlen($blog__thumb) > 14): ?>
					<h2>Recipe image</h2>
					<img src="<?php echo $blog__thumb; ?>" height="200" width="200">
				<?php endif; ?>

				<h2>Recipe content</h2>
				<p><?php echo $blog__content; ?></p>

				<h2>Recipe time</h2>
				<p><?php echo $blog__time; ?></p>
			</div><!-- .single-page-entry-content -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .view-recipe-container -->
<!-- END SINGLE PAGE CONTAINER -->
<?php include('template/footer.php'); ?>