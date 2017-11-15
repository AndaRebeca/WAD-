<?php include('template/header.php'); ?>
	<div class="account-settings-wrapper container-fluid no-padding">
		<div class="user-account-cover"></div>
		<div class="user-account-badge col-sm-12">
			<div class="user-account-avatar col-sm-12">
				<div class="user-account-avatar-wrapper" style="background: url('<?php echo $user__src; ?>');">
					
				</div><!-- .user-account-avatar-wrapper -->
			</div><!-- .user-account-avatar -->
			<div class="user-account-meta col-sm-12">
				<div class="user-account-name"><h3><?php echo $user__alias;  ?></h3></div><!-- .user-account-name -->
				<div class="user-account-location"><h4><span class="icon-location-pin"></span><?php echo $user__location; ?></h4></div><!-- .user-account-location -->
				<div class="user-account-description">
					<p><?php echo $user__description; ?></p>
				</div><!-- .user-account-description -->
			</div><!-- .user-account-meta -->
		</div><!-- .user-account-badge -->
		<div class="container">
			<div class="row">
				<!-- <div class="page-header col-sm-8 col-sm-offset-2">
					<h4><span class="icon-settings page-header-icon"></span> Edit Account</h4>
				</div> --><!-- .page-header -->

				<?php 

				// Update user data SQL

				if (isset($_POST["edit_user_submit"]))
				{
					$userAlias = mysqli_real_escape_string($con, strip_tags($_POST["userAlias"]));
					$userLocation = mysqli_real_escape_string($con, strip_tags($_POST["userLocation"]));
					$userDescription = mysqli_real_escape_string($con, strip_tags($_POST["userDescription"]));

					$editUserSQL = "UPDATE users
								SET
									alias = '$userAlias',
									location = '$userLocation',
									description = '$userDescription'
								WHERE id = $user__id";
					$editUserQuery = mysqli_query($con, $editUserSQL);

					//echo "<div class='alert alert-success'>OK!</div>";

					header("location: account-settings.php");
				}


				?>
				<div class="account-settings-panel">
					<form action="" method="post" class="form-settings-panel col-sm-8 col-sm-offset-2">
						<div class="form-group">
							<label>Change your name</label>
							<input type="text" name="userAlias" placeholder="Name" value="<?php echo $user__alias; ?>">
						</div><!-- .form-group -->

						<div class="form-group">
							<label>Set up your location</label>
							<input type="text" name="userLocation" placeholder="Location" value="<?php echo $user__location; ?>">
						</div><!-- .form-group -->

						<div class="form-group">
							<label>Tell people about yourself</label>
							<textarea name="userDescription" placeholder="Description"><?php echo $user__description; ?></textarea>
						</div><!-- .form-group -->

						<div class="form-group">
							<input type="submit" name="edit_user_submit" value="Update profile">
						</div><!-- .form-group -->
					</form><!-- .form-settings-panel -->
				</div><!-- .account-settings-panel -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .account-settings-wrapper -->
<?php include('template/footer.php'); ?>