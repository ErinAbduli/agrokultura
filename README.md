# Agrokultura

Agrokultura është një platformë e-commerce e projektuar për shitjen e furnizimeve, veglave, makinerive dhe pajisjeve bujqësore. E ndërtuar me HTML, CSS dhe JavaScript të pastër, ky projekt përmban një vitrinë të plotë për përdoruesin dhe një panel të dedikuar administratori për menaxhimin e faqes. Aplikacioni është zhvilluar në gjuhën shqipe, duke i shërbyer një tregu specifik rajonal.

## Karakteristikat kryesore

-   **Frontend Responziv:** Një ndërfaqe përdoruesi e pastër dhe moderne që përshtatet me madhësi të ndryshme ekrani, nga desktopët te pajisjet mobile, duke paraqitur një menu hamburgeri të personalizuar.
-   **Katalog Produktesh Dinamik:**
    -   Shfletoni produktet përmes një menuje kategorish me shumë nivele
    -   Filtroni produktet sipas çmimeve dhe prodhuesit.
    -   Renditni produktet sipas çmimit dhe emrit.
    -   Funksionalitet kërkimi për të gjetur shpejt artikujt.
-   **Workflow e Kompletuar:**
    -   Faqe të detajuara produktesh me përshkrime, vlerësime nga klientët dhe kontrolle sasie.
    -   Shportë funksionale blerjesh për të shtuar, menaxhuar sasitë dhe hequr artikuj.
    -   Sistem vërtetimi përdoruesi me faqe hyrjeje dhe regjistrimi, i kompletuar me validim me Javascript në frontend.
-   **Panel i Plotë i Administratorit:**
    -   Një seksion i sigurt për administratorët për të menaxhuar dyqanin.
    -   Paneli i përgjithshëm që shfaq metrika kryesore si shitjet, porositë dhe numri i klientëve.
    -   Ndërfaqe CRUD (Krijo, Lexo, Përditëso, Fshi) për menaxhimin e produkteve, porosive dhe klientëve.
-   **Permbajtja Informative:** Përfshin një faqe "Mbi Ne" me një kronologji të kompanisë, një faqe "Na kontaktoni" me një hartë vendndodhjeje dhe një formular të validuar, si dhe faqe të shumta politikash (Privatësia, Rimbursimi, Kushtet dhe Afatet, Cookies).

## Tech Stack

-   **Frontend:** HTML5, CSS3, JavaScript (ES6)
-   **Backend:** HTML5, CSS3, JavaScript (ES6)
-   **Icons:** Bootstrap Icons
-   **Design:** Teknologjitë web te pastra pa frameworks të jashtme, të përqendruara në ndërveprimin dhe responsivitet.

## Struktura e Projektit (Frontend)

Repository është e organizuar me një ndarje të qartë midis pikës kryesore të hyrjes dhe faqeve dhe aseteve të detajuara të frontend-it.

```
/
├── index.html                # Faqja Kryesore (Ballina)
└── frontend/
    ├── assets/
    │   ├── css/                # Stilimi për të gjitha faqet
    │   ├── images/             # Imazhe dhe logo statike
    │   └── js/                 # JavaScript për interaktivitet dhe validim
    └── pages/
        ├── admin/              # Faqet Admin
        ├── cart/               # Faqet e Shopping cart
        ├── contactUs/          # Faqja e Kontaktit
        ├── forms/              # Faqet për Login dhe Regjistrim
        ├── policies/           # Privatësia, Kushtet, Cookies etj.
        └── products/           # Kategoritë, subkategoritë dhe faqja e detajeve te produktit
```

## Si ta Përdorim

Ky është një projekt statik i frontend-it dhe nuk kërkon një proces kompleks ndërtimi (PËR MOMENTIN).

1.  **E bëjmë clone repository:**
    ```bash
    git clone https://github.com/erinabduli/agrokultura.git
    ```

2.  **Navigaojm tek skedari i projektit:**
    ```bash
    cd agrokultura
    ```

3.  **Hapim Aplikacionin:**
    Thjesht hapni `index.html` ne web brower-in tuaj për të përdorur aplikacionin.

   Për përvojën më të mirë të zhvillimit, rekomandohet të përdorni një zgjerim të serverit live (si "Live Server" për Visual Studio Code) për të trajtuar ringarkimin automatik dhe për të shmangur problemet e mundshme të CORS me shtigjet lokale të skedarëve.
