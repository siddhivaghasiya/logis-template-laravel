<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
    </div>
  </footer>

<!-- main-panel ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('admin-asset/jquery.min.js')}}"></script>

<script src="{{asset('admin-asset/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin-asset/additional-methods.min.js')}}"></script>
<script src="{{ asset('admin-asset/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admin-asset/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('admin-asset/assets/vendors/flot/jquery.flot.pie.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admin-asset/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin-asset/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin-asset/assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('admin-asset/assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->

<script src="https://cdn.tiny.cloud/1/d5xkm37lhhdhglxdlbmt0eg9ug9mkwhcne5zrfikmlq7qxoi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>


    tinymce.init({
            selector : '.editor-tinymce',
            height: 250,
            directionality : "ltr",
            plugins : 'advlist autolink lists link charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code image codesample',
            toolbar : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image codesample',

            images_upload_url : "{{ route('save_tinymce_image') }}",
            automatic_uploads : false,
            relative_urls : false,

            images_upload_handler : function(blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();


                xhr.withCredentials = false;
                xhr.open('POST', "{{ route('save_tinymce_image') }}",true);

                var generateToken = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", generateToken);

                xhr.onload = function(data) {

                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.file_path != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.file_path);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
    </script>

</body>
</html>
