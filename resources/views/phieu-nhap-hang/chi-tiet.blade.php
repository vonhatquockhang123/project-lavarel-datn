@extends('layouts')

@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h3 class="card-title">Thêm chi tiết phiếu nhập hàng</h3>
        <form action="{{ route('phieu-nhap-hang.chi-tiet.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            
            <div class="form-group">
                <label for="phieu_nhap_sach_id">Mã phiếu nhập sách</label>
                <select class="form-control" id="phieu_nhap_sach_id" name="phieu_nhap_sach_id" required>
                    @foreach($list_of_phieu_nhap_sach as $id => $phieu_nhap_sach_id)
                        <option value="{{ $id }}">{{ $phieu_nhap_sach_id }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="sach_id">Tên sách</label>
                <select class="form-control" id="sach_id" name="sach_id" required>
                    @foreach($list_of_books as $book)
                        <option value="{{ $book->id }}">{{ $book->ten_sach }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="combo_id">Tên combo</label>
                <select class="form-control" id="combo_id" name="combo_id">
                    @foreach($list_of_combos as $combo)
                        <option value="{{ $combo->id }}">{{ $combo->ten_combo }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="gia_nhap">Giá nhập</label>
                <input type="number" class="form-control" id="gia_nhap" name="gia_nhap" required>
            </div>
            
            <div class="form-group">
                <label for="gia_ban">Giá bán</label>
                <input type="number" class="form-control" id="gia_ban" name="gia_ban" required>
            </div>
            
            <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="number" class="form-control" id="so_luong" name="so_luong" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm chi tiết</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h3 class="card-title">Chi tiết phiếu nhập hàng</h3>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã phiếu nhập sách</th>
                        <th>Tên sách</th>
                        <th>Tên combo</th>
                        <th>Giá nhập</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th> <!-- Thêm cột thao tác -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($phieuNhapHang->chiTietPhieuNhap as $ctPhieuNhap)
                    <tr>
                        <td>{{ $ctPhieuNhap->id }}</td>
                        <td>{{ $ctPhieuNhap->phieu_nhap_sach_id }}</td>
                        <td>{{ optional($ctPhieuNhap->sach)->ten_sach ?? 'N/A' }}</td>
                        <td>{{ optional($ctPhieuNhap->combo)->ten_combo ?? 'N/A' }}</td>
                        <td>{{ $ctPhieuNhap->gia_nhap }}</td>
                        <td>{{ $ctPhieuNhap->gia_ban }}</td>
                        <td>{{ $ctPhieuNhap->so_luong }}</td>
                        <td>
                            <form action="{{ route('phieu-nhap-hang.chi-tiet.xoa', $ctPhieuNhap->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection