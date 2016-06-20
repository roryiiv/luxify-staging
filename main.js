var crypto = require('crypto-browserify');
var Buffer = require('buffer/').Buffer;

var encryptPassword = function (password) {
  var salt = "Tlwl/P/wufDFbMiAB2HUpQ==";
  //var salt = crypto.randomBytes(16).toString('base64');
  if (!password || !salt) return '';
  var newSalt = new Buffer(salt, 'base64');
  return crypto.pbkdf2Sync(password, newSalt, 10000, 64).toString('base64');
}

console.log(encryptPassword('small88car'));
