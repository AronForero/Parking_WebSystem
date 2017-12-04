CREATE FUNCTION copiar_datos() RETURNS trigger
    LANGUAGE plpgsql
    AS $$DECLARE
BEGIN
INSERT INTO log (placa, estado, horae, horas, pago, casco, fechae, fechas)
 values(NEW.placa, NEW.estado, NEW.horae, NEW.horas, NEW.pago, NEW.casco, NEW.fechae, NEW.fechas);
RETURN NULL;
END;
$$;

ALTER FUNCTION public.copiar_datos() OWNER TO postgres;

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
    mes character varying(2),
    fecham date,
    student character varying(2)
);


ALTER TABLE public.log OWNER TO postgres;

CREATE SEQUENCE backup_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.backup_registro_seq OWNER TO postgres;



ALTER SEQUENCE backup_registro_seq OWNED BY log.registro;


CREATE TABLE motos (
    placa character varying(6) NOT NULL,
    estado boolean,
    horae time without time zone,
    horas time without time zone,
    pago numeric,
    casco smallint,
    fechae date,
    fechas date
);


ALTER TABLE public.motos OWNER TO postgres;



CREATE TABLE usuarios (
    login character varying(10),
    password character varying(10)
);


ALTER TABLE public.usuarios OWNER TO postgres;



ALTER TABLE ONLY log ALTER COLUMN registro SET DEFAULT nextval('backup_registro_seq'::regclass);


ALTER TABLE ONLY motos
    ADD CONSTRAINT motos_pkey PRIMARY KEY (placa);


CREATE TRIGGER copiar_datos AFTER INSERT OR UPDATE ON motos FOR EACH ROW EXECUTE PROCEDURE copiar_datos();
