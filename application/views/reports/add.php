<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row pt-3">
				<div class="col-12">
					<div class="card">
						<!-- /.card-header -->
						<form method="POST" action="<?= base_url() ?>report/store">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Report Name</label>
									<input type="text" class="form-control" id="name" name="name" required placeholder="Enter name...">
								</div>
								<div class="form-group">
									<select class="form-control" name="category_id" required>
										<option value="">Choose Category..</option>
										<?php foreach ($categories as $key => $category) { ?>
											<option value="<?= $category->id ?>"><?= $category->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary"></input>
							</div>
						</form>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</div>
