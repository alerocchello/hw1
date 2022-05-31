CREATE DATABASE miodb;

USE miodb;

CREATE TABLE users
(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    surname VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);


CREATE TABLE news
(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titolo VARCHAR(255),
    url_copertina VARCHAR(1000),
    contenuto VARCHAR(10000)
);

INSERT INTO `news` (`titolo`, `url_copertina`, `contenuto`) VALUES ('La Roma vince la Conference League contro il Feyenoord', 'https://static.sky.it/images/skytg24/it/sport/2022/05/25/roma-feyenoord-finale-conference-league/roma-conference-league-getty.jpg', 'Con una gara attenta, di sacrificio e grande cuore, la squadra di Mourinho riporta in Italia, dopo 12 anni un trofeo europeo. Nella finale di Tirana, la Roma batte il Feyenoord 1-0 al termine di un match tiratissimo. E’ Nicolò Zaniolo al 32’ a rompere l’equilibrio del primo tempo battendo Bijlow su assist di Mancini. Nella ripresa il Feyenoord attacca a testa bassa e colpisce due pali ma Bijlow compie due interventi su Veretout e Pellegrini. La Roma resiste e porta a casa il successo e la coppa.');
INSERT INTO `news` (`titolo`, `url_copertina`, `contenuto`) VALUES ('NBA: 44 punti di Antetokounmpo, Milwaukee batte Brooklyn', 'https://www.ansa.it/webimages/img_457x/2022/4/1/40521a1c731b0555ed976eaadd27fc8b.jpg', 'Sospinta da Giannis Antetokounmpo, Milwaukee ha strappato la vittoria ai supplementari (120-119) a Brooklyn, al termine di un match che potrebbe aver anticipato la sfida nel primo turno dei playoff NBA.\r\nDove mancheranno invece i Lakers, battuto da Utah. Antetokounmpo, nonostante i numerosi palloni persi (8), è stato come sempre l arma letale dei Bucks (44 punti, 14 rimbalzi, 6 assist).\r\nIl suo pluripremiato tiro all indietro in stile Stephen Curry ha mandato la squadra ai tempi supplementari, superando il leggendario Kareem Abdul-Jabbar come capocannoniere della franchigia. E due suoi liberi negli ultimi istanti hanno assicurato il successo ai Bucks, risparimiati sulla sirena da Kevin Durant, il cui tiro da tre non è andato a segno.');
INSERT INTO `news` (`titolo`, `url_copertina`, `contenuto`) VALUES ('Lewis Hamilton lascia la Mercedes e la Formula 1', 'https://www.circusf1.com/f14/wp-content/uploads/2020/10/Hamilton_F1_Portimao-1024x510.jpg', 'La notizia era nell’aria ma oggi è arrivata l’ufficialità. Il sette volte campione del mondo di Formula 1, Lewis Hamilton ha comunicato l’intenzione di lasciare, con effetto immediato, la Mercedes e la Formula 1.\r\nIl pilota inglese, dopo aver valutato il ritardo tecnico della nuova F1 W13 da Red Bull e Ferrari, ha deciso di appendere il casco al chiodo. In Bahrain ma soprattutto in Australia, Hamilton si è ritrovato a dover lottare nelle retrovie con monoposto come Haas e Alfa Romeo.\r\nTutto questo avrebbe portato il campionissimo a dire “basta“, sfruttando una clausola contrattuale che l’inglese era riuscito a far inserire nell’ultimo rinnovo con il suo team.\r\nChi ci sarà in Australia al suo posto? Lo scopriremo presto…');
INSERT INTO `news` (`titolo`, `url_copertina`, `contenuto`) VALUES ('Aprilia rinnova Aleix Espargaro e Viñale', 'https://cdn-1.motorsport.com/images/amp/YEQPlxqY/s1000/maverick-vinales-aleix-esparga.webp', 'In una conferenza stampa che si svolgerà oggi al Mugello, Aprilia renderà ufficiale il rinnovo del contratto della sua coppia di piloti attuale. Aleix Espargaro, che attualmente è secondo nella classifica generale del mondiale a quattro punti dal leader Fabio Quartararo, stava negoziando con la Casa di Noale già dalla seconda tappa del calendario, a Mandalika.\r\nNonostante Aprilia avesse ottenuto i risultati migliori in MotoGP, la politica di riduzione degli ingaggi che si è instaurata nel campionato è stata lo scoglio principale per il rinnovo del contratto del catalano, che scade alla fine del 2022, ma che si concretizzerà.');
INSERT INTO `news` (`titolo`, `url_copertina`, `contenuto`) VALUES ('Mondiali Qatar 2022, tre arbitre e tre donne guardalinee: è la prima volta', 'https://images2.corriereobjects.it/methode_image/2022/05/19/Sport/Foto%20Sport%20-%20Trattate/3d1407099bd943b9a8d6c1d3765dd1be--0--b4ed5cb8e2614a04a504d490a7f67481-kBfG-U33402017535203Ao-656x492@Corriere-Web-Sezioni.jpg?v=20220519174723', 'Un segnale per il mondo del calcio: fra le molte «prime volte» del Mondiale in Qatar, una riguarda gli arbitri. Ed è una notizia che non può che fare piacere, perché si tratta di una svolta storica: per la prima volta ci saranno ben tre donne ad arbitrare. Si tratta di Stephanie Frappart (Francia), Salima Mukansanga (Rwanda) e Yoshimi Yamashita (Giappone). Nominate anche tre assistenti: Neuza Back (Brasile), Karen Diaz Medina (Messico) e Kathryn Nesbitt (Stati Uniti).');
INSERT INTO `news` (`titolo`, `url_copertina`, `contenuto`) VALUES ('Champions League, Ancelotti alla quinta finale: \"Mi adatto ai cambiamenti\"', 'https://img-prod.sportmediaset.mediaset.it/images/2022/05/26/091311166-4805f264-e588-41bc-9d22-049f1ede8c48.jpg', 'Carlo Ancelotti, allenatore del Real Madrid, si racconta in una intervista a pochi giorni dalla sua quinta finale di Champions League, che vedrà i blancos contrapposti al Liverpool: \"Sarà la mia quinta finale? Ci ho pensato. Sì, sono passati tanti anni dalla prima volta. Il calcio è cambiato e sono riuscito ad adattarmi ai cambiamenti. Dalla prima finale del 2003 a oggi ci sono stati molti miglioramenti. Il calcio è sempre uno spettacolo interessante e io mi adatto perché ho una grande passione per questo sport\". \"In Champions League ci siamo affrontati tante volte - ha ricordato, parlando del Liverpool -. La prima fu nel 1984 in finale a Roma, ma non ho giocato perché ero infortunato. Poi ancora nel 2005 e nel 2007 (ai tempi del Milan, ndr). In seguito la rivalità si è accentuata quando ho lavorato all Everton. Il Liverpool è una grande squadra, difficile da affrontare. Gioca ad altissimo livello, con grande fisicità, ma è un piacere trovarli in finale\".');


