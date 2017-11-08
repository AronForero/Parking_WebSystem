

def consultar_placa(cur, placa, tipo):
    if row = cur.execute("SELECT * FROM tipo WHERE placa = 'placa'"):
        return row
    else:
        from InsertarPlaca.py import InsertarPlaca
        print(InsertarPlaca(cur, placa, tipo))
        row = cur.execute("SELECT * FROM tipo WHERE placa = 'placa'")
        return row
