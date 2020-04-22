<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Verify - Airforcegaming.com</title></head>
    <style>
      body {
        background: #212121;
        color: #fff;
        font-weight: 600;
      }

      .header {
        width: 445px;
        margin: 0px auto;
        padding-top: 60px;
      }

      .logo {
        float: left;
        max-width: 300px;
      }

      .content {
        clear: left;
        position: relative;
        top: 60px;
        max-width: 60%;
        margin: 0px auto;
        padding: 10px 20px 20px 20px;
        border-radius: 5px;
        background: #512da8;
        text-align: center;
      }

      p {
        padding-bottom: 10px;
      }

      p.lead {
        font-size: 130%;
      }

      .button {
        height: 54px;
        line-height: 54px;
        font-size: 18pt;
        padding: 15px;
        border-radius: 10px;
        background-color: #2196F3 !important;
        color: #fff;
        text-decoration: none;
      }
    </style>
  </head>

  <body>
    <div class="header">
      <img class="logo" src="https://cdn.glitch.com/49e8ab49-5e2e-401b-870e-d906216158c8%2Fimage01.png?v=1581937770829"></img>
      <h4>Airforcegaming.com</h4>
      <h5>#FlyFightWin</h5>
    </div>
    <div class="content">
      <p>We've recieved a request to link your Discord</p>
      <p class="lead"><i>{{ Auth::User()->discordUsername }}</i></p>
      <p>to</p>
      <p class="lead"><i>{{ Auth::User()->usaf_email }}</i></p>
      <p>Please forward this email to your personal email then click the link below to finalize your account creation.</p>
      <a class="button" href="{{ url('/verify') }}/{{  Auth::User()->usaf_verification }}" style="word-break: break-word;">Verify now</a>
    </div>
  </body>
</html>