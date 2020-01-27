<?php
require_once __DIR__ . '/functions.php';

$lang = "Оставить заявку на расчет стоимости";

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
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<link rel="canonical" href="https://dw.express" />

		<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">

	</head>

	<body>

		<div class="w100 siteTop" id='siteTop'>
			<div class="container">
				<div class="logos">
					<img class='logo' src='img/logo.png' alt=''>
					<!--<p>С‚С‹СЃСЏС‡Рё РєРёР»РѕРјРµС‚СЂРѕРІ СѓСЃРїРµС…Р°</p>-->
				</div>
				<div class="mid">
					<?=$language['head_title']; ?>
					<div class="lang">
						<a href="/" <?php if ($lang=="ru_RU" ){echo 'class="active" ';} ?>>RU</a>
						<a href="?lang=zn_CN" <?php if ($lang=="zn_CN" ){echo 'class="active" ';} ?>>CN</a>
					</div>
				</div>
			</div>
		</div>

		<a href="#siteTop" class='toTop'><?=$language['menu1']; ?></a>

		<div class="fake">
			<div class="w100" id='head'>
				<a class="pull"><img src="img/menu.jpg" alt="РњРµРЅСЋ..."></a>
				<ul class="landingMenu">

					<li>
						<a href="#calc">
							<?=$language['menu6']; ?>
						</a>
					</li>
					<li>
						<a href="#tarif">
							<?=$language['menu2']; ?>
						</a>
					</li>
					<li>
						<a href="#why">
							<?=$language['menu3']; ?>
						</a>
					</li>
					<li>
						<a href="#in">
							<?=$language['menu4']; ?>
						</a>
					</li>
					<li>
						<a href="#advantages">
							<?=$language['menu5']; ?>
						</a>
					</li>
					<li>
						<a href="#contacts">
							<?=$language['menu7']; ?>
						</a>
					</li>
					<!--<li>
						<a href="/account">
							<b><?=$language['menu8']; ?></b>
						</a>
					</li>-->
				</ul>
			</div>
		</div>

		<div class="w100 first-block">
			<!--<video id="video-bg" autoplay="" loop="" muted="" poster="video/Cloud_Surf.jpg">
				<source src="video/Cloud_Surf.webm" type="video/webm">
				<source src="video/Cloud_Surf.mp4" type="video/mp4">
				<source src="video/Cloud_Surf.ogv" type="video/ogv">
			</video>-->
			<div class="container">
				<h1>
					<?=$language['page_h1']; ?>
				</h1>
				<div class="flex">
					<div class="right">
						<div class="text">
							<div class="item">
								<div class="image"><img src='img/local-icon.png' alt=''></div>
								<p>
									<?=$language['where1']; ?>
								</p>
							</div>
							<div class="item">
								<div class="image"><img src='img/win-icon.png' alt=''></div>
								<p>
									<?=$language['weight1']; ?>
								</p>
							</div>
						</div>
						<div class="btns">
							<!--<a href="/account" class="btn" target="_self"><?=$language['main-btn1']; ?></a>
							<a href="#modal_question"  class="v1 fancybox"><?=$language['main-btn2']; ?></a>-->							
							<form action="http://home.courierexe.ru/290/tracking">
								<input type="text" class="inp_track" name="orderno" placeholder="Номер">
								<input type="submit" name="singlebutton" class="btn_track" value="Узнать местонахождение" style="background-color: #fdc434;">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="special w100">
			<div class="container">
				<h2 class="title_def">
					<?=$language['spec']; ?>
				</h2>
				<div class="flex">
					<div class="item">
						<div class="image"><img src="img/sp1.png" alt=""></div>
						<p><?=$language['spec1']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp2.png" alt=""></div>
						<p><?=$language['spec2']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp3.png" alt=""></div>
						<p><?=$language['spec3']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp4.png" alt=""></div>
						<p><?=$language['spec4']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp5.png" alt=""></div>
						<p><?=$language['spec5']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp6.png" alt=""></div>
						<p><?=$language['spec6']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp7.png" alt=""></div>
						<p><?=$language['spec7']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/sp8.png" alt=""></div>
						<p><?=$language['spec8']; ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="individ w100">
			<div class="container">
				<img src="img/individ.png" alt="">
				<p>
					<?=$language['indi']; ?>
				</p>
			</div>
		</div>

		<div class="calc w100" id="calc">
			<div class="container">
				<div class="flex">
					<div class="left">
						<h1 class="title_def white">
							<?=$language['calc_title2']; ?>
						</h1>
						<form>
							<p>
								<?=$language['from']; ?>
							</p>
							<input type="text" class="from" name="from" value="<?=$language['China']; ?>" readonly><br>
							<p>
								<?=$language['where']; ?>
							</p>
							<select class="adr" name="adr"> <br>
						<option value="kz"><?php echo $language['Kazakhstan']; ?></option>
						<!--<option value="kg"><?php echo $language['Kyrgyzstan']; ?></option>-->
						<option value="ru"><?php echo $language['Russia']; ?></option>
           		    </select>
							<select class="rucities" name="rucities"> <br>
						<option value='1'><?php echo $language['Moscow']; ?></option>
						<option value='2'><?php echo $language['SaintPetersburg']; ?></option>
						<option value='3'><?php echo $language['Abakan']; ?></option>
						<option value='4'><?php echo $language['Adler']; ?></option>
						<option value='5'><?php echo $language['Almetyevsk']; ?></option>
						<option value='6'><?php echo $language['Anapa']; ?></option>
						<option value='7'><?php echo $language['Angarsk']; ?></option>
						<option value='8'><?php echo $language['Armavir']; ?></option>
						<option value='9'><?php echo $language['Arkhangelsk']; ?></option>
						<option value='10'><?php echo $language['Astrakhan']; ?></option>
						<option value='11'><?php echo $language['Balakovo']; ?></option>
						<option value='12'><?php echo $language['Balashiha']; ?></option>
						<option value='13'><?php echo $language['Barnaul']; ?></option>
						<option value='14'><?php echo $language['Belgorod']; ?></option>
						<option value='15'><?php echo $language['Berezniki']; ?></option>
						<option value='16'><?php echo $language['Biysk']; ?></option>
						<option value='17'><?php echo $language['Birobidzhan']; ?></option>
						<option value='18'><?php echo $language['Blagoveshchensk']; ?></option>
						<option value='19'><?php echo $language['Bratsk']; ?></option>
						<option value='20'><?php echo $language['Bryansk']; ?></option>
						<option value='21'><?php echo $language['Novgorod']; ?></option>
						<option value='22'><?php echo $language['Vidnoe']; ?></option>
						<option value='23'><?php echo $language['Vladivostok']; ?></option>
						<option value='24'><?php echo $language['Vladikavkaz']; ?></option>
						<option value='25'><?php echo $language['Vladimir']; ?></option>
						<option value='26'><?php echo $language['Volgograd']; ?></option>
						<option value='27'><?php echo $language['Volgodonsk']; ?></option>
						<option value='28'><?php echo $language['Volzhsky']; ?></option>
						<option value='29'><?php echo $language['Vologda']; ?></option>
						<option value='30'><?php echo $language['Vorkuta']; ?></option>
						<option value='31'><?php echo $language['Voronezh']; ?></option>
						<option value='32'><?php echo $language['Vyborg']; ?></option>
						<option value='33'><?php echo $language['Gelendzhik']; ?></option>
						<option value='34'><?php echo $language['Gorno-Altaisk']; ?></option>
						<option value='35'><?php echo $language['Grozny']; ?></option>
						<option value='36'><?php echo $language['Dzerzhinsk']; ?></option>
						<option value='37'><?php echo $language['Dolgoprudny']; ?></option>
						<option value='38'><?php echo $language['Yegoryevsk']; ?></option>
						<option value='39'><?php echo $language['Ekaterinburg']; ?></option>
						<option value='40'><?php echo $language['Yessentuki']; ?></option>
						<option value='41'><?php echo $language['Zheleznogorsk']; ?></option>
						<option value='42'><?php echo $language['Zabaikalsk']; ?></option>
						<option value='43'><?php echo $language['Zelenograd']; ?></option>
						<option value='44'><?php echo $language['Ivanovo']; ?></option>
						<option value='45'><?php echo $language['Izhevsk']; ?></option>
						<option value='46'><?php echo $language['Yoshkar-Ola']; ?></option>
						<option value='47'><?php echo $language['Irkutsk']; ?></option>
						<option value='48'><?php echo $language['Kazan']; ?></option>
						<option value='49'><?php echo $language['Kaliningrad']; ?></option>
						<option value='50'><?php echo $language['Kaluga']; ?></option>
						<option value='51'><?php echo $language['Kamensk-Uralsky']; ?></option>
						<option value='52'><?php echo $language['Kemerova']; ?></option>
						<option value='53'><?php echo $language['Kirov']; ?></option>
						<option value='54'><?php echo $language['Kislovodsk']; ?></option>
						<option value='55'><?php echo $language['Klimovsk']; ?></option>
						<option value='56'><?php echo $language['Klin']; ?></option>
						<option value='57'><?php echo $language['Kogalym']; ?></option>
						<option value='58'><?php echo $language['Komsomolsk-on-Amur']; ?></option>
						<option value='59'><?php echo $language['Kostroma']; ?></option>
						<option value='60'><?php echo $language['Krasnogorsk']; ?></option>
						<option value='61'><?php echo $language['Krasnodar']; ?></option>
						<option value='62'><?php echo $language['Krasnoyarsk']; ?></option>
						<option value='63'><?php echo $language['Kurgan']; ?></option>
						<option value='64'><?php echo $language['Kursk']; ?></option>
						<option value='65'><?php echo $language['Kyzyl']; ?></option>
						<option value='66'><?php echo $language['Lipetsk']; ?></option>
						<option value='67'><?php echo $language['Lyubertsy']; ?></option>
						<option value='68'><?php echo $language['Magadan']; ?></option>
						<option value='69'><?php echo $language['Magnitogorsk']; ?></option>
						<option value='70'><?php echo $language['Maikop']; ?></option>
						<option value='71'><?php echo $language['Makhachkala']; ?></option>
						<option value='72'><?php echo $language['Miass']; ?></option>
						<option value='73'><?php echo $language['Mineral-water']; ?></option>
						<option value='74'><?php echo $language['Minusinsk']; ?></option>
						<option value='75'><?php echo $language['Murmansk']; ?></option>
						<option value='76'><?php echo $language['Mytischi']; ?></option>
						<option value='77'><?php echo $language['Naberezhnye-Chelny']; ?></option>
						<option value='78'><?php echo $language['Nazran']; ?></option>
						<option value='79'><?php echo $language['Nalchik']; ?></option>
						<option value='80'><?php echo $language['Nahodka']; ?></option>
						<option value='81'><?php echo $language['Nevinnomyssk']; ?></option>
						<option value='82'><?php echo $language['Neryungri']; ?></option>
						<option value='83'><?php echo $language['Nefteyugansk']; ?></option>
						<option value='84'><?php echo $language['Nizhnevartovsk']; ?></option>
						<option value='85'><?php echo $language['Nizhnekamsk']; ?></option>
						<option value='86'><?php echo $language['Nizhneudinsk']; ?></option>
						<option value='87'><?php echo $language['Nizhny']; ?></option>
						<option value='88'><?php echo $language['Nizhny-Tagil']; ?></option>
						<option value='89'><?php echo $language['Novokuznetsk']; ?></option>
						<option value='90'><?php echo $language['Novorossiysk']; ?></option>
						<option value='91'><?php echo $language['Novosibirsk']; ?></option>
						<option value='92'><?php echo $language['Novocherkassk']; ?></option>
						<option value='93'><?php echo $language['New-Urengoy']; ?></option>
						<option value='94'><?php echo $language['Noginsk']; ?></option>
						<option value='95'><?php echo $language['Norilsk']; ?></option>
						<option value='96'><?php echo $language['Noyabrsk']; ?></option>
						<option value='97'><?php echo $language['Obninsk']; ?></option>
						<option value='98'><?php echo $language['Odintsovo']; ?></option>
						<option value='99'><?php echo $language['Omsk']; ?></option>
						<option value='100'><?php echo $language['Oryol']; ?></option>
						<option value='101'><?php echo $language['Orenburg']; ?></option>
						<option value='102'><?php echo $language['Orsk']; ?></option>
						<option value='103'><?php echo $language['Penza']; ?></option>
						<option value='104'><?php echo $language['Permian']; ?></option>
						<option value='105'><?php echo $language['Petrozavodsk']; ?></option>
						<option value='106'><?php echo $language['Petropavlovsk-Kamchatsky']; ?></option>
						<option value='107'><?php echo $language['Podolsk']; ?></option>
						<option value='108'><?php echo $language['Pskov']; ?></option>
						<option value='109'><?php echo $language['Pyatigorsk']; ?></option>
						<option value='110'><?php echo $language['Rostov-on-Don']; ?></option>
						<option value='111'><?php echo $language['Rubtsovsk']; ?></option>
						<option value='112'><?php echo $language['Rybinsk']; ?></option>
						<option value='113'><?php echo $language['Ryazan']; ?></option>
						<option value='114'><?php echo $language['Samara']; ?></option>
						<option value='115'><?php echo $language['Saransk']; ?></option>
						<option value='116'><?php echo $language['Saratov']; ?></option>
						<option value='117'><?php echo $language['Sevastopol']; ?></option>
						<option value='118'><?php echo $language['Severodvinsk']; ?></option>
						<option value='119'><?php echo $language['Seversk']; ?></option>
						<option value='120'><?php echo $language['Serpukhov']; ?></option>
						<option value='121'><?php echo $language['Simferopol']; ?></option>
						<option value='122'><?php echo $language['Smolensk']; ?></option>
						<option value='123'><?php echo $language['Sochi']; ?></option>
						<option value='124'><?php echo $language['Stavropol']; ?></option>
						<option value='125'><?php echo $language['Old-Oskol']; ?></option>
						<option value='126'><?php echo $language['Sterlitamak']; ?></option>
						<option value='127'><?php echo $language['Surgut']; ?></option>
						<option value='128'><?php echo $language['Syzran']; ?></option>
						<option value='129'><?php echo $language['Syktyvkar']; ?></option>
						<option value='130'><?php echo $language['Taganrog']; ?></option>
						<option value='131'><?php echo $language['Taishet']; ?></option>
						<option value='132'><?php echo $language['Tambov']; ?></option>
						<option value='133'><?php echo $language['Tver']; ?></option>
						<option value='134'><?php echo $language['Tobolsk']; ?></option>
						<option value='135'><?php echo $language['Tolyatti']; ?></option>
						<option value='136'><?php echo $language['Tomilino']; ?></option>
						<option value='137'><?php echo $language['Tomsk']; ?></option>
						<option value='138'><?php echo $language['Tuapse']; ?></option>
						<option value='139'><?php echo $language['Tula']; ?></option>
						<option value='140'><?php echo $language['Tulun']; ?></option>
						<option value='141'><?php echo $language['Tyumen']; ?></option>
						<option value='142'><?php echo $language['Ulan-Ude']; ?></option>
						<option value='143'><?php echo $language['Ulyanovsk']; ?></option>
						<option value='144'><?php echo $language['Ussuriysk']; ?></option>
						<option value='145'><?php echo $language['Ust-Ilimsk']; ?></option>
						<option value='146'><?php echo $language['Ust-Kut']; ?></option>
						<option value='147'><?php echo $language['Ufa']; ?></option>
						<option value='148'><?php echo $language['Uhta']; ?></option>
						<option value='149'><?php echo $language['Khabarovsk']; ?></option>
						<option value='150'><?php echo $language['Khanty-Mansiysk']; ?></option>
						<option value='151'><?php echo $language['Khamki']; ?></option>
						<option value='152'><?php echo $language['Cheboksary']; ?></option>
						<option value='153'><?php echo $language['Chelyabinsk']; ?></option>
						<option value='154'><?php echo $language['Cherepovets']; ?></option>
						<option value='155'><?php echo $language['Cherkessk']; ?></option>
						<option value='156'><?php echo $language['Chita']; ?></option>
						<option value='157'><?php echo $language['Shakhti']; ?></option>
						<option value='158'><?php echo $language['Elista']; ?></option>
						<option value='159'><?php echo $language['Engels']; ?></option>
						<option value='160'><?php echo $language['Yuzhno-Sakhalinsk']; ?></option>
						<option value='161'><?php echo $language['Yakutsk']; ?></option>
						<option value='162'><?php echo $language['Yaroslavl']; ?></option>
           		    </select>

							<p>
								<?=$language['weight']; ?>
							</p>
							<input type="number" class="weight" min='0' name="weight" placeholder="<?=$language['weight']; ?>">
						</form>
						<div class="msg">
							<p id='result1'></p>

						</div>
					</div>
					<div class="right">
						<h1 class="title_def white">
							<?=$language['tracking']; ?>
						</h1>
						<p>
							<?=$language['tracking_text']; ?>
						</p>
						<!--<form method='post'>
							<input type="text" class="mail-number" name="mail-number" placeholder="<?=$language['track_number']; ?>" required><br>
							<button class="v1"><?=$language['track_btn']; ?></button>
							<div class="loading">
								<img src="css/fancybox_loading.gif" alt="<?=$language['loading']; ?>">
							</div>
						</form>-->
							<form action="http://home.courierexe.ru/290/tracking">
								<input type="text" class="inp_track" name="orderno" placeholder="Номер">
								<input type="submit" name="singlebutton" class="btn_track" value="Узнать местонахождение" style="background-color: #fdc434;">
							</form>

					</div>
				</div>
			</div>
		</div>

		<div class="w100 tarif" id="tarif">
			<div class="container">
				<h2 class="title_def">
					<?=$language['tarif']; ?>
				</h2>
				<div class="flex owl-carousel owl-tarif">
					<div class="item gray">
						<div class="top">
							<h3><?php echo $language['Russia']; ?></h3>
						</div>
						<div class="mid">
							<p><?php echo $language['price1']; ?></p>
						</div>
