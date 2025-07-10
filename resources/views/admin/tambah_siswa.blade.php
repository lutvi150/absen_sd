@extends('layout.template')
@section('content')
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Data Siswa</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form>
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="email" class="form-control" id="nama_siswa" aria-describedby="emailHelp">
                                <span class="text-error e-nama_siswa"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Jenis Kelamin</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis_siswa" aria-describedby="emailHelp">
                                <span class="text-error e-nis_siswa"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat_siswa" aria-describedby="emailHelp">
                                <span class="text-error e-alamat_siswa"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Kelas</label>
                                <select name="" class="form-control" id="">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                <span class="text-error e-alamat_siswa"></span>
                            </div>
                        </div>
                </div>
                <!--end::Body-->
                </form>
                <!--end::Form-->
            </div>
            <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-danger card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Data Orang Tua Laki-laki</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form>
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Orang Tua Laki-laki</label>
                                <input type="email" class="form-control" id="nama_orang_tua_lk"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-nama_orang_tua_lk"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan_orang_tua_lk"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-pekerjaan_orang_tua_lk"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat_orang_tua_lk"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-alamat_orang_tua_lk"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telp_orang_tua_lk"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-no_telp_orang_tua_lk"></span>
                            </div>
                        </div>
                </div>
                <!--end::Body-->
                </form>
                <!--end::Form-->
            </div>
            <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-danger card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Data Siswa</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form>
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Orang Tua Perempuan</label>
                                <input type="email" class="form-control" id="nama_orang_tua_pr"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-nama_orang_tua_lk"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan_orang_tua_pr"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-pekerjaan_orang_tua_lk"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat_orang_tua_pr"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-alamat_orang_tua_lk"></span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telp_orang_tua_pr"
                                    aria-describedby="emailHelp">
                                <span class="text-error e-no_telp_orang_tua_lk"></span>
                            </div>
                        </div>
                </div>
                <!--end::Body-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Quick Example-->

            <!--end::Horizontal Form-->
        </div>
    </div>
    <!--end::Row-->
</div>
<!--end::Container-->
</div>
@endsection