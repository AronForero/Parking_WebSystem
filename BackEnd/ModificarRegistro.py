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
    tipo = row[2]

    if row[1] == "adentro"
    x = cur.execute("UPDATE ")
