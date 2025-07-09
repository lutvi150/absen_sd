@extends('layout.template')
@section('content')
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <!-- /.card -->
                <div class="card mb-12">
                    <div class="card-header">
                        <h3 class="card-title">Data Kelas</h3> <br>
                        <button class="btn btn-sm btn-success" onclick="show_modal()"><i class="fa fa-pluas"></i> Tambah
                            Kelas</button>
                    </div> <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Kelas</th>
                                    <th>Jumlah Siswa</th>
                                    <th style="width: 40px">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar text-bg-warning" style="width: 70%">
                                            </div>
                                        </div>
                                    </td>
                                    <td> <span class="badge text-bg-warning">70%</span> </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-primary" style="width: 30%">
                                            </div>
                                        </div>
                                    </td>
                                    <td> <span class="badge text-bg-primary">30%</span> </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-success" style="width: 90%">
                                            </div>
                                        </div>
                                    </td>
                                    <td> <span class="badge text-bg-success">90%</span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

{{-- use for modal --}}
<!-- Modal add -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-add-title">Modal title</h5>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="form-add" action="{{route('kelas-add')}}" method="POST">
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                            placeholder="Masukkan Nama Kelas">
                        <span class="e-nama_kelas text-error"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" onclick="store_data()" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        show_modal = () => {
            $('.modal-add-title').text('Tambah Kelas');
            $('#modal-add').modal('show');
        }
        store_data = () => {
            $(".text-error").text('');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $("#form-add").attr('action'),
                data: {
                    nama_kelas: $("#nama_kelas").val(),
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.status) {
                        
                    }
                },
                error: function (response) {
                    
                }
            });
        }
    </script>
    @endsection