CREATE TABLE matches
(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titolo VARCHAR(255),
    url_copertina VARCHAR(1000),
    dettagli VARCHAR(255)
);

INSERT INTO `matches` (`titolo`, `dettagli`, `url_copertina`) VALUES ('juventus - inter', 'Serie A | 03/04/2022 - 20:50', 'https://mam-e.it/wp-content/uploads/2022/03/juve-inter-scaled.jpg');
INSERT INTO `matches` (`titolo`, `dettagli`, `url_copertina`) VALUES ('Chicago Bulls - Miami heat', 'NBA | 03/04/2022 - 02:00', 'https://www.nba.com/bulls/sites/bulls/files/mybulls_matchups1920_mia.jpg');
INSERT INTO `matches` (`titolo`, `dettagli`, `url_copertina`) VALUES ('Real Madrid - PSG', 'Champions League | 09/03/2022 - 21:00', 'https://thumbnails.cbsig.net/CBS_Production_Entertainment_VMS/2022/02/02/1998605891678/UEFA_CHAMPIONS_THUMB_04_Real-Madrid-v-PSG_1219556_1920x1080.jpg');
INSERT INTO `matches` (`titolo`, `dettagli`, `url_copertina`) VALUES ('Olimpiadi', 'Inizio | 26/07/2024', 'https://cdn.ttgitalia.com/media/2019/11/30207_161_medium.jpg');
INSERT INTO `matches` (`titolo`, `dettagli`, `url_copertina`) VALUES ('Mondiali', 'Inizio | 21/11/2022', 'https://hd2.tudocdn.net/968655?w=824&h=494');
INSERT INTO `matches` (`titolo`, `dettagli`, `url_copertina`) VALUES ('Lakers - Denver Nuggets', 'NBA | 16/04/2022 - 04:00', 'https://www.insidesport.in/wp-content/uploads/2021/05/lakers-vs-denver-nuggets.jpg');


CREATE TABLE tshirts
(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    team VARCHAR(255),
    url_copertina VARCHAR(1000),
    prezzo FLOAT
);

INSERT INTO `tshirts` (`team`, `url_copertina`, `prezzo`) VALUES ('Juventus', 'https://store.juventus.com/data/store/product/5/54815/product.jpg', '100');
INSERT INTO `tshirts` (`team`, `url_copertina`, `prezzo`) VALUES ('Lakers', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/774fac99-3305-4c61-b89c-092de9c3192a/maglia-lebron-james-los-angeles-lakers-icon-edition-swingman-nba-77FLZm.png', '60');
INSERT INTO `tshirts` (`team`, `url_copertina`, `prezzo`) VALUES ('Ferrari', 'https://i0.wp.com/motorsportclan.com/wp-content/uploads/2022/02/t-shirt-f1-team-scuderia-ferrari-2022-rosso-front.jpg?fit=800%2C800&ssl=1', '65');
INSERT INTO `tshirts` (`team`, `url_copertina`, `prezzo`) VALUES ('Ducati', 'https://www.agmotorstore.com/wp-content/uploads/2019/10/98770014_T-shirt_uomo_Ducati_Team_Replica_GP_19_f.jpg', '50');


CREATE TABLE carts
(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username_utente VARCHAR(255),
    id_prodotto INTEGER
);