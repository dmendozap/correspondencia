<?php
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/inline/ckeditor.js"></script>
</head>
<script>
    InlineEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<body>

<div id="editor"></div>


</body>
</html>