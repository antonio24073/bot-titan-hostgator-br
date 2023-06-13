var http = require('http');


function generateReqId() {
	return "web-" + function random() {
		return Math.random().toString(36).substring(2) + (new Date).getTime().toString(36)
	}()
}

http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/html'});
  res.end(generateReqId());
}).listen(3001);