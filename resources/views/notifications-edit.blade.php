@include('backcommon.header')
		<!--left-fixed -navigation-->
		
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">			
					
					<div class="row">
						<h3 class="title1"><small class="text-right">Home / Notification Edit</small></h3>
                        {{-- Success message --}}
                        @if ($message = Session::get('success'))
                        <div class="alert alert-info alert-block" align="center" id="flashmessage">
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <script>
                            setTimeout(function () {
                                    $("#flashmessage").hide('p');
                                }, 2500);
                            
                        </script>
                        {{-- Success message --}}
                        
						<div class="form-three widget-shadow">
                            <h3 class="title1">Job Notification :</h3>
                            
							<form class="form-horizontal" method="post" action="{{ route('NotificationsEdit') }}">
                                @csrf
								
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
                                        <input type="hidden" name="id" value="{{ $notes->id }}">
                                        <select name="category" id="selector1" class="form-control1" required>
                                            <option value="">Select Please</option>
                                            @foreach ($category as $res)
                                                <option value="{{ $res->id }}" @if($notes->category==$res->id) selected @endif>{{ $res->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
								</div>
                                <div class="form-group">
									<label for="title" class="col-sm-2 control-label label-input-sm">Title</label>
									<div class="col-sm-8">
										<input type="text" value="{{ $notes->title }}" class="form-control1 input-sm" id="title" name="title" placeholder="Enter Title">
									</div>
								</div>
                                <div class="form-group">
									<label for="title" class="col-sm-2 control-label label-input-sm">Set</label>
									<div class="col-sm-8">
										<select name="setbutton" id="selector1" class="form-control1" >
                                        <option value="0" @if($notes->setbutton==0) selected @endif>Select Please</option>
                                        <option value="1" @if($notes->setbutton==1) selected @endif>Place in Top Button</option>
                                        <option value="2" @if($notes->setbutton==2) selected @endif>Place in Top Box</option>
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<label for="title" class="col-sm-2 control-label label-input-sm">Direct Link</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1 input-sm" id="onlylink" name="onlylink"
											placeholder="Enter url">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
                                        <label for="txtarea1" class="control-label">Details</label>
                                        <textarea required name="details" id="txtarea1" cols="50" rows="4" class="form-control ckeditor"><?php echo $notes->details ?></textarea>
                                    </div>
								</div>
                                <div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-default">Update Notification</button>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
			<p>&copy; 2022 Freegovtjob.in. All Rights Reserved | Design by <a href="https://Freegovtjob.in/" target="_blank">Freegovtjob.in</a></p>
	   </div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='{{ asset('backend/js/SidebarNav.min.js')}}' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="{{ asset('backend/js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="{{ asset('backend/js/jquery.nicescroll.js')}}"></script>
	<script src="{{ asset('backend/js/scripts.js')}}"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('backend/js/bootstrap.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           $('.ckeditor').ckeditor();
        });
    </script>
</body>
</html>
{{-- @endsection --}}
