@include('frontcommon.header')
			
		{{-- New updates --}}
		<div class="clearfix"></div>
		<div class="col-md-12 left-w3l" >
			<div class="sub-topp sub-top">
				<h4>{{ $notes->title }}</h4>
			</div>
			
			<div class="col-md-12">
				<?php echo $notes->details ?>
			</div>
			
			<div class="clearfix"></div>
		</div>
		{{-- Category --}}
		
		
		
		@include('frontcommon.footer')