--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: copiar_datos(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION copiar_datos() RETURNS trigger
    LANGUAGE plpgsql
    AS $$DECLARE
BEGIN
INSERT INTO backup (placa, estado, horae, horas, pago, casco, fechae, fechas, diario, mes, fecham)
 values(NEW.placa, NEW.estado, NEW.horae, NEW.horas, NEW.pago, NEW.casco, NEW.fechae, NEW.fechas, NEW.diario, NEW.mes, NEW.fecham);
RETURN NULL;
END;
$$;


ALTER FUNCTION public.copiar_datos() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: backup; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE backup (
    registro integer NOT NULL,
    placa character varying(6),
    estado boolean,
    horae time without time zone,
    horas time without time zone,
    pago numeric,
    casco smallint,
    fechae date,
    fechas date,
    diario character varying(2),
    mes character varying(2),
    fecham date
);


ALTER TABLE public.backup OWNER TO postgres;

--
-- Name: backup_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backup_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.backup_registro_seq OWNER TO postgres;

--
-- Name: backup_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backup_registro_seq OWNED BY backup.registro;


--
-- Name: motos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE motos (
    placa character varying(6) NOT NULL,
    estado boolean,
    horae time without time zone,
    horas time without time zone,
    pago numeric,
    casco smallint,
    fechae date,
    fechas date,
    diario character varying(2),
    mes character varying(2),
    fecham date
);


ALTER TABLE public.motos OWNER TO postgres;

--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    login character varying(10),
    password character varying(10)
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backup ALTER COLUMN registro SET DEFAULT nextval('backup_registro_seq'::regclass);


--
-- Data for Name: backup; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backup (registro, placa, estado, horae, horas, pago, casco, fechae, fechas, diario, mes, fecham) FROM stdin;
42	MWW16C	t	09:14:37	09:14:37	300	1	2017-02-23	2017-02-23	NO	\N	\N
43	MWW16B	t	09:16:02	09:16:02	300	0	2017-02-23	2017-02-23	NO	\N	\N
44	xvn157	t	09:16:07	09:16:07	300	0	2017-02-23	2017-02-23	NO	\N	\N
45	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	\N	\N
46	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2017-01-27
47	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2017-02-20
48	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2017-03-20
49	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2017-02-20
50	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2016-12-20
51	xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2017-02-20
52	xvn156	t	16:09:25	16:09:25	300	0	2017-03-01	2017-03-01	NO	NO	2017-03-01
53	xvn159	t	16:09:45	16:09:45	300	0	2017-03-01	2017-03-01	SI	NO	2017-03-01
\.


--
-- Name: backup_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backup_registro_seq', 53, true);


--
-- Data for Name: motos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY motos (placa, estado, horae, horas, pago, casco, fechae, fechas, diario, mes, fecham) FROM stdin;
MWW16C	t	09:14:37	09:14:37	300	1	2017-02-23	2017-02-23	NO	\N	\N
MWW16B	t	09:16:02	09:16:02	300	0	2017-02-23	2017-02-23	NO	\N	\N
xvn157	t	09:16:07	09:16:07	300	0	2017-02-23	2017-02-23	NO	\N	\N
xvn150	t	17:18:26	17:18:26	300	0	2017-02-27	2017-02-27	NO	SI	2017-02-20
xvn156	t	16:09:25	16:09:25	300	0	2017-03-01	2017-03-01	NO	NO	2017-03-01
xvn159	t	16:09:45	16:09:45	300	0	2017-03-01	2017-03-01	SI	NO	2017-03-01
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuarios (login, password) FROM stdin;
root	123456
\.


--
-- Name: motos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY motos
    ADD CONSTRAINT motos_pkey PRIMARY KEY (placa);


--
-- Name: copiar_datos; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER copiar_datos AFTER INSERT OR UPDATE ON motos FOR EACH ROW EXECUTE PROCEDURE copiar_datos();


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

