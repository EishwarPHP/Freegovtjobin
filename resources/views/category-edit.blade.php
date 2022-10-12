@include('backcommon.header')

<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">

            <div class="row">
                <h3 class="title1"><small class="text-right">Home / Job Protal</small></h3>
                {{-- Success message --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-info alert-block" align="center" id="flashmessage">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        $("#flashmessage").hide('p');
                    }, 2500);
                </script>
                {{-- Success message --}}
                <div class="inline-form widget-shadow">
                    <div class="form-title">
                        <h4>Update Category</h4>
                    </div>
                    <div class="form-body">
                        <div data-example-id="simple-form-inline">
                            <form class="form-inline" method="post" action="{{ route('editCategory') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                    <input required type="text" class="form-control" id="exampleInputEmail3"
                                        name="category" placeholder="Category" value="{{ $category->category }}">
                                </div>
                                <button type="submit" class="btn btn-default">Update Category</button>
                            </form>
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
<script src='{{ asset('backend/js/SidebarNav.min.js') }}' type='text/javascript'></script>
<script>
    $('.sidebar-menu').SidebarNav()
</script>
<!-- //side nav js -->

<!-- Classie -->
<!-- for toggle left push menu script -->
<script src="{{ asset('backend/js/classie.js') }}"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>
<!-- //Classie -->
<!-- //for toggle left push menu script -->

<!--scrolling js-->
<script src="{{ asset('backend/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('backend/js/scripts.js') }}"></script>
<!--//scrolling js-->

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('backend/js/bootstrap.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
</body>

</html>
{{-- @endsection --}}
