# 1DV449_AA223IG

1DV449 - Webbteknik II

###Finns det n�gra etiska aspekter vid webbskrapning. Kan du hitta n�got r�ttsfall?

###Finns det n�gra riktlinjer f�r utvecklare att t�nka p� om man vill vara "en god skrapare" mot server�garna?

###Begr�nsningar i din l�sning- vad �r generellt och vad �r inte generellt i din kod?
Applickationen �r utvecklad med ett objektsorienterat t�nk med m�nga klasser som h�nger samman. Den f�ljer �ven ett MVC-m�nster. Koden anser jag vara "moduliserad" p� ett bra s�tt. Jag anser att min applikation �r generell. Inga h�rdkodade url:er finns. Dock kan det vara s� att Xpath-uttrycken eventuellt kan g�ras effektivare d� detta var en helt ny, men intressant, teknik f�r mig. Ing�ngsurl och portnr anges vid applikationens start. D�refter �r det relativt som g�ller.


###Vad kan robots.txt spela f�r roll?
Filen "b�r" v�gleda hur en spindel b�r/ska/f�r agera enligt de direktiv som �terfinns i filen. Viktigt �r att filen finns p� plats, �ven om den �r tom. �nnu viktigare �r att f�rst� att en utvecklare kan igenorera en rotbots-fil. Likas� �r det viktigt att betona att man inte b�r "d�lja" hemligt inneh�ll genom denna fil. Det vore ett "perfekt" s�tt att hitta information p� ett simpelt s�tt.