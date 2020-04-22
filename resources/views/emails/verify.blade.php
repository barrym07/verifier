<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Verify - AFGaming.gg</title></head>
  <body>
  <!--Changed email body text to inform the user of what to do as the link doesn't work from the AFNET domain-->
    <h1>Thank you for starting the Air Force Gaming verification process.</h1>    
    <p>Please forward this email to your personal email then click the link below to finalize your account creation.</p>
    <a href="{{ url('/verify') }}/{{  Auth::User()->usaf_verification }}">Verify!</a>
  </body>
</html>