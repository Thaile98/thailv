<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use DiDom\Document;
use DiDom\Element;

class JobDataController extends Controller
{
    public function showJobdata()
    {
        $contents = DB::table('job_data_contents')
                        ->join('job_datas', function ($join) {
                            $join->on('job_data_contents.jdc_job_id', '=', 'job_datas.id')
                                ->where('job_datas.site_id', '=', 10 );
                        })
                        ->select('jdc_description','jdc_benefit')->limit(1000)->get();
        $data = [];
        foreach ($contents as $content) {
            try 
            {
                // $content_root = $content->jdc_description;
                $content_root = $content->jdc_benefit;
                $content_transform = $this->getAllConvertDetail($content_root);
                $data[] = [
                    'content_root' => $content_root,
                    'content_transform' => $content_transform,
                ];
            }
            catch(\Exception $e)
            {
                continue;
            }
        }

        $view_data = [
            'data' => $data,
        ];

        return view('frontend.job.job_data')->with($view_data);
    }

    public function replaceTag($str)
    {
        $str = $this->plaintext($str);
        $str = preg_replace('/<div>\s*(<br>)?\s*<\/div>|<p>\s*(<br>)?\s*<\/p>/','',$str);
        $str = preg_replace('/<div>\s*<\/div>|<p>\s*<\/p>|\n/','',$str);
        $str = preg_replace('/•|–/','-',$str);
        $str = preg_replace('/<br>\s*<\/p>/','</p>',$str);
        $str = preg_replace('/<br>\s*<\/div>/','</div>',$str);
        return $str;
    }
    public function getAllConvertDetail($content_root)
    {
        $str = $this->replaceTag($content_root);

        $new_doc = new Document($str);

        $body = $new_doc->first('body');

        // $div = $body->firstChild();

        // dd($body->html());

        $childs = $body->children();

        $childs = array_diff( $childs, array( '' ) );

        $close_ul = true;

        foreach ($childs as $key => $child) {
            // dd($child->html());
            $tag = $this->convertDetail($child);
            if($close_ul===true)
            {
                $ul = new Element('ul');
                $close_ul = false;
            }
            if(gettype($tag)==='object')
            {
                $ul->appendChild($tag);
                if(!empty($childs[$key+1]) && gettype($this->convertDetail($childs[$key+1]))!=='object')
                {
                    $str = str_replace($child->html(),$ul->html(),$str);
                    $close_ul = true;
                }
                else
                {
                    $str = str_replace($child->html(),'',$str);
                }
            }
            else 
            {
                if(empty($ul->text()))
                {
                    $str = str_replace(preg_replace('/\n/','',$child->html()),$tag,$str);
                    $str = str_replace($this->plaintext($child->html()),$tag,$str);
                    $close_ul = true;
                }
                elseif(!empty($ul->text()))
                {
                    $html_rep = $ul->html().$tag;
                    $str = str_replace($child->html(),$html_rep,$str);
                    $close_ul = true;
                }
            }
        }
        return $this->checkLiTag($str);
    }

    public function convertDetail($element)
    {
        $html = preg_replace('/\s+(style|class|href|itemprop|title|id|name|src|start)(=".*?)">/','>',$element->html());
        $html = str_replace('strong','b',$html);
        $text = $element->text();

        if($element->tag === 'p' || $element->tag === 'div')
        {
            $html = preg_replace('/<br><\/p>|<br><\/div>/','</p>',$html);
            if($text==='')
            {
                return null;
            }
            elseif (count($i = $element->find('i')) > 0) 
            {
                return $element->html();
            }
            elseif (count($img = $element->find('p span img')) > 0) 
            {
                return $element->html();
            }
            elseif (preg_match('/<br>/',$html))
            {
                $html = str_replace('<b><br>','<b>',$html);

                $html = preg_replace('/<br>\s*<br>(\s*<br>)*/','<br>',$html);

                $html = preg_replace('/<p>|<div>/','<ul><li class="nc" name="ncp">',$html);

                $html = preg_replace('/<\/p>|<\/div>/','</li></ul>',$html);

                $html = preg_replace('/<br>\s*(\+||[a-z]\.|(?=ca\s*\d+|ca\s))/i','</li><li class="nc" name="nci">',$html);

                $html = preg_replace('/<br>/','</li><li class="nc" name="ncp">',$html);

                $html = preg_replace('/<li class="nc" name="ncp">\s*(?=\d+\s*[.#\/)]|\*(?=[^*]))/','<li class="c">',$html);

                $html = preg_replace('/<li class="nc" name="ncp">(?=\s*\+)/','<li class="nc" name="nci">',$html);

                $html = str_replace('</a>',' </a>',$html);

                $html = preg_replace('/>\s*(\d+\s*[.#\/)]|[-+–✔️*:·#_\/])*\s*/','>',$html);

                return $html;      
            }
            elseif (count($b = $element->find('strong')) > 0 || preg_match('/<p>\s*<em>/',$html))
            {
                // $html = preg_replace('/<\/?b>/','',$html);
                $html = preg_replace('/(?<=<\/|<)p(?=>)|(?<=<\/|<)div(?=>)/','h5',$html);
                return $html;
            }
            elseif(preg_match('/^[\d⟰]/',$text) || in_array($text,$this->setStopKeyList())) 
            {
                $attributes = ["class" => "c"];
                $li = new Element('li',$this->trimText($text),$attributes);
                return $li;
            } 
            elseif (count($spans = $element->find('p span')) > 0) 
            {
                $element_text = $this->trimText($text);
                $element_text = preg_replace('/\d\.\s*/','',$element_text);
                $attributes = ["class" => "nc"];
                $li = new Element('li',$element_text,$attributes);
                return $li;
            }
            elseif (preg_match('/^-+/',$text)) 
            {
                $attributes = ["class" => "nc","name" => "ncp"];
                $li = new Element('li',$this->trimText($text),$attributes);
                return $li;
            }
            elseif (preg_match('/^\+|[a-z][.-\/]/',$text)) 
            {
                $attributes = ["class" => "nc","name" => "nci"];
                $li = new Element('li',$this->trimText($text),$attributes);
                return $li;
            }
            else
            {
                $attributes = ["class" => "c"];
                $li = new Element('li',$this->trimText($text),$attributes);
                return $li;
            }
        }
        if($element->tag === 'ul')
        {
            $html = preg_replace('/<li>\s*[-+]\s*/','<li>',$html);
            return $html;
        }
        if($element->tag === 'ol')
        {
            $html = str_replace('<ol>','<ul>',$html);
            $html = str_replace('</ol>','</ul>',$html);
            return $html;
        }
        if($element->tag === 'b')
        {
            $li = new Element('li',$this->trimText($element->text()));
            return $li;
        }
        return $html;
    }

