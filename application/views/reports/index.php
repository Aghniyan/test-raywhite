<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row pt-3">
				<div class="col-12">
					<div class="card ">
						<form method="POST" action="<?= base_url() ?>report/index">
							<div class="card-header row">
								<div class="input-group input-group-sm col-md-10 col-sm-6 col-12">
									<div class="input-group-prepend">
										<span class="input-group-text "><i class="fas fa-search"></i></span>
									</div>
									<input type="text" name="search" id="search" class="form-control" style="width:auto" placeholder="Search">
								</div>
								<div class="card-tools ml-auto text-right mr-1" style="width:auto">
									<div id="clear" onclick="document.getElementById('search').value = ''" class="btn btn-sm ">Clear</div>
									<button type="submit" class="btn btn-dark btn-sm">Submit</button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body ">
								<label>Category</label>
								<div class="row">

									<div class="form-group input-group-sm col-md-3 col-sm-6 col-8">
										<select class="form-control" name="category">
											<option value="">Choose One</option>
											<?php foreach ($categories as $key => $category) {
												$selected = '';
												if ($report->category) {
													$selected = ($report->category->id == $category->id) ? 'selected' : '';
												}
											?>
												<option value="<?= $category->id ?>" <?= $selected ?>><?= $category->name ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="ml-auto">
										<a href="<?= base_url('report/index') ?>" class="btn btn-sm">Clear All</a>
									</div>
								</div>

							</div>
						</form>

						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
			<div class="row  ">
				<?php
				foreach ($categories as $key => $category) { ?>
					<div class="col-md-2 col-sm-4 col-6">
						<a href="<?= base_url("report/index?category=$category->slug") ?>" class="info-box">
							<span class="info-box-icon "><img src="<?= base_url('public/') . $category->logo ?>" alt="<?= $category->logo ?>"></span>
							<div class="info-box-content ">
								<span class=""><?= $category->name ?></span>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header ml-auto">
							<a href="<?= base_url("report/add") ?>" class="btn btn-sm btn-primary">Add Report</a>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-head-fixed text-nowrap thead-primary">
								<thead style="background: grey;">
									<tr style="background: grey;">
										<th>Report List</th>
										<th>Category</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($reports as $key => $report) { ?>
										<tr>
											<td><?= $report->name ?></td>
											<td><?= $report->category ? $report->category->name : null ?></td>
											<td>
												<a href="<?= base_url("report/edit/$report->id") ?>" class="btn btn-sm btn-warning">edit</a>
												<a href="<?= base_url("report/delete/$report->id") ?>" class="btn btn-sm btn-danger">delete</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</div>
