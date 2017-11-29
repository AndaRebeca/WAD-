<?php include('template/header.php'); ?>
	<div class="account-settings-wrapper container-fluid no-padding">
		<div class="user-account__cover"></div><!-- user-account-cover -->
		<div class="container">
			<div class="row">
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
				<div class="col-sm-12">
					<div class="user-avatar__set col-sm-12">
						<div class="user-account__avatar col-sm-12">
							<div class="user-account__avatar-wrapper" id="user-edit-avatar" style="background: url('<?php echo $user__src; ?>');"></div>
							<div class="user-account__update-avatar">
								<div class="btn-edit-avatar-wrap">
									<button class="btn-edit-avatar">Change picture</button>
								</div><!-- .btn-edit-avatar-wrap -->
								<div class="col-sm-12">
									<!-- <form action="" method="post" enctype="multipart/form-data">
										<input type="file" name="file">
										<input type="submit" name="submit">
									</form> -->
								</div>
							</div><!-- .user-account__update-avatar -->
						</div><!-- .user-account__avatar -->
					</div><!-- .user-avatar__set -->

					<div class="user-account__badge col-sm-12" id="user-edit-badge">
							<div class="user-account__meta col-sm-12">
								<div class="user-account__name"><h3><?php echo $user__alias;  ?></h3></div><!-- .user-account__name -->
								<div class="user-account__location"><h4><span class="icon-location-pin"></span><?php echo $user__location; ?></h4></div><!-- .user-account__location -->
								<div class="user-account__description">
									<p><?php echo $user__description; ?></p>
								</div><!-- .user-account__description -->
							</div><!-- .user-account__meta -->
						</div><!-- .user-account__badge -->
				</div>
				<div class="account-settings__panel col-sm-12">

					<form action="" method="post" class="form-settings__panel col-sm-8 col-sm-offset-2">
						<div class="section-heading">
							<h1><span class="icon-pencil"></span>Account settings</h1>
						</div><!-- .section-heading -->

						<div class="form-group">
							<label>Name</label>
							<input type="text" name="userAlias" placeholder="Name" value="<?php echo $user__alias; ?>">
						</div><!-- .form-group -->

						<div class="form-group">
							<label>Location</label>
							<input type="text" name="userLocation" placeholder="Location" value="<?php echo $user__location; ?>">
						</div><!-- .form-group -->

						<div class="form-group">
							<label>Description</label>
							<textarea name="userDescription" placeholder="Description"><?php echo $user__description; ?></textarea>
						</div><!-- .form-group -->

						<div class="form-group">
							<input type="submit" id="account-settings-save" name="edit_user_submit" value="Save">
						</div><!-- .form-group -->
					</form><!-- .form-settings__panel -->
				</div><!-- .account-settings__panel -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .account-settings-wrapper -->
<?php include('template/footer.php'); ?>