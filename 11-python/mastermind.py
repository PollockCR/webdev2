#! usr/bin/python

import cgi
import random
import copy

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
    answerCopy = copy.deepcopy(answer)
    guess = [int(x) for x in str(input("Enter your guess: "))]
    response = ""
    if guess == answerCopy:
        return True
    else:
        for i in range(0,4):
            if guess[i] == answerCopy[i]:
                response += "+ "
                guess[i] = 0
                answerCopy[i] = -1
        for i in range(0,4):
            for j in range(0,4):
                if guess[i] == answerCopy[j]:
                    response += "- "
                    guess[i] = 0
                    answerCopy[j] = -1
        print(response)
        return False
    
playGame()
