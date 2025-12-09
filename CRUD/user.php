<?php include 'partial/header.php'; ?>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <header class="py-12">
                        <h1 class="text-center">Data User</h1>
                        <div class="text-end">
                            <a href="tambah.php" class="btn btn-primary mb-4">Tambah Data</a>
                        </div>
                    </header>
                    <table class="table table-bordered w-100" id="table_user">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    <tbody>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                tampilanData();
                $('#table_user').DataTable();

                function tampilanData() {
                    $.ajax({
                        url: 'user/read.php',
                        method: 'GET',
                        success: function(data) {
                            $('#table_user tbody').html(data);
                        }
                    });
                }
            });
        </script>
<?php include 'partial/footer.php'; ?>