# Solution


``` python
import base64
import pickle
data="gASVWgAAAAAAAAB9lCiMBWJvYXJklF2UKF2UKIwBT5RoBE5lXZQoaASMAViUaAZlXZQoTmgGaAZlZYwEdHVybpRoBIwIZmluaXNoZWSUiYwGd2lubmVylIwAlIwEc2FuZZSIdS4="
game=base64.b64decode(data)
exploit=pickle.loads(game)

exploit["board"]=[['O', 'O', 'X'], ['O', None, 'X'], [None, 'X', 'X']]
#exploit["turn"]="X"

print( base64.b64encode(pickle.dumps(exploit)).decode('utf-8'))
```


