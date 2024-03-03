    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RSUD Dr. H. ISHAK UMARELLA</span></strong>. All Rights Reserved
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "emptyTable": "Tidak ada data",
                },
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    ["5", "10", "25", "50", "Semua"]
                ],
                "order": [
                    [0, "asc"]
                ],
                language: {
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
            });
        });

        $(document).ready(function() {
            $('#example2').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "emptyTable": "Tidak ada data",
                },
                "lengthChange": false,
                "order": [
                    [0, "asc"]
                ],
                language: {
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
            });
        });



        $(document).ready(function() {
            $('#example3').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "emptyTable": "Tidak ada data",
                },
                "lengthMenu": [
                    [10, 25, 50, -1],
                    ["10", "25", "50", "Semua"]
                ],
                "order": [
                    [0, "asc"]
                ],
                language: {
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
            });
        });

        $(document).ready(function() {
            $('#pendaftaran').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "emptyTable": "Tidak ada data",
                },
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    ["5", "10", "25", "50", "Semua"]
                ],
                "order": [
                    [1, "asc"]
                ],
                language: {
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
            });
        });

        $(document).ready(function() {
            var table = $('#farmasi').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "emptyTable": "Tidak ada data",
                },
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    ["5", "10", "25", "50", "Semua"]
                ],
                "order": [
                    [1, "desc"]
                ],
                language: {
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
            });

            var selectedRowsData = {}; // Object to store data of selected rows
            $('#selectAll').on('click', function() {
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                updateSelectedText();
            });

            // Handle click on checkbox to set "select all" control
            $('#farmasi tbody').on('change', 'input[type="checkbox"]', function() {
                var rowName = $(this).val(); // Menggunakan value sebagai nama obat
                if (this.checked) {
                    selectedRowsData[rowName] = true;
                } else {
                    delete selectedRowsData[rowName];
                }

                if (!this.checked) {
                    var el = $('#selectAll').get(0);
                    if (el && el.checked && ('indeterminate' in el)) {
                        el.indeterminate = true;
                    }
                }
                updateSelectedText();
            });

            // Handle search event
            table.on('search.dt', function() {
                updateSelectedText();
            });

            function updateSelectedText() {
                var selectedText = "<ul>";
                for (var rowName in selectedRowsData) {
                    selectedText += "<li>" + rowName + "</li>";
                }
                selectedText += "</ul>";
                $('#selectedText').html(selectedText);
            }
        });
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