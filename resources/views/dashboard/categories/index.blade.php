@extends('layouts.dashboard')

@section('title', 'Categories Page')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            @if(session()->has('msgSucAddCate'))
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
        </div>
    </div>
    <div class="row">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Create</a>
        {{-- Table Shows --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Created At</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td> <img src="{{ asset( 'storage/' . $category->image) }}" alt="Image" width="40"> <br> {{ $category->image }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-outline-primary mr-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id ) }}" method="post">
                            @csrf
                            @method('delete')
                            {{-- <input type="hidden" name="_method" value="delete"> --}}
                            <button type="submit" class="btn btn-outline-danger d-inline">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-danger font-italic">No Categories...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