<!--
						<a href="#modal_russia" class="fancybox"><?php echo $language['moremore']; ?></a>
-->
					</div>
					<div class="item">
						<div class="top">
							<h3><?php echo $language['Kazakhstan']; ?></h3>
						</div>
						<div class="mid">
							<p><?php echo $language['price2']; ?></p>
						</div>
<!--
						<a  href="#modal_kaz" class="fancybox"><?php echo $language['moremore']; ?></a>
-->
					</div>
					<div class="item gray">
						<div class="top">
							<h3><?php echo $language['ukr']; ?></h3>
						</div>
						<div class="mid">
							<p><?php echo $language['price3']; ?></p>
						</div>
<!--
						<a  href="#modal_uk" class="fancybox"><?php echo $language['moremore']; ?></a>
-->
					</div>
					<div class="item gray">
						<div class="top">
							<h3><?php echo $language['usa']; ?></h3>
						</div>
						<div class="mid">
							<p><?php echo $language['price5']; ?></p>
						</div>
<!--
						<a  href="#modal_usa" class="fancybox"><?php echo $language['moremore']; ?></a>
-->

					</div>
					<div class="item last">
						<div class="top">
							<h3><?php echo $language['uzb']; ?></h3>
						</div>
						<div class="mid">
							<p><?php echo $language['price4']; ?></p>
						</div>
