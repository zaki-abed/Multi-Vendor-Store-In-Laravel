@extends('layouts.dashboard')

@section('title', 'Create Page')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Create Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="name">Name</label>
                  <input name="name" type="test" class="form-control" id="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="parent">Parent Gategories</label>
                    <select class="form-control" id="parent" name="parent_id">
                      <option value="">Primary Gategory</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->parent_id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" id="desc" rows="3" name="description" placeholder="Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="active" checked>
                    <label class="form-check-label" for="status1">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="archived">
                    <label class="form-check-label" for="status2">Archived</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
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
