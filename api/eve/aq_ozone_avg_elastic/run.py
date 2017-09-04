import eve
from eve_elastic import Elastic

app = eve.Eve(data=Elastic)
app.run()

#from eve import Eve
#app = Eve()

#if __name__ == '__main__':
#    app.run()