<!--
						<a  href="#modal_uz" class="fancybox"><?php echo $language['moremore']; ?></a>
-->

					</div>
				</div>
			</div>
		</div>

		<div class="w100 why" id="why">
			<div class="container">
				<h2 class="title_def white">
					<?=$language['why']; ?>
				</h2>
				<img class='ok' src='img/ok.png' alt=''>
				<div class="text">
					<?=$language['ok_text']; ?>

				</div>
				<div class="flex f1">
					<div class="left">
						<img src='img/why-img1.png' alt=''>
					</div>
					<div class="right">
						<p>
							<?=$language['why_text1']; ?>
						</p>
					</div>
				</div>
				<div class="flex f2">
					<div class="left">
						<img src='img/why-img2.png' alt=''>
					</div>
					<div class="right">
						<p>
							<?=$language['why_text2']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="w100 in" id="in">
			<div class="container">
				<h2 class="title_def">
					<?=$language['ensh']; ?>
				</h2>
				<div class="flex">
					<div class="left">
							<?=$language['ensh_text']; ?>
					</div>
					<div class="right">
						<img src="img/inshu.png" alt="">
					</div>
				</div>
			</div>
		</div>

		<div class="advantages w100" id="advantages">
			<div class="container">
				<h2 class="title_def white">
					<?=$language['advantages']; ?>
				</h2>
				<div class="owl-carousel owl-advantages">
					<div class="item">
						<div class="image"><img src="img/a1.png" alt=""></div>
						<div class="text">
							<?=$language['advantages1']; ?>
						</div>
					</div>
					<div class="item">
						<div class="image"><img src="img/a2.png" alt=""></div>
						<div class="text">
							<?=$language['advantages2']; ?>
						</div>
					</div>
					<div class="item">
						<div class="image"><img src="img/a3.png" alt=""></div>
						<div class="text">
							<?=$language['advantages3']; ?>
						</div>
					</div>
					<div class="item">
						<div class="image"><img src="img/a4.png" alt=""></div>
						<div class="text">
							<?=$language['advantages4']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="danger w100">
			<div class="container">
				<h2 class='title_def'>
					<?=$language['limit_block3']; ?>
				</h2>
				<div class="flex">
					<div class="item">
						<div class="image"><img src="img/w1.png" alt=""></div>
						<p><?=$language['no1']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w2.png" alt=""></div>
						<p><?=$language['no2']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w3.png" alt=""></div>
						<p><?=$language['no3']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w4.png" alt=""></div>
						<p><?=$language['no4']; ?>s</p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w5.png" alt=""></div>
						<p><?=$language['no5']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w6.png" alt=""></div>
						<p><?=$language['no6']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w7.png" alt=""></div>
						<p><?=$language['no7']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w8.png" alt=""></div>
						<p><?=$language['no8']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w9.png" alt=""></div>
						<p><?=$language['no9']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w10.png" alt=""></div>
						<p><?=$language['no10']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w11.png" alt=""></div>
						<p><?=$language['no11']; ?></p>
					</div>
					<div class="item">
						<div class="image"><img src="img/w12.png" alt=""></div>
						<p><?=$language['no12']; ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="contacts w100" id="contacts">
			<div class="container">
				<div class="left">
					<h2 class="title_def white">
						<?=$language['contacts']; ?>
					</h2>
					<div class="fl">
						<div class="item">
							<div class="l">
								<div class="icons"><img src='img/email.png' alt=''></div>
								<div class="text">
									<?=$language['mail']; ?>
								</div>
							</div>
							<div class="r"><a href='mailto:delivery@dealwd.com'>delivery@dealwd.com</a></div>
						</div>
						<div class="item">
							<div class="l">
								<div class="icons"><img src='img/site.png' alt=''></div>
								<div class="text">
									<?=$language['site']; ?>
								</div>
							</div>
							<div class="r"><a href='https://dw.express'>https://dw.express</a></div>
						</div>
					</div>
				</div>
				<div class="right">
					<h2>
						<?=$language['adr']; ?>
					</h2>
					<p>
						<?=$language['adr1']; ?>
					</p>
          <p>
						<?=$language['adr2']; ?>
					</p>

					<div class="qr">
					</div>
          <!-- Yandex.Metrika informer --> <a href="https://metrika.yandex.ru/stat/?id=49373905&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/49373905/3_0_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" /></a> <!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(49373905, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/49373905" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
				</div>
			</div>
		</div>

		<div class="modal" id="modal">
			<h2>
				<?=$language['questions2']; ?>
			</h2>
			<p>
				<?=$language['questions_text2']; ?>
			</p>
			<form action="" method="post">
				<input type="text" class="name" name="name" value="<?=$language['form_name']; ?>"><br>
				<input type="mail" name="email" class="email" value="<?=$language['form_mail']; ?>"><br>
				<textarea name='quest-text' class='quest-text' value='<?=$language[' form_text ']; ?>'></textarea><br>
				<input type="hidden" name="info" value="Р’РѕРїСЂРѕСЃ РїРѕРґ РєР°Р»СЊРєСѓР»СЏС‚РѕСЂРѕРј">
				<button class="form-mail"><?=$language['form_btn']; ?></button>
				<div class="loading">
					<img src="css/fancybox_loading.gif" alt="Р—Р°РіСЂСѓР·РєР°">
				</div>
				<a class="police fancybox" href="#police">
					<?=$language['police']; ?>
				</a>
			</form>
		</div>

		<div class="modal" id="modal_question">
			<h2>
				<?=$language['form_header']; ?>
			</h2>
			<form action="" method="post">
				<input type="text" class="name" name="name" value="<?=$language['form_name']; ?>"><br>
				<input type="tel" name="tel" class="tel" value="<?=$language['form_phone']; ?>"><br>
				<input type="mail" name="email" class="email" value="<?=$language['form_mail']; ?>"><br>
				<textarea name='quest-text' class='quest-text' value='<?=$language[' form_text ']; ?>'></textarea><br>
				<input type="hidden" name="info" value="<?=$language['lang']; ?> Р—Р°СЏРІРєР° РЅР° СЂР°СЃС‡РµС‚ СЃС‚РѕРёРјРѕСЃС‚Рё РґРѕСЃС‚Р°РІРєРё">
				<button class="form-mail"><?=$language['form_btn']; ?></button>
				<div class="loading">
					<img src="css/fancybox_loading.gif" alt="Р—Р°РіСЂСѓР·РєР°">
				</div>
				<a class="police fancybox" href="#police">
					<?=$language['police']; ?>
				</a>
			</form>
		</div>


		<div class="modal orderModal" id="orderModal">
			<h2>
				<?=$language['track-info']; ?>
			</h2>
			<div class="flex">
				<div class="left">
					<h2>
						<?=$language['track1']; ?>
					</h2>
					<!--<div class="item">
						<h3>
							<?=$language['track2']; ?>
						</h3>
						<p id='client_post'></p>
					</div>
					<div class="item">
						<h3>
							<?=$language['track3']; ?>
						</h3>
						<p id='from'></p>
					</div> -->
					<!--<div class="item">
						<h3>
							<?=$language['track4']; ?>
						</h3>
						<p id='client_get'></p>
					</div>
					<div class="item">
						<h3>
							<?=$language['track5']; ?>
						</h3>
						<p id='to'></p>
					</div>-->
					<div class="item">
						<h3>
							<?=$language['track6']; ?>
						</h3>
						<p id='barcode'></p>
					</div>
					<!--<div class="item">
						<h3>
							<?=$language['track10']; ?>
						</h3>
						<p id='track_weight'></p>
					</div>
					<div class='item'>
						<h3>
							<?=$language['track7']; ?>
						</h3>
						<p id='status'></p>
					</div> -->
				</div>
				<div class="mid">
					<h2>
						<?=$language['track8']; ?>
					</h2>
					<div class="fl">
						<div class="l"></div>
						<div class="r">
							<div id="tracking"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		if (isset($_GET['lang'])) {
			$lang = filter($_GET['lang']);
			if ($lang == "ru_RU") {
				include 'modals/modal_ru.php';
			}
			if ($lang == "zn_CN") {
				include 'modals/modal_ch.php';
			}
		} else {
		   include 'modals/modal_ru.php';
		}
		?>

		<div id="police">
			<?=$language['police_text']; ?>
		</div>
		<link href="css/animate.css" rel="stylesheet" type="text/css">
		<link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css">
		<link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css">
		<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
		<link href="css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="js/sweetalert.min.js"></script>
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
				cost = "<?=$language['cost']; ?>",
				calctext = "<?=$language['calc_text']; ?>";
		</script>

		<script type="text/javascript" src="js/js.js"></script>
		<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>

		<!-- BEGIN JIVOSITE CODE {literal} -->
		<script type='text/javascript'>
		(function(){ var widget_id = 'wJSTvSIOyn';var d=document;var w=window;function l(){
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		<!-- {/literal} END JIVOSITE CODE -->
	</body>

	</html>
