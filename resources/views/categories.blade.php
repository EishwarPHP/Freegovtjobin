@include('backcommon.header')
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">			
					
					<div class="row">
						<h3 class="title1"><small class="text-right">Home / Category</small></h3>
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
                                    Category list 
                                </div>
                            <div class="inbox-page">
                                <table class="table table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Options</th>
                                    </tr>
                            @foreach ($category as $res)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $res->category }}</td>
                                <td>
                                    {{-- <a href="{{ url('notifications-view') }}/{{ $res->id }}"> <i class="fa fa-eye btn-info btn btn-xs" title="View"></i> </a> --}}
                                    <a href="{{ url('category-edit') }}/{{ $res->id }}"> <i class="fa fa-edit btn-primary btn btn-xs" title="Edit"></i> </a>
                                    <a href="{{ url('deleteCategory') }}/{{ $res->id }}"> <i class="fa fa-trash btn-danger btn btn-xs" title="Delete" onclick="return confirm('Are you Sure you want to delete this record')"></i> </a>
                                </td>
                            </tr>
                            
                            
                            @endforeach
                        </table>
                        {{ $category->links() }}
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
