#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# name: yihuo.py
# http://www.opensource.org/licenses/mit-license
# MIT License
# from: https://www.sqlsec.com/2020/07/shell.html#toc-heading-24
# Copyright (c) 2020 
# 
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
# 
# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.
# 
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.

import string
from urllib.parse import quote

keys = list(range(65)) + list(range(91, 97)) + list(range(123, 127))
results = []
for i in keys:
    for j in keys:
        asscii_number = i ^ j
        if (asscii_number >= 65 and asscii_number <= 90) or (asscii_number >= 97 and asscii_number <= 122):
            if i < 32 and j < 32:
                temp = (
                f'{chr(asscii_number)} = ascii:{i} ^ ascii{j} = {quote(chr(i))} ^ {quote(chr(j))}', chr(asscii_number))
                results.append(temp)
            elif i < 32 and j >= 32:
                temp = (
                f'{chr(asscii_number)} = ascii:{i} ^ {chr(j)} = {quote(chr(i))} ^ {quote(chr(j))}', chr(asscii_number))
                results.append(temp)
            elif i >= 32 and j < 32:
                temp = (
                f'{chr(asscii_number)} = {chr(i)} ^ ascii{j} = {quote(chr(i))} ^ {quote(chr(j))}', chr(asscii_number))
                results.append(temp)
            else:
                temp = (f'{chr(asscii_number)} = {chr(i)} ^ {chr(j)} = {quote(chr(i))} ^ {quote(chr(j))}', chr(asscii_number))
                results.append(temp)
                results.sort(key=lambda x: x[1], reverse=False)
                for low_case in string.ascii_lowercase:
                    for result in results:
                        if low_case in result:
                            print(result[0])
                            for upper_case in string.ascii_uppercase:
                                for result in results:
                                    if upper_case in result:
                                        print(result[0])
