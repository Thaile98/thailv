<?php

namespace App\Http\Controllers;
use App\Models\Job\Job;
use App\Models\Job\JobType;
use App\Models\Job\Location;
use App\Models\Job\Career;
use Illuminate\Http\Request;
use DB;
use DiDom\Document;
use DiDom\Element;
class JobController extends Controller
{
    public function showJobInSearchJob()
    {
    	$job_types = JobType::with('jobs')->get();
    	$careers = Career::with('jobs')->limit(10)->get();
    	$locations = Location::where('id','<=',10)->with('jobs')->get();
    	$jobs = Job::orderBy('id','DESC')->with('job_detail','career','job_type','job_level','location','job_web_root')->paginate(10);
    	return view('frontend.job.search_job',compact('jobs','job_types','locations','careers'));
    }

    public function getLinkJobGo()
    {
    	$links = [
    		"https://jobsgo.vn/viec-lam/chuyen-vien-phan-tich-va-dao-tao-tai-chinh-1556329927.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/nhan-vien-data-entry-nhap-du-lieu-website-1669782472.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-sale-admin-van-phong-1679029771.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-hanh-chinh-nhan-su-1679640826.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/viec-lam-thuc-tap-nhan-vien-marketing-intern-1679111245.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/chuyen-vien-tai-chinh-1555270765.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/chuyen-vien-chinh-phe-duyet-tin-dung-ban-le-rb-msb-ha-noi-1530081720.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/chuyen-vien-tuyen-dung-va-dao-tao-giang-vien-quoc-te-1521214633.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/icheck-chuyen-vien-cham-soc-khach-hang-1692595192.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/sale-admin-1699316797.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/tro-ly-giam-doc-1699018059.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-telesales-chuyen-vien-cskh-1688575808.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/nhan-vien-cham-soc-khach-hang-1706309982.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/chuyen-vien-tu-van-cham-soc-khach-hang-quan-cau-giay-1547327050.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/nhan-vien-hanh-chinh-nhan-su-1701435121.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/giao-vien-mam-non-giao-tiep-tieng-anh-1623111449.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/nhan-vien-hanh-chinh-nhan-su-1690531184.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-hanh-chinh-nhan-su-1679640826.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/chuyen-vien-hanh-chinh-nhan-su-tong-hop-1596387977.html?utm_source=indeed&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-hanh-chinh-nhan-su-1637233609.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-ban-hang-tai-cua-hang-1576494742.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed",
    		"https://jobsgo.vn/viec-lam/admin-phong-mua-hang-hn-1702915232.html?utm_source=indeed&utm_medium=paid&utm_source=Indeed&utm_medium=organic&utm_campaign=Indeed%E2%80%A8",
    		"https://jobsgo.vn/viec-lam/nhan-vien-giup-viec-nha-theo-gio-ca-1717499078.html?utm_source=indeed&utm_medium=premium&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed"
    	];
    	return $links;
    }

    public function getLinkCareerLink()
    {
    	$links = [
    		"https://www.careerlink.vn/tim-viec-lam/nhan-vien-admin-phong-mua-hang-hn/1367478",
    		"https://www.careerlink.vn/tim-viec-lam/nhan-vien-mua-hang-xuat-nhap-khau/1370143",
    		"https://www.careerlink.vn/tim-viec-lam/chuyen-vien-hanh-chinh-nhan-su/1369308",
    		"https://www.careerlink.vn/tim-viec-lam/nhan-vien-admin-phong-mua-hang/1355744"
    	];
    	return $links;
    }

