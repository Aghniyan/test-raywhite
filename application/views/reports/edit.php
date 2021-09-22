<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row pt-3">
				<div class="col-12">
					<div class="card">
						<!-- /.card-header -->
						
						<div class="card-header">
							<a href="<?= base_url("report/index") ?>" class="btn btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
						</div>
						<form method="POST" action="<?= base_url() ?>report/update">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Report Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter name..." value="<?= $report->name ?>">
								</div>
								<div class="form-group">
									<select class="form-control" name="category_id">
										<option value="">choose category..</option>
										<?php foreach ($categories as $key => $category) { ?>
											<option value="<?= $category->id ?>" <?= $report->category ? $report->category->id == $category->id ? 'selected' : '' : '' ?>><?= $category->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<input type="hidden" class="form-control" name="id" value="<?= $report->id ?>">
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
