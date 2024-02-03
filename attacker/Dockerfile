FROM python:3.9.10-alpine3.14

WORKDIR /flask-app

RUN pip3 install Flask

COPY . .

ENV FLASK_APP=attacker.py

CMD [ "python3", "-m" , "flask", "run", "--host=0.0.0.0"]