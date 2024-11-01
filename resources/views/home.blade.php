@extends('components.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner" x-data="{ formupload: false }">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                    <h6 class="op-7 mb-2">Statistik Pendataan Informasi Perusahaan</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2">Kelola Perusahaan</a>
                    <button x-on:click="formupload = !formupload" class="btn btn-primary btn-round" type="button">
                        <i class="fas fa-plus"></i> Unggah
                    </button>
                    <a href="#" class="btn btn-primary btn-round">Daftar File</a>
                </div>
            </div>
            <div class="row" x-cloak x-show="formupload" x-transition class="mt-3" x-on:click.outside="formupload = !formupload">
                <div class="col-12 card card-round">
                    <div class="card-body">
                        <form>
                            <div class="mb-2">
                                <button x-on:click="formupload = !formupload" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                                <h5>Menu Unggah File</h5>
                            </div>
                            <div class="mb-2">
                                <label for="perusahaan">Pilih Perusahaan</label>
                                <select name="perusahaan" id="perusahaan" class="form-select" style="width: 100% !important;">
                                    <option value="PT ABC">PT ABC</option>
                                    <option value="PT CCC">PT CCC</option>
                                </select>
                            </div>
                            <div class="mb-2" x-data="{ files: null, filess: false }">
                                <label for="file-upload">Pilih File</label>
                                <input type="file" class="form-control" id="file-upload" enctype="multipart/form-data" multiple x-on:change="files = Object.values($event.target.files), filess = true">
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
                                <div class="text-bg-primary text-center p-1 mb-1 rounded">Harap Tunggu, Sedang
                                    Memeriksa File...
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Unggah File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Perusahaan</p>
                                        <h4 class="card-title">1,294</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-file"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">File Berkas</p>
                                        <h4 class="card-title">1303</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Admin</p>
                                        <h4 class="card-title">12</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">----</p>
                                        <h4 class="card-title">-----</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-round">
                        <div class="card-body">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">File Baru Ditambahkan</div>
                            </div>
                            <div class="card-list py-4">
                                <div class="item-list">

                                    <div class="info-user ms-3">
                                        <div class="username">Surat Permohonan.pdf</div>
                                        <div class="status">
                                            PT Bahagia Sejahtera Berkat
                                            <br><span class="badge bg-success me-2">10 Menit Lalu</span>
                                            <span class="badge bg-success me-2">oleh Adrian Adrian Adrian</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon btn-link op-8 me-1">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">Daftar Perusahaan</div>
                                <div class="card-tools d-flex">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
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
                                            <th scope="col" class="text-center">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                PT Berkat Sejahtera Abadi <br>
                                                <div class="mt-2">
                                                    <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                    <a href="#" class="btn btn-primary btn-sm">20 File</a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-success ps-2"><i class="fas fa-plus"></i> 16/10/2024</span><br>
                                                <span class="badge badge-success"><i class="fas fa-edit"></i>
                                                    17/10/2024</span>
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
