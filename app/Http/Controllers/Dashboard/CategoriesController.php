<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest; // Import the CategoryRequest class

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $query = Category::query();
        // dd($request->query());
        // $categories = $query->active()->paginate(5);
        // $categories = Category::active()->status('active')->paginate(5);
        // $categories = Category::status('active')->paginate(5);

        $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
        ->select([
            'categories.*',
            'parents.name as parent_name'
        ])
        ->filter($request->query())
        ->orderBy('categories.name')
        ->paginate(5);

        // $categories = $query->dd();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category();
        return view('dashboard.categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validation
        $request_validate_data = $request->validate(Category::rules(), [
            'name.required' => 'This Filed required',
            'required' => 'This :attribute is required'
        ]);

        // dd($request_validate_data);
        // // Singel Data
        // $request->input('name');
        // $request->post('name');
        // $request->query('name');
        // $request->get('name');
        // $request->name;
        // $request['name'];

        // // Collection of Data
        // $request->all();
        // $request->only(['name', 'id']);
        // $request->except(['image', 'status']);

        // $category = new Category();
        // $category->name = $request->post('name');
        // ...

        // $request = new Category([
        //     'name' => $request->post('name')
        // ]);

        // $category = new Category($request->all());
        // dd($category);

        // Request Merge
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $dataRequest = $request->except('image');
        // Code image in function - i coded his
        $dataRequest['image'] = $this->uploadImage($request);


        // Mass Assignment
        $category = Category::create($dataRequest);
        // return redirect()->route('categories.index');
        return redirect()->route('categories.index')->with('msgSucAddCate', 'Add Category Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // make exception
        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('categories.index')
            ->with('warning', 'Recoed not found!');
        }
        // $category = Category::find($id);
        // $category = Category::findOrFail($id);
        // if(!$category) {
        //     abort(404); => return page Not Found 404
        // }

        // select * from categories where id <> $id
        // AND (parent_id OS NULL OR parent_id <> $id)
        $parents = Category::where('id', '<>', $id)
                    ->where(function($query) use ($id) {
                        $query->whereNull('parent_id')
                        ->orWhere('parent_id', '<>', $id);
                    })
                    // ->dd(); // get query statement
                    ->get();
        // dd($parents);
        // dd($category);
        return view('dashboard.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        // validation
        // $request->validate(Category::rules($id));
        // dd($request);
        $category = Category::findOrFail($id);
        $oldImage = $category->image;
        $dataRequest = $request->except('image');
        $new_image = $this->uploadImage($request);

        if($new_image)
        {
            $dataRequest['image'] = $new_image;
        }

        if($oldImage && $new_image) {
            Storage::disk('public')->delete($oldImage);
        }

        // dd($category);
        $category->update($dataRequest);
        return redirect()->route('categories.index')
                ->with('msgSucUpdateCate', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //1
        // Category::destroy($id);

        // // 2
        $category = Category::findOrFail($id);
        $category->delete();

        if($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // // 3
        // Category::where('id', '=', $id)->delete();
        // Category::delete(); Delete All Recourd

        return Redirect::route('categories.index')
        ->with('msgSucDeleCate', 'Category Deleted!');
    }

    /*
    =================================
    ========== Functions ============
    =================================
    */
    protected function uploadImage(Request $request)
    {
        if(!$request->hasFile('image')) {
            return;
        }

        $file = $request->file('image'); // UploadFile Object
        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        // $path = $file->store('categories', [
        //     'disk' => 'uploads'
        // ]);
        return $path;
    }

}
