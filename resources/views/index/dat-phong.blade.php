
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route("admin/phong/dat-phong/save")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="TenKH">Tên Khách Hàng</label>
                        <input type="text" name="TenKH" class="form-control" id="TenKH" aria-describedby="TenKHHelp" placeholder="Enter your name">
                        @if(!empty($errors->first('TenKH')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('TenKH')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="cmnd">CMND</label>
                        <input type="number" name="cmnd" class="form-control" id="cmnd" aria-describedby="cmndHelp" placeholder="Enter your cmnd">
                        @if(!empty($errors->first('cmnd')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('cmnd')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter your phone">
                        @if(!empty($errors->first('phone')))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('phone')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="maphong">Chọn phòng</label>
                        <select class="form-control" name="maphong" id="maphong">
                            @foreach($data as $k => $v)
                                <option value="{{$v->MaPhong}}">Phòng: {{$v->TenPhong}}</option>
                            @endforeach()
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">Đặt phòng</button>
                </form>
            </div>
        </div>
    </div>
</section>