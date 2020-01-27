<?php
require_once __DIR__ . '/functions.php';

$lang = "";

if (isset($_GET['lang'])) {
    $lang = filter($_GET['lang']);
    if ($lang == "ru_RU") {
        $language = LangRU();
    }
   /* if ($lang == "en_US") {
        $language = LangEN();
    } */
    if ($lang == "zn_CN") {
        $language = LangCN();
    }
} else {
   $language = LangRU();
   $lang = "ru_RU";
}

$language = $language[0];

$phone1wp = '79161352444';
?>


<!DOCTYPE html>
   <html>

   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>
         <?=$language['title']; ?>
      </title>
      <meta name=viewport content="width=device-width, initial-scale=1">
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="robots" content="index, follow" />
      <meta name="keywords" content="" />
      <meta name="description" content="<?=$language['description']; ?>" />

      <!--<link rel="stylesheet/less" type="text/css" href="css/main.less">
      <script src="js/less.min.js" type="text/javascript"></script>-->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="css/main.css" rel="stylesheet" type="text/css">
      <link rel="canonical" href="http://ems.dealwd.com" />

      <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="theme-color" content="#ffffff">

   </head>

<script>

function newDelivery(e){

   console.log("new delivery()");

   $.get({"url":"/rest/external/import/delivery/raw"
         + "/" + $("[name=from_name]").val()
         + "/" + $("[name=from_mail]").val()
         + "/" + $("[name=from_phone]").val()
         + "/" + $("[name=from_country]").val()
         + "/" + $("[name=from_city]").val() + " " + $("[name=from_adr]").val()
         + "/" + $("[name=to_name]").val()
         + "/" + $("[name=to_mail]").val()
         + "/" + $("[name=to_phone]").val()
         + "/" + $("[name=to_country]").val()
         + "/" + $("[name=to_zip").val()
         + "/" + $("[name=to_region]").val() + " " + $("[name=to_city]").val() + " " + $("[name=to_adr]").val()
         + "/" + $("[name=to_track").val()
         + "/" + $("[name=more").val()
         + "/" + $("[name=input-price").val()
         + "/" + $("[name=input-weight").val()
         + "", "headers":{"accept": "application/json"}}).done(function(jsonResponse){
      console.log(jsonResponse);
      $("#form-new-delivery").hide();
      $("#new-delivery-done-number").html(jsonResponse.id);
      $("#new-delivery-done").show();
      //alert(sResponse);
   });

//   alert($("[name=from_name]").val());
//   e.stopPropagation();
   return false;
}

</script>

   <body>

      <div class="w100 modal client" style="display:block; border: none; max-width: 100%; padding: 0 0 40px;">
         <a href="/" style='display: flex; justify-content: center; align-items:center; background:#133759; padding: 10px; margin-bottom: 40px;'>
            <img src="img/logo.png" alt="">
         </a>
         <h2><?=$language['client_title']; ?></h2>
         <div class="steps">
         <div class="line"></div>
            <div class="item">
               <div class="count">1</div>
               <p><?=$language['client_f1']; ?></p>
            </div>
            <div class="item">
               <div class="count">2</div>
               <p><?=$language['client_f2']; ?></p>
            </div>
            <div class="item">
               <div class="count">3</div>
               <p><?=$language['client_f3']; ?></p>
            </div>
            <div class="item">
               <div class="count">4</div>
               <p><?=$language['client_f4']; ?></p>
            </div>
         </div>
         <form id="form-new-delivery" action="" onSubmit="return newDelivery()" method="get">
            <div class="block b1">
               <h3><img src="img/from.png" alt=""> <?=$language['client_from']; ?>:</h3>
               <div class="flex">
                  <input type="text"  name='from_name' placeholder="<?=$language['client_i1']; ?>" required>
                  <input type="email" name='from_mail' placeholder="<?=$language['client_i2']; ?>" required>
                  <input type="tel"   name='from_phone' placeholder="<?=$language['client_i3']; ?>" required>
                  <input type="text"  name='from_country' placeholder="<?=$language['client_i4']; ?>" required>
                  <input type="text"  name='from_city' placeholder="<?=$language['client_i5']; ?>" required>
                  <input type="text"  name='from_adr' placeholder="<?=$language['client_i6']; ?>" required>
               </div>
            </div>
            <div class="block b2">
               <h3><img src="img/to.png" alt=""> <?=$language['client_to']; ?>:</h3>
               <div class="flex">
                  <input type="text"  name='to_name' placeholder="<?=$language['client_i1']; ?>" required>
                  <input type="email" name='to_mail' placeholder="<?=$language['client_i2']; ?>" required>
                  <input type="tel"   name='to_phone' placeholder="<?=$language['client_i3']; ?>" required>
                  <input type="text"  name='to_country' placeholder="<?=$language['client_i4']; ?>" required>
                  <input type="text"  name='to_region' placeholder="<?=$language['client_i7']; ?>">
                  <input type="text"  name='to_city' placeholder="<?=$language['client_i5']; ?>" required>
                  <input type="text"  name='to_adr' placeholder="<?=$language['client_i6']; ?>" required>
                  <input type="text"  name='to_track' placeholder="<?=$language['client_i8']; ?>" required>
                  <input type="text"  name='to_zip' placeholder="<?=$language['client_i9']; ?>" required>
               </div>
            </div>
            <div class="block b3">
               <h3><?=$language['client_title2']; ?></h3>
               <div class="flex">
                  <div class="left">
                     <label>
                        <span><?=$language['client_i10']; ?></span><br>
                        <textarea name="more" cols="30" rows="10" required></textarea>
                     </label>
                  </div>
                  <div class="right">
                     <input type="text" name='input-price' placeholder="<?=$language['client_i11']; ?>" required>
                     <span><?=$language['client_i12']; ?></span>
                     <input type="hidden" name='money' id='input-money' value='$'>
                     <div class="val">
                        <div class="v">元</div>
                        <div class="v active">$</div>
                        <div class="v">₽</div>
                     </div>

                     <input type="text" name='input-weight' placeholder="<?=$language['client_weight']; ?>" required>

                  </div>
               </div>
            </div>
            <p><?=$language['client_text']; ?></p>
            <button><?=$language['form_btn']; ?></button>
            <div class="loading">
               <img src="css/fancybox_loading.gif" alt="Загрузка">
            </div>
         </form>

         <div id="new-delivery-done" style="display:none">
            <?=$language['client_order_number']; ?>
            <div id="new-delivery-done-number">
            </div>
         </div>
      </div>

      <script>
         var  imya = "<?=$language['form_name']; ?>",
            phone = "<?=$language['form_phone']; ?>",
            qq = "<?=$language['form_text']; ?>",
            err = "<?=$language['error']; ?>",
            ent_email = "<?=$language['ent_email']; ?>",
            ent_email_c = "<?=$language['ent_email_c']; ?>",
            ent_tel = "<?=$language['ent_tel']; ?>",
            ent_qq = "<?=$language['ent_qq']; ?>",
            action = "<?=$language['action']; ?>",
            cost = "<?=$language['cost']; ?>";
      </script>

      <script type="text/javascript" src="js/js.js"></script>
      <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>

      <!-- BEGIN JIVOSITE CODE {literal} -->
      <script type='text/javascript'>
      (function(){ var widget_id = 'wJSTvSIOyn';var d=document;var w=window;function l(){
      var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
      <!-- {/literal} END JIVOSITE CODE -->
   </body>

   </html>