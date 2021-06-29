<!DOCTYPE html>





  <meta charset="utf-8" />
  <title>Summernote Sample</title>
  <!-- bootstrap + jquery -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- include summernote css/js-->
	<link href="../../api/summernote/summernote.css" rel="stylesheet">
	<script src="../../api/summernote/summernote.js"></script>
	<!-- summer note korean language pack -->
	<script src="../../api/summernote/lang/summernote-ko-KR.js"></script>


<script type="text/javascript">
  $(function() {
    $('.summernote').summernote({
      height: 300,          // 기본 높이값
      minHeight: null,      // 최소 높이값(null은 제한 없음)
      maxHeight: null,      // 최대 높이값(null은 제한 없음)
      focus: true,          // 페이지가 열릴때 포커스를 지정함
      lang: 'ko-KR'         // 한국어 지정(기본값은 en-US)
    });
  });
</script>


  <div class="container">
    <h1 class="page-header">Summernote Sample</h1>
    <form class="form-horizontal">
      <div class="form-group">
        <label for="content" class="col-sm-2 control-label">내용입력</label>
        <div class="col-sm-10">
          <textarea name="content" id="content" class="summernote"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Save</button>
        </div>
      </div>
    </form>
  </div>


