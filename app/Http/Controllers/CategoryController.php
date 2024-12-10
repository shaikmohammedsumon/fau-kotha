<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(3);
        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);



        $manager = new ImageManager(new Driver());

        if($request->hasFile('image')){
            $newNAme = Auth::user()->id.'-'.$request->title.'-'.rand(1111,9999).'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/upload/category/'.$newNAme));

            if($request->slut){

                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->slug,'-'),
                    'image' => $newNAme,
                    'created_at' => now(),
                ]);
                return back()->with('create_category', 'Create Category Succesful');
            }else{
                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->title,'-'),
                    'image' => $newNAme,
                    'created_at' => now(),
                ]);
            }
            return back()->with('create_category', 'Create Category Succesful');

        }else{
           return back();
        }


    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {

        return view('dashboard.category.update' ,compact('category'));
    }

    public function update(Request $request, Category $category)
    {
       if($request->image){
            $oldpath = base_path('public/upload/category/'. $category->image);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }
            $manager = new ImageManager(new Driver());
            $newNAme = Auth::user()->id.'-'.$request->title.'-'.rand(1111,9999).'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/upload/category/'.$newNAme));


            Category::find($category->id)->update([
                'title' => Str::ucfirst($request->title),
                'slug' => Str::slug($request->slug,'-'),
                'image' => $newNAme,
                'updated_at' => now(),
            ]);

            return redirect()->route('category.index')->with('create_category', 'This Create is Update');
       }else{

            Category::find($category->id)->update([
                'title' => Str::ucfirst($request->title),
                'slug' => Str::slug($request->slug,'-'),
                'updated_at' => now(),
            ]);
            return redirect()->route('category.index')->with('create_category', 'This Create is Update');

       }
    }

    public function destroy(Category $category)
    {

        // return $category->image;
        if ($category->image) {
            $oldPath = base_path('public/upload/category/' . $category->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $category->delete(); // সরাসরি মডেল ইনস্ট্যান্স থেকে মুছুন
        return back()->with('create_category', 'Category deleted successfully');
    }



    public function action($id){
        $category = Category::where('id',$id)->first();


        if($category->status == 'deactive'){
            Category::find($category->id)->update([
                'status' => 'active',
            ]);
            return back()->with('create_category', 'This Create is active');
        }else{
            Category::find($category->id)->update([
                'status' => 'deactive',
            ]);
            return back()->with('create_category', 'This Create is deactive');
        }
    }
}
