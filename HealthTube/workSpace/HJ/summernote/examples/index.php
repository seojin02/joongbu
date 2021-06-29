<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Summernote - CodeMirror</title>

  <!-- include jquery -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

  <!-- include libs stylesheets -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.5/umd/popper.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js"></script>

  <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js)-->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/theme/blackboard.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/theme/monokai.min.css">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.min.js"></script>

  <!-- include summernote -->
  <link rel="stylesheet" href="../dist/summernote-bs4.css">
  <script type="text/javascript" src="../dist/summernote-bs4.js"></script>

  <link rel="stylesheet" href="example.css">
  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 200,
        tabsize: 2,
        codemirror: {
          mode: 'text/html',
          htmlMode: true,
          lineNumbers: true,
          theme: 'monokai'
        }
      });
    });
  </script>
</head>
<body>
<div class="container">
  <form action="get.php">
		<textarea class="summernote" name="contents"><p>Seasons <b>coming up</b></p></textarea>
		<input type="submit"></input>
	<form>
</div>
</body>
</html>
