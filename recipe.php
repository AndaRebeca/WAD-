<?php include('template/header.php'); ?>
<div class="recipe-container">
	<div class="user-account-cover"></div>
	<div class="container">
		<div class="row">
			<div class="page-header">
				<h1>Add a new recipe</h1>
			</div><!-- .page-header -->

			<div class="col-sm-12">
				<form action="" method="post" class="form-settings-panel col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<label>Name your recipe</label>
						<input type="text" name="userAlias" placeholder="Name" value="<?php echo $user__alias; ?>">
					</div><!-- .form-group -->

					<div class="form-group">
						<label>Recipe created on</label>
						<input type="text" name="userLocation" placeholder="Location" value="<?php echo $user__location; ?>">
					</div><!-- .form-group -->

					<div class="form-group">
						<label>Write your recipe</label>
						<textarea name="userDescription" placeholder="Description"><?php echo $user__description; ?></textarea>
					</div><!-- .form-group -->

					<div class="form-group">
						<input type="submit" name="edit_user_submit" value="Create recipe">
					</div><!-- .form-group -->
				</form><!-- .form-settings-panel -->
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .recipe-container -->
<?php include('template/footer.php'); ?>