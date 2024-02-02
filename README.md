# Sprzęt apka
Aplikacja dla wypożyczalni sprzętu ogrodowego i budowlanego.<br> Posiada dwa stopnie autoryzacji klient oraz pracownik wypożyczalni.

## Spis treści

- [Funkcjonalności](#Funkcjonalności)
- [Instalacja i uruchomienie](#instalacja-i-uruchomienie)
- [Schemat ERD bazy danych](#ERD)
- [Użyte technologie](#Technologie)

## Funkcjonalności

<b>Rejstracja użytkownika </b> <br>
Klienci mogą się samodzielnie zarejestrować w systemie poprzez użycie formularza rejestracji.

<b>Przeglądanie zasobów </b> <br>
Klienci mogą przeglądać ofertę sprzętów w posiadaniu wypozyczlani oraz sprawdzać ich dostępność.

<b> Rezerwacja zasobów </b> <br>
Klienci mogą zarezerwować sprzęt online, by uzyskać pewność, że sprzęt będzie dla nih dostępny po zjawieniu się w placówce.
<br>

<b> Obsługa wypozyczeń i zwrotów</b> <br>
Pracownicy odnotowują w aplikacji wydanie zamowionego sprzętu oraz jego zwrot.

<b>Dodawanie zasobów</b> <br>
Pracownicy mogą dodawać nowe sprzęty do bazy.

## Instalacja i uruchomienie
1. <b>Wymagania</b>: 
Docker<br>
2. Należy pobrać repozytorium https://github.com/dzielislaw/WDPAI_projekt_A_Roman.git
3. W katalogu głównym pobranego repozytorium uruchomić polecenia:
`docker compose build`,<br>a następnie `docker compose up`
## ERD 
![Diagram ERD bazy danych](https://github.com/dzielislaw/WDPAI_projekt_A_Roman/blob/main/Diagram%20ERD.png?raw=true)

## Technologie
Frontend: HTML5, CSS3, JavaScript <br>
Backend: PHP 8 <br>
Baza danych: PostgreeSQL <br>
Serwer www: nginx <br>
Konteneryzacja: Docker
