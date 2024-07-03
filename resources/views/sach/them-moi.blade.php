@extends('layouts')
@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h3>Thêm mới sách</h3>
        <form method="POST" action="{{ route('sach.xu-ly-them-moi') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="mb-3">
                <label for="loai_sach_id" class="form-label">Loại sách</label>
                <select class="form-select" id="loai_sach_id" name="loai_sach_id" required>
                    <option value="">Chọn loại sách</option>
                    @foreach($loaiSachs as $loaiSach)
                    <option value="{{ $loaiSach->id }}">{{ $loaiSach->ten_loai_sach }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nha_xuat_ban_id" class="form-label">Nhà Xuất Bản</label>
                <select class="form-select" id="nha_xuat_ban_id" name="nha_xuat_ban_id" required>
                    <option value="">Chọn nhà xuất bản</option>
                    @foreach($nhaXuatBans as $nhaXuatBan)
                    <option value="{{ $nhaXuatBan->id }}">{{ $nhaXuatBan->ten_nha_xuat_ban }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ten_sach" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="ten_sach" name="ten_sach" required>
            </div>
            <div class="mb-3">
                <label for="kich_co" class="form-label">Kích cỡ</label>
                <input type="text" class="form-control" id="kich_co" name="kich_co">
            </div>
            <div class="mb-3">
                <label for="can_nang" class="form-label">Cân nặng</label>
                <input type="text" class="form-control" id="can_nang" name="can_nang">
            </div>
            <div class="mb-3">
                <label for="so_trang" class="form-label">Số trang</label>
                <input type="text" class="form-control" id="so_trang" name="so_trang">
            </div>
            <div class="mb-3">
                <label for="ngon_ngu" class="form-label">Ngôn ngữ</label>
                <input type="text" class="form-control" id="ngon_ngu" name="ngon_ngu">
            </div>
            <div class="mb-3">
                <label for="ngay_phat_hanh" class="form-label">Ngày phát hành</label>
                <input type="date" class="form-control" id="ngay_phat_hanh" name="ngay_phat_hanh" required>
            </div>
            <div class="mb-3">
                <label for="gia" class="form-label">Giá</label>
                <input type="text" class="form-control" id="gia" name="gia" required>
            </div>
            <div class="mb-3">
                <label for="gia_sach_dien_tu" class="form-label">Giá sách điện tử</label>
                <input type="text" class="form-control" id="gia_sach_dien_tu" name="gia_sach_dien_tu">
            </div>
            <div class="mb-3">
                <label for="so_luong" class="form-label">Số lượng</label>
                <input type="text" class="form-control" id="so_luong" name="so_luong" required>
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="danh_gia" class="form-label">Đánh giá</label>
                <input type="text" class="form-control" id="danh_gia" name="danh_gia">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection