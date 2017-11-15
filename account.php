<?php include('template/header.php'); ?>
	<!-- BEGIN ACCOUNT -->
	<div class="container-fluid">
		<div class="row">
			<div class="user-account-cover"></div>
			<div class="user-account-badge col-sm-12">
				<div class="user-account-avatar col-sm-12">
					<div class="user-account-avatar-wrapper" style="background: url('<?php echo $user__src; ?>');">
						<a href="account-settings.php"><div class="edit-profile"><span class="icon-options"></span></div></a>
					</div><!-- .user-account-avatar-wrapper -->
				</div><!-- .user-account-avatar -->
				
				<div class="user-account-meta col-sm-12">
					<div class="user-account-name"><h3><?php echo $user__alias; ?></h3></div><!-- .user-account-name -->
					<div class="user-account-location"><h4><span class="icon-direction"></span><?php echo $user__location; ?></h4></div><!-- .user-account-location -->
					<div class="user-account-description">
						<p><?php echo $user__description; ?></p>
					</div><!-- .user-account-description -->
				</div><!-- .user-account-meta -->

				<?php 

				// Get blogs of current user
				$blogsSQL = "SELECT * FROM `blogs` WHERE `blog__user__id` = $user__id";
				$blogsQuery = mysqli_query($con, $blogsSQL);
				$nrBlogs = mysqli_num_rows($blogsQuery);

				?>

				<div class="user-account-options col-sm-12">
					<div class="col-sm-12">
						<ul class="user-account-option ">
							<li>
								<a href="add-new-recipe.php">
									<span class="icon-plus"></span>Add new recipe
								</a>
							</li>
							<li><span class="icon-docs"></span><?php echo $nrBlogs; ?> recipes</li>
						</ul>
					</div>
				</div><!-- .user-account-options -->
			</div><!-- .user-account-badge -->
				<div class="col-sm-12">
					<form action="" method="post" enctype="multipart/form-data">
						<input type="file" name="file">
						<input type="submit" name="submit">
					</form>
				</div>
			</div>

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
							<div class="user-feed-item col-md-4 col-sm-6">
								<div class="inner-user-feed-item">
									<div class="user-feed-item-thumbnail" style="background: url('<?php echo $blog__thumb; ?>'); background-size: cover;">
										<div class="inner-user-feed-item-thumbnail"></div>
									</div><!-- .user-feed-item-thumbnail -->
									<div class="user-feed-item-meta">
										<p class="user-feed-item-date">
											<?php echo $blogDateMonth . " " . $blogDateDay; ?>, <?php echo $blogDateYear; ?>
										</p><!-- .user-feed-item-date -->
										
										<h3 class="user-feed-item-title">
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
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .user-feed -->
		</div><!-- .row -->
	</div><!-- .container -->
	<!-- END ACCOUNT -->
<?php include('template/footer.php'); ?>
