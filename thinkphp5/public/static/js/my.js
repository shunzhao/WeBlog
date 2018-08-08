$(function(){
	$('.weui-tabbar__item').on('click', function () {
        $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
    });
    var $searchBar = $('#searchBar'),
        $searchResult = $('#searchResult'),
        $searchText = $('#searchText'),
        $searchInput = $('#searchInput'),
        $searchClear = $('#searchClear'),
        $searchCancel = $('#searchCancel');

    function hideSearchResult(){
        $searchResult.hide();
        $searchInput.val('');
    }
    function cancelSearch(){
        hideSearchResult();
        $searchBar.removeClass('weui-search-bar_focusing');
        $searchText.show();
    }

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


    $searchText.on('click', function(){
        $searchBar.addClass('weui-search-bar_focusing');
        $searchInput.focus();
    });
    $searchInput
        .on('blur', function () {
            if(!this.value.length) cancelSearch();
        })
        .on('input', function(){
            if(this.value.length) {
                $searchResult.show();
            } else {
                $searchResult.hide();
            }
        })
    ;
    $searchClear.on('click', function(){
        hideSearchResult();
        $searchInput.focus();
    });
    $searchCancel.on('click', function(){
        cancelSearch();
        $searchInput.blur();
    });

    var tmpl = '<li class="weui-uploader__file" style="background-image:url(#url#)"></li>',
    $gallery = $("#gallery"), $galleryImg = $("#galleryImg"),
    $uploaderInput = $("#uploaderInput"),
    $uploaderFiles = $("#uploaderFiles");
    $uploaderInput.on("change", function(e){
        var src, url = window.URL || window.webkitURL || window.mozURL, files = e.target.files;
        for (var i = 0, len = files.length; i < len; ++i) {
            var file = files[i];

            if (url) {
                src = url.createObjectURL(file);
            } else {
                src = e.target.result;
            }

            $uploaderFiles.html($(tmpl.replace('#url#', src)));
        }
    });
    $("article img").on('click',function(){
    	$galleryImg.attr("style", "background-image:url("+ this.getAttribute("src") +")");
        $gallery.fadeIn(100);
    });
    $gallery.on("click", function(){
        $gallery.fadeOut(100);
    });

    var nowUrl = window.location.pathname.lastIndexOf('/');
    var nowUrl = location.pathname.substring(nowUrl, window.location.pathname.length);
    if(nowUrl == '/')
    {
        $($('.weui-tabbar__item').get(0)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/link')
    {
        $($('.weui-tabbar__item').get(1)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/1'){
        $($('.weui-tabbar__item').get(2)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/admin')
    {
        $($('.weui-navbar__item').get(0)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/webmgt')
    {
        $($('.weui-navbar__item').get(1)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/postmgt')
    {
        $($('.weui-navbar__item').get(2)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/linkmgt')
    {
        $($('.weui-navbar__item').get(3)).addClass('weui-bar__item_on');
    }
    else if (nowUrl == '/usermgt')
    {
        $($('.weui-navbar__item').get(4)).addClass('weui-bar__item_on');
    }

    
    
    $('.lBtn').on('click', function(){
        var uname = (document.getElementsByTagName('input')[0].value).trim();
        var pwd = (document.getElementsByTagName('input')[1].value).trim();
        var captcha = (document.getElementsByTagName('input')[2].value).trim();
        if(uname == "")
        {
            $tooltips.text('用户名不得为空');
            showError();
        }
        else if(pwd == "")
        {
            $tooltips.text('密码不得为空');
            showError();
        }
        else if (captcha == "")
        {
            $tooltips.text('验证码不得为空');
            showError();
        }
        else
        {
            $.ajax({
                url: "/login",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data : {'uname' : uname, 'pwd' : pwd, 'captcha' : captcha},
                type: "POST",
                dataType:'JSON',
                success: function (result) {
                    if(result.code)
                    {
                        window.location.href = window.location.origin + '/admin';
                    }
                    else
                    {
                        $tooltips.text(result.msg);
                        showError();
                    }
                },
                error: function (result)
                {
                    if(result.responseJSON)
                    {
                        $tooltips.text(result.responseJSON.errors.captcha[0]);
                        showError();
                    }
                    else
                    {
                        $tooltips.text('系统错误，请刷新重试');
                        showError();
                    }
                }
            });
        }
    });
    // 
    $('.linkBtn').on('click', function () 
    {
        if($('.linkUrl').val().trim() == "")
        {
            $tooltips.text('链接地址不得为空');
            showError();
            return false;
        }
    });
    $('.userBtn').on('click', function () 
    {
        var modifyPwd = $('.modifyPwd').val().trim();
        var CModifyPwd = $('.CModifyPwd').val().trim();
        if(modifyPwd == "")
        {
            $tooltips.text('密码不得为空');
            showError();
            return false;
        }
        else if(CModifyPwd == "")
        {
            $tooltips.text('确认密码不得为空');
            showError();
            return false;
        }
        else if (modifyPwd !== CModifyPwd)
        {
            $tooltips.text('两次密码不一致');
            showError();
            return false;
        }
        return true;
    });

    var d = document.documentElement;
    var b = document.body;
    window.onscroll = set;
    $('#gotop').on('click', function(){
    	$('#gotop').css("display", 'none');
        window.onscroll = null;
        var timer = setInterval(function() {
            d.scrollTop -= Math.ceil((d.scrollTop + b.scrollTop) * 0.1);
            b.scrollTop -= Math.ceil((d.scrollTop + b.scrollTop) * 0.1);
            if ((d.scrollTop + b.scrollTop) == 0) clearInterval(timer, window.onscroll = set);
        },1);
    });
    function set() {
        $('#gotop').css("display", (d.scrollTop + b.scrollTop > 200) ? 'block': "none");
    }
});