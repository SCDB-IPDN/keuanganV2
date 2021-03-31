<!DOCTYPE html>
<html lang="en">
<head>
	<title>&copy; Institut Pemerintahan Dalam Negeri</title>
	<link rel="icon" type="image/png" sizes="16x16" href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=latin-ext" rel="stylesheet">
	<link href="<?= base_url('assets/page-themes/css/main.css');?>" rel="stylesheet">
	<script src="<?= base_url('assets/page-themes/js/vendor/modernizr-2.8.3.min.js');?>"></script>
	<script src="<?= base_url('assets/page-themes/js/vendor/jquery-1.12.0.min.js');?>"></script>
</head>
<style type="text/css">
  .star {
    animation: star 10s ease-out infinite;
  }
  .wars {
    animation: wars 10s ease-out infinite;
  }
  .byline span {
    animation: spin-letters 10s linear infinite;
  }
  .byline {
    animation: move-byline 10s linear infinite;
  }

  /* Keyframes */
  @keyframes star {
    0% {
      opacity: 0;
      transform: scale(1.5) translateY(-0.75em);
    }
    20% {
      opacity: 1;
    }
    89% {
      opacity: 1;
      transform: scale(1);
    }
    100% {
      opacity: 0;
      transform: translateZ(-1000em);
    }
  }

  @keyframes wars {
    0% {
      opacity: 0;
      transform: scale(1.5) translateY(0.5em);
    }
    20% {
      opacity: 1;
    }
    90% {
      opacity: 1;
      transform: scale(1);
    }
    100% {
      opacity: 0;
      transform: translateZ(-1000em);
    }
  }

  @keyframes spin-letters {
    0%, 10% {
      opacity: 0;
      transform: rotateY(90deg);
    }
    30% {
      opacity: 1;
    }
    70%, 86% {
      transform: rotateY(0);
      opacity: 1;
    }
    95%, 100% {
      opacity: 0;
    }
  }

  @keyframes move-byline {
    0% {
      transform: translateZ(5em);
    }
    100% {
      transform: translateZ(0);
    }
  }

  /* Make the 3D work on the container */
  .starwars-demo {
    perspective: 800px;
    transform-style: preserve3d;
  }

  /* General styles and layout */
  html {
    height:100%;
  }

  body {
    margin:0;
  }

  .bg {
    animation:slide 3s ease-in-out infinite alternate;
    background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
    bottom:0;
    left:-50%;
    opacity:.5;
    position:fixed;
    right:-50%;
    top:0;
    z-index:-1;
  }

  .bg2 {
    animation-direction:alternate-reverse;
    animation-duration:4s;
  }

  .bg3 {
    animation-duration:5s;
  }

  .content {
    background-color:rgba(255,255,255,.8);
    border-radius:.25em;
    box-shadow:0 0 .25em rgba(0,0,0,.25);
    box-sizing:border-box;
    left:50%;
    padding:10vmin;
    position:fixed;
    text-align:center;
    top:50%;
    transform:translate(-50%, -50%);
  }

  h1 {
    font-family:monospace;
  }

  @keyframes slide {
    0% {
      transform:translateX(-25%);
    }
    100% {
      transform:translateX(25%);
    }
  }

  .starwars-demo {
    height: 17em;
    left: 50%;
    position: absolute;
    top: 53%;
    transform: translate(-50%, -50%);
    width: 34em;
  }

  .byline span {
    display: inline-block;
  }

  img {
    width: 100%;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }

  .star, .wars, .byline {
    position: absolute;
  }

  .star {
    top: -12.75em;
  }

  .wars {
    bottom: -0.5em;
  }

  .byline {
    color: #fff;
    font-family: Rubik,sans-serif;
    font-size: 2.00em;
    left: -2em;
    /*letter-spacing: 0.4em;*/
    right: -2em;
    text-align: center;
    text-transform: uppercase;
    /*top: 29%;*/
    top: 100%;
  }

  @media only screen and (max-width: 600px) {
    .starwars-demo {
      font-size: 10px;
    }
  }

  @media only screen and (max-width: 480px) {
    .starwars-demo {
      font-size: 7px;
    }
  }
</style>
<body>