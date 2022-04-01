import requests
import json

def send():
    bot_token = 'yourToken'
    chat_id = 'yourGroupChatID'
    file = '/some/path/to/image.jpg'

    files = {
        'photo': open(file, 'rb')
        }

    message = ('https://api.telegram.org/bot' + bot_token + '/sendPhoto?chat_id=' + chat_id)
    upload = requests.post(message, files = files)
    
send()

