@extends('layouts')

@section('content')

<div class="card mt-4">
    <div class="card-body">
    <h2 style="margin-bottom: 20px;">CẬP NHẬT TÁC GIẢ</h2>
        <form action="{{ route('tac-gia.xu-ly-cap-nhat', $tacgia->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="sach_id" class="form-label">Sách ID</label>
                <input type="text" class="form-control" id="sach_id" name="sach_id" value="{{ $tacgia->sach_id }}">
            </div>
            <div class="mb-3">
                <label for="ten_tac_gia" class="form-label">Tên tác giả</label>
                <input type="text" class="form-control" id="ten_tac_gia" name="ten_tac_gia" value="{{ $tacgia->ten_tac_gia }}">
            </div>
            <div class="mb-3">
                <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ $tacgia->ngay_sinh }}">
            </div>
            <div class="mb-3">
                <label for="quoc_tich" class="form-label">Quốc tịch</label>
                <input type="text" class="form-control" id="quoc_tich" name="quoc_tich" value="{{ $tacgia->quoc_tich }}">
            </div>
            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ $tacgia->dia_chi }}">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>

@endsection