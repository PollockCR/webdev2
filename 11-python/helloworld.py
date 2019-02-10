#! /usr/bin/python

import math

primeNums = [2]

num = 3;

prime = True

while len(primeNums) < 50:
    #for i in range(to_integral_exact(sqrt(num))):
    i = 3
    while prime and i <= math.sqrt(num):
        if num % i == 0.00:
            prime = False
        i += 2
    if prime:
        primeNums.append(num)
    prime = True
    num += 2;

print (primeNums)