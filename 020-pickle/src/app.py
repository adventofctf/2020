import random
from flask import Flask, render_template_string, render_template, request, make_response, redirect, url_for
import os
import pickle
import base64

app = Flask(__name__)
app.config['SECRET_KEY'] = 'Leer alles over Software Security bij Arjen (follow @credmp) at https://www.novi.nl'

flag = "NOVI{santa_only_cheats_in_a_pickle}"

@app.route('/', methods=['GET', 'POST'])
def index():
    game=get_game(request)

    # Reset computed fields
    game["winner"] = None
    game["finished"] = False

    sane = is_sane(game["board"], game["turn"])

    if sane == False:
        game = reset_board()

    game["sane"] = sane

    win=winner(game["board"])
    if win[0] == True:
        game["finished"]=True
        game["winner"]=win[1]

    resp = make_response( render_template("index.html", board=game["board"], turn=game["turn"], finished=game["finished"], winner=game["winner"], sane=game["sane"] ) )
    set_cookie(resp, game)
    return resp

@app.route("/play/<int:row>/<int:col>")
def play(row, col):
    game=get_game(request)

    game["board"][row][col] = game["turn"]
    
    if game["turn"] == "X":
        game["turn"] = "O"
    else:
        game["turn"] = "X"

        
    resp = make_response(redirect(url_for("index")))
    set_cookie(resp, game)
    return resp


@app.route("/reset")
def reset():
    game=reset_board()
    resp = make_response(redirect(url_for("index")))
    set_cookie(resp, game)
    return resp
                         

def set_cookie(resp, game):
    resp.set_cookie('game', base64.b64encode(pickle.dumps(game)).decode('utf-8'), secure=True, domain="20.adventofctf.com")
    
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
    game["board"] = [["O", "O", None], ["O","X","X"], [None,"X","X"]]
    game["turn"] = "O"
    game["finished"]=False
    game["winner"]=""
    game["sane"]=True
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
