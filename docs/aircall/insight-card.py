from flask import Flask, request, jsonify
import requests
import json

app = Flask(__name__)

@app.route('/webhook', methods=['POST'])
def webhook():
    data = json.loads(request.data)

    # Extract EAN and store ID information from event data
    ean = data['data']['ean']
    store_id = data['data']['store_id']

    # Generate insight card data
    insight_card_data = {
        'type': 'card',
        'layout': {
            'title': 'New sale',
            'description': 'EAN: %s, Store ID: %s' % (ean, store_id)
        }
    }

    # Send insight card to Aircall API
    url = 'https://api.aircall.io/v1/insights/cards'
    headers = {
        'Authorization': 'Bearer <YOUR_ACCESS_TOKEN>',
        'Content-Type': 'application/json'
    }
    response = requests.post(url, headers=headers, data=json.dumps(insight_card_data))

    return jsonify(success=True)

if __name__ == '__main__':
    app.run()
