def InsertarPlaca(cur, placa, tipo):
    import datetime

    x = datetime.datetime.now()
    hora = x.hour
    minutos = x.minute
    anio = x.year
    mes = x.month
    dia = x.day
    hora_entrada = str(hora)+":"+str(minutos)
    fecha_entrada = str(dia)+"/"+str(mes)+"/"+str(anio)
    fecha_salida = fecha_entrada

    if cur.execute("INSERT INTO vehiculos values('placa', 'estado', 'hora_entrada', 'hora_salida', 'fecha_entrada', 'fecha_salida', 0, 'tipo')"):
        return "La placa ha sido guardada en la base de datos correctamente."
    else:
        return "ERROR... Por Favor Contacte al Administrador."
