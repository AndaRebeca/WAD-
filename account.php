<?php include('template/header.php'); ?>

<?php 

/***  Displaying posts for logged in user ***/
$blogsSQL = "SELECT * FROM `blogs` WHERE `blog__user__id` = $user__id";
$blogsQuery = mysqli_query($con, $blogsSQL);
$nrBlogs = mysqli_num_rows($blogsQuery);

?>
<!-- BEGIN ACCOUNT -->
<div class="container-fluid" id="page-container">
	<div class="row">
		<div class="user-account__cover"></div><!-- .user-account__cover -->
		<div class="user-account__badge col-sm-12">
			<div class="user-account__avatar col-sm-12">
				<div class="user-account__avatar-wrapper" style="background: url('<?php echo $user__src; ?>');">
					<a href="account-settings.php"><div class="edit-profile"><span class="icon-options"></span></div></a>
				</div><!-- .user-account__avatar-wrapper -->
			</div><!-- .user-account__avatar -->
			
			<div class="user-account__meta col-sm-12">
				<div class="user-account__name"><h3><?php echo $user__alias; ?></h3></div><!-- .user-account-name -->
				<div class="user-account__location"><h4><span class="icon-direction"></span><?php echo $user__location; ?></h4></div><!-- .user-account__location -->
				<div class="user-account__description">
					<p><?php echo $user__description; ?></p>
				</div><!-- .user-account__description -->
			</div><!-- .user-account__meta -->

			<div class="user-account__options col-sm-12">
				<div class="user-account__option-wrap col-sm-12">
					<ul class="user-account__option ">
						<li><a href="add-new-recipe.php"><span class="icon-plus"></span>Add new recipe</a></li>
						<li><span class="icon-docs"></span><?php echo $nrBlogs; ?> Recipes</li>
					</ul><!-- .user-account__option -->
				</div><!-- .user-account__option-wrap -->
			</div><!-- .user-account__options -->
		</div><!-- .user-account-badge -->

		<?php if (isset($_SESSION["recipe-deleted-message"])): ?>
			<div class="alert alert-danger alert-dismissable">
				<?php echo $_SESSION["recipe-deleted-message"]; ?>
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php unset($_SESSION["recipe-deleted-message"]); ?>
			</div>
		<?php endif; ?>

		<div class="user-feed">
			<div class="container">
				<div class="row">
					<?php foreach ($blogsQuery as $blog): ?>
						<?php 

						$blog__id = $blog["blog__id"];
						$blog__title = $blog["blog__title"];
						$blog__thumb = $blog["blog__thumb"];
						$blog__date = $blog["blog__date"];

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
						<div class="user-feed__item col-md-4 col-sm-6">
							<div class="inner-user-feed-item">
								<div class="user-feed__item-thumbnail" style="background: url('<?php echo $blog__thumb; ?>'); background-size: cover;">
									<div class="inner-user-feed-item-thumbnail"></div>
								</div><!-- .user-feed__item-thumbnail -->
								<div class="user-feed__item-meta">
									<p class="user-feed__item-date">
										<?php echo $blogDateMonth . " " . $blogDateDay; ?>, <?php echo $blogDateYear; ?>
									</p><!-- .user-feed__item-date -->
									
									<h3 class="user-feed__item-title">
										<?php echo $blog__title; ?>
									</h3><!-- .user-feed__item-title-->

									<button class="btn btn-md btn-outline"><a href="view-recipe.php?recipe-id=<?php echo $blog__id; ?>">View Recipe</a></button><!-- .btn-outline -->
								</div><!-- .user-feed__item-meta -->
							</div><!-- .inner-user-feed-item -->
						</div><!-- .user-feed__item -->
					<?php endforeach; ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .user-feed -->
	</div><!-- .row -->
</div><!-- .container -->
<!-- END ACCOUNT -->

<?php include('template/footer.php'); ?>
