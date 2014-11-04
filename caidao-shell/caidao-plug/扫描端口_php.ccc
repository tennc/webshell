for ($i=1; $i<255; $i++)
{

$strHost = "192.168.1.{$i}";
$fp = @fsockopen($strHost, 80, $errno, $errstr, 1);
if (!$fp)
{
	print "{$i}.{$errstr}\n";
}
else
{
	print "{$i}.open\n";
}

fclose($fp);

}