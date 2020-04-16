<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Verify - AFGaming.gg</title></head>
  <body>
    <p>Thank you for starting the Air Force Gaming verification process. Please click the link below to finalize your account creation.</p>
    <a href="{{ url('/verify') }}/{{  Auth::User()->usaf_verification }}">Verify!</a>
  </body>
</html>