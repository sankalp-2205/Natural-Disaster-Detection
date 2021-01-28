# -*- coding: utf-8 -*-
"""
Created on Thu Dec  3 15:03:29 2020

@author: user
"""

print ("de")
import time
time.sleep(2)

try:
    from PIL import Image

except Exception as e:
    print(e)
    time.delay(60)