    public function showJobDetail1()
    {
    	$contentJobGo = [];
    	foreach ($this->getLinkJobGo() as $link) {
	    	$content = $this->getInfoJobGo($link);
	    	$content_transform = '';
	    	$content_root = '';
	    	foreach ($content as $key => $item) {
	    		$content_root .= $item->html();
	    		if($item->tag === 'h4')
	    		{
	    			$p = new Element('p');
	    			$b = new Element('b',$item->text());
	    			$p->appendChild($b);
	    			$content_transform .= $p->html();
	    		} 
	    		elseif($item->tag === 'p')
	    		{
	    			$content_transform .= $item->text();
	    		}
	    		elseif($item->tag === 'div')
	    		{
	    			$content_transform .= $this->getAllConvertDetail($item);
	    		}
	    	}
	    	$contentJobGo[] = [
	    		'content_root' => $content_root,
	    		'content_transform' => $content_transform,
	    	];
    	}

    	$contentCareerLink = [];
    	foreach ($this->getLinkCareerLink() as $link) {
	    	$content = $this->getInfoCareerLink($link);
	    	$content_transform = '';
	    	$content_root = '';
	    	foreach ($content as $key => $item) {
	    		$content_root .= $item->html();
	    		if($item->tag === 'h4')
	    		{
	    			$p = new Element('p');
	    			$b = new Element('b',$item->text());
	    			$p->appendChild($b);
	    			$content_transform .= $p->html();
	    		} 
	    		elseif($item->tag === 'p')
	    		{
	    			$content_transform .= $item->text();
	    		}
	    		elseif($item->tag === 'div')
	    		{
	    			$content_transform .= $this->getAllConvertDetail($item);
	    		}
	    	}
	    	$contentCareerLink[] = [
	    		'content_root' => $content_root,
	    		'content_transform' => $content_transform,
	    	];
    	}

    	$view_data = [
    		'contentJobGo' => $contentJobGo,
    		'contentCareerLink' => $contentCareerLink,
    	];

    	return view('frontend.job.job_detail')->with($view_data);
    }

