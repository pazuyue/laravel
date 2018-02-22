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

       echo.private('chat-room.1')
           .listen('ChatMessageWasReceived', function (data) {
               console.log(data.user, data.chatMessage);
           });
       /*echo.join(`chat-room.1`)
           .here((users) => {
               console.log(users[0]);
           })
           .joining((user) => {
               console.log(users[0]);
           })
           .leaving((user) => {
               console.log(user.name);
           })
           .listen('ChatMessageWasReceived', function (data) {
           console.log(data.user, data.chatMessage);
       });*/

    </script>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="info">

                </div>
            </div>
        </div>
    </body>
</html>

