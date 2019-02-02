<?php

namespace Modules\Admin\Repositories\Article;

use DB;
use Modules\Admin\Repositories\AdminsEloquentRepository;
use Modules\Admin\Repositories\Article\AdminArticleRepositoryInterface;

class AdminArticleEloquentRepository extends AdminsEloquentRepository implements AdminArticleRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Article\Article::class;
    }

    public function viewAjax(array $data)
    {
        $art = $this->_model->where('id',$data['id'])
                            ->with('author:id,name','article_detail')
                            ->select('id','art_name','art_meta_title','art_meta_keyword','art_meta_description','art_published_at','art_hit_view','art_cat_id','art_author_id')
                            ->first();

        return $art;
    }

    public function getList(array $data)
    {
        $articles = $this->_model->whereRaw(1);

        if(isset($data['art_id']))
        {   
            $articles->where('id',$data['art_id']);
        }
        if(isset($data['art_cat_id']))
        {
            $articles->where('art_cat_id', $data['art_cat_id']);
        }

        if(isset($data['art_author_id']))
        {
            $articles->where('art_author_id', $data['art_author_id']);
        }

        if(isset($data['art_status']))
        {
            $articles->where('art_status','=',$data['art_status']);
        }

        $articles = $articles->with(['author:id,name','article_detail','category:id,cat_name','inspec:id,name'])
                                ->orderBy('id','desc')
                                ->paginate(10);
        return $articles;
    }

    public function save(array $data)
    {
        $file = $data['art_avatar']->getClientOriginalName();

        $this->_model->art_name = $data['art_name'];
        $this->_model->art_cat_id = $data['art_cat_id'];
        $this->_model->art_meta_title = $data['art_meta_title'];
        $this->_model->art_meta_description = $data['art_meta_description'];
        $this->_model->art_meta_keyword = $data['art_meta_keyword'];
        $this->_model->art_avatar = $file;
        $this->_model->art_author_id = getIdAdmin();
        $this->_model->save();

        $article_id = $this->_model->id;

        $article_detail['art_content'] = $data['art_content'];

        $article_detail['art_article_id'] = $article_id;

        DB::table('article_details')->insert($article_detail);

        $data['art_avatar']->move('uploads/article/',$file);

        return $article_id;
    }

    public function edit($id)
    {
        $art = $this->_model->where('id',$id)->with('tags:id,tag_name','article_detail:art_article_id,art_content')->first();

        return $art;
    }

    public function update(array $data,$id)
    {
        $article = $this->_model->findOrFail($id);
        $article->art_name = $data['art_name'];
        $article->art_cat_id = $data['art_cat_id'];
        $article->art_meta_title = $data['art_meta_title'];
        $article->art_meta_description = $data['art_meta_description'];
        $article->art_meta_keyword = $data['art_meta_keyword'];
        $article->art_edited_id = getIdAdmin();

        if($data['update'] === 'update_req_accept')
        {
            $article->art_status = 1;
        }
        if(isset($data['art_avatar']))
        {
            $file = $data['art_avatar']->getClientOriginalName();
            $data['art_avatar']->move('uploads/article/',$file);
            $article->art_avatar = $file;
        }

        $article->save();

        DB::table('article_details')->update(['art_content'=>$data['art_content']]);

        return 1;
    }

    public function accept($id)
    {
        $article = $this->_model->findOrFail($id);
        $article->art_inspec_id = getIdAdmin();
        $article->art_status = 2;
        $article->art_published_at = \Carbon\Carbon::now();
        $article->save();
        return 1;
    }

    public function cancel(array $data)
    {   
        $id = $data['id'];
        $this->_model->where('id',$id)->update(['art_status' => 3]);
        return 1;
    }
}