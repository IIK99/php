<?php include 'partial/header.php'; ?>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <header class="py-12">
                        <h1 class="text-center">Data User</h1>
                        <div class="text-end">
                            <button id="addBtn" class="btn btn-primary mb-4">Tambah Data</button>
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
        
        <!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalAddLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalAddLabel">Tambah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="userForm">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" id="simpanBtn" class="btn btn-primary">Simpan Data</button>
                                <button type="button" id="ubahData" class="btn btn-success" style="display:none;">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                tampilanData();

                $('#table_user').DataTable();

                $('#addBtn').click(function() {
                    $('#ModalAddLabel').text('Tambah Data User');
                    $('#ModalAdd').modal('show');
                    $('#userForm')[0].reset();
                    $('#user_id').val('');
                    $('#simpanBtn').show();
                    $('#ubahData').hide();
                });

                $('#simpanBtn').click(function(e) {
                    var formData = $('#userForm').serialize();
                    e.preventDefault();
                    
                    if($('#username').val() == '' || $('#password').val() == '') {
                        alert('Semua field harus diisi!');
                        return;
                    }

                    $.ajax({
                        url: 'user/add.php',
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            $('#ModalAdd').modal('hide');
                            tampilanData();
                            alert('Data berhasil disimpan!');
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat menyimpan data.');
                        }
                    });
                });

                $('#table_user').on('click', '.editBtn', function() {
                    var userId = $(this).data('id');
                    $.ajax({
                        url: 'user/get.php',
                        method: 'GET',
                        data: { user_id: userId },
                        dataType: 'json',
                        success: function(response) {
                            if (response.error) {
                                alert(response.error);
                            } else {
                                $('#ModalAddLabel').text('Ubah Data User');
                                $('#ModalAdd').modal('show');
                                $('#user_id').val(response.user_id);
                                $('#username').val(response.username);
                                $('#password').val(response.password);
                                $('#simpanBtn').hide();
                                $('#ubahData').show();
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengambil data.');
                        }
                    });
                });

                $('#ubahData').click(function(e) {
                    var formData = $('#userForm').serialize();
                    e.preventDefault();
                    $.ajax({
                        url: 'user/update.php',
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            $('#ModalAdd').modal('hide');
                            tampilanData();
                            alert('Data berhasil diupdate!');
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengupdate data.');
                        }
                    });
                });

                $('#table_user').on('click', '.deleteBtn', function() {
                    var userId = $(this).data('id');
                    if (confirm('Apakah anda yakin menghapus data ini?')) {
                        $.ajax({
                            url: 'user/delete.php',
                            method: 'POST',
                            data: { user_id: userId },
                            success: function(response) {
                                tampilanData();
                                alert('Data berhasil dihapus!');
                            },
                            error: function() {
                                alert('Terjadi kesalahan saat menghapus data.');
                            }
                        });
                    }
                });

                function tampilanData() {
                    $.ajax({
                        url: 'user/read.php',
                        method: 'GET',
                        success: function(data) {
                            if ($.fn.DataTable.isDataTable('#table_user')) {
                                $('#table_user').DataTable().destroy();
                            }
                            
                            $('#table_user tbody').html(data);
                            
                            $('#table_user').DataTable();
                        }
                    });
                }
            });
        </script>
<?php include 'partial/footer.php'; ?>