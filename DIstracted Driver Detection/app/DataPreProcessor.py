import cv2
import numpy as np
import os         
from random import shuffle 
from tqdm import tqdm      
import app.Utils as utils
import matplotlib.pyplot as plt
import pandas as pd
import random

class DataPreProcessor():
    train_npy = []
    def createDict(self):
        data = pd.read_csv("datasets/driver_imgs_list.csv")
        dictionary = []
        for subject in data['subject']:
            if subject not in dictionary:
                dictionary.append(subject)
        return dictionary

    def create_label(self , index):
        labels = [0] * 10 # 10 is len of dict
        labels[index] = 1 
        return np.array(labels)

    def create_training_data_driver_wise(self):
        if os.path.isfile(utils.TRAIN_DATA_COLOR_NPY):
            return utils.TRAIN_DATA_COLOR_NPY
        else:
            i = 0
            data = pd.read_csv("datasets/driver_imgs_list.csv")
            data = pd.DataFrame(data,columns=['classname','img'])
            for classname , image in data.iterrows():
                try:
                    i +=1
                    image_array = cv2.imread(os.path.join(utils.TRAIN_DATADIR,image["classname"],image["img"]), cv2.IMREAD_COLOR)
                    new_array = cv2.resize(image_array,(utils.IMG_SIZE,utils.IMG_SIZE))
                    self.train_npy.append([np.array(new_array),self.create_label(utils.CATEGORIES.index(image['classname']))])
                    print(self.train_npy)
                    break
                except Exception as e:
                    print("Error")
                    pass
        np.save(utils.TRAIN_DATA_COLOR_NPY,self.train_npy)
        return utils.TRAIN_DATA_COLOR_NPY

    def create_training_data(self):
        if os.path.isfile(utils.TRAIN_DATA_COLOR_NPY):
            return utils.TRAIN_DATA_COLOR_NPY
        else:
            for category in utils.CATEGORIES: 
                path = os.path.join(utils.TRAIN_DATADIR,category)  
                class_num = utils.CATEGORIES.index(category)  
                for img in tqdm(os.listdir(path)):
                    try:
                        img_array = cv2.imread(os.path.join(path,img) ,cv2.IMREAD_COLOR)  
                        new_array = cv2.resize(img_array, (utils.IMG_SIZE, utils.IMG_SIZE)) 
                        self.train_npy.append([np.array(new_array), self.create_label(utils.CATEGORIES.index(category))])
                    except Exception as e:  
                        pass
            random.shuffle(self.train_npy)
            np.save(utils.TRAIN_DATA_COLOR_NPY, self.train_npy)
            return utils.TRAIN_DATA_COLOR_NPY


