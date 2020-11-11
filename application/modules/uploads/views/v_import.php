<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Upload File Excel</a></li>
		<li class="breadcrumb-item active">Upload</li>
	</ol>
	<h1 class="page-header">Upload</b></h1>
	<div class="row">
		<div class="col-xl-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
				<div class="panel-heading">
					<h4 class="panel-title">Upload File Excel</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body panel-form">
					<br>
					<div class="row">
						<div class="col-md-10 offset-1">
							<?php echo $this->session->flashdata("$title") ?>
							<?php echo form_open_multipart("uploads/$title"); ?>
							<div class="form-group">
								<?php if ($title == "pok") { ?>
									<label>UNGGAH 5 FILE EXCEL <?= strtoupper($title); ?> (BIRO I, II, III, IV, PASCA & PROFESI)</label>
								<?php } else { ?>
									<label>UNGGAH FILE EXCEL <?= strtoupper($title); ?></label>
								<?php } ?>
								<span class="ml-2">
									<i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
								</span>
								<?php if ($title == "pok") { ?>
									<input type="file" multiple name="<?= $title; ?>[]" class="form-control">
								<?php } else { ?>
									<input type="file" name="<?= $title; ?>" class="form-control">
								<?php } ?>
							</div>

							<button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP <?= strtoupper($title); ?></button>
						</form>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
</div>