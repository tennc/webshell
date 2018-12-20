<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.5.0
*/error_reporting(6135);$Uc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Uc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$vi=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($vi)$$X=$vi;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃþÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ýÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒÞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Þn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1ÌŽs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŽŒFÃ©”vt2ž‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅŽÃžôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PÐ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛÐ889¤È ŽQØýŒî2#8Ð­£’˜6mú²†ðjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ð¼o(Úó¥ÉkÔ7½sàù>Œî†!ÐR\"*nSý\0@P\"Áè’(‹#[¶¥£@g¹oü­’znþ9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ðè!°üë*cì÷>ÎŽ¬E7DñLJ© 1Èä·ã`Â8(áÕ3M¨ó\"Ç39é?Ee=Ò¬ü~ù¾²ôÅîÓ¸7;ÉCÄÁ›ÍE\rd!)Âa*¯5ajo\0ª#`Ê38¶\0Êí]“eŒêˆÆ2¤	mk×øe]…Á­AZsÕStZ•Z!)BR¨G+Î#Jv2(ã öîc…4<¸#sB¯0éú‚6YL\r²=£…¿[×73Æð<Ô:£Šbx”ßJ=	m_ ¾ÏÅfªlÙ×t‹åIªƒHÚ3x*€›á6`t6¾Ã%UÔLòeÙ‚˜<´\0ÉAQ<P<:š#u/¤:T\\> Ë-…xJˆÍQH\nj¡L+jÝzðó°7£•«`ÝðŽ³\nkƒƒ'“NÓvX>îC-TË©¶œ¸†4*L”%Cj>7ß¨ŠÞ¨¨è-ŽƒÈà2‡¹pÂ3Œ¢îb–àÙ¥°¨çÞv>ñœp\\²ŒÃê6_HˆÛ»CxïW†1OjùAwH7q£ \\ÉŽ#¨ÒÉ®ýrŒ4v=ŸnòvÑO‰–÷6‡gWpß×ù'eÚy¯—ŸÝ÷¡pî0#z6=ÙÖ€u¡º\\_Ä.¬â£>H<rÞ+cz%}®w÷ÈVˆA*€¸Ã—B>dR:\rê‰\rœðl\rÕ9´jð43•¸qm\rPN	ðØAãþ`ÅûÁµxoÃ¨m\rÁì8?ÔüÃõ,	E·,UèŒ‚âêìòŸ%z®Ê›¬5õ’ˆvÃìvE 86H0[C¼Lmj¨2D¨¢¦Á`pŠÑ1?ÁRÀQŽÊÛMæÅxšžbéu±Å&˜âI-\"¡Ê§žÛV\"òÍpG\"W†±èŽ\$¦Š“J\$6†PæPÜÄu\"ˆT7CHòÖ–{÷Æ HÙåÓô8FK•r#D@ÝYKKcp1¼ˆè‘ˆY\rá‡D’^X#ª–€ÂYÀ5¹\neÌ²Òö\$†\" SH\$°{à¸.©%ÈXF³Ji@8L¥if\riñgBstDŒ¤N‚SzmMÀË9'zm‹\rxµ¥éIüŽ¥Ðž-é©Ð7:q\$3pÇÍQ—f¬,š¤Ø¡Hb2]…\n€à·'Ì¹?PÆmCÖ‰¥rIù£4ƒ¢XAÝPn¨ö…ÅiCxp…ðL£¬éþŸÔ\nƒDô‚‘ªHé4.A”;·òŒäVqÁOf1À2\"OÉí>KÉ4­s+C˜qSFL«SPr ‰@€ôÕ\"æŸS*ëLµL‚ôKä«EE±\nÆÖk)À™j’˜4u\r©I7A±’†0ê£a7pì¹€ç!sòA˜4‡ƒ(yÑéï*o¥¨£fŒª.­ðØ2¥ZÇž[ VGî\$š×ê¬^n&1E™)Ê€-£\r%÷ZPÞÈ²úˆQR#xZc,Sô ïØ¯Ò”ïlÔH.!iÃ78…e…yr6„X‹€Zî\\†lYB)\$á(—\n“	¥I\\Sx¸Ñ½Ð*up«û§/Á\0p€E¬ëxÊ4<ŒUGvxŽYí=ö…XŸ€ÇÊ¥ôœÐLÀ¾‚æ¨êÏ„˜\$2CöcÃf!Î\nµ¹‚HAÖwÎúÈèÓíf‰jláŒ4öé¾ ¶åBÔbL	–\nO´°ìÂ»7!À# Ët7DEzÚ&²×âîŸ&T‰¥R‰ji\\]gãv!Ã†qÉ¬òCdÊ„k«é€“Êl™Ñ­îUP20åBq=«Œ8ª3>û¯!’È¸Ùuõ+-äÂÌmDó03s\"²÷†ý£{¹x‘*+E­0>‚3.`Q–,EÖ–ˆ^˜M”÷Â5	eÔ]+_•>Ÿ=Ì«¥CœÙ)™7Û \rŸu¿Êô8™²zÁk†@´Û#ªZY’q²áˆ5—]ˆQÔ¾ÇŸú€·‚=bnŠb¼Äª±Ž¬˜iž¡ËEäJ‘u~°eÃkýu§îÍÄÖÈ0«Ã'Ì˜n[wÞÄåŒó‚kÛ%Ý÷,Ý¢½göò)´LˆýèàW²e™i’Ô³ˆ>ÍÜ>){¨Pðt r°„1£ÑUaÊ–\$ò.I|ÿ#Z³šråy&ù¯2“²:H'ë¸Ý“{*ä<ëÛ—Ñ—®;P¦Î87ô>IêÜ·Wõ¤²ž€v²2p7{'ô.[Ìk]9»8]clóõüdúG•7~cÉu…ÄÝ›¦¾Ñeºÿ\$t®ùñ¾WÏÝovéO°†µ>Þ~2 gç=>ê^Žú»?JQ!FÍêMù!0>à¡¡éÂä¶Ú-1@à4°RûŒ °þ¦é_•´øsOlú,c¥r`È·?¤u½)”Éƒ0àe¯Ùº‹Â\"ÆÛì„üÚNÃ›; m>³§+ÎåaíŸ·ðýC\"u4ÙlºW¾ú¿?±æÿ¤þÏu¡÷ÊBm|I®Eø\nâùúøB¿ö¦	÷=KZkozÍO üÏ¦ÿè‹e6œK]\0åŠd îµHØµ¤ÄAÖ6ƒlX)`+d šÐ.7 è\r ¾ ÀÚƒj6êËp-ÐE\"oPR7Ý:\0Ð\0¾{@ÇPMmPt7xðcàZƒp„4P ççô’BÐ/¨“°°“#Dð« ¾Ÿ¨V–\0fi,¬¼ÐÌ	iwG‚\rð“\r°Þ ßð]\n@[ ÊG’SpÝŠ¢\r€¿“èÕ([j¤ðáÑ%ô–	&Ãð£pµ‰‚\0r—pÕ\npm\r ¾Â›0m	9ÐÿâšÕMF.­Kpï¨ZWí1=‘EÀßQ)qRÔ@ò¨)Ž‰'u„0Ð\nâ+0D¬Èq'ÄöðB‘ðö=‘ªƒì- éPåñºiPM‘q³ƒqÑ@\rˆëHËÀŒ«“Ñ¦è7	¯q±qý±û±ÍP‰Ò±±°“P–ƒqÞSQâŠá°Ñ\r\0Ñ§	 ð\r±hê/p¡ ãÙ#’=2K\$’ÄrU1Ð@`è¯±œ,… 1½²m Òm¨êq ä_ÈK¯ø–}(]ÀÖ ó	2‘)QÔ²²šlò…²z¯ò#qÃ&f	a\$Q]0ÿ)ñiñ‡RÇ,ðm'Qvñ,É\r’ÍrÐªHÕ.2×òÔààòÓ.‘;.rÛ/²ÿ-²Ù\rpl\r©ªRñ&ño1S1Ï/c\\i»/r£2S+2ó	Ÿ‘œpÌSIð:]ño5ˆÍbe“!3Y,nŽ©—Êí2É_4)„˜^ÇB­G\nLqŽ ªþ°#°r´(Ó5±M&ªœó¥²ß:Ð«/Ó£	3^ó0“3sµÆ](+8I©dÀ  Ø©ò÷219&ìqóáòó\"­=-É‘§>rU@·3¯ÐÛ@S\r@‘o@ô>1S„–„)Š–Âo)~@P;-ò€©°¯ô:\nl\"›\nÌ#g7clÀC\0000CŠüöD|1hÔ.óôéQ‚A\$\rÃ†.±š8.2t2#ô6o¢ACâËD åDtJHÔQ+KâÖ„î ");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…'³‘”èu9„CyŒêm2›Ž‚ã‰ÔÊr<”á°ó¤F+ˆD‡gØ\n	„Í’øtÄXcƒ§ƒ¤Lìa9¡§1ì\$Ã<–DgôÐø|ŽG¤!Hî+Œˆ)eºXºn3\rÑ‰vg5Á`ôê„ú\"ªÄëñˆÕÞ…D’I¥©ì´äA6Ná˜Xvi¸Îˆ!†vf7Q©\0ªAž˜A9Œ'‘q„àp6Eã®\$YÈN‡1Hºti1™EíîÃp››…¨µðA˜Òéõ\"‹Q¤ç¯9g±Öü‡“9eMš8£1š¤çsú'QªÖk¶½ž÷‹¿êÜ…ØŸˆ¶0.sµï|kÓ<î`Ðç:’fê&Ë6#ÀÒáŒê,cz0Ü¢c2\\£©#XÊ<Px\nÂã*'º(°·/ÌH971\\>·¬|œ2Êä!ƒæ…!©ü{‰Ã\n@\$#Ä‡\"cHÌ!¨šrç\"¤ì§*ÇÒ¼Œ2…È«P0·!@¤2Œâ(ð88P/‚à¸Úá\\¹\"Ká\\Ý9càH„áHX„•Êt”‡á8A:Îòò@ô\ng2(:Z3ŒèpP4Œ”6)¨PNÎµ»-ÊÒÀÊÊd©VËáèzÀc È„ôhOJW5ØÝK7Ïó,†AÈ \rãXÒÝK£HÎ7ƒ#FÚpàk(AèÜ2ŽàPˆ0¨NwnL`éqÜ·@\\3¢×ct…v°òÚ\\èëb‘Jƒ}›g¿Qý¤7OAÚÅ5(ª™:ÝK¬;\$òpò+\$ã›ä4-XŒ\rb[3#Ý™g7A8Â2A–øä/â–,ƒ¡€N7Ýµ'4RÊ³}¤c+r¢*öM¹Ä¿KhÉmVã@è:˜t…ã¾¬ÒåzN\"#8_–åãp^ãªE[ÎÈÆÌ:zLÀ3g#(„ˆ×c–c¶îø\\6³°x2ÚZvï·6ÙðÞÄÁã=n7\rá>ñ¸¶Ã ò‡Ã½@µVáº‡ÇpƒŸ%Ê\r\0ÏÁáˆ\\£(ÛÎIü°ÜŽápà7óÂhËŒ7€LuÝ†°2¸‚D&9ÊU&ï:W=ÉÌ#1<Z2ñÙ?áž'<¤ójAÜ^›€ù¾Ç‘({àåiAõµq§ê:ž««äùN·®Ð6Ë7¾ƒÐZû.JÀ°RÁqC!ï Ùå¸JêNñÿ6F³ÓkõkL­°@4ë@[-¬Ð®†ÔCÀ(c‰è9³àÒ =ƒ¤ñpÃØ}I¦§ LÇÉhˆeKÃ Ì±Ñ13!)´Ã5†mP!\r†ÀÈ§ÞLISXÅ’À¬e‰1u(¡î	º@Í±0(A\$ºò†qŒäŒ£†ÂLLÖÔs¡Ç6¹sqú=FÈÜrÅŠ=šVžúÃu(AÌGRLUáÉµaÀ‡¤åžü…’±€2ƒ©D_Ê+AG8*;•bÇÊ¢\"«yp\0¤ÎšSZmÉ´¡ÎžH\$f`œ4¬Cú¨.’aÑXÌ§r«Œsã2E ÙJÓºeññTÝ×ved®›Å)*D¦v\rN\rêì™¬RÄ%Q8ˆíÐ†0Ö¬Uó³ ‘Mi^	çš–G\$%Ó˜”þ!èx234·=hdIéM\r Úîè¡\r¡m“NhÂ²¢´nŽ†Ê>×l7®r‚êGGµ&´¡*ÒµÌf‘Ža\r%>\n™Œk¨\$@ÚNÕ\0,¡+en¯Tª”—•.ž‡Dô SeLi”…À„\nú°=ƒ0ú½ø/ê\rG¯E JêÚ!ª–&*•BÞ'Ãú)(<8I\"˜]& n¯¡Ò‡+)ø'R»vSP‘X˜“EAC7p`ò¾WâÌHKHhm ®W¤C`¤=²¦Ì-†’Ý­Ê2q÷0êe„I¶€‘¼àæ¢ãÚ°©[³#bÚ\n¤qR…š´¾¨‰Xm)‡6JR8ÐÍsvBÉÚ.L”,öfÍÙØ\$¢šTËV.ªAZ`]x4å¼––™Ð©ínnbT¢ìÏ;‰=¯Ê½–þàÏ+q}ç¼ù·þÛ¦Ô\"’Þ¢Õ_G°®ÝC6lž!×jÌ«ºùÁzoN&Ò÷»p\nš~€ó)ÛÌÌ\$íïb³K³B|²åJSè\0rfxžò…Ü†ÌØjná¨O<(Z0°j³ˆžz\\\\|ÃU3Ì%ÏE@Ó©vL™:+_ËúAéU TBŸÜ…IÕ=vUjËÛ˜ŽEöË‰FxåŠ5€#Ü¯½\n‹2ÇË­\\šL£4Zçº«£tñÅ{²wfËä4rdI÷£9ëóo=Ç¤7®ógX-|Ã%œRó»:æÐ‰Ñå6|¬jšÏh-J§µºÕ¬«‚zÝŠð†–\"¯¬µ¢™8`¸çSÃiˆewÏ\0÷YJÔS35\\so'›©ÀçòAÆ5ÃE)ý¡8˜í\0·ð0‡ËF%DÔ;R	%7%'\n·Ã¡ˆ7‡‡ò±IžëÝº†{%Jc+öL©Ô¡¬æukœç±–\"u†ZðR‰?ª_€Ò,¥•&QeÙN*†Jñ¾énu¼#2i€v”È6û¤4ÓUÓ|Õqs`}[IŠP»éNV]ÝãzO}òùÁ\rñÎ|*8“=ÊúCšÁÐ%¡÷v\n,Î«ô­1¤RÈ=çW:i…aÓ¹t ë¿ˆçPu<É5qÁöÓcFÌì<þ¹Š×lfðë‰ã}n†h\0ådp}“´xþîh‹:Íí¥¢ì—²¼Z›ÑSº™ |ýÄ´[;|ºÈ=Ó¼žüZ3j<\n¶¹…^ÑÔîéü]q\$L13ð×¼}hêAÊ;Üš({óñòæ)~aQ*5H¨\r:£åêé˜AZª¯&	{ÅH·hl¥¶ÇkÀÜÊ‚@T	¡1[‚`Ü¤Ø;qÞ¼†´¦ƒþ‡ÒúŸ\"ó®Âƒ´\r'¼­§fS.¶ÌSÜ5ÙPìAC¨s\na¥%ú0öýí4©Üýí<2eàæ P\r*ÀY\0ÄLÚ­žH œ'w¯d#¥È.@]@ÊÀ{ÀÌQÝ bQ MÆÑ‡r¢Ø%(RÊp†Â+`ê	æZ‚¸³ÀÂØ‚,ØÍeIRµ\r®; ÂPmº“`Â‰çv&¸ÀÌ]@™ê­	Àß\nÔ\nç.\r\0}	Ï˜à°Ÿ\n\"-@È-BØ¤N@i(yg(\ræZÀØÖnþæ,Á¶Êä\$0n’Hp¾0ØLÜ\$ðáFL’GÓÈæ%t\nM`‡´ÉböÔíâ’PäJ§¦±Ã¼Yì¡åvÁ±8â.B\r–^ú@(©®\r¡qX\\ÈòNÊM¨æfq,ìnîëªºèæïŒ,ïÂ'ìRðñˆ¼ÍLDz«€¶ Z@º€¶¬`Vå€L%-êf¨ÚW`ðnîTìk«°qpÖvï\rºÀÒ²ŽÈÐ®úÑ.÷¥k±oQ”Lƒtñ›ñ£m3Å	&ðm*V„²R¯!\nfÜå^ÝNdÝ§óÚêÍüàÏ¸ö2,”hìUò§B±fÖù±<L¢uî rš0hDhÔ%BÎŠ'`8NnÚ­òÄX§…vVÀbb¯'rzà²€Ò9ÊP!’fêr‡\0úöÒ^ŽrdF\0Ñ*§ü‡Ê¾)-ëã\$î\$É®*#\nq¾(qÅ€ŽÀÚ\rÀšBÂ©rèò2`ÝÐ”Xf=\rQ×±ß/1€ÐñèIà_-b>lM™“\0Å%\"Å€÷1rÅejó\r-¤ë.S\$\$®R«øöòb²š¸Ï³ÊæÌ\0GÀÈ]@[)’¬RÅY32@qÅ´yÀíÓh°²úï1Ü“i0,.³Óh³zðˆŸÓi,.(Éê€ñoÀLŽh¿#àQ8ì–ân %lçoK4NF«PVÓ{BÔ\"s¨áòÇ+¥¼KåÎ\r í9 ¦‘H-æ‰ELkÐ€z@¶Ž º@ºfsh6¤4#Â=Èâ8èÓÍzžbw')'b@Ù&²†}\"@B2k9Î}\$s&­<Ø¤\$ÙÌçƒ'dPÖT* æF„ÏÂDÓÍØ€ó&²o@X’&ž Ä¤{\0¦%¤Øæñ(ÓôCÀé-J\$9”BÀÔÿ Ð\n‚ªÜDOHtN\"Ô™IÔ (ÄçÄŸAt%I(„?'Ò#(4R_’‹'àz2wiÂ;´ª…ŽmÁJ&~ÛËhÚ”âÄ–#Ì‚Tp%¦COj_P\"½®J1Â–ö5£ClµëbäÔ—@oò\\ÉÝ#)Ú˜îÁ#NaF ór[TãH”DCeI-¬tIÎ\$n‚IÎˆCóOr µµ ý`OMÐ‹IMŽPnÎ4¦Øê]QÕFà¾Ip–\rg]@¨\r\"@BÉ™)õ‚ÖU†Ï•Šû`Y)¤FâoÖq4hÖqDh%RyLrŒ h[\\õ?] fKÔ|ÌØõID4‘H0ê¥OU\\ÔÓ\"5ÖQ¥¾(öÿ¢ÐWàNìÿôÿ•üå,Øt÷,Nv q+N¢`ØèôÞŸê\"®V\$´\r–1a\0ÎÆÕçWm¥d4ÂœÎ;9KOÎ¯ÒbÏÙb®±ÀRÆÖ_d«åfNfŽfõ¾†ôãgµ€ûÊD_TS4S\0úçôTèUb)¿SÕÂõÆcK!ƒ²Ú•/A0SOYS’^§1W>Q‹B¾*^ñ\$Áj¸Ês “PechÅ:(Â¹––ó\"%¤\n‹W\" z %vÉe¾T(È¶‡Õp·ðO\"Ûràš…¦Ð×(’EÞ\"À‚‘ïø’FJàZo€ð»bÕKR\" Û7FžwJ\\ OuUu€Ñ ÷+rj\0*¯·QdCK·0}`ÏpÉ8ñ×AV«Ss7à×t3s`ñs«2ÆcyU]tWIGN\\‘w,+w`Yy·z—­<e. ËF\0÷N t´jÎgB\r€àG‡i>pðeœ\0ŸxÄ2Ñ6âeD3\rr†2¿a²á`ö#=Î*¯RÈ%’Ìày:§<C Ý€ø& x+\rúÊU¶YSQmeám±+ðâ[ñ4í)\\ím§X‚ïl^h´ò’ZîÑØD.õ7u7ò;=C…Ôá\rNØ·\n±%(¦â²YKë\rJPóµ¤‡-<„ÈP…T\$'êbDÈ\re«|\0X{ën^	d¢JÄ¥`Õçb¦¨¦ LøÎsÀ~[åÃ€™ÀáŽLÑÐ`ÔÀ‚.& \0ž@Ô%˜æ–¹ ™¹ dÚ	£qÄ*è`]ŽÏ¢\n€ P u#8d‚B+Ž(Æ[X¬z\\ò÷àG”§=•õI8Å£ê„ùLB\".’À\$ï¢úeo7“Ø#?9b^\0DÈ>vøÆ¤ô€_6™ŒyK”ùnÅDðK9£–Ïóš…%njµqú‚\$*ÔPpeQ`÷šù]›E\\eoœ@XO·”8ö\$`Þ“ƒ…:wÀQ  	à¦\n–à‹ŸÅc”’ã‰”HÒ˜ôÄ¦þdçºêx/D·ž˜d\0Õ6 À^\0ZjÀîªF¦8\$\"€Wj1ÙäÄº¡g=¡¦êM °ºX`[WZPy0~f˜Ú ÆFYZ(Gýû’´IúRsÊ²dâS–ÖÃ\0¼H¼Z“UÙ°6ˆ-‹x»%˜ÍžuöÏ–™¥›9rYvúš¹¡‚ÿ ªª²“b!”²…)—Àí˜­?\"OÀå˜¤ë\nðàkGl|”ù™™Ê¬Z¯Ek§1±õ›±ø\0_ÅuœJ×3ˆŠ?šÔŠYðB:P˜ú«ŠºÄ\"ÊŠ¨ø°ùTH# C”»R’Ÿª¥Dà{à”\n`ž	À¶ûs\$’ã­ÆvrîºçË€DÜN»€vû…®Bª˜,ÁÄ:Cë>[wÁ{L÷ PE˜¾B\$dE«%Õ¸3™hÊ4;Ê5Œ9‘´n’U¶wÀ ¶-Ìð)‹œ¹,ÿºXy7bË‡ñ…4–`Æ¯†VKÐ›ä¦¶ËqqÈ\$öìÙ HàÓ1)›\"œJrºŽjHËÁŠ—\"`ðƒDyÀÞ‹\\¶ÖŒ–IœÂ+ÄÜ×d@ø¡î³(oPÆBçeIÅ¤ Ê\n ¤	*x\r»„6IšÎdômHà¼}È\0ßÈG¦§Ö>ÚSš”(ÕoÉºù@uÂÉI†K¶œp\r@ÞAäÚÖ&3f8ßµLƒ‚àà^ýàéÂ\$¹Ô.\r	×i|ÎcŠ²«qú€~ÀU …ªë|Ï¾2BÛ\\c›a¨Ûe1û³µM–š×oXq«ºU¸:ã¸‚ò¯ÿI®‚\"}<\r:p*Tt`èé|Ç†g4ÙYªêá[+»°˜hµ3ÃT°cÂª€î)\0ÜÿÕECH5GD\r_hË^•XÛÕvŽ#ƒ’ŠÕ|¶”ëKF~P/9ÙôC	Äáv¦u½€ÿÝ!Ã³ÝÆñ¨ð3w3€%IÚœü/¦¾¢ªêBª*ê»1ÅÝ¥ùXfð&v=„¨gâ…E¦ˆ•Ü=²R•r÷\rÄY&ú‹[”‘rß;jAç|ß4¹`ÑM@düè­&¾F´:èÀLÙõUKîo{@„ŽÀä<Ã–òËêâ:Ë¬à{ßƒ,Rô‚ýä´}#E>@Ÿ-H3ÑÞ¥=är*ýà•\"xÂ¬ÜpùâO®~tþr°¶·6-F÷Šýà¦£eÌ h€e)ô\rÜ¯	P–M`)€bíò?Ï9½²€¸lJ×Šqrp‚7!ïà{ïþ;=n€ê\0`&d*ë\0˜¦<T3Ä\r5#êŸã¾EHÔ.Ie¨Ÿ6_ˆç†}4„\nQb7±Xoq\n€Þý\$TÅùì‚Dv¿h€²ìQ+€eð¿V€ê5ph-÷ßXb]àÉª*£˜®þ†^\0e¡ Šuÿ`§ÀOú Éùg_X+¾ú ËúiQò¢gÞrü_3Þ•%~l]_†\nun€‘Ô‡ÄÊîµ5)iè\$•l'…µÈqF@ÜÔøN®IÛ’Ü‚ä2Ÿ? T.G!«ÅÊK5)Ó\rÃn*ãÏž†åµÂUzÈHÏ!Kž]r	èJì	N *ø¥ôae8vIö;H@Ì\rÏÚ¹tˆ\$úí†óÅžpŒùÈ!ào¦+êØú¤ù?\$h#¯kPÃDÁã\0°¥©Jëå@V~ø(Áƒ¤Ì-û®XÀ7Œ-áAJ‹bÄ8ŒØA›AéíUD~°‡éÞ,º?PE¤3BmfTGœ‚¼ ˆ>¥Y]ˆÄfIÓ	µDÆ#‹kYh€”º.ÐefÀè©è#i÷	t±	òuäRÐ¨Q” Þuæºh(€;M1ÛH r)\$®€yRL.Ö‚Ea³>Tn?\\\"ÒÀ»@¤¬‚3g2 þ‚'¼6L«¦™p|&tbÁ} +{ªüÐœþ–^KÃ¬o•³Õâ«T}€ ‰d@Gj*‡t<s\0b›³™BK\rÈ\0„Zó¬õ«û(äâgú?ÙÔÈ,X†M\0¡~Ä’ÐD(F¨ŠºñÛ	 ˆ©YË<Ã@º7p°é¹GiuÎöþfÿ¿Â Ïó¨èÝJ4â6–SéIp<x•Ä\"% h‰x\"b‡ÃË @î%-‰·†ø/5ªf%‰šïW’Q]È…£þÆfZ6ó(„±QÄSI\$(5>Ád´o1ÄR_…§0 DoóaëÀˆð0†´Öoós”“Hb³œ\r‚:((Âÿ1A®..1{1šÙâÌÞ8±¼Ê-Qx!Šã\0Éò#ÅÊ ê‘\\^#X½”JÑˆD`bá\$!â1ÑŒ\\âW“rŠÉÔ-sR’Óµ;&ã§V¨` ô“Áe{;#\rQÎI\"ÂÆÖ\$û‰3—Æ›óÀ\rså¤-2Cbœ‘æ?ÍW/+çÄÀ¤³â6à -ùR^=h©øH.jâGsœJqàÀö‡Œr–Ç°6QîáÝãÈhó!.='m¾}Øõ<L€h	3\0NC@ÇÜZ‘çL9‹…“„«1YÀeV€wšŒR×ý”ÝÖFžDÃ\n~ÐÍ„5÷â¬DÌ‡Õ6ûÄ˜0nÑ¿Sn¤Ì	¤s\n‘›µ!ØRÈÌR5d\0t—àHÄÍ(4H¶¤„óµãHÈðúˆˆˆ¤„Õ8HE‰Î’wÌl2&Èä½’V’@´†…%b\"Äª2gë‰ÜOEc#âwHˆ&kì<\nSÕC	å!¨™D*A]RúGþ§³YB=v«ßŠêHP»¢FdGq›Sˆ ×Ähc©-+£»“ªøÍÓ‘Ý©î«ºô£M5NÂ¦\r',‰\0”tmWN©9Ô\nN‚XÐ\0¾¯à5Œ,\n£±Äzñ\0 ®`\"c=cê!ÖJteÐC’cuDêp[Fd0e,'¸.\nà\n{!¤¬n”æ.Ña!–iŽ¥«&#ŠZâ,Ì¶Äg\r®q™¡—Eî6\$\\`czÆø6!:‘86«tsÜºÀç.!²†Ê]AY˜åã)â\"'xu¯5‚•Î‚<GˆbX\n	heN ùTËIÓ•HLå€ 8—?ÝÕ®L¡ÁFf­¥QåÏ\nM€ Žl¦ýA7d¾MóÜa¡9€¥Ô -ŠY£¦X˜Ä¹­,ýÄ³–ÉŸ3rÓ)%aˆ“K\"Ú P\"¦VF‘R‰ôX‡;™IdËœßäÁÍD£hù:‰ÎÕ.Q£ÂDÙ%é€—@î7BW¸ ÁDÊÓTZÄé‡8·	^\0¥&#ù³É¤æñ\"VPƒ6ñºØpï}ŒZ‚—âe¼S™4(¦Qù•]¿±ÇoøXËÌrU“ì2€i`¦Å:Q\$ Å2y^ì\$Ep€²¬8”sÇw\ráoÓf'–“Âuðï*Ã€zÅC˜Io?È@ˆ®'ŠÎêv%¢œì]”\$ùÝNÐþépÚÜƒò¸’7.0ô\0{žKó<Ö( ?)\\%\$ƒ‚q<\$ø°œ|óÂPbRKš¬E!«Y>ÚÜÁsO¹ZÓé•Ìù\$;¹êÎÖy“Î7Jâ>5¥ÇOqóùž\\õçœ.p1O)aÓØJTö§ ¸º\0Ox§H¨ETøEæYâ‘IŠ#‘¿\$,ñAQD€À²,F£‡9wÄžkÞ^\"9LS(°80 ‰%DÍI˜‘Ó9ÇmSb—’1¿&®¬ãõ¤xŽè³*^ÕBR‹H è–~¿T#qÃ¦)“¸œdÑ\$C¿†lŽh§¢)á( *DèŒR(!\0	vM°“‰€€ÉkàH@ 1‘Šì°›ëå‹<ÏZ.zŒE/!€º'¦z§üÆÏH³š\n,º>…´OIü)<H\$–¶ê¼h(f¾¢‘ÑÀBð&\$	`Eà€ŠÐ\0,B†À(g«Œ)H÷Rf“qÓ#©|‚º0%\"Z\0%+…–ÏÃØ/ª€l\n¹e©Cå²;„‘tepâeRî@P„Ö´oÁÈýC–¨ÌÀgánÂ­M`AáåÄ,\0/…Þ\0¡V]PRâ@“”ikZ]7¨›C¸Ý€(Ž´y•¦µHŠ:ÑøOIk¤’i|2*(¥´IkÚZå¡Mb¨\ný?Šk½#Ç;·\rÐ\$ô£¦yÕ!KºH’’•ZX³hœ{\0™§l)Ý¦;€áä^ÀpíÕ¦0¶ËQRHæ•K½GiRà¸Y¡3H¹péÆTÈft¤X¯…(·SÄzÅ¹8‘Òržºi/Ü1tP’°Ž¡¯Q¼mÎð|p0‰èâu/i\n Õ””ó«@©\\rf%\"q U…ÀŽÄ|/:´ª<ûó\rÛ—`*\0003…¡¦\rÐ¶	ÜIIz6P	\0dso-®a5ÅµyìêuU|‚^è7¥Ý\0´ò(U©HæžEhºÏžjEèÔóWŸù3Ô6gR\\9Ã‚])ÇèT@¤#»Ø¡ÙªÖÊe -hÅEL@S É 53\\*¹làä <]n…Ð¦á[W	ò -îêÙ]Ž¾·aB)œk@€Ö-œ‰Î<8­ÖóGãw»‚¤IÝ™@ißJ•%°\rÀ=£è«ð“7ÈÄä°0D¸ú8j¦rÀƒ”¯8íì·¹˜äÇf=0ùŒ„YÓHÀfH[å[)Vcã˜œ*õU¢Uê²º­Ø˜Î0±!lBOU€:Õh2ÁS¯Õ‚ËÒmZð8]·›åx…ÐZ ×Ìˆ´®°ÐO[ToòVE\n}kj‹'ÐH)CÎ¬ÑDFÝ½Z,õr©SÐ.\0ºËà?®uVå\"„pÑô?ˆ¯è@T³ˆÖlîöm|ª,àVäm)3šYÚ˜ŒÃ=Á÷ò8DÓfBèß\"Ý‡N´8ß~XE\"æGÓU™\\È¨°¥0Ï\0ÉÂYšLÑ’Ù\$f\0À 9uÑ­¢úÌŠÓEæ²K-;6…\rüó\"ñÙí‹«TÚfÖ¬7´”Š;2ËMâÂ1%G|Ë-.m[W×µ¡-ý6×`*pŽ6À®‹æ\0ñk›G&1#d¶¤× a2+M³qÏM”@}íGjZæ€²ÕF•)”HÓUÉ¡ì\nÄgâöb2ñ[&¢ÖÝ¯))3L\"®m\">ü`¢åoˆ¦[èñV˜¶É¥m·S€>ÌÜ?Q<\rdGYJz`©`zØ\0è\$„D7V’µ¹yÂªÀÃÑ°AiËÚ¸¤r®-Y1/ÖVÒuœØq™\\jªU4ÒØêqY*\$Lð‚j#NvˆôPÒ\rµ§\"¼ü€ÛYâJZ~Ühþò4¨ÿ\\ÂÍLê…ÓI1ÇU–&&¡ü³ðb9æ8yâ=ˆ	Ç-ñÇ\\øß÷@VøZÞ1,ÍÄ\"PDC“+RvÃ)\$\"mX(˜+”,\$DI-¥±ëQr’Bt¡‚ã¡'¸ýÈ`Ø‹‘jŒ%­·ž°ïk5Œ… W¼-çï{ÍŽÆô°¦½Ê.LKÓ^„÷£¸ÚÎÐÀô³Š¨Ã+d9X”Š»áÇ]ÒÊ«Ï¬¬Z•k`ÍÀž¶¦Œ³•,F=|ºÐ/Œ 6­#½hÂ'\n[8–Å­«}ïY2Ù\"È…Ý÷ÝTs~Dà(ÔÀ½;\"y8×u[\n‹Û’\nÀ|\0BQN§	±yéÎ0Íüïê(«û¸=ÂOq¥1†Pô×Zÿâ¿Ó‹ê (à\$(¸·È^U€RÖ!/VRl<{EÃTr’	`4µ‚· ÷Ä\"ä(é‰N½µ¬¿j)\0çp[{Ñ?õÁ)‰DŒ8Š´È¡eù+W~À-Ü/u°¢ÜduÊ›þý8+ÂZÄzøPe6“8RõIw…!ÚáVÀ>°pœ<wBµOHH+Z‹LxQ”_D€mœ+ÏØ€ÞcgØ¸¢!VákÂoP1«82Ø_™¶i…†9®á\0 À_~º0ÙÈÍáUâ¼e%ðjÊ×!`h5¥0ÄàL2`°x‹ª¨E€ËˆøÍaS“Â¸ë€<Cõ~«÷CŠ\\[Ä,«—žN×ÅŒÆ\$\nÃy\$xr IŸ+QadWô¿´/0)Ëë­ýŠ¼íéØœ¬š{2vŠÊ¥IòìBJ\$œ¯\rfÕˆDÅ9VŒNðšVzëÜcbgR!²£*°ÚÈ¹”)4óÆ)Á«#„QX82©¢zÆy£©|úVß6\"Ô­­\0,ÙBa³ŒO{¼í@ÑJäHùÕ/žnh\\±2²!]Côu®ÔI»¶Jî²¥Ú([aè\nÜAêþ¦K(ƒsK)cm|qd;»n’•ûÛ+\$V­í’•\\‘§¡²€^¿mÕ@ÝGñBR äuÈèe‡w+€\0®•µç{Ø\nì‘k©€Ÿ#YËÞ]ó‘¡AäTyXE\$r\\<Ûµ†&@nÉ ã²Kvœ˜d¦íÃÓ>ÙÌ)Œ7:YhÎ¶4L9‹fG”ÓVE¤¡e}	Ì\"2ëcáK\rÎª¡´#\ncPn˜À]q*ilœÝ-õÜi\"ä Sjµ•ìÀhMäÉËkšëÏŽÁ‰ÍXDÓLR1@”sA³)9Æ•1—üÀ‡x‰\0,CE”ƒ± ¹	Sô‹VqÖŽâVÄàRš\0ÊL³ö¢˜ê¾Â_K†ÙBPnlœÝmÊ?™ÜV£<¡rÎŽÀøs–(Z´ìÐÏA“Mœàà€¶Ùèl¾óñžÂÜwkøÅ²sÖkŒ>¦ï€w<”–X[vFÙýd!½˜.PÝ¢ždåd!—~a„-²@’¦&0ä¾8-Ò£4ÐŠŒÊ÷yŸ2|‰¢k@è2Ð’Ðæ„¯\"„_Ú&ˆö·Ìrnè¯B¶ìQvÛÔôŽe§›#u:eŠ(ØFÚ-SŸ\$p—Xº5»6‡ŸÛ¢'!â¦C·ÑZ#t[eShÀ[V{Ñ˜®âM]éWFêüE¦ŽƒTý¢ù–ÇFåú´ëu,³in^éFª5ÒÝ:éAQÉ+õ®ÑÑ£ËíP¡å¶=îèä=Â‡º4‘¨Dl#iðT./6Bg¥@ç›iÐ·g³Ó”ÄÛ\\ikR“Å µFÃ…43%Çh³Åè\nc|ï´Kè‰'2ˆñ¡\$GLéSDZ’ùºb.•ZO§wÔ·Q©„F•Ki–á*–Û‡xû·ö4Cu­ •áÂà{Õ£ŽNƒUó°‘â9â¤:Üµ%F×?\$©öýl-úùX4zÝs˜•Xø³ê®Êú®šTÿõet„Hå·Z#SrÜRôÔjG+…3sø õÖ‘\rw„jµŽ¬åX\\î„Ž`)7H€’à\"\0\"ÞÄÒÊHdp\0ðÕ²\$\r][Xl (hÙY–ßRî°¤ÓA²%Ó6ÂRO£6ÚCGv+ÔM´ç¤\r—„³HŽ¨¨–v›n,³Q·RÉÓö¦€w²f\nlËJ!oI˜_œæiê²º®@jÄkèÞ¾E†ûD´¤qu´BÅ\"Ð.<9á´µ€ê_j£H¡jò×Pw\$VvþI”õˆ‰´H±¤úÕ5j6ÙµÝ›YE´áA3˜bq3ØÙ¶& ÁF¤¤J{½û#Ø(ü/Kp&w8çŒ\n‹ÆŒµÞv”“ubÒÝm#mübz±&_ZÔ÷:³FR±#U¾–l)w…W`N&\r\0w(%]Êo™(Íî‰è¹çÆzw6QiË@\n P @¨P<È2U)ä€æªmã!hèFù;Ã`Ï'*åIÙ³üýúˆÎYK“°¦´4‹“`@;G\n„\nT&˜èèÃÙB Ç£Àag„ˆ9úbƒ`˜Ï[)o´u@aß…×Æ!±'…¨\\†é |ÿ×* ‡Và@c´ñÕ;\næ}ÏáyÃ\0006©7±¾Mº^ÅÉ\"Œš¨†4T©M±í~\nMÅ6³8M€ûFÜ)³Oe£Óê*ü¦]Áˆ—ë„“†^aU\n5e\r§Åò™Š‚¯S«@\r\nÜŸì}\0)b°1:Íð‚žÃHCˆ!Önã¨í8ïÄ²óqëà:ãûôÒÁÁd³×‡\nÙ¤ÊÐ¨…±†d|ãA¯#^p/ ,×Xiu1µhñàÅ)'7Jm9\r”ð¤œzû¨†S|äÑø¼ªO\$¹*õ¾U\0÷•@1Ðê‡ÉV3†Ggw]º{'S’aË!”ü³ä/GV¤U>ÿ•£{sgyTÞX…·–¯uå6[Ë/Â®hó;—üUIÂSÌ16¦Ü“\\Èzï3†.qFÏˆ\"*•ÎV5£ß–”’¸¯(¸ÁÉ|‹å,ÝäÝ29;•ä‚ ,\r€\$ÔÐž¸áZFzòAGÜýäLù¤^EpÅTLõ}ÿDù»Ñw×`ã†<¡è­äp^Ró“gëïèã;9bŒýpc&œåæŠ¹ÓÌnuÝ¤t/÷zð¹D\$ …(ø=1„\09âÞ™òá\n‡WB \nùvVî_\0ï©9&Q÷O^ÁÊþ¡{£Pæ<ÀéÏ©íÒÜ¸\"jµÚysÊ®xõ“›ÝUè˜	ú£8epk}ép+ðÔm;¡óõ“„“þž•\0KqÇnµh[æPìÃóp.pH¼7QR»F˜ð¼uAnë'	zú¯ÇÌÊôD\"ãè¶\0+z±€¬E‚z \nù§DÈ*vvJÁ÷è\n”ØøÄ¤\0¿µïŒÑ»»MÓá0”öé½ãô·(ýÚîØvÇ¶zR3Ð@œ”ãø¹=1\\k«äëy¡1UuÉÒ¨´ª þ]LCºàfÔ–@{Gü¯€¬ºD)†Tþé\0´a€b€§x€X5mÔ[X³{=£ÌÐ8\$Zw\"ßX²±gÁÔ@Üß1SÅ‘>Yçc ý_J@JØ^@÷ <Z¯éxD•	Ði-‹>ý0\"¯NCQºV’>ú3Ú¡óïÃ*±f)lYÂ¹ýD¨ÜÅæŽêwTotƒÞA±gŸÆxH \"¡°Ò°d75Å\$Ô!²;\$\$Q\n ;6¬_§~:×Ã5OfÈpàlé\nüv5\0´!b (Ðäî‹ýþùúR_˜GD4â€È^)ó3ýÕ€ö×·ø§©\\*G”H[›06!Lè~V	g7Àéå¯ywÍœÍX¼¾¿d0¡e~dVEójø\0¹íÈw9‡úé!Tœø„ˆ%ÖðÇ~ÉgZ“t»!//Úºä'!V)‘—ÓC!ð‚þJnC§µ÷ÇÒ½øÐ%ükäÓxœP[ÕÏìauÂÐ");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0œF£©ÌÐ==˜ÎFS	ÐÊ_6MÆ³˜èèr:™E‡CI´Êo:C„”Xc‚\ræØ„J(:=ŸE†¦a28¡xð¸?Ä'ƒi°SANN‘ùðxs…NBáÌVl0›ŒçS	œËUl(D|Ò„çÊP¦À>šE†ã©¶yHchäÂ-3Eb“å ¸b½ßpEÁpÿ9.Š˜Ì~\nŽ?Kb±iw|È`Ç÷d.¼x8EN¦ã!”Í2™‡3©ˆá\r‡ÑYŽÌèy6GFmYŽ8o7\n\r³0¤÷\0DbcÓ!¾Q7Ð¨d8‹Áì~‘¬N)ùEÐ³`ôNsßð`ÆS)ÐOé—·ç/º<xÆ9Žo»ÔåµÁì3n«®2»!r¼:;ã+Â9ˆCÈ¨®‰Ã\n<ñ`Èó¯bè\\š?`†4\r#`È<¯BeãB#¤N Üã\r.D`¬«jê4ÿŽŽpéar°øã¢º÷>ò8Ó\$Éc ¾1Écœ ¡c êÝê{n7ÀÃ¡ƒAðNÊRLi\r1À¾ø!£(æjÂ´®+Âê62ÀXÊ8+Êâàä.\rÍÎôƒÎ!x¼åƒhù'ãâˆ6Sð\0RïÔôñOÒ\n¼…1(W0…ãœÇ7qœë:NÃE:68n+ŽäÕ´5_(®s \rã”ê‰/m6PÔ@ÃEQàÄ9\n¨V-‹Áó\"¦.:åJÏ8weÎq½|Ø‡³XÐ]µÝY XÁeåzWâü Ž7âûZ1íhQfÙãu£jÑ4Z{p\\AUËJ<õ†káÁ@¼ÉÃà@„}&„ˆL7U°wuYhÔ2¸È@ûu  Pà7ËA†hèÌò°Þ3Ã›êçXEÍ…Zˆ]­lá@MplvÂ)æ ÁÁHW‘‘Ôy>Y-øYŸè/«›ªÁî hC [*‹ûFã­#~†!Ð`ô\r#0PïCË—f ·¶¡îÃ\\î›¶‡É^Ã%B<\\½fˆÞ±ÅáÐÝã&/¦O‚ðL\\jF¨jZ£1«\\:Æ´>N¹¯XaFÃAÀ³²ðÃØÍf…h{\"s\n×64‡ÜøÒ…¼?Ä8Ü^p\"ë°ñÈ¸\\Úe(¸PƒNµìq[g¸Árÿ&Â}PhÊà¡ÀWÙí*Þír_sËP‡hà¼àÐ\nÛËÃomõ¿¥Ãê—Ó#§¡.Á\0@épdW ²\$Òº°QÛ½Tl0† ¾ÃHdHë)š‡ÛÙÀ)PÓÜØHgàýUþ„ªBèe\r†t:‡Õ\0)\"Åtô,´œ’ÛÇ[(DøO\nR8!†Æ¬ÖšðÜlAüV…¨4 hà£Sq<žà@}ÃëÊgK±]®àè]â=90°'€åâøwA<‚ƒÐÑaÁ~€òWšæƒD|A´††2ÓXÙU2àéyÅŠŠ=¡p)«\0P	˜s€µn…3îr„f\0¢F…·ºvÒÌG®ÁI@é%¤”Ÿ+Àö_I`¶ÌôÅ\r.ƒ N²ºËKI…[”Ê–SJò©¾aUf›Szûƒ«M§ô„%¬·\"Q|9€¨Bc§aÁq\0©8Ÿ#Ò<a„³:z1Ufª·>îZ¹l‰‰¹ÓÀe5#U@iUGÂ‚™©n¨%Ò°s¦„Ë;gxL´pPš?BçŒÊQ\\—b„ÿé¾’Q„=7:¸¯Ý¡Qº\r:ƒtì¥:y(Å ×\nÛd)¹ÐÒ\nÁX; ‹ìŽêCaA¬\ráÝñŸP¨GHù!¡ ¢@È9\n\nAl~H úªV\nsªÉÕ«Æ¯ÕbBr£ªö„’­²ßû3ƒ\ržP¿%¢Ñ„\r}b/‰Î‘\$“5§PëCä\"wÌB_çŽÉUÕgAtë¤ô…å¤…é^QÄåUÉÄÖj™Áí Bvhì¡„4‡)¹ã+ª)<–j^<Lóà4U* õBg ëÐæè*nÊ–è-ÿÜõÓ	9O\$´‰Ø·zyM™3„\\9Üè˜.oŠ¶šÌë¸E(iåàžœÄÓ7	tßšé-&¢\nj!\rÀyœyàD1gðÒö]«ÜyRÔ7\"ðæ§·ƒˆ~ÀíàÜ)TZ0E9MåYZtXe!Ýf†@ç{È¬yl	8‡;¦ƒR{„ë8‡Ä®ÁeØ+ULñ'‚F²1ýøæ8PE5-	Ð_!Ô7…ó [2‰JËÁ;‡HR²éÇ¹€8pç—²Ý‡@™£0,Õ®psK0\r¿4”¢\$sJ¾Ã4ÉDZ©ÕI¢™'\$cL”R–MpY&ü½Íiçz3GÍzÒšJ%ÁÌPÜ-„[É/xç³T¾{p¶§z‹CÖvµ¥Ó:ƒV'\\–’KJa¨ÃMƒ&º°£Ó¾\"à²eo^Q+h^âÐiTð1ªORäl«,5[Ý˜\$¹·)¬ôjLÆU`£SË`Z^ð|€‡r½=Ð÷nç™»–˜TU	1Hyk›Çt+\0váD¿\r	<œàÆ™ìñjG”ž­tÆ*3%k›YÜ²T*Ý|\"CŠülhE§(È\rÃ8r‡×{Üñ0å²×þÙDÜ_Œ‡.6Ð¸è;ãü‡„rBjƒO'Ûœ¥¥Ï>\$¤Ô`^6™Ì9‘#¸¨§æ4Xþ¥mh8:êûc‹þ0ø×;Ø/Ô‰·¿¹Ø;ä\\'( î„tú'+™òý¯Ì·°^]­±NÑv¹ç#Ç,ëvð×ÃOÏiÏ–©>·Þ<SïA\\€\\îµü!Ø3*tl`÷u\0p'è7…Pà9·bsœ{Àv®{·ü7ˆ\"{ÛÆrîaÖ(¿^æ¼ÝE÷úÿë¹gÒÜ/¡øžUÄ9g¶î÷/ÈÔ`Ä\nL\n)À†‚(Aúað\" žçØ	Á&„PøÂ@O\nå¸«0†(M&©FJ'Ú! …0Š<ïHëîÂçÆù¥*Ì|ìÆ*çOZím*n/bî/ö®Ôˆ¹.ìâ©o\0ÎÊdnÎ)ùŽi:RŽÎëP2êmµ\0/vìOX÷ðøFÊ³ÏˆîŒè®\"ñ®êöî¸÷0õ0ö‚¬©í0bËÐgjðð\$ñné0}°	î@ø=MÆ‚0nîPŸ/pæotì€÷°¨ð.ÌÌ½g\0Ð)o—\n0È÷‰\rF¶é€ b¾i¶Ão}\n°Ì¯…	NQ°'ðxòFaÐJîÎôLõéðÐàÆ\rÀÍ\r€Öö‘0Åñ'ð¬Éd	oepÝ°4DÐÜÊ¦q(~ÀÌ ê\r‚E°ÛprùQVFHœl£‚Kj¦¿äN&­j!ÍH`‚_bh\r1Ž ºn!ÍÉŽ­z™°¡ð¥Í\\«¬\rŠíŠÃ`V_kÚÃ\"\\×‚'Vˆ«\0Ê¾`ACúÀ±Ï…¦VÆ`\r%¢’ÂÅì¦\rñâƒ‚k@NÀ°üBñíš™¯ ·!È\n’\0Z™6°\$d Œ,%à%laíH×\n‹#¢S\$!\$@¶Ý2±„I\$r€{!±°J‡2HàZM\\ÉÇhb,‡'||cj~gÐr…`¼Ä¼º\$ºÄÂ+êA1ðœE€ÇÀÙ <ÊL¨Ñ\$âY%-FDªŠd€Lç„³ ª\n@’bVfè¾;2_(ëôLÄÐ¿Â²<%@Úœ,\"êdÄÀN‚erô\0æƒ`Ä¤Z€¾4Å'ld9-ò#`äóÅ–…à¶Öãj6ëÆ£ãv ¶àNÕÍf Ö@Ü†“&’B\$å¶(ðZ&„ßó278I à¿àP\rk\\§—2`¶\rdLb@Eöƒ2`P( B'ã€¶€º0²& ô{Â•“§:®ªdBå1ò^Ø‰*\r\0c<K|Ý5sZ¾`ºÀÀO3ê5=@å5ÀC>@ÂW*	=\0N<g¿6s67Sm7u?	{<&LÂ.3~DÄê\rÅš¯x¹í),rîinÅ/ åO\0o{0kÎ]3>m‹”1\0”I@Ô9T34+Ô™@e”GFMCÉ\rE3ËEtm!Û#1ÁD @‚H(‘Ón ÃÆ<g,V`R]@úÂÇÉ3Cr7s~ÅGIói@\0vÂÓ5\rVß'¬ ¤ Î£PÀÔ\râ\$<bÐ%(‡Ddƒ‹PWÄîÐÌbØfO æx\0è} Üâ”lb &‰vj4µLS¼¨Ö´Ô¶5&dsF Mó4ÌÓ\".HËM0ó1uL³\"ÂÂ/J`ò{Çþ§€ÊxÇYu*\"U.I53Q­3Qô»J„”g ’5…sàúŽ&jÑŒ’Õu‚Ù­ÐªGQMTmGBƒtl-cù*±þ\rŠ«Z7Ôõó*hs/RUV·ðôªBŸNËˆ¸ÃóãêÔŠài¨Lk÷.©´Ätì é¾©…rYi”Õé-Sµƒ3Í\\šTëOM^­G>‘ZQjÔ‡™\"¤Ž¬i”ÖMsSãS\$Ib	f²âÑuæ¦´™å:êSB|i¢ YÂ¦ƒà8	vÊ#é”Dª4`‡†.€Ë^óHÅM‰_Õ¼ŠuÀ™UÊz`ZJ	eçºÝ@Ceíëa‰\"mób„6Ô¯JRÂÖ‘T?Ô£XMZÜÍÐ†ÍòpèÒ¶ªQv¯jÿjV¶{¶¼ÅCœ\rµÕ7‰TÊžª úí5{Pö¿]’\rÓ?QàAAÀèŽ‹’Í2ñ¾ “V)Ji£Ü-N99f–l JmÍò;u¨@‚<FþÑ ¾e†j€ÒÄ¦I‰<+CW@ðçÀ¿Z‘lÑ1É<2ÅiFý7`KG˜~L&+NàYtWHé£‘w	Ö•ƒòl€Òs'gÉãq+Lézbiz«ÆÊÅ¢Ð.ÐŠÇzW²Ç ùzd•W¦Û÷¹(y)vÝE4,\0Ô\"d¢¤\$Bã{²Ž!)1U†5bp#Å}m=×È@ˆwÄ	P\0ä\rì¢·‘€`O|ëÆö	œÉüÅõûYôæJÕ‚öE×ÙOuž_§\n`F`È}MÂ.#1á‚¬fì*´Õ¡µ§  ¿zàucû€—³ xfÓ8kZR¯s2Ê‚-†’§Z2­+ŽÊ·¯(åsUõcDòÑ·Êì˜ÝX!àÍuø&-vPÐØ±\0'LïŒX øLÃ¹Œˆo	Ýô>¸ÕŽÓ\r@ÙPõ\rxF×üE€ÌÈ­ï%Àãì®ü=5NÖœƒ¸?„7ùNËÃ…©wŠ`ØhX«98 Ìø¯q¬£zãÏd%6Ì‚tÍ/…•˜ä¬ëLúÍl¾Ê,ÜKa•N~ÏÀÛìú,ÿ'íÇ€M\rf9£w˜!x÷x[ˆÏ‘ØG’8;„xA˜ù-IÌ&5\$–D\$ö¼³%…ØxÑ¬Á”ÈÂ´ÀÂŒ]›¤õ‡&o‰-39ÖLù½zü§y6¹;u¹zZ èÑ8ÿ_•Éx\0D?šX7†™«’y±OY.#3Ÿ8 ™Ç€˜e”Q¨=Ø€*˜™GŒwm ³Ú„Y‘ù ÀÚ]YOY¨F¨íšÙ)„z#\$eŠš)†/Œz?£z;™—Ù¬^ÛúFÒZg¤ù• Ì÷¥™§ƒš`^Úe¡­¦º#§“Øñ”©Žú?œ¸e£€M£Ú3uÌåƒ0¹>Ê\"?Ÿö@×—Xv•\"ç”Œ¹¬¦*Ô¢\r6v~‡ÃOV~&×¨^gü šÄ‘Ùž‡'Î€f6:-Z~¹šO6;zx²;&!Û+{9M³Ù³d¬ \r,9Öí°ä·WÂÆÝ­:ê\rúÙœùã@ç‚+¢·]œÌ-ž[gž™Û‡[s¶[ižÙiÈq››y›éxé+“|7Í{7Ë|w³}„¢›£E–ûW°€Wk¸|JØ¶å‰xmˆ¸q xwyjŸ»˜#³˜e¼ø(²©‰¸ÀßžÃ¾™†ò³ {èßÚ y“ »M»¸´@«æÉ‚“°Y(gÍš-ÿ©º©äí¡š¡ØJ(¥ü@ó…;…yÂ#S¼‡µY„Èp@Ï%èsžúoŸ9;°ê¿ôõ¤¹+¯Ú	¥;«ÁúˆZNÙ¯Âº§„š k¼V§·u‰[ñ¼x…|q’¤ON?€ÉÕ	…`uœ¡6|­|X¹¤­—Ø³|Oìx!ë:¨œÏ—Y]–¬¹Ž™c•¬À\r¹hÍ9nÎÁ¬¬ë€Ï8'—ù‚êà Æ\rS.1¿¢USÈ¸…¼X‰É+ËÉz]ÉµÊ¤?œ©ÊÀCË\r×Ë\\º­¹ø\$Ï`ùÌ)UÌ|Ë¤|Ñ¨x'ÕœØÌäÊ<àÌ™eÎ|êÍ³ç—â’Ìé—LïÏÝMÎy€(Û§ÐlÐº¤O]{Ñ¾×FD®ÕÙ}¡yu‹ÑÄ’ß,XL\\ÆxÆÈ;U×ÉWt€vŸÄ\\OxWJ9È’×R5·WiMi[‡Kˆ€f(\0æ¾dÄšÒè¿©´\rìMÄáÈÙ7¿;ÈÃÆóÒñçÓ6‰KÊ¦Iª\rÄÜÃxv\r²V3ÕÛßÉ±.ÌàRùÂþÉá|Ÿá¾^2‰^0ß¾\$ QÍä[ã¿D÷áÜ£å>1'^X~t1\"6Lþ›+þ¾Aàžeá“æÞåI‘ç~Ÿåâ³â³@ßÕ­õpM>Óm<´ÒSKÊç-HÉÀ¼T76ÙSMfg¨=»ÅGPÊ°›PÖ\r¸é>Íö¾¡¥2Sb\$•C[Ø×ï(Ä)žÞ%Q#G`uð°ÇGwp\rkÞKe—zhjÓ“zi(ôèrO«óÄÞÓþØT=·7³òî~ÿ4\"ef›~íd™ôíVÿZ‰š÷U•-ëb'VµJ¹Z7ÛöÂ)T‘£8.<¿RMÿ\$‰žôÛØ'ßbyï\n5øƒÝõ_ŽàwñÎ°íUð’`eiÞ¿J”b©gðuSÍë?Íå`öážì+¾Ïï Mïgè7`ùïí\0¢_Ô-ûŸõ_÷–?õF°\0“õ¸X‚å´’[²¯Jœ8&~D#Áö{P•Øô4Ü—½ù\"›\0ÌÀ€‹ý§ý@Ò“–¥\0F ?* ^ñï¹å¯wëÐž:ð¾uàÏ3xKÍ^ów“¼¨ß¯‰y[Ôž(žæ–µ#¦/zr_”g·æ?¾\0?€1wMR&M¿†ù?¬St€T]Ý´Gõ:I·à¢÷ˆ)‡©Bïˆ‹ vô§’½1ç<ôtÈâ6½:W{ÀŠôx:=Èî‘ƒŒÞšóø:Â!!\0x›Õ˜£÷q&áè0}z\"]ÄÞo•z¥™ÒjÃw×ßÊÚÁ6¸ÒJ¢PÛž[\\ }ûª`S™\0à¤qHMë/7B’€P°ÂÄ]FTã•8S5±/IÑ\rŒ\n îO¯0aQ\n >Ã2­j…;=Ú¬ÛdA=­p£VL)Xõ\nÂ¦`e\$˜TÆ¦QJÍó®ælJïŠÔîÑy„IÞ	ä:ƒÑÄÄBùbPÀ†ûZÍ¸n«ª°ÕU;>_Ñ\n	¾õëÐÌ`–ÔuMòŒ‚‚ÂÖm³ÕóÂLwúB\0\\b8¢MÜ[z‘&©1ý\0ô	¡\r˜TÖ×› €+\\»3ÀPlb4-)%Wd#\nÈårÞåMX\"Ï¡ä(Ei11(b`@fÒ´­ƒSÒóˆjåD†bf£}€rï¾‘ýD‘R1…´bÓ˜AÛïIy\"µWvàÁgC¸IÄJ8z\"P\\i¥\\m~ZR¹¢vî1ZB5IŠÃi@x”†·°-‰uM\njKÕU°h\$o—ˆJÏ¤!ÈL\"#p7\0´ P€\0ŠD÷\$	 GK4eÔÐ\$\nGä?ù3£EAJF4àIp\0«×FŽ4±²<f@ž %q¸<kãw€	àLOp\0‰xÓÇ(	€G>ð@¡ØçÆÆ9\0TÀˆ˜ìGB7 - €žøâG:<Q™ #Ã¨ÓÇ´û1Ï&tz£á0*J=à'‹J>ØßÇ8q¡Ð¥ªà	€OÀ¢XôF´àQ,ÀÊÐ\"9‘®pä*ð66A'ý,y€IF€Rˆ³TˆÏý\"”÷HÀR‚!´j#kyFÀ™àe‘¬z£ëéÈðG\0Žp£‰aJ`C÷iù@œT÷|\n€Ix£K\"­´*¨Tk\$c³òÆ”aAh€“! \"úE\0OdÄSxò\0T	ö\0‚žà!FÜ\n’U“|™#S&		IvL\"”“…ä\$hÐÈÞEAïN\$—%%ù/\nP†1š“²{¤ï) <‡ð L å-R1¤â6‘¶’<@O*\0J@q¹‘Ôª#É@Çµ0\$tƒ|’]ã`»¡ÄŠA]èÍìPá‘€˜CÀp\\pÒ¤\0™ÒÅ7°ÄÖ@9©bmˆr¶oÛC+Ù]¥JrÔfü¶\rì)d¤’Ñœ­^hßI\\Î. g–Ê>¥Í×8ŒÞÀ'–HÀf™rJÒ[rçoã¥¯.¹v„½ï#„#yR·+©yËÖ^òù›†F\0á±™]!É•ÒÞ”++Ù_Ë,©\0<@€M-¤2WòâÙR,c•Œœe2Ä*@\0êP €Âc°a0Ç\\PÁŠˆO ø`I_2Qs\$´w£¿=:Îz\0)Ì`ÌhŠÂ–Áƒˆç¢\nJ@@Ê«–\0šø 6qT¯å‡4J%•N-ºm¤Äåã.É‹%*cnäËNç6\"\rÍ‘¸òè—ûŠfÒAµÁ„põMÛ€I7\0™MÈ>lO›4ÅS	7™cÍì€\"ìß§\0å“6îps…–ÄÝåy.´ã	ò¦ñRKð•PAo1FÂtIÄb*ÉÁ<‡©ý@¾7ÐË‚p,ï0NÅ÷: ¨N²m ,xO%è!‚Úv³¨˜ gz(ÐM´óÀIÃà	à~yËö›h\0U:éØOZyA8<2§²ð¸ÊusÞ~lòÆÎEð˜O”0±Ÿ0]'…>¡ÝÉŒ:ÜêÅ;°/€ÂwÒôäì'~3GÎ–~Ó­äþ§c.	þ„òvT\0cØt'Ó;P²\$À\$ø€‚Ð-‚s³òe|º!•@dÐObwÓæc¢õ'Ó@`P\"xôµèÀ0O™5´/|ãU{:b©R\"û0…Ñˆk˜Ðâ`BD\nk€Pãc©á4ä^ p6S`Ü\$ëf;Î7µ?lsÅÀß†gDÊ'4Xja	A‡…E%™	86b¡:qr\r±]C8ÊcÀF\n'ÑŒf_9Ã%(¦š*”~ŠãiSèÛÉ@(85 T”Ë[þ†JÚ4I…l=°ŽQÜ\$dÀ®hä@D	-Ù!ü_]ÉÚH–ÆŠ”k6:·Úò\\M-ÌØðò£\r‘FJ>\n.‘”qeGú5QZ´†‹' É¢ž½Û0ŸîzP–à#Å¤øöÖéràÒít½’ÒÏËŽþŠ<QˆT¸£3D\\¹„ÄÓpOE¦%)77–Wt[ºô@¼›Žš\$F)½5qG0«-ÑW´v¢`è°*)RrÕ¨=9qE*K\$g	‚íA!åPjBT:—Kû§!×÷H“ R0?„6¤yA)B@:Q„8B+J5U]`„Ò¬€:£ðå*%Ip9ŒÌ€ÿ`KcQúQ.B”±Ltbª–yJñEê›Té¥õ7•ÎöAmÓä¢•Ku:ŽðSji— 5.q%LiFºšTr¦Ài©ÕKˆÒ¨z—55T%U•‰UÚIÕ‚¦µÕY\"\nSÕm†ÑÄx¨½Ch÷NZ¶UZ”Ä( Bêô\$YËV²ã€u@è”»’¯¢ª|	‚\$\0ÿ\0 oZw2Ò€x2‘ûk\$Á*I6IÒn• •¡ƒI,€ÆQU4ü\n„¢).øQôÖaIá]™À èLâh\"øf¢ÓŠ>˜:Z¥>L¡`n˜Ø¶Õì7”VLZu”…e¨ëXúè†ºB¿¬¥B‰º’¡Z`;®ø•J‡]òÑ€žäS8¼«f \nÚ¶ˆ#\$ùjM(¹‘Þ¡”„¬a­Gí§Ì+Aý!èxL/\0)	Cö\nñW@é4€ºáÛ©• ŠÔRZƒ®â =˜Çî8“`²8~â†hÀìP °\r–	°žìD-FyX°+Êf°QSj+Xó|•È9-’øs¬xØü†ê+‰VÉcbpì¿”o6HÐq °³ªÈ@.€˜l 8g½YMŸÖWMPÀªU¡·YLß3PaèH2Ð9©„:¶a²`¬Æd\0à&ê²YìÞY0Ù˜¡¶SŒ-—’%;/‡TÝBS³PÔ%fØÚý• @ßFí¬(´Ö*Ñq +[ƒZ:ÒQY\0Þ´ëJUYÖ“/ý¦†pkzÈˆò€,´ðª‡ƒjÚê€¥W°×´e©JµFèýVBIµ\r£ÆpF›NÙ‚Ö¶™*Õ¨Í3kÚ0§D€{™Ôø`q™•Ò²Bqµe¥D‰cÚÚÔVÃE©‚¬nñ×äFG E›>jîèÐú0g´a|¡Shì7uÂÝ„\$•†ì;aô—7&¡ë°R[WX„ÊØ(qÖ#Œ¬P¹Æä×–Ýc8!°H¸àØVX§ÄŽ­jøÊZŽô‘¡¥°Q,DUaQ±X0‘ÕÕ¨ÀÝËGbÁÜlŠBŠt9-oZü”L÷£¥Â­åpË‡‘x6&¯¯MyÔÏsÒ¿–èð\"ÕÍ€èR‚IWU`c÷°à}l<|Â~Äw\"·ðvI%r+‹Rà¶\n\\ØùÃÑ][‹Ñ6&Á¸ÝÈ­Ãa”ÓºìÅj¹(Ú“ðTÑ“À·C'Š…´ '%de,È\n–FCÅÑe9C¹NäÐ‚-6”UeÈµŒýCX¶ÐV±ƒ¹ýÜ+ÔR+ºØ”Ë•3BÜÚŒJð¢è™œ±æT2 ]ì\0PèaÇt29Ï×(i‹#€aÆ®1\"S…:ö· ˆÖoF)kÙfôòÄÐª\0ÎÓ¿þÕ,ËÕwêƒJ@ìÖVò„Žµéq.e}KmZúÛïå¹XnZ{G-»÷ÕZQº¯Ç}‘Å×¶û6É¸ðµÄ_žØÕ‰à\nÖ@7ß` Õï‹˜C\0]_ ©Êµù¬«ï»}ûGÁWW: fCYk+éÚbÛ¶·¦µ2S,	Ú‹Þ9™\0ï¯+þWÄZ!¯eþ°2ûôà›—í²k.OcƒÖ(vÌ®8œDeG`Û‡ÂŒöL±õ“,ƒdË\"CÊÈÖB-”Ä°(þ„„„p÷íÓp±=àÙü¶!ýk’ØÒÄ¼ï}(ýÑÊB–kr_Rî—Ü¼0Œ8a%Û˜L	\0é†Àñ‰b¥²šñÅþ@×\"ÑÏr,µ0TÛrV>ˆ…ÚÈQŸÐ\"•rÞ÷P‰&3báP²æ- x‚Ò±uW~\"ÿ*èˆžŒNâh—%7²µþK¡Y€€^A÷®úÊC‚èþ»p£áîˆ\0ð..`cÅæ+ÏŠâGJ£¤¸H¿À®E‚…¤¾l@|I#AcâÿD…|+<[c2Ü+*WS<ˆràãg¸ÛÅ}‰Š>iÝ€!`f8ñ€(c¦èÉQý=fñ\nç2Ñc£h4–+q8\na·RãBÜ|°R“×ê¿ÝmµŠ\\qÚõgXÀ –ÏŽ0äXä«`nîF€îìŒO pÈîHòCƒ”jd¡fµßEuDV˜bJÉ¦¿å:±ï€\\¤!mÉ±?,TIa˜†ØaT.L€]“,JŒ?™?Ï”FMct!aÙ§RêF„Gð!¹Aõ“»rrŒ-pŽXŸ·\r»òC^À7áð&ãRé\0ÎÑf²*àA\nõÕ›Háã¤yîY=Çúè…l€<‡¹AÄ_¹è	+‘ÎtAú\0B•<Ay…(fy‹1Îc§O;pèÅá¦`ç’4Ð¡Mìà*œîf†ê 5fvy {?©àË:yøÑ^câÍuœ'‡™€8\0±¼Ó±?«ŠgšÓ‡ 8BÎ&p9ÖO\"zÇõžrs–0ºæB‘!uÍ3™f{×\0£:Á\n@\0ÜÀ£pÙÆ6þv.;àú©„Êb«Æ«:J>Ë‚‰é-ÃBÏhkR`-ÜñÎðawæxEj©…÷Árž8¸\0\\Áïô€\\¸Uhm› ý(mÕH3Ì´í§S™“Áæq\0ùŸNVh³Hy	—»5ãMÍŽe\\g½\nçIP:Sj¦Û¡Ù¶è<Ž¯Ñxó&ŒLÚ¿;nfÍ¶cóq›¦\$fð&lïÍþi³…œàç0%yÎž¾tì/¹÷gUÌ³¬dï\0e:ÃÌhïZ	Ð^ƒ@ç ý1€Ïm#ÑNów@ŒßOððzGÎ\$ò¨¦m6é6}ÙÒÒ‹šX'¥I×i\\QºY€¸4k-.è:yzÑÈÝH¿¦]ææxåGÏÖ3ü¿M\0€£@z7¢„³6¦-DO34Þ‹\0ÎšÄùÎ°t\"Î\"vC\"JfÏRÊžÔúku3™MÎæ~ú¤ÓŽ5V à„j/3úƒÓ@gG›}Dé¾ºBÓNq´Ù=]\$é¿I‡õÓž”3¨x=_j‹XÙ¨fk(C]^jÙMÁÍF«ÕÕ¡ŒàÏ£CzÈÒVœÁ=]&ž\r´A<	æµÂÀÜãç6ÙÔ®¶×´Ý`jk7:gÍî‘4Õ®áë“YZqÖftu|hÈZÒÒ6µ­iã€°0 ?éõéª­{-7_:°×ÞtÑ¯íck‹`YÍØ&“´éIõlP`:íô j­{hì=Ðf	àÃ[byž¢Ê€oÐ‹B°RS—€¼B6°À^@'4æø1UÛDq}ìÃNÚ(Xô6j}¬cà{@8ãòð,À	ÏPFCàð‰Bà\$mv˜¨Pæ\"ºÛLöÕCS³]›ÝàEÙÞÏlU†Ñfíwh{o(—ä)è\0@*a1GÄ ( D4-cØóP8£N|R›†âVM¸°×n8G`e}„!}¥€Çp»‡Üòý@_¸ÍÑnCtÂ9ŽÑ\0]»u±î¯s»ŠÝ~èr§»#Cn p;·%‹>wu¸ÞnÃwû¤Ýžê.âà[ÇÝhT÷{¸Ýå€¼	ç¨Ë‡·JðÔÆ—iJÊ6æ€O¾=¡€‡ûæßE”÷Ù´‘ImÛïÚV'É¿@â&‚{ª‘›òö¯µ;íop;^–Ø6Å¶@2ç¯lûÔÞNï·ºMÉ¿r€_Ü°ËÃ´` ì( yß6ç7‘¹ýëîÇ‚“7/Ápðe>|ßà	ø=½]Ðocû‘á&åxNm£‰çƒ»¬ào·GÃN	p—‚»˜x¨•Ã½Ýðƒy\\3àø‡Â€'ÖI`râG÷]Ä¾ñ7ˆ\\7Ú49¡]Å^p‡{<Zá·¸q4™uÎ|ÕÛQÛ™àõp™ýši\$¶@oxñ_<Àæ9pBU\"\0005— iä×‚»¸Cûp´\nôi@‚[ãœÆ4¼jÐ„6bæP„\0Ÿ&F2~ŽÀù£¼ïU&š}¾½¿É˜	™ÌDa<€æzx¶k£ˆ‹=ùñ°r3éË(l_”…FeF›ž4ä1“K	\\ÓŽldî	ä1H\r½€ùp!†%bGæXfÌÀ'\0ÈœØ	'6Àžps_›á\$?0\0’~p(H\n€1…W:9ÕÍ¢¯˜`‹æ:hÇB–èg›BŠk©ÆpÄÆót¼ìˆEBI@<ò%Ã¸Àù` êŠyd\\Y@D–P?Š|+!„áWÀø.:ŸLe€v,Ð>qóAÈçº:ž–îbYéˆ@8Ÿd>r/)ÂBç4ÀÐÎ(·Š`|é¸:t±!«‹Á¨?<¯@ø«’/¥ S’¯P\0Âà>\\æâ |é3ï:VÑuw¥ëçx°(®²Ÿœ4€ÇZjD^´¥¦Lý'¼ìÄC[×'ú°§®éjÂº[ E¸ó uã°{KZ[s„ž€6ˆ‚S1Ìz%1õc™£B4ˆB\n3M`0§;çòÌÂ3Ð.”&?¡ê!YAÀI,)ðå•l†W['ÆÊIÂ‡Tjƒè>F©¼÷S§‡ BÐ±Pá»caþÇŒuï¢NÝÏÀøHÔ	LSôî0”ÕY`ÂÆÈ\"il‘\rçB²ëã/Œôãø%P€ÏÝN”Gô0JÆX\n?aë!Ï3@MæF&Ã³Öþ¿,°\"î€èlbô:KJ\rï`k_êb÷üAáÙÄ¯Ìü1ÑI,ÅÝîüˆ;B,×:ó¾ìY%¼J ŽŠ#v”€'†{ßÑÀã„ž	wx:\ni°¶³’}cÀ°eN®Ñï`!wÆ\0ÄBRU#ØSý!à<`–&v¬<¾&íqOÒ+Î£¥sfL9QÒBÊ‡„ÉóäbÓà_+ï«*€Su>%0€Ž™©…8@l±?’L1po.ÄC&½íÉ BÀÊqh˜¦ó­’Ážz\0±`1á_9ð\"–€è!\$øŒ¶~~-±.¼*3r?øÃ²Àd™s\0ÌõÈ>z\nÈ\0Š0 1Ä~‘ô˜Jð³ðú”|SÞœô k7gé\0ŒúKÔ d¶ÙaÉîPgº%ãw“DôêzmÒûÈõ·)¿‘ñŠœj‹Û×Âÿ`k»ÒQà^ÃÎ1üŒº+Îåœ>/wbüGwOkÃÞÓ_Ù'ƒ¬-CJ¸å7&¨¢ºðEñ\0L\r>™!ÏqÌîÒ7ÝÁ­õoŠ™`9O`ˆàƒ”ö+!}÷P~EåNÈc”öQŸ)ìá#ûï#åò‡€ì‡ÌÑøÀ‘¡¯èJñÄz_u{³ÛK%‘\0=óáOŽX«ß¶Cù>\n²€…|wá?ÆF€Åê„Õa–Ï©UÙåÖb	N¥YïÉhŠ½»é‘/úû)ÞGÎŒ2ü™¢K|ã±y/Ÿ\0éä¿Z”{éßP÷YG¤;õ?Z}T!Þ0ŸÕ=mN¯«úÃfØ\"%4™aö\"!–ÞŸúºµ\0çõï©}»î[òçÜ¾³ëbU}»Ú•mõÖ2±• …ö/tþî‘%#.ÑØ–Äÿse€Bÿp&}[ËŸŽÇ7ã<aùKýïñ8æúP\0™ó¡g¼ò?šù,Ö\0ßßˆr, >¿ŒýWÓþïù/Öþ[™qýk~®CÓ‹4ÛûGŠ¯:„€X÷˜Gúr\0ÉéŸâ¯÷ŸL%VFLUc¯Þä‘¢þŽHÿybP‚Ú'#ÿ×	\0Ð¿ýÏì¹`9Ø9¿~ïò—_¼¬0qä5K-ÙE0àbôÏ­üš¡Žœt`lmêíËÿbŒàÆ˜; ,=˜ 'S‚.bÊçS„¾øCc—ƒêëÊAR,„ƒíÆXŠ@à'…œ8Z0„&ìXnc<<È£ð3\0(ü+*À3·@&\r¸+Ð@h, öò\$O’¸„\0Å’ƒèt+>¬¢‹œbª€Ê°€\r£><]#õ%ƒ;Nìsó®ÅŽ€¢Êð*»ïcû0-@®ªLì >½Yp#Ð-†f0îÃÊ±aª,>»Ü`ÆÅàPà:9ŒŒo·ð°ov¹R)e\0Ú¢\\²°Áµ\nr{Ã®X™ÒøÎ:A*ÛÇ.Dõº7Ž»¼ò#,ûN¸\rŽE™Ô÷hQK2»Ý©¥½zÀ>P@°°¦	T<ÒÊ=¡:òÀ°XÁGJ<°GAfõ&×A^pã`©ÀÐ{ûÔ0`¼:ûð€);U !Ðe\0î£½Ïc†p\r‹³ ‹¾:(ø•@…%2	S¯\$Y«Ý3é¯hCÖì™:O˜#ÏÁLóï/šé‚ç¬k,†¯Kåoo7¥BD0{ƒ¡jó ìj&X2Ú«{¯}„RÏx¤ÂvÁä÷Ø£À9Aë¸¶¾0‰;0õá‘à-€5„ˆ/”<Üç° ¾NÜ8E¯‘—Ç	+ãÐ…ÂPd¡‚;ªÃÀ*nŸ¼&²8/jX°\rš>	PÏW>Kà•O’¢VÄ/”¬U\n<°¥\0Ù\nIk@Šºã¦ƒ[àÈÏ¦Â²œ#Ž?€Ùã%ñƒ‚èË.\0001\0ø¡kè`1T· ©„¾ë‚Él¼šÀ£îÅp®¢°Á¤³¬³…< .£>íØ5ŽÐ\0ä»	O¬>k@Bn¾Š<\"i%•>œºzÄ–ç“ñáºÇ3ÙPƒ!ð\rÀ\"¬ã¬\r ‰>šadàöó¢U?ÚÇ”3P×Áj3£ä°‘>;Óä¡¿>žt6Ë2ä[ÂðÞ¾M\r >°º\0äìP®‚·Bè«Oe*Rn¬§œy;« 8\0ÈËÕoæ½0ýÓøiÂøþ3Ê€2@Êýà£î¯?xô[÷€ÛÃLÿaŽ¯ƒw\ns÷ˆ‡ŒA²¿x\r[Ñaª6Âclc=¶Ê¼X0§z/>+šª‰øW[´o2ÂøŒ)eî2þHQPéDY“zG4#YD…ö…ºp)	ºHúpŽ˜&â4*@†/:˜	á‰T˜	­Ÿ¦aH5‘ƒëh.ƒA>œï`;.Ÿ­îY“Áa	Âòút/ =3…°BnhD?(\n€!ÄBúsš\0ØÌDÑ&D“J‘)\0‡jÅQÄyŽhDh(ôK‘/!Ð>®h,=Ûõ±†ãtJ€+¡Sõ±,\"M¸Ä¿´NÑ1¿[;øÐ¢Š¼+õ±#<ìŒI¤ZÄŸŒP‘)ÄáLJñDéìP1\$Äîõ¼Q‘>dO‘¼vé#˜/mh8881N:øZ0ZŠÁèT •BóCÇq3%°¤@¡\0Øï\"ñXD	à3\0•!\\ì8#h¼vìibÏ‚T€!dª—ˆÎüV\\2óÀSëÅÅ’\nA+Í½pšxÈiD(ìº(à<*öÚ+ÅÕE·ÌT®¾ BèS·CÈ¿T´æÙÄ e„Aï’\"á|©u¼v8ÄT\0002‘@8D^ooƒ‚ø÷‘|”Nù˜ô¥ÊJ8[¬Ï3ÄÂõîJz×³WL\0¶\0ž€È†8×:y,Ï6&@”À E£Ê¯Ý‘h;¼!f˜¼.Bþ;:ÃÊÎ[Z3¥™Â«‚ðn»ìëÈ‘­éA¨’ÓqP4,„óºXc8^»Ä`×ƒ‚ôl.®üº¢S±hÞ”°‚O+ª%P#Î¡\n?ÛÜIB½ÊeË‘O\\]ÎÂ6ö#û¦Û½Ø(!c) Nõ¸ºÑ?EØ”B##D íDdo½åPAª\0€:ÜnÂÆŸ€`  ÚèQ„³>!\r6¨\0€‰V%cbHF×)¤m&\0B¨2Ií5’Ù#]ú˜ØD>¬ì3<\n:MLðÉ9CñÊ˜0ãë\0“¨(á©H\nþ€¦ºM€\"GR\n@éø`[Ãó€Š˜\ni*\0œð)ˆü€‚ìu©)¤«Hp\0€Nˆ	À\"€®N:9qÛ.\r!´JÖÔ{,Û'æÙŠ4…B†úÇlqÅ¨ŸXc«Â4ß‹N1É¨5«WmÇ3\nÁF€„`­'‘ˆÒŠxàƒ&>z>N¬\$4?ó›ÃïÂ(\nì€¨>à	ëÏµPÔ!CqÍŒ¼Œp­qGLqqöG²yÍH.«^àž\0zÕ\$€AT9Fs†Ð…¢D{ía§øcc_€GÈz†)ó³‡ Ü}QÆÅhóÌHBÖ¸<‚y!L­“€Û!\\‚²ˆî ø'’H(‚ä-µ\"ƒin]Äžˆ³­\\¨!Ú`M˜H,gÈŽí»*ÒKfë*\0ò>Â€6¶ˆà6ÈÖ2óhJæ7Ù{nqÂ8àßôÉHÕ#cHã#˜\r’:¶–7Ê8àÜ€Z²˜ZrD£þß²`rG\0äl\n®Iˆi\0<±äãô\0Lg…~¨ÃE¬Û\$¹ÒP“\$Š@ÒPÆ¼T03ÉHGH±lÉQ%*\"N?ë%œ–	€Î\nñCrWÉC\$¬–pñ%‰uR`ÀË%³òR\$–<‘`ÖIfxª¯÷\$/\$„”¥\$œš’O…(‹Ë\0æË\0RY‚*Ù/	ê\rÜœC9€ï&hhá=IÓ'\$–RRIÇ'\\•a=EÔ„òuÂ·'Ì™wIå'T’€€‘üÿ©¾ãK9%˜d¢´·‚!ü”ÀÊÊÀÒj…ì¡íÓÊ&Ðæ„vÌŸ²\\=<,œEùŒ`ÛYÁò\\Ÿ²‚¤*b0>²r®à,d–pdŒŒÌ0DD Ì–`â,T ­1Ý% P‘ž¤/ø\ròb¹(Œ£õJÑèÍîT0ò``Æ¾ÞèíóJ”t©’©ÊŸ((dÇÊªáh+ <Éˆ+H%i‡Èô‹²•#´`­ ÚÊÑ'ô£B>t˜¯J€Z\\‘`<Jç+hR·ÊÔ8î‰€àhR±,J]gò¨Iä•è0\n%J¹*ÐY²¯£JwDœ°&Ê–D±®•ÉÐœªR§K\"ß1Qò¨Ë ”²AJKC,ä´mV’»Ž²›ÊÙ-±òÏKI*±r¨ƒ\0ÇL³\"ÆKb(üªóJ:qKr·dùÊŸ-)ÁžË†#Ô¸²Þ¸[ºA»@•.[–Ò¨Ê¼ß4º¡¯.™1ò®J½.Ì®¦u#J“‡Ág\0Æãò‘§£<Ë&”’ðK¤+½	M?Í/d£Ê%'/›¿2YÈä>­\$Í¬lº\0†©+ø—Á‰}-tº’Í…*ê‰Rä\$ß”òÌK».´Á­óJHûÊ‰‡2\r„¿B‚½(PÍÓÌ6\"ü–nf†\0#Ð‡ ®Í%\$ÄÊ[€\nÐnoLJ°ŒÅÓÂe'<¯ó…‡1KíÁyÌY1¤Çs¥0À&zLf#üÆ³/%y-²Ë£3-„Â’ÍK£L¶ÎÉ×0œ³’ë¸[,¤ËÌµ,œ±’«„§0”±Ó(‹.DÀ¡@ÏÁ2ïL+.|£’÷¤É2è(³L¥*´¹S:\0Ù3´ÌíóG3lÌÁaËl³@L³3z4­Ç½%Ì’ÍLÝ3»…³¼!0Š33=Lù4|È—¡à+\"°Êé4´Ëå7Ë,\$¬SPM‘\\±Î?JŠY“Ì¡¹½+(Âa=K¨ì4œ¤³CÌ¤<Ð…=\$,»³UJ]5h³W &tÖI%€é5¬Ò³\\M38g¢Í5HŠN?W1Hš±^ÊÙÔ¸“YÍ—Ø Í.‚N3MŸ4Ã…³`„Ži/P‰7ÖdM>šd¯/LRÎÜâ=K‘60>¯I\0[ðõ\0ßÍ\r2ôÔòZ@Ï1„Û2ÿ°7È9äFG+ä¯ÒœÅ\r)àhQtL}8\$ÊBeC#Á“r*HÈÛ«Ž-›Hý/ØËÒ6Èß\$øRC9ÂØ¨!‚€Å7ük/PË0Xr5ƒ¡3D„¼<TÁÔ’q¯Kô©³nÎH§<µFÿ:1SLÎrÀ%(ÿu)¸Xr—1Ñ€nJÃIÌ´S£\$\$é.Î‡9Ôé²IÎŸÒ3 ¨LÃl”“¯Î™9äÅC•N #Ô¡ó\$µ/ÔésÉ9«@6Êt“²®Nñ9¼´·NÉ:¹’Â¡7ó Ó¬Í:DáÓÁM)<#–ÓÃM}+ñ2ÎNþñ²›O&„ð¢JNy*ŒòòÙ¸[;ñóÎO\"mÚÄóÅMõ<c Â´‚°±8¬K²,´ÓÇN£=07s×JE=Tá³ÆO<Ôô³£Jé=D“Ó:ÏC<Ì“àË‰=äèó®KÊ»Ì³ÈL3¬÷­„LTÐ€3ÊS,œ.¨ÿÏq-Œñsç7Í>‚?ó¼7O;Ü `ùOA9´óñÏ»\$œüÁOÑ;ìý`9ÎnÇIAŒxpÜöE=O¹<ü²5ÏÎ„ý2¸O?d´Ž„´Œ`NòiOÿ>Œþ3½P	?¤òÔOžmœúSðMôË¬·†=¹(ãdã¤AÈ­9“‘\0í#üä²@ƒ­9DŽÁÉ&ÜýòŠ‚?œ “Ði9»\nà/€ñAÝóòÈ­A¤ýSËPo?kuN5¨~4ÜãÆ6††Ø=ò–Œ“*@(®N\0\\Û”dGåüp#è¤> 0À«\$2“4z )À`ÂW˜ð +\0Š‘80£è¦• ¤ª”äz\"TÐä0Ô:\0Š\ne \$€ŽrM”=¡r\n²N‰P÷Cmt80ðú #¤ØJ= &ÐÆ3\0*€Bú6€\"€ˆéèú€#Ì>˜	 (Q\nŒðê´8Ñ1C\rt2ƒECˆ\n`(Çx?j8N¹\0¨È[À¤QN>£©à'\0¬x	cêªð\nÉ3×Chü`&\0²Ð´8Ñ\0ø\näµ¦úO`/€„¢A`#ÐìXcèÐÏD ÿtR\n>¼ÔdÑBòD´LÐÄÌõ‰äÐÍDt4ÐÖ j”pµGAoQoG8,-sÑÖðÔK#‡);§E5´TQÑGÐ4Ao\0 >ðtMÓD8yRG@'PõC°	ô<PõCå\"”K\0’xüÔ~\0ªei9Ðìœv))ÑµGb6‰€±H\r48Ñ@‚M‰:€³FØtQÒ!H•”{R} ôURpÍÔO\0¥I…t8¤ØðûÎÇ[D4FÑD#ÊÑ+D½'ôMÊ•À>RgIÕ´ŠQïJ¨””UÒ)EmàüTZ­Eµ'ãê£iEÝ´£ÒqFzAªº>ý)T‹Q3HÅ#TLÒqIjNT½¼…&CøÒhX\nT›ÑÙK\0000´5€ˆ¢JHÑ\0“FE@'Ñ™Fp´hS5F\"ÎoÑ®e%aoS E)  €“DU «Q—FmÎÑ£M´ÑÑ²e(tnÒ “U1Ü£~>\$ñßÇ‚’­(hÕÇ‘Güy`«\0’ê 	ƒíG„ò3Ô5Sp(ýõPãGí\$”œ#¤¨	©†©N¨\nôV\$ö]ÔœPÖ=\"RÓ¨?Lzt·ƒ1L\$\0ÔøG~å ,‰KNý=”ëÒGMÅ”…¤NS€)ÑáO]:ÔŠS}Ý81àRGe@Cí\0«OPðSõNÍ1ôÝT!P•@ÑÝS€ðÿÕS‰G`\nÉ:€“P°j”7R€ @3üÑ\n‘ üã÷â£”DÓ æúLÈÏ¼Ž 	èë\0ùQ5ôµ©CPúµSMP´v4†º?h	hëT‡D0úÑÖàõ>&ÒITxôO¼?•@U¤÷R8@%Ô–ŒõK‰€§NåKãóRyE­E#ýù @ýÃøä%Là«Q«Q¨µ£ª?N5\0¥R\0úÔTëFåÔ”RŸSí!oTEÂC(Ï¶ÈýÄµ\0„?3iîSS@U÷QeMµƒ	KØ\n4PÕCeS”‘\0NC«P‚­Oõ! \"RTûõ€S¥NÕÁU5OU>UiIÕPU#UnKPô£UYTè*ÕC«U¥/\0+º¸Å)ÈÚ:ReAà\$\0øŽ¤xòÇWDº3Ãêà`üÚüçU5ÒIHUY”ô:°P	õe\0–MJi€ƒµÃýQø>õ@«T±C{›ÕuÑì?Õ^µv\0WR]U}Cöê1-5+Uä?í\rõW<¸?5•JU-SXüÕLÔß \\tÕ?ÒsMÕb„ÕƒVÜt§TŒ>ÂMU+Ö	EÅcˆÏÔ9Nm\rRÇƒCý8ŽSÇX•'RÒéXjCI#G|¥!QÙGh•tðQ¸ý )<¹YÐ*ÔÐRmX0üôö½M£›õOQßYýhÀ«ßduÕ¤ÕZ(ýAo#¥NlyN¬V€Z9IÕºM•¦V«ZuOÕ…TÕTÅEÕ‡Ö·SÍeµµÖÊ\nµXµªSÛQERµ³ÔÙ[MF±VçO=/õ­¨>õgÕ¹TíVoUT³Z’N€*T\\*ÃïÐ×S-pµSÕÃVÕq€ÒM(ÏQ=\\-UUUV­C•Ä×ZØ\nu’V\$?M@UÎWJ\r\rUÐÔ\\å'U×W]…W”£W8ºN '#h=oCóÐýF(üé:9ÕYu•†¤÷V-UÓ9Ÿ]ÒC©:U¿\\\nµqW—™à(TT?5Páª\$ R3ÕâºŸC}`>\0®E]ˆ#Rêà	ƒÿ#R¥)²W–’:`#óGõ)4ŠRÀý;õáViD%8À)Ç“^¥Qõé#”h	´HÂŽX	ƒþ\$Nýx´š#i xûÔ’XRõ€'Ô9`m\\©†¨\nEÀ¦Q±`¥bu@×ñN¥dT×#YYý„µ®GV]j5#?L¤xt/#¬”å#é…½O­PÕëQæ¢6•££Ï^í† €šŽðüÖØM\\R5t´Óšpà*€ƒXˆV\"WÅD€	oRALm\rdGN	ÕÖÀú6”p\$PåºŸE5Ôý†©Tx\n€+€‹C[¨ôVŽŒýÖ8U•Du}Ø»F\$.ªËQ-;4È€±NX\n.XñbÍ•\0¯b¥)–#­NýG4KØÐZS”^×´M¶8Øód­\"C‚¬>ÅÕdHe\nöY8¥Ñ.ê ú°ˆÒFúD”½W1cZ6”›QâKHü@*\0¿^¸úÖ\\QßF‚4U3Y|‘=˜Ó¤éE›ÔÛ¤¦?-™47YƒPm™hYw_\ršVe×±M˜±ßÙe(0¶ÔFÕ\r !ÒPUI•uÑ7Qå•CèÑŽ?0ÿµÝgu\rqà¤§Y-Qèó°èú=g\0…\0M#÷U×S5Zt®ÖŸae^•\$>²ArV¯_\r;tî¬’¨”HW©Zí@HÕØhzDèÚ\0«S2Jµ HIåO 'ÇeígÉ6¹[µR”<¸?È /ÒKM¤ö–Ø\n>½¤HáZ!iˆö¤ŸTX6–Ò×iºC !Ó›g½à ÒG }Q6žÑ4>äwà!Ú™C}§VBÖ>åªUQÚ‘jª8cïUTàû–'<‚>ÈýõôHC]¨VšÑ7jj3v¥¤å`0ÃèÈ23ö°Ðòxû@U—k \n€:Si5žÕ#Yì-wî”ÕàéM?céÒMQÅGQÕÑƒb`•ò\0Ž@õËÒ§\0M¥à)ZrKXûÖŸÙWl­²öÍlå³TM×D\r4—QsS¥40ÑsQÌõmYãh•d¶ÂC`{›V€gEÈ\n–»XkÕà'Óè,4ú¼¹^í¢6Æ#<4éNXnM):¹·OM_6d€–æõ¸Ãõ[\"KU²nžÖ?l´x\0&\0¿R56ŸT~> ô†Õ¸?”Jnž€’ ˆÏZ/iÒ6ôÎÚglÍ¦ÖUÛáF}´.ž£¼JLöCTbMŽ4ÍÓcLõTjSD’}JtŒ€Z›ªµÇ:±L­€´d:‰Ez”Ê¤ª>ÖV\$2>­µŽ¢[ãpâ6öÔRŽ9uêW.?•1®£RHužèÛR¸?58Ô®¤íDÝÆuƒ£çpûcìZà?œr×» Eaf°}5wY´ëå‚Ï’ÒêÅW‚wT[Sp7'Ô_aEk \"[/i¥¿#ÿ\$;m…fØ£WOüô”ÔFò\r%\$Íju-t#<Å!·\n:«KEA£íÒÑ]À\nUæQ­KEÀ #€¿Xå¨÷5[Ê>ˆ`/£ÍDµÊÖ­VEpà)åI%ÏqßÜûníx):¤§le¢´Õ[eÕ\\•eV[j…–£éÑ7 -+ÖßGWEwt¯WkEÅ~uìQ/mõ#ÔW—`ýyu“Ç£DÝAö'×±\r±•Õ™OD )ZM^€³u-|v8]‹g½‘hö×ÅLà–W\0øÈû6ËX†‘=YÔd½Q­7Ï“”Ï9£çÍ²r <ÃÖêD³ºB`c 9¿’È`D¬=wx©I%ä,á„¬†è²àêƒj[ÑšÖíßOÿ‹´ ``ŽÅ|¸òòÆÞø¤Œ˜¼í.Ì	AOŠÀÄ	·‰@å@ 0h2í\\âÐ€M{eã€9^>ô•â@7\0òôË‚W’€ò\$,íÉÅš¡@Ø€Òâ•å×w^fmå‰,\0ÏyD,×^X€.¯Ö†©7ã·›Ã×2ÝÅf;¥€6«\n”¤Ž…^ŸzC©×§mz…én–^ˆô”&LFFê,°ö[€¥eÈõaXy9h€!:zÍ9còQ9bÅ !€¦µGw_WÉg¥9©ÓS+t®ÚápÝtÉƒ\nm+–œÞÙ_ð	¡ª\\¼’k5£ÒÜ]Æ4ˆ_h•9 Ù÷N…—Å]%|¥ˆ7ËÖœŽ];”ï|ñµ ßXýÍ9Õ|åñ×ÌG¢“¨[×Ô\0‘}Uñ”çßMCI:ÒqO¨VÔƒa\0\rñRÍ6Ï€Ã\0ø@H¢ÅP+rìS¤Wãè€øp7äI~p/ø HÏ^Ýê²ü¤¬E§-%û¥Ì»Í&.ÎÄ+¸JÑ’;:³¶«!“ýÐNð	Æ~öª‰€/“WÄÂ!„BèL+Â\$ðíq§=ü¿+Ñ`/Æ„e„\\±ÒÏxÀpE‘lpSÂJSÝ¢½ö6à‡_¹(Å¯©Äéb\\OÆÊ&ì¼\\Ð59\0ûÂ€9nñøD¸{¡\$á¸‹K‘v2	d]èv…CÕþÅÕ?tf|WÜ:£Ô¨p&¿àLn„Îè³žî{;ˆçÚGR9øT.y¹üïI8€¹´\rl° ú	Tè n”3¼öðT.ƒ9´è3› š¼Zès¡¯ÑÒGñþŽˆ:	0£¦£zè­Ý.Œ]ÀçÄ£Q›?àgT»%ñ™ÕxŒÕŒ.„šÔÇn<ì£-â8BË³,Bòì˜rgQþ¢íßó„ÉŽ`Úá2é„:îµ½{…gëÄs„øgóZ¿•… ×Œ<æ×w{¦˜ƒbU9ˆ	`5`4„\0BxMpð‘8qnahé†@Ø¼í†-â(—>S|0®…¾¥…3á8h\0Ñ«µCÔzLQž@¶\n?†¸`AÀ >2šÂ,÷á˜ñN&Œ«xˆl8sah1è|˜B‡É‡DxBÞ#V—‹V–×Š`Wâa'@›‡¬	X_?\nì¾  •_â. ØP¼r2®bUarÀI¸~áñ…S“àú\0×…\" 2€ÖþÀ>b;…vPh{[°7a`Ë\0êË²j—oŒ~·ûþvÍÙ|fv†4[½\$¶«{ó¯P\rvæBKGbpëÈÅø™–OŠ5Ý 2\0j÷Ù„LŽ€î)ÇmáÈV¡ejBB.'R{C¤ïV'`Ø‚ ‰Ž%­Ç€Ð\$ Oå\0˜`‚’«4 ÌNò>;4£³¢/ÌÏ€´À*Âø\\5„ÅÁ!†û`X*Þ%îÄNÍ3SõAMôþËÆ”,þ1¬²®í\\¯²caÏ§ ³ù@Ø¬Ëƒ¸B/„¬Íø0`óv2ï¡„§Œ`hDÅJO\$ç…@p!9˜!¥\n1ø7pB,>8F4¯åf Ï€:“ñ7Â„î3›£3…¿à°T8—=+~Øn«Îâ\\Äe¸<br·þ øFØ²° ¹C¡N‹:c€:Ôl–<\r›ã\\3à>ñ˜‡À6ONnŠä!;áñ@›twë^Fé€Là;€×º,^aÈ\ra\"ÞÀÚ®'ú:„vàJe4Ã×;•ñ_d\r4\rÌ:ÛüÀ¬S˜à2€[c€„XÿÊ¦Pl˜\$¹Þ£i“wåd#ŽB šb›Î×¤õ’™`:†€Ï~ <\0Ñ2Ù·—‘RŒÂÆPÈ\r¸J8D¡t@ìEŽè\0\rÍœ6öóäÞ7•½ä˜YÏ£ú\"åäÀš\rüƒ¦Àš3ƒ¡.˜+«z3±;_ÊŸvLÝäÓwJ¿94ÀIJa,A¦ñˆ¯;ƒs?ÖN\nR‡!Ž§Ý†Om…sÈ_æà-zÛ­w„€ÛzÜ­7¡ÍÅzî÷–M”ˆ€o¿”¥æ\0¢ƒa”ÅÝ¹4å8èPfñYå?”òi—–eBÎSà1\0ÉjDTeK”®UYSå?66R	¦cõ6Ry[c÷”°5Ù]BÍ”ÖRù_eA)&ù[å‡•XYRW–6VYaeU•fYeåw•ŽU¹båw”Eë°Ê†;z¤^W«9–ä×§äÝ–õë\0<Þ˜èeê9SåÎ¤daª	”_-îá‰L×8Ç…ÍQöèTH[!<p\0£”Py5ˆ|—#ê‘P³	×9vàš2Â|Ç¸áfao†á,j8×\$A@kñƒ¿ŽaË‘½bócñÈf4!4¨‘¶cr,;™‘æ‘öbÆ=€Â;\0°øÅº…˜†cdÃæX¾bìx™a™Rx0Aãh£+wðxN[˜ÜB·pÚƒ¿w™TÀ8T%™šMšl2à‡½¡šð—}¡Ès.kY„˜0\$/èfU€=þØs„gKÃ¡ˆM› õ?ÿ›ç`4c.Ôø!¡&€åˆ†g°ûfà/þf1=¯›V AE<#Ì¹¡f\n») Šë›Npò“ã`.\"\"»Açœ¤ã—üq¸X“ Ù¬:aÉ8™¹f¯™Vsó‹G™ÞrŽ:æVÞÆcÔgVl™g=`ã“WŽËýyÒgUÀË™ªáº¼îeT= ã€á€Æx 0â M¼@ˆ»šÂ%Îºb½œþw™ÆfÛÙOøç­˜Ü*0¯…®|tá°%±™PÈÍpæúgKžù¬?pô@JÀ<BÙŸ#­`1„î9þ2çg¶!3~ØÜçînläÅfŠØVhù¬Ž.Ñ€à…aCÑù•?³Šû-à1œ68>A¤ˆaÈ\r—¦y‹0 Öi‘J«} à¹© Ðz:\r¡)‘Sþ‚¡@¢åh@äöƒY¹ã´mCEg¡cyÏ†‚<õàÍh@¼@«zh<WÙÄ`Â•¨±:zOãÎÖ\rÍêW«“°V08Ùf7™(Gyƒ²`St#ï„f†#ƒ²œC(9ÈÂ˜Ø€dùææ8T:¯»Œ0ºè qµ  79·á£phAgÜ6Š.ãæ7Fr™bä ÈjšèA5î…†ƒá¡a1úÚh•ZCh:–%¹ÎgU¢ðD9ÖÅÉˆ„×¹Ïé0~vTi;VvSš„wœØ\rÎƒ?àÇf²£…ÿ¥nŠÏ›iY™ìaº¬3 Î‡9Õ,\n™Ãr‘‰,/,@.:èY>&…šFÑ)ú™¶}šb£€èiOÝiæš:dèAŒn˜šc=¤L9O’h{¦ 8hY.’ÙÀ®¾‡®‡…œüÇ\r¬Ö‡£À›Šé1Q¯U	”C‘hô†eÿO‰›°+2oÌÎìÞN‹˜÷§øzpè¢(þ]Óh€å¢Z|¬O¡cÑzDáþ;õT\0j¡\0…8#>ÎŽÁ=bZ8Fjóìé;íÞºTé…¡w®Í)¦ýøN`æë¨¤Ã…B{ûƒz\ró¡c“Óè|dTG“iœ/ûú!i†Ê0±¼ø'`Z:ŠCHï(8Âê`V¥™Úãöª\0Üê§©†£WïßÇª˜ÕzgG¾‘…ƒ½²-[ÃÐ	iœêN\rqºé«n„„“o	Æ¥fEJý¡apb¹ê}6£…Õ=o¤–„,tèY+ö®EC\rÖPx4=¼¾™Ù@‡‰¦.†‘F£[¡zqçÜèX6:FG¨ #°û\$@&­ab¤þhE:²ƒå¬ä`¶S­1—1g1©þ„2uhY‹¬_:Bß¡dcï–*ÿ­†\0úÆ—FYFœ:Ë£ªn„ØÌ=Û¨H*Z¼Mhk/ëƒ¡žzÙ¹ï‹´]šÁh@ôæ©Øã1\0˜øZKùž¢ëÎÆè^+º,vfós®š>ˆ¤’Oã|èÀÊsÃ\0Öœ5öXé‹îÑ¯F„÷n¿Aˆr]|ÏIi4è…þ ØÂC° h@Ø¹´Ÿž–cß¥¨6smOÃå‰™›gX¬V2¦6g?~ÖÃYÕÑ°†súcl \\RŠ\0Œ¨cœA+Œ1°„›ùÌé\n(ÑúÃÌ^368cz:=z÷‚(äø ;è£¨ñsüF¶@`;ì€,>yTßï&–•d½L×Ÿœÿ%Òƒ-ëCHL8\r‡Çbû°°£úMj]4Ym9üÛüÐZÚBøïP}<ŸûàX²¯‰Ì¥á+gÅ^ØMÞ + B_Fd¬X„ø‹lówÈ~î\râ½‹è\":ÔêqA1X¾ìæ²Ðø¯3ÖÎ“Eáh±4ßZZÂó¸& …ææ1~!Nfã´öo—ˆ™\nMeÜà¬„îëXIÎ„íG@V*X¯†;µY5{Vˆ\nè»ÏTéz\rF 3}m¶Ôp1í[€>©tèe¶w™Ÿæë@VÖz#‚2Äï	iôôÎ{ã9ƒ‚pÌ»gh‘Šæ+[elU‰¦ÛAßÙ¶Ó¼i1Ä!Œ¾ommµ*Kà‡ê}¶°!íÆ³í¡®Ý{me·f`“—mè˜CÛz=žnÞ:}g° T›mLu1FÜÚ}=8¸ZáíèOžÛmFFMf¤…OO€ðîáÀ‹ƒèøß/¼éõ¸Þ“šå€þV™oqj³²èn!+½òµüZ¨ËI¹.Ì9!nG¹\\„›3a¹~…O+Îå::îK@Œ\nÚ@ƒ‘¤Hph‘´\\BÄõdmfvCèžÓPÛ\" æ½Û.nW&–ên¢øHYþ+\r¶“Äz÷i>MfqÛ¤î­ºùÝQc‚[­H+æÀo¤Ñ*ú1'¤÷#ÄEw€D_Xí)>Ðs£„-~\rT=½£žà÷ˆà- íy§m§¹æð{„hóŸÌjÚMè)€^ž¹ïÀ'@Vå¡+iÈîÎò›Ÿåµ†É;F“ D[Îb!¼¾´B	¦¤:MP‹îóÛ­oC¼vAE?éC²IiYÍ„#þp¶P\$kâJÞq½.É07œþöxˆl¦sC|ï½¾bo–2äXª>Mô\rl&»Ç:2ã~ÛÑcQ²îò²æoÑÞdá‚-þèUÜRo‚YšnM;’n©#–ß\0–P¾fðÚPo×¿(CÚv<Ê¬ø[òoÛ¸”šû×fÑ¿ÖüÁ;ßáº–õ[úYŸ.o®Up¿®pUŒø”.ž ©B!'\0‹òã<Tñ:1±À¾ šã¤î<„›ðnˆîF³ðƒI¢Ç”´‚V0ÊÇRO8‰wøÎ,aFú¼É¥¹[´ÎŸ…ñYOù«‰€/\0™Ùox÷ÇQð?§°:Ù‹ëÆè`h@:ƒ«¿öÑ/Mím¼x:Û°c1¤Öàû¯ív²;„‚è^æØÆ@®õ@£úð½ÂÇ\n{¯¼Âî‹à;ç‘´B¼í¸8‘º gå’ä\\*gåyC)Û„E^ýOÄh	¡³¦Aƒu>Æèü@àDÌ†Yæ¼í›â`o»<>Àƒp‰™ŠÄ·’q,Y1Q¨Áß¸†/qgŒ\0+\0âæå‡Dÿƒç?¶þ î©Úßîk:ù\$©û¬í×¥6~I¥…=@ŽíÑ!¾ùvÚzOñš²â+ÍõÆ9Çi³–›¼aïð†êû…gòðôî¿—¹ÿ?š0Gn˜q²]{Ò¸,FáÃøO¡â„Þ <_>f+¢,ñÌ	»Ôñ±&ôœ†ðíÂ·¼yêÇ©Oü:¬UÂ¯ˆLÆ\nÃÃºI:2³¿-;_Ä¢È|%éå´¿!Îõfž\$¦ˆ†Xr\"Kniîñ—ÀÐ\$8#›g¤t-›€r@LÓåœè@S£<‘rN\nD/rLdQkà£“”ªõÄîeðåäãÐ­åø\n=4)ƒB˜”Ë×šôÌZ-|Hb¡†‘HkÊ*	ÖQ!Ð'êG ž›Ybt!¿Ê(n,ìP³OfqÑ+X“Y±ÿ‚ë\"b F6ÖÌr fò\"ÒÜ³!N¡ó^¼¦r±B_(í\"¨KÊ_-<µò *Q÷ò¨Ù/,)H\0„‰²rç\"z2(¹tÙ‡.F>†‡#3â®Ø¦268shÙ þ¨Æ‘I1Sn20¶çÊ-«4’ÚÇ2Aœs(¬4ä¼Ë¶Š\0ÆÝ#„årþK'ËÍ·G'—7&\n>xßüÜJØGO8,ó…0¼â‹ù8”ÑÓ\0óW9’ÝIˆ?:3nº\r-w:³ÂÌÅ×;3È‰”!Ï;³Üêƒ˜˜Z’RMƒ+>ÖÜðÊé0/=R…'1Ï4Õ8ûÑÏmÿ%È¥}Ï‡9»;‚=ÏnQöã=ÏhhLõ·GÏkWÎ\rô	%Ø4ÒœsñÎ–J€3sÛ4—@™U‚%\$ÜÑN;Ì?4­»óNÚÏ2|ÊóZÚ3Øh\0Ï3“5€^Àxi2d\r|ûM·Ê£bh|Ý#vÇ` \0”ê®äàû\$\r2h#ú¤?³ˆI\n’¼+o-œŠ?6`á¹½¿.\$µšøKY%ØÂJ?¦c°RN#K:°KáELÁ>:Á¥@ŒãjP‘Ìn_t&slm’'æÐ©É¸Óœ²Œ½—ã;6Û—HU5#ìQ7U ýWYÜU bNµ–Wû_ûª©;TCø[Ý<Ú–>ÅÇõ‰WýCUÔ6X#`MI:tùÓµ€ö	u#`­fu«\$«t­öXó`f<Ô;båghöÑÕ9×7ØS58õ¬Ý#^–-õ\0êÀúîÕ¹R*Ö'£¨(õðõqZå££êX¹QÝFUvÔW GWíñÓTêÇWô~Ú­^§WöÄÁÕýJ=_Ø—bmÖÝbV\\l·/ÚMÕÿTmTOXuÊ=_ýITvvu‹a\rL_ÕqR/]]mÒsu=H=uÑg o\\UÕ…gM×	XVU À%õhý¡53U™\\=¡öQßØM¹v‡€¡gåmàõue¡ˆÙûhÿbÝMÝGCeO5®ÔÖO5…ÔYÙi=eÕ	GTURvOa°*ÝivWX•J5<õ¯bu ]ˆ×Öðúµ<õÃÙÕ\$u3v#×'eöuÑR5m•Šv‹D5.vŽŒõW=ŸU_å(´\\VØÏ_<õ÷SÍn)Ü1M%QháZ‡T…f5EÕ'ÕÍW½ŠvÅUmiÕ‚UÔÕ]aW©U§dRváÙ-YUZuÙUV—UiRV™õ³ÓÇ[£íZMU§\\=Âv{ÛXýµ¼wQ÷huHvÇ×gqÝ´w!Úoqt¢U{TGqý{÷#^G_ubQ„êå•i9Qb>ÚNUdº±k…½5hPÙmu[•\0¦êÅ_¶é[õY-ðô÷rõÈÕ(ÖCrMeýJõ!h?QrX3 xÿÈÏ#‡÷xÖ<Û{u5~ƒíÑ-ÝuŽëYyQ\r-”î\0ùuÕ£uuÙ¿pUÚ…•)–PåÜ\r<u«S›0ÝÉw¹ß-iÝóÔ!ÌÖŠøB÷áÆd]ùèÅ‡ÔÆEêðvlmQÝ6k¼ÒJ´ˆwí¦ÄžØÃãŒED¶UÙR“ev:XßcØNW}`-¨tÓH#e„bº±u€ãó	~B7ê ?ƒ	OPœCWµ×SEÍ•V>¶“×UÛ7ßžç‰Ôám»Ó‚¬zÿ=µƒÍØ1º™ƒ+ ¹mÃI,>µX7àä] .‡½*	^îŠã°N…º.èÎ/\"„˜)Ð	…¯‚sž®|à¤çÓŸÐlÁ}ã¸ŽÍç!óîƒ‘5n±p„j£¾h’}½èðm“EázHÂaO0d=A|wëß³ãë×šÎìu²œŸvùØ¼G€x#®…b”cSðo-‰ùtOm`C‹ò^MŒÅ@ë´h­n\$k´`þ`HD^PEà[äŒ]¹¨rR¸mž=‚.ñÙ‡>Ayi‚ \"ú€ò	Ö·oã-,.œ\nq+À¥åfXdŠ«¶ã*ß½ˆKÎØƒ'Üê Ð%aôÿ‡ù9pûæ—øKLM„à!þ,èÊËŽ¨ŒzX#˜Vá†uH%!Àœ63œJ¾ryÕíùq_èu	úWù±‡Æ|@3b1åÈ7|~wï±³þíA7“ÒÂ›è™	¼™9cS&{ãäÒ%VxðïkZO‰×w‰Ur?®„’ªN Î|…CÉ#Å°õåÕ¯ ¹/ú™9ftŽEw¸CÁºa¦^\0øO<þW¦{Yã=éŸeë˜ýnÉ„ígyf0h@ìSÝ\0:C©´^€¸VgpE9:85Ã3æÞ§áºð@»áŽj_ª[Þ+«êÇ©xƒ^“ê®†~@Ñ‡Wª¸ãã“œ†9x—FC˜¿­.ãšçöük^IŽû¡pU9üØSŸØ÷½—œ\$óóø\r4´…ù\0ÎèO°ã‘Ä)L[Âp?ì.PECSìI1nm{Å?žPîWAß²Á;€ñìD°;SºaKføò›%?´XõÞ+¤B>½ù9¿¯ÙGj˜cžz‘AÍŽ÷:êa³n0bJ{o¥·!3À­!'’ØKÃÅíùÔ}ã\\èÎ3Wøê5îxÏÉÁL;ƒ2Î¶n—a;²í×ºXÓ›]Éoºœxû{ä¦5Þ™jX÷ˆð—¶vÓšéãqÞÊEE{Ñ€4Á¾öÄ{íÙç	Ì\nöÊ>ù™aï¯·¾üì§ïØLûÔûåïÿ½ûìñ'ð½Þé{ë\n‰—>JøßŒŒá¸Ó—†÷YÏ\rOÊ½ð‘t¯ÿû¥-OÃ¦ü4Ôÿ9Fü;ð§Á»ÔüGðøIªFßì1ÂoÿßóñO²¾éa{w—0Ó»ï¤Æ¯;ñ”„‘lüoñàJÐTb\rwÇ2®Jµþ=D#ònÁ:ÉyñûSø^ã,.¿?(ÈI\$¯ÊÆ¯í¨á3÷Ãsð4MÊaCRÉÆÍGÌ‘œúIß°n<ûzyÑXN¾ð?õâ.Ãî=—àñ´DÇ¼\r›žØé\nÕó¨\roõý\nÐŸCl%ÁÍYÎû¥ß°ÏàGÑþÚ}#VÐ%ý(ÔÿÒà3æÉ˜ržð};ôû×¿GÉÌnö[ª{¥¹–“_<m4[	I¥¢À¼q°µ?ð0cVýnms„³nMõõˆ\"Nj1õw?@ì\$1¦þ>ðÒ^øÕû¥ö\\Ì{nÂ\\Ìžé7Ÿ„¿ÙŸic1ïÚÿhooê·?j<GöxŸlÏù©Sèr}ÍÃÚ|\"}•÷/Ú?sç¬tIäåê¼&^ý1eóÓtãô,*'F¸ß=/Fkþ,95rVâáøàÀºì‘ˆÛo9Íø/FÀ–_†~*^×ã{ÐIÆö¯ã_ƒ‚²Œ“^n„øþNŸŠ~øáÅAí¦‘d©åñþUøwäqY±åî´T¸2ÀéGä?‡&–§æô:yùè%Ÿ–Xç˜JÛCþd	WèßŽ~úG!†´J}›—¤úìùõÄB-Óï±;îûœhÃ*ó¼R´ìöE¶ ~âæó.«~Éçæ SAqDVxÂîÍ='íÉEÙ(^Šû¢~›ùø¿›çòéçïo7~‚M[§Qãî(³Üy¸ùnPÑ>[WX{qÔaÏ¤ÆÉý.&NÚ3]ñúHYïÝûƒëÛ[¶ÁÙ&ü8?Ñ3„‹›¦¶§Ý†Ú»¶á#Œ¦ÎBðe6ë…@–“[°¤£ûàÐG\rÎ+ý§}ü˜÷ÁÿÏ_Ýç7–|N„§«Þ4~(zÁ~“»¹ï§%›–?±ßÓÈ[¹ø1žSª]xØköÑKxO^éA€‰rZ+ºÿ»½*ÂWö¯kþwD(¹ø»R:æý\0•§íù'¤Šó“m!OÐ\näÅuè‚Æó.[ PÆ!¹²}×Ïm Ûï1pñuüâ,T©çL 	Â€0}â&PÙ¥\n€=Dÿ=¾ñÐ\rÂšA/·o@äü2ãt 6àDK³¶\0ÈÂƒq†7„l ¼ðBêŠúÌ(ƒ;[ñˆkr\r‘;#‘ÃäƒlÅ”\r³<}zb+ÔÐOñ[€WrXƒ`Z Å£†Pm'Fn ¼‰îSpß-°\0005À`d¨Ø÷P„ÁÚÇ¾·Û;²Ìn\0‚5fïP„¿EJäwûÛ ¹.?À;¶§NòÞ¥,;Æ¦Ï-[7·ÞeþÚiÅâ-“ÖîdÙŽ<[~”6k:&Ð.7‡]\0ó©ûë–ù/µ59 ñÁ@eT:ç…˜¯3ÅdsÝú5äœ5f\0ÐPµöHB–•í°½º8JÔLS\0vI\0ˆ™Ç7DmÆaž3e×íŽ?B³ª\$´.E‹ÐfË@ªnúƒ‰bòGbÁÏq3Ÿ|üšPaËˆøÏ¯X7Tg>Â.ÚpØï™’5¸«AHÅµ’Š3Sð,˜Á@Ô#&wµî3†ôm[ÏÀòIíÑ¥Ó^“Ì¤J1?©gTá½#ÏS±=_„‚_±	«£ÉVq/CÛ¾·Ý€Î|ËôáþD ƒg>Ü„õëé 6\rŠ7}q”ÆÅ¤‹JGïB^î†\\g´Ýõüœ&%­Ø[ª2IxÃ¬ªñ6\03]Á3Œ{É@RUàÙMö v<å1Š¿‘¾sz±uP’5ŸªF:Òiî|À`­qÓ÷†V| »¦\nkâ}Ð'|Žgd†!¨8¦ <,ëP7˜m¦»||»ÿ¶IŽAÓ]BB ÏFö0XÏú³	ŠDÖß`W µÁqm¦OL‘	ì¸.Í(Áp‚¼Òä¶\"!‹ýª\0âÍAïÃô‡‰ÁV€–7kƒŒM¸\$ÓN0\\Õ§ƒ\"‹f‘á Çëñ È\0uqž—,Œ 5ÆãA6×pÎÎÈ\nðÎjY³7[pK°ð4;lœ5n©Á@â\\fûÐl	¦‚MöùûPÁç3®—C HbÐŒ©¸cEpP‰ÚÐ4eooeù{\r-àš2.ÔÖ¥½ŒP50uÁ²°G}Äâ\0îËõ¨<\röœ!¸œ~Êýµ¾óñ¹\n7F®d¶ýà“œ>·Ôa¢Ù%ºc6Ôž§õMÀ¥|òàd‹û·ìOÓ_¨?J„æªC0Ä>ÐÁ&7kM4ª`%fílðÎ˜B~¢wxÑÚZGéP†2¯à0ü=ž*pð†@ˆBeÈ”ØÏ|2Ä\r³?q¸Ð8í¸ë±ñÍÐŠ(·yráö 0àî>œ>ÀE?wÜ|r]Ö%AvàýÁÅä@Ž+ÝXÁªAgâÉÛÿsû®CÐûAXmNÒú4\0\rÚÍ½8JÝJðÇ¸DÒšó´:=	•ðó‡ëÆS™4¯ñF;	¬\\&Öè†P!6%\$iäxi4c½0Bá;62=ÚÛ1ÂùÌˆPCØåÂƒmËÍ“dpc+Ò5Šå\$/rCR†`£MQ¤6(\\á2A ¦¹\\ªŒlGòl¬\0Bq°¤P¯r²ûøBµ‰ê›Ñ‚¹_6LlË!BQŽ‰IÂŽGÀåÜØðXRbs¡]B—Hržã˜`ÎX‹ä\$på±8ð„•	nbR,Â±…L \"ÂE%\0’aYB¦sœ…ÍD,!Æ×Ï›pN9RbG·4ÆþM¬Œt…¸œ¬jUô¤À§y\0ìÝ%\$.˜iL!xÂìÒ“Å(Ä.‘)6T(’I…ìa%ÒKÈ]mÄt¥ô…ú&‚óG7ÇITMóBú\rzaÂØ])vaˆ%œ†²41TÁjÍ¹(!…¬Þ¡¨\\\\ÆWÂÜ\\t\$¤0Åæ%á”\0aK\$èTšF(YàC@‚ºHÏŽÐHã€nD’dÃ†Wp˜ÉhZ¯'áZC,/Ž¡\$û¦£—J¡FB¨uÜ¬Q:Î¥ÂAö‰:-a#”ì=jb¨§lÕUg;{R°€Uº±EWnÔUa»Vâî•Nj¬§u‹GÉ*¨yÖ¹%ÝÒ@Åï*Ìä«ÕYxê±_ó²§z€]ë)v\"£çRÕåL¯VIvê=`›¾'ª°UÝ) S\r~R˜•™\ni”Å)5S¦åD49~Êb”;)3‡,¦9M3¯HsJkTœÃœ‡(¢†ú—uJ‰][\$uf¨íob£µ¹\n.,îYÜµ9j1'µŒ!ö1\$J¶‘gÚ¤ÕŸÄ†U0­ÓZuah£±·cH¥,ÃYt²ñKbö5—ë5–’/dY¬³AUšÒ…©‹[W>¨_Vÿ\rˆ‘*·õ©j£§-T±… zÖYÊd•c®m‡Ò¹±Ø:¹€üË[Ut-{ªµýl	£i+a)».[º•_:Ú5žähƒò­WÂ§Ém»¥%JI‘´[T«h>š®µ·°•™;ËXÌºdêÂŸS›d‰Væ;\rÆ±!Nˆ“K&—AˆJu4B…ÁdgÎ¢.Vp¢ámb‹…)ÇV!U\0Gä¸¨“`‹Ð­\\…qâŸ7Qöb«VL¥Þ:äÕ‚úƒó¬Z.­Nò˜Ä*–ÔU]Z´læzë…Îöù®ÇR D1IŸåÂ£Ñr:\0<1~;#ÀJbà¦ÊM˜yÝ+™Û”/\"Ï›j<3æ#“–ÌŒêñ¡…:P.}êe÷ïòD\"qÙyJýGŒû·sopŒ¯²þXŒ\rÝ³d–Þ\rxJ%–í‰ÏÆ¼O:%yyãÅ,‡”%{Î3<îXÃ¸ÏÌ÷¯zÂEÎz(\0 €D_÷½Ÿ.2+Ög®bºcÚxìpgÞ¨Áß|9CPŽûî˜48U	Q§/Aq®ÝQ¼(4 7e\$D“‰v:ŒV¡b×ûN4[ùˆiv°Àê2ñ\r•X1¼˜AJ(<PlFÐ\0¾¨€\\zÝ)ÑçšW€(ü4ôÈÃÚï¢ p•™ÓõÊ`µÇ\r³da6”¯üOÖímña´}qÅ`ÂÀ6Pƒ'hàç3§|š’îÃf jÈÿAæƒz‰ø£+ŒDŒUWøDíþÞ5ÅÄ%#é°x“3{«¶L\r-Í™]:jd×P	jüf½q:Z÷\"sadÒ)óGØ3	¤+ðŠr„NKö1Qþ½ç†x=>û\"¤°-á:ÊFÍõœIÙƒ*í@ÔŸÇy»Tí\\Uè¨ãŠY~ÂŠ‰Žäâš‚3Då€Á™ã¨f,s¢8HV¯'Ét9v(:ÖB9ñ\\Zš¡…(‘&‚E8¯ƒÍW\$X\0»\nŒž9«WBÀ’bÁÃ66j9Ð âÊˆ„ƒ?,š¬| ùa¾g1²\nPs \0@%#K„¸€ \r\0Å§\0çˆÀ0ä?ÀÅ¡,ä\0ÔhµÑh€\08\0l\0Ö-ÜZ±jbàÅ¬\0p\0Þ-Ùf`ql¢ä€0\0i-Ü\\ps¢è€7‹e\"-ZðlbßEÑ,ä\0ÈÌ]P ¢ÚE¶‹b\0Ú/,Zðà\rÀ\0000‹[f-@\rÓ¯EÚ‹Ï/„Z8½‘~\"ÚÅÚ‹­ö.^ÒÎQw€ÅÏ‹‚\0Ö/t_È¼ÀâèEð‹Ö\0æ0d]µ€búÅ¤‹|\0ÈÄ\\Ø¼‚¢íE¤\0af0tZÀÑnJô\0l\0Î0L^˜´Qj@ÅáŒJˆ´^¸¹q#F(Œ1º/ì[µ1Š¢ãÆŒIæ.Ü^8»\0[ŒqØÌ[Ã‘l\"åÆ Œ€\0æ0,dè¶À€Æ\rŒÌ„cøµ{cEÁ\0oâ0¬]°\0\rc%ÅÛ‹—ðˆ8½w¢åÆZ‹µ-Ä\\ºñ{ãÅÖ‹Gª/\\bp„…@1Æ\0a²1ù‹ÈÏÑsã!Å¨Œ/î/Ì]8¹‘~c\"ÅÛ‹Åþ2ôcÎ‘m£\"€9Œqš/\\^fQ~cÆ_‹£Î-\$iž\"Ö\0003ŒË¬¤fXºqx#\09Œ—Z.´i¸ÈŒ@FˆŒ‰3tZHÉ \rcK€b\0j’/DjøÉ1¨ââÆIh´aÈñv€Æ©OZ4œZòÌÑ‚#YE¨\0i–.hHÒÑsX/F<‹Ï†.äjøËñ­bèÆÍ\0mV/d\\èØñ‹b÷E³‹£ž3T^(ÝÑˆcKFR‹Õù‚ô]X¶q½¢øÅà—’6Ô]hÓñžc6EÄ‹ó66Üh‘Ÿãn\0005sn/dn¸Ô`\r\"ÑFŒ³Ú-D`ÈÕ‘‹ãN€2‹Y”¤bxÀñ”#\\Åë‹‡V3x·1x€FxŒ¾\0Ê6Œb°q£ƒÇ!Žž8|^‚ÌÑubåÆàÕ-ôrØäq¼ã:ÆéŽ%ö0Œppñ”#Ç‹¢\0Æ6ÔfÕÑÇ¢âÅ¬dÒ0„qH´±¾£\$Ç@‹qò-¼^B4±¦\"ú\08Ž1ª/lnxÏ‘ âêG3:0tjhÒ~@Æ¼Ž¥¦3¤vHÆñ¹bÜG(Že„4gØºqÂã2Æ1ŒÉ-ŒnXËñº\"ãF<Qž1\\j¸¸1®ãÈEÇ‹Çä³4m¨Õñªã[ô‹nÁz7üyhÞ1§#ÆÞŽ/‚3\\xÐqÍKG‚ŒÿÆ6äo˜Ñ1{£°FJ×š6¼lXéqâ£„Æu©Þ9œr(¿1Òã‡Gc\0Åf:„rX½ #ÐÅ½\0iÞ<\\}×ñåbîF½\0sÖ7Üy2ÌÑæ#uFe›\">4iØÅ¿âÔÆçŒé\n<{¸ã‘£âÆ‰ŒJ;¬]ØÄ1Å#ÎÆ0ÙJ;4^èÂD½ãóÇ®‹Ÿ¨³4i¨À(H#ÚÆEŒx–/¤nøû1ðã/Ç¡‹åj6,l˜Û1tã/\0005%ï0„]xü‘¶£GG5!’0¤€¨×ñÚâé–rŒq¢2Ì¨Þ‘ÎãNFPo\"4ô_˜·1×dÇ%‹e ²3¬s8é‘üã†G5Ž“ æ6Ô[Hë“cØHjYš;ô[è¾‘˜bë! Žyò@Ä\\¸½qØ#WHN‡Ž;ÌcÆQèã:Ç-%ª.œkXÆ‘ý£ÚGÍŒÏ†1Df¨ß‘ºcWFl¡!‚0ü€™²c EÜ©Ž;l˜Ñq\"ëF©ß¢7\\\\¨ùñâ£ÔÆO‹qþ.T|\"?‘ñã™ÆE³f9TyYÑ©ãSG1ûÂA\$f9R\n\"ÞÆxŒ¹>Bœ…HÚñß¤\0ÇŒ¶:\$e¹1œ£³F?=º3Tu)\nq¹béÇ~ËÎ<TøÎ±Ðc‰H.‘m~CôwHÊ±¸#/ÈI]~3ä^ˆºÑ„#§Æ>‘Y®4Œ^¸ÎQjcÊÇKŒ1\"Ò8¬|6Ñåc\"ÇB‘µ\"b4ãèæ%œ¢ÔÈG\0e\"’/t‹¨´1r£1Æe!v2„yÀ±õä<Ç †8\\o¨ÊÑ’#tÅÑ\rz@´}HÂ‘èbïÆèy î1Ì\\¨ðëdeGŽÁZ3Œ~ér)ã1È¿‹Û†Bl~H½²:£dF£‘-Î?”k8´qèc(FÍ‹ŠKÞ5|myñ€c1Æ<’*@´jØáò1ãÛÅ¾Œ‹>I´ZèÍQjä•È2ŒÉ\$0¤‹hµQˆäVFTŒ	\$ÆAl~öqÚ£È±Ž\$Ö>\\pÙ\rq‚\$/Èu%ï!®Jq \$ ãtE²‹GN-Tq)ò\"¢ÛHÊŒË¦=ì–XÉ2-£H’«š8\\nˆµRW\$HŒë\"¢C\\_¹\0»d\$Çf‘³\".D„u	'Q£zEíŒÙ&0toˆóqjãúÆ¿Œ³R@d—øÉä£ùÇu##¶LLkÉ*qó\$*GÄ‘iÎ@TŠi‘lãòEª‘ƒÎ5Œ˜¾r\\d–I–‘µ\"/ÌZÉ0’j\$TÅþŒz5Ld3’£ëÉ’oÂ.Tq¹!1{£Æ‹åÖ9œZ¸¾QÕbÓFŒwJ94nˆÒÄÖä{É(“-Ž8·2h¤uÈé“;\$†-Dkøårs£‡Hž™#¡‚ôY7ò\"Ø/E¿’Ó 	\$j¢^ò-£]Ç7Ž[\"N\$’èÂ‘“¤WÈ‘¯Ö/]à\$²+€1Ga/&IDnøÂ’@\$åÆ!‹ç\$Î-Œk!Q¨âùÊ)(N/\$t¸Ý¹äëÆOKzP´tXÜò[\0’GŽ’w(*K\$vˆË1ócÉ'“ÞGÌžIòxd­È\n“AÒ8\\rX·Òa£÷I”iNœI%\$½ã’Æ_‘÷ª6¤fçQþ#–ÈI”5#ŽF´—ØºñÏ#³Eâ’•\"î3\$¢IÜc‡Hˆ‹ÝvR|ùQ€¤cE¸ñ:R„eº±hä¶EÎfK`8þr.#·E³s®0L…˜üRä†F©‹·!\nC\$`Èöñ´\$ôH?’ËnPÜe™!ñš¥@F'”¿–/œ‡¸¶ÄÖäÿÊ”¯%ÂN,hÈÌrF\$öÈþŒÇ3´tøæÒ€¥Åæ’!1<„ÉCQÏ%ÉÃ’¹æJäZØf.Ý6Å†œ·±C‰¥ÊÔœ.²[þ™BÒ¿xëàƒè\0NRn`šÈùY\n’%+N¨IMs:Ã¹Ydƒef¬B[¶°ÝnÆ¹YŠòm¨ÁR®×’ûÉY¯ÚC„XŒëÛj³çU+Vk,¯\0Pëýb@e²¹¥x¬„V¾ºyT¤7ˆuî«[Jï•È±\nD¯§eR¿¬mx&°lÀ\0)Œ}ÚJ¼,\0„IØZÆµ\$k!µ¨ñYb²Áœ°€RÂ‡e/Q¾Àk°5.Áe‘­5•À¨žW‘`ª¥\0)€Yv\"VÂ\0•Ã\n‡%—å–`Yn¯Õ¡aôÔxÃ†Q!,õ`\"‰	_.Ÿå©Æ–tm\$•\"“²J«¤ÖÀ§ŽvÆ%‰M9j‚°	æ–§Ä*³KpÖ”’;\\R ¼ü3(§õŠ^¯:}–Èï|>Âµa-'U%w*‰#>¤@Ì¬e–Jÿ¤;Pw/+¹á5E\rjn¡ÐÃd–ô¢^[ú¯§cÎ°¥uËz\\Ø1mi\"x‚„påÃ;£ÌîˆæˆP)äøªÇ#„±Ø’¡…Ë!Aª;¨ß	4ì³a{`aV{KUàÊ8ã¨Ÿ0''o€2ˆ¨¢ycÌ¸9]Ké@ºÒ—^ðlBˆâOrëÔã,du¤¾8¤?õ‰€Õ%¼gB»ˆî‚ÆYn+ã%c¬e\0Œ°ñà¤±Yr@fì‹(]Ö¼¨\nbizîÖn€SS2£ÁGdBPjŠ¹Ö@€(—È¥¦!à-çv²´eÚ*c\0„ª4Jæç‚’ùÕÙ,“UÈ	dºÉeðj'TˆH]ÔŠÔG!œ)u‹ÕÖ¯Ÿ•Ò¯ùZËB5ûÌ“WŽ‰0\n±á¡ÔR«ÁW…\\¦Q jÄ^rÊ%lÌ˜3,ÒYy×Éf3&Ì•ÜŽÕQ:Ïµ2„mÉR)”T€¾(KRÁ 0ªÊ”@«ìY´¢Y:£Ùe3\r%´¨°Tö%­X”Á¹‡STÔ.J\\ë0ÙhôÄ…ŠD!Ä:—uæêÉU\"¾ÅÁo+7–\"„µ“f'º­R\0°‘ÞJõ2S–2è#nm »ÁIåŠœý\"Xü³²[Ö€Ñì} J¨¯c¼9p0ªüÕQ»(U\0£xDEW‚Œ.LõÁ=<BÔ0+½)ZS V;â\\âµI{5I‘AôÖÃ,dW²uè5Ew\n\$%Ò…ˆ½2i_\$ÈÙ+ìæO,Œ¬‡íX‹´Õ‘Jg&J¡úG’º%\\J“·b.ÄÝ^L‹TòFlŒè–¹]k#f@L·G€ÄT¼Ù—ÒÍHÏÌ\"–q1SÌ°ù‰jVÉ(Î™„ìZVzßÅ†³,§ÊèG.1Fû±gNÊ;×1ÃŠV¬¦5EÍò5`ò\0Ctè=F\ná¹›Î±•K‡þ™Ö\0­ÛŠ±%¨ËD]Q\$\r\0‡3J\\,Í™š³<T4*£™Á.ÒYK²D«QƒéLïS%,ŠgÔÇåª§Ö<Ëë™u0–ôÍUÄ‰Ö*x(©åNÂ’Yv!þ¥yÍ	wÅ4fdª¥rG•‰M \$äê‰^;ºéîÝæˆ)<Pã]DÒ%%Ó;ÔjÊåšI0æaÓu^Jp—[)¦v©3RhRúEöÀ\næ–L_š#5|Ü¾Õm3Pñ*¨\\Y51X’’	i³N—Èñ\$\"°ºaü­õh*KUÝÌïV8¨åuò±%&„ræ¯Ëš ²5oŒÕçg³;ÝrMl[Æ¨ögœ³ùª’·UÍq™ê¹šh|ÔeO2·f MlW2AP„×¹˜’ÍÀÍv~eD¬eñ3UÓ«l‡E62iüÎõìÓUbÌï˜¬«õUŒ¬©¨îøýªVðêiI!\$i¨Ê­&Z:½–xm!Å†“.ÖOÍfwÒ¯!”ÌÓkÝ¤Íƒ™6b\"«I™J]]:T™6ÒVrú¹}’ÜÇ«]™®±‘U¢Ž	ys7fÔMÅ™ÿ3ˆŒÜÎYœó:T_MÍw%3ÆnÏ¥\nÎæz*™í3âhƒ·	»`U–²Lÿš‡,¥Û„Ð5¨óvfƒ»Ã›Ù42_Q‰¼hÝÇÍuD§\no£¹)¤ÄœÕ«M9¿7foÛ¼©¤rÖÝÇÎWB~iTÝeyQTâN\nšd¦pr§#›óM§;’˜…4æpª¼„têÿ–(;š›³5	|¬àÇ‚Š­',AV7Ü”ÔåUAö&ìÍRœP¯\"äÕy‡Ò·•‰) [ŠnÌÕñ-3V•Ë,?œs6ºpŠù†3ŽfµÎAšÛ9k|ÝÉ®S†f¬*@œ•5Þg¼¾É¿2·Í}œŒ®þUüÝ™‘ðùæHÎF›l%®pÂ«Ie³be—MÙSO\rŽ[¼æi²3fÉÎLVá®rÙu®Š¾¥ÛNA›:î%r„Úy3Q_Ì¸›W.ÑÕÈ^Sl@&ÌÁ5ÖYlÂÌ1åæÎ}VxêžgÊ…§^SnÕÌÍQ!:5×ZÞiZCÔˆ:¿›•3qgé%DáõÝª{U¡3’tZ¹`ûÓu%w:ÉZQ:QìÏÇW fî‡í›¿9Jplê)Ö3xÔvÌþK7žb#«ù½«çX+Jš(¢Âh´ìP*Ó´«Î›þ¢!×”ìÅSLçh*'¤¨\npBù™ÚªgNÊ§8BuÒªéÂŽ¯çÎŒ½8niêˆIÍs¸USÍIš‡;vvÚ³UõsR•7Nu×8©H|íéÅÓ·§ÌŽœ«8òq´ÕÙÞ+'ÑßÍ`œx¢9Rˆ	Õ®ºçMaR8úxä)¸'!Ïœ;±U¬×YÖ“’ÝsNIg:ÕKTëy¯3®gŽÍYìëÊkäãÉÜ³n'LO(œ¿3šw4ñ4î»¦ÇÏœÚêþl¬ñÎJ½–ªw½9Ý\\ìç•óóhf(¢_~ìòà}9Nö¦Õ\0–´åb\"¢Yé¤ƒTh,Úž¤@ú±D¡û€\$€Iž·;ŽeüèUÊn¨³ž·,¹OªÆ	Xÿg´-ÀžÉ+>ti'G‚öŽlª%\0­8âVBËU1«ye\0KTÆ4ûÁÈm’ºV2)\r]I/\rFù…ÔXˆ×Àß¨ña·­GŠÂ¹ò*ˆ§»žÿ>ERì÷ðî®¥ž‡ÑZ›-)I\$®¹íç:¦aË\0¾FybaÙg«w§­(ß_@§v}öiõÊ³î€S^Ë25DÔ³Ð	ÈôURO±ŸJHÖ\\ØisðfÆËKšN±€qi÷Sg×OÂŸ\n²F~|«µÏ*@gR€_Q<9sÜ¬3i+Ø—².Cw²²ê|‚øyË6aìOÜY9¶Œ¶É–\nëÔ½-([®±†_ˆ}íSû]c¤S=Â¤ÎÙþÎÍÔYÎàU-> <ú©µ\n<ÖsOôQ4F¦^}\0007uäk(/‹ŸÛ/5{Lÿ9µ\0§¬Ð &³Š[<ÏõŸsÛ\0&Íè#…@hÌéª3©V}ÐH¢Š*Üw+]'DÐ& @§Ö])µè;TGe3\\Îên®ÑßËd\$:¦uN4Åyktê-dR!7–­Ée4(P!•Ÿ-þ9À4ç_PMGbÄ±w…«ØÉ6O§S¦F‚âí)§Šyh0+€ž²§qT|·Š+uÔÿÎ+ A¬?òÞ	öTè3.q 41T´¸e›€\n:P ø¯–{Tî\n³ëh?«šTïAùS£­*«åÒ+åu¥>ú\\ê¾ZéíÊîYì·¢wEJö%·’s—L±¾dªšyÀ+\rCèœß¡'Añl,Òyå3þç²ËÍ—`º	_*ÑPû ThKDV²·–~5	à0´+á¼,š-?­]œºò3ëÖKå—`¯^†¸¤I42(]ªwž.æ†rÄÊËê]¬\nYÆ¨B†£­Ð	³í–}Ð‹R ¾ÉgØ}:H§ðJÄWP²ê„\"Þµ—ðôV\\¬<——? >½å—áÿ§Ü¬Ý†¿=¦…:Ÿ\n0×è\\+ñS–´æfÝUŒ³í‰U,…WCÖˆè•On¨òÎ…¢§.†e9|R÷I'©[×/º²ÄÙü2ù›«QžÓBn:ÆIõ\nö§g¼9Æ\rü,ÓR6³ýçÒQ\$XÝ+¸>–©±`\nù)/_8QiÔùµê—=‡êv?5v\0 \n¨çÉLG¥Dmˆw\\ëFÖŒ‡Ñ¢¯ÁdêŸµ}s‰\"‘ÃYv¤|â™J*´9h­¡Ñ@XEUÑ*Þ(oQ]\$Bžˆ,ûéÜƒ•KTœv¤AptCÉƒ\n×C,/˜<¡­Ú™EW‹-VïP¡¢=Wÿ*%Kê—-Q`9	(Êú59Ó€èm)ËX¸¨@ç2ø ýT@ˆÛ\nS–¯‘bd×EÎ´a€+€DXîá|UÚ	‹	’¡F® 2ú%5\nj•m«€WÙ+xêKŒæVÌ3#„¶CTÃek¤™–&Î,£l¬jbd7)Ó“\"\n+ìPüºb’èIŠ@è3Ñ•ÜµjUÒÌEsÞÔ)D¢fë’ƒõŠû•ÇPZ3AÎŒÕ\nwThð—²ªÛ˜Å4Zäª<Êuß©ßdqâËŠu(÷ž“bKG±à¥éÀnÓTï®ˆ]z¨f%#3IËfS¨®&}µ@D†@++ù¤Aíhª¿\nªï€U—Þ¥|B¡;”…UmÑÙU…E•N¥!ôx2±1Ò\0§GmvH~õÁHèTê)öW®³YNý\"åk5©ÑvT#=µÚ¥Ê<\n}‘#R3YƒHÅRÍIÍ³Ü¦;ÌÑRl£1léuB%TQJî™*ºêˆÙ'ºEë0i¬dw,¥zÊÍ¥:\$†¦;Í? üîj‘¿)§ô)ÔÊ\$32J}Å&‡[³\$¨õÌ¤;DnýE×´À+0ÛaZ{¨èC èû€(¤ê:“¸ ÚO@hø²D£æ\0¡‰`PTou“³ÄïF®\rQv‚û¨˜o½Ü¡\$Sîö+˜Ò#7À¤Izr…pk DW”ˆFsÍ9™ Qê  Ð°1€gÀÅ#•\0\\Là\$Ø 3€g©XŽyôy œ-3h›ÀþÃ!†nXèô]+±—	É€c\0È\0¼bØÅ\0\r‰ü‡-{ž\0ºQ(ðQÔ\$s€0…ºém(°[RuòVÆ÷ÒØ>Æ¼+àJ[©6à‘ÒàJ\0Ö—ú\\´¶ã,Òé‚Kš3ý.ê]a_\0RòJ Æ—`š^Ô¶ClRÛIKî–ù\n \$®nÅÒä¥ïKj–©\n€šÁ©~/¥ªmn˜].ª`ô¿ijÒâ¦#K¾˜f:`\0…éŒ€6¦7Kâ–¨zcôÂ\0’Òõ¦/K®–­/ªdôÄé‡FE\0aLŽ˜¤dZ`ƒJé†S‘ÏÊ™…2ØÍ4Î@/Æ(Œ‹Lò™õ0ª`´Ä©†€_ŽLþ™]4ZhôÐ©šSD¦M˜…4:cÑé‹SR¥×M—E4šiò€éžSG¦EMj˜å4zdÔÕ©–SFKLª›%4ªeÔÏ%\$ÓlKM2–õ1ÈÚ”Ôi¦Ó©MV›­.¸Ú”Öi´Ó©Lz›/ˆ÷ôÛ£Ó„¦ÑMæ›,`Š_ôàimSŠ¦gMÆœ€jg‘òéÇÓ5¦9.›…9j_òéºS¥µ.›Å9ê_±òé¾Sˆ¦‹.œ7Úrò)ÉÓ%§[2m8ºuTæé™S±§3M:]3ºq”èänÓ±§KNˆ1|^ÒktÏ\"ÒÓH§gKjž-;zcñiÎÓš§–\r<ê_²-iÊÓ¸¥ñ\"ÖžU.¹´óiëRÚ‘kOFží=:\\ôÏ\$ZÓ©§MLE­5úxôø©ÂÓ»_\"Öœ=<\0ñtéÙSç¦9OÒž­1Š~”öi²Óô§¹Oêí>ê~qœ)òF¸¨’ =6:~ÔõãJÔ‘ÏP:ŸÍ=¨åTÿ)¢Æ«§ÿPJ8õ@êwôô©÷Ç*§ÍOÊ5]>ªt÷£•T\n§å!\" 6Y	)€ÈH¨/Pªž…3É	éð†/‘P~ àù	ªÓ®¨!\"ŸC’ÌÔýj¡ ¨eNJ¡üˆêˆñÔ*%Ô4¦1Q¡ÅCZ‡Q‘jTBQ.¢\rE)\0004Ëê\$€2¨SM+å<j„t¿j0Ô,¦9Q†¡}F\0\$±s©žTa¨KÎ£]Ecj*€'K»M¾—MGx½ÕRÇT1¦#Qê¡¥GªŠ5ª:Ôz¨Lš¡4u6z•\"j\"TˆKuNÖ£ýGÚg\$jFSÜ¨ïQ2¤¥Høîµ\"êMTƒ©%R¤•HzŽÕ\$ª,Ôw¨Re.\$rªzµ)©ÛÔ¦©-Qö ÍJ„¹‘Êª@Ô°©=R&/IÊ•1†*]T³‹À7¼˜¾QÒåD&Ó©qN¦_(´q²c[TwŒQRôå´œJš\0nâ÷T­¨û.¦˜956cÔÜŒÕSz¥H˜Á•7ªRÔ}ŽSr8¥NŠšÕ\"bÖTè§ÁQÞ5MNŠ–õ#ãçÔè©ESÂ§-H˜Á7\"ÜTü©_Sê§}GØÌ•?*yÔ©‹‡Sò§½P*Ÿ5#âöÔÜÏT:§]PÊŸõC*€Ô‰‹T:¨-K8Æ5Cª„ÕªR¦--MÈ¾•HªˆÕ ª'T‚¨­HøËõHªŒÔÑ‹×TŠ¨íRª£õ,âéÔÜ‹GTÚ©-SJ¤õM*”Ô©‹UTÚ©mMH¸õMª˜Õ>ªgSD³5MÈÂ•RªœÕHªwU\"©íK8ÕÕRª ÔÚŒ¡U*ª-U*¨ànÂ¾TÙIR­,t¢Z«ÕêY¶IUF«51ª¬µW)vÕk‹_KÆ«pJ«5Zj­Å¯©R4r\n¬^jIÓCKº„‚ª}UÊ“_ª°Ô›ªãO¬=N·R*¯F-ª½Rž¬%Wš‹Õcê¦Õ\\ŽaV>«EYj–µdªªÔÃ«UÎ¬µWXÍ5*ÈÕ‹’¹Uy‚õZŠ°1kã™Õ¨«7Vš¬R\\HÍ5h*ÖU¢©ÏUÆ§M[Š²±kêvÕ¸«3Vò­}[(ä5WªzÕ¸«iB­Oº®1¯ê¯Tý«—V®;­[øîµpRæGu«;T@0>\0‚ê/I³ªÿW`í]¦ô\0ªîÆ8«¿PŠ¯]ÈÍ1m*ïÕÇyUz¨mW¡õ|ªÝ“[«¡Ö¯…]J¬ÑˆêøU±««ö¯…Z*¤5\\j‘Ö«ëZªô`ZÁ5~ª®Eì¬Wú«4ZšÁ5h£QÕ^‹cXZ®•Sú®1o«Vª¹U&«TºÄ5}cU^›Xš°dm*³±’kUu¥«SfG=[¹õjäsÕ¿‘ÏX¦Kc\n®iRâHç«i#ž±uWt»µª½¥º«»XÂÕcÄ¹•«U†¬”rÚ¢õUZ‹Õ‡ƒNE¢¬‘Xº¬…4ÚÈudê·Eä¬eV^²íKÉànâòV8‹sXÂ¥ÍfÇõ/ÂhJ³-J]Ó‚…™ÓÎÁÕzO›±<Eh‰\$å‹“·¡ó\0Kœë<bw„ñ…>·”øNž\")]b£	â+zê.cS.¢iFç	ã£µQNQ«éV*ªéÛÎúÞO[X¤nxŠ¤P	k­§oNø£}<aOò§Iß“Áh·ºšT;òrñ‰‰¤ƒVD6Qß;zŠ]j×~'’:ë–[Ivôó7^Ê‘§ÖÁžjëºw[«ùæîºçœÊÅ†¥:u ÅDs#¦¿Î\\wµ<n|*á‰hëmÎKv;YÒˆ±Ú3á]Œ«^#—Zªj¥gy³jÄ§Y,”%;3¾³ÊÚù×.ÈW\"‘Ã\$Ù3>gÚœºÏÓÏ¦ªVTóZj¥hYÝjžkD*!šh&XzËiª•¥+GV—­\"¥æ¸Z:Ò¤§+‡NoG¥Zjj¥iÉ]ÊžkOÐ_­Ö¬ÔmjIª•¨§t¯–#½[âj\rnŠãê©×Ðn™ßZ¥_,Õé†ógÎÄš©:¹¼Å9‰Áÿ«[L2®W=TÔ×0®ãf¶\0P®U6\ns%7isYæ?£¿uá3¾’½nb5¡«Ÿ»šX|G~l•&×k¤¥·M§ †¯ú¶ŒÏy¡S–É)Î]œÜ­r·¶Ù¸µ¸æìÖê›Å?Õ}u'n0W-Î¹®æb·´ÇªìõŸk?»vQý7…Ü}p\nìõÀ’ÍÙ®Z*»9)Êá5Þ•ZW­-ZB¸²Œ:ìõã«ŠW\0WZfp•GpõîÍÙ®:Fpú¤ŠäUÙëSN/™Ï\\©Ü%s9¬S{§ ×8®ÏZÍasÊÛ“’+¢N^®“9™MÕ{…P5Óç ×Q®ÔîJº¢«y§õÕè;œÚîz¸ƒÂÕYÚV Ä3—:ïœDÅIŠÃ+ç‡ý¯£19M;º¥Œ’ô¨“V´®š\rQ{êÉÕ®•¶Å+£ƒFCLÄ¹ŠN¥–©Ôˆ\\ùÞ)\$iŒŽÛN'\0¦°PŠÂšõÊÇ]XÌ^s1òf&Š\"'<OøóšÌ¡ËL\0¹\"‡@Ö”¥%ä6úÂUAõ1ýi(zÌèÝ€\rÒÕ‚ä±ÈbZÀ”+IQOï3€ºË\r=*Ä‰ ‰)ñ¨!Áž Ð`ª¼h°ˆ,Ð«mGPCËA Ù²íƒA„Œ(ZÅ°%ƒtì,h/Á‰ˆi–Èk¬«¡XEJ6ð±„IDèÈ¬\"›\nïaU- ›«\nvŽy°_€ÄÂÂ›Ú«¯k	a½B<ÇVÂƒÛD»/P»ôaîÁ)9Lã¶(Z‚°8êvvÃ¹Øk	§oÐZXkäÑå§|´&°.Âæ±C¹’Øá°`€1€]7&Ä™+™H¤CBcX“B7xXó|1“€0¦ãaš6š°ubpJLÇ…–(·š÷mbl8I¶*Rö—@tk0€—¡¯ÅxXÛÁÓ;ÁÅ al]4s°t¿íÅªð0§c‡'´ælß`8MŒ8‘ÀÃ€D4w`p?@706gÌˆ~K±\r‚Û “P´…Ùbh€\"&¯\nìq‘PDÈÐÎó\$Ð(Í0QP<÷°àÀã¬Q!X´…xúÔ5€ˆR·`w/2°2#ŠÀ¸Ž `¬»‘1†/ˆÜ\r¡Ö:Â²–±¢£B7öV7ZŒ›gMYúH3È „ÙbÎ	ZÁÓJÅöGâwÙgl^Æ-‘R-!Íl“7Ì²Lõ†Æ°<1 íQC/Õ²h¼à)ÏWž6C	÷*dˆþ6]VK!mì…ØÜã€05G\$–R˜µ4¯±=Cw&[æ«YP²›dÉš³')VK,¨5eÈ\rÞÊè†K+ï1„X)bÛe)ÄâuF2A#EÑ&g~‘e¡y’fp5¨lYl²Ôœ5õƒö¿Ö\nÂŠÙm}`‚(¬M Pl9Yÿfø±ýÖ]€Vl-4ŽÃ©¦«ÂÁ>`À•/û³fPE™i‹\0k™vÆ\0ßfhS0±&ÍÂ¦lÍ¼¢#fuåÌû5	i%ÿ:Fd€ö9Ž™Ø€G<ä	{ö}ìÂs[7\0á¬Îž3íft:+.È”–p >ØÕ±£@!Pas6q,À³—1bÇ¬Å‹ãZK°ê±Ü-ú“ar`•?RxXÁé‘¡ÏVïú˜#Ä¤ÔzÂ; ÀD€•¾H²Á1¥’6D`žþYê`÷RÅPÖ‹>-Æ!\$Ùù³ì×~Ï€ÐÅà`>Ùï³õhÔ0ô1†À¬–&\0Ãh—ëûI–wlûZ„\$“\\\r¡8¶~,\nºo_áÀB2D´–ƒa1ê³àÇ©=¢v<ÏkF´p``”kBF¶6 ÄÖ²—hÆÉT TÖŽ	‡@?drÑå‰€JÀH@1°G´dnÁÒw‡Æ%äÚJGšÒ0bðTf]m(Øk´qg\\í½ó¸–¬ë°ê ÈÑˆ3vk'ý^d´¨AXÿ™~ÇW™VsÂ*¼Ê±æd´ûM À¬@?²ÄÓ}§6\\–m9<Î±i”Ý§›ˆÔ¬h½^s}æ-¦[Kœs±qãbÎÓ-“öOORm8\$ÞywÄì##°Œ@â·\0ôÒØ¤ 5F7ö¨ƒ X\nÓÀ|JË/-S™W!fÇ† 0¶,w½¨D4Ù¡RU¥T´ž’îÕðZXÇ=í`‰W\$@âÔ¥(‹XG§‹ÒŠµ—a>Ö*ûY¶²ˆ\n³ü\nŒìš!«[mjœµŠ0,mu¬W@ FXúÚÎòðü=­ (¦ý­b¿ý<!\n\"”ª83Ã'¦‚(R™Ý\n>”ù@¨W¦r!L£HÅkÌ\rˆE\nWÆÞ\r¢‚'FHœ\$£‹ääÀm„È=ÔÛ¥{LY—…&ÑÜ£_\0ŽÆüÝ#¢ä”€[„9\0¤\"ÔÒ@8ÄiKª¹ö0Ùl‰ÑÐp\ngî‚Û'qbF–Øyá«cl@9Û(#JU«Ý²ƒ{io­‘¥.{ÔÍ³4ÞVÍŠVnFÉxðÑüzÎ QàÞž\$kSa~Ê¨0s@£À«%…y@•À5HŽ†NÎÍ¦´@†x’#	Ü« /\\¥Ö?<hÚ‚ù…¼ITŒ :3Ã\n%—¸");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôža8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wþ\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹ž”ªÓ²Þ»\0\0;";break;}}exit;}function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
idf_unescape($u){$je=substr($u,-1);return
str_replace($je.$je,$je,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
remove_slashes($gg,$Uc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($gg)){foreach($X
as$Yd=>$W){unset($gg[$y][$Yd]);if(is_array($W)){$gg[$y][stripslashes($Yd)]=$W;$gg[]=&$gg[$y][stripslashes($Yd)];}else$gg[$y][stripslashes($Yd)]=($Uc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Oa=false){static$gi=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Oa?array_flip($gi):$gi));}function
charset($g){return(version_compare($g->server_info,"5.5.3")>=0?"utf8mb4":"utf8");}function
script($lh,$fi="\n"){return"<script".nonce().">$lh</script>$fi";}function
script_src($_i){return"<script src='".h($_i)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nbsp($P){return(trim($P)!=""?h($P):"&nbsp;");}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($C,$Y,$fb,$fe="",$jf="",$kb="",$ge=""){$I="<input type='checkbox' name='$C' value='".h($Y)."'".($fb?" checked":"").($ge?" aria-labelledby='$ge'":"").">".($jf?script("qsl('input').onclick = function () { $jf };",""):"");return($fe!=""||$kb?"<label".($kb?" class='$kb'":"").">$I".h($fe)."</label>":$I);}function
optionlist($pf,$Wg=null,$Di=false){$I="";foreach($pf
as$Yd=>$W){$qf=array($Yd=>$W);if(is_array($W)){$I.='<optgroup label="'.h($Yd).'">';$qf=$W;}foreach($qf
as$y=>$X)$I.='<option'.($Di||is_string($y)?' value="'.h($y).'"':'').(($Di||is_string($y)?(string)$y:$X)===$Wg?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($C,$pf,$Y="",$if=true,$ge=""){if($if)return"<select name='".h($C)."'".($ge?" aria-labelledby='$ge'":"").">".optionlist($pf,$Y)."</select>".(is_string($if)?script("qsl('select').onchange = function () { $if };",""):"");$I="";foreach($pf
as$y=>$X)$I.="<label><input type='radio' name='".h($C)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ka,$pf,$Y="",$if="",$Sf=""){$Kh=($pf?"select":"input");return"<$Kh$Ka".($pf?"><option value=''>$Sf".optionlist($pf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Sf'>").($if?script("qsl('$Kh').onchange = $if;",""):"");}function
confirm($Ee="",$Xg="qsl('input')"){return
script("$Xg.onclick = function () { return confirm('".($Ee?js_escape($Ee):lang(0))."'); };","");}function
print_fieldset($t,$oe,$Oi=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$oe</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Oi?"":" class='hidden'").">\n";}function
bold($Wa,$kb=""){return($Wa?" class='active $kb'":($kb?" class='$kb'":""));}function
odd($I=' class="odd"'){static$s=0;if(!$I)$s=-1;return($s++%2?$I:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$Vc=true;if($Vc)echo"{";if($y!=""){echo($Vc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Vc=false;}else{echo"\n}\n";$Vc=true;}}function
ini_bool($Kd){$X=ini_get($Kd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Ki,$M,$V,$F){$_SESSION["pwds"][$Ki][$M][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($P){global$g;return$g->quote($P);}function
get_vals($G,$d=0){global$g;$I=array();$H=$g->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$d];}return$I;}function
get_key_vals($G,$h=null,$Th=0,$fh=true){global$g;if(!is_object($h))$h=$g;$I=array();$h->timeout=$Th;$H=$h->query($G);$h->timeout=0;if(is_object($H)){while($J=$H->fetch_row()){if($fh)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$yb=(is_object($h)?$h:$g);$I=array();$H=$yb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$I=array();foreach($v["columns"]as$y){if(!isset($J[$y]))continue
2;$I[$y]=$J[$y];}return$I;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($y);}function
where($Z,$p=array()){global$g,$x;$I=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$d=escape_key($y);$I[]=$d.($x=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$d = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$y)$I[]=escape_key($y)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$db);remove_slashes(array(&$db));return
where($db,$p);}function
where_link($s,$d,$Y,$lf="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($d)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$lf:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($e,$p,$L=array()){$I="";foreach($e
as$y=>$X){if($L&&!in_array(idf_escape($y),$L))continue;$Ha=convert_field($p[$y]);if($Ha)$I.=", $Ha AS ".idf_escape($y);}return$I;}function
cookie($C,$Y,$re=2592000){global$ba;return
header("Set-Cookie: $C=".urlencode($Y).($re?"; expires=".gmdate("D, d M Y H:i:s",time()+$re)." GMT":"")."; path=".preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Ki,$M,$V,$m=null){global$ec;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($ec))."|username|".($m!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Ki!="server"||$M!=""?urlencode($Ki)."=".urlencode($M)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$Ee=null){if($Ee!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$Ee;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($G,$A,$Ee,$tg=true,$Cc=true,$Mc=false,$Sh=""){global$g,$n,$b;if($Cc){$sh=microtime(true);$Mc=!$g->query($G);$Sh=format_time($sh);}$ph="";if($G)$ph=$b->messageQuery($G,$Sh);if($Mc){$n=error().$ph.script("messagesPrint();");return
false;}if($tg)redirect($A,$Ee.$ph);return
true;}function
queries($G){global$g;static$mg=array();static$sh;if(!$sh)$sh=microtime(true);if($G===null)return
array(implode("\n",$mg),format_time($sh));$mg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$S,$zc='table'){foreach($S
as$Q){if(!queries("$G ".$zc($Q)))return
false;}return
true;}function
queries_redirect($A,$Ee,$tg){list($mg,$Sh)=queries(null);return
query_redirect($mg,$A,$Ee,$tg,false,!$tg,$Sh);}function
format_time($sh){return
lang(1,max(0,microtime(true)-$sh));}function
remove_from_uri($Df=""){return
substr(preg_replace("~(?<=[?&])($Df".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Jb){return" ".($E==$Jb?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($y,$Rb=false){$Sc=$_FILES[$y];if(!$Sc)return
null;foreach($Sc
as$y=>$X)$Sc[$y]=(array)$X;$I='';foreach($Sc["error"]as$y=>$n){if($n)return$n;$C=$Sc["name"][$y];$ai=$Sc["tmp_name"][$y];$_b=file_get_contents($Rb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$ai":$ai);if($Rb){$sh=substr($_b,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$sh,$zg))$_b=iconv("utf-16","utf-8",$_b);elseif($sh=="\xEF\xBB\xBF")$_b=substr($_b,3);$I.=$_b."\n\n";}else$I.=$_b;}return$I;}function
upload_error($n){$Be=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Be?" ".lang(3,$Be):""):lang(4));}function
repeat_pattern($Qf,$pe){return
str_repeat("$Qf{0,65535}",$pe/65535)."$Qf{0,".($pe%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($P,$pe=80,$zh=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$pe).")($)?)u",$P,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$pe).")($)?)",$P,$B);return
h($B[1]).$zh.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($gg,$Ad=array()){while(list($y,$X)=each($gg)){if(!in_array($y,$Ad)){if(is_array($X)){foreach($X
as$Yd=>$W)$gg[$y."[$Yd]"]=$W;}else
echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Nc=false){$I=table_status($Q,$Nc);return($I?$I:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$I=array();foreach($b->foreignKeys($Q)as$q){foreach($q["source"]as$X)$I[$X][]=$q;}return$I;}function
enum_input($T,$Ka,$o,$Y,$tc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$xe);$I=($tc!==null?"<label><input type='$T'$Ka value='$tc'".((is_array($Y)?in_array($tc,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($xe[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$fb=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$I.=" <label><input type='$T'$Ka value='".($s+1)."'".($fb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$r){global$g,$U,$b,$x;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Fa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Fa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Fa);$r="json";}$Cg=($x=="mssql"&&$o["auto_increment"]);if($Cg&&!$_POST["save"])$r=null;$jd=(isset($_GET["select"])||$Cg?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ka=" name='fields[$C]'";if($o["type"]=="enum")echo
nbsp($jd[""])."<td>".$b->editInput($_GET["edit"],$o,$Ka,$Y);else{$rd=(in_array($r,$jd)||isset($jd[$r]));echo(count($jd)>1?"<select name='function[$C]'>".optionlist($jd,$r===null||$rd?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):nbsp(reset($jd))).'<td>';$Md=$b->editInput($_GET["edit"],$o,$Ka,$Y);if($Md!="")echo$Md;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ka value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ka value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$xe);foreach($xe[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$fb=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($fb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'>";elseif(($Qh=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($Qh&&$x!="sqlite")$Ka.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ka.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ka>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ka cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$De=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&$g->server_info>=5.6&&preg_match('~time~',$o["type"]))$De+=7;echo"<input".((!$rd||$r==="")&&preg_match('~(?<!o)int~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($De?" data-maxlength='$De'":"").(preg_match('~char|binary~',$o["type"])&&$De>20?" size='40'":"")."$Ka>";}echo$b->editHint($_GET["edit"],$o,$Y);$Vc=0;foreach($jd
as$y=>$X){if($y===""||!$X)break;$Vc++;}if($Vc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Vc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Sc=get_file("fields-$u");if(!is_string($Sc))return
false;return
q($Sc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$dc;$I=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$C=bracket_escape($y,1);$I[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$dc->primary),);}return$I;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$ed=false;foreach(table_status('',true)as$Q=>$R){$C=$b->tableName($R);if(isset($R["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$H=$g->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$H||$H->fetch_row()){if(!$ed){echo"<ul>\n";$ed=true;}echo"<li>".($H?"<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>\n":"$C: <span class='error'>".error()."</span>\n");}}}echo($ed?"</ul>":"<p class='message'>".lang(9))."\n";}function
dump_headers($zd,$Ne=false){global$b;$I=$b->dumpHeaders($zd,$Ne);$Bf=$_POST["output"];if($Bf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($zd).".$I".($Bf!="file"&&!preg_match('~[^0-9a-z]~',$Bf)?".$Bf":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$J[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($r,$d){return($r?($r=="unixepoch"?"DATETIME($d, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$d)"):$d);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$Tc=@tempnam("","");if(!$Tc)return
false;$I=dirname($Tc);unlink($Tc);}}return$I;}function
file_open_lock($Tc){$gd=@fopen($Tc,"r+");if(!$gd){$gd=@fopen($Tc,"w");if(!$gd)return;chmod($Tc,0660);}flock($gd,LOCK_EX);return$gd;}function
file_write_unlock($gd,$Lb){rewind($gd);fwrite($gd,$Lb);ftruncate($gd,strlen($Lb));flock($gd,LOCK_UN);fclose($gd);}function
password_file($i){$Tc=get_temp_dir()."/adminer.key";$I=@file_get_contents($Tc);if($I||!$i)return$I;$gd=@fopen($Tc,"w");if($gd){chmod($Tc,0660);$I=rand_string();fwrite($gd,$I);fclose($gd);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$Rh){global$b,$ba;if(is_array($X)){$I="";foreach($X
as$Yd=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($Yd):"")."<td>".select_value($W,$_,$o,$Rh);return"<table cellspacing='0'>$I</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if($jg=is_url($X))$_=(($jg=="http"&&$ba)||preg_match('~WebKit|Firefox~i',$_SERVER["HTTP_USER_AGENT"])?$X:"https://www.adminer.org/redirect/?url=".urlencode($X));}$I=$b->editVal($X,$o);if($I!==null){if($I==="")$I="&nbsp;";elseif(!is_utf8($I))$I="\0";elseif($Rh!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$Rh));else$I=h($I);}return$b->selectVal($I,$_,$o,$X);}function
is_mail($qc){$Ia='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Qf="$Ia+(\\.$Ia+)*@($cc?\\.)+$cc";return
is_string($qc)&&preg_match("(^$Qf(,\\s*$Qf)*\$)i",$qc);}function
is_url($P){$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($cc?\\.)+$cc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P,$B)?strtolower($B[1]):"");}function
is_shortable($o){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$Sd,$md){global$x;$G=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($Sd&&($x=="sql"||count($md)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$md).")$G":"SELECT COUNT(*)".($Sd?" FROM (SELECT 1$G$nd) x":$G));}function
slow_query($G){global$b,$ci;$m=$b->database();$Th=$b->queryTimeout();if(support("kill")&&is_object($h=connect())&&($m==""||$h->select_db($m))){$de=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$de,'&token=',$ci,'\');
}, ',1000*$Th,');
</script>
';}else$h=null;ob_flush();flush();$I=@get_key_vals($G,$h,$Th,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$pg=rand(1,1e6);return($pg^$_SESSION["token"]).":$pg";}function
verify_token(){list($ci,$pg)=explode(":",$_POST["token"]);return($pg^$_SESSION["token"])==$ci;}function
lzw_decompress($Sa){$Yb=256;$Ta=8;$mb=array();$Eg=0;$Fg=0;for($s=0;$s<strlen($Sa);$s++){$Eg=($Eg<<8)+ord($Sa[$s]);$Fg+=8;if($Fg>=$Ta){$Fg-=$Ta;$mb[]=$Eg>>$Fg;$Eg&=(1<<$Fg)-1;$Yb++;if($Yb>>$Ta)$Ta++;}}$Xb=range("\0","\xFF");$I="";foreach($mb
as$s=>$lb){$pc=$Xb[$lb];if(!isset($pc))$pc=$Xi.$Xi[0];$I.=$pc;if($s)$Xb[]=$Xi.$pc[0];$Xi=$pc;}return$I;}function
on_help($tb,$gh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $tb, $gh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$J,$yi){global$b,$x,$ci,$n;$Dh=$b->tableName(table_status1($a,true));page_header(($yi?lang(10):lang(11)),$n,array("select"=>array($a,$Dh)),$Dh);if($J===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Sb=$_GET["set"][bracket_escape($C)];if($Sb===null){$Sb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Sb,$zg))$Sb=$zg[1];}$Y=($J!==null?($J[$C]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$C])?array_sum($J[$C]):+$J[$C]):$J[$C]):(!$yi&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Sb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$C]:($yi&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($yi?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($yi?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."...', this); };"):"");}}echo($yi?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$ci,'">
</form>
';}global$b,$g,$ec,$mc,$wc,$n,$jd,$od,$ba,$Ld,$x,$ca,$ie,$hf,$Rf,$wh,$sd,$ci,$ii,$U,$xi,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Ef=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Ef[]=true;call_user_func_array('session_set_cookie_params',$Ef);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Uc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",17);$ie=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bg'=>'Ð‘ÑŠÐ»Ð³Ð°Ñ€ÑÐºÐ¸','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','bs'=>'Bosanski','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'Î•Î»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fi'=>'Suomi','fr'=>'FranÃ§ais','gl'=>'Galego','he'=>'×¢×‘×¨×™×ª','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èªž','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ð ÑƒÑÑÐºÐ¸Ð¹','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ð¡Ñ€Ð¿ÑÐºÐ¸','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ð£ÐºÑ€Ð°Ñ—Ð½ÑÑŒÐºÐ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ca;return$ca;}function
lang($u,$Ye=null){if(is_string($u)){$Uf=array_search($u,get_translations("en"));if($Uf!==false)$u=$Uf;}global$ca,$ii;$hi=($ii[$u]?$ii[$u]:$u);if(is_array($hi)){$Uf=($Ye==1?0:($ca=='cs'||$ca=='sk'?($Ye&&$Ye<5?1:2):($ca=='fr'?(!$Ye?0:1):($ca=='pl'?($Ye%10>1&&$Ye%10<5&&$Ye/10%10!=1?1:2):($ca=='sl'?($Ye%100==1?0:($Ye%100==2?1:($Ye%100==3||$Ye%100==4?2:3))):($ca=='lt'?($Ye%10==1&&$Ye%100!=11?0:($Ye%10>1&&$Ye/10%10!=1?1:2)):($ca=='bs'||$ca=='ru'||$ca=='sr'||$ca=='uk'?($Ye%10==1&&$Ye%100!=11?0:($Ye%10>1&&$Ye%10<5&&$Ye/10%10!=1?1:2)):1)))))));$hi=$hi[$Uf];}$Fa=func_get_args();array_shift($Fa);$dd=str_replace("%d","%s",$hi);if($dd!=$hi)$Fa[0]=format_number($Ye);return
vsprintf($dd,$Fa);}function
switch_lang(){global$ca,$ie;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$ie,$ca,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ca="en";if(isset($ie[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];}elseif(isset($ie[$_SESSION["lang"]]))$ca=$_SESSION["lang"];else{$va=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$xe,PREG_SET_ORDER);foreach($xe
as$B)$va[$B[1]]=(isset($B[3])?$B[3]:1);arsort($va);foreach($va
as$y=>$lg){if(isset($ie[$y])){$ca=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($va[$y])&&isset($ie[$y])){$ca=$y;break;}}}$ii=$_SESSION["translations"];if($_SESSION["translations_version"]!=2769047022){$ii=array();$_SESSION["translations_version"]=2769047022;}function
get_translations($he){switch($he){case"en":$f="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Þa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Þr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ÐY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚ž0Ê\nÒãdFé	ŒÞn:ZÎ°)­ãQ¦ÕÈmwÛø€ÝO¼êmfpQËÎ‚‰†qœêaÊÄ¯ ¢„\\Ã}ö5ð#|@èhÚ3·ÃN¾}@¡ÑiÕ¦¦t´sN}+ö\\òp¤Û¥æ+÷ÌˆÎ NbBØ­8„µŒ#’Ê'£ î³`PŽ2ð+à²‰‰ëÚÔ*ŠÂÔ/ÌhäúH¤\nê:ãœ9Ž+8Šºí8˜7­Cs¨¿\r®`ÊØôj‰Ð€ŒÁèD4ƒ à9‡Ax^;Êr@6­kð\\³Œá|w-<QØæòÁxD ÂJÄ‹À­€xŒ!ò~ŸBÃ@ß£C«°)Š0Ë:Ò8ã(Æ¦³k‹Q9è;à:ÏèKN Œèä2c(îQ”sB‹4ðe\n¼Cá*B1,èO:ùˆcxØ—ÆÂ£îÓÕ#lÒ¼ˆ#«0½Œh\rfâŒ£0Â:Ñ´€ÃU´âœû?B0ê7Oóæ Œã:3³“AŒc@æ#»À€µ:ò2)#v»¹®RZÛ\nŽ{Œîý)fµöM€6RéÀæ1¹Dò5Õ”³?°æÓR”kë@Æ*úßorh\0ƒÛ+Ã.#cŒbXØ É2ÌÌ8\\@PŠ<eþ)‹3·ËO†cÎ˜§Œâkê/dQ±ƒA.àÌ3\r’ªQŒè*ò*\rèÔr7(ÚùD\\Ã˜æ3XìhÝ…Œ¼‘Z‹XA±T’ Ý[4`N™§[š’1êº¾³kšö¢è;ÈìÛC½ŽÖÒˆb˜¤#2ãx×…ÁŒÖ2ïH³¦Â×£ÆšRª);Ø”\nŒXÜ5§Ã2Îì¸a\0‚2lËöº×<—% ±R\$Œ AòŽŠ6.l×6Ïš´ÀõŽJ2k¨èËîƒvÁ¼ÉBUQã„S¤*‹ãñ½¤‡^ÈÒD•&IÒ€ï)u’¨å+ŽRÌ¶àKÓÅ2dóDv:wór€N3Ÿÿ‹le4ü&žýÞ\n_5îl82ÒšKŠŠ¥6„QLBP`_ä^¥¼ß‚ºäH«ˆš‚\0 ë<p(¾\0PPI\" \$‰À’cDJHn7ë4æ¿ó\"L™2¤†ã@RÊjÃ&dÔ”8k^;÷\r+Ã¢XK‰ƒg\r§ñGÁø”a!)%8áŸõÌMbd&:Ç`µ«—–vAz\"ƒrC:çr&€€‡gC1ƒ&­Ö¨ó¾ŽØ;|Ð=c*èj¥-0˜'…0¨c\nDÕDâŒ‹àò¬ZE¹'öì	)ÎKV—r³Li(gì\0æ’<H	’î9“rdÉF\n¥62Ä¸ \$Qä9\"\"†YÃ)iyÎ-€£\\L¥b6	á8P T *m‚\0ˆB`EœLQU*Ã|Q8PA3ÁŸTLŒ—‚ò	åg)@ÉÎ)\ræ¨ŽP#TQÃº6“a¶šxœÑI4F\$ ÿ±ÔbOŒYª?’ 28;P½š«a'è±Óda½¸£Ô4‚²	Šj`ùžó8ˆa>DP°&÷\"`Ã¨g\ršB§ãÊÊF‘‘\$ÄÞ¤Ü)+iTÍƒb½B¡¢¦¤éX!PàÚ)\n~3¨´\"Qâôœ\rdié Ðà‰Ù!R*L+•\$ªÊ˜¬ë<–(aO?!L‚‡%Í^I•VŒ)º²m4& š•à´-û?•2¨Œ(#„t+£œŠÚ¯—ŒååPiITù„Slò/eï-˜§bü¥ T!\$ü_«±>h&ø¦@ÈH(r0vß4C	/@ÁEFHL…AFç5ÛA!	á-®ªK²Hšb‰€&îë½_ocŽòÝƒ	p¯J¤€´øÈÿîûh%\n’ßµü|¯.º÷6àl	pK*¾¥B›vO™D'r[¢Ü4@°á¿÷»°x*PæY¼D@(+†PÅŠ¬¾©áIe’BŠjÈpƒÏ8¿\\µa1Øl»×(³Ÿ0†‹9egY—bðLKhI3¤ÀÅ“ê6ó—!È¤H°˜£¯¤AP9o)¿¼«˜q»/ÕÐ,½•ƒ-£ÇâX…1›óA1QÔ‚¼“ŒÏ•Ø'Î¹ôÇOBÀsRª¼WË\0¦Ö˜þqhòo!sÈ¿—‡†¨F•ªåóL›7;Ñ=1X‡Ì½×Ã-FH€Xyï:êRžqøŠ¬6¼àPEÎiß%»CQV@³þqËÎkêKž4žù×c1ýƒ\"#r\0Ù”“geýUc)7d;#aI‰vÓÛ›CAFp¶¶ÝÕeú8•j•²UÜo9~\"k}nª…7ç6\0¥jàîÏÞ‘+{“ûìao@f½YÖÓ#57žÞ\rô†Y\0Ï4Ã+QàYëvq^Åì—â;G6.¹É¡}¨5€NÝjœ±MÕ€ƒÏI1(!øk²Áš\r[c°!ãóBãÊÊl×U—	È\$MØ³!+œÄõ¡©ŸÇøÁe«=!™1GDtlw-ÖˆÚº©.#ºÞå0®ÊÑÞ'	Geí›§r[MÛIÔ‡keV¿™wM‡ÛîG|ìûc:ÚçïÈ÷+	RÁ—¾[6/ã¾8A%ä\"šÎ÷{§&ô«Ç!á™’ˆM>ÿÞ<¿q.(J=½Ø—´RS¼¸ß\$¤ü’,µè½¡‘¥’qp1^ííVf›ñÌÇÝ.`È¢ª‚\r!/;œ¬PËoú‡íÞ}Qì|JÆúÞ¯8H[}¡}ûüógÔ+Â¯ú[}Ð~¯±Ý¿Œ>ÚËß1›eM›ý~AÙ£êão¾tüQïÞÚBPöƒàÿ+nþ¦c+,D`¨%£NðÃ`Döú€ª7Õ‚Q/þô¯dÎ :ãÀE¯^7ä\$•p*“`ìqCNTŠs®\"\rbL\"è,ÁpbjÍN7\rìÎ¬–;k¨lB2.\"Ú	pkl¦ìíø½eHS€Ú£xÝP›à\r€VfŠ`Öè¢FÑÂ0iÄæ\r Ìj\"ð=\"pçÈ\$èIº\n€Œ p)Å™cšÀnâ\"Z¸ðn¼ËîËÊ4Û°ò„Œê\"lÜ3t¬NŒ4J.ðÊù Ø›#æ6¢óÂœ.âš´0º3\n†¢‘ŠtXcf%	ä:1**”—\n†fåÐ8…¼UB \"Q¬ì.püÕ-ºPå™\0Ñkpþ‘\n1­«QnÏ#\\x¬ùŽfÐ¦î{\nQ~yÎ&@Š¹jhå*æ¦§–°Ê†êPˆ«FTÑP×À@	‰ò[M\\è‘Ì×%µ€Œ /B¾ê`+À%éÈŸ„¨'e(-€ó@†<¸ù'¬xË(öÄ\0 ÐÂƒÎxæêR4àš¡©ØÊûOÎj£Pc/Ž\"å()¢Ôµã/K¨ ZG\"Lâ\"ú6T’E\$€Ùp‘N*@";break;case"ar":$f="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0Se\\¶\r…ŒbÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬†Aòéj_1CÐM…«e€¢S™\ng@ŸOgë¨ô’XÙDMë)˜°0Œ†cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}‰ÎÑ*zªU@¦ŠX;ai1l(nóÕòýÃ[Óy™dÞu'c(€ÜoF“±¤Øe3™Nb¦ êp2NšS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.•[¶Q`u	!Š­Jyµˆ&2¶(gTÍÔSÑšMÆxì5g5¸K®K¦Â¦àØ÷á—0Ê‡Æ¢¶§\nS ü›r\$ ®êjÄ(î¢v†°Ì¶!Jbž¸¡‰q««0\n¸šj\nÙˆé­¥jƒù@Åzšl<\$W¿ÈrØ“£åsœñ§Ì†U&…[Í*¯³lƒêŽ (B&÷¾ÆÉè4_!ÄÀËd\\B¾ñ=Èt[¢	ãë?‰:²X£ªØ¢eJ	\$£éÚ\n&Œ3Þœ:îšã•ÊÃ±?+T\n‰Ð¬§	JÓ\0x0´#Ê3¡Ð:ƒ€æáxïQ…ÃÈ6½C(ä\rãÎŒ£u`<7cpæ4õD¦ÂHÚ85ãmb:xÂ)m„Þã#hÛm(¦(‰ƒKv§¤%‰°[G’B«=2m[Ž£“j©Q%º±uqÛsìdÄÐJCD©SZªÉ»¬‰\"Öt #÷ö–«1¤±^OÚ|ëW‘e‚/ÈJ]9J¨ð\"Rãê6\0ì0ƒ¨ÊûÀËÜò’F±r²¸ÞIÂZ—)¥Ö›kR<ñ‘Jº#=^VÖU\$O²°Y<Ð^[ßbZÆ¥-ým< P£„×£cÂ7L)DœÚbbÔ‡©£Œía®²…ã¤ÖêO\nö„í·vß2@¦Áo¿1lkÀÈ¦6þ[½»ï…­q–çAî·øê1…¿£Ü;‡ª`uùwe†Ã½#¼+ûGN,†å;[ÓÎqCo\rÀmüh9ƒ`Ï4\r,\rã0Ì6U,+ñDït\r7&àP¨7µn¾<„­l:Œcd9ŒØø@6\rã;Ô9… åê#8Âõ`KgUpêÝ…˜R§¤èidb˜¤ˆ!T#ä”¢AZ“a\r[H-£Þ\\Vê#bÄ5¦´ÚÜÑ‹Ë(Æœäþ½ìC©ÜÆ—ÒÙÞq¢\rÁ¬Ù†eZõU¹ëSªäùC¹Vá‘U&¥Tº™)€ˆErnPgX«§º2ö!ÈJÝ'É(\rUÄ3Œ[d¸ADbÓÇP\$ ¨ÅðLÂhafì9˜ÔÃº­YÁ”<\0Ò¥ƒ\$‡á¡K)…4§ò TJ‘S?T«r°VQÑZ«urÕØsWªý`¬8–²\n` Ya¡f¬ù4CY¥ZÆ¥U= Ü°ÖÁu\"T”ŸµcRÒŠE”.‰ðª’T2‡JÛ\nr¤9®R„	@çìÁ×Y\0Š´¿+L\$ú“0†®e8c‘&O£Xk€eYÁÁV‡CfoÍ0od,‘ðyÄSÜ‹¯[±™GKÈAâƒ&Â¤™±v*a¡1[bd(ê7)vu1C(¥ù´¦£ D½+H5A’y[I3	\$h<™ð@JÎ4ì…h†åœogB–,š5‚\0Ìƒxm†pÖSÆÓz¬A\0c|DÚãfHeŸ¤5‡(h)B€O\naP…‘ê¶a€&4E)¦5Ö^Ò›(„›3)•QflÆ!ç>ª§vŽåÓ«p139d¸Æv\\»œ @(€ ghó^\rÏU`õL b\r!œ6Z]8iR*IŸj¿œ¯µÒúbFÕQ¤Ug´ã¡Bª+bñZ!\rÕ#(5ÎÅˆø¨A<'\0ª A\nÕÚÐˆB`E¶i†¨60mâcv\$:h'¨ÓEpeuÈåb€J]e¦EEØƒ¥&ßCbù.(šë;°~	AŠEgÁ):¤tJñnôâÏˆ\r5Z*c&ÂÀ—Ýf^Œ–íê\\(]¾®váy«Kt[î½Àó x¯*s¼ð‘×^·R‘+c”jxÌË‚ÝDœ™6Pv”—ƒÞ“´™Uµ}E–üIH‚;¸Y£ÀA]lqL¾1†®õ=ÚëDdç;W@ÎHsB]DÒ©#ÃHzdó]_¿6NÃ)¯›S‰µ\"Pâ]˜·žËö|”QceŠx™)gÐÊÉ¢Ù^+ù—‹†)=Ì]°¾gœ®Ÿt(b(\"áÞW¥Í¹ðX–’“2Mm	8´lhê4†î„—R¹ÄîèM.‰£œ]yi	±”Àè›ëœˆÔ¢‘óé‡“ÌeX„4£ ÎOå`?ŽMÑ¸<™L2gLÈ*†+UA¤ÙXHÈÙ·œŽâw¤Ä‡*ÜQ­Ìõ<sôØÓï\0¼0B{ÛýÆ/iŒ½¢rR{Å„ÚËè¼ÇË¶œuPhÇp/Û†\nü2eå‹!Ö*A™zm!dø¹n[ÂGÅ„Ü—T@•]ÓµP#A-\$’	‰¨.0LÊînº¸ŽØ˜ÛÃ‹/èO8÷KUT2`Èæ(¢èdŸgþdJ J¬W´þò¨!*„2é4\$7&PÎ&K¦\"áãjná)áîÅ\r#”Ðß«‡QÖf\\6YvbŒå‚\0d &óÚ.–ð”7±B9q'½´ç<m<¾dþß/²IÂ£øîåÈý´þÿŒõÔKwÂÀQcà]ôCgQ{Ñ~›rõ.^TÂxkâ“§ó¨Þ¯oD¾n6]úë~›»t1m-‚Ù\"±ºa2J`?³…\r1BKï½uC÷•­ÌúO_ð¯®õ‰OåqÎíþvð÷T¬¢œßœQ­¿a €\\uð\nQ®;Óû­ù+ÿ‚°Àw¯…E@HRósOÈd§k:ã¯Ar¿HSÈyþØn,ÀL¿o.^i_\0Ò½/×\0œïo&¸l²ÿ§ôù0\nðO ?,@iˆ0æªùÈ\$—/àpƒ¨ÕCÇÊÞ%ºÞŒNí\$ÔßäÄ(òÆkÆ´È8íÎÔÑGZò0oO4C/b„ðV´PzóÐ&t°omÕ°xOž»\"#þÏI|@Lø1²#âú¼èF,]#ÄÎ,8áfiÄP|¢«°¾‹#N„ \rž‹£øúI|á­©\nP,üGpnÊÄ¸h_Oê!p¸IÆÄÂ÷Üa	¦¼îƒ	lF0žÑ…ó‚×ÎÏÍ\0P-Ò†æûD'ï2ñ‚ÚÏ±L\\\$ÀÐ”·ÑN‰°“ŒÔÐhL°tËÄp}\0Ï ÕÑy	]‰õg¦ëÎÀÀ§I‘”È¤]b&ì‡Dº¨ j¤Ò_&Ö9ñ­ä((œìð>ü\"ï‚ƒÃ®Ñ{»±š<PJ+mWQ;ãß1îóM@/§82Q«qå0clAQüÀë¸ú¯˜%Ù[¤H¼c:’'\"môùÐ~Î…#-óñK\"’HHÏý’A °ÊÐÃ¤Q\"Ð(CNú²E&bU Ï@ú’s%oÌÑ¦Œñ×\$eÒä½&^(2ŒCïž:r–˜QgRžõ„|oÞ\"l\"X™DXé’‡&Æù+¤¿)ˆMRÄ!ˆ8ÿBªaQÜË8à.b1ª>rL%!#Ã#È­ñÈ1† ¹ñÄâ‰úÃÄ\nÛÎ´o†da‘«/í(Í\$ïhÅùÃÿ,)3@†€ä\r€V§@Ò`Öx\nöR†Fd£xz%š\r Ìz…¬&`Œ±\0ÚªZID¯`ª\n€Œ pb‡*@=o!,0/ÍàÞ¦¨#¦\n0âFí+ú®/BÍ¤J	³W5¬Òlf0\\R;Ð8Úâ{£ Ó`@RšN)¢ÊÁM˜?’6(¢RŸdjƒ*\$>À˜¯ÇàU£J7#‚åsð‰\$LµüþÆ~æ’'+Êoï¬ôÑòòÎ8ºª³:\"AÏÈ1¬?BLŒè\"/(BhÎyÆ¶Ø£D4€A6Êp\ràà›ePÌ‰nót<ž£¸ ¬P+1l`fpÚt0_X!¯T\"h¹2¨†üráT)ô!±ÔZ¼hNqñtªæxíÂ@¬ Æ ê\r¥ä&ÄC4¶•DJ8âlj\r@:C m4'4 oc'ÊæÿoÜƒ,P»t×L3Äk\"lwL1NrÖgFzêè¢?‘”F€	\0t	 š@¦\n`";break;case"bg":$f="ÐP´\r›EÑ@4°!Awh Z(&‚Ô~\n‹†faÌÐNÅ`Ñ‚þDˆ…4ÐÕü\"Ð]4\r;Ae2”­a°µ€¢„œ.aÂèúrpº’@×“ˆ|.W.X4òå«FPµ”Ìâ“Ø\$ªhRàsÉÜÊ}@¨Ð—pÙÐ”æB¢4”sE²Î¢7fŠ&EŠ, Ói•X\nFC1 Ôl7còØMEo)_G×ÒèÎ_<‡GÓ­}†Íœ,kë†ŠqPX”}F³+9¤¬7i†£Zè´šiíQ¡³_a·–—ZŠË*¨n^¹ÉÕS¦Ü9¾ÿ£YŸVÚ¨~³]ÐX\\Ró‰6±õÔ}±jâ}	¬lê4v±ø=ˆè†3	´\0ù@D|ÜÂ¤‰³[€’ª’^]#ðs.Õ3dŠ¯m XúÂÉ3’‡²îé \\µ	Òá¦.L\\ÍOºp©¥\r²À…¿ÍBz·.+šÒ¯«‰ºªš¯H’î¿*¬¶A·Îb^Ë¹23r—¹¢J•BÃÇ\"ŠÃÊ”ðLˆ’‰”|ú§Éªf÷šJnäµ‰¬x¢¸Å²d’k’¥ª¤8Ò#èç%5¨Å®%\n¾!,ïü¹AKÍSY0´4¬Ô„ÄóÙ HÆë3Žœ!s¹ I\$*¼Z@òÚ£@B\r,U	‡ƒ@4C(Ì„C@è:˜t…ã½”# Ú4Ã(ä\rãÎŒ£u°<–Èæ4öÐD·ÂHÚ8\rƒ(ÛlŽà^0‡ÁÜ]c Ð7Œ\0è7„¨æ2„˜¢&\r6êãK9)‹-	;ë%NïUEºÁ©Ê£äú]?¸xv²ìòüã8ÛvÒãÍ;Äò@O;D¯Kb¾¬PyŒ_2úÒ‰!.rÕgjÚ>MD\nòy+ u¡¢OñÜ|„#äƒ¶Ši®„êÌ'Ò„ŒÕ¦‰ÅnŠÑú¤VÌ/q¬¶•ìî;§\rÀM¼'Oa5.¾à®Lþ%åÅE0ŠD “)Û*>QR	\"±·´\$Ò©ãgº 0ëjéñ[W´‹êT¶/Îa°À¤0BÁIÉººc[âš•'ÐV”ÇNô\\²GÒûËD½\0V&!±‹ˆ”¿Lš½ÙÅ5G@ëKovKPdï¥ BÊãô”ÕX× ^cµ7p‰UÙ¤Õ¡ \rã/ëîk+‹ð,}ð¸ŸRê:Ó^ìQT«¦îÃ-4LBš&‘ÿˆù[ãçkÏ)Û²£R×s:z¤5ëª—òÄŸƒîm/!†Ø“H:-”ï™²€CÒ½.(iËœ–”öLGnÀÓ£<Ú#AD˜ª’„xCNIó\"‡Ú	µ]‘^ˆE’ÂŽìY™Ç^Lä±\"òVÁp	IyÙ²6±\rJô7/0é-Ã×iiµ:ª˜ÁDsb\n`‰‰†'¸¡…¤S!±T^’8†”ŠÂ*<ªÃ“ärOÙ1Ý/¯ºˆâhˆk\$¦ñ×¨¿“2¨¶&“ô¸B^âPD\"<¨DPv“œ+BÒ\ræC–¨[Ì\$æ`¢@ÐCpk`€3-Uú·Ãpgg-¤ˆÃá[á‘ir®Õê¿\\aÌàÈ¸CtZw/â@Rj”…nX9e8La@;hÒoŠœtRèT§Äˆa	ãö\$ÄÍèB‰ÜH’Då8.A›2y\$&z¼WËa,EŒ²PwY“h­5ªµÖÊÛ[¡¹o®_4Áò\rBÆ¨ªŸ„[7WŠó4ÒZ\$F·¬iÄ{ê“P-M÷þ“ŒÛ(+,W¶¨ßÓ\n~Ï|¿·“Ã\0\r)ª;°QS£nTé1W§gçzžU›l3ul¼¼\$f^I³Š@h'£½MIÐP	Aj°Žœ<â\0 ·’ó@¡“W)Å!®¢æÔÁ_Kð8 ÒƒJéá•|‡ª%Øi—a¸7‡@@C`l\ráÞÆH\n–#;gK¥M(ÔBì\$v…Ä£²’ðÝyþ~l˜\\ÄåC%Šâ.2…ÕU‡\$FDó´Áµ·v’\"j@j&öB4œ‹¤Í»jÆ¬ðªXˆýU±½+–ì¬y‡E&=.5	ÌªIÓÄeÏ³erŒ´Â¿Ó/t”l?\$—lãEØfÚ\n\\6†–©\\B¬á”–Fi}ñÆ#•Ðº—°\\rE™ƒºFQ›ç4z*ep€q\r(¡ó’ž°L¾„&®¦¢kZl7.§9€°2Î]Y48×x#JÙjU4b%å.¹97<‘£±¬ŠH¨0s|¡1oW1S£¤«vžz·lr£&z˜%íÍþ¨å“yÉŸ/‘eç¥>Îš´PJMQ'Ûni‹¢ÒLþ¿”ÒvóÝ¯®(›9\"r‹âI·ŽS(nU4\r+„¤¬ª{† ôIÏrùp[Êò©ØsôTØ \\HÂñC÷‚ÑX¹•]ˆßi\"UÙŒ×Þä¾‡rþš¥ìB¾gï£4Ê¥Öoã%¨eßÓ±:JDÎ—mqn©½ÂJrí*HÐàt¼¥Ý3» ‚µVÆ×[Î2<:%¹Áº2F\"mµ£+•N½¯¹†s;,Àî@Æ‡Ors}TNˆ¨²ÃÌþstQŠŠbrI…t¢<nSH¦¥]¥	ÒôÓ¾Ì\nz\0ÀD)2û«™²Ü»öpG‰¹¶®QÊIòr°éÌ,jwq! )°o*z-8•ç¨`©Ö{Øeƒ\$eB„Lõ%ÎÜû<ôåhÌé\"RŒ#g=Öw)™ÐaNp°9DÓÙ¹r“çìŠÚ˜¾µo›²q:mi¯u³èÐ¹KœnØ˜€PA\nP „0ˆuZA¤2Ë°Â¯A”²ÁÌ:‡–èd.\"Nò’†;¯Ù¨M	Ÿ\0^Â6?,õ|œgŠ4Žõóu7ŽÉ7\\NJÊ#ó¾šr¿TVöc‹>¡5y§ÇëŸ®+ôž{/J—’ÊFŠsÛsïôíT~90çò{®©®Œ”öˆåú«ê¾ÙõÿÂúO3¾¯J\n+Ÿ‹áÕ©U{þ×ä«c@Mã´ÁÓþCŸÀY^í5Ýp4âÐlavÿŠ„&¦æ5š8°-Oôö£R½jâÂâÂð/lØÈ…(bP.¬‰\n“Ä†-màáBZüj´a°\0Æ>fÜ¦Ã8Å/*èÉ\$ƒ‡Ò¾cM0\\ª#z­>¦L;LÂ+£ü½Æº=ÍvÎ¸sË\\ˆp Ëç@BjÉH‹Æj©ÈÀ‹|ã® \"bâB°¤iÐª¤®é‰PGp¶àP¼ JTÔ©HÔéþ{€+#j.-øwKØÃ¬*î†À§.ÕƒÒäpèßðíð¦m’ûkÚt(wcÎ~Ñ¹Îâ'ªjDÌÇpenJÊÂ’„Œ\nl\"¼(GIÈˆDËl§ÅJ´°V8 ˆ@Þ\r°\"á 6&,*8Ôë‘bÁ®b¥oðT±dTF\$lQ<K‘@¢.`Ô0ÔríQ¯ä.#ti,¾Î1Œ¾mîT,Ä,ÀPmO^OLâ\0RË§@Óï¿\n­8~if·CŒÒMV÷ðúTmt~ÑËðXKÂ”iÆ´yQÛGë‡”‡ñäI1*1\" â?QØÄMyÈÍ¶†jã¨0Õ1ðòì‘Ö=	¾rðõò)Ä,zòò##eM²+Ð¦†qÚ†…»ÑÝ!n‡%¢¼ÄÎcnÎ¬nÒŒôH¤;ïš÷àOvT’d¦rhÃòTèc65Ãò\$c+'¯M«æ¼On+­Xú(¶è‚ 5V+’M\"±Õ(q†°è²¿!PÂÊjWÒVÈòºÉ2ì„'ï\$1Úi‚¿íBdæ„.MŽÎÆ%08j”Ón*TÌ‚6Mq¢lŸæ’Df&©#|ÄDH9äI®PËç…äx‰²Õ.jM†2èØ7†·\$(ˆÓŒŒKÒÐßq²g4D.çG¸Ê§LÏ¢ès3†‹ì¬¤N<K\"‘	-¯ˆýâ»8’Á8Î±,otäû8²e#È PÈor>gm\$,ä&H¾¦§WÕsžáÒÉS´í“Ê•òé8òS22íhå=èi,3­.ëï5²P{¬â£y=ÇAS·7næ{ô>ç@¿æº*,Âhc¦#rpÐrV)öBÐfAHð¥Ã¶Rj°ÒŽÍ)ÎÑ.3©-qÓ=Pù?Òš6R¡.rÃ>RTGEÒw’:IT”hdÓnå\0nÈ?¥	+nVe1—'4_84\r:è:éá	HFñ3ÅIÏÿI4I'B¡äëâ¶ì±…:lž:ÄlƒG=\"g\"ä|§ƒ7C“LkMLÄ!#“«GT/ÜàôâÂÍÛN…NÔQ!ªã!ôXçg¼TÊoLTý>€ôšÖôQTÃ8”åOõì1Ÿ4³â‡‚]:ÇËA9´ï 4x…Sm@˜KµJÕ&HµXèìH+®•T•\"P÷T'é¥DóÑGÔgUd%î’”²é?rA;4Q8¬´ê*KUµ%;£ÀêhjWE'!AsÈt¨ËMÖÁ,W<ñçWÙ(†2î¥3\\IG\\’O••[îí]ƒI]ÒëGr.!J–gj!NUIRv#ð(Ú¢	*\rë&(\"Šú¤&ó±Ø¤F.°q¢H÷OÍaò*®\ru¾¢øAR².&‰3Ê³Ö	¦®F-b„Ë–L­fÕìûò®ùâ´‹6_ÇLTÒƒ+ ¯ˆ@\r€V/£¦&-f-œlu2GÈ’:Ó-^´d®*ÐH,`eJKê—S„’\0ª\n€Œ p‘ˆ\\«,žaBˆöo‘fqêÇ°”mÖpøó,zýgü“ì|yR´â(ÉSÈ|†„L»T5Uëªä‘•S7yAÜþÔÞ6 *k]Hƒÿ8FÒEEˆèW%HiÄJ])•˜Ëí8E²2ËJÎw‡Mó¦päO-EË¶ÿFºEÍ9uä¼OKTnFŠ!{'Î¼.´¾ì0æßÅë4©ZÕ±pËÙy8Õ\rKW×H‰å0ØÉUoPå6-ÿzQ•,TUh7°ä·É{¨‚6¬àBÕú¿·Ópé0õ³ÀÉµwD¯‡¥6•×èE¥…8ƒN±»t‘úÁ)ìÍîY³3GŽaIƒÏÊ)Èös*qK’tô¤T&“d¤ÎbZÃˆª½ ¹c@•˜Hmí9B\\ëfàë-õ8(Yyw&ÌÑGRîfb§Ã3ÓšamvÔnÐcÞÆ–‰X_[Õ+O©S…r\r*Mòq\0Ø˜T=Y0\"Õ´#ã€";break;case"bn":$f="àS)\nt]\0_ˆ 	XD)L¨„@Ð4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ÐP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïðør¦ª)—öªå²QŒÁWð²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãÞ7ôâÉ¼ê 4NÆQ¸Þ 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk”Åü©,qŸÁî«@á­‹œ(n+LÝ9ˆx£¡ÎkŠIÁÐ2ÁL\0I¡Î#VÜ¦ì#`¬æ¬ž‡B›Ä4Ã:žÐ ª,X‘¶í2À§§Î,(_)ìã7*¬è¶n¢\rÁ%3l¥ÃM”|¨ \r²öã¢m¢ä‡KÑKp€LKÂúÙC	‹€S.ëIL•FsÔW9ÊSÁ°³“TŒJzÜDÈËdz¾6­ò[Àí\$ßK‘û¬ŒÓl÷CÔT»ODu;t§««tÖIÑTÒˆJ©î}F¶ ñC\rYÔËÄNÝÍ5,áaR‹nWF3ò‰,ÏÔ²L-õÕ?Ö+Å –­ŠpSÍv”ÞP©å\nÙrÃ”a8§Ää½TAÓyJªÜ’xÞ`Px0¼Ê3¡Ð:ƒ€æáxï‡…ÃÈ6Éƒ(ä\rãÎŒ£v8<?Cpæ4øðD¹ÂHÚ8=Ãn::xÂ./–\\þ\rã#æúŽo ¦(‰ƒKõXw½FÄØQë\nÜ¯»i@G¤ZŸyÅlãQ\$_,#M[7¸‹ÄD¥Ð¾¢§ÎKssdQ\\?p8»KZGêöŸUÙ]óUÙ¬2çPã‹[!/U»VvÜÀåÌÉCØE`UIíìÞOuë¥×1”7ºôTðµúÃ\n«Öb&0Ž£`èÃØ:Œ»¦’©­šué*8°<ë3qe?ÊÑ‹Á?Ñ6‚¼A¨D°Ê7|R½¯Ò.ï¾Þî-khÓ>Òa2t	ÙL¡|.)qz•´ÍÌ*£ã ‰DÍäÂˆÑ}¾M‘En@ŒëCaó@'¸0Â’K@©¸˜¯•~©Å8€4fÍ¬£”òP‘\0B4S.£Š»Én.·ŠfÂüNË›P!å¼„²áDs\0š¶s‚›É¬,Dùù¡„‚Ôù2]e°ÎB\"×ÃË5ÐŠd²Û\rº¾-ÏC,0XZRq)é¢¬¸®ý‹’Q¬ÞCÇéÓL6ƒ±âÄT\n“L:9dE—‰W£®@(îðÂÀ\0oÁ˜61Vˆ¿1,Ë`O€ ¨Ï8m€áäVDCc>!Ì3:Ð@xgIÌ0å%g)0JÇ n§è0RÑ\nÛ™‡¢œ0¦‚2zÆ´·šY£%n	?BâðÕ‘xàPr\"EHÆ¾ˆox‘ö(Ó·#n\rgÈ31™*ÈÒh ,MŠ‡)JÙ+#ŒX/öÀØ)r@ø22Sò“;1fmÁ–äê^ª3!Æ€·?ÄBCˆšŒå\\¨ÂŒ^å)\0‘M2…ñLÕ&+f iFcàšC™úG¢”0îÆYÐeÀ4° È§«\0\r	‚0fÂ˜cbJX±f0Æ˜ã¦L…‘²P^ÉÃ›)elµ—Ð&hÙ¸hg,îXÖyèbÒH72úmÝú­Cì¼£bkü¤I²8*\"—Í’ƒ:M^.GÞmÊUjí“¾¦€H\nª;=•YS;ùYsvÀ˜\0P\\LÎFä\rr¢Õðüé‹)Á\r’ÖPÆ(\\='¬öžðÊÎƒƒ‡ÈÿPÞëÝ” ö½¢ä¢Ûa:Ë\\p‚;.¥.JêQ4…Xù°’±…&vD›XíG3¨YeªïåË˜»q2eD¨@•1S€\\ŠGz/#ã\\\ndª²²×k¥2.œ†ÞjI4ŠpI#áäï\0ÈYÑæuìô73£ùmXqv”¤`äÃlê•–•ŸÆ: g§ÌþŸ á*C+DTID 8(</,@O\naP‡AçŒUodkƒðî¹ô&F\rI°¤Hfö²Óª)Ed5EÍA¬ŽÆFƒ:3]\n}ÚÈmJ>â%Y`ob@€ ÒÁ?	˜VÖ»\0ÒÀ0T±p–Wl¥k¯ÂØ`1cÆÅË³ô¤)º	(¬Xf!:»È£ˆº”dÑE…¤“L+êpìh—Ö‘ÅX+\"âu¹a2ßkö;?g5£#¿TL°¤ww\"Û‚›ˆõ°¶j‚ºa\\À°nD¡Þtà½µîÉrèÌ§Ë“ˆTu·Ñ—8¢ñ–ÊƒÚ©ª\"EHãå½ózd(È+E5½J8Øã¬ob‹HŽ®àâ»¬¶ºcf×Þ-×V\$\r>¤ö<S!Îac†æ‰Q95*&áÃu#wñÛækA÷ä™¬¥Nö&ÅÝH»_Ôe•›:sT•gîC®mœ(älù'Â1´iH£ÍQt?¤¨øT`¶qú7e³£Dü/p>4’CÓµ´Œ®Y»P¦Ou§µï(Ñ~d¡¬AÒäÎK½w\nßV\0Tž•fùÒYÑì¡ß‰¬›WB^¨‹ìGƒÃv?tH~ú>9®Ü)ZäG%ád›Ò_F0–à·(çÖÆƒsñ£¤MjÕá¯ZR\\Ú©¨ÅÀ2jšHZÑîÃGèÔ¸vF-›ª4,tBÊ|ÕqFa(éˆÉ6kÇ~žÔŒ®‰ß\\r†3Ó¢&¿Þ6ÚåZÚáln@÷ìÞá*@‚Â@ ÂLX4ŸÉ 0Q >ÖÄ9ªoa¹V Œí×«í52æ÷b•à¼8«¨Eû…püÂµþð¯h÷%Ìòƒ„ðPné¸6î¬ãOöWCtyÊZ‡¹Î\\ÂÜêÌ\0(ý0Œîþ„ÄBjðÝaîP à\$o…©»\0°@n/0y)š|K sëŽ‹êÊ‚\$i1ŒÔpu„õ\0cª,äOh‹ãˆ×ðDý0.(ïôÍ(pïÖîíÂ@°”'­ºØÏ~›¡¤ ¬ñbˆñ°jP h&(uì.âBw‡ýêënxƒ­phÊÑÂô,+¦V&òWkâdT®fË0`Ý¯øŽÐV[†Œ-Éˆ)ë†6ãså¦ôPìPÂT.PûæÚiÎ\nkfêRfìMc±\rÌJaMm6³ÑLÊ\"J#&¹BØ G@ùîp÷ËÜkBðF¼N\\÷E–/VÞä\n&¦Ûp8Å»XÆôMq2†JFÜFìêÍÊ-ÍÏÐ½mÚöñ®pFûAþ\r6ë@ó*è¾P-\rÈUå…æùFìøðºYd†9ÐÚ5qP_®€î+¡Ž«Ã5wp¦ÝŽáhËfð1¦ˆã\"é\"R\"ðŒÈ}J)oâPiºöä¬äPÕOˆMäŽY\rnÒ§xº\$âÜG´@ˆÂààf¢5(íMnåH£®J8£&÷*‰n(qEÖR€ø¢0wíM\r<ì%cŽŒ†îôîÒ´0222òOÎŠî¡‡P5h9Å€\0PË¢0­\\KàRvÅ¼ß\"ßEÝ!R:êò£Ò#’Ï/ß/ÈE*£L¢ÔR4BÒ50²Í³ÚÎbHÑxú(Ñ)\$Ó,ˆRû3\"ß,0i,s=\$²#ÍŽ0¨r}S\0ÜŽo!Ò6¢²\"›ïRŽ3`ßQ2mÐÝSnìSs5ò r-\r“QÓ~EQÇ5‘œ)ä{ÒdBæÛ51ÅM)ÐNÿ²ç‡Æ³+çMºXPs0ÑD1:PÛ:³•:óo;-¹ñ“»+óÁ“ÄÞÉ5S›7 SpjúB¿!m0g!6³A Óþ°«\0ŽJlÄl’I=Ó8Tä43p=7Ô)0èn‹\nüUCrE;)¯:Ò3¨X\\¯¢ÚÆ­óD°îB{\"ð&±têäÄˆª3>%Ì0«ÒVÔS2¼|Ž¯E‘TˆòºÑDb@ Éç,â¨;EÍ#˜Ùâˆ±ÅMthP£mâPbÏIÏLúG%DÔ&ò?¡e)ˆš†-–çí3.+ºôšÖèžZóM#%C’	?´-Oi61½6s	?IPf»CRGPÍAUkÓyQòÈJï„°‹PÒë45sü-Ï‡J4Øx)±OÈw:ÕQeTU4MëAS9BuW85[CSnùTðOõ.õò‰Õ^R5G³:ôâŸ¯w\rCŠÈ%†íþy1t¯W¿Y¨dÝpÝ3˜ùÍrôd‹¤(ôÐÜ÷rœjä¡01¿Q4;43Ó\\ç¯S‘WÕUR3Y:5àxeCrÉSõL‚ØwÆ¯8ô#U5‘<'’*%‘&M[e¹`“O^–Iï_†¯_u,ó51?#aÕŠ_KÍXšÔ©µFr&Üjà¼´@“SÓ)[LQulÝ«ÜnÖZÕ6C>Uë6Ô*¸ç,J6vÔûW¶Ag8ƒg†²CWhÕw/ v5Xsh‹ãjRD:ñ¨„ÝFT]U@ö—9•XÝ¶À%¶{vf–mi´ÓF(]N+ê†v¾rvC@U~óï8ÉÒ]3dë[_ÖÓoÈ^¾½TÖ¨;5i^Óüówó·cqó+AW\$‰·\0º¶§\"ö‘6¯q9J×-dVúï1UÕsV–[ö_l—	6“?T,Rç»vV!UE=µknE\rvLúùgô5‡É¥–æµß>2djkÈýOp‹O83ÍþÓµa £.Nøq³îöâ”ñ5Kyp)°«{v9{£nÁHwÆ÷¨5WUûvõþÝ¨»mn*+®+âÂMa.'Qí&WëV\rî•÷ÙÎU-– Ry0˜,•6à`è@ØlB\r Æ\ri\rÌÈvdvŠ¸\r¦r\r Ì’†„. ŒÍ Ú¬(JÁ„€ª\n€Œ p:žI¢ë—¡;v½>¢¿|B-È¬6rƒs’;w×ˆ¤\nÿã>Ø–|H¾­wÏx!BÒRèMä¾«°ÞÒ5FãÇ×êÕ.Ç…x[\rT!‹ƒYŽyFÈ‹bO'\nn¢1NM€rÎHÖÎOsõæ‡o\\Á2Wl¬÷\$ÃJÖ¯BÃ0t·Ìj®YwÿbÊ%\rìÄgXTð@4bJŽ‹æB‰2O ÓYS\"tÜ!ÂŒ8±|;X¡TY%N¿í’{Ôæ[–ßi”<ÛŽƒ!%\08–Ý‹Ö—øÂºÃ·P÷k]—ƒ0à¨€o¼<#ÆlÃàÞPbŽÐh™’m”DC°ÀXU)HyjèQ\\yâ\0z1¨-Á<(’bÑmÝ3<Õkë.ã˜ùb”Ò)D+¨[‡åŸ'î)ç0hÄ¿6(»-eZ\0¬ Æ ê\r­šn…8¥zQª®âô-È7N÷Q­’ªÐp)ù^/b°¶VhóE13HŠYoK«Cz¥‡—–&{r¡µž÷G˜cO¥¶´|­Tè–á+„KZ¸5dEZpZqzŽ/`	\0@š	 t\n`¦";break;case"bs":$f="D0ˆ\r†‘Ìèe‚šLçS‘¸Ò?	EÃ34S6MÆ¨AÂt7ÁÍpˆtp@u9œ¦Ãx¸N0šŽÆV\"d7žŽÆódpÝ™ÀØˆÓLüAH¡a)Ì….€RL¦¸	ºp7Áæ£L¸X\nFC1 Ôl7AG‘„ôn7‚ç(UÂlŒ§¡ÐÂb•˜eÄ“Ñ´Ó>4‚Š¦Ó)Òy½ˆFYÁÛ\n,›Î¢A†f ¸-†“±¤Øe3™NwÓ|œáH„\r]øÅ§—Ì43®XÕÝ£w³ÏA!“D‰–6eào7ÜY>9Ž‚àqÃ\$ÑÐÝiMÆpVÅtb¨q\$«Ù¤Ö\n%Üö‡LI6xi6ˆ\r(1¦;ˆÐ@7Œ\0Âä2Ê @¦ªúB©¨óD¬¤\nâ\\**h3àþ!ÊÖ‚>ŠÃJ¼ŽJØ¨Ž¯Ê;.ˆã¼®Èjâ&²f)|0B8Ê7±ƒ¤[	›Á!\r¨¸Ê9&c”6ºpéý¸±x˜œ¨ª¢ò· *Â0ÊÂ„~ËB¢Ú5(ÍÔÏGâ42c0z\r è8aÐ^ŽóÈ\\0ŒŒ2¬9Ë˜Î¹Ô ðƒÃ˜Ò7ÁxD¦‡ÂHÚ84ì`Ü:xÂAm\\z4@bN9¡˜£  ìô¿Èè\$´¤`T¼÷1³³£Xè† Pƒ!ƒLÇ	Œí8É_X¥†Û%uèœ7²È*ü;JÁ,\n1&# kÀÔ¿[v½³hGØÙ§óÒ8Ct²ý%#ª@´kkÒ¿7â Ê3#¨Ø:µÎè0•bèÃ¨Ü5Œl;Á.´¤ÎçÖLœ|0ŒñÀÄÓ5£8ÈŽVK›˜˜®C„ø˜Ž©« #­¨pÇƒ­l£\$NE}†0ñÀ¦5²hvZ“?t›NÇ65cN‹ÔïÔx#ËèàéLÄ×åõƒaÛÓ7W¯Ò¶««¸HÊ6×¢2æÃX{È¥Æ€ë*¼Ë™‚rèâªv=<©Òr—Œ+c’¾èÕî³,îzìq¶íàPÓU°=ÿ%3,ØÂÉÀc0ÌªÉpŸÍÞÖ¨Ðò“Ñ#¨Æ1µC˜Í CxÎ¢Žabú9tøÀÂ¢¸£tÏ×ÊaJ\\'¬´lï ‚¦)ÚPÈò²í²öä¸'a\0Í³Ž©pª”Œ¯JLì´.Îám_¾9Tj(Î3ê‹#öÃE;¿„Ôgjo) ˆ‚~}™Sd¸++QB@U\"ŠLè\0„\$ ÖF]²f9'ýR!7¸K@PM@äø2`æÃ¹s@¡”<„e£ÿM‹í7§æSºyéíû'õ”……Š!E(Å¤’”lg9L)¥8SAŸT\$‚(¥È*À	Prt¥YK’ãì[Oú<vL¤CŸå\\‘é\rfmUSTÃ‰qz/„á-¥`œÃˆó¾T)j4£r¨H\nÄ·S@Ã¤!b\$h—5Uƒ~qPÑšSNjP)XAÐÕ›C@HAw%Þ÷’­EñÞ#­ÜžR\\—›{bwÄ™Ò†µéCa[¨”5HFüONpi`ž˜ @}ˆù7§yl„yH¨y3E4 RàÀ n@¦ÊO0âMS\0È”ü¿Tü‘Ëèh9À€1’È;7\r[&52¼É”ÜA€O\naQ	ÇW©Èù‚l®ö¸—)BdÌšÌÖ‹L¡p Í(7bC\rQ„v«£I3ƒ™.r³±1XŸ%\nÝ!@SÇ¼iˆA¥ !*H6˜”dÓ\0?ÏzrFä‘ÍË—P\\52‘òLHS-¡ØšB4ÈxNT(@‚( Œ´Éš6Ml0‚TA\0D¡0\"ÕŠµWr<—fÒ§ÖW\0#J\\á´«WzòÉ‹j=-¨™âíYÃƒ\rd¹ËÓµc!:Êµ\0ÎÈ¬“.–Tœ7˜.£KÈ6Ž\n¦7±?[¡TŽ%¹¹GX fÜyç®Žu¾°g´·Kselëâ5–·!R°S…ÁÎ„ÀÞë.#GŒ87Ú>EËò»dDÕ¤šð™ÁÒBa´7“S6\$„)(¦]5fúNÉ*¾ì”ÚÏX-†\"õ.¦™f(2CGBG)7…mO9.'˜ô¦ØÛ,‡\$ÖŽúxE	IwqæQ€†ÊÙ\nÅ2‰…£#€“6ËTY6ò^”S»-˜#~IAÓö¾²™%Œ#Ö:¡J‰Q«:#ÅÄã#ˆñÑÁL)Œ£5VyII´a\rœ€ ¤¼Ÿº'vFìH“›\r%ëC!ÃÜ¯‚ T!\$	¾«MT¡s\\‚±s)Ycå((Í±ü¯Và/E™0È¸L‘”:?.C˜&%¸Ž>cZãÑd²vËs?AICˆÙh.!WDimÃ´qÅ'Q¤Pœí'ŸtmÒí[ý5§)ÞŠÉ:4Pš!©53¿Ð&T€’iPØ„q2-¦HÛ­ÏMc#„¹ngmB4þ´ÖÚŽYi­›¢-z£Ñ™ËiéK«´Î×»CYíÍµ6ü 0›xÄ¤À(wºdb§Ð\"¤•‚yV»„-•Lv·©GAÄˆË›ª|’Y‡Bjâ0Ê¸:GGažL½ÕèZ_¨!WJ»\\ƒ:5ÎgAY•Fµcƒ\rÜ²Ü‰X„ƒæ|“8t¬øðþ·Û'.¯…Ð3×’\n‡«eq5w:Z›Qsr}ÁVš\nŠý“K#/~ÒÖÅ&®Ÿ‡z™…¹õŽ™Žq—&à;8N¢t4¼d!¶µ«'}©”Hú\"tJéË‘‡P¢±Úûë1“÷À€ ­Ü»¡‰ÃøEj§Ñ¦\n]n÷Æ.Rxº(–»Ve\$t§ üóQsþ­jão£è…°2Ÿƒœ¹:¡õ7¢5.êE®ë>C ¸Ì‚ù÷U÷¸#ÚôÝ¾eý÷Dñýo°Êòs—	:êÚX9e©õÞ–×ú·Me¤Q‰7Õ‡ìgí³öíáû­ßéþ­ù5Ö…Z:ûL`*‚Ëq±=¨ÝgÓïî#Oò¨¢†÷o˜ÿË ÿôÿPëíªo¦ *Ã¨a¢{Ì]»„Æ3f6>ƒŠ+I&]oáDÈ 0*¯‚àŒÏ(Ä&Z \"ÒæfŽ±\nOˆú#èÎ¼nzŒZ¶€¦Æ°\0ALYbY‚2qÎ´1¤Æjô]zË4@¯€÷\noøøP®XÍ,öÍ¾xç©hÏ\nl¤c!ˆÊ©zøú*§ã‰\n°\rÍ\rºøÃœ%Ì^Ä‰	fH&H ‚qƒ~Ë†1¤¸>Æ\"ä1.4í…lB`@Um¼1¨ÖÉÏß+f2ìžüp'Î¹Ñ9ê—§^akW°òXkŒu6ú¬–‹Põæp¨±bm‰£(W†BE‚>—DB%ç€xñ†\$ÇßŽâù=åÕô!ÆùÐÄæø\n'\rP´DC®Á\0ÑV8‘‚_J,!ÃÒDÖÇ)ª81ˆ‘‘ØÇa£œ'Ç<È0!½Æ—¬¢‡ðõñäðÊ EëD–6‚\rqß\0ÃâI’ƒŸ\0Ã÷\"CÝ	äý\"ãk±‰~1 ž+\0ôú¹CVÑD>\rÅäÚÉ2D«Û%r(¥ä0M%N‰&²\\\$ ¤ÌHErb#BZÃcc~[„ôÑ²`ZNwG,þ§:Ð– éFZ„\0†GÀØh/#,Šñ)0]	cœ|&¦¢%\0000zª`¨ÀZ\0@9ÇôïƒÆÙQ\n ¬)RÿÍÕ æÎ³\0ù³×=0í‚”È¢ŒnÔFlnÌY®l'Ã sê\$1/—	’\">dV/hÙ,în3e î(ðñ/þ]\"°±ã¸¬ƒÇ…¦å\$\0\rãÒµ6\"‰6dŠuƒZ2f´_ìšêW*P:pDm\"©\\ÃŽÎÕOX\r­hß³—8ƒNÕEÑ6Ó:kòñÏ‚¶sµ9³\n@`à>ƒ\r\$îàë³›eŒÊæ,^Ë\r7F\$ó*#'K\0äLf&f÷+Rf8(ÌLC&t%€Ä@ƒBõLœ2 Æ¤R±ÈqàêÅÂ~ jñ'¬Â8`ì±ìpBß=†ÆaÃû>NØ¢·µ7êb´B#Žj1bàVÑ…<Ã\nD“L6\n²Ì)ZE†Eâ¬";break;case"ca":$f="E9j˜€æe3NCðP”\\33AD“iÀÞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4ž&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvŽÖÄ±ØÓ3ÐñÃ©ÂptŽ0Y\$lË1\"Pò ƒ„ådøé\$ŒÄš`o9>UÃ^yÅ==äÎ\n)ínÔ+OoŸŠ§M|°õ)àN°S†,ê,}†ÏtÒD¢£¨â\n2\rÃ\$4ì’ 9ªŠ²’¬I¤4«ë\nb!£îÒ†\nƒHàù„\nxØ¾cªJ4²ãhÄÊnxÂ’8ÌêÈKÌN	(ðÈã+Ð2Ž‹³ &?ŠüZø«ïH¦—µÃ\"ëÄ1 ç.ÀP‡È#\n71¤´Ž©éÂ‰#pÒ1)£ƒ(hÉ†Y¼hÓ7µjÂ7;C &ƒC(3¡Ð:ƒ€æáxïE…Èúm<&¨Î»T¤\ní#0H^*!ò(úŒªFã}¦²\0Ð7Œ›òƒ„˜¢&%üâŽsD¢Ã1hš‹Ë!F¡È#¨Æ:!L…~Ç%l-„š5È\r•V\r6lÔš1,[.Ò¥ò†Õ£òÜ!-ÃqÃr¸Ø:«Ô9>r´~‘Æó(ÆÊTC¢<ý=Ø1¹ã(Ì0±WÐì½Ž£-n2×0EÜ#\$UÓ\$#;<0Í|¬—° Rh8ÄÃb;\réHØ6\rø\0ž9(×tÆ1»Ylô&ejm™Á+Å‘V¨ÉKqâ˜n5ˆdì@Âß Ì(Üec#)XÖk¤W…Lv™3Úá\0Å/Ä3zYv®±aêAP²(ÿ\rÉ8ç³½(á\0YúÖ¹0ëâƒZ×¡¢&Š®© \"°åÁmC.Ùl`–Ö·Xo·á/K=\nH0ØÙ MJ’££xÌ3?“Ã€¡ŒpLñc² Þ®'ÒãòÉXÙ‚031VÞ¼2OÄ‚<£Ã8Â¼¸ÛmÌš¯/ÐÊaJc×\rnÐ@!ŠbâŽÈø2Á\\9/HòN75É*N«.£kôãŸR7O	äéÔŽL§Yç°cpÖ‚ŒË­^w\0AŠ<—Ÿ‡ÞFJ1&O†	?¨¢òN/G°7uH©‰‰3M„a9‹3LWC€iH½ßWÂtS2h\$ µ<;3ØÑ¸\$ÁÁ-0î]Uj„&QîŸ˜PjC¨•Ôl/\$¼)%(”²S1AN5<EHâù‚êœ¨ª“t«q>z'}\0äìSÊ/`³¶ãØBLf'B ‚¢4@SÈ<A(1+b» é—0FdÂGäDl\$€`€(€ Aƒ{†Eêô‚¢\nQ\n\"É˜ß!wTÃ  gUÆ°4šã`Uk†„\n Þ¾‹Û(ò¡ÃÃµ\n™Ø{DÞ>0Nf¡«%%žW\"¦žN…<\r­tÍ†*ƒö_	äšbHˆy4’eV•µô–Õiº•¦Q³TD‰J@Ä‡¤ÙB°œGÐ0›2l“²\n<)…B›Ûi>#Ñ‹'y ¥C	,+\n|IB¸^WºÞ^ÔÇ?cØÁæcï%d&±˜=5œìÛiGäú†ò>øƒwj0¤À@ùA\0F\n’=;ªÒ{*£\$ç&LÔ¬}Ÿâ3OµÔ‘Yê¨óL	À€*…\0ˆB E©@€\"P˜jŠPDF’®ÅÜ_¦[=5d””'2LŒXrxDá¦\$‹Bf!T”s²s•ûŸD%í=WšPðÌ±á”‡Ë&î×“ºnËçòA=˜h	»G™™>eêÝaªîÊ¦º[\\.³¶]¯¤G0Ý\rc)M¤\\dNÑÐ“\$‰è+ôÝGÔ:¨™Á‰²H•1fd‘åEy?	@‹ÌÙèH,P€Ì‹êW¨ÎñŒH¨ãPÙñL*é!ópÂÖ<¨<FÂ96çbžÙ1	¨¼—¦“ùvÕi®¡ÞÖÚt8ãL€Ã¡¸£…|µ³ç ¬Öþ DZ’Ã ,Õ°`°Å+‘±¡güÍŸbUPŒ€AXò”—Zá„NQ\"#Ømƒ¤àäàÃs'#S§XÎÖøSp\$ÜÈ`Œ^ž‚‘ú‰h´\"š‚F‹B#_q-±W¥DQT Aa\"60’ìl®›æÖUKGý_óÒMp‚™ŽÁà\\ÐUÊ«s#™E©]Ú9´\$Kƒú#õqúÜuò~>i˜ø8Â‡@\\sbSÍÅu†g\"qrs«¬ÎåC47ÜÊACn|Eññz‹MIùY@š’Sç—4›Î\$“C¿J-3£Ng¹9´Ü <á¡–¦ÎÑ¥Áê÷­¾c\ráÞ¸DŒ1W)DÈ†M|¨ôÌØVÚ76ºQ1&s*´ë\$Ân“Â2\$Ñv±SÍ®I¥˜bÖºq	 â±‰Â\nÈ„oŒÄN†¶I±/_šhVÉÑMÀDŸ,\$ZÀÃI\nñØ3*àÎ`aª¬Ù§«M™¬×+,ëNˆÖA{?«ëŠQ,üx%ü(2vÎÞñRGH8¿<vMÆ>²cÅô‹WÏ­ÕlØÞBfÛ_å¦,˜Ö	˜šù¨\nÒ!Ñ'ÚæQ¿±s]®W„çÎƒTH`F6PÑÃ¦vAND{A@’¯þ¯V	?ë½Ytl=È,1l\\Ì”`1[oóÏ^8àKú¼—Zí&€¡”ARXC )E=£ˆ^NYhÜ‰CåüÝ¥>UôQ÷Ç?&Ž>ÏW´ÇâÌÕ¹	¯ÊZO/á	®’ç^\"ÏËÞoÊ¬—l®Q´yƒ	Îmï¬'Þ»Ðó/7êÛœµÆž{ãOF±ÑzÏ4Ï¹ŸkÚÑ~âþôÛ·_ÃÌz;5|u­*ý§¨âf?ØF^½§júíÖx0L/÷ù·™öoîá‰îA]Oy¨`€º—w¤`S¦™¶Ç‚²¬B|7\n=„>cðËjºïMžÿH>VÓ§Š¿¬æF+(³¦®C(ÙÒ±+Ä& (DBïÚýî}k.XŒCÈÈì@ÂgÂþ*¼>nüF°ôe¢\$²ðÐl´ïhóPvZIjqKEðd3O´²fÊÇÎ>æD·°•¯×	-hl,Xp”JËBÞ0®ºC´ÅŒ20¦¶ªØÐ\$˜|ÉÞ=@Ó¯Aï~ø/Ò'0šMožFÐ qPÚúÔÒFêw4cP¨lbŽµ&`1Åó„Âø©,†vcV'¥¾C°\núnˆ|_\rptn¢#°aQPÞçí@ËyÑ@ü0ââK±>…PòöÑIÑP…QqdÙ‘^M10°i†(ð>pê¹€îqbù	‰,×&ÛQzåoTc\n.Ãª}	m-¢ÄÑ‡§LDGL8ÄÑo‘ÄÄ¤ž\n…BPÇ\nîS(ìJgØôhæqâÈÑ¶l„K`KIÜ‹›\rÀï¾Ç\0Êd‡¢ô^Y%ôxñ)„.m²„r•1µm(ï¬¼‡1š•âöbÕ°áí|î<ùNB 0šxåº_(øêB\nÄ@†H ØiàLçÄÄFèî“¨VebÛ*\\}IÌB:x€ª\n€Œ p|gR1È*öŠnp+Ï/¨42%%cŒp*ïˆsXšç\0ƒ† åpbGÌèñåª+š%ªëIP1ãÔ?cú·¬R1lXJ2êÙ(ÌúÆ°\$ÀÂœ¦/bê&  1f\\\$£(„bd¤ÅZÒ&ž6ä‡2C¼Nˆ•möEŒº•oÚ‡Ü0Ð¼ãƒd[/4-ž>¬Vï74ë°ôËu(C5ãy6/\\m°Ø¡“n1SRºã| £5´§¤’#Ø&ËàyóbF0n]&8W‹ËSa7Ëÿ³\"ïÆvçêr@˜g.þg„î®Þîâ\0†ƒdàÒ!F(„6µÌâ]ŠÛ9#úb‚ô?€è=ëZ½¥­..¨2\0003¼ÁSYÒv„ç6Ýo:ñ,€(t5Ä¬àSjN1uD6	fJ ƒ\"_\$BWdô	\0@š	 t\n`¦";break;case"cs":$f="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ði6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rŽÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤»7ã÷»ó¶òI61T7r©¬Ù{‘FÁE3i„õ­¼Ç“^0òbbÊ*,ÔÛÀ:ôGHå:Þ¦Aˆ7mXÊ5„\n‚¦ªŽNJ´×««Á02Ž ô1Œ®{¤Ö?ƒ`æ5˜kèè<ŽÈb‰¨æ6 PˆÖŽ¯»~â(p„4§£“Lñ¦¦)Jã(Þ6ÂƒÓŠc(ô\r±0¦<¨ÑÚñŒ£’€9CL„8 B@ËñsZÀ-°È ‹\r#C¾PŽmèçŠ’°Âï¯£„Ñ5\$NÒx»¾hÔì‹ÏôÓ@A\0¦(‰ŒR87é\0Ê3¡Ð:ƒ€æáxïM…ÃÈ6Ç¨\\”ŒáxÆ9…êËø7M£xÜ„J€|˜	Üˆ7BàxŒ!ðA\"6(,9¥b´H9¸è¢þC{àóMÃ¢–5µêX(\rãÐÚÒ\rÍê%55½³m´­ëfÁ\rcªÕ¼(“p5Å¡(ÈCöÞW¥íßêý®o2:Ž(Æ\n‘ %Èiàé<“ P‚Ø#BL9µ»+eèÆ4[)¨A-ã}—cRÏ@Œ:Ã\\1‰øÀÎæC65ÁeCXÉ§CHí*\"Ôó#7«cƒFMTM@Åˆ‘ß¿ƒÀé€ˆ9tÌ9.xú&C¢üÀ]u›²åmà=Y0Ê;l¬[è·7µn7¶TÈPNu±¹Üª>?)E¶0èœÍðÑÀ<{ùRò„°Å2HBÐèñØ’6¢C“\"Î6<ðnŠ.×l\r¨ÇrŸòCµŽô\r–“Ò£3Ã0Ì¡\rÃ*V'Œ”Úùlªµ_Ã~@à]#šæOÓ¼×A¦¡`@=y/âüIm\\\0ßß5\0ÜØ6ÀLÎL¦¾|6ø¾:%äù~mç”3Ù[ézƒ¯iëú~(ííÁ7Ÿ¼l+âx!¥á¾‡ŒŸŽö}­‘÷§—âiŸ£Õ#†Åü½§¦÷ò86hˆ¢ÀèMë×\rdð0¦‚0.ð2¢võƒ1)\r¦	ˆAWöîÝëð~DÜú#HšˆÐv8\\Ê.’VÓ[0y‚çàé0òlTú¡)oÐÖ÷¬£R\nÄ9‚ |ŸÑPp4…\0005«µzTÒú­\rÄý5‡â‹’M(°í=dß¨­>ïf­x<ñJ3#E†ˆš¼pÐ—Ñdl )éB¨°£¢Ú“Rª]L©°î§b‹¹%J‘S*…TO#R°VN]Z±–WÒ¼WË\0‰”Â ôŒJV¦´Œ¤¢(IÜhqª<.@Ü\\ûödN<^’BpN“Ø©%eä½ÌèŽÒ=/È‡Ã°ÈQM{FD&X_LÙ¶€Hds'1ð@@P>hŠÒ-ÁAP\$­ñ†’\$—`¡Pˆ €³â0C<äc§ÝÏ3îîT\$Ç'oK8?6ã’j\"¢„ã6D0ÅÑB!<†ÈÏ¡Ä„‡”—™ÂfÈ¨R{„\$J‘LbtMaPZuÑÔŽò}ÐRâ]+Ì5?uW‘SÄ\r•r\$ŠÓ˜iz`‚(=äª^‘A¾\ng&Ë^Ûlšgòz@7†Pá\n<)…G˜éŠ·OOY»rPôé™ddMâšô«ƒ0iáÔáˆÕjXÂÔgÑ*œ…b‚ˆ!\n‡	„”“•`Ú\\Ìz#„x*\\C}&Á*N£~­	I±C•Íé‘ÄÞ•’©¶A4‡¦Dw‰­\"-d¤Õ“ÐìH‘ÜõzrøÒ-tÐCO-®ŸEÜ'&X„˜#/¸­áµ“pÂ@–Öi¢¥§˜Ât‘4õYUœì±[o¦˜se„˜’YBRºŸ_¼fÁÆ“¦y‹\"ÌÐHB|ê.dGLn>æ/J;ˆV.TÂžëãYÍ™m9Î	Â:<ÝÛÊTIa†‚D0ò…z×>’ø¸2þÏì0rE=K¬:>ç<ékfvÎõT/sÐ5ˆ–‘OèÈ­ƒé}­½Ã»áQÒ˜CPJØ<t°F“RþbÂ~¤XuÞ`%»|’ýõ˜ÍÕ†VKOâF©!êR·ŒNÃ\"âfì#\"¢Ö,ÎÃÅÙ\\mÐ’#Œà‰‚Ðd>ªÕ¾U™/±êh»g6×k`+N#HÁœ3¥[³ Ž:Ò¯Z5,'Xwá	læ1Ž´P¡•–ÃVdÔWÈ”oÃ3,jÇ<2)°s‘{'t4ÞŸ”´kJ\nŒ˜õÔÀ¨C	^ž’c8­¡¬.¬!†ƒÞu/iK©|‚ò¾¾b#;\rkôË>HŠvæÙ\rlñ“VÏ!ð›MG\" íàÈº^•Ø£ÍñÊ¿×¦[R`.€O‘³mÑèôBÝ¦`:ïÿnÖâÜ°‹Îáa4›¾·.ýœ÷€nÇEÁ81á•n¥óÃRas™fLÊÆ%C®@vâ˜…çÉ·=6Ý;¯qxŠøWÏ0×¼Ë€D®k¸¹Ç/l­åóÍÕÆ¹þîˆÚŽÛŠ’ŒÒI½Û(‡‘ú®ÈŠEZÁ;«,‚¡:ÉJyt\"”¹‘Ce¦J©]uNµ‰ˆð á””tÓïiûfK~ÁÑ7 Å˜púÞ·ì|÷ÛÕš³ÛÍ.¸®lë°—CIF%)÷O#ß\rÑˆÆõ¶?Ä»Íþò7áÎàÛŒ½çÛ‚ð¿Ò'üÇ>Hôô'^¤0•Vu\rÁ<ôùÚz¯Dó&V[žï6û~6å~'½ô4têk7EîŒÕÆkþõQƒymëcÌƒB×6JˆÜÁZXÞ•–Èd4…\n—Bwøuh­\rˆšåâ8„Dÿˆl]A\"º2dLÍâ²‰Mä‰MèáBVa àì+.Ú`f\n`@\rZº…à\"¸ÄÄÁ+ú÷ìüo¿P4ñ~OàÊ\rEnöNÖ, #~uÇBÅÐR¿dÊøÐ\n4¯NuGqo–ãP: G*\râ¦Ë¯Vˆ/œÅÐ€q0rqä{x4°ŽB'CÐO¤0 ¢¢Mb<ã/Ž[ìä(â,Ô°®÷ãÎ'0´ªW\0š\rÎÞæðIˆ\nÉcê^ŸPÕ	p»	Ð¾ß(äKVµ«^;í¯Vø„4­™\rÃ‰0j\rÑû­-ä^šq(YŒô\réðé£|k‡Ê]‚ú¹\0àC	‚fD&!Z(ãø\rH@ÁØ„\$F¤#Åæ³B2¶ázTÃ›i†c£®Qäpö\rÌám4<Ê¾äÇƒNAãŒ‘+«b¬úþIòúeÐE ´Ð€\"ë·ÍLÑPÚöFo0zÀe¹Ñ×0\\Á¢xX°ŠÁÅ¾Í\rXÕÉÅÏ†0ÍZ—	±Úôà« â3 /™Qðö&å€@²ÉLtMk#.Ÿ\nˆ²Î¨a‡r`à–\"¡|Õ¯¶\\KÚ@l¦dCÎkD8Ôpª¯íP= ²i²á0lžÇ\nÒoïŸ\"‘ÆÎ€@Õ&Z9¬ÿ)\nm&¥­#g)-U)’¥’‚¯…Ô¹`ì>1j/ÆI Ö(	’#0>J’Æ'‘U±öúÕ,’Û\"1&ôæ÷\"Äß-dÁqöMÄ.Cá qå†D‘(Œ\\öMè\\Æ*ó\rÒd«0q¤ã2„1'\0íÒ“-ñ;(æú/Ó>J£ÝeÍ4ä°EkòéàªCmp£Ñ3-æK&}6±Ù'Ñ;6mnC³CqòïàÐ¢j.0é(EÅ\r#\n@oÐ£Š<²\\¨Hç0ÆX€:ˆ•:Å\\Êpß)ä¾€3¨#SÀ4s°x­í<Œ0%`–#'ô=òk¨FJc»<!23¨yƒªgÍêãñ\0\r­õ;Óü(CDáPÿ,)<Ê:#CWAAn@†Z@Øc¼(fŽzÎâ]Ñ¶(‡¤Z„ª›f>C­1±°<d…éÃDfšî¾d@ª\n€Œ p%sú´5TA”	;®GËD·ßHŽ5HÏ`ãÎ@q\"	Â\"¢.ãHîuÆRtz]SHÊãBþÙÀ`‚óc	b9¢üD((dŠê–BL?G­äLÃE`¦ZKp^fEcPGn¸²¢F»‰ÚÁî«PŒ‚<Fºc¢~Ó¬Ðêxl0Ö‘G&-Ì	\0ì‹\0N‹Ä{äGSO©R§¨3âjÇô‘TU)\0rq ƒJÀµ&0u8þg˜ø<¢„ÌŽ¿V7qú5LfÌÐY1¦ˆEÎ¬!Bcàa4úâFû,(‰g(U¤Î±˜+&\nÂt˜\\òD\$3¶/,(Ã\" nõòf\"<þut=\0´@e¤örfrTò=ÃAS\r¼+Ö:â4\rDp›kðÄkÀ½GŠ6˜(€áTñ¯.2ØLÐ´1ŠÏdh!Çr";break;case"da":$f="E9‡QÌÒk5™NCðP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤ŽJs:0×#‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚Ž†óh(Þr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœŽe²ëåæó8€Íg:`ð¢	íöåh¸‚¶B\r¤gºÐ›°•ÀÛ)Þ0Å3Ëh\n!Ž¦~Çkjv¥-3Še,Ã’k\$SøV¢‰G¤Òä˜)ÎNS:On&^ïn:#‚þ'%ÎxäÇ4{ˆÚ¦##°µ°8œ2Žƒ´\"5¹«\$(´BbžšÀâ˜ò¨,¢šð@îËü9-ƒ°Ü‰éÏê0¨ëŠµÁÂ‚È¢ãsB­Qxx0„Bz3¡ÐËŽ˜t…ã¼¬\$#jÖ¼¬ã8^¥KãÂj7 ÃxÜ„J |\$¨ó`¥à^0‡Êæ9ã Ñ¦Pê ˜£&©8¬Â\r¨ÉB²ž‚¿#¨Ö:°9†C4ˆÀì4Œ£¸KÓ-J|	ÃËBØ\"èhÈU0Ê„µ]ZšŽq‚>‹?‚¤þ	k#Ÿ!)ì Ž«@¸ií~Ãƒ(Ì0Ž£cB;-£«ùC”ÔH#\"´˜Ó3:Û_Ùã Üµ»‚štî\r²Î9¬ŒÒ~é·ýž6\$O¤:4ËL0¨¦§cF3¤@PÉƒn_ØŽc\$PB`Z5×Ø@ßO«´^ÙSôÀÈÒÑc¤oÔ09¡,ˆ'º°¢–Œ0FL1G®h\nE6¼-KüØ8^°8Š•èƒ“\r˜2Øp’äïà§ÑÕ­¥‹#z	`£xÌ3aJ¤tÚŽ°p¨7ÁR\0òŽLƒ¨Æ1¾£˜Íh„\"Ö9…‰€åµŒ#8Âµ¸ÊW-\rÖ(ÊaJN*ŒãÍð´´\"¦)ÁjÆ„©ah@×Üî:•U¶ã•~“‰Ž+Î<\rXòÆ‰8¨42I[l³£ˆ2â#'…o#Ìƒ\$H\$ÉrjˆÃ\$ÌÐ]”èûî6ü‚¦ ;.\\.Í5Ò»ïÆÐÇˆË“¥*€å‹Æ#,g™(^²uì…Á‡%YÒlž:J2œ«+Ë2Øä’ê_Lá•1¤Ê™ÓHsMi´¼,²ó“©sO/¥Ù‰Lù¡äé’3\$èŒ’pzÎR:ÒM,-®¡²¶)Y‘\$åÀÄÀÈ¦ÏZ9†…ÍÓ’&ØðIÁ:2æl\0ke‡ø PQKÔ&–\rŠcöx‹‘'i˜‹†2bíÖ1Õ\r,ü2—%W\nº\rÁ¼Ð–Ò>Ëã‹q®<¹7Tv`N!Dntß¾BTK	qŸXx3åÌQs]E°Þ³'4ºÝCÞç÷–ò\"ZÑ\r*®5Â—>LB'¡Åk@Ìu‰{¹wd=0ÆGÔzQáÁ¾¶\"Rì‚€O\naP#h¤äXk‘®´²Üm`käÏ‘ S\rYB’“ÓØRÃJv}¸’u*ó­1Ä5™\"8G‰>.dáÚ1PZz]@iI*FSkE#2S¤ˆšŠ\nQGYG<2¡pÌ \n^\r(….†^\0U\n …@‹CÁ\0D¡0\"Ñem\nTˆEáA`®\$({i™k\\¶À˜aa%(SÀŒ4y[tàä—Å¶h\nqŽ8ßKÖnÎI:5¨å\0Ô Ä^):DÕÖ¨Õ¢‘³8G-1™5\n´èonÌñÀ¬°g•O:™J+X/\"Þ:NÓÅ\$Dh‘¤ÜL#±—'Á€m®UñÎ#ÆM@Rÿ%få¢Ðà¨]K¹Ð\r!èþE´Úá”m-Y‡X8T(æo¡K4È‚y+(ªÔÚQªqOXóT`	+/ì¤Ò£Æ\0_ÂY%`¡4aŠRÝmÉ%Äè5j_(5W% 3›û‚.¸¸§ä´›öxá\nBn¥­°æ´kbÛ,æDÃ%Šÿ˜1£‡%þ¥3Z¸hCÞ/ôT*†¤¡§ÔÏšY;	ƒ„(Ž+l2†£=6]	õp¹ÅTyVV&ðÅ•`ªÌP¦1ˆ%–ÕVÙn‹J<%·œ'†L` Áb•M‡\"ë@Na¸‚I‰°Æ(X¯âøf~Ê[\\lh¡mˆ[œ¸Ì2blÁv/äÜkˆòƒ‹í~›ÀÞÕ©H3Ät’·L³\$éŠU’Þ³)û@§ò'/á\\2†)þB§}2¯.bJÅp’.ƒ–æ«”È©¶Ð¬–rbIÑe˜Åø€ÆãøCiTä²!J¨IôÆš—áÁ’•«¨C,(AÏ##Ç]d&‰KÕuM\njóTk\"•ê2ÚÚÈë\"ÙŒCª¶¸Ÿ\"Ô^cagÐ!`Ãt\"_oeœNÄ2’4 ÒLS6ƒg‹˜í‚.ö®ÝzAÏcUaL¶‚.Æ&ÔÒ®µ­°`QõpE‡.\$ˆªJS{jþ¾U•A™iÝ…RjË9)nÀ€Ü8`riÎÆá,¹”-€e´û6j<xUV¦lìÓšÓ3NExÆñãæG“ñÒOŒuæ‹üUêåbv1ÆÃDoœ]­@O2K|s~sŠIç¼þª„kAW^¸Öz{xôãr:44QY•tÞŸrz–¿Ø<fÜ¯€ÊæŽ,Ê·Ìa[íög\nÝà «ˆçÔc@®ÛËÁíæynrƒ6£²ÅiâÞ°þÙHsy8³>À›ÅœTIêw3½ì¦çÌØº²ãë¼\nÍÕÀ±7\nâe0ßÛV½¬å½s]Úµ;Éø7QÞ¿MòŽ©UU*Óµ—§®W®ìwˆH½^û\\úÏƒðæ¾£å5Và\$Ÿ‘VöÎ÷¸8ümÆ(+E\n4¾e£Í¦²€.ËQô'§Ôø8\nüÝk—~«ÏùûË\$ÿ5¹†å¼™™\n¡:µˆ¾)Sø½ï¼þÍ¼eï¢ÿfà bzýD(R­èjBš<ÈëO€ãÐ€Î´âïnz\0×\n˜ø¥2ù†D4¢h\r\0†›p8±%v÷îHuÐVùP2ÿ&T&wÈc ¨¹‹c+ª*.8øÍ‡PÒù«¨¹¢ÿ\0’ºÀ¨“ox>ŒEPv °Z?°ªý°©°0ý&c4¼¯Þ?€ŽŒlTgÂ’h\$#Š`ØgäÁð¿ƒÎ¬…ŠÓì¥hHÈ ÍÏÒ	enÁâÆdÂÜ0úûÂeP#–ÇÌ¥n”·¬zÞ †? Ø`Ö<@ÖÅKz<¨XÜâúƒŒÞLœLÄl—ëj¢ ¨ÀprÈÊþÄb]NÄìtŠEøÀMvÊN(B¤Ÿ*õ¬:›Rï¥#@Ö0e\"ö&m¼/ãzÒ°ñÃ|ÏgBƒ.¶T%òÞîúÝ\0Ò>êò¡I69Ö°äî@ÉöQ‘Î9bþ^B0ò+À4(±-`2Üà`Êª)šc\nØqî=¢‚ *Õ†ÀTÎ2Ø‰¢E’Qøc\0àS†”×’0'\"‘ñ!²\nfM€&#\"¬­M#,;ëXV¥Ô îì#&¡ šÙ\$½­ô`ƒøÝf&&\néÉ²jÔ\$*Ö'@ì»ã¸f<-¢ž¾bØ§š±*€» Ê–…„Q\rÃ¦êròf.j¼g*vTÄa\"#¡°#\rqÊ#Æ&\n:-IŠd\"àÔ";break;case"de":$f="S4›Œ‚”@s4˜ÍSü%ÌÐpQ ß\n6L†Sp€ìoŽ‘'C)¤@f2š\r†s)Î0a–…À¢i„ði6˜M‚ddêb’\$RCIœäÃ[0ÓðcIÌè œÈS:–y7§a”ót\$Ðt™ˆCˆÈf4†ãÈ(Øe†‰ç*,t\n%ÉMÐb¡„Äe6[æ@¢”Âr¿šd†àQfa¯&7‹Ôªn9°Ô‡CÑ–g/ÑÁ¯* )aRA`€êm+G;æ=DYÐë:¦ÖŽQÌùÂK\n†c\n|j÷']ä²C‚ÿ‡ÄâÁ\\¾<,å:ô\rÙ¨U;IzÈd£¾g#‡7%ÿ_,äaäa#‡\\ç„ÎÂ1J*Ž£nªªÅ.2:¨ºÏÛ8âP:®¦ŽŽž—\r	f-;¨ãL:;L(Üþ3£’63 0²ù½bÐÂ•=j^ç pã\0<e ä	Ã+8éCX#Œ£xÛ.ƒ(&B‘ŠFŽCÜ5 ƒËÌ6»h`ì¸ÄQ\"â(#˜æ;ãéÉãt£)ÉcxÎ€SÅ2LÈ;Úï1àÂÐ¸c0z+ã à9‡Ax^;Ñr46 (`]2Œáz9IZá¢	#hà·ÈïˆxŒ!ò 9„8é c Þ×6ˆ £&\$Š¤ÒÝŽ³59C ä:·£««)3ª+Ö++C¸@Í NH¾¯í½–RY®üx2Ž¨b…4Žiô‡ bò’!-Ãq¥¯bt’YðJñ#T#£/àÞ‰2›‡xBµ ÑÈ\nzP§-ì›.X©Š<B3ÂÞ)Ö Œê0Ê3¤xŠöå®Ch«CŠ¹DØØ¿<Ö2ýbÃsr7?â ËJ–bYzbfÀ„Ä· ã¤íÖah—xJC ß“åÉ.\r'3C5Ê–d\nå9	Í§jë^´†<Í»ËêÀÊœMKW%S£„Ë\n¡XŠ<mÓ3„õÚ°\$›¥(JR§¬Œ Võ•ó¶­ è\n7ŒÃ0ÙF¦bÅ#ˆÛ-7C²µ½ŽC0Þ•ƒ}b&MÈZ+lêƒß‘n(ë@–„\n ‰¨øƒ\rÈ¸Ðž )ÈØ<â=Ï ÈgEÒtÈ7Q7Ý_Zäv”AÚvÝÃ‡Ýqç}sFÅ„*ä\rÞRf!ŠbŒ\nƒ{LðfQ^ë³6.0#&PÚHÊ&Vç%löPBˆKûr®\\ÀCüO£bÅx™…CD”ÕC¢:ªä€†p@C\"Œ/aÈÖ†2@B( OIð2§å4Á>iA¹Œ³F©LùŠeáœ9†@Â¶Vb%„ø”ãZÈžü/gðÝ¿*„	¨&§˜9Ôä˜Û{½)Æî%]„3\r	õ?¨¡T:‰Qj49(ðä¤HÚ”RÌiL©¶Ú¨ãp|pýSdA`MGÊ°2šÔfï0r',l§›•R~Yƒ\n§Å¾†IÌ‰Õ\n (Ð¦KT¹˜U*åTÄ*çŠÙ/DÌ¼¨Ð@C‘Ò1D0ÿBS‰Ó“+fR[CÂu\nq‘3²QÊYq.Ž¤½#  ¨‚˜ÄSÈørƒîiù’öÐ«0gª½Ú†—<ÁC)n¡ÑT×Úàq\rçH296ßò%ž+9Ê¾t\"'(U‰0ˆã	É7yP`ŸYr/'pÄ#Esª…X¼/áÉG¾LŒA„04‰2LÂ¹|„C« ¼û+¦­…‘ØQ\n–Ñ,6‹4§š\"ÿš	*+E(ÒHcfA¥<»&a@'…0¨X9:X£ò”ì\rLMÞ•À2Ê9I)`€7Ã·ë\rD;äÆ9 AJSªwÐÅ£ÐŠ°˜Êqd5”€ÜÆßªµYÊ Ô‘*BñˆÍn<\$#Wöl%8r¬îõO6ú¸LÂ2ûˆaš‹ÄÄ`y¯&0'„à@B€D!P\"—+\\(L¶Ñu8šTR:<¸±Þ&îª›KfÉ('‡\nÉ‚A7'¤É„é1Y)ýÂ}ó¹æÉ›#9óà^?ðÎ­š›4ÝaVéwËMWŠ#«¡H¯/“Tƒ\r„Á'lgS“<ËôÃ†’ýBšò7ÁÍ~¶4©ÁÒ§U&(LÐ[3Îœ¼œEEz3ÏçŠ„TìàßîmI¹ë<Û_ÚÀR* \n\rdè5ÀŠ¸½É,êîßåëgOtÌ¯‚Éy‰™5:˜É™Ò,ºýY8±h–ð¾M–\0Êä4à¶ÕÀPU£ŽÔÿ\0 ´çÀPÃq†Ú+Hdm9;\rH:ÝFð]©q\n™à–\\æË³©‘iñ Ñc¨bl—°1Üd‘#m!¼þ(Ó.vŽ6—Èý>´K~Ûíý¶aP „0ŒH6fìáÎô.C„ë6€”–ú.ÐSh®Z˜”úyb}]n™ÅÊ@ö!šAëÐ1kÙ÷}IaéaÐÖì5¸·j¾r ëÊbA¶„52;Ojì…¹²ŒîÙvÎEKR:ÑÃl“iL.m4”!®¬6Þ×ÐaéÁ·ß¸v’fy£|ÝôÂž”8ey\\=£¸ø8|')mÐA‹û-3­ŽÄ‰×Ûmžw4Õm”CH_©Ñ\n]hø™¯ë0–‹)FÒÍ-¤%‡•õâ†0Â’j*Œn4VøÆå…bõªÚX8õÝœ™CÍÊÍ˜Æ¤uÌFãŠ[l^ÄM`ŒHCÇbuÛÛØ±[½sb‡¤×ˆÛðáæJø·•¥ÜÞ9=×nñ‘ƒ/iâ=Ù wöøÞ¯ÖHæÅmxD”wl]¬ÁF¯Õþ_Ø	`aÒt67l9¸ÈVçÕÃ\\–=ŠcG¯Å\\IDaý#UÁveŒºï	g‚¾9a™‚Ð¨»Ž_+\0 &\\°Sp®\ráJgG³“Îôwû\"i¿]ü×Óô¤|{]óù~Žj£z~ßÍ÷+Qß×“ß‰}ˆÕ™÷	ó:þ ñ»ôãøÖ­ñ^´Ã:ž°¤Ò‰ÂïÏšà Ú‡~ä®ØÛþÛMØ&@ÿí*/oìÜrÜAxÜÙ#6Ý0ÝhÐÍ¦Î´b0Îh'oùï±\0ÛBUƒo\0÷K@ÍÐF´ÐK0+â\n%²0 ZF€@Ìã\0`àåb:\r°\\#¢>6\0Î-ãš\$\$Ò„–B5§x€äÄ9í­Ð„\r‰Çàx&+.F²j¼úw*¶+cH`ð‘ÃÎ+	BC,ß@ØÌÇ>gÆôILÔÍ‚·ÃBÎŒì1…¥”ýOüŽÔÊQP¾1o›'å¥’þFüÓŠÑÑ\$Çï &q<ñAd1®ÉÜû‹ø¾1KÒñW0>¥äLÃà#`	IÒIK¬}èb^®&â.¤ŒÒp#\0Oâ½îö&p!\0000`ÿË\0–Ñ\\ûË@aëžËåœ\nþ.fŒã\0ÞÉÎÚô6U\0¤2 Æ\rf0óÜÁ‰NÕ\"8Q¦ì.¦ý¤³†]ºþr[2â1÷!Qý’±8¿¯~ôf²+è;\nq³!/Å­\$1ÜÏbŠÏ±B¾:Ï…µ!ó%rO%±/ ðu&ò:±É\$Òo\"¤Z:`á‘TÓ\"šÓ¤¼:°OPRK¤(ÏÅ²_(’— Ñ^&`L\"‘•\0001T¡£Ö\nàÒ@¥~‰¥ÀÂ±Ã*tUÍb,\r,‘Ö•ÀéòÒ–‡JdÇÐ—êt¸Î¢†;GÐ&ì4Âw­¶B\0†WÀØ`–rqêaf0£°ëOUh%¢¨q„%P\n ¨ÀZJ¬¤-\nƒÚÎ¸3`ãÎDàR×Db;5íñˆê\$ñƒªñÂNÖ®R%M|1‘ÌRÅOVcãë)vç„ãjØ¸‚:Ñ\$¨7#a1ÓŒ}ŠZw“&c>Ã\"ÜGÀô]‰p#«\"=`˜#D”H…º\r£¨ÑÊþ#®ð#¨–.ê|<&„\$€Rƒ®û	FÀ!GnB>Î# Ö\rààBÓøÊ«×@¯)ž\0Èóó÷=ÆÅ5ÊÈ¹ÂqAT,0P±ôuÂ˜#´=„:òO(/kä(Ì`)l¶#`ñEŠÄIPî8Gbn\"¼¾C3d”\nÃð£^.T4QŒP¢tJÌo#,CS¤’|d—>ƒI>Å~\rÓò¯Ž_(ª@£,úKÄ¬ä0d%?ìæ«²hôÅ&i§7'Â2snŽJBXÑ‚84„lLâö  ";break;case"el":$f="ÎJ³•ìô=ÎZˆ &rÍœ¿g¡Yè{=;	EÃ30€æ\ng%!åè‚F¯’3–,åÌ™i”¬`Ìôd’L½•I¥s…«9e'…A×ó¨›='‡‹¤\nH|™xÎVÃeH56Ï@TÐ‘:ºhÎ§Ïg;B¥=\\EPTD\r‘d‡.g2©MF2AÙV2iì¢q+–‰Nd*S:™d™[h÷Ú²ÒG%ˆÖÊÊ..YJ¥#!˜Ðj6Ž2Ö>h\n¬QQ34dÎ%Y_Èìý\\RkÉ_®šU¬[\n•ÉOWÕx¤:ñXÈ +˜\\­g´©+¶[JæÞyžó\"ŠÝô‚Eb“w1uXK;rÒÊàh›ÔÞs3ŠD6%ü±œ®…ï`þY”J¶F((zlÜ¦&sÒÂ’/¡œ´•Ð2®‰/%ºA¶[ï7°œ[¤ÏJXë¦	ÃÄ‘®KÚº‘¸mëŠ•!iBdABpT20Œ:º%±#š†ºq\\¾5)ªÂ”¢*@I¡‰âªÀ\$Ð¤·‘¬6ï>Îr¸™Ï¼Žgfyª/.JŒ®?Š@PEˆ¢WK¤rC«…º¹)ï”¹/ª£ö§Jª\"½\0*®b×§¥ÒªÊ;\nšÖÁ0¬:Ø·1Š\"¬²ŒTHÂ“JD†±©fy%³)2ª°‘¢‹’Ó: I.²ÅPž[¥1to&KÒ»¼˜%o<Ó¤(e­¨|¶Þ½‹àä\$Ú=*ñœQÓÖ…h§¹6K>ª{˜‚ ïÅ¤š¬oiœÙÔv²@M:õÖÚD\\“;ï5d³®zZ„jRÇ7³1œN+éÄé\r¤×íþ«ÌÁàÂ\rÊ3¡Ð:ƒ€æáxï…ÃÈ6#pÊ9Ãxä3…ã(Ý–¦\\9#~^0Að’6Ž`Ê6åÃ xŒ!ð@Á\0è4\rã @:\rá\0ê9Œ¡\0¦(‰ƒNdß²K‘v³Ï\"\\‘±Öíð•LêãêŸ¾ºü{l×:ø¾RQ9FÍKâŸ@[r-¹¢¯œ+»¡pä¿ÁÖÉ:³DÉêçÍF|²éºpÄ<æ@O*rù’?iª°n¿S–«çiZ“‚k¯®MNÈ¿ëÕJ¶!•\\7Âí;Ûz¬ëÉ§ª)Çƒàî’®Ë}fÇJ#¥\rí¥,—R¦¼Ûœ\n[>õ/pÉ'jª F©k£†¹_2oÐ³u\"¹©[TØØ.Ò¢xûx\"\"r‹©\\!Çe´äÐßˆ¢r7åJFòï	H¬Wç±}HøžJ?já0A%Ê\\ü&HU( ÷pa›Supo­„åäHTl)pH	Â7’\nQÐjØ|Mý`­sìüï†è^<çP[¡És…âPÂŠ¬úK*%€|ºóØòà±ÃJÑ]-CØ¢EH”A/nÝÀQd¼×±=l¥•à¯¥ùÑ wgÙ¯ŸW– r\$Hê´¢¸A|Wçü‹\"üN…;®¼ùYa9À+\$í\r¼˜|ÿRRƒ’‘Ìæ,E ³ÍÁ^n„J!hô¤3`.ÜAÆÆ}M+Q\rˆgE¨\"uäHy.ìÖàñä™)VŽŒ²É…¢N‰Lœ5Ò|ë7¢+)œ¦>Ò ªHù„H´®n:Y-Ë-‰À¬—&]5ùxAÅa…K*0•gð¤Ø*aL)hÐµÙK©íÙ¹\"hWÁ&œM7R\n±dA#„¤É=«€ï&YGEÅ(*€ÂƒXs™•5&hƒ8 ,’²y\\Ù³4Œœ0æ Ä˜£8`ˆFlC£%í\r¢˜Q.ˆ(Cd:¥Ì¨ÌDS+ŸWq)q/T	U4ˆ\r s¤‰v}‘I&,‹±O¿GòI—aì]ÓüA/:\\ÄX›bìe±Ö>Ù\r\$dÌ¡•2Æ\\ÌnfŒØÓ }’R+NÇÔ¹*C÷O3³ˆXú¶VFŠ’%=ÑŒ¡dŠ½\r“Åƒ‹øšWáY;6NA¤˜cÎ!R°gÚ<Zá|Ït%p¹7\rAæIæ¶‰x’Sfme&’Da™3ò¢—Yt)êÙ'ô ˆU±\"9?AlWÔÜÇP’ã(› @P\0 Á–Æx\nCˆG*ø•–“¸^X8·)A\r›2`ÇNiOj!À9ìYðg­882 éFƒM\rÁ¼:\0Â`oø\r®T²JÚüÆDÄ‰µÙ¼ìëô&R™#¸E»…O…D¸­‹CÊÑ\\—¨±Fhª‹+ã!V‰{»zI“A‰Œ¸b¦¢ÅŠpì4¹h\"Ë0A>IC_¡’#Äby‡Èš“L¯H«•&(3þ†šYÌ³äüÄþ~¨–¾Jv#LíõäÎ(Ó6ðÐ \n<)…HÐ'	<lI/Ú”ð˜ñ¡1\$Í¼þËW»šP\n´2ýcK›jþvÑQ(Â@Á™O44¿Ì‚xßE™Ê–¹\$2£ª2Ä ¡Á¼VUH ÁRñT´s©_‚ŠJËLº \nc[oâ(­\\oôq‰T¶/R ìÎ\\•ð¬T£S†j®H‘0Êœ“Å^'RhÎYË;q\$/¸w‘Ü£:Ÿ¬2©ÆrH;áöîñœ¹¼cŠV?\$ˆ{jJj‹-\"é÷îZŽSÈŽ¥Hî-((Ð²\r4¨p®Ý‹QÃ_¶•Mi&8iDZ2PxÚpîDƒÓxa:¯èK.LÄJ1Âë?QByÖóálK0¢}Âà]6TU+†Q,«D</ZäkåE°ÐÞ„•!ó­è:æu}Õš9²¾V'9ÛÈ+ 9y?teWŠÜœ§,È9ÇBRè¨šVÊáAÕÖä\\¢~ê’äQk¼ˆÁFú‚À8Ë‰Ðf­E¹ýÄâJwÓnÓ–mœí24ZZP® 3±*âxµìVN#ÔöÔ€¸s¥9&H9üíRQ\$ç/@òmYrµ³½fÙ]Ê÷í»Ì SÓ©(¸¯IÀX6íÉo>–&b8’g5i'Äÿ(ïçæÂ¨iÉ~\rÓñ<nAE¢‹–½V/ÚÈ‘{u§É`bŸ{³¸þ	xæ5&_ÉÙDm>³Œr§@šÆ\0%¤IÂ  ê‹\0§²~Â -¯^Íö~7O˜ß/R>§ÒùÈ^íXë¾ˆ¤¹…ÐÑåJ@‚\n€¨ †	\0@ êdàÒª4&\$Á æ àÀ äf@È0¥¨K-`á	\0,„TW/Ð{'6à@#&œ¸ã´2g5\n+¼´xQÃ‰	I* +ˆ<‡’½í¦7‚Lè4›I”-­D»°Æ—0¬GB()P’Kð–.e¦ZÄ1¡ì`;Le\rÐéæ\rã³\nÊJƒÀRkŒRËF4Ë*mËIéòœÉ¼ E*ÐêÚjsq,\$pöºúÐÌ—ÍÆåBÛÐºþ‚sóâ¡‘\rÐþÚ‹iVTÄÐV.´~‹6^	Æ*qVú­ðDFø8ð¼ÚMfŒ\nª“är„kPìgNé*-\"úËâéRþl¸2­‚Š\n¹ÏÚŒ¦Ì[çBF1 !‚†—MŽé.Gíœ&H)vÅDÒ™‘œ[QÌ2LØ5®â@kb£,T,,š,2€§q¢ÀrQ¶!‡¹D–è±‚HŽRDˆy(Š€¡2ÅËhWáíÄ,ÈH©(x¸c„µ.È/%l+äº‚…\\GJò mëØGã\"œ!\n}&’tE‡&G„VŠú‚Ó'¡k'ïRr„>éu\"ò?).†Ð¯2øå'2œé‰*7’®ŒŽFEìÆnˆf°„/)\$1,\"³+\$Y+qZëIÚGÄ-)C\nàÌŒrÚøÈ\nVbÜ’‡Œâä“Š®„+\\š‡ˆád`€ä\ràà±à~|¥fÿ±ª>¨j…©(ÛMÆ)ïjIn\\°¼)“92¸Üfí±l½bùi\ná½--Nž†%>tï¢ùPNtÂ’ËÆ,®4-@S3î&nŒéÊJÒvé²ÖUÈÐèDøÒ°4^îá+ò}8“œ^Î²Œ-3©)s¬èè™,³*T¹.ÇÊöháÒ¸éry9mÇ=p\\Ã;0E.“e:³ÞDâ 3],ãí63»Ù&§èR?ÎI!Ï—1h!ÐÃÐÔ\$s§)Qp§Mè!FéALTpÚ´¢\"'´&©bJsp¥Q7	\r¢üñZµÂÈÌÏØ1Á_ƒ+ÓÍ?\$QpïFDnÚì{<OœB«.³Ý”^-´#Ö€”llsèësË=Î‰!C(Ÿ¢²úãîVä>Ø\$ôûBš™ËBD‘*DdŠ@k*\$¢WÅ\$+sj!êäôÏ- ±Á/7µ5«¨Éä.tlŸL”fGIÒŒ-%m¥I­ªñÖÃM üÔ™F4F” U¨\rA/Po²5¯¶‡Äkì¤:/ì//ñPNRfæ†øm´¿?³+?ô‘,^äæÖÎ’pJ´s=µqC5`øt¿;CJ”GbEJræ9zouˆnTx€kT‚ñ…8õ9UƒU¨!Ò)Uh÷4«[b­[¤ráY“·Y4’†Uk2î9\\Õ¾‡e¥YuY«™^U­^Šª&\"¸¶Ç˜A¶é£ÜPí\"²Õd–25Qô½‹f#óUô6*´;[»Xñ@Ö+­\\3É]•ƒc“µcÕ#.3´EvE?K,ÕÞú\n®“¶SrÞû³ý^p]ÄY%Öj‹Å½fn¸.e'_{^Ö>µ[t8ä]%,<\\dŸÍ,s[NFêZMêÃ	,÷\"¢Bç=s“@3‰k‰ˆŽ¶¿isç^õ×Vö6™L’¶Ð\"VÀ²•Ý\\VW;ÈQeËWgén)‡;Vë•ÔŒVák¶æ-ÖžZA>Ìtæ«ö1=•µ?&w\0V×i5‘mÖõe³Æ…ndxgM¶‡ô©%ö°>dGXJSÕWÖ3rw:*×ZCSø+vùd79E£Ã_×ml6QiVò†7stôÿE«Õùg×MhÒ/÷“4ˆxåu\\ïMÂM¬’Tqv6É{EÎL…­jöïwSïoW|eÒº—1x77}%0]­-V´}\"Al@´ÌæÈBdN¿bFñé£F—B|¥c#¢‘\rÅ;vœ%QP)˜Ø\r¢wB±Ë˜\"zE0÷ýxÄÍEKp\\§X²ø ]\$÷²¸q\rtO‘`*RœKï\\(¸aA¸3†rjõÑgu:.PÄO`† Ø`Æ\r€Ò`Öœdø²E7ÂL.\"æØÐ2qsñ¬L­UvcOqÙYñfÇ~¨‘ C·è=_t @\n ¨ÀZ”‘ƒ&ØB*’ê—ØIƒR¦-Ò’Gn¡•SËÖD1\\mïòâG•VröqÓfØÚ„å¨B ¶p®ZHç%x8E¨®d³¶B›Ì¾š©T!dêÆA‚DDØ¬DØ±|ôŒÑø¿a8´˜n_‘EMæÑHM d\\\$LŸô˜òN8–\"M²bÉ°:lÈÛ&Aœ}°úkr#PutÊÙ+š\"°@ˆã52±/‰¨´RB]ãS±¶ètÃ’hÊ•Œî2 ÄöÜ'yÜT9àäyä|3|{ŸAJí\n}ã}å· QŸ9Ë’‹´'âzŸg®‡yoezS²ÝžD<G3Wue5%g¸?þFÌïReð_U~	CSÄ¢ógn(ó\0áÓrë¥§Í¦°ù+¸TÚoÍ‚Ñ0ÓKR[!GPS+ÚM'¯!åàqDP2A„D§òJELªÌÎ9õFZX\\ý¹Ay”Îq|[’\0åÏ\0K0#ó™§“P“Š‰šÕžšØég´_9ÿ&Ð#T·pE˜€Ç­†©‹…yY{:’!5`CÂÓ­²Nlå\$NÛ/¶-Ár";break;case"es":$f="Â_‘NgF„@s2™Î§#xü%ÌÐpQ8Þ 2œÄyÌÒb6D“lpät0œ£Á¤Æh4âàQY(6˜Xk¹¶\nx’EÌ’)tÂe	Nd)¤\nˆr—Ìbæè¹–2Í\0¡€Äd3\rFÃqÀän4›¡U@Q¼äi3ÚL&È­V®t2›„‰„ç4&›Ì†“1¤Ç)Lç(N\"-»ÞDËŒMçQ Âv‘U#vó±¦BgŒÞâçSÃx½Ì#WÉÐŽu”ëŽ@­¾æR <ˆfóqÒÓ¸•prƒqß¼än£3t\"O¿B7›À(§Ÿ´™æ¦É%ËvIÁ›ç ¢©ÏP·Ùûp°@u„}ÍÆ@6/Ì‚ðê.#R¥)¯ÊŠ©8â¬4«	 †0¨oØ*\r(â4¡°«Cœ\$É[î9¹**a—ChÊËB0Ê—¿ŽÐ· P„óDÂ“”Þ¯PÊ:F[‰‚P9Lèø¿Ãü‘?Ít—\$\nq[Jç7olJçˆn\$'§q¨…'¿²ƒ^ŽB`Þ¸Îƒ|•8n(å01¨xþ\r`Ì„C@è:˜t…ã½BƒjÓ…ËpÎ¯4€ñ£Î ^)Að’’¤1SŠã|)AT:Fc#U¤B˜£\"¯	 ­7 ôßÎ0ÒçI(ì¾ä²Ã¨Æ:!q«Á°¬:TÒ v3Â0Íûi‰Ã¨Ê£ÇL¬€ç„µPÄ<¯\0Mº[ëÄ‘.ƒ¨ÛCà.ÓÉBÞç‰#pÆÆ^(¸Â:ÉiñBã8`Pˆ2¾c¨Ø:²çkW¬³#·´\n7#,KÆÃ÷{ˆÁŒcI†YÍ®sš‘!¨ž9B¬B†9ŒkËî³KÊîÍKPÓbUOòñI¹âÇŽãón 6&ã\nA’0ómà0¹¨½\\&Cm}9·pZe^ÙŠU1¿2ŒÏ\$Xö…”¤6³Ö!±ú3²Œ¯Z¶'3-É2kÒ˜(42ÉÚMy&£ÆþÄm-¥£@\0T®ÌÛ¶ß³F¬¤`íÛ4Î%)Þ3Ï&)	Ez¢ŒãÙ.7§ºcƒˆÄ™ú29ŒØ3ÿ5­#›í 8#Î0­.¥IUQCuø2…˜Rš\nƒxÖÉb˜¤#:ƒ²\nò9Áp@+ZÃf–£sJßˆëû¯Ì©`Ì·\r¸2S¦’ª= ¾K•m\n?“ˆ@a•*—ä3ÃpÖFŸ9*?„ÈðQYöN\$x¡’¤îgSÒ|)@ˆ2#^xU¢}®‘øpÈ°Ÿ¡öD'Ì™,îGÏâ\$8H\0Ð7'„µÉšI/Åà•üÃ¹nUEX8“´O,>'å\0 ”\"†ê\"¨°ä£C’R%YJ15.¦[ò;eQªUNªUY9yd„VNX¡Å&Œ1\"2¼ŒëF4ÌÝú¤\0FˆB•b†`Ç™ãƒËïtÁ8ð±ø£º,LÔ…\08opf¸‚”\nJA Æ9‘ÂÐÑÐ‘Äb‹\$³FL[Ñ¨UMü!\0@UAs|!ÜåD´úÈ¸yä\\1ÂÄ Qps\"å¤á‡#°Ã	M´ÁšãþýZaÆ5Ï\0Ÿ’IHŒ9%|Q˜9(©¤G^±ð%Pø¯µâH@\n	\$L<™³ú®åxoa æ›\\ca>D06ÀXšÅ	R¨2RôŽ’%Q+¡±¨&@'…0¨øÉBe'\$y\nsÓ\nÖGP|=tDN	Ñ<éu3	Ÿ;æ9Æ{gù8˜RœÚ T†aËœ&˜}ÃƒáBp1\0@Óß‰!a!¤þ`©\$(Á#›Dž2O³ÔèÃ‘ ‰ë¾_©\0ÚH8h˜¦Ð‚ (C\nV¯„´B‘‰¬'… ¥Z¨mF1¹UµÔ…ˆµr®‡ø(’\n©Èbi8…Åœ\0 žêI(ÊƒT‰lÆ…\nöÈ4`ÂŽy6<§ìÝµÉDÄ-Ô¦d£dž†Ükâ§‘àÇX6HYû7öy¹%\$Ðám›tµ)!\"¬Öäc-˜I +>·ÅH(WYÈ\"ôRÕ3{‰}é\n›QIä~òGÓ;Bœ1Î8G¨7Ý”‘Ðf1Œ±Âú¸éShTqøïôÌW€pxgzÕ¢òð›1=¶ŸÂÒô…Ô†!4×¢ºˆ­ŽUC¡Ü+5š…ï˜\nb4æ˜f*ØVI¿HXváXbÞjk e¤çâ´Å¬jp—Ò*¬#Pˆ„!²sKVÆÒU'1Í7a7UÂE7#C0;ÅÍ]£PŒú;w¸'(òÄÐMÅM¯®öÒJ¥ºó1!P*†l-æ¥ÌÏæküµ&³r’ÀÊ‘züW0tj¸Áy[\\nHËõÄª´\"Û\\ùñƒQïžnPa>Ú\r½èRZ¯õÀ%.]ƒ³ÀcÏF»Iè+¢´¾™CäÐÇš”4GêÔQÀ´¤P^Žhz¤=UODÇOå@ÖZúÚ=39ôÚã×Åç`­…¨v!˜¶“d] à,Þ2a¼;·Ú—²ôÛá†®·-Ãj™ž\$ÏHÆ²2Ž²W-Æ\$¨b„É²»>2Ð1]à‹µÍøAÞ¥I»’–Õ®ö÷#ÐÝ˜J¦\0œü,†^°3-ìâì†rÖ‘‚MeÉ•[X\\µß\$ÒÍI¬ÁècÊ–Ú¥v¨®åCä_I^5Ï\"ùªeŸˆyÞçÞðÚZó\\ìú\0/xe©\$³wq_\rë4g)Æ~Q–È`p¦d:¾’s\rl¡®óë¬F\$Ž^ò9)ì\n—2ÜÅpÞ\$Í‹\rZßj*fo\nÄlrü^êîCáfÌà×‘iœe ªÜœýôhÝ_Œ*•éúOnÎiñÖëÅsî[åI¨sn;Æi¯CèüÍá†8¸òÆÅé‚g½º{?Ž©ù“Ôä3TÌ‡«§4gµØzGRû¥´eýï53Õs÷ÎmoAù†|‘|ãùëº¥úp·ëzŸ@\rv]hÿâàdŽ+8Æˆ¡ÆÒôuŸ*¦B\rH½¡Þ}¿oÕ.ðøý?qZîGºHD‘/Ä«/âýLX8DÑ/xODVÙŠˆ¼Oò2Œÿ‚p§§ð\rÄ\$ù¥&EeØç¤¢ìXk^7lzwdàïÏÆÂ¤Œúî~Z.‚ÂÍô°c¯¼úL¾¨l.Ë¬ú®)¬²”Ï±W)xóLæÇŒ´ËÇ%P˜IiÔ-E¢Ò]çè1\"X×*rGã~El¤\ré˜Ê¬µÏ†&ñŒ¨QP{n\\¡l¦0pÝîˆôÌ\\lgbbNÙ#~¸Ùƒ·	«pœf\"«°ðçÐ¤ï&äaN£ç²%øÔP ôŽt´¤«Æ\$~¯5Lóï<õîƒÎ!1;1OšBïí\rMÐî×qLþ¥Ý±l9ìn“®K`×qvÈ1}M1z>1g	/>%QŒÇMçã¬…ÆÚ]Ð¢9ìÂ@±~†1²'°”ôÑ»èb	ü\rÐ_‚äcEìêƒÎ\$¬¨7eÇ„Þåt÷ñâÊk†L±êœ\n¨8ƒ\\c\$IbP.†1à‡hµàÂÓ|&m%fÚÊÂ5!mU€†H\0Øiz0É\"éEâÈ\"0ä\0ä|\"hÆôTÃðaÚwÀª\n€Œ p{£†0bÔ&(øé†ÜqìÔÒt•²yZD:Ö\rð¶³ŠNZpHÀò½VÜŽÊj1¾K#Œ<†ZDBòÈÆäÊË\$FÒ~dà*äoŠ ¤ØF¤P`â‚°JvjJö5äˆ\rä(< ½m>¼P¸\$0¤üf¾b4¢ßF*K\\¿Ž|4¤V8‰Ÿ/âúï\0¼h{0în‘+W3 hóú…È£\$’CŒQKîˆ„‘#‚Y„ŽFÃðlklªÂôZfÀžMæf«¦r·kðslnNöÃÏB†Ë?â>1’¡'îÚÔEÔ°Àá4.íÃ÷,F4\$¢IÃvGL‚éóá Þ²ªFKææñ3Z²ÄK³&7q6ZÑ:±lP5Âj/KVçÅò:†8¢®.	\0t	 š@¦\n`";break;case"et":$f="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ|ž ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €éž:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp­Æ÷Aßš¸'#<ž{ËÐ›Œà¢]§†îa½È	×ÀP™MÐ.òÊt¼FL°¾öìAH¥Ð7§SüÊœ°M`ÊµI¨¨ÿ°£HÈò(L3|²ˆðÅBpê6ŒKR‚ƒ;ŠààŒ£³œ„!©ÂÑBÚ0Ž@P¬—ŽCX@'£ î´aH#Œ£xÚñ‹Rþ&@0 ‚…Çïê“\rã{OŠp7 hÂß\rÉ2ÎôRjß#Œ’JF‹	ƒzØŠ°L%8-ã¬ƒÇèjøÐ9£0z\r è8aÐ^Žô(\\’:Ð\\´Œá{çG\r`Ü\rãp^)ð’6Ž,~7à^0‡ÏºµÃzÓ„\n2R)Š2#XšŠÉxÆL+¬*àªMû\n¢jšˆ³‰«ë~É\$ƒ+à\nÂHŠ+ÇV*¨ß¶(j9_Ž¶\n†µR æß¡#Ô2¢;ú©!-ÌŒŽ‹8¬ñ:‹‚<ä}O°Ñ` ¼ÑõlÁ‚„¢>q\"O#ë€„Ø:ÜŽë\$‹½V\r)JÂ’\"¥DBxèLÑe%Ic\0´ÀVãÌ§¸pè\nHÒ9/ð:sv¥CHÖ5¨ËƒGç¢664Ë’\nŠŒlcX…¢ƒ¦…;cuxÞC8Sµ\"ÖøØÛ·‰úš7/ö’üW–¾Zh¬ƒlØVäÊÏ[Ò‰}É,”\"£[Ä6F*µÕÐ]6•ŽI(\"§<'\r·Õª6Š¹­û.í1°^åç˜ž²¬¼X”ã0Ì§©¬Ë3¥Å Øß.kŠÆ5m&:Œc9ŒØZñ3!C˜XÓ]ˆÂ3£/ZûÎSÌ2…˜RÚ\rð˜Ú0ªa\0†)ŠB7~8=/ZW°Í&´¼kv4ÖŽV™w”J:ZÉë\n£@ÙbrËMZ;A\0‚˜I@rwáJ“¢u3	á=)€æðdR¯Q¨*%Hm¸iI§­J¶CFzŠ£Û{®ì¶>\"†ùÓA‰¤Ô›˜TJˆsFîPð™Ð%;@ÄöŸSúPj;¨x\0OC’‹:Š9KCe\$¥´SJqO5B¨Õ)H8«(4*£Lgž›zH• 7¦OU10iŒpàLÑ\$ jxçŸÇ¨U	¨E*<½Ò|Ã!Þ0	I˜&JÑÏy£#†eGr@PÒ\0ú˜TfRx\njTž†5ÚÿU`p4ˆÒFæP@¤1>È6ðïœ9ý\re¥<1cä‹Ù7@Lž×ÔoˆcdHˆS^¡Ùèaç­§‚ðÉIøA\$Š“,	)•DV@c^ÀqbX3%×ÊÿÔL5ÇÌ9Z`æô†{†š…\0žÂ -rF±×§ÒzÈØi&L	mÌ˜FêYÏ|NI0Ò^µÖÜ€š\n˜•€àLÉ†Rk´“Öjelr7èL3‚`Á¢a´`©\$•ÄcSŒ¢1Ÿ	Ê¦äÃQH¸—£\\-NAŽå<³ÖÞƒÊ:,‚‘‘­RÞÂp \n¡@\"¨XíQ&Z®‹——K\$˜\"ÀÂœR	¬im3Â,­I™T[¦è3ªJ+›€=Ä|Â¶LÆƒ9æ7ò°0×â\náÃ+Ó\r…ø¸¤ÃÛ#unäÕ06h\r?á¬1l2·ù­	‘rMÝnºâ†@­”\n	uÁ™ƒXÏû3X‡:Ì*­™ìZJl\\7¥LïÌZV²BIÔ› Ce¾)4’™Z[ÕÊ\"ÁUˆLõåS\$k.Ék ³—\$›S.AY<‡ëó<Mè“ªÛÕ‰0±êH[Cx9¡¡Ý+fkwxI1¨¶#~Bˆa9WA62sì³O­¢Æ-åOE¬Ã%ëµ˜‚‚Yá¤3š@äŽ°±*ÃÂ“#0¨‚HGá)#¦œ/	Ó¤\rtñÕ«Eß\"¶f°ÁÈ‡wˆòHp(Ì\"…`Š‚ SGVU8ËN{³¬ªÁP „0'…4®|M²„!¬/m8R£´ãŒ!( F…â.P@Áv-V36fêJKß‰»(Îü6’ü}1ätàAAÖå°—‡Ñp2;!üÚÔ,ÊÙ d!^Lniù¼øm5g4ê½™sTžˆIÏ‚]äX¦²;_		#\$¬sZ ¢S1L\"&×d¢Ì_EªÒ:k¿ZÓ”¦`®–¬§Oö¼[Â„p/K8CWùbLãbKŒßµ¹Ò1¾aö˜S2n0¢à¡ä%ÞªÏ±4ò*aÌšÝJ\$û·Î‚ß‡q™®8µu5›>CU—!f8N›³¶†àDÝH?³ZlãE•.ßãZŸ…Ü~AÃ–¶eK@*Ô¤»Œ“‹MýgIi¼:“§¾ÐàDK¡ÁSô¸»XülK5”9tx…9ùRèüª²\"ñIÍÜÓÀdê~KŽ!ÆØd'™ú¯`–ð„¥`@t”C†vQ‘ÐNåyQ»õ~HB÷ä±1öî­ÐÄ/¶|½÷BÝ´Ü­U]ÎÉ&5®å›iëEû€?\rôýªÀm¾Îwøm<BÛòœ—Á—°§æJ'›8¥÷èíZ_íZNÈ¾j¥ëæqÄX„ÐÝÈƒç½òHµ§ØlŽr>ïÄü½<÷XfŸÔ\"®xÉëöÃŽÍV‹þÃ>÷åu9 KØL8)ô2‚ÔFN“é›@eR2Çì€!t…zh~µ¿úçÚóáßþ\0éøŽ§h‘¼¹G;ä8¬VfˆúÁåGú4\$Ñ.¬ÿƒ\$üâtý\"Ôzor÷j€,ãO Z©Íâ®e¾a¥à;ejY\$fY¥ž/Dù¯J´DY…œZDø>¿°W\\÷ÏäÏ²´ÇY	ƒJ0’L'Ï*ÞÍ‘#Œž­ƒàñpb\np‘oªíïûXXÂ+\n0”n¦3Bp´ÉŒœÊ¦aíàûAjãÀ	,ë\rÔÞæ\08„WÐÂ•ƒÈoTÔÏC	ŽáÎ@õ+ZÈÂÔøä~ù-2îðPÕq\0õp÷\nnï\n®@ÀÇðb®‚ƒkfm)E1,ì¬qÇr\rÆ,èKJ51[k¶x‡æ0¯ä^ ”\$ƒ`Õq^lpù÷±cÎ8ôWI€Hg]%äB/çï- ©¯E®m.Àþq8uÑ¢^¬ØÃåÚFQe1Ål@sÎ0ôPœÕk¨ M-u°qæÇìY1ÀW0»‘ÍÑ²ÅÌ`ÆLhÊdQ\nxÉB,J«7Ñ‘Í=¤®°qÃ‘äAÑwï®V	>,Èú\0 &FŒlÈôE¤Žl±Lù\$ôOøï‰/#À\\*à*OÉÃlD]PM’W –ð@Ü^ÎÎÑ¦`ÛFÂörX\\%ÆAM}.žÍ®pôcÌ90\nd‚\r€V\rbfZäJ!¢–¥P’>æŒcÖ\n ¨ÀZj\rÈ\$£´&§-\"JgÔÑBü@Î,a«B}Ç&à1V&ÅT\r Ì)\rìŠOš/îœê	àã£Ü'î¸+*\$\"!'L¦F\riŠ;pŒåÈL¨ä¸Äð›©BHj®êâUf±.£&/°qëºôD \rÆënA&(ú©Êæd°/‚å7Ï–!\0Þé\nùëC7n-8­«<â£d4£23`@.iÙ8åÚ\$ëñ.Ç ¡²YÔc®ƒ8Ë‡&Ic”phªT¨·†èW)øìÊÜêN¼#“èg¥j?©À(jÈ\nM¿ Ç?Æ:¶^ÎHâdþF@	e*H\"#nˆWj,³nÂ³2#XÜ3Ðnñ9C#ÁAÓ[‘tÄCÌ2Ô0Œ¦7ÃbdŽ²©¦ô-à	\0t	 š@¦\n`";break;case"fa":$f="ÙB¶ðÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\ŽJ§ƒÒ)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½/ÒêH´r–Âæ%†)˜NÆ“qŸGXU°+)6\r‡ž*«’>n?a ¥&IYd„—ÈcC1È[fâÁê„U6©	Pœ¶H*|¡jÚ®¬¡\$+TÉ¬ÉZU9KIh‡*°sƒ²i	r)MrTX¿3,×¡É‚vW<*¢	41\"Èˆ0ÍâL¥?Ä:¢‰–oñÄèR@ÒÊ‘a\nÒ¤lœp¨ª,h¥²ïªbÅÉ„#®é¼©4¼ŽÁ,òZÂM‘ÛúC³RêË<–1\"K ÒØx0„@ä2ŒÁèD4ƒ à9‡Ax^;ÒpÂ2\r¯`Ê9Ãxä3…ã(ÝP¥D9#}F(að’6Ž`Ê6ÔC xŒ!ô8Vƒ Ð7Œ\0è7„¨æ2„˜¢&\r53•	G¬-?¥sº:C6NâJ†¤,(Ë½îZ­Hnã4Ý3ÍâJÆ¿®À”IÛõ18%z|‹X/­ÒU!-ò•_rãôá¾ñ‚ÂÀE‹\nôˆ•±zhú]-ëF·®Çi!²_[JâÒ[Eðœ*“08V•a¢Æ€álNÉêXÆ¬iNŽ +L)Æ¬Âkªl|¦Å Š=Úó¢%SÝÑXû¼®¾†•éQ4˜„bº•Öá&íó/Y6[€*yë¨:.ÓüìÂìãºÓ­«µÝÒynÇ·w›2›»ko¤ræñÀc[y9ª“øç°ˆ\nÛªz¤ó2¬Û3û¨\$9{Î¬L:w¾D·f…8+¼BP©ZÛõ¼˜d6ŽNC ØØ6I)D«?ìòÀ»\"ìˆ§ì6ÕO’4ÔÁ“@£ÉNìÀæÆŒlŠòþI±ÓÞÜ;D’¿D\"VÞÆ)ä2÷Œ®¬þS‡æ^s>Úz>Ÿ«Oè÷µîn\ntXø‰ä[˜ä€ †ÂFXA¼5ª'ÚA3;Îd‡çòX[\"}M„4\\“&¯WÒ!yoé¤’U¤qEa%Eotµ\0 ¨n\raÌe<±UAíL) ä\0cUJ 2)°@ Ô*‡Q*°9‚ |Pa‡°3«urVÐb+Dè Ý¡\$mÊáú!oTÿ2¯×Ò]:hÄâ¢SbÛ\n] /DÄÒ@ÉÂJNæÑÁdôºŠ%3±B(e¢”bŽR\nIJu-Cr›Sª}Pª0Ê©U:©Ujµ“·Ð1ŠÊéË:u¾íÚZ„…@ U¸Tà+IN=}t\nô<Z!Ç‘t¢sRM1P'	ÌÌBÙd”X!”LA£vd€ÚÁK:ËÒ\\F‚Ñkì\n (EÄW-¶z±è”‚†\naa5s*»×Æ“Ê\0CURD1Å8t°Á\0pA¤õ« ÎVpSÁÒ˜hƒxt„6ÀÞèÏM°HÜ ¤+C¢i˜å=2’RÊi\$G¨éj“2²ƒ_ao‘Ñ%6Dg ´e@2UMg\"Ä_È‡€¡\$ÞA\0d\r+„P¥Ž–\n¾ ÀC‡êC\nÁÈ7†Øw\$\"2¾ÁŽ‡,u„*Xp3þŽ™%è:e[‘Ù¶TKAF¬Ò­¦4èºj,‘|ã1rÐ®é«ß“®¥–’NƒéO+ŒA»'x@lR¼œl™	W¤>W‰ÂÊ	•ÊŒåé Ð1%4éæ„`©7cK4\"l@ÔFAý\$Gœd5>–4X\\¢ä+°4“ä¬g¡1®³¬”g´‚xNT(@‚-È¹A\"„À‹ta[l%ŸÌ´Å,“*aG¨á\0.ãð·¤ò!Ì:?¹sÈŽ’JÐ?D~a—O8`­¾f<’xÖáúá>\"Ò'&ã]#ÝÞ£hÜ­¸gMÞ<ã­	°ø.9ÉbyQBÞúâpCŒ].‚.`déˆSÁŠ?\$Ìâ¯½bÂ=GI+™1lyW“@!¢¸”Hu`4*¬rq”’`ÐãÅ5‰¹6–}±ùClr…È\n„’…\r>V+ÂÆ5ÄÔ‹ž•fÆ%\n_ëôÈÐ¼äO‡¸&þL {,™¤Ž,-’½ÒHZùØÞeÕÚ×JêOF©E[&Úüô\rˆÐvýœPÌŒvÐÇlÏÞÂ¨Y]Ý½x2Ü;Æÿ`ÒW¦Ú]³¾[1Ã:ŽõÑ@¼(ÿ§°®óF'¢|ÜósÄG1S‹3®xT!\$\nœ¦ÃMP¡jTR6C…v4GWt÷ÒaaÖµ|\0^[Á<´kõ|šg¶H-­6†6ÐB¸-¸w5\"B˜ÌíWc0r’ƒ	ÝI™ö½Ù_gR~Iæ¹à¿Ñ¶Ó>ë¦»¸üoönÑNH—{Š5j(2œÉyÈŒ–_@qr\\§ô)År`œJáDž´Mòý¢'šyU¶áº;¥ßwØ<”ŠÚ Sµˆëð Vêœ]­­\\\"?À¥+{6uÎvÛäIÈ‹5âäµ\\°*…£c«/>vdÞ‰i­dêqðÊi×HÔ<tÃ?4.±…¸bõíÚO¨õ¨âèšk{¤½²ï5¼þ»Î¹adÉ}_N\$áXé4cà(\"U@à‡þS0h®Ã´‡ÀdÍ7’¥©<›hW“ÚO¯“Ñ¾^Gu¢Š^„à\r×DB¹ážØ9¾ÅäKA°\$Eå&à¦ì‡Þæ¸íüë¾yû¿ƒ°;¨”Ãc‘G-ƒ]/ÉÂ~ÈàŸÎíô16 ùQ­¶iJñÜe{«¢ºÇëæïÅÜÿ{ü¯óÛY÷úØµ)”ú9smoæ,s˜òÜN.ìzË¶´fœp\nBúàÖb¾cÏØF/üP\0â†4qÂW\0®ØÓFú„ãF@¯É¡RÅDKÄ5/ºî°9Í8…	ný/¬í¶iÂT2Ã¨¯ÏäD¤ª`‹~—„²qî´ËDZô|õð-ë„I.ñ\"?­dÞd;M,HÃ«º€nêîŽŠá‡Ë7\nÐ¤è¬FýN·¯­\næ\"þíNÏ†ü­lx\nK\n†ìî.{\rPWû\nÐFè°Þu\rvú¦ûäì^˜@Ï~Œ\nêgD˜¤@zCöp—nHÿ\$L½p0²ëoð¾°Øõ±-ˆóHÜ˜ÐênÇ\0Ññ2¯äên»ÌEFûcË,H–PK¯Œq„n˜‚IçvÉæ1/‰¨ãÏ©.ãQJbPèýæ%Ñ`ïq™Îø£&¥ñ<ü±ŽC°Â[²Óç¼Ñ€9D(Léˆ7.¡\n®·mAp¼x1¯ÍPïPWQ¾¼„„>ÐÈŽªM|°ÑÀ\\Oˆá‘úLÑÌÐåÕXx2FñÙnâ¿ÂêiGäXÍoðqæ~%cÌèþJö”£îÅÄŸ\0cç0ÑÊ@3‚‚É‹DlÓ\0\\rF7ã^Ü.Ð»ð\$\$0(ÝÍÈvÅäí\"	\0‡ý!îiò\r(Dcàž ä\r€V«€Ò`ÖLiÄ˜Ï(nk&\0C`ª\n€Œ p—ƒx€­à¸«nà\r,ðƒ1ÏHÒ >Ç\\Znäi²®—Ç€éò;§8%BÂk-*´# î™)0Šðôò–¯ñ\"?B®®¨>x•Ñê£jLì¦2äæµŽ%hñ#F¨~Ifp#Ä®Kêµ3>ädMbÎ[ç>í¥ÝäÌ·ÄØõÌ16‚o6Ëä#Ñ úl.ëpŠËãŒIŒˆîÏ_.ózAÑ£7SˆËÓl¿Ã~tó îó¥9Ê÷O;\"-DeÄz5d8G¿9\0DOMït-u=odÐORkÉ>6‹Ðr9\r¼˜oÑNlb:©@z¯F†ã£ŠìTÉÑ	Ð[âQ\$õ8W\",Jø®¦‘3~¾†»9<°®œŒÌîZ*{£æ6QveŒ;ã´";break;case"fi":$f="O6N†³x€ìa9L#ðP”\\33`¢¡¤Êd7œÎ†ó€ÊiƒÍ&Hé°Ã\$:GNaØÊl4›eðp(¦u:œ&è”²`t:DH´b4o‚Aùà”æBšÅbñ˜Üv?Kš…€¡€Äd3\rFÃqÀät<š\rL5 *Xk:œ§+dìÊnd“©°êj0ÍI§ZA¬Âa\r';e²ó K­jI©Nw}“G¤ø\r,Òk2h«©ØÓ@Æ©(vÃ¥²†a¾p1IõÜÝˆ*mMÛqzaÇM¸C^ÂmÅÊv†Èî;¾˜cšãž„å‡ƒòù¦èðP‘F±¸´ÀK¶u¶ßB“Õ®5å3±8[&0š¶ÇSYÏ’ÙªJ26¥§ŒàÊ…c›f&®n(ÒøÏ“Îôµ#&ž-ÈàÓBpê™P Ò½#›~,û!'mJtî/´‚B8Ê7¦C¢tÄ	ƒª:%ð”¶OÒ4—¬p –%É‚ðö½O\\.˜)²X0ÁMº(‹#l0Üå<’+`2 P–6Iàà<ŽcË\\53D:»‹»#£@ä2ŒÁèD4(€æáxïC…É;îApÞ9ázïI\0Üÿ)xD§ÂHÚ8 )”¾ã|úÄÑÈÐ7ŒŠ\n:º¡\0¦(±Rj+%=b”1t(×:ív2LDŽË`Ö<É.šÛc%-{bÄ\nµ‚÷.GÈmZ”ŽÃ¨Ûc\rºÄ\nh@ÂÐ\"ƒÌ5\r¼ñÅD¢€P‚ÑG:€»'ŽŒJ `„Ãx\\'î¨#NƒZ‰	#8Ï=Œ÷°Ó	Lö#ÏÎ	c”&?-<€€­ÎhÊƒ£R¨¤ü·+ú¢MM:p‰Š‰E\rŒ– –¤ «âý|­ØÖôËò­f&¨%ß\\L:ÎÝKV‚:¢ J@Ã/éZp@ã ñã	«»\rÄ¹©jšÃ'³íkxŠŒ&ƒ¢Û\\{œ¶òÏ¯ËÓº ø-ˆ6GWâ:)c0Í'¡jˆ“A-œÂÀ³ @¾£,HÒ4êa\0Ú¦Z#(à¶)ƒs“:4V‹üé-ƒtá9(.DÚ-ÒØjêB>Î§«ÅÊÜ³.Ñ>‹‚ü 6ApÅr‰ç/ª#ÜÙIÎóãwBŽômOM8ñK<õ“c×Ø)=˜ËÇñ£/n¦Õ´Zq–jí€ÙŠÓˆÐ2¦wÀ@!ŠbŒä‰LAÁ\0˜[yë±zšÀÍNcð\rÄÔ*À@æéÞª~O0PÒTCCS? €3(÷ƒpg2(²æìL?ÌÔ9ðÒ|OÅ8â0mÙ`gTŠ˜š„˜*—È)\rÏ½/º\0è÷¢c(NÔ™À£–\0r¨)Ä52¬fÌéw5\$„˜¥„ÿa|1O©ý@¨5\n¡Ãº‰„¥ÙF¨õ\"¤Ã*•.ê`7)¥8ÌRÇ‡jœû#•XHªeHÅ²£üZmË(ÿCØ~FÊ\np@…anEœsa5/PÃŸ£v¬PM4ïH¡£â‚Á\0P	@ûÉÓöe@()À¤Í‡¾ÏÏr@B¦™ÉÜèepåWHƒ\"Hg\"ò!G‡DLbÁpø7‡r.­ßsð9’ÀA`õ™)S„Ô%—uî]ÉìÛxyÏÕšbÖjD5ÁäŸ£ðòÿBZX ëE€ÅPMBQœoð\0#÷JzX¤Y²!u%ñ†-¡kQ‡ýØ2ú~¨M?Ëtš¼G+E‰É \n<)…@Z¯'ˆ¤.†RT¶Ólk•ãOE-p9Ï²;?HéNv!¸3ÎNIAjŒÅöHœ&W„Hœ'²xÐÜ1E*…0`¨Ñ<0Ï=”Xô'Aþ( •’Ò^LIy)›Í{\"‚Z‰9ŒIðœ¨P*Uù]Â E	¾¥e‚h'DíJ©,ë£”_4R \n\n¹X/#«\$l»’t†¨ê“–îe“+Ò‡‘;@­W\"g€ÿ¥¶¢Ýb»W%ä­\0007F§\$˜p<2è «us3žûPK­Mµ»„ØPPD'UÌ‹Z´\n	€m ÄS¢\\”À:U¦UÊÓó+Î­sU\rø5x’œÞtÝB‰IÒ–Ë´S›`rN¸öP*èmRíFŒr¬FË—¬<G®ËS@-¤OŠ.PèÔˆ4VRÌ1ÊøR,µ›~I\rÌÖX/¬NðáÕ2f&\0003UÚ13N³QlÓVÄLÒIÛ’\r\$¬Å×V³ “Æ‚É&Àó\"ÍRNAÄQÈ3|˜Rw„í’V ùÀAà5¢.‰lÄuð*†\0qGÄéñ\"„÷4O•Lè9\$\0É6“ïjé°—¦Ã¤¶\0/âc­õ[1ÌpKÎ°< G=CKÜ\rø¡Ï’s1ÉÛÂÐW‡BÁIO¢´fˆ>¹ü4šm\"cÝ‹G7ÔYGšt~ÒM¹5w+/Jhmðµ^ƒMÆ«KAc*aaˆdçÄÓ‘ÙJiYŽ@5M|åUa\"eg&P&×TI='	IÇ~U•&Öˆ\$ß¼žì\r†ý©²‰™„š)%å0âe±(uH£íËäA6úN¨uNñ“}J´O^\n	³èSMœ_Õ.èu_šªÞO7ûï I˜äêSpZdòÉYçã5Æ0å-qA{öèä£÷'øÊ>‘—S/}>T¸Õ:_B““rrlmÍ»GáÔ¨·e\$Î¢æ|×˜UBü|¹¦N–@ä\0§.|ˆÙ:¼…&¼B\"!\n †õ0H'ís_Šaxõf&O,RòéÈK\rbÊdùÃçç`+²ÈcNº³[B\\Ð!²‚¬J²<¢äÚ©Ç;À*6ÙäUIÛ= <M.þ×ÜNü¾L%½ã=÷Ç¹nÕà°#I™œw–ÎLÏÊ&ŸŸ-\$áyCÈY¢¢Úë%¹çÓ3uÓ“Fé°A¤ X	É^œ`ð=ŸµÑúwÖ³¯‹ø?1óžIöâéùÁÖTç6ó üß[‘JòŽâW\n‰È&(|]ÌÐ9ÐPHß¾Äô…4ö¾†{‹¯v?‹¦®Ê§è~`ÌâÜDêbvâUnrbRÚ ÜvÖ=EÔÿ‡Ø\"Ï®ÆžÑfÎæÅŠ|äx1h¶þ¥ÐÂŒ,‹o¤ôÎƒÌ\$Ö„ÔæO1ŠçÏ\"è&ÞÂ+£hÉçRò¯\0úŽkŒ¢ò¯¦ílœ, !I&ô‚jÂSOÚ1+Œ01\0‚€†\\\"`˜ÛÅü\"j0Âl.­{gÒáXu@÷n>3pNùnƒL™D&°ÐõÐXû.Xè8a&”00˜Â2\"êšã^Ðèbp”  à¹pô¤+\$Jäæ#Nà]€¦eB\\RéïðPòQ\rq¹°‡£+Èæ?Ã].tó¬:±- Ò1Ð_‘.?ÅÒ]bAî<äñ\$@ø°âßgldÇcéPÌ£¬tE(@ú'\rq{‘~ûo\$jÂ`Æq”j‘Ç1 Æ¢ð\$Up¤&—+Ø5Q`ó±ºË\$,‹p{D B®Ñ­>Làæ}àÉ/ZJ šMÁl7m< Ø1Çspó.PpÏÐð¹ƒü\$°©	È€‚˜iMVE\$;Ã!#Ç„[e°à(œ&nÓ)NöË„GÇÄ‰É~G@ØcnPI¾¦îÆô§ž\\ë˜‚íšØŠ*¼@ª\n‡î\0Z8eX¨£føcL”£äø²ÐT«ÏNç‚ü¶&eÂ·ãÅBnPà^2|8¦•#]+#Œ>âvAÒº|í¢?§Ä/cX5Êp2­:L­<&Eð1,ª\$°4Ç\nc.Jb/’g,ŠèMžz!HoŠ’bÐ-ClžÒ˜4I&ÿQ1„p\n¨Þ&eÓ7Ñ€ð/\$åç~’m¼(‡/2“Dî%îXLÀÂ{êbZBü¹àÞé\rJÊlªe®î\"nÚ–deæ	ƒÝbM/ˆ1Ë@`&Æ<\$Eä6ísŒ7+äµ¦nLN0Ñð-«N´B6¯Îð&Ç&µ\rÛÓ&&Ñ99gDÊåÐâDPED´#à";break;case"fr":$f="ÃE§1iØÞu9ˆfS‘ÐÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒÐi†DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†LeCˆÈf4†ãÈ(ìi¤‚¥Æ“<BŽ\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠÐxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›Ž‘¬Ã'Œíöz\\Î®îÁ‘Éåk§ÚnñóM<ü®ëµÒ3Œ0¾ŒðÜ3» Pªí›+£ª€“µc¬	+£`NÂ%\nJž< LˆÒì¡*¢®¬©Šâ¼¢¹ë@!	†W0¨è¨<Ž\nT >c\nÜBpÞ6ŒLª:\"FÉCÌ4A,¨!/ÃL|\nLàÊ0Ž PŽÉÇlšÄœ'ošŽŠcËža•\rÐ)¡LqÆƒœƒ1JŠ’Ö5Ã˜Ë#µÐ¬*ìÌšÀAÒ#´Æ¦±´6ø0#¤üí«T²Ö!Š\níNaâz42£0z\r\ràà9‡Ax^;ÔpÂ2\r¨‚r—áxÊ7UPÅV’;!xDªÈøà“¾Ã xŒ!ð@ª\rÕÅ§Ãx@„%˜¢&6‘0‚ü©‰ƒ`”ÏÒ;g«R\$\"ž¾ŒèÜNlSÇ+° @;@7i'¬:O¬ƒ(Ø2cc'\\¢ã @7Œhè„·Õù#¢Þ6Oœ_ÄñÝr‡ÈÂHÜ1³eMrJ¤wA0¬£È³‚º22oÔ1Þ£-ûA°®ˆŒìåpã\0003â£=ø\nYU´›1í2X¥÷Ù†\\B ä®Y!SŠ\rïœÔûÙ•*»0B2©ðËW0‹à)Œc37ãPrP6]®Dçœã¦TP˜½£¶ŽèÕo“èÇÝW\"bžŒSª¥j\rÓÉS=ï±d9¦×¸Ãâ©ƒŽq¸·°\rw´åÁŒ–¯ŽŠ:ï{<÷[%È¢\"]ÈOW+\nŸm@W=;pœ4÷ÌqÀTä“ß S>è´hEé·©CB\\×¯Œ*t\"2nÇ­Ðz*Æ8p~³\n¢Ã—¦—ç¶°X¯\$còÕ^Ž\0ÝxÊ	NÅßU(Ý³ÀNŒ7û“¼öÕ|™ô&§ÖjÍø }íÕ'µÈüÕûõ;‰l@ÞÕX aL)cÎYP)I:¨!ØeCq}hD¬’àÚg˜‚Îk&Tƒ\$ @Z*)\rÁ¬„†b\\±É!ÿR*`äùÞ±\$)%uI(T²³`ˆ:Ü ú»W¤é25ˆÃ‚JOO3 ·ØAžSPë¬®À˜jR‚X!½7ƒZHÉA=kq…ŠX›âŠ™ŠmN©õB¨ß²§J¥UªÔ2¬dRV¤{1eV@ƒÔZWÎp6¥gœ›Ö\0a&³’ˆPl£²lR\\Ñ ˜ÌjÏÙÛ50°„§(¼‡R®CJ,°–6êîLºæBÈŽG¨2@P#Ô8;%¬AT\"†˜¯˜ÀæHCq%9,5ë²¸„Æc¦(•Õ/§dBOœ\nŽŒ` †ðîC!:P±­Dž3\0ˆ:zŽO½U‚Q	`u\r¯u’žsÉI“ŽæHTÂ9]	¥€uêä˜!äÆW9¤FœÔš¸îW¡Ho&L…¶àe[kÌ*AÁ˜‰\"b<ìyäÍF¾ÃŠÜ\rkªznˆ¥\0žÂ¡>{`š6\$,uRh©kÕ¹Â	Š‘±§„\$ƒ±Š%E*i=„\r\\©› ç±4@É›¸9\r6ôuc«pÞ¨Ü‘™f„ˆ¥•²`Ü™ ÁRee^‚›‚gî´˜šY:\\ZeH¤è!ÉR•«!ÿL	,°ÀÆÚ#Âø	á8P T *Í‚\0ˆB`E´KÂ¦úÀÁØM¬%-dÖÖI:*\rëT?çuðá=–¹ÂlÐ²p¯ÄRD\0SÔ*Üý“	fkÉB)d÷*æÅÎS‰‰(sÇàýÄèçÓ|VwÓ¢”rð‰ŠÁ	wfÅ;¸YžvJŠV¤†vf´y:èâã)kÌµ¿¹×xj›´pîÚí_ûÛxÒÊ%ª7…’2˜ûGmIpÐ2t¤ƒƒX\0é_’îOP“[˜ª.³áÔø¡¤º€¤d‡ @ÇIF*‰2QVDVVÎ‹uÖ]8†Uð0›E!ð™”s@©x“Ùß€æ\nSÌ=„°Ç¼-ï4\"Âv‡CÒo5NaY\0äÎd\nHxN%i¢!šSÃ!hžm.ÂuËÛÙzIdg²iÎåYuVÏ\rÅÁ ùíÉ´­ÄÒ\"8Ye‡%%ó‰\rK¿K#d™¢Õ1b\$;&\n®QþnEÛ,tš‘¹Ñ´!P „0‘‹ÎëG)A†>ò£}”ð9AÈÊ›‡ädoí(|¯1|‚\0^6jæ€/­¤‹R`e¥-Á­½Tž˜Á©s,1†4Àß;&/D”ÜîM'Ð	m›/n½—œ>áe[“s\nÑw^Ó)[¹q†•­<Œæ;µG&ø·Z]Ã'[«e6íë½÷¨ßfwrîwóÅ6Öô)\\@Áïw¸·ç:[Ûˆ»6¢³e§Û°—êÕ²Òa+%¤6²¦þnL&©œ–!§R¸w¦l=Ð#–)dCEM‹YNAÉ3Ð®C+Þù¶º”Ýe±8·@3-„Ø‚r±N‰Š;G«¥™ì}%îÉOØ‰Ž„„´^ñ…Ü¹§F èçÁL9^«ß¸Ûä*f]õ%†L«‚%±w†;ã¿âªNüvJð‡jP¾/(D(d}'m¤³±=ŠÏÉûŸ^Üz_%å8'–½™zúHÅŸ«GVµ³ûDç»µŽd&¼´¦L.MC*„X(kÃ·“	…µ_7M\\ek‰íµùïe’}šß•Þ¤9ÁT`…IXnÎ„=y¡ûZ±¸ÊïÖ;·ATý7‡ñ9Nûû;ü¼™ïlñPaÏV'þw‹Å\0ONñp0pw°ÿObükÐ%s,¯\0oö¾Ï'p4r¢†ÿ/&öæ+\"°r9°=îòà‚™¥äð\"z—Ã¶vð<ä¾píÒÚÍØüPb-\0pTÐLòxäÐ~æNÝð†ü¯XÏÏÐ\$	ýoRÜÎ\ni*óË\"ÐP°0P\"!P¿\nÐÅ0Ëð)C°ý¤Zp`æÎD„Žª£.zi£RÅÎ,ŸÆ°X&Ü7B|üçÎ(¨6€@-Âi­ZÍïÂ3®c&½ò/Éì:Îã‡F3FJ=-™çBèŽà{J:„O\r/'-ÈOJ.ìÄÍp 2Ìô®\"Q‡®õ…Ñ-\nÏp’õ»ì¹ÐÝ­Vv¬ø%vó&Ô¡PÔï­.ðAS¤ò0ËTó1´íñ¸ÿQŽ11fÕ±žÔÑÄù’Àlø|QÂ_”(næï…ˆÄNE.ò`Ã\"±BºcªŒ!DvVïõQ¨ÊQ¬ÿÒNñ½°ŒÔS¬Ø[bff	íO#CØ_ƒ¾\\Ò6br;²M\$0¸kŒagx2¦Ê?¥¸2l`brò‘ªñr%&¡S&â0\"ïü¡’'*I\"\$M#+û(Ã»'JÀ‚9&ÒžÎpVÏ(P?'ˆå+c+QË#ÈØ»1\na’TÕ²¼NpVÑÂNÒCÒv¾èå-Ò\"»ñ}ä*z²ÚÑï\r²/Ò?òé-Äp1jÕ³/ÆŠÇÅ6MG-0ç\$f@­a-ðÊŠ‡ä&Õä×/ñzà±¿2¤jÖ2Á0 	÷>Fc\nJK\"ùr È0Ù²X c:!0<×ƒ6mïÚ¬7”¾Ë7Ž,3‹ý£ÝGâcBÉ\0‚ì˜:-Ôñæ//D¡³:É.ªý!ðÌü‹,@Øk.\r,`5q%eÎøcÖ8kûsHzéì10ú¾&ÞŸÍ1c8¤:\n€Œ pâp€àR´°bÞ-ÔÚâ•8õANM\nGX‹ÏJMêÉfX]Z]çl2:g&ÐúÓä:\$Ñ2ÇØ&D\nƒ ED D5“áDªJ8ÓÚûÑPù§Ti\"›1ZE\rxuCÖ\r‡”ÀÜtqóGñÖF*3£>FÊ@;o)EÝAó¾ò‚Ä;&Ú¿éC´¨¾3ÀiKªàô·Js½KÏ(;ÃLKÓK”Ë30·MT¤ÂeöÅÀÄ'	ï<ø;eJÌP¤ÌÅ¦<Ñv#¦rg€åPŽºL‘dø ˜j«xdb•tQ«v«‚bý,à©®¹£Ï4ŠK.# ¬¼ëH·âXB\0ŠàØKÄËåÈIŠ×ƒ`ÜÆ¢º†ÐºËŸ=†2ŸÏíHŒWöa¨ÂÊ²¨Ðäö	\\†3 ÞÝÆ.=‡ª>`}àÜ";break;case"gl":$f="E9jÌÊg:œãðP”\\33AADãy¸@ÃTˆó™¤Äl2ˆ\r&ØÙÈèa9\râ1¤Æh2šaBàQ<A'6˜XkY¶x‘ÊÌ’l¾c\nNFÓIÐÒd•Æ1\0”æBšM¨³	”¬Ýh,Ð@\nFC1 Ôl7AF#‚º\n7œ4uÖ&e7B\rÆƒÞb7˜f„S%6P\n\$› ×£•ÿÃ]EŽFS™ÔÙ'¨M\"‘c¦r5z;däjQ…0˜Î‡[©¤õ(°Àp°% Â\n#Ê˜þ	Ë‡)ƒA`çY•‡'7T8N6âBiÉR¹°hGcKÀáz&ðQ\nòrÇ“;ùTç(^e†·ÈëÉ:àð¼3„ðÒ²CI†Y²J¨æ¬¥‰r¸¤*Ä4¬‰ †0¨mø¨4£oê†–Ê{Z‰[îê\r/ œÌ\rªR8ƒ\nN°„BòßˆNÂQBÊ¡BÀÊ7Å# äa•­ûÔÝ`P§4©Ì”¥5*ƒ*÷D †ŠÈC\n:¾,´ªŽéÊãpÊÙ>\nRs3jP@1¢³;@òŒ(ÐÍŒÁèD4ƒ à9‡Ax^;Ðt(¦LÃ\\¼Œá{G?ì:Š…á¬	)\"AÃ xŒ!ôH1È›ÄNH¦(½M*h)Œ©\0Æ1Ä«êS1EbÚŽ:Èä:¶HK~&ìjŠÜ5-ÐbXÉspÞ7È˜Þú¬4Û1¡µ8Ä<´ HKm[Œà+ƒ¨Ú¾Pº7qÈ¼nò2#7NLa\0Â:ÌiñB§N\0P¬º¾I*¦2ŒÓ“ÉXVU¢*ÇˆÏÍi²@P‚3³c<)ˆO¸ÆÇ¢ª¢\r¦®3\0Ç¨cœÚèÚã(&HŠc¾&\"ªgSª	ºÅl5œH73%s…42Þ®Þ±7d×šÕb`0ŒL ‹:¬­˜4ØéH…/àjœ]êúËr8Ž£,œ!³uîÉ³7èÖœë«£“0ëòH Ô5P|WL¤©;*\"ë´¶{¤îSÁºç£žÞß ØMjß³ì«G›?³„Ì b\0P¡3°ŽC9ÑfØŽâïë½kµª§5âbENÝÊB¯ÚŒ«SÑÀÞˆ8ÓÔöpÇ\r\$=9v]]:0öÁp•÷VýHìwÒH¨7}Ð†)ŠB7f; cd<(Ýò¼W¥i¥}nê©¥c2ò6³×ziÏ¥ã{îHL)#¬A7–0Ìƒy4\n†7³úý‰I÷=`€ †ER“š#¥”§TbžÑV@ø¨Òœ`Tú¡BHQ`?åìr Ì#GÈ3CälSkF*M9¤²–Ë©§;\nÐ8D6!hu}y;°DôŸò€PJ;¨h,v\nR‹J5G³u\$­Tª—o‹YçÂ•DOHÂcf¥X×ƒæ›Q	I)g‰”“@‚`¤y‰ÝÆüŒZª1ÇðÑ\01t¡8õŸ“×ì^@,@þ…\0(opGð‚¬\nMÉ¼*h@“²<H‘Mœ3ªˆ„jI\0gGpÌ“:£úWÃ¢ö\rˆ„;£´\$fÊnV…IÔF»Ë/…ÐøôD\0Ù(Ãä/˜¨ vz!ÉO0¥y\"¥HOÊ]cd‘¦¢š‡8 >\$¦ŸRR½×¡!*Ê½Û–\0jM‰0’&è¤¯ÇHÀÙA*‚‘]D–;ƒ AÓð8NÐ‹^<ê	áL*02rê«<L•ô#¨mÉR~pºx2˜^cLÙ²\r!Øý¼’*KHAèaè?µŠiŒèb9§å”bºk]£F0“’vJßa…ÁRLyÈI˜\0*„¬É¥ò¸Ì v4Ñx9Ô’xgz,n™S6ABp—h¹Z‚–\$M‚C\nT „À’‚R“¡<'\0ª A\n·l‚xR\nUæ½×ÐˆB`E°u¸Š\"–½W*ç7öU÷P@Ò	\nelÄ¦‡TxÃ…3b/©‹Rƒ”w]¢ËZi¸”¢élªÔï.…ìòWÌ¢{[nn.ˆÄ3ÎœŒS=·ç`£²½ë‰y\ryãÏG\$ÂÚÓ\\nq¶›³pî¢+Hè¼ª›Cš+_åé¨’@šþ)R)¥FnÏCä4ŠDEøU\$´˜*Ë²U±x\n®ï¶GAš³ÖD{Xk¯6E(ÓVßZÊq­ÁQÃ¥¥ÓQIÑ<\\eÔ1¿“*Â=ª¹D7÷Ù[„Ñ|¯\$Ã\nNk3Ã|ÆÜáãU•‡A¿b4è’åÄØVq)H™ô2öÊž	;“\$`ëX…i/>„†®PùHkÒ’âÊö¸Æ‡8Šz“+\r,X=P„Õ-ˆS6¸ô#?v¾ŽWÂ6½õiN¢º ™.õ~3«½‰@©\\B@ meèÓ‰ë.Lèpo²ùž‡\"_`)’3Äl‚\0^ò§Óút–†ÀÃ¨PN¦I)”Î™ô:øB…Ù=mJl*h8`¸êÍ7«õ‰ ÖŽïT¥¥í®vÖræ4àz6‡ÍyþØ\$ š=h5¯ö–%ØPK\\‰ã¯6±Õ¤žHë\rµ¬ÜÍÇM~kí3*z™q¸Öé%¾˜þVÊ:ð©äžÕ5ÝðW^@s0„~Al\"i”j™ÊUXÊ„d¾ZíUCÄ¦^†\$\r»w<ìáåÞÏ‚Rî˜Ýék¥*Ñ+¥xraÒÈ¬\$\$Ä^—ë[.Üyžœõž±míË+ïþ+Ìë	¦UÇ%êFDÆM‰“Hœó¢óüû<ñZˆèp£›î‚±ZÁ.êp½h™~ùá»Ã²Ë4nºoÕÚc2«ýÖsNŽÚ\$æ/³U àˆgŸ×bZ9âQ?¤¢Òì¦½çH¿˜gbF|¥\\ÝÄHMnK1·¢!‡£ä²2ì³:`\"ÜÌ­0e²‹·¨å>ÂK]WYôSÖÌ/©»ds¯ûQv®'´¶K58zeîfµ¾Åœï¢6<ar\\'[z˜½¶uyò¾7Í«€Ê„3®ùá\nþì=ljµÅÈ×z÷ëõ¿µ÷¶µTûÏcþ\$´bù×¶ËUjþÕÛ“Ð½?óËŠGû{_ò«/ö¬ÂúŽÍÒómŒªbôÖ`d¨NvÈø\"Ã&~…H3…v&ï,vB†ƒüIŠv\"Ï0M§¤ØÊÔ\\Ê¼õHüÊd`~J\"O(˜G†š¦ð6ÊEúoèË£~ìðLÊB¾Ä`Ú§CÌl²ÂðHXn°(¯lY\"Nþ‡	,lÿÃ’0°”ù\r\noJø ,,øèïvë/zø Ëh»®ÁÄùÐ¼7\0‹PÉ\rPØ2/<Žt¤&Ç ‚h\$€@äÖ¬Ð®úÌ\rèréÐ¸/!N˜4ñîéo“1q\rÄa°\\s¬ª7#‡Y\r©ØaÏp‘4¼ñ8Ï¥ÒòÆº¥ŽÚ`cê3îs	¯N ÌJ0	‡\n©FËÏïåœöÑq‡‡Œ’9QgQ=‘r˜kÞþ1)Â7ÊÐÇ\"SQÏ„êQÌ¬Îbðjÿ‹ŒÀ/1 (L¾ÍÉ¦Ä‘ÏÑŒÍc*\n†Ì]p×±²ôÏŠ˜âõqyð³„K A PÆ	´&\0ÈÏºÀ‘2¤t>¬zÑ6äGìÙ¢†)ÃBÕ*5¨ ,2\$óÃzÇtLbNK§ƒÒLèÂV-bíÀTî}£û&Ä÷@†H@Ø`Æ|ÀÆ“&£1T`-¢GcD\$ßâæÖ”#pNxÀÇ4¯À¨ÀZ\rHüDßmg&mŠuR¼…¤\"â2C)N\$'\"Å'&îªi1¨G%b6#°I2oÀ=Î¨|ÌØ¿ì¸òiÿ¥Iåz4 A(°j\n\nÈAt3â‚Äh¶7ô˜¯W2,<`¬í~f¦…Fˆ<Žd(ï¹íŒìé¬X‹ô¹Ð¢?³L• à@AC5H5Œ:ø.u4sW-ïÞ& à)Â˜Í³bñë¡7D“4Äa\nd’c&L7V Óˆ¶NÔ´o>´¤Âø¤ôª\"áZÉ†T ŠQÌÌÀÞ”Â>eNÕD¼æcµ|6Ã\$¹=Ï«\".’ ±º2³B&C5h%EðÏ~¼\$“?Óç5ãV‹F\$Ö¢³bVI¢6vo&bà+àÜ";break;case"he":$f="×J5Ò\rtè‚×U@ Éºa®•k¥Çà¡(¸ffÁPº‰®œƒª Ð<=¯RÁ”\rtÛ]S€FÒRdœ~žkÉT-tË^q ¦`Òz\0§2nI&”A¨-yZV\r%žÏS ¡`(`1ÆƒQ°Üp9ª'“˜ÜâKµ&cu4ü£ÄQ¸õª š§K*u\rÎ×u—I¯ÐŒ4÷ MHã–©|õ’œBjsŒ¼Â=5–â.ó¤-ËóuF¦}ŠƒD 3‰~G=¬“`1:µFÆ9´kí¨˜)\\÷‰ˆN5ºô½³¤˜Ç%ð¤n’Ëô½(F½SƒóRsxä&!;èV©Q©ÍA¯)öÖ`–ØŽâ!§½Fçq	¼î¸\nÓèô7º®.|—£Ä£¬µ¥pBx´±+Ù®þ îJº,¢ÖÕÂÉÂúÁBÉzÕ #¦ï?KZvœAÍzvñ°o3 (Kš†1p´rúÇŠ®S5éìl½‡ƒ@4C(Ì„C@è:˜t…ã¼´# Ú4Ã(ä\rãÎŒ£tÐ<“Hæ4óPD¥‡Ï+ÚO‡xÂ*HB\r'e@)Š\"`Ó6¼	zž“’µ{šÞÆ©3Šù²h;¶œ!‰\\b—ÓÓü†“&tûí´j\"6èA\$Âñ%È Èð!02<Õ¦±‹÷°1b€¦iª‰>¢t4‡HËãpÛG‹\\NòVå%Hšî‚ •¤²\"züÔt[q¹®S¥´k^·Ó	ÃäOÅ©­(€ÚÎ™¯2á#ˆrt†ÕhêL[‰Ü’Õ	;Hò(õ2¦!)&_±Ó\\Þ5ÕdkÆ‰\\mK«lN,¥±‚7\".6@××L2òFiS»k­xíXµ¢…æŒbÖ†Ú{\"gµK\r¯Šq–Ò¹„\r“äX5&C ØÀ§©[„<—B!vNØÓm»´¥ÕŒ'™rw°*³ó‰!LZ—àdûìÛj<ˆ<a-g²]¶Þ›`È‡9©“ ›“ë²Lè(2^ˆ,\rƒG¬”ˆ'®lcW<“¸ê%ÈX[.Ëóå¹ëMÑFÉ2\\›'Îc˜E:á²	<Ïar6„ ¦»Nœ1\rá(œRºNÔ…)É¤ñkŒ×ðÍš¡Ô£¡R„Œ™'J”©+KÐï.KÓÅ2LÓDÔ2Í“tá9N“²JÄP¹GÞOžCÈÆ”rÕ7)õÃs¶î[5.GÕÊ6Ó†tòŒTMŒ–²NÉ{\\.Šˆó¿£\\DùPA@\$\0@\n\nX)4Ék®À†œSc‰€3‚\0èÁ\0pA¤;ØC8eVaÁ2‡@æLG\rÁ¼:\0Â`oñ	ß@\"Ô²’:s™ÃòfÍ™Šó_Î4x¬d‰y53¯Xµ(°\\xÁ‰;k².bHŠY†x%6Öà}\\4q;E„ÒêŒ“U_ô–‘ÌH	Ü_5Š¼˜5¸VŒ`I ËžB{™tq¤œ…\0žÂ¤o#„”‡ˆïÁk&¢ˆÉ d¤ã–rN9’\0cËˆ!&=äEÂ®Á–Ò)”*BbL@Ä²B8ýb×‚ŒJ'>‡B-ÓN‚Xë¯=³%Â<á ‹d‘°µÎu ZØ!®x*Üš^ð^9j'e{,³¸Ó`GÄ™@™&x`M<Ñ&ˆÒP‡…4Ú¿0‹R31–^â^\$Ð.Š™&¼Ò¦Q\"üÝÅ&ËÃ.cq…¡I6/E©ZCÄõ•Òç8%Ž\"Ò±Œ!ˆìàµ±(RJY]ËâI	¦	89°5J	º{Q%mrq-’ÖŒUJgRIa³šO^ƒ•0t™1ÒIk!Ìâ09úZLÜ3c5g|À¤A\$Fë\n1*d¬š¯´¨mƒo”NÒàÏ—ð“b§F‘Q5kæá…g,œA×N+uN9“3–VE.Wg¥~’0¿W¼ûB‹EÃî§K£ôa‘›þé‰agt‘¨C		öE¶¼N	j(C\\+?M• à‚ìÚ”z`L­×!7Tˆ\$DA ©0‚­É½:%ïÉ1/³ÂTÇÃN ÇAtF¦ÔpËRDA×¶ë3tŽx/*þ*Ì€¹³ëD‹P¥ŒEâ÷;ªQ›jè%\nô˜JóÚC&L×`ÖÑ†DLÎ°Ñïâ<Â„f<\rÂKù’RéÌÚ¨Ñ=º†µ]GEtæ3\$2ÉÇ§PJ1[EÍB8¹L3'ªºûŸQO”PæTnóªvÌ¤CO\\µxP´ð`Ò`çŒ\rÌQþ\næœ…\\Ù…ãÍÍçdˆZ•4øh”4×¶‘D²‹Q-?Ë4ž¬ó™@PDA¼8²'¡ÙþA@‰	é\nZŠ1gThÅè%0@lU…±“)èTZ.aƒÔGz7‚\n+j@¦y :RG-ÛÍdÀÝOzP¹f8UOkm€áõÑƒÁ6r‰ì}„z­NÅ#1¶Ù\\Ùe(rÎ»/lmC·©nÁíÇ¸ð“,…NË‰.= ±½½	}µ w06tîÊ27õÙÞp	-ñ´vÆôß¤s¶œî²—6­l—À·[ãdZÌü GË2÷OW‹‘ÙÅÅU<è‰éä:¦ÂÞ5ÕÃjäVE›ùe&¹qšØu~¯ÌsäÇxšÌg.°¸bzgìƒ¶_…+“Bq«ÜàÉ;t«|oVØé\n‘¶ðe¿oZS?›`©˜¹hG)¼0=t“uýÁD»!ëýXåØƒ·ÚHïX¥ÝÃ?¼ÜøÙÉ3Êwj8@è˜¢™¶—7|˜,!¹m®ßRÛ‡ø	²•xè7ïÅÕîCäâ¶vá}^–½¯*¨ü¿ò†-\"_ï%DõBþÖGˆÙ¾`Qšßð¹·i¶LðË¶åö>ß¥ÏmÏ³|æ5RžïnªO\nnˆ\n»^ãÈù•Ü¾¤ÍÖ–—o\rô¾På¦Ø›aì–¿µä8;m¿tžÚo¡i>òÔxywºo´Vm>?î@—€Q*vw¾gáÌÇCi½ÌÚBŠ0l®qeþ»«Æ&	æn<'f\0005ÂZ:¤Àˆ._ïc›‹ºËíÌÏNÂ¾kê>¢R†@ä\r€@d„ÓDˆH#n1clDcl€Î2LR>†âfµü<`ê€Ì p»­ÜÈ&ÀgƒPiÅœåLöXfÝ\08wO=¬NVÐ ¼æ;ðr-mÜ2DG+ªQK>HK3¬=\0-dYEp0Å&\$Æ¸!Â<1\rž™FÒ@„¨Þ#eÊ‹/4âªÍKò/¸Íèæì¨¶¢Pü²©Î=±\rOg&‹‚#ÅšÁn*:\rÌlcNœ‹\0Íñ ‹Šî¶Ãê\\I<lŽ¾pq9pÏÉúõn6@Î+BäÂ7,DzÖœ>ÂÂ6f¢]:çâ?mêAëý\0b~â6«Ã—\0000XŒ­š¥OÚiâ9E©\0001Ž]±t;¯Ök‚@=(Vx‘ kp>\0";break;case"hu":$f="B4žŽ†ó˜€Äe7Œ£ðP”\\33\r¬5	ÌÞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)ž£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dÞu'c-LÞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6þA»•«ÁpØ<W>do6N›è¡ÌÂ\næõº\"a«}Åc1Å=]ÜÎ\n*JÎUn\\tó(;‰1º(6?Oàôÿ'ï2`AJ–‚cJ²92¬3ž:)é’h6¢²­« S•µxŒ”5Oëþa–izTVŽªß”#h\"\"‰@ñ##:Ä.è£d·‰9f=7ÀPŽ2¤ªKdï‰Š¶œ7£ ÄŠ+q{95ŒtF6D°„	IC\rJ\rô¦PÊ¬BP«Žˆ\"¯£=A\0äŠFAâb4)0z\r è8aÐ^ŽôH\\0´+º4\rãÎ¡ ð¬Ã˜Ò7ÁxD¦ÂHÚ86Ì“œã}¢JHÐ‹·!\\ÖŠbŒš¬¦â Â9;cbKƒê5¥Lk¾'*ì”‰–i æÌ/nóàŠ/©™gZë¾a“CRB««0\0J2 É èÜw*‰sÝ38Ô:B{\r_œY<›*3,[ê Ž¨Úß+‘r§Mo¨ˆ2ŒÃê”„°Â6£(%¶oühB0ê7\rcÓ\riÀÎ3©<NŠâëžúÌã•_\0\ntˆÄ˜©rç-ëÊV5°ƒtv5Ò*±CxCå´BÔ Œ3Àb–-cmxcÃd0í¸¡\0æ1Œ#t=[6Þº¼LÎÑÁÛ+“2ÊR£…k –Ê*ïŠj¾‰EÃ3mCÛ²c\r){¹í“<«­oÀP Ù6 Î4Ž£hß’ÔC…\"½èËxŠ<rÕå¦¾/ÐÍÁÀü¥FLÛt_ÄÁ£¶5	; RRÇ4ÍEvÖã0Ì !I¾0úM¯¨¨7µøGYS#¨Æ1°£˜Í‡Ã#L…‰ä<¦8Â»„åÒ6®øÊaJna‘2Â®ÑÜ(@@!ŠbŒ˜Tæã½–ap@%­ƒ`È¹(r&!…:µæ\\²CÅq—ðŠ¹5L€¡)d¦ƒpgF äõCœSEÌ9ôjSê)€ˆ@ÜÁ Ê¨UG†°Â©ŠJ¡©GªeM±ÎNiÔƒžAt Ç?ˆ=°‡0æÔŠä®p4”€Èþ¡:|a‰ý@¨5\n¡ÔHwQpuG©&¥bš˜SJqO**©NL2Ue1V™¥`@ÉÑ„{¥(Œ‡'ŒrP¨m†°Ü„ÊÈPk‘æ©°Ü‚ˆ@g.E\\ì•£Y‰Bˆ!¸4œc^`r#HD&àœ]å“{%™Ã<^Ü“Ú j\0%\n”‡XÄÈù7jp…0è{•‰±6fÔÛ®G:)Â\rÁ¼¥15|Ë“ç}.¸T¾Ã,‰‚Qrr“ÓþÛÊÑLhÆjóè¯&È Y\r(”.FÌgÌ„€é“p’DCÉ§‘šâ•0ÑÀ8E 8±PæRƒ0r\$°n2BS4ûƒ¾˜(‚‡\0Ã\$•ÉŒCZE Â˜Tœ&ø¾õž-šÉk’Rµ–UÊAÊ‡ÌF½ƒý=ñ0U„ÿ•föE`Sµ\rrpµ|£*b\r0iZ„Âe3ˆi&!*K†º¹	ìÏdÊ‰	€–x\n	%ÎIN\0ÖÃÛ\$ª æ°ç€ª\"PV{{9mÇ¡l|Î|^+Ì7‡¦McŠlE&«hz^!Á‘2F.Â¢s3­1:EßÙ'>€(&0Æ›ÉIÇa¹÷Ðú¦éÚ›ôÙÃž”m©ž¡¼11+nêSAÂu®¾R¸H9p;€®\nÐ€ó\rÍó“AXÿ3,Ù(Ã-ZMBARÉ[Eð¦=Yl/!o1/\0Ö^–:ëÍu«ò¹””Ü|]d¡L€±i†¨ß2Ó¹Z‚H‹\\Û}vÊ ¸RÀâR«E\0Á.ChC¹Y%%Ï­ZÔÎ¢œ‡ÃåÌ<7…šýÖ‰ßÊE;²À‡%yÅÆµ›zÝ\\+‚H‘¾CdÉÈÑðÇòJã«= H6fù¢:f.Od+TR\$ù\0 ¤ÀK½Ò³\0Ñ–ØÇQ\"@…XYÙÇgî0T\n!„€ACHÔ ®Þƒ5£w3æÉú\r,Þ¡`×NÙÑ íyt‚ò¾ºH°r]“Dè¶´¤m\$‡Ðhñ©£[ŸtÜe,0®ö\$õtD§Ü¬¨ \\m.(úåµ¨¦'šp:t:iò—£5GÔ…%\nj%ªô¦­ÒÌ»L•}6j´ðaÔâê3¯	¼§2Gck5Þj‰Ve£ÐÈ}«ÍÆ~Òlð›ÝAS±õ¥¤'¨9;ðî[Â2&D¢¿Z“–ÅŠ†ò´[Ôëjy8&9)·Èy+¥ägP\0W¡ˆéÖˆJTPÁLc»é€¼Sž³á…¾ÓuV²¢~€Þ¤¦§=ß¢\$ÀNã„>5üå¥áÊìõbZ'#¤•Ì#°Þäáo•‚P·ëù+\r†±\nÓ®]ârÐè—ž®Ð˜Ìo'%íjÎìÔ–û ZØÈ9°øÔÖ£¡¹Pð[jl:èOð©?.H˜à‚_žð\r†IeªprŒ#%”JÃÂÜÇdJq•Û¤èJ,R¼\r6VìxŸÈó-ŽbÖ¿¼b ‚K¾\$üu×û¬vÐèIÄ•¢Õ¤¼Ÿ­†œ‚œ5Ú‰Âuu\r¶àÛ§ýo:—²7¡“Ú8tkäƒ×KòöÑÕ:\"°R;'fø~ÎÜâe×Œ~êÞà¿·ÜßÝ;%}™ºýœA>‚ùá Ìœ¯1çfü‚´;kmC³uÖÏÔÀ'ó½ÏÕùvÌ<ŸÇRëßêý#&ýoÚÙMnÑïà6OäLj­¨Ç¦·¯«gÜ­àØ”àë¢l­JÙpìo¶ëã®LZ:\rZi(Eèrh^¤§êšbô3L1€Â‘Cl_‰\n\rgª&0L\$10V‘O2Ä\"[ÉU'ª<döÉk2t©¨š¤£¯ŒCi85£jÉýlo¢ÞÅð|ë,<º<t®,°pT°¬ÌÈæø'.ÒYO¿A\r¨r·p B°ä)P<ì¨YS\rË”¹‹ŒN®4Ë°÷#>ËŒ\rïÂøq0òìÌ¶#ñëZ;ñ#þt¦ø	b´‹¦ØÆ,	°†kÃ\$ã*gŠøã£:B¶ç…„ý\nú¢sïìë‘NÌ°œF<d\rñ*µx0G\nŽZQzd/!\ngHtÑ,\r‘‡±3Ë¦¯ˆ9Dî9b^îâ®¿e\"t£ÏŽfª%ñ˜ûPô0¿Ð.ü1É\nnÄëâo‘ßÑ¦Ç°d`ÑÄú£â^ân¯MÎ/ F\rëŒzÊ¦È‘bè¬†#Q.§!èKes\"’Ç²1!¤­dwìç‹DK¬ÆE\$LÂDÂ\$ÑÛ\"MæKŒÄHQÎù(?`æ3q<ÿäÞƒ)'Ãîg‘ªæ£Vð†X] Ì¹Ë¡\0Ê¨®”/í(ã³)(u)ƒ2·ÒŸ))R¨Ö¯ª	lÈšk\$%njãIÀ\\m#+b\\ŽŒC\rœÿ­N]2Öÿp-Í.2ÚÚ\0e‚\r€V£/‘E8¨F\$bƒZ\$ €Ì{&àŒ«	¡ãÐ{©À\n ¨ÀZ>/.=Í¼ÿJÂrãÿ*ÏÞ{¥G44S=4¥y4/ª#Â@\$BH\$†'æ6k¢^&.¨hÅà	³71,¬MaBñ€á®r0òlKÂ~¦†´çª<c‚bPštÂ”+GÝR‘Q)â(pBn;z@;žkH\rê rB c|I“Ì ˆ2-am,ktŠÌºYnPâîÀëR^0Ãˆ³ò«ŽÂäÄj3i*ø)<¿û@FŽ'Â,èt\0¿!B‘QöW#ˆ6Ìr5cZ çÜ°©Ž|*¤4 ‘CÇìE‚Ý	PÀhÀÖfæ½7ŽÚÆ\"ŽÃDÄ†˜æ¦Ù9sûÏP^‹¦ Æ§\"²t:bb?ëP#ò€¦¬!W(\0”5e Ì\0Ù?†nÇƒ2-a¢ô\n<t+ˆö¦oKµ'ìb\"«Xe‘êº+²‚²\r²€9´\$‰hG#:ÐbÖkÆ\0à@Ú\r ";break;case"id":$f="A7\"É„Öi7ÁBQpÌÌ 9‚Š†˜¬A8N‚i”Üg:ÇÌæ@€Äe9Ì'1p(„e9˜NRiD¨ç0Çâæ“Iê*70#d@%9¥²ùL¬@tŠA¨P)l´`1ÆƒQ°Üp9Íç3||+6bUµt0ÉÍ’Òœ†¡f)šNf“…×©ÀÌS+Ô´²o:ˆ\r±”@n7ˆ#IØÒl2™æü‰Ôá:cŽ†‹Õ>ã˜ºM±“p*ó«œÅö4Sq¨ëŽ›7hAŸ]ªÖl¨7»Ý÷c'Êöû£»½'¬D…\$•óHò4ç£2éˆ\$îïÃE’ÌN˜“)¬ç¡7^èòÉtÖœs:À¤¶ë¡Ó(³	HóJ8#Ã;Ææ :T‰'03Îáºõ¥ÈC	L\">ïã(ÞŽ¿ËPˆ0ŒË€äß½ã(Ú×%lN(@°;œ€­N»ˆÙ.\0Pš•Ž£\\u\"Ð ä6§(ð c@ä2ŒÁèD4ƒ à9‡Ax^;Ër†6¡	@\\7ŽC8^LcÃà½¬¡xD¤ÂKVÌ7# xŒ!óæŽ­Þ23ªÇ\nbˆ˜4´)h Ë)+@æÐlZ6÷ŽQë×Š¬J¸5l»½J¨Ë‚ä£tB“&Cª>T#š%ãd?@HY8¦@P’7\rr]hù	ã¤>/@P‰&#¨ØŽÏ8ê2T:Ò4B2B3¯`P‚3Éiª!Âã ÒŽ'(¨ÖŠ´ˆè¿7#­\"Öºë‚\"('#T§½¨Š&€¼¶j[ôðÊ6Â>•jP„.	-&Czæ¯m…ÉKT‘½SH×9¢ê\"Üˆ×dLVÒââƒ(Ë3™7@÷f1>=_Ãf“¦ø¸§’C…hXñ;Ä¦LpÞ3ËHÜ2¥¢]ÿÄâ ÞÈÈÔüøŽ£Æ˜c5€ã:9…Šxä<¨Imá,ù.\rÍ¸ÊaJ[«cj†)ŠB2ž¶\"	 \\	cK(6ÏÍ ÎÓ\0ÛcqJZPÅ¯x66j›Û\\&üŠfê·¡\0‚2n‰FÒ1¬«ØÈ”C%É³XæÃ\"Ë`#óœêº&ûTí…4 \\Â,¢ìÉlw¦hÈæ9Žóø2–2pý”•&IÒ„¥*JÒÀï-uèå/Ì3Ý2ÌãLÓÛM³|TNS¤ì¤OÔø¯—nm!5—ðKB\"=ZfÅ—#¤Iº\r!˜–„SÜü\\€-ÌÍŸ¾@P'éoHNAH0d©ÀË+OeÝÇÀ&eL¹™©ñš‡BniL<ê¸;Ã²ZOq›*\0˜†‚è~J1˜U*(:†ÓÐ‰NH‡¸ÕEXFãÖñ='äåÃ äxO i\ro ¤Ð’CÃÉˆ'iò ‘<ÿÍ!7IaÅež÷ û¦}-<™š2<®eÅ><™ Âf A a@'…0¨½‘Es„Ð˜¾·ºjßQe¸”„Iäé;Ia¬¨òÄƒ0i\$œùFÐÑäA±3Ê¸¡”\"M,räb‚¤\"')ðà&6¡#üeÁÉ5BÖû',Åˆ¢­Pž\0U\n …@Š¦ø &YÌ‚paH€‚n*ùã<ÈÌgD¡f¯:™j\n“ÉŠ2ãBzdð1¨‰.¢BwÎ¡Ögˆà·¸HšRèœ£9`Ë“³DT3Cb¬¢Iæ>FÌ¤¨“#%  h\n\nÆ¸¯ó\\\\Y\nÄ¢Z¥DîëÐÙA^°bB\"ÞTv0m¸4XHÊi­U“vSVt^CÒÌ†­»\"Ã1áÝ:¬‘ŽBÂ-EÑù¡2‡œžÃ¹ŠC(wAŠdÚ Å>­ÝyîcQ}¯S]NAÎ“ªmKW6(rƒtØ(Eì³#¸Õ5\r¬QXõLÊ—	E2D¢Ó¤æV‹’#@()r¨i­Dhå›ÀDbw°T\n!„€A9›i&<7¨ó=b0\nçIå=Y”Tà€‚–`Ì¢²¹+~²pØÚ[’¤º2a!µ#‹ü- Vlÿ°–¶zÈ²Þ^FÐ Û²r˜94Tq€^«ˆ®#\"¾åùA¥Â7 ¹\n¤ˆ£‚lÁˆúÓ\$n~ùbv‘\n…íXF;MIøS0tÓEÈD2†*œ†oaÇ>ÄD\$?ˆÔlCV'<W:ó˜i«£È\$e… Ò„ˆ.-)…ì4âê¨+.rg5Pª;ªæhñÓ:°UQKå}	Ü§T¡§&\"ù‘èêÞ8…ó	P2å“î¶I¤Ùæ·ƒª–ou[3eÒÃˆÑ-žå¾«\0¢;c'‚šº…	à‰ ó!KÀ9äºW4ýÐ¥èµg9¢Ö¨NÏJØ€¯\\Û}CNipÊÀ7Zñ_ªœ±yðSB™6¤…ÃKæ,–K¨Ì’Õ«x‘ä<‰É£«Ve1œ¦»Õf	ËæÑš«\$ó×Ú¸ú3úË²ÖöÀ.Œ—Yé¼	š5¶”»¯H®·b2÷aTBoZ®íP·€%Íy³c~ÐQ9(únÛ»Ý.òÓ[³wX½ó±s>o¤íEVÍ+\0ìæ°eTð—I©XÑH¾áR#‡Ô.0˜ð³©I¹â©o×ÓÜ„%‘6Ï#†Á¨·µŠ›Fû/f^:x™\$°Åz¢»\$Ð¦Õßy®ºb+ç±·žcçûkjí*LÎ'—@;ÁÔíZ?«ú¤‡ß[#¬”åÓ˜È ¶§§‘¾Æ‘‚jÆ¡ux˜v°¦žCIÓ`Úì_ƒÌÈs-í{q·ï.®};ç^à»¡ÚKMàº?ìQ±õ«ØL™c‡k«²¹¦µmm/òP™ :M÷J*0e§?„óÕ·¤ôÔ£Áëþ°½_BÙ…×¤¼uIÈ¿«Ó†—¿zŸvMúÿ¯ì<SÏù_ˆ°lpi²£1üŸ—ÖôßÎ1?8×²e~R¦ó?bÈ\0 ®„Õ7]Áî|Í^Œ	åúƒô~CÉÓ}}Ÿ\rìxbî}nU97/ÈÀÞ¬ÄÌ\$¸eð/Ë²WÂàgLJÈzìš_¢PÝ%J¼\0†?ÀØiùB,,©|Y'84F°Oh&m…% Œ˜‡&ÂNn‚\n ¨ÀZÄ±0@#ëÜÜ«¶ÞIš}k„‘ääJDg\$u\0Ì+H_æNCðÈÌ;cÈy&³\"	(h—EDG¤ðÁ&(Ó¢Šä­:%£¤(¦²JÔ ÃHDà˜\réz\r¤À1Æ/â†:Þs‹¾ãë@æ¦\0ÞBÄ,†¿0ìÚ¦„_{ŒØÞBbiÌÖËïzéQõ¢v\ràà*ˆ\rŒºÍŽÆ¤5¥¸ÉÉF¸Ç\0šx#ZÛ\rJqëV9±D^m>¯QJ^¥-`º*d+ ŠªÎ/Â\0­ƒˆîhÔ&.æ0nHæÆ,¤;Å€JRØf¡qB_bHÇÊØµOtC ÈBFt^ÆBIX1*Ô>(2\0";break;case"it":$f="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ŽÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	ž¢ ‹ˆ§!†© 4NzØS¶¯ÛfÊ  1É–³®Ïc0ÚÎx-T«E%¶ šü­¬Î\n\"›&V»ñ3½NwîÔÃ0)µ¤Òln4ÑNtš]¡RÓÚ˜j	iO•Î4AECIÃÒ#ÏCvŒ­£`N:¼ª¢Þ:¢ˆˆ\"4Î\0@´/Â©\nC,#Œ£z(ûº­T€*c*r×°L°äìÁ/Ð cºÐ2AðˆÄ?BŠ·kèôó¿B`Þµ\$£ƒœÑãô&@ä2ŒÁèD4ƒ à9‡Ax^;ËpÂ2\r«[-8^ŠÌãÃÊš¤xD£ÂHÚ8\$	˜èã|õøÐ¼´ÂPŠb‹¬ª%¢³TÞºCÐôð4Ì-Ä-£M˜*c”: kòð½/‰ƒ8©ÓËÊö‰5‹£Ä¿	Ë ìŒ#q4x7 ã @1* ÖÕÂ¨†ˆcxØ’-ÛûZX#líZGM\nÖ1Éö\\(#¨Ø:\rØ:¿Bc¤‹ðŒÄÜ@ Œã<žÆÜ¯Ð†Á/«:Æ76à'ŽKÕŠ½%(ª4‹H.œ&1#;óK´%™vWÅT©©HÂ7!Ðö&2#(˜,Ó\ní¶µ-AT4«”náTýN¾¡ƒóˆr}1—DÍžhžä«œp\nÛ:ÂÎC‚Ð¹:ž„9h™ˆÊ˜dËªýœäöîn¿8iÊ¿Zñ[ É\"	Þ3Î”’–ˆ¬#ö7£@òã±ÆÃŒÖ°AaÈƒ˜XÐ[XÂÆ­aû^O­â¨aJZ*\rãZ*b˜¤#)É-´4ãpA­lâ`6&Ž\\4¼Œs²Â.J†Á\rS‹p§í»zv7ðì Ü5µc2ÐÑ&£pÎ3Ä9níËÌA˜ÉÉòŒÞ9„Aö0¶7}Ôñ=>¬<–Ëð@Ã»Ú°J\$9&©ŠEWvJtªx£„a_*€ðÿIã'-ãÉÒ„¥*JÒÄµ.ò÷|’C’dI™4TÔES`nMÉÁ §TxôÓÙFO¨i?«cBN\\S~[	9\$„xKBa!8dìóŸðÊ«ÌÁ‡0D„¹‘òViŠ«EMp•È™”žpÈ±…	Æï“ãÄHO\$†@\$hÚ9r4à £’bÑ‰ iE–¬Ü’CÑwf…Â@g•´I5f¨§-„\nÃ¸e~D9ø‘T~¥a«“#N‚ün™þrÁ@ÁÓ*Z!bGtõ’L‰1VÄlCˆ,jMZO^§Ž@Úïü}‡ä’†5†pÍDd}Fz:øìÔŠÙ\r\$À(ð¦°Rr„\r'·ä€ÈÂÕNÒÎž•CI¶/N¬7àÎ§Wl…Mn<SF°Òø &MÝ±¢€S\\Ð ÁR#1vüœÚ’¨x†\"”ÆCIÍ=ï¡\$€£rªØ`O	À€*…\0ˆB E^óÌ\"P˜gÉoCÄ†w¬EY@ÌÉ\"hhå°GtÁÔz÷”Â®‚ÔÁOIÉ9aM¡*HŽkèë¥¢à*YÕ\\aPƒ&GÅJ¹TkJ¥:o@4½V¬yÔ…0]ÌÊ[³¦PtH©¹†Á½×Pˆ„«ŠgH×Ä¥hŒ	\$%'É³O17#eÎŽáÉ}4&äŠUZ½E‰°rX«x\$ö\\ËªÝRË¹vŠ	YG@é&ŠÚ,:T¸&Ã\"¥CÔj•A”;ÔxÔaB¥pUeü7¢TÊU2¡oÖT€˜P¦™RR÷Šn¢`«FT¨W:é\r4`ŽÈI\\Py?e¤Ï\"ºÑkºé0D¸µ†³2‘Ø¡–F!kšeh‹A9,ÁHÈ½ôL´9¥æ¥äZ¹Â T!\$	&DLü„‘‘;48ÔÙ‘–©%UÝå¸ÞU¨ à‚ø–Â®Õ±i?-2)’xeíßma<%·w}¬Ûè0èD\0–ËC­ÿi×¸Á`<\nQoÉŒ?8&“¸`KaÙ;1.­e1r0iOxe˜á¥'’×€±N+t¯\n#¶ãì/Æo8Ä:’ºë®6uíáâ»x˜VÁë¤—Õ—5×vM¡dXŒÂB¿!iÒ©ÄµÃ†‘P\n\ná”1eôU”UüÅyB¦ÊhŽT/L€³\neL,\"0Î–p½Vx‹¹åh±Å0¶T)Äª­*O¦Uúã6H•&•ª-Aòè•gŽÄ%•½UKÝu“‡²Rô6Ù’%¨tæZ\r/T(ªZp\nÔ¹ôýT…†Da´jJ¬•Òˆêzˆ2/i\nZœ[ôW°Ý Z½õl6­‹C@³‡R²:ÅMV3B³vZº,8®LBÛ¡á•K‚–~©M>ˆ÷P>]ÒÔLY#ÑšowÒ½W£i~êOºš±>[\0ËÎìÒ‡ÖÀï}7¿Ù®ûÚÛà!Î”OsBb79àl2cpä7;z„ñÄå]Ê{x`Å°c‚À8Öa¶¸3Û\0ÊÚôûÐtW!'ÚðAlxS+Áœ¯šòÞoËÍÃ2Õ…Õíä’C-\0006äh©L%\n;…pùaÅ~ËŠÇ6çcß—É#-{r#ÞÚ·ßLz!†dÂ,{-ÏKÉ…aº7›²[Í/6¶:¦ö†ûG0y\"qL¿[wtz{:ÅRn—jó­Qâø\r3ç~C êÇEueR¤:DÐóñtŸ9T:oÐiùt#,„êÎ64²¡ç¡€Ø—1/~[EHãè¯Ä„ÍR×i%Íâ^{Tqî%ã}¢øÝƒ:/RLt­ß>¡¶ðÈ§}oÐ\\•»Ìª‰¾ÂS•¨Ð”ŒŠ\$Ÿtò;ÍÑ-ïÒ£ü¯;ýËsõz-Oó·â˜¿¼¿yƒ†ÿ²Äív@LN@¤E¢ àMð?´@\rx4#J<PIOâÓo¨7p\0bW\0°\$¬ó1\0Dd	«®\n‹h¯ˆ|°P1‹jþÍúŽ\\¯N.ïòofEpA\$V_\n’Ñ`E)bZ\n°ù\rN|°j@'CòF–EÄŽ´ŠH„êˆ/Ç\0ûÊŠ#Ö}Ðìb¨£Óã.ì!Í½Elo¢..BÜ0À®¦€#ƒZÊœ˜ƒàäîHV%–Á¢”1k‰g…«7í\r`Œ#Òc”\r€V“Â·Ã8å²-©\0ØÐ`\"†îãÜ¤Â¦Vðü\n ¨ÀZ \rÃr_@ÎÅÎ.&d‰,Ç+ô8)ÀiT[Ên«L\0iF&F\$¢Nt†D/kdC'8ÙP^#ºoÂ8lK}¢`ƒ‘:–©&*b0[I\0%¤^H‚ýBd: Þš-J–¦r%ÑËÀ\r	ô¸Â\\\$&š‡î3H4àæ,bÊåN‰¦\"\$‚1(D¤1ýF„RêÈ`ucý íaÎ±”Ýo\$Q\r8\$V2Ž¼.‡”ÃvL+k\"Ó¨€ó0>^„®2\"-ÂðÖ‚\\`ª §%h¡ÎLaÆ -Ð•#¤.„0ÃMj\"A…î˜D¢ ‚-…¢(¬9E„sŠH?ª5ñøhŠ8\rê<oª5\0ªt¤°i)L•oÐþŠ\"\n	V=P&œ\rrTŠ—pœ	\0t	 š@¦\n`";break;case"ja":$f="åW'Ý\nc—ƒ/ É˜2-Þ¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ÐT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Þ 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼þ†¦s­“=”×O¡\\‡£Ýõë• õF“qžò‰E:S*LÒ¡\0èU'¹«Õû(T#d	ƒHûE ÅqÌE”')xZœÅJA—©1Èþ Å®ƒè1@ƒ#Ð 9ªˆò¬£°D	séIUº*òÀƒ±\$ÊzKêÙ.r‘º¨S/äl˜ ÑÎ_')<E§¤©a'¤¹Js,r8H*ìAU*‰¹•dB8WÈ*Ô–EÂ>U#‰ÂŽRT™8#åÊ8D*„<‚_£ˆa˜EÉÎTÇIBý#êdÿ+Çò	lr’j¨HÎ³þA‘3Ì÷>È%Ê¨—E‚®Y§¥pîäÔ£•Eu x0µÊ3¡Ð:ƒ€æáxïa…ÃÈ6½ƒ(ä\rãÎŒ£u <8Cpæ4öD¨‡ÂHÚ86Ãm¢:xÂDaÄâ\rã#vÞŽm`¦(‰ƒK„æ#“ÕAééNE\$ÐŽháK ’J	se¢ûK°*ÁWaXft”)ÎM•ÐL.NÄA ‰]Òº¯<G‘ôå4sj9–Ì VQœä¬¸\"Vãê6\0ì0ƒ¨Ë™%ÁÌE?GI,QÒvdÉÒÁÌR‡9hQ9¥Ùvs„|Ñ\nÑy‹äFã¤x[jÄ\$o•±Ü{\$©o/\$Y+B6v67nKlcÂ7=7¢?˜Ùze™ÐA¯9Îû¥|Ódý@NÄRaxlÑÌ¥û	=ŠóÔ©Ð¦\$<ñ¼¯=ý€`IéPT¾YFŽ´¼ð¬É@÷Ö°â*Q%ä=±}Pç-NóèÿPŽi:.Žýgƒ“HÓ\rl\rã0Ì6Y7Â\\ÕéI f\" Þ×¼ò¶°ê1ŒmÈæ3ga\0ØÃ9ì`°Ý‡'æC8a=€‚‚UÜ²pu8@ 9‚“˜9ÀÂµ\rTÂ˜RÉÝ2¸£9D3dçh RCÈ€ƒ6¥Zú	A}‰à*ÜÍÐfY¯ÑkžÐ@V:ÉP1­•®P VjÕ[«’¢ðd['öuÊ¹×À‚d¨·1PÙk'Â}Ú£Äô ˆ)†ê…Ûv6-´0CÌ@¢ÔCs8AÈØHæÖjî¡à8•ltRV¡[+…t¯òÀXKcA”³rÐZR-j­u²ÖØs[«}p®8¾º\nŠê«±wÅÔCY¬^ÆÁe?Ü¸ãcKñ”ŽF‚LO„IæNÊ²Ã: Pü}†¤õ ä „‡B0dÏÈY‰àP	A ´ƒÐŠ¤<DLÑQ˜I1\"S0ÄbDÆª¹¾hÂÙ—áŒ:EÕÞl\r‘´6Æáwš\rÑÆ5¡½ž´þÃ,9°f\rÁÔØùã¢°T‰#¤‘+æÊƒÄø \"8‰Óa\$ªa¦ªñ\$:± LF†‰ó ¥‰&¢ˆ„%VX¦t|Ôü’,^àd\r+¸×3Õâ¥©Å7JØ8´)0r\rá¶#Ä™!\"Ñÿ¯wV¤)¸9@'…0¨åÚ|EEšˆn H`ÈÖŸ×‡š¢Jh‚UXLôC3È`‚qÂ-tŽP+R-B¥Õú=ÌÛ;4cóÛ4î7?EÀÖ3Ýˆ4†p@¼Âe`6¦°Ú+@ŒƒÝ«1oÐøÏk\rcp(Õ¬²ò)°énõÔQ\n)Ú‹e¢é¯ðœ¨P*Pu\0D¡0\"ÝÒòT‚’¢<AS[ÒÌ›“t²Ö`W×XyDTm&!HPDµƒPpƒQ÷˜GÞs—Nªj¼©ÅöæXIð¿Ñä²\"#a°Fs˜t½f‘jLÐ†ˆXwŸƒÐ°½dˆªÕAÔ>â˜SÜvÓ‡8ŠÃ˜B¤Â¢É—ÚjŒì¼‡‰¬\nÁâ\nškNšRˆÔûèÈ¥DªQò< ÅddQ˜ÌŽ{ŸtE\0†ºmxŽçˆIHiM€­ø\$ÐÂ˜e6ÔŒžóâ|Ë¨„A¢*e¦Ç€éÔ¹ú4´ÕFYði¡Üª0QÁÓûÃu/ºµt%t¨¢Òè%Ò0â>ØÂhyÊ\0YFFc§n=É¹oI„_w]	ÙË:GXgífLXž®`b\rJ:\"8—™‚bÖ*ÄŠòò!ÅÑæeä^é¡y™\nÃa,½4„ý°q.Q«í!¹§‘‹.àT!\$\nº²´Qº{Æ²ª¸}Cƒ‘Â£[Þ'EÄ÷¨ƒ\$Á’\0^7é›Mü°l5\0ÂH	›Â‘æŸØ8SšÓ¼.ž—žAYA	Ä8¥16Ì)‡13ƒ~ïAÁhÿ ŒBü*Aˆ+àKÕd3ÚÄÑ%/(¥]ãC™ñ‹”º™çHœ¤]ñ=µ7@l3ÀF|õ2‰¡M\n)Ô¥ïÆæO€(+†PÅbVDÅ¢å‡ÙëI£‚ï½îÅ\0´j%drˆ@+ZÆùíÚáŽˆ~@Å@ç…àr‹¦+XpæÂ rˆáv€lË;@ÉF0Æ˜åBÂGÏŠafdÆXÛsLXs	eEË¸a~_ÐÌs,f<ï0ÒF´áîHýGÌ¬CÚñ?sç½Þg+{<Ÿb p¸ƒÌÚL’^ýòËSNÔ˜G¤QÊ  D¬AÁƒõ&¥Ëð‚CYnbíB9¯]Oáüqš4}öÃú¦&CV7¿ëŸF­³‘3›s±ãßû/îÓf&efR†ânhúâòR\"0\r²_Œ4tÏlÂoúùÁ%:Ó…\"¡&î\$s‚§n_Œ1ÌNÃoˆÅd±o’ÀðHÁLþÿF,øì.Ïç¦uO4öðdz-\0×Ç4×PrtÐjq0:ÿpr¡\"ÊÙÂ*Šfu-¦ØŽ%â0Báª€]Î#«¹K˜a5TÕ0¼Õ…÷Oø,P«WnÛðS\rORÓð.'zÔb>Ô©ð§f(má+A 01c.In¢ƒÂRˆà ÏNÏÉ¼4BÎ°°HÔLñüoþ„B3®D…q0db+èòMC	®D§‰À©ŒÁxöaÒPe\"L×M`ÐÀscf	Ï0%OtmÒÞø¦Eñ‰Ñí#óÏ}O=¸ÿc÷Æ”aÊ_âê¡t2Ìá¡6?B\0EfD¡|0Vr#£	…/	ï xñyPš#‘ì³Q°0M¤qPNy'i„œÓ‘tt©òŽhÌP„ƒ¦)!&.ijjcÑòÅ²H2\"Ñœd,`OêÓ„Îþ%\02Â€ó‘xü…÷\$Ð Â}%r#ò\\úQ\"P%’K\$íQ\$’i\$ðàÛe\0Hdþ¤„NPo\nxø}’†H‹ê¤²‘£È¿•)Â?(‘*2ŽIr{)¥*+¡(-jÖPÀóoqe,áÖñýrÙDÞÖ2ÞÕ²ª<ñ”ØMl/ð\"B©/’Ðíò‚JiBx*í®Nò…+2’Ï9+….22M»œ		\rë œÚÌvgjcÁv0Çdv3&(á,ñJvGÎ%ˆæÆPnláÏÄ/ÒVL‡Îl*F²Á*\0È/3q7SynJôfô¯O.b\"`è@ØjØ\r Æ\rgÀ´¥hgæ‚8gà] ÒÇæ^Ã˜Ëf]@ê«àÄ—KJ\n ¨ÀZ\0@Z(šªCÚ9Ž'ngrl3c2ÚùOxøa\$Ã¦ŒÃá¯ªþŸâÎ@›<ÓÑ £œ1ÁÎòƒ&Ê²wá%Cc\"2n2²B¨@¬‚'¢7c	‹Påš5ƒ€9\0EÅŒ‹¢ò¯¡ Á<‘`x¢M:çêpC…O–ö”#v¦íIç®8#)/Ó©H/{-Pr\n†ü7#P5CY>*Ô\ràà ¥ÍmçA„èÎ­ùïFjïD¤æäòÈEI\nÓ-/Obì±jü3B¦ \nÀÂ`ê ÛEA\0Ã¤’ŒG\rGÇ”Úa(bVwÃ¦b„@¨TŠ8&†G†ß–r°\\™eNôšnÂëU”œÓJ”ß'R%ðu\$Ï¢Ñå.c*G+ë0ÄxñóU\$B0@";break;case"ko":$f="ìE©©dHÚ•L@Ž¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJÐÐøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØžVAá*zc±*ŠžD‘ú°0Œ†cA¨Øn8È¡´R`ìM¤iëóµXZ:×	JÔêÓ>€Ð]¨åÃ±N‘¿ —µô,Š	v%çqU°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ‚ìP +ê[ÿG§bu,æÝ”#±êô“Ê^ÇhA?“IRéòÙ(êX E=i¤ÜgÌ«z	Ëú[*KŒÉXvEJôLd£ ÄÉ*é„\n`¾©J<A@p*Ä€?DY8v\"¦9ªê#@N±%ypÄCµ² QÖV2¤ñ ÐÀ'd1*ûØèAðaÚL«ùUÇËü<ø‹üPËI§YL©6Fªr\r\"P’Å-È§YTT¥ÄìdF–\nÑÚBBhj´‡ÄREÌÇa˜RluÇ±²´u”Ò‰rBo‰ÖYq3Í1D×6¡ÒyRFIyÔ[²¤í'Qk”	ØN‰rgSRôÍ-Xä2ŒÁèD4ƒ à9‡Ax^;×pÂ2\r¯°Ê9Ãxä3…ã(Ýd(Ü9#}–*ð’6Ž\rÈÛeà^0‡ÑAm¸ãxÈß8›^)Š\"`Òâ¨'\\Ñ5M’í>v%„dY–“ÎYaz‘0óûà%–ƒ•³Ró”äbbRBHÍÏB±”tª¿’ðä¿—¤¡ÖT“n7dy2vÄëàù•€Â:ƒ @;#`ê2¯ä!@vs2T‰ÂþË ð2édLdU	‰@ê’§Y@VcÑþ?k6Æ±¾:“'*…3 (œ#fƒc|æ7!\0æ1Œ#sçv¼åRZP8ärë<teéHMôž/ô™ÚA‡YNDpøWqœw v=Ù}íß2ém,¯æ^èEq(¨ÆD~A7ïPÃ1Q)ˆbDŸO}^TiiGÐôŠ½Iò|_Çç¹þ‚f£“NÔ„\r^\rã0Ì6XW-L,Îé6AB ÞÙ\r»¨ò¶xê1Œmàæ3f\0Ø7Œï°æ7Ã—Æ0Œãìa-Î°Cpu8  9‚“ža»b@™„0¦‚1Ìü@‹\0\\yÈ	\n_æ%ÕÁFJZCè…ë·°%^ÓÜ\n†°7³z–3äZÜ€°ƒ“ôkIhE†b®V\nÈª |‘Ä>Áo.ž!¨…'.9‰\n1ÏB<ï]U!¸BB1A	¡„9œPälã sës†PðJ¯^ †…^¬UšµVêå]«Õ\0ÅXë%eÆåœ´/ZÍk-…´·\"já*‹Œ2®UÎo×a\rf½w›5†øCrÜ‰ñE’¤ö\"ô\"Œ\$‰!\$…\r¢Eæ˜(€ ƒPyã\0 ª–^G’˜ì( H”\0‹qd#ÅžY£†´¥c‘-t3jmÍÉ»\\áÁcCzrM€ofÌå÷‡pËËüP*E¸Lªš£dB*EGBGŠHë)dÑB\"n‚(¼#Ä€ì‹Â‹!(ŒuÐÎ_T‹èzU„’:^`d\r+œØ³eÔ¤¹È7ª¼8³¸Ê0r\rá¶ÃyCÎ:Ê÷®£}H£A»(!@'…0¨y×šŽM’ý)±XVÒÈ½4¦F ;¥SJyQ¡´v\nCºŠP±Bh)q'aH±|Aš‰J¨HòÍSt\rÏ‘l†õ~óA\0b\r!œ.À™J\rÁ¯6ê´#InÝW8i[uþ3jSJÛ’Ã5Ë¿‰‘p:Å±LxMQ«5€ž\0U\n …@Š¬¸ &[<ßˆò(P	èXUòJÅbb3­˜­3Ú¾(+˜=çÄ¿ˆ1_áAƒ/ÍvÇN”:àZ§¨.í6;×WÄñ-¡KÆå»ÄÜ¤œmGGèP	Ê3J‚¨NìU9€ñ„ì©ŒÜ¸;v£b£´J(B^Œ«†aÉ•}&Œ;-ó@?’MCÑ@JŠ£ô–²ÜvÊÙtU¬ï\0éÛÒÖKÐ‰Ú˜B¢Ê5vìLYó\r!éžLõ±\0™àS¦æiNsò~î4	¹\$yÅ9W‰ã0ig8Žs³pÒCºûuËéØ0a)oDI&SjiyàäXÞ\$¯ 0‘?\\@ì±ÖBÉ9[´æmã&±õ’¬äD«Ds)í·gÉN)áXÄ\nYk`˜\n¨œˆfbŒTÑŽmP²JŠ.öÞ4õñvÌVÎ…@‚Â@ ¤«›×œkèër83p9YÐ;ú¥¬“ÉÓPÒüÿ\0/XƒBÿ¨hæ ‚]úŒ(^¨mU…€0-lOuÁÏm:ÔšÏù_²jÂæXš=€iµF ÔVÆíl1¯ê]áÖm¨.å‚Í©PwD„Œ¬UA1ls#¯(dœ•’Ò^LHYñE—v‘/B6z1NÉàîž½öG¶°\n\ná”1L\røA·]Â‘	ÙMÀu(¥Am•… B¥UD‰–Íˆ‡S;B\$Púk)ïÝÖžÔD™62fTË—¦˜ÐµÛ?{béòæ…†NlüKo²Pd›æü9™»£Í6ÈÜÄA]Ë½Ïo’`¶¨ÅëÆ/zA¦È½QŒ’¨¨ÄÍ>æ½lÄ°tþ XáŒé6W‹1p|\n”¨8\"21¹3òiŠE_¼ŽÎ÷Þ_z(ö«´wcÄnNRw˜uëÖÖwÖLñ9=£‰wm@)IÆ'´h[™yýÙª7™õ\rni¼õÖwÉÃRxJ¯×…ïÆW{õÅçï¡ñŒG°{_NŒ}MÍºþê‡xÞ¯ä6Ö5xe®ízK»òÊrÚË0 ðq·Ì __zmó¶¬vFYó?îˆ¢³§Ð*kŸ]ôO¹ãþ÷?±¶>Èl½U.îeúùkúeßDÊöËoêxOvvª¾÷Ï¾9ãñ¤VP¡<â–À%oÌ)†RebN ë”©ÄØLòMä\0,Ê¤Èºfò!Úä<kbâP=kRñ«á3Ëª¨mä_¼,+Á+pJé/øËìRŽÈvL°rO,·G4ñ¬†ñëâæ°œ•ïšéÏ¯\nª¤ø¯xvÎÂöÁÖâ¤ëíudùð¦é/ß\nNÅ\rP»\0ðÚõ¢FPÞb¨ÀÃ0D%¨­‡Q;¡\"iLp¨ÏlúÏívïÇb·\rqü±¾a*h‚pžQ\$Œ¢Êõ§°Ì¢‘;‘P¦J\"rÏèIK¼¤ñk´ÿ*´ÿd<±`N¨Íoökm÷\n\r#Lh¤>Nñ<!Qq\$EÐìGd\nÑ*ÀHD‰î‰îŸ-õÄúGëpžQX®bú¯÷Q¡±¤Na;ñÈFÂ=ÑWdé§^ÌìÈ«Me`úìÄÍìø°£Qè)ñúª‘ÅDcqëpç!qD_BI6PíÐñŸ‘­\"Ñ·DøÑ1˜u\0Œ€ÐÅÑü§<tN²#BkÔsð4#ÁnhX¾‹í«òÿãàAëº#ÐöÏf\$˜°¾÷ëÂñ¡jÆ?'üK¡a'‚gPù&‡ü¼Îr yÂ`è@Øjh\r Æ\rg ­eZgt8ÇÀ\\ÀÒÇÆ]â‚Êò\\`ê¤àÄ“ŠÖ\n ¨ÀZ\0@YHv£CîèØ3îˆta@t¡21’ˆêL@ë«ÎhÒØ¦Š(ée1`	²Õ-„º†dšåc,3Î\$µ4Z2d+ÂÉ‰’iÀ˜­ÇþXÃ^8c–Û³d‰nNjD\"A` ®”ë„-+gÊnƒ‹N¦ì³D\\!‚Q2ÐŽê¯ÜrŽC‘83”é± ËÂ\n†à7ƒV5£_.ªd\rààše‚Ä‰Ñ:#Þo·On©æ–Àœ4.ÔJ0n*O0ÐdÉóöc„†¦Û€¬ Æ ê\r¢þ)# Î3FAmF„•¥4_ajÍÇºSŠ8†x'ê³ò÷1tÃþeR'DÒŒä‘‘'€DËphã¤·\0Þ\$ôCÀt²B>\0";break;case"lt":$f="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›Ž‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€Ý8YÆ›œË/:EŽ§ÝÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPVãuµâo¢êü^<k49`¢Ÿ\$Üg,—#H(—,1XIÛ3&òì7ö4Ù»,AuPˆËdtÜº–iÈæž§ézˆ£8jJ–’\nƒ*P:-B°Â94-Ô»4ãJ\"òŠcZ¯,(ˆ0Â»~6 ò\"Ã(Ô2Â:lð¬ã\\P†ˆã(Þ6Æ\"–î9lZî(ã*Vî£”Z²!°”(Û)KP§Š_\ré¬V¤Çƒt0ôK`(IƒHÔ:»ëø  4#²\\ýL³;¾•-AàÂÉ8Ã0z\r è8aÐ^Žô(\\0ŒƒjÏ\$…ËÎ®4€ð¹ÉHÞ7át	#k÷#.# xŒ!ôGD²Ó´C›*)Š\"c²2¤‚èñn É..1˜¥,ºÈen:×&)V9;kÊö¾·\0ì‚C%’ãÙŽ\"à¹#nÞ:©i{0«‹PJ2K² 7Ê‚è%Ór\\Ã¢ìî)`àº!¨\"†‰qÝC	­BêÐ„HÜ1¸Òèèƒ*@:£–rX:Œ Um\\/â4Ð5Œs0Þ†ˆ#;vã±ø’2«ˆªþÍŽc¨ä\nHÒ¿<©\\®¶\rIR,:Yã”<VTT!|ÁÎ,Î,ÒhÊ€ŽiZ\rƒcVÖ²£˜Æ0Îåb²¼lÙ¶@TH4¯c“¬?{Ýe/™ A]ßÒô0[B^–á£Ú°Ñ#;b‰—8›Öøæ•æåuÌ\$º_ÁHó ÒÍ³¸òNŽ†©G+\nJ[ü(Zë›øL[„»/Œ<K¸1ïr<IŒ<¨æ^Ç²0›*7ŒÃ0ÙEÖ£¢S9ëø¨7¢ÉXÜ<ë”¨ê1Œløæ3bxÞ³R¡cO³BÎûÉÍÉE\rØÊaJH‡®i²Ïv¥â¦)Õb4´@a\0…¬&o–«\0oúÆXûopÆ©²‚<…Y\$	K—¢G~š9ý2¯„‹“†‘˜ú2a¸”?ã~KŸX *%E‡'¬Ô¹)‰\$'dðÃ“Ù:@øö–ƒüÕ¥\$LÏ¹ @»]ÙJN„½sAAp qÐ>+3îW±³\rDŒ’¦ÈX¾Ã˜w,k2‡€ào‹ÔI…Á¡<§´úŸÔ\nƒP¡ÝCÂB„”hrQêF.©E,¦ÐsSŠx¸0¨r©‰Ò¨F¡U°BVF¸t?I%ã*wPº\"( €‡–œiÙqKâ‡€Ðß9ˆNçìþ†ÒËYmNåC/ÏÌ“E(í\0Ñüçù\0\0PNŸ0\nj\\¡8n«ƒ3…½§,KÍQ—‘D°‘xÂC‘ƒw}dxÌ¾§€Î q(c|a¨\$ä¤•’Ò^\\\"W,µ •ì]ÁØAÄÚ\$¦²jMbi¦'F¼…‡“ ÛÛ!–6Ä0¸®CPjŽ0qb‡‡\$w£t,5Ä2D«9©%äDÏ@¡Ù´‰A<)…IÂéË¸ oÌØ_#Xœé‹Œù\r(8Œ=äzOÒˆl”ØÓPÜ‹*Æ l–\0¾†‰\$±ö `)ÚQÖ°×ØoQer–ZdÖêApYÅ€`©.Á÷SÎZDÑZ.«’RŒ9¥p±£\"qI:1RL<½H†Åƒ¡h[…¬0³p­ì!r^ŒA{Ä‚³èMd\rTÑkPûN9¡±¤â\\„¤–Hn9iK³®vNÝ'gÄnNŠúÆŠâóµDhŽä®‘ƒËYMk…ÝžI°úIIßNôáÃ·A.I+qu&‘µ„RYÍäMd¥ØRúrÜÝJÚoÁ­Àë‰rÖÒd\rï49ÏT‚¸	j	w@0¨¤\\yB.%†@¤·~AÒ§^æþ[K‰Iiƒu='I8Á‚KÐò¿8\r[X&so‚e}FVh&*²â’ zb³\rO>\$\\&1zLw –]Êú&ÕÂ!Ž±#Èª\\Ë&%ÃKúyÊ´Ù\rÂ«b]ÐÝ\nÉBCm‹TÞãöŠK€PÅ²^/–˜Ù‚Ôf˜²JYa]p\r® jäíž\"Ê’QT´§Äå+ñF3fX¤Ñb÷\\Å\n-o\r=ÿ¢BÕxžhd©L|À\nâ&vÉK³Œî9ãˆÏP©J;a*@‚Â@ ¢Y€ÏÓè'BÙhpseÌ2@—%Û\\kÈ —¦*ºyN]K}p‡5ÞtÒiÕú°Æ0u`Näc?“4!?I;w:¬êbDuÀ¾kä»]ŠýzaJdJØ%lMb¶F¹Ù‡Ogëý¤FŠ:wÚ× ÆÊ’Ý¯e¢k»+R^RîA×&ëÙfËnM|S5~òÝ°^ocwÎÚÝÛÔ5ïrH·ñh'dâ†ðîÓÉ‰Ó\re±ÝÙ¢|gÁâb_Š”	a'Ê¯ŠÁ%ÊpÅÑº§?2¸–IQÂ8*Á\$q¾ÙóY¯ˆñŸ°°Pd%™< ˜äæ´d|XMÂÏ\rŸ!¶æY’\nBšrÄ.CŸz•AÜ>ru YmÜs““º\"ÙPmåì\$—õ­…‹»dº!š¸aiusl†-Lô€»²^H	\\\r¥²æÄÙheÓ9ðn‹Aé¾8k’Ã¸vs?éÈù“þf•˜¯þ\0005ø/	²²››M¼üŒJÚJKÖÆš PÒ	°)Ä}æÌ–­uÜGg\"%¡™uká¯\0—‘i*Ìköò.Ã‰î}‹ç{û‹v~Që8)âÂWÚ/M½ûŸy;ö‹¾ë­”~³çsq/z©[7níÇ«{váØùãù,èá/ì\\h®ï´ØH/øÏOüàŽ{Í`Ü‰\$ýŒ\\7°¢\nòãÂ\"í.¬œ(<p,W01P8®<%ì¶/ÌìbHÉL˜FFŽ7â:%z5Iìö£@“%Ê“‚<`‚\"#­*#§*zÐbpf½¦ªö‚6\$^“É!V8‹=¢–’âÎõ.<:Kˆœp˜ç\"Š(æhäAC°MìBÎìçBÂìFûcÊ´Œ­¥²Í\$\r%£/¶êðç«›I@ÆðèÇ/¦üéÈ»kºbPþ;cÏãU/Â½ŽºÏÂ)pD\$‘'î‰Èé¥šß®&Ísî#Q	ä,\$Öˆ¢Â<â®\nžDÞm#f:Ú¢ÌòþoÀÄ¯Œþkp\nÜ*Mú-ÐRùÆìÚ‚>cfJ;qŠer›‘E9‘>8‡ ƒ‘“M\rÏã¶ñ¢žK2ö%öI=ïÄýü®è‘ñËªžÓÐ¡Ž'¨o*x9…õ0øêñóï¨êñ–è\0àæ±êC2ÈÌÑ%iÈËÒ¹°ï!²ÌýQáÌÊI1Epw\"lÎhR-QXFdœÑ%º–«²JJ¦ºÇ\"àä'\$Î=n®É@ÒÀä/ÌïïæÐ§Ó«\0\\%ˆ/åÔ3/â6B‚`b(®BÕò¼Šî|%n6qšÛ*’›\r<\$H)(ÅÈåfX•\0)’¬MPEÐÿoØÚ°Ø¥Ã\0ä×\"2Ù.Mj\$€†VàØj<\r Æ\r`@Rê¸éF(™\0& Ìy²'©–U>\\£*{`ª\n€Œ pâ…\n\0âHþëÒ[Â2µñ4\nîãKY\0ó@ã3F#Œ\\!â0xÄvNç^F¥¬îÏN	¤³' òf\0ò+ŒÂ8Å–Ê`œ,bØ/e8¬¤Y£Œð!Bða2Š ê=§õ9E–9(\0Í‚ÆK(Lb\\J„f_k¸É¦€«G¾,c*4¢Â	“Ì}`eŽ<8Àôb@-Nâð…Ê ìhî¨k¡B?Ë¢íspqO–¶”h)b*‹äÎJÉA1Ìº2<#X.^2d[2J8\räª%Pèšóï@ƒ¤YðþHfNe%š»ä\r.îb¤œï¤fúÄ0÷&õàæhë8F`˜ €ç?b^>‹¢ëH<¤\$`ê Ú@ŸC¥>cÜ\"Ðwt-Pb<t©G†Î\n“ý@ÚI4#Êz>CíEO‚t‹g5#ÍC„ÌÊhx\"¤p jEK<ÍÃ\n2)(»‡J5„&";break;case"nl":$f="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ÐÂn2†X!ÀØo0™¦áp(ša<M§Sl¨ÞeŽ2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMÐ`(¢É¤fË”ÐY;ÃM`¢¤þÃ@™ß°¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†íöìÃ'5Æ‘¸Ã>2ããœÂžvõt+CNñþ6D©Ï¾ßÌG#©§êö{„Ÿ†o6væB)âˆ9«Ã˜tªjÂ´”(É+žŽHÉ±ˆZJÉ=oj9)C*d3/CI†U¡¯Øè<Ž	#\$“0Œˆˆ¡§ãò0ëÐÂ4Á¡8°&h°œ9/xÊ7¨î2Bb>’ÅJj0Ži ó\$£h)¡®\$(øÂã›¬0ÊB¸Â1 î¦¸ TVÁI’ ’7%ã;¶Ã£ÃR(çÈä‚6€PxëhÌ„SèÝAx^;Ñrb6¯Hh\\»ázgI?ÑÈÒ±áª	#j](¦c xŒ!ôH-ˆÞ”µH\$š\nbŒŒ•¦«üp7*rjä1¥pk˜Æ¬H¨èöWƒ¨ê9B²¼;„ á&IµûjŽÙ©=ž9Ú Pœ¯¶`Ò•ÊA*R1)Xq\$W,L%¿H‚ É3¨#­Z7'’\nï:ÌÃ(Ì0Ž£b;#`ë\"	p#£uy‡1±C\"-'îZêâa2ší^²\"Ì—Ä©C2Ä®T\"5¤¡\n3¥wÆ'b#hÛ%ƒ˜ÆÞÖ\"`@7µ£”¿0®¹+# 9ÍìÏ%Õöu ÈŠs¢ë¼cPô¼jÚëëxÖ–1M(®´0BË0(€U:8cèk\"\"`åZLªŒŒ8Ó]4I²žÆ\rxv\rd3(+¨–\rã6GF¦¢­¿6ÍöP“(%p:ŒcH9ŒØ.\\¯C›£aò£Ï¨«Ò¨”Ñ—âVaKq:££\"ðb˜¤#'ÎX\\<0Àéc8è:3.ÉÚ<†çã‚º2Û¼o»q²HÞã\"j*3ƒvXy8ë\0N¡\0‚2u¨k¢1¬PŒOh4ý@*¡|2,J¿QÔ¼m˜“VÁ^*%Lâ2BÈûË3Ï5ç­Ò¢`Ic2äÝ\$u®ÓÅ?Å!§~üSëP\n	B(eÔSèQ¡ÉG‡%\"¤ÏéÿRá¹L©¶Ö\\—¢¢TŠ˜ªª‚Y>rd0¨6RÖËÚõ&©R\0’EPOÊ#ÖKáÐ4™äBBHù†/ç\n©d‰Ê)AvÄp\0 Ü2‰Ä ÖØ  UÙ\0¥ä‹Û|ª´ÑÅSLd	Kr…LÙšÂIy‰{D]Ú'†°çËË´Vè@›“’vOS¢(8nÔá4{ƒ£¿x1\0 BjH y3GH4•ÂœEIš¬6EM‡ËC1L'¯ôœsbpƒ/UæÄÙ¬ò8MB€O\naP·³®lÊK)²…à¢äêÜ@;%ðƒÊÓ¤’™ù8’3\"Y_`nCc¿ ÊM\\( geÖòb³I·g¯‚?œ0ÒuÂ0Tl¨©æ?_º–ÈâPŒ]ƒ)x(¤1'€§ØaÑb\"á8P T´l@Š-\"K°—†Ô¶”‚ÔK„†ÒôŠLÙ‚D71Qcð~Ž'é¼'†ÙÈEÃkØY'ˆò6ã˜F#™Í&“V¾š`%L\rGEÕu^®›;tLÉ*ªÄè×LˆP)ŽhÝ¤pè²N¤ÿ0m@“<2-N\"\0¨ª˜ËãL^@‹à“§gj³Cb°o˜“˜¼¨Å<1‹MÀÒB£²@é\"%EvJÓËÁj§–§ÈØÆØˆ;[&¤Ý^Ïò<B‰I¥¡Ýd¬»&`ÛQcE5“+vQZrØ2!¦ÀˆOËèAZÍ<æPù>è˜et¤ž´+òî›ˆi\n—\\ŽzÎÞkI\r‰\n†—£ãƒ¡Y9­”0Zƒ{š‹S<½H³KJèYæ]ö5HB Aa Kb€Vj5ÄTÖH(<ÃÌÑuX9’ JAx ÂæP®rReLˆQaxT‚-òÀOÎ)Ñ]Uë4&ó(@N\"!®Tö‡LNˆqV#òt2Œ1^ƒ±/Áñæ†F„Ú5%D²õuÑ…¨ss°°†ÌKŽÎ({X{â4ŸƒÉ\$Ê¹_¦[Ñ“NbFQˆ07‡r,VPRž¤À™ÌàR3©-žÙäÙãSP˜/x&¡Xû\$ÚC@Q\0Zâ œñ`ó½Æ¹¡)š àÉgÈj|DW¼µEœ0%ˆÈ—øÚW³©RÑ%Il„RTÉ=·‹‚M‡+Fˆe>´N„qkÊÔ¸!éª2jEžvìq5¹Å{vQ»ëÄ™¯¶2Ô×mOì³M©ÂÒ¥lçÁ ï·sªf)ÁúbÜÖü3©Ï6÷H©O¶çÝð\n›%ã©¸méýÙ¬£gÊ{tJ—…+]¤ô2òV\nVÑÏJU{&Uª¹U«#a çTŸ†Ú»ÄZm…Ú¯_pÍ÷¯b[cÖ»&EµRuöíãœ‡“½fªÕÞËÒ½8¢´Ö´5}3&YÇ¯i«ºsùX	¾ËœgîuŠyæ Œ\$7 këDn€ ¢œŽ¦ì¬!sîÓvœƒ«õ³¾ùV¾¸…ˆ¢ã¥r_^‘>šVQ^1\n\r˜ýÌî\0‰bÀj\rÇEæ¢dËÕ¾ÑÉÑæÎg­ÚHUíQpàœ~ü@îé5è„–whØ½Œ7O¢]Jé&k`ˆíKhE_p*ZvÑ‘YVÏïÛkë6GU‘~­frž› Ö[wººvû3“lxv¸÷Š„{ÿZII­öøŸÛm_†½[¼mþ÷Ý^¸I›ž•h\r©\r6æO·Õð :ÇÝƒÐÒwï6¾h×ØÕ¿…Ðùº5Ú}sø~ºÍÆ»\rb,ÏèÜÏÒ¾/âþàÜúKšÿjxú¦4þ®p¿Ã\"lÇ†:®î³ ÊÀÆ\$á­löH—f®Àöä§BfsN\\#î`ä°AŽ^k¹ðD÷`¨^¨ýÎ­îðù®V]îñ'#\\»‡˜ý®1|»Î4ë‹¶/»¯ë±ÿÐ™	0WâtH”^«ö=Ð~ø.¬>ù	Íœù²Bð•âþ3€æ äò\nL\"ÛC!bf‰+rXbcEÐ4p\0*cPÒÌaîl¸N–\$¦€ã©ê\r'4ÑÐuCT^Âú\nm,d¬6[ä¢øðú%1\$\r¢¦þo\\e†\r€V\rb<\$&€?ƒ„Ûíîqz&BÉc1C.Éú'fZ\$h£ ¨ÀZ\\}‡lN¢jÅb>ø¨®#Œ| Ææ -”ËŽ•CŠ8QˆñŒ%o„#4(\">\$/@ÊÂ ¬x©ÂlU`ÒÌ,lÂ„Þ\0Ö#o#Ç¼\0E”F ËqM±YC.¦)\"lƒxfb	Œè‰äj™ÄŠÎÐÊ¢ä´äÊFAkn#£Œò(\"æØ«)\"o~8Cˆ%Ä@ˆ628F®ïOh¼øM¢²²)#¹#p*c8bF8Q'K.ÁòW\"r8Yb,càu\"ŠªdÒÓ¤êÛF–eÊpf-ò”N¦c) ¬2¦ÊÇc˜Ð€ÆXÄ¤§bta\"¥ð:ÀØIòÀŽå†?À	²%bú	ƒ!*â#Â†*d¶»ÏHò®0H‡ƒ.Ià@à+ÏJJ(­†ý\rF\n§MÈÚen%D`	\0@š	 t\n`¦";break;case"no":$f="E9‡QÌÒk5™NCðP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KÐ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ð*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸ÝjÍûÞ	ÓL‹Ôw;iñËy›`N-1¬B9{Åmi²Õ¼&½@€Âvœl±”ÝçH¥S\$Ñc/ß:4;¾õ¡C ò80r`6° Â²Zd4ŒŽúØa”ÍÀœÁŽƒ²ïã*ÊÁ­-Ê :Â˜ò¨¬Ìå:ÏÄ…-£°Ü\nó:9B°pè»#Ã+rå·«dn(!LŠ.79Ãc–¶AàÂ\r	ðÌ„CBl8aÐ^Žó\\Å«bô´áz—5	\0Üƒ\rãp^(¡ð’6ŽÌ&xÂ>Á:\rxÈ™\rá\0ê „˜¢&\r)Rò\rèÉŒ P¬¨ °Ä:®°ŠÔµc°Ò2ŽàUFÕ#û`·‰ÃËˆÅ¡´8Ä<¤\0HK[Wê&7ÉÏà*@ò–²Ïqûª#ªÈ¶\riõ’Ç£0Â:Žpì·²(3B2*–S‹\0)Œ#l÷kƒrÙp\niÛ¼4ËC:6³*\0èÀ­@2ÈKS!\nv‹\$„Øjr>Ùì`\$2C#Ì¹\\6ÀØ×¯hæ1²L\rvF\"7M0à‹HëwUTˆÅ/WH9eX‚cPÊÈBzFË9Ãžk›Ó1ô€ çÙ¶p(-52òµ°¸á~°*[§·ùÎwc\rˆ—èx&œSc˜Mð\0Ê¦c`Z4'cËp,è ÂåÃ6&ªÈc;{gXc}%VH¨æ:Œcú9ŒÖÂ9'Íác?Y6Ã\nØÂ¨”>g¡@æ¥\"¨Î<‹òäb˜¤#m~´j—CÈÙ¦Œ0°hÈÏ›6`Pª:IÛÕÞCÍˆò„0iH¨4`íÌÒQ}ø‚2`W1Î(3€ÊR¤­,(¡|2N0}ß>ÏéI†L\rnuœ6'cƒÖìƒsÌ3½ìŠ‹ƒ†7W¢RJÊˆr¡Á…Pß[íÀì¥Uª–ÐtK‰y0&\$È™ƒ.M	©9TÚRÓ‚rNÍ;'„ôRÑCäPÑA¨b0òÈ	E7Æ”Ó»rvjÌaÎAÉ%B‡Ìú£„ì›€ÚpÃ²5løð†Eþ…)).%Ì¦,åL|Ê	‡Š‡¸øÅ;	^\n (Ø¬…	ùA5À ¢‚’š@[K·)eÍù·€†œH¸c&n°ÒÒƒ)s‰ëôÑ)ÀÜÎqnIÁÜ¾¹×>è]úF~Ë¼ƒè`dCšåw\$¬§’òbd‘ù±\$¤ývžò˜Ñ„L/®Õø·æz‘öŠDD<·…‡g®¼™…8OƒŠÝ=˜9çžôc™)'(Å§ !s)šF¸žØi\r.É <P@_A 3^9˜ÀÜã‹ÁC–\$èžãèS\"öd	Ä“uBG¤Ðs/ÄùôÇ÷Šcˆ k2DprDI¤Õ *8&ÒLÅÕ2SÁP(!Šž„8.“)Î\$`RÊBÒA7/#(‘Ú(]ìä'\0ª A\n–\0ˆB`E¦jý`¤¹LŽšé3AÉ£p™9Vñn\\½!6.tIá\rõ’:¥UºÌÚ¢;©qˆ˜I”´*ÇˆÃÈ !ˆó@æv	þSDýKV&bÎŽÛXk•!4€ÞÑ+z'©%¤»Rp¦Õb†R¦M¥DAcŒ±ž,‚ŠÞK™Îv+ÞÇYpŽî(<Ä*x*0£FiXT.Ó¥†ô£ºxs\nj¥/°‰1j³žtˆæ5ðÂÿÐy\n\r%º××€©ÕJ›UÕµ¢âc	kQe¦èN\"&IØpM4Å½Uœ‰o[I%¤Eö’‹‡ˆ[Â¡ioEHÜÝúœgËRIðÉB‚8RØA|pke®ÐdWØRYÐaU6EüÐŽ™½=HÌëS ¨BHáÓÜjåÑ¤¨BI97ÇõýÂ‚[ÕØ å_˜ È®”>.0.E( è¡¹Î	á-ÇbÓþM2¦D%ÿ\0œi(–v8'˜ë9Ufõò\0¥ÈY)‚˜ÈWS#FŸ\$ÃvñŠhHÆøäc°]Œabùw%æP–JBXj†è™2œéŠÛIIÄŒŽ‘úWž¨>}gŒ¼JœMkF1D…#\0Ã(b£Ä*‡b/œa¹ñ?ôà\\`Íˆ{a=-Îê‰ËB§Xdì˜´V€§ 2)!#]\noC“ÿ[NhßUCƒ/@¥ìÅÃ-rƒìÑx×4Ùkýuk•ªUúà€ºó-²ö™L(tžOý¤^**ÿ‘‘£óRÜÃ\"0/È6ÜbŽMùP“E\r!]àLäÊæ:Ûßy=]Âyâ§:×=…R‡µ§ÿ%¨SÈðFC1€¤êY’	L­G¦¶³Úá?øÄjJÌ’šcÿ9<¦¬µÛ‘m¶¯´9[0å»U–×&\nìÝ®¹ãüÚßs’·5ß<ç;ƒó\\á\"µ†Izÿ6ü{ŒqüPÊoà(÷µ1¶JéÙ;¤rÿÑLÞ‘Þ[ÏÖ6}q¤=’ò/\"³z*¬Ñ7Ž’vâÖ:0ºî…³Ñevç=(qÓ¼‚\nºPea±ÇCžþiâJ(E0¶]\\£ãÛS!ðSŸ¿5Ãê½Î\"Õ*DøÑ^SJ|ouvÛÍÛÉUÛUÅá™]ê›x|×SW#ŸŽä¤ýçD =¦Ü©ð¶Ý®Fê\\ÕEMrÂ.íì”ýQÖ8ErúÉ3¼rþÕíJjÕäÂ_ÅaÛšû\na±g/°‘£\"‡q&Ç­F’0]ÖÙÖêÉ›m|?¨é.®ÿ¯|Úð\0ÿ~ï/¾»¨^\\mòFð)Š( ÈmÄ„¯x\$°“OÇã¶¯âû`0eBá†)ÆÈæb\nÿã\rpNû¯ÈûðW°û/ªºbƒˆAf±ðNXeŠÙÏþX„\0ï¼Ÿðt0½+â*Pø¢½CŽûŒXp¥	Ð‰ðŒºd	£­Æ±«Ö:À¨B†uïì@l.‚%\$d!.h÷ðÕ“\r¦#Ã2À.”H@Ž›hü™‰ø=†Ò¬fÅ0:°¸­ïÚê‘'(cßŽô	e‚V¥”%ö í…öÇÈžÈ.ÀÊŒÐë¬¢êjäd\0\r€V\rcÌ!..Ô›h`†eÊ@\\#òñç€‰I´¥À¨Àpm	`%]âS\r~\r*07í‡­nÚ¢†¨E\näÆ(ÐÇ‚.f²6OÁ,úÞc¬8­eoB8Í(âH^4ƒ†áX\"Ã]qr\nhÐ¥:cÐA‰ÆSð_Åò#H[0k˜Û*ÒäŠØR)ÆCÍ¢Ùƒêãr0†ì­½\"]\"N:Í\"DàR ÐÍ¾6.­r6\$Bf2#ÌœR>µŽüùìð0)bkŒDörH:Àš‘Ð1Å1Cº²|ÑENñE2×¥Îˆaq ê\\u%+ˆºÀ‚-ª¦ºÀ¦fÂ(Yq9!¥öÊ§	LB2N–¯fc+ÇúWàààCÈ@0Ê€æO&:\n†-hŠBd*\"àÒ";break;case"pl":$f="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„Ý…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚ŽX1”b2ž„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑŽFFÌï6ÆÕŽ§éÞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ÞÐçrÔèñZÊ–pÜók'“¼z\n*œÎº\0Q+—5Æ&(yÈô\n(üþXƒÆ¼<Ò`zSq”Î•®OôçŒ¯rBA ©ª¨îß+Hz¸\nŒŠ7¦ ò8 O»£3ÉÂ	Ã¨Û¹#ÓúÃŒ+ã|cÐÂŒˆCJ€9Ebš¤B8Ê7Äã ä»Bb²áB“5ƒÂ€Bœ\nšOcÃûÒ\$FiHÞ¼IêÜŒcCv6\rã;Œ9.[š0®®ZøÖh(Õ7ŠÐÈÁèD4ƒ à9‡Ax^;ÑpÂ2.¯èä\rãÎ¢ ðƒÓ`Þ7á 	#hà6%È€èã}a‚41-RV¶¡\0¦(ÈÈ:¦7c\nbÑ#Ëp§!£[Žµ«ó`-.°:ŽheŒîMÖbÐY*\$Ü'C Éˆ˜È“1c ÜrpÔá\\÷MÊÊŽàP–7‘2\r”S/p Žªp@\$Ã!¸(Õú§!/ÓF6¥ÚŽå|^B0ê7\rm:Ü £ðÃJ#ÕŠÅC8È=!ê0Ø¡½\"\"Â0ÉíI;£¿#.££”Ž¯þ¥ éÓ Ü£Ç‚ºx0Œê\n”¿¯úuî–î£ê\nùe9¬½ZÖâ`7Žƒ»+FNsßkYÒpôúÌnLÍ¸[œÊ—E¯Óµ®[ÐÑ¾gÂžöžŽ—\"`L“0ªÎ1\n »>Ò¸éKW€Pâ£–|\"§\\î|*ïå›Ýl“vå1#Û´£Ãï¬àôÿu\$+¦\r’Ê‚ èH@7ŒÃ2Dþ¦ÚtÑ50Í“Dû¥ihëºÌº»*1<0ï!b0Îzn6+­¥«šƒtUÑ¶å…ÀO”2yŠ¸Ëçõ¾¸Yúž¶¸»{Vˆåîµžü²H’\n\\j5€‡—ÒúßkÎz¡é?Gªš^»]/Ì1=å6ÿÕ¬|:`œCÜ‰x;\"œÈ€ aL)`\\­ ¡Æ„¡Ì”†ô”ˆm¡±~—'üäž(y~Äx•±V BIù&ÁP4ât!Àr>É°7p@Tb6@¯i)Ò( O =†Tú§ƒ˜\"ÆŒ DlÕBª&ÉH9†¢ƒ	ZŒ4Oeñ<tÖ›DÉ‚ñ…–Ðã\"]`€3’•àÕI\\x‘A†Æ8ËÔ‚PŠDu£P*R@½Q©e0¦”ähÆÈ4ª%HÂ¤qUaÞ‡0Ü1*®¥82R ö‹ê ÎE6”¢K\nÃ%\$ÔõÖ¢PÙwáŠ=4’Hw@\$0^Œxo@nÍ5Ð1EÚ‹?¥ÎpÎ4\nìÖÄÜ\nØ—“f]™ÀcnÒ”Ë„bäÕªl>¥É¹K‡>ÁAP/ºh¸“Fu„ÉØ™\rMŸÐÇ¢ª²já¤;•HÍ,‚sÊ´¬’ÆÐ	òh&’B;á\"µLjÖ!µÒ¦ƒYòF0]W’vÍ¥¼¹\$HÄ1PàeKø D8å“¢ä‚ÝÙ15ô2‡raæ[¾5da!)²\\¢Ä #¯iÐÖGÍcW.›»8õ™'¡Ï¶Âõ˜VÎ|ÓNâe†‚•Þ¨uzê¦	šœ\\Öhn¨ €à`Òšˆìú\rV.¨yS•ª£\$f¥²ªâ`/)rär© C’TNÈ¸‚\0Œ'¬\\hÊVº(\"CÃi6	kÖÍ0Æ[œì;Œ¹”\0Öæ‚»W !ÁE’Kn\rÕÉvHnæ’RØÆä\0cH9'Û½±º»–©/Ôá.Ãugâ	 ´Á‚xpd† éÌŠ v\rÑñ­ÇŒÐÍ ÎÚÓuú ·ð¡#*JOâ<~”HË)ãr UÕ08»\0™|%3\nì')˜ÓdïqMÑø¸çJéè,i#µ*tA\\Óp±K¾B2Ö„vUˆ\$¨>)KÃ*	ž5ÂŠ6<#!>‰²†LO‚‘¸Oß“—4\rr¤#D<¢ÞëàªoIå¢³Ã%.˜Œ•BR0ì é±q»,0×’ÐZGîŸôdsâ#Ëù°HÀNÓx4(ÛC“¹Î._Ø³Í‰|!”LäµÄ!‡1&.Æ[ÂäÃú=W’Oý5}a.¤dg¼*Z•| ˆÃ=!H¸Ã¼jÆaË}>!¾ß¾Àä@Hfclt‚£9R DX:ŸN!ç.ÿÕêÿ\nP „0ˆuÎ„”\nLâOptF”ÌO×m[kb#÷©òò¼ùú‘‹´Ç™äw¦ñ2xÄÙî¢A	NÁÇìF\$†ZÉbCM<ÞØÉÀ}ú_\0S|\n#pB[ÁÈyáK}.‡8†ÿ<uñX‘Åî{“ã{Õp/\nZÍ‘ä|N›eŽÄ¸3(\r.>.@ØßHPH[‘rBŸlø{Øè=“ô^iÑùób4€˜fx\\IòøÞÒ>4IÑ¸}xª¯\nP‰@‚ŸØaâ0”Ð*#*„VLŽßjgyn\n·¥2¤	Ù×ïQ²HDžšÉµtî`d¹ÁŠ~‰—Ù”Uê¿8Yt“xÓ‚BGR)§#\"	ƒ†G<<`Öwõ¢à.xgWÅ<;_ 2Iá–ÏÖ—Ä±ƒ©>\r9ÝÖ“oS¼±î™B˜·X—–JÂÃR.ë‘ôå%§ÈõäðŽ'ñô'Óùe€ÕcÝõÑ%ÝkÙdØ5˜jhò£\nsÅísnOËpD>AÁV  ÂÎHjmŒø†H¼k¼¹‡<ÿ#`\næýƒ`ÐÄ,«ïjÖRãNÚ\n„67ÀÜÑ«Ô^eê\r© Ø½¦†/Â¼Œ*u‡ûM^ûƒÄùÊøú\0(,\$ ç¢ùPOî(0L0`d†£ìm%\"í PpÂðú®3¯ pÇqLöÏš„Žlá	¯ˆû°~«Ð¥	d[\niÀï…`\r£àÅí|ù0Š>ÐÀHãTçŽ\\ƒ€êYvùÒ.®'\r ê:€À×m{pÌúÐ®ûPkfåÅäÓË}†õÐU\n1Í>Ô1\$ùpº7+u\r@ŸP¹\nÏ¿ÍÒ-&»Ã¢×‚ˆzë¿) ‡Cè—\"N?BjÀæ¼æ¬8BÖ{F*!ÂZ\rÄ ‚Z?MBÎì4k~¥@Ê5†\\^Â@R\$žUÂØnirHñŠ¯îO„\n\"\$í«w\"ú/³QZÏ­Ù‘œ¼4À,þZk½°\r¯ \nÞÐ0©^/‚§ë‡0zûÐ€&ÇHmGL‡ÑüäÜiÍŽvgÃ¥g0 Ãàó!ª\n„\0úÎÛ!ˆ{\"ò! 0®í­í,%¦ý ÇN„²J;î„F)ph¥ô% Æ=C€8ÆtÍ%jW£ÄðÒ+#¦ºK”—d\nQ«n½Q\0004± žùêoË o’›0éñI m.YÍ„cƒ”9’F3’dÝ §\0Š\r‡+²O,²Á*…ªë\"u£TCd¢2\"h`¬uQ)\n“.‘½.ò­ÑK/`×.£Oo·¯¡\$dë0rû,lNp2ù.ÄÝOé²òNOc2‘G0Øö2G’Ó òâ_&œÕDcr%3ƒ4Ãm±:ö3J;­K5±'*ð½\$mS6MW42R3XidÆòzÙôrÇ0î“-)oa “ŒÚ¹*0 ö «9¤B*Ó,:Oz7hše`k‚Ý(ðÊ<C\$ˆÌå°3c;<Žä@Í]\rÅÇ!A\nh°âœ†¸êàràÓ>d¦®É>ëŽ2Âlƒ6*£\n\\L\n<E›sè\r2x8Æ;ìenzã¨#Q\\ýB.Vã±d„\r€V\rbª­…\0æ†˜N j9œ;¢’·C¶ë3@‘¨M‚L?\"”-‚ø!Å6V© \n ¨ÀZm\ríå9àÂ¶¦f‚0ýHÃ'm^«ô’TT—;ÇÓIÃ(2Ò0|T”ýlŒLªZV§àKÂ0	B:aÌJ†¾5ò²<hÔ­‹E”:cð5d\$£4ãR˜0iÃê;¯Öhhæ«¥îõ‘‰\0¯<Nb„»1›\"5Qt-ÈJÄ2RôL;í(ˆ3¢\rçæÐj™•6T¨ KX%©QTŒ³S¯† F³TJÑÉS•O2êùU‚ýUÏ—€à8Fl÷h#WUl5\"E¢Ð¸º/JdÅzðÅjëbS'£M­JLÀ¦\roÏFD’œBê_µ ICo\\Ž'K^‰ÖY ÔoBÜHÊˆ(482ÃÔóÆ†¾~iìí@ ‚ÁÏw@ ¦„(FOÂ„5ìÒ5D0Ì3â4p(?¤šIì&Ä´ _Ci_Ó\"d„¸B^ikI@ž àÚF‚;âZ";break;case"pt":$f="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀÞs9°Õ§c)°@e7&‚2f4˜ÍSIÈÞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔž»	&))„ç8&›Ì†™ŽX\n\$›Žpy­ò1~4× \"‘–ï^Î&ó¨€Ða’V#'¬¨Ùž2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ðSy¸éxáË`†\\[\rOZãôx¼»ÆNë-Ò&À¢ž¢ðgM”[Æ<“‹7ÏESž<¡tµƒ®L@:§pÙ+ˆK\$a–­ŠžÃJ¢d«##R„Ì3IÀ†0Œ‰ Âœ(óe¦pÒ¤6C‚JÚ¹ïZ¤8È±t6 èø\"7.›LºCbð¡.«¤ê®8ÊøŒ¯V	ŒËŠ1-¢[„2ÀR£q<ˆ:U\"²\$ªÿÅ#LVºK)ôs)Ëò¼d\"¹Ã“& +¤Äå ŒœÌˆ ÐÎŒÁèD4ƒ à9‡Ax^;Ñt06¯8\\ºázQI0æ¸ÁxD¨ÂHÚ85ñƒœã}„€èŸŒ›jÿ\nbŒ’¯Ë-xÇL9ST˜¼NSbñ£ ë7LKÆ¹IR½\rØÌbc_+Ã•ƒaÃbpÞ;#1û>Ú!ÕhÄ<¡ HKo\\\rˆ!ã`ê¼ÃˆõÏ\"9ÑââÈ\rÃ;Q6\0ƒ`¾*ž1®B Êý£`è-×T‚)¤£-næ±â5ÖëA0‚êºðJ((&Ã¨ã.Ù á\0Ø7±ËØž9C+ËÞÍŠçH2M„§)ÚzŸÀHÊJ®B(ŒA¸*LÁMz&Ç\r×zx7)b&L¾îÔÞÅYÌr[)?Ò…ubë–BZØä†ºÚL6\"Ž{t¿°JÒ´1cƒK\\®ñ•<!xŠ<pµ¥inÂCÑ±nè¦á·Lí·`Î3FÒ¥’ Þ3ÏXÜ2§\0åFeÈ›bè‚ Þ '£ËþÉ£Ø.L7®ìXÙŽ]Â3Œ+ÀAã\\uK „…˜SÒãZPb˜¤#xéJ„õ©pA6%NR^º\r¸*X¸µKuñÒK)ú„ôïkpæ CŸkÕ¦éËN7\rmÌ¸nëè2:‚ïØ’Dl•<šdøŸŠ€\"Å ¼œø©18a¸Ë•ÀàMPÀawî\0üŸ¶Î›[«é!4Ã?:aƒ˜w.Š¶S¨÷ j{`iù@(%¡”@wQPF‡%”Š“@¤¡KœÕ4§ú¡%Ò*r ªR*¬UÊ¤0½'ŽÁÑ3§'±LœddßsJ¤+ôèsËr\"Æ\\4!8–Ú N%¡\0D_”³6A@\$&m‹¡‚à ¨’NW™‹dy@Ø…Žk£pZ¯“XÞƒI¯çPŽÈ“doCpo`åé“‡xndiÏY\rŒ—€ìöÑa'Dáœér”\n	C(±ù*å>GÈéfèŽdÂbÑ#Þ>ä´ý-ƒ¤€\"šT*à\$‘ òi#5L;*ÕVoLë\$+Çä›&/œQ3\rÄ“ŸéÎ‰^ì\n<)…DR©<RíÜtÜÔ  Gá:²\\oš{<œ†l3B8Lìp˜‡07²›¥¢4S¦õ@ÐÅEÙ©+#ó(R£á*Hbz«J+…‹ó°øº äI\"2ç4ä‘-{(á`°6•0‚xNT(@‚-PªA\"„À‹Vê0Ÿç1u.Å­X’€P%ƒQ*£ÆN¨‰r	áÁŠ1 ÅÉŠ¸%¦°a‹2ˆQ›%@…é¸‚Ì;ÉC, Ž84‡„|œj\0\nn‰¥È½™n(^äº²IM·dHIÏ[¨„(1†+jô”\\}žFN åY7 –JËKæ±”?‚(Ÿ9B\$†dô¬²‚±u„d¨¥PnSt·(|é©X˜_d\$†*	 »PF\0Q®5Ó+½'7ºC´g&¦‘@¦˜’\nèSë…°Ù6u\0R?(ÖEÉ‡RA%´¸{«Ü™Kº¥!*¡Þà–Ew¯Œb5¨Ì³[1¸5ÛÕë(Ãj3Wåà¹ažq«Ãu!¡¥EAêBÄ\n˜^Q‡\")ˆm:Fø´	•Îs&/¬ò^Znkä7%ÉŽ[S¾Y\$9ÈÉ%‹XKV¡Nir«…@‚Â@ d…Õ9ÙÇ!Ãƒ…•á9róG³Co\$–’å’Po\\J·8(º¦j/Ì9`Â›Ìöq a™\"·p\\sÆi0YíH¨DSó¦ÎÚBÍ+Ðô¦æ®ÅhÌûP^L	ÑIÔ8’b¹Ÿ4qÌÌºõè}BsugÔº{G&ªÌ­=!ãTölX96äQ¿È“”cJYãØ®¥\r„,éõ£FàœB2w’ÚdAÛ\$£ítµ3	l®H/]ëÙ¨UJf5±MœàæQñ6eÃªñ7ÝÞúÉ>ò\"!%WÒêÀ.¢ŸpF.UÔËã¤—É%=…æý­­Q–:Ïá¼ 7Åsºe/Ù:¼‡NÐ¿+5ÆŒ*©l¼K˜>B½‰^Ô¬-Øßq°Q’uÀ/EÑÄ€ü-X„Ø8 ²ZˆEybí2tŸ]W5gå4Þ+pÉÌéÁxQqºä]*ÞKª\0ª–ºÈ (×,ì7‚žWfÛ\rª@œw†Y«]ÚŒá(H„œvùÿgùGtí¥]r.\"c¹Uõ¾öƒ…èkzÜ»ÍûðH«,‹÷‰ÕßÏ:/SèÜý¤;‹—Ò’(›è`Á|¦¼òÆã?é.lƒ„óˆ3ÈœOQÊ·ð¼«Öâj\0½~êþÓÈõ{î!mœª3VNÁgIvzmÔ¯aÈÖfÎó=‹Ì£>´ïÐÏ®/äÔÿ\"EÕ	<( zÙtütÓ†åIË#9Õ|§ÂJ½û8›íÔkï±G±Á57óüÙRlŽþ1ì`èoŒ]€¬IBñ®H'¶Nç+5­ñ+4ÉæÒÉNí°4(FðóÈ¦#/…pB9PHÉeÎm‚[e¸2\"Daä(¥Î„,jê\$´NL>%@Ð£ŒÈ©ž(°JðŽr0„:ˆÉotñÐc°”É„å0Q\0\"ZbB²:æˆÃÆ¼#° ÈðK§?&'BåËil]®¶a#ðJ,ê-ÞK&BaT^¢WÎ<ƒ@Ë°îþ0¦ïFÐñ0RåP¸9C'ãQ ëÑ\n\"€¨ëPôá‡ó¢=+÷'ëQåÜÅbìÅ±.ðÑHÆfKPDt¬Xd°N1R%±RÆu1j âr %Ýä\n¤ÂLfÏ‹÷¥PšâGóÄTnâ[ 	\râ•CÚ]åêHŒoð”8Ç“\r'ð6i”~O;ð \$	çÈõ†NeÅº5E\\0Böèy-€3oRÒ±Ê§,ón°\\ãÄ\r€VcÖd†!DÝàÄ3ª\rÊöÓ°”0@Zdâ¦¦R?¦0‡²ª`¨ÀZÂ`€BpÐ4§-Œ{¬æó,â”éŽp-,Žbš#„<Ré,uKM\0‚ä\n›\0.©®\"‘X1ñ˜½\nt@×0º±+/Gà%‚p\n„w¤6at`ÂŠ.@˜¥Z(Ò7I¼<ç*6/@ºÐ|5å¹'ƒxÖðÞìE¤^«úyêî6RÜÄp Kæ—\$ãC^6Oz0‡¦`>•ïŠqkÊ?2ûät£~AS\n§¦\ràà9åÀ\0É2N6@.Yf6m\0ê3%r²¢ó/NL¼¦Èæ*àì‹(K^'Î¶ûã Ëz±#¬#\$’Ã:àïNæF<@\n¡3L\"ó£Œ¸\"êlÎ)ÃÅrâkk<+îÆÆ1+\"]\0á(0þ%l^”f¡*á\0FëC1Ôí¦ªäp";break;case"pt-br":$f="V7˜Øj¡ÐÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhŽXjÁ¤Û2LŽSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RðQ\$Üs…šNXHÞÓfƒˆF[ý˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\¾i”A€Ì_f³¦Ÿ·¯ÀÁDIA—›\$äóÐQTç”(_mèêÌªz7­ÂÈƒ2æjÛ„\nÂ¶®©¡\0Ô¡³Ír!Œ#\"V0§CJBÜCC3\0ª\$IPÝcª†¾¯HÉt6¡iÖß.r€9C‚¯ P¤2Ã@PŽ2¾orû	Œû‹ŠrR\nhZZ¤³o´TPÅŽÚV×BïCP\$3®ŒpÍ‰ƒzþ7DÃ’z7%h0F£CF3¡Ð:ƒ€æáxïA…ÐÊ£8Arø3…é]<Ašò7á°	#hàÚÆˆxŒ!ôÜF¢€270\0)Š2JÏ-6£&ê·ªJ.&¤O+ªÛ¼£¨è:Ç\0P‚6 Ó8@–¤ˆÝ…b!uÛM_Xàœ7«ñûJò¯A-P1(0mâ‹ˆcxØ:°0êB\\´èé/L°ÆÑÝÈàƒ_>j¦1¯Ocø:Ø–;:Œµ€ËY: te<ÛØL–‡¢âƒN1Ú,ÚhÁ&ˆX@6 ,'ŽPÓÍÃW›n…:8,’¨ÎIÜÞ @Žò\rH/B'eacbRÅMª,1§×cæŸ*µ`˜1oû¹Œ¥‡bº²ô0Ö±–§f¦\r¾:úr>º9ëðà‹²`Ã«LÇŠ¶cHØ/ñ•2¡Œ Š<o}Ù±8l`ÙRþk1VÀVÏ²éïn“V#6Õ5‰{¼7ŒÃ0ØÀ®0ÂÍ'Cz‚Ÿ0.:ŒhRF3`üÔðˆ(åÒŒ#??60mQC×Ã(P9…)È¨7iX@!ŠbŒï¥Š6¤…ÁÊ–º¨àÌ¾\r¸^¼¶+µÝÎ¼é+{p´1JÉ7¾\\7\rmÇ®˜?ïH@ Œ”:ØßŒº©NlîžJÀ\"Å\$À Î§Õ	Æ6ë\$±·Ã4†C±oìþ“@Ø -@¹jÄâøiŽX¤€Ç0î_Adi =úƒ*xOIñ?(¡3œQ*-F©DJÔ‘ÐRª]»©ÄãX\n•Sª’zñNøtM©½8œcv_\rú53Š3S`¯©®MÈÉ½8GB‡ïèè„¶€‘ª0ÊF.…\0´Wo1È€RJ‹22AÌ†âlJ¹ÐNŽ*àÜM¨gH‚,ƒ…\"‘‚dÞ™VLTÑDgdpÀgœU	9\n'PèÊ„ÂPŠ!FŽ'y¢)¤JSÓqRDˆ<>yvôOÉ0?„Ü˜Õ9	\$T<š´U\rŒR3dà#FÇK1û4ä!ú?b`©ž0cdS àí_\0P	áL*&#ÍIê’L`€3£ƒ²çA?Ô‡†ÌÈäÎ˜Ï|GXTË³‡(Š#‰G2@S”!\$ù\0©°Þ†h*á/À¥¶äwž  ÁR<4ƒ¿-ˆdQ›GÌ‹%\"…Íq'@Æ˜ŸI(E×ã>7ÊM‘„à@B€D!P\"ÓÐ@(LµŒ\$TÄs×:éZhÁÃ…^0Å¥<ÌÈŸFš\"ïÐ4¸ó«#ÃyE(à)\\yŠ¬¥mcÆ-Ï‡‚ôÊ=nK®¬6÷™)…Ï•+6ÇÖ_po\r4s»gÒÁ«10°ÕõÄ¶]d«ãnq)\$³K2@ÅàZ2\nÏl¡’s>â¬éÚ\nÄ.*0t¨è*º”Â¥#X×kc´x+\0)4Øâ8¿\n=¯·a_˜ ÒCŒÚåprŒ³“.;]¡ÁÞÙoM¡'×ùO¡\nÅ%Îl=I2ZC¸\n\nÆ|±\\×‡;5•ˆ5µŒIo›ªdeöIÓÖ¯9Y‰ˆÖUfL1;Í]êl°B¥ü’AÊ±™+\"ì‹öA@¨äâÇÌ\0k|\"´Þ€ Œö\rõw\rçHÇ8¢NtQDmíþËÓôR¼T\n!„€@ÇKêrÓF<‡û'B(r4å¿”R±âàå¥p5®iÖú¨ÊÉ(Ó®C¡“çyd`êú;ªi2á2Ç¹1‚à¹]>P0ÙŒÅÜÍ–³A¦D¡‡5çSQ‰ú9é¼ªÎtqœØÁï'+ƒ'0	ÞÙ	NbÑ0@çä¬Ø÷óvŒËú8Ç`ã¤CÆt‚á~ic¦V¡Òi £#DÃ¹nñ`ê“2¼¼iAŠ¡é‡[Ô@mÎ\$dÎ¶ ÂBf!<)L¾,\$ WÊ®ËD„ÂN%Gªu0+…0›á²^®ÈCDe ï³Ì®)¡0Üts# ’†³/«òÞmâŽ½gÌŽ|ç•°~ìS56¹øœ„ýû•Þ·7ÇRòfÝøµ³LJzö,ð˜Í±IÝïà,”jÓcøÅÎp|o}5N@8Éä‹Ì—Xú¦Ûœ	E:lÛFÈ\r¸œá91CÖiÃ‚£\"[cávñ·¶=ab¾§ôB§s9¹|b<Ü_òƒy<ä«5[<\$=¹è­êí¨£PQ©êèo55XK'f‘/±ŽÖ»f\\Gqà&Ž#ëÛ»Åˆåi“öþóblY‚äÖƒ8¶Ò{a»Q›ÆÝÄÜ¹gò­—’x®¸Na®'¦l)b³mµVdÎÎèÑoì—Ÿ3cÐ>—hU}f[ÏFãØgãa0I¯ÁtÓXç|žÄxø)é|Lä8Vïûà›=¾ƒå»R.eÑ§S	|/Ï¶–lŸ+*¨À9”r×ÝŠ‹ædh+ñ…·*f;Úvœýý~f¯Ìƒƒœ#tßäî!bVVIæþMÊþ…ô/„ù¬ùëÜåF°À8­€Þ2IBjL,Àê ûë½kZò/¤äðH0¯\"ù.í#:ó°k,:¥½¯Åîjùèò‡¥ñ0NônN0~!/ôqŠÊ: ‹Ìi	œ2ÂJaL(ÅØ‚„·ãæSlØ&	6ä¤jIòôÃKùOhôï;ðÑ ±o2ä¤˜FaÅ”¾ÊÎ´\$^°Ÿ‚ÃÂõp½B…Ôììç4njP2Ø¤¢&‚\rÐÏ¦£€ËAU‚\\ûQ/\$Uq+Ï+pæ¥±5„9QQ1Tß€¨ëñ-‘b\$1<âñN*e×‘t/NÂ,2cÐWp„å%O¢äÑ‹\0ÎÂqnôð&˜ÃJÈÂñ¦!bt å×	±àÄ¬^g±¾K¹>à¬lJäYâr	\r}\rÆ„îH@\\\nÐuMÆä…ŠPìÚË+> +B±\$p1\" ôîº]†@rÁ\0Nj1Cèƒ(\\¤4/\"Ï²\"Å\"à ²5!`†< ØiÄ\r&:\"ÀÞCFŸÑ?M¶Ã® ZdrÊ>‰cþŠCyŠ~\n€Œ p%Q)cÒÑlðáHÞÍhöLÎáëR˜lþ##:#É(\$i%#0V0@F®Rpp5€òGÃéB/ü\n¢¦¼‡.ÄØ:Ã'Í¾‰r¦Æ7ò_à (dÖ¾tX‚Œ/DÒ£%£z1Kx¢ã\$ÁÀç-8*«ŽjXCq,-:ë#EÐh„\n+s.äS2/Ž´¯)P÷î26£pùƒœ Þ…i:3B½ò¢!; >½ÓT5°#5¤Ù5â¦*+Ê‡…4DR¬Dº?æˆ&03f¹ð5«š Æj¸'îÀþëèµ	Îa¢8I ì4rÍ*Ô&0@FG8+ŽjCá£6µbû/Í&#6Â3:2Šå.<ðËJô\\ á,±Ap¬i\$;\$8Ø¤n–qÿ!D8v³H";break;case"ro":$f="S:›Ž†VBlÒ 9šLçS¡ˆƒÁBQpÌÍŽ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ðiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†Ž7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’IŽf;ÌÌÓ=,›ãfƒî¾oÞNÆœ©ž° :n§N,èh¦ð2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-KŸ£ë û!†{Ðù:<íÙ¸Î\nd& g-ð(˜¤0`P‚ÞŒ©òê7¡(*€°ËØ@†\r¨{‚0¼Œ¨@± m\0ÒƒªIê~ì¨I²Ä¦ŽŽ»5)ëò4¦‹È@Ã„	Xä0ŒoÜ\n*\r)]\$-àÒÂ¸+ËMc\"1Ic²à)	í÷\nB’M¼¢8Ê7£(èÖ¿Ñ\$\n)ÌCk¤&rœG£d~Å/\0P¡\n.£!0Œ3Å@¬ü¾Î‰ƒxÏ\n'‚f¢Ã*Î‡‰`ÐòÁèD4ƒ à9‡Ax^;Ór”¦Q#\\¼á}SÊîá¤	#hàÊË¨xŒ!ò¢§K®8Þ28B\nb‹þ¹¬ Ë½èƒÄ¯R²šF¨dì&×ãJ\\”=O àòTSÆòÛÍ¶ë²,˜ØšKû@Ö+©ÀÜÙ3¡-€7Ùƒ {ÂB0Ìì¡€Ë—(4Ž¸È˜FÉ`ÂËŒS:\"£6&6+C²ú:ÌvU˜èˆÈÇ\r0ÎòPo&‡¤4\"î¼ ,;¤¼\\`SÕ¼\\%8¿ê`èÿ #:Ñ¸Âj:å*´€À¹(Ø›]0³W‚:V0@8äó+‘›o;£rÛCM¸ÁO1|ö[EÏilC*‹‡Y¯SpÕ³:)îª.Ùp ñƒ‹Š\rÓx2èÙMb8gèŠ<r–†!¾OK•uL·Eóã¥ÀÎÍ+‘½ V9#6(Ý	~ŒÃ4ÝD§¢J˜åÂ ÞÜQÌÐ£®9Žc2†6PO€XàkÈåA×å@Œ¡@æ§¢¦)Ö×El4ŒMà\\JÒúÍ'2ð¢ª°WÃÛ³Q‹Oá+	è¨Ú\rÃZœûŠðu!'Ø–^É›Ë;hhÃ•å{REHàÈwQ{êÝ\\¿¤šPÍ		 (lŽ!w(‹SËJ„pìuàZË2/ÈÌ˜æIèM%d™‘øvÃ¹xXˆ8\"ÃÂùà|R*MJ©u2¦ÔêŸ\n‰R*`ÜªPiUŠ¸9«d­WEH¢%àÐ¯Ö	í{ï„­(`ä¢É„A¹Å¼ÀÊša8g\\—(RñA¦BðòE”\nF¤‹6¡¤ÉÃ¯7aE˜ôpÙÃ=@ ©=†”J5ƒQ¥o†“v•…8ä¯2´_^@wˆé©#Àè’x!NB°ØK\nÁ‹eoÑh“Ò4‘	¡6(¥#J»Íj;)®B:>T,KqY#’ÜÐ>xt‹Àa~HtÏpòl‘xiX¸œ†å€qÎIäk“–Â²=•=8ï€1¼…‡<\npp&ú•€ÂŠP	áL*H•\n|iä|áP¼´\$®AÊ)\$)DºÙHÜÈ%ä^‘Ô½2Q‰Ü%Ä-  Êáb4¢'hp9›	ÐJÌ	Ãy*¾PÎ±Ñ.BÆì–`¨äî|*ÉœFÉê—	Èr'j‰€·Ò%’‰Gn_ ¨0|ñ,\r«em³ ˜’„Éû7Ì¹Œ™D*ào`”¾Z(T)I’ûKe!1¢´tÉÈ3P@F\$:†s¯3Öãq(\r®gˆb‰…Œ\$À‚p3ð~‰™ýOiÃ3^Øòn…•;˜E”è9#sd­1fhJªpiê W0Þm¨tGü¬’Å¾¾\nÁ”N!Y…ÈÓ*t™ÈVµì1D’Â¤•Ûö²VF\0 *AR@OÈ½¥óŒC\rÐ»EýYB°æ“yatƒUônd–QÒGöÙ.àÙ–^µ&7uËÙÛ<ˆÖÒC£÷#ráXì2‡tªVøe\\\$	™Kà]Œù‡1”·&Õ€'qbÃ‡H†G³Jàxpn5“šXÄì1ên¤ÊéÕ–.²åøn&	Á™bû\nºÈg­`€yúÁ1ÚA6\ržxÝY¥I-#²Ë‚3ï1IÊ•pÉ‡YxÄ”K³¨è‚);ŽŠÕ¸e;læNºmMé@¨BHkmt™ç_;pp•RÌ#°ñ2hÃe‡²sÍ¯5€ÁŽ53Ax¯µ3Ùá]e!E®»âÄ²ÙˆtykóL/DQ1a+˜ 'N=<5‘ÔEGKš­L‹«æmIòcrJU¨zp¤ãO†=BOWæŒÕúÄÅí-žõp-ÌP“cŸÅ5NOX¨ÖV¡Xw²Ë¹6²\\ˆ&Jí0p•(I°W\rÈ+Óœ]Òg°±1=cÞ¨Õ2}¼)DdPÛõ4íÍŒ´JÞèLë÷ÚàA/ÁÃ&!g-M\\Š÷Ðé¸Ï’ñ#	!äÉ+ppZîeˆ‘žHKkY›[çuîV´Ý|ØAjg¯35i9SŒå›º2s©´|	œšX\\¡ôk[ZmK]]4–ó½Q®µWR2S˜Ë=¾”Pu­í!tõµÖÊe¾*¸”îˆºG‚¼+J%H‰^Jå™\r€¹Œ¦¶ö(ŒK\rz„l¥9£5zMö!ÃeækÚ¾­®[Nª2À)(2÷†«Õë®LM®³ìÑÃKGÑuÚW>á“ç/êÖ¹\nsK7m-ONÃÖî~ Éï¯·R+ªÍ®½Ò½7°õ>ËÈVYŠèÛë‚ö^³™ÚGòX—½+^ÿãüöíôy‡Å× ¨c*tBÒ„Û3„[ü¼µµµÒšŸâjž”0ÚšË'eÓÃú5¦“Ó&ºÕ~/´òG²ªÉ€U\"fóT›O˜æ€‡\0Lk\0ÏÚëj_\0c÷ÏÄú‹H`JvQ)®+Ä¾Žæ˜…£Ô=ÀÄ:ähY@Â¡> îÒÌP g—èðÆŒL„ÄÄ¶§@R\\\rÁŠc®Ib|/ßŠâ®i~°z»°2ªÍ‰\0Œl4¬,]O\0;lTÃËÇÌb¥063¤¬Â,&\\o°ñïÜøðº\\¢–êZ´ÊÂPÎiepoHöl!Ì(eÌÒQFŽ N¸õn æc.ÍPú\$Bmï\"Ù­·ŒÙé´)F`P`è‡-R<\\Fð·\0ËîRÝl \$#¤Á†@ä;&†'å–fC¦:¤L8høíÆÊeÇ¸¾Fpéîdæ‘füñmŒ´‘vþñ{ãäøð¬†LAE¯£ÔüÑ„NËo¬ÆïLÞ·¦G\"†<‚E	âòe!„oÍB\n!„qnæ#Fù°ç1ÆQQËñÓB{Å—7ÑÑÏ¶À±˜ìqð!ñÏ‡5 2r\nGµïÄµÑ ÅÐG#n‡Vë&ÅQ¢sNÒ6æR¢‚­q¢òŒƒ\$Rû0ÆRND1ç±)#Ô}L„M26ÈBM\$pVQŒØ@ª–ìN\nQ\r#öÛR‚—‰\$n¯1'(„Îbñ)¨' ‡fú¿qƒJ\n}?m„*äüCöT¾_‘œ¦¯àñÉµ,ä¦1rÔþË``'¹§R]Å‚2\"l^Ï)+ï9,²UÔlš#--¯ýbq0ÏÖ/'²KàØiúm@Ößƒp´.0P¥Ä&ˆJwÜCÈê\r¨+C'@@\n ¨ÀZ.\$å²>ÍX\0ä™å€|G,Ù­Ÿ6¢M£Þ©“r)#¢>\$\"FtÈd0ÏR†§62’.[F¾JËØC`<#4fN×3b>®C%Ò›ìduÊH\"†‚,Ï VÿòbzNfŒ/€&©nnå§ŠÆåÃŠNÓî†£îåìSè1EÙ\n%”ñ°.äA©@Ã+A²Ú®µAâp—ŽºÅ)n´ô-Žòp¢2¢œ6ƒl2gÀÅ3ê¾`ÉBbpIe½¢H@†bn±®Ê¸æFcºÖF‘ël`‰oG‹hòå–;#¤ FžáçÈM%Üÿd„¸Œì@	àáE%ÂüøÁ+Ô`B—ËÕ¤(3 ‡ANH4 š\$-0\"úá<DÆÞ@´ÎZ&ˆ££+ñ QàKfV#®jI…d(mŒ<‚@	\0t	 š@¦\n`";break;case"ru":$f="ÐI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hÐX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ð&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)û‰\0”	Nd*;AEJ’K¤–©îF°žÇ\$ÐVŠ&…'AAæ0¤@\nFC1 Ôl7c+ü&\"IšIÐ·˜ü>Ä¹Œ¤¥K,q¡Ï´Í.ÄÈu’9¢ê †ì¼LÒ¾¢,&²NsDšM‘‘˜ÞÞe!_Ìé‹Z­ÕG*„r;i¬«9Xƒàpdû‘‘÷'ËŒ6ky«}÷VÍì\nêP¤¢†Ø»N’3\0\$¤,°:)ºfó(nB>ä\$e´\n›«mz”û¸ËËÃ!0<=›–”ÁìS<¡lP…*ôEÁióä¦–°;î´(P1 W¥j¡tæ¬EŒ£\$Â˜ìÂŠ’´ƒ1ÚU	,òTúè#ìâ¶‹#Äh‘Ò¾Š²äº”‹YvŽš±j 0Œ2ÏLZjÿ¹n;†™£+»èÎ f„˜‘IÐòA­ŽãPhîÒ‚¿£\$¥ÜÊï2^\$}\"¢9	¡°¬på1Ža I¡®BÏ<»TÑ¡\0;-ö\\SqlÚ¼ÈuzŠ¢-JL¼ËÊ¢F&O}&†ª5q?CÏV2¯«)ü56d+RüCˆÉ<ç%¯NÁ‘ïGQ8!\0Ð9£0z\r è8aÐ^Ž÷È\\0ŒƒhÒ7£\\7ŽC8^2Ø8ð:a˜Ò7á!ä¸·’¡‡xÂ%U[	.#˜X‚ï»‘#P5•aØ®LN\nbˆ˜4á‹ª\"Èñõ–äMk”éN	±\0˜¸Œ&ŽA×Ë2h”2Z[‘eG&0™,ðffý\rÛ´C ®¥å\\.½r:a(ÈÕ§I¨·nëõ¹íûã‘ ìÝ…®Êi~Œ“KÊŸ®¡íÊ‡2£\$ƒ¾)úµOÎsÛ‘7êHd:åNZÂ2K¬W)¬X2²b§É´üšÒ&ÃžÔÅ\"bŸ)d2›Zr_1¯NWlšYKÍe\\–IR¢GoUVBÃÇqša.OVô}&M™c“¯u¦6¦©î7Œ§Ì¥ÅtÝnVÚÏð¿‰_J¶=ÕŸ±?¤Xš‰nÔóÀ\$\n2ILIKhâ-\$Äh‰P¹ÓkMq§À–êÆ‰QÂ6DÚ4ÒQrp4gqL4Â4ÙÖƒƒp\\X#¨Fä`yZP0H°ÁQ Ïßƒ†@*}à+âž“y§\r% Ž ‘™26\r}ùŸÁ¢Ù ñ¬Z'®-XLC\\‰N¬ð¬\$€Ø’D6ÊX±2ô@o±£BLèª%Šˆâ`rÅ9å¿f^Ë\n#ÊO­WÞ QÃŒ&âUã+&1˜ÁâxYB»;‰eºAsèCÄË`¸«¨Ò˜ZÊ‚ñº8#bcã¬6­¬äG†ø.£ÚTú—™ëØÙ‰Må2C“ñ¢åÌŒo/t©Él\"ä¤–;RaÃFÒóÒ´q“ñÒÊ5)•Ä©Zr²@!`UR”´lò%H²ã.ÊlNí˜î÷Î*È*F˜±„0¦‚0--ùJÅ¶b_ãV:&œ’RIR0+Éx•ÆBg[Y\\J¯½ Èòc\na¡\\¤£…@ÐCpk`€30@@Xpnà€ ¯ÕþÀY8cb820@ºRì]ÌH9‚ |€a‹ü3±Ö>žÔ¨CSœû¢ØBPSE4H›ñtÉåê·=ËŽZž²r\$ ¸\\TEnAÊ(R9ž-èìœ¥šƒªa^8qú˜.µÚ»×Šó^«Ý|‡u÷I˜`Œ„0¦˜sôÑŠ1b SR|Ø–TùAsi+'–ñå–.9Ì[;“!Ò­ÂJ#Ëì‡ýæéVÒªDÕÁF¢BÇ–í<ÿNCÊ‘É:aC©ªÎKRs‰‰Ùªh1)¡©8é¢­¹LPa`X‡ÞGç1CBÇÑÕèmAAr%!±\0éÝ\"Ð7‚\0àƒHv\r!°2†pÊÛÃƒ”l4Ñ°ÜÃ  !°6ðï{Ë©Õs+t¦³âæ¢˜m,½B¬g\$wJW?‹³,\"P]T‘%3ÇÒ7Î&FòÉä{…Bu——0K\r³·ŽbLÄiq:\"cý’M®;JF®.e`£W˜¸”%\$ÎFD©LŒ)@£k:IËÂcE- J‰aØB\$›	%šJ¿«ÍPÊ0ñ=HIf–È+EF­Ž¯Ì\"i1\$Ñ¬I¢25U‹Š‘„TP@'…0¨þ¢l¢šˆ0Æ™dòÏ–=·EŒö\rZ…ä%°Nëá* AˆFrx÷?¶¼*HY%X´‡“œ8Ò”;¿/&Èüh«w.Dd´åœ„Ü”›SAtJMf¥	›nÈœ—Òy)\0F\nAJuË„¡¼>C“YéY¢ôéÛ(zE³©”˜O™®¶#DG[5h†nœl€Ò‘ª”Câ×–S‹ÍéWsA„ù÷RÜshÜµ¢‡öË˜ÁŠ»{-ðŽ0¢Ó%aïÎ@ù¦Äè>g·©ôÌÊ1\$eeÍÛ¼¸ÚkJÞ,ªðßDÜŒã£…Ÿ•6ãn†æÄ£¯¢–¦zYå–Ö-;C(“g'¶“×\$hªÔyrOæÞëÄYú4}FBå`£¦Ž\$®Ú¤”ßÅ\$UŽèŽYå2çˆE«‹„¹¦JP3˜H\nÊäÆ­O¾car‹Jr5d=dpû7ry½KT\\Fl6áÑ;Ž\"½Ú™Ê}%¯Ò#/\0kUX€H›{!@ž{˜çcYäÖ¿Áó¹>N†·å‹†EûX0{‹óŒÇàt ï§†>¹¬‰ö§¹}ž+ñGî4»hKÉõ—|ž:´ïÔd}C‡™!\$õèêSUÈ¦P)­üf¼¸o.¨Ö¿k¢¬ží‡O¾ª7ÆòÑñ>Îƒ*³¥{+pÓ*ëú‘´'[5—“ŒWª9Œò,F²M)ü„‚j#!JÌlÿ¯^@.¨5æ”æª´!vhxÔGpA^€„¸UÅ\$æ0\0èÅ¦âX‚XÁÅY  ¨\n€‚`L¶#È£\\Pk WmÂ[Íº&ÂNâê[m5d\\GöÊa¢\$mà^1æè¸\n‚\$ðÌPž£	Åpsâ[CÆmN6L\nÔª K´FÇB›ì¡&Ø˜'@ÊCŽÊ¸ìBº+ðÀÊ°ÆçpÌn Õ0æ¬üðâ!ÐÂ„nFä¬‘°bêÀ\$zÓhd@hÑL\"ÈŒl\$pÈDÐ}	0üêPÜŠq*Ž\"#¨z¡CÜ’‘Ú(*¬*ˆ½âö¡³‚IÆó0ŒCÈ¹ñ\\tÉ\"(1bQJuÑZòÇ´Äc£\nP®Ö%Â` ÂXýmz*­~|%ÆGŽ7Bwbb%‡DÕÊÚBãq6„`©V@ñªÚev÷äÒ×ÄÖ.CÔ<HÊ‘‰»¥­–h‘½´Ü®ýMÔÏ‚›G\0.ìÖrÄ¦íÆô¡¯š3Ð†®öòŽBGË8Cˆ¹pLµãâq•\r\n\$%)–cÐ.±–V#EVÝrt2Q\$RWP2³,öF®|\"ê.ïxle¤zÂþç+FñÒp2z7²~*’‚±ë(’vñhŒ÷ËZÉ)lêÈ„ÑoNƒíï+7 ÷¯ˆOÅ+ÒŽñ§í\$,Rtq0t¤ØuuG°@ˆ@ÞJ\"&*5«.åPIZ2öøú%ÿ+¤èåàéZÒî.hÏˆko‚!¯†e±	M)äþÂS\";ŒD÷è`> @4|@&Í+gVp åîlé©G(	lŽrM)Îf‰n˜™²§&ÊC,¬&k5þK²k(-Ç1	(³VÊ3nÆ³`=pÄqN‰è96.lÜòuX=jª¨ãhôÒŠ3¿:³¡2±](¦vßÍhA#)E¥Ó	+×Pj‰\"+Oã°m“s)s¢²œ’³Û*‘V,Sã90êc‚Ôa?1k&KM?¨á?ñ\nJ©ƒ@su>¯‘9>´AÑËM	6	“B“-e®“Í°)¯¾Ûmºóû(F1í­EO½ÏÃF2˜qiE\"…EdËG\r¸–ôc8óZ.³>¹¤&-„,4ÍG¤J’Ä\$=EDPš”J x©r¡í(LCÛ§:Ñ1>ÿÆþMÑC. ù/„\$Ê ÿã\\#ñ'7¨p‡å¥Id*,\$à’\$ä}@:TkGônü†üRò‘t¼Í‡¡L#\nPïHˆ¯{1O«¯:ý.j(¼ö¯o'°à‹BsÍ7Ô‘SfÁ%íóBQy:õDâ•H9õMSÔH\\c‘9-;S×iÊ÷rG‚e…Dsc\$µvËHP5VÝDµCÕ‹MMSX“VR®@•ˆ‚Ó¤ýr­WÕŸVË3\$•²µÕy+Kg\$Á|pF(A\r\\ÂBBÆ©ïàò¬NÀ‘\0¹HêÄ:öÐÛCÓï)4	FUw(µõ”_£×9ðé:ShÞ÷`¤BGÅ*Õi;/‹R†¿bvˆŽ;G³Ru¯ –W3îl¥uVpCÖ0,kc•¹d	dQšZöLN¨ª0ÂBºÇäp@AW]å84þúdª¸D×XU;<\"óbe¥;¥ÃgÉgéËh, Ä¯â:VŒ(ö gõàµ&d–OD=Ö‰hÖ@b¶>h– ð¦¯Ig¥hVÄ1QhÖ[mV{mÏmÅj¥‰n\$On‡36iõ›bc=èË+Äþ.¶<¹‘üÕ'dµ¦ˆ–t.ÏÈýÍ58¶\0*0å'w.ü×3(ÊÐ7:üg4/W@-75HÈ%q•BýfŒ)¯Ê(¶êCbý·R9§xÁU{\\ë¶¾út‹6E	t¯àôW…möùGTL!÷‘I0IjoH¶%Hð\rPD;7ãÝU–CÖ\rxÔµO;%\"·¥MC×\rñðï>‹KBõ£}‚`L1\r}ì¦êƒWå*‰’Ëp»~Ê‘·àê¤<.§\n\$cDÇ£=cš©\rž›ñõ€1‰}E¥yñÑñ\$wúÂtwlÔ?FÖVPõ@Wçƒï„RU‚qFþj8h°\r€VRE>hB‚‚ºÍ-‚e-+˜Ë\$e&ø²¢³˜>øì.#1ßW×On>R¦ã1JM˜OdÞ\n ¨ž quÍ’ŸÍ—´	¶å	éV’¦·Œ'Ÿ#”6/xÌU†€&iƒmÉN×·ñmð¬h–wRV}â¢’(hâàÁÜll’Ïq¸˜Iïhx\0jd6zþTÙ úä0É·þå’ÕSÒÝI±_eu\nÇ¸sÜ¡ Aj0EÖ²GWbuv6÷öñhï\$1³¢dƒ.\" sZT³qµÄö÷í¨\$òHw‹Xcõ\0²ŒoRÀP3`µKç;2ïw›É›SÜµwn\"çrŸ,¹\\l[%XÈ,9×œGëBP#9Õœ9æ©JTIyø²6+kšùöeµqÕ9^—Äxj·R|9N;,A,™èˆå´uí+ôÉ8n:ïŒàÑ4ùLDêåtªç’¸ÌLÐ=–É¬W!\$Ci\" Áy¢ã8Õ9ÿÍšGÖõzŒ„‘a…G:IQ|Ao¶TÅ·ò.TÎ*Rç˜K‹^‚9„%é#‡î‚Ž‰Î=©Ê“ªLp©K§kgûm·¨ÀÌd8·\08Å„b™5&²5Z³¥#wy~:¢j";break;case"sk":$f="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØÞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚Ž)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êpŽ/ÆƒN®þbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜Í\0­ñ¿!À‹·ôF\"<Âlb¨XjØv&êg¦0•ì<šñ§“—P9P¼fÙçÐÊ96JPÊ·©#Ð@ Ã4Œ£Zš9ª*2¨«¶ªÒ¸\nC*Nöc+¨È<nKdŸŽcY†TµƒÈà<F!ñŽc`Â‰‚´þ\"Î0Â†ˆKª`9.œÆã(Þ6Œ££2ô I˜Û\ncÊ³¨sþžŽ@P ÏDlDŸÀPÕ\$ ÂÛ­±›ð4b`9¸œf*NLÝ4³lÞœÁ€Px‹\$ƒ(Ì„C@è:˜t…ã½/ƒjêÿ…È˜Î§4ÀðÙ\rÓ€Þ7áœ	#hàœIpèã}„@è4#mc\\9©‚˜¢&\r-’R+EQƒ”‘´f-\rï«Øà<2Pê5Žˆ‚ôÕ.44'ëå©>(»  Pœä'hÓv5Æa(ÈH èÝWeÜ<Þ]Ú55£²:…Ðà2Œ`P©B\\ŽœÚ%² Ž­h@\$Á#ËTŽ‘¥0Ž£`èž;ã¬=`#£pÖ1Ï¢Ï‰îŠöùÛòøåCXÉéúzùYT22@Pô¡+C‚á^RX¨‰~²CX«ß Pƒ“åù Ø65Œp†cÜ‡WaÖñÝÒâ:&ÈóŒºÍã&õ[Ž[bÀ-·¶=Zª æéJ—\r´.[ÖøT·§Á½v\$Ïº#ÔX'ìeìŒ\rÙ}J@\0PŠ<s®ÿ´¸ópîcÒ‡q˜í`•³“K,ê’Ž©ƒxÌ3\r”šR'Œ“ÑC81‚ Þ½cpòd£˜ê1Ã£˜æ3c!@ºS¡cX9xãÎ0®¡»xÒCv2…˜R”‰ÈÌd:'Eíl5§!\0†)ŠB0\\wŽ²c^©ƒ2&áSs\nèÑœ—vï`\n¸r¥0µ†PÄSi!Íˆ¹ êJB¡ dÆ­ÿ@êœpg2>þõR\r,ÜŠ'ð@ T¢`ˆE>™Ï:¬UÅDÕ)àÜKYá;á…ë'˜€S“b?!ÌýÀ8\nII++'ý±#°æÈšë*áÀ4± Èýát0PŠD(¥£ƒº„ªL9)Pä¥ÔËP'0ùPª7.ªD:Uå9X¤•hºØqë~y¯ðäñXD<yÁ¥OÄ¦&NIÒ(p©À‹ òQ	©7'(œ”—’ö_LÁ<'‰@µÄƒÄh†¾H‚®eŠb#A‘Ì†¼0ÅéÒ”!êQŠÙJxÁ\0()Ïœ5>Ft<êÚ%b>MJës¦¬Ú‘pÞÆÎù è\rô>¤Ï+b2;–Ì ¦8…Â7‘ÇœˆÙ6ûY-%äÅãACŒ’`¡6'¶].cÆýÂÑÐ«6D¸šS‰HI!aäÏ,HW5˜Ü\nÐÕ± âÇŠÈ ÇäþBHLE›ñd\\Ê)MI)?Üžx˜2(\n<)…Eˆ±¨©</ò›ŠþpIÁ€t\n‚Bò6hÊÒSá˜¹‡S‹;ƒUbKA¼z k°ü×’øpWas\nè&Q©žOØ ÁP(ÜºÉs”jŽÄ®¥&(uêT²~D'¹j\"g »™LÂp \n¡@\"¨@Uˆ\"„À‹c×m91~/æ»f\\m›t0«\"Ja@FaYœ‹é,–ˆñ;‡xð#È~\rS%\"Z1+anIÐº(Ø6.ò²ŒcénEÉ‘gJšIHDqn™Æ¼r\$îA+%°P¹I8|îCrºmÔù¸Õx“C\\+\"ZX”ÞiÈ·ê¦H¯³cOý|\"Å8+:‚€H­§æ^[iK*\nu°M&wœƒpHOP ¥³òäÉ…†O¡PÀ-óCƒHzCÓS>4¬N&J²!’í“+rfóìDíp4%H J“9ÿ/nç.³CºZ\rìÅmaÃ`Ñ›fáá7^rË®KÉ¡ü†©Šƒ	úÛÉø*Ù°Ç^ƒÔÀ¯ÂúÀÖGƒ9©{qa³ìÒÒÑÿ‘\n©öÝÈÙLl¸+&¼gþ­…ð@kIR9I&R4X×•ÐI„¹™ö9[-H*@‚Â@ ¢øèÕ%Da¯s³rb†ƒèveQÄDu‚ò¼¼LÌ6\rkÔÌIó	­5‰A_T¬V¶YÕ£X‚nc[W­uà©Á«Ç0¸Ôœ€N¼×Ð7`N­‡s¹Iºá§d“™6Š6amIÆh–Íz{5üÚÐS\\í¢nH[ÆÞŸ ¦®½›{CiÈ“¦VP6=Îã‰ýA\ry™Ó°Œ7Î«Æj­¡Áöã«àr·†MsáÃ÷áRâ]q]U¾Ÿ1!^ÊîCH\$à…2&5§ÊnáÐ»²£–”{7åL™Ÿw}dWdêÜ2\"‘ð™‚	¶D‰±üWüàáæSzèG¥—ó&õZÔÐ=&,ªøQJíëGÑ„*0ÅšKX\n´Iz¹ËÇ…\$”„¹ä©7;!äõ2íJ·{Mï(Ë£¿ˆe·îíµtGË®vMÜ›0cä…ÙÞ³¶-»¾KÊd{Uåü&ñ»ÞMy_?ãÏíæó–¡Á7DPa7è”7ç™sëáLõ!Còy\nD	›ÒÓ—,ô›¼h”6\"Àf ™ùw1Ty®‹2QWºÄßnz-¿SÞ­å]ÃYÕþædµ+ úËåt¯IôZí\$¬]êÿƒŒþ^¢ªŸ&¢¼gðnöõOÿ+¨ÿo0ûÏpìjpó/ìópu/æõ&ÒõpÆÐ/\0ê‰ôfƒðÐEŠBK£ïBìØéÕÇÜÜ-œ´­¡d;°Nõ0VôºÙN(ÞÍÄ´­ÉÐ#0T&X\$\rº»ÏnÞ¨-òÂRlÀÌJþCŒô\$»\n°®¤0¶Ù]\n÷ÉA‡W\0Ép% ´Ê€Þ\rEÈE,œ‚ë8_ àC¥bƒêÒ=bˆÂâfDÇÜ6%È}ÀèEG¬&e×A}e%«<´­¸’i€’Ë†PBêÿçÜÊ\"®¬6l¯þEŠ§Â,’jÒB‚²–ÂO\rÃLÆÌ¬®LÈ&²óÅÐËL*¶%†+0ü`„È…í°}1Š[1ŽkëÉÞð\rÀózWñªÑ¯ŽÈq˜:(BˆõžþïÐÃ¿—’ô‘Ì¤‘Âóß1Ê9ã€¯QÎ(c&sç9qíÆÞ.ØLã†`¥>A†	bLÅŠöì„•DžâuB:Ilb°‰Ð#p)ò.ZPjT?0k#Ð/\"&õlœ8 dÆP½fòøòE¥§KÎ£FJj†ý1ö½òGÅÂùç\$\$¥ò—R¬\rbzA*ÓLYoF‡’'&Q2L—ïH\nd)2§²@ÈODN2³*@Ó'+Í,£)EÂ`o€Ù5æü-‘*±£+Ò_(­'q(Äè.lÕ’Û.röÍâ)Ñ“ìÏ/ˆ©.2t—ó\r%%ºÍÕ.òjÍÓ\"EÄwÑî>íD-\$Òý)± }¯\0¤ºKâÎÈSHÒM3ÓÐä\$bL1NÐ2z´ä¶ŸF‚@ÂDÐ1ŽyÎšRbB\0â„Sò Æeâ-mmÈàã]8iÞã³:.@	b@‰ã^\$:\r‚‚J «8fƒ9ï2\$ôB9N'':àÑ\n¤”\r€V\rgr\rg*@.ŠŸÁZ8Â‚zÅ \"lf:D:@2¿,ú¬é&chüK\n€Œ p¤#cÎàÉÔ®\"&_)oð Úã±C„ð ÞíÇD‚CDÔ<ÞtS\nN@ÈÌ<)(’#	f#¢>‚GXuÃ&	´0ÄX\nÉx¢FEƒ^î~–%R)#d_B÷o®‚“V§‘JÝ’<Ô\nr¢4F\$} 	€Þ«íòÓæçLtÊhBSÃ(ŠL\rdô±y*„T»‚Ý)ôèÃÐ\"§”|Fó¬<ûk°ö†B—ÑOPO-)5OLŒ'V4z]‚¬‡àÞ	”RL{QO`¬¯”†1ŒXqR§ï\\ôÓ|:Rß(À¬¦Ð§§=UÑðüL–oËZ•¥\$5CZC\rmH`ÂËàêJ§!S/õ¦h\"fùµŒ1€¦A”Ýã’1‡!ICdð-ô—OëvnTZ#\n¢¹ëª·õ´¸C&`ÕÂæi+Ï*d´€&¾\nË8kÃÁ¤t! 	\0t	 š@¦\n`";break;case"sl":$f="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rðY”]0šŽÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ðj6Ž ¨!„ôn7‚£F“9¦<l‹IŽ†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3Ž›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ­†»fnœ_îT9÷n3‚‰'£QŠ¡¾Œ§©Ø(ªp]/…”ôÒmg¼Ó’e¨ææó\$Ÿé)ž„Š]6†ùªkšl—°Nã¼õ®ˆc®5®CHà¾¥Ë R˜:¨ãh„Œ(¨„·#’	¨*Eˆã(Þ6Œ£ ä„Äb›¶\r­{J€¸hL_!ƒ\\ðŒPQBž6q`Ži\0!,Ð«È4¦Ì(2B£Z5#Ìœ ÇÂ¡ânÖ£0z\r è8aÐ^Žóh\\ÛFª€ä#C8^øNãÂ7cHÞ7á	#hàËÅƒpèã|ý³q`è4>Œã\$:Žh¦(‰r^é®¬¢ûŽ‰h(\rãXÂ‘\$ÃÐÎÖŒƒÒ) ƒ-“<;.28•­nÎ.‹²Ò'\rïÕj2RH{ê1&# ÙvhÃgÚ#RKje­b¸‰PØ8£«B\\Vø.c“œŒŒƒ,°É<	š2ŽÈZL#ê6'÷¨Ø:Ê•\0ÊÊB0ê7\rc¡*C ä:Õ›¤ë¡+àÖ£Iâtâ#I,®²6ÉˆßyTìj¹ÂÃxÙVK)b©|8¾6\r–PcïUMí6&-C\"mc]^£o‚MfU}¥\"ƒEl´Š©õëQhº›‰©\r©¾™*<ŽxÇ*\n£°ß:{4\rªŽšºå`ÉZd*ÕÖÐ¨Òê`kåùu1LdB¨ŒÃ2t¨%âxÉ(¤ÔÌª7²ZèÜ<³Óàê1ìc˜æ3_a@¶ÏL]È/“hÚZâ: !@æÀ—¢í(¾²Zäb˜¤#ÁPë·p@3#Cm÷„»ß„5£¢_'Ê)½1p:èò^*1ØC7àLôú7á\0ƒd-ØÒ1ÏóíÛìËÌj1PC˜D“úRèQ”sUw&ê5F–\rŠ·tySé='€´bÐ”ÒÓˆ \$¼&¡ÒöC‚aÜPÊyzw/¥0>ÄÊ™ÓJkM¡Ý7¾ä’vO]=§Ôþ T…PêÙt?UR2-R‡ÔÎµÒˆIqË¡åŸDo	º™DdÖ­’HI‘XoìŒFŸ¬’È)½~&„ü‘b¤ìT©àhAÈ’†ƒí,HwA (\0PRI\$Ée³€ÞKÂ*Œ’½Å,–Œ±˜§Ôõ‡C6iL‰?#ä€;È7ZNR‰P2mˆ—dMkú:èL4’íJ1ŒÇ€Ü'ô­TÉ\">Ýÿžh¨×‘\nZÅ9©ò&LY'\r'Ô´õ2¡á¤3d8°|ïÏ){éÅš7bÉ™4r\"™—–AIÉ;^\nüÆ  Â˜Tw!iÇ£®³H›^’vmÆƒôGÕÂÅ“ Úœ¤'à\no ƒ>H\r° kÅ°3÷'H€&á*FÒ}O<…6dü3L”¦‰šsJ¦è“³pX¨\n:¤Ø¯r¨Ã™÷5Ä:–EDuM*ö¥ªœ-ààÎŽ’, h„0©#ZÊYY##È£ÂzIYI(7dy\$È3‚fq!¬ÙE5Ôy­T\$ÏÄ¸8b|lL®7=,·\"^“Ó82AèÇ‡)Tá“x¥å™ª5dBÒë¡ÄFtôÉ†÷*·£I\rÎô;*b\0½’ V`gp›)\0t¤™C2QlüzÙãiHTæQ(ÊSO¥³A<9“5X‚Ñí¤©P*7¨ÛºT*ÔZòì¸H\n¼Uµy!Y\"K\\Šð6†™áZO©€¡ÝSÅ%v_-iu§J`Ã^ÓÍ‘n]¡­Å6’4‚\rM\"\"0ˆ}ÍÚ7txÜ–‘Qdê=/—ž¥B	|b=Tñ…®‡4[‘ñÓ‡`‚,¯²æÊ3Á%74ŸðàƒLS˜ATEÂøÛqêHõ\n„¨C	\0‚b·“5@ˆ,‰\"†~BÈâaUQ8TmÜ™«øéAyXt¦Ã3¥±	+\nÇæ †\\‡nn4k2?§ž^‰’ÉA‘þžçv%ù(÷'\"r¬UFSÉ“K'e| (`>SÊ·ÚÁJ\\ÏÞ\\Ç¡¤f\0ß˜¢L¦ Y?(›0õs^WÍ§Âµgq—[uÌ9ÿ%ç’‹žó6}ÍA‡+e†•ŸÖ;Ñ“V{l¾bŽç{Hæƒ%™<\rÈqþècÁž3«Uz˜Šg	¥ªµa&tº¿Fcmc©`=)à…}]õéu×úÏ`ç A±ù’×{#†%?¯Kã&ˆ”;‘P´Ua@%D±a‘÷Cb7B\rz<'ö§×™h%æö¯åxNÐªÝE>\$Ã0èTæõDäìÆY«w[êÙþ'š¹¥\"¤mqãU*¬‘‘Jzdˆö0a˜Ib¢šÅL0\n¥îE3K7 Ô–ìnôÀ9¹¯Ênì<¥øÒ³áËÖB-‡è;û<ôÛ†Z‰·Å{¢]º‚¼¹g ].„¦j!é”ä{nY\"’³fV´š#	Sª=ó<¡ÁHåPkCÒí'JŽæöŽÔI	ŸTT}¸»w^‹G!	7Vî8O¥ˆcÓAÇíòÕºÊ—\0cÕq–RLàvIi7vVÎˆ/¢µgò’œ‚žyV½^—“²ù—¨‡.§Z:O€ŠíÑ®ùZÛÑMUÂÝA«õ?Yêt¡Ux„ÒøÉÔýÝ‡µšó2T¸^•÷=McÜ¿ð2ñÈ_”|r‡òº[P*š |è~‡Âúrwêàï¯›>Ì’Ø_7\"ç_ÂBþäøß›äþ…›´Æ[Ðøõé›­ž£âõÏ.æê6½p\0­ØéOï\0€¨ÿËØ¤ôk\0‹¼DBL6†7dÁ¥¾\\'L<\$ŠE°.0ÅFÃd\$ àw ž@\"ª\$°>‰«´9ƒjŸ‹Ä”MjñŒÃh*B¨&Ð\\‰†DÀ„Â`càF	âÂÏû\0ËÚ«Á¢nêË¦°+Ê¾kÑð:\\EPWI/\0ˆ°´>§ôòÊÜó\0ÝÅvöjìôÐÃ\nîTp¾Â#è(pp¼ì%GõCà”\"–ë+·\rK‹ÈWçãä}\r…E°âGËv^bX\\­Ü\\NzªfÀ­j§\0àÖ1€ÞhÄFUùæ­è‹ððgºÁ¬Ýp\$êP	\nE~sa@ÔiËž1IðÒ\$Ñ`a\$ ®¯KÑR/£ZÕN\\„d\rbf\rÆu0Èõb‡&Ç&ô1\rJŸ…}qž>ÈáŒ2S1‘ÂÒ\n/_ì‘W\rPËf¡Á\r±ä°+ðG­Ø>Š¾±ßÅX¿\"wr5Kïññ±Ïµ ¢G qìÙãºC°à»d~=’* Éq²/H21N;ì7\$m!0·bx/cb-1=+ÎŽ¢øpÀì­\$k\rV!O¤ÿKîr¯ÜOä8K/¶×cÊr¯Ÿ(RxïÍ](ã4ûåÍ'c\\ÿ2š¯Ã4X¢^øþ¤‚b8‘2‚#vZtC‹Ç!Q²Ý’Œæ”2ÌË-j&òÒç\"æÎ²ÚûM¤‚ôRO¿.°lÓ2ñ-R°¼\\\r€V÷ÖŽŽð¨èÔ£~±^ÊtÎ [\"6€ª\n€Œ pÈ/g¸/Ìè²ÐÎL‚ËæÊ¨¯´ÎØûÍc40ÈÐ³VÑ 4î*“bu°^VÌü:§æfÎ®	£è\r Ì \nN‘@æÂl/\$'}9fb Eâ;c K/BÝ:#8¡30ÃTEÆv·`È8\$*	€Þ (˜ CC<³Ï3Ã¢lfjíÁnŽØÍ…9\$®œêá>­\nWÊ§)+?‚(2Bxƒ+úé«o@n‡“ö.ƒ.3c2êŒ\0à\$¤j¹ØÃhW+žbaB^pJ?¤2P  Ð¹¨¦\rÂúî¢x˜èÄ?¸±BuE¢+¸IÉ¸+îÁ¢°\nÍ/ Â`êC 	ô*<æï+‹Æ\"ßI&>«\n2âBÊ0½?!C+ª°‡Ãd?F¨¦[*óK3þ÷ìIJõq”l,GÔ¸¿¢8C€æ¥®Ò& ";break;case"sr":$f="ÐJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãðP”\\33`¦‚†h¦¡ÐE¤¢¾†Cš©\\fÑLJâ°¦‚þe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍÐñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰R×Ò”=q0ø!/kVÖ è‚NÚ)\nSü)·ãHÜ3¤<Å‰ÓšÚÆ¨2EÒH•2	»è×šâš“²EâšD°ÌN·¡+1 –³¥ê§ˆ\"¬…&,ën² kBÖ€«ëÂÅ\" Š;XM ‰ò`ú&	Épµ”I‘u QÜÈ§sÖ²>èk%)+A\"ÅJ©\$†<±t¨±KVØ2Qú01ÑLêhÈHI¦JtACÉ`’)Q’ÞÿÑÒYxÿµˆÄœ‹ËÑŒÂ­,…óàÕ!ÔdW&Ë‹`Îª\n¼ÑH2\"HOÑ)Ì…Aó¾RbúÐAàÂÞŽC(Ì„C@è:˜t…ã½œ# Û	£\\7ŽC8^2ÖØðëÃ˜Ò7Û¡Ð	#hàå¶àèã|-Úìã# én¦(‰ƒK®Ñ1Œë?JÎuZÚš?Æ…`ÈÈ”.\"ï,·D\"Ä*ÔOékã4p\\oŽ6q¾&Î3Éþ6h(²—.W•0K}e/:æh#?›3™Æi§ÍL¤êr¬’K3>ˆÕ£2\r0h	Ú^§´J0¯‘sÐ\"XCê6\0ì0ƒ¨Ë\nà¹N*5-ÉºÌÿ³²ÛÚÄªŠûûWÎ³†®ÉÑyK\$  ™\n[†“òúý¼ìzêÎÕ„ÂwPuºmî<	(òÐ3Î_%Ëo§H&fŽãÖOü·’ÌZºRšÆ|ƒ5ˆjæÍ±x<_âd_´±ÎMÀ¬*Äb'ÊÛ§\"egLYnŠÊ1]Y”TÆGŽâpóU•”œSKõÐ4™™YQô)y«ºaRKì *r ©w~×Œ§í½FPÌY‰oçÙÜ0fT É#;`¯UÖê­ZvV†IT¶¤0›\0r7&ì‚xfÁ±j±<ÔSC\n¼âÐÂƒÈ «„:†0Æsƒ˜fkà€6ðÎ„ƒ˜,:Ê†ÎP ‰,åi†àêuÁ@s%¬¢4† Rz	aL)g~qaåÙ‘1äh]Z2+*D\$B>\"*ZÞÙ'Æ±\r•×­\nM¹B\n†ø7³ž–Ä2\\HL¤µ”Bk‘qEªòÀXK´ |!ÖBAx/\"Öã9'†°ˆº†^Yƒ0.œXD&ª˜’iF’Ž×ŒP‚hag\\9YtÃºØ_A”<\0Ò°C\$a’!¡`¬5Š±ÖJËY«=hÄÕªµÖÊÛ[³p.%È×0s]©v.é:¼×ª÷\rå}¯`ÂÎ8«VåÜZÑR%~EÑC\"²(E”i1cñÝ!¶ìAJ\n”È‡³0‡Êd\r~P=À”ILƒÊ;FòÔZ¥ðÈ…@\$\n\"ðÕiqGÔ0ºV(ÝÌX½(A\rrO`Æ\$Üí8Ç åÀÊ¾ƒ‚Ø‡<íœ ÞØ[\$=ôþ*(®ƒI©µ1áÚ¸ÇšÁUF¤ÕàºYJ¨é5Ìé6öLýž0Ñ*…1R(ÑZˆaE(¬ƒ\"Ô\nV\"Ë<%i’B`àd\r+èá¶ú—ÑÙ¨«8¶iv0r\rá¶BÈyí/NÊÜŽ¯Ó vŽxpˆÁ–«'ôœ‹%#	áL*QÈLë”ùVñ §‚ëÐÉbµÔL™©úë-T¹J¯EÐY=Äø—\"ûM¦JÛ7NŠÝ»&|‰jW…èÊº7ŽÃ%ÖÖŒˆ4†p@ïl…=lA¥_„`©I¡zú\r+ª¡D¦Ãdl™\"Z§k–ýLSš[\$ì­Åd8(\\µÅ%FIæ7°ž\0U\n …@ŠD¯\"UÕNš¤vO-==Ä¨XƒÁ\0D¡0\"ál1†œv)ÈX¨’\"Þˆ&eH‰+’P	³\r(Š£½R¾ßÔ:·MÎpÊ8Nb]9ya¯Ö”>b\"í4YE&~¶ºVUÙ\n%q\0¤¿IÝ¡¨,™\0×@ÆŒ°Ò³ŽÐ*„ÆŠPö+Š§)ä¦ÝÒ–^BÄŸ*Õ0c|‚Á «Q6é÷=84\n%|vÍè×©ž»óV„˜Ÿgê®ˆÁ0n4-ÀÆ<ºÓJ¦T\$•§1‚GN}x1HE«¯-M)0oR’RjÏÒfRºíòX+ÃîDK¡q)ºØ´A=ˆ	“¿ÐÜb=V–`1cÍ!L4‡¦ÏMTOláL2œºoOßêLmAÁJè¼©ŽX\$ùKƒ¬µod\$ÛËèä†Pî«çôeiäÐ6‚4áêò{l•èNèuZ*M<Sq2ób(ÊŽDˆ_ú@‹ëVÙÉ’”¾4õŠ-&†IVv‘¥Íx`¨TžiÝ_¤.\$‚©L§ÀJü JÜ‰'O\0ìØÑ9u]…B Aa XÝðs ì°¤ˆéÔäuæK•?4—èËÍ˜Á_@¼v£dóÙ÷o£Åî2çj{E[!äî9ˆêStt ¥V!3–;Þ¥®a?ET\0—õÞv|.±ÐÆø‹àëg…_OrQh[Ýl®>;¼qâ<”s|éóË1W¼/|×r×æßÄgoèLm68v®ðtç`§‚”;XZ”/\rL-Ï¨\"Ý÷ÊzÂ\$ýýwŒîŸ! ñÞÍòüŸ«ð?ázÿGñË­¹”äëìz®þ§¾ç—|þˆ îŸÕ»\0SZm†ÉrFIec¯¥¥µâÊ¼œÈ%@)ËšAÏ*ò,®%ú+ÂÀ-äˆ<,þÌ­djäÜÿ¥Eêy\$š&Ab¡CRð\$aÄVucL>-2ÿ§JÑá.%–U¨ÆPÆg\no®Èq0b-=ç“\0000bìbÈa§\$J…vI-œLe\"C„,iŠÆÚÁP(êTØO¸Ð„LÀpÕšØ)Pû„?­ê¿Ð®.0/*¤Ó0ªÛÔ•jø0¤ÓÐºV®ÛOÆ.ƒcM°ß\r¡LÞrÂ¬©¬ˆÁˆìÒTX¬\0ø#:Rp@G‡,ÑÑ<Ì‚I«Œ.Ê@ˆ²@àºâ9l²Eˆè‘;br5k]Q&Jq*r÷Âà'ŽÒðæ?FK\$å?Îp\$Hh¥rÃ*:=§:>LumV3ˆUNP·Ÿ0Ôé§…\n±m0µñš&®”ÍñO‘!¬ôÎ§âÏÉE0ô&æÿÁ¡qÁqÅ\r#E\n­Üx1ÜÐq¡\r±ç.@d«§\"×1Æ&±f5¹¸1†\\ËeG±ôb¢,LÃäö/\n@ô¥‡ý/PcRÉ²\$áŒþÒò*&q¯ ò2W/##‹ª*Ò>yèÕOm\"ÏØ<.<rî@Àb,ñêÝP¦G2lQÎÀ.C'r{3(0ù(’t=ok±û)/ÜqK¢>ì¢*‹¢v,Ø«‡fÍpJÞF„gpLâˆGLâÎc+K }­rVç¢üCâsÎ–*òæªr¨sðî Â¯-æ®AG £ÂÚ nŠ!¦ÐB*íÒ–>,äA â¤3+øÛ)XÝ0CŽ6å,:Í†W æBË{\nÿR¥“Fyò{\rpr¦QA5ci)äÿ*3`Çn’Þ“2sIp%…5±ï6ì¨d.‚å3Mñh­„Žè<óiøŽ¹“œèNÎ\$Ò¤ó9ç›dÆv§æDm(?ä†åbI3#:Š>¯£<FìçnzsÒC5Í\ry#³í(ó—\r³û%²e*ï:’@>ámÇJÊ'\$Ñî&>¬­F…2|s°qAcÚmòÒu0ÒQÍ3Î”ÔGž?BKfvÆOè\0‚“„Ðªb©´`ò(ÛDSmF‚Ÿ@ñŽ0ºMà“q;PZ5Ô„i\"{F2*K«ó6³§Gç¡I°&5‹–rçÎL´\\NånKIPÙ6ôº\"N[G“QLNIL´Ÿ:QÏA\$åTÈ@HÒ#ÒgËNYNA¡JNâÙ7óŽq¡ DŽ›HÁuL^-u	FU\rLÒ\n-daP¬e:\"eG\"H®ýDg„O´\"Oòô)ÊêädÐ*íÌ5DÉHùRÀFÊdî5S--HúÊî3ê.ÞµaDµe\"=µlÊOrÉj`®³ÊbÎÎò¦fÍU~=tB±çàà2I¯Y°Yµi&u¦ôOŠî•	Æ'2Fñrj@†€ä\r€VÍu&æ//&Ž.óß/”­ˆÞ@Œ½@Ú«Iâ\rÌ\"\n€Œ p¸‘kBoŒónUŒBúO\r\$:z‡–Ú5¨î’@îÖbÕÊÇbè×\"&Òëjû²Oä\\U§tf6	¥ò\r Ì.F%µâC’rå2ÆÒÂæM^o	\r.eË‰&`Jó(gJBy4‡^îð‰Zñ«b`úÏ˜äÖœ5G‘B¥<OñeC8!Ž3i[,àéC:ÔÎ¡¶ÃBtóÌ4‚Hè)#Lø¶×e6Ûb„–È±1°ÝlVï+ñŸFG…n–ûmŽ÷mÂœ12 |r!—	ÖíO?4„8ªòo=±ª~Sb†QnÑV„U±m1sq„É¶¦ÓG4É“þáË¨ÆãþÈ>¯6¨çr`îÀ\nÀÂ`ê ÛT‹«qn= >KPÖ‡ÊØ’bmqAlÄÒææoâ Í¦dÂDä\n%’d2¾Î’E—ozôû{1V5#K¤ÇoƒTá Pï¬Ädgµ^m€ýßnH.`";break;case"ta":$f="àW* øiÀ¯FÁ\\Hd_†«•Ðô+ÁBQpÌÌ 9‚¢Ðt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ða;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êüž¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	&°BÎá%0dB•‘ªBÊ³­(BÖ¶nK‚æ*Îªä9QÜÄB›À4Ã:¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n¶Ëq\$&‚ í¹±*A\$€:S®·ºPz±Æ©k\0Ò¸Ü9#xÜ£ ÊU-¬P¼	Ju8“\r,suY©ËÔBæÀ.Š­'â˜èôI-\\µªŠÒW\"¥u,ˆÍ±‹Ÿ·(²­J!\nù€7\rê/Ö‘<›-Ë2W*ÉÃ{cQkRÄTÚPãÖ+C£+ c@Ù¥+ä-VÉìòæ·ºæ³Ô­äbã(Þ6Œ´ûTãÛíêéÜ­õŸ2AåÂœOÙÑ°P)#›î6ÔJº¬Z*ÄÊœ°ØWøÊ9<#–\r¢7­OTÕsb|\n£ž‚×hùqC\nRR¥BÍ„Áä5|BÆåhŽ3)Ö¶¬1+%’\\à«I‘m5À•NB¤I‘ÖpD!ÔSG‡ƒ¼9£0z\r è8aÐ^Žúè\\¢²F\rãÎŒ£vÑ<í3äü„L\0|\$´ïeØ7à^0‡Ëûáv?#xÈø¾xð@)Š\"`Òû¸r#–àÙ{s\nY–äß7)S5î¸D6Ä@ˆ¦D2”¥n®T×=\"ßDVY\"û¥«î\rc%)Ý.ærpESÚ'R\"ðWsÞm×=¸êè=íßC1ÕƒrA´ÛR;+„¼#Ñ[\0O³Z>sÖæ\\Ý¬ÙC\rXé·6öYöÈ)Äê¹\nùåY5B\0Tß±8ˆÔCu\rÐ`Â¨ev.T§ÃRS)MV¡:†àÆê{h=«ÈšA@Aá¨síX)Â&Èå[®ˆ¡MNˆ•Í¸äØÿ_Z‡X0–\r{œtÅiÇÜ«ê‘JOIÜ¬´š^_ê()m%ÉA8‰þ=„€1†Ü‘\\IHr‰Y¿vƒÝ°ŒŠHÃh„Ëˆ‹08*Í»ƒHîžSµy†µÐ©UI‚:XÏ&¼“BòËé±fŽ‰úD	´^9H‰‘9´(\"Y‹äŽšLª¤ŒMÒå:' ¯P1¯CJSFTlÊAÄÄDâYãìoUNl›F”žV#·a­Ð86PèÁ_¼‡R:¥ñ\\ŽÛÃ\"/	Y&Ž¤¬¿Bòb9²É¥'&ë2Š.þ\\Ê%“d&,hÞÀécJzÏ€aÈ³ºZ€ \rá˜3ÆÄpùy-ér^¤@¨Ï(m‹ÁäAPæCc=áÌ3@ @PÃ:H`°ø‡*a2H‰ï¶ÜO¸(`¤¯0¦‚1H6fÖK¤j« „S^Æôš?¤„ Ar2[éÊ:¤8îÍp®u/¢@,£Z^¡diLÐFÐ	àï\r\n‡gñŸ&r‘@eÚôYÉrDB©\nrÈ+ÁPï†àÖ|3e¡©ñ\$‚\0‚)3£?'ÀÈÃÁMiíE©˜\0Dƒ\"~„é%½7Ä<¹V¦ñŠ\"SÕRúŽ]b§Ì0_Õòß¹}¨&Ž¤Ô·)ÃE \r*ÒÊðM,\nÀfÃ»epa”<\0ÒÔ%A°A¡¨5&¨ÕšÃZky°6 äÙ3hmVñ=6æÔÜC›sn¦™´·–ößS»€\r	Â\nÏ‹<Ì>…ë»céÕ‘D6L€Ýmri7e=X+©h†‹š\r/„ÚÓ>:©U¡Òr„Q¶ß´ÖZ	B€‡”ìÇ90@P)Ú­œûô›ðIgµòé^“ó„Ž½<; (!§ëÝÒ@g¼§œôž³Ú\\ÅAÐø³Æà\$(aß)”C-á’©…G?<:+¡z‰ƒÈÚýÇ#\"ª/™¥žš¹è¼IK#ˆÞÌåÂã˜VL›j>Z£©N[ï ®Võ(§…%ÞA©2ùÑª6E4m\r@B‰…×@÷3“BNùiÕ…ÒÛñH’.ýçÉ¤DêØ]SQ€(\$‘ðòw\0d\r.ò@F<œùÇÍ@8À–0r]uÚ¼\\ãâH e\rÃj£ámqÀ@™›5Ý+.¤6KÌa@'…0© æòâ•D\"ÑÎ-f)Û¦Cm9F§þV¨¥ûE¹ÿQ¡–¤´WÀÜƒHg¡Ê§íCoÃ.0<8JChí4JÖ ‹¡º†”\"ˆàÚpbÞ.0ï¶zšpF\n˜j/80Òiæ5#€šÇY±æ ØÌõc­8}q¦BY¥¥A„e+0»_5žÂp \n¡@\"¨@W0\"„À‹ÍÙÕ:ÀÛc\$S™	ò¢LËMšÌø ‹ÐÃÓ'áB|\0Çß:^ª· Ô•)U9ëÎ‹ÊÍù•)AŠÀÈ²N£éßØœ¶]ßý4˜b‘ÑLÑ:%)!*’Î;»6—N[¶Sþ»·^dnÛÛMŸ+Èqš_]šÉVgqÇÞv”U§¹™åP²’eIî]C\0=~ÉDg—Ú6»ÆIÖgá{r¿‹gèyãÓ|WfŽ^r¢è™­;&ÄDË¯3›É[ºE8b•30Ã½ú[éîÄ|«ø+O€Ó{ Ui³‚SöË9S§ô:ZVFÏ†~Ì±ú%­\"~uuá aŒ5ƒÜoËÁRY(ˆëåZýÃ\0Z‚9¯ØAË:\0¤j& `Ðd¨7‚lå¥Lsi ^NÌx¤Š\r ôLZ4êP@¦£Ø‚ìpðé¶Jö4iÍ£F‘ê†4òGöG¯Z7Â0\0’\rÈŸÇ\n`Æ×\n¥€¶Cî=Œp€ Ò îGfänÀwë@õ‡ˆŒÃZñlŽ}ŽNÄ†7jþŽ‘P´ò\"Î:‰ª'ðÀ·øˆy‚`BªÝ.š1‹ûI¸ùéJOŠìéîJèÎÞ&ÎâÓ-\nvNÆù°ìÞ÷L\nä¸bŽšüfg«2¤W\rÔCOˆž¾¬¨ž´é¸bÆ§Ç,˜,þ_ÀŒlª˜â¾M¤,|Lôb|gO¸\"/¼äÆNui\\WÍ¬—M°eG¬b¯ü§ÆfM¯~Òé(øI.8Îl\n€‚`\rZaðš>	ð<MJ\$‚ÇCî¸.BNtú”Í°Ñév7¯^H‡¾–6{MÍpÎ7'½Î‰¯>é±ÙI6ÂŽÞéo4ýQPyÄxô‡HÍ„Ð*8{òè£¨XpÜ­+ÿ!¯LÌ-ÆÀÉ¤i.’öÅêŽO—!\$ñ¢\"Ëò6sä2#…¦AðÑÎ“HôÏ±’ù’\\õá ÈâYRNírÌb\0Îq8œ(Å!ÌÄ P»éÎ§RÂ¢»«=3(2FžJªOM!D#2\n²_#Ò\$ÄC+)Áêq\$o(d0öÅ'qQ#‹æ\"~µ©Á.\nŽÃŒqFÂ€dâB0ŒÙJŽî°\$'ð'â‚(b‹s\r\0ä&Êq1Jv §–ª“àÓ#òzôrW+Ñ_„tW®žTÒðŠC@rÑúAãñ GR’9®Â4`–.õ\"e”QÓ(M02rtFqt¨â§í®µ AæŽ)	’«àù&ˆ-ê°d3–,ëY&Ç‘)‹P²Š|´Ó‰3’©²\0Éë,	ÔGCfÝ€†=‰ð`ªžZ/`’ºAD,J\$°ø~´å„fÑO4S))’;?3g@'¯?§›%óöË‘\r4oK4²zSztÜð	&ÂDðÊT#T!!â#BP¨Ð¬šhšô-».rù.ÔF1#ô\\É§‹\"Ê|ßÒ,tM,®ÕGqîìqŸBŒ@’ËýG2é,ŠF2yDRš‡Fë2€öhZÁ<.¬àse&R¤à•q¦Ò\0PàÌ€(ßŒ·7èƒ-ŽÒdü#QV,î‹.M:ñðÃÔÏtèÒì:E#J48+ñ\\ýs†•tðwðËN®åÏ\r`ðû4lwr1HÂËIHéÑ&qò¨í°•ÔÕx\0¨ à¯´ž‡SLÝ“üëÇúbr¸ïGbóNœy‹S3Ä—RYD2›I5bõr÷héVÔ¡/T9QóB%@MõG\$RU5- P3õHtWYr[I•|“µÂ\\ñä§Fõ#Côuš‘IËÆi«EUrËÓIIu{R©A©Í4	H'ÓT‹\\”GÕé”ÌœõÙYüÏ•w^Twæ°#.ª˜©*oQLÈÓ³@bQâRfm•&*¿U\\.tSk#²?n_uqbs-b¶/A´+^D15	=.âdy&…£MI\ró9D°»6¶nR«%5tí3I—+:sÿf“‡Y”^´NÃi“\$S`Ôq_Ô[B4ajõ’Y¯S5õ+7jVcUçl,«9	¶çÏcs_lÈdü*œÚöE\"°uSÐÄXeŠäsÈ§¢w¬ï_¶km„÷&I j&m*\$pnkÌ\$r&~c³d’ã(¥Ì³ÎÅwÚ°ãrŒ‰Å®}6ö·u¦ÂjzødÝnuOv}ªÎF‘×VU‚YM°^lD‡¾æÀƒT\0²\n\0ŠÂLfähW;Z³EtL	e×KlV—r{\\ÕgHdVá?ƒpD¥vÎIu·t‰´7·rò£\nÇv2qpÖ×R–ÜHP¢XõÁ]Ö1~ö'eluÀšì›H”=q7ñjÄrs>j€Õ­]ç™Iuês&£Âo%ÖÕ^7\\ïúKWJÃz–Pƒ‹»\rµÅ3x{Ôy„­-ƒL_Wƒ©Ž’Uª›5Þ\"Yj˜fYq{„øSJÊÄ4€Q…˜=k—Í˜MbØQƒQLÝ˜™‡u©@¸'v„¤Cõ´óÖãP1xBNÁ`¬/h8oŒHƒxSýZ(ÏwŽ“<,â,¥S\0Å\rÇ~)Ùe®Éìã„ß†4g[vYfÙYWëYV½;™ÙbE•‚X}øEj€H(‚È0Þ×ËsYXÈä”•ó\r9Ci¹8‚¬a”]’Õù¥\$‚”Í¸ööÎø6Ò†	¸Øô„DÈ•d'Þg6{nÕÖíWZù[6Û”\"…£–È›–w6§™–™ñý˜õó‰×ù[y›6ëU5ñ–í'\\5!”Y‹œ™¹œÙ§‡¹b8¨Ž0Ø55Gƒõq“aXIGõ8íT˜y‹Y/„9÷„v«“r•–ï8¹ëTZ•3Ñ¡sé‚9áš¹å1A6{v ôZ\rDù¡':74ÖËkz%‘Ø€9œ8Q%zÚ;lÚHZ¹3¥ÚHZc£šSQ9q›ÙU£Q©šg™Ïš˜ùŒ3ý‰Çˆ˜£†Øïøb³Š©1qŽõ£ù•¥¯NU%Z8N¬äk«]«P·&ò/†s«ïg¬M	±O«&1«x³¦ÙãWZÛô\$	f×\0ÉaØÙm–_ÓŠQtÊ¿‘ª‹ö¿SAX2äÇ4V²Ï¯ÅwöÑo“‚ÑÝNRWˆT“w¨øÖ)³u³Un­û,\$_´\r”8QwÅìa³ÚOÕIÄ->s8{ùæ§{Ot8iûðÒÏ‚XAÏ•PwC¸µ«¸ø¢ÄºW¹Eã¹»Y5O,Å…>\r€V×`Ò`ÖŸNiÐz+Ê\r§\r Ì¡‡+ÀŒÆËÌüÈKÒà€ª\n€Œ p%½d’+Û+}Cª—·ÆD¬·\rN0Çt5+‚œ^¹\rlE´Y×¨€Âlù‹Eé‡Áx°§;&%<!¯gÑ'×»í±IÙÎ…OgŒÒ\nÑ[\"ØÞì·µ»×½´ÏŒGM\rêOhSa÷ÈÂvRÍ[–Øééó…çj\"\n9>Ä‚œÓeIÜ—Ž‘Ÿ¬e\n³š»~aª¼ºDÂ¾Œe£…@	Ž¼ÆÊ<Cê?¼ÎàìcÆŒˆŽÉD”Øá~O'¼R‰·”øœG%â~SùX>Ìq–‰ÅoE;dð—AšùÃŸ´eÄ¤çIÆº˜ˆa‚¹utÎ‡ôŸz³`:I´SŸ:C\\ºùl ¨ûà;ãÂì× Þ5/	QÍÑ|ùÑ²ž•Ò¢‡:ÀƒýzÊxýµ»²õ-Iû}sae˜…’Ž «ˆó¥‰d’lHS¶QŽôpf|ÅQš¹g(†V ˆ>Î\"jÂ²k-€ú Æ ê\r´	^E£â'àŸÖÆÃµJˆ%rÍÂÃpfU%êÛç7\$ù K¸çÌ¥µh¤~'&\0¨]>æ¹vºÚŸ-R³1âH{UC£ŠïC›‡6Å«Ñèìï‘yÓ‡7œzšY‰wQb½•×—¹âD³Ö¡©ËBMšV 	\0t	 š@¦\n`";break;case"th":$f="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Þ\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ðj6Ž5˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©ž7;ZÁá4	=j„¸´Þ.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0Žxè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$\rü6¹ÃÐ¼J±¶+šçº.º6»”Qó„Ÿ¨1ÚÚå`P¦ö#pÎ¬¢ª²P.åJVÝ!ëó\0ð0JË¶Ÿ­ˆ2¼\\Ì+ûbœ:HÃdÔ­IúSÅ’K¤ò¥QZ\0QŠL\\N|å9©Ã†è7…Ã[%BŠ#bð£Qi(ÃŽp{°°*\n”\$ìÏÅÄ“&Î4€‹Áî99Eã·/'ÊÊEÄ“¡q.Bh8³0b76\nzLµðŒ…M\$#;rÍjæÎRË\\ƒ¹²Ê¶H0KTXC¹ˆfŸÆL}¶€ET}EnÑjÚz™ÍS¹*¬¼“ü”ž”w‚BÕ¨€jmVHêŠ²¿—¿]ÔŽLÛ1ØHUì\\R°å]Ïxrl8JìTÚE‰Ü^RÝÚïE,î’|CMÊ ¯ÑÈgyà.nDád‹†OCN³*©œ¢/Xä2ŒÁèD4ƒ à9‡Ax^;êpÂ2\r²¨Ê9Ãxä3…ã(Ý®(Ü9#~¾1ð’6ŽÈÛ¯à^0‡ÔÀA·ÀãxÈÿ@›Þ)Š\"`Ó¸¶ª:ï»yž;^,MÓ·E)“!r­Ûì\r	€¶-ÑYË5QÙ\\a2”îSóq=yNnß9Ë87£OÌ}DŽáTnße_b\rãïjœ4—`Vó¿,Ã‰ÜhF`kœîJ+4ªvžÏNm*à—Dˆ¸'rÎ^¶ÉÍ·'–TuloñÂIÜ8à–€P‰¢#¨Ø:°Â6£-Ñ,°±d0S‰á9\ny‚)#±ºrCDý9\n²@‰]R«M\\—DLvÈÑÒ[‹íE•Dåžó,CŒ©“ÓÏ“ëOådÇ½ó¶‡ƒÆt¥Üª2zœŠÚã.(EW‘²²äYz¶+©Ü®»¨|Ÿl?È0ü‚\0æÃnì¸µ@bÐ\0Lu*0ª!•–[ª‹nt¸:JëÝ#Xk‘1¸µHã`ähup}Öº\$²!âpc\r”6†²¢ˆá±<±æ=ÇÔ¥£ãAî4­“¼¨Xñä¢0	‰(ñP”AfIŽ\n(W,‹ô“8r	Ø7fï‘+1¨¹¸¥Çä<…Ðqþ8€üÃ\n=¨0´0@Ã0f\rYÊ”¹“:÷g\0(*óåCpyÕ±‡PÆÏàsÏÈÀÞÒ¨s‡ø9M ÂÃ\nU¨·¶ªƒªÌ¸Xd¸Ã–•.à0¦‚1&9GX€\$Ô^vÍ„*<\nO:I\\‹Xù}•'IAã¶åQÚ“˜®!•œ)’ˆÙÄ'ðyQÀ¸Ú¼•3µ+PöàÖC3Zšm‘+\0‚Õ°rœa³6@ÈÕÁ@hM£€Dƒ#f@‰T3·&èVœÙl¡¹AÏ·\"‹¡v†ÄS¨:>šIÊ¶fdõš²i”¾_a¢kˆ·¢íÔ’Á+40‡4\nuaÝ­7°Ê€ihaT‚Ehí%¥´ÖžÔZœïjíe­µÖ¿_ÛdlÀ½´6ÔÛsp©ÍÔÄ7pÊÞ[Ùÿná„5ž÷|Ú¼Ðn\n¦“¹#š¬Þy}XYaÅŠ¤ÙŽ)Õ7¨ê†¨x9 \$¡Ó1r¶ÜTú¢]ºw'pæ+…\0\0(1\0¥A¡Hæ¢‰ëÓvåÞ[·IÎQU*à(!¶`ÜCt©ðùŸSî~OÛ{\rh:Ô|{ô~óx;†[Vh|‘F¸Pd•BNùæ…‘Q	\\g/Ï\nŠ-ŽFê:BÂÒÉUSÈ°®–Âìp…jW§4íÄJ¼íëkHr]#HÊ,¦\nÀI\$¡äô‚\0È[Ùñ~ø7Z”Zq5Ø`äÃm6§¾¼ v¼ÞoÇû#×“öƒðKŒK7x¸PÓQ&å\"-ƒÅl®“Ò«Š…Áv4ÊÛ¥LñàQ®È P,f£¡¨‹<ÜTïT`sÍÚ=õ\$FQj©†<döyñìPªˆo50@ÐCiñaÀäÓð{Ï»AÁRìEö[eüoÓ'eœÕÏsXŠbâ’u<LÙ)q%Â\rÖìøp`eB‹ðœ¨P*]›³Â E	j¼Ö>k|Œy\n5åíæ\r#~|¼2\\æœY ^d2N[®:CuŠ“–;£±Š=½íêÎÆ¼hEž”R²žœÍ(…?„ºD5 þiTqÜÖt°n%\\ŽÌ1¼±Ü#¥ƒ«v‘˜I‹ñ«k‚’Ï Y¦þ”ÕÉí¾¨à¸•ˆKËë'·3c\\Ÿ10þ¤‰þ€NÝ”ØŠx÷º«Œðøµ\$ØÖˆÉ	ýÆÀLƒ­.¢æ+·;š:Ç¨.µØ1‰91&Y³ÁêÝŒ£”—G›ûqÖLÒ˜ñ(´äcö[î»¨´% ÒŸÕím“ÅýUó|p7KQ>YP.<cùSç¡XJºWpÒýûþ~¡¤2‡u•·{àö+òæL#‹ªŒ©õ×\"#ÂäPã+¾ ã)RÆcÏ5’^§4Ï·©Ì‹Ÿõ‘ÛÒ+mýIž½,›‡`¢UËé ªvGÙÐïïµ	ÔäÔGî\\¢\$îx`‚žéÇuzÆÉ!˜´VeØ‡~P»t^QŽ3)aè¿2ÅÐõê×QdL{¨àÂéá£ÂaJ\"ËÊÒ¦2M¨\n€‚`”jï8?©z=ì„‰Ä¿`ä@¬Ñ¨ªýlãç¡j[‰Ú\0^3ND¤šô%ffäZZ%tDBfÑÃnƒJ¶H%;x#¸ã¶ˆ8ˆbæè‚wÌjí(ÑïÖ‚¨æ1åñêÎ'pdë&+VÜ0l£/p °Fe‰4yÐŠ”ÎZH\$\nJA\$Da@pFª~Œžàæ+'Ìà+ol+ã”2|îd–;ä9îÜÄ%8ÁoÅðì¹'\"èu†Aéƒ…ú_ï« ® ÄoÀä×-L‰®Ø‚§¾a¤%0öS§¢uŒ6fB‘B[%l'mÎ.El˜Ål'är8Ç 0%l6Ò™Qf_Ã›Ådèƒº}bP]fŒˆèúÄJ9EÀ®)ôQ¨bQn~î\"tgÄån]e„gDM,^(éÊU²;JôqÊ<eò/Œû!çJAä²g.èO‘èãŠ;qœ*b¶v1Ø5¹ÉE\0'fôQ­Là ‘öAæ	\$oã„Ø¯eI‡NtüÊå¦b±kBväEˆŒž0â³©FSÄ(Nè\nO¢¶r!E%pÉ%Ë“&/ìôÍ¾¢’2rÒXÞÁ&—#ãZø\rxõhë'Fõä#\"ò“!í½‡ÀèOJLE>×dXÜdZyk²ÞHhëÂ.-ÌG2c28;îQÐ€DQ¶*õ'FŽhÍ+\$æNLüî91ÐæìÒ<26á’Ôý	Q	ù²‘.‡)Ž)/Ñ0I-r¤\ni±ßï0ñø–)2òÛ\0prR(ñ²Ø òäŒƒ¤ŒÃŒ	.û\$2“°RdÊýÏÒBQá*Úw16Æ3b_ª;p[4ä•H„¹.ŽIdù*P×åxÎm‡5µ3SŸ7­|†Oš8Ïžt“vø’¢øR—5Ó´×o•:FØOÍ³®IK‘/óÒD°ó:ÌÈßäÖåj@VÏàá¯|u’¬Ü2¶Q¤8yo\$Â%ƒÒ ·3 Ê\"VÇ\"×¨f­ÔÎç‘ŽD‡E6|bôçi\r/ügsB<\$Xûò~t‚g@¤œyS»?ÓC@%E;sfOSÙ;óª÷\rvï‹l5ozÏhW¥zE®Ðxä#EÉ0tÃ»<sø'Xt4Ÿ4Sa1ºtó­Ó3*T¯I±>p>±ãHÅI‡Jþò&-‘ùó?KsGJÅlÿ-MtÛK#¶ïU5s=¹NtÓBNóâ­ÔÀ”ôã3sSJéJTüzÕÿU²ýL5\0î´Ôî”Ú]¥?RH”C¢6Ž¶ÿ1ªB•2F¥Ñ	òVÓæ<#QUCr(QCÂPà\nCÒ¾Kß3Ó±N«3upž&­W§ORç)UõÓÓX5t=ôñRµWî^ŽUérš\rËâªsZ³ZõËê\ré°€êhrDµ°š•¶lÕÏ/õÃ\\uÊQÃÃšW)@h \\Óò1ã	VR¸7*£5µYÕ?’ÞÁr\r`'ó`u‰PÇ1Z64€Ë`I±a´ó<“<õ•2v'av+YôaXôùcR›3D¥c¦½cöZ+dÕç?µêŒ³WÖ#JÒ˜fåm^ÕŸ4éOñýHi\rž í]´ÃfõéhˆÁ\0…zas€Ù€¨> Îû–--ÓÓj/¶¨AXÓU<Õ“d²¥k§kVWg•-Q5§Ov½ZÈîÄû–Œ4öÝjVàƒªZu.{ µ);0¬a0\riÅƒÖÑ[¶Gkói†ôÖŸ1eOfÕe¶ÿ\0³prÑ*@® ÐþsrâÖÄòÄâz]çYbçFNçþÍSˆIP`CL-Mq³„D«4¹øLafx@e#\n¬+7dtoAwW!qÛ\"‘³9C›*“šww9)ú€ä\r€VË Ò`ÖÏÂ\09ò\$8Ñþ9G(.d+\0ŒÔæî¬˜K\\ª€ª\n€Œ pRoJ™‚8Ól¢»3 %”þñâÔÞŒø¼‡Ûé’)Bf½@	·èÀò×mæQ¥{ãŸ@â\0’Ç‹{Ö€9w*ûÇ,ü3Šúqž\\—´9Ç'Ö|5<´¢ÒÎ´2+ÖíÄhs..b¬.Ã`	€ÞÓÀÚkCÞ@d‡xzÇä¬aèhàVÑ“;’[\"ty5öj« QzUÔ@€Êž­ïŠ6vá‘>·l&6‡¿ W0ó#³	yòƒÃfnYp ¨‰ƒø=cÚ=÷ÔÊàÞäj¯¸ÛbK´ÎÒÕDí×üL\"»ŒØÝ*r0;ÎFä³Dx%,-ê;´’’À8Hj.èqAT='g&Ò{ðœ.J\\È7.@¬ Æ ê\r´ŠH¥hBÔNä(’È¸WzÏ>:#š£z_2Þ.êÙ&ZÂäX„‘&­‘æ;eú¹Nê††aŽ4\$ôáeFC˜Ñ’ny/iÜî!‹Çqx)Œf]dö(?ü{å*+±SU(w…;¥¤ý#¤;yà.g 	\0@š	 t\n`¦";break;case"tr":$f="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥ÐßvMóÃA†\\ 7\\Îó´ÀÎe9ˆ—3©ÀÈa:sFƒNdépÉð'˜éÐ«ÖËtFKÅèÝ!¦vtÓ	´@e×l8(¼Ür0šàûûù”SÇ@ŒüùKªK:›\r†t/2u=w“îÝ\nŸ˜1óq¤@kìöèúDÒ/áÐÀé”éÕ\"Ëµï‹¸Ÿjè¼I\n>ç°O Â9-ÐxÒ48Úî%ƒ”6\r P‚©B8Ê7©ƒ¤&4­êmÚçŽ£pê§À.ÔXÀ¥ˆ(Aã{¶\nÉx@·ŒQ¼Bõ+(!&/sñ–0HÂˆ¸Ð9£0z\r è8aÐ^Žó(\\0ŒˆÜÉ(Î¦3€ðü Î0^(¡ð’6Ž\rÂb:xÂ(ŒÌJ4\rã#4Îm¦(Å\r\nO £è€Êa”ìHÂ8'ÌbŒ#Qj=£C’ð7/jð¨Œªœ’OŽ\\\"¸§	â¤ª,µŒ ,É¯|XµÁ-\"# a&Ìƒ8ËtÄ¤£¬^'³p½b5„å(B\$²0»,(ì¶®p§KÓ\"3Œ5 É#oµõHË?CÎ@ÒSPäº#Èëž ­’˜Âð¾@PæŸ>uÞ¡¼ˆØ:ªcªú<·‹|ÓÖŒÔÞÊtx˜÷Ä‰Ö\$0Ó\0PÖÁ5²…ŒFïYWW5‘ŠO\$Uþ_\\V–i„ðë\\Ž°…(÷e™rËšàñÒR•¶õSLHBÖÓÛ©òË¨z–©Y®Yî B	u+¢§ÀVgšà×@6DÖ‚y´CxÌ3C“ZNaéð×«,Â Þ¹ÂãpòF#œf1³˜Ìì„Îac49pcÎ0¥‰e‘5'C(P9…)<E¨H0ô¦)ÁH@580êPä6§Öä_i\$l“ˆC®óbˆ½1½o‹¥6ò‰òN*1£uØÉ/ƒ\rÃ=³4 H÷\$1¸È2;}Ê¡¯,Ëj(D&cs@éP4Ojh6’!3rf6ƒ¯\$ÀtÄÄÍWvƒÈÂH,¯)N@C\n¢_aÂ‡0îITPeÀõ†PÈí+çKIq/&Ä™2hMI±7'\0Üœ“ iNÉà9§¤øŸƒr€PJ¢C€¢Q› ‡\$Ñ“\nóOïÌ‡'ìGU®7áÐå4|…Ãa>y©D“…SÃJu\"FaÝÖ@Â€H\n23+@ˆé×/N¾qû)æ[•PÎ2kjÅì¨°@dÃI•\$&]EJÉ¥2¼Â–Âäàó¢]yÓðÒPáˆid±±3;`€0æ¯ÚL¬,¯1ç\0™\0`‡ªÜFóÛ+ÙAaœ\$òH­ƒJŠ2&F‘ÃG\$’Àq\\¨µê\$HöáZû¢2ä£fy™‚†]»ˆsM‹Ày/`(ð¦\r‘ ÎJR‡“ÜÀËbP dÔÏ¨YXEéMaÈË½ƒÜCÈgF-y­‚-O”[<Á¸“˜¢xÎã„O¡½4JÂl^Óz„À–†’.‚¤k;Š*OÈå¶\"4Õšê496\"òNàaK¨<ò²d,Å‰ÛW%€ ž\0U\n …@ŠêDK.è÷³ó0g\$}:PÊ\nj5H&ZT*fª€‚«,\0@É«Õ€%¬Âš*<9•,JÈ¶¢ó¡¬çÉ´ÖsP€BF' âœr/‹àY°maOšz€‡š¹S@ÏO¶Zà[]§“„\"x´BàÔ™/h§”¡fêM©lv—(ÖJÐØÒEeÌù°!’Ênj)1Ž­²ö¨Â#õEðô9 …R”+’‡±¦5ÙþiOq0;Ô0ä-‡Gà]–‚Åç°5æsŒr¨	XTD¦‘•=®ê?¢@àçl)!pxêZ	6ém#GBäž>[D¤¡”;ªAl©…â¨ˆ¾øó¬ÓXD!\n7³u^®y‚}Ö¨‘ÐÍqÆ ”á÷Sµ÷u‹qÀ\r6#­xÙzb(i©Ÿ\$ ›ÃzÇá4©‰>´‘Ÿ”À'·ŠÐ‰z5>XéOÛÅ`ÐPðT\n!„€A4‰y˜˜Še‘;K9é¸:ÏÔž”Ö@/*ë!“©åŒ²AÃÎ¦5ÐBx‘^•jc‹†”oÒQYäÂçºÜpÙ1¶\0¸…<Ø²t±x ƒBE\r{tEA‹z*¿g¥~at„¦Òy\0Cè]yŽÝ[­˜RêIÖ@sÒú\0OÙM7§[âÜ¼zS<uŸ´Æ½xšSêíA¬\"ÜåÙËp\"‚af°w\"%\$š‘’6øÈ‘öT|—§pðl\$áM£<Ú†!ì˜Y™÷TO³IÜ%)OiÍ›§µx\n	€‹åfƒ+ÊŽX:uÄ>n	kþÞ‚RiL”	/QTªuVmÍÇÄ9ØˆW9lyW#8EÄ­%Ê+ht‡·[“ÞV3k£‡(Â¸y˜ÕÍWÎò´M;/÷›5ÚðŽƒl”\$©Êõ<|™¼½¹X8(Rb‘’ïÚ\0a2øˆ×]”\n°uÅS_›-YýIná¶š¾ãï=\$¯\r4Ä‡s…á¯®Î¡†›v 'Ã­`!‘•[;uky6«·\rŸ°Š`÷7q«}Ï”x»hPúõŽÏÂÚo§ü’ºò„³³ÎqÍ[3;à­+Äï7é=W<òoó”7€Ãf’ŽHÉ[ûÛ‰ý Oµ&ŒWÜ“TÆm&LVI7¾ð©ûñc©4v¨Šš«”b½?+1kTä¶¿êâÊuö½\nHö”ßëÓœ\\×™ÿ­è~pÕâ3‰713 .K½}â\"‡)L×x#Ä6E€|ÊÒþCŒ<©ú¶ìC²F/üSã×€ìóJ2ÿô*®Ð¯ÈoÌklJK+r.LPÃåd®¯æÆìÂ\$7ÏÂçÎPåJãÌ&ûnrtPZÂ.Îó/\\èKÃ}ÊŒÉÐ`õš0OdôOÇ°…ÏÖ~lœ(pSÇ‡‚·æ:Yª¢_d,CÞBì–gh‰Ä.ßO’÷oNÕpÂùpRôotùpõà]G¤\"¨dFP†V@² D\\EZÅ%e\rÅØ\r%Üý{¢6EÑ\0õ¤BHCh#bðdŒ ÂãÝoªÃq\nèPØî°ð«PˆîŒ6žÐæí¢W¬°ã‘î~AEï9Œ!å°xãmGžÆE±ð‹Lg0’Æ ÒŠPS¬m€´cƒ» òÊDnG1Læ>q™\rV;m0õ‘-vã¸¢&Ë¤^W¦(1-R­‚Ø¢B¥‹~\$KÍB‡œXí6%^¸\rt]â8˜MDyÎô,Gã6O¯–XL×QÔÎNÜï¨Ø‘êÔÏˆúoŒåˆîóón€Ê`ÈÂ6¢^M`@dL\r€VJþWê)\rªHw	¨HŠ `ª\n€Œ p7àÜ|`{-pQO£#«DR£’j‡JÑ²È²‚žæ¦²‘ä¼†¸.klâ`)‹`å\r Í\"RC‚ÊÒ\$ äl/ŽÕ#4=b˜[”%’Ä¸â˜Y,z<B|i&\\>ª˜d)R`ÅšŠt\"éRIVÿ	Ôƒš1)ÖŒÐüéq7Ñò¦JÂ£Ê&ÀÞjæØØr£2k,³£ÏÓ\$\ri 	ZÚ32i4¬^ j¡B1¢B#eNŠGÈ1í½ÅREs>ùKJ˜¦	®”Ê*°.üb1!&@ô°SŒS*ñÈÊ.b§ ¬\"žZBû5J¡s\\4C.Äð#@õ7#œ[ÄÖŽ67£Ö\0Š5Ó™2ÓØ³†O7¯}Æ4²âÞ²êë4Dt9#*”:hhÌ®#„¦1¥<@";break;case"uk":$f="ÐI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”žCˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌÐÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZ<,›Î¢A„ìeâÈÒv4›¦s)Ì@tåNC	Ót4zÇC	‹¥kK´4\\L+U0\\F½>¿kCß5ˆAø™2@ƒ\$M›à¬4é‹TA¥ŠJ\\G¾ORú¾èò‚¶	‹.©%\nKþ§B›Œ4Ã;\\’µ\r'¬²TÏSX6„‹VZ(è\"I(L©` Œ¹ Ê±\nËf@¦Ü\\¦‹’š¦.)Dæ‰™«(S³kZÚ±-êê„—.í*bÞED’¡~ÈHMƒVƒF: ‚£E:f¡FèÑ(É³ËšlÉGÔ(ß'R½’ªdX#Dš#Ïa¯+°a P ó¼ÖøÒó¼’ª6ëJb”ÍSÚZ™¨Õ1D¡tJ4MM”õ'NŠ4O²jÊ@£ˆÑ#QÔ1*ÙÕ&GAšCá[¦%àNÜ¦‘„º½’\"èGAàÂâC(Ì„C@è:˜t…ã½Ô# Û£\\7ŽC8^2×¸ðï\rÃ˜Ò7ß!Î	#hàé\r·Àèã},KÀ7ŒŽ»²9¹˜¢&\r.òÖ€ªeŒ_7iŠ\\KY‰th%6“ñ\"RdV Vt¡«õ‡’GÅšFÜ·yÄçÚm‹@’6m°Ú¿é*¯–&3J‚‰â°rÄ—!.ªÐjìö³­§)|æYUêjH!±Ò53ªeþËH!És=Je!\n&†\\Ù²Rn¡‘7Õä¥¸¡ð`‰o#¨Ø:°Â6£,GävZØÕí&‹FºèÖîÕQYôaÍ·9L¥™£YnJZÕSfÅZO“+›(HBWa!ú\\ZÐR)”­ÂÐZl¤–ê fá JR PÅ\rŽ»Êé#Â7C¸Ü2•êD4YNmãÓ‰KéÐ¶Nr¤ý&¹–)ê^MThYÒgiÈ„*:ó…	4 Éý²ñ¢ÿŒÜ\0€æÙäµf šâÄVïdCØçF€†TJ+3Xå„ª?.°q™>%/\0•‹ñZ(9¤9¡¢Òß›-~Êž	Bx¨a²EÅe½€§€QÁ8a…n‚\0Þƒ0l^}§Ð¨ÎXm{aäUúCc:¡Ì38 @xgDÍ@åg(€FÆ´ÄQ\0u;À 9‚’ÖfÚsI	}§\0†ÂFyL©¸‚âGÙ]Jeº)1X‰\\,£DD”JÅ¼LMD¶t{dY5eŽáYapO¡Å\rÁ¬ëeéWò!w/\0ä\0_Á‘x‚´·òà,àˆF\0wQ\0gaŒ8µª²¢]{ß„LèÈ’TnTDb<EÎ­špšÑÙ6V‘ê<ÈÙº,¥\"CSòIÔŒOhagx9ÉäÃºôb¡”<\0Ò·C\$†—á¡n­õÂ¸×*ç]+­v®ðÜ¼Wšõ^ëæ~/ÅüÀ{lƒ0†2Øygb!•‰±S°ÄCk9tæ/¥CÃpt™¨=k\r.~‘QS!¬ùöHš„4)XˆGx“ß¢S6j(Æ£|JJJà€(€ OåIJÅ‚‚Î\nQä”)E8ß#FbPéðŽlB0¨ˆù´ßònA ¸“À†À(xc“%‹Ãœt‘Ôb¡ÁzC¬xŽHoqŽ>0pË@LÉ?pò+Â%¡—G°,þ”òÖžÌBD7Lù0-Q!B*v¢ËØoYùH7©ºG²[BìÔË;´á]¶9ZQœÝšèä•M§ÔœÜˆ+²9,À’EÃÉÂ4±S”ãÀn¤Ç„ë-Ðâäg˜ ÁÈ7†Ùg-h|õ<à8ÀÆ½ÜžÇPô?yÞdù\ni\nmdB@,Vz{•P'…0¨ë Œ·ïº®\\©Ímoþ*„ÏÖ;ŽàJ;§ÁôáYE\"ØŠû%©o,©& šÛA7\$¨‘ºA.p.“Ú\rÑUƒ†õÚØb\r!œ1 ™xŽ‰È:l#@¡Ž.Ôm`Ö6¸ËÇyHÂñ8ëÉ´ÖNàéâk(Õ©92ˆFØÐ©+ ÐY:Q ®\r0˜ ‡¤ŸA¢8!–fi „L<öì4ØÐ„\$s7Ù0KÂE!gìÑ©iPUºEêI\"÷ŠBÞ=®E…;hóP†+°Ìè=*•iPgÉç+…Xµ\\Å>Ô\$a²Ç&ÉJ,SŠà:'ü–\rÁ\"µ«üÿºÄ§¨!¤Iò§'jà–-nýÊÊ(býuƒð€êª@Gã’‰eÚ6éfjv~o…Ñú?Žjš67ó™[¬nlÔ@¢53ÍÊXXž©ÕZ¯VRJ>´í `2ÎäçÈI…	¡u¼÷øÐE³¸ÙE0~ÍóäfZ¡æU,™ð¬-sht4‡§%]Ø4rrAL2*õcõ~È}D…>BèVmv†åxÕâ\\±î44†Pï«ÙñF7BÑµ“Žh³4!¥0…<ÄÊûš².e'¦Z”ÞýÐZ‚\$[y³‘¡Mr\n>çh‰–ÐkHJr´Š²÷÷-Bõl™ £>UŠs²év‹Ütã¦yª¨ÛÂêTÑ¿rpòÙ­¶DÑm€…— ×ÖCºß†²fB\r¤hT)œ´ÙAß	É„|ì‘ z7šíŠ+!P*†ßæçWD[®FÕ„GzÈi¶áà'=šO‡ÄFð^^£z”èe4]5óqòÌ¨¸ùß)’ÛÈ4Kà{<„58²ùtJsºãN¢ðÉ?Éf_-•àöÛ‡J×}ú|î{WäC/¼¸ýÿÔhÈ”ïÞû%2@O¸þ‡î\$ïî¬Œ°#ïÊÿ‡ý&*ú‡Ìâ*Œ3eBe°\nlN\"~ÂNþbšþ­øâxæ ûP\rÑ/ÀÿÄCOÝÐ4|)DGÐTð*]¡}&«gölp0Yn!‰4û«\\5¦8]ç¼€î#/àÌFL…dÓÂY\"FA°¨óÃbò0F’¸‘‚\nšC@€Vxaj=	HU‚UˆrKp´lNæ%ZEÂ…\rÍ8óð?pt*P°-Áv>CVM-¤>	°ÜD„·…@ð\\n­hœèõ\r0Rl0¶ID0ñ4/¢#CFâmHšXš©Õ,4Ï,@Î®ok70¹aØcCä|ÙÐ¾°P(1d“Æ¡oæ¤*D›qg¨VÌp\"-n0…ŽÑv¬qj&,ÈÑ”èÄLÜˆuI¼ÿoÎyªã.š1ˆFíô%bxa`¨ÌþN•’ñlÃE’A°–2G†Ag¾šB<Cdäõ,*€‹È°\"A 4Ä œ±®Ô##Rjhp\$ÊÐâSñ!BÉƒ'Ïƒ.¨Ä„‰ÐÃl,üÇõäÌM¦ér@FòÐd4ilÒJµÀRÏÍ‡-}k2·QŸ„IQ’WÅFÚ\rw(*pÔäæx.Na(É1)\r‚€ò”B¯D©‚>×²ŽÛR“\$>+q»¨æm¡Qy-c%,Íµ-•+Ï*(lòÞ5qy,RO.†@ËBJGDc/CÄMPìòcò¨òóŠ,Ð~þ\$‡)Q{,r¶ýädØ“/ó\nesÜsòä^Ge2ÿ2Rôª0a2Ó³¿s8Ñ3<4ê|‡“E1ñrZÐË,¹/rÈþÓæNíƒ*Ëc#2RÔâ³z=3~Ëô “†íÁ4ÒM5’EL®üsší¬¹*î'+2ŠôTÐ„'D|ß‹0‡*)¢®.¢V*«úÄ¡'åP¬'6¶#,?\$*i³Å<óÉ&ïuFI1¢ê®œi¯<³&XB ­ãnhzïËT›ÎÜ‘ÊÛ“Ê³D¼.È> Kë9s°P“œgì¸ëÎÀ1­\0…nå,êôålìªY?2`=’dè~ès¥ÒøÅtn7s(r×Gb¦è0;ªßr¶Ú‘ÌÚÆyGŽ„h/|óq7HuÒé2\"…ôs2zóT³JráS».s«\r¯T¿IBLôrIbºimhš¦\\eE^üè\\W¡ V@1bšÔh&.„ðÞ0NU¥(JqïPGÔÓ‚B(&WMÈòÓg,ó(M(’PócR1RS1,3¦ÿ³{S3õ#.õ;´×+TºþÍ0„GHitYñ3S3fÔÕ;ÈT•^(cW(S@5m4dfòRmªÂ’°??¥X.*Ö­®ôÛòjÕ„¼­tR´ƒT#!P*Ë:Õª¹“u.H	Rõ·ZJZ•ZÔ©4õAI5Xê4Ï\\°É\\ë.¶•I”Ú´5Í[ÕÒ‘ÎŠmµ®Ú1§]ÆØ ôIt‘Uufìd\$>^ôØ?mÎàHCìÓ–JÓzNðQ4·7–	c¢½`õS;öêLAG…]<u¶Dê2mÛJ4²RÔôôËpV¥c5-.–nM¯N5–w]u?;ö~VQWNVI;ÒP¤JtCUò“e1ˆrì²*lÍeðÎ«6WÕ&šPßP°#1Ñj…ªýËTõlfePÏüj´ò®ÿmS/¶Ûk”WéÝlÂTmËÆÊlô4V¥—Î\$(ôú#ñ_mÇLõ2jv×oÙl³G6öíl3'd\$øe5\0W'/6Šýý	Õp@†ŒÀØnÚÜë\\ì%1êpŠx¬Kÿ7uhMBtÖ´’Ì‚b ê¼ Ä¥lf\n ¨ÀZ\0@_	rº„C°&ýrjÜ5Â7Â<„*¨úw¥\0002¯zÅ2Ô’_{S*ÿï¡Wªƒge|påAOs\n€o¸dHy=1Ü…Å°	¦(\r Ì\$Ež7BS£êD¤Ce9/¯Kh²5e”’×Âïé¼âÂmYCÕw&Ï*²7vƒr™¤Šn‚’mU¶…pF@˜ÆÆ*\r¥è9¸<˜Q…I’|mÊ‘ãêÛ+bZ/%7îss\$1\$6i+%—E12BÛÕ2éˆ±¯‡ÖˆPÎ!V£cq¬ãD'.	7H¨®‹‡¸³0DÔ\$÷aÇÞídñ¿‘ßAÎg´z)…8fv­@ï…EžZŠ\n|ÁÑæáCÔÂLÛgñL\0,%g^êÎ\"5ÔJï²L*/+!Ð\0šdè\nÀÂ`ê ÚÒxÊ­}‡L¦îþ°É”˜ìÛ£êåÖ#\$ÐÑd.rÁ=„+EÍMI\rPÔ#ý%g1\nnÛ	D×yY+YvL¸¥MøZ5ç:ØKÒ+Rüwc]>B¬Oöd#FN";break;case"vi":$f="Bp®”&á†³‚š *ó(J.™„0Q,ÐÃZŒâ¤)vƒŽ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XÞ8@q:žg!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ð›­Àƒ}FŽÊÍ¼S06ÂÁ½†¡Œ÷\\ÝÅv¯ëàÄN5°‡SÁ«Ü“ ¹»g	“¤pä7±®úvù¾#ô]“áÒ]“+°æ0Ž¡ÒŽ9©jjP ˜eî„Adš²c@êœãJ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹Âñ”È@3Åè&Ã!\0Úï2Œì0ß%Å¤‹öƒb‰ÀC@\$)©¢Ô¶H…|™';• ˆÒlœ¯±†üI¢jV¿ªzT·\"ŒP¢iÄö2ÃdPC·&! bkëèVŽ\0P2Ê\rENiDþKÅÜÛ2°(c@ä2ŒÁèD4ƒ à9‡Ax^;ÖpÂ2\r®ØÊ9Ãxä3…ã(Ý^¥|90\0^)ð’6Ž`Ê6×Ã xŒ!ô'#¨èÞ2#ƒx@:Žc(@)Š\"`Óa%ÂÅžõ²¬»3-Ðh Æ€”±Päa—HlpÂ\nxëEe`Üô¹M‚ß&°î’nCÍ„aL@ýŽÔž¬D¹tš&	“\rIªIÄYA‹`‰RBcú;#`ê2WS!ÀHJpT§cv@Ã'ªìth©€ºc[‚_±KÑJþÞeÙS(˜erÁEzP<:´l€‘:l¡tøÑÑA6’>ˆ3,Ó P\$ƒµ&¼­òÚ‹+älš(Ž¦RþŽŽñ@‚-Ðfà½½Ú‹46)²½È&CÅž\rÃ41öHJ¤‚¦\"qŒ?+(ç© æ™Yì*˜[ÝÑÒâeÕêÿ_	ß5Î[ÃT]µóR‚Ò¯\r”NÅÔñ˜Ä}v+Ó”6ób¶sÜû]=Ü“7=WYÇ1YPä#{40Ôa\0Þ3ÔÜ2©cC¼Pâ­˜eª&0¤ƒ¢Š’)øºøÓï3äbÚ:€€‹Š4|GOSˆ+ÌÍU¸|×Áý\rÆT0’äˆ†š18gL´74‚3ó\r0£äb¥IJK\$‰34~…Ð«¤¹C\$U´wÏèx@ô¥`ÖÁ\0fWK}b`‚­°r€a\0,@È­Á €ŠR¬€æðd@„:°Î´Ö©.\n 4¦‚ˆ(™Ú)¤í!£è/Ã¤\$C.XH²6ïáIX‚ÉÍ:ŸDðÔ#qÕ?­”–ÅC2¨UJ±W+\0î¬¢CçW\né^+å€°ƒrÄXÑXsÔA…	2Œá¶0-fHHÛÒi¢EÐ´`	qïkçÈú7˜erh–˜³H†Á–i? £ö[\rû Í±Ð¡nB€H\nÑ£™¢<%Ïñ8CDÉo‰b€8c‹¥Ù¾ÌäNÒÎá–« éL@\rÁ¼þ²ÐØÃ¼ì)oÝ~¾¢ßŸKG?°)F-uç0Ã¤v:&\$\0Q\rPÐvMbìQŸÙRØà\"K‚häÿQ1;9Q@(D%oARqùùb…æÂòI.	\$H<½ãÖVäó?«„7-Â;<PPe5èþ†cþtâ:µ’DÑ_Yî¸f¤@†u’àˆ»T™\$'Ô¢À^xS\nðïÂ’s!BDsSq~±ÒfGh™:'„¢LâwBTI¥^“Y€¥pQM[\$¤S?F¦#õn[RzJ‰aëMåØ#I¦sã¼(9ëyæ§Ã’ŸêÂƒ†hš¿šÊF˜½ƒ-¬#!“I(=„âé:ZðAŽúg²-4þ90ÂtÎJ:PÇîÉ6ÃˆÅÙL‚ìF°6bN¡ÂQ¨„ÔÁ¢	d\n²÷%Œfê‘ò.Ak#a’¸¢c»n]˜L ’P‚Ó „®¶ï®X‘ë›{œÛIkzô¥D¬LÃšYº\"þì×Ô´š=Î-&„©{Uã-‘yhM	Š4f˜eX+\rb†ì*Ä@PV/ç®ò‘ÄÑ‡ÍÑE:h±Øw‘Åì'o-&„ºÜM+‰\rhbµ±’qsY‹ë:î6”7òÏæÑ(qšEÅn§Tz‡84†Pîb×ù³\"ì\nÃ¸DšˆIÀ‰˜‡}öl.ó8èîäP\rIŠZ_n˜Ä4WÕiÃ=©DÁà<8Üú¹£0kNòŽ2I^Et¨\$Y¼H\"ô®×’`\n\nOzqË¦‹ É&`u]éU—¨ÏAå£É¹8\0 ‚ Aa!þdùtâ§DL:‡\0á;§Õ¤!-Ÿèv]Ú•føö\0^t@2I&Ñ2,IÝ€ÓWÌ@2ÞLÉ©7AÙ\"	±vY¾¤Y xÅd­\$+h@EâIvÅ Û%ì2gY±€ä]¿“2T_K\"Ú+ÄÝ•jOøw\"ŽžÆ¡jºÀóNg4(‘?^v/ƒnñ×Ú­dÙ	&¥™#¦,Î™Šg\"vG’¦2<™³ú®iPœ\n²ìSíx×ˆ›ˆæ-¥°ë2%7H¾Q‘[mÎs«m/Žcn4	Ø’‹f:”6Î³{.›.2‹ï™ß%Ó'n	´çÜºì„o|&(ë½ûŸxIƒ€«;¾Eù)9¥ Ê¶Ëß/”0ñ±)Jìzù()\0üF6¢¼£#BÄ¶xáDA+¬¡KMÈÁ/-KQýýˆ¼}š3Ç¾»mwža\r¶zÌù¤œf³Þƒíð¢fâ†–%ç8…ùë÷Ë¨u”5Úq5‘½?Á_Ëóóïhð®bü9Ï™ÔžD‚º2_¿²êò/Ðr‘ÑÐý÷JK‚>?DÛ92s#þt¬ú?]ýMÀdw‹}g—ÙoŽ4ì.¢ÿLðÿ®Ìøá\"íã5â\\\"ÏöµTõpõ®âu	b¥cÌ\"v³x?¤0Î)‚–®rNú¥¨˜IlÛ©žöoR®êR¯Opj<³\0ze&‹~!)«î*\$¢ª°D?…NºìªÜ·Ïès&:M·¢,Ë(î¯°!^ûpš`øn6ø¬±\nÂí°\"›P&y\$*Ô%ý¸CO°9-0^/ÄúOË\rPFq/ ûÐàÓ-†0,Í®yRdPâÓLºð8JF¾7 –Ðc¢_\$”n„\"Çñ4h‡v-ð\0AM(VÐÛâHýí+mC9ÉZúø1G=Å2âJÍpø€ŒTÔ’ØLzôdøð6ï‚ö9ÃVJŠÔ¸0±\0E£ €Çž/˜èÂ‡ä|¸({‘1h[ÈÛâÕ°Ó(]¥½‹FéQÀz%´Q«è]O÷Ë¾Iq–ÌÑØ¶ñÝ¯±âkG	BñîIg&M‚HH<GÖq1ÔÏ\rF²DáñöMM´Scîÿ-¥½\"R	!Ïò‚ï@·*ÒMÆ€ºeè%PvãX0Ìr’T`mŠ‹£ªÀ¦Þð\nz.l‡ƒ®+8\"êNÙ.hrraqø>+àþqNCàœ>J €†-\0Ø9Ã~iHÒÄd€ôŽÀ”ð¦B®UÂHÆ>O‚ôòƒJDDî €ª\n€Œ pùŽ®ñK\$Ù‘É‹F.‚¢S\"@{æÓÅ`ƒ–o¬£\"LQ™D/Át§lÍ+Rù¯/J3bŠ6¢ÎD¬I Æ¼+Ì]jk«B]å\r2ã6Ieo¦æ¾/xÐC„?­/p†í’nÿâU\$DïòínÆµ½\nD'¦ô	bf¬ip´íp£B|\$ƒq7,½*B¬´¯¤Î†Šhó<Ó«D×Ä½¬hDœý®òr#x›#Î%ð<®\r´®Pg/‘ÆóÐ'\nä¹ohÌ’ƒª´ðÄ`‰XÜ\$šÓ‹îkÁrhJB\$òÂ­ –…¨92Òü(k–ã\n	ŒT˜Ñ=ÄDvå\$ª0îë?/s²4iB»”1¢'s}'à‰1²¸iœ nˆKLD3¥2Sr»æjÐÌz4b¢";break;case"zh":$f="ä^¨ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ð S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ð€Js!Kd²u´eåV¦©ÅDªX,#!˜Ðj6Ž §:¥t\nr£“îU:.Z²PË‘.…\rVWd^%äŒµ’r¡T²Ô¼*°s#UÕ`QdÞu'c(€ÜoF“±¤Øe3™Nb¦`êp2N™S¡ Ó£:LYñta~¨&6ÛŠ‹•r¶s®Ôükžó{¾¹6ûòÙÍÀ©c(¸Ê2ªòf“qžÐˆP:S*@S¡^­t*…êýÎ”TyUëx»àè_¦\\‹¤Û™Tœ¥‰*Œ¸©Óªë¡„ÒŽÆ'ŠaÊ[–Nb¨Æ*¹ÎVÈÉd²>1[œå‰vr“ËqÌÃÂ¬!J—ç1.[\$¹hŒDcðMœ¤Al²¤‹‚N-9@€§)6_¥éDï’ë£âs–eÛ‚‡%ÊyPœ¤ÌŸÃèI´ä1ÎP)kÄ ¥Ñ&²1zJ·g1@œól“8ƒ\"9£0z\r è8aÐ^ŽôH\\0Œƒk¸2ŽApÞ9áxÊ7RÃÃV7cHßLJ8|\$£ƒ>6Òã xŒ!òŒÑÕ\rhÞ240æÊŠbˆ˜4µm©Ò@'1TÄìC–“ñÎRN	&sÄ#lWÄ¡rtä4Œ_Zv­®º©EÊ]—V,Ð‡Ö©ÐE%‘É.²DQ\$LY•IE<¤9Tr‘EAÊQ×±“èÂ:ƒ @;#`ê2UýƒaÈ%í‹ˆ“vÑ D%¤8s–’ZN]œÄ\"†^‘§9zW%¤s\0]`oŸ˜<¤a#Fiâ\\VÖM–]<D„sß…B Ø@ØÒ6Lø@9ŒcÜì×G)\"o#üIœ¥ãÖå7Ó•jZ×3rÍVîÊTKæÇ!Í¶k¸Í4Ùå1tÓ)ÌNzÀ^:<ÊC¬û…Æ]IÓ5¼%»¦ÝˆØRa#“Ç„ø\rã0Ì6Qí©Íz\$£Ö*\rìÀÛ©!\0ëN£ÆÑc6\rƒxÎîacH9v#Î0»’Ö”pÜ:µa@æôÌ,ND¦)ÁNRäI«^ÄjIqä~š®§)JÁGUhDQ>Æ\nŒÜ5´c5&ì”éÝF¨ðäðƒŸS¡‘HòžÓê(àˆE>jŽàgUj´Ú…7p§ƒp AâÈütXC±ó|¯:¦çà]Âhaf¬9˜dÃº“V”<\0ÒŸ .Éè4'Äü „PÊ!E(Çœ¤’”RÊb)µ:§Áz¡jRªuSÕqG\nÄ4+5kÃk2ªðÌ©^•Lƒê~ñ\n:E»ˆU‘^{Ë±,ÅÀ¹ä\0€‹yq‹J\nôä	Ð \n (	€R(çÀ†‚ŽCIŒj~80éc9š3†xÐUh˜t4f¼ËöÃ]èw•ÏTÃ‡+SAŒØBÂR\\L	‘&¤ÜœˆD*9…pµX¬«an¿Äòü\n¼Æ’&\\àd\r*ÐË°¥n•¡­–‰ð8°øf0r\rá¶ÀXá\rMj—Þ«sHkpxÁ”Ú“ö)‘\n<)…I,™ÌQVpâ< ‰î‡‹Ð€³bm*ð@:D+)emY¬\nCcŒƒQ„&Þ¨Ç:ià\\„Éá+XiOA*IV¤­J¥–/)…OæÓÔ”R% R	gRË0 K¼\\€ ž\0U\n …@‹UªÀD¡0\"ÕâÐ+D¼Ð©x´ñ±k`é¢ý´\ng(\"cÅU:gTºÃž`(Š‹»\"ì)dâìñ5§¬%DCwmM\n!rxO’MF1‰9k4šÜSr¢AŽqP\"×s¢<L0\"È\"Žp€L±‰ðÙ8+LŸ‚1ïÙ\$Â„—@J½6Bé\0‡…½¹g|[¾r[T‡-T<«€)†ôÄ%¥zBùM+Žý˜<ƒ¤N‰çN%[›mæ2ÃJté.º´3¡”;žU²¶îšOd-u865¼Èü%¢èHA6µ\0‡mUTstF\"…1©ÂQ–-MjÄŠY>6…Æ\n|.úpÑhbèƒ	¡Ò\$ÅðæÆ½µÇsÜ#“*BÓZ†h~Î¡(qËŸ\\t>ªèT!\$	Ú¤I¢s®~r´óO,‘«ˆ\$´OŠSÍ€\\C©+ ðA—+îTÊÂ¼QáO_H5~âV<ÀAšx—I\"Är‰1ƒ\$\$‹¤~=Š¼Í_LfnoåÇ*åxFýâ-9œP¾2ïŸôh\nWj9…O ïrÐi(#ä„P¢zSlœÏ£¾È'r²úJ«ñ,% Ã(bÕi_\ri‘mqÀ¯ºÙ ´(&Qp¶¢NaZÈ…Ø…g«)fe£Ì+Ë@Ž[B=\rŽaqÏx/EðÀ¯Q†ì±à±µäsà{*,‡0›Ÿrnbï¡Î‚Ý¢¹îýÃx’vç¿Ë[|ïd\"\"‹Œ.³	ö‰¿0“ÌD]‰‚l)(€Œy^ÎúÚ‹5x¢^29xßãu³ˆñ8G¾ÅÎ\0¿†3•Á*ˆQ]Òv¹WAt)¥hàÄTXïclþç|´‘/tý‡:2íB£¤óíÿx¯KuÜý!É^½ýÓ:¬Â@V|iiÛ@Ï££­ÈÚ­+î}Îy×;ô}Äxð•OßBý²žã…:Ÿ\0q}ÜÅèü»‡(’›—£Â#·6EîQpB|:nüÁyB‚¦*<%QðÂ K‘ñËâ#Ér@âàUrÔŠoÈÈ”¿’fÙ/@ˆÍêÝõ6§ào\nãyAh`iwtîP¶ÒGï;âûü.ÝÀ~ÛBér|”Ó¬½Ç3¹÷_¦J;Ïúä¤»ò¶wþÐºÇ-¯ÂÜ³›úTí¼WWáÐ„€Žlçèvþ +zþ6êÝ(YrŒfÆ®Âû.öÿ\0fÿÁbÃÁhJÆ¯Àïpbì9«N<¡~õA6Ï(æN~î`]Ð\\ŽÃ®î…½o9\0ðLZÐP]ì9¯ê¼P6pBãŽc»nRã¢ÜÇ°y+ÂÌ0ÃOª[Ð„Äµ°ŽÃ0“.ë	lCl=m\\Ø\$bFo¾„o¢<l|ðŠZÐ»°Â.à†@Ð¼þìhÅK\"pÐA>±¬¸:ëJ´íFk\"Øê˜)ät-\n\"l\"Œ‚É\rŒIlÜ:íæµläÄ¬èÎÉD€ä\r€VŸ€Ò`ÖtBOFaÃXuÅf\r Ìv%x6 Œ§\0Ú©ÞHÖ„ ª\n€Œ p.)Ä;£jÍÌÐ²Á^pƒ\0â4#z³¥†<Ì¬\\\0›qKÁfƒ”.!ÚŒÛc’·ÃáãÄìRÅfþ:PuJ³B«ÈIiŽ!.	€Þ¥ÀÚRc*5#bÒQß#¼?Á\0.OÐÄ€Ðí®,®.œz‹\nß¢XIÐ´øûùaI!@\n†šÉC\$2Š`©ô\ràà”å¾#k!ùÅ¸òäœ@ÌcÌ\0nâÐåÎáfîæªê,‹öåÒhæìv1RF\$6×p\nÀÂ`ê Ú#x*AÎ2Z\nÁGlªZbbKí¬²<²°¤r\\A\nØA\\k?+R±pöhpÞ¢8<®·&¯.NO ð¬F@	\0@š	 t\n`¦";break;case"zh-tw":$f="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÎu:HçB(\\Ë4«‘pŠr –neRQÌ¡D8Ð S•\nt*.tÒI&”G‘N”ÊAÊ¤S¹V÷:	t%9Sy:\"<r«STâ ,#!˜Ðj6Ž1uL\0¼–£“îU:.–²I9“ˆ—BÍæK&]\nDªXç[ªÅ}-,°r¨“ÖûÎöŒ¿‹&ó¨€Ða;Dãx€àr4&Ã)œÊs3§SÂtÍ\rAÐÂbÒ¥¨E•E1»ÞÔ£Êg:åxç]#0,'}Ã¼b1Qä\\y\0çV¡E<Á¤Üg–¢SÅ )ÐªOLP\0¨ýÎ”«:}Uï»áÔr¢òå´yZë¤se¢\\BœÅABs–¤ @¤2*bPr–î\n¦ª²*‰.Ocê÷°D\nt”\$ñÊO-Ç1*\\CJY.R®DùÌLGI,I½ŽIÒ@H‹–Å‘Ð[°§)r_ «ÂK¯oŠì¼')tUœå™w/ax].J2«¥Áft(qÊWÈÐº®ëÌ¤U¢äÉv—ªY`\\…É\nsÎS ,°ä2ŒÁèD4ƒ à9‡Ax^;ÒpÂ2\r®ðÊ9Ãxä3…ã(ÝN\r€Ü9#}>)ð’6Ž\r ÛOà^0‡Ð{QW¶CxÈÔµc›4)Š\"`ÒØ7GI\\@„<Ù(Q!^s”…ÔHËkØ_•Ç1(\\¤…ÐSÒm¯lÛvZóq:,I<t”Ù6W!õØÄ<¶@æÉvlK­É‰vtåÌC•G)JØÑ3” Â:ƒ @;#`ê2Ù¶=’–åìT\\Y¤Ùr’B–HŠÜreÙÌBññÎ^Þ1IJD}šLª1Ta'1pMß	â|ƒB ËP„I*[ÊE2[ƒ à#bcRÛ´\0æ1Œ#s·`œ¤‰{–<§1IÆËqÊÞ7×´\\ÜÒŒ§¹\\²}Î¾Zv®Ü]ÚOžë&ï¶¶ë7œÄñm¿)ebvž¥¤a_?¼‘ÊC—Io\0sð[Òô¾<ÜôßÐÍ¼ùQÂ­Ö5IàV\"92L @0Ða\0Þ3Ãe,ÝO“Ÿ1¤ìèÛ°!\0ëQŽ£ÆÓŽc6 \rƒxÎïacR9x£Î0»Áº×t¨Ü:Þ·¿xŒÅDBib˜¤#Wƒ]<¿>DYÒC‘®Œø^Gi‚ø9D°®B\" Ÿ¡>ï\\¸º2!PË†àÖj2šxÊï‚\0‚¥°rzÁS*@È¥Á€PJC€Dƒ\"¦5çx3«%hn‚›ÌT¡¸!Ad±„r1!‚1ú¿wòaà@…¦D&†æl‘žˆÁÌ;©¥vÒÃ€iPaB…Pê%E¨Õ¤T›âRêeM©Õ>ÒÕ¤TÀ½T5T«r°…ÊÔ¤pÒ¼ŽÁ…ù=æ\$»Ã\rÊÂC%M\rEú# t\n!V9D¬>DŒ¤\nÐJA¦0¹–X.ÒJÚã˜G‹GÖ@P@ˆB „ƒ! †“\"Õ4ƒaÒG£>hM¥ªì8) èj\r¡›\rìIŠ½ï0ß9¯¨šŽa\$G@­–Ä¬ódF Dq.&Éõ¡¡Ì+…«~åj‰Á\0OÊ	g~‡ÍuQ(„Ü	!˜—dJ»3ŒI_åvl¦Jƒ,^#‚\0Ìƒxm‚ÐbAÄ“d§\0cz*øÔ›3PÐe7A@'…0¨8¤`¥\0¿4!6P¦ÃžÂ!p¢)ë=Õ° }dÄVb<¦á“2­‚Ç¢¤Ý˜ A¤3‚€(tÁba¥@„`¨{Ê²cGêD(’¾FeLÑH%‡ ¾Ã¤F‹R–(	BGá<'\0ª A\nW@@(Lµí%²D~9Dxƒcös“%šÓÚ‹°B˜c¤'Ž¡Ö;hAv{À‹³Ä\\S‹³ÈEßDÓ§n‰)™”á±ù<bdRT²mzp®mÎºWF™¨ç	¤T¶r~Rc ¸E1ò.\"Ä\0æ¥¸¤q\"¬!‚j:£±%Dª’ò¶LËlœm0Œ…]]²³_ÁÑ0b%?já\\\"P\\AL4‡¦1.cäcÄÒK¹†xm™å’¯¦ÕºW-V¡mˆ†½KÕGu•Ù¢¡Ü¥Š¥¼¸ƒtœZ\n!Ê/Pä[\rÏblP{+PæB@‹®ô&[À¹²ÓÖ³Öš×[O0§ìr¥÷4àD[\0Èbd^dR¬9“ºyDb\0Q­3Ì/c¿¾Ù4^3«q…Ó:‚èê‹±m~KÎGs‡Ðû\"+^‚ Aa P¼*iÝ›µ mxÖLPäl\"¡Kâ”t\n‘DþÏxŸ.HóžWÀx ^&<–‰ñncÇ6ƒÐ¢ˆ'„¸vø}ˆ?bôXŽ‘>/äásl­œ]ŠKäô±C(Uv21*G.±\"1«´€ôÖ†C:èF\0¥„¥X•áÏ“‚œGÉ³Ù¥4ml9Å°“‘²<@‰Ä@†Eõ˜Kiw'\$n(äÜbq/\n„\$\"/>¹Òúïw±Áu¢å4»ts\nÑDKD#+=hïLnh0¸@h±RÅÂ#¶„\\À˜7&!E@égÄTîuÜ+¡¶Û¶Vža6-”ë¿Y‹%Òb¹RïŸ\$³kížGm1}›œæb¥È.msžI¼÷­¾ƒƒŸø¶5,âq*rÍBž Ð(€pVÀüð²1ÃWÚ(ë£—¯ö>¿c,wV%¨WŸbÌKÓ¤§oÅ‘v+‘,šsPBšZ’Þ•Ó3Cv‘èW›ÛY¹\r¡òélÖÜòÛw’<o‡íºZÁWãäç.£Ç[Ì“Ð›æoÜ·¶·žéýðâG&ˆôá—î:ä[O†CÈµ&¦ÕÇÌÛBZ+Ul¾“Ê{ü}ð¼îHøß¶™}Œ‰ñú¢HåcaP”~”‰]‚ —y;ÊÑ`9DÕº÷EùÊ£§úßa\ríµ\"äê\0@X·§2<%:r Á©@rþÿ¸*OÒC,zùŠÜåe²úîrÇ,v1G?NÖG¯([¥¾\\\"øóLA¯\$7¯=(çNi¬=eÄ÷ŒÌlÊÏˆçðPeUoÍpZÌÏœòfÌðb>pnY¡,¸Å¬o¡:!ÁÌætý\"Šf'Á|†ÞBÐð¯`Ì0Vnb¢¢ï’Íp«\nðjçç.cÄVÇ(pËìÔž†:¹Ðr~Î¦7Ð®%¡6DÂDüÎìðzÕÌÂ¹²žî?P¦[k‰¸ô¡sá/¬Àë‘	ðëA'ìì1/)‘\rLóL„È„¿¦é,˜ÉÑÉQ5sQ>ÈÐÓÌšÈÄfF¤nG0SPNCãàEƒÚDl±1ké¸	Œ\r\r¦l»sAD´í×à@\n\n y`æ`P4àR¥	Aß­þHYAF¢.z%Áb×¨j@B.±¶ßÅâ×îbä?a1rÔén€ä\r€V£@Ò`ÖvÈhP&(bÃbxEt\r Ìx¥†7@Œª@ÚªC4{ ª\n€Œ p<ƒŠ\0;ãt¶',ˆM@×i(}8¶çXÐ¤„ô¬	²!ešá8âƒ˜0±|tî*0„vÊ¬ ÇÑ¶ÍÐ)iÜ°–:ÅØ-Œ\rê\r¥43C\\6ÒšRhX)aº\"æo¡<jÎJâ!Î,®rå¡Ð¡³ÒÆçr\\æ­µáÑ0Û&(E•-pêf¸Ï.3*”ª0\ràà—…*Ãtç©ÐJ*«rÆPeBZÅ ð.ò²/èîk ïo,-îÂ,ÓÂ\nÀÂ`ê Û(Á\0 fr¡,ë§Æ…ºÓ\$êçÒ. ObÊ<ÒÌ³Ãò1\nÂks7Î´£Í-Òá‚–fðÈý!Ì§ÑZFÄp	\0@š	 t\n`¦";break;}$ii=array();foreach(explode("\n",lzw_decompress($f))as$X)$ii[]=(strpos($X,"\t")?explode("\t",$X):$X);return$ii;}if(!$ii){$ii=get_translations($ca);$_SESSION["translations"]=$ii;}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Uf=array_search("SQL",$b->operators);if($Uf!==false)unset($b->operators[$Uf]);}function
dsn($jc,$V,$F){try{parent::__construct($jc,$V,$F);}catch(Exception$Ac){auth_error(h($Ac->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$ri=false){$H=parent::query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$ec=array();class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($Q,$L,$Z,$md,$rf=array(),$z=1,$E=0,$cg=false){global$b,$x;$Sd=(count($md)<count($L));$G=$b->selectQueryBuild($L,$Z,$md,$rf,$z,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$md&&$Sd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($md&&$Sd?"\nGROUP BY ".implode(", ",$md):"").($rf?"\nORDER BY ".implode(", ",$rf):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$sh=microtime(true);$I=$this->_conn->query($G);if($cg)echo$b->selectQuery($G,format_time($sh));return$I;}function
delete($Q,$ng,$z=0){$G="FROM ".table($Q);return
queries("DELETE".($z?limit1($G,$ng):" $G$ng"));}function
update($Q,$N,$ng,$z=0,$Zg="\n"){$Ii=array();foreach($N
as$y=>$X)$Ii[]="$y = $X";$G=table($Q)." SET$Zg".implode(",$Zg",$Ii);return
queries("UPDATE".($z?limit1($G,$ng):" $G$ng"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$K,$ag){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$ec["sqlite"]="SQLite 3";$ec["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Xf=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Tc){$this->_link=new
SQLite3($Tc);$Li=$this->_link->version();$this->server_info=$Li["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$d=$this->_offset++;$T=$this->_result->columnType($d);return(object)array("name"=>$this->_result->columnName($d),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Tc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Tc);}function
query($G,$ri=false){$Ke=($ri?"unbufferedQuery":"query");$H=@$this->_link->$Ke($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$y=>$X)$I[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$Qf='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Qf\\.)?$Qf\$~",$C,$B)){$Q=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Tc){$this->dsn(DRIVER.":$Tc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($Tc){if(is_readable($Tc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Tc)?$Tc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Tc")." AS a")){parent::__construct($Tc);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ag){$Ii=array();foreach($K
as$N)$Ii[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Ii));}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$D=0,$Zg=" "){return" $G$Z".($z!==null?$Zg."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($G,$Z){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1):" $G$Z");}function
db_collation($m,$qb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($l){return
array();}function
table_status($C=""){global$g;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){$J["Oid"]=1;$J["Auto_increment"]="";$J["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($C!=""?$I[$C]:$I);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$g;$I=array();$ag="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$J){$C=$J["name"];$T=strtolower($J["type"]);$Sb=$J["dflt_value"];$I[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Sb,$B)?str_replace("''","'",$B[1]):($Sb=="NULL"?null:$Sb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($ag!="")$I[$ag]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$I[$C]["auto_increment"]=true;$ag=$C;}}$ph=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$ph,$xe,PREG_SET_ORDER);foreach($xe
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($I[$C])$I[$C]["collation"]=trim($B[3],"'");}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$ph=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$ph,$B)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$xe,PREG_SET_ORDER);foreach($xe
as$B){$I[""]["columns"][]=idf_unescape($B[2]).$B[4];$I[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$I){foreach(fields($Q)as$C=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$rh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$h);foreach(get_rows("PRAGMA index_list(".table($Q).")",$h)as$J){$C=$J["name"];$v=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$h)as$Og){$v["columns"][]=$Og["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$rh[$C],$zg)){preg_match_all('/("[^"]*+")+( DESC)?/',$zg[2],$xe);foreach($xe[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$I[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$I[""]["columns"]||$v["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$C))$I[$C]=$v;}return$I;}function
foreign_keys($Q){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$J){$q=&$I[$J["id"]];if(!$q)$q=$J;$q["source"][]=$J["from"];$q["target"][]=$J["to"];}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($C){global$g;$Kc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Kc)\$~",$C)){$g->error=lang(21,str_replace("|",", ",$Kc));return
false;}return
true;}function
create_database($m,$pb){global$g;if(file_exists($m)){$g->error=lang(22);return
false;}if(!check_sqlite_name($m))return
false;try{$_=new
Min_SQLite($m);}catch(Exception$Ac){$g->error=$Ac->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$g;$g->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$g->error=lang(22);return
false;}}return
true;}function
rename_database($C,$pb){global$g;if(!check_sqlite_name($C))return
false;$g->__construct(":memory:");$g->error=lang(22);return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){$Ci=($Q==""||$ad);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ci=true;break;}}$c=array();$_f=array();foreach($p
as$o){if($o[1]){$c[]=($Ci?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$_f[$o[0]]=$o[1][0];}}if(!$Ci){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$C&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($Q,$C,$c,$_f,$ad))return
false;if($Ma)queries("UPDATE sqlite_sequence SET seq = $Ma WHERE name = ".q($C));return
true;}function
recreate_table($Q,$C,$p,$_f,$ad,$w=array()){if($Q!=""){if(!$p){foreach(fields($Q)as$y=>$o){$p[]=process_field($o,$o);$_f[$y]=idf_escape($y);}}$bg=false;foreach($p
as$o){if($o[6])$bg=true;}$hc=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$hc[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$be=>$v){$e=array();foreach($v["columns"]as$y=>$d){if(!$_f[$d])continue
2;$e[]=$_f[$d].($v["descs"][$y]?" DESC":"");}if(!$hc[$be]){if($v["type"]!="PRIMARY"||!$bg)$w[]=array($v["type"],$be,$e);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$ad[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$be=>$q){foreach($q["source"]as$y=>$d){if(!$_f[$d])continue
2;$q["source"][$y]=idf_unescape($_f[$d]);}if(!isset($ad[" $be"]))$ad[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($ad));if(!queries("CREATE TABLE ".table($Q!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($_f&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$_f).") SELECT ".implode(", ",array_map('idf_escape',array_keys($_f)))." FROM ".table($Q)))return
false;$oi=array();foreach(triggers($Q)as$mi=>$Uh){$li=trigger($mi);$oi[]="CREATE TRIGGER ".idf_escape($mi)." ".implode(" ",$Uh)." ON ".table($C)."\n$li[Statement]";}if(!queries("DROP TABLE ".table($Q)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$w))return
false;foreach($oi
as$li){if(!queries($li))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$C,$e){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($Q."_"))." ON ".table($Q)." $e";}function
alter_indexes($Q,$c){foreach($c
as$ag){if($ag[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Ni){return
apply_queries("DROP VIEW",$Ni);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Ni,$Lh){return
false;}function
trigger($C){global$g;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$ni=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$ni["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$af=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($af?" OF":""),"Of"=>($af[0]=='`'||$af[0]=='"'?idf_unescape($af):$af),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($Q){$I=array();$ni=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$J){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$ni["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$J["sql"],$B);$I[$J["name"]]=array($B[1],$B[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$T){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Sg){return
true;}function
create_sql($Q,$Ma,$xh){global$g;$I=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$C=>$v){if($C=='')continue;$I.=";\n\n".index_sql($Q,$v['type'],$C,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$I;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($k){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$g;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$I[$y]=$g->result("PRAGMA $y");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$of){list($y,$X)=explode("=",$of,2);$I[$y]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Oc);}$x="sqlite";$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$wh=array_keys($U);$xi=array();$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$jd=array("hex","length","lower","round","unixepoch","upper");$od=array("avg","count","count distinct","group_concat","max","min","sum");$mc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$ec["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Xf=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($xc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$F){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Li=pg_version($this->_link);$this->server_info=$Li["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$ri=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$d);$I->name=pg_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$d);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($M,$V,$F){global$b;$m=$b->database();$P="pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$P dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ag){global$g;foreach($K
as$N){$yi=array();$Z=array();foreach($N
as$y=>$X){$yi[]="$y = $X";if(isset($ag[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$yi)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$wh;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2])){if($g->server_info>=9){$g->query("SET application_name = 'Adminer'");if($g->server_info>=9.2){$wh[lang(23)][]="json";$U["json"]=4294967295;if($g->server_info>=9.4){$wh[lang(23)][]="jsonb";$U["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$D=0,$Zg=" "){return" $G$Z".($z!==null?$Zg."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($G,$Z){return" $G$Z";}function
db_collation($m,$qb){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($l){return
array();}function
table_status($C=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", c.relhasoids::int AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($C!=""?$I[$C]:$I);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Da=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$B);list(,$T,$pe,$J["length"],$xa,$Ga)=$B;$J["length"].=$Ga;$eb=$T.$xa;if(isset($Da[$eb])){$J["type"]=$Da[$eb];$J["full_type"]=$J["type"].$pe.$Ga;}else{$J["type"]=$T;$J["full_type"]=$J["type"].$pe.$xa.$Ga;}$J["null"]=!$J["attnotnull"];$J["auto_increment"]=preg_match('~^nextval\\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$B))$J["default"]=($B[1]=="NULL"?null:(($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$Eh=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$e=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Eh AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Eh AND ci.oid = i.indexrelid",$h)as$J){$_g=$J["relname"];$I[$_g]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$_g]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Hd)$I[$_g]["columns"][]=$e[$Hd];$I[$_g]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Id)$I[$_g]["descs"][]=($Id&1?'1':null);$I[$_g]["lengths"]=array();}return$I;}function
foreign_keys($Q){global$hf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$B)){$J['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$we)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$we[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$we[4]));}$J['target']=array_map('trim',explode(',',$B[3]));$J['on_delete']=(preg_match("~ON DELETE ($hf)~",$B[4],$we)?$we[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($hf)~",$B[4],$we)?$we[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
view($C){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".q($C).")")));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$g;$I=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$I,$B))$I=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($I);}function
create_database($m,$pb){return
queries("CREATE DATABASE ".idf_escape($m).($pb?" ENCODING ".idf_escape($pb):""));}function
drop_databases($l){global$g;$g->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($C,$pb){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){$c=array();$mg=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $d";else{$Hi=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($d!=$X[0])$mg[]="ALTER TABLE ".table($Q)." RENAME $d TO $X[0]";$c[]="ALTER $d TYPE$X[1]";if(!$X[6]){$c[]="ALTER $d ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $d ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Hi!="")$mg[]="COMMENT ON COLUMN ".table($Q).".$X[0] IS ".($Hi!=""?substr($Hi,9):"''");}}$c=array_merge($c,$ad);if($Q=="")array_unshift($mg,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($mg,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""&&$Q!=$C)$mg[]="ALTER TABLE ".table($Q)." RENAME TO ".table($C);if($Q!=""||$vb!="")$mg[]="COMMENT ON TABLE ".table($C)." IS ".q($vb);if($Ma!=""){}foreach($mg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($Q,$c){$i=array();$fc=array();$mg=array();foreach($c
as$X){if($X[0]!="INDEX")$i[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$fc[]=idf_escape($X[1]);else$mg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($i)array_unshift($mg,"ALTER TABLE ".table($Q).implode(",",$i));if($fc)array_unshift($mg,"DROP INDEX ".implode(", ",$fc));foreach($mg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Ni){return
drop_tables($Ni);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Ni,$Lh){foreach(array_merge($S,$Ni)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($Lh)))return
false;}return
true;}function
trigger($C,$Q=null){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($Q===null)$Q=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($Q).' AND t.trigger_name = '.q($C));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($Q))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routines(){return
get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');}function
routine_languages(){return
get_vals("SELECT langname FROM pg_catalog.pg_language");}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($R,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$zg))return$zg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Rg){global$g,$U,$wh;$I=$g->query("SET search_path TO ".idf_escape($Rg));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$wh[lang(24)][]=$T;}}return$I;}function
create_sql($Q,$Ma,$xh){global$g;$I='';$Hg=array();$bh=array();$O=table_status($Q);$p=fields($Q);$w=indexes($Q);ksort($w);$Yc=foreign_keys($Q);ksort($Yc);if(!$O||empty($p))return
false;$I="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$Qc=>$o){$Hf=idf_escape($o['field']).' '.$o['full_type'].(is_null($o['default'])?"":" DEFAULT $o[default]").($o['attnotnull']?" NOT NULL":"");$Hg[]=$Hf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$xe)){$ah=$xe[1];$oh=reset(get_rows("SELECT * FROM $ah"));$bh[]=($xh=="DROP+CREATE"?"DROP SEQUENCE $ah;\n":"")."CREATE SEQUENCE $ah INCREMENT $oh[increment_by] MINVALUE $oh[min_value] MAXVALUE $oh[max_value] START ".($Ma?$oh['last_value']:1)." CACHE $oh[cache_value];";}}if(!empty($bh))$I=implode("\n\n",$bh)."\n\n$I";foreach($w
as$Cd=>$v){switch($v['type']){case'UNIQUE':$Hg[]="CONSTRAINT ".idf_escape($Cd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Hg[]="CONSTRAINT ".idf_escape($Cd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($Yc
as$Xc=>$Wc)$Hg[]="CONSTRAINT ".idf_escape($Xc)." $Wc[definition] ".($Wc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$I.=implode(",\n    ",$Hg)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$Cd=>$v){if($v['type']=='INDEX')$I.="\n\nCREATE INDEX ".idf_escape($Cd)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',array_map('idf_escape',$v['columns'])).");";}if($O['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$Qc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($Qc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
trigger_sql($Q){$O=table_status($Q);$I="";foreach(triggers($Q)as$ki=>$ji){$li=trigger($ki,$O['Name']);$I.="\nCREATE TRIGGER ".idf_escape($li['Trigger'])." $li[Timing] $li[Events] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $li[Type] $li[Statement];;\n";}return$I;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$g;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($g->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){global$g;return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.($g->server_info>=9.3?'materializedview|':'').'scheme|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}$x="pgsql";$U=array();$wh=array();foreach(array(lang(25)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(26)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(23)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$wh[$y]=array_keys($X);}$xi=array();$mf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$jd=array("char_length","lower","round","to_hex","to_timestamp","upper");$od=array("avg","count","count distinct","max","min","sum");$mc=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$ec["oracle"]="Oracle";if(isset($_GET["oracle"])){$Xf=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($xc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$F){$this->_link=@oci_new_connect($V,$F,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($k){return
true;}function
query($G,$ri=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'OCI-Lob'))$J[$y]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$d);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($M,$V,$F){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$F);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$z,$D=0,$Zg=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$D):" $G$Z"));}function
limit1($G,$Z){return" $G$Z";}function
db_collation($m,$qb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($C=""){$I=array();$Tg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $Tg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $Tg":"")."
ORDER BY 1")as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)." ORDER BY column_id")as$J){$T=$J["DATA_TYPE"];$pe="$J[DATA_PRECISION],$J[DATA_SCALE]";if($pe==",")$pe=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$T.($pe?"($pe)":""),"type"=>strtolower($T),"length"=>$pe,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($Q)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$J){$Cd=$J["INDEX_NAME"];$I[$Cd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Cd]["columns"][]=$J["COLUMN_NAME"];$I[$Cd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Cd]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
view($C){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($K);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){$c=$fc=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$fc[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$fc||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$fc).")"))&&($Q==$C||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)));}function
foreign_keys($Q){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Ni){return
apply_queries("DROP VIEW",$Ni);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Sg){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Sg));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Oc);}$x="oracle";$U=array();$wh=array();foreach(array(lang(25)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(26)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(23)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$wh[$y]=array_keys($X);}$xi=array();$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$jd=array("length","lower","round","upper");$od=array("avg","count","count distinct","max","min","sum");$mc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$ec["mssql"]="MS SQL";if(isset($_GET["mssql"])){$Xf=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$F){$this->_link=@sqlsrv_connect($M,array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8"));if($this->_link){$Jd=sqlsrv_server_info($this->_link);$this->server_info=$Jd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($G,$ri=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'DateTime'))$J[$y]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($D){for($s=0;$s<$D;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$F){$this->_link=@mssql_connect($M,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($G,$ri=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$M)),$V,$F);return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ag){foreach($K
as$N){$yi=array();$Z=array();foreach($N
as$y=>$X){$yi[]="$y = $X";if(isset($ag[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$yi)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$D=0,$Zg=" "){return($z!==null?" TOP (".($z+$D).")":"")." $G$Z";}function
limit1($G,$Z){return
limit($G,$Z,1);}function
db_collation($m,$qb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($m));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$g;$I=array();foreach($l
as$m){$g->select_db($m);$I[$m]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($C=""){$I=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$J){$T=$J["type"];$pe=(preg_match("~char|binary~",$T)?$J["max_length"]:($T=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$T.($pe?"($pe)":""),"type"=>$T,"length"=>$pe,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$h)as$J){$C=$J["name"];$I[$C]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$C]["lengths"]=array();$I[$C]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$C]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$pb)$I[preg_replace('~_.*~','',$pb)][]=$pb;return$I;}function
information_schema($m){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));}function
create_database($m,$pb){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$pb)?" COLLATE $pb":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($C,$pb){if(preg_match('~^[a-z0-9_]+$~i',$pb))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $pb");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){$c=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $d";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($ad[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($d!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$d").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$C)queries("EXEC sp_rename ".q(table($Q)).", ".q($C));if($ad)$c[""]=$ad;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($Q,$c){$v=array();$fc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$fc[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$fc||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$fc)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$I=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($R,$Z){}function
foreign_keys($Q){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$J){$q=&$I[$J["FK_NAME"]];$q["table"]=$J["PKTABLE_NAME"];$q["source"][]=$J["FKCOLUMN_NAME"];$q["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Ni){return
queries("DROP VIEW ".implode(", ",array_map('table',$Ni)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Ni,$Lh){return
apply_queries("ALTER SCHEMA ".idf_escape($Lh)." TRANSFER",array_merge($S,$Ni));}function
trigger($C){if($C=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$I["text"]);return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Rg){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Oc);}$x="mssql";$U=array();$wh=array();foreach(array(lang(25)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(26)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(23)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$wh[$y]=array_keys($X);}$xi=array();$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$jd=array("len","lower","round","upper");$od=array("avg","count","count distinct","max","min","sum");$mc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$ec['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Xf=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$F){$this->_link=ibase_connect($M,$V,$F);if($this->_link){$Ai=explode(':',$M);$this->service_link=ibase_service_attach($Ai[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($k){return($k=="domain");}function
query($G,$ri=false){$H=ibase_query($G,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2]))return$g;return$g->error;}function
get_databases($Zc){return
array("domain");}function
limit($G,$Z,$z,$D=0,$Zg=" "){$I='';$I.=($z!==null?$Zg."FIRST $z".($D?" SKIP $D":""):"");$I.=" $G$Z";return$I;}function
limit1($G,$Z){return
limit($G,$Z,1);}function
db_collation($m,$qb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$g;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($g->_link,$G);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($l){return
array();}function
table_status($C="",$Nc=false){global$g;$I=array();$Lb=tables_list();foreach($Lb
as$v=>$X){$v=trim($v);$I[$v]=array('Name'=>$v,'Engine'=>'standard',);if($C==$v)return$I[$v];}return$I;}function
is_view($R){return
false;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"]);}function
fields($Q){global$g;$I=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($Q).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($g->_link,$G);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($Q,$h=null){$I=array();return$I;}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Rg){return
true;}function
support($Oc){return
preg_match("~^(columns|sql|status|table)$~",$Oc);}$x="firebird";$mf=array("=");$jd=array();$od=array();$mc=array();}$ec["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Xf=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($G,$ri=false){$Ef=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$Ef['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$Ef,$this->timeout);if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$_h=0;foreach($H
as$Wd)$_h+=$Wd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$_h,))));}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$Wd){$J=array();if($Wd->Name!='')$J['itemName()']=(string)$Wd->Name;foreach($Wd->Attribute
as$Ja){$C=$this->_processValue($Ja->Name);$Y=$this->_processValue($Ja->Value);if(isset($J[$C])){$J[$C]=(array)$J[$C];$J[$C][]=$Y;}else$J[$C]=$Y;}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($pc){return(is_object($pc)&&$pc['encoding']=='base64'?base64_decode($pc):(string)$pc);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$ce=array_keys($this->_rows[0]);return(object)array('name'=>$ce[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$ag="itemName()";function
_chunkRequest($_d,$wa,$Ef,$Ec=array()){global$g;foreach(array_chunk($_d,25)as$ib){$Ff=$Ef;foreach($ib
as$s=>$t){$Ff["Item.$s.ItemName"]=$t;foreach($Ec
as$y=>$X)$Ff["Item.$s.$y"]=$X;}if(!sdb_request($wa,$Ff))return
false;}$g->affected_rows=count($_d);return
true;}function
_extractIds($Q,$ng,$z){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$ng,$xe))$I=array_map('idf_unescape',$xe[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$ng.($z?" LIMIT 1":"")))as$Wd)$I[]=$Wd->Name;}return$I;}function
select($Q,$L,$Z,$md,$rf=array(),$z=1,$E=0,$cg=false){global$g;$g->next=$_GET["next"];$I=parent::select($Q,$L,$Z,$md,$rf,$z,$E,$cg);$g->next=0;return$I;}function
delete($Q,$ng,$z=0){return$this->_chunkRequest($this->_extractIds($Q,$ng,$z),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$N,$ng,$z=0,$Zg="\n"){$Tb=array();$Nd=array();$s=0;$_d=$this->_extractIds($Q,$ng,$z);$t=idf_unescape($N["`itemName()`"]);unset($N["`itemName()`"]);foreach($N
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$_d))$Tb["Attribute.".count($Tb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$Yd=>$W){$Nd["Attribute.$s.Name"]=$y;$Nd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Yd)$Nd["Attribute.$s.Replace"]="true";$s++;}}}$Ef=array('DomainName'=>$Q);return(!$Nd||$this->_chunkRequest(($t!=""?array($t):$_d),'BatchPutAttributes',$Ef,$Nd))&&(!$Tb||$this->_chunkRequest($_d,'BatchDeleteAttributes',$Ef,$Tb));}function
insert($Q,$N){$Ef=array("DomainName"=>$Q);$s=0;foreach($N
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$Ef["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$Ef["Attribute.$s.Name"]=$C;$Ef["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$Ef);}function
insertUpdate($Q,$K,$ag){foreach($K
as$N){if(!$this->update($Q,$N,"WHERE `itemName()` = ".q($N["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($Oc){return
preg_match('~sql~',$Oc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$qb){}function
tables_list(){global$g;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$Q)$I[(string)$Q]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(($C!=""?array($C=>true):tables_list())as$Q=>$T){$J=array("Name"=>$Q,"Auto_increment"=>"");if(!$Nc){$Je=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($Je){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$J[$y]=(string)$Je->$X;}}if($C!="")return$J;$I[$Q]=$J;}return$I;}function
explain($g,$G){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($Q){return
fields_from_edit();}function
foreign_keys($Q){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($G,$Z,$z,$D=0,$Zg=" "){return" $G$Z".($z!==null?$Zg."LIMIT $z":"");}function
unconvert_field($o,$I){return$I;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($Ca,$Lb,$y,$rg=false){$Va=64;if(strlen($y)>$Va)$y=pack("H*",$Ca($y));$y=str_pad($y,$Va,"\0");$Zd=$y^str_repeat("\x36",$Va);$ae=$y^str_repeat("\x5C",$Va);$I=$Ca($ae.pack("H*",$Ca($Zd.$Lb)));if($rg)$I=pack("H*",$I);return$I;}function
sdb_request($wa,$Ef=array()){global$b,$g;list($xd,$Ef['AWSAccessKeyId'],$Ug)=$b->credentials();$Ef['Action']=$wa;$Ef['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$Ef['Version']='2009-04-15';$Ef['SignatureVersion']=2;$Ef['SignatureMethod']='HmacSHA1';ksort($Ef);$G='';foreach($Ef
as$y=>$X)$G.='&'.rawurlencode($y).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$xd)."\n/\n$G",$Ug,true)));@ini_set('track_errors',1);$Sc=@file_get_contents((preg_match('~^https?://~',$xd)?$xd:"http://$xd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$Sc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$Yi=simplexml_load_string($Sc);if(!$Yi){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($Yi->Errors){$n=$Yi->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$Kh=$wa."Result";return($Yi->$Kh?$Yi->$Kh:true);}function
sdb_request_all($wa,$Kh,$Ef=array(),$Th=0){$I=array();$sh=($Th?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$Ef['SelectExpression'],$B)?$B[1]:0);do{$Yi=sdb_request($wa,$Ef);if(!$Yi)break;foreach($Yi->$Kh
as$pc)$I[]=$pc;if($z&&count($I)>=$z){$_GET["next"]=$Yi->NextToken;break;}if($Th&&microtime(true)-$sh>$Th)return
false;$Ef['NextToken']=$Yi->NextToken;if($z)$Ef['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($I),$Ef['SelectExpression']);}while($Yi->NextToken);return$I;}$x="simpledb";$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$jd=array();$od=array("count");$mc=array(array("json"));}$ec["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$Xf=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($M,$V,$F){global$b;$m=$b->database();$pf=array();if($V!=""){$pf["username"]=$V;$pf["password"]=$F;}if($m!="")$pf["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$M",$pf);return
true;}catch(Exception$Ac){$this->error=$Ac->getMessage();return
false;}}function
query($G){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$Ac){$this->error=$Ac->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Wd){$J=array();foreach($Wd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$ce=array_keys($this->_rows[0]);$C=$ce[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$ag="_id";function
select($Q,$L,$Z,$md,$rf=array(),$z=1,$E=0,$cg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$kh=array();foreach($rf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Eb);$kh[$X]=($Eb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$L)->sort($kh)->limit($z!=""?+$z:0)->skip($E*$z));}function
insert($Q,$N){try{$I=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$N['_id'];return!$I['err'];}catch(Exception$Ac){$this->_conn->error=$Ac->getMessage();return
false;}}}function
get_databases($Zc){global$g;$I=array();$Qb=$g->_link->listDBs();foreach($Qb['databases']as$m)$I[]=$m['name'];return$I;}function
count_tables($l){global$g;$I=array();foreach($l
as$m)$I[$m]=count($g->_link->selectDB($m)->getCollectionNames(true));return$I;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($l){global$g;foreach($l
as$m){$Dg=$g->_link->selectDB($m)->drop();if(!$Dg['ok'])return
false;}return
true;}function
indexes($Q,$h=null){global$g;$I=array();foreach($g->_db->selectCollection($Q)->getIndexInfo()as$v){$Wb=array();foreach($v["key"]as$d=>$T)$Wb[]=($T==-1?'1':null);$I[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$mf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$error,$last_id;var$_link;var$_db,$_db_name;function
connect($M,$V,$F){global$b;$m=$b->database();$pf=array();if($V!=""){$pf["username"]=$V;$pf["password"]=$F;}if($m!="")$pf["db"]=$m;try{$kb='MongoDB\Driver\Manager';$this->_link=new$kb("mongodb://$M",$pf);return
true;}catch(Exception$Ac){$this->error=$Ac->getMessage();return
false;}}function
query($G){return
false;}function
select_db($k){try{$this->_db_name=$k;return
true;}catch(Exception$Ac){$this->error=$Ac->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Wd){$J=array();foreach($Wd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$ce=array_keys($this->_rows[0]);$C=$ce[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$ag="_id";function
select($Q,$L,$Z,$md,$rf=array(),$z=1,$E=0,$cg=false){global$g;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$kh=array();foreach($rf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Eb);$kh[$X]=($Eb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$ih=$E*$z;$kb='MongoDB\Driver\Query';$G=new$kb($Z,array('projection'=>$L,'limit'=>$z,'skip'=>$ih,'sort'=>$kh));$Gg=$g->_link->executeQuery("$g->_db_name.$Q",$G);return
new
Min_Result($Gg);}function
update($Q,$N,$ng,$z=0,$Zg="\n"){global$g;$m=$g->_db_name;$Z=sql_query_where_parser($ng);$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());if(isset($N['_id']))unset($N['_id']);$Ag=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$Ag[$y]=1;unset($N[$y]);}}$yi=array('$set'=>$N);if(count($Ag))$yi['$unset']=$Ag;$Za->update($Z,$yi,array('upsert'=>false));$Gg=$g->_link->executeBulkWrite("$m.$Q",$Za);$g->affected_rows=$Gg->getModifiedCount();return
true;}function
delete($Q,$ng,$z=0){global$g;$m=$g->_db_name;$Z=sql_query_where_parser($ng);$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());$Za->delete($Z,array('limit'=>$z));$Gg=$g->_link->executeBulkWrite("$m.$Q",$Za);$g->affected_rows=$Gg->getDeletedCount();return
true;}function
insert($Q,$N){global$g;$m=$g->_db_name;$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());if(isset($N['_id'])&&empty($N['_id']))unset($N['_id']);$Za->insert($N);$Gg=$g->_link->executeBulkWrite("$m.$Q",$Za);$g->affected_rows=$Gg->getInsertedCount();return
true;}}function
get_databases($Zc){global$g;$I=array();$kb='MongoDB\Driver\Command';$tb=new$kb(array('listDatabases'=>1));$Gg=$g->_link->executeCommand('admin',$tb);foreach($Gg
as$Qb){foreach($Qb->databases
as$m)$I[]=$m->name;}return$I;}function
count_tables($l){$I=array();return$I;}function
tables_list(){global$g;$kb='MongoDB\Driver\Command';$tb=new$kb(array('listCollections'=>1));$Gg=$g->_link->executeCommand($g->_db_name,$tb);$rb=array();foreach($Gg
as$H)$rb[$H->name]='table';return$rb;}function
drop_databases($l){return
false;}function
indexes($Q,$h=null){global$g;$I=array();$kb='MongoDB\Driver\Command';$tb=new$kb(array('listIndexes'=>$Q));$Gg=$g->_link->executeCommand($g->_db_name,$tb);foreach($Gg
as$v){$Wb=array();$e=array();foreach(get_object_vars($v->key)as$d=>$T){$Wb[]=($T==-1?'1':null);$e[]=$d;}$I[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$e,"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($Q){$p=fields_from_edit();if(!count($p)){global$dc;$H=$dc->select($Q,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$y=>$X){$J[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$dc->primary),"auto_increment"=>($y==$dc->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($R,$Z){global$g;$Z=where_to_query($Z);$kb='MongoDB\Driver\Command';$tb=new$kb(array('count'=>$R['Name'],'query'=>$Z));$Gg=$g->_link->executeCommand($g->_db_name,$tb);$bi=$Gg->toArray();return$bi[0]->n;}function
sql_query_where_parser($ng){$ng=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$ng));$ng=preg_replace('/\)\)\)$/',')',$ng);$Vi=explode(' AND ',$ng);$Wi=explode(') OR (',$ng);$Z=array();foreach($Vi
as$Ti)$Z[]=trim($Ti);if(count($Wi)==1)$Wi=array();elseif(count($Wi)>1)$Z=array();return
where_to_query($Z,$Wi);}function
where_to_query($Ri=array(),$Si=array()){global$mf;$Lb=array();foreach(array('and'=>$Ri,'or'=>$Si)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Hc){list($nb,$kf,$X)=explode(" ",$Hc,3);if($nb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$kb='MongoDB\BSON\ObjectID';$X=new$kb($X);}if(!in_array($kf,$mf))continue;if(preg_match('~^\(f\)(.+)~',$kf,$B)){$X=(float)$X;$kf=$B[1];}elseif(preg_match('~^\(date\)(.+)~',$kf,$B)){$Nb=new
DateTime($X);$kb='MongoDB\BSON\UTCDatetime';$X=new$kb($Nb->getTimestamp()*1000);$kf=$B[1];}switch($kf){case'=':$kf='$eq';break;case'!=':$kf='$ne';break;case'>':$kf='$gt';break;case'<':$kf='$lt';break;case'>=':$kf='$gte';break;case'<=':$kf='$lte';break;case'regex':$kf='$regex';break;default:continue;}if($T=='and')$Lb['$and'][]=array($nb=>array($kf=>$X));elseif($T=='or')$Lb['$or'][]=array($nb=>array($kf=>$X));}}}return$Lb;}$mf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($C="",$Nc=false){$I=array();foreach(tables_list()as$Q=>$T){$I[$Q]=array("Name"=>$Q);if($C==$Q)return$I[$Q];}return$I;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
connect(){global$b;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2]))return$g;return$g->error;}function
alter_indexes($Q,$c){global$g;foreach($c
as$X){list($T,$C,$N)=$X;if($N=="DROP")$I=$g->_db->command(array("deleteIndexes"=>$Q,"index"=>$C));else{$e=array();foreach($N
as$d){$d=preg_replace('~ DESC$~','',$d,1,$Eb);$e[$d]=($Eb?-1:1);}$I=$g->_db->selectCollection($Q)->ensureIndex($e,array("unique"=>($T=="UNIQUE"),"name"=>$C,));}if($I['errmsg']){$g->error=$I['errmsg'];return
false;}}return
true;}function
support($Oc){return
preg_match("~database|indexes~",$Oc);}function
db_collation($m,$qb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){global$g;if($Q==""){$g->_db->createCollection($C);return
true;}}function
drop_tables($S){global$g;foreach($S
as$Q){$Dg=$g->_db->selectCollection($Q)->drop();if(!$Dg['ok'])return
false;}return
true;}function
truncate_tables($S){global$g;foreach($S
as$Q){$Dg=$g->_db->selectCollection($Q)->remove();if(!$Dg['ok'])return
false;}return
true;}$x="mongo";$jd=array();$od=array();$mc=array(array("json"));}$ec["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Xf=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Of,$_b=array(),$Ke='GET'){@ini_set('track_errors',1);$Sc=@file_get_contents("$this->_url/".ltrim($Of,'/'),false,stream_context_create(array('http'=>array('method'=>$Ke,'content'=>$_b===null?$_b:json_encode($_b),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Sc){$this->error=$php_errormsg;return$Sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Sc;return
false;}$I=json_decode($Sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$zb=get_defined_constants(true);foreach($zb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$I;}function
query($Of,$_b=array(),$Ke='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Of,'/'),$_b,$Ke);}function
connect($M,$V,$F){preg_match('~^(https?://)?(.*)~',$M,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$F@$B[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($k){$this->_db=$k;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($this->_rows);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$L,$Z,$md,$rf=array(),$z=1,$E=0,$cg=false){global$b;$Lb=array();$G="$Q/_search";if($L!=array("*"))$Lb["fields"]=$L;if($rf){$kh=array();foreach($rf
as$nb){$nb=preg_replace('~ DESC$~','',$nb,1,$Eb);$kh[]=($Eb?array($nb=>"desc"):$nb);}$Lb["sort"]=$kh;}if($z){$Lb["size"]=+$z;if($E)$Lb["from"]=($E*$z);}foreach($Z
as$X){list($nb,$kf,$X)=explode(" ",$X,3);if($nb=="_id")$Lb["query"]["ids"]["values"][]=$X;elseif($nb.$X!=""){$Oh=array("term"=>array(($nb!=""?$nb:"_all")=>$X));if($kf=="=")$Lb["query"]["filtered"]["filter"]["and"][]=$Oh;else$Lb["query"]["filtered"]["query"]["bool"]["must"][]=$Oh;}}if($Lb["query"]&&!$Lb["query"]["filtered"]["query"]&&!$Lb["query"]["ids"])$Lb["query"]["filtered"]["query"]=array("match_all"=>array());$sh=microtime(true);$Tg=$this->_conn->query($G,$Lb);if($cg)echo$b->selectQuery("$G: ".print_r($Lb,true),format_time($sh));if(!$Tg)return
false;$I=array();foreach($Tg['hits']['hits']as$wd){$J=array();if($L==array("*"))$J["_id"]=$wd["_id"];$p=$wd['_source'];if($L!=array("*")){$p=array();foreach($L
as$y)$p[$y]=$wd['fields'][$y];}foreach($p
as$y=>$X){if($Lb["fields"])$X=$X[0];$J[$y]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($T,$sg,$ng){$Mf=preg_split('~ *= *~',$ng);if(count($Mf)==2){$t=trim($Mf[1]);$G="$T/$t";return$this->_conn->query($G,$sg,'POST');}return
false;}function
insert($T,$sg){$t="";$G="$T/$t";$Dg=$this->_conn->query($G,$sg,'POST');$this->_conn->last_id=$Dg['_id'];return$Dg['created'];}function
delete($T,$ng){$_d=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$_d[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$db){$Mf=preg_split('~ *= *~',$db);if(count($Mf)==2)$_d[]=trim($Mf[1]);}}$this->_conn->affected_rows=0;foreach($_d
as$t){$G="{$T}/{$t}";$Dg=$this->_conn->query($G,'{}','DELETE');if(is_array($Dg)&&$Dg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2]))return$g;return$g->error;}function
support($Oc){return
preg_match("~database|table|columns~",$Oc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$g;$I=$g->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($m,$qb){}function
engines(){return
array();}function
count_tables($l){global$g;$I=array();$H=$g->query('_stats');if($H&&$H['indices']){$Gd=$H['indices'];foreach($Gd
as$Fd=>$th){$Ed=$th['total']['indexing'];$I[$Fd]=$Ed['index_total'];}}return$I;}function
tables_list(){global$g;$I=$g->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$g->_db]["mappings"]),'table');return$I;}function
table_status($C="",$Nc=false){global$g;$Tg=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($Tg){$S=$Tg["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$I[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($C!=""&&$C==$Q["key"])return$I[$C];}}return$I;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$g;$H=$g->query("$Q/_mapping");$I=array();if($H){$ve=$H[$Q]['properties'];if(!$ve)$ve=$H[$g->_db]['mappings'][$Q]['properties'];if($ve){foreach($ve
as$C=>$o){$I[$C]=array("field"=>$C,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$C]["privileges"]["insert"]);unset($I[$C]["privileges"]["update"]);}}}}return$I;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($m){global$g;return$g->rootQuery(urlencode($m),null,'PUT');}function
drop_databases($l){global$g;return$g->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){global$g;$ig=array();foreach($p
as$Lc){$Qc=trim($Lc[1][0]);$Rc=trim($Lc[1][1]?:"text");$ig[$Qc]=array('type'=>$Rc);}if(!empty($ig))$ig=array('properties'=>$ig);return$g->query("_mapping/{$C}",$ig,'PUT');}function
drop_tables($S){global$g;$I=true;foreach($S
as$Q)$I=$I&&$g->query(urlencode($Q),array(),'DELETE');return$I;}function
last_id(){global$g;return$g->last_id;}$x="elastic";$mf=array("=","query");$jd=array();$od=array();$mc=array(array("json"));$U=array();$wh=array();foreach(array(lang(25)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(26)=>array("date"=>10),lang(23)=>array("string"=>65535,"text"=>65535),lang(27)=>array("binary"=>255),)as$y=>$X){$U+=$X;$wh[$y]=array_keys($X);}}$ec=array("server"=>"MySQL")+$ec;if(!defined("DRIVER")){$Xf=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$F="",$k=null,$Tf=null,$jh=null){mysqli_report(MYSQLI_REPORT_OFF);list($xd,$Tf)=explode(":",$M,2);$I=@$this->real_connect(($M!=""?$xd:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$k,(is_numeric($Tf)?$Tf:ini_get("mysqli.default_port")),(!is_numeric($Tf)?$Tf:$jh));return$I;}function
set_charset($cb){if(parent::set_charset($cb))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $cb");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$F){$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($cb){if(function_exists('mysql_set_charset')){if(mysql_set_charset($cb,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $cb");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($G,$ri=false){$H=@($ri?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$F){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$M)),$V,$F);return
true;}function
set_charset($cb){$this->query("SET NAMES $cb");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($G,$ri=false){$this->setAttribute(1000,!$ri);return
parent::query($G,$ri);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$K,$ag){$e=array_keys(reset($K));$Yf="INSERT INTO ".table($Q)." (".implode(", ",$e).") VALUES\n";$Ii=array();foreach($e
as$y)$Ii[$y]="$y = VALUES($y)";$zh="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ii);$Ii=array();$pe=0;foreach($K
as$N){$Y="(".implode(", ",$N).")";if($Ii&&(strlen($Yf)+$pe+strlen($Y)+strlen($zh)>1e6)){if(!queries($Yf.implode(",\n",$Ii).$zh))return
false;$Ii=array();$pe=0;}$Ii[]=$Y;$pe+=strlen($Y)+2;}return
queries($Yf.implode(",\n",$Ii).$zh);}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$wh;$g=new
Min_DB;$j=$b->credentials();if($g->connect($j[0],$j[1],$j[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(version_compare($g->server_info,'5.7.8')>=0){$wh[lang(23)][]="json";$U["json"]=4294967295;}return$g;}$I=$g->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($Pg=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$Pg;return$I;}function
get_databases($Zc){global$g;$I=get_session("dbs");if($I===null){$G=($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$I=($Zc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$z,$D=0,$Zg=" "){return" $G$Z".($z!==null?$Zg."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($G,$Z){return
limit($G,$Z,1);}function
db_collation($m,$qb){global$g;$I=null;$i=$g->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$i,$B))$I=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$i,$B))$I=$qb[$B[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals($g->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$I=array();foreach($l
as$m)$I[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$I;}function
table_status($C="",$Nc=false){global$g;$I=array();foreach(get_rows($Nc&&$g->server_info>=5?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){global$g;return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&version_compare($g->server_info,'5.6')>=0);}function
fields($Q){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$J){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$J["Type"],$B);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$B[1])?$J["Default"]:null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$B)?$B[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$h)as$J){$C=$J["Key_name"];$I[$C]["type"]=($C=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$C]["columns"][]=$J["Column_name"];$I[$C]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$C]["descs"][]=null;}return$I;}function
foreign_keys($Q){global$g,$hf;static$Qf='`(?:[^`]|``)+`';$I=array();$Fb=$g->result("SHOW CREATE TABLE ".table($Q),1);if($Fb){preg_match_all("~CONSTRAINT ($Qf) FOREIGN KEY ?\\(((?:$Qf,? ?)+)\\) REFERENCES ($Qf)(?:\\.($Qf))? \\(((?:$Qf,? ?)+)\\)(?: ON DELETE ($hf))?(?: ON UPDATE ($hf))?~",$Fb,$xe,PREG_SET_ORDER);foreach($xe
as$B){preg_match_all("~$Qf~",$B[2],$lh);preg_match_all("~$Qf~",$B[5],$Lh);$I[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$lh[0]),"target"=>array_map('idf_unescape',$Lh[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$y=>$X)asort($I[$y]);return$I;}function
information_schema($m){global$g;return($g->server_info>=5&&$m=="information_schema")||($g->server_info>=5.5&&$m=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($m,$pb){return
queries("CREATE DATABASE ".idf_escape($m).($pb?" COLLATE ".q($pb):""));}function
drop_databases($l){$I=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($C,$pb){$I=false;if(create_database($C,$pb)){$Bg=array();foreach(tables_list()as$Q=>$T)$Bg[]=table($Q)." TO ".idf_escape($C).".".table($Q);$I=(!$Bg||queries("RENAME TABLE ".implode(", ",$Bg)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Na=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Na="";break;}if($v["type"]=="PRIMARY")$Na=" UNIQUE";}}return" AUTO_INCREMENT$Na";}function
alter_table($Q,$C,$p,$ad,$vb,$uc,$pb,$Ma,$Kf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$ad);$O=($vb!==null?" COMMENT=".q($vb):"").($uc?" ENGINE=".q($uc):"").($pb?" COLLATE ".q($pb):"").($Ma!=""?" AUTO_INCREMENT=$Ma":"");if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$O$Kf");if($Q!=$C)$c[]="RENAME TO ".table($C);if($O)$c[]=ltrim($O);return($c||$Kf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Kf):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Ni){return
queries("DROP VIEW ".implode(", ",array_map('table',$Ni)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Ni,$Lh){$Bg=array();foreach(array_merge($S,$Ni)as$Q)$Bg[]=table($Q)." TO ".idf_escape($Lh).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$Bg));}function
copy_tables($S,$Ni,$Lh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$C=($Lh==DB?table("copy_$Q"):idf_escape($Lh).".".table($Q));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($Q))||!queries("INSERT INTO $C SELECT * FROM ".table($Q)))return
false;}foreach($Ni
as$Q){$C=($Lh==DB?table("copy_$Q"):idf_escape($Lh).".".table($Q));$Mi=view($Q);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Mi[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$T){global$g,$wc,$Ld,$U;$Da=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$mh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$qi="((".implode("|",array_merge(array_keys($U),$Da)).")\\b(?:\\s*\\(((?:[^'\")]|$wc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Qf="$mh*(".($T=="FUNCTION"?"":$Ld).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$qi";$i=$g->result("SHOW CREATE $T ".idf_escape($C),2);preg_match("~\\(((?:$Qf\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$qi\\s+":"")."(.*)~is",$i,$B);$p=array();preg_match_all("~$Qf\\s*,?~is",$B[1],$xe,PREG_SET_ORDER);foreach($xe
as$Df){$C=str_replace("``","`",$Df[2]).$Df[3];$p[]=array("field"=>$C,"type"=>strtolower($Df[5]),"length"=>preg_replace_callback("~$wc~s",'normalize_enum',$Df[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Df[8] $Df[7]"))),"null"=>1,"full_type"=>$Df[4],"inout"=>strtoupper($Df[1]),"collation"=>strtolower($Df[9]),);}if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".($g->server_info>=5.1?"PARTITIONS ":"").$G);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Rg){return
true;}function
create_sql($Q,$Ma,$xh){global$g;$I=$g->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ma)$I=preg_replace('~ AUTO_INCREMENT=\\d+~','',$I);return$I;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($Q){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){global$g;if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return($g->server_info>=8?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I="GeomFromText($I)";return$I;}function
support($Oc){global$g;return!preg_match("~scheme|sequence|type|view_trigger|materializedview".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|routine|trigger|view":""):"")."~",$Oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}$x="sql";$U=array();$wh=array();foreach(array(lang(25)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(26)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(23)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$wh[$y]=array_keys($X);}$xi=array("unsigned","zerofill","unsigned zerofill");$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$jd=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$od=array("avg","count","count distinct","group_concat","max","min","sum");$mc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.5.0";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($i=false){return
password_file($i);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){return
DB;}function
databases($Zc=true){return
get_databases($Zc);}function
schemas(){return
schemas();}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$Tc="adminer.css";if(file_exists($Tc))$I[]=$Tc;return$I;}function
loginForm(){global$ec;echo'<table cellspacing="0">
<tr><th>',lang(31),'<td>',html_select("auth[driver]",$ec,DRIVER)."\n",'<tr><th>',lang(32),'<td><input name="auth[server]" value="',h(SERVER),'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input type="password" name="auth[password]">
<tr><th>',lang(35),'<td><input name="auth[db]" value="',h($_GET["db"]),'" autocapitalize="off">
</table>
',script("focus(qs('#username'));"),"<p><input type='submit' value='".lang(36)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(37))."\n";}function
login($te,$F){global$x;if($x=="sqlite")return
lang(38,target_blank(),'<code>login()</code>');return
true;}function
tableName($Ch){return
h($Ch["Name"]);}function
fieldName($o,$rf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Ch,$N=""){echo'<p class="links">';$se=array("select"=>lang(39));if(support("table")||support("indexes"))$se["table"]=lang(40);if(support("table")){if(is_view($Ch))$se["view"]=lang(41);else$se["create"]=lang(42);}if($N!==null)$se["edit"]=lang(43);foreach($se
as$y=>$X)echo" <a href='".h(ME)."$y=".urlencode($Ch["Name"]).($y=="edit"?$N:"")."'".bold(isset($_GET[$y])).">$X</a>";echo"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Bh){return
array();}function
backwardKeysPrint($Pa,$J){}function
selectQuery($G,$Sh){global$x;return"<p><code class='jush-$x'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>($Sh)</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".lang(10)."</a>":"")."</p>";}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($K,$bd){return$K;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$zf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".lang(44,strlen($zf))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($_?"<a href='".h($_)."'".(is_url($_)?" rel='noreferrer'":"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".lang(45)."<td>".lang(46).(support("comment")?"<td>".lang(47):"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".lang(48)."</i>":""),(isset($o["default"])?" <span title='".lang(49)."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".nbsp($o["comment"]):""),"\n";}echo"</table>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$C=>$v){ksort($v["columns"]);$cg=array();foreach($v["columns"]as$y=>$X)$cg[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($C)."'><th>$v[type]<td>".implode(", ",$cg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$e){global$jd,$od;print_fieldset("select",lang(50),$L);$s=0;$L[""]=array();foreach($L
as$y=>$X){$X=$_GET["columns"][$y];$d=select_input(" name='columns[$s][col]'",$e,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($jd||$od?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array(lang(51)=>$jd,lang(52)=>$od)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($d)":$d)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$e,$w){print_fieldset("search",lang(53),$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$_GET["where"]=(array)$_GET["where"];reset($_GET["where"]);$bb="this.parentNode.firstChild.onchange();";for($s=0;$s<=count($_GET["where"]);$s++){list(,$X)=each($_GET["where"]);if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$e,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".lang(54).")"),html_select("where[$s][op]",$this->operators,$X["op"],$bb),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $bb }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($rf,$e,$w){print_fieldset("sort",lang(55),$rf);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$e,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),lang(56))."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$e,"","selectAddRow"),checkbox("desc[$s]",1,false,lang(56))."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(57)."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($Rh){if($Rh!==null){echo"<fieldset><legend>".lang(58)."</legend><div>","<input type='number' name='text_length' class='size' value='".h($Rh)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".lang(59)."</legend><div>","<input type='submit' value='".lang(50)."'>"," <span id='noindex' title='".lang(60)."'></span>","<script".nonce().">\n","var indexColumns = ";$e=array();foreach($w
as$v){$Kb=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Kb)$e[$Kb]=1;}$e[""]=1;foreach($e
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($rc,$e){}function
selectColumnsProcess($e,$w){global$jd,$od;$L=array();$md=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$jd)||in_array($X["fun"],$od)))){$L[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$od))$md[]=$L[$y];}}return
array($L,$md);}function
selectSearchProcess($p,$w){global$g,$x;$I=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$X){if($X["op"]=="")$X["op"]="LIKE %%";if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$xb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Bd=process_length($X["val"]);$xb.=" ".($Bd!=""?$Bd:"(NULL)");}elseif($X["op"]=="SQL")$xb=" $X[val]";elseif($X["op"]=="LIKE %%")$xb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$xb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif(!preg_match('~NULL$~',$X["op"]))$xb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=idf_escape($X["col"]).$xb;else{$sb=array();foreach($p
as$C=>$o){$Ud=preg_match('~char|text|enum|set~',$o["type"]);if((is_numeric($X["val"])||!preg_match('~(^|[^o])int|float|double|decimal|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||$Ud)){$C=idf_escape($C);$sb[]=($x=="sql"&&$Ud&&!preg_match("~^utf8~",$o["collation"])?"CONVERT($C USING ".charset($g).")":$C);}}$I[]=($sb?"(".implode("$xb OR ",$sb)."$xb)":"0");}}}return$I;}function
selectOrderProcess($p,$w){$I=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$bd){return
false;}function
selectQueryBuild($L,$Z,$md,$rf,$z,$E){return"";}function
messageQuery($G,$Sh){global$x;restart_session();$ud=&get_session("queries");if(!$ud[$_GET["db"]])$ud[$_GET["db"]]=array();$t="sql-".count($ud[$_GET["db"]]);if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n...";$ud[$_GET["db"]][]=array($G,time(),$Sh);return" <span class='time'>".@date("H:i:s")."</span>"." <a href='#$t' class='toggle'>".lang(61)."</a>"."<div id='$t' class='hidden'><pre><code class='jush-$x'>".shorten_utf8($G,1000).'</code></pre>'.($Sh?" <span class='time'>($Sh)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($ud[$_GET["db"]])-1)).'">'.lang(10).'</a>':'').'</div>';}function
editFunctions($o){global$mc;$I=($o["null"]?"NULL/":"");foreach($mc
as$y=>$jd){if(!$y||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($jd
as$Qf=>$X){if(!$Qf||preg_match("~$Qf~",$o["type"]))$I.="/$X";}if($y&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$I.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$I=lang(48);return
explode("/",$I);}function
editInput($Q,$o,$Ka,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ka value='-1' checked><i>".lang(8)."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ka value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ka,$o,$Y,0);return"";}function
editHint($Q,$o,$Y){return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$C=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$I="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$I=$r;elseif(preg_match('~^([+-]|\\|\\|)$~',$r))$I=idf_escape($C)." $r $I";elseif(preg_match('~^[+-] interval$~',$r))$I=idf_escape($C)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$I="$r(".idf_escape($C).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$I="$r($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>lang(62),'file'=>lang(63));if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable($Q,$xh,$Vd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($xh)dump_csv(array_keys(fields($Q)));}else{if($Vd==2){$p=array();foreach(fields($Q)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$i="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$i=create_sql($Q,$_POST["auto_increment"],$xh);set_utf8mb4($i);if($xh&&$i){if($xh=="DROP+CREATE"||$Vd==1)echo"DROP ".($Vd==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($Vd==1)$i=remove_definer($i);echo"$i;\n\n";}}}function
dumpData($Q,$xh,$G){global$g,$x;$ze=($x=="sqlite"?0:1048576);if($xh){if($_POST["format"]=="sql"){if($xh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$H=$g->query($G,1);if($H){$Nd="";$Ya="";$ce=array();$zh="";$Pc=($Q!=''?'fetch_assoc':'fetch_row');while($J=$H->$Pc()){if(!$ce){$Ii=array();foreach($J
as$X){$o=$H->fetch_field();$ce[]=$o->name;$y=idf_escape($o->name);$Ii[]="$y = VALUES($y)";}$zh=($xh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Ii):"").";\n";}if($_POST["format"]!="sql"){if($xh=="table"){dump_csv($ce);$xh="INSERT";}dump_csv($J);}else{if(!$Nd)$Nd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$ce)).") VALUES";foreach($J
as$y=>$X){$o=$p[$y];$J[$y]=($X!==null?unconvert_field($o,preg_match('~(^|[^o])int|float|double|decimal~',$o["type"])&&$X!=''?$X:q($X)):"NULL");}$Pg=($ze?"\n":" ")."(".implode(",\t",$J).")";if(!$Ya)$Ya=$Nd.$Pg;elseif(strlen($Ya)+4+strlen($Pg)+strlen($zh)<$ze)$Ya.=",$Pg";else{echo$Ya.$zh;$Ya=$Nd.$Pg;}}}if($Ya)echo$Ya.$zh;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($zd){return
friendly_url($zd!=""?$zd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($zd,$Ne=false){$Bf=$_POST["output"];$Ic=(preg_match('~sql~',$_POST["format"])?"sql":($Ne?"tar":"csv"));header("Content-Type: ".($Bf=="gz"?"application/x-gzip":($Ic=="tar"?"application/x-tar":($Ic=="sql"||$Bf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Bf=="gz")ob_start('ob_gzencode',1e6);return$Ic;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.lang(64)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(65):lang(66))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(67)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(68)."</a>\n":"");return
true;}function
navigation($Me){global$ia,$x,$ec,$g;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Me=="auth"){$Vc=true;foreach((array)$_SESSION["pwds"]as$Ki=>$dh){foreach($dh
as$M=>$Fi){foreach($Fi
as$V=>$F){if($F!==null){if($Vc){echo"<p id='logins'>".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Vc=false;}$Qb=$_SESSION["db"][$Ki][$M][$V];foreach(($Qb?array_keys($Qb):array(""))as$m)echo"<a href='".h(auth_url($Ki,$M,$V,$m))."'>($ec[$Ki]) ".h($V.($M!=""?"@$M":"").($m!=""?" - $m":""))."</a><br>\n";}}}}}else{if($_GET["ns"]!==""&&!$Me&&DB!=""){$g->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.5.0");if(support("sql")){echo'<script',nonce(),'>
';if($S){$se=array();foreach($S
as$Q=>$T)$se[]=preg_quote($Q,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$se).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}echo'bodyLoad(\'',(is_object($g)?substr($g->server_info,0,3):""),'\');
</script>
';}$this->databasesPrint($Me);if(DB==""||!$Me){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".lang(61)."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".lang(69)."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(70)."</a>\n";}if($_GET["ns"]!==""&&!$Me&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(71)."</a>\n";if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Me){global$b,$g;$l=$this->databases();echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Ob=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});","");echo"<span title='".lang(72)."'>DB</span>: ".($l?"<select name='db'>".optionlist(array(""=>"")+$l,DB)."</select>$Ob":'<input name="db" value="'.h(DB).'" autocapitalize="off">'),"<input type='submit' value='".lang(20)."'".($l?" class='hidden'":"").">\n";if($Me!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br>".lang(73).": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Ob";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':(isset($_GET["privileges"])?'<input type="hidden" name="privileges" value="">':"")))),"</p></form>\n";}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$O){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select").">".lang(74)."</a> ";$C=$this->tableName($O);echo(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($O)?"view":"structure"))." title='".lang(40)."'>$C</a>":"<span>$C</span>")."\n";}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$mf;function
page_header($Vh,$n="",$Xa=array(),$Wh=""){global$ca,$ia,$b,$ec,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$Xh=$Vh.($Wh!=""?": $Wh":"");$Yh=strip_tags($Xh.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ca,'" dir="',lang(75),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$Yh,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.5.0"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.5.0");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.5.0"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.5.0"),'">
';foreach($b->css()as$Ib){echo'<link rel="stylesheet" type="text/css" href="',h($Ib),'">
';}}echo'
<body class="',lang(75),' nojs">
';$Tc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($Tc)&&filemtime($Tc)+86400>time()){$Li=unserialize(file_get_contents($Tc));$kg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Li["version"],base64_decode($Li["signature"]),$kg)==1)$_COOKIE["adminer_version"]=$Li["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(76)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Xa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$ec[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=(SERVER!=""?h(SERVER):lang(32));if($Xa===false)echo"$M\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Xa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Xa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Xa
as$y=>$X){$Vb=(is_array($X)?$X[1]:h($X));if($Vb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Vb</a> &raquo; ";}}echo"$Vh\n";}}echo"<h2>$Xh</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Hb){$td=array();foreach($Hb
as$y=>$X)$td[]="$y $X";header("Content-Security-Policy: ".implode("; ",$td));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$We;if(!$We)$We=base64_encode(rand_string());return$We;}function
page_messages($n){$zi=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ie=$_SESSION["messages"][$zi];if($Ie){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ie)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$zi]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Me=""){global$b,$ci;echo'</div>

';switch_lang();if($Me!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(77),'" id="logout">
<input type="hidden" name="token" value="',$ci,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Me);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Pe){while($Pe>=2147483648)$Pe-=4294967296;while($Pe<=-2147483649)$Pe+=4294967296;return(int)$Pe;}function
long2str($W,$Pi){$Pg='';foreach($W
as$X)$Pg.=pack('V',$X);if($Pi)return
substr($Pg,0,end($W));return$Pg;}function
str2long($Pg,$Pi){$W=array_values(unpack('V*',str_pad($Pg,4*ceil(strlen($Pg)/4),"\0")));if($Pi)$W[]=strlen($Pg);return$W;}function
xxtea_mx($aj,$Zi,$_h,$Yd){return
int32((($aj>>5&0x7FFFFFF)^$Zi<<2)+(($Zi>>3&0x1FFFFFFF)^$aj<<4))^int32(($_h^$Zi)+($Yd^$aj));}function
encrypt_string($vh,$y){if($vh=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($vh,true);$Pe=count($W)-1;$aj=$W[$Pe];$Zi=$W[0];$lg=floor(6+52/($Pe+1));$_h=0;while($lg-->0){$_h=int32($_h+0x9E3779B9);$lc=$_h>>2&3;for($Cf=0;$Cf<$Pe;$Cf++){$Zi=$W[$Cf+1];$Oe=xxtea_mx($aj,$Zi,$_h,$y[$Cf&3^$lc]);$aj=int32($W[$Cf]+$Oe);$W[$Cf]=$aj;}$Zi=$W[0];$Oe=xxtea_mx($aj,$Zi,$_h,$y[$Cf&3^$lc]);$aj=int32($W[$Pe]+$Oe);$W[$Pe]=$aj;}return
long2str($W,false);}function
decrypt_string($vh,$y){if($vh=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($vh,false);$Pe=count($W)-1;$aj=$W[$Pe];$Zi=$W[0];$lg=floor(6+52/($Pe+1));$_h=int32($lg*0x9E3779B9);while($_h){$lc=$_h>>2&3;for($Cf=$Pe;$Cf>0;$Cf--){$aj=$W[$Cf-1];$Oe=xxtea_mx($aj,$Zi,$_h,$y[$Cf&3^$lc]);$Zi=int32($W[$Cf]-$Oe);$W[$Cf]=$Zi;}$aj=$W[$Pe];$Oe=xxtea_mx($aj,$Zi,$_h,$y[$Cf&3^$lc]);$Zi=int32($W[0]-$Oe);$W[0]=$Zi;$_h=int32($_h-0x9E3779B9);}return
long2str($W,true);}$g='';$sd=$_SESSION["token"];if(!$sd)$_SESSION["token"]=rand(1,1e6);$ci=get_token();$Rf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Rf[$y]=$X;}}function
add_invalid_login(){global$b;$gd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$gd)return;$Qd=unserialize(stream_get_contents($gd));$Sh=time();if($Qd){foreach($Qd
as$Rd=>$X){if($X[0]<$Sh)unset($Qd[$Rd]);}}$Pd=&$Qd[$b->bruteForceKey()];if(!$Pd)$Pd=array($Sh+30*60,0);$Pd[1]++;file_write_unlock($gd,serialize($Qd));}function
check_invalid_login(){global$b;$Qd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Pd=$Qd[$b->bruteForceKey()];$Ve=($Pd[1]>29?$Pd[0]-time():0);if($Ve>0)auth_error(lang(78,ceil($Ve/60)));}$La=$_POST["auth"];if($La){session_regenerate_id();$Ki=$La["driver"];$M=$La["server"];$V=$La["username"];$F=(string)$La["password"];$m=$La["db"];set_password($Ki,$M,$V,$F);$_SESSION["db"][$Ki][$M][$V][$m]=true;if($La["permanent"]){$y=base64_encode($Ki)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($m);$dg=$b->permanentLogin(true);$Rf[$y]="$y:".base64_encode($dg?encrypt_string($F,$dg):"");cookie("adminer_permanent",implode(" ",$Rf));}if(count($_POST)==1||DRIVER!=$Ki||SERVER!=$M||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Ki,$M,$V,$m));}elseif($_POST["logout"]){if($sd&&!verify_token()){page_header(lang(77),lang(79));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(80).' '.lang(81,'https://sourceforge.net/donate/index.php?group_id=264133'));}}elseif($Rf&&!$_SESSION["pwds"]){session_regenerate_id();$dg=$b->permanentLogin();foreach($Rf
as$y=>$X){list(,$jb)=explode(":",$X);list($Ki,$M,$V,$m)=array_map('base64_decode',explode("-",$y));set_password($Ki,$M,$V,decrypt_string(base64_decode($jb),$dg));$_SESSION["db"][$Ki][$M][$V][$m]=true;}}function
unset_permanent(){global$Rf;foreach($Rf
as$y=>$X){list($Ki,$M,$V,$m)=array_map('base64_decode',explode("-",$y));if($Ki==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Rf[$y]);}cookie("adminer_permanent",implode(" ",$Rf));}function
auth_error($n){global$b,$sd;$eh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$eh]||$_GET[$eh])&&!$sd)$n=lang(82);else{add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.lang(83,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$eh]&&$_GET[$eh]&&ini_bool("session.use_only_cookies"))$n=lang(84);$Ef=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Ef["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(85),lang(86,implode(", ",$Xf)),false);page_footer("auth");exit;}list($xd,$Tf)=explode(":",SERVER,2);if(is_numeric($Tf)&&$Tf<1024)auth_error(lang(87));check_invalid_login();$g=connect();$dc=new
Min_Driver($g);}if(!is_object($g)||($te=$b->login($_GET["username"],get_password()))!==true)auth_error((is_string($g)?h($g):(is_string($te)?$te:lang(88))));if($La&&$_POST["token"])$_POST["token"]=$ci;$n='';if($_POST){if(!verify_token()){$Kd="max_input_vars";$Ce=ini_get($Kd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Ce||$X<$Ce)){$Kd=$y;$Ce=$X;}}}$n=(!$_POST["token"]&&$Ce?lang(89,"'$Kd'"):lang(79).' '.lang(90));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(91,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(92);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
select($H,$h=null,$uf=array(),$z=0){global$x;$se=array();$w=array();$e=array();$Ua=array();$U=array();$I=array();odd('');for($s=0;(!$z||$s<$z)&&($J=$H->fetch_row());$s++){if(!$s){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Xd=0;$Xd<count($J);$Xd++){$o=$H->fetch_field();$C=$o->name;$tf=$o->orgtable;$sf=$o->orgname;$I[$o->table]=$tf;if($uf&&$x=="sql")$se[$Xd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($tf!=""){if(!isset($w[$tf])){$w[$tf]=array();foreach(indexes($tf,$h)as$v){if($v["type"]=="PRIMARY"){$w[$tf]=array_flip($v["columns"]);break;}}$e[$tf]=$w[$tf];}if(isset($e[$tf][$sf])){unset($e[$tf][$sf]);$w[$tf][$sf]=$Xd;$se[$Xd]=$tf;}}if($o->charsetnr==63)$Ua[$Xd]=true;$U[$Xd]=$o->type;echo"<th".($tf!=""||$o->name!=$sf?" title='".h(($tf!=""?"$tf.":"").$sf)."'":"").">".h($C).($uf?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C))):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$y=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ua[$y]&&!is_utf8($X))$X="<i>".lang(44,strlen($X))."</i>";elseif(!strlen($X))$X="&nbsp;";else{$X=h($X);if($U[$y]==254)$X="<code>$X</code>";}if(isset($se[$y])&&!$e[$se[$y]]){if($uf&&$x=="sql"){$Q=$J[array_search("table=",$se)];$_=$se[$y].urlencode($uf[$Q]!=""?$uf[$Q]:$Q);}else{$_="edit=".urlencode($se[$y]);foreach($w[$se[$y]]as$nb=>$Xd)$_.="&where".urlencode("[".bracket_escape($nb)."]")."=".urlencode($J[$Xd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>":"<p class='message'>".lang(12))."\n";return$I;}function
referencable_primary($Yg){$I=array();foreach(table_status('',true)as$Dh=>$Q){if($Dh!=$Yg&&fk_support($Q)){foreach(fields($Dh)as$o){if($o["primary"]){if($I[$Dh]){unset($I[$Dh]);break;}$I[$Dh]=$o;}}}}return$I;}function
textarea($C,$Y,$K=10,$sb=80){global$x;echo"<textarea name='$C' rows='$K' cols='$sb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$o,$qb,$cd=array()){global$wh,$U,$xi,$hf;$T=$o["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($cd[$T]))array_unshift($wh,$T);if($cd)$wh[lang(93)]=$cd;echo
optionlist($wh,$T),'</select>
',on_help("getTarget(event).value",1),script("mixin(qsl('select'), {onfocus: function () { lastType = selectValue(this); }, onchange: editingTypeChange});",""),'<td><input name="',h($y),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":""),' aria-labelledby="label-length">',script("mixin(qsl('input'), {onfocus: editingLengthFocus, oninput: editingLengthChange});",""),'<td class="options">';echo"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.lang(94).')'.optionlist($qb,$o["collation"]).'</select>',($xi?"<select name='".h($y)."[unsigned]'".(!$T||preg_match('~((^|[^o])int|float|double|decimal)$~',$T)?"":" class='hidden'").'><option>'.optionlist($xi,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".lang(95).")","CURRENT_TIMESTAMP"),$o["on_update"]).'</select>':''),($cd?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".lang(96).")".optionlist(explode("|",$hf),$o["on_delete"])."</select> ":" ");}function
process_length($pe){global$wc;return(preg_match("~^\\s*\\(?\\s*$wc(?:\\s*,\\s*$wc)*+\\s*\\)?\\s*\$~",$pe)&&preg_match_all("~$wc~",$pe,$xe)?"(".implode(",",$xe[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$pe)));}function
process_type($o,$ob="COLLATE"){global$xi;return" $o[type]".process_length($o["length"]).(preg_match('~(^|[^o])int|float|double|decimal~',$o["type"])&&in_array($o["unsigned"],$xi)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $ob ".q($o["collation"]):"");}function
process_field($o,$pi){global$x;$Sb=$o["default"];return
array(idf_escape(trim($o["field"])),process_type($pi),($o["null"]?" NULL":" NOT NULL"),(isset($Sb)?" DEFAULT ".((preg_match('~time~',$o["type"])&&preg_match('~^CURRENT_TIMESTAMP(\(\))?$~i',$Sb))||($x=="sqlite"&&preg_match('~^CURRENT_(TIME|TIMESTAMP|DATE)$~i',$Sb))||($o["type"]=="bit"&&preg_match("~^([0-9]+|b'[0-1]+')\$~",$Sb))||($x=="pgsql"&&preg_match("~^[a-z]+\\(('[^']*')+\\)\$~",$Sb))?$Sb:q($Sb)):""),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$T))return" class='$y'";}}function
edit_fields($p,$qb,$T="TABLE",$cd=array(),$wb=false){global$g,$Ld;$p=array_values($p);echo'<thead><tr class="wrap">
';if($T=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th id="label-name">',($T=="TABLE"?lang(97):lang(98)),'<td id="label-type">',lang(46),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">',lang(99),'<td>',lang(100);if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="',lang(48),'">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default">',lang(49),(support("comment")?"<td id='label-comment'".($wb?"":" class='hidden'").">".lang(47):"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.5.0")."' alt='+' title='".lang(101)."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("qsl('tbody').onkeydown = editingKeydown;");foreach($p
as$s=>$o){$s++;$vf=$o[($_POST?"orig":"field")];$Zb=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$vf=="");echo'<tr',($Zb?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Ld),$o["inout"]):""),'<th>';if($Zb){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" maxlength="64" autocapitalize="off" aria-labelledby="label-name">',script("qsl('input').oninput = function () { editingNameChange.call(this);".($o["field"]!=""||count($p)>1?"":" editingAddRow.call(this);")." };","");}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($vf),'">
';edit_type("fields[$s]",$o,$qb,$cd);if($T=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai">',script("qsl('input').onclick = function () { var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.oninput(); } }"),'</label><td>',checkbox("fields[$s][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',script("qsl('input').oninput = function () { this.previousSibling.checked = true; }",""),(support("comment")?"<td".($wb?"":" class='hidden'")."><input name='fields[$s][comment]' value='".h($o["comment"])."' maxlength='".($g->server_info>=5.5?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.5.0")."' alt='+' title='".lang(101)."'>&nbsp;".script("qsl('input').onclick = partial(editingAddRow, 1);","")."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.5.0")."' alt='^' title='".lang(102)."'>&nbsp;".script("qsl('input').onclick = partial(editingMoveRow, 1);","")."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.5.0")."' alt='v' title='".lang(103)."'>&nbsp;".script("qsl('input').onclick = partial(editingMoveRow, 0);",""):""),($vf==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.5.0")."' alt='x' title='".lang(104)."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'fields\$1[field]');"):"");}}function
process_fields(&$p){$D=0;if($_POST["up"]){$je=0;foreach($p
as$y=>$o){if(key($_POST["up"])==$y){unset($p[$y]);array_splice($p,$je,0,array($o));break;}if(isset($o["field"]))$je=$D;$D++;}}elseif($_POST["down"]){$ed=false;foreach($p
as$y=>$o){if(isset($o["field"])&&$ed){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($ed));break;}if(key($_POST["down"])==$y)$ed=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($kd,$fg,$e,$gf){if(!$fg)return
true;if($fg==array("ALL PRIVILEGES","GRANT OPTION"))return($kd=="GRANT"?queries("$kd ALL PRIVILEGES$gf WITH GRANT OPTION"):queries("$kd ALL PRIVILEGES$gf")&&queries("$kd GRANT OPTION$gf"));return
queries("$kd ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$e, ",$fg).$e).$gf);}function
drop_create($fc,$i,$gc,$Ph,$ic,$A,$He,$Fe,$Ge,$df,$Se){if($_POST["drop"])query_redirect($fc,$A,$He);elseif($df=="")query_redirect($i,$A,$Ge);elseif($df!=$Se){$Gb=queries($i);queries_redirect($A,$Fe,$Gb&&queries($fc));if($Gb)queries($gc);}else
queries_redirect($A,$Fe,queries($Ph)&&queries($ic)&&queries($fc)&&queries($i));}function
create_trigger($gf,$J){global$x;$Uh=" $J[Timing] $J[Event]".($J["Event"]=="UPDATE OF"?" ".idf_escape($J["Of"]):"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($x=="mssql"?$gf.$Uh:$Uh.$gf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Lg,$J){global$Ld;$N=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$N[]=(preg_match("~^($Ld)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}return"CREATE $Lg ".idf_escape(trim($J["name"]))." (".implode(", ",$N).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").rtrim("\n$J[definition]",";").";";}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$G);}function
format_foreign_key($q){global$hf;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($hf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($hf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Tc,$Zh){$I=pack("a100a8a8a8a12a12",$Tc,644,0,0,decoct($Zh->size),decoct(time()));$hb=8*32;for($s=0;$s<strlen($I);$s++)$hb+=ord($I[$s]);$I.=sprintf("%06o",$hb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$Zh->send();echo
str_repeat("\0",511-($Zh->size+511)%512);}function
ini_bytes($Kd){$X=ini_get($Kd);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($Pf){global$x,$g;$Bi=array('sql'=>"https://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/".substr($g->server_info,0,3)."/static/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);return($Pf[$x]?"<a href='$Bi[$x]$Pf[$x]'".target_blank()."><sup>?</sup></a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($m){global$g;if(!$g->select_db($m))return"?";$I=0;foreach(table_status()as$R)$I+=$R["Data_length"]+$R["Index_length"];return
format_number($I);}function
set_utf8mb4($i){global$g;static$N=false;if(!$N&&preg_match('~\butf8mb4~i',$i)){$N=true;echo"SET NAMES ".charset($g).";\n\n";}}function
connect_error(){global$b,$g,$ci,$n,$ec;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header(lang(35).": ".h(DB),lang(105),true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),lang(106),drop_databases($_POST["db"]));page_header(lang(107),$n,false);echo"<p class='links'>\n";foreach(array('database'=>lang(108),'privileges'=>lang(68),'processlist'=>lang(109),'variables'=>lang(110),'status'=>lang(111),)as$y=>$X){if(support($y))echo"<a href='".h(ME)."$y='>$X</a>\n";}echo"<p>".lang(112,$ec[DRIVER],"<b>".h($g->server_info)."</b>","<b>$g->extension</b>")."\n","<p>".lang(113,"<b>".h(logged_user())."</b>")."\n";$l=$b->databases();if($l){$Sg=support("scheme");$qb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>&nbsp;":"")."<th>".lang(35)." - <a href='".h(ME)."refresh=1'>".lang(114)."</a>"."<td>".lang(115)."<td>".lang(116)."<td>".lang(117)." - <a href='".h(ME)."dbsize=1'>".lang(118)."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$l=($_GET["dbsize"]?count_tables($l):array_flip($l));foreach($l
as$m=>$S){$Kg=h(ME)."db=".urlencode($m);$t=h("Db-".$m);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$m,in_array($m,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Kg' id='$m'>".h($m)."</a>";$pb=nbsp(db_collation($m,$qb));echo"<td>".(support("database")?"<a href='$Kg".($Sg?"&amp;ns=":"")."&amp;database=' title='".lang(64)."'>$pb</a>":$pb),"<td align='right'><a href='$Kg&amp;schema=' id='tables-".h($m)."' title='".lang(67)."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($m)."'>".($_GET["dbsize"]?db_size($m):"?"),"\n";}echo"</table>\n",(support("database")?"<fieldset><legend>".lang(119)." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".lang(120)."'>".confirm()."\n"."</div></fieldset>\n":""),script("tableCheck();"),"<input type='hidden' name='token' value='$ci'>\n","</form>\n";}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header(lang(73).": ".h($_GET["ns"]),lang(121),true);page_footer("ns");exit;}}$hf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Ab){$this->size+=strlen($Ab);fwrite($this->handler,$Ab);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$wc="'(?:''|[^'\\\\]|\\\\.)*'";$Ld="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$dc->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$J[0];exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);page_header(($p&&is_view($R)?$R['Engine']=='materialized view'?lang(122):lang(123):lang(124)).": ".h($a),$n);$b->selectLinks($R);$vb=$R["Comment"];if($vb!="")echo"<p class='nowrap'>".lang(47).": ".h($vb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".lang(125)."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(126)."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".lang(93)."</h3>\n";$cd=foreign_keys($a);if($cd){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(127)."<td>".lang(128)."<td>".lang(96)."<td>".lang(95)."<td>&nbsp;</thead>\n";foreach($cd
as$C=>$q){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".nbsp($q["on_delete"])."\n","<td>".nbsp($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.lang(129).'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(130)."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".lang(131)."</h3>\n";$oi=triggers($a);if($oi){echo"<table cellspacing='0'>\n";foreach($oi
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".lang(129)."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(132)."</a>\n";}}elseif(isset($_GET["schema"])){page_header(lang(67),"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Fh=array();$Gh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$xe,PREG_SET_ORDER);foreach($xe
as$s=>$B){$Fh[$B[1]]=array($B[2],$B[3]);$Gh[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$di=0;$Ra=-1;$Rg=array();$xg=array();$ne=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$Uf=0;$Rg[$Q]["fields"]=array();foreach(fields($Q)as$C=>$o){$Uf+=1.25;$o["pos"]=$Uf;$Rg[$Q]["fields"][$C]=$o;}$Rg[$Q]["pos"]=($Fh[$Q]?$Fh[$Q]:array($di,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$le=$Ra;if($Fh[$Q][1]||$Fh[$X["table"]][1])$le=min(floatval($Fh[$Q][1]),floatval($Fh[$X["table"]][1]))-1;else$Ra-=.1;while($ne[(string)$le])$le-=.0001;$Rg[$Q]["references"][$X["table"]][(string)$le]=array($X["source"],$X["target"]);$xg[$X["table"]][$Q][(string)$le]=$X["target"];$ne[(string)$le]=true;}}$di=max($di,$Rg[$Q]["pos"][0]+2.5+$Uf);}echo'<div id="schema" style="height: ',$di,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Gh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$di,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($Rg
as$C=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$Mh=>$yg){foreach($yg
as$le=>$ug){$me=$le-$Fh[$C][1];$s=0;foreach($ug[0]as$lh)echo"\n<div class='references' title='".h($Mh)."' id='refs$le-".($s++)."' style='left: $me"."em; top: ".$Q["fields"][$lh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$me)."em;'></div></div>";}}foreach((array)$xg[$C]as$Mh=>$yg){foreach($yg
as$le=>$e){$me=$le-$Fh[$C][1];$s=0;foreach($e
as$Lh)echo"\n<div class='references' title='".h($Mh)."' id='refd$le-".($s++)."' style='left: $me"."em; top: ".$Q["fields"][$Lh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.5.0")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$me)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Rg
as$C=>$Q){foreach((array)$Q["references"]as$Mh=>$yg){foreach($yg
as$le=>$ug){$Le=$di;$Ae=-10;foreach($ug[0]as$y=>$lh){$Vf=$Q["pos"][0]+$Q["fields"][$lh]["pos"];$Wf=$Rg[$Mh]["pos"][0]+$Rg[$Mh]["fields"][$ug[1][$y]]["pos"];$Le=min($Le,$Vf,$Wf);$Ae=max($Ae,$Vf,$Wf);}echo"<div class='references' id='refl$le' style='left: $le"."em; top: $Le"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Ae-$Le)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(133),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Db="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Db.="&$y=".urlencode($_POST[$y]);cookie("adminer_export",substr($Db,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Ic=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$Td=preg_match('~sql~',$_POST["format"]);if($Td){echo"-- Adminer $ia ".$ec[DRIVER]." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$g->query("SET time_zone = '+00:00';");}}$xh=$_POST["db_style"];$l=array(DB);if(DB==""){$l=$_POST["databases"];if(is_string($l))$l=explode("\n",rtrim(str_replace("\r","",$l),"\n"));}foreach((array)$l
as$m){$b->dumpDatabase($m);if($g->select_db($m)){if($Td&&preg_match('~CREATE~',$xh)&&($i=$g->result("SHOW CREATE DATABASE ".idf_escape($m),1))){set_utf8mb4($i);if($xh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($m).";\n";echo"$i;\n";}if($Td){if($xh)echo
use_sql($m).";\n\n";$Af="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Lg){foreach(get_rows("SHOW $Lg STATUS WHERE Db = ".q($m),null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE $Lg ".idf_escape($J["Name"]),2));set_utf8mb4($i);$Af.=($xh!='DROP+CREATE'?"DROP $Lg IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($i);$Af.=($xh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}if($Af)echo"DELIMITER ;;\n\n$Af"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Ni=array();foreach(table_status('',true)as$C=>$R){$Q=(DB==""||in_array($C,(array)$_POST["tables"]));$Lb=(DB==""||in_array($C,(array)$_POST["data"]));if($Q||$Lb){if($Ic=="tar"){$Zh=new
TmpFile;ob_start(array($Zh,'write'),1e5);}$b->dumpTable($C,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$Ni[]=$C;elseif($Lb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Td&&$_POST["triggers"]&&$Q&&($oi=trigger_sql($C)))echo"\nDELIMITER ;;\n$oi\nDELIMITER ;\n";if($Ic=="tar"){ob_end_flush();tar_file((DB!=""?"":"$m/")."$C.csv",$Zh);}elseif($Td)echo"\n";}}foreach($Ni
as$Mi)$b->dumpTable($Mi,$_POST["table_style"],1);if($Ic=="tar")echo
pack("x512");}}}if($Td)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header(lang(70),$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Pb=array('','USE','DROP+CREATE','CREATE');$Hh=array('','DROP+CREATE','CREATE');$Mb=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Mb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".lang(134)."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".lang(135)."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".lang(35)."<td>".html_select('db_style',$Pb,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],lang(136)):"").(support("event")?checkbox("events",1,$J["events"],lang(137)):"")),"<tr><th>".lang(116)."<td>".html_select('table_style',$Hh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],lang(48)).(support("trigger")?checkbox("triggers",1,$J["triggers"],lang(131)):""),"<tr><th>".lang(138)."<td>".html_select('data_style',$Mb,$J["data_style"]),'</table>
<p><input type="submit" value="',lang(70),'">
<input type="hidden" name="token" value="',$ci,'">

<table cellspacing="0">
';$Zf=array();if(DB!=""){$fb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$fb>".lang(116)."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".lang(138)."<input type='checkbox' id='check-data'$fb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$Ni="";$Ih=tables_list();foreach($Ih
as$C=>$T){$Yf=preg_replace('~_.*~','',$C);$fb=($a==""||$a==(substr($a,-1)=="%"?"$Yf%":$C));$cg="<tr><td>".checkbox("tables[]",$C,$fb,$C,"checkboxClick.call(this, event); formUncheck('check-tables');","block");if($T!==null&&!preg_match('~table~i',$T))$Ni.="$cg\n";else
echo"$cg<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$fb,"","checkboxClick.call(this, event); formUncheck('check-data');")."</label>\n";$Zf[$Yf]++;}echo$Ni;if($Ih)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".lang(35)."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$l=$b->databases();if($l){foreach($l
as$m){if(!information_schema($m)){$Yf=preg_replace('~_.*~','',$m);echo"<tr><td>".checkbox("databases[]",$m,$a==""||$a=="$Yf%",$m,"formUncheck('check-databases');","block")."\n";$Zf[$Yf]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Vc=true;foreach($Zf
as$y=>$X){if($y!=""&&$X>1){echo($Vc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$Vc=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(68));echo'<p class="links"><a href="'.h(ME).'user=">'.lang(139)."</a>";$H=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$kd=$H;if(!$H)$H=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($kd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(33)."<th>".lang(32)."<th>&nbsp;</thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.lang(10)."</a>\n";if(!$kd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".lang(10)."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$vd=&get_session("queries");$ud=&$vd[DB];if(!$n&&$_POST["clear"]){$ud=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?lang(69):lang(61)),$n);if(!$n&&$_POST){$gd=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$qh=$b->importServerPath();$gd=@fopen((file_exists($qh)?$qh:"compress.zlib://$qh.gz"),"rb");$G=($gd?fread($gd,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$lg=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$ud||reset(end($ud))!=$lg){restart_session();$ud[]=array($lg,time());set_session("queries",$vd);stop_session();}}$mh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ub=";";$D=0;$tc=true;$h=connect();if(is_object($h)&&DB!="")$h->select_db(DB);$ub=0;$yc=array();$Gf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\\*|-- |$'.($x=="pgsql"?'|\\$[^$]*\\$':'');$ei=microtime(true);parse_str($_COOKIE["adminer_export"],$ya);$kc=$b->dumpFormat();unset($kc["sql"]);while($G!=""){if(!$D&&preg_match("~^$mh*+DELIMITER\\s+(\\S+)~i",$G,$B)){$Ub=$B[1];$G=substr($G,strlen($B[0]));}else{preg_match('('.preg_quote($Ub)."\\s*|$Gf)",$G,$B,PREG_OFFSET_CAPTURE,$D);list($ed,$Uf)=$B[0];if(!$ed&&$gd&&!feof($gd))$G.=fread($gd,1e5);else{if(!$ed&&rtrim($G)=="")break;$D=$Uf+strlen($ed);if($ed&&rtrim($ed)!=$Ub){while(preg_match('('.($ed=='/*'?'\\*/':($ed=='['?']':(preg_match('~^-- |^#~',$ed)?"\n":preg_quote($ed)."|\\\\."))).'|$)s',$G,$B,PREG_OFFSET_CAPTURE,$D)){$Pg=$B[0][0];if(!$Pg&&$gd&&!feof($gd))$G.=fread($gd,1e5);else{$D=$B[0][1]+strlen($Pg);if($Pg[0]!="\\")break;}}}else{$tc=false;$lg=substr($G,0,$Uf);$ub++;$cg="<pre id='sql-$ub'><code class='jush-$x'>".$b->sqlCommandQuery($lg)."</code></pre>\n";if($x=="sqlite"&&preg_match("~^$mh*+ATTACH\\b~i",$lg,$B)){echo$cg,"<p class='error'>".lang(140)."\n";$yc[]=" <a href='#sql-$ub'>$ub</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$cg;ob_flush();flush();}$sh=microtime(true);if($g->multi_query($lg)&&is_object($h)&&preg_match("~^$mh*+USE\\b~i",$lg))$h->query($lg);do{$H=$g->store_result();$Sh=" <span class='time'>(".format_time($sh).")</span>".(strlen($lg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($lg))."'>".lang(10)."</a>":"");if($g->error){echo($_POST["only_errors"]?$cg:""),"<p class='error'>".lang(141).($g->errno?" ($g->errno)":"").": ".error()."\n";$yc[]=" <a href='#sql-$ub'>$ub</a>";if($_POST["error_stops"])break
2;}elseif(is_object($H)){$z=$_POST["limit"];$uf=select($H,$h,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$Xe=$H->num_rows;echo"<p>".($Xe?($z&&$Xe>$z?lang(142,$z):"").lang(143,$Xe):""),$Sh;$t="export-$ub";$Gc=", <a href='#$t'>".lang(70)."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$ya["output"])." ".html_select("format",$kc,$ya["format"])."<input type='hidden' name='query' value='".h($lg)."'>"." <input type='submit' name='export' value='".lang(70)."'><input type='hidden' name='token' value='$ci'></span>\n";if($h&&preg_match("~^($mh|\\()*+SELECT\\b~i",$lg)&&($Fc=explain($h,$lg))){$t="explain-$ub";echo", <a href='#$t'>EXPLAIN</a>".script("qsl('a').onclick = partial(toggle, '$t');","").$Gc,"<div id='$t' class='hidden'>\n";select($Fc,$h,$uf);echo"</div>\n";}else
echo$Gc;echo"</form>\n";}}else{if(preg_match("~^$mh*+(CREATE|DROP|ALTER)$mh++(DATABASE|SCHEMA)\\b~i",$lg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(144,$g->affected_rows)."$Sh\n";}$sh=microtime(true);}while($g->next_result());}$G=substr($G,$D);$D=0;}}}}if($tc)echo"<p class='message'>".lang(145)."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(146,$ub-count($yc))," <span class='time'>(".format_time($ei).")</span>\n";}elseif($yc&&$ub>1)echo"<p class='error'>".lang(141).": ".implode("",$yc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Cc="<input type='submit' value='".lang(147)."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$lg=$_GET["sql"];if($_POST)$lg=$_POST["query"];elseif($_GET["history"]=="all")$lg=$ud;elseif($_GET["history"]!="")$lg=$ud[$_GET["history"]][0];echo"<p>";textarea("query",$lg,20);echo($_POST?"":script("qs('textarea').focus();")),"<p>$Cc\n",lang(148).": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".lang(149)."</legend><div>",(ini_bool("file_uploads")?"SQL (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Cc":lang(150)),"</div></fieldset>\n","<fieldset><legend>".lang(151)."</legend><div>",lang(152,"<code>".h($b->importServerPath()).(extension_loaded("zlib")?"[.gz]":"")."</code>"),' <input type="submit" name="webfile" value="'.lang(153).'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),lang(154))."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),lang(155))."\n","<input type='hidden' name='token' value='$ci'>\n";if(!isset($_GET["import"])&&$ud){print_fieldset("history",lang(156),$_GET["history"]!="");for($X=end($ud);$X;$X=prev($ud)){$y=key($ud);list($lg,$Sh,$oc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'">'.lang(10)."</a>"." <span class='time' title='".@date('Y-m-d',$Sh)."'>".@date("H:i:s",$Sh)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$lg)))),80,"</code>").($oc?" <span class='time'>($oc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(157)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(158)."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$yi=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$yi?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($yi?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$w=indexes($a);$ti=unique_array($_GET["where"],$w);$og="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,lang(159),$dc->delete($a,$og,!$ti));else{$N=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($C)]=$X;}if($yi){if(!$N)redirect($A);queries_redirect($A,lang(160),$dc->update($a,$N,$og,!$ti));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$dc->insert($a,$N);$ke=($H?last_id():0);queries_redirect($A,lang(161,($ke?" $ke":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ha=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ha="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$Ha="1*".idf_escape($C);$L[]=($Ha?"$Ha AS ":"").idf_escape($C);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$dc->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$dc->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($dc->primary=>"");}if($J){foreach($J
as$y=>$X){if(!$Z)$J[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$dc->primary),"auto_increment"=>($y==$dc->primary));}}}edit_form($a,$p,$J,$yi);}elseif(isset($_GET["create"])){$a=$_GET["create"];$If=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$If[$y]=$y;$wg=referencable_primary($a);$cd=array();foreach($wg
as$Dh=>$o)$cd[str_replace("`","``",$Dh)."`".str_replace("`","``",$o["field"])]=$Dh;$xf=array();$R=array();if($a!=""){$xf=fields($a);$R=table_status($a);if(!$R)$n=lang(9);}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),lang(162),drop_tables(array($a)));else{$p=array();$Ea=array();$Ci=false;$ad=array();$wf=reset($xf);$Ba=" FIRST";foreach($J["fields"]as$y=>$o){$q=$cd[$o["type"]];$pi=($q!==null?$wg[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($y==$J["auto_increment_col"])$o["auto_increment"]=true;$hg=process_field($o,$pi);$Ea[]=array($o["orig"],$hg,$Ba);if($hg!=process_field($wf,$wf)){$p[]=array($o["orig"],$hg,$Ba);if($o["orig"]!=""||$Ba)$Ci=true;}if($q!==null)$ad[idf_escape($o["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$cd[$o["type"]],'source'=>array($o["field"]),'target'=>array($pi["field"]),'on_delete'=>$o["on_delete"],));$Ba=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Ci=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$wf=next($xf);if(!$wf)$Ba="";}}$Kf="";if($If[$J["partition_by"]]){$Lf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$y=>$X){$Y=$J["partition_values"][$y];$Lf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Kf.="\nPARTITION BY $J[partition_by]($J[partition])".($Lf?" (".implode(",",$Lf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Kf.="\nREMOVE PARTITIONING";$Ee=lang(163);if($a==""){cookie("adminer_engine",$J["Engine"]);$Ee=lang(164);}$C=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$Ee,alter_table($a,$C,($x=="sqlite"&&($Ci||$ad)?$Ea:$p),$ad,($J["Comment"]!=$R["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$R["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$R["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Kf));}}page_header(($a!=""?lang(42):lang(71)),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")))),"partition_names"=>array(""),);if($a!=""){$J=$R;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($xf
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$hd="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $hd ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Lf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $hd AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Lf[""]="";$J["partition_names"]=array_keys($Lf);$J["partition_values"]=array_values($Lf);}}}$qb=collations();$vc=engines();foreach($vc
as$uc){if(!strcasecmp($uc,$J["Engine"])){$J["Engine"]=$uc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo
lang(165),': <input name="name" maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($vc?"<select name='Engine'>".optionlist(array(""=>"(".lang(166).")")+$vc,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($qb&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".lang(94).")")+$qb,$J["Collation"]):""),' <input type="submit" value="',lang(14),'">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$wb=($_POST?$_POST["comments"]:$J["Comment"]!="");if(!$_POST&&!$wb){foreach($J["fields"]as$o){if($o["comment"]!=""){$wb=true;break;}}}edit_fields($J["fields"],$qb,"TABLE",$cd,$wb);echo'</table>
<p>
',lang(48),': <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,true,lang(167),"columnShow(this.checked, 5)","jsonly");if(!$_POST["defaults"])echo
script("editingHideDefaults();");echo(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly'".($wb?" checked":"").">".lang(47)."</label>".script("qsl('input').onclick = function () { columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus(); };").' <input name="Comment" id="Comment" value="'.h($J["Comment"]).'" maxlength="'.($g->server_info>=5.5?2048:60).'"'.($wb?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="',lang(14),'">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,$a));}if(support("partitioning")){$Jf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",lang(169),$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$If,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
',lang(170),': <input type="number" name="partitions" class="size',($Jf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Jf?"":" class='hidden'"),'>
<thead><tr><th>',lang(171),'<th>',lang(172),'</thead>
';foreach($J["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Dd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);$ch=$g->server_info;$id=($ch>=5.6);$nh=($ch>=5.7);if(preg_match('~([\d.]+)-MariaDB~',$ch,$B)){$ch=$B[1];$id=(version_compare($ch,'10.0.5')>=0);$nh=(version_compare($ch,'10.2.2')>=0);}if(preg_match('~MyISAM|M?aria'.($id?'|InnoDB':'').'~i',$R["Engine"]))$Dd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.($nh?'|InnoDB':'').'~i',$R["Engine"]))$Dd[]="SPATIAL";$w=indexes($a);$ag=array();if($x=="mongo"){$ag=$w["_id_"];unset($Dd[0]);unset($w["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$v){$C=$v["name"];if(in_array($v["type"],$Dd)){$e=array();$qe=array();$Wb=array();$N=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$d){if($d!=""){$pe=$v["lengths"][$y];$Vb=$v["descs"][$y];$N[]=idf_escape($d).($pe?"(".(+$pe).")":"").($Vb?" DESC":"");$e[]=$d;$qe[]=($pe?$pe:null);$Wb[]=$Vb;}}if($e){$Dc=$w[$C];if($Dc){ksort($Dc["columns"]);ksort($Dc["lengths"]);ksort($Dc["descs"]);if($v["type"]==$Dc["type"]&&array_values($Dc["columns"])===$e&&(!$Dc["lengths"]||array_values($Dc["lengths"])===$qe)&&array_values($Dc["descs"])===$Wb){unset($w[$C]);continue;}}$c[]=array($v["type"],$C,$N);}}}foreach($w
as$C=>$Dc)$c[]=array($Dc["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),lang(173),alter_indexes($a,$c));}page_header(lang(125),$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$J["indexes"][$y]["columns"][]="";}$v=end($J["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$J["indexes"]=$w;}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">',lang(174),'<th><input type="submit" class="wayoff">',lang(175),'<th id="label-name">',lang(176);?>
<th><noscript><input type='image' class='icon' name='add[0]' src='" . h(preg_replace("~\\?.*~", "", ME) . "?file=plus.gif&version=4.5.0") . "' alt='+' title='<?php echo
lang(101),'\'></noscript>&nbsp;
</thead>
';if($ag){echo"<tr><td>PRIMARY<td>";foreach($ag["columns"]as$y=>$d){echo
select_input(" disabled",$p,$d),"<label><input disabled type='checkbox'>".lang(56)."</label> ";}echo"<td><td>\n";}$Xd=1;foreach($J["indexes"]as$v){if(!$_POST["drop_col"]||$Xd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$Xd][type]",array(-1=>"")+$Dd,$v["type"],($Xd==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$d){echo"<span>".select_input(" name='indexes[$Xd][columns][$s]' title='".lang(45)."'",($p?array_combine($p,$p):$p),$d,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$Xd][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".lang(99)."'>":""),($x!="sql"?checkbox("indexes[$Xd][descs][$s]",1,$v["descs"][$y],lang(56)):"")," </span>";$s++;}echo"<td><input name='indexes[$Xd][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$Xd]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.5.0")."' alt='x' title='".lang(104)."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$Xd++;}echo'</table>
<p>
<input type="submit" value="',lang(14),'">
<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(177),drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),lang(178),rename_database($C,$J["collation"]));}else{$l=explode("\n",str_replace("\r","",$C));$yh=true;$je="";foreach($l
as$m){if(count($l)==1||$m!=""){if(!create_database($m,$J["collation"]))$yh=false;$je=$m;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($je),lang(179),$yh);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),lang(180));}}page_header(DB!=""?lang(64):lang(108),$n,array(),h(DB));$qb=collations();$C=DB;if($_POST)$C=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$qb);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$kd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$kd,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($qb?html_select("collation",array(""=>"(".lang(94).")")+$qb,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if(DB!="")echo"<input type='submit' name='drop' value='".lang(120)."'>".confirm(lang(168,DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.5.0")."' alt='+' title='".lang(101)."'>\n";echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,lang(181));else{$C=trim($J["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,lang(182));elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,lang(183));else
redirect($_);}}page_header($_GET["ns"]!=""?lang(65):lang(66),$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".lang(120)."'>".confirm(lang(168,$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header(lang(184).": ".h($da),$n);$Lg=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Bd=array();$Af=array();foreach($Lg["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$Af[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Bd[]=$s;}if(!$n&&$_POST){$ab=array();foreach($Lg["fields"]as$y=>$o){if(in_array($y,$Bd)){$X=process_input($o);if($X===false)$X="''";if(isset($Af[$y]))$g->query("SET @".idf_escape($o["field"])." = $X");}$ab[]=(isset($Af[$y])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$ab).")";echo"<p><code class='jush-$x'>".h($G)."</code> <a href='".h(ME)."sql=".urlencode($G)."'>".lang(10)."</a>\n";if(!$g->multi_query($G))echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$H=$g->store_result();if(is_object($H))select($H,$h);else
echo"<p class='message'>".lang(185,$g->affected_rows)."\n";}while($g->next_result());if($Af)select($g->query("SELECT ".implode(", ",$Af)));}}echo'
<form action="" method="post">
';if($Bd){echo"<table cellspacing='0'>\n";foreach($Bd
as$y){$o=$Lg["fields"][$y];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(184),'">
<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Ee=($_POST["drop"]?lang(186):($C!=""?lang(187):lang(188)));$A=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Lh=array();foreach($J["source"]as$y=>$X)$Lh[$y]=$J["target"][$y];$J["target"]=$Lh;}if($x=="sqlite")queries_redirect($A,$Ee,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$fc="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$fc,$A,$Ee);else{query_redirect($c.($C!=""?"$fc,":"")."\nADD".format_foreign_key($J),$A,$Ee);$n=lang(189)."<br>$n";}}}page_header(lang(190),$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($C!=""){$cd=foreign_keys($a);$J=$cd[$C];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}$lh=array_keys(fields($a));$Lh=($a===$J["table"]?$lh:array_keys(fields($J["table"])));$vg=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($J["db"]==""&&$J["ns"]==""){echo
lang(191),':
',html_select("table",$vg,$J["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(192),'"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">',lang(127),'<th id="label-target">',lang(128),'</thead>
';$Xd=0;foreach($J["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$lh,$X,($Xd==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$Lh,$J["target"][$y],1,"label-target");$Xd++;}echo'</table>
<p>
',lang(96),': ',html_select("on_delete",array(-1=>"")+explode("|",$hf),$J["on_delete"]),' ',lang(95),': ',html_select("on_update",array(-1=>"")+explode("|",$hf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="',lang(14),'">
<noscript><p><input type="submit" name="add" value="',lang(193),'"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,$C));}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$yf="VIEW";if($x=="pgsql"&&$a!=""){$O=table_status($a);$yf=strtoupper($O["Engine"]);}if($_POST&&!$n){$C=trim($J["name"]);$Ha=" AS\n$J[select]";$A=ME."table=".urlencode($C);$Ee=lang(194);$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$C&&$x!="sqlite"&&$T=="VIEW"&&$yf=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ha,$A,$Ee);else{$Nh=$C."_adminer_".uniqid();drop_create("DROP $yf ".table($a),"CREATE $T ".table($C).$Ha,"DROP $T ".table($C),"CREATE $T ".table($Nh).$Ha,"DROP $T ".table($Nh),($_POST["drop"]?substr(ME,0,-1):$A),lang(195),$Ee,lang(196),$a,$C);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($yf!="VIEW");if(!$n)$n=error();}page_header(($a!=""?lang(41):lang(197)),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>',lang(176),': <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],lang(122)):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,$a));}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Od=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$uh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(198));elseif(in_array($J["INTERVAL_FIELD"],$Od)&&isset($uh[$J["STATUS"]])){$Qg="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(199):lang(200)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Qg.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$Qg)."\n".$uh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(201).": ".h($aa):lang(202)),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(176),'<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">',lang(203),'<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">',lang(204),'<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>',lang(205),'<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Od,$J["INTERVAL_FIELD"]),'<tr><th>',lang(111),'<td>',html_select("STATUS",$uh,$J["STATUS"]),'<tr><th>',lang(47),'<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",lang(206)),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,$aa));}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$Lg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$Nh="$J[name]_adminer_".uniqid();drop_create("DROP $Lg ".idf_escape($da),create_routine($Lg,$J),"DROP $Lg ".idf_escape($J["name"]),create_routine($Lg,array("name"=>$Nh)+$J),"DROP $Lg ".idf_escape($Nh),substr(ME,0,-1),lang(207),lang(208),lang(209),$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?lang(210):lang(211)).": ".h($da):(isset($_GET["function"])?lang(212):lang(213))),$n);if(!$_POST&&$da!=""){$J=routine($da,$Lg);$J["name"]=$da;}$qb=get_vals("SHOW CHARACTER SET");sort($qb);$Mg=routine_languages();echo'
<form action="" method="post" id="form">
<p>',lang(176),': <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',($Mg?lang(19).": ".html_select("language",$Mg,$J["language"]):""),'<input type="submit" value="',lang(14),'">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$qb,$Lg);if(isset($_GET["function"])){echo"<tr><td>".lang(214);edit_type("returns",$J["returns"],$qb);}echo'</table>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,$da));}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$C=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,lang(215));elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,lang(216));elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,lang(217));else
redirect($_);}page_header($fa!=""?lang(218).": ".h($fa):lang(219),$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="',lang(14),'">
';if($fa!="")echo"<input type='submit' name='drop' value='".lang(120)."'>".confirm(lang(168,$fa))."\n";echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,lang(220));else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$_,lang(221));}page_header($ga!=""?lang(222).": ".h($ga):lang(223),$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".lang(120)."'>".confirm(lang(168,$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".lang(14)."'>\n";}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$ni=trigger_options();$J=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$ni["Timing"])&&in_array($_POST["Event"],$ni["Event"])&&in_array($_POST["Type"],$ni["Type"])){$gf=" ON ".table($a);$fc="DROP TRIGGER ".idf_escape($C).($x=="pgsql"?$gf:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($fc,$A,lang(224));else{if($C!="")queries($fc);queries_redirect($A,($C!=""?lang(225):lang(226)),queries(create_trigger($gf,$_POST)));if($C!="")queries(create_trigger($gf,$J+array("Type"=>reset($ni["Type"]))));}}$J=$_POST;}page_header(($C!=""?lang(227).": ".h($C):lang(228)),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>',lang(229),'<td>',html_select("Timing",$ni["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>',lang(230),'<td>',html_select("Event",$ni["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$ni["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>',lang(46),'<td>',html_select("Type",$ni["Type"],$J["Type"]),'</table>
<p>',lang(176),': <input name="Trigger" value="',h($J["Trigger"]),'" maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($C!=""){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,$C));}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$fg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Bb)$fg[$Bb][$J["Privilege"]]=$J["Comment"];}$fg["Server Admin"]+=$fg["File access on server"];$fg["Databases"]["Create routine"]=$fg["Procedures"]["Create routine"];unset($fg["Procedures"]["Create routine"]);$fg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$fg["Columns"][$X]=$fg["Tables"][$X];unset($fg["Server Admin"]["Usage"]);foreach($fg["Tables"]as$y=>$X)unset($fg["Databases"][$y]);$Re=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$Re[$X]=(array)$Re[$X]+(array)$_POST["grants"][$y];}$ld=array();$ef="";if(isset($_GET["host"])&&($H=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$B[1],$xe,PREG_SET_ORDER)){foreach($xe
as$X){if($X[1]!="USAGE")$ld["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$ld["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$B))$ef=$B[1];}}if($_POST&&!$n){$ff=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $ff",ME."privileges=",lang(231));else{$Te=q($_POST["user"])."@".q($_POST["host"]);$Nf=$_POST["pass"];if($Nf!=''&&!$_POST["hashed"]){$Nf=$g->result("SELECT PASSWORD(".q($Nf).")");$n=!$Nf;}$Gb=false;if(!$n){if($ff!=$Te){$Gb=queries(($g->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $Te IDENTIFIED BY PASSWORD ".q($Nf));$n=!$Gb;}elseif($Nf!=$ef)queries("SET PASSWORD FOR $Te = ".q($Nf));}if(!$n){$Ig=array();foreach($Re
as$Ze=>$kd){if(isset($_GET["grant"]))$kd=array_filter($kd);$kd=array_keys($kd);if(isset($_GET["grant"]))$Ig=array_diff(array_keys(array_filter($Re[$Ze],'strlen')),$kd);elseif($ff==$Te){$cf=array_keys((array)$ld[$Ze]);$Ig=array_diff($cf,$kd);$kd=array_diff($kd,$cf);unset($ld[$Ze]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Ze,$B)&&(!grant("REVOKE",$Ig,$B[2]," ON $B[1] FROM $Te")||!grant("GRANT",$kd,$B[2]," ON $B[1] TO $Te"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($ff!=$Te)queries("DROP USER $ff");elseif(!isset($_GET["grant"])){foreach($ld
as$Ze=>$Ig){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Ze,$B))grant("REVOKE",array_keys($Ig),$B[2]," ON $B[1] FROM $Te");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(232):lang(233)),!$n);if($Gb)$g->query("DROP USER $Te");}}page_header((isset($_GET["host"])?lang(33).": ".h("$ha@$_GET[host]"):lang(139)),$n,array("privileges"=>array('',lang(68))));if($_POST){$J=$_POST;$ld=$Re;}else{$J=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$ef;if($ef!="")$J["hashed"]=true;$ld[(DB==""||$ld?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(32),'<td><input name="host" maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="user" maxlength="16" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input name="pass" id="pass" value="',h($J["pass"]),'">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo
checkbox("hashed",1,$J["hashed"],lang(234),"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".lang(68).doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($ld
as$Ze=>$kd){echo'<th>'.($Ze!="*.*"?"<input name='objects[$s]' value='".h($Ze)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(32),"Databases"=>lang(35),"Tables"=>lang(124),"Columns"=>lang(45),"Procedures"=>lang(235),)as$Bb=>$Vb){foreach((array)$fg[$Bb]as$eg=>$vb){echo"<tr".odd()."><td".($Vb?">$Vb<td":" colspan='2'").' lang="en" title="'.h($vb).'">'.h($eg);$s=0;foreach($ld
as$Ze=>$kd){$C="'grants[$s][".h(strtoupper($eg))."]'";$Y=$kd[strtoupper($eg)];if($Bb=="Server Admin"&&$Ze!=(isset($ld["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".lang(236)."<option value='0'".($Y=="0"?" selected":"").">".lang(237)."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$C value='1'".($Y?" checked":"").($eg=="All privileges"?" id='grants-$s-all'>":">".($eg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(14),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(120),'">',confirm(lang(168,"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$ee=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$ee++;}queries_redirect(ME."processlist=",lang(238,$ee),$ee||!$_POST["kill"]);}page_header(lang(109),$n);echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$J){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"");foreach($J
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$x=="sql"?"Id":"pid"],0):"");foreach($J
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.lang(239).'</a>':nbsp($X));echo"\n";}echo'</table>
',script("tableCheck();"),'<p>
';if(support("kill")){echo($s+1)."/".lang(240,max_connections()),"<p><input type='submit' value='".lang(241)."'>\n";}echo'<input type="hidden" name="token" value="',$ci,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$p=fields($a);$cd=column_foreign_keys($a);$bf="";if($R["Oid"]){$bf=($x=="sqlite"?"rowid":"oid");$w[]=array("type"=>"PRIMARY","columns"=>array($bf));}parse_str($_COOKIE["adminer_import"],$za);$Jg=array();$e=array();$Rh=null;foreach($p
as$y=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$e[$y]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$Rh=$b->selectLengthProcess();}$Jg+=$o["privileges"];}list($L,$md)=$b->selectColumnsProcess($e,$w);$Sd=count($md)<count($L);$Z=$b->selectSearchProcess($p,$w);$rf=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();$hd=($L?implode(", ",$L):"*".($bf?", $bf":"")).convert_fields($e,$p,$L)."\nFROM ".table($a);$nd=($md&&$Sd?"\nGROUP BY ".implode(", ",$md):"").($rf?"\nORDER BY ".implode(", ",$rf):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$ui=>$J){$Ha=convert_field($p[key($J)]);$L=array($Ha?$Ha:idf_escape(key($J)));$Z[]=where_check($ui,$p);$I=$dc->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}if($_POST&&!$n){$Ui=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$gb=array();foreach($_POST["check"]as$db)$gb[]=where_check($db,$p);$Ui[]="((".implode(") OR (",$gb)."))";}$Ui=($Ui?"\nWHERE ".implode(" AND ",$Ui):"");$ag=$wi=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$ag=array_flip($v["columns"]);$wi=($L?$ag:array());break;}}foreach((array)$wi
as$y=>$X){if(in_array(idf_escape($y),$L))unset($wi[$y]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$wi===array())$G="SELECT $hd$Ui$nd";else{$si=array();foreach($_POST["check"]as$X)$si[]="(SELECT".limit($hd,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$nd,1).")";$G=implode(" UNION ALL ",$si);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$cd)){if($_POST["save"]||$_POST["delete"]){$H=true;$_a=0;$N=array();if(!$_POST["delete"]){foreach($e
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$N){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($wi===array()&&is_array($_POST["check"]))||$Sd){$H=($_POST["delete"]?$dc->delete($a,$Ui):($_POST["clone"]?queries("INSERT $G$Ui"):$dc->update($a,$N,$Ui)));$_a=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Qi="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$dc->delete($a,$Qi,1):($_POST["clone"]?queries("INSERT".limit1($G,$Qi)):$dc->update($a,$N,$Qi)));if(!$H)break;$_a+=$g->affected_rows;}}}$Ee=lang(242,$_a);if($_POST["clone"]&&$H&&$_a==1){$ke=last_id();if($ke)$Ee=lang(161," $ke");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Ee,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(243);else{$H=true;$_a=0;foreach($_POST["val"]as$ui=>$J){$N=array();foreach($J
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$H=$dc->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($ui,$p),!($Sd||$wi===array())," ");if(!$H)break;$_a+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(242,$_a),$H);}}elseif(!is_string($Sc=get_file("csv_file",true)))$n=upload_error($Sc);elseif(!preg_match('~~u',$Sc))$n=lang(244);else{cookie("adminer_import","output=".urlencode($za["output"])."&format=".urlencode($_POST["separator"]));$H=true;$sb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Sc,$xe);$_a=count($xe[0]);$dc->begin();$Zg=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($xe[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$Zg]*)$Zg~",$X.$Zg,$ye);if(!$y&&!array_diff($ye[1],$sb)){$sb=$ye[1];$_a--;}else{$N=array();foreach($ye[1]as$s=>$nb)$N[idf_escape($sb[$s])]=($nb==""&&$p[$sb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$nb))));$K[]=$N;}}$H=(!$K||$dc->insertUpdate($a,$K,$ag));if($H)$H=$dc->commit();queries_redirect(remove_from_uri("page"),lang(245,$_a),$H);$dc->rollback();}}}$Dh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(50).": $Dh",$n);$N=null;if(isset($Jg["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($cd[$X["col"]]&&count($cd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$e&&support("table"))echo"<p class='error'>".lang(246).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$e);$b->selectSearchPrint($Z,$e,$w);$b->selectOrderPrint($rf,$e,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($Rh);$b->selectActionPrint($w);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$fd=$g->result(count_rows($a,$Z,$Sd,$md));$E=floor(max(0,$fd-1)/$z);}$Vg=$L;if(!$Vg){$Vg[]="*";if($bf)$Vg[]=$bf;}$Cb=convert_fields($e,$p,$L);if($Cb)$Vg[]=substr($Cb,2);$H=$dc->select($a,$Vg,$Z,$md,$rf,$z,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$E)$H->seek($z*$E);$sc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$x=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$z!=""&&$md&&$Sd&&$x=="sql")$fd=$g->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".lang(12)."\n";else{$Qa=$b->backwardKeys($a,$Dh);echo"<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$md&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(247)."</a>");$Qe=array();$jd=array();reset($L);$qg=1;foreach($K[0]as$y=>$X){if($y!=$bf){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$y];$C=($o?$b->fieldName($o,$qg):($X["fun"]?"*":$y));if($C!=""){$qg++;$Qe[$y]=$C;$d=idf_escape($y);$yd=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Vb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($yd.($rf[0]==$d||$rf[0]==$y||(!$rf&&$Sd&&$md[0]==$d)?$Vb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($yd.$Vb)."' title='".lang(56)."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(53).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$jd[$y]=$X["fun"];next($L);}}$qe=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$y=>$X)$qe[$y]=max($qe[$y],min(40,strlen(utf8_decode($X))));}}echo($Qa?"<th>".lang(248):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$cd)as$Pe=>$J){$ti=unique_array($K[$Pe],$w);if(!$ti){$ti=array();foreach($K[$Pe]as$y=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$y))$ti[$y]=$X;}}$ui="";foreach($ti
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($g).")").")";$X=md5($X);}$ui.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$md&&$L?"":"<td>".checkbox("check[]",substr($ui,1),in_array(substr($ui,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Sd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$ui)."'>".lang(249)."</a>"));foreach($J
as$y=>$X){if(isset($Qe[$y])){$o=$p[$y];if($X!=""&&(!isset($sc[$y])||$sc[$y]!=""))$sc[$y]=(is_mail($X)?$Qe[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$ui;if(!$_&&$X!==null){foreach((array)$cd[$y]as$q){if(count($cd[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$lh)$_.=where_link($s,$q["target"][$s],$K[$Pe][$lh]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$ti))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($ti
as$Yd=>$W)$_.=where_link($s++,$Yd,$W);}$X=select_value($X,$_,$o,$Rh);$t=h("val[$ui][".bracket_escape($y)."]");$Y=$_POST["val"][$ui][bracket_escape($y)];$nc=!is_array($J[$y])&&is_utf8($X)&&$K[$Pe][$y]==$J[$y]&&!$jd[$y];$Qh=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$nc)||$Y!==null){$pd=h($Y!==null?$Y:$J[$y]);echo"<td>".($Qh?"<textarea name='$t' cols='30' rows='".(substr_count($J[$y],"\n")+1)."'>$pd</textarea>":"<input name='$t' value='$pd' size='$qe[$y]'>");}else{$ue=strpos($X,"<i>...</i>");echo"<td id='$t'>$X</td>",script("qsl('td').onclick = partialArg(selectClick, ".($ue?2:($Qh?1:0)).($nc?"":", '".h(lang(250))."'").");","");}}}if($Qa)echo"<td>";$b->backwardKeysPrint($Qa,$K[$Pe]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($K||$E)&&!is_ajax()){$Bc=true;if($_GET["page"]!="last"){if($z=="")$fd=count($K);elseif($x!="sql"||!$Sd){$fd=($Sd?false:found_rows($R,$Z));if($fd<max(1e4,2*($E+1)*$z))$fd=reset(slow_query(count_rows($a,$Z,$Sd,$md)));else$Bc=false;}}if($z!=""&&($fd===false||$fd>$z||$E)){echo"<p class='pages'>";$_e=($fd===false?$E+(count($K)>=$z?2:1):floor(($fd-1)/$z));if($x!="simpledb"){echo'<a href="'.h(remove_from_uri("page")).'">'.lang(251)."</a>:",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(251)."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" ...":"");for($s=max(1,$E-4);$s<min($_e,$E+5);$s++)echo
pagination($s,$E);if($_e>0){echo($E+5<$_e?" ...":""),($Bc&&$fd!==false?pagination($_e,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$_e'>".lang(252)."</a>");}echo(($fd===false?count($K)+1:$fd-$E*$z)>$z?' <a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.lang(253).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(254)."...');",""):'');}else{echo
lang(251).":",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($_e>$E?pagination($E+1,$E).($_e>$E+1?" ...":""):"");}}echo"<p class='count'>\n",($fd!==false?"(".($Bc?"":"~ ").lang(143,$fd).") ":"");$ac=($Bc?"":"~ ").$fd;echo
checkbox("all",1,0,lang(255),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ac' : checked); selectCount('selected2', this.checked || !checked ? '$ac' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(247),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(243).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(119),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(239),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$dd=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($dd['sql']);break;}}if($dd){print_fieldset("export",lang(70)." <span id='selected2'></span>");$Bf=$b->dumpOutput();echo($Bf?html_select("output",$Bf,$za["output"])." ":""),html_select("format",$dd,$za["format"])," <input type='submit' name='export' value='".lang(70)."'>\n","</div></fieldset>\n";}echo(!$md&&$L?"":script("tableCheck();"));}if($b->selectImportPrint()){print_fieldset("import",lang(69),!$K);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$za["format"],1);echo" <input type='submit' name='import' value='".lang(69)."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($sc,'strlen'),$e);echo"<p><input type='hidden' name='token' value='$ci'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$O=isset($_GET["status"]);page_header($O?lang(111):lang(110));$Ji=($O?show_status():show_variables());if(!$Ji)echo"<p class='message'>".lang(12)."\n";else{echo"<table cellspacing='0'>\n";foreach($Ji
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($O?"status":"set")."'>".h($y)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Ah=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$R){json_row("Comment-$C",nbsp($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$y)json_row("$y-$C",nbsp($R[$y]));foreach($Ah+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($R[$y]!=""){$X=format_number($R[$y]);json_row("$y-$C",($y=="Rows"&&$X&&$R["Engine"]==($ph=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Ah[$y]))$Ah[$y]+=($R["Engine"]!="InnoDB"||$y!="Data_free"?$R[$y]:0);}elseif(array_key_exists($y,$R))json_row("$y-$C");}}}foreach($Ah
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));elseif($_GET["script"]=="version"){$gd=file_open_lock(get_temp_dir()."/adminer.version");if($gd)file_write_unlock($gd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));}else{foreach(count_tables($b->databases())as$m=>$X){json_row("tables-$m",$X);json_row("size-$m",db_size($m));}json_row("");}exit;}else{$Jh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Jh&&!$n&&!$_POST["search"]){$H=true;$Ee="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$Ee=lang(256);}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ee=lang(257);}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ee=lang(258);}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$Ee=lang(259);}elseif($x!="sql"){$H=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Ee=lang(260);}elseif(!$_POST["tables"])$Ee=lang(9);elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$Ee.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Ee,$H);}page_header(($_GET["ns"]==""?lang(35).": ".h(DB):lang(73).": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".lang(261)."</h3>\n";$Ih=tables_list();if(!$Ih)echo"<p class='message'>".lang(9)."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".lang(262)." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".lang(53)."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!="")search_tables();}$bc=doc_link(array('sql'=>'show-table-status.html'));echo"<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.lang(124),'<td>'.lang(263).doc_link(array('sql'=>'storage-engines.html')),'<td>'.lang(115).doc_link(array('sql'=>'charset-mysql.html')),'<td>'.lang(264).$bc,'<td>'.lang(265).$bc,'<td>'.lang(266).$bc,'<td>'.lang(48).doc_link(array('sql'=>'example-auto-increment.html')),'<td>'.lang(267).$bc,(support("comment")?'<td>'.lang(47).$bc:''),"</thead>\n";$S=0;foreach($Ih
as$C=>$T){$Mi=($T!==null&&!preg_match('~table~i',$T));$t=h("Table-".$C);echo'<tr'.odd().'><td>'.checkbox(($Mi?"views[]":"tables[]"),$C,in_array($C,$Jh,true),"","formUncheck('check-all');","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($C)."' title='".lang(40)."' id='$t'>".h($C).'</a>':h($C));if($Mi){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.lang(41).'">'.(preg_match('~materialized~i',$T)?lang(122):lang(123)).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.lang(39).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(42)),"Index_length"=>array("indexes",lang(126)),"Data_free"=>array("edit",lang(43)),"Auto_increment"=>array("auto_increment=1&create",lang(42)),"Rows"=>array("select",lang(39)),)as$y=>$_){$t=" id='$y-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($C)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($C)."'>&nbsp;");}$S++;}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".lang(240,count($Ih)),"<td>".nbsp($x=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>&nbsp;";echo"</table>\n";if(!information_schema(DB)){$Gi="<input type='submit' value='".lang(268)."'> ".on_help("'VACUUM'");$nf="<input type='submit' name='optimize' value='".lang(269)."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".lang(119)." <span id='selected'></span></legend><div>".($x=="sqlite"?$Gi:($x=="pgsql"?$Gi.$nf:($x=="sql"?"<input type='submit' value='".lang(270)."'> ".on_help("'ANALYZE TABLE'").$nf."<input type='submit' name='check' value='".lang(271)."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".lang(272)."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".lang(273)."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".lang(120)."'>".on_help("'DROP TABLE'").confirm()."\n";$l=(support("scheme")?$b->schemas():$b->databases());if(count($l)!=1&&$x!="sqlite"){$m=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(274).": ",($l?html_select("target",$l,$m):'<input name="target" value="'.h($m).'" autocapitalize="off">')," <input type='submit' name='move' value='".lang(275)."'>",(support("copy")?" <input type='submit' name='copy' value='".lang(276)."'>":""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$ci'>\n","</div></fieldset>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.lang(71)."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.lang(197)."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".lang(136)."</h3>\n";$Ng=routines();if($Ng){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(176).'<td>'.lang(46).'<td>'.lang(214)."<td>&nbsp;</thead>\n";odd('');foreach($Ng
as$J){echo'<tr'.odd().'>','<th><a href="'.h(ME).($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["ROUTINE_NAME"]).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["ROUTINE_NAME"]).'">'.lang(129)."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(213).'</a>':'').'<a href="'.h(ME).'function=">'.lang(212)."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".lang(277)."</h3>\n";$bh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($bh){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(176)."</thead>\n";odd('');foreach($bh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".lang(219)."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".lang(24)."</h3>\n";$Ei=types();if($Ei){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(176)."</thead>\n";odd('');foreach($Ei
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".lang(223)."</a>\n";}if(support("event")){echo"<h3 id='events'>".lang(137)."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(176)."<td>".lang(278)."<td>".lang(203)."<td>".lang(204)."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?lang(279)."<td>".$J["Execute at"]:lang(205)." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.lang(129).'</a>';}echo"</table>\n";$_c=$g->result("SELECT @@event_scheduler");if($_c&&$_c!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($_c)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.lang(202)."</a>\n";}if($Ih)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();