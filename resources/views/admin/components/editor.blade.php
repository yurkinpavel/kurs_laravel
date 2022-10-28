<script src="https://cdn.tiny.cloud/1/9k4sepjnmu6ta6noy3zx5haoppy65tq85fc1rpnajrnrmfdj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
<!-- <script src="/build/assets/tinymce/tinymce.min.js" ></script> -->
 

<script>
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea',
    relative_urls: false,
    plugins: 'image',
    toolbar: "insertfile image undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };


  tinymce.init(editor_config);

 
</script>
