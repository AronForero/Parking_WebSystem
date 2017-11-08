import psycopg2, psycopg2.extras

def conection_pg():
    conn = psycopg2.connect(database='', user='', password='', host='localhost')
    cur = conn.cursor()
    return cur
