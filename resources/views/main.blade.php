<!DOCTYPE html>
<html>
@include('layouts.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.header')
    @include('layouts.main-sidebar')
{{--    body--}}
    @include('layouts.layout')
    @include('layouts.footer')
    @include('layouts.asides')
    <div class="control-sidebar-bg"></div>

</div>
@include('layouts.script')
</body>
</html>
