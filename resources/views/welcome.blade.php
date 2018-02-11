<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <script src="js/app.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script>
       /* echo.channel('chat-room')
            .listen('ChatMessageWasReceived', function (data) {
                console.log(data.user, data.chatMessage);
            });*/


       console.log(echo.socketId());


       echo.private('chat-room.1')
           .listen('ChatMessageWasReceived', function (data) {
               console.log(data.user, data.chatMessage);
           });

    </script>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="info">

                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>

