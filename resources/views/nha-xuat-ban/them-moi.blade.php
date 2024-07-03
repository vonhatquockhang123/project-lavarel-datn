@extends('layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Thêm mới nhà xuất bản</h3>
            <form method="POST" action="{{ route('nha-xuat-ban.xu-ly-them-moi') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ten_nha_xuat_ban">Tên nhà xuất bản</label>
                        <input type="text" class="form-control" id="ten_nha_xuat_ban" name="ten_nha_xuat_ban" value="{{ old('ten_nha_xuat_ban') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="so_dien_thoai">Số điện thoại</label>
                        <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dia_chi">Địa chỉ</label>
                        <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ old('dia_chi') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="mo_ta">Mô tả</label>
                        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3" required>{{ old('mo_ta') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection