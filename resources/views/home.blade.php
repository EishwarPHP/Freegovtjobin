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
                        <h4>Add Category</h4>
                    </div>
                    <div class="form-body">
                        <div data-example-id="simple-form-inline">
                            <form class="form-inline" method="post" action="{{ route('addCategory') }}">
                                @csrf
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="exampleInputEmail3"
                                        name="category" placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-default">Save Category</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="form-three widget-shadow">
                    <h3 class="title1">Job Notifications :</h3>

                    <form class="form-horizontal" method="post" action="{{ route('addNotification') }}">
                        @csrf

                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-8">
                                <select name="category" id="selector1" class="form-control1" required>
                                    <option value="">Select Please</option>
                                    @foreach ($category as $res)
                                        <option value="{{ $res->id }}">{{ $res->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label label-input-sm">Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1 input-sm" id="title" name="title"
                                    placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label label-input-sm">Set</label>
                            <div class="col-sm-8">
                                <select name="setbutton" id="selector1" class="form-control1">
                                    <option value="0">Select Please</option>
                                    <option value="1">Place in Top Button</option>
                                    <option value="2">Place in Top Box</option>
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
                                <textarea required name="details" id="txtarea1" cols="50" rows="4" class="form-control ckeditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtarea1" class="col-sm-2 control-label">&nbsp;</label>
                            <button type="submit" class="btn btn-default">Save Notification</button>
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