    public function checkLiTag($tag_html)
    {
        $desc = new Document;
        $desc->loadHtml($tag_html);
        $node = $desc->first('body');
        $node_html = $node->html();
        if(count($uls = $node->find('ul')) > 0)
        {
            foreach ($uls as $ul) {
                $ul_html = $ul->html();
                if(count($li_change = $ul->find('li[class=c]')) >0 && count($li_not_change = $ul->find('li[class=nc]')) >0)
                {
                    foreach ($li_change as $key => $lic) {
                        $new_h5 = new Element('h5',$lic->text());
                        $ul_html = str_replace($lic->html(),'</ul>'.$new_h5->html().'<ul>',$ul_html);
                    }
                    $node_html = str_replace($ul->html(),$ul_html,$node_html);
                }
                elseif(count($li_change = $ul->find('li[class=c]')) >0 && count($li_not_change = $ul->find('li[class=nc]')) ===0)
                {
                    $ul_html = preg_replace('/>\s*\d+(\.|\))/','>',$ul_html);
                    $node_html = str_replace($ul->html(),$ul_html,$node_html);
                }
                if(count($ncp = $ul->find('li[name=ncp]')) > 0 && count($nci = $ul->find('li[name=nci]')))
                {
                    $lis = $ul->find('li');
                    foreach ($lis as $key => $li) {
                        if($li->getAttribute('name') === 'ncp' && !empty($lis[$key+1]) && $lis[$key+1]->getAttribute('name') === 'nci')
                        {
                            $next = $key+1;
                            $ul_nci = new Element('ul');
                            while(!empty($lis[$next]) && $lis[$next]->getAttribute('name') === 'nci')
                            {
                                $node_html = str_replace($lis[$next]->html(),'',$node_html);
                                $li_nci = new Element('li',$lis[$next]->text());
                                $ul_nci->appendChild($li_nci);
                                $next ++;
                            }
                            $li_html = $li->html();
                            $li->appendChild($ul_nci);
                            $node_html = str_replace($li_html,$li->html(),$node_html);
                        }
                    }
                }
                $node_html = preg_replace('/<li class="nc" name="ncp">(<span>|<em>)?<b>|<li>(<span>)?<b>/','</ul><b>',$node_html);
                $node_html = preg_replace('/<\/b>(<\/span>|<\/em>)?<\/li>/','</b><ul>',$node_html);
                $node_html = preg_replace('/<li(\s*class="nc" name="ncp")?>\s*<\/li>/','',$node_html);
                $node_html = preg_replace('/<li class="nc" name="ncp">\s*<\/ul>/','</ul>',$node_html);
                // dump($node_html);
                $node_html = preg_replace('/<ul>\s*<\/ul>|\n\n/','',$node_html);
                $node_html = preg_replace('/<li(\s*class="nc" name="ncp")?>\s*<li(\s*class="nc" name="ncp")?>/','<li>',$node_html);
                $node_html = preg_replace('/<\/b><b>/','</b><br><b>',$node_html);
            }
        }
        // dd($node_html);
        return $node_html;
    }

    public function trimText($text)
    {

        $text = trim($text);
        $text = preg_replace('/^[a-z]*[-o\'+*–•.]*\s*/','',$text);
        return $text;
    }

    public function setStopKeyList()
    {
        $array = ['ĐÀO TẠO','TUYỂN DỤNG','QUẢN LÝ CÁC CÔNG VIỆC HÀNH CHINH',];
        return $array;
    }
    

    public function plaintext($str)
    {
        $str = str_replace(["\xC2\xA0","\xc2\xa0", "\xE2\x80\x80", "\xE2\x80\x81", "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84", "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87", "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A", "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80"], "", $str);
        $str = str_replace(["&nbsp;","&#8203;"], ' ', $str); 
        $str = str_replace('&gt;', '>', $str);
        $str = str_replace('&lt;', '', $str);
        $str = str_replace('&', '', $str);
        $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
        $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
        $str = html_entity_decode($str);
        $str = htmlspecialchars_decode($str);
        $str = trim($str);
        return $str;
    }
}
