#! usr/bin/python

import cgi
import random

print("Content-type: text/html")
print("")

def playGame():
    guessCount = 0
    
    answer = [random.randint(1, 4), random.randint(1, 4), random.randint(1, 4), random.randint(1, 4)]
    
    while guessCount < 11:
        if makeGuess(answer):
            print("You won!")
            return
        guessCount += 1
        
def makeGuess(answer):
    guess = input("Enter your guess: ")
    if guess == answer:
        return True
    else:
        return False
    
playGame()
