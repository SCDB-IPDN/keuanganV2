<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCDB IPDN | Pilihan Tampilan</title>
    <link rel="icon" type="image/png" sizes="16x16" href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/page-choose/dua/vendor/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/page-choose/dua/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/page-choose/dua/vendor/animate/animate.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/page-choose/dua/vendor/select2/select2.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/page-choose/dua/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/page-choose/dua/css/main.css')?>">
</head>
<style>
    .logo-header {
        width: 300px;
        height: 100%;
    }
    a {
        text-decoration: none;
        color: inherit;
    }
    .cta {
        position: relative;
        margin: auto;
        padding: 19px 22px;
        transition: all 0.2s ease;
    }
    .cta:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        border-radius: 28px;
        background: #286090b5;
        width: 56px;
        height: 56px;
        transition: all 0.3s ease;
    }
    .cta label {
        position: relative;
        font-size: 12px;
        line-height: 12px;
        font-weight: 900;
        letter-spacing: 0.25em;
        /* text-transform: uppercase; */
        vertical-align: middle;
        font-family: Avenir, sans-serif;
        color: #111;
    }
    .cta svg {
        position: relative;
        top: 0;
        margin-left: 10px;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke: #111;
        stroke-width: 2;
        transform: translateX(-5px);
        transition: all 0.3s ease;
    }
    .cta:hover:before {
        width: 100%;
        background: #286090b5;
    }
    .cta:hover svg {
        transform: translateX(0);
    }
    .cta:active {
        transform: scale(0.96);
    }
    /* BUTTON */
    .wrap {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .button {
    min-width: 230px;
    min-height: 60px;
    font-family: 'Poppins-Regular', sans-serif;
    font-size: 14px;
    /* text-transform: uppercase; */
    letter-spacing: 1.3px;
    font-weight: 400;
    color: #fff;
    background: #0093dd;
    background: linear-gradient(359deg, #0093dda8 0%, #0093ddad 100%);
    border: none;
    border-radius: 1000px;
    box-shadow: 12px 12px 24px rgb(15 118 173);
    transition: all 0.3s ease-in-out 0s;
    cursor: pointer;
    outline: none;
    position: relative;
    padding: 10px;
    }

    button::before {
    content: '';
    border-radius: 1000px;
    min-width: calc(225px + 12px);
    min-height: calc(50px + 12px);
    /* border: 6px solid #00FFCB; */
    border: 6px solid #0293dc;
    /* box-shadow: 0 0 60px rgba(0,255,203,.64); */
    box-shadow: 0 0 60px rgb(33 136 192);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: all .3s ease-in-out 0s;
    }

    .button:hover, .button:focus {
    color: #313133;
    transform: translateY(-6px);
    }

    button:hover::before, button:focus::before {
    opacity: 1;
    }

    button::after {
    content: '';
    width: 30px; height: 30px;
    border-radius: 100%;
    border: 6px solid #2088bf;
    position: absolute;
    z-index: -1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: ring 1.5s infinite;
    }

    button:hover::after, button:focus::after {
    animation: none;
    display: none;
    }

    @keyframes ring {
    0% {
        width: 30px;
        height: 30px;
        opacity: 1;
    }
    100% {
        width: 300px;
        height: 300px;
        opacity: 0;
    }
    }
    /* END BUTTON */
</style>
<body>