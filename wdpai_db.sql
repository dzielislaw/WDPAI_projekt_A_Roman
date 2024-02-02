/*
 Navicat Premium Data Transfer

 Source Server         : WDPAI
 Source Server Type    : PostgreSQL
 Source Server Version : 160000 (160000)
 Source Host           : localhost:5432
 Source Catalog        : database
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160000 (160000)
 File Encoding         : 65001

 Date: 02/02/2024 12:24:52
*/


-- ----------------------------
-- Type structure for stan
-- ----------------------------
DROP TYPE IF EXISTS "public"."stan";
CREATE TYPE "public"."stan" AS ENUM (
  'sprawny',
  'w konserwacji',
  'zniszczony'
);
ALTER TYPE "public"."stan" OWNER TO "docker";

-- ----------------------------
-- Sequence structure for egzemplarze_egzemplarz_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."egzemplarze_egzemplarz_id_seq";
CREATE SEQUENCE "public"."egzemplarze_egzemplarz_id_seq" 
INCREMENT 1
MINVALUE  10
MAXVALUE 1000000
START 10
CACHE 1;

-- ----------------------------
-- Sequence structure for klienci_klient_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."klienci_klient_id_seq";
CREATE SEQUENCE "public"."klienci_klient_id_seq" 
INCREMENT 1
MINVALUE  3
MAXVALUE 2147483647
START 3
CACHE 1;

-- ----------------------------
-- Sequence structure for logi_log_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."logi_log_id_seq";
CREATE SEQUENCE "public"."logi_log_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 100000
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for narzedzia_narzedzie_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."narzedzia_narzedzie_id_seq";
CREATE SEQUENCE "public"."narzedzia_narzedzie_id_seq" 
INCREMENT 1
MINVALUE  5
MAXVALUE 10000000
START 5
CACHE 1;

-- ----------------------------
-- Sequence structure for wypozyczenia_wypozyczenie_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."wypozyczenia_wypozyczenie_id_seq";
CREATE SEQUENCE "public"."wypozyczenia_wypozyczenie_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 100000000
START 1
CACHE 1;

-- ----------------------------
-- Table structure for egzemplarze
-- ----------------------------
DROP TABLE IF EXISTS "public"."egzemplarze";
CREATE TABLE "public"."egzemplarze" (
  "egzemplarz_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  10
MAXVALUE 1000000
START 10
CACHE 1
),
  "narzedzie_id" int4 NOT NULL,
  "stan" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "uwagi" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of egzemplarze
-- ----------------------------
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (15, 1, 'sprawny', NULL);
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (17, 3, 'sprawny', NULL);
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (16, 2, 'sprawny', 'uszczerbany plastik');
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (18, 1, 'sprawny', NULL);
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (19, 19, 'sprawny', NULL);
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (20, 20, 'sprawny', NULL);
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (21, 21, 'sprawny', NULL);
INSERT INTO "public"."egzemplarze" OVERRIDING SYSTEM VALUE VALUES (22, 22, 'sprawny', NULL);

