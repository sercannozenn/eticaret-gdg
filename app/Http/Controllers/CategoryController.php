<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        //        $categories = Category::query()->whereNull('parent_id')->get();

        return view('admin.category.create_edit')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->only('name', 'short_description', 'description');

        $slug = Str::slug($request->slug);

        if (is_null($request->slug)) {
            $slug  = Str::slug(mb_substr($data['name'], 0, 70));
            $check = Category::query()->where('slug', $slug)->first();

            if ($check) {
                return redirect()
                    ->back()
                    ->withErrors(['slug' => 'Slug değeriniz boş veya daha önce farklı bir kategori tarafından kullanılıyor olablir.'])
                    ->withInput();
            }
        }

        $data['slug']   = $slug;
        $data['status'] = $request->has('status');
        if ($request->parent_id != -1) {
            $data['parent_id'] = $request->parent_id;
        }

        Category::create($data);

        alert()->success('Başarılı', 'Kategori kaydedildi');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.category.create_edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->only('name', 'short_description', 'description');

        if ($request->parent_id != -1) {
            $data['parent_id'] = $request->parent_id;
        }

        $slug = Str::slug($request->slug);

        if (is_null($request->slug)) {
            $slug  = Str::slug(mb_substr($data['name'], 0, 70));
            $check = Category::query()->where('slug', $slug)->first();

            if ($check) {
                return redirect()
                    ->back()
                    ->withErrors(['slug' => 'Slug değeriniz boş veya daha önce farklı bir kategori tarafından kullanılıyor olablir.'])
                    ->withInput();
            }
        }

        $data['slug']   = $slug;
        $data['status'] = $request->has('status');

        $category->update($data);

        alert()->success('Başarılı', 'Kategori güncellendi');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('Başarılı', 'Kategori silindi');

        return redirect()->back();
    }

    public function front()
    {
        $categories = Category::query()
                              ->with('children')
                              ->whereHas('children')
                              ->whereNull('parent_id')
                              ->get();
        return view('categories', compact('categories'));
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;

        $category = Category::query()->where('id', $id)->first();

        if (is_null($category))
        {
            return response()
                ->json()
                ->setData(['message' => 'Kategori bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }


        $category->status = !$category->status;
        $category->save();

        return response()
            ->json()
            ->setData($category)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }
}
