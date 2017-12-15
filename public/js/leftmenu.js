/**
 * Created by Administrator on 2017/12/15.
 */
//根据左侧列表url内容，Ajax访问对应的路由器
$(document).ready(function(){
    $(".clickleft").click(function(){
        $url=$(this).attr('url');
        htmlobj=$.ajax({url:$url,async:false});
        $("#main").empty();
        $("#main").html(htmlobj.responseText);
    });
});