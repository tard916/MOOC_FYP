#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sun Mar 31 13:52:10 2019

@author: Hassan
"""

# Random Forest Classification Model

# Importing the libraries
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import pickle

# Importing the dataset
testset = pd.read_excel('labelled.xlsx')
X = testset.iloc[:, 2:6].values
y = testset.iloc[:, 6].values

"""
# Splitting the dataset into the Training set and Test set
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.25, random_state = 0)
"""

# Feature Scaling
from sklearn.preprocessing import StandardScaler
sc = StandardScaler()
X = sc.fit_transform(X)
#X_test = sc.transform(X_test)

# Fitting Random Forest Classification to the Training set
from sklearn.ensemble import RandomForestClassifier
classifier = RandomForestClassifier(n_estimators = 10, criterion = 'entropy', random_state = 0)
classifier.fit(X, y)

# save the model to disk
filename = 'finalized_model.sav'
pickle.dump(classifier, open(filename, 'wb'))

#----------------------------------------------#

# load the model from disk
loaded_model = pickle.load(open(filename, 'rb'))

# Importing the dataset
newdata = pd.read_csv('studentList-2019-04-10 11.56.35.csv')

#function for generating ndays_inactive
def nDaysInactive():

    num_rows=newdata.shape[0]
    
    #looping through entire dataset (row wise)
    for i in range(num_rows):

        #in case value is negative set to 0
        if (newdata['nday_inAct'].values[i] < 0):
            newdata['nday_inAct'].values[i] = 0
nDaysInactive()

X_new = newdata.iloc[:, 2:6].values

# Feature Scaling
from sklearn.preprocessing import StandardScaler
sc = StandardScaler()
X_new = sc.fit_transform(X_new)

y_pred = loaded_model.predict(X_new)

newdata['dropout'] = y_pred

exportdata = newdata[["courseID", "studentID", "dropout"]]

#export dataset
#csv
exportdata.to_csv('dropout_prediction.csv',index=False)


"""
# Making the Confusion Matrix
from sklearn.metrics import confusion_matrix
cm = confusion_matrix(y, y_pred)

#Accuracy based on Confusion Matrix
from sklearn.metrics import accuracy_score
accuracy = accuracy_score(y, y_pred)


# Predicting the Test set results
y_pred = classifier.predict(X_test)

# Making the Confusion Matrix
from sklearn.metrics import confusion_matrix
cm = confusion_matrix(y_test, y_pred)

#Accuracy based on Confusion Matrix
from sklearn.metrics import accuracy_score
accuracy = accuracy_score(y_test, y_pred)

# Applying k-Fold Cross Validation
from sklearn.model_selection import cross_val_score
accuracies = cross_val_score(estimator = classifier, X = X_train, y = y_train, cv = 10)
meanAccuracy = accuracies.mean()
stdAccuracy = accuracies.std()

#----------Area Under ROC----------#
# predict probabilities
probs = classifier.predict_proba(X_test)

# keep probabilities for the positive outcome only
probs = probs[:, 1]

# calculate AUC
from sklearn.metrics import roc_auc_score
auc = roc_auc_score(y_test, probs)
#print('AUC: %.3f' % auc)

# calculate roc curve
from sklearn.metrics import roc_curve
fpr, tpr, thresholds = roc_curve(y_test, probs)

#Another way to calculate AUC
#from sklearn.metrics import auc
#roc_auc = auc(fpr, tpr)

#----------AUC Plot Method 1----------#
# plot no skill
plt.plot([0, 1], [0, 1], linestyle='--')
# plot the roc curve for the model
plt.plot(fpr, tpr, marker='.')
# show the plot
plt.show()
plt.plot

#----------AUC Plot Method 2----------#
plt.title('Receiver Operating Characteristic')
plt.plot(fpr, tpr, color='darkorange', label = 'AUC = %0.2f' % auc)
plt.legend(loc = 'lower right')
plt.plot([0, 1], [0, 1],linestyle='--', color='navy')
plt.xlim([-0.05, 1.05])
plt.ylim([-0.05, 1.05])
plt.ylabel('True Positive Rate')
plt.xlabel('False Positive Rate')
plt.show()
"""


