#! usr/bin/python

import cgi
import random

print("Content-type: text/html")
print("")

def playGame():
    guessCount = 0
    
    answer = [random.randint(1, 4), random.randint(1, 4), random.randint(1, 4), random.randint(1, 4)]
    print(answer)
    while guessCount < 11:
        if makeGuess(answer):
            print("You won!")
            return
        guessCount += 1
        
def makeGuess(answer):
    guess = [int(x) for x in str(input("Enter your guess: "))]
    print(guess)
    response = ""
    if guess == answer:
        return True
    else:
        for i in range(0,4):
            if guess[i] == answer[i]:
                response += "+ "
                guess[i] = 0
        for aPeg in answer:
            for gPeg in guess:
                if gPeg == aPeg:
                    response += "- "
        print(response)
        return False
    
playGame()
