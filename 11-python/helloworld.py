#! /usr/bin/python

foods = ["noodles", "cheese", "bread", "carrots", "eggs"]

for i in range(5, 11):
    print (i)

for food in foods:
    print ("I like eating " + food)

x = 0
while (x <= 10):
    print (x)
    x += 1
    
# dictionary containing 4 names (keys) and ages (values)

ages = {"Candice": 42, "Maurice": 12, "Izabel": 20, "Mikey": 52}

for name, age in ages.items():
    print (name + " is " + str(age))
