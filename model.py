# -*- coding: utf-8 -*-
"""
Created on Mon Oct 26 10:44:12 2020

@author: user
"""
'''
import os

'''
import plaidml.keras
import os
plaidml.keras.install_backend()
os.environ["KERAS_BACKEND"] = "plaidml.keras.backend" 
import keras
import keras.backend as K
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Convolution2D
from tensorflow.keras.layers import MaxPooling2D
from tensorflow.keras.layers import Flatten
from tensorflow.keras.layers import Dense
from keras.preprocessing.image import ImageDataGenerator
import matplotlib.pyplot as plt
import pandas as pd

classify = Sequential()

classify.add(Convolution2D(256, 3, 3, input_shape = (224, 224, 3), activation = 'relu'))

classify.add(MaxPooling2D(pool_size = (2, 2)))

classify.add(Flatten())

classify.add(Dense(units = 512, activation = 'relu'))

#classify.add(Dense(units = 128, activation = 'relu'))

classify.add(Dense(units = 4, activation = 'softmax'))

classify.compile(optimizer = 'adam', loss = 'categorical_crossentropy', metrics = ['accuracy'])

#loading data
train_data = ImageDataGenerator(rescale=1./255, shear_range=0.2, zoom_range=0.2, horizontal_flip=True)
test_data = ImageDataGenerator(rescale=1./255)

training_set = train_data.flow_from_directory('dataset/train', target_size=(224, 224), batch_size=32, class_mode='categorical')
test_set = test_data.flow_from_directory('dataset/test', target_size=(224, 224), batch_size=32, class_mode='categorical')

result=classify.fit(training_set, steps_per_epoch=3543//32, epochs=30, validation_data=test_set, validation_steps=885//32)

classify.save('model_saved2')

print(result.history.keys())
print(result.history)
df=pd.DataFrame(result.history)

#graph for Model Accuracy
plt.plot(result.history['accuracy'], color = "green")
plt.plot(result.history['val_accuracy'], color = "red")
plt.title('Model Accuracy')
plt.xlabel('Epoch')
plt.ylabel('Accuracy')
plt.legend(['Train Set', 'Test Set'], frameon = False, loc='upper left')
plt.show()

#graph for Model Loss 
plt.plot(result.history['loss'], color = "green")
plt.plot(result.history['val_loss'], color="red")
plt.title('Model Loss')
plt.xlabel('Epoch')
plt.ylabel('Loss')
plt.legend(['Train', 'Test'], frameon = False, loc='upper right')
plt.show()
