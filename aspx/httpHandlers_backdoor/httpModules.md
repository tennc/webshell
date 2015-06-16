相比修改httpHandlers显然这种办法更加的有效且安全一些。但是一定要把这个httpModule的顺序配置到httpModules的第一个。
修改web.config，添加或者修改httpHandlers:

```
<httpModules>
    <add name="WooYun" type="WooYun.CustomizeHttpModule"/>
</httpModules>
```
