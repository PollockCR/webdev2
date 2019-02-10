#! /usr/bin/python

print ("Content-type: text/html")

print ("")

print ("Hello world!")

age = 35

print (age)

name = "Cat"

print (name)

number = "5"

print (int(number) * age)

myStr = "My name is "

print (myStr[0:5])

print (myStr[5])

print (myStr + name)

myList = ["Cat", "Dog", "Mouse", "Turtle", "Snake"]

print (myList)

print (myList[2:4])

myTuple = (1, 2, 3, 4)

print (myTuple[2]);

fam = {}

fam["dad"] = "Rob"

fam["mom"] = "Kirsten"

fam[1] = "Tommy"

fam[2] = "Ralphie"

print (fam)
print (fam["mom"])
print (fam.keys())
print (fam.values())