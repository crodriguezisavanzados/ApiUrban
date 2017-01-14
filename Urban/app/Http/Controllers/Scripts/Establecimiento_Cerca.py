import pandas as pd
import mysql.connector
import sys, json

cnx = mysql.connector.connect(user='cesarmarquez', password='CESAR_2606952_*cmarquez',
                              host='urban-srv.isavanzados.com.mx',
                              database='Scripts'
                              )
cursor=cnx.cursor()
cursor.execute('Select * from Lugares')
df=cursor.fetchall()
cnx.close()
df=pd.DataFrame(df)
df.columns=['X','Y','Lugar']

try:
    data=json.loads(sys.argv[1])
except:
    print("Error")
    sys,exit(1)


x=float(data[0])
y=float(data[1])

def distancia(x,x1,y,y1):
    a=(x-x1)**2
    b=(y-y1)**2
    c=((a+b)**.5)*100000
    return c

punto={}
for index in range(df.shape[0]):
    dis=distancia(df['X'][index],x,df['Y'][index],y)
    if(dis<=500):
       punto[df['Lugar'][index]]={'X':df['X'][index],'Y':df['Y'][index]}

print (json.dumps(punto))
