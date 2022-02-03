<?php
if(isset($_POST['get_image']))
{
 $url=$_POST['img_url'];
 $data = file_get_contents($url);
 $new = 'images/new_image.jpg';
 file_put_contents($new, $data);
 echo "<img src='images/new_image.jpg'>";
}
?>


  $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');




  



<!-- begin snippet: js hide: false console: true babel: null -->

<!-- language: lang-js -->

    $(".chosen-select").chosen({
      no_results_text: "Oops, nothing found!"
    })

<!-- language: lang-html -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <form action="http://httpbin.org/post" method="post">
      <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="test">
        <option value=""></option>
        <option>American Black Bear</option>
        <option>Asiatic Black Bear</option>
        <option>Brown Bear</option>
        <option>Giant Panda</option>
        <option>Sloth Bear</option>
        <option>Sun Bear</option>
        <option>Polar Bear</option>
        <option>Spectacled Bear</option>
      </select>
      <input type="submit">
    </form>

<!-- end snippet -->

enter code here