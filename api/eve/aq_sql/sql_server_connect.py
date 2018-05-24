from sqlalchemy.sql import text
from sqlalchemy import create_engine


#engine = create_engine('mssql+pyodbc://heaintsqlwfd1.edenireland.ie/aq?driver=SQL+Server+Native+Client+11.0')
engine = create_engine('mssql+pyodbc://MauriceVM-Test/aq?driver=SQL+Server+Native+Client+11.0')

conn = engine.connect()

s = text("SELECT [rawreadingid],[samplingpoint],[pollutantname],[rawdatavalue],[raw_reading_measurement_time],[measurementunit],[measurementtype] FROM [aq].[dbo].[aq_measurements] WITH (NOLOCK)")#" WHERE [raw_reading_measurement_time] > '2018-03-08 09:00:00'")#  WHERE name = :name")

#result = conn.execute(s, name=name).fetchall()
result = conn.execute(s).fetchall()
print(result)