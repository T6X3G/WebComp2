from flask import Flask 

app = Flask(__name__)

@ap.route('/')
def index():
    return "hello word"

if __name__ == "__main__":
    app.run('0.0.0.0')