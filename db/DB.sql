--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: consultation; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE consultation (
    id_pac integer,
    content text
);


ALTER TABLE consultation OWNER TO postgres;

--
-- Name: patients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE patients (
    id_pac integer NOT NULL,
    name text,
    surname text
);


ALTER TABLE patients OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id integer NOT NULL,
    login text,
    password text,
    name text,
    surname text
);


ALTER TABLE users OWNER TO postgres;

--
-- Data for Name: consultation; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY consultation (id_pac, content) FROM stdin;
2	001
1	002
5	003
4	004
3	005
6	006
5	WOLOLOLOLOLO
5	NO co tam? Skąd to zwątpienie?
3	cośtam
5	test
5	test
5	\t\t\t\tAt w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.\r\n\t\t\t
2	\t\t\t\tAt w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.\r\n\t\t\t
4	\t\t\t\tAt w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.\r\n\t\t\t
\.


--
-- Data for Name: patients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY patients (id_pac, name, surname) FROM stdin;
1	Makumbe	Witold
4	Miłosz	Ciemny
2	Kika	Czika
5	Adma	Raski
3	Turpat	Sulej
6	Siergiej	Konopacki
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, login, password, name, surname) FROM stdin;
1	Amanda	Baker	Amanda	Baker
2	Samuel	Jackson	Samuel	Jackosn
\.


--
-- Name: users DaneLogowania_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT "DaneLogowania_pkey" PRIMARY KEY (id);


--
-- Name: patients patients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY patients
    ADD CONSTRAINT patients_pkey PRIMARY KEY (id_pac);


--
-- PostgreSQL database dump complete
--

