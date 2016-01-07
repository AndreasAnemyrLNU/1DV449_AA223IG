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

###Komplettera #1
#####Big Data

I dagen samhälle finns miljontals användare av internet. Med den teknik som idag finns i bla smartphones är det en "piece of cake" att samla in mängder av information. Man skulle kunna säga att alla användare lämnar "breadcrumbs" efter sig och att det pga av detta är möjligt att använda dessa spår för att helt enkelt "tracka" användare. Själv kan jag tycka att det intressanta är att man kan använda denna infromationen i olika former av algoritmer. Big Data med dagens möjligheter, kanske främst genom att så många ständigt är uppkopplade, ger dagens utvecklar otaliga möjligheter för att utveckla nya typer av applikationer och algoritmer. Något som för många för bara femton år sedan vore fullständigt omöjligt. Självklart skulle dessa applikationer både kunnna grunda sig på "realtidsdata" genererat från användare, men även historiska data över längre tid som sparats persistent.
Inte sällan påpekas "det otäcka" i att den personliga integriteten eventuellt skulle kunna påverkas negativt. Som utvecklar ser jag det som "vårt" ansvar att förvalta möjligheter som big data ger och utveckla och forma internet i gott syfte.

Källor:
https://www.youtube.com/watch?v=buJUojhs80E
http://www.svd.se/big-data-gor-om-var-varld-i-grunden_8076288

#####Web of Things

Web of things är tänkt att vara ett applikationslager (så som exempelvis webben är på internet) för att "web of things" på standardiserade sätt ska kunna kommunicera med varandra. Internet of things som idé är inte ny. Ganska länge har man pratat om intelligenta hem osv. Det smart med filosofin bakom "web of things" är att ett applikationslager genom http och diverse webtekniker på standardiserade sätt ska kunna kommunicera med varandra. Istället för att olika företag utvecklar sina egna lösningar så blir det viktigt att följa de riktlinjer applikationslagret anger. Allt för att göra integreringar av diverse integreringar effektivare och intressantare.

Lite kuriosa som ligger nära i ämnet här:
År 2009 höll Tim Berners-Less ett kort föredrag om länkat data. Han nämner att han ursprungligen utvecklade http för att få ett effektivare sätt att hantera dokument. Dokument var således den ursprungliga ändamålet för protokollet. Nu efter tjugo år har saker kanske på ett sätt inte direkt förändrats, däremot så är det som det ofta är. Nya idéer och insikter kommer med tiden. Tim nästintill håller ett brandtal om att vi ska dela data med varandra. Intressant är när han nämner Hans Rosling använt länkat data från flera olika källor via http för att generera ut data baserat från flera olika datakällor, men som får en naturlig koppling genom länkarna som http erbjuder.
Internet idag består inte endast vad som var tanken från början, dvs dokument. Produkter, människor och platser mm. är idag saker som återfinns på nätet. Vi har ett internet av saker som ger möjligheter att generera nya dokument och applikationer mm. Tim Berners-Lee nämner några viktiga saker i föredraget: Bl.a nämner han vikten av att dela med sig data. Gärna genom ett lämpligt format såsom json

Källor:
http://www.ted.com/talks/tim_berners_lee_on_the_next_web#t-484161