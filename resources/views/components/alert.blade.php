


@if (session()->has('msgSucAddCate'))
    <div class="alert alert-success" role="alert">{{ session('msgSucAddCate') }}</div>
@endif

@if(session()->has('msgSucUpdateCate'))
<div class="alert alert-success" role="alert">{{ session('msgSucUpdateCate') }}</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning" role="alert">{{ session('warning') }}</div>
@endif

@if(session()->has('msgSucDeleCate'))
<div class="alert alert-success" role="alert">{{ session('msgSucDeleCate') }}</div>
@endif
