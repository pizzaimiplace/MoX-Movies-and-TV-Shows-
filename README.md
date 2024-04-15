<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
</head>
<body>
<article>
    <header>
        <h1>
            MoX (Movies and TV Shows Explorer)
        </h1>
    </header>
    <h2>Cuprins</h2>
    <ul>
        <li>
            <a href="#authors">Autori</a>
        </li>
        <li>
            <a href="#introduction">1. Introducere</a>
            <ul>
                <li><a href="#introduction-purpose">1.1 Scop</a></li>
                <li><a href="#conventions">1.2 Convenție de scriere</a></li>
                <li><a href="#audience">1.3 Publicul țintă</a></li>
                <li><a href="#product-scope">1.4 Scopul produsului</a></li>
                <li><a href="#references">1.5 Referințe</a></li>
            </ul>
        </li>
        <li><a href="#overall">2. Descriere Generală</a>
            <ul>
                <li><a href="#product-perspective">2.1 Perspectiva produsului</a></li>
                <li><a href="#product-functions">2.2 Funcțiile produsului</a></li>
                <li><a href="#users">2.3 Clase și caracteristici ale utilizatorilor</a></li>
                <li><a href="#operating-environment">2.4 Mediul de operare</a></li>
                <li><a href="#documentation">2.5 Documentația pentru utilizator</a></li>
            </ul>
        </li>
        <li><a href="#external">3. Interfețele aplicației </a>
            <ul>
                <li><a href="#user-interface">3.1 Interfața utilizatorului </a>
                    <ul>
                        <li><a href="#nav-bar">3.1.1 Bara de navigație </a></li>
                        <li><a href="#home-page">3.1.2 Pagina de acasă </a></li>
                        <li><a href="#help">3.1.3 Pagina de ajutor </a></li>
                        <li><a href="#about">3.1.4 Pagina informativa</a></li>
                        <li><a href="#admin">3.1.5 Pagina administratorului </a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div role="contentinfo">
        <section id="authors" typeof="sa:AuthorsList">
            <h2>Autori</h2>
            <ul>
                <li property="schema:author" typeof="sa:ContributorRole">
            <span typeof="schema:Person">
              <meta content="Catalin" property="schema:givenName">
              <meta content="Gabriel" property="schema:additionalName">
              <meta content="Dragos" property="schema:familyName">
              <span property="schema:name">Dragos Gabriel-Catalin</span>
            </span>
                    <ul>
                        <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                            <a href="mailto:catalind333@gmail.com" property="schema:email">catalind333@gmail.com</a>
                        </li>
                    </ul>
                </li>
                <li property="schema:author" typeof="sa:ContributorRole">
            <span typeof="schema:Person">
              <meta content="Daniel" property="schema:givenName">
              <meta content="Galbeaza" property="schema:familyName">
              <span property="schema:name">Galbeaza Daniel</span>
            </span>
                    <ul>
                        <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                            <a href="mailto:galbeazad@gmail.com" property="schema:email">galbeazad@gmail.com</a>
                        </li>
                    </ul>
            </ul>
        </section>
    </div>
    <section id="introduction">
        <h3>1. Introducere</h3>
        <section id="introduction-purpose">
            <h4>1.1 Scop</h4>
            <p>
                RoT (Romanian Traffic Signs Tutor) este o aplicație web dezvoltată de studenții menționați în secțiunea
                de Autori de la Facultatea de
                Informatică a Universității Alexandru Ioan Cuza.
                Scopul acestui document este acela de a prezenta o descriere detaliată a funcționalităților, precum și
                de
                specifica cerințele aplicației web. Această aplicație
                va oferi utilizatorilor posibilitatea învățării legislației și a semnelor rutiere din România. Pe lângă
                acestea, utilizatorului îi sunt
                disponibile semnele rutiere din 5 alte țări: Anglia, Franța, Italia, Turcia și Islanda.
            </p>
        </section>
        <section id="conventions">
            <h4> 1.2 Convenția documentului</h4>
            <ul>
                <li>
                    Acest document urmează șablonul de documentație a cerințelor software conform IEEE Software
                    Requirements
                    Specification.
                </li>
                <li>
                    Textul <b>îngroșat</b> este folosit pentru a defini noțiuni personalizate sau pentru a accentua
                    concepte
                    importante.
                </li>
            </ul>
        </section>
        <section id="audience">
            <h4>1.3 Publicul țintă</h4>
            <p>
                Acest document este destinat profesorilor, studenților sau dezvoltatorilor, însă orice utilizator,
                indiferent
                de cunoștințele lor tehnologice,
                poate consulta secțiunile de <b>Interfeța utilizatorului</b> și <b>Caracteristici ale sistemului</b>
                pentru a
                obține o mai bună înțelegere a ceea ce oferă aplicația.
            </p>
        </section>
        <section id="product-scope">
            <h4>1.4 Scopul Produsului</h4>
            <p>
                Scopul aplicației este acela de a oferi utilizatorilor un soft educațional ce propune un mod de învățare
                a
                legislației și semnelor rutiere din România. Utilizatorii pot citi codul rutier, dar și întrebări
                similare
                celor din chestionarele auto, ce conț în explicații pentru fiecare varianta de răspuns. Totodată,
                utilizatorii
                pot rezolva și chestionare predefinite, conținând 26 de întrebări, în vederea pregătirii componenței
                teoretice
                a examenului pentru obținerea permisului de conducere. De asemenea, utilizatorii își pot crea un cont
                pentru a
                beneficia de restul funcționalităților RoT.
            </p>
        </section>
        <section id="references">
            <h4>1.5 Bibliografie</h4>
            <ul>
                <li>Buraga Sabin-Corneliu, Site-ul Tehnologii Web, FII UAIC</li>
                <li>H Rick. IEEE-Template - GitHub</li>
            </ul>
        </section>
    </section>
    <section id="overall">
        <h3>2. Descriere Generală</h3>
        <section id="product-perspective">
            <h4>2.1 Perspectiva produsului</h4>
            <p>RoT (Romanian Traffic Signs Tutor) este o aplicație dezvoltată în cadrul cursului de Tehnologii Web,
                menită să
                ofere un mod de învățare a legislației rutiere, a semnelor de circulație din România, dar și din alte
                țări.
        </section>
        <section id="product-functions">
            <h4>2.2 Funcționalitățile produsului</h4>
            Fiecare utilizator va avea acces la urmatoarele funcționălități:
            <ul>
                <li>să se înregistreze pe site.</li>
                <li>să se autentifice pe site.</li>
                <li>să își reseteze parola in cazul in care a uitat-o.</li>
                <li>să consulte pagină "Acasă" și noutățile disponibile</li>
                <li>să acceseze pagina "Legislație" pentru a accesa codul rutier, "Despre", "Ajutor"</li>
                <li>să acceseze pagina "Semne de circulație" pentru a vizualiza semne rutiere atât din România, cât și
                    din alte țări
                </li>
                <li>să acceseze pagina "Despre" pentru a accesa scurtă descriere a paginii web</li>
                <li>să acceseze pagina "Ajutor" pentru a beneficia de sfaturi în vederea utilizării aplicației</li>
                <li>dacă este <b>autentificat</b>, să acceseze pagină "Învață" și să rezolve întrebări</li>
                <li>dacă este <b>autentificat</b>, să acceseze pagină "Chestionare" și să rezolve teste predefinite</li>
                <li>dacă este <b>autentificat</b>, să își acceseze profilul și sa verifice statisticile personale</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate șterge utilizatori din baza de date</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate adăuga întrebări noi</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate modifica întrebări deja existente</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate adăuga chestionare noi</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate modifica chestionare deja existente</li>
            </ul>
        </section>
        <section id="users">
            <h4>2.3 Clase și caracteristici ale utilizatorilor</h4>
            <h5>2.3.1 Utilizator principal</h5>
            <ul>
                <li>utilizatorii autentificați pot fi:</li>
                <li style="list-style: none">
                    <ul>
                        <li>orice categorie de oameni care doresc să învețe legislația rutieră și semne de circulație
                            din România și nu numai.
                        </li>
                    </ul>
                </li>
                <li>
                    utilizatorii neautentificați pot fi:
                    <ul>
                        <li>cursanți al școlilor de șoferi ce se pregătesc pentru susținerea probei teoretice a
                            examenului de obținere a permisului de conducere.
                        </li>
                    </ul>
                </li>
            </ul>
            <h5>2.3.2 Caracteristici</h5>
            <ul>
                <li>Utilizatorii care sunt <b> autentificați </b> pot accesa pagină de "Legislație", de "Semne de
                    circulație",
                    dar și cele două pagini ce oferă detalii și sfaturi cu privire la aplicație, "Despre" și "Ajutor".
                    Mai mult, aceștia pot rezolva întrebări (explicate) și teste predefinite. De asemenea, aceștia pot
                    să își
                    monitorizeze progresul prin cunoașterea numărului de întrebări/chestionare rezolvate, dar și din
                    informații
                    referitoare la procentajul de reușită sau media de timp; toate acestea fiind salvate la profilul
                    fiecărui utilizator.
                </li>
                <li>Utilizatorii care nu sunt autentificați pot să vizualizeze și ei codul rutier (pagina de
                    "Legislație") și
                    "Semne de circulație", dar în schimb nu pot accesa modul de "Invață" și nici cel de "Chestionare".
                    Așadar, aceștia pot să se înregistreze ca și utilizator și să beneficieze de toate
                    funcționalitățile.
                </li>
            </ul>
        </section>
        <section id="operating-environment">
            <h4>2.4 Mediul de operare</h4>
            <p>
                Produsul dezvoltat poate fi utilizat pe orice dispozitiv cu un browser web care suportă HTML5, CSS și
                JavaScript.
            </p>
        </section>
        <section id="documentation">
            <h4>2.5 Documentația pentru utilizator</h4>
            <p>
                Utilizatorii pot consulta acest document pentru explicații detaliate despre funcționalitățile aplicației
                web.
            </p>
        </section>
    </section>
    <section id="external">
        <h3>3. Interfețele aplicației</h3>
        <section id="user-interface">
            <h4>3.1 Interfața utilizatorului</h4>
            Mai jos, puteți vedea o prezentare generală a fiecărei pagini a aplicației și funcționalităților pe care le
            oferă:
            <ul>
                <li id="nav-bar"><b>Bara de navigație</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Aceasta reprezintă meniul de navigare către fiecare pagina a aplicației, prezent pe fiecare
                            pagină totodată.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="login" src="images/navBar.png" width=800
                        ></li>
                    </ul>
                </li>
                <li id="login-page"><b>Pagina de autentificare</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de a realiza autentificarea utilizatorilor la RoT.</li>
                        <li>Pentru a se autentifica, utilizatorul trebuie să completeze câmpurile de "username" și
                            "parolă" cu
                            credențiale <b>valide</b>, urmând să acționeze butonul <b>Autentificare</b>.
                        </li>
                        <li> În cazul în care utilizatorul nu are cont pe site, acesta își poate crea unul prin
                            accesarea pagini de
                            înregistrare, ce se face prin apăsarea butonului <b>Creează un cont nou</b>.
                        </li>
                        <li> În cazul în care utilizatorul și-a uitat parola, acesta poate să o reseteze selectând
                            opțiunea de
                            <b> Ai uitat parola? </b></li>
                        <li class="pictures" style="list-style: none"><img alt="login" height="400"
                                                                           src="images/loginPage.png" width=800>
                        </li>
                    </ul>
                </li>
                <li id="signup-page"><b>Pagina de înregistrare</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina oferă funcționalitatea de înregistrare a utilizatorilor, pentru a putea beneficia de
                            toate
                            funcționalitățile RoT.
                        </li>
                        <li>Pentru a se înregistra, utilizatorul trebuie să completeze câmpurile <b>Email</b>,
                            <b>Nume</b>,
                            <b>Prenume</b>, <b>Nume utilizator</b> și <b>Parola</b>. Mai mult, câmpurile <b>Email</b> și
                            <b>Nume utilizator</b>
                            trebuie să fie <b>unice</b>.
                        </li>
                        <li>În cazul în care utilizatorul își amintește că are un cont existent, acesta poate apasă
                            butonul
                            <b>Autentificare</b> aflat în partea de jos a formularului, sau pe butonul <b>Login</b> din
                            coltul din dreapta-sus
                            al paginii, pentru a reveni la meniul de autentificare.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="signup" height="400"
                                                                           src="images/signupPage.png" width=800>
                    </ul>
                </li>
                <li id="sendMail-page"><b>Pagina de de resetare a parolei prin mail</b></li>
                <li style="list-style: none">
                    <ul>
                        <li> Pagina are rolul de a trimite un email către utilizator, care îl va redirecționa spre o
                            pagină nouă, unde care
                            își va introduce nouă parolă. La apăsarea butonului de <b> Trimite mail </b>, utilizatorul
                            va fi redirecționat
                            către pagină de autentificare.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="login" height="400"
                                                                           src="images/sendMail.png" width=800></li>
                    </ul>
                </li>
                <li id="home-page"><b> Pagina de acasă</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de prezența ultimele noutăți, sfaturi și clasementele actualizate.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/homePage.png"
                                                                           width=800>
                        </li>
                    </ul>
                </li>
                <li id="learning"><b>Pagina de învățare</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina oferă o întrebare dată spre rezolvare, la care se va oferi o explicație indiferent de
                            corectitudinea
                            răspunsului dat de utilizator. Butonul <b>Trimite răspunsul</b> va valida întrebarea, iar
                            <b>Următoarea întrebare</b>
                            o va sări pe cea curentă, dar se va reveni mai târziu la ea.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/learn1.png"
                                                                           width=800>
                        </li>
                        <li>După ce răspunsul a fost trimis, utilizatorul va vedea corectitudinea fiecărui răspuns,
                            însoțite de o
                            explicație corespunzătoare.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/learn2.png"
                                                                           width=800>
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="editprofile"
                                                                           src="images/learningPage.png" width=800>
                        </li>
                    </ul>
                </li>
                <li id="rules"><b>Pagina cu legislația</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina conține codul rutier actualizat la zi.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="i mages/rulesPage.png"
                                                                           width=800>
                        </li>
                    </ul>
                <li id="signs"><b>Pagina cu semnele de circulație</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina conține semne rutiere atât din țară noastră, cât și din alte cinci țări.</li>
                        <li> Pentru a accesa semnele din România, se va face click pe steag, urmând să se selecteze în
                            mod specific
                            categoria de semne dorită spre a fi văzută. Apăsând pe oricare dintre cele 5 steaguri
                            străine, se va deschide
                            o listă cu semnele de circulație corespunzătoare.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="streetSigns"
                                                                           src="images/streetSigns.png" width=800
                        ></li>
                        <li class="pictures" style="list-style: none"><img alt="streetSignsRomania"
                                                                           src="images/streetSignsRomania.png" width=800
                        ></li>
                        <li class="pictures" style="list-style: none"><img alt="streetSignsRomaniaExamples"
                                                                           src="images/streetSignsRomaniaExample.png" width=800
                        ></li>
                        <li class="pictures" style="list-style: none"><img alt="streetSignsItaly"
                                                                           src="images/streetSignsItaly.png" width=800
                        ></li>
                    </ul>
                </li>
                <li id="tests"><b>Pagina de chestionare</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina prezintă o lista de chestionare predefinite, la care se poate obține un punctaj maxim
                            de 26 de răspunsuri
                            corecte. Astfel, fiecare dintre chestionare are un status: <b>Eșuat</b>, <b>Neîncercat</b>
                            și <b>Perfect</b>;
                            acestea pot fi refăcute până la obținerea punctajului maxim.
                        </li>
                        <li>La momentul începerii unui chestionar, un cronometru de 30 de minute va porni, acesta
                            constituind durata de
                            rezolvare a testului. Testul va fi trecut dacă utilizatorul va răspunde la cel puțin 22 de
                            întrebări corect,
                            dar totodată nu se va opri dacă acesta acumulează mai mult de 4 răspunsuri greșite.
                        </li>
                        <li>Întrebările au 3 variante de răspuns, cu cel puțin unul corect la fiecare. Pentru a rezolva,
                            se va(vor) bifa
                            răspunsul(urile) corect(e) și se va apăsa butonul <b>Trimite răspunsul</b>, sau <b>Răspunde
                                mai târziu</b>,
                            dacă se dorește amânarea pe mai târziu a întrebării curente.
                        </li>
                        <li>La finalul completării testului, acesta își va schimbă statusul, dacă este cazul, și se va
                            primi un mesaj
                            conform căruia utilizatorul a trecut sau nu testul cu brio.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="streetSignsRomania"
                                                                           src="images/testList.png" width=800
                        ></li>
                        <li class="pictures" style="list-style: none"><img alt="streetSignsRomaniaExamples"
                                                                           src="images/testExample.png" width=800
                        ></li>
                        <li class="pictures" style="list-style: none"><img alt="streetSignsItaly"
                                                                           src="images/testDone.png" width=800
                        ></li>
                    </ul>
                </li>
                <li id="about"><b>Pagina informativa</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de a introduce site-ul RoT pe scurt, prin menționarea unor mici detalii:
                            tehnologii
                            utilizate, numele autorilor, scopul aplicației și bibliografia.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/aboutPage.png" width=800>
                        </li>
                    </ul>
                <li id="help"><b>Pagina de ajutor</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de a prezenta câteva sfaturi pentru a putea beneficia de o experienta
                            completa pe site.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/helpPage.png"
                                                                           width=800
                        </li>
                    </ul>
                <li id="profile"><b>Pagina de profil</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina prezintă informații despre utilizator.</li>
                        <li>
                            <img alt="overview" src="images/profile1.png" width=800>
                        </li>
                        <li>Utilizatorul <b>autentificat</b> își va vedea la profil detalii despre cont, un procent
                            referitor la
                            progresul sau, numărul de întrebări/chestionare parcurse (corecte și greșite), dar și câteva
                            grafice
                            corespunzătoare acestora.
                        </li>
                        <li>Mai mult, utilizatorul va avea la dispoziție un buton <b>Logout</b> prin care poate ieși din
                            cont,
                            dar is unul <b>Schimbă parolă</b>, în cazul în care își dorește acest lucru.
                        </li>
                        <li><img alt="overview" src="images/profile2.png" width=800></li>
                        <li><img alt="overview" src="images/profile3.png" width=800></li>
                        <li><img alt="overview" src="images/profile4.png" width=800></li>
                    </ul>
                </li>
                <li id="error400"><b>Pagina 400</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina afișează eroarea <b>400 Cerere greșită</b>.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/error400.png"
                                                                           width=800>
                        </li>
                    </ul>
                </li>
                <li id="error404"><b>Pagina 404</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina afișează eroarea <b>404 Cerere greșită</b>.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/error404.png"
                                                                           width=800>
                        </li>
                    </ul>
                </li>
                <li id="admin"><b>Pagina Administratorului</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina afișează interfață pentru <b>adminstrator</b>.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/admin1.png"
                                                                           width=800>
                        </li>
                        <li>Administratorul are capacitatea de a adaugă/modifică
                            întrebări și/sau chestionare și de a șterge utilizatori din baza de date.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/admin2.png"
                                                                           width=800>
                        </li>
                        <li>Formularul <b>Creare întrebare</b> se va completa cu informațiile necesare, întrebarea
                            urmand sa se
                            salveze in baza de date. La fel se procedeaza si pentru chestionare.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/admin3.png"
                                                                           width=800>
                        </li>
                        <li>Formularul <b>Actualizare întrebare</b> se va completa cu <b>ID-ul</b> dorit, întrebarea
                            urmand sa se
                            salveze in baza de date printr-un formular ca la punctul precedent. La fel se procedeaza si
                            pentru chestionare.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/admin4.png"
                                                                           width=800>
                        </li>
                        <li>Pentru a șterge un utilizator din baza de date, se va apasă butonul corespunzător fiecărui
                            utilizator din tabel.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/admin5.png"
                                                                           width=800>
                        </li>
                    </ul>
                </li>
                <li id="changepass"><b>Pagina de schimbare a parolei</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagină afișează un formular numit <b>Resetare parolă</b>, unde se vor completa corespunzător
                            câmpurile
                            pentru a schimbă parolă veche cu cea nouă.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/changePass.png"
                                                                           width=800>
                        </li>
                        <li>Se va primi un mesaj ce confirmă această schimbare, putând reveni la profil prin acționarea
                            butonului
                            <b>Înapoi la profil</b>.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="images/passChanged.png"
                                                                           width=800>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </section>
</article>
</body>
</html>
