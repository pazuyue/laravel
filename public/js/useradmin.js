//根据左侧列表url内容，Ajax访问对应的路由器
$(document).ready(function(){
    $(".click").click(function(){
        $url=$(this).attr('url');
        htmlobj=$.ajax({url:$url,async:false});
        $("#main").html(htmlobj.responseText);
    });
});