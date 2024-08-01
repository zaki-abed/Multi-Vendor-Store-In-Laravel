@extends('layouts.dashboard')

@section('title', 'Create Page')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Create Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Form --}}
                @include('dashboard.categories._form', [
                    'buttonLable' => 'Create'
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
