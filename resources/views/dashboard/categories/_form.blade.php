{{-- Error Message --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif
{{-- Form --}}
<div class="form-group">
    <label for="name">Name</label>
    <input name="name" type="text" id="name" placeholder="Enter Name" value="{{ old('name', $category->name) }}"
        class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="parent">Parent Gategories</label>
    <select class="form-control" id="parent" name="parent_id">
        <option value="">Primary Gategory</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->parent_id }}" @selected(old('parent_id', $category->parent_id == $parent->id))>{{ $parent->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="desc">Description</label>
    <textarea class="form-control" id="desc" rows="3" name="description" placeholder="Description">{{ $category->description }}</textarea>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
</div>
@if ($category->image)
    <img src="{{ asset('storage/' . $category->image) }}" alt="">
@endif
<div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status1" value="active"
        @checked(old('status', $category->status)== 'active')>
    <label class="form-check-label" for="status1">Active</label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status2" value="archived"
        @checked(old('status', $category->status) == 'archived')>
    <label class="form-check-label" for="status2">Archived</label>
</div>

<button type="submit" class="btn btn-primary">{{ $buttonLable ?? 'Save' }}</button>
{{-- / Form --}}
