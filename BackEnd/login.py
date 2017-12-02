import psycopg2, psycopg2.extras

conn = psycopg2.connect(database='parqueadero', user='postgres', password='123456', host='localhost')
cur = conn.cursor()

passw = cur.execute("SELECT contraseña FROM login WHERE usuario = 'username'")

if passw = password:
    print("Bienvenido")
else:
    print("Username or Password Incorrectos... Reintente")
