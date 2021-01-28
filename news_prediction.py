# -*- coding: utf-8 -*-
"""
Created on Thu Nov 19 11:24:00 2020

@author: user
"""
disaster='Wildfire'
from GoogleNews import GoogleNews
from newspaper import Config
import pandas as pd
user_agent = 'Chrome/50.0.2661.102'
config = Config()
config.browser_user_agent = user_agent
news = GoogleNews(end='11/20/2020')
news = GoogleNews(period='15d')
news = GoogleNews(lang='en')
news.get_news(disaster)
result=news.result(sort='true')
for i in result: 
    print("Title:",i['title']) 
    print("Source:",i['media'])
    print(i['date'])
    print("")
    
pd.DataFrame(result).to_csv('C:/Users/user/Desktop/Minor Project/output.csv', header=False, index=False)

