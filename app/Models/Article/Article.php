<?php

namespace App\Models\Article;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;
use Modules\Admin\Models\Tag;
class Article extends Model
{
    use Notifiable;

    protected $timestamp = true;

    protected $fillable = [
        'art_status','updated_at','art_published_at',
    ];

    public function setValue($key,$date)
    {
        $value = [
            1 => [
                    'class' => 'label-warning',
                    'status' => 'Yêu cầu duyệt',
                    'date' => $date
                ],
            2 => [
                    'class' => 'label-info',
                    'status' => 'Đã duyệt',
                    'date' => $date
                ],
            3 => [
                    'class' => 'label-danger',
                    'status' => 'Hủy duyệt',
                    'date' => $date,
                ],
            4 => [
                    'class' => 'label-danger',
                    'status' => 'Chưa hoàn thành',
                    'date' => $date
                ],
        ];
        return $value[$key];
    }

    public function getValue()
    {
        if($this->art_status === 2)
        {
            return $this->setValue($this->art_status,$this->art_published_at);
        }
        else
        {
            return $this->setValue($this->art_status,$this->updated_at);
        }
    }

    public function author()
    {
        return $this->belongsTo(\App\Models\Admin::class,'art_author_id');
    }

    public function inspec()
    {
        return $this->belongsTo(\App\Models\Admin::class,'art_inspec_id');
    }

    public function article_detail()
    {
        return $this->hasOne(\App\Models\Article\ArticleDetail::class,'art_article_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category\CategoryMutilple::class,'art_cat_id');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class,'articles_tags');
    }
}
