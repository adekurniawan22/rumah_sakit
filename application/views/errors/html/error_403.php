<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Akses Dilarang 403</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/img/favicon.png" rel="icon">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?php echo base_url() ?>assets/bootstrap/assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
	<main>
		<div class="container">

			<section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
				<h1>403</h1>
				<h2>Akses Dilarang</h2>
				<button class="btn" href="" onclick="goBack()">Kembali</button>
				<img src="<?php echo base_url() ?>assets/bootstrap/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
				<div class="credits">
					<!-- All the links in the footer should remain intact. -->
					<!-- You can delete the links only if you purchased the pro version. -->
					<!-- Licensing information: https://bootstrapmade.com/license/ -->
					<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
					Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
				</div>
			</section>

		</div>
	</main>

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script>
		function goBack() {
			window.history.back();
		}
	</script>

	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/chart.js/chart.umd.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/echarts/echarts.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/quill/quill.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/tinymce/tinymce.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo base_url() ?>assets/bootstrap/assets/js/main.js"></script>

</body>

</html>