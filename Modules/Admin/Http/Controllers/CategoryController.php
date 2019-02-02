<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category\CategoryMutilple;
use App\Models\Article\Article;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CategoryController extends Controller
{
    use ValidatesRequests;
    
    public function viewDetailCategory($id)
    {
        $category = CategoryMutilple::findOrFail($id);
        $articles = Article::where('art_cat_id',$id)->with('admin:id,name')->paginate(10);
        $most_view_articles = Article::orderBy('art_hit_view','desc')->limit(10)->get();
        // dd($category);
        $view_data = [
            "articles" => $articles,
            "category" => $category,
            "most_view_articles" => $most_view_articles,
        ];
        return view('frontend.category.category_detail',$view_data);
    }

    public function create()
    {
        $categories = DB::table('category_mutilples')->get();
        return view('admin::category.create_category',compact('categories'));
    }

    public function save(Request $cat)
    {
        $this -> validate($cat,[
            'cat_name' => 'required|unique:category_mutilples,cat_name',  
            'cat_meta_title' => 'required|unique:category_mutilples,cat_meta_title|max:70',
            'cat_meta_description' => 'required|unique:category_mutilples,cat_meta_description|max:200|min:160',
            'cat_meta_keyword' => 'required',
            'cat_avatar' => 'required',     
        ],
        [
            'cat_name.required' => 'Bạn chưa nhập tên danh mục',
            'cat_name.unique' => 'Tên danh mục đã tồn tại',
            'cat_meta_title.required' => 'Bạn chưa nhập title',
            'cat_meta_title.unique' => 'Title đã tồn tại',
            'cat_meta_title.max' => 'Độ dài title tối đa là 70 kí tự',
            'cat_meta_description.required' => 'Bạn chưa nhập description',
            'cat_meta_description.unique' => 'Description đã tồn tại',
            'cat_meta_description.max' => 'Độ dài description tối đa là 200 kí tự',
            'cat_meta_description.min' => 'Độ dài description tối thiểu là 160 kí tự',
            'cat_meta_keyword.required' => 'Bạn chưa nhập keywords',
            'cat_avatar.required' => 'Bạn chưa chọn avatar',
        ]);
        $new = new CategoryMutilple;
        $new->saveNewCategory($cat);
        return redirect()->back()->with('success',"Tạo danh mục ".$cat->cat_name." thành công"); 
    }

    public function edit($id)
    {
        $categories = DB::table('category_mutilples')->whereNotIn('id',[$id])->get();
        $cat = CategoryMutilple::findOrFail($id);
        return view('admin::category.edit_category',compact('cat','categories'));
    }

    public function update(Request $cat,$id)
    {
        $this -> validate($cat,[
            'cat_name' => 'required|unique:category_mutilples,cat_name,'. $id,  
            'cat_meta_title' => 'required|max:70|unique:category_mutilples,cat_meta_title,'. $id,
            'cat_meta_description' => 'required|max:200|min:160|unique:category_mutilples,cat_meta_description,'. $id,
            'cat_meta_keyword' => 'required',
            'cat_avatar' => 'required',     
        ],
        [
            'cat_name.required' => 'Bạn chưa nhập tên danh mục',
            'cat_name.unique' => 'Tên danh mục đã tồn tại',
            'cat_meta_title.required' => 'Bạn chưa nhập title',
            'cat_meta_title.unique' => 'Title đã tồn tại',
            'cat_meta_title.max' => 'Độ dài title tối đa là 70 kí tự',
            'cat_meta_description.required' => 'Bạn chưa nhập description',
            'cat_meta_description.unique' => 'Description đã tồn tại',
            'cat_meta_description.max' => 'Độ dài description tối đa là 200 kí tự',
            'cat_meta_description.min' => 'Độ dài description tối thiểu là 160 kí tự',
            'cat_meta_keyword.required' => 'Bạn chưa nhập keywords',
            'cat_avatar.required' => 'Bạn chưa chọn avatar',
        ]);
        $new = new CategoryMutilple;
        $new->updateCategory($cat,$id);
        return redirect()->back()->with('success',"Sửa danh mục ".$cat->cat_name." thành công"); 
    }

    public function delete($id)
    {
        $cat = CategoryMutilple::findOrFail($id)->delete();
        return redirect()->back()->with('success',"Xóa danh mục thành công");
    }
}
