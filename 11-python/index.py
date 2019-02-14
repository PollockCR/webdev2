#! usr/bin/python

import cgi, random, copy

form = cgi.FieldStorage()

guesses = ""
guess = ""
answer = ""
guessCount = 0
result = ""

def makeGuess(guess, answer, guesses):
    answerCopy = list(answer)
    
    guessCopy = list(guess)

    response = " "
    if guessCopy == answerCopy:
        return " + + + +"
    else:
        for i in range(4):
            if guessCopy[i] == answerCopy[i]:
                response += "+ "
                guessCopy[i] = "<"
                answerCopy[i] = ">"
        for i in range(4):
            for j in range(4):
                if guessCopy[i] == answerCopy[j]:
                    response += "- "
                    guessCopy[i] = "<"
                    answerCopy[j] = ">"
        return response

print ("Content-type:text/html")
print ("")
print ("<head>")
print ("<title>Mastermind</title>")
print ("</head>")
print ("<body>")
print ("<h1>Mastermind</h1>")
print ("<p>I've chosen a 4 digit number (using digits 1-4)... can you guess it?</p>")
print ("<p>A plus sign (+) signifies one digit in the correct position.<br>A minus sign (-) signifies one correct digit, but in an incorrect position.</p>")

if "guessCount" in form:
    guessCount = int(form.getvalue("guessCount"))

if guessCount < 11:
    if "guesses" in form:
        guesses = form.getvalue("guesses")

    if "answer" in form:
        answer = form.getvalue("answer")
    else:
        for i in range(4):
            answer += str(random.randint(1,4))   
            
    if "guess" in form:
        guessCount += 1
        guess = form.getvalue("guess")
        result = makeGuess(guess, answer, guesses)
        guesses = guesses + guess + result + "<br>"
        print(guesses)
        if result == " + + + +":
            print ("<br>You won!")
            print ("<form>")
            print ('<input type="submit" value="Play Again">')
            print ('</form>')            
    if result != " + + + +":
        print ("<form method='post'>")
        print ('<input type="text" name="guess" pattern=".{4,4}" required autofocus>')
        print ('<input type="hidden" name="answer" value = "' + answer + '">')
        print ('<input type="hidden" name="guesses" value = "' + guesses + '">')
        print ('<input type="hidden" name="guessCount" value = "' + str(guessCount) + '">')
        print ('<input type="submit" value="Guess">')
        print ('</form>')
        print ("<form>")
        print ('<input type="submit" value="Reset">')
        print ('</form>')
else:
    print ("You lose :(")
    print ("The answer was " + form.getvalue("answer"))
    print ("<form>")
    print ('<input type="submit" value="Try Again">')
    print ('</form>')

print ("</body>")
print ("</html>")
        
