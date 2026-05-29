--
-- PostgreSQL database dump
--

\restrict 4Y91BR2T3eaEyZ0p0gFOGYWgGP7JVPM1yLbZ4IuoPhHsscAg7sscN8M3TXDrj3D

-- Dumped from database version 16.14
-- Dumped by pg_dump version 16.14

-- Started on 2026-05-26 19:53:26

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- TOC entry 4967 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 216 (class 1259 OID 16399)
-- Name: administrativosprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.administrativosprueba (
    id_administrativo integer NOT NULL,
    nombre_administrativo character varying(255)
);


ALTER TABLE public.administrativosprueba OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 16398)
-- Name: administrativosprueba_id_administrativo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.administrativosprueba_id_administrativo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.administrativosprueba_id_administrativo_seq OWNER TO postgres;

--
-- TOC entry 4968 (class 0 OID 0)
-- Dependencies: 215
-- Name: administrativosprueba_id_administrativo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.administrativosprueba_id_administrativo_seq OWNED BY public.administrativosprueba.id_administrativo;


--
-- TOC entry 217 (class 1259 OID 16405)
-- Name: areasprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.areasprueba (
    id_area character varying(255) NOT NULL,
    nombre_area character varying(255)
);


ALTER TABLE public.areasprueba OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16429)
-- Name: contactoemergenciaprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contactoemergenciaprueba (
    num_emp_contacto integer NOT NULL,
    nombre_contacto character varying(200),
    parentesco character varying(50),
    telefono_contacto character varying(50),
    correo_contacto character varying(100),
    direccion_contacto character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.contactoemergenciaprueba OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16438)
-- Name: minutasprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.minutasprueba (
    id_minuta integer NOT NULL,
    fecha_reunion_minuta date,
    tema_minuta character varying(255),
    acuerdos_minuta text,
    descripcion_minuta text
);


ALTER TABLE public.minutasprueba OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16437)
-- Name: minutasprueba_id_minuta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.minutasprueba_id_minuta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.minutasprueba_id_minuta_seq OWNER TO postgres;

--
-- TOC entry 4969 (class 0 OID 0)
-- Dependencies: 220
-- Name: minutasprueba_id_minuta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.minutasprueba_id_minuta_seq OWNED BY public.minutasprueba.id_minuta;


--
-- TOC entry 222 (class 1259 OID 16446)
-- Name: saludprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.saludprueba (
    num_emp_salud integer NOT NULL,
    nss_salud character varying(20),
    alergias_salud character varying(255) DEFAULT NULL::character varying,
    tipo_sangre_salud character varying(20) DEFAULT NULL::character varying,
    enfermedades_salud character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.saludprueba OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 16412)
-- Name: sindicalizadosprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sindicalizadosprueba (
    num_emp integer NOT NULL,
    id_administrativo integer DEFAULT 1,
    curp character varying(18) DEFAULT NULL::character varying NOT NULL,
    correo_institucional character varying(255) DEFAULT NULL::character varying NOT NULL,
    nombres character varying(255),
    apellidos character varying(255),
    id_area character varying(255) DEFAULT '0'::character varying,
    foto character varying(255) DEFAULT NULL::character varying,
    telefono character varying(50),
    correo_personal character varying(255),
    fecha_ingreso date,
    comentarios character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.sindicalizadosprueba OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16456)
-- Name: socioeconomicoprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.socioeconomicoprueba (
    num_emp_socioeconomico integer NOT NULL,
    vivienda_socioeconomico character varying(255) DEFAULT NULL::character varying,
    material_socioeconomico character varying(255) DEFAULT NULL::character varying,
    niveles_socioeconomico integer,
    dependientes_socioeconomico integer
);


ALTER TABLE public.socioeconomicoprueba OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 16466)
-- Name: usuariosprueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuariosprueba (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(255),
    password character varying(255),
    num_emp_usuario integer NOT NULL
);


ALTER TABLE public.usuariosprueba OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16465)
-- Name: usuariosprueba_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuariosprueba_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuariosprueba_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 4970 (class 0 OID 0)
-- Dependencies: 224
-- Name: usuariosprueba_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuariosprueba_id_usuario_seq OWNED BY public.usuariosprueba.id_usuario;


--
-- TOC entry 4765 (class 2604 OID 16402)
-- Name: administrativosprueba id_administrativo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.administrativosprueba ALTER COLUMN id_administrativo SET DEFAULT nextval('public.administrativosprueba_id_administrativo_seq'::regclass);


