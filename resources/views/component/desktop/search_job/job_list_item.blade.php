<div class="job__list-item">
	<div class="job__list-item-thumb">
		<img class="lazy" src="uploads/giphy.gif" data-original="uploads/company_default.png" alt="company_default">
	</div>
	<div class="job__list-item-content">
		<h2 class="job__list-item-title text-collapse"> 
			<a data-id="218872" rel="nofollow" href="https://123job.vn/viec-lam/ky-thuat-vien-x-quang-o29AQGQz9J" title="Kỹ thuật viên X-Quang" target="_blank">{{$job->job_title}}</a>
		</h2>
		<div class="job__list-item-company text-collapse"> 
			<span>CÔNG TY TNHH GSHN - GSHN CO., LTD</span>
		</div>
		<div class="job__list-item-info w-100">
			<div class="job__list-item-address text-collapse"> 
				<i class="la la-map-marker job__list-item-icon"></i> Làm việc tại: <span class="js-jf-address">
					@foreach($job->location as $jlc)
						{{$jlc->loc_name}}
					@endforeach
				</span>
			</div>
			<div class="job__list-item-salary"> 
				<i class="fa fa-money job__list-item-icon"></i> Mức lương: {{$job->job_salary}}
			</div>
			<div class="job__list-item-type"> 
				<i class="fa fa-clock-o job__list-item-icon"></i> Thời gian: {{$job->job_type->jt_name}}
			</div>
		</div>
		<div class="job__list-item-teaser"> 
			<span>{!!str_limit($job->job_detail->jd_description,300)!!}</span>
		</div>
		<div class="job__list-item-readmore">
			<span>
				<i class="la la-unlink"></i> {{$job->job_web_root->jwr_name}}
			</span>
			<span>35 phút trước</span>
			<a href="javascript:;" rel="nofollow" title="Xem thêm thông tin" class="item-click-readmore">&nbsp;&nbsp;Xem thêm...
			</a>
			<div class="infor-more clearfix" style="display: block">
				<h4>Xem tìm kiếm tương tự</h4>
				<ul>
					@foreach($job->location as $jlc)
						<li>
							<a href="https://123job.vn/vi%E1%BB%87c-l%C3%A0m-t%E1%BA%A1i-B%C3%ACnh-%C4%90%E1%BB%8Bnh" title="Việc làm tại Bình Định" class="item-link-readmore"> Việc làm tại {{$jlc->loc_name}}</a>
						</li>
					@endforeach
				</ul> 
				<span class="close-info-more"> 
					<i class="fa fa-times"></i> 
				</span>
			</div>
		</div>
	</div>
	<!-- <div class="job__list-item-extra">
		<div class="job__list-item-salary"> 
			<span>Thương lượng</span>
		</div>
		<div class="job__list-item-favorite"> 
			<span title="Thêm vào yêu thích" class="job__list-item-favorite-add js-jf-desktop-save" data-hash-slug="o29AQGQz9J"> 
				<i class="la la-heart-o"></i> 
			</span>
		</div>
		<div class="job__list-item-expiry-date">Hạn cuối: <span>30.09.2018</span>
		</div>
	</div> -->
</div>