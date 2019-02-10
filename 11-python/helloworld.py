#! /usr/bin/python

print ("Content-type: text/html")
print ("")

def saySomething(something):
    print (something)
    
saySomething("Milkshakes")

def multiplyTwoNumbers(x, y):
    return x * y

print (multiplyTwoNumbers(4, 2))

def highestCommonFactor(x, y):
    div = x if x < y else y
    while div > 0:
        if x % div == 0.0 and y % div == 0.0:
            return div
        div = div - 1
    return 0

print (highestCommonFactor(9,6))

a = 4
b = 7

def addTwoNumbers():
    a = 10
    return a + b

print (addTwoNumbers())
print (a)