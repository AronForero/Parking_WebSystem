def modificar(row, cur):
    import datetime

    x = datetime.datetime.now()

    hora = x.hour
    minutos = x.minute
    hora_entrada = str(hora)+":"+str(minutos)

    anio = x.year
    mes = x.month
    dia = x.day
    fecha_entrada = str(dia)+"/"+str(mes)+"/"+str(anio)


    fecha_salida = fecha_entrada
    tipo = row[-1] #la ultima columna

    if row[1] == 1: #Se evalua el estado del vehiculo '0' = Fuera, '1' = Dentro
        #hacer la modificacion en la BD
        x = cur.execute("UPDATE vehiculos")
        #Crear e imprimir la factura de SALIDA!!
        #build_pdf('Factura_Entrada.pdf', build_flowables(stylesheet(), placa, Hora, Fecha, Cascos))
    else:
        #Hacer la modificacion en la BD
        x = cur.execute("UPDATE vehiculos")
        #Crear e imprimir la factura de ENTRADA
