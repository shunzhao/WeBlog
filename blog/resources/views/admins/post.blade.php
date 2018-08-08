@extends('layouts.admin')
@section('title', '新增文章 - Powered by shunzi!')
@section('headers')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="weui-toptips weui-toptips_warn js_tooltips"></div>
	<br>
	<div class="weui-cell">
	    <div class="weui-cell__hd"><label class="weui-label">文章标题：</label></div>
	    <div class="weui-cell__bd">
	       <input class="weui-input" name="title" value="{{ $title or '' }}" type="text" placeholder="请输入标题"/>
        </div>
	</div>
	<div id="editor">{!! $content or '' !!}</div>
    <br>
    <button class="weui-btn weui-btn_primary" id="postBtn">发布</button>
	<script src="{{ URL::asset('js/wangEditor.min.js') }}"></script>
	<script type="text/javascript">
	    var E = window.wangEditor;
	    var editor = new E('#editor');
        var $tooltips = $('.js_tooltips');
        function showError() 
        {
            if ($tooltips.css('display') != 'none') return;
            // toptips的fixed, 如果有`animation`, `position: fixed`不生效
            $('.page.cell').removeClass('slideIn');
            $tooltips.css('display', 'block');
            setTimeout(function () {
                $tooltips.css('display', 'none');
            }, 2000);
        }
	    editor.customConfig.uploadImgServer = "{{ action('AdminController@upload') }}";
	    editor.customConfig.uploadImgMaxLength = 1;
	    editor.customConfig.uploadFileName = 'postImg';
	    editor.customConfig.uploadImgHeaders = {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		};
		editor.customConfig.uploadImgHooks = {
		    before: function (xhr, editor, files) {
		    },
		    success: function (xhr, editor, result) {
		    },
		    fail: function (xhr, editor, result) {
		    },
		    error: function (xhr, editor) {
		    },
		    timeout: function (xhr, editor) {
		    }
    	};
	    editor.create();

	    $('#postBtn').click(function () {
            var title = ($('.weui-input').val()).trim();
            var content = editor.txt.html();
            var excerpt = editor.txt.text();
            if(title == "")
            {
                $tooltips.text('文章标题不得为空');
                showError();
                return false;
            }
            else
            {
                $.ajax({
                    url: "{{ isset($title) ? action('AdminController@postModify') : action('AdminController@addPost') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data : {'title' : title, 'content' : content, 'id' : '{{ $id or '' }}', 'excerpt':excerpt },
                    type: "POST",
                    dataType:'JSON',
                    success: function (result) 
                    {
                        if(result.code)
                        {
                            window.location.href = '/admin/postmgt';
                        }
                        else
                        {
                            alert(result.msg);
                        }
                    },
                    error: function (result)
                    {
                        if(result.responseJSON)
                        {
                            alert(result.responseJSON.errors.captcha[0]);
                        }
                        else
                        {
                            alert('操作失败，请重新试!');
                        }
                    }
                });
            }
        });
	</script>
@endsection