import subprocess
from flask import Flask, render_template_string, render_template, request
import os
import time

app = Flask(__name__)
app.config['SECRET_KEY'] = 'Come join my courses at NOVI Hogeschool.'


@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        try:
            p = request.values.get('place')
            if p != None:
                try:
                    cmd = './check %s' % p
                    result = subprocess.run(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE, shell=True, executable='/bin/bash')
                    err = result.stderr.decode('utf-8')

                    if err != None and len(err) > 0:
                        return "Something happened: " + err
                    else:
                        return "%s Destination check was OK" % time.time()
                except Exception as ex:
                    print(ex)
                    return 'Something went wrong'

                return "Destination check was OK"

        except Exception as e:
            print(e)
            return 'Something went wrong'

    return render_template('index.html')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
