<?php
    isset($data->MaPhong)       ? $id           = $data->MaPhong    : $id           = '';
    isset($data->TenPhong)      ? $ten          = $data->TenPhong   : $ten          = '';
    isset($data->GiaPhong)      ? $gia          = $data->GiaPhong   : $gia          = '';
    isset($data->LoaiPhong)     ? $loaiphong    = $data->LoaiPhong  : $loaiphong    = '';
    isset($data->HinhAnh)       ? $hinhanh      = $data->HinhAnh    : $hinhanh      = '';
    isset($data->KieuPhong)     ? $KieuPhong    = $data->KieuPhong  : $KieuPhong    = '';
    isset($data->TrangThai)     ? $TrangThai    = $data->TrangThai  : $TrangThai    = '';
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route("admin/phong/check")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="roomName">Tên Phòng</label>
                        <input value="{{$ten}}" type="text" name="nameRoom" class="form-control" id="roomName" aria-describedby="nameRoomHelp" placeholder="Enter your room name">
                        @if(!empty($errors->first('nameRoom')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('nameRoom')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="priceName">Giá Phòng</label>
                        <input value="{{$gia}}" type="number" name="priceRoom" class="form-control" id="priceName" aria-describedby="priceRoomHelp" placeholder="Enter your room price">
                        @if(!empty($errors->first('priceRoom')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('priceRoom')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="speciesRoom">Kiểu phòng</label>
                        <select class="form-control" name="speciesRoom" id="speciesRoom">
                            <option value="1">Phòng vip</option>
                            <option value="2" @if(2 == $loaiphong) selected @endif>Phòng thường</option>
                        </select>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="imgRoom" class="custom-file-input" id="chooseImg">
                        @if(!empty($errors->first('image')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('image')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="typeRoom">Loại phòng</label>
                        <select class="form-control" name="typeRoom" id="typeRoom">
                            <option value="1">Phòng đơn</option>
                            <option value="2" @if(2 == $KieuPhong) selected @endif>Phòng đôi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="statusRoom">Trạng thái</label>
                        <select class="form-control" name="statusRoom" id="statusRoom">
                            <option value="1">Sẵn sàng</option>
                            <option value="2" @if(2 == $TrangThai) selected @endif>Đã được đặt</option>
                            <option value="3" @if(3 == $TrangThai) selected @endif>Đang sửa</option>
                        </select>
                    </div>
                    @if('' === $id)
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    @else
                        <input value="{{$id}}" type="hidden" name="id" class="form-control" id="id" aria-describedby="id">
                        <button type="submit" class="btn btn-warning">Sửa</button>
                    @endif

                </form>
            </div>
        </div>
    </div>
</section>