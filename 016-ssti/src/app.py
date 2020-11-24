import random
from flask import Flask, render_template_string, render_template, request
import os
import emojis

app = Flask(__name__)
app.config['SECRET_KEY'] = 'Leer alles over Software Security bij Arjen (follow @credmp) at https://www.novi.nl'

def magic(flag, key):
    return ''.join(chr(x ^ ord(flag[x]) ^ ord(key[::-1][x]) ^ ord(key[x])) for x in range(len(flag)))

file = open("/tmp/flag.txt", "r")
flag = file.read()

app.config['flag'] = magic(flag, '112f3a99b283a4e1788dedd8e0e5d35375c33747')
flag = ""

os.remove("/tmp/flag.txt")

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        emoji="unknown"
        try:
            p = request.values.get('emoji')
            if p != None:
                emoji = emojis.db.get_emoji_by_alias(p)
        except Exception as e:
            print(e)
            pass

        try:
            if emoji == None:
                return render_template_string("You entered an unknown emoji: %s" % p)
            else:
                return render_template_string("You entered %s which is %s. It's aliases %s" % (p, emoji.emoji, emoji.aliases))
        except Exception as e:
            print(e)
            return 'Exception'

    return render_template('index.html')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8000)
