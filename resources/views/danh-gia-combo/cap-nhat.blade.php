@extends('layouts')

@section('content')
<div class="container" style="margin-top:50px">
    <div class="card">
        <div class="card-header">
            <h2>Cập Nhật Đánh Giá Combo</h2>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('danhgia.combo.xu-ly-cap-nhat', $danhGia->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="khach_hang_id" class="form-label">Khách Hàng</label>
                    <select class="form-control" name="khach_hang_id">
                        @foreach($khachHangs as $khachHang)
                            <option value="{{ $khachHang->id }}" {{ $khachHang->id == $danhGia->khach_hang_id ? 'selected' : '' }}>{{ $khachHang->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="combo_id" class="form-label">Combo</label>
                    <select class="form-control" name="combo_id">
                        @foreach($combos as $combo)
                            <option value="{{ $combo->id }}" {{ $combo->id == $danhGia->combo_id ? 'selected' : '' }}>{{ $combo->ten_combo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="danh_gia" class="form-label">Đánh Giá</label>
                    <input type="number" class="form-control" name="danh_gia" min="1" max="5" value="{{ $danhGia->danh_gia }}">
                </div>
                <div class="mb-3">
                    <label for="noi_dung" class="form-label">Nội Dung</label>
                    <textarea class="form-control" name="noi_dung" rows="3">{{ $danhGia->noi_dung }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật Đánh Giá</button>
            </form>
        </div>
    </div>
</div>
@endsection