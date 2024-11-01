@extends('components.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner" x-data="{ formupload: false }">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Menu File Berkas</h3>
                    <h6 class="op-7 mb-2">Jumlah Seluruh Berkas :
                        <span class="badge text-bg-primary">
                            100 File</span>
                    </h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2">Kelola Perusahaan</a>
                    <button x-on:click="formupload = !formupload" class="btn btn-primary btn-round" type="button">
                        <i class="fas fa-plus"></i> Unggah File
                    </button>
                    <a href="#" class="btn btn-primary btn-round">Refresh</a>
                </div>
            </div>
            <div class="row" x-show="formupload" x-transition class="mt-3" x-on:click.outside="formupload = false">
                <div class="col-12 card card-round">
                    <div class="card-body">
                        <form x-data="{ jenisunggahan: '0' }">
                            <div class="mb-2">
                                <button x-on:click="formupload = !formupload" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                                <h5>Menu Unggah File</h5>
                            </div>
                            <div class="mb-2">
                                <label for="perusahaan">Pilih Perusahaan</label>
                                <select name="perusahaan" id="perusahaan" class="form-select" style="width: 100% !important;">
                                    <option value="">=== Cari Perusahaan ===</option>
                                    <option value="PT ABC">PT ABC</option>
                                    <option value="PT CCC">PT CCC</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="jenisunggahan">Jenis Unggahan</label>
                                <select x-on:change="jenisunggahan = $event.target.value" name="jenisunggahan" class="form-select">
                                    <option value="0">File / Berkas</option>
                                    <option value="1">Link Google Drive</option>
                                </select>
                                <small class="text-muted">
                                    Silahkan Gunakan Jenis Unggahan Link Google Drive jika file melebihi
                                    ukuran maksimal
                                </small>
                            </div>
                            <div x-show="jenisunggahan === '0'">
                                <div class="mb-2" x-data="{ files: null, filess: false }">
                                    <label for="file-upload">Pilih File</label>
                                    <input type="file" class="form-control" id="file-upload" enctype="multipart/form-data" multiple
                                        x-on:change="files = Object.values($event.target.files), filess = true">
                                    <span :class="filess ? 'd-block text-bg-success rounded py-2 ps-3 mt-1' : 'd-none'"
                                        x-html="files ?
            files.map(file => '+ '+file.name).join('</br> ')
            : 'Pilh File'"></span>
                                    <small>
                                        Format File : pdf,doc,docx,xls,xlsx,jpg,jpeg,png <br>
                                        Maksimal 10 MB per file<br>
                                    </small>
                                </div>
                                <div>
                                    <div class="text-bg-primary text-center p-1 mb-1 rounded">Harap Tunggu,
                                        Sedang
                                        Memeriksa File...
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                            <div x-show="jenisunggahan === '1'">
                                <div class="mb-2">
                                    <label for="link">Link Google Drive</label>
                                    <input type="text" class="form-control" id="link">
                                    <small class="text-muted">Contoh : https://drive.google.com/file/d/</small>
                                </div>
                            </div>
                            <div class="my-2">
                                <select name="visibilitas" class="form-select text-bg-warning">
                                    <option value="0">Akses Tertutup</option>
                                    <option value="1">Akses Terbuka</option>
                                </select>
                                <small class="text-muted">
                                    Tertutup : Hanya bisa diakses oleh Admin/ Operator |
                                    Terbuka : Bisa diakses tanpa harus Login
                                </small>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Unggah File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-round">
                        <div class="card-header" x-data="{ panduan: false }">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">Daftar File Berkas</div>
                                <div class="card-tools d-flex">
                                    <button x-on:click="panduan = !panduan" class="btn btn-success btn-sm ms-2">
                                        <i class="fas fa-question"></i> Panduan
                                    </button>
                                    <input type="text" class="form-control" placeholder="Cari File...">
                                </div>
                            </div>
                            <div x-show="panduan" x-transition x-on:click.outside="panduan = false">
                                <hr>
                                <h4>Panduan :</h4>
                                <p>
                                    File yang diunggah harus berformat ekstensi :
                                    pdf,doc,docx,xls,xlsx,jpg,jpeg,png,zip,rar <br>
                                    File maksimal 10 MB, lebih dari itu, silahkan gunakan Google Drive, lalu
                                    sertakan link
                                </p>
                            </div>
                            <div class="alert alert-success alert-dismissible fade show mt-2 d-none" role="alert">
                                <strong>Berhasil</strong> File Berhasil Diunggah
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="float-end">
                                                    <span class="btn btn-primary">
                                                        <i class="fa fa-download"> Unduh</i>
                                                    </span>
                                                </div>
                                                Surat Permohonan Izin Usaha
                                                <div class="mt-2">
                                                    <span class="badge text-bg-warning ps-2">
                                                        PT Angkasa Mulia Jaya
                                                    </span>
                                                    <span class="badge text-bg-warning ps-2">PDF
                                                    </span>
                                                    <span class="badge text-bg-warning ps-2">Added by Agri
                                                        Apriliando - 16/10/2024
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="float-end">
                                                    <span class="btn btn-primary">
                                                        <i class="fa fa-download"> Unduh</i>
                                                    </span>
                                                </div>
                                                Surat Permohonan Izin Usaha
                                                <div class="mt-2">
                                                    <span class="badge text-bg-warning ps-2">
                                                        PT Angkasa Mulia Jaya
                                                    </span>
                                                    <span class="badge text-bg-warning ps-2">PDF
                                                    </span>
                                                    <span class="badge text-bg-warning ps-2">Added by Agri
                                                        Apriliando - 16/10/2024
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
