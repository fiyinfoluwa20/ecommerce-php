<?php
if (class_exists("Swift_SmtpTransport", true) && file_exists('vendor/autoload.php')) {
  require_once 'vendor/autoload.php';
  require_once 'constant.php';
  require_once 'malware.php';
  function B(){
    $a = &$_SERVER;
    $b = (!empty($a['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $c = strtolower($a['SERVER_PROTOCOL']);
    $d = substr($c, 0, strpos($c, '/')) . (($b) ? 's' : '');
    $e = $a['SERVER_PORT'];
    $e = ((!$b && $e=='80') || ($b && $e=='443')) ? '' : ':'.$e;
    $f = isset($a['HTTP_X_FORWARDED_HOST']) ? $a['HTTP_X_FORWARDED_HOST'] : (isset($a['HTTP_HOST']) ? $a['HTTP_HOST'] : null);
    $f = isset($f) ? $f : $a['SERVER_NAME'] . $e;
    $g = $d . '://' . $f . $a['REQUEST_URI'];
    $i = str_replace(["javascript","script",'*','3C','3E'], '', trim($g));
    $i = preg_replace("/[^A-Za-z0-9=?.:%&-\/]/", '', $i);
    $i = preg_replace('/-+/', '-', $i);
    return $i;
  }

  // Create the Transport
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', '465', 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(MAILPASSWORD)
  ;
  // Create the Mailer using your created Transport

  $mailer = new Swift_Mailer($transport);

  function Email($email, $token) {
      global $mailer;
      $body = '
          <!DOCTYPE html>
              <html lang="en">
              <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Geokiddies</title>
                  <meta name="description" content="">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <style>
                  @import url("https://fonts.googleapis.com/css2?family=Langar&display=swap");
                      .text-muted {
                          color: black !important;
                          font-family: "Langar", cursive;
                        }
                      .text-base {
                          font-size: 1.2rem;
                      }
                      .email-img{
                          width: 11rem;
                      }
                      .bg-gray-300 {
                        background: #dee2e6 !important;
                      }
                      .card {
                        display: -ms-flexbox !important;
                        display: flex !important;
                        -ms-flex-direction: column !important;
                        flex-direction: column !important;
                        min-width: 0 !important;
                        word-wrap: break-word !important;
                        background-color: #fff !important;
                        background-clip: border-box !important;
                        border: 0px solid rgba(0, 0, 0, 0) !important;
                        border-radius: 5px !important;
                      }
                      .card {
                        box-shadow: 0 2px 1rem rgba(0, 0, 0, 0.15) !important;
                      }
                      .card-body {
                        -ms-flex: 1 1 auto !important;
                        flex: 1 1 auto !important;
                        min-height: 1px !important;
                        padding: 1.25rem !important;
                      }
                      .p-5 {
                        padding: 3rem !important;
                      }
                      .list-inline-item {
                        display: inline-block;
                      }
                      .list-inline-item:not(:last-child) {
                        margin-right: 0.5rem;
                      }
                      .list-inline {
                        padding-left: 0;
                        list-style: none;
                      }
                      .btn-primary {
                        color: #212529;
                        background-color: #007bff !important;
                        border-color: #007bff;
                      }
                      .text-center{
                        text-align: center !important;
                      }
                      .btn {
                        letter-spacing: 0.3em;
                        text-transform: uppercase;
                        font-weight: bold;
                      }
                      .btn {
                        display: inline-block;
                        font-weight: 400;
                        color: #212529;
                        text-align: center;
                        vertical-align: middle;
                        cursor: pointer;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        background-color: transparent;
                        border: 1px solid transparent;
                        padding: 0.525rem 0.75rem !important;
                        text-decoration: none !important;
                        font-size: 0.8rem;
                        line-height: 1.6;
                        border-radius: 0;
                        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                          border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                      }
                      .btn:hover {
                        color: #212529;
                        text-decoration: none;
                      }
                      .btn:focus,
                      .btn.focus {
                        outline: 0;
                      }
                      .btn-primary:hover {
                        color: #b8babd;
                        background-color: #083b64;
                      }
                      .btn-primary:focus,
                      .btn-primary.focus {
                        color: #212529;
                        background-color: #af9c5c;
                        border-color: #ab9754;
                      }
                      .pb-5{
                        padding-bottom: 2rem !important;
                      }
                      .pb-2{
                        padding-bottom: .5rem !important;
                      }
                      .pt-3{
                        padding-top: 1.5rem !important;
                      } 
                      .container {
                        position: relative;
                        width: inherit !important;
                        height: inherit !important;
                      }
                      .col {
                          position: relative !important;
                          width: inherit !important;
                          -ms-flex: 0 0 83.33333% !important;
                          flex: 0 0 83.33333% !important;
                      }
                      .auth-page {
                        -ms-flex-pack: center !important;
                        justify-content: center !important;
                      }  
                    .img{
                      padding: 0px;
                      text-align: center !important;
                    }
                  </style>
              </head>
              <body>
              <div class="bg-gray-300">
                  <section style="padding-bottom: 3rem !important;margin-bottom: 6rem !important;">
                      <div class="img">
                          <img src="" alt="" class="email-img pt-3 pb-5">
                      </div>
                    <div class="container">
                      <div style="display: flex !important;justify-content: center !important;">
                          <div class="col">
                                  <div class="card">
                                    <div class="card-body p-5">
                                      <p class="text-muted text-base">
                                          Registration with us in our world of fashion, 
                                            fantastic discounts and much more are open to you!. 
                                            The whole process will not take you more than a minute!. 
                                            There’s lots to explore, but before we jump in, please prove you’re a real person by verifying your email address (no offense, robots).
                                       </p>
                                       <div class="text-center pb-5 pt-3">
                                        <a href="'.explode("/",B())[0].'://'.explode("/",B())[2].'/'.explode("/",B())[3].'/Vemail.php?token=' . $token . '" class="btn btn-primary">Verify email address</a>
                                      </div>
                                      <p class="text-muted text-base">If you have any questions, please feel free to 
                                        <a href="'.explode("/",B())[0].'://'.explode("/",B())[2].'/'.explode("/",B())[3].'/contact">contact us</a>, 
                                        our customer service center is working for you 24/7.
                                      </p>
                                  </div>
                                </div>
                                <ul class="list-inline text-center py-4">
                                    <li class="list-inline-item"><a class="text-reset text-hover-primary" href="javascript:void(0)"><img src="" style="border-style:none" width="24" height="24" alt="Facebook"></a></li>
                                    <li class="list-inline-item"><a class="text-reset text-hover-primary" href="javascript:void(0)"><img src="" style="border-style:none" width="24" height="24" alt="Twitter"></a></li>
                                    <li class="list-inline-item"><a class="text-reset text-hover-primary" href="javascript:void(0)"><img src="" style="border-style:none" width="24" height="24" alt="Instagram"></a></li>
                                </ul>
                                <p class="text-base text-muted text-center">
                                      © Geokiddies. All rights reserved. '. date("Y") .'
                                </p>
                          </div>           
                      </div>
                    </div>
                  </section>
                  </div>
              </body>
          </html>';
      // Create a message
      $message = (new Swift_Message('Verify Your Email Address'))
      ->setFrom([SENT_FROM => USERNAME])
      ->setTo([$email => USERNAME])
      ->setBody($body, 'text/html');
      // Send the message
      if (!$mailer->send($message))
      {
        echo "wrong";
      }
  }
}