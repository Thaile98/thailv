<?php

namespace Modules\Admin\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticle extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'art_name' => 'required|unique:articles,art_name,'.$request->id,
            'art_meta_title' => 'required|max:70|unique:articles,art_meta_title,'.$request->id,
            'art_meta_description' => 'required|max:160|unique:articles,art_meta_description,'.$request->id,
            'art_content' => 'required',
            'art_meta_keyword' => 'required|max:160',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function messages()
    {
        return [
            'art_name.required' => 'Bạn chưa nhập tên bài viết',
            'art_name.unique' => 'Tên bài viết đã tồn tại',
            'art_meta_title.required' => 'Bạn chưa nhập title',
            'art_meta_title.unique' => 'Title đã tồn tại',
            'art_meta_title.max' => 'Độ dài title tối đa là 70 kí tự',
            'art_meta_description.required' => 'Bạn chưa nhập description',
            'art_meta_description.unique' => 'Description đã tồn tại',
            'art_meta_description.max' => 'Độ dài description tối đa là 160 kí tự',
            'art_meta_keyword.required' => 'Bạn chưa nhập keywords',
            'art_meta_keyword.max' => 'Độ dài keyword tối đa là 160 kí tự',
            'art_content.required' => 'Bạn chưa viết nội dung bài viết',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
