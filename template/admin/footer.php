<footer class="footer">
	<div class="container-fluid">
		<div class="row text-muted">
			<div class="col-6 text-start">
				<p class="mb-0">
					<a class="text-muted" href="" target="_blank"><strong><?php echo clean($site_name); ?></strong></a>
					&copy; <?php echo date('Y'); ?>
				</p>
			</div>
			<div class="col-6 text-end">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a class="text-muted" href="" target="_blank"></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/app.js"></script>
<!-- Toastr Notifications JS-->
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="../assets/js/dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/custom.js"></script>
<?php include_once('../config/notifications.php'); ?>
</body>

</html>