    public function showJobDetail()
    {
        $str = $this->createHtml(); 
        return $this->getAllConvertDetail($str);
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
    public function getAllConvertDetail($str)
    {
        $str = $this->replaceTag($str);
        // dd($str);
        $new_doc = new Document($str);

        $body = $new_doc->first('body');

        $div = $body->firstChild();

        $childs = $div->children();

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
            elseif(preg_match('/^[\d⟰]/',$text) || in_array($text,$this->setStopWordList())) 
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
            elseif (preg_match('/^\+/',$text)) 
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
        $text = preg_replace('/^\s*[a-z]*[-o\'+*–•.]*\s*/','',$text);
        return $text;
    }

    public function setStopWordList()
    {
        $array = ['ĐÀO TẠO','TUYỂN DỤNG','QUẢN LÝ CÁC CÔNG VIỆC HÀNH CHINH',];
        return $array;
    }
    

    public function plaintext($str)
    {
        $str = str_replace(["\xC2\xA0","\xc2\xa0", "\xE2\x80\x80", "\xE2\x80\x81", "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84", "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87", "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A", "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80"], "", $str);
        $str = str_replace(["&nbsp;","&#8203;"], ' ', $str); 
        $str = str_replace('&gt;', '>', $str);
        $str = str_replace('&', '', $str);
        $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
        $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
        $str = html_entity_decode($str);
        $str = htmlspecialchars_decode($str);
        $str = trim($str);
        return $str;
    }


    public function createHtml()
    {
    	$html = '<div class=""><p>- Mức lương cạnh tranh, trao đổi khi phỏng vấn.<br>
- Được đào tạo kiến thức sản phẩm, kỹ năng bán hàng.<br>
- Được làm việc trong môi trường năng động, chuyên nghiệp.<br>
- Có cơ hội trở thành quản lý siêu thị / cửa hàng.<br>
* Địa điểm làm việc: <br>
1. Siêu thị Tmart 36 Phùng Hưng, Hà Đông, Hà Nội<br>
2. Siêu thị TMART xala Hesmico: Tầng 1, Tòa nhà Hemisco, Phường Phúc La, Quận Hà Đông, TP Hà Nội<br>
3. Siêu thị TMART Dương Nội: Tầng 1, tòa nhà The Spark CT7K, KĐT mới Dương Nội, Phường Dương Nội, Quận Hà Đông, TP Hà Nội<br>
4. Siêu thị TMART Văn Khê: Tòa CT3 KĐT mới Văn Khê, Phường la Khê, Quận Hà Đông, TP Hà Nội<br>
5. Siêu thị TMART XALA 2: Dịch vụ 03, Tòa nhà CT1, CT2 KĐT Xa La, Phường Phúc La, Quận Hà Đông, TP Hà Nội<br>
6. Siêu thị TMART Ngô Thì Nhậm: Tầng 1, tòa nhà CT1 chung cư Ngô Thì Nhậm, <br>
phường Hà Cầu, Quận Hà Đông, TP Hà Nội<br>
7. Siêu Thị T-mart  Vương Thừa Vũ , Thanh Xuân, Hà Nội <br>
8. Siêu Thị T-mart Đại Từ , Hoàng Mai, Hà Nội <br>
9. Siêu Thị  T-mart Thanh Liệt , Thanh Trì , Hà Nội<br>
10. Siêu Thị T-mart Cổ Nhuế, Bắc Từ Liêm , Hà Nội<br>
11. Siêu Thị T-mart C2 Xuân Đỉnh, Bắc Từ Liêm, Hà Nội<br>
12. Siêu Thị T-mart Tân Tây Đô, Huyện Đan Phượng, Hà Nội<br>
13. Siêu Thị T-Mart 72 Lĩnh Nam, Hoàng Mai, Hà Nội<br>
14. Siêu Thị T-Mart Nguyễn Hữu Thọ , Hoàng Mai, Hà Nội <br>
15. Siêu Thị T-Mart Hoàng Văn Thái, Thanh Xuân, Hà Nội<br>
16. Siêu Thị T- Mart Khương Đình , Thanh Xuân, Hà Nội<br>
17. Siêu Thị T-Mart Nguyễn Quý Đức , Thanh Xuân, Hà Nội<br>
18. Siêu Thị T-Mart Trần Bình, Quận Từ Liêm , Hà Nội<br>
19. Siêu Thị T-Mart Xuân La, Tây Hồ, Hà Nội.<br>
20. Siêu Thị T-Mart Thụy Khuê, Tây Hồ, Hà Nội <br>
21. Siêu Thị T-Mart Chúc Sơn <br>
22. Siêu Thị T-Mart Kim Văn, Kim Lũ , Hoàng Mai, Hà Nội <br>
23. Siêu Thị T-Mart Đại Thanh, Thanh Trì, Hà Nội<br>
24. Siêu Thị T-Mart Cảnh Dị , Hoàng Mai, Hà Nội <br>
25. Siêu Thị T-Mart Nam Cường (Cạnh Ngõ 643 Cổ Nhuế), Bắc Từ Liêm<br>
26. Siêu Thị T-Mart 485 Vũ Tông Phan , Thanh Xuân, Hà Nội <br>
27. Siêu Thị T-Mart Ecohome, Đông Ngạc, Bắc Từ Liêm <br>
28. Siêu Thị T-Mart 101A Nguyễn Khuyến , Đống Đa, Hà Nội<br>
29. Siêu Thị T-Mart Gemek <br>
30. Siêu Thị T-Mart Tô Hiệu, Hà Đông, Hà Nội<br>
31. Siêu Thị T-Mart Golden An Khánh<br>
32. Siêu Thị T-Mart Ecolife, Tố Hữu, Hà Đông, Hà Nội <br>
33. Siêu Thị T-Mart 112 Âu Cơ, Tây Hồ, Hà Nội <br>
34. Siêu Thị T-Mart Kiến Hưng, Hà Đông, Hà Nội<br>
35. Siêu Thị T-Mart Hữu Hòa, Thanh Trì, Hà Nội<br>
36. Siêu Thị T-Mart Cầu Diễn, Bắc Từ Liêm, Hà Nội</p>
            </div>';
		return $html;
    }
    
    public function getInfoJobGo($link)
    {
    	$document = new Document($link, true);
    	$des = $document->first('div.box-jobs-info-detail div.box-jobs-info div.margin-top-10');
    	$des_title = $document->first('div.box-jobs-info-detail div.box-jobs-info h4');
    	$salary = $document->first('p.des');
    	return $desc_info = [$des_title,$salary,$des];
    }

    public function getInfoCareerLink($link)
    {
    	$document = new Document($link, true);
    	$des = $document->first('div[itemprop=description]');
    	$skills = $document->first('div[itemprop=skills]');
    	return $desc_info = [$des,$skills];
    }
}
