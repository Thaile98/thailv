<?php

namespace App\Models\Category;
use DB;
use Illuminate\Database\Eloquent\Model;

class CategoryMutilple extends Model
{
	public $timestamp = true;

    public function articles()
    {
    	return $this->hasMany(\App\Models\Article\Article::class,'art_cat_id');
    }

    public function saveNewCategory($cat)	
    {
        $file = $cat->file('cat_avatar')->getClientOriginalName();
        $this->cat_name = $cat->cat_name; 
        $this->cat_parent_id = $cat->cat_parent_id; 
        $this->cat_rank = $cat->cat_rank; 
        $this->cat_slug = str_slug($cat->cat_name); 
        $this->cat_meta_title = $cat->cat_meta_title;
        $this->cat_meta_description = $cat->cat_meta_description;
        $this->cat_meta_keyword = $cat->cat_meta_keyword;
        $this->cat_avatar = $file;
        $this->cat_type = $cat->cat_type;
        $this->cat_status = $cat->cat_status;
        $this->save();
        $cat->file('cat_avatar')->move('uploads/category/',$file);
        return 1;
    }

    public function updateCategory($cat,$id)	
    {
        $file = $cat->file('cat_avatar')->getClientOriginalName();
        $cate = CategoryMutilple::findOrFail($id);
        $cate->cat_name = $cat->cat_name; 
        $cate->cat_parent_id = $cat->cat_parent_id; 
        $cate->cat_rank = $cat->cat_rank; 
        $cate->cat_slug = str_slug($cat->cat_name); 
        $cate->cat_meta_title = $cat->cat_meta_title;
        $cate->cat_meta_description = $cat->cat_meta_description;
        $cate->cat_meta_keyword = $cat->cat_meta_keyword;
        $cate->cat_avatar = $file;
        $cate->cat_type = $cat->cat_type;
        $cate->cat_status = $cat->cat_status;
        $cate->save();
        $cat->file('cat_avatar')->move('uploads/category/',$file);
    	return 1;
    }
}
