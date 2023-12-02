    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RSUD Dr. H. ISHAK UMARELLA</span></strong>. All Rights Reserved
        </div>
    </footer>

    <script>
        // Fungsi untuk mengubah teks menjadi tengah dalam kolom (header dan data)
        function centerTextInColumn(tableSelector, columnIndex) {
            const table = new simpleDatatables.DataTable(tableSelector);

            // Mengubah gaya CSS pada elemen <th> (header kolom)
            const th = document.querySelector(`${tableSelector} thead th:nth-child(${columnIndex + 1})`);
            th.style.textAlign = 'center';

            // Mengubah gaya CSS pada elemen <td> (data sel)
            const cells = document.querySelectorAll(`${tableSelector} tbody tr td:nth-child(${columnIndex + 1})`);
            cells.forEach(function(cell) {
                cell.style.textAlign = 'center';
            });
        }
    </script>

    <!-- Vendor JS Files -->
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