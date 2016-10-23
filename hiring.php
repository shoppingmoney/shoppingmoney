<?php
session_start();
ob_start();
@extract($_POST);
include 'vendor/lib/Connection.php';
include 'vendor/lib/Fileupload.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
include 'vendor/lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$data=$dbAccess->selectSingleStmt("select * from cms where id='9'");
?>
<!doctype html>
<html class="no-js" lang="">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ShoppingMoney.in</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
         <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		
		<!-- Google Fonts
		============================================ -->		
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Font awesome CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="lib/css/nivo-slider.css" type="text/css" />
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="css/main.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="css/style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
		
		
		<style>
@import url(http://fonts.googleapis.com/css?family=Raleway:200,500,700,800);

@font-face {
	font-weight: normal;
	font-style: normal;
	font-family: 'codropsicons';
	src:url('../fonts/codropsicons/codropsicons.eot');
	src:url('../fonts/codropsicons/codropsicons.eot?#iefix') format('embedded-opentype'),
		url('../fonts/codropsicons/codropsicons.woff') format('woff'),
		url('../fonts/codropsicons/codropsicons.ttf') format('truetype'),
		url('../fonts/codropsicons/codropsicons.svg#codropsicons') format('svg');
}

*, *:after, *:before { -webkit-box-sizing: border-box; box-sizing: border-box; }
.clearfix:before, .clearfix:after { content: ''; display: table; }
.clearfix:after { clear: both; }

a {
	color: #2fa0ec;
	text-decoration: none;
	outline: none;
}

a:hover, a:focus {
	color: #74777b;
}



.content {
	font-size: 150%;
	padding: 3em 0;
}

.content h2 {
	margin: 0 0 2em;
	opacity: 0.1;
}

.content p {
	margin: 1em 0;
	padding: 5em 0 0 0;
	font-size: 0.65em;
}

#resume{position: absolute;
    left: 52%;
    font-size: 13px;
    padding: 8px;
    top: 64%;
    border: 2px solid #6a7989;
    color: #6a7989;}

.bgcolor-1 { background: #f0efee; }
.bgcolor-2 { background: #f9f9f9; }
.bgcolor-3 { background: #e8e8e8; }
.bgcolor-4 { background: #2f3238; color: #fff; }
.bgcolor-5 { background: #df6659; color: #521e18; }
.bgcolor-6 { background: #2fa8ec; }
.bgcolor-7 { background: #d0d6d6; }
.bgcolor-8 { background: #3d4444; color: #fff; }

article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block;}audio,canvas,video{display:inline-block;}audio:not([controls]){display:none;height:0;}[hidden]{display:none;}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;}body{margin:0;}a:focus{outline:thin dotted;}a:active,a:hover{outline:0;}h1{font-size:2em;margin:0.67em 0;}abbr[title]{border-bottom:1px dotted;}b,strong{font-weight:bold;}dfn{font-style:italic;}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0;}mark{background:#ff0;color:#000;}code,kbd,pre,samp{font-family:monospace,serif;font-size:1em;}pre{white-space:pre-wrap;}q{quotes:"\201C" "\201D" "\2018" "\2019";}small{font-size:80%;}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline;}sup{top:-0.5em;}sub{bottom:-0.25em;}img{border:0;}svg:not(:root){overflow:hidden;}figure{margin:0;}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em;}legend{border:0;padding:0;}button,input,select,textarea{font-family:inherit;font-size:100%;margin:0;}button,input{line-height:normal;}button,select{text-transform:none;}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer;}button[disabled],html input[disabled]{cursor:default;}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0;}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none;}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0;}textarea{overflow:auto;vertical-align:top;}table{border-collapse:collapse;border-spacing:0;}


.input {
	position: relative;
	z-index: 1;
	display: inline-block;
	margin: 1em;
	max-width: 400px;
	width: calc(100% - 2em);
	vertical-align: top;
}

.input__field {
	position: relative;
	display: block;
	float: right;
	padding: 0.8em;
	width: 60%;
	border: none;
	border-radius: 0;
	background: #f0f0f0;
	color: #aaa;
	font-weight: bold;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	-webkit-appearance: none; /* for box shadows to show on iOS */
}

.input__field:focus {
	outline: none;
}

.input__label {
	display: inline-block;
	float: right;
	padding: 0 1em;
	width: 40%;
	color: #6a7989;
	font-weight: bold;
	font-size: 70.25%;
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.input__label-content {
	position: relative;
	display: block;
	padding: 1.6em 0;
	width: 100%;
}

.graphic {
	position: absolute;
	top: 0;
	left: 0;
	fill: none;
}

.icon {
	color: #ddd;
	font-size: 150%;
}

/* Individual styles */

/* Haruki */

.input--haruki {
	margin: 4em 1em 1em;
}

.input__field--haruki {
	padding: 0.4em 0.25em;
	width: 100%;
	background: transparent;
	color: #AFB5BB;
	font-size: 1.55em;
}

.input__label--haruki {
	position: absolute;
	width: 100%;
	text-align: left;
	pointer-events: none;
}

.input__label-content--haruki {
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--haruki::before,
.input__label--haruki::after {
	content: '';
	position: absolute;
	left: 0;
	z-index: -1;
	width: 100%;
	height: 4px;
	background: #6a7989;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--haruki::before {
	top: 0;
}

.input__label--haruki::after {
	bottom: 0;
}

.input__field--haruki:focus + .input__label--haruki .input__label-content--haruki,
.input--filled .input__label-content--haruki {
	-webkit-transform: translate3d(0, -90%, 0);
	transform: translate3d(0, -90%, 0);
}

.input__field--haruki:focus + .input__label--haruki::before,
.input--filled .input__label--haruki::before {
	-webkit-transform: translate3d(0, -0.5em, 0);
	transform: translate3d(0, -0.5em, 0);
}

.input__field--haruki:focus + .input__label--haruki::after,
.input--filled .input__label--haruki::after {
	-webkit-transform: translate3d(0, 0.5em, 0);
	transform: translate3d(0, 0.5em, 0);
}

/* Hoshi */
.input--hoshi {
	overflow: hidden;
}

.input__field--hoshi {
	margin-top: 1em;
	padding: 0.85em 0.15em;
	width: 100%;
	background: transparent;
	color: #595F6E;
font-size:25px;
height:68px;
}

.input__label--hoshi {
	position: absolute;
	bottom: 0;
	left: 0;
	padding: 0 0.25em;
	width: 100%;
	height: calc(100% - 1em);
	text-align: left;
	pointer-events: none;
}

.input__label-content--hoshi {
	position: absolute;
}

.input__label--hoshi::before,
.input__label--hoshi::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: calc(100% - 10px);
	border-bottom: 1px solid #B9C1CA;
}

.input__label--hoshi::after {
	margin-top: 2px;
	border-bottom: 4px solid red;
	-webkit-transform: translate3d(-100%, 0, 0);
	transform: translate3d(-100%, 0, 0);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--hoshi-color-1::after {
	border-color: hsl(192, 69%, 48%);
}

.input__label--hoshi-color-2::after {
	border-color: hsl(160, 100%, 50%);
}

.input__label--hoshi-color-3::after {
	border-color: hsl(20, 100%, 50%);
}

.input__field--hoshi:focus + .input__label--hoshi::after,
.input--filled .input__label--hoshi::after {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

.input__field--hoshi:focus + .input__label--hoshi .input__label-content--hoshi,
.input--filled .input__label-content--hoshi {
	-webkit-animation: anim-1 0.3s forwards;
	animation: anim-1 0.3s forwards;
}

@-webkit-keyframes anim-1 {
	50% {
		opacity: 0;
		-webkit-transform: translate3d(1em, 0, 0);
		transform: translate3d(1em, 0, 0);
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(-1em, -40%, 0);
		transform: translate3d(-1em, -40%, 0);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, -40%, 0);
		transform: translate3d(0, -40%, 0);
	}
}

@keyframes anim-1 {
	50% {
		opacity: 0;
		-webkit-transform: translate3d(1em, 0, 0);
		transform: translate3d(1em, 0, 0);
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(-1em, -40%, 0);
		transform: translate3d(-1em, -40%, 0);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, -40%, 0);
		transform: translate3d(0, -40%, 0);
	}
}

/* Kuro */
.input--kuro {
	max-width: 320px;
	margin-bottom: 3em;
}

.input__field--kuro {
	width: 100%;
	background: transparent;
	color: #9196A1;
	opacity: 0;
	text-align: center;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
}

.input__label--kuro {
	position: absolute;
	left: 0;
	width: 100%;
	color: #df6589;
	pointer-events: none;
}

.input__label--kuro::before,
.input__label--kuro::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 50%;
	height: 100%;
	border: 4px solid #747981;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--kuro::before {
	border-right: none;
}

.input__label--kuro::after {
	left: 50%;
	border-left: none;
}

.input__field--kuro:focus,
.input--filled .input__field--kuro {
	opacity: 1;
	-webkit-transition-delay: 0.3s;
	transition-delay: 0.3s;
}

.input__field--kuro:focus + .input__label--kuro::before,
.input--filled .input__label--kuro::before {
	-webkit-transform: translate3d(-10%, 0, 0);
	transform: translate3d(-10%, 0, 0);
}

.input__field--kuro:focus + .input__label--kuro::after,
.input--filled .input__label--kuro::after {
	-webkit-transform: translate3d(10%, 0, 0);
	transform: translate3d(10%, 0, 0);
}

.input__field--kuro:focus + .input__label--kuro .input__label-content--kuro,
.input--filled .input__label-content--kuro {
	-webkit-animation: anim-2 0.3s forwards;
	animation: anim-2 0.3s forwards;
}

@-webkit-keyframes anim-2 {
	50% {
		opacity: 0;
		-webkit-transform: scale3d(0.3, 0.3, 1);
		transform: scale3d(0.3, 0.3, 1);
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(0, 3.7em, 0) scale3d(0.3, 0.3, 1);
		transform: translate3d(0, 3.7em, 0) scale3d(0.3, 0.3, 1);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 3.7em, 0);
		transform: translate3d(0, 3.7em, 0);
	}
}

@keyframes anim-2 {
	50% {
		opacity: 0;
		-webkit-transform: scale3d(0.3, 0.3, 1);
		transform: scale3d(0.3, 0.3, 1);
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(0, 3.7em, 0) scale3d(0.3, 0.3, 1);
		transform: translate3d(0, 3.7em, 0) scale3d(0.3, 0.3, 1);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 3.7em, 0);
		transform: translate3d(0, 3.7em, 0);
	}
}

/* Jiro */
.input--jiro {
	margin-top: 2em;
}

.input__field--jiro {
	padding: 0.85em 0.5em;
	width: 100%;
	background: transparent;
	color: #DDE2E2;
	opacity: 0;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
}

.input__label--jiro {
	position: absolute;
	left: 0;
	padding: 0 0.85em;
	width: 100%;
	height: 100%;
	text-align: left;
	pointer-events: none;
}

.input__label-content--jiro {
	-webkit-transition: -webkit-transform 0.3s 0.3s;
	transition: transform 0.3s 0.3s;
}

.input__label--jiro::before,
.input__label--jiro::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--jiro::before {
	border-top: 2px solid #6a7989;
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -2px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -2px, 0);
	-webkit-transition-delay: 0.3s;
	transition-delay: 0.3s;
}

.input__label--jiro::after {
	z-index: -1;
	background: #6a7989;
	-webkit-transform: scale3d(1, 0, 1);
	transform: scale3d(1, 0, 1);
	-webkit-transform-origin: 50% 0%;
	transform-origin: 50% 0%;
}

.input__field--jiro:focus,
.input--filled .input__field--jiro {
	opacity: 1;
	-webkit-transition-delay: 0.3s;
	transition-delay: 0.3s;
}

.input__field--jiro:focus + .input__label--jiro .input__label-content--jiro,
.input--filled .input__label-content--jiro {
	-webkit-transform: translate3d(0, -80%, 0);
	transform: translate3d(0, -80%, 0);
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.input__field--jiro:focus + .input__label--jiro::before,
.input--filled .input__label--jiro::before {
	-webkit-transition-delay: 0s;
	transition-delay: 0s;
}

.input__field--jiro:focus + .input__label--jiro::before,
.input--filled .input__label--jiro::before {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

.input__field--jiro:focus + .input__label--jiro::after,
.input--filled .input__label--jiro::after {
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
	-webkit-transition-delay: 0.3s;
	transition-delay: 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

/* Minoru */
.input__field--minoru {
	width: 100%;
	background: #fff;
	box-shadow: 0px 0px 0px 2px transparent;
	color: #eca29b;
	-webkit-transition: box-shadow 0.3s;
	transition: box-shadow 0.3s;
}

.input__label--minoru {
	padding: 0;
	width: 100%;
	text-align: left;
}

.input__label--minoru::after {
	content: '';
  	position: absolute;
  	top: 0;
  	z-index: -1;
  	width: 100%;
  	height: 4em;
	box-shadow: 0px 0px 0px 0px;
	color: rgba(199,152,157, 0.6);
}

.input__field--minoru:focus {
	box-shadow: 0px 0px 0px 2px #eca29b;
}

.input__field--minoru:focus + .input__label--minoru {
	pointer-events: none;
}

.input__field--minoru:focus + .input__label--minoru::after {
	-webkit-animation: anim-shadow 0.3s forwards;
	animation: anim-shadow 0.3s forwards;
}

@-webkit-keyframes anim-shadow {
	to {
		box-shadow: 0px 0px 100px 50px;
    	opacity: 0;
	}
}

@keyframes anim-shadow {
	to {
		box-shadow: 0px 0px 100px 50px;
    	opacity: 0;
	}
}

.input__label-content--minoru {
	padding: 0.75em 0.15em;
}

/* Yoko */
.input__field--yoko {
	z-index: 10;
	width: 100%;
	background: transparent;
	color: #f5f5f5;
	opacity: 0;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
}

.input__label--yoko {
	position: relative;
	width: 100%;
	color: #b04b40;
	text-align: left;
}

.input__label--yoko::before {
	content: '';
	position: absolute;
	bottom: 100%;
	left: 0;
	width: 100%;
	height: 4em;
	background: #c5564a;
	-webkit-transform: perspective(1000px) rotate3d(1, 0, 0, 90deg);
	transform: perspective(1000px) rotate3d(1, 0, 0, 90deg);
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--yoko::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 0.25em;
	background: #ad473c;
	-webkit-transform-origin: 50% 0%;
	transform-origin: 50% 0%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label-content--yoko {
	padding: 0.75em 0;
}

.input__field--yoko:focus,
.input--filled .input__field--yoko {
	opacity: 1;
	-webkit-transition-delay: 0.3s;
	transition-delay: 0.3s;
}

.input__field--yoko:focus + .input__label--yoko::before,
.input--filled .input__label--yoko::before {
	-webkit-transform: perspective(1000px) rotate3d(1, 0, 0, 0deg);
	transform: perspective(1000px) rotate3d(1, 0, 0, 0deg);
}

.input__field--yoko:focus + .input__label--yoko,
.input--filled .input__label--yoko {
	pointer-events: none;
}

.input__field--yoko:focus + .input__label--yoko::after,
.input--filled .input__label--yoko::after {
	-webkit-transform: perspective(1000px) rotate3d(1, 0, 0, -90deg);
	transform: perspective(1000px) rotate3d(1, 0, 0, -90deg);
}

/* Kyo */
.input--kyo {
	z-index: auto;
}

.input__field--kyo {
	padding: 0.85em 1.5em;
	width: 100%;
	border-radius: 2em;
	background: #fff;
	color: #535d92;
}

.input__label--kyo {
	z-index: 0;
	padding: 0 0 0 2em;
	width: 100%;
	text-align: left;
}

.input__label--kyo::after {
	content: '';
	position: fixed;
	top: 0;
	left: 0;
	z-index: 1000;
	width: 100%;
	height: 100%;
	background: rgba(11, 43, 205, 0.6);
	opacity: 0;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
	pointer-events: none;
}

.input__label-content--kyo {
	padding: 0.5em 0;
}

.input__field--kyo:focus,
.input__field--kyo:focus +  .input__label--kyo .input__label-content--kyo {
	z-index: 10000;
}

.input__field--kyo:focus + .input__label--kyo {
	color: #fff;
}

.input__field--kyo:focus + .input__label--kyo::after {
	opacity: 1;
}

/* Akira */
.input--akira {
	margin-top: 2em;
}

.input__field--akira {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 10;
	display: block;
	padding: 0 1em;
	width: 100%;
	height: 100%;
	background: transparent;
	text-align: center;
}

.input__label--akira {
	padding: 0;
	width: 100%;
	background: #696a6e;
	color: #cc6055;
	cursor: text;
}

.input__label--akira::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #2f3238;
	-webkit-transform: scale3d(0.97, 0.85, 1);
	transform: scale3d(0.97, 0.85, 1);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label-content--akira {
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__field--akira:focus + .input__label--akira::before,
.input--filled .input__label--akira::before {
	-webkit-transform: scale3d(0.99, 0.95, 1);
	transform: scale3d(0.99, 0.95, 1);
}

.input__field--akira:focus + .input__label--akira,
.input--filled .input__label--akira {
	cursor: default;
	pointer-events: none;
}

.input__field--akira:focus + .input__label--akira .input__label-content--akira,
.input--filled .input__label-content--akira {
	-webkit-transform: translate3d(0, -3.5em, 0);
	transform: translate3d(0, -3.5em, 0);
}

/* Ichiro */
.input--ichiro {
	margin-top: 2em;
}

.input__field--ichiro {
	position: absolute;
	top: 4px;
	left: 4px;
	z-index: 100;
	display: block;
	padding: 0 0.55em;
	width: calc(100% - 8px);
	height: calc(100% - 8px);
	background: #f0f0f0;
	color: #7F8994;
	opacity: 0;
	-webkit-transform: scale3d(1, 0, 1);
	transform: scale3d(1, 0, 1);
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
	-webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
	transition: opacity 0.3s, transform 0.3s;
}

.input__label--ichiro {
	width: 100%;
	text-align: left;
	cursor: text;
}

.input__label--ichiro::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #fff;
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label-content--ichiro {
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__field--ichiro:focus,
.input--filled .input__field--ichiro {
	opacity: 1;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}

.input__field--ichiro:focus + .input__label--ichiro,
.input--filled .input__label--ichiro {
	cursor: default;
	pointer-events: none;
}

.input__field--ichiro:focus + .input__label--ichiro::before,
.input--filled .input__label--ichiro::before {
	-webkit-transform: scale3d(1, 1.5, 1);
	transform: scale3d(1, 1.5, 1);
}

.input__field--ichiro:focus + .input__label--ichiro .input__label-content--ichiro,
.input--filled .input__label-content--ichiro {
	-webkit-transform: translate3d(0, -3.15em, 0) scale3d(0.8, 0.8, 1);
	transform: translate3d(0, -3.15em, 0) scale3d(0.8, 0.8, 1) translateZ(1px);
}

/* Juro */
.input--juro {
	overflow: hidden;
}

.input__field--juro {
	position: absolute;
	z-index: 100;
	padding: 2.15em 0.75em 0;
	width: 100%;
	background: transparent;
	color: #1784cd;
	font-size: 0.85em;
}

.input__label--juro {
	padding: 0;
	width: 100%;
	height: 100%;
	background: #fff;
	text-align: left;
}

.input__label-content--juro {
	padding: 2em 1em;
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.3s, color 0.3s;
	transition: transform 0.3s, color 0.3s;

	text-rendering: geometricPrecision;
}

.input__label--juro::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border: 0px solid transparent;
	-webkit-transition: border-width 0.3s, border-color 0.3s;
	transition: border-width 0.3s, border-color 0.3s;
}

.input__field--juro:focus + .input__label--juro::before,
.input--filled .input__label--juro::before {
	border-width: 8px;
	border-color: #1784cd;
	border-top-width: 2em;
}

.input__field--juro:focus + .input__label--juro .input__label-content--juro,
.input--filled .input__label--juro .input__label-content--juro {
	color: #fff;
	-webkit-transform: translate3d(0, -1.5em, 0) scale3d(0.75, 0.75, 1);
	transform: translate3d(0, -1.5em, 0) scale3d(0.75, 0.75, 1) translateZ(1px);
}

/* Hideo */
.input--hideo {
	overflow: hidden;
	background: #fff;
}

.input__field--hideo {
	padding: 0.85em 0.85em 0.85em 3em;
	width: 100%;
	background: transparent;
	-webkit-transform: translate3d(1em, 0, 0);
	transform: translate3d(1em, 0, 0);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label--hideo {
	position: absolute;
	padding: 1.25em 0 0;
	width: 4em;
	height: 100%;
}

.input__label--hideo::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	z-index: -1;
	width: 4em;
	height: 100%;
	background: #899dda;
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.icon--hideo {
	color: #fff;
	-webkit-transform: scale3d(1, 1, 1); /* Needed for Chrome bug */
	transform: scale3d(1, 1, 1);
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.input__label-content--hideo {
	position: absolute;
	top: 100%;
}

.input__field--hideo:focus {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

.input__field--hideo:focus + .input__label--hideo::before {
	-webkit-transform: scale3d(0.8, 1, 1);
	transform: scale3d(0.8, 1, 1);
}

.input__field--hideo:focus + .input__label--hideo .icon--hideo {
	-webkit-transform: scale3d(0.6, 0.6, 1);
	transform: scale3d(0.6, 0.6, 1);
}

/* Madoka */
.input--madoka {
	margin: 1.1em;
}

.input__field--madoka {
	width: 100%;
	background: transparent;
	color: #7A7593;
}

.input__label--madoka {
	position: absolute;
	width: 100%;
	height: 100%;
	color: #7A7593;
	text-align: left;
	cursor: text;
}

.input__label-content--madoka {
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.graphic--madoka {
	-webkit-transform: scale3d(1, -1, 1);
	transform: scale3d(1, -1, 1);
	-webkit-transition: stroke-dashoffset 0.3s;
	transition: stroke-dashoffset 0.3s;
	pointer-events: none;

	stroke: #7A7593;
	stroke-width: 4px;
	stroke-dasharray: 962;
	stroke-dashoffset: 558;
}

.input__field--madoka:focus + .input__label--madoka,
.input--filled .input__label--madoka {
	cursor: default;
	pointer-events: none;
}

.input__field--madoka:focus + .input__label--madoka .graphic--madoka,
.input--filled .graphic--madoka {
	stroke-dashoffset: 0;
}

.input__field--madoka:focus + .input__label--madoka .input__label-content--madoka,
.input--filled .input__label-content--madoka {
	-webkit-transform: scale3d(0.81, 0.81, 1) translate3d(0, 4em, 0);
	transform: scale3d(0.81, 0.81, 1) translate3d(0, 4em, 0);
}

/* Kaede */
.input--kaede {
	display: block;
	overflow: hidden;
	margin: 1em auto 2em;
	background: #EFEEEE;
}

.input__field--kaede {
	position: absolute;
	top: 0;
	right: 100%;
	width: 60%;
	height: 100%;
	background: #fff;
	color: #9DABBA;
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.input__label--kaede {
	z-index: 10;
	display: block;
	width: 100%;
	height: 100%;
	text-align: left;
	cursor: text;
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.input__label-content--kaede {
	padding: 1.5em 0;
}

.input__field--kaede:focus,
.input--filled .input__field--kaede {
	-webkit-transform: translate3d(100%, 0, 0);
	transform: translate3d(100%, 0, 0);
	-webkit-transition-delay: 0.06s;
	transition-delay: 0.06s;
}

.input__field--kaede:focus + .input__label--kaede,
.input--filled .input__label--kaede  {
	-webkit-transform: translate3d(60%, 0, 0);
	transform: translate3d(60%, 0, 0);
	pointer-events: none;
}

@media screen and (max-width: 34em) {
	.input__field--kaede:focus + .input__label--kaede,
	.input--filled .input__label--kaede  {
		-webkit-transform: translate3d(65%, 0, 0) scale3d(0.65, 0.65, 1);
		transform: translate3d(65%, 0, 0) scale3d(0.65, 0.65, 1);
		pointer-events: none;
	}
}

/* Isao */
.input__field--isao {
	z-index: 10;
	padding: 0.75em 0.1em 0.25em;
	width: 100%;
	background: transparent;
	color: #afb3b8;
}

.input__label--isao {
	position: relative;
	overflow: hidden;
	padding: 0;
	width: 100%;
	color: #dadada;
	text-align: left;
}

.input__label--isao::before {
	content: '';
	position: absolute;
	top: 0;
	width: 100%;
	height: 7px;
	background: #dadada;
	-webkit-transform: scale3d(1, 0.4, 1);
	transform: scale3d(1, 0.4, 1);
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
	-webkit-transition: -webkit-transform 0.3s, background-color 0.3s;
	transition: transform 0.3s, background-color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.input__label--isao::after {
	content: attr(data-content);
	position: absolute;
	top: 0;
	left: 0;
	padding: 0.75em 0.15em;
	color: #da7071;
	opacity: 0;
	-webkit-transform: translate3d(0, 50%, 0);
	transform: translate3d(0, 50%, 0);
	-webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
	transition: opacity 0.3s, transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	pointer-events: none;
}

.input__field--isao:focus + .input__label--isao::before {
	background-color: #da7071;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}

.input__field--isao:focus + .input__label--isao {
	pointer-events: none;
}

.input__field--isao:focus + .input__label--isao::after {
	opacity: 1;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

.input__label-content--isao {
	padding: 0.75em 0.15em;
	-webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
	transition: opacity 0.3s, transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.input__field--isao:focus + .input__label--isao .input__label-content--isao {
	opacity: 0;
	-webkit-transform: translate3d(0, -50%, 0);
	transform: translate3d(0, -50%, 0);
}













		

.toch-review-title{margin-bottom:50px;margin-top:20px;}
.toch-review-title2{margin-bottom:50px;margin-top:90px;margin-left: 20px;}
.toch-review-title3{margin-bottom:50px;margin-top:90px;margin-left: 20px;}

.hd{color: #26acce;
    border-bottom: 1px solid;
    padding-bottom: 5px;}
	
.im{width: 80px;
    float: left;
    position: relative;
    left: 30px;}

.txxt{margin-top: 18px;
    position: relative;
    left: 57px;}


#bannrdiv{font-size:20px;text-align:center;float:none;margin: 0px auto;margin-bottom:30px;    margin: -47px auto;}

#firstdiv{margin-bottom:80px;}	

#centerlisediv{padding:6px;background:#26acce; font-size:20px;text-align:center;float:none;margin: 0px auto;}

.story {
    background: rgba(237, 234, 225, 0.3);
    position: relative;
    padding: 40px;
    margin-bottom: 30px;
}

.story .image {
    -moz-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    height: 155px;
    width: 155px;
    overflow: hidden;
    position: absolute;
    left: -20px;
    top: 30px;
}
.story blockquote {
    margin-left: 100px;
}

		</style>
		

    </head>
    <body style="background:#fff;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content" style="padding: 51px 0px;">
		

			<div class="container">
	            
				<div class="row">
				<div class="col-md-12" id="firstdiv">
				<div class="col-md-11" id="bannrdiv">
				<img src="images/slide1.jpg" width="1200px">
				
				</div>
				</div>
				
				
				<div class="col-md-12">
				<div class="col-md-10" style="margin:0px auto; float:none;">
				
				
                   
                   <?= $data['editor1'];?>

                    <!--/ .story-->
                </div>


				
				
				
				
				
				
				
				
				
				</div>
				
				
				<div class="col-md-12">
				
				
				
				
<div class="col-md-10" id="centerlisediv">
				           
                                                <h2 style="color:#fff;">We are Hiring</h2>

                                             
                                            
                                      
  </div></div>
				
				<form action="mailer.php" method="post">
				<div class="col-md-12">
<div class="col-md-10" style="box-shadow: 0px 0px 7px -2px #000;padding-top:2px;/* padding-left: 0px;*//* padding-right: 0px; */margin: 0px auto;float: none;/* margin-left:3%; */">
				            <div class="toch-review-title">
							




<section class="content">
				
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text" name="name" id="input-4" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1"  for="input-4">
						<span class="input__label-content input__label-content--hoshi">First Name</span>
					</label>
				</span>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text" name="lname" id="input-5" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1"  for="input-5">
						<span class="input__label-content input__label-content--hoshi">Last Name</span>
					</label>
				</span>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text" name="email" id="input-6" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1"  for="input-6">
						<span class="input__label-content input__label-content--hoshi">Email</span>
					</label>
				</span>

            <span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text" name="mobile" id="input-6" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1"  for="input-6">
						<span class="input__label-content input__label-content--hoshi">Mobile</span>
					</label>
				</span>

<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text"  name="skills"  id="input-6" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-6">
						<span class="input__label-content input__label-content--hoshi">Skills</span>
					</label>
				</span>

<span class="input input--hoshi"></span>

					<input type="file" name="file">	
					
				






				
			</section>

<input type="submit" name="submit" class="btn btn-primary" value="Submit" style="margin-bottom: 40px;margin-left:2%;">
                                             </div>
											 
											 
											 
											 
											 
                                                

                                                  
                                                
                                                   
                                              
                                                
                                                
  </div></div>
  </form>
                                           
						
				
						
					
				
				
					
					
			</div>
			
			
		</section>
		<!-- END PAGE-CONTENT -->
<!---------------------------------------------------popup Help productModalhelp------------------------------------------------------->
		   
		    <div class="modal fade" id="hiring" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
					<center><img src="img/logo.png"></center>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -12%;padding: 3px 7px;border: 2px solid grey;border-radius: 100%"><span aria-hidden="true">×</span></button></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<br><br><h3><b>Upload Your Resume</b></h3><hr>
<p>Attach Resume:<input type="file" style="float: right;">
<br><span style="font-size:10px;color:#ccc;color: #343434;float: right;">Supported Formats: doc, docx, rtf, pdf. Max file size: 300Kb</span></p>

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!----------------------------------------------------------End--------------------------------------------------->




<?php include("include/footer.php"); ?>


		<!-- jquery
		============================================ -->		
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="js/wow.min.js"></script>
		<!-- meanmenu JS
		============================================ -->		
        <script src="js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- countdon.min JS
		============================================ -->		
        <script src="js/countdon.min.js"></script>
        <!-- jquery-price-slider js
		============================================ --> 
        <script src="js/jquery-price-slider.js"></script>
        <!-- Nivo slider js
		============================================ --> 		
		<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="js/main.js"></script>
    </body>


</html>
