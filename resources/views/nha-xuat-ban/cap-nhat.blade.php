@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <form action="{{ route('nha-xuat-ban.cap-nhat', $nhaXuatBan->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ten_nha_xuat_ban" class="form-label">Tên nhà xuất bản</label>
                <input type="text" class="form-control" id="ten_nha_xuat_ban" name="ten_nha_xuat_ban" value="{{ $nhaXuatBan->ten_nha_xuat_ban }}">
            </div>
            <div class="mb-3">
                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ $nhaXuatBan->so_dien_thoai }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $nhaXuatBan->email }}">
            </div>
            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ $nhaXuatBan->dia_chi }}">
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3">{{ $nhaXuatBan->mo_ta }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>

@endsection