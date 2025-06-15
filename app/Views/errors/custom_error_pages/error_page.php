<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <style>
        * {
        margin:0px auto;
        padding: 0px;
        text-align:center;
        }
        body {
        background-color:rgb(237, 233, 212);
        }
        .cont_principal {
        position: absolute;  
        width: 100%;
        height: 100%;
        overflow: hidden;
        }
        .cont_error {
        position: absolute;
        width: 100%;
        height: 300px;
        top: 50%;
        margin-top:-150px;
        }

        .cont_error > h1  {
        font-family: 'Lato', sans-serif;  
        font-weight: 400;
        font-size:150px;
        color:#fff;
        position: relative;
        left:-100%;
        transition: all 0.5s;
        }


        .cont_error > p  {
        font-family: 'Lato', sans-serif;  
        font-weight: 300;
        font-size:24px;
        letter-spacing: 5px;
        color:#9294AE;
        position: relative;
        left:100%;
        transition: all 0.5s;
            transition-delay: 0.5s;
        -webkit-transition: all 0.5s;
        -webkit-transition-delay: 0.5s;
        }

        .cont_aura_1 {
        position:absolute;
        width:300px;
        height: 120%;
        top:25px;
        right: -340px;
        background-color:rgb(223, 189, 101);
        box-shadow: 0px 0px  60px  20px  rgba(222, 179, 100, 0.5);
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
        }

        .cont_aura_2 {
        position:absolute;
        width:100%;
        height: 300px;
        right:-10%;
        bottom:-301px;
        background-color:rgb(228, 179, 101);
        box-shadow: 0px 0px 60px 10px rgba(214, 174, 95, 0.5),0px 0px  20px  0px  rgba(0, 0, 0, 0.1);
        z-index:5;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        }

        .cont_error_active > .cont_error > h1 {
        left:0%;
        }
        .cont_error_active > .cont_error > p {
        left:0%;
        }

        .cont_error_active > .cont_aura_2 {
            animation-name: animation_error_2;
            animation-duration: 4s;
        animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        transform: rotate(-20deg);    
        }
        .cont_error_active > .cont_aura_1 {
        transform: rotate(20deg);
        right:-170px;
            animation-name: animation_error_1;
            animation-duration: 4s;
        animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }

        @-webkit-keyframes animation_error_1 {
        from {
            -webkit-transform: rotate(20deg);
        transform: rotate(20deg);
        }
        to {  -webkit-transform: rotate(25deg);
        transform: rotate(25deg);
        }
        }
        @-o-keyframes animation_error_1 {
        from {
            -webkit-transform: rotate(20deg);
        transform: rotate(20deg);
        }
        to {  -webkit-transform: rotate(25deg);
        transform: rotate(25deg);
        }

        }
        @-moz-keyframes animation_error_1 {
        from {
            -webkit-transform: rotate(20deg);
        transform: rotate(20deg);
        }
        to {  -webkit-transform: rotate(25deg);
        transform: rotate(25deg);
        }

        }
        @keyframes animation_error_1 {
        from {
            -webkit-transform: rotate(20deg);
        transform: rotate(20deg);
        }
        to {  -webkit-transform: rotate(25deg);
        transform: rotate(25deg);
        }
        }




        @-webkit-keyframes animation_error_2 {
        from { -webkit-transform: rotate(-15deg); 
        transform: rotate(-15deg);
        }
        to { -webkit-transform: rotate(-20deg);
        transform: rotate(-20deg);
        }
        }
        @-o-keyframes animation_error_2 {
        from { -webkit-transform: rotate(-15deg); 
        transform: rotate(-15deg);
        }
        to { -webkit-transform: rotate(-20deg);
        transform: rotate(-20deg);
        }
        }
        
        @-moz-keyframes animation_error_2 {
        from { -webkit-transform: rotate(-15deg); 
        transform: rotate(-15deg);
        }
        to { -webkit-transform: rotate(-20deg);
        transform: rotate(-20deg);
        }
        }
        @keyframes animation_error_2 {
        from { -webkit-transform: rotate(-15deg); 
        transform: rotate(-15deg);
        }
        to { -webkit-transform: rotate(-20deg);
        transform: rotate(-20deg);
        }
        }
        a button { 
            padding: 5px 10px;
            margin: 50px 10px;
            border-radius: 5px;
            box-shadow: 1px 1px 10px 2px;
            background-color:rgb(237, 232, 212);
            color:rgb(106, 110, 101);
            border: 1px solidrgb(106, 110, 101);
            cursor: pointer;
            transition: 170ms;
        }
        a button:hover {
            background-color:rgb(223, 197, 101);
            color:rgb(255, 255, 255);
        }
    </style>
</head>
<body>
    <div class="cont_principal">
    <div class="cont_error">
    
    <h1>Error!</h1>  
    <p><?= session()->has('error') ?? 'ERROR FOUND!' ?></p>
    <a href="<?= base_url('/redirect_back') ?>"><button>Redirect back</button></a>
    </div>
    <div class="cont_aura_1"></div>
    <div class="cont_aura_2"></div>
    </div>

    <script>
        window.onload = function(){
            document.querySelector('.cont_principal').className= "cont_principal cont_error_active";       
        }
    </script>
</body>
</html>