-- ----------------------------
-- Table structure for jednostki
-- ----------------------------
DROP TABLE IF EXISTS "public"."jednostki";
CREATE TABLE "public"."jednostki" (
  "jednostka_id" int4 NOT NULL,
  "nazwa" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of jednostki
-- ----------------------------
INSERT INTO "public"."jednostki" VALUES (1, 'Wat');
INSERT INTO "public"."jednostki" VALUES (2, 'dB');

-- ----------------------------
-- Table structure for kary
-- ----------------------------
DROP TABLE IF EXISTS "public"."kary";
CREATE TABLE "public"."kary" (
  "wypozyczenie-id" int4 NOT NULL,
  "kara" money DEFAULT 1
)
;

-- ----------------------------
-- Records of kary
-- ----------------------------
INSERT INTO "public"."kary" VALUES (19, '$1.00');
INSERT INTO "public"."kary" VALUES (21, '$5.00');

-- ----------------------------
-- Table structure for kategorie
-- ----------------------------
DROP TABLE IF EXISTS "public"."kategorie";
CREATE TABLE "public"."kategorie" (
  "kategoria_id" int4 NOT NULL,
  "nazwa" varchar(20) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of kategorie
-- ----------------------------
INSERT INTO "public"."kategorie" VALUES (3, 'kosiarki');
INSERT INTO "public"."kategorie" VALUES (4, 'piły spalinowe');
INSERT INTO "public"."kategorie" VALUES (5, 'szlifierki');
INSERT INTO "public"."kategorie" VALUES (6, 'podkaszarki');
INSERT INTO "public"."kategorie" VALUES (7, 'betoniarki');
INSERT INTO "public"."kategorie" VALUES (8, 'wiertarki');
INSERT INTO "public"."kategorie" VALUES (1, 'ogrodowe');
INSERT INTO "public"."kategorie" VALUES (2, 'budowlane');
INSERT INTO "public"."kategorie" VALUES (9, 'myjki ciśnieniowe');
INSERT INTO "public"."kategorie" VALUES (10, 'drabiny');
INSERT INTO "public"."kategorie" VALUES (11, 'wiertnie');

-- ----------------------------
-- Table structure for klienci
-- ----------------------------
DROP TABLE IF EXISTS "public"."klienci";
CREATE TABLE "public"."klienci" (
  "klient_id" int4 NOT NULL GENERATED BY DEFAULT AS IDENTITY (
INCREMENT 1
MINVALUE  3
MAXVALUE 2147483647
START 3
CACHE 1
),
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "imie" varchar(25) COLLATE "pg_catalog"."default" NOT NULL,
  "nazwisko" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "pesel" char(11) COLLATE "pg_catalog"."default",
  "nip" char(10) COLLATE "pg_catalog"."default",
  "hash" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of klienci
-- ----------------------------
INSERT INTO "public"."klienci" VALUES (1, 'jan@kiemlicz.com', 'Jan', 'Kiemlicz', '01234567890', NULL, '$2y$10$3f/fkJWIcNwYVGsO1Ua0kOXI0hyta.7CEOO5Tm4e0MpeAvRY3Y49G');
INSERT INTO "public"."klienci" VALUES (2, 'ojciec@kiemlicz.com', 'Andrzej', 'Kiemlicz', '12345678900', NULL, '$2y$10$weLrhWyrlnEpfHXEVHiEruNYH9DX5x93N.wMaZWmq.8QlPqKYDMsy');
INSERT INTO "public"."klienci" VALUES (3, 'drugi@kiemlicz.com', 'Józef', 'Kiemlicz', '23456789012', NULL, '$2y$10$weLrhWyrlnEpfHXEVHiEruNYH9DX5x93N.wMaZWmq.8QlPqKYDMsy');
INSERT INTO "public"."klienci" VALUES (8, 'Jan@dan.test', 'Jan', 'Dan', '11111222222', NULL, '$2y$10$H1Zq/h60gikxLIgJC1hTd.aPnybR.peecrphAx/CcS.VaZ35Zrfu2');
INSERT INTO "public"."klienci" VALUES (9, 'andrzej@kowal.com', 'Andrzej', 'Kowal', '00000000001', NULL, '$2y$10$OrMY93n8jm2t4J3v12SGA.Dani4syFf3KIHm3FTC/E.mFy2EXC8cS');
INSERT INTO "public"."klienci" VALUES (14, 'marian@iksinski.com', 'Marian', 'Iksiński', '99999999999', NULL, '$2y$10$PXQUOWuH/gC0hPOlNCuybecvzRpfHGGNnVPmh7itdP8aMY8IX/In6');
INSERT INTO "public"."klienci" VALUES (10, 'Jan@dan.teste', 'Jan', 'Dan', '11111222224', NULL, '$2y$10$qSevBF6b9gwQ6pC09NRsNewWZurfKopfYOWklk/QCRC/jvqSDiuDS');
INSERT INTO "public"."klienci" VALUES (13, 'jan@kiemlicz.com89', 'Paweł', 'Nowak', '00000000001', NULL, '$2y$10$kXbX1p65cg180a40GDGZ3OW3NR.tFmXHJATvAqfq96wqtDCGGEBRm');
INSERT INTO "public"."klienci" VALUES (15, 'jan@janeczek.com', 'Jan', 'Przykładowy', '55555555555', NULL, '$2y$10$rv.HAzARrWm2g33hrPoc2eU75rEVQmMlq0oulSinlsGOkugM7LT.2');

-- ----------------------------
-- Table structure for logi
-- ----------------------------
DROP TABLE IF EXISTS "public"."logi";
CREATE TABLE "public"."logi" (
  "log_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 100000
START 1
CACHE 1
),
  "klient_id" int4 NOT NULL,
  "akcja" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "action_timestamp" timestamp(6)
)
;

-- ----------------------------
-- Records of logi
-- ----------------------------
INSERT INTO "public"."logi" OVERRIDING SYSTEM VALUE VALUES (1, 14, 'rejestracja', '2024-01-08 20:10:27.0474');
INSERT INTO "public"."logi" OVERRIDING SYSTEM VALUE VALUES (2, 4, 'aktualizacja', '2024-01-08 20:12:46.933596');
INSERT INTO "public"."logi" OVERRIDING SYSTEM VALUE VALUES (3, 10, 'aktualizacja', '2024-02-01 20:42:03.49649');
INSERT INTO "public"."logi" OVERRIDING SYSTEM VALUE VALUES (4, 13, 'aktualizacja', '2024-02-01 20:42:34.093274');
INSERT INTO "public"."logi" OVERRIDING SYSTEM VALUE VALUES (5, 15, 'rejestracja', '2024-02-02 09:47:22.421768');

-- ----------------------------
-- Table structure for narzedzia
-- ----------------------------
DROP TABLE IF EXISTS "public"."narzedzia";
CREATE TABLE "public"."narzedzia" (
  "narzedzie_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  5
MAXVALUE 10000000
START 5
CACHE 1
),
  "producent_id" int4,
  "nazwa" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "cena" money NOT NULL,
  "sciezka_zdj" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of narzedzia
-- ----------------------------
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (3, 3, 'Betniarka BETTI 1020', '$65.00', '/public/uploads/wiertarka.png');
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (2, 2, 'Wiertnia rand3', '$70.00', '/public/uploads/wiertarka.png');
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (1, 1, 'Wiertarka XYZ 1500W', '$50.00', '/public/uploads/wiertarka.png');
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (19, 3, 'Kosiarka AGT105', '$35.55', '/public/uploads/kosiarka.png');
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (20, 1, 'Piła ZG200', '$40.00', '/public/uploads/piła_spalinowa.png');
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (21, 4, 'Drabina DGT102', '$20.00', '/public/uploads/drabina.png');
INSERT INTO "public"."narzedzia" OVERRIDING SYSTEM VALUE VALUES (22, 2, 'myjka ZG15', '$32.00', '/public/uploads/myjka.png');

-- ----------------------------
-- Table structure for narzedzia_kategorie
-- ----------------------------
DROP TABLE IF EXISTS "public"."narzedzia_kategorie";
CREATE TABLE "public"."narzedzia_kategorie" (
  "narzedie_id" int4 NOT NULL,
  "kategoria_id" int4 NOT NULL
)
;

-- ----------------------------
-- Records of narzedzia_kategorie
-- ----------------------------
INSERT INTO "public"."narzedzia_kategorie" VALUES (1, 8);
INSERT INTO "public"."narzedzia_kategorie" VALUES (1, 2);
INSERT INTO "public"."narzedzia_kategorie" VALUES (19, 3);
INSERT INTO "public"."narzedzia_kategorie" VALUES (20, 4);
INSERT INTO "public"."narzedzia_kategorie" VALUES (21, 10);
INSERT INTO "public"."narzedzia_kategorie" VALUES (22, 9);

-- ----------------------------
-- Table structure for narzedzia_parametry
-- ----------------------------
DROP TABLE IF EXISTS "public"."narzedzia_parametry";
CREATE TABLE "public"."narzedzia_parametry" (
  "narzedzie_id" int4 NOT NULL,
  "parametr_id" int4 NOT NULL,
  "jednostka_id" int4 NOT NULL,
  "wartosc" float8
)
;

-- ----------------------------
-- Records of narzedzia_parametry
-- ----------------------------
INSERT INTO "public"."narzedzia_parametry" VALUES (1, 1, 1, 1500);
INSERT INTO "public"."narzedzia_parametry" VALUES (1, 3, 2, 80);
INSERT INTO "public"."narzedzia_parametry" VALUES (2, 3, 2, 85);
INSERT INTO "public"."narzedzia_parametry" VALUES (19, 3, 2, 75);

-- ----------------------------
-- Table structure for parametry
-- ----------------------------
DROP TABLE IF EXISTS "public"."parametry";
CREATE TABLE "public"."parametry" (
  "parametr_id" int4 NOT NULL,
  "nazwa" varchar(30) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of parametry
-- ----------------------------
INSERT INTO "public"."parametry" VALUES (1, 'moc silnika');
INSERT INTO "public"."parametry" VALUES (2, 'długość wiertła');
INSERT INTO "public"."parametry" VALUES (3, 'głośność');

-- ----------------------------
-- Table structure for pracownicy
-- ----------------------------
DROP TABLE IF EXISTS "public"."pracownicy";
CREATE TABLE "public"."pracownicy" (
  "pracownik_id" int4 NOT NULL,
  "imie" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "nazwisko" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "hash" varchar(255) COLLATE "pg_catalog"."default",
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of pracownicy
-- ----------------------------
INSERT INTO "public"."pracownicy" VALUES (2, 'Janina', 'Skowron', '$argon2id$v=19$m=65536,t=4,p=1$Rk01WjlqU1hmLlBENUpWdQ$0fzCXHX+PDh/gjnnREaFUTt0MF6SY9EfupZkv41pfbI', 'janina@janina.com');
INSERT INTO "public"."pracownicy" VALUES (1, 'Bartołomiej', 'Janczyk', '$argon2id$v=19$m=65536,t=4,p=1$TGNYU0pVa0Q2Q01ldTh5Rg$3VJ7Txk18vhsAKHInhl4UELy/Suzbh7O/XkTdKl4wF8', 'jan@janek.com');

-- ----------------------------
-- Table structure for producenci
-- ----------------------------
DROP TABLE IF EXISTS "public"."producenci";
CREATE TABLE "public"."producenci" (
  "producent_id" int4 NOT NULL,
  "nazwa" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of producenci
-- ----------------------------
INSERT INTO "public"."producenci" VALUES (1, 'XYZ');
INSERT INTO "public"."producenci" VALUES (2, 'ABC');
INSERT INTO "public"."producenci" VALUES (3, 'FakeFactory');
INSERT INTO "public"."producenci" VALUES (4, 'Random factory');
INSERT INTO "public"."producenci" VALUES (5, 'Other factory');
INSERT INTO "public"."producenci" VALUES (6, 'No name producer');
INSERT INTO "public"."producenci" VALUES (7, 'ZYX');
INSERT INTO "public"."producenci" VALUES (8, 'Unknown Producer');

-- ----------------------------
-- Table structure for wypozyczenia
-- ----------------------------
DROP TABLE IF EXISTS "public"."wypozyczenia";
CREATE TABLE "public"."wypozyczenia" (
  "wypozyczenie_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 100000000
START 1
CACHE 1
),
  "egzemplarz_id" int4 NOT NULL,
  "klient_id" int4 NOT NULL,
  "data_wypozyczenia" date NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "termin_zwrotu" date,
  "cena_za_dzien" int4,
  "odebrane" int2 DEFAULT 0,
  "data_zwrotu" date
)
;
COMMENT ON COLUMN "public"."wypozyczenia"."termin_zwrotu" IS 'data planowanego zwrotu';

-- ----------------------------
-- Records of wypozyczenia
-- ----------------------------
INSERT INTO "public"."wypozyczenia" OVERRIDING SYSTEM VALUE VALUES (19, 22, 1, '2024-02-02', NULL, 32, 2, NULL);
INSERT INTO "public"."wypozyczenia" OVERRIDING SYSTEM VALUE VALUES (20, 21, 1, '2024-02-02', NULL, 20, 2, NULL);
INSERT INTO "public"."wypozyczenia" OVERRIDING SYSTEM VALUE VALUES (21, 20, 1, '2024-02-02', NULL, 40, 2, NULL);
INSERT INTO "public"."wypozyczenia" OVERRIDING SYSTEM VALUE VALUES (22, 15, 1, '2024-02-02', NULL, 50, 2, NULL);

-- ----------------------------
-- Function structure for klienci_log
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."klienci_log"();
CREATE OR REPLACE FUNCTION "public"."klienci_log"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
IF (TG_OP = 'INSERT') THEN
	INSERT INTO logi (klient_id, akcja, action_timestamp)
	VALUES (NEW.klient_id, 'rejestracja', CURRENT_TIMESTAMP);
	RETURN NEW;
ELSIF (TG_OP = 'UPDATE') THEN
	INSERT INTO logi (klient_id, akcja, action_timestamp)
	VALUES (NEW.klient_id, 'aktualizacja', CURRENT_TIMESTAMP);
	RETURN NEW;
END IF;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Procedure structure for wypozycz_sprzet
-- ----------------------------
DROP PROCEDURE IF EXISTS "public"."wypozycz_sprzet"("vegzemplarz_id" int4, "vklient_id" int4, "cena" int4);
CREATE OR REPLACE PROCEDURE "public"."wypozycz_sprzet"("vegzemplarz_id" int4, "vklient_id" int4, "cena" int4)
 AS $BODY$
DECLARE 
	ile INTEGER;
BEGIN
	SELECT COUNT(egzemplarz_id) FROM wypozyczenia WHERE egzemplarz_id = vegzemplarz_id AND odebrane IN (0, 1) INTO ile;
	IF ile = 0 THEN
		INSERT INTO wypozyczenia (egzemplarz_id, klient_id, cena_za_dzien) VALUES (vegzemplarz_id, vklient_id, cena);
	END IF;
	COMMIT;
	
END; $BODY$
  LANGUAGE plpgsql;

-- ----------------------------
-- View structure for popularne_sprzety
-- ----------------------------
DROP VIEW IF EXISTS "public"."popularne_sprzety";
CREATE VIEW "public"."popularne_sprzety" AS  SELECT narzedzia.nazwa,
    count(wypozyczenia.wypozyczenie_id) AS ile
   FROM narzedzia
     JOIN egzemplarze ON narzedzia.narzedzie_id = egzemplarze.narzedzie_id
     FULL JOIN wypozyczenia ON egzemplarze.egzemplarz_id = wypozyczenia.egzemplarz_id
  GROUP BY narzedzia.nazwa;

-- ----------------------------
-- View structure for sprzet_kategorie
-- ----------------------------
DROP VIEW IF EXISTS "public"."sprzet_kategorie";
CREATE VIEW "public"."sprzet_kategorie" AS  SELECT kategorie.nazwa AS kategoria,
    count(narzedzia_kategorie.kategoria_id) AS ile
   FROM kategorie
     JOIN narzedzia_kategorie ON kategorie.kategoria_id = narzedzia_kategorie.kategoria_id
  GROUP BY kategorie.nazwa;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."egzemplarze_egzemplarz_id_seq"
OWNED BY "public"."egzemplarze"."egzemplarz_id";
SELECT setval('"public"."egzemplarze_egzemplarz_id_seq"', 22, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."klienci_klient_id_seq"
OWNED BY "public"."klienci"."klient_id";
SELECT setval('"public"."klienci_klient_id_seq"', 15, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."logi_log_id_seq"
OWNED BY "public"."logi"."log_id";
SELECT setval('"public"."logi_log_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."narzedzia_narzedzie_id_seq"
OWNED BY "public"."narzedzia"."narzedzie_id";
SELECT setval('"public"."narzedzia_narzedzie_id_seq"', 22, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."wypozyczenia_wypozyczenie_id_seq"
OWNED BY "public"."wypozyczenia"."wypozyczenie_id";
SELECT setval('"public"."wypozyczenia_wypozyczenie_id_seq"', 22, true);

-- ----------------------------
-- Auto increment value for egzemplarze
-- ----------------------------
SELECT setval('"public"."egzemplarze_egzemplarz_id_seq"', 22, true);

-- ----------------------------
-- Primary Key structure for table egzemplarze
-- ----------------------------
ALTER TABLE "public"."egzemplarze" ADD CONSTRAINT "egzemplarze_pkey" PRIMARY KEY ("egzemplarz_id");

-- ----------------------------
-- Primary Key structure for table jednostki
-- ----------------------------
ALTER TABLE "public"."jednostki" ADD CONSTRAINT "jednostki_pkey" PRIMARY KEY ("jednostka_id");

-- ----------------------------
-- Primary Key structure for table kary
-- ----------------------------
ALTER TABLE "public"."kary" ADD CONSTRAINT "kary_pkey" PRIMARY KEY ("wypozyczenie-id");

-- ----------------------------
-- Primary Key structure for table kategorie
-- ----------------------------
ALTER TABLE "public"."kategorie" ADD CONSTRAINT "kategorie_pkey" PRIMARY KEY ("kategoria_id");

-- ----------------------------
-- Auto increment value for klienci
-- ----------------------------
SELECT setval('"public"."klienci_klient_id_seq"', 15, true);

-- ----------------------------
-- Triggers structure for table klienci
-- ----------------------------
CREATE TRIGGER "klient_trigger" AFTER INSERT OR UPDATE ON "public"."klienci"
FOR EACH ROW
EXECUTE PROCEDURE "public"."klienci_log"();

-- ----------------------------
-- Uniques structure for table klienci
-- ----------------------------
ALTER TABLE "public"."klienci" ADD CONSTRAINT "login" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table klienci
-- ----------------------------
ALTER TABLE "public"."klienci" ADD CONSTRAINT "klienci_pkey" PRIMARY KEY ("klient_id");

-- ----------------------------
-- Auto increment value for logi
-- ----------------------------
SELECT setval('"public"."logi_log_id_seq"', 5, true);

-- ----------------------------
-- Primary Key structure for table logi
-- ----------------------------
ALTER TABLE "public"."logi" ADD CONSTRAINT "logi_pkey" PRIMARY KEY ("log_id");

-- ----------------------------
-- Auto increment value for narzedzia
-- ----------------------------
SELECT setval('"public"."narzedzia_narzedzie_id_seq"', 22, true);

-- ----------------------------
-- Primary Key structure for table narzedzia
-- ----------------------------
ALTER TABLE "public"."narzedzia" ADD CONSTRAINT " narzedzia_pkey" PRIMARY KEY ("narzedzie_id");

-- ----------------------------
-- Primary Key structure for table narzedzia_kategorie
-- ----------------------------
ALTER TABLE "public"."narzedzia_kategorie" ADD CONSTRAINT "narzedzia_kategorie_pkey" PRIMARY KEY ("narzedie_id", "kategoria_id");

-- ----------------------------
-- Primary Key structure for table narzedzia_parametry
-- ----------------------------
ALTER TABLE "public"."narzedzia_parametry" ADD CONSTRAINT "narzedzia_parametry_pkey" PRIMARY KEY ("narzedzie_id", "parametr_id");

-- ----------------------------
-- Primary Key structure for table parametry
-- ----------------------------
ALTER TABLE "public"."parametry" ADD CONSTRAINT "parametry_pkey" PRIMARY KEY ("parametr_id");

-- ----------------------------
-- Primary Key structure for table pracownicy
-- ----------------------------
ALTER TABLE "public"."pracownicy" ADD CONSTRAINT "pracownicy_pkey" PRIMARY KEY ("pracownik_id");

-- ----------------------------
-- Primary Key structure for table producenci
-- ----------------------------
ALTER TABLE "public"."producenci" ADD CONSTRAINT "producenci_pkey" PRIMARY KEY ("producent_id");

-- ----------------------------
-- Auto increment value for wypozyczenia
-- ----------------------------
SELECT setval('"public"."wypozyczenia_wypozyczenie_id_seq"', 22, true);

-- ----------------------------
-- Primary Key structure for table wypozyczenia
-- ----------------------------
ALTER TABLE "public"."wypozyczenia" ADD CONSTRAINT "wypozyczenia_pkey" PRIMARY KEY ("wypozyczenie_id");

-- ----------------------------
-- Foreign Keys structure for table egzemplarze
-- ----------------------------
ALTER TABLE "public"."egzemplarze" ADD CONSTRAINT "egzemplarze_narzedzie_id_fkey" FOREIGN KEY ("narzedzie_id") REFERENCES "public"."narzedzia" ("narzedzie_id") ON DELETE NO ACTION ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table kary
-- ----------------------------
ALTER TABLE "public"."kary" ADD CONSTRAINT "kary_wypozyczenie-id_fkey" FOREIGN KEY ("wypozyczenie-id") REFERENCES "public"."wypozyczenia" ("wypozyczenie_id") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table narzedzia
-- ----------------------------
ALTER TABLE "public"."narzedzia" ADD CONSTRAINT "narzedzia_producent_id_fkey" FOREIGN KEY ("producent_id") REFERENCES "public"."producenci" ("producent_id") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table narzedzia_kategorie
-- ----------------------------
ALTER TABLE "public"."narzedzia_kategorie" ADD CONSTRAINT "narzedzia_kategorie_kategoria_id_fkey" FOREIGN KEY ("kategoria_id") REFERENCES "public"."kategorie" ("kategoria_id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."narzedzia_kategorie" ADD CONSTRAINT "narzedzia_kategorie_narzedie_id_fkey" FOREIGN KEY ("narzedie_id") REFERENCES "public"."narzedzia" ("narzedzie_id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table narzedzia_parametry
-- ----------------------------
ALTER TABLE "public"."narzedzia_parametry" ADD CONSTRAINT "narzedzia_parametry_jednostka_id_fkey" FOREIGN KEY ("jednostka_id") REFERENCES "public"."jednostki" ("jednostka_id") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."narzedzia_parametry" ADD CONSTRAINT "narzedzia_parametry_narzedzie_id_fkey" FOREIGN KEY ("narzedzie_id") REFERENCES "public"."narzedzia" ("narzedzie_id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."narzedzia_parametry" ADD CONSTRAINT "narzedzia_parametry_parametr_id_fkey" FOREIGN KEY ("parametr_id") REFERENCES "public"."parametry" ("parametr_id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table wypozyczenia
-- ----------------------------
ALTER TABLE "public"."wypozyczenia" ADD CONSTRAINT "wypozyczenia_egzemplarz_id_fkey" FOREIGN KEY ("egzemplarz_id") REFERENCES "public"."egzemplarze" ("egzemplarz_id") ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE "public"."wypozyczenia" ADD CONSTRAINT "wypozyczenia_klient_id_fkey" FOREIGN KEY ("klient_id") REFERENCES "public"."klienci" ("klient_id") ON DELETE SET NULL ON UPDATE CASCADE;
