<?php

namespace Modules\Admin\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\UpdateArticle;
use Illuminate\Routing\Controller;
use App\Models\Tag;
use Modules\Admin\Repositories\Article\AdminArticleRepositoryInterface;

class ArticleController extends Controller
{

    protected $AdminArticleRepositoryInterface;

    public function __construct(AdminArticleRepositoryInterface $AdminArticleRepositoryInterface)
    {
        $this->AdminArticleRepositoryInterface = $AdminArticleRepositoryInterface;
    }

    public function viewAjax(Request $request)
    {
        $art = $this->AdminArticleRepositoryInterface->viewAjax($request->all());
        return $art;
    }

    public function getList(Request $request)
    {
        $admins     = DB::table('admins')->select('id','name')->get();
        $categories = DB::table('category_mutilples')->where('cat_parent_id',1)
                                                    ->select('id','cat_name')
                                                    ->get();

        $articles = $this->AdminArticleRepositoryInterface->getList($request->all());

        $viewData = 
        [
            'articles'   => $articles,
            'categories' => $categories,
            'admins'     => $admins,
            'quering'    => $request->query(),
        ];

        return view('admin::article.list_article',$viewData);
    }

    public function create()
    {
        $categories = DB::table('category_mutilples')->where('cat_parent_id',1)->select('id','cat_name')->get();

        return view('admin::article.create_edit',compact('categories'));
    }

    public function store(Request $request)
    {
        
        $article_id = $this->AdminArticleRepositoryInterface->save($request->all());

        if($request['hidden-art_tags'])
        {
            $tags = explode(',',$request['hidden-art_tags']);
            foreach ($tags as $key => $tag) {
                if($id = Tag::where('tag_slug',str_slug($tag))->select('id')->first())
                {
                    DB::table('articles_tags')->insert(['article_id'=>$article_id,'tag_id'=>$id->id]);
                }
                else
                {
                    $new_tag = [];
                    $new_tag['tag_name'] = $tag;
                    $new_tag['tag_slug'] = str_slug($tag);
                    $tag_id = Db::table('tags')->insertGetId($new_tag);
                    DB::table('articles_tags')->insert(['article_id'=>$article_id,'tag_id'=>$tag_id]);
                }
            }
            
        }
        
        if($request->create === "create_review")
        {
            return redirect()->route('get.article.edit',['id'=>$article_id])->with('success',"Tạo bài viết thành công! Vui lòng xem lại trước khi yêu cầu duyệt!");
        }
        else
        {
            return redirect()->back()->with('success',"Tạo bài viết thành công! Bài viết của bạn hiện chưa có trong danh sách chờ duyệt!");
        }
    }

    public function edit($id)
    {
        $art = $this->AdminArticleRepositoryInterface->edit($id);

        $categories = DB::table('category_mutilples')->where('cat_parent_id',1)->select('id','cat_name')->get();

        $viewData = 
        [
            'art'   => $art,
            'categories' => $categories,
        ];
        

        return view('admin::article.create_edit',$viewData);
    }

    public function update(UpdateArticle $art,$id)
    {
        $this->AdminArticleRepositoryInterface->update($art->all(),$id);

        DB::table('articles_tags')->where('article_id',$id)->delete();
        
        if($art['art_tags'])
        {
            $tags = explode(',',$art['art_tags']);
            $tags = array_filter( $tags );
            foreach ($tags as $key => $tag) {
                if($tag_id = Tag::where('tag_slug',str_slug($tag))->select('id')->first())
                {
                    DB::table('articles_tags')->insert(['article_id'=>$id,'tag_id'=>$tag_id->id]);
                }
                else
                {
                    $new_tag = [];
                    $new_tag['tag_name'] = $tag;
                    $new_tag['tag_slug'] = str_slug($tag);
                    $tag_id = Db::table('tags')->insertGetId($new_tag);
                    DB::table('articles_tags')->insert(['article_id'=>$id,'tag_id'=>$tag_id]);
                }
            }
            
        }
        elseif ($art['hidden-art_tags']) 
        {
            $tags = explode(',',$art['hidden-art_tags']);
            $tags = array_filter( $tags );
            foreach ($tags as $key => $tag) {
                if($tag_id = Tag::where('tag_slug',str_slug($tag))->select('id')->first())
                {
                    DB::table('articles_tags')->insert(['article_id'=>$id,'tag_id'=>$tag_id->id]);
                }
                else
                {
                    $new_tag = [];
                    $new_tag['tag_name'] = $tag;
                    $new_tag['tag_slug'] = str_slug($tag);
                    $tag_id = Db::table('tags')->insertGetId($new_tag);
                    DB::table('articles_tags')->insert(['article_id'=>$id,'tag_id'=>$tag_id]);
                }
            }
        }

        if($art->update === 'update')
        {
            return redirect()->back()->with('success',"Sửa bài viết thành công");
        }
        elseif ($art->update === 'update_preview')
        {
            return redirect()->route('bai-viet',['id'=>$id]);
        }
        elseif ($art->update === 'update_req_accept')
        {
            return redirect()->back()->with('success',"Sửa bài viết thành công. Bài viết của bạn đã được đưa vào danh sách bài viết cần duyệt!");
        }
    }

    public function delete($id)
    {
        $this->AdminArticleRepositoryInterface->delete($id);

        DB::table('article_details')->where('art_article_id',$id)->delete();

        return redirect()->back()->with('success',"Xóa bài viết thành công");
    }

    public function searchTag(Request $request)
    {
        $tags = Tag::where('tag_name', 'like', '%' . $request->get('query') . '%')->pluck('tag_name')->toArray();
        return response($tags);
    }

    public function accept($id)
    {
        $this->AdminArticleRepositoryInterface->accept($id);

        return redirect()->back()->with('success','Duyệt bài viết thành công!');
    }

    public function cancel(Request $request)
    {
        $this->AdminArticleRepositoryInterface->cancel($request->all());

        if($request->art_cancel_comment)
        {
            DB::table('article_details')->where('art_article_id',$request->id)->update(['art_cancel_comment' => $request->art_cancel_comment]);
        }

        return response()->json(['success'=>'Hủy duyệt bài viết thành công!']);
    }
}
