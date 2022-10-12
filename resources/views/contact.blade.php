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
		
		<div class="col-md-12 " style="margin-top:-10px;">
			<form action="{{ route('ContactPost') }}" method="post">
				@csrf
				<div class="col-md-6 >
					<label for=""><small>Full Name</small></label>
				    <input type="text" name="fullname" class="form-control" required>
				</div>
                <div class="col-md-6 >
					<label for=""><small>Mobile number</small></label>
				    <input type="text" name="mobile" class="form-control" onKeyPress="if(this.value.length==10) return false;" required>
				</div>
                <div class="col-md-6 >
					<label for=""><small>Email id</small></label>
				    <input type="email" name="emailid" class="form-control" required>
				</div>
                <div class="col-md-12 >
					<label for=""><small>Message</small></label>
                    <textarea name="message" id="" cols="30" rows="5" class="form-control" required></textarea>
				    
				</div>
                
				<div class="col-md-12 >
					<label for="">&nbsp;</label><br>
				    <input type="submit" name="submit" class="btn btn-warning" value="Submit">
				</div>
			</form>
			<div class="clearfix"><br></div>
		</div>
		

		@include('frontcommon.footer')