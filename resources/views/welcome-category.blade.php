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
		
		{{-- Notifications --}}
		<div class="clearfix"></div>
		<div class="col-md-12 left-w3l table-responsive" >
			<div class="sub-topp sub-top">
				<h4>{{ $title }}</h4>
			</div>
			<table class="table table-striped" bordercolor="#eee" style="background: #fff" border="1"> 
				<tbody>
					<tr>
						<td>
							<table border="1" bordercolor="#eee" class="table">
								@foreach ($notes as $resnotes)
								<tr>
									<td><a href="{{ url('details') }}/{{ $resnotes->id }}">{{ $resnotes->title }}</a></td>	
								</tr>
								@endforeach
							</table>
						</td>
					</tr>
				</tbody>
			</table>
            {{ $notes->links() }}
			<div class="clearfix"></div>
		</div>

		@include('frontcommon.footer')