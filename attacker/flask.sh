#!/bin/bash

# Create a virtual environment
python3 -m venv venv

# Activate the virtual environment
source venv/bin/activate

# Install Flask
pip install Flask

# Set the FLASK_APP environment variable
export FLASK_APP=attacker.py

# Start Flask
flask run