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

        function rightTextInColumn(tableSelector, columnIndex) {
            const table = new simpleDatatables.DataTable(tableSelector);

            // Mengubah gaya CSS pada elemen <th> (header kolom)
            const th = document.querySelector(`${tableSelector} thead th:nth-child(${columnIndex + 1})`);
            th.style.textAlign = 'right';

            // Mengubah gaya CSS pada elemen <td> (data sel)
            const cells = document.querySelectorAll(`${tableSelector} tbody tr td:nth-child(${columnIndex + 1})`);
            cells.forEach(function(cell) {
                cell.style.textAlign = 'right';
            });
        }

        function leftTextInColumn(tableSelector, columnIndex) {
            const table = new simpleDatatables.DataTable(tableSelector);

            // Mengubah gaya CSS pada elemen <th> (header kolom)
            const th = document.querySelector(`${tableSelector} thead th:nth-child(${columnIndex + 1})`);
            th.style.textAlign = 'left';

            // Mengubah gaya CSS pada elemen <td> (data sel)
            const cells = document.querySelectorAll(`${tableSelector} tbody tr td:nth-child(${columnIndex + 1})`);
            cells.forEach(function(cell) {
                cell.style.textAlign = 'left';
            });
        }
    </script>
    <!-- <script>
        function formatAngka(inputElement) {
            // Mengambil nilai dari input
            let inputValue = inputElement.value;

            // Memeriksa apakah nilai input kosong atau tidak angka
            if (inputValue.trim() === '' || isNaN(parseFloat(inputValue))) {
                // Jika kosong atau bukan angka, keluar dari fungsi
                return;
            }

            // Menghapus tanda koma (,) dan titik (.) dari nilai input jika ada
            inputValue = inputValue.replace(/[,\.]/g, '');

            // Mengubah nilai menjadi format ribuan, puluhan ribu, ratusan ribu, dll.
            let formattedValue = parseFloat(inputValue).toLocaleString('id-ID');

            // Menetapkan nilai yang telah diformat ke input
            inputElement.value = formattedValue;
        }
    </script> -->


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