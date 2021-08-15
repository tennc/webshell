#!/usr/bin/env python
# -*- coding:utf-8 -*-
import time
import random
import requests
import ssl
from urllib.parse import unquote


#忽略证书校验
requests.packages.urllib3.disable_warnings()
try:
    _create_unverified_https_context = ssl._create_unverified_context
except AttributeError:
    pass
else:
    ssl._create_default_https_context = _create_unverified_https_context


user_agent = ['Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.1) Gecko/20061010 Firefox/2.0']

def requests_headers():
    UA = random.choice(user_agent)
    headers = {
        'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'User-Agent': UA,
        'X-Forwarded-For': '10.10.{}.{}'.format(str(random.randint(0, 255)), str(random.randint(0, 255))),
    }
    return headers




def main_handler(event, context):
    #url = unquote(event['queryString']['url'])
url = event['queryString']['url']
    agrs = event['queryString']
    for key in agrs.keys():
        if key != "url":
            url += "&" +  key + "=" + agrs[key]
    method = event['httpMethod']
    headers = requests_headers()
    #headers = event['headers']
    timeout = 60
    try:
        data = event['body']
    except:
        data = None
    if method == "POST":
        headers.update({'Content-Type': 'application/x-www-form-urlencoded'})
        html = requests.post(url=url, headers=headers, timeout=timeout, verify=False, data=data)
    elif method == "GET":
        html = requests.get(url=url, headers=headers, timeout=timeout, verify=False, data=data)
    print(len(html.text))
    return {
        "isBase64Encoded": False,
        "statusCode": html.status_code,
        "headers": {'Content-Type': 'text/html; charset=utf-8'},
        "body": html.text
    }
