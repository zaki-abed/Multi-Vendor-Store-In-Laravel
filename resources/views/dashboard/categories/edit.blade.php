@extends('layouts.dashboard')

@section('title', 'Edit Page')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Edit Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('categories.update', $category->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- Form --}}
                @include('dashboard.categories._form', [
                    'buttonLable' => 'Update'
                ])
                {{-- / Form --}}
              </form>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('dist/css/style1.css') }}">
@endpush
@push('styles')
<link rel="stylesheet" href="{{ asset('dist/css/style2.css') }}">
@endpush

@push('script')
<script src="{{ asset('dist/js/js1.js') }}"></script>
@endpush
