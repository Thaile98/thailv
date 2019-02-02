@foreach($articles as $art)
<div class="bc-content-item">
	<div class="row">
		<div class="col-sm-4">
			<a href="{{route('bai-viet',$art->id)}}" class="box-image-left" title="{{$art->art_meta_title}}">
				<img src="/uploads/giphy.gif" alt="{{$art->art_meta_title}}" class="lazy" data-original="/uploads/article/{{$art->art_avatar}}" style="">
			</a>
		</div>
		<div class="col-sm-8">
			<div class="box-content-item-info">
				<h3 class="bc-title-item">
					<a href="{{route('bai-viet',$art->id)}}" title="{{$art->art_meta_title}}">{{$art->art_name}}</a>
				</h3> 
				<p class="bc-description">{{$art->art_meta_description}}</p>
				<div class="box-icon-info-auth"> 
					<span class="bc-auth" itemscope="" itemprop="Person" itemtype="http://schema.org/Person"> 
						<img itemprop="image" src="https://123job.vn/favicon.png" alt=" Trần An"> 
						<span itemprop="name"> {{$art->author->name}}</span> 
					</span> 
					<span>{{$dateHelper->timeAgo($art->art_published_at)}}</span>  
					<span>{{$art->art_hit_view}} lượt xem</span> 
				</div> <a class="load__more" href="{{route('bai-viet',$art->id)}}" title="Cách để có mẫu cv cho vị trí quản lý chuyên nghiệp">&nbsp;Xem thêm ...</a> 
			</div>
		</div>
	</div>
</div>
@endforeach
