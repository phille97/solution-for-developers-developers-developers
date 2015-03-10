#!flask/bin/python
#
#  Simple Product api
#
#  Made by: Philip Johansson (github.com/phille97)
#

import time

from flask import Flask, jsonify, send_from_directory, request

# Skapa applicationen
app = Flask(__name__)

# Alla produkter sparas i en array. (Sparas inte!)
products = []

@app.route('/index/<int:product_index>', methods=['GET'])
def get_product(product_index):
    if len(products) <= product_index:
        return jsonify({'error': 'Not found'}), 404
    return jsonify(products[product_index])

@app.route('/name/<product_name>', methods=['GET'])
def search_productname(product_name):
    for product in products:
        if(product["PRODUCT"]["NAME"] == product_name):
            return jsonify(product)
    return jsonify({'error': 'Not found'}), 404

@app.route('/getall', methods=['GET'])
def get_all():
    return jsonify({'products': products})

@app.route('/add', methods=['POST'])
def create_product():
    new_product = {
        'PRODUCT': {
            'NAME': request.form['NAME'],
            'PRICE': request.form['PRICE'],
            'TEXTVAL1': request.form['TEXTVAL1'],
            'TEXTVAL2': request.form['TEXTVAL2'],
        },
        'META': {
            'LASTUPDATED': '%s' % time.time(),
            'CREATED': '%s' % time.time(),
        }
    }
    products.append(new_product)
    return jsonify(new_product), 201

@app.route('/')
def render_webpage():
    return send_from_directory('.', 'index.html')

# Gogogo!!!
if __name__ == '__main__':
    app.run()
