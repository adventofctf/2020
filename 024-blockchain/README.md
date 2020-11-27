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


Starting point:

``` python
import base64
import pickle

data="gASVGQMAAAAAAAB9lCiMBWJvYXJklF2UKF2UKIwBT5RoBE5lXZQoaASMAViUaAZlXZQoTmgGaAZlZYwEdHVybpRoBIwIZmluaXNoZWSUiYwGd2lubmVylIwAlIwEc2FuZZSIjApibG9ja2NoYWlulIiMBWNoYWlulF2UKH2UKIwFYm9hcmSUXZQoXZQoTk5OZV2UKE5OTmVdlChOTmgGZWWMBHByZXaUjCBjZWYyMTVjNWJlOGNmNjNmY2YzZDQzZWNmMjUxMGIzM5SMBGhhc2iUjCBlN2RjOGUxZjdhNjc4OGJjMGNiNjg0MTUzOGIyMTZlOJR1fZQojAVib2FyZJRdlChdlChoBE5OZV2UKE5OTmVdlChOTmgGZWWMBHByZXaUaBmMBGhhc2iUjCBmYzkzMjM2YjVlZWE1ZjFkNTVlMmI1YjMwOGQ2NzM5MJR1fZQojAVib2FyZJRdlChdlChoBE5OZV2UKE5oBk5lXZQoTk5oBmVljARwcmV2lGgijARoYXNolIwgYThkYzBkM2RhMjkwZDFlODk0ZWFhZmZjYjk4Mzk4YzmUdX2UKIwFYm9hcmSUXZQoXZQoaARoBE5lXZQoTmgGTmVdlChOTmgGZWWMBHByZXaUaCuMBGhhc2iUjCBlNzRmNWIyMmY1MjEzYmE0YzI0NDk3NTljZTkxYzJhYZR1fZQojAVib2FyZJRdlChdlChoBGgETmVdlChOaAZoBmVdlChOTmgGZWWMBHByZXaUaDSMBGhhc2iUjCBlZjI1NTE0ZGZmYmY4MjQ3Y2ZmNjA2M2JlOTBmMmQ1NJR1fZQojAVib2FyZJRdlChdlChoBGgETmVdlChoBGgGaAZlXZQoTk5oBmVljARwcmV2lGg9jARoYXNolIwgZTNhNGMwMzdiZGYxNTRiMzQ0ZWQ5YmQxNjQzYTYyOWSUdX2UKIwFYm9hcmSUXZQoXZQoaARoBE5lXZQoaARoBmgGZV2UKE5oBmgGZWWMBHByZXaUaEaMBGhhc2iUjCBjMjQwZmExNjE3MzdjOTY3ZWNlNWZkOTQ2NzJhYjBmOJR1ZXUu"

game=base64.b64decode(data)
exploit=pickle.loads(game)

exploit["board"]=[['O', 'O', 'X'], ['O', None, 'X'], [None, 'X', 'X']]
exploit["chain"][-1]["board"]=[['O', 'O', 'X'], ['O', None, 'X'], [None, 'X', 'X']]

def hash_string(string):
    #print("HASH STRING: %s" % string)
    return hashlib.md5(string.encode('utf-8')).hexdigest()

def hash_row(row):
    conv = lambda i : i or ' '
    res = [conv(i) for i in row] 
    return hash_string(' '.join(res))

def hash_board(board):
    acc = ""
    for row in board:
        acc += hash_row(row)
    return acc

print(hash_board(exploit["chain"][-1]["board"]))
h = hash_board(exploit["chain"][-1]["board"])
print(exploit["chain"][-1]["prev"])
h = hash_string(h + exploit["chain"][-1]["prev"])
print(h)
exploit["chain"][-1]["hash"]=h
print( base64.b64encode(pickle.dumps(exploit)).decode('utf-8'))
```
