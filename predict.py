
#!/usr/bin/env python
import time
from skimage import transform
from tensorflow import keras
from PIL import Image
import numpy as np
import pandas as pd
from GoogleNews import GoogleNews
from newspaper import Config
import smtplib, ssl 
from email import encoders
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
import datetime


##print("files loaded")
##time.sleep(60)
my_model = keras.models.load_model('model_saved2')
##my_model.summary()
##print("model loaded")
##time.sleep(60)
img_path = "./uploads/disaster.jpg"
image = Image.open(img_path)
image = np.array(image).astype('float32')/255
image = transform.resize(image, (224, 224, 3))
image = np.expand_dims(image, axis=0)
prediction=my_model.predict(image)
##print("prediction completed")
##time.sleep(120)
print(prediction)
sum=np.sum(prediction)
    
df=pd.DataFrame(prediction)

ticks = time.time()
df[4] = ticks
df.to_csv('C:/Users/user/Desktop/Minor Project/prediction.csv', header=False, index=False)

max = np.max(prediction)

max_pos = prediction.argmax()

if(max_pos == 0):
    disaster = "Cyclone"
elif(max_pos == 1):
    disaster = "Earthquake"
elif(max_pos == 2):
    disaster = "Flood"
else: 
    disaster = "Wildfire"
      

user_agent = 'Chrome/50.0.2661.102'
config = Config()
config.browser_user_agent = user_agent
news=GoogleNews(end='12/12/2020')
news = GoogleNews(period='15d')
news = GoogleNews(lang='en')
news.get_news(disaster)
result=news.result(sort='true')
"""
for i in result: 
    print("Title:",i['title']) 
    print("Source:",i['media'])
    print(i['date'])
    print("")
"""
pd.DataFrame(result).to_csv('C:/Users/user/Desktop/Minor Project/output.csv', header=False, index=False)

 
image1 = Image.open(r'C:\Users\user\Desktop\Minor Project\uploads\disaster.jpg')
im1 = image1.convert('RGB')
im1.save(r'C:\Users\user\Desktop\Minor Project\disaster.pdf')

sender_email = "shyam6554shyam@gmail.com"
password = "hum77hai"
receiver_email = ["18103025@mail.jiit.ac.in","18103022@mail.jiit.ac.in","shy40000@gmail.com"]

for receiver_email in receiver_email:
    message = MIMEMultipart("alternative")
    message["Subject"] = "ALert Disaster"
    message["From"] = sender_email
    message["To"] = receiver_email

    time = str(datetime.datetime.now())

    text = """\
Alert,
A new disaster is approching
Disaster : """
    text = text + disaster + "\nTime : " + time + "\nLocation : Lodi Nagar, Delhi"
    
    message.attach(MIMEText(text, "plain"))
    
    filename = "disaster.pdf"  
    with open(filename, "rb") as attachment:
        part = MIMEBase("application", "octet-stream")
        part.set_payload(attachment.read())

    a = encoders.encode_base64(part)
    part.add_header("Content-Disposition", f"attachment; filename= {filename}",)
    message.attach(part)   
    message=message.as_string()

    server = smtplib.SMTP("smtp.gmail.com", 587)
    server.starttls(context = ssl.create_default_context()) 
    server.login(sender_email, password)
    server.sendmail(sender_email, receiver_email, message)
    server.quit() 