# 1DV449_AA223IG

1DV449 - Webbteknik II

Publicerad:
http://xponeras.se/1dv449/scrape/

###Finns det n�gra etiska aspekter vid webbskrapning. Kan du hitta n�got r�ttsfall?
Det finns en ganska intressant och uppm�rksammad historia om webskarpaning av Ebay i b�rjan av 2000-talet.
2009 vann facebook en tvist som g�llde webbskrapning. Ett problem har varit att det ansetts att text "do not scrape us" inte ansetts tillr�cklig...

[K�lla http://resources.distilnetworks.com/h/i/53822104-is-web-scraping-illegal-depends-on-what-the-meaning-of-the-word-is-is/181642]

###Finns det n�gra riktlinjer f�r utvecklare att t�nka p� om man vill vara "en god skrapare" mot server�garna?
Att f�lja "terms of conditions" och robots.txt b�r vara tillr�ckligt.

###Begr�nsningar i din l�sning- vad �r generellt och vad �r inte generellt i din kod?
Applickationen �r utvecklad med ett objektsorienterat t�nk med m�nga klasser som h�nger samman. Den f�ljer �ven ett MVC-m�nster. Koden anser jag vara "moduliserad" p� ett bra s�tt. Jag anser att min applikation �r generell. Inga h�rdkodade url:er finns. Dock kan det vara s� att Xpath-uttrycken eventuellt kan g�ras effektivare d� detta var en helt ny, men intressant, teknik f�r mig. Ing�ngsurl och portnr anges vid applikationens start. D�refter �r det relativt som g�ller.


###Vad kan robots.txt spela f�r roll?
Filen "b�r" v�gleda hur en spindel b�r/ska/f�r agera enligt de direktiv som �terfinns i filen. Viktigt �r att filen finns p� plats, �ven om den �r tom. �nnu viktigare �r att f�rst� att en utvecklare kan igenorera en rotbots-fil. Likas� �r det viktigt att betona att man inte b�r "d�lja" hemligt inneh�ll genom denna fil. Det vore ett "perfekt" s�tt att hitta information p� ett simpelt s�tt.

###Komplettera #1
#####Big Data

I dagen samh�lle finns miljontals anv�ndare av internet. Med den teknik som idag finns i bla smartphones �r det en "piece of cake" att samla in m�ngder av information. Man skulle kunna s�ga att alla anv�ndare l�mnar "breadcrumbs" efter sig och att det pga av detta �r m�jligt att anv�nda dessa sp�r f�r att helt enkelt "tracka" anv�ndare. Sj�lv kan jag tycka att det intressanta �r att man kan anv�nda denna infromationen i olika former av algoritmer. Big Data med dagens m�jligheter, kanske fr�mst genom att s� m�nga st�ndigt �r uppkopplade, ger dagens utvecklar otaliga m�jligheter f�r att utveckla nya typer av applikationer och algoritmer. N�got som f�r m�nga f�r bara femton �r sedan vore fullst�ndigt om�jligt. Sj�lvklart skulle dessa applikationer b�de kunnna grunda sig p� "realtidsdata" genererat fr�n anv�ndare, men �ven historiska data �ver l�ngre tid som sparats persistent.
Inte s�llan p�pekas "det ot�cka" i att den personliga integriteten eventuellt skulle kunna p�verkas negativt. Som utvecklar ser jag det som "v�rt" ansvar att f�rvalta m�jligheter som big data ger och utveckla och forma internet i gott syfte.

K�llor:
https://www.youtube.com/watch?v=buJUojhs80E
http://www.svd.se/big-data-gor-om-var-varld-i-grunden_8076288

#####Web of Things

Web of things �r t�nkt att vara ett applikationslager (s� som exempelvis webben �r p� internet) f�r att "web of things" p� standardiserade s�tt ska kunna kommunicera med varandra. Internet of things som id� �r inte ny. Ganska l�nge har man pratat om intelligenta hem osv. Det smart med filosofin bakom "web of things" �r att ett applikationslager genom http och diverse webtekniker p� standardiserade s�tt ska kunna kommunicera med varandra. Ist�llet f�r att olika f�retag utvecklar sina egna l�sningar s� blir det viktigt att f�lja de riktlinjer applikationslagret anger. Allt f�r att g�ra integreringar av diverse integreringar effektivare och intressantare.

Lite kuriosa som ligger n�ra i �mnet h�r:
�r 2009 h�ll Tim Berners-Less ett kort f�redrag om l�nkat data. Han n�mner att han ursprungligen utvecklade http f�r att f� ett effektivare s�tt att hantera dokument. Dokument var s�ledes den ursprungliga �ndam�let f�r protokollet. Nu efter tjugo �r har saker kanske p� ett s�tt inte direkt f�r�ndrats, d�remot s� �r det som det ofta �r. Nya id�er och insikter kommer med tiden. Tim n�stintill h�ller ett brandtal om att vi ska dela data med varandra. Intressant �r n�r han n�mner Hans Rosling anv�nt l�nkat data fr�n flera olika k�llor via http f�r att generera ut data baserat fr�n flera olika datak�llor, men som f�r en naturlig koppling genom l�nkarna som http erbjuder.
Internet idag best�r inte endast vad som var tanken fr�n b�rjan, dvs dokument. Produkter, m�nniskor och platser mm. �r idag saker som �terfinns p� n�tet. Vi har ett internet av saker som ger m�jligheter att generera nya dokument och applikationer mm. Tim Berners-Lee n�mner n�gra viktiga saker i f�redraget: Bl.a n�mner han vikten av att dela med sig data. G�rna genom ett l�mpligt format s�som json

K�llor:
http://www.ted.com/talks/tim_berners_lee_on_the_next_web#t-484161