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

    hora_salida = hora_entrada
    fecha_salida = fecha_entrada
    tipo = row[-1] #la ultima columna

    if row[1] == 1: #Se evalua el estado del vehiculo Fuera = '0', Dentro = '1'
        #hacer la modificacion en la BD
        #Condicional para calcular total_pagar
        x = cur.execute("UPDATE vehiculos set estado = '0', horas = 'hora_salida', pago = 'total_pagar', casco = 'row[5]', fechas = 'fecha_salida' WHERE placa = 'row[0]'")
        #Crear e imprimir la factura de SALIDA!!
        #build_pdf('Factura_Entrada.pdf', build_flowables(stylesheet(), placa, Hora, Fecha, Cascos))
    else:
        #Hacer la modificacion en la BD
        x = cur.execute("UPDATE vehiculos set estado = '1', horae = 'hora_entrada', pago = 'total_pagar', casco = 'row[5]', fechas = 'fecha_entrada' WHERE placa = 'row[0]'")
        #Crear e imprimir la factura de ENTRADA
