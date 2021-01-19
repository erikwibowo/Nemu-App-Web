@extends('admin.layout.master')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data User</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data User</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <button class="btn btn-success btn-sm btn-round ml-auto" data-toggle="modal" data-target="#modal-tambah">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable yajra-datatable">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>V</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'verified',
                    name: 'verified'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: true
                },
            ]
        });
    });
    $(document).ready(function() {
        $(document).on("click", '.btn-edit', function() {
            let id = $(this).attr("data-id");
            $('#modal-edit').modal('show');
            $('#modal-edit').modal({
                backdrop: 'static',
                keyboard: false
            });
            $.ajax({
                url: "{{ route('user.data') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $("#nik").val(data.nik);
                    $("#name").val(data.name);
                    $("#email").val(data.email);
                    $("#phone").val(data.phone);
                    $("#address").val(data.address);
                    $("#status").val(data.status);
                    $("#verified").val(data.verified);
                    $("#id").val(data.id);
                },
            });
        });
        $(document).on("click", '.btn-delete', function() {
            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            $("#did").val(id);
            $("#delete-data").html(name);
            $('#modal-delete').modal('show');
            $('#modal-delete').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    });
</script>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="form-group form-floating-label">
                        <input type="text" name="nik" maxlength="16" class="form-control input-border-bottom @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required>
                        <label class="placeholder">NIK</label>
                        @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="text" name="name" class="form-control input-border-bottom @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        <label class="placeholder">Name</label>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="email" name="email" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        <label class="placeholder">Email</label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="text" name="phone" class="form-control input-border-bottom @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                        <label class="placeholder">Phone</label>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <textarea name="address" class="form-control input-border-bottom @error('address') is-invalid @enderror" value="{{ old('address') }}" required></textarea>
                        <label class="placeholder">Address</label>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="password" name="password" class="form-control input-border-bottom" required>
                        <label class="placeholder">Password</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-floating-label">
                        <input type="text" name="nik" id="nik" maxlength="16" class="form-control input-border-bottom @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required>
                        <label class="placeholder">NIK</label>
                        @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="text" name="name" id="name" class="form-control input-border-bottom @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        <label class="placeholder">Name</label>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="email" name="email" id="email" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        <label class="placeholder">Email</label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="text" name="phone" id="phone" class="form-control input-border-bottom @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                        <label class="placeholder">Phone</label>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <textarea name="address" id="address" class="form-control input-border-bottom @error('address') is-invalid @enderror" value="{{ old('address') }}" required></textarea>
                        <label class="placeholder">Address</label>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="password" name="password" class="form-control input-border-bottom">
                        <label class="placeholder">Password</label>
                        <input type="hidden" name="id" id="id">
                        <small id="passwordHelpBlock" class="form-text text-muted">Ketikkan password baru jika ingin mengganti password</small>
                    </div>
                    <div class="form-group form-floating-label">
                        <select class="form-control input-border-bottom" id="status" required name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                        </select>
                        <label for="level" class="placeholder">Status</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <select class="form-control input-border-bottom" id="verified" required name="verified">
                            <option value="1">Verified</option>
                            <option value="0">Non Verified</option>
                        </select>
                        <label for="level" class="placeholder">Verified</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="modal-text">Apakah anda yakin akan menghapus? <b id="delete-data"></b></p>
                    <input type="hidden" name="id" id="did">
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection