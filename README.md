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
                MoX (Movies and TV Shows Explorer) este o aplicație web dezvoltată de studenții menționați în secțiunea
                de Autori de la Facultatea de
                Informatică a Universității Alexandru Ioan Cuza.
                Scopul acestui document este acela de a prezenta o descriere detaliată a funcționalităților, precum și
                de
                specifica cerințele aplicației web. Această aplicație
                va oferi utilizatorilor posibilitatea de a cauta si a filtra seriale si filme, vizualizand o multitudine de detalii despre acestea.
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
                Scopul aplicației este acela de a oferi utilizatorilor un soft simplu si usor de utilizat pentru cautarea si filtrarea filmelor si serialelor.
                Selectand un film/serial dorit, utilizatorul va avea posibilitatea de a vedea o multitudine de detalii despre acesta, de la durata, numar de episoade si genul programului, pana la buget, director si recenzii.
            </p>
        </section>
        <section id="references">
            <h4>1.5 Bibliografie</h4>
            <ul>
                <li>Site-ul Tehnologii Web, FII UAIC</li>
                <li>H Rick. IEEE-Template - GitHub</li>
            </ul>
        </section>
    </section>
    <section id="overall">
        <h3>2. Descriere Generală</h3>
        <section id="product-perspective">
            <h4>2.1 Perspectiva produsului</h4>
            <p>MoX (Movies and TV Shows Explorer) este o aplicație dezvoltată în cadrul cursului de Tehnologii Web,
                menită să
                ofere un mod de cautare si gasire a serialelor si filmelor disponibile pe platformele Netflix si Disney+.
        </section>
        <section id="product-functions">
            <h4>2.2 Funcționalitățile produsului</h4>
            Fiecare utilizator va avea acces la urmatoarele funcționălități:
            <ul>
                <li>să consulte pagină "Acasă" și sa caute un film/serial</li>
                <li>să acceseze pagina "Netflix" pentru a vizualiza lista de filme/seriale disponibile pe Netflix</li>
                <li>să acceseze pagina "Disney" pentru a vizualiza lista de filme/seriale disponibile pe Disney+
                </li>
                <li>să acceseze pagina "Despre" pentru a accesa scurtă descriere a paginii web</li>
                <li>să acceseze pagina "Ajutor" pentru a beneficia de sfaturi în vederea utilizării aplicației</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate adăuga seriale noi</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate modifica seriale deja existente</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate adăuga filme noi</li>
                <li>dacă utilizatorul are rol de <b>admin</b>, acesta poate modifica filme deja existente</li>
            </ul>
        </section>
        <section id="users">
            <h4>2.3 Clase și caracteristici ale utilizatorilor</h4>
            <h5>2.3.1 Utilizator principal</h5>
            <ul>
                <li>utilizatorii autentificați pot fi:</li>
                <li style="list-style: none">
                    <ul>
                        <li>admini care au dreptul de a adauga si modifica date despre filme/seriale.
                        </li>
                    </ul>
                </li>
                <li>
                    utilizatorii neautentificați pot fi:
                    <ul>
                        <li>orice persoana care doreste sa gaseasca un serial/film de vizionat, sau poate cauta un serial/film deja cunoscut pentru a se documenta in legatura cu anumite detalii despre acesta.
                        </li>
                    </ul>
                </li>
            </ul>
            <h5>2.3.2 Caracteristici</h5>
            <ul>
                <li>Utilizatorii care sunt <b> autentificați </b> pot accesa pagină de "Netflix", "Disney", "Pagina adminului"
                    dar și cele două pagini ce oferă detalii și sfaturi cu privire la aplicație, "Despre" și "Ajutor".
                </li>
                <li>Utilizatorii care nu sunt autentificați pot să vizualizeze și ei aceleasi pagini ca si adminul, inafara de "Pagina adminului", intrucat utilizatorii obisnuiti nu pot modifica datele site-ului.
                </li>
            </ul>
        </section>
        <section id="operating-environment">
            <h4>2.4 Mediul de operare</h4>
            <p>
                Produsul dezvoltat poate fi utilizat pe orice dispozitiv cu un browser web care suportă HTML5 si CSS.
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
                        <li class="pictures" style="list-style: none"><img alt="login" src="Images/navBar.png" width=800
                        ></li>
                    </ul>
                </li>
                <li id="home-page"><b> Pagina de acasă</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de a intriga utilizatorul in a cauta un serial/film pentru a vedea functionalitatea acestuia.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="Images/homePage.png"
                                                                           width=800>
                        </li>
                    </ul>
                </li>
                <li id="about"><b>Pagina informativa</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de a introduce site-ul MoX pe scurt, prin menționarea unor mici detalii:
                            tehnologii
                            utilizate, numele autorilor, scopul aplicației și bibliografia.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="Images/aboutPage.png" width=800>
                        </li>
                    </ul>
                <li id="help"><b>Pagina de ajutor</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina are rolul de a prezenta câteva sfaturi pentru a putea beneficia de o experienta
                            completa pe site.
                        </li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="Images/helpPage.png"
                                                                           width=800
                        </li>
                    </ul>
                </li>
                <li id="admin"><b>Pagina Administratorului</b></li>
                <li style="list-style: none">
                    <ul>
                        <li>Pagina afișează interfață pentru <b>adminstrator</b>.</li>
                        <li class="pictures" style="list-style: none"><img alt="overview" src="Images/admin1.png"
                                                                           width=800>
                        </li>
                        <li>Administratorul are capacitatea de a adaugă/modifică
                            filme/seriale din baza de date.
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </section>
</article>
</body>
</html>
