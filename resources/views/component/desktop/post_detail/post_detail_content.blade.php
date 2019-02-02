<div class="bc-content bc--detail">
	<div class="detail--title">
		<h1><b>{{$article->art_name}}</b></h1>
	</div>
	<div class="auth--info">
		<div class="box-icon-info-auth"> <span class="bc-auth" itemscope="" itemprop="Person" itemtype="http://schema.org/Person"> <img itemprop="image" src="https://123job.vn/favicon.png" alt=" Thu Hà"> <span itemprop="name">{{$article->author->name}}</span> </span> <span>{{$dateHelper->timeAgo($article->art_published_at)}}</span>  <span>{{$article->art_hit_view}} lượt xem</span> 
		</div>
	</div>
	<div class="detail--content">
		<div class="content-post-detail content--post-desc">
			{!!$article->art_meta_description!!}
		</div>
		<div class="content-post-detail">
			{!!$article->article_detail->art_content!!}
		</div>
		<div class="clearfix w-100 mb-lg-3 mt-lg-3">
			<span>Xem Thêm : </span>

			@foreach($article->tags as $tag)

			<a href="#" title="">{{$tag->tag_name}}     </a>

			@endforeach
		</div>
		<div class="text-post-next-prev">
			<div class="next-prev-item">
				<p><i class="fa fa-angle-double-left"></i> Bài kế sau</p> <a href="https://123job.vn/bai-viet/cach-viet-email-nop-cv-nhu-the-nao-8.html">Cách viết email nộp cv như thế nào?</a> 
			</div>
			<div class="next-prev-item"> 
				<p>Bài kế tiếp <i class="fa fa-angle-double-right"></i></p> <a href="https://123job.vn/bai-viet/mau-cv-cho-sinh-vien-thuc-tap-gay-bat-ngo-voi-cong-ty-tuyen-dung-71.html">Mẫu CV cho sinh viên thực tập gây “bất ngờ” với công ty tuyển dụng</a> 
			</div>
		</div>
	</div>
	<div class="detail--comment" id="comment">
		<div class="fb-comments w-100" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="1"></div>
	</div>
</div>
