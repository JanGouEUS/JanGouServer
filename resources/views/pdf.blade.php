<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
                <meta charset="UTF-8">
            {{-- <link rel="icon" href="https://hamaikagara.eus/wp-content/uploads/2020/03/icon.png"> --}}
        </head>
<body>
    <div class="flex-center position-ref ">
        <div class="container">
            <div class="row">
                    <center>
                <img class="card-img-top" style="width:80%;align:'center' " src="https://jangou.eus/jangou.jpg">
                        <br>
                        <h1 style="color:black">{{$taberna->name}}</h1>
                        <br>
                        <br>
                        <br>
                        {{-- <img class="card-img-top" style="width:50%;align:'center' " src="data:image/png;base64,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"> --}}
                        <img class="card-img-top" style="width:30%;align:'center' " src="https://jangou.eus/public/tabernak/{{$taberna->idTaberna}}/qr.png">
                        <br>
                        <img class="card-img-top" style="width:20%;align:'center' " src="https://skuramobile.com/wp-content/uploads/logo_alpha-1024x383.png">
                    </center>
                    {{-- <br> --}}
                  
            </div>
        </div>
    </div>
</body>
