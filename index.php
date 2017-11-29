


<?php include('template/header.php'); ?>

<div class="container" id="page-container">
	<div class="row">
		<div class="col-sm-12">
			<?php 

			// Get blogs of current user
			$blogsSQL = "SELECT * FROM `blogs`";
			$blogsQuery = mysqli_query($con, $blogsSQL);
			$nrBlogs = mysqli_num_rows($blogsQuery);

			?>

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
							<div class="inner-user-feed-item-thumbnail">
								
							</div>
						</div><!-- .user-feed-item-thumbnail -->
						<div class="user-feed__item-meta">
							<p class="user-feed__item-date">
								<?php echo $blogDateMonth . " " . $blogDateDay; ?>, <?php echo $blogDateYear; ?>
							</p><!-- .user-feed-item-date -->
							
							<h3 class="user-feed__item-title">
								<?php echo $blog__title; ?>
							</h3><!-- .user-feed-item-title-->

							<button class="btn btn-md btn-outline">
								<a href="view-recipe.php?recipe-id=<?php echo $blog__id; ?>">
									View Recipe
								</a>
							</button><!-- .btn-outline -->
						</div><!-- .user-feed-item-meta -->
					</div><!-- .inner-user-feed-item -->
				</div><!-- .user-feed-item -->
			<?php endforeach; ?>
		</div><!-- .col-sm-12 -->
	</div><!-- .row -->
</div><!-- .container -->

<?php include('template/footer.php'); ?>