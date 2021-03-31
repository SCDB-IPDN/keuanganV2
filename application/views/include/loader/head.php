<!DOCTYPE html>
<html>
<head>
  <title>Silahkan Tunggu &copy; Offical Website SCDB IPDN</title>
  <link rel="icon" type="image/png" sizes="16x16" href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png">
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: white;
    color: #3c3c50;
    font-family: "Roboto";
    font-weight: 800;
    font-size: 3em;
    overflow: hidden;
  }

  section {
    position: relative;
    z-index: 1;
  }
  section::after {
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2.5em;
    letter-spacing: 0.5em;
    content: attr(data-identity);
    color: #eaeaf2;
    z-index: -1;
    -webkit-animation: animLetterSpacing 4500ms infinite ease-in-out;
            animation: animLetterSpacing 4500ms infinite ease-in-out;
  }

  .pen__lines-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    display: flex;
  }

  .pen__line {
    flex: 1;
    border-right: solid 1px #eaeaf2;
    opacity: 0.8;
    position: relative;
  }

  span {
    font-family: "Roboto";
    font-style: italic;
    display: inline-block;
    color: #0a1f44;
  }

  @-webkit-keyframes animLetterSpacing {
    0% {
      letter-spacing: 2.5em;
      opacity: 0;
    }
    40% {
      opacity: 1;
      letter-spacing: 0.5em;
    }
    70% {
      letter-spacing: 0.75em;
    }
    100% {
      letter-spacing: 2.5em;
    }
  }

  @keyframes animLetterSpacing {
    0% {
      letter-spacing: 2.5em;
      opacity: 0;
    }
    40% {
      opacity: 1;
      letter-spacing: 0.5em;
    }
    70% {
      letter-spacing: 0.75em;
    }
    100% {
      letter-spacing: 2.5em;
    }
  }
</style>