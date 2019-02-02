@if($most_view_articles)
	@foreach($most_view_articles as $mva)
	<div class="item-job">
		<div class="row">
			<div class="col-3 col-sm-3 p-0">
				<a href="{{url('bai-viet',$mva->id)}}" title="{{$mva->art_meta_title}}">
					<img class="lazy" data-original="/uploads/article/{{$mva->art_avatar}}" alt="{{$mva->art_meta_title}}" title="{{$mva->art_meta_title}}" src="/uploads/giphy.gif" style="width: 100%;">
				</a>
			</div>
			<div class="col-9 col-sm-9">
				<div class="bc-box-job-info">
					<h3><a href="{{url('bai-viet',$mva->id)}}" title="{{$mva->art_meta_title}}" class="max-length-text" data-max-lenght="40">{{$mva->art_name}}</a></h3> 
					<div class="cv-box-job-info-icon"> <span><i class="fa fa-eye"></i> {{$mva->art_hit_view}} lượt xem</span>  <span><i class="fa fa-calendar"></i> {{$dateHelper->timeAgo($mva->art_published_at)}}</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
@endif
