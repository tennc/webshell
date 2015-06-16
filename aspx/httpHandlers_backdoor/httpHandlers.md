修改web.config，添加或者修改httpHandlers:

```
  <httpHandlers>
    <add path="*.api" verb="*" type="WooYun.CustomizeHttpHandler"/>
  </httpHandlers>
```
如果已经存在 httpHandlers 则在标签内添加，如果<system.webServer>也有配置httpHandlers那么就配置在<system.webServer>里

但是有一点需要特别注意：<system.webServer>里面一定要配置runAllManagedModulesForAllRequests为true,否会启动报错。
```
  <system.webServer>
    <modules runAllManagedModulesForAllRequests="true" />
  </system.webServer>
```

