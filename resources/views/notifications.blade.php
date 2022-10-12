@include('backcommon.header')
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">			
					
					<div class="row">
						<h3 class="title1"><small class="text-right">Home / Notifications</small></h3>
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
                        
                        <div class="col-md-12 compose-right widget-shadow">
                            <div class="panel-default">
                                <div class="panel-heading">
                                    Notifications list 
                                </div>
                            <div class="inbox-page">
                                <table class="table table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Option</th>
                                    </tr>
                            @foreach ($notes as $resnotes)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $resnotes->categoryname }}</td>
                                <td>{{ $resnotes->title }}</td>
                                <td>{{ $resnotes->created_at }}</td>
                                <td>
                                    <a href="{{ url('notifications-view') }}/{{ $resnotes->id }}"> <i class="fa fa-eye btn-info btn btn-xs" title="View"></i> </a>
                                    <a href="{{ url('notifications-edit') }}/{{ $resnotes->id }}"> <i class="fa fa-edit btn-primary btn btn-xs" title="Edit"></i> </a>
                                    <a href="{{ url('delete') }}/{{ $resnotes->id }}"> <i class="fa fa-trash btn-danger btn btn-xs" title="Delete" onclick="return confirm('Are you Sure you want to delete this record')"></i> </a>
                                </td>
                            </tr>
                            
                            {{-- <div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="mail"><img src="images/i1.png" alt=""/></div>
                                <div class="mail mail-name"> <h6><b>{{$loop->iteration}} . {{ $resnotes->categoryname }}</b></h6> </div>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="mail"><p>{{ substr($resnotes->title,0,70) }}</p></div>
                                </a>
                               
                                <div class="mail-right"><p>{{ $resnotes->created_at }}</p></div>
                                <div class="clearfix"> </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="mail-body">
                                        <p style="color:#333"><?php echo $resnotes->details; ?></p>
                                        <form>
                                            <input type="text" placeholder="Reply to sender" required="">
                                            <input type="submit" value="Send">
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            @endforeach
                        </table>
                        {{ $notes->links() }}
                        </div>
                    </div>
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
