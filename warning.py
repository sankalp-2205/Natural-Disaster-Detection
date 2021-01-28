
import smtplib, ssl 
from email import encoders
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
import datetime
from PIL import Image
 
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

    disaster = "Cyclone"
    text = """\
Alert,
A new disaster is approching
Disaster : """
    text = text + disaster + "\nTime : " + time + "\nLocation : Lodi Naagr, Delhi"
    
    message.attach(MIMEText(text, "plain"))
    
    filename = "disaster.pdf"  
    with open(filename, "rb") as attachment:
        part = MIMEBase("application", "octet-stream")
        part.set_payload(attachment.read())

    encoders.encode_base64(part)
    part.add_header("Content-Disposition", f"attachment; filename= {filename}",)
    message.attach(part)   
    message=message.as_string()

    server = smtplib.SMTP("smtp.gmail.com", 587)
    server.starttls(context = ssl.create_default_context()) 
    server.login(sender_email, password)
    server.sendmail(sender_email, receiver_email, message)
    server.quit() 