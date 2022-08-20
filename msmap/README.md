# MSMAP

Msmap is a Memory WebShell Generator. Compatible with various Containers, Components, Encoder, *WebShell / Proxy / Killer* and Management Clients. [简体中文](README_CN.md)

[The idea behind I](https://hosch3n.github.io/2022/08/08/Msmap%E5%86%85%E5%AD%98%E9%A9%AC%E7%94%9F%E6%88%90%E6%A1%86%E6%9E%B6%EF%BC%88%E4%B8%80%EF%BC%89/), [The idea behind II](https://hosch3n.github.io/2022/08/09/Msmap%E5%86%85%E5%AD%98%E9%A9%AC%E7%94%9F%E6%88%90%E6%A1%86%E6%9E%B6%EF%BC%88%E4%BA%8C%EF%BC%89/)

![](https://raw.githubusercontent.com/hosch3n/msmap/main/img/a.png)

![](https://raw.githubusercontent.com/hosch3n/msmap/main/img/b.png)

![](https://raw.githubusercontent.com/hosch3n/msmap/main/img/c.png)

<details>
<summary>Feature [WIP]</summary>

### Function

- [x] Dynamic Menu
- [x] Automatic Compilation
- [x] Generate Script
- [ ] Lite Mode
- [ ] Graphical Interface

### Container

- Java
  - [ ] Tomcat7
  - [x] Tomcat8
  - [x] Tomcat9
  - [x] Tomcat10
  - [ ] Resin3
  - [x] Resin4
  - [ ] WebSphere
  - [ ] GlassFish
  - [ ] WebLogic
  - [ ] JBoss
  - [ ] Spring
  - [ ] Netty
- .NET
  - [ ] IIS

### WebShell / Proxy / Killer

- WebShell
  - [x] CMD / SH
  - [x] AntSword
  - [x] JSPJS
  - [x] Behinder
  - [x] Godzilla

- No need for modularity

~~Proxy: Neo-reGeorg, wsproxy~~

~~Killer: java-memshell-scanner, ASP.NET-Memshell-Scanner~~

### Decoder / Decryptor / Hasher

- Decoder
  - [x] Base64
  - [ ] Hex
- Decryptor
  - [x] RC4
  - [x] AES128
  - [x] AES256
  - [ ] RSA
- Hasher
  - [x] MD5
  - [x] SHA128
  - [x] SHA256

</details>

## Usage

``` bash
git clone git@github.com:hosch3n/msmap.git
cd msmap
python generator.py
```

> [Warning] MUST set a unique password, Options are case sensitive.

### Advanced

Edit `config/environment.py`

``` python
# Auto Compile
auto_build = True

# Base64 Encode Class File
b64_class = True

# Generate Script File
generate_script = True

# Compiler Absolute Path
java_compiler_path = r"~/jdk1.6.0_04/bin/javac"
dotnet_compiler_path = r"C:\Windows\Microsoft.NET\Framework\v2.0.50727\csc.exe"
```

Edit `gist/java/container/tomcat/servlet.py`

``` java
// Servlet Path Pattern
private static String pattern = "*.xml";
```

WsFilter does not currently support automatic compilation. If an encryption encoder is used, the password needs to be the same as the path (eg `/passwd`)

## Example

<details>
<summary>CMD / SH</summary>

**Command** with **Base64** Encoder | Inject Tomcat Valve

`python generator.py Java Tomcat Valve Base64 CMD passwd`

</details>

<details>
<summary>AntSword</summary>

Type **JSP** with **default** Encoder | Inject Tomcat Valve

`python generator.py Java Tomcat Valve RAW AntSword passwd`

Type **JSP** with **[aes_128_ecb_pkcs7_padding_md5](extend/AntSword/encoder/aes_128_ecb_pkcs7_padding_md5.js)** Encoder | Inject Tomcat Listener

`python generator.py Java Tomcat Listener AES128 AntSword passwd`

Type **JSP** with **[rc_4_sha256](extend/AntSword/encoder/rc_4_sha256.js)** Encoder | Inject Tomcat Servlet

`python generator.py Java Tomcat Servlet RC4 AntSword passwd`

Type **JSPJS** with **[aes_128_ecb_pkcs7_padding_md5](extend/AntSword/encoder/aes_128_ecb_pkcs7_padding_md5.js)** Encoder | Inject Tomcat WsFilter

`python generator.py Java Tomcat WsFilter AES128 JSPJS passwd`

</details>

<details>
<summary>Behinder</summary>

Type **default_aes** | Inject Tomcat Valve

`python generator.py Java Tomcat Valve AES128 Behinder rebeyond`

</details>

<details>
<summary>Godzilla</summary>

Type **JAVA_AES_BASE64** | Inject Tomcat Valve

`python generator.py Java Tomcat Valve AES128 Godzilla superidol`

> [Known issue](https://github.com/BeichenDream/Godzilla/issues/76)

</details>

## Reference

[GodzillaMemoryShellProject](https://github.com/BeichenDream/GodzillaMemoryShellProject)

[AntSword-JSP-Template](https://github.com/AntSwordProject/AntSword-JSP-Template)

[As-Exploits memshell_manage](https://github.com/yzddmr6/As-Exploits/tree/master/core/memshell_manage)

[Behinder](https://github.com/rebeyond/Behinder) | [wsMemShell](https://github.com/veo/wsMemShell) | [ysomap](https://github.com/wh1t3p1g/ysomap)
