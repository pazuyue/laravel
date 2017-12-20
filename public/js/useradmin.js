//根据左侧列表url内容，Ajax访问对应的路由器
$(document).ready(function(){
    $(".clickauser").click(function(){
        $url=$(this).attr('url');
        htmlobj=$.ajax({url:$url,async:false});
        $("#main").empty();
        $("#main").html(htmlobj.responseText);
    });

    $("#formadd").click(function() {
        $action=$("#form").attr('action');
        $.ajax({
            type: 'POST',
            url: $action,
            data: $("#form").serialize(),
            error: function(data) {
                var message=data.responseText;
                var jsonObj = $.parseJSON(message);
                $("#message").empty();
                if(data.status==403){
                    $("#message").append('<div class="alert alert-info">'+ jsonObj.message+'</div>');
                }

                $.each( jsonObj.errors, function(index, content)
                {
                    $("#message").append('<div class="alert alert-danger">'+content+'</div>');
                });
            },
            success: function(data) {
                alert("添加成功！");
                $("#main").html(data);
            }
        });
    });
});

