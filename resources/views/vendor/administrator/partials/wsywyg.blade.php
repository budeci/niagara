<script>
    var Editors = {};
    Editors.init = {
        ckeditor : function() {
            $('[data-editor="ckeditor"]').ckeditor({
                filebrowserImageBrowseUrl: "{{ asset('laravel-filemanager?type=Images') }}",
                filebrowserImageUploadUrl: "{{ asset('laravel-filemanager/upload?type=Images&_token='.csrf_token())}}",
                filebrowserBrowseUrl: "{{ asset('laravel-filemanager?type=Files') }}",
                filebrowserUploadUrl: "{{ asset('laravel-filemanager/upload?type=Files&_token='.csrf_token())}}"
            });
        },
        tinymce: function() {
            tinymce.init({
                selector: 'textarea[data-editor="tinymce"]',
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste", // @excluded: "moxiemanager"
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                  var cmsURL = '{{ asset('laravel-filemanager?field_name=')}}'+field_name;
                  if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }

                  tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                  });
                }

            });
        }
    };
</script>

@if(in_array('ckeditor', $editors = $fieldFactory->getEditors()))
    <script type="text/javascript" src="{{ asset($assets . '/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset($assets . '/plugins/ckeditor/adapters/jquery.js') }}"></script>
    <script>Editors.init.ckeditor();</script>
@endif

@if (in_array('tinymce', $editors))
    <script type="text/javascript" src="{{ asset($assets . '/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset($assets . '/plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script>Editors.init.tinymce();</script>
@endif

@if (in_array('wysihtml5', $editors))
<script src="<?= asset($assets . '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<script>
    $('textarea[data-editor=wysihtml5]').wysihtml5();
</script>
@endif