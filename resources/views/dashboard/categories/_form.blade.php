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
    {{-- Componet: input --}}
    <x-form.input type="text" class="form-control form-control-lg" data-id="zaki" id="Category_Name" label="Category Name" name="name" value="{{ $category->name }}" />
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
    <x-form.label for="desc">Description</x-form.label>
    <x-form.textarea id="desc" name="description" :value="$category->description" />
</div>

<div class="form-group">
    <x-form.label for="image">Image</x-form.label>
    <x-form.input type="file" class="form-control-file" id="image" label="Category Name" name="image" accept="image/*" />

</div>
@if ($category->image)
    <img src="{{ asset('storage/' . $category->image) }}" alt="">
@endif
{{-- <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status1" value="active"
        @checked(old('status', $category->status)== 'active')>
    <label class="form-check-label" for="status1">Active</label>
</div> --}}

    <x-form.radio name="status" :checked="$category->status" :options="['active' => 'Active', 'archived' => 'Archived']"/>
{{-- <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status2" value="archived"
        @checked(old('status', $category->status) == 'archived')>
    <label class="form-check-label" for="status2">Archived</label>
</div> --}}

<button type="submit" class="btn btn-primary">{{ $buttonLable ?? 'Save' }}</button>
{{-- / Form --}}
