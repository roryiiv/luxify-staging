var crypto = require('crypto-browserify');
var Buffer = require('buffer/').Buffer;

var makeSalt = function() {
  return crypto.randomBytes(16).toString('base64');
}

var password = function (password, salt) {
  var input_salt = salt || makeSalt();
  if (!password || !input_salt) return '';
  var newSalt = new Buffer(input_salt, 'base64');
  return crypto.pbkdf2Sync(password, newSalt, 10000, 64).toString('base64');
}

module.exports = {
  password: password,
  makeSalt: makeSalt,
};
window.encrypt = module.exports;
