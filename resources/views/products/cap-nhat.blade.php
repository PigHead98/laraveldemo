<?php
    isset($data->MaDV)          ? $id           = $data->MaDV               : $id                 = '';
    isset($data->TenDV)         ? $ten          = $data->TenDV              : $ten                = '';
    isset($data->Gia)           ? $gia          = $data->Gia                : $gia                = '';
    isset($data->TrangThai)     ? $TrangThai    = $data->TrangThai          : $TrangThai          = '';
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route("admin/dich-vu/check")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nameProduct">Tên Sản Phẩm</label>
                        <input value="{{$ten}}" type="text" name="nameProduct" class="form-control" id="nameProduct" aria-describedby="nameProductHelp" placeholder="Enter your product name">
                        @if(!empty($errors->first('nameProduct')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('nameProduct')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="priceProduct">Giá Sản Phẩm</label>
                        <input value="{{$gia}}" type="number" name="priceProduct" class="form-control" id="priceProduct" aria-describedby="priceProductHelp" placeholder="Enter your product price">
                        @if(!empty($errors->first('priceProduct')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('priceProduct')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="statusRoom">Trạng thái</label>
                        <select class="form-control" name="statusRoom" id="statusRoom">
                            <option value="1">Sẵn sàng</option>
                            <option value="2" @if(2 == $TrangThai) selected @endif>Đã hết</option>
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