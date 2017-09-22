<header>
  <nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">The Start-Up Social Network</a>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
      <?php  $user = Auth::user(); ?>
          <li><a href="{{route('Userprofile', ['username' => $user->username, 'id' => $user->id])}}"><b>{{$user->name}}</b></a></li>
          <li><a href="{{ route('account') }}">Account Setting</a></li>
          <li><a href="{{ route('logout') }}">Logout</a></li>
        @endif
      </ul>
  </div>
</nav>

</header>

<!-- Ye editor wala code -->
<script src="{{URL::to('tinymce/js/tinymce/tinymce.min.js')}}"> </script>
<script>
var editor_config = {
path_absolute : "{{ URL::to('/') }}/",
selector : "textarea",
width: 800,
menu : { // this is the complete default configuration

file   : {title : 'File'  , items : 'newdocument'},

edit   : {title : 'Edit'  , items : 'undo redo | cut copy paste pastetext | selectall'},

insert : {title : 'Insert', items : 'template hr'}, //link media remove it

view   : {title : 'View'  , items : 'visualaid'},

format : {title : 'Format', items : 'bold italic underline strikethrough superscript subscript | formats | removeformat'},

table  : {title : 'Table' , items : 'inserttable deletetable | cell row column'},

tools  : {title : 'Tools' , items : 'spellchecker code'}

},
plugins: [
"advlist autolink lists link image charmap print preview hr anchor pagebreak",
"searchreplace wordcount visualblocks visualchars code fullscreen",
"insertdatetime media nonbreaking save table contextmenu directionality",
"emoticons template paste textcolor colorpicker textpattern"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ",
relative_urls: false,
file_browser_callback : function(field_name, url, type, win) {
var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
if (type = 'image') {
  cmsURL = cmsURL+'&type=Images';
} else {
  cmsUrl = cmsURL+'&type=Files';
}

tinyMCE.activeEditor.windowManager.open({
  file : cmsURL,
  title : 'Filemanager',
  width : x * 0.8,
  height : y * 0.8,
  resizeble : 'yes',
  close_previous : 'no'
});
}
};

tinymce.init(editor_config);
</script>﻿
