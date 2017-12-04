#!/usr/bin/python
# -*- coding: utf-8 -*-

# Convierte temperaturas
# www.pythondiario.com

import sys
from PyQt5 import QtCore, QtGui, uic, QtWidgets

# Cargar nuestro archivo .ui
form_class = uic.loadUiType("mainwindow.ui")[0]

class LoignClass(QtWidgets.QMainWindow, form_class):
 def __init__(self, parent=None):
  QtWidgets.QMainWindow.__init__(self, parent)
  self.setupUi(self)
  self.BTN_Enviar.clicked.connect(self.btn_CtoF_clicked)


 # Evento del boton btn_CtoF
 def btn_CtoF_clicked(self):
  acc = str(self.lineEdit.text())
  key = str(self.lineEdit_2.text())
  fahr = acc + key
  self.lineEdit.setValue(str(fahr))

app = QtWidgets.QApplication(sys.argv)
MyWindow = LoginClass(None)
MyWindow.show()
app.exec_()