--
-- TOC entry 4773 (class 2604 OID 16441)
-- Name: minutasprueba id_minuta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.minutasprueba ALTER COLUMN id_minuta SET DEFAULT nextval('public.minutasprueba_id_minuta_seq'::regclass);


--
-- TOC entry 4779 (class 2604 OID 16469)
-- Name: usuariosprueba id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuariosprueba ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuariosprueba_id_usuario_seq'::regclass);


--
-- TOC entry 4952 (class 0 OID 16399)
-- Dependencies: 216
-- Data for Name: administrativosprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (1, 'sindicalizado');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (2, 'secretario_general
');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (3, 'secretario_de_organizacion');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (4, 'secretario_de_trabajo_y_conflictos');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (5, 'secretario_de_finanzas');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (6, 'secretario_de_pensiones_jubilaciones_y_prevision_social');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (7, 'secretario_de_actas_y_acuerdos');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (8, 'secretario_de_orientacion_ideologica_sindical');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (9, 'secretario_de_accion_social_y_deportes');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (10, 'secretario_del_exterior');
INSERT INTO public.administrativosprueba (id_administrativo, nombre_administrativo) VALUES (11, 'secretario_de_prensa_y_propaganda');


--
-- TOC entry 4953 (class 0 OID 16405)
-- Dependencies: 217
-- Data for Name: areasprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('0', 'pendiente');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('1', 'Derecho');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('2', 'Ciencias Economicas Administrativas');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('3', 'Quimica');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('4', 'Ciencias Educativas');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('5', 'Ciencias de la Informacion');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('6', 'Ingenieria');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('7', 'Salud');
INSERT INTO public.areasprueba (id_area, nombre_area) VALUES ('8', 'Ciencias Naturales y Exactas');


--
-- TOC entry 4955 (class 0 OID 16429)
-- Dependencies: 219
-- Data for Name: contactoemergenciaprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4957 (class 0 OID 16438)
-- Dependencies: 221
-- Data for Name: minutasprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.minutasprueba (id_minuta, fecha_reunion_minuta, tema_minuta, acuerdos_minuta, descripcion_minuta) VALUES (1, '2026-04-15', 'a', 'a', 'a');
INSERT INTO public.minutasprueba (id_minuta, fecha_reunion_minuta, tema_minuta, acuerdos_minuta, descripcion_minuta) VALUES (2, '2026-04-01', 'aver', 'si va', 'aver si va');
INSERT INTO public.minutasprueba (id_minuta, fecha_reunion_minuta, tema_minuta, acuerdos_minuta, descripcion_minuta) VALUES (3, '2026-04-30', 'precio de los pollos', 'no hubo', 'se pelearon todos alv');


--
-- TOC entry 4958 (class 0 OID 16446)
-- Dependencies: 222
-- Data for Name: saludprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4954 (class 0 OID 16412)
-- Dependencies: 218
-- Data for Name: sindicalizadosprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2132, 1, 'AAXM720317HNEBXH03', 'mabatal@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1959, 1, 'AAPM731217HCCBCN0E', 'mabnal@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1531, 1, 'AEDH611028HCCB6R03', 'habreu@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1782, 1, 'AEOG620604MTSCLL03', 'gacevedo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2114, 1, 'AOAG610616HCCCLN08', 'jalejo@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1983, 1, 'AUAR631004HTCGRS05', 'jaguilar@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (99, 1, 'AUEV600727HCCGFC07', 'vaguilar@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2577, 1, 'AULY851206MCCGCM01', 'yaguilar@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2106, 1, 'AUSG871223HCCGNB08', 'gsantiago@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1176, 1, 'AUUC760326MYNGCL04', 'caguilar@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1590, 1, 'AAVE731110HVZLGR09', 'ealatriste@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3984, 1, 'AOLI920608HCCLPV02', 'icalcocer@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4196, 1, 'AUAL940125HCCLCL09', 'lalcudia@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1990, 1, 'AUAE710710HCCLCL02', 'ealcudia@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (389, 1, 'AEHC610926HTCLJC08', 'calejandro@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (504, 1, 'AOAJ641018HCCLVN05', 'jalvarado@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1028, 1, 'AOLH621226HCCLVN04', 'halvarado@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (882, 1, 'AAGI630206MTCLLL03', 'ialvarez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1732, 1, 'AAMA610609MTCLNN08', 'aalvarez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4088, 1, 'AATN900713MDFMDX06', 'namador@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (899, 1, 'AAGJ600726HDFMBN07', 'jambris@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (907, 1, 'AAMN611030MDFNGA02', 'nangel@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1310, 1, 'AUMF601004HCCNRC05', 'fanguebes@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (58, 1, 'AAGR581024HDFNSR01', 'ranguiano@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (742, 1, 'AUFJ600325HCCQNR08', 'jaquino@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (691, 1, 'AOZJ650821HCCRCX05', 'jarcos@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (639, 1, 'AORA580922HCCDRX04', 'aarodriguez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1956, 1, 'AEMM730310MTCRNM00', 'marellano@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2185, 1, 'AUPR670404HTCRLV00', 'rarguelles@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1979, 1, 'AITD710228MDFRXG09', 'darias@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1894, 1, 'AICG720526MTCXXX00', 'garias@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3558, 1, 'AODJ720612HCCRDX03', 'jaduran@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2914, 1, 'AIMI861021MDFRXR02', 'marias@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (300, 1, 'AIPL620224MCCRSL06', 'larias@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2054, 1, 'AOVJ621021HDFRSL08', 'jarias@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1049, 1, 'AOBS650912HCCRNX05', 'sarjona@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1411, 1, 'AOMD640209HCCRND07', 'darjona@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2472, 1, 'AICD830911MTCVLC02', 'dkavila@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2077, 1, 'AIEG640620HTCVLM00', 'gavila@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3841, 1, 'AIFE860309MTCVLR08', 'eavilez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (694, 1, 'AAJL601115HCCYXX09', 'layala@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1601, 1, 'AAQA721115HDFYLQ08', 'aayala@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2524, 1, 'AODA810901HCCZCR01', 'aazcorra@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3808, 1, 'BAMA870823HCCLLL00', 'abalan@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1908, 1, 'BAMM710609MTCLLL03', 'mballina@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2668, 1, 'BAAF840628MTCQRA03', 'farcovedo@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3568, 1, 'BAPJ850920HCCRRR08', 'jpbaqueiro@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2702, 1, 'BACU840629MTCXRL04', 'ubarradas@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (539, 1, 'BACR590212HTCRNR06', 'rbarrera@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2932, 1, 'BAGC871104MTCXRC05', 'cbarrera@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (483, 1, 'BAMA601004MTCXRA00', 'abarrera@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2074, 1, 'BAMO731110HCCBTX08', 'obautista@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (46, 1, 'BAMS691109HVZTLL07', 'sbautista@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1653, 1, 'BEPC701026MDFLLZ00', 'cbello@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (945, 1, 'BEMO581223HTCNVR01', 'obenavides@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1966, 1, 'BECA750106MTCXNR01', 'abenitez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (429, 1, 'BEGD631212HDFNRD01', 'dbenitez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1860, 1, 'BEMJ650508HTCNXN00', 'jbenitez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1829, 1, 'BOPM610502MDFRGS02', 'mborges@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (557, 1, 'BIMM630712HTCDRM05', 'mbrito@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4002, 1, 'BIPT911228MTCXRT01', 'tbrito@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1345, 1, 'CAAM690623MTCNDR05', 'mcabrales@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2076, 1, 'CAPP660629HCCXHP02', 'pcahuich@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4060, 1, 'CABE870719MTCJLE08', 'ecajigal@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2202, 1, 'CACD821013MTCNND04', 'dcajun@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3926, 1, 'CACK881119MDFNNA04', 'kcajun@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1861, 1, 'CACM660505MTCXNM00', 'mcajun@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (635, 1, 'CAAM630509MTCLLM07', 'mcalan@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (886, 1, 'CACW640419MDFLNN02', 'wcalderon@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (871, 1, 'CAGR600830MTCLDG03', 'acalderon@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (941, 1, 'CAVR590715HDFLNR06', 'rcalderon@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1844, 1, 'CAMA680918MTCLXA02', 'amota@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3749, 1, 'CAMB881024MTCMRX08', 'bcamara@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1936, 1, 'CACL650821MTCMXN07', 'lcampos@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (675, 1, 'CACM690620HTCDRM02', 'mcampos@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1043, 1, 'CACM700412MTCXNM02', 'mcan@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (647, 1, 'CACX610816MDFNDY06', 'ycanedo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (784, 1, 'CAMA600729HDFNPA08', 'acanepa@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1577, 1, 'CACA711002MDFNXR02', 'acano@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2936, 1, 'CACH700101MDFNXR04', 'hcano@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1557, 1, 'CACX680112HCCNXL07', 'xcante@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (538, 1, 'CAHJ620516HCCNTX06', 'jcanto@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1702, 1, 'CAGF671024HCCXNF05', 'fcanul@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (659, 1, 'CAVE630121MTCXNL05', 'ecanul@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2024, 1, 'CAPR660105HCCXRR05', 'rcarballo@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1556, 1, 'CACB690412HDFRDL02', 'bcardenas@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3185, 1, 'CACF790103HCCXRF08', 'fcarrasco@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1946, 1, 'CACR660205HCCXRR09', 'rcarrasco@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1062, 1, 'CASA650125HTCRLA08', 'acarrillo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1363, 1, 'CATA670202MTCRCF02', 'fcandelaria@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4391, 1, 'CACC880814MDCSNV02', 'ccasanova@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1013, 1, 'CACF560505HDFSNF08', 'fcasanova@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2698, 1, 'CACM851213MDCSNM01', 'mcasanova@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (49, 1, 'CAHB680517MCCSRT02', 'bcastillejos@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1252, 1, 'CACM610301HTCSLX05', 'mcastillo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3467, 1, 'CASJ801103HTCSLL06', 'jcastillo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1553, 1, 'CASS661225MDFSLX04', 'scastillo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2084, 1, 'CACF611107HCCSRF05', 'fcastro@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1997, 1, 'CAMA680603HTCCHX04', 'acauich@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1338, 1, 'CEMA660501MDFNNL02', 'acenteno@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1327, 1, 'CEBP620626HCCRCX00', 'pcerecedo@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1680, 1, 'CEAJ650503HTCRNJ06', 'jceron@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1173, 1, 'CERR620310HTCRNX05', 'rceron@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4370, 1, 'CAOO870104MTCBXX09', 'ochable@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (338, 1, 'CADA721022MTCHMM05', 'achan@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1499, 1, 'CAUA690122HCCXNA09', 'achan@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (133, 1, 'CIPL630113MTCXXL08', 'lchi@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2028, 1, 'CITP670928HCCXXP05', 'achi@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (287, 1, 'CIDE760302HCCHZD03', 'echi@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (630, 1, 'CIXC650601MTCHNC08', 'cchi@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1263, 1, 'CIPR610928HDFXXR03', 'rchi@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (760, 1, 'CICS631021HDFXXS00', 'schi@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1358, 1, 'COVY681024MDFBZY06', 'ycoba@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (513, 1, 'COMJ630419HCCXNJ01', 'jcocon@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2266, 1, 'COZA830502MDFLRA09', 'acolorado@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (999, 1, 'COGE620405HDFNME05', 'econcha@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (612, 1, 'COFR590124HTCNXR05', 'rcontreras@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2159, 1, 'COFT651016MDFNXT05', 'tfarfan@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2557, 1, 'COML830530MTCNNX05', 'lcontreras@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2997, 1, 'COMX870501MDFRRA00', 'acordero@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2005, 1, 'Cova660105mtcrxa00', 'acvazquez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1055, 1, 'COGM650222MTCRVM07', 'mcordova@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4054, 1, 'CODG871212HDFRNG07', 'gcornelio@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1076, 1, 'COCL660330MTCRXL05', 'lcortes@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2086, 1, 'CUAJ610609HTCRXJ06', 'jacruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2090, 1, 'CUBR631215HTCRXR02', 'rcberistain@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1078, 1, 'CUCG670311MDFRXG09', 'gcruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1992, 1, 'CUHJ651125HTCRXJ04', 'jcorrea@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2655, 1, 'CULJ731217HDFRXT05', 'jcruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1356, 1, 'CULO651031MTCRXC04', 'ocruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3985, 1, 'CUMJ850901HDFRNC05', 'jcjimenez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1920, 1, 'CUOJ620320HTCRXJ02', 'jccruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (674, 1, 'CUPM630712HTCRXM05', 'mcruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1940, 1, 'CUPR650529HTCRXR04', 'rcruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2520, 1, 'CURM831206MDCRSM00', 'mcrosado@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1709, 1, 'CUSI680313HDFRNS04', 'isanchez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1867, 1, 'CUSM690623MTCRSM08', 'msoberanis@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1673, 1, 'CUZY680325MDCRXY09', 'ycruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3178, 1, 'DALA840502HCCMNA06', 'adamian@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3605, 1, 'DABJ880918HDFMNJ06', 'jdamian@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1383, 1, 'DAXJ680608HTCSXJ00', 'jcoss@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (189, 1, 'DIMF621009HTCSNR01', 'fmendez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1923, 1, 'DIZA700206MDFZRA09', 'acarias@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (950, 1, 'CACJ580825HTCXNJ05', 'jdelacruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (712, 1, 'CACM611025HDFXNM09', 'mcruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1246, 1, 'CACS620921MTCXNS04', 'sdelacruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1036, 1, 'CAXC620108MTCLXC07', 'cdelacruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4058, 1, 'EAKN840810MDFKXN06', 'nek@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1821, 1, 'LUPC680909MDFZXA04', 'lpcruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (605, 1, 'LUPL600523MDFZXL01', 'lcruz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (664, 1, 'MEAM600627HCCRXM08', 'mdelacruz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2419, 1, 'LUBM660424MDFNXM01', 'mdeluna@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2296, 1, 'DEGA800318HDFLGA04', 'adelgado@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3262, 1, 'DEPF850402HCCLGX08', 'fdelgado@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1929, 1, 'HEPA731221MDFRNX08', 'adhernandez@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1322, 1, 'DIPS660205MDFZXS02', 'sdiaz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1388, 1, 'DIRJ630419HDFZXJ07', 'jjdiaz@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1848, 1, 'DIXP650626HDFZXP00', 'pdiaz@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2126, 1, 'DIMG730811HDFZXG00', 'gdiez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1090, 1, 'DODA640523MDFMNA00', 'adominguez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (365, 1, 'DOMM610311MDFMNM08', 'madominguez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2768, 1, 'DOCA830403HDFRCA02', 'adorantes@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2539, 1, 'DOFM791216MDFRNM01', 'mdorantes@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3278, 1, 'DIPM851230MDFBXM03', 'mdzib@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (4372, 1, 'EAAM861214HCCVXM01', 'jmechavarria@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (2018, 1, 'EAAJ610619HCCVXJ07', 'jechavarria@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1858, 1, 'EUPF690709HDFHNF04', 'fehuan@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (3804, 1, 'EKVC890521MDFAXC01', 'cek@delfin.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.sindicalizadosprueba (num_emp, id_administrativo, curp, correo_institucional, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios) VALUES (1526, 2, 'VAAR780313MGRZRS07', 'mvazquez@pampano.unacar.mx', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 4959 (class 0 OID 16456)
-- Dependencies: 223
-- Data for Name: socioeconomicoprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4961 (class 0 OID 16466)
-- Dependencies: 225
-- Data for Name: usuariosprueba; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4971 (class 0 OID 0)
-- Dependencies: 215
-- Name: administrativosprueba_id_administrativo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.administrativosprueba_id_administrativo_seq', 1, false);


--
-- TOC entry 4972 (class 0 OID 0)
-- Dependencies: 220
-- Name: minutasprueba_id_minuta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.minutasprueba_id_minuta_seq', 1, false);


--
-- TOC entry 4973 (class 0 OID 0)
-- Dependencies: 224
-- Name: usuariosprueba_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuariosprueba_id_usuario_seq', 1, false);


--
-- TOC entry 4781 (class 2606 OID 16404)
-- Name: administrativosprueba administrativosprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.administrativosprueba
    ADD CONSTRAINT administrativosprueba_pkey PRIMARY KEY (id_administrativo);


--
-- TOC entry 4783 (class 2606 OID 16411)
-- Name: areasprueba areasprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areasprueba
    ADD CONSTRAINT areasprueba_pkey PRIMARY KEY (id_area);


--
-- TOC entry 4791 (class 2606 OID 16436)
-- Name: contactoemergenciaprueba contactoemergenciaprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contactoemergenciaprueba
    ADD CONSTRAINT contactoemergenciaprueba_pkey PRIMARY KEY (num_emp_contacto);


--
-- TOC entry 4793 (class 2606 OID 16445)
-- Name: minutasprueba minutasprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.minutasprueba
    ADD CONSTRAINT minutasprueba_pkey PRIMARY KEY (id_minuta);


--
-- TOC entry 4795 (class 2606 OID 16455)
-- Name: saludprueba saludprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.saludprueba
    ADD CONSTRAINT saludprueba_pkey PRIMARY KEY (num_emp_salud);


--
-- TOC entry 4787 (class 2606 OID 16426)
-- Name: sindicalizadosprueba sindicalizadosprueba_correo_institucional_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sindicalizadosprueba
    ADD CONSTRAINT sindicalizadosprueba_correo_institucional_key UNIQUE (correo_institucional);


--
-- TOC entry 4789 (class 2606 OID 16424)
-- Name: sindicalizadosprueba sindicalizadosprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sindicalizadosprueba
    ADD CONSTRAINT sindicalizadosprueba_pkey PRIMARY KEY (num_emp);


--
-- TOC entry 4797 (class 2606 OID 16464)
-- Name: socioeconomicoprueba socioeconomicoprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.socioeconomicoprueba
    ADD CONSTRAINT socioeconomicoprueba_pkey PRIMARY KEY (num_emp_socioeconomico);


--
-- TOC entry 4799 (class 2606 OID 16475)
-- Name: usuariosprueba usuariosprueba_num_emp_usuario_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuariosprueba
    ADD CONSTRAINT usuariosprueba_num_emp_usuario_key UNIQUE (num_emp_usuario);


--
-- TOC entry 4801 (class 2606 OID 16473)
-- Name: usuariosprueba usuariosprueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuariosprueba
    ADD CONSTRAINT usuariosprueba_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 4784 (class 1259 OID 16428)
-- Name: idx_sindicalizados_id_administrativo; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_sindicalizados_id_administrativo ON public.sindicalizadosprueba USING btree (id_administrativo);


--
-- TOC entry 4785 (class 1259 OID 16427)
-- Name: idx_sindicalizados_id_area; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_sindicalizados_id_area ON public.sindicalizadosprueba USING btree (id_area);


--
-- TOC entry 4804 (class 2606 OID 16476)
-- Name: contactoemergenciaprueba fk_contacto_sindicalizado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contactoemergenciaprueba
    ADD CONSTRAINT fk_contacto_sindicalizado FOREIGN KEY (num_emp_contacto) REFERENCES public.sindicalizadosprueba(num_emp) ON DELETE CASCADE;


--
-- TOC entry 4805 (class 2606 OID 16481)
-- Name: saludprueba fk_salud_sindicalizado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.saludprueba
    ADD CONSTRAINT fk_salud_sindicalizado FOREIGN KEY (num_emp_salud) REFERENCES public.sindicalizadosprueba(num_emp) ON DELETE CASCADE;


--
-- TOC entry 4802 (class 2606 OID 16496)
-- Name: sindicalizadosprueba fk_sindicalizados_administrativo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sindicalizadosprueba
    ADD CONSTRAINT fk_sindicalizados_administrativo FOREIGN KEY (id_administrativo) REFERENCES public.administrativosprueba(id_administrativo);


--
-- TOC entry 4803 (class 2606 OID 16501)
-- Name: sindicalizadosprueba fk_sindicalizados_area; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sindicalizadosprueba
    ADD CONSTRAINT fk_sindicalizados_area FOREIGN KEY (id_area) REFERENCES public.areasprueba(id_area);


--
-- TOC entry 4806 (class 2606 OID 16486)
-- Name: socioeconomicoprueba fk_socioeconomico_sindicalizado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.socioeconomicoprueba
    ADD CONSTRAINT fk_socioeconomico_sindicalizado FOREIGN KEY (num_emp_socioeconomico) REFERENCES public.sindicalizadosprueba(num_emp) ON DELETE CASCADE;


--
-- TOC entry 4807 (class 2606 OID 16491)
-- Name: usuariosprueba fk_usuarios_sindicalizado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuariosprueba
    ADD CONSTRAINT fk_usuarios_sindicalizado FOREIGN KEY (num_emp_usuario) REFERENCES public.sindicalizadosprueba(num_emp) ON DELETE CASCADE;


-- Completed on 2026-05-26 19:53:27

--
-- PostgreSQL database dump complete
--

\unrestrict 4Y91BR2T3eaEyZ0p0gFOGYWgGP7JVPM1yLbZ4IuoPhHsscAg7sscN8M3TXDrj3D

