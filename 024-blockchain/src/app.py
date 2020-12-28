import random
from flask import Flask, render_template_string, render_template, request, make_response, redirect, url_for
import os
import pickle
import base64
import hashlib
import copy

app = Flask(__name__)
app.config['SECRET_KEY'] = 'Leer alles over Software Security bij Arjen (follow @credmp) at https://www.novi.nl'

@app.route('/', methods=['GET', 'POST'])
def index():
    game=get_game(request)

    # Reset computed fields
    game["winner"] = None
    game["finished"] = False
    
    #print("CHAIN: %s" % game["chain"])
    #print("VERIFY: %s" % verify_chain(game))
    
    sane = is_sane(game["board"], game["turn"])
    blockchain = verify_chain(game)

    if sane == False or blockchain == False:
        game = reset_board()

    if len(game["chain"]) == 0:
        blockchain = False
        game = reset_board()
        
    game["sane"] = sane
    game["blockchain"] = blockchain

    win=winner(game["board"])
    if win[0] == True:
        game["finished"]=True
        game["winner"]=win[1]

    resp = make_response( render_template("index.html", board=game["board"], turn=game["turn"], finished=game["finished"], winner=game["winner"], sane=game["sane"], blockchain=game["blockchain"] ) )
    set_cookie(resp, game)
    return resp

@app.route("/play/<int:row>/<int:col>")
def play(row, col):
    game=get_game(request)


    #print("- Before: %s" % game["chain"])
    #print("PLAY VERIFY: %s" % verify_chain(game))
    #print("- After: %s" % game["chain"])
    
    game["board"][row][col] = game["turn"]
    
    if game["turn"] == "X":
        game["turn"] = "O"
    else:
        game["turn"] = "X"

    #print("- Before: %s" % game)
    block =compute_block(copy.deepcopy(game))
    #print("++ NEW BLOCK: %s" % block)
    game["chain"].append(block)
    #print("- After: %s" % game)
        
    resp = make_response(redirect(url_for("index")))
    set_cookie(resp, game)
    return resp


@app.route("/reset")
def reset():
    game=reset_board()
    resp = make_response(redirect(url_for("index")))
    set_cookie(resp, game)
    return resp

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

def verify_chain(game):
    board=game["board"]
    chain = game["chain"]

    if len(chain) > 0:
        if board != chain[-1]["board"]:
            return False
        
    for i in range(len(chain)):
        block=chain[i]
        h = hash_board(block["board"])
        h = hash_string(h + block["prev"])
        if h != block["hash"]:
            return False
    return True

def compute_block(game):
    #print("-- GAME: %s " % game)
    board = game["board"]
    chain = game["chain"]

    # There is a previous chain
    if len(chain) > 0:
        prev = chain[-1]
    else:
        prev = {}
        prev["hash"] = hash_string("SANTAROCKS")

    #print("BOARD: %s" % board )
    h = hash_board(board)
    h = hash_string(h + prev["hash"])
    return {"board": board, "prev": prev["hash"], "hash": h}

def set_cookie(resp, game):
    resp.set_cookie('game', base64.b64encode(pickle.dumps(game)).decode('utf-8'), secure=True, domain="24.adventofctf.com")
    
def get_game(request):
    cookie=request.cookies.get('game')
    try:
        if cookie != None:
            game=base64.b64decode(cookie)
            return pickle.loads(game)
        else:
            return reset_board()
    except:
        return reset_board()

def reset_board():
    game={}
    #game["board"] = [[None, None, None], [None,None,None], [None,None,None]]
    game["board"] = [['O', 'O', None], ['O', 'X', 'X'], [None, 'X', 'X']]
    #game["turn"] = "X"
    game["turn"] = "O"
    game["finished"]=False
    game["winner"]=""
    game["sane"]=True
    game["blockchain"]=True
    #game["chain"]=[]
    game["chain"]=[{'board': [[None, None, None], [None, None, None], [None, None, 'X']], 'prev': 'cef215c5be8cf63fcf3d43ecf2510b33', 'hash': 'e7dc8e1f7a6788bc0cb6841538b216e8'},
                   {'board': [['O', None, None], [None, None, None], [None, None, 'X']], 'prev': 'e7dc8e1f7a6788bc0cb6841538b216e8', 'hash': 'fc93236b5eea5f1d55e2b5b308d67390'},
                   {'board': [['O', None, None], [None, 'X', None], [None, None, 'X']], 'prev': 'fc93236b5eea5f1d55e2b5b308d67390', 'hash': 'a8dc0d3da290d1e894eaaffcb98398c9'},
                   {'board': [['O', 'O', None], [None, 'X', None], [None, None, 'X']], 'prev': 'a8dc0d3da290d1e894eaaffcb98398c9', 'hash': 'e74f5b22f5213ba4c2449759ce91c2aa'},
                   {'board': [['O', 'O', None], [None, 'X', 'X'], [None, None, 'X']], 'prev': 'e74f5b22f5213ba4c2449759ce91c2aa', 'hash': 'ef25514dffbf8247cff6063be90f2d54'},
                   {'board': [['O', 'O', None], ['O', 'X', 'X'], [None, None, 'X']], 'prev': 'ef25514dffbf8247cff6063be90f2d54', 'hash': 'e3a4c037bdf154b344ed9bd1643a629d'},
                   {'board': [['O', 'O', None], ['O', 'X', 'X'], [None, 'X', 'X']], 'prev': 'e3a4c037bdf154b344ed9bd1643a629d', 'hash': 'c240fa161737c967ece5fd94672ab0f8'}]
    return game

def is_sane(board, turn):
    x=0
    o=0
    
    for rows in board:
        for col in rows:
            if col == "X":
                x += 1
            if col == "O":
                o += 1

    if x == 0 and o == 0:
        return True

    if turn == "X" and x == o:
        return True

    if turn == "O" and x == (o+1):
        return True

    return False

def winner(board):
    #check rows
    for i in range(len(board)):
        if (board[i][0] == board[i][1] and  board[i][0] == board[i][2]):
            if(board[i][0] != None):
                return [True, board[i][0]]
            #check cols
    for i in range(len(board)):
        if (board[0][i] == board[1][i] and board[0][i] == board[2][i]):
            if board[0][i] != None:
                return [True, board[0][i]]
            #check diagonals
    if(board[0][0] == board[1][1] and board[0][0] == board[2][2]):
        if(board[0][0] != None):
            return [True, board[0][0]]
        #check diagonals
    if(board[2][0] == board[1][1] and board[2][0] == board[0][2]):
        if(board[2][0] != None):
            return [True, board[0][0]]
        #check if game is drawn
    for i in range(len(board)):
        for j in range(len(board)):
            if(board[i][j] == None):
                return [False, board[0][0]]

    #game is drawn since there is no winner 
    #and all boxes are filled
    return [False, "draw"]

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8000)
