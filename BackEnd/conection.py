import psycopg2, psycopg2.extras

def conection_pg():
    conn = psycopg2.connect(database='parqueadero', user='postgres', password='123456', host='localhost')
    cur = conn.cursor()
    return cur
