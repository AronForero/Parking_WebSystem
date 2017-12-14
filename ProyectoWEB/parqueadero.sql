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
INSERT INTO log (placa, estado, horae, horas, pago, casco, fechae, fechas, diario, tipo)
 values(NEW.placa, NEW.estado, NEW.horae, NEW.horas, NEW.pago, NEW.casco, NEW.fechae, NEW.fechas, NEW.diario, NEW.tipo);
RETURN NULL;
END;
$$;


ALTER FUNCTION public.copiar_datos() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: log; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE log (
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
    tipo character varying(5)
);


ALTER TABLE public.log OWNER TO postgres;

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

ALTER SEQUENCE backup_registro_seq OWNED BY log.registro;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    login character varying(10),
    password character varying(10)
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: vehiculo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE vehiculo (
    placa character varying(6) NOT NULL,
    estado boolean,
    horae time without time zone,
    horas time without time zone,
    pago numeric,
    casco smallint,
    fechae date,
    fechas date,
    tipo smallint,
    diario character varying(2)
);


ALTER TABLE public.vehiculo OWNER TO postgres;

--
-- Name: registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY log ALTER COLUMN registro SET DEFAULT nextval('backup_registro_seq'::regclass);


--
-- Name: motos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT motos_pkey PRIMARY KEY (placa);


--
-- Name: copiar_datos; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER copiar_datos AFTER INSERT OR UPDATE ON vehiculo FOR EACH ROW EXECUTE PROCEDURE copiar_datos();


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

