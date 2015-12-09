# 1DV449_AA223IG

1DV449 - Webbteknik II

Publicerad:
http://xponeras.se/1dv449/scrape/

###Finns det några etiska aspekter vid webbskrapning. Kan du hitta något rättsfall?
Det finns en ganska intressant och uppmärksammad historia om webskarpaning av Ebay i början av 2000-talet.
2009 vann facebook en tvist som gällde webbskrapning. Ett problem har varit att det ansetts att text "do not scrape us" inte ansetts tillräcklig...

[Källa http://resources.distilnetworks.com/h/i/53822104-is-web-scraping-illegal-depends-on-what-the-meaning-of-the-word-is-is/181642]

###Finns det några riktlinjer för utvecklare att tänka på om man vill vara "en god skrapare" mot serverägarna?
Att följa "terms of conditions" och robots.txt bör vara tillräckligt.

###Begränsningar i din lösning- vad är generellt och vad är inte generellt i din kod?
Applickationen är utvecklad med ett objektsorienterat tänk med många klasser som hänger samman. Den följer även ett MVC-mönster. Koden anser jag vara "moduliserad" på ett bra sätt. Jag anser att min applikation är generell. Inga hårdkodade url:er finns. Dock kan det vara så att Xpath-uttrycken eventuellt kan göras effektivare då detta var en helt ny, men intressant, teknik för mig. Ingångsurl och portnr anges vid applikationens start. Därefter är det relativt som gäller.


###Vad kan robots.txt spela för roll?
Filen "bör" vägleda hur en spindel bör/ska/får agera enligt de direktiv som återfinns i filen. Viktigt är att filen finns på plats, även om den är tom. Ännu viktigare är att förstå att en utvecklare kan igenorera en rotbots-fil. Likaså är det viktigt att betona att man inte bör "dölja" hemligt innehåll genom denna fil. Det vore ett "perfekt" sätt att hitta information på ett simpelt sätt.