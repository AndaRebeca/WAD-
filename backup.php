
<?php include('template/header.php'); ?>
	<!-- BEGIN ACCOUNT -->
	<div class="container-fluid">
		<div class="row">
			<div class="user-account-cover"></div>
			<div class="user-account-badge col-sm-12">
				<div class="user-account-avatar col-sm-12">
					<div class="user-account-avatar-wrapper">
						<a href="account-settings.php"><div class="edit-profile"><span class="icon-options"></span></div></a>
					</div><!-- .user-account-avatar-wrapper -->
				</div><!-- .user-account-avatar -->
				<div class="user-account-meta col-sm-12">
					<div class="user-account-name"><h3><?php echo $_SESSION["username"]; ?></h3></div><!-- .user-account-name -->
					<div class="user-account-location"><h4><span class="icon-location-pin"></span>Oradea, Romania</h4></div><!-- .user-account-location -->
					<div class="user-account-description">
						<p>Morbi nisl urna, rhoncus quis tincidunt vel, ultrices ut leo. Phasellus porta orci quis gravida suscipit. Proin venenatis ipsum tellus, in scelerisque diam pharetra eget.</p>
					</div><!-- .user-account-description -->
				</div><!-- .user-account-meta -->

				<div class="user-account-options col-sm-12">
					<div class="col-sm-12">
						<ul class="user-account-option ">
							<li><span class="icon-plus"></span>Add new recipe</li>
							<li><span class="icon-docs"></span>38 recipes</li>
						</ul>
					</div>
				</div><!-- .user-account-options -->
			</div><!-- .user-account-badge -->
					<?php 
					$currentUserName = $_SESSION["username"];
					
					$con = mysqli_connect("localhost","root","root","magic_pan");
	
					echo $currentUserNameRow[0];
					
					$q = mysqli_query($con,"SELECT * FROM users WHERE username = '$currentUserName'");
						while($row = mysqli_fetch_assoc($q)){
						echo $row['username'];
						if ($row['avatar'] == ""){
							echo "<img width='100' height='100' src='uploads/default.jpg' alt='Default Profile Pic'>";
						} else {
							echo "<img width='100' height='100' src='uploads/".$row['avatar']."' alt='Profile Pic'>";
						}
						echo "<br>";
					}
					?>
					<?php //echo $_SESSION["username"]; ?>
					<?php //echo $sessionUserName; ?>
					<!-- <div class="col-sm-12">
						<form action="" method="post" enctype="multipart/form-data">
						<input type="file" name="file">
						<input type="submit" name="submit">
					</form> -->

				</div>
			</div>

			<div class="user-feed">
				<div class="container">
					<div class="row">
						<div class="user-feed-item col-sm-4">
							<div class="user-feed-item-thumbnail"></div><!-- .user-feed-item-thumbnail -->
							<div class="user-feed-item-meta">
								<p class="user-feed-item-date">August 17, 2017</p><!-- .user-feed-item-date -->
								<h3 class="user-feed-item-title">Roasted sweet potato, chickpea and kale salad bowls</h3><!-- .user-feed-item-title-->
							</div><!-- .user-feed-item-meta -->
						</div><!-- .user-feed-item -->

						<div class="user-feed-item col-sm-4">
							<div class="user-feed-item-thumbnail"></div><!-- .user-feed-item-thumbnail -->
							<div class="user-feed-item-meta">
								<p class="user-feed-item-date">August 17, 2017</p><!-- .user-feed-item-date -->
								<h3 class="user-feed-item-title">Roasted sweet potato, chickpea and kale salad bowls</h3><!-- .user-feed-item-title-->
							</div><!-- .user-feed-item-meta -->
						</div><!-- .user-feed-item -->

						<div class="user-feed-item col-sm-4">
							<div class="user-feed-item-thumbnail"></div><!-- .user-feed-item-thumbnail -->
							<div class="user-feed-item-meta">
								<p class="user-feed-item-date">August 17, 2017</p><!-- .user-feed-item-date -->
								<h3 class="user-feed-item-title">Roasted sweet potato, chickpea and kale salad bowls</h3><!-- .user-feed-item-title-->
							</div><!-- .user-feed-item-meta -->
						</div><!-- .user-feed-item -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .user-feed -->
		</div><!-- .row -->
	</div><!-- .container -->
	<!-- END ACCOUNT -->
<?php include('template/footer.php'); ?>
