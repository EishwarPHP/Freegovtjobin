@include('frontcommon.header')

		<div class="clearfix"></div>
		@if ($message = Session::get('success'))
		{{-- Success message --}}
			<div class="alert alert-info alert-block" align="center" id="flashmessage">
			<strong>{{ $message }}</strong>
			</div>
			@endif

			<script>
				setTimeout(function () {
						$("#flashmessage").hide('p');
					}, 2500);
				
			</script>
		{{-- Success Message --}}
		<div class="col-md-6" >
			@if($notes->onlylink!=null)
				<a href="{{ $notes->onlylink }}" class="btn btn-primary btn-lg">{{ $notes->title }}</a>
			@else
				<a href="{{ url('details') }}/{{ $notes->id }}" class="btn btn-primary btn-lg">{{ $notes->title }}</a>
			@endif
				
			<div class="clearfix"><br></div>
		</div>
		<div class="col-md-6  text-center" style="margin-top:-10px;">
			<form action="{{ route('Subscriptions') }}" method="post">
				@csrf
				<div class="col-md-8  text-center" >
					<label for=""><small>Subscribe to Get all The Latest Updates !</small></label>
				<input type="email" name="emails" class="form-control" placeholder="Enter Email" required>
				</div>
				<div class="col-md-4  text-center" >
					<label for="">&nbsp;</label>
				<input type="submit" name="submit" class="btn btn-warning" value="Subscribe Now">
				</div>
			</form>
			<div class="clearfix"><br></div>
		</div>
		{{-- New updates --}}
		<div class="clearfix"></div>
		<div class="col-md-12 left-w3l table-responsive" >
			<div class="sub-topp sub-top">
				<h4>New update</h4>
			</div>
			<table class="table table-striped" bordercolor="#eee" style="background: #fff" border="1"> 
				
				<tbody>
					<tr>
						
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($newupdate as $resnotes)
								<tr>
										@if($resnotes->onlylink!=null)
											<td><a href="{{ $resnotes->onlylink }}" target="_blank">{{ $resnotes->title }}</a></td>
										@else
											<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>
										@endif
								</tr>
								@endforeach
							</table>
						</td>
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($newupdate1 as $resnotes)
								<tr>
										@if($resnotes->onlylink!=null)
											<td><a href="{{ $resnotes->onlylink }}"  target="_blank">{{ $resnotes->title }}</a></td>
										@else
											<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>
										@endif
									
								</tr>
								@endforeach
							</table >
						</td>
						
					</tr>
					<tr>
						<td class="text-center" colspan="2">
							<a href="{{ url('welcome-category') }}/Newupdate" class="hvr-bounce-to-left" style="padding: 10px;color:#fff">View All</a>
						</td>						
					</tr>
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>
		{{-- Category --}}
		
		<div class="clearfix"></div>
		@foreach ($box as $res)
				<a style="color:#fff;" href="{{ url('details') }}/{{ $res->id }}">
					<div class="col-md-4 social-icons" style="margin-bottom: 5px">
						<div class="profile-w3layouts">
							<div class="profile-topp text-center" style="background:{{ '#' . substr(str_shuffle('ABCD01234567'), 0, 6) }};padding:10px;height: 90px;">
									<b>{{ $res->title }}<br><small>Apply Online</small></b>
							</div>
						</div>
					</div>
				</a>
		@endforeach
		
		{{-- Notifications --}}
		<div class="clearfix"></div>
		<div class="col-md-12 left-w3l table-responsive" >
			<div class="sub-topp sub-top">
				<h4>Notifications</h4>
			</div>
			<table class="table table-striped" bordercolor="#eee" style="background: #fff" border="1"> 
				<thead>
					<tr>
						<th>Job Notifications</th>
						<th>Admit Cards</th>
						<th>Results</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($jobnotification as $resnotes)
								<tr>
									@if($resnotes->categoryname=="Job Notification" && $resnotes->setbutton==0)
										@if($resnotes->onlylink!=null)
											<td><a href="{{ $resnotes->onlylink }}" target="_blank">{{ $resnotes->title }}</a></td>
										@else
											<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>
										@endif
									@endif
								</tr>
								@endforeach
							</table>
						</td>
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($admitcard as $resnotes)
								<tr>
									
									@if($resnotes->categoryname=="Admit Cards" && $resnotes->setbutton==0)
										@if($resnotes->onlylink!=null)
											<td><a href="{{ $resnotes->onlylink }}"  target="_blank">{{ $resnotes->title }}</a></td>
										@else
											<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>
										@endif
									@endif
									
								</tr>
								@endforeach
							</table >
						</td>
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($results as $resnotes)
								<tr>
									@if($resnotes->categoryname=="Results" && $resnotes->setbutton==0)
										@if($resnotes->onlylink!=null)
											<td><a href="{{ $resnotes->onlylink }}" target="_blank">{{ $resnotes->title }}</a></td>
										@else
											<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>
										@endif
									@endif
								</tr>
								@endforeach
							</table>
						</td>
					</tr>
					<tr>
						<td class="text-center">
							<a href="{{ url('welcome-category') }}/Job Notification" class="hvr-bounce-to-left" style="padding: 10px;color:#fff">View All</a>
						</td>
						<td class="text-center">
							<a href="{{ url('welcome-category') }}/Admit Cards" class="hvr-bounce-to-left" style="padding: 10px;color:#fff">View All</a>
						</td>
						<td class="text-center">
							<a href="{{ url('welcome-category') }}/Results" class="hvr-bounce-to-left" style="padding: 10px;color:#fff">View All</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
		<div class="col-md-12 left-w3l table-responsive" >
			<div class="sub-topp sub-top">
				<h4>State Job Notifications</h4>
			</div>
			<table class="table table-striped" bordercolor="#eee" style="background: #fff" border="1"> 
				<thead>
					<tr>
						<th>State Job Notifications</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($statejobnotification as $resnotes)
								<tr>
									@if($resnotes->categoryname=="State Job Notifications" && $resnotes->setbutton==0)
										@if($resnotes->onlylink!=null)
											<td><a href="{{ $resnotes->onlylink }}" target="_blank">{{ $resnotes->title }}</a></td>
										@else
											<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>
										@endif
									@endif
								</tr>
								@endforeach
							</table>
						</td>
						
					</tr>
					<tr>
						
						<td class="text-center">
							<a href="{{ url('welcome-category') }}/State Job Notifications" class="hvr-bounce-to-left" style="padding: 10px;color:#fff">View All</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>

		@include('frontcommon.footer')