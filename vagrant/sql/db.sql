--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.14
-- Dumped by pg_dump version 9.5.4

-- Started on 2016-10-03 08:56:47 WIB

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 8 (class 2615 OID 25254)
-- Name: eproc; Type: SCHEMA; Schema: -; Owner: eproc
--

CREATE SCHEMA eproc;


ALTER SCHEMA eproc OWNER TO eproc;

SET search_path = eproc, pg_catalog;

--
-- TOC entry 259 (class 1255 OID 33480)
-- Name: mylpad(bigint, integer, text); Type: FUNCTION; Schema: eproc; Owner: postgres
--

CREATE FUNCTION mylpad(bigint, integer, text) RETURNS text
    LANGUAGE plpgsql
    AS $_$
DECLARE
       MYNUMBER ALIAS FOR $1;
       MYLEN ALIAS FOR $2;
       MYPAD ALIAS FOR $3;
BEGIN
     IF (length(MYNUMBER::TEXT) > MYLEN) THEN
       RETURN (MYNUMBER::TEXT);
     END IF;
     RETURN LPAD(MYNUMBER::TEXT,MYLEN,MYPAD);
END;
$_$;


ALTER FUNCTION eproc.mylpad(bigint, integer, text) OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 25255)
-- Name: auth_assignment; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE auth_assignment (
    item_name character varying(64) NOT NULL,
    user_id character varying(64) NOT NULL,
    created_at integer
);


ALTER TABLE auth_assignment OWNER TO eproc;

--
-- TOC entry 173 (class 1259 OID 25258)
-- Name: auth_item; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE auth_item (
    name character varying(64) NOT NULL,
    type integer NOT NULL,
    description text,
    rule_name character varying(64),
    data text,
    created_at integer,
    updated_at integer
);


ALTER TABLE auth_item OWNER TO eproc;

--
-- TOC entry 174 (class 1259 OID 25264)
-- Name: auth_item_child; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE auth_item_child (
    parent character varying(64) NOT NULL,
    child character varying(64) NOT NULL
);


ALTER TABLE auth_item_child OWNER TO eproc;

--
-- TOC entry 175 (class 1259 OID 25267)
-- Name: auth_rule; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE auth_rule (
    name character varying(64) NOT NULL,
    data text,
    created_at integer,
    updated_at integer
);


ALTER TABLE auth_rule OWNER TO eproc;

--
-- TOC entry 176 (class 1259 OID 25273)
-- Name: menu; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE menu (
    id integer NOT NULL,
    name character varying(128) NOT NULL,
    parent integer,
    route character varying(255),
    "order" integer,
    data bytea,
    icon character varying(128)
);


ALTER TABLE menu OWNER TO eproc;

--
-- TOC entry 177 (class 1259 OID 25279)
-- Name: menu_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE menu_id_seq OWNER TO eproc;

--
-- TOC entry 2614 (class 0 OID 0)
-- Dependencies: 177
-- Name: menu_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE menu_id_seq OWNED BY menu.id;


--
-- TOC entry 178 (class 1259 OID 25281)
-- Name: migration; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE migration OWNER TO eproc;

--
-- TOC entry 179 (class 1259 OID 25284)
-- Name: t_company_category; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_company_category (
    t_company_category_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    p_master_category_id integer NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_company_category OWNER TO eproc;

--
-- TOC entry 180 (class 1259 OID 25289)
-- Name: p_company_categories_cc_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_company_categories_cc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_company_categories_cc_id_seq OWNER TO eproc;

--
-- TOC entry 2615 (class 0 OID 0)
-- Dependencies: 180
-- Name: p_company_categories_cc_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_company_categories_cc_id_seq OWNED BY t_company_category.t_company_category_id;


--
-- TOC entry 181 (class 1259 OID 25291)
-- Name: p_master_category; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_category (
    p_master_catagory_id integer NOT NULL,
    category_name character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_category OWNER TO eproc;

--
-- TOC entry 182 (class 1259 OID 25299)
-- Name: p_master_city; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_city (
    p_master_city_id integer NOT NULL,
    p_master_region_id integer NOT NULL,
    city_code character varying NOT NULL,
    city_name character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_city OWNER TO eproc;

--
-- TOC entry 183 (class 1259 OID 25307)
-- Name: p_master_city_city_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_city_city_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_city_city_id_seq OWNER TO eproc;

--
-- TOC entry 2616 (class 0 OID 0)
-- Dependencies: 183
-- Name: p_master_city_city_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_city_city_id_seq OWNED BY p_master_city.p_master_city_id;


--
-- TOC entry 184 (class 1259 OID 25309)
-- Name: p_master_comodity; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_comodity (
    p_master_comodity_id integer NOT NULL,
    comodity_code character varying NOT NULL,
    comodity_name character varying NOT NULL,
    type integer NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_comodity OWNER TO eproc;

--
-- TOC entry 2617 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN p_master_comodity.type; Type: COMMENT; Schema: eproc; Owner: eproc
--

COMMENT ON COLUMN p_master_comodity.type IS '1 = Barang
2 = Jasa';


--
-- TOC entry 185 (class 1259 OID 25317)
-- Name: p_master_comodity_comodity_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_comodity_comodity_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_comodity_comodity_id_seq OWNER TO eproc;

--
-- TOC entry 2618 (class 0 OID 0)
-- Dependencies: 185
-- Name: p_master_comodity_comodity_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_comodity_comodity_id_seq OWNED BY p_master_comodity.p_master_comodity_id;


--
-- TOC entry 186 (class 1259 OID 25319)
-- Name: p_master_company_categories_cc_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_company_categories_cc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_company_categories_cc_id_seq OWNER TO eproc;

--
-- TOC entry 2619 (class 0 OID 0)
-- Dependencies: 186
-- Name: p_master_company_categories_cc_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_company_categories_cc_id_seq OWNED BY p_master_category.p_master_catagory_id;


--
-- TOC entry 187 (class 1259 OID 25321)
-- Name: p_master_country; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_country (
    p_master_country_id integer NOT NULL,
    country_code character varying NOT NULL,
    country_name character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_country OWNER TO eproc;

--
-- TOC entry 188 (class 1259 OID 25329)
-- Name: p_master_country_country_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_country_country_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_country_country_id_seq OWNER TO eproc;

--
-- TOC entry 2620 (class 0 OID 0)
-- Dependencies: 188
-- Name: p_master_country_country_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_country_country_id_seq OWNED BY p_master_country.p_master_country_id;


--
-- TOC entry 189 (class 1259 OID 25331)
-- Name: t_contact_person; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_contact_person (
    t_contact_person_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    cp_name character varying NOT NULL,
    cp_position character varying NOT NULL,
    cp_phone character varying NOT NULL,
    cp_email character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_contact_person OWNER TO eproc;

--
-- TOC entry 190 (class 1259 OID 25339)
-- Name: p_master_cp_cp_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_cp_cp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_cp_cp_id_seq OWNER TO eproc;

--
-- TOC entry 2621 (class 0 OID 0)
-- Dependencies: 190
-- Name: p_master_cp_cp_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_cp_cp_id_seq OWNED BY t_contact_person.t_contact_person_id;


--
-- TOC entry 191 (class 1259 OID 25341)
-- Name: p_master_currency; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_currency (
    p_master_currency_id integer NOT NULL,
    currency_code character varying NOT NULL,
    currency_desc character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_currency OWNER TO eproc;

--
-- TOC entry 192 (class 1259 OID 25349)
-- Name: p_master_currency_currency_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_currency_currency_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_currency_currency_id_seq OWNER TO eproc;

--
-- TOC entry 2622 (class 0 OID 0)
-- Dependencies: 192
-- Name: p_master_currency_currency_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_currency_currency_id_seq OWNED BY p_master_currency.p_master_currency_id;


--
-- TOC entry 193 (class 1259 OID 25351)
-- Name: p_master_jenis_alat; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_jenis_alat (
    p_master_jenis_alat_id integer NOT NULL,
    jenis_alat character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_jenis_alat OWNER TO eproc;

--
-- TOC entry 194 (class 1259 OID 25359)
-- Name: p_master_jenis_alat_ja_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_jenis_alat_ja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_jenis_alat_ja_id_seq OWNER TO eproc;

--
-- TOC entry 2623 (class 0 OID 0)
-- Dependencies: 194
-- Name: p_master_jenis_alat_ja_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_jenis_alat_ja_id_seq OWNED BY p_master_jenis_alat.p_master_jenis_alat_id;


--
-- TOC entry 195 (class 1259 OID 25361)
-- Name: p_master_pemasok; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_pemasok (
    p_master_pemasok_id integer NOT NULL,
    tipe_pemasok character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_pemasok OWNER TO eproc;

--
-- TOC entry 196 (class 1259 OID 25369)
-- Name: p_master_region; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_region (
    p_master_region_id integer NOT NULL,
    p_master_country_id integer NOT NULL,
    region_code character varying NOT NULL,
    region_name character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE p_master_region OWNER TO eproc;

--
-- TOC entry 197 (class 1259 OID 25377)
-- Name: p_master_region_region_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_master_region_region_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_master_region_region_id_seq OWNER TO eproc;

--
-- TOC entry 2624 (class 0 OID 0)
-- Dependencies: 197
-- Name: p_master_region_region_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_master_region_region_id_seq OWNED BY p_master_region.p_master_region_id;


--
-- TOC entry 198 (class 1259 OID 25379)
-- Name: p_master_unit; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE p_master_unit (
    p_master_unit_id integer NOT NULL,
    unit_name character varying NOT NULL,
    unit_code character varying NOT NULL,
    unit_status integer NOT NULL,
    unit_parent integer DEFAULT 0
);


ALTER TABLE p_master_unit OWNER TO eproc;

--
-- TOC entry 199 (class 1259 OID 25386)
-- Name: p_pemasok_pemasok_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_pemasok_pemasok_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_pemasok_pemasok_id_seq OWNER TO eproc;

--
-- TOC entry 2625 (class 0 OID 0)
-- Dependencies: 199
-- Name: p_pemasok_pemasok_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_pemasok_pemasok_id_seq OWNED BY p_master_pemasok.p_master_pemasok_id;


--
-- TOC entry 200 (class 1259 OID 25388)
-- Name: t_vendor_teknis_komoditi; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_teknis_komoditi (
    t_vendor_teknis_komoditi_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    p_master_comodity_id integer NOT NULL,
    nama character varying,
    merk character varying,
    sumber character varying,
    p_master_pemasok_id integer NOT NULL,
    area character varying,
    unit character varying,
    lampiran character varying,
    create_date date DEFAULT now() NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    update_date date DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL,
    jenis integer,
    is_delete boolean DEFAULT false NOT NULL
);


ALTER TABLE t_vendor_teknis_komoditi OWNER TO eproc;

--
-- TOC entry 2626 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN t_vendor_teknis_komoditi.area; Type: COMMENT; Schema: eproc; Owner: eproc
--

COMMENT ON COLUMN t_vendor_teknis_komoditi.area IS 'noted
';


--
-- TOC entry 2627 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN t_vendor_teknis_komoditi.jenis; Type: COMMENT; Schema: eproc; Owner: eproc
--

COMMENT ON COLUMN t_vendor_teknis_komoditi.jenis IS '1 = Barang
2 = Jasa';


--
-- TOC entry 201 (class 1259 OID 25394)
-- Name: p_vendo_teknis_komoditi_tp_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendo_teknis_komoditi_tp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendo_teknis_komoditi_tp_id_seq OWNER TO eproc;

--
-- TOC entry 2628 (class 0 OID 0)
-- Dependencies: 201
-- Name: p_vendo_teknis_komoditi_tp_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendo_teknis_komoditi_tp_id_seq OWNED BY t_vendor_teknis_komoditi.t_vendor_teknis_komoditi_id;


--
-- TOC entry 202 (class 1259 OID 25396)
-- Name: t_vendor_company_site; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_company_site (
    t_vendor_company_site_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    address character varying NOT NULL,
    p_master_city_id integer NOT NULL,
    postal_code character varying NOT NULL,
    p_master_region_id integer NOT NULL,
    p_master_country_id integer NOT NULL,
    phone character varying NOT NULL,
    fax character varying,
    email character varying NOT NULL,
    website character varying,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_company_site OWNER TO eproc;

--
-- TOC entry 203 (class 1259 OID 25404)
-- Name: p_vendor_company_site_site_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_company_site_site_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_company_site_site_id_seq OWNER TO eproc;

--
-- TOC entry 2629 (class 0 OID 0)
-- Dependencies: 203
-- Name: p_vendor_company_site_site_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_company_site_site_id_seq OWNED BY t_vendor_company_site.t_vendor_company_site_id;


--
-- TOC entry 204 (class 1259 OID 25406)
-- Name: t_vendor_company; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_company (
    t_vendor_company_id integer NOT NULL,
    user_id integer NOT NULL,
    prefix character varying,
    name character varying,
    sufix character varying,
    area character varying,
    referer integer,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL,
    no_undangan character varying
);


ALTER TABLE t_vendor_company OWNER TO eproc;

--
-- TOC entry 205 (class 1259 OID 25414)
-- Name: p_vendor_company_vendor_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_company_vendor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_company_vendor_id_seq OWNER TO eproc;

--
-- TOC entry 2630 (class 0 OID 0)
-- Dependencies: 205
-- Name: p_vendor_company_vendor_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_company_vendor_id_seq OWNED BY t_vendor_company.t_vendor_company_id;


--
-- TOC entry 206 (class 1259 OID 25416)
-- Name: t_vendor_keu_laporan; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_keu_laporan (
    t_vendor_keu_laporan_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    tahun_laporan character varying NOT NULL,
    jenis_laporan character varying NOT NULL,
    fk_master_currency integer NOT NULL,
    nilai_aset double precision NOT NULL,
    hutang double precision NOT NULL,
    pendapatan_kotor double precision NOT NULL,
    laba_bersih double precision NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_keu_laporan OWNER TO eproc;

--
-- TOC entry 207 (class 1259 OID 25424)
-- Name: p_vendor_keu_laporan_laporan_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_keu_laporan_laporan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_keu_laporan_laporan_id_seq OWNER TO eproc;

--
-- TOC entry 2631 (class 0 OID 0)
-- Dependencies: 207
-- Name: p_vendor_keu_laporan_laporan_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_keu_laporan_laporan_id_seq OWNED BY t_vendor_keu_laporan.t_vendor_keu_laporan_id;


--
-- TOC entry 208 (class 1259 OID 25426)
-- Name: t_vendor_keu_modal; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_keu_modal (
    t_vendor_keu_modal_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    klasifikasi character varying,
    valuta_dasar integer NOT NULL,
    nilai_dasar double precision NOT NULL,
    valuta_disetor integer NOT NULL,
    nilai_disetor double precision NOT NULL,
    create_date date DEFAULT now() NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    update_date date DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL
);


ALTER TABLE t_vendor_keu_modal OWNER TO eproc;

--
-- TOC entry 209 (class 1259 OID 25432)
-- Name: p_vendor_keu_modal_modal_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_keu_modal_modal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_keu_modal_modal_id_seq OWNER TO eproc;

--
-- TOC entry 2632 (class 0 OID 0)
-- Dependencies: 209
-- Name: p_vendor_keu_modal_modal_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_keu_modal_modal_id_seq OWNED BY t_vendor_keu_modal.t_vendor_keu_modal_id;


--
-- TOC entry 210 (class 1259 OID 25434)
-- Name: t_vendor_keu_rekening; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_keu_rekening (
    t_vendor_keu_rekening_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nomor character varying NOT NULL,
    pemegang character varying NOT NULL,
    nama_bank character varying NOT NULL,
    cabang_bank character varying NOT NULL,
    alamat character varying NOT NULL,
    p_master_currency_id integer NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_keu_rekening OWNER TO eproc;

--
-- TOC entry 211 (class 1259 OID 25442)
-- Name: p_vendor_keu_rekening_rekening_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_keu_rekening_rekening_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_keu_rekening_rekening_id_seq OWNER TO eproc;

--
-- TOC entry 2633 (class 0 OID 0)
-- Dependencies: 211
-- Name: p_vendor_keu_rekening_rekening_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_keu_rekening_rekening_id_seq OWNED BY t_vendor_keu_rekening.t_vendor_keu_rekening_id;


--
-- TOC entry 212 (class 1259 OID 25444)
-- Name: t_vendor_legal_akta; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_legal_akta (
    t_vendor_legal_akta_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nomor character varying NOT NULL,
    jenis character varying NOT NULL,
    tanggal_pembuatan date NOT NULL,
    nama_notaris character varying NOT NULL,
    alamat_notaris character varying NOT NULL,
    tanggal_pengesahan date NOT NULL,
    tanggal_berita date NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_legal_akta OWNER TO eproc;

--
-- TOC entry 213 (class 1259 OID 25452)
-- Name: p_vendor_legal_akta_akta_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_legal_akta_akta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_legal_akta_akta_id_seq OWNER TO eproc;

--
-- TOC entry 2634 (class 0 OID 0)
-- Dependencies: 213
-- Name: p_vendor_legal_akta_akta_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_legal_akta_akta_id_seq OWNED BY t_vendor_legal_akta.t_vendor_legal_akta_id;


--
-- TOC entry 214 (class 1259 OID 25454)
-- Name: t_vendor_legal_domisili; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_legal_domisili (
    t_vendor_legal_domisili_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    domisili character varying NOT NULL,
    tanggal date NOT NULL,
    kadaluarsa date NOT NULL,
    alamat character varying NOT NULL,
    p_master_city_id integer NOT NULL,
    p_master_region_id integer NOT NULL,
    kode_pos character varying NOT NULL,
    p_master_country_id integer NOT NULL,
    telpon character varying NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_legal_domisili OWNER TO eproc;

--
-- TOC entry 215 (class 1259 OID 25462)
-- Name: p_vendor_legal_domisili_domisili_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_legal_domisili_domisili_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_legal_domisili_domisili_id_seq OWNER TO eproc;

--
-- TOC entry 2635 (class 0 OID 0)
-- Dependencies: 215
-- Name: p_vendor_legal_domisili_domisili_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_legal_domisili_domisili_id_seq OWNED BY t_vendor_legal_domisili.t_vendor_legal_domisili_id;


--
-- TOC entry 216 (class 1259 OID 25464)
-- Name: t_vendor_legal_ijinlain; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_legal_ijinlain (
    t_vendor_legal_ijinlain_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    jenis character varying NOT NULL,
    penerbit character varying NOT NULL,
    nomor character varying NOT NULL,
    tanggal date NOT NULL,
    kadaluarsa date NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_legal_ijinlain OWNER TO eproc;

--
-- TOC entry 217 (class 1259 OID 25472)
-- Name: p_vendor_legal_ijinlain_ijinlain_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_legal_ijinlain_ijinlain_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_legal_ijinlain_ijinlain_id_seq OWNER TO eproc;

--
-- TOC entry 2636 (class 0 OID 0)
-- Dependencies: 217
-- Name: p_vendor_legal_ijinlain_ijinlain_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_legal_ijinlain_ijinlain_id_seq OWNED BY t_vendor_legal_ijinlain.t_vendor_legal_ijinlain_id;


--
-- TOC entry 218 (class 1259 OID 25474)
-- Name: t_vendor_legal_npwp; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_legal_npwp (
    t_vendor_legal_npwp_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nomor character varying NOT NULL,
    alamat character varying NOT NULL,
    p_master_city_id integer NOT NULL,
    p_master_region_id integer NOT NULL,
    kode_pos character varying NOT NULL,
    status_pkp integer NOT NULL,
    nomor_pkp character varying NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_legal_npwp OWNER TO eproc;

--
-- TOC entry 219 (class 1259 OID 25482)
-- Name: p_vendor_legal_npwp_npwp_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_legal_npwp_npwp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_legal_npwp_npwp_id_seq OWNER TO eproc;

--
-- TOC entry 2637 (class 0 OID 0)
-- Dependencies: 219
-- Name: p_vendor_legal_npwp_npwp_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_legal_npwp_npwp_id_seq OWNED BY t_vendor_legal_npwp.t_vendor_legal_npwp_id;


--
-- TOC entry 220 (class 1259 OID 25484)
-- Name: t_vendor_legal_siup; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_legal_siup (
    t_vendor_legal_siup_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    penerbit character varying NOT NULL,
    nomor character varying NOT NULL,
    jenis character varying NOT NULL,
    tanggal date NOT NULL,
    kadaluarsa date NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_legal_siup OWNER TO eproc;

--
-- TOC entry 221 (class 1259 OID 25492)
-- Name: p_vendor_legal_siup_siup_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_legal_siup_siup_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_legal_siup_siup_id_seq OWNER TO eproc;

--
-- TOC entry 2638 (class 0 OID 0)
-- Dependencies: 221
-- Name: p_vendor_legal_siup_siup_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_legal_siup_siup_id_seq OWNED BY t_vendor_legal_siup.t_vendor_legal_siup_id;


--
-- TOC entry 222 (class 1259 OID 25494)
-- Name: t_vendor_teknis_pengalaman; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_teknis_pengalaman (
    t_vendor_teknis_pengalaman_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nama_pelanggan character varying NOT NULL,
    nama_proyek character varying NOT NULL,
    keterangan character varying NOT NULL,
    p_master_currency_id integer NOT NULL,
    nilai_proyek double precision NOT NULL,
    nomor_kontrak character varying NOT NULL,
    tanggal_mulai date NOT NULL,
    tanggal_selesai date NOT NULL,
    contact_person character varying NOT NULL,
    nomor_kontak character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_teknis_pengalaman OWNER TO eproc;

--
-- TOC entry 223 (class 1259 OID 25502)
-- Name: p_vendor_teknis_pengalaman_pengalaman_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_teknis_pengalaman_pengalaman_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_teknis_pengalaman_pengalaman_id_seq OWNER TO eproc;

--
-- TOC entry 2639 (class 0 OID 0)
-- Dependencies: 223
-- Name: p_vendor_teknis_pengalaman_pengalaman_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_teknis_pengalaman_pengalaman_id_seq OWNED BY t_vendor_teknis_pengalaman.t_vendor_teknis_pengalaman_id;


--
-- TOC entry 224 (class 1259 OID 25504)
-- Name: t_vendor_teknis_sertifikat; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_teknis_sertifikat (
    t_vendor_teknis_sertifikat_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    sertifikat character varying NOT NULL,
    penerbit character varying NOT NULL,
    tanggal date NOT NULL,
    kadaluarsa date NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL,
    jenis character varying
);


ALTER TABLE t_vendor_teknis_sertifikat OWNER TO eproc;

--
-- TOC entry 225 (class 1259 OID 25512)
-- Name: p_vendor_teknis_sertifikat_sertifikat_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_teknis_sertifikat_sertifikat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_teknis_sertifikat_sertifikat_id_seq OWNER TO eproc;

--
-- TOC entry 2640 (class 0 OID 0)
-- Dependencies: 225
-- Name: p_vendor_teknis_sertifikat_sertifikat_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_teknis_sertifikat_sertifikat_id_seq OWNED BY t_vendor_teknis_sertifikat.t_vendor_teknis_sertifikat_id;


--
-- TOC entry 226 (class 1259 OID 25514)
-- Name: t_vendor_teknis_tambahan; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_teknis_tambahan (
    t_vendor_teknis_tambahan_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nama character varying NOT NULL,
    alamat character varying NOT NULL,
    p_master_country_id integer NOT NULL,
    p_master_region_id integer NOT NULL,
    p_master_city_id integer NOT NULL,
    kodepos character varying NOT NULL,
    kualifikasi character varying NOT NULL,
    hubungan_kerja character varying NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_teknis_tambahan OWNER TO eproc;

--
-- TOC entry 227 (class 1259 OID 25522)
-- Name: p_vendor_teknis_tambahan_tambahan_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE p_vendor_teknis_tambahan_tambahan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE p_vendor_teknis_tambahan_tambahan_id_seq OWNER TO eproc;

--
-- TOC entry 2641 (class 0 OID 0)
-- Dependencies: 227
-- Name: p_vendor_teknis_tambahan_tambahan_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE p_vendor_teknis_tambahan_tambahan_id_seq OWNED BY t_vendor_teknis_tambahan.t_vendor_teknis_tambahan_id;


--
-- TOC entry 252 (class 1259 OID 82618)
-- Name: sw_metadata; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE sw_metadata (
    workflow_id character varying(32) NOT NULL,
    status_id character varying(32) NOT NULL,
    key character varying(64) NOT NULL,
    value character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE sw_metadata OWNER TO eproc;

--
-- TOC entry 249 (class 1259 OID 82597)
-- Name: sw_status; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE sw_status (
    id character varying(32) NOT NULL,
    workflow_id character varying(32) NOT NULL,
    label character varying(64) DEFAULT NULL::character varying,
    sort_order integer
);


ALTER TABLE sw_status OWNER TO eproc;

--
-- TOC entry 250 (class 1259 OID 82604)
-- Name: sw_transition; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE sw_transition (
    workflow_id character varying(32) NOT NULL,
    start_status_id character varying(32) NOT NULL,
    end_status_id character varying(32) NOT NULL
);


ALTER TABLE sw_transition OWNER TO eproc;

--
-- TOC entry 251 (class 1259 OID 82611)
-- Name: sw_workflow; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE sw_workflow (
    id character varying(32) NOT NULL,
    initial_status_id character varying(32) DEFAULT NULL::character varying
);


ALTER TABLE sw_workflow OWNER TO eproc;

--
-- TOC entry 246 (class 1259 OID 49831)
-- Name: t_evaluasi_vendor; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_evaluasi_vendor (
    t_evaluasi_vendor_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nilai_ketersediaan double precision NOT NULL,
    catatan_ketersediaan character varying,
    nilai_work_instruction double precision NOT NULL,
    catatan_work_instruction character varying,
    nilai_ketepatan_waktu double precision NOT NULL,
    catatan_ketepatan_waktu character varying,
    nilai_nc_produk double precision NOT NULL,
    catatan_nc_produk character varying,
    nilai_dampak_lingkungan double precision NOT NULL,
    catatan_dampak_lingkungan character varying,
    nilai_pemenuhan_peraturan double precision NOT NULL,
    catatan_pemenuhan_peraturan character varying,
    nilai_kecelakaan_kerja double precision NOT NULL,
    catatan_kecelakaan_kerja character varying,
    nilai_hilang_jam_kerja double precision NOT NULL,
    catatan_hilang_jam_kerja character varying,
    hasil_penilaian character varying NOT NULL,
    catatan character varying,
    t_vendor_teknis_komoditi_id integer NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    create_date date DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL,
    update_date date DEFAULT now() NOT NULL,
    nxb_ketersediaan double precision NOT NULL,
    nxb_work_instruction double precision NOT NULL,
    nxb_ketepatan_waktu double precision NOT NULL,
    nxb_nc_produk double precision NOT NULL,
    nxb_dampak_lingkungan double precision NOT NULL,
    nxb_pemenuhan_peraturan double precision NOT NULL,
    nxb_kecelakaan_kerja double precision NOT NULL,
    nxb_hilang_jam_kerja double precision NOT NULL,
    nomor_kontrak character varying DEFAULT ''::character varying NOT NULL
);


ALTER TABLE t_evaluasi_vendor OWNER TO eproc;

--
-- TOC entry 245 (class 1259 OID 49829)
-- Name: t_evaluasi_vendor_t_evaluasi_vendor_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_evaluasi_vendor_t_evaluasi_vendor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_evaluasi_vendor_t_evaluasi_vendor_id_seq OWNER TO eproc;

--
-- TOC entry 2642 (class 0 OID 0)
-- Dependencies: 245
-- Name: t_evaluasi_vendor_t_evaluasi_vendor_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_evaluasi_vendor_t_evaluasi_vendor_id_seq OWNED BY t_evaluasi_vendor.t_evaluasi_vendor_id;


--
-- TOC entry 242 (class 1259 OID 33464)
-- Name: t_undangan; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_undangan (
    t_undangan_id integer NOT NULL,
    no_undangan character varying,
    waktu_kirim timestamp without time zone DEFAULT now() NOT NULL,
    tujuan character varying NOT NULL,
    user_id integer NOT NULL,
    subjek character varying NOT NULL,
    pesan text NOT NULL
);


ALTER TABLE t_undangan OWNER TO eproc;

--
-- TOC entry 241 (class 1259 OID 33462)
-- Name: t_undangan_t_undangan_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_undangan_t_undangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_undangan_t_undangan_id_seq OWNER TO eproc;

--
-- TOC entry 2643 (class 0 OID 0)
-- Dependencies: 241
-- Name: t_undangan_t_undangan_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_undangan_t_undangan_id_seq OWNED BY t_undangan.t_undangan_id;


--
-- TOC entry 228 (class 1259 OID 25524)
-- Name: t_unit_unit_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_unit_unit_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_unit_unit_id_seq OWNER TO eproc;

--
-- TOC entry 2644 (class 0 OID 0)
-- Dependencies: 228
-- Name: t_unit_unit_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_unit_unit_id_seq OWNED BY p_master_unit.p_master_unit_id;


--
-- TOC entry 229 (class 1259 OID 25526)
-- Name: t_user_unit; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_user_unit (
    t_user_unit_id integer NOT NULL,
    user_id integer NOT NULL,
    p_master_unit_id integer NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL
);


ALTER TABLE t_user_unit OWNER TO eproc;

--
-- TOC entry 230 (class 1259 OID 25533)
-- Name: t_user_unit_uu_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_user_unit_uu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_user_unit_uu_id_seq OWNER TO eproc;

--
-- TOC entry 2645 (class 0 OID 0)
-- Dependencies: 230
-- Name: t_user_unit_uu_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_user_unit_uu_id_seq OWNED BY t_user_unit.t_user_unit_id;


--
-- TOC entry 231 (class 1259 OID 25535)
-- Name: t_userdata_internal; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_userdata_internal (
    t_userdata_internal_id integer NOT NULL,
    user_id integer NOT NULL,
    fullname character varying(64),
    nik character varying(64),
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL
);


ALTER TABLE t_userdata_internal OWNER TO eproc;

--
-- TOC entry 232 (class 1259 OID 25542)
-- Name: t_userdata_internal_ui_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_userdata_internal_ui_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_userdata_internal_ui_id_seq OWNER TO eproc;

--
-- TOC entry 2646 (class 0 OID 0)
-- Dependencies: 232
-- Name: t_userdata_internal_ui_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_userdata_internal_ui_id_seq OWNED BY t_userdata_internal.t_userdata_internal_id;


--
-- TOC entry 233 (class 1259 OID 25544)
-- Name: t_vendor_kepengurusan; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_kepengurusan (
    t_vendor_kepengurusan_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nama character varying NOT NULL,
    jabatan character varying NOT NULL,
    telpon character varying NOT NULL,
    email character varying NOT NULL,
    ktp character varying NOT NULL,
    npwp character varying NOT NULL,
    alamat character varying NOT NULL,
    p_master_city_id integer NOT NULL,
    p_master_region_id integer NOT NULL,
    kode_pos character varying NOT NULL,
    jenis integer NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_kepengurusan OWNER TO eproc;

--
-- TOC entry 2647 (class 0 OID 0)
-- Dependencies: 233
-- Name: COLUMN t_vendor_kepengurusan.jenis; Type: COMMENT; Schema: eproc; Owner: eproc
--

COMMENT ON COLUMN t_vendor_kepengurusan.jenis IS '1 = Pemilik
2 = Direksi
3 = Komisaris';


--
-- TOC entry 234 (class 1259 OID 25552)
-- Name: t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq OWNER TO eproc;

--
-- TOC entry 2648 (class 0 OID 0)
-- Dependencies: 234
-- Name: t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq OWNED BY t_vendor_kepengurusan.t_vendor_kepengurusan_id;


--
-- TOC entry 248 (class 1259 OID 49884)
-- Name: t_vendor_komoditi_harga; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_komoditi_harga (
    t_vendor_komoditi_harga_id integer NOT NULL,
    t_vendor_teknis_komoditi_id integer NOT NULL,
    p_master_currency_id integer NOT NULL,
    harga_satuan double precision NOT NULL,
    start_date date DEFAULT now() NOT NULL,
    end_date date,
    masih_berlaku boolean,
    create_date date DEFAULT now() NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    update_date date DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL,
    is_delete boolean DEFAULT false NOT NULL
);


ALTER TABLE t_vendor_komoditi_harga OWNER TO eproc;

--
-- TOC entry 247 (class 1259 OID 49882)
-- Name: t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq OWNER TO eproc;

--
-- TOC entry 2649 (class 0 OID 0)
-- Dependencies: 247
-- Name: t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq OWNED BY t_vendor_komoditi_harga.t_vendor_komoditi_harga_id;


--
-- TOC entry 235 (class 1259 OID 25554)
-- Name: t_vendor_sdm; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_sdm (
    t_vendor_sdm_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    nama character varying NOT NULL,
    pendidikan character varying NOT NULL,
    keahlian character varying NOT NULL,
    pengalaman character varying NOT NULL,
    umur integer NOT NULL,
    status character varying NOT NULL,
    kewarganegaraan character varying NOT NULL,
    is_utama integer NOT NULL,
    lampiran character varying NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    create_user integer NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer NOT NULL
);


ALTER TABLE t_vendor_sdm OWNER TO eproc;

--
-- TOC entry 236 (class 1259 OID 25562)
-- Name: t_vendor_sdm_t_vendor_sdm_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_vendor_sdm_t_vendor_sdm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_vendor_sdm_t_vendor_sdm_id_seq OWNER TO eproc;

--
-- TOC entry 2650 (class 0 OID 0)
-- Dependencies: 236
-- Name: t_vendor_sdm_t_vendor_sdm_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_vendor_sdm_t_vendor_sdm_id_seq OWNED BY t_vendor_sdm.t_vendor_sdm_id;


--
-- TOC entry 237 (class 1259 OID 25564)
-- Name: t_vendor_teknis_alat; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_vendor_teknis_alat (
    t_vendor_teknis_alat_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    p_master_jenis_alat_id integer NOT NULL,
    nama character varying NOT NULL,
    merk character varying NOT NULL,
    spesifikasi character varying NOT NULL,
    kondisi character varying NOT NULL,
    kuantitas integer NOT NULL,
    tahun integer NOT NULL,
    lokasi_sekarang character varying NOT NULL,
    create_date date DEFAULT now() NOT NULL,
    create_user integer DEFAULT 0 NOT NULL,
    update_date date DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL
);


ALTER TABLE t_vendor_teknis_alat OWNER TO eproc;

--
-- TOC entry 238 (class 1259 OID 25570)
-- Name: t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq OWNER TO eproc;

--
-- TOC entry 2651 (class 0 OID 0)
-- Dependencies: 238
-- Name: t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq OWNED BY t_vendor_teknis_alat.t_vendor_teknis_alat_id;


--
-- TOC entry 244 (class 1259 OID 33483)
-- Name: t_verifikasi_vendor; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE t_verifikasi_vendor (
    t_verifikasi_vendor_id integer NOT NULL,
    t_vendor_company_id integer NOT NULL,
    status_nama_perusahaan integer,
    keterangan_nama_perusahaan character varying,
    status_alamat_perusahaan integer,
    keterangan_alamat_perusahaan character varying,
    status_akta_pendirian integer,
    keterangan_akta_pendirian character varying,
    status_nama_pengurus integer,
    keterangan_nama_pengurus character varying,
    status_alamat_pengurus integer,
    keterangan_alamat_pengurus character varying,
    status_nama_pemilik integer,
    keterangan_nama_pemilik character varying,
    status_alamat_pemilik integer,
    keterangan_alamat_pemilik character varying,
    status_npwp integer,
    keterangan_npwp character varying,
    status_sp_pkp integer,
    keterangan_sp_pkp character varying,
    status_siup integer,
    keterangan_siup character varying,
    status_siujk integer,
    keterangan_siujk character varying,
    status_sbu integer,
    keterangan_sbu character varying,
    status_ijin_domisili integer,
    keterangan_ijin_domisili character varying,
    status_tdu_tdp integer,
    keterangan_tdu_tdp character(1),
    status_asosiasi integer,
    keterangan_asosiasi character varying,
    status_iso_9001 integer,
    keterangan_iso_9001 character varying,
    status_ohsas_18001 integer,
    keterangan_ohsas_18001 character varying,
    status_iso_14001 integer,
    keterangan_iso_14001 character varying,
    status_pengalaman_kerja integer,
    keterangan_pengalaman_kerja character varying,
    status_barang_jasa integer,
    keterangan_barang_jasa character varying,
    status_tenaga_ahli integer,
    keterangan_tenaga_ahli character varying,
    status_daftar_alat integer,
    keterangan_daftar_alat character varying,
    rekomendasi integer,
    create_user integer DEFAULT 0 NOT NULL,
    create_date timestamp without time zone DEFAULT now() NOT NULL,
    update_user integer DEFAULT 0 NOT NULL,
    update_date timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE t_verifikasi_vendor OWNER TO eproc;

--
-- TOC entry 243 (class 1259 OID 33481)
-- Name: t_verifikasi_vendor_t_verifikasi_vendor_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE t_verifikasi_vendor_t_verifikasi_vendor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE t_verifikasi_vendor_t_verifikasi_vendor_id_seq OWNER TO eproc;

--
-- TOC entry 2652 (class 0 OID 0)
-- Dependencies: 243
-- Name: t_verifikasi_vendor_t_verifikasi_vendor_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE t_verifikasi_vendor_t_verifikasi_vendor_id_seq OWNED BY t_verifikasi_vendor.t_verifikasi_vendor_id;


--
-- TOC entry 239 (class 1259 OID 25572)
-- Name: user; Type: TABLE; Schema: eproc; Owner: eproc
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE "user" OWNER TO eproc;

--
-- TOC entry 240 (class 1259 OID 25576)
-- Name: user_id_seq; Type: SEQUENCE; Schema: eproc; Owner: eproc
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO eproc;

--
-- TOC entry 2653 (class 0 OID 0)
-- Dependencies: 240
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: eproc; Owner: eproc
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- TOC entry 2108 (class 2604 OID 25578)
-- Name: id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY menu ALTER COLUMN id SET DEFAULT nextval('menu_id_seq'::regclass);


--
-- TOC entry 2114 (class 2604 OID 25579)
-- Name: p_master_catagory_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_category ALTER COLUMN p_master_catagory_id SET DEFAULT nextval('p_master_company_categories_cc_id_seq'::regclass);


--
-- TOC entry 2117 (class 2604 OID 25580)
-- Name: p_master_city_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_city ALTER COLUMN p_master_city_id SET DEFAULT nextval('p_master_city_city_id_seq'::regclass);


--
-- TOC entry 2120 (class 2604 OID 25581)
-- Name: p_master_comodity_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_comodity ALTER COLUMN p_master_comodity_id SET DEFAULT nextval('p_master_comodity_comodity_id_seq'::regclass);


--
-- TOC entry 2123 (class 2604 OID 25582)
-- Name: p_master_country_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_country ALTER COLUMN p_master_country_id SET DEFAULT nextval('p_master_country_country_id_seq'::regclass);


--
-- TOC entry 2129 (class 2604 OID 25583)
-- Name: p_master_currency_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_currency ALTER COLUMN p_master_currency_id SET DEFAULT nextval('p_master_currency_currency_id_seq'::regclass);


--
-- TOC entry 2132 (class 2604 OID 25584)
-- Name: p_master_jenis_alat_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_jenis_alat ALTER COLUMN p_master_jenis_alat_id SET DEFAULT nextval('p_master_jenis_alat_ja_id_seq'::regclass);


--
-- TOC entry 2135 (class 2604 OID 25585)
-- Name: p_master_pemasok_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_pemasok ALTER COLUMN p_master_pemasok_id SET DEFAULT nextval('p_pemasok_pemasok_id_seq'::regclass);


--
-- TOC entry 2138 (class 2604 OID 25586)
-- Name: p_master_region_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_region ALTER COLUMN p_master_region_id SET DEFAULT nextval('p_master_region_region_id_seq'::regclass);


--
-- TOC entry 2140 (class 2604 OID 25587)
-- Name: p_master_unit_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_unit ALTER COLUMN p_master_unit_id SET DEFAULT nextval('t_unit_unit_id_seq'::regclass);


--
-- TOC entry 2111 (class 2604 OID 25588)
-- Name: t_company_category_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_company_category ALTER COLUMN t_company_category_id SET DEFAULT nextval('p_company_categories_cc_id_seq'::regclass);


--
-- TOC entry 2126 (class 2604 OID 25589)
-- Name: t_contact_person_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_contact_person ALTER COLUMN t_contact_person_id SET DEFAULT nextval('p_master_cp_cp_id_seq'::regclass);


--
-- TOC entry 2218 (class 2604 OID 49834)
-- Name: t_evaluasi_vendor_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_evaluasi_vendor ALTER COLUMN t_evaluasi_vendor_id SET DEFAULT nextval('t_evaluasi_vendor_t_evaluasi_vendor_id_seq'::regclass);


--
-- TOC entry 2211 (class 2604 OID 33467)
-- Name: t_undangan_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_undangan ALTER COLUMN t_undangan_id SET DEFAULT nextval('t_undangan_t_undangan_id_seq'::regclass);


--
-- TOC entry 2192 (class 2604 OID 25590)
-- Name: t_user_unit_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_user_unit ALTER COLUMN t_user_unit_id SET DEFAULT nextval('t_user_unit_uu_id_seq'::regclass);


--
-- TOC entry 2197 (class 2604 OID 25591)
-- Name: t_userdata_internal_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_userdata_internal ALTER COLUMN t_userdata_internal_id SET DEFAULT nextval('t_userdata_internal_ui_id_seq'::regclass);


--
-- TOC entry 2152 (class 2604 OID 25592)
-- Name: t_vendor_company_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company ALTER COLUMN t_vendor_company_id SET DEFAULT nextval('p_vendor_company_vendor_id_seq'::regclass);


--
-- TOC entry 2149 (class 2604 OID 25593)
-- Name: t_vendor_company_site_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company_site ALTER COLUMN t_vendor_company_site_id SET DEFAULT nextval('p_vendor_company_site_site_id_seq'::regclass);


--
-- TOC entry 2200 (class 2604 OID 25594)
-- Name: t_vendor_kepengurusan_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_kepengurusan ALTER COLUMN t_vendor_kepengurusan_id SET DEFAULT nextval('t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq'::regclass);


--
-- TOC entry 2155 (class 2604 OID 25595)
-- Name: t_vendor_keu_laporan_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_laporan ALTER COLUMN t_vendor_keu_laporan_id SET DEFAULT nextval('p_vendor_keu_laporan_laporan_id_seq'::regclass);


--
-- TOC entry 2156 (class 2604 OID 25596)
-- Name: t_vendor_keu_modal_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_modal ALTER COLUMN t_vendor_keu_modal_id SET DEFAULT nextval('p_vendor_keu_modal_modal_id_seq'::regclass);


--
-- TOC entry 2163 (class 2604 OID 25597)
-- Name: t_vendor_keu_rekening_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_rekening ALTER COLUMN t_vendor_keu_rekening_id SET DEFAULT nextval('p_vendor_keu_rekening_rekening_id_seq'::regclass);


--
-- TOC entry 2224 (class 2604 OID 49887)
-- Name: t_vendor_komoditi_harga_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_komoditi_harga ALTER COLUMN t_vendor_komoditi_harga_id SET DEFAULT nextval('t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq'::regclass);


--
-- TOC entry 2166 (class 2604 OID 25598)
-- Name: t_vendor_legal_akta_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_akta ALTER COLUMN t_vendor_legal_akta_id SET DEFAULT nextval('p_vendor_legal_akta_akta_id_seq'::regclass);


--
-- TOC entry 2169 (class 2604 OID 25599)
-- Name: t_vendor_legal_domisili_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_domisili ALTER COLUMN t_vendor_legal_domisili_id SET DEFAULT nextval('p_vendor_legal_domisili_domisili_id_seq'::regclass);


--
-- TOC entry 2172 (class 2604 OID 25600)
-- Name: t_vendor_legal_ijinlain_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_ijinlain ALTER COLUMN t_vendor_legal_ijinlain_id SET DEFAULT nextval('p_vendor_legal_ijinlain_ijinlain_id_seq'::regclass);


--
-- TOC entry 2175 (class 2604 OID 25601)
-- Name: t_vendor_legal_npwp_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_npwp ALTER COLUMN t_vendor_legal_npwp_id SET DEFAULT nextval('p_vendor_legal_npwp_npwp_id_seq'::regclass);


--
-- TOC entry 2178 (class 2604 OID 25602)
-- Name: t_vendor_legal_siup_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_siup ALTER COLUMN t_vendor_legal_siup_id SET DEFAULT nextval('p_vendor_legal_siup_siup_id_seq'::regclass);


--
-- TOC entry 2203 (class 2604 OID 25603)
-- Name: t_vendor_sdm_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_sdm ALTER COLUMN t_vendor_sdm_id SET DEFAULT nextval('t_vendor_sdm_t_vendor_sdm_id_seq'::regclass);


--
-- TOC entry 2204 (class 2604 OID 25604)
-- Name: t_vendor_teknis_alat_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_alat ALTER COLUMN t_vendor_teknis_alat_id SET DEFAULT nextval('t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq'::regclass);


--
-- TOC entry 2141 (class 2604 OID 25605)
-- Name: t_vendor_teknis_komoditi_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_komoditi ALTER COLUMN t_vendor_teknis_komoditi_id SET DEFAULT nextval('p_vendo_teknis_komoditi_tp_id_seq'::regclass);


--
-- TOC entry 2181 (class 2604 OID 25606)
-- Name: t_vendor_teknis_pengalaman_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_pengalaman ALTER COLUMN t_vendor_teknis_pengalaman_id SET DEFAULT nextval('p_vendor_teknis_pengalaman_pengalaman_id_seq'::regclass);


--
-- TOC entry 2184 (class 2604 OID 25607)
-- Name: t_vendor_teknis_sertifikat_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_sertifikat ALTER COLUMN t_vendor_teknis_sertifikat_id SET DEFAULT nextval('p_vendor_teknis_sertifikat_sertifikat_id_seq'::regclass);


--
-- TOC entry 2187 (class 2604 OID 25608)
-- Name: t_vendor_teknis_tambahan_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_tambahan ALTER COLUMN t_vendor_teknis_tambahan_id SET DEFAULT nextval('p_vendor_teknis_tambahan_tambahan_id_seq'::regclass);


--
-- TOC entry 2213 (class 2604 OID 33486)
-- Name: t_verifikasi_vendor_id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_verifikasi_vendor ALTER COLUMN t_verifikasi_vendor_id SET DEFAULT nextval('t_verifikasi_vendor_t_verifikasi_vendor_id_seq'::regclass);


--
-- TOC entry 2210 (class 2604 OID 25609)
-- Name: id; Type: DEFAULT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- TOC entry 2529 (class 0 OID 25255)
-- Dependencies: 172
-- Data for Name: auth_assignment; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO auth_assignment VALUES ('frontend', '47', 1470722609);
INSERT INTO auth_assignment VALUES ('root', '1', 1470211646);
INSERT INTO auth_assignment VALUES ('root', '46', 1470719155);
INSERT INTO auth_assignment VALUES ('frontend', '59', 1472807374);
INSERT INTO auth_assignment VALUES ('frontend', '60', 1473049885);
INSERT INTO auth_assignment VALUES ('frontend', '61', 1474426817);
INSERT INTO auth_assignment VALUES ('frontend', '70', 1474863498);
INSERT INTO auth_assignment VALUES ('frontend', '71', 1474870688);
INSERT INTO auth_assignment VALUES ('frontend', '72', 1474871039);
INSERT INTO auth_assignment VALUES ('frontend', '73', 1474871217);
INSERT INTO auth_assignment VALUES ('frontend', '74', 1474871347);
INSERT INTO auth_assignment VALUES ('frontend', '75', 1474871422);
INSERT INTO auth_assignment VALUES ('frontend', '76', 1474871568);
INSERT INTO auth_assignment VALUES ('frontend', '77', 1474871677);
INSERT INTO auth_assignment VALUES ('frontend', '78', 1474871753);
INSERT INTO auth_assignment VALUES ('frontend', '79', 1474871802);
INSERT INTO auth_assignment VALUES ('frontend', '80', 1474871847);
INSERT INTO auth_assignment VALUES ('frontend', '81', 1474871891);
INSERT INTO auth_assignment VALUES ('frontend', '82', 1474871929);
INSERT INTO auth_assignment VALUES ('frontend', '83', 1474871974);
INSERT INTO auth_assignment VALUES ('frontend', '84', 1474872019);
INSERT INTO auth_assignment VALUES ('frontend', '85', 1474872054);
INSERT INTO auth_assignment VALUES ('frontend', '86', 1474872087);
INSERT INTO auth_assignment VALUES ('frontend', '87', 1474872169);
INSERT INTO auth_assignment VALUES ('frontend', '88', 1474872203);
INSERT INTO auth_assignment VALUES ('frontend', '89', 1474872233);
INSERT INTO auth_assignment VALUES ('frontend', '90', 1474872268);


--
-- TOC entry 2530 (class 0 OID 25258)
-- Dependencies: 173
-- Data for Name: auth_item; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO auth_item VALUES ('root', 1, 'Super Admin', NULL, NULL, 1470211581, 1470968479);
INSERT INTO auth_item VALUES ('/admin/*', 2, NULL, NULL, NULL, 1470212796, 1470212796);
INSERT INTO auth_item VALUES ('/gii/*', 2, NULL, NULL, NULL, 1470212800, 1470212800);
INSERT INTO auth_item VALUES ('/debug/*', 2, NULL, NULL, NULL, 1470212806, 1470212806);
INSERT INTO auth_item VALUES ('/admin/assignment/index', 2, NULL, NULL, NULL, 1470218693, 1470218693);
INSERT INTO auth_item VALUES ('/admin/menu/index', 2, NULL, NULL, NULL, 1470218735, 1470218735);
INSERT INTO auth_item VALUES ('/admin/permission/index', 2, NULL, NULL, NULL, 1470218740, 1470218740);
INSERT INTO auth_item VALUES ('/admin/role/index', 2, NULL, NULL, NULL, 1470218744, 1470218744);
INSERT INTO auth_item VALUES ('/admin/route/index', 2, NULL, NULL, NULL, 1470218752, 1470218752);
INSERT INTO auth_item VALUES ('/admin/rule/index', 2, NULL, NULL, NULL, 1470218757, 1470218757);
INSERT INTO auth_item VALUES ('/admin/user/index', 2, NULL, NULL, NULL, 1470218763, 1470218763);
INSERT INTO auth_item VALUES ('/gii/default/index', 2, NULL, NULL, NULL, 1470218768, 1470218768);
INSERT INTO auth_item VALUES ('/debug/default/index', 2, NULL, NULL, NULL, 1470218775, 1470218775);
INSERT INTO auth_item VALUES ('/unit/*', 2, NULL, NULL, NULL, 1470281115, 1470281115);
INSERT INTO auth_item VALUES ('/unit/index', 2, NULL, NULL, NULL, 1470281122, 1470281122);
INSERT INTO auth_item VALUES ('/userdata-internal/*', 2, NULL, NULL, NULL, 1470299083, 1470299083);
INSERT INTO auth_item VALUES ('/userdata-internal/index', 2, NULL, NULL, NULL, 1470299088, 1470299088);
INSERT INTO auth_item VALUES ('backend', 1, 'Backend Role', NULL, NULL, 1470718495, 1470718495);
INSERT INTO auth_item VALUES ('dataOwner', 2, 'Data Owner Permission', NULL, NULL, 1470718744, 1470718744);
INSERT INTO auth_item VALUES ('frontend', 1, 'Frontend Role', NULL, NULL, 1470722347, 1470722347);
INSERT INTO auth_item VALUES ('/admin/assignment/view', 2, NULL, NULL, NULL, 1470968154, 1470968154);
INSERT INTO auth_item VALUES ('/admin/assignment/assign', 2, NULL, NULL, NULL, 1470968154, 1470968154);
INSERT INTO auth_item VALUES ('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1470968154, 1470968154);
INSERT INTO auth_item VALUES ('/admin/assignment/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/default/index', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/default/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/menu/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/menu/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/menu/update', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/menu/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/menu/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/update', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/assign', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/remove', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/permission/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/update', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/assign', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/remove', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/role/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/route/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/route/assign', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/route/remove', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/route/refresh', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/route/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/rule/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/rule/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/rule/update', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/rule/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/rule/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/login', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/logout', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/signup', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/reset-password', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/change-password', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/activate', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/admin/user/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/gii/default/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/gii/default/preview', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/gii/default/diff', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/gii/default/action', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/gii/default/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/debug/default/db-explain', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/debug/default/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/debug/default/toolbar', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/debug/default/download-mail', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/debug/default/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/site/error', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/site/index', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/site/login', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/site/logout', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/site/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/unit/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/unit/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/unit/update', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/unit/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/userdata-internal/view', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/userdata-internal/create', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/userdata-internal/update', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/userdata-internal/delete', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/userdata-internal/assign', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/userdata-internal/remove', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('/*', 2, NULL, NULL, NULL, 1470968155, 1470968155);
INSERT INTO auth_item VALUES ('rbac', 2, 'RBAC Permission', NULL, NULL, 1470718598, 1470968222);
INSERT INTO auth_item VALUES ('dashboard', 2, 'Dashboard Permission', NULL, NULL, 1470968282, 1470968282);
INSERT INTO auth_item VALUES ('gii', 2, 'Gii Permission', NULL, NULL, 1470968353, 1470968353);
INSERT INTO auth_item VALUES ('debug', 2, 'Debug Permission', NULL, NULL, 1470968369, 1470968369);
INSERT INTO auth_item VALUES ('/master-category/index', 2, NULL, NULL, NULL, 1472618390, 1472618390);
INSERT INTO auth_item VALUES ('/master-category/view', 2, NULL, NULL, NULL, 1472618390, 1472618390);
INSERT INTO auth_item VALUES ('/master-category/create', 2, NULL, NULL, NULL, 1472618390, 1472618390);
INSERT INTO auth_item VALUES ('/master-category/update', 2, NULL, NULL, NULL, 1472618390, 1472618390);
INSERT INTO auth_item VALUES ('/master-category/delete', 2, NULL, NULL, NULL, 1472618390, 1472618390);
INSERT INTO auth_item VALUES ('/master-category/*', 2, NULL, NULL, NULL, 1472618390, 1472618390);
INSERT INTO auth_item VALUES ('/master-country/index', 2, NULL, NULL, NULL, 1472625882, 1472625882);
INSERT INTO auth_item VALUES ('/master-country/view', 2, NULL, NULL, NULL, 1472625882, 1472625882);
INSERT INTO auth_item VALUES ('/master-country/create', 2, NULL, NULL, NULL, 1472625882, 1472625882);
INSERT INTO auth_item VALUES ('/master-country/update', 2, NULL, NULL, NULL, 1472625882, 1472625882);
INSERT INTO auth_item VALUES ('/master-country/delete', 2, NULL, NULL, NULL, 1472625882, 1472625882);
INSERT INTO auth_item VALUES ('/master-country/*', 2, NULL, NULL, NULL, 1472625882, 1472625882);
INSERT INTO auth_item VALUES ('/master-region/index', 2, NULL, NULL, NULL, 1472626684, 1472626684);
INSERT INTO auth_item VALUES ('/master-region/view', 2, NULL, NULL, NULL, 1472626684, 1472626684);
INSERT INTO auth_item VALUES ('/master-region/create', 2, NULL, NULL, NULL, 1472626684, 1472626684);
INSERT INTO auth_item VALUES ('/master-region/update', 2, NULL, NULL, NULL, 1472626684, 1472626684);
INSERT INTO auth_item VALUES ('/master-region/delete', 2, NULL, NULL, NULL, 1472626684, 1472626684);
INSERT INTO auth_item VALUES ('/master-region/*', 2, NULL, NULL, NULL, 1472626684, 1472626684);
INSERT INTO auth_item VALUES ('/master-city/index', 2, NULL, NULL, NULL, 1472638688, 1472638688);
INSERT INTO auth_item VALUES ('/master-city/view', 2, NULL, NULL, NULL, 1472638688, 1472638688);
INSERT INTO auth_item VALUES ('/master-city/create', 2, NULL, NULL, NULL, 1472638688, 1472638688);
INSERT INTO auth_item VALUES ('/master-city/update', 2, NULL, NULL, NULL, 1472638688, 1472638688);
INSERT INTO auth_item VALUES ('/master-city/delete', 2, NULL, NULL, NULL, 1472638688, 1472638688);
INSERT INTO auth_item VALUES ('/master-city/*', 2, NULL, NULL, NULL, 1472638688, 1472638688);
INSERT INTO auth_item VALUES ('/master-currency/index', 2, NULL, NULL, NULL, 1472694108, 1472694108);
INSERT INTO auth_item VALUES ('/master-currency/view', 2, NULL, NULL, NULL, 1472694108, 1472694108);
INSERT INTO auth_item VALUES ('/master-currency/create', 2, NULL, NULL, NULL, 1472694108, 1472694108);
INSERT INTO auth_item VALUES ('/master-currency/update', 2, NULL, NULL, NULL, 1472694108, 1472694108);
INSERT INTO auth_item VALUES ('/master-currency/delete', 2, NULL, NULL, NULL, 1472694108, 1472694108);
INSERT INTO auth_item VALUES ('/master-currency/*', 2, NULL, NULL, NULL, 1472694108, 1472694108);
INSERT INTO auth_item VALUES ('dataSystem', 2, 'Master Data System', NULL, NULL, 1472617975, 1472694249);
INSERT INTO auth_item VALUES ('/master-comodity/index', 2, NULL, NULL, NULL, 1472694947, 1472694947);
INSERT INTO auth_item VALUES ('/master-comodity/view', 2, NULL, NULL, NULL, 1472694947, 1472694947);
INSERT INTO auth_item VALUES ('/master-comodity/create', 2, NULL, NULL, NULL, 1472694947, 1472694947);
INSERT INTO auth_item VALUES ('/master-comodity/update', 2, NULL, NULL, NULL, 1472694947, 1472694947);
INSERT INTO auth_item VALUES ('/master-comodity/delete', 2, NULL, NULL, NULL, 1472694947, 1472694947);
INSERT INTO auth_item VALUES ('/master-comodity/*', 2, NULL, NULL, NULL, 1472694947, 1472694947);
INSERT INTO auth_item VALUES ('/master-jenis-alat/index', 2, NULL, NULL, NULL, 1472696205, 1472696205);
INSERT INTO auth_item VALUES ('/master-jenis-alat/view', 2, NULL, NULL, NULL, 1472696205, 1472696205);
INSERT INTO auth_item VALUES ('/master-jenis-alat/create', 2, NULL, NULL, NULL, 1472696205, 1472696205);
INSERT INTO auth_item VALUES ('/master-jenis-alat/update', 2, NULL, NULL, NULL, 1472696205, 1472696205);
INSERT INTO auth_item VALUES ('/master-jenis-alat/delete', 2, NULL, NULL, NULL, 1472696205, 1472696205);
INSERT INTO auth_item VALUES ('/master-jenis-alat/*', 2, NULL, NULL, NULL, 1472696205, 1472696205);
INSERT INTO auth_item VALUES ('/master-pemasok/index', 2, NULL, NULL, NULL, 1472696705, 1472696705);
INSERT INTO auth_item VALUES ('/master-pemasok/view', 2, NULL, NULL, NULL, 1472696705, 1472696705);
INSERT INTO auth_item VALUES ('/master-pemasok/create', 2, NULL, NULL, NULL, 1472696705, 1472696705);
INSERT INTO auth_item VALUES ('/master-pemasok/update', 2, NULL, NULL, NULL, 1472696705, 1472696705);
INSERT INTO auth_item VALUES ('/master-pemasok/delete', 2, NULL, NULL, NULL, 1472696705, 1472696705);
INSERT INTO auth_item VALUES ('/master-pemasok/*', 2, NULL, NULL, NULL, 1472696705, 1472696705);
INSERT INTO auth_item VALUES ('/undangan/index', 2, NULL, NULL, NULL, 1472698139, 1472698139);
INSERT INTO auth_item VALUES ('/undangan/*', 2, NULL, NULL, NULL, 1472698139, 1472698139);
INSERT INTO auth_item VALUES ('undangan', 2, 'Permission Undangan', NULL, NULL, 1472698231, 1472698231);
INSERT INTO auth_item VALUES ('/undangan/view', 2, NULL, NULL, NULL, 1472710018, 1472710018);
INSERT INTO auth_item VALUES ('/undangan/create', 2, NULL, NULL, NULL, 1472710018, 1472710018);
INSERT INTO auth_item VALUES ('/undangan/update', 2, NULL, NULL, NULL, 1472710018, 1472710018);
INSERT INTO auth_item VALUES ('/undangan/delete', 2, NULL, NULL, NULL, 1472710018, 1472710018);
INSERT INTO auth_item VALUES ('/verifikasi-vendor/index', 2, NULL, NULL, NULL, 1472786735, 1472786735);
INSERT INTO auth_item VALUES ('/verifikasi-vendor/view', 2, NULL, NULL, NULL, 1472786735, 1472786735);
INSERT INTO auth_item VALUES ('/verifikasi-vendor/create', 2, NULL, NULL, NULL, 1472786735, 1472786735);
INSERT INTO auth_item VALUES ('/verifikasi-vendor/update', 2, NULL, NULL, NULL, 1472786735, 1472786735);
INSERT INTO auth_item VALUES ('/verifikasi-vendor/delete', 2, NULL, NULL, NULL, 1472786735, 1472786735);
INSERT INTO auth_item VALUES ('/verifikasi-vendor/*', 2, NULL, NULL, NULL, 1472786735, 1472786735);
INSERT INTO auth_item VALUES ('verifikasi', 2, 'Permission Verifikasi Vendor', NULL, NULL, 1472786988, 1472786988);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/index', 2, NULL, NULL, NULL, 1473761004, 1473761004);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/view', 2, NULL, NULL, NULL, 1473761004, 1473761004);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/create', 2, NULL, NULL, NULL, 1473761004, 1473761004);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/update', 2, NULL, NULL, NULL, 1473761004, 1473761004);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/delete', 2, NULL, NULL, NULL, 1473761004, 1473761004);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/*', 2, NULL, NULL, NULL, 1473761004, 1473761004);
INSERT INTO auth_item VALUES ('evaluasi', 2, 'Permission Evaluasi Vendor', NULL, NULL, 1473761215, 1473761215);
INSERT INTO auth_item VALUES ('/drm/index', 2, NULL, NULL, NULL, 1473995023, 1473995023);
INSERT INTO auth_item VALUES ('/drm/view', 2, NULL, NULL, NULL, 1473995023, 1473995023);
INSERT INTO auth_item VALUES ('/drm/*', 2, NULL, NULL, NULL, 1473995023, 1473995023);
INSERT INTO auth_item VALUES ('/evaluasi-vendor/komoditi-lists', 2, NULL, NULL, NULL, 1473995023, 1473995023);
INSERT INTO auth_item VALUES ('drm', 2, 'DRM Permission', NULL, NULL, 1473995765, 1473995765);
INSERT INTO auth_item VALUES ('/workflow/*', 2, NULL, NULL, NULL, 1474599744, 1474599744);
INSERT INTO auth_item VALUES ('workflow', 2, 'Workflow Permission', NULL, NULL, 1474599779, 1474599779);
INSERT INTO auth_item VALUES ('/workflow/default/index', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/view', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/create', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/update', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/initial', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/sort', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/delete', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/default/*', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/status/create', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/status/update', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/status/delete', 2, NULL, NULL, NULL, 1474601283, 1474601283);
INSERT INTO auth_item VALUES ('/workflow/status/*', 2, NULL, NULL, NULL, 1474601283, 1474601283);


--
-- TOC entry 2531 (class 0 OID 25264)
-- Dependencies: 174
-- Data for Name: auth_item_child; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO auth_item_child VALUES ('rbac', '/admin/*');
INSERT INTO auth_item_child VALUES ('dashboard', '/site/*');
INSERT INTO auth_item_child VALUES ('gii', '/gii/*');
INSERT INTO auth_item_child VALUES ('debug', '/debug/*');
INSERT INTO auth_item_child VALUES ('root', 'backend');
INSERT INTO auth_item_child VALUES ('root', 'dataOwner');
INSERT INTO auth_item_child VALUES ('root', 'rbac');
INSERT INTO auth_item_child VALUES ('root', 'dashboard');
INSERT INTO auth_item_child VALUES ('root', 'gii');
INSERT INTO auth_item_child VALUES ('root', 'debug');
INSERT INTO auth_item_child VALUES ('dataOwner', '/unit/*');
INSERT INTO auth_item_child VALUES ('dataOwner', '/userdata-internal/*');
INSERT INTO auth_item_child VALUES ('root', 'dataSystem');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-category/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-country/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-region/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-city/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-currency/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-comodity/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-jenis-alat/*');
INSERT INTO auth_item_child VALUES ('dataSystem', '/master-pemasok/*');
INSERT INTO auth_item_child VALUES ('undangan', '/undangan/*');
INSERT INTO auth_item_child VALUES ('root', 'undangan');
INSERT INTO auth_item_child VALUES ('verifikasi', '/verifikasi-vendor/*');
INSERT INTO auth_item_child VALUES ('root', 'verifikasi');
INSERT INTO auth_item_child VALUES ('evaluasi', '/evaluasi-vendor/*');
INSERT INTO auth_item_child VALUES ('root', 'evaluasi');
INSERT INTO auth_item_child VALUES ('drm', '/drm/*');
INSERT INTO auth_item_child VALUES ('root', 'drm');
INSERT INTO auth_item_child VALUES ('workflow', '/workflow/*');
INSERT INTO auth_item_child VALUES ('root', 'workflow');


--
-- TOC entry 2532 (class 0 OID 25267)
-- Dependencies: 175
-- Data for Name: auth_rule; Type: TABLE DATA; Schema: eproc; Owner: eproc
--



--
-- TOC entry 2533 (class 0 OID 25273)
-- Dependencies: 176
-- Data for Name: menu; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO menu VALUES (3, 'Gii', NULL, '/gii/default/index', 1, NULL, 'fa fa-file-code-o');
INSERT INTO menu VALUES (5, 'RBAC', NULL, NULL, 3, NULL, 'fa fa-share');
INSERT INTO menu VALUES (6, 'Route', 5, '/admin/route/index', 1, NULL, 'fa fa-link');
INSERT INTO menu VALUES (10, 'Role', 5, '/admin/role/index', 5, NULL, 'fa fa-users');
INSERT INTO menu VALUES (8, 'Menu', 5, '/admin/menu/index', 2, NULL, 'fa fa-bars');
INSERT INTO menu VALUES (7, 'Permission', 5, '/admin/permission/index', 4, NULL, 'fa fa-check-square-o');
INSERT INTO menu VALUES (9, 'Rule', 5, '/admin/rule/index', 3, NULL, 'fa fa-th-large');
INSERT INTO menu VALUES (14, 'Unit Kerja / Unit Bisnis', 13, '/unit/index', 1, NULL, 'fa fa-university');
INSERT INTO menu VALUES (13, 'Master Data Internal', NULL, NULL, 4, NULL, 'fa fa-share');
INSERT INTO menu VALUES (15, 'User', 13, '/userdata-internal/index', 2, NULL, 'fa fa-user');
INSERT INTO menu VALUES (4, 'Debug', NULL, '/debug/default/index', 2, NULL, 'fa fa-bug');
INSERT INTO menu VALUES (16, 'Dashboard', NULL, '/site/index', 0, NULL, 'fa fa-dashboard');
INSERT INTO menu VALUES (18, 'Tipe Perusahaan', 17, '/master-category/index', 1, NULL, 'fa fa-bank');
INSERT INTO menu VALUES (19, 'Negara', 17, '/master-country/index', 2, NULL, 'fa fa-flag');
INSERT INTO menu VALUES (20, 'Provinsi', 17, '/master-region/index', 3, NULL, 'fa  fa-flag-checkered');
INSERT INTO menu VALUES (21, 'Kota', 17, '/master-city/index', 4, NULL, 'fa fa-home');
INSERT INTO menu VALUES (17, 'Master Data System', NULL, NULL, 6, NULL, 'fa fa-share');
INSERT INTO menu VALUES (22, 'Mata Uang', 17, '/master-currency/index', 5, NULL, 'fa fa-money');
INSERT INTO menu VALUES (23, 'Komoditi', 17, '/master-comodity/index', 6, NULL, 'fa fa-briefcase');
INSERT INTO menu VALUES (24, 'Jenis Alat', 17, '/master-jenis-alat/index', 7, NULL, 'fa fa-wrench');
INSERT INTO menu VALUES (25, 'Tipe Pemasok', 17, '/master-pemasok/index', 8, NULL, 'fa fa-suitcase');
INSERT INTO menu VALUES (27, 'Vendor Management', NULL, NULL, 7, NULL, 'fa fa-share');
INSERT INTO menu VALUES (26, 'Undangan', 27, '/undangan/index', 1, NULL, 'fa fa-envelope');
INSERT INTO menu VALUES (28, 'Verifikasi Vendor', 27, '/verifikasi-vendor/index', 2, NULL, 'fa fa-calendar-check-o ');
INSERT INTO menu VALUES (29, 'Evaluasi Vendor', 27, '/evaluasi-vendor/index', 3, NULL, 'fa fa-list-alt');
INSERT INTO menu VALUES (30, 'DRM', 27, '/drm/index', 4, NULL, 'fa fa-archive');
INSERT INTO menu VALUES (31, 'Workflow', NULL, '/workflow/default/index', 1, NULL, 'fa fa-random');


--
-- TOC entry 2654 (class 0 OID 0)
-- Dependencies: 177
-- Name: menu_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('menu_id_seq', 31, true);


--
-- TOC entry 2535 (class 0 OID 25281)
-- Dependencies: 178
-- Data for Name: migration; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO migration VALUES ('m130524_201442_init', 1470196031);
INSERT INTO migration VALUES ('m140602_111327_create_menu_table', 1470196878);
INSERT INTO migration VALUES ('m160312_050000_create_user', 1470196878);
INSERT INTO migration VALUES ('m140506_102106_rbac_init', 1470196970);
INSERT INTO migration VALUES ('m160815_081611_sw_status', 1474599600);
INSERT INTO migration VALUES ('m160815_081612_sw_transition', 1474599600);
INSERT INTO migration VALUES ('m160815_081613_sw_workflow', 1474599600);
INSERT INTO migration VALUES ('m160815_223711_sw_metadata', 1474599600);
INSERT INTO migration VALUES ('m160815_223712_relations', 1474599600);


--
-- TOC entry 2655 (class 0 OID 0)
-- Dependencies: 180
-- Name: p_company_categories_cc_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_company_categories_cc_id_seq', 3, true);


--
-- TOC entry 2538 (class 0 OID 25291)
-- Dependencies: 181
-- Data for Name: p_master_category; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_category VALUES (2, 'Distributor', '2016-09-01 04:37:21.4312', 46, '2016-09-05 07:51:03', 46);
INSERT INTO p_master_category VALUES (3, 'Service', '2016-09-05 07:51:17.212999', 46, '2016-09-05 07:51:17.212999', 46);
INSERT INTO p_master_category VALUES (4, 'General Contractors', '2016-09-05 07:51:32.200765', 46, '2016-09-05 07:51:32.200765', 46);
INSERT INTO p_master_category VALUES (5, 'Konsultan', '2016-09-26 01:49:11.301474', 46, '2016-09-26 01:49:11.301474', 46);
INSERT INTO p_master_category VALUES (6, 'Akunting / Audit / Layanan Pajak', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (7, 'Amal / Layanan Sosial / Organsiasi Nirlaba', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (8, 'Arsitektur / Pembangunan / Konstruksi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (9, 'Asuransi / Dana Pensiun', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (10, 'Atletik / Olahraga', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (11, 'Desain Interior / Desain Grafis', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (12, 'Elektronika / Peralatan Elektronik', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (13, 'Energi / Tenaga / Air / Minyak&Gas / Limbah', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (14, 'Grosir / Ritel', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (15, 'Hiburan / Rekreasi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (16, 'Hospitality / Katering', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (17, 'Hukum', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (18, 'Industri Mesin / Peralatan Otomatisasi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (19, 'Keamanan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (20, 'Keamanan / Kebakaran / Kontrol Akses Elektronik', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (21, 'Kelompok Industri Campuran', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (22, 'Kendaraan Bermotor', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (23, 'Kesehatan / Farmasi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (24, 'Kimia / Plastik / Kertas / Petrokimia', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (25, 'Konsultasi / Layanan Manajemen', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (26, 'Laboratorium', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (27, 'Lainnya', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (28, 'Layanan Bisnis Umum', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (29, 'Layanan Keuangan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (30, 'Layanan Sipil (Pemerintahan, Angkatan Bersenjata)', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (31, 'Logistik', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (32, 'Mainan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (33, 'Makanan dan Minuman / Katering', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (34, 'Manajemen Sumber Daya Manusia (HRD) / Konsultasi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (35, 'Manufakturing Umum', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (36, 'Media / Penerbitan / Percetakan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (37, 'Minyak', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (38, 'Pakaian / Pakaian Jadi / Tekstil', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (39, 'Pembudidayaan Pertanian / Perhutanan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (40, 'Pendidikan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (41, 'Penerus Muatan / Pengiriman / Pengapalan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (42, 'Pengemasan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (43, 'Pengembangan / Konsultasi Properti', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (44, 'Pengembangan Properti', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (45, 'Perawatan Kesehatan dan Kecantikan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (46, 'Perdagangan Umum dan Distribusi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (47, 'Perhiasan / Batu Permata / Jam tangan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (48, 'Periklanan / Hubungan Masyarakat / Layanan Pemasaran', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (49, 'Pertambangan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (50, 'Pertunjukan / Musik / Seni', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (51, 'Survey / Riset', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (52, 'Teknik - Bangunan, Sipil, Konstruksi / Survey Kuantitas', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (53, 'Teknik - Elektrikal / Elektronik / Mekanikal', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (54, 'Teknik - Lainnya', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (55, 'Teknologi Informatika (IT)', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (56, 'Telekomunikasi', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (57, 'Transportasi / Perhubungan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (58, 'Turisme / Agen Perjalanan', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);
INSERT INTO p_master_category VALUES (59, 'Utilitas Publik', '2016-09-26 09:57:37.716999', 46, '2016-09-26 09:57:37.716999', 46);


--
-- TOC entry 2539 (class 0 OID 25299)
-- Dependencies: 182
-- Data for Name: p_master_city; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_city VALUES (1, 2, 'Jaktim', 'Jakarta Timur', '2016-08-31 10:19:51.437095', 46, '2016-08-31 10:19:51.437095', 46);
INSERT INTO p_master_city VALUES (2, 4, '-', 'Aceh Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (3, 4, '-', 'Aceh Barat Daya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (4, 4, '-', 'Aceh Besar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (5, 4, '-', 'Aceh Jaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (6, 4, '-', 'Aceh Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (7, 4, '-', 'Aceh Singkil', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (8, 4, '-', 'Aceh Tamiang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (9, 4, '-', 'Aceh Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (10, 4, '-', 'Aceh Tenggara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (11, 4, '-', 'Aceh Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (12, 4, '-', 'Aceh Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (13, 6, '-', 'Agam', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (14, 21, '-', 'Alor', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (15, 33, '-', 'Ambon', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (16, 5, '-', 'Asahan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (17, 36, '-', 'Asmat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (18, 19, '-', 'Badung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (19, 24, '-', 'Balangan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (20, 25, '-', 'Balikpapan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (21, 4, '-', 'Banda Aceh', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (22, 11, '-', 'Bandar Lampung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (23, 14, '-', 'Bandung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (24, 14, '-', 'Bandung Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (25, 28, '-', 'Banggai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (26, 28, '-', 'Banggai Kepulauan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (27, 12, '-', 'Bangka', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (28, 12, '-', 'Bangka Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (29, 17, '-', 'Bangkalan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (30, 12, '-', 'Bangka Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (31, 12, '-', 'Bangka Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (32, 19, '-', 'Bangli', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (33, 14, '-', 'Banjar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (34, 24, '-', 'Banjar Baru', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (35, 24, '-', 'Banjarmasin', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (36, 15, '-', 'Banjarnegara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (37, 29, '-', 'Bantaeng', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (38, 16, '-', 'Bantul', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (39, 9, '-', 'Banyu Asin', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (40, 15, '-', 'Banyumas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (41, 17, '-', 'Banyuwangi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (42, 24, '-', 'Barito Kuala', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (43, 23, '-', 'Barito Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (44, 23, '-', 'Barito Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (45, 23, '-', 'Barito Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (46, 29, '-', 'Barru', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (47, 24, '-', 'Baru', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (48, 13, '-', 'B A T A M', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (49, 15, '-', 'Batang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (50, 8, '-', 'Batang Hari', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (51, 17, '-', 'Batu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (52, 5, '-', 'Batu Bara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (53, 30, '-', 'Baubau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (54, 14, '-', 'Bekasi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (55, 12, '-', 'Belitung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (56, 12, '-', 'Belitung Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (57, 21, '-', 'Belu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (58, 4, '-', 'Bener Meriah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (59, 7, '-', 'Bengkalis', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (60, 22, '-', 'Bengkayang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (61, 10, '-', 'Bengkulu Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (62, 10, '-', 'Bengkulu Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (63, 10, '-', 'Bengkulu Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (64, 25, '-', 'Berau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (65, 36, '-', 'Biak Numfor', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (66, 20, '-', 'Bima', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (67, 5, '-', 'Binjai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (68, 13, '-', 'Bintan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (69, 4, '-', 'Bireuen', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (70, 27, '-', 'Bitung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (71, 17, '-', 'Blitar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (72, 15, '-', 'Blora', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (73, 31, '-', 'Boalemo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (74, 14, '-', 'Bogor', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (75, 17, '-', 'Bojonegoro', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (76, 27, '-', 'Bolaang Mongondow', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (77, 27, '-', 'Bolaang Mongondow Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (78, 27, '-', 'Bolaang Mongondow Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (79, 27, '-', 'Bolaang Mongondow Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (80, 30, '-', 'Bombana', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (81, 17, '-', 'Bondowoso', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (82, 29, '-', 'Bone', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (83, 31, '-', 'Bone Bolango', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (84, 25, '-', 'Bontang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (85, 36, '-', 'Boven Digoel', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (86, 15, '-', 'Boyolali', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (87, 15, '-', 'Brebes', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (88, 6, '-', 'Bukittinggi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (89, 19, '-', 'Buleleng', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (90, 29, '-', 'Bulukumba', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (91, 26, '-', 'Bulungan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (92, 8, '-', 'Bungo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (93, 28, '-', 'Buol', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (94, 33, '-', 'Buru', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (95, 33, '-', 'Buru Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (96, 30, '-', 'Buton', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (97, 30, '-', 'Buton Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (98, 14, '-', 'Ciamis', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (99, 14, '-', 'Cianjur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (100, 15, '-', 'Cilacap', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (101, 18, '-', 'Cilegon', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (102, 14, '-', 'Cimahi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (103, 14, '-', 'Cirebon', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (104, 5, '-', 'Dairi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (105, 36, '-', 'Deiyai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (106, 5, '-', 'Deli Serdang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (107, 15, '-', 'Demak', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (108, 19, '-', 'Denpasar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (109, 14, '-', 'Depok', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (110, 6, '-', 'Dharmasraya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (111, 36, '-', 'Dogiyai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (112, 20, '-', 'Dompu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (113, 28, '-', 'Donggala', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (114, 7, '-', 'D U M A I', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (115, 9, '-', 'Empat Lawang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (116, 21, '-', 'Ende', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (117, 29, '-', 'Enrekang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (118, 35, '-', 'Fakfak', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (119, 21, '-', 'Flores Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (120, 14, '-', 'Garut', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (121, 4, '-', 'Gayo Lues', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (122, 19, '-', 'Gianyar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (123, 31, '-', 'Gorontalo Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (124, 29, '-', 'Gowa', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (125, 17, '-', 'Gresik', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (126, 15, '-', 'Grobogan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (127, 16, '-', 'Gunung Kidul', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (128, 23, '-', 'Gunung Mas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (129, 5, '-', 'Gunungsitoli', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (130, 34, '-', 'Halmahera Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (131, 34, '-', 'Halmahera Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (132, 34, '-', 'Halmahera Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (133, 34, '-', 'Halmahera Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (134, 34, '-', 'Halmahera Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (135, 24, '-', 'Hulu Sungai Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (136, 24, '-', 'Hulu Sungai Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (137, 24, '-', 'Hulu Sungai Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (138, 5, '-', 'Humbang Hasundutan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (139, 7, '-', 'Indragiri Hilir', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (140, 7, '-', 'Indragiri Hulu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (141, 14, '-', 'Indramayu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (142, 36, '-', 'Intan Jaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (143, 2, '-', 'Jakarta Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (144, 2, '-', 'Jakarta Pusat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (145, 2, '-', 'Jakarta Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (146, 2, '-', 'Jakarta Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (147, 36, '-', 'Jayapura', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (148, 36, '-', 'Jayawijaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (149, 17, '-', 'Jember', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (150, 19, '-', 'Jembrana', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (151, 29, '-', 'Jeneponto', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (152, 15, '-', 'Jepara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (153, 17, '-', 'Jombang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (154, 35, '-', 'Kaimana', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (155, 7, '-', 'Kampar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (156, 23, '-', 'Kapuas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (157, 22, '-', 'Kapuas Hulu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (158, 15, '-', 'Karanganyar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (159, 19, '-', 'Karang Asem', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (160, 14, '-', 'Karawang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (161, 13, '-', 'Karimun', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (162, 5, '-', 'Karo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (163, 23, '-', 'Katingan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (164, 10, '-', 'Kaur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (165, 22, '-', 'Kayong Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (166, 15, '-', 'Kebumen', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (167, 17, '-', 'Kediri', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (168, 36, '-', 'Keerom', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (169, 15, '-', 'Kendal', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (170, 30, '-', 'Kendari', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (171, 10, '-', 'Kepahiang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (172, 13, '-', 'Kepulauan Anambas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (173, 33, '-', 'Kepulauan Aru', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (174, 6, '-', 'Kepulauan Mentawai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (175, 7, '-', 'Kepulauan Meranti', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (176, 27, '-', 'Kepulauan Sangihe', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (177, 29, '-', 'Kepulauan Selayar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (178, 2, '-', 'Kepulauan Seribu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (179, 34, '-', 'Kepulauan Sula', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (180, 27, '-', 'Kepulauan Talaud', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (181, 36, '-', 'Kepulauan Yapen', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (182, 8, '-', 'Kerinci', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (183, 22, '-', 'Ketapang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (184, 15, '-', 'Klaten', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (185, 19, '-', 'Klungkung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (186, 30, '-', 'Kolaka', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (187, 30, '-', 'Kolaka Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (188, 30, '-', 'Konawe', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (189, 30, '-', 'Konawe Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (190, 30, '-', 'Konawe Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (191, 27, '-', 'Kotamobagu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (192, 23, '-', 'Kotawaringin Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (193, 23, '-', 'Kotawaringin Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (194, 7, '-', 'Kuantan Singingi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (195, 22, '-', 'Kubu Raya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (196, 15, '-', 'Kudus', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (197, 16, '-', 'Kulon Progo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (198, 14, '-', 'Kuningan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (199, 21, '-', 'Kupang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (200, 25, '-', 'Kutai Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (201, 25, '-', 'Kutai Kartanegara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (202, 25, '-', 'Kutai Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (203, 5, '-', 'Labuhan Batu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (204, 5, '-', 'Labuhan Batu Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (205, 5, '-', 'Labuhan Batu Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (206, 9, '-', 'Lahat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (207, 23, '-', 'Lamandau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (208, 17, '-', 'Lamongan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (209, 11, '-', 'Lampung Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (210, 11, '-', 'Lampung Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (211, 11, '-', 'Lampung Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (212, 11, '-', 'Lampung Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (213, 11, '-', 'Lampung Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (214, 22, '-', 'Landak', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (215, 5, '-', 'Langkat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (216, 4, '-', 'Langsa', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (217, 36, '-', 'Lanny Jaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (218, 18, '-', 'Lebak', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (219, 10, '-', 'Lebong', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (220, 21, '-', 'Lembata', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (221, 4, '-', 'Lhokseumawe', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (222, 6, '-', 'Lima Puluh Kota', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (223, 13, '-', 'Lingga', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (224, 20, '-', 'Lombok Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (225, 20, '-', 'Lombok Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (226, 20, '-', 'Lombok Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (227, 20, '-', 'Lombok Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (228, 9, '-', 'Lubuklinggau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (229, 17, '-', 'Lumajang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (230, 29, '-', 'Luwu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (231, 29, '-', 'Luwu Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (232, 29, '-', 'Luwu Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (233, 17, '-', 'Madiun', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (234, 15, '-', 'Magelang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (235, 17, '-', 'Magetan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (236, 14, '-', 'Majalengka', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (237, 32, '-', 'Majene', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (238, 29, '-', 'Makassar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (239, 17, '-', 'Malang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (240, 26, '-', 'Malinau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (241, 33, '-', 'Maluku Barat Daya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (242, 33, '-', 'Maluku Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (243, 33, '-', 'Maluku Tenggara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (244, 33, '-', 'Maluku Tenggara Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (245, 32, '-', 'Mamasa', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (246, 36, '-', 'Mamberamo Raya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (247, 36, '-', 'Mamberamo Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (248, 32, '-', 'Mamuju', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (249, 32, '-', 'Mamuju Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (250, 27, '-', 'Manado', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (251, 5, '-', 'Mandailing Natal', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (252, 21, '-', 'Manggarai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (253, 21, '-', 'Manggarai Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (254, 21, '-', 'Manggarai Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (255, 35, '-', 'Manokwari', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (256, 36, '-', 'Mappi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (257, 29, '-', 'Maros', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (258, 20, '-', 'Mataram', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (259, 35, '-', 'Maybrat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (260, 5, '-', 'Medan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (261, 22, '-', 'Melawi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (262, 8, '-', 'Merangin', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (263, 36, '-', 'Merauke', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (264, 11, '-', 'Mesuji', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (265, 11, '-', 'Metro', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (266, 36, '-', 'Mimika', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (267, 27, '-', 'Minahasa', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (268, 27, '-', 'Minahasa Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (269, 27, '-', 'Minahasa Tenggara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (270, 27, '-', 'Minahasa Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (271, 17, '-', 'Mojokerto', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (272, 28, '-', 'Morowali', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (273, 9, '-', 'Muara Enim', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (274, 8, '-', 'Muaro Jambi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (275, 10, '-', 'Mukomuko', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (276, 30, '-', 'Muna', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (277, 23, '-', 'Murung Raya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (278, 9, '-', 'Musi Banyuasin', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (279, 9, '-', 'Musi Rawas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (280, 36, '-', 'Nabire', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (281, 4, '-', 'Nagan Raya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (282, 21, '-', 'Nagekeo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (283, 13, '-', 'Natuna', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (284, 36, '-', 'Nduga', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (285, 21, '-', 'Ngada', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (286, 17, '-', 'Nganjuk', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (287, 17, '-', 'Ngawi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (288, 5, '-', 'Nias', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (289, 5, '-', 'Nias Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (290, 5, '-', 'Nias Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (291, 5, '-', 'Nias Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (292, 26, '-', 'Nunukan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (293, 9, '-', 'Ogan Ilir', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (294, 9, '-', 'Ogan Komering Ilir', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (295, 9, '-', 'Ogan Komering Ulu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (296, 9, '-', 'Ogan Komering Ulu Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (297, 9, '-', 'Ogan Komering Ulu Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (298, 17, '-', 'Pacitan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (299, 6, '-', 'Padang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (300, 5, '-', 'Padang Lawas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (301, 5, '-', 'Padang Lawas Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (302, 6, '-', 'Padang Panjang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (303, 6, '-', 'Padang Pariaman', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (304, 5, '-', 'Padangsidimpuan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (305, 9, '-', 'Pagar Alam', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (306, 5, '-', 'Pakpak Bharat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (307, 23, '-', 'Palangka Raya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (308, 9, '-', 'Palembang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (309, 29, '-', 'Palopo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (310, 28, '-', 'Palu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (311, 17, '-', 'Pamekasan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (312, 18, '-', 'Pandeglang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (313, 14, '-', 'Pangandaran', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (314, 29, '-', 'Pangkajene Dan Kepulauan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (315, 12, '-', 'Pangkal Pinang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (316, 36, '-', 'Paniai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (317, 29, '-', 'Parepare', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (318, 6, '-', 'Pariaman', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (319, 28, '-', 'Parigi Moutong', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (320, 6, '-', 'Pasaman', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (321, 6, '-', 'Pasaman Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (322, 25, '-', 'Paser', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (323, 17, '-', 'Pasuruan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (324, 15, '-', 'Pati', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (325, 6, '-', 'Payakumbuh', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (326, 36, '-', 'Pegunungan Bintang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (327, 15, '-', 'Pekalongan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (328, 7, '-', 'Pekanbaru', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (329, 7, '-', 'Pelalawan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (330, 15, '-', 'Pemalang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (331, 5, '-', 'Pematang Siantar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (332, 25, '-', 'Penajam Paser Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (333, 11, '-', 'Pesawaran', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (334, 11, '-', 'Pesisir Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (335, 6, '-', 'Pesisir Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (336, 4, '-', 'Pidie', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (337, 4, '-', 'Pidie Jaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (338, 29, '-', 'Pinrang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (339, 31, '-', 'Pohuwato', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (340, 32, '-', 'Polewali Mandar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (341, 17, '-', 'Ponorogo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (342, 22, '-', 'Pontianak', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (343, 28, '-', 'Poso', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (344, 9, '-', 'Prabumulih', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (345, 11, '-', 'Pringsewu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (346, 17, '-', 'Probolinggo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (347, 23, '-', 'Pulang Pisau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (348, 34, '-', 'Pulau Morotai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (349, 36, '-', 'Puncak', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (350, 36, '-', 'Puncak Jaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (351, 15, '-', 'Purbalingga', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (352, 14, '-', 'Purwakarta', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (353, 15, '-', 'Purworejo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (354, 35, '-', 'Raja Ampat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (355, 10, '-', 'Rejang Lebong', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (356, 15, '-', 'Rembang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (357, 7, '-', 'Rokan Hilir', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (358, 7, '-', 'Rokan Hulu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (359, 21, '-', 'Rote Ndao', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (360, 4, '-', 'Sabang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (361, 21, '-', 'Sabu Raijua', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (362, 15, '-', 'Salatiga', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (363, 25, '-', 'Samarinda', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (364, 22, '-', 'Sambas', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (365, 5, '-', 'Samosir', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (366, 17, '-', 'Sampang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (367, 22, '-', 'Sanggau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (368, 36, '-', 'Sarmi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (369, 8, '-', 'Sarolangun', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (370, 6, '-', 'Sawah Lunto', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (371, 22, '-', 'Sekadau', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (372, 10, '-', 'Seluma', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (373, 15, '-', 'Semarang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (374, 33, '-', 'Seram Bagian Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (375, 33, '-', 'Seram Bagian Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (376, 18, '-', 'Serang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (377, 5, '-', 'Serdang Bedagai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (378, 23, '-', 'Seruyan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (379, 7, '-', 'S I A K', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (380, 27, '-', 'Siau Tagulandang Biaro', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (381, 5, '-', 'Sibolga', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (382, 29, '-', 'Sidenreng Rappang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (383, 17, '-', 'Sidoarjo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (384, 28, '-', 'Sigi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (385, 6, '-', 'Sijunjung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (386, 21, '-', 'Sikka', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (387, 5, '-', 'Simalungun', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (388, 4, '-', 'Simeulue', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (389, 22, '-', 'Singkawang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (390, 29, '-', 'Sinjai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (391, 22, '-', 'Sintang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (392, 17, '-', 'Situbondo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (393, 16, '-', 'Sleman', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (394, 6, '-', 'Solok', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (395, 6, '-', 'Solok Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (396, 29, '-', 'Soppeng', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (397, 35, '-', 'Sorong', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (398, 35, '-', 'Sorong Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (399, 15, '-', 'Sragen', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (400, 14, '-', 'Subang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (401, 4, '-', 'Subulussalam', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (402, 14, '-', 'Sukabumi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (403, 23, '-', 'Sukamara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (404, 15, '-', 'Sukoharjo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (405, 21, '-', 'Sumba Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (406, 21, '-', 'Sumba Barat Daya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (407, 21, '-', 'Sumba Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (408, 21, '-', 'Sumba Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (409, 20, '-', 'Sumbawa', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (410, 20, '-', 'Sumbawa Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (411, 14, '-', 'Sumedang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (412, 17, '-', 'Sumenep', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (413, 8, '-', 'Sungai Penuh', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (414, 36, '-', 'Supiori', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (415, 17, '-', 'Surabaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (416, 15, '-', 'Surakarta', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (417, 24, '-', 'Tabalong', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (418, 19, '-', 'Tabanan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (419, 29, '-', 'Takalar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (420, 35, '-', 'Tambrauw', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (421, 24, '-', 'Tanah Bumbu', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (422, 6, '-', 'Tanah Datar', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (423, 24, '-', 'Tanah Laut', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (424, 26, '-', 'Tana Tidung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (425, 29, '-', 'Tana Toraja', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (426, 18, '-', 'Tangerang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (427, 18, '-', 'Tangerang Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (428, 11, '-', 'Tanggamus', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (429, 5, '-', 'Tanjung Balai', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (430, 8, '-', 'Tanjung Jabung Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (431, 8, '-', 'Tanjung Jabung Timur', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (432, 13, '-', 'Tanjung Pinang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (433, 5, '-', 'Tapanuli Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (434, 5, '-', 'Tapanuli Tengah', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (435, 5, '-', 'Tapanuli Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (436, 24, '-', 'Tapin', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (437, 26, '-', 'Tarakan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (438, 14, '-', 'Tasikmalaya', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (439, 5, '-', 'Tebing Tinggi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (440, 8, '-', 'Tebo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (441, 15, '-', 'Tegal', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (442, 35, '-', 'Teluk Bintuni', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (443, 35, '-', 'Teluk Wondama', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (444, 15, '-', 'Temanggung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (445, 34, '-', 'Ternate', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (446, 34, '-', 'Tidore Kepulauan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (447, 21, '-', 'Timor Tengah Selatan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (448, 21, '-', 'Timor Tengah Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (449, 5, '-', 'Toba Samosir', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (450, 28, '-', 'Tojo Una-una', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (451, 36, '-', 'Tolikara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (452, 28, '-', 'Toli-toli', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (453, 27, '-', 'Tomohon', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (454, 29, '-', 'Toraja Utara', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (455, 17, '-', 'Trenggalek', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (456, 33, '-', 'Tual', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (457, 17, '-', 'Tuban', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (458, 11, '-', 'Tulangbawang', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (459, 11, '-', 'Tulang Bawang Barat', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (460, 17, '-', 'Tulungagung', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (461, 29, '-', 'Wajo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (462, 30, '-', 'Wakatobi', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (463, 36, '-', 'Waropen', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (464, 11, '-', 'Way Kanan', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (465, 15, '-', 'Wonogiri', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (466, 15, '-', 'Wonosobo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (467, 36, '-', 'Yahukimo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (468, 36, '-', 'Yalimo', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);
INSERT INTO p_master_city VALUES (469, 16, '-', 'Yogyakarta', '2016-09-26 03:24:13.614656', 46, '2016-09-26 03:24:13.614656', 46);


--
-- TOC entry 2656 (class 0 OID 0)
-- Dependencies: 183
-- Name: p_master_city_city_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_city_city_id_seq', 469, true);


--
-- TOC entry 2541 (class 0 OID 25309)
-- Dependencies: 184
-- Data for Name: p_master_comodity; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_comodity VALUES (1, 'ATK', 'Alat Tulis Kantor', 1, '2016-09-01 02:11:34.429675', 46, '2016-09-01 02:11:34.429675', 46);
INSERT INTO p_master_comodity VALUES (3, 'PTK', 'Peralatan Kantor', 1, '2016-09-15 04:51:45.09574', 46, '2016-09-15 04:51:45.09574', 46);
INSERT INTO p_master_comodity VALUES (4, 'BCT', 'Barang Cetakan', 1, '2016-09-26 01:52:11.139101', 46, '2016-09-26 01:52:11.139101', 46);
INSERT INTO p_master_comodity VALUES (5, 'CTB', 'Percetakan Buku', 1, '2016-09-26 01:54:22.51633', 46, '2016-09-26 01:54:22.51633', 46);
INSERT INTO p_master_comodity VALUES (2, 'KKS', 'Konsultan Konstruksi', 2, '2016-09-08 05:31:15.287947', 46, '2016-09-26 02:13:48', 46);
INSERT INTO p_master_comodity VALUES (6, 'CSC', 'Consumables Computer', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (7, 'PTI', 'Komputer dan Peralatan Teknologi Informasi', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (8, 'KDK', 'Kendaraan Dinas Kantor', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (10, 'PME', 'Mekanikal & Electrical', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (11, 'BPR', 'Barang Promosi', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (12, 'PRT', 'Peralatan Rumah Tangga (Fix Assets)', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (13, 'PPG', 'Perlengkapan Pegawai', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (14, 'KRT', 'Keperluan Rumah Tangga (Consumable)', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (15, 'BRL', 'Barang Lainnya', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (16, 'TPJ', 'Tekstil dan Pakaian Jadi', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (17, 'UTG', 'Utilitas Gedung', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (18, 'KPA', 'Konsultan Promosi & Advertising', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (19, 'KMK', 'Konsultan Management Konstruksi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (20, 'KRK', 'Konsultan Perencana Konstruksi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (21, 'KAK', 'Konsultan Pengawas Konstruksi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (22, 'KTI', 'Konsultan Perencana Teknologi Informasi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (23, 'KBM', 'Konsultan Bisnis dan Manajemen', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (24, 'KHC', 'Konsultan Manajemen Sumber Daya Manusia', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (25, 'KPD', 'Konsultan Manajemen Pengadaan ', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (26, 'KHK', 'Konsultan Manajemen Hukum', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (27, 'KKP', 'Konsultan Manajemen Keuangan & Pajak', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (28, 'KM3', 'Konsultan Manajemen Manajemen Mutu', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (29, 'KMA', 'Konsultan Manajemen Appraisal', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (30, 'KKM', 'Konsultan Manajemen Komunikasi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (31, 'KMR', 'Konsultan Manajemen Riset', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (32, 'KAT', 'Konsultan Manajemen Aktuaria', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (33, 'KAP', 'Konsultan Kantor Akuntan Publik', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (34, 'KIV', 'Konsultan Investasi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (35, 'JKA', 'Jasa Konstruksi Arsitektural', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (36, 'JKS', 'Jasa Konstruksi Sipil', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (37, 'PKG', 'Penyelesaian Konstruksi Gedung', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (38, 'KKH', 'Konstruksi Khusus', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (39, 'KME', 'Jasa Konstruksi Mekanikal Elektrikal', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (40, 'JTS', 'Jasa Teknologi Informasi (Software)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (41, 'JDB', 'Jasa Kegiatan Data Base', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (42, 'PDT', 'Pengolahan Data', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (43, 'JTH', 'Jasa Teknologi Informasi (Hardware)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (44, 'JTN', 'Jasa Teknologi Informasi (Telecomunication & Network)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (45, 'JMM', 'Jasa Multimedia (ISP, Sisitem Komunikasi, Portal)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (46, 'JPA', 'Jasa Pembangunan Aplikasi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (47, 'MPP', 'Manajemen Properti', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (48, 'JPF', 'Jasa Pengelolaan Gedung (Pest Control & Fumigasi)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (49, 'JPC', 'Jasa Pengelolaan Gedung (Cleaning Service)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (50, 'JPB', 'Jasa Pengelolaan Gedung (Building Management)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (51, 'JPS', 'Jasa Pengelolaan Gedung (Security)', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (52, 'JPP', 'Jasa Pembelian Property', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (53, 'JAD', 'Jasa Promosi & Advertising', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (54, 'JTO', 'Jasa Tenaga Kerja Outsourcing', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (55, 'JTP', 'Jasa Transportasi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (56, 'SWM', 'Persewaan Mobil', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (57, 'KKB', 'Karoseri Kendaraan Bermotor', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (58, 'JRM', 'Jasa Pemeliharaan dan Reparasi Mobil ', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (59, 'KJK', 'Konsultan Jasa Keuangan', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (60, 'JSP', 'Jasa Studi dan Penelitian', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (61, 'JRS', 'Jasa Rumah Sakit', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (62, 'PJK', 'Pelayanan Pos dan Jasa Kurir', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (63, 'ASU', 'Asuransi', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (64, 'PRM', 'Perawatan dan Reparasi Mesin Kantor dan Komputer', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (65, 'PMK', 'Persewaan Mesin Kantor dan Komputer', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (66, 'JSL', 'Jasa Lainnya', 2, '2016-09-26 02:18:03.567099', 46, '2016-09-26 02:18:03.567099', 46);
INSERT INTO p_master_comodity VALUES (9, 'PKK', 'Peralatan Kesehatan & Keselamatan Kerja', 1, '2016-09-26 02:18:03.567099', 46, '2016-09-29 09:14:16', 46);


--
-- TOC entry 2657 (class 0 OID 0)
-- Dependencies: 185
-- Name: p_master_comodity_comodity_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_comodity_comodity_id_seq', 66, true);


--
-- TOC entry 2658 (class 0 OID 0)
-- Dependencies: 186
-- Name: p_master_company_categories_cc_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_company_categories_cc_id_seq', 59, true);


--
-- TOC entry 2544 (class 0 OID 25321)
-- Dependencies: 187
-- Data for Name: p_master_country; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_country VALUES (2, 'ID', 'Indonesia', '2016-08-31 06:53:15.51783', 46, '2016-08-31 06:53:15.51783', 46);
INSERT INTO p_master_country VALUES (3, 'US', 'United Stated of America', '2016-09-01 04:38:07.542923', 46, '2016-09-01 04:38:07.542923', 46);


--
-- TOC entry 2659 (class 0 OID 0)
-- Dependencies: 188
-- Name: p_master_country_country_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_country_country_id_seq', 3, true);


--
-- TOC entry 2660 (class 0 OID 0)
-- Dependencies: 190
-- Name: p_master_cp_cp_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_cp_cp_id_seq', 1, true);


--
-- TOC entry 2548 (class 0 OID 25341)
-- Dependencies: 191
-- Data for Name: p_master_currency; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_currency VALUES (1, 'IDR', 'Indonesian Rupiah', '2016-09-01 01:49:59.65295', 46, '2016-09-01 01:49:59.65295', 46);
INSERT INTO p_master_currency VALUES (2, 'USD', 'American Dollar', '2016-09-26 03:24:51.047167', 46, '2016-09-26 03:24:51.047167', 46);


--
-- TOC entry 2661 (class 0 OID 0)
-- Dependencies: 192
-- Name: p_master_currency_currency_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_currency_currency_id_seq', 2, true);


--
-- TOC entry 2550 (class 0 OID 25351)
-- Dependencies: 193
-- Data for Name: p_master_jenis_alat; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_jenis_alat VALUES (1, 'Permesinan', '2016-09-01 02:21:38.277663', 46, '2016-09-01 02:21:38.277663', 46);
INSERT INTO p_master_jenis_alat VALUES (2, 'Teknologi Informasi', '2016-09-01 02:21:50.024314', 46, '2016-09-01 02:21:50.024314', 46);
INSERT INTO p_master_jenis_alat VALUES (4, 'Laboratorium', '2016-09-26 03:25:48.16312', 46, '2016-09-26 03:25:55', 46);
INSERT INTO p_master_jenis_alat VALUES (3, 'Pergudangan', '2016-09-26 03:25:36.796653', 46, '2016-09-26 03:26:02', 46);
INSERT INTO p_master_jenis_alat VALUES (5, 'Kesehatan Lingkungan Hidup', '2016-09-26 03:26:24.630956', 46, '2016-09-26 03:26:24.630956', 46);
INSERT INTO p_master_jenis_alat VALUES (6, 'Pusat Layanan Pelanggan', '2016-09-26 03:26:36.748826', 46, '2016-09-26 03:26:36.748826', 46);
INSERT INTO p_master_jenis_alat VALUES (7, 'Transportasi', '2016-09-26 03:26:47.506574', 46, '2016-09-26 03:26:47.506574', 46);


--
-- TOC entry 2662 (class 0 OID 0)
-- Dependencies: 194
-- Name: p_master_jenis_alat_ja_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_jenis_alat_ja_id_seq', 7, true);


--
-- TOC entry 2552 (class 0 OID 25361)
-- Dependencies: 195
-- Data for Name: p_master_pemasok; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_pemasok VALUES (5, 'Manufacture', '2016-09-01 02:31:23.861709', 46, '2016-09-01 02:31:23.861709', 46);
INSERT INTO p_master_pemasok VALUES (4, 'Non Agent', '2016-09-01 02:31:06.296718', 46, '2016-09-01 02:31:39', 46);
INSERT INTO p_master_pemasok VALUES (3, 'Distributor', '2016-09-01 02:30:53.269309', 46, '2016-09-01 02:31:49', 46);
INSERT INTO p_master_pemasok VALUES (2, 'Sole Agent', '2016-09-01 02:30:38.349628', 46, '2016-09-01 02:32:38', 46);
INSERT INTO p_master_pemasok VALUES (1, 'Agent', '2016-09-01 02:30:24.554621', 46, '2016-09-01 02:32:48', 46);


--
-- TOC entry 2553 (class 0 OID 25369)
-- Dependencies: 196
-- Data for Name: p_master_region; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_region VALUES (2, 2, 'DKI', 'DKI Jakarta', '2016-08-31 07:22:08.874772', 46, '2016-08-31 07:22:08.874772', 46);
INSERT INTO p_master_region VALUES (4, 2, 'DIA', 'DI Aceh', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (5, 2, 'SUMUT', 'Sumatera Utara', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (6, 2, 'SUMBAR', 'Sumatera Barat', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (7, 2, 'RIAU', 'Riau', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (8, 2, 'JAMBI', 'Jambi', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (9, 2, 'SUMSEL', 'Sumatera Selatan', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (10, 2, 'BENGKULU', 'Bengkulu', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (11, 2, 'LAMPUNG', 'Lampung', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (12, 2, 'BABEL', 'Kepulauan Bangka Belitung', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (13, 2, 'KEPRI', 'Kepulauan Riau', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (14, 2, 'JABAR', 'Jawa Barat', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (15, 2, 'JATENG', 'Jawa Tengah', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (16, 2, 'DIY', 'Di Yogyakarta', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (17, 2, 'JATIM', 'Jawa Timur', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (18, 2, 'BANTEN', 'Banten', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (19, 2, 'BALI', 'Bali', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (20, 2, 'NTB', 'Nusa Tenggara Barat', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (21, 2, 'NTT', 'Nusa Tenggara Timur', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (22, 2, 'KALBAR', 'Kalimantan Barat', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (23, 2, 'KALTENG', 'Kalimantan Tengah', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (24, 2, 'KALSEL', 'Kalimantan Selatan', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (25, 2, 'KALTIM', 'Kalimantan Timur', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (26, 2, 'KALUT', 'Kalimantan Utara', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (27, 2, 'SULUT', 'Sulawesi Utara', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (28, 2, 'SULTENG', 'Sulawesi Tengah', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (29, 2, 'SULSEL', 'Sulawesi Selatan', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (30, 2, 'SULTENGGARA', 'Sulawesi Tenggara', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (31, 2, 'GORONTALO', 'Gorontalo', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (32, 2, 'SULBAR', 'Sulawesi Barat', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (33, 2, 'MALUKU', 'Maluku', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (34, 2, 'MALUT', 'Maluku Utara', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (35, 2, 'PAPBAR', 'Papua Barat', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);
INSERT INTO p_master_region VALUES (36, 2, 'PAPUA', 'Papua', '2016-09-26 02:53:49.749179', 46, '2016-09-26 02:53:49.749179', 46);


--
-- TOC entry 2663 (class 0 OID 0)
-- Dependencies: 197
-- Name: p_master_region_region_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_master_region_region_id_seq', 36, true);


--
-- TOC entry 2555 (class 0 OID 25379)
-- Dependencies: 198
-- Data for Name: p_master_unit; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO p_master_unit VALUES (6, 'Dep. Produksi', 'PRD', 1, NULL);
INSERT INTO p_master_unit VALUES (7, 'Human Capital', 'HC', 1, NULL);
INSERT INTO p_master_unit VALUES (8, 'Sekretariat Perusahaan', 'SETPER', 1, NULL);
INSERT INTO p_master_unit VALUES (9, 'Satuan Pengawas Intern', 'SPI', 1, NULL);
INSERT INTO p_master_unit VALUES (10, 'Divisi 1', 'DV1', 1, NULL);
INSERT INTO p_master_unit VALUES (11, 'Divisi 2', 'DV2', 1, NULL);
INSERT INTO p_master_unit VALUES (12, 'Divisi Regional 1', 'DR1', 1, NULL);
INSERT INTO p_master_unit VALUES (13, 'Divisi Regional 2', 'DR2', 1, NULL);
INSERT INTO p_master_unit VALUES (14, 'Divisi Regional 3', 'DR3', 1, NULL);
INSERT INTO p_master_unit VALUES (15, 'Divisi Regional 4', 'DR4', 1, NULL);
INSERT INTO p_master_unit VALUES (16, 'Divisi Regional 5', 'DR5', 1, NULL);
INSERT INTO p_master_unit VALUES (4, 'Dep. Keuangan', 'KEU', 1, NULL);
INSERT INTO p_master_unit VALUES (5, 'Dep. Pemasaran', 'PMS', 1, 4);
INSERT INTO p_master_unit VALUES (1, 'Dep. Sistem Dan Pengembangan Bisnis', 'SPGB', 1, NULL);


--
-- TOC entry 2664 (class 0 OID 0)
-- Dependencies: 199
-- Name: p_pemasok_pemasok_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_pemasok_pemasok_id_seq', 5, true);


--
-- TOC entry 2665 (class 0 OID 0)
-- Dependencies: 201
-- Name: p_vendo_teknis_komoditi_tp_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendo_teknis_komoditi_tp_id_seq', 7, true);


--
-- TOC entry 2666 (class 0 OID 0)
-- Dependencies: 203
-- Name: p_vendor_company_site_site_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_company_site_site_id_seq', 3, true);


--
-- TOC entry 2667 (class 0 OID 0)
-- Dependencies: 205
-- Name: p_vendor_company_vendor_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_company_vendor_id_seq', 24, true);


--
-- TOC entry 2668 (class 0 OID 0)
-- Dependencies: 207
-- Name: p_vendor_keu_laporan_laporan_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_keu_laporan_laporan_id_seq', 1, true);


--
-- TOC entry 2669 (class 0 OID 0)
-- Dependencies: 209
-- Name: p_vendor_keu_modal_modal_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_keu_modal_modal_id_seq', 2, true);


--
-- TOC entry 2670 (class 0 OID 0)
-- Dependencies: 211
-- Name: p_vendor_keu_rekening_rekening_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_keu_rekening_rekening_id_seq', 1, true);


--
-- TOC entry 2671 (class 0 OID 0)
-- Dependencies: 213
-- Name: p_vendor_legal_akta_akta_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_legal_akta_akta_id_seq', 6, true);


--
-- TOC entry 2672 (class 0 OID 0)
-- Dependencies: 215
-- Name: p_vendor_legal_domisili_domisili_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_legal_domisili_domisili_id_seq', 1, true);


--
-- TOC entry 2673 (class 0 OID 0)
-- Dependencies: 217
-- Name: p_vendor_legal_ijinlain_ijinlain_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_legal_ijinlain_ijinlain_id_seq', 1, true);


--
-- TOC entry 2674 (class 0 OID 0)
-- Dependencies: 219
-- Name: p_vendor_legal_npwp_npwp_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_legal_npwp_npwp_id_seq', 1, true);


--
-- TOC entry 2675 (class 0 OID 0)
-- Dependencies: 221
-- Name: p_vendor_legal_siup_siup_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_legal_siup_siup_id_seq', 1, true);


--
-- TOC entry 2676 (class 0 OID 0)
-- Dependencies: 223
-- Name: p_vendor_teknis_pengalaman_pengalaman_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_teknis_pengalaman_pengalaman_id_seq', 1, true);


--
-- TOC entry 2677 (class 0 OID 0)
-- Dependencies: 225
-- Name: p_vendor_teknis_sertifikat_sertifikat_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_teknis_sertifikat_sertifikat_id_seq', 1, true);


--
-- TOC entry 2678 (class 0 OID 0)
-- Dependencies: 227
-- Name: p_vendor_teknis_tambahan_tambahan_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('p_vendor_teknis_tambahan_tambahan_id_seq', 33, true);


--
-- TOC entry 2609 (class 0 OID 82618)
-- Dependencies: 252
-- Data for Name: sw_metadata; Type: TABLE DATA; Schema: eproc; Owner: eproc
--



--
-- TOC entry 2606 (class 0 OID 82597)
-- Dependencies: 249
-- Data for Name: sw_status; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO sw_status VALUES ('draft', 'ContohWorkflow', 'Draft', 1);
INSERT INTO sw_status VALUES ('production', 'ContohWorkflow', 'Production', 2);
INSERT INTO sw_status VALUES ('completed', 'ContohWorkflow', 'Completed', 3);


--
-- TOC entry 2607 (class 0 OID 82604)
-- Dependencies: 250
-- Data for Name: sw_transition; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO sw_transition VALUES ('ContohWorkflow', 'completed', 'production');
INSERT INTO sw_transition VALUES ('ContohWorkflow', 'draft', 'production');
INSERT INTO sw_transition VALUES ('ContohWorkflow', 'production', 'completed');
INSERT INTO sw_transition VALUES ('ContohWorkflow', 'production', 'draft');


--
-- TOC entry 2608 (class 0 OID 82611)
-- Dependencies: 251
-- Data for Name: sw_workflow; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO sw_workflow VALUES ('ContohWorkflow', 'draft');


--
-- TOC entry 2536 (class 0 OID 25284)
-- Dependencies: 179
-- Data for Name: t_company_category; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_company_category VALUES (3, 2, 2, '2016-09-05 07:56:09.792823', 59, '2016-09-05 07:56:09.792823', 59);


--
-- TOC entry 2546 (class 0 OID 25331)
-- Dependencies: 189
-- Data for Name: t_contact_person; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_contact_person VALUES (1, 2, 'Mr. X', 'Humas', '123456789', 'email@mail.com', '2016-09-19 02:06:32.929488', 59, '2016-09-19 02:06:32.929488', 59);


--
-- TOC entry 2603 (class 0 OID 49831)
-- Dependencies: 246
-- Data for Name: t_evaluasi_vendor; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_evaluasi_vendor VALUES (1, 2, 2, 'tes', 12, 'tes', 12, 'tes', 1, 'tes', 2, 'tes', 3, 'tes', 4, 'tes', 5, 'tes', 'Baik', 'tes', 1, 46, '2016-09-14', 46, '2016-09-26', 40, 120, 120, 10, 30, 30, 60, 50, '123456789abc');


--
-- TOC entry 2679 (class 0 OID 0)
-- Dependencies: 245
-- Name: t_evaluasi_vendor_t_evaluasi_vendor_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_evaluasi_vendor_t_evaluasi_vendor_id_seq', 1, true);


--
-- TOC entry 2599 (class 0 OID 33464)
-- Dependencies: 242
-- Data for Name: t_undangan; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_undangan VALUES (2, '0002-2016', '2016-09-01 07:25:52', 'amfahrus@yahoo.co.id', 46, 'tes subjek ulang', 'pesannya');
INSERT INTO t_undangan VALUES (4, '0004-2016', '2016-09-05 04:28:50.851105', 'zulhelmy@gmail.com', 46, 'undangan DRM abipraya', 'mohon di klik link berikut ini');
INSERT INTO t_undangan VALUES (9, '0009-2016', '2016-09-26 03:57:23.198528', 'mmsindo@indo.net.id', 46, 'Undangan DRM', 'Silahkan melengkapi data DRM nya');
INSERT INTO t_undangan VALUES (10, '0010-2016', '2016-09-26 06:10:03.593971', 'nov17pio@ymail.com', 46, 'Undangan DRM', 'Undangan DRM');
INSERT INTO t_undangan VALUES (11, '0011-2016', '2016-09-26 06:18:49.750575', 'info@intisumberbajasakti.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (12, '0012-2016', '2016-09-26 06:24:38.988709', 'mktproject@growthsteel.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (13, '0013-2016', '2016-09-26 06:27:18.456819', 'marketing@bhirawasteel.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (14, '0014-2016', '2016-09-26 06:29:31.048443', 'saranaputrametal@hotmail.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (15, '0015-2016', '2016-09-26 06:31:21.511578', 'haniljayasteel@gmail.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (16, '0016-2016', '2016-09-26 06:34:19.97864', 'sofyan@eskasia.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (17, '0017-2016', '2016-09-26 06:35:32.736086', 'henry@themastersteel.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (18, '0018-2016', '2016-09-26 06:36:11.34162', 'oki@toyogiristeel.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (19, '0019-2016', '2016-09-26 06:37:05.020548', 'arief_firman8@yahoo.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (20, '0020-2016', '2016-09-26 06:37:50.082637', 'gunawan_md77@yahoo.co.id', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (21, '0021-2016', '2016-09-26 06:38:32.890527', 'kraton_rmc@yahoo.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (22, '0022-2016', '2016-09-26 06:39:21.586009', 'dexton@dexada.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (23, '0023-2016', '2016-09-26 06:40:01.93085', 'jbisurabaya@jayabeton.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (24, '0024-2016', '2016-09-26 06:40:40.677', 'dutabangsapasuruan@gmail.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (25, '0025-2016', '2016-09-26 06:41:14.088396', 'inti.beton@gmail.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (26, '0026-2016', '2016-09-26 06:42:37.391427', 'rudi.satriawan@halarag.co.id', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (27, '0027-2016', '2016-09-26 06:43:06.890561', 'mdn_insa@yahoo.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (28, '0028-2016', '2016-09-26 06:43:38.914844', 'wijayadewi50@yahoo.com', 46, 'Undangan DRM', 'tes');
INSERT INTO t_undangan VALUES (29, '0029-2016', '2016-09-26 06:44:12.671886', 'jakartaflash@yahoo.com', 46, 'Undangan DRM', 'tes');


--
-- TOC entry 2680 (class 0 OID 0)
-- Dependencies: 241
-- Name: t_undangan_t_undangan_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_undangan_t_undangan_id_seq', 29, true);


--
-- TOC entry 2681 (class 0 OID 0)
-- Dependencies: 228
-- Name: t_unit_unit_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_unit_unit_id_seq', 16, true);


--
-- TOC entry 2586 (class 0 OID 25526)
-- Dependencies: 229
-- Data for Name: t_user_unit; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_user_unit VALUES (6, 46, 1, '2016-08-30 10:00:28.457055', 0, '2016-08-30 10:00:28.457055', 0);


--
-- TOC entry 2682 (class 0 OID 0)
-- Dependencies: 230
-- Name: t_user_unit_uu_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_user_unit_uu_id_seq', 10, true);


--
-- TOC entry 2588 (class 0 OID 25535)
-- Dependencies: 231
-- Data for Name: t_userdata_internal; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_userdata_internal VALUES (28, 46, 'Asep Muhammad Fahrus', 'PKT 13-113', '2016-08-30 10:00:44.888613', 0, '2016-08-30 10:00:44.888613', 0);
INSERT INTO t_userdata_internal VALUES (29, 47, 'BWZ', '123', '2016-08-30 10:00:44.888613', 0, '2016-08-30 10:00:44.888613', 0);


--
-- TOC entry 2683 (class 0 OID 0)
-- Dependencies: 232
-- Name: t_userdata_internal_ui_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_userdata_internal_ui_id_seq', 29, true);


--
-- TOC entry 2561 (class 0 OID 25406)
-- Dependencies: 204
-- Data for Name: t_vendor_company; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_company VALUES (2, 59, 'PT', 'ABC', 'Tbk', NULL, 46, '2016-09-02 09:09:34.216911', 59, '2016-09-06 04:08:05', 59, '0002-2016');
INSERT INTO t_vendor_company VALUES (4, 70, 'PT', 'Mitra Manunggal Selaras', '', NULL, 46, '2016-09-26 04:18:18.032575', 70, '2016-09-26 04:30:27', 70, '0009-2016');
INSERT INTO t_vendor_company VALUES (5, 71, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:18:08.38537', 71, '2016-09-26 06:18:08.38537', 71, '0010-2016');
INSERT INTO t_vendor_company VALUES (6, 72, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:23:59.856438', 72, '2016-09-26 06:23:59.856438', 72, '0011-2016');
INSERT INTO t_vendor_company VALUES (7, 73, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:26:57.15289', 73, '2016-09-26 06:26:57.15289', 73, '0012-2016');
INSERT INTO t_vendor_company VALUES (8, 74, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:29:07.555639', 74, '2016-09-26 06:29:07.555639', 74, '0013-2016');
INSERT INTO t_vendor_company VALUES (9, 75, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:30:22.999428', 75, '2016-09-26 06:30:22.999428', 75, '0014-2016');
INSERT INTO t_vendor_company VALUES (10, 76, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:32:48.992864', 76, '2016-09-26 06:32:48.992864', 76, '0015-2016');
INSERT INTO t_vendor_company VALUES (11, 77, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:34:37.704531', 77, '2016-09-26 06:34:37.704531', 77, '0016-2016');
INSERT INTO t_vendor_company VALUES (12, 78, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:35:53.586091', 78, '2016-09-26 06:35:53.586091', 78, '0017-2016');
INSERT INTO t_vendor_company VALUES (13, 79, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:36:42.60856', 79, '2016-09-26 06:36:42.60856', 79, '0018-2016');
INSERT INTO t_vendor_company VALUES (14, 80, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:37:27.799017', 80, '2016-09-26 06:37:27.799017', 80, '0019-2016');
INSERT INTO t_vendor_company VALUES (15, 81, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:38:11.89967', 81, '2016-09-26 06:38:11.89967', 81, '0020-2016');
INSERT INTO t_vendor_company VALUES (16, 82, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:38:49.370639', 82, '2016-09-26 06:38:49.370639', 82, '0021-2016');
INSERT INTO t_vendor_company VALUES (17, 83, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:39:34.049306', 83, '2016-09-26 06:39:34.049306', 83, '0022-2016');
INSERT INTO t_vendor_company VALUES (18, 84, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:40:19.474604', 84, '2016-09-26 06:40:19.474604', 84, '0023-2016');
INSERT INTO t_vendor_company VALUES (19, 85, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:40:54.398773', 85, '2016-09-26 06:40:54.398773', 85, '0024-2016');
INSERT INTO t_vendor_company VALUES (20, 86, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:41:27.6622', 86, '2016-09-26 06:41:27.6622', 86, '0025-2016');
INSERT INTO t_vendor_company VALUES (21, 87, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:42:49.349585', 87, '2016-09-26 06:42:49.349585', 87, '0026-2016');
INSERT INTO t_vendor_company VALUES (22, 88, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:43:23.426737', 88, '2016-09-26 06:43:23.426737', 88, '0027-2016');
INSERT INTO t_vendor_company VALUES (23, 89, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:43:54.002665', 89, '2016-09-26 06:43:54.002665', 89, '0028-2016');
INSERT INTO t_vendor_company VALUES (24, 90, NULL, NULL, NULL, NULL, 46, '2016-09-26 06:44:28.699675', 90, '2016-09-26 06:44:28.699675', 90, '0029-2016');


--
-- TOC entry 2559 (class 0 OID 25396)
-- Dependencies: 202
-- Data for Name: t_vendor_company_site; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_company_site VALUES (3, 2, 'Jalan Mawar Kav. 14', 1, '12345', 2, 2, '123456789', '', 'email@email.com', '', '2016-09-16 09:19:32.364457', 59, '2016-09-16 09:19:32.364457', 59);


--
-- TOC entry 2590 (class 0 OID 25544)
-- Dependencies: 233
-- Data for Name: t_vendor_kepengurusan; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_kepengurusan VALUES (1, 2, 'Mr. X', 'Dekom', '123456789', 'email@email.com', '1234567890abc', '1234567abc', 'Jl. Mawar No. 7', 1, 2, '12345', 3, '59_dewan_komisaris_07_09_16_09_47_32.zip', '2016-09-07 09:47:32.554826', 59, '2016-09-07 09:47:32.554826', 59);
INSERT INTO t_vendor_kepengurusan VALUES (2, 2, 'MR. Y', 'direksi', '123456789', 'email@email.com', '1234567890abc', '1234567abc', 'Jl. Mawar No. 7', 1, 2, '12345', 2, '59_dewan_direksi_07_09_16_09_57_42.zip', '2016-09-07 09:57:42.310439', 59, '2016-09-07 09:57:42.310439', 59);
INSERT INTO t_vendor_kepengurusan VALUES (3, 2, 'Mr. Z', 'Pemilik', '123456789', 'email@email.com', '1234567890abc', '1234567abc', 'Jl. Mawar No. 7', 1, 2, '12345', 1, '59_pemilik_07_09_16_10_06_09.zip', '2016-09-07 10:06:09.347087', 59, '2016-09-07 10:06:09.347087', 59);


--
-- TOC entry 2684 (class 0 OID 0)
-- Dependencies: 234
-- Name: t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_vendor_kepengurusan_t_vendor_kepengurusan_id_seq', 3, true);


--
-- TOC entry 2563 (class 0 OID 25416)
-- Dependencies: 206
-- Data for Name: t_vendor_keu_laporan; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_keu_laporan VALUES (1, 2, '2016', 'Laporan XYZ', 1, 20000, 1000, 2000, 3000, '59_laporan_keuangan_08_09_16_03_51_01.zip', '2016-09-08 03:50:19.040461', 59, '2016-09-08 03:51:01', 59);


--
-- TOC entry 2565 (class 0 OID 25426)
-- Dependencies: 208
-- Data for Name: t_vendor_keu_modal; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_keu_modal VALUES (2, 2, 'Besar', 1, 10000, 1, 20000, '2016-09-08', 59, '2016-09-08', 59);


--
-- TOC entry 2567 (class 0 OID 25434)
-- Dependencies: 210
-- Data for Name: t_vendor_keu_rekening; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_keu_rekening VALUES (1, 2, '123456789', 'Mr. X', 'Bank XYZ', 'Panjaitan', 'Jalan Mawar 1 Blok A', 1, '59_rekening_bank_08_09_16_02_27_50.zip', '2016-09-08 02:27:39.569832', 59, '2016-09-08 02:27:50', 59);


--
-- TOC entry 2605 (class 0 OID 49884)
-- Dependencies: 248
-- Data for Name: t_vendor_komoditi_harga; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_komoditi_harga VALUES (10, 1, 1, 500000000, '2016-09-16', NULL, true, '2016-09-16', 59, '2016-09-16', 59, false);
INSERT INTO t_vendor_komoditi_harga VALUES (9, 1, 1, 20000000, '2016-09-14', NULL, false, '2016-09-14', 59, '2016-09-14', 59, false);
INSERT INTO t_vendor_komoditi_harga VALUES (4, 1, 1, 10000, '2016-09-20', NULL, false, '2016-09-14', 59, '2016-09-14', 59, false);
INSERT INTO t_vendor_komoditi_harga VALUES (8, 2, 1, 20000000, '2016-09-14', NULL, true, '2016-09-14', 59, '2016-09-20', 59, false);
INSERT INTO t_vendor_komoditi_harga VALUES (7, 2, 1, 10000, '2016-09-14', NULL, false, '2016-09-14', 59, '2016-09-14', 59, false);
INSERT INTO t_vendor_komoditi_harga VALUES (13, 6, 1, 2500, '2016-09-21', NULL, true, '2016-09-21', 59, '2016-09-22', 59, false);


--
-- TOC entry 2685 (class 0 OID 0)
-- Dependencies: 247
-- Name: t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_vendor_komoditi_harga_t_vendor_komoditi_harga_id_seq', 13, true);


--
-- TOC entry 2569 (class 0 OID 25444)
-- Dependencies: 212
-- Data for Name: t_vendor_legal_akta; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_legal_akta VALUES (6, 2, '123', 'Pendirian', '2016-09-06', 'tes', 'tes', '2016-09-07', '2016-09-08', '59_akta_pendirian_07_09_16_04_35_12.zip', '2016-09-06 07:42:19.772573', 59, '2016-09-07 04:35:12', 59);


--
-- TOC entry 2571 (class 0 OID 25454)
-- Dependencies: 214
-- Data for Name: t_vendor_legal_domisili; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_legal_domisili VALUES (1, 2, '123', '2016-09-07', '2016-09-30', 'tes alamat', 1, 2, '12345', 2, '1234567890', '59_domisili_07_09_16_07_01_06.zip', '2016-09-07 07:01:06.894686', 59, '2016-09-07 07:01:06.894686', 59);


--
-- TOC entry 2573 (class 0 OID 25464)
-- Dependencies: 216
-- Data for Name: t_vendor_legal_ijinlain; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_legal_ijinlain VALUES (1, 2, 'tes jenis', 'tes penerbit', '123', '2016-09-06', '2016-09-09', '59_ijin_lain_07_09_16_08_07_43.zip', '2016-09-07 08:07:21.242415', 59, '2016-09-07 08:07:43', 59);


--
-- TOC entry 2575 (class 0 OID 25474)
-- Dependencies: 218
-- Data for Name: t_vendor_legal_npwp; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_legal_npwp VALUES (1, 2, '123', 'tes alamat', 1, 2, '12345', 0, '123456789', '59_npwp_07_09_16_07_28_05.zip', '2016-09-07 07:26:56.990221', 59, '2016-09-07 07:28:05', 59);


--
-- TOC entry 2577 (class 0 OID 25484)
-- Dependencies: 220
-- Data for Name: t_vendor_legal_siup; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_legal_siup VALUES (1, 2, 'penerbitnya', '123', 'Siup Kecil', '2016-09-13', '2016-09-30', '59_siup_07_09_16_07_52_05.zip', '2016-09-07 07:51:46.127383', 59, '2016-09-07 07:52:05', 59);


--
-- TOC entry 2592 (class 0 OID 25554)
-- Dependencies: 235
-- Data for Name: t_vendor_sdm; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_sdm VALUES (1, 2, 'Mr. X', 'S1', 'Project Manager', '5 Tahun', 35, 'Permanen', 'WNI', 1, '59_tenaga_ahli_utama_08_09_16_07_53_43.zip', '2016-09-08 07:53:32.46877', 59, '2016-09-08 07:53:43', 59);
INSERT INTO t_vendor_sdm VALUES (2, 2, 'Mr. Y', 'D3', 'Mekanik', '3 Tahun', 27, 'Permanen', 'WNI', 0, '59_tenaga_ahli_pendukung_08_09_16_08_58_39.zip', '2016-09-08 08:58:39.61333', 59, '2016-09-08 08:58:39.61333', 59);


--
-- TOC entry 2686 (class 0 OID 0)
-- Dependencies: 236
-- Name: t_vendor_sdm_t_vendor_sdm_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_vendor_sdm_t_vendor_sdm_id_seq', 2, true);


--
-- TOC entry 2594 (class 0 OID 25564)
-- Dependencies: 237
-- Data for Name: t_vendor_teknis_alat; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_teknis_alat VALUES (1, 2, 2, 'Laptop', 'HP', 'Hybrid', 'Baru', 10, 2016, 'Jakarta', '2016-09-08', 59, '2016-09-08', 59);


--
-- TOC entry 2687 (class 0 OID 0)
-- Dependencies: 238
-- Name: t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_vendor_teknis_alat_t_vendor_teknis_alat_id_seq', 1, true);


--
-- TOC entry 2557 (class 0 OID 25388)
-- Dependencies: 200
-- Data for Name: t_vendor_teknis_komoditi; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_teknis_komoditi VALUES (2, 2, 2, 'Konsultan PM', NULL, NULL, 1, 'Nasional', NULL, '59_jasa_14_09_16_09_39_15.png', '2016-09-08', 0, '2016-09-14', 59, 2, false);
INSERT INTO t_vendor_teknis_komoditi VALUES (7, 2, 2, 'Estimator', NULL, NULL, 4, 'Nasional', NULL, '59_jasa_14_09_16_10_24_46.png', '2016-09-14', 59, '2016-09-14', 59, 2, false);
INSERT INTO t_vendor_teknis_komoditi VALUES (6, 2, 1, 'Pensil', 'HB', 'Lokal', 3, 'Nasional', 'Pcs', '59_gambar_barang_14_09_16_10_24_12.png', '2016-09-14', 59, '2016-09-14', 59, 1, false);
INSERT INTO t_vendor_teknis_komoditi VALUES (1, 2, 3, 'Nama Barangnya Panjang Banget Lho Sampai Gak Muat Ditulis Di Katalog', 'Pilot', 'Lokal', 3, 'Nasional', 'Pcs', '59_gambar_barang_21_09_16_10_36_05.png', '2016-09-08', 59, '2016-09-21', 59, 1, false);


--
-- TOC entry 2579 (class 0 OID 25494)
-- Dependencies: 222
-- Data for Name: t_vendor_teknis_pengalaman; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_teknis_pengalaman VALUES (1, 2, 'PT ABC', 'Pembangunan Gedung Kantor Pusat', 'Membangun Gedung Kantor Pusat Di Jakarta', 1, 150000000, '123456789', '2016-09-01', '2016-09-30', 'Mr. XYZ', '0123456789', '2016-09-08 10:16:15.022647', 59, '2016-09-08 10:16:21', 59);


--
-- TOC entry 2581 (class 0 OID 25504)
-- Dependencies: 224
-- Data for Name: t_vendor_teknis_sertifikat; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_teknis_sertifikat VALUES (1, 2, 'Pelatihan Mutu', 'Konsultan Mutu', '2016-09-01', '2016-09-30', '59_sertifikat_08_09_16_09_28_15.zip', '2016-09-08 09:28:15.92976', 59, '2016-09-08 09:28:15.92976', 59, 'Mutu');


--
-- TOC entry 2583 (class 0 OID 25514)
-- Dependencies: 226
-- Data for Name: t_vendor_teknis_tambahan; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_vendor_teknis_tambahan VALUES (1, 2, 'Konsultan A', 'Jalan Mawar', 2, 2, 1, '12345', 'PMO Development', 'Sertifikasi Konsultan', '59_data_tambahan_08_09_16_11_09_57.zip', '2016-09-08 11:08:54.949773', 59, '2016-09-08 11:09:57', 59);


--
-- TOC entry 2601 (class 0 OID 33483)
-- Dependencies: 244
-- Data for Name: t_verifikasi_vendor; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO t_verifikasi_vendor VALUES (1, 2, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, ' ', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, 46, '2016-09-09 08:54:50.018622', 46, '2016-09-09 08:54:50.018622');
INSERT INTO t_verifikasi_vendor VALUES (7, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 04:18:18.05882', 0, '2016-09-26 04:18:18.05882');
INSERT INTO t_verifikasi_vendor VALUES (8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:18:08.398057', 0, '2016-09-26 06:18:08.398057');
INSERT INTO t_verifikasi_vendor VALUES (9, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:23:59.87036', 0, '2016-09-26 06:23:59.87036');
INSERT INTO t_verifikasi_vendor VALUES (10, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:26:57.166351', 0, '2016-09-26 06:26:57.166351');
INSERT INTO t_verifikasi_vendor VALUES (11, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:29:07.568068', 0, '2016-09-26 06:29:07.568068');
INSERT INTO t_verifikasi_vendor VALUES (12, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:30:23.01273', 0, '2016-09-26 06:30:23.01273');
INSERT INTO t_verifikasi_vendor VALUES (13, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:32:49.016355', 0, '2016-09-26 06:32:49.016355');
INSERT INTO t_verifikasi_vendor VALUES (14, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:34:37.723307', 0, '2016-09-26 06:34:37.723307');
INSERT INTO t_verifikasi_vendor VALUES (15, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:35:53.599028', 0, '2016-09-26 06:35:53.599028');
INSERT INTO t_verifikasi_vendor VALUES (16, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:36:42.621667', 0, '2016-09-26 06:36:42.621667');
INSERT INTO t_verifikasi_vendor VALUES (17, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:37:27.812879', 0, '2016-09-26 06:37:27.812879');
INSERT INTO t_verifikasi_vendor VALUES (18, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:38:11.91206', 0, '2016-09-26 06:38:11.91206');
INSERT INTO t_verifikasi_vendor VALUES (19, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:38:49.383371', 0, '2016-09-26 06:38:49.383371');
INSERT INTO t_verifikasi_vendor VALUES (20, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:39:34.064746', 0, '2016-09-26 06:39:34.064746');
INSERT INTO t_verifikasi_vendor VALUES (21, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:40:19.487933', 0, '2016-09-26 06:40:19.487933');
INSERT INTO t_verifikasi_vendor VALUES (22, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:40:54.411902', 0, '2016-09-26 06:40:54.411902');
INSERT INTO t_verifikasi_vendor VALUES (23, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:41:27.679901', 0, '2016-09-26 06:41:27.679901');
INSERT INTO t_verifikasi_vendor VALUES (24, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:42:49.362738', 0, '2016-09-26 06:42:49.362738');
INSERT INTO t_verifikasi_vendor VALUES (25, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:43:23.439437', 0, '2016-09-26 06:43:23.439437');
INSERT INTO t_verifikasi_vendor VALUES (26, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:43:54.014748', 0, '2016-09-26 06:43:54.014748');
INSERT INTO t_verifikasi_vendor VALUES (27, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-26 06:44:28.713195', 0, '2016-09-26 06:44:28.713195');


--
-- TOC entry 2688 (class 0 OID 0)
-- Dependencies: 243
-- Name: t_verifikasi_vendor_t_verifikasi_vendor_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('t_verifikasi_vendor_t_verifikasi_vendor_id_seq', 27, true);


--
-- TOC entry 2596 (class 0 OID 25572)
-- Dependencies: 239
-- Data for Name: user; Type: TABLE DATA; Schema: eproc; Owner: eproc
--

INSERT INTO "user" VALUES (47, 'blackwiz', 'B0xlVmxjDhvuqK_JPuEkMSTAHAXvtyik', '$2y$13$8Wa/9S6evmhKRU9OkDYMiefci/7k4523W3RiIDykodCTK8HASrUKW', NULL, 'wiz.stalker@gmail.com', 10, 1470722604, 1470722604);
INSERT INTO "user" VALUES (46, 'admin', '1KFuP1oa2YV6j4fFDtBVOAc6HfFfXj4C', '$2y$13$XWMwa9pTiBhvYudNeIGfeupEjBvUKICpil.pSEQQHwuBwRmy2bwLG', NULL, 'amfahrus@yahoo.co.id', 10, 1470308772, 1472616910);
INSERT INTO "user" VALUES (61, 'zulhelmy@gmail.com', '1SNS_MNjGcj_xyXQcIYofc6KiOc3j20_', '$2y$13$RHgcD4/aGZuObZUuyE7seOJalnXnFDOSO82G0SlPoZhjmVOgIJZwi', NULL, 'zulhelmy@gmail.com', 10, 1474426817, 1474426817);
INSERT INTO "user" VALUES (70, 'mmsindo@indo.net.id', 'QH_WVqcMkLwYUoC7ejtPvyb8T-uRgw46', '$2y$13$B.hEl9yXrf9OOmX7huUrZe0dpWGUiRp5PvA0YZJHYwJ5nZmgH2FN6', NULL, 'mmsindo@indo.net.id', 10, 1474863497, 1474863497);
INSERT INTO "user" VALUES (59, 'f4ztr1k@yahoo.co.id', 'A_plCkLfBNwJr09gXp0l-23JhkJC2qTx', '$2y$13$w.EWF0o8/L2VwBgTvTI.FO4Gn.vqAUpGXDyJW2wv7viXQ7j187Dym', NULL, 'f4ztr1k@yahoo.co.id', 10, 1472807374, 1474865683);
INSERT INTO "user" VALUES (71, 'nov17pio@ymail.com', 'O-QB6yAUWk9R48FDfsy4gDuMURa8FnIF', '$2y$13$vUqLpjc6DrjgDL6ImCFZ2.M8zLxU8mQIQ74YCCxe/ondny6lkrbze', NULL, 'nov17pio@ymail.com', 10, 1474870688, 1474870688);
INSERT INTO "user" VALUES (72, 'info@intisumberbajasakti.com', '1Ck1bTocw5LpxDzeYl4RcaVtlmzgQ4Qb', '$2y$13$vb9pOOgE2F4.5Z75ezDC/eRmcNfzprt07BBhepInKjnMzqfKYwBZq', NULL, 'info@intisumberbajasakti.com', 10, 1474871039, 1474871039);
INSERT INTO "user" VALUES (73, 'mktproject@growthsteel.com', 'Oj8MQh6Thc1USC6yWHecAoEG-l2YL5ty', '$2y$13$N0fDyCR6fisTXRHZwX5Teu/0HcqJqz8x8qzYmdVBA0f6PUJD9vkRO', NULL, 'mktproject@growthsteel.com', 10, 1474871217, 1474871217);
INSERT INTO "user" VALUES (74, 'marketing@bhirawasteel.com', 'ZQoqONcLMQbQBQ6DVZZfA5iojqJrAMGX', '$2y$13$kIJHC8bw5Y54a3XT9i/mP.jY76WpQQP1K6sm/JMn10/k.mb9Gjx5K', NULL, 'marketing@bhirawasteel.com', 10, 1474871347, 1474871347);
INSERT INTO "user" VALUES (75, 'saranaputrametal@hotmail.com', 'xm9HriP1c9eB1Gm1cm1bt8vwKMoo0pdb', '$2y$13$edxDFH1QiZRhKlH9g/2BTObrrZ9JdAQrtFQD3GXeR2t0cvel0W2U6', NULL, 'saranaputrametal@hotmail.com', 10, 1474871422, 1474871422);
INSERT INTO "user" VALUES (76, 'haniljayasteel@gmail.com', 'zNDrEIHHC6Eap2CWqvrjEC4a7q4H2OIM', '$2y$13$UseXUNOduVfmYXo.GVNWQubLO6dDQjHsU8EOv.JB0KmDZ6GlYHk/W', NULL, 'haniljayasteel@gmail.com', 10, 1474871568, 1474871568);
INSERT INTO "user" VALUES (77, 'sofyan@eskasia.com', 'G279m868Zs4QSktZQdTfa2Ou-CQYycJ9', '$2y$13$1me1yGUPezrtgwp9a/QpoutsjN3nzHaROPiCv19nyxvBO91xal3Pa', NULL, 'sofyan@eskasia.com', 10, 1474871677, 1474871677);
INSERT INTO "user" VALUES (78, 'henry@themastersteel.com', '5QFLL0rL9cwKbInye-SumV3n_qR0mQ_9', '$2y$13$A9.8SKVx5ZtehrIPVYgQkeHPNJ1i4Up91NgyF2./hQ7i9vNVc4/Rm', NULL, 'henry@themastersteel.com', 10, 1474871753, 1474871753);
INSERT INTO "user" VALUES (79, 'oki@toyogiristeel.com', 'baic2ywBsd5-HyNl1tgu0SPIBuME4maR', '$2y$13$K46W1wS1gpw2yGB0YuJh3.go5SacXq8FG38CoEv9UzYP/qeqa5ocq', NULL, 'oki@toyogiristeel.com', 10, 1474871802, 1474871802);
INSERT INTO "user" VALUES (80, 'arief_firman8@yahoo.com', 'F01EC8Zs8Hi72ntGUTj1wsFWJ-DOQ2MH', '$2y$13$LT9XJrIb1cxz1TMfNK7VpOEvOkRcvL3NC/YuRWYGg6gdeYI.aHD7S', NULL, 'arief_firman8@yahoo.com', 10, 1474871847, 1474871847);
INSERT INTO "user" VALUES (81, 'gunawan_md77@yahoo.co.id', 'w7_Xgi56yfWdeY21VLIdHtQ88ZpTr8Si', '$2y$13$pGrKN1oUr1xz9pahzBAWMupnOOW1dyXnCBOK8ptYu0rMqSNswpknW', NULL, 'gunawan_md77@yahoo.co.id', 10, 1474871891, 1474871891);
INSERT INTO "user" VALUES (82, 'kraton_rmc@yahoo.com', 'EHT6v0mwaCuTWVPnLoa1dsDUkUHtOLdS', '$2y$13$HvnifGFS0xpYas/SxYmgm.lS6GMtfE1LcH5UAJqp8D6PdX3tqmiAK', NULL, 'kraton_rmc@yahoo.com', 10, 1474871929, 1474871929);
INSERT INTO "user" VALUES (83, 'dexton@dexada.com', 'K_Z-LMog9PthPhmXuyaAFmVcVOLqsk_L', '$2y$13$8VgQjUTtueg3iboEgaBDUOLEclMcBMRGI1cyxyH6dZqjOnm2DCDJe', NULL, 'dexton@dexada.com', 10, 1474871974, 1474871974);
INSERT INTO "user" VALUES (84, 'jbisurabaya@jayabeton.com', 'bHjNITusduaNDQyahYMsxyGZ7E8sGq19', '$2y$13$OF3dYYuFpBQJRBHxRsuolO3WkQfx2IVV0AGhppS/sm6Wdmepa96ZW', NULL, 'jbisurabaya@jayabeton.com', 10, 1474872019, 1474872019);
INSERT INTO "user" VALUES (85, 'dutabangsapasuruan@gmail.com', 'wnZKgd9rE2QEJCWAU9TH-XqDv4UFI9c3', '$2y$13$b9xKVjBoIeUZRm4auXyI6uEzW3lesJqvX4sBuHQcpGqFTjMMaySSq', NULL, 'dutabangsapasuruan@gmail.com', 10, 1474872054, 1474872054);
INSERT INTO "user" VALUES (86, 'inti.beton@gmail.com', 'lFaT5NJMbdHXd6RYepOLex1ZMSV4gne-', '$2y$13$Rvr8UDsr8.DuTVsXzBCEaOtSh051hH/U36vCG3u693IslWs/7CuxC', NULL, 'inti.beton@gmail.com', 10, 1474872087, 1474872087);
INSERT INTO "user" VALUES (87, 'rudi.satriawan@halarag.co.id', 'Uc8HCJGNbdarcwhxO9hZeLBLdfib4MaL', '$2y$13$d2k/PmfKQkN3WBphoZ8JaO3wxIKU9X5ogprAbPEtFog17HWlX0fiO', NULL, 'rudi.satriawan@halarag.co.id', 10, 1474872169, 1474872169);
INSERT INTO "user" VALUES (88, 'mdn_insa@yahoo.com', 'ohZf6xSRWC8e4H92bZroKlF-kdriP3OE', '$2y$13$K/yApw56wlseWUq2nLGaz.l7JsdA/2yragVVzj9TuPyIa4DTpGe5m', NULL, 'mdn_insa@yahoo.com', 10, 1474872203, 1474872203);
INSERT INTO "user" VALUES (89, 'wijayadewi50@yahoo.com', 'fyF0qi1BtytnrbLy8dSn0yonRZB4Xfrx', '$2y$13$.wUfOcYOoUNMgfCp0n2ruuaWwqwVHh7Wps3r8uyypDwl6G2xAw7YW', NULL, 'wijayadewi50@yahoo.com', 10, 1474872233, 1474872233);
INSERT INTO "user" VALUES (90, 'jakartaflash@yahoo.com', 'eNpFTYHQUAY5L3hfWF0ppm20W27Ptv8U', '$2y$13$h.3ghdjVYtdqDr2A8rys.ubie6J2cmcUaeLolc.a6eSFV6DOdU9b6', NULL, 'jakartaflash@yahoo.com', 10, 1474872268, 1474872268);


--
-- TOC entry 2689 (class 0 OID 0)
-- Dependencies: 240
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: eproc; Owner: eproc
--

SELECT pg_catalog.setval('user_id_seq', 90, true);


--
-- TOC entry 2235 (class 2606 OID 25611)
-- Name: auth_assignment_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_assignment
    ADD CONSTRAINT auth_assignment_pkey PRIMARY KEY (item_name, user_id);


--
-- TOC entry 2240 (class 2606 OID 25613)
-- Name: auth_item_child_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_item_child
    ADD CONSTRAINT auth_item_child_pkey PRIMARY KEY (parent, child);


--
-- TOC entry 2237 (class 2606 OID 25615)
-- Name: auth_item_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_item
    ADD CONSTRAINT auth_item_pkey PRIMARY KEY (name);


--
-- TOC entry 2242 (class 2606 OID 25617)
-- Name: auth_rule_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_rule
    ADD CONSTRAINT auth_rule_pkey PRIMARY KEY (name);


--
-- TOC entry 2244 (class 2606 OID 25619)
-- Name: menu_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);


--
-- TOC entry 2246 (class 2606 OID 25621)
-- Name: migration_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 2248 (class 2606 OID 25623)
-- Name: p_company_categories_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_company_category
    ADD CONSTRAINT p_company_categories_pkey PRIMARY KEY (t_company_category_id);


--
-- TOC entry 2254 (class 2606 OID 25625)
-- Name: p_master_city_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_city
    ADD CONSTRAINT p_master_city_pkey PRIMARY KEY (p_master_city_id);


--
-- TOC entry 2257 (class 2606 OID 25627)
-- Name: p_master_comodity_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_comodity
    ADD CONSTRAINT p_master_comodity_pkey PRIMARY KEY (p_master_comodity_id);


--
-- TOC entry 2251 (class 2606 OID 25629)
-- Name: p_master_company_categories_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_category
    ADD CONSTRAINT p_master_company_categories_pkey PRIMARY KEY (p_master_catagory_id);


--
-- TOC entry 2260 (class 2606 OID 25631)
-- Name: p_master_country_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_country
    ADD CONSTRAINT p_master_country_pkey PRIMARY KEY (p_master_country_id);


--
-- TOC entry 2263 (class 2606 OID 25633)
-- Name: p_master_cp_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_contact_person
    ADD CONSTRAINT p_master_cp_pkey PRIMARY KEY (t_contact_person_id);


--
-- TOC entry 2266 (class 2606 OID 25635)
-- Name: p_master_currency_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_currency
    ADD CONSTRAINT p_master_currency_pkey PRIMARY KEY (p_master_currency_id);


--
-- TOC entry 2269 (class 2606 OID 25637)
-- Name: p_master_jenis_alat_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_jenis_alat
    ADD CONSTRAINT p_master_jenis_alat_pkey PRIMARY KEY (p_master_jenis_alat_id);


--
-- TOC entry 2275 (class 2606 OID 25639)
-- Name: p_master_region_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_region
    ADD CONSTRAINT p_master_region_pkey PRIMARY KEY (p_master_region_id);


--
-- TOC entry 2272 (class 2606 OID 25641)
-- Name: p_pemasok_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_pemasok
    ADD CONSTRAINT p_pemasok_pkey PRIMARY KEY (p_master_pemasok_id);


--
-- TOC entry 2281 (class 2606 OID 25643)
-- Name: p_vendo_teknis_komoditi_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_komoditi
    ADD CONSTRAINT p_vendo_teknis_komoditi_pkey PRIMARY KEY (t_vendor_teknis_komoditi_id);


--
-- TOC entry 2287 (class 2606 OID 25645)
-- Name: p_vendor_company_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company
    ADD CONSTRAINT p_vendor_company_pkey PRIMARY KEY (t_vendor_company_id);


--
-- TOC entry 2284 (class 2606 OID 25647)
-- Name: p_vendor_company_site_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company_site
    ADD CONSTRAINT p_vendor_company_site_pkey PRIMARY KEY (t_vendor_company_site_id);


--
-- TOC entry 2329 (class 2606 OID 25649)
-- Name: p_vendor_kepengurusan_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_kepengurusan
    ADD CONSTRAINT p_vendor_kepengurusan_pkey PRIMARY KEY (t_vendor_kepengurusan_id);


--
-- TOC entry 2290 (class 2606 OID 25651)
-- Name: p_vendor_keu_laporan_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_laporan
    ADD CONSTRAINT p_vendor_keu_laporan_pkey PRIMARY KEY (t_vendor_keu_laporan_id);


--
-- TOC entry 2293 (class 2606 OID 25653)
-- Name: p_vendor_keu_modal_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_modal
    ADD CONSTRAINT p_vendor_keu_modal_pkey PRIMARY KEY (t_vendor_keu_modal_id);


--
-- TOC entry 2296 (class 2606 OID 25655)
-- Name: p_vendor_keu_rekening_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_rekening
    ADD CONSTRAINT p_vendor_keu_rekening_pkey PRIMARY KEY (t_vendor_keu_rekening_id);


--
-- TOC entry 2299 (class 2606 OID 25657)
-- Name: p_vendor_legal_akta_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_akta
    ADD CONSTRAINT p_vendor_legal_akta_pkey PRIMARY KEY (t_vendor_legal_akta_id);


--
-- TOC entry 2302 (class 2606 OID 25659)
-- Name: p_vendor_legal_domisili_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_domisili
    ADD CONSTRAINT p_vendor_legal_domisili_pkey PRIMARY KEY (t_vendor_legal_domisili_id);


--
-- TOC entry 2305 (class 2606 OID 25661)
-- Name: p_vendor_legal_ijinlain_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_ijinlain
    ADD CONSTRAINT p_vendor_legal_ijinlain_pkey PRIMARY KEY (t_vendor_legal_ijinlain_id);


--
-- TOC entry 2308 (class 2606 OID 25663)
-- Name: p_vendor_legal_npwp_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_npwp
    ADD CONSTRAINT p_vendor_legal_npwp_pkey PRIMARY KEY (t_vendor_legal_npwp_id);


--
-- TOC entry 2311 (class 2606 OID 25665)
-- Name: p_vendor_legal_siup_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_siup
    ADD CONSTRAINT p_vendor_legal_siup_pkey PRIMARY KEY (t_vendor_legal_siup_id);


--
-- TOC entry 2332 (class 2606 OID 25667)
-- Name: p_vendor_sdm_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_sdm
    ADD CONSTRAINT p_vendor_sdm_pkey PRIMARY KEY (t_vendor_sdm_id);


--
-- TOC entry 2335 (class 2606 OID 25669)
-- Name: p_vendor_teknis_alat_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_alat
    ADD CONSTRAINT p_vendor_teknis_alat_pkey PRIMARY KEY (t_vendor_teknis_alat_id);


--
-- TOC entry 2314 (class 2606 OID 25671)
-- Name: p_vendor_teknis_pengalaman_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_pengalaman
    ADD CONSTRAINT p_vendor_teknis_pengalaman_pkey PRIMARY KEY (t_vendor_teknis_pengalaman_id);


--
-- TOC entry 2317 (class 2606 OID 25673)
-- Name: p_vendor_teknis_sertifikat_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_sertifikat
    ADD CONSTRAINT p_vendor_teknis_sertifikat_pkey PRIMARY KEY (t_vendor_teknis_sertifikat_id);


--
-- TOC entry 2320 (class 2606 OID 25675)
-- Name: p_vendor_teknis_tambahan_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_tambahan
    ADD CONSTRAINT p_vendor_teknis_tambahan_pkey PRIMARY KEY (t_vendor_teknis_tambahan_id);


--
-- TOC entry 2355 (class 2606 OID 82602)
-- Name: sw_status_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY sw_status
    ADD CONSTRAINT sw_status_pkey PRIMARY KEY (id, workflow_id);


--
-- TOC entry 2358 (class 2606 OID 82608)
-- Name: sw_transition_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY sw_transition
    ADD CONSTRAINT sw_transition_pkey PRIMARY KEY (workflow_id, start_status_id, end_status_id);


--
-- TOC entry 2363 (class 2606 OID 82616)
-- Name: sw_workflow_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY sw_workflow
    ADD CONSTRAINT sw_workflow_pkey PRIMARY KEY (id);


--
-- TOC entry 2351 (class 2606 OID 49839)
-- Name: t_evaluasi_vendor_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_evaluasi_vendor
    ADD CONSTRAINT t_evaluasi_vendor_pkey PRIMARY KEY (t_evaluasi_vendor_id);


--
-- TOC entry 2346 (class 2606 OID 33473)
-- Name: t_undangan_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_undangan
    ADD CONSTRAINT t_undangan_pkey PRIMARY KEY (t_undangan_id);


--
-- TOC entry 2279 (class 2606 OID 25677)
-- Name: t_unit_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_unit
    ADD CONSTRAINT t_unit_pkey PRIMARY KEY (p_master_unit_id);


--
-- TOC entry 2324 (class 2606 OID 25679)
-- Name: t_user_unit_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_user_unit
    ADD CONSTRAINT t_user_unit_pkey PRIMARY KEY (t_user_unit_id);


--
-- TOC entry 2327 (class 2606 OID 25681)
-- Name: t_userdata_internal_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_userdata_internal
    ADD CONSTRAINT t_userdata_internal_pkey PRIMARY KEY (t_userdata_internal_id);


--
-- TOC entry 2353 (class 2606 OID 49893)
-- Name: t_vendor_komoditi_harga_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_komoditi_harga
    ADD CONSTRAINT t_vendor_komoditi_harga_pkey PRIMARY KEY (t_vendor_komoditi_harga_id);


--
-- TOC entry 2349 (class 2606 OID 33495)
-- Name: t_verifikasi_vendor_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_verifikasi_vendor
    ADD CONSTRAINT t_verifikasi_vendor_pkey PRIMARY KEY (t_verifikasi_vendor_id);


--
-- TOC entry 2338 (class 2606 OID 25683)
-- Name: user_email_key; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- TOC entry 2340 (class 2606 OID 25685)
-- Name: user_password_reset_token_key; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- TOC entry 2342 (class 2606 OID 25687)
-- Name: user_pkey; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 2344 (class 2606 OID 25689)
-- Name: user_username_key; Type: CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- TOC entry 2238 (class 1259 OID 25690)
-- Name: idx-auth_item-type; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX "idx-auth_item-type" ON auth_item USING btree (type);


--
-- TOC entry 2361 (class 1259 OID 82617)
-- Name: initial_status_id; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX initial_status_id ON sw_workflow USING btree (initial_status_id);


--
-- TOC entry 2249 (class 1259 OID 25691)
-- Name: pk_company_category; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_company_category ON t_company_category USING btree (t_company_category_id);


--
-- TOC entry 2264 (class 1259 OID 25692)
-- Name: pk_contact_person; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_contact_person ON t_contact_person USING btree (t_contact_person_id);


--
-- TOC entry 2252 (class 1259 OID 25693)
-- Name: pk_master_category; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_category ON p_master_category USING btree (p_master_catagory_id);


--
-- TOC entry 2255 (class 1259 OID 25694)
-- Name: pk_master_city; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_city ON p_master_city USING btree (p_master_city_id);


--
-- TOC entry 2258 (class 1259 OID 25695)
-- Name: pk_master_comodity; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_comodity ON p_master_comodity USING btree (p_master_comodity_id);


--
-- TOC entry 2261 (class 1259 OID 25696)
-- Name: pk_master_country; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_country ON p_master_country USING btree (p_master_country_id);


--
-- TOC entry 2267 (class 1259 OID 25697)
-- Name: pk_master_currency; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_currency ON p_master_currency USING btree (p_master_currency_id);


--
-- TOC entry 2270 (class 1259 OID 25698)
-- Name: pk_master_jenis_alat; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_jenis_alat ON p_master_jenis_alat USING btree (p_master_jenis_alat_id);


--
-- TOC entry 2273 (class 1259 OID 25699)
-- Name: pk_master_pemasok; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_pemasok ON p_master_pemasok USING btree (p_master_pemasok_id);


--
-- TOC entry 2276 (class 1259 OID 25700)
-- Name: pk_master_region; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_region ON p_master_region USING btree (p_master_region_id);


--
-- TOC entry 2277 (class 1259 OID 25701)
-- Name: pk_master_unit; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_master_unit ON p_master_unit USING btree (p_master_unit_id);


--
-- TOC entry 2322 (class 1259 OID 25702)
-- Name: pk_user_unit; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_user_unit ON t_user_unit USING btree (t_user_unit_id);


--
-- TOC entry 2325 (class 1259 OID 25703)
-- Name: pk_userdata_internal; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_userdata_internal ON t_userdata_internal USING btree (t_userdata_internal_id);


--
-- TOC entry 2288 (class 1259 OID 25704)
-- Name: pk_vendor_company; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_company ON t_vendor_company USING btree (t_vendor_company_id);


--
-- TOC entry 2285 (class 1259 OID 25705)
-- Name: pk_vendor_company_site; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_company_site ON t_vendor_company_site USING btree (t_vendor_company_site_id);


--
-- TOC entry 2330 (class 1259 OID 25706)
-- Name: pk_vendor_kepengurusan; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_kepengurusan ON t_vendor_kepengurusan USING btree (t_vendor_kepengurusan_id);


--
-- TOC entry 2291 (class 1259 OID 25707)
-- Name: pk_vendor_keu_laporan; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_keu_laporan ON t_vendor_keu_laporan USING btree (t_vendor_keu_laporan_id);


--
-- TOC entry 2294 (class 1259 OID 25708)
-- Name: pk_vendor_keu_modal; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_keu_modal ON t_vendor_keu_modal USING btree (t_vendor_keu_modal_id);


--
-- TOC entry 2297 (class 1259 OID 25709)
-- Name: pk_vendor_keu_rekening; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_keu_rekening ON t_vendor_keu_rekening USING btree (t_vendor_keu_rekening_id);


--
-- TOC entry 2300 (class 1259 OID 25710)
-- Name: pk_vendor_legal_akta; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_legal_akta ON t_vendor_legal_akta USING btree (t_vendor_legal_akta_id);


--
-- TOC entry 2303 (class 1259 OID 25711)
-- Name: pk_vendor_legal_domisili; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_legal_domisili ON t_vendor_legal_domisili USING btree (t_vendor_legal_domisili_id);


--
-- TOC entry 2306 (class 1259 OID 25712)
-- Name: pk_vendor_legal_ijinlain; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_legal_ijinlain ON t_vendor_legal_ijinlain USING btree (t_vendor_legal_ijinlain_id);


--
-- TOC entry 2309 (class 1259 OID 25713)
-- Name: pk_vendor_legal_npwp; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_legal_npwp ON t_vendor_legal_npwp USING btree (t_vendor_legal_npwp_id);


--
-- TOC entry 2312 (class 1259 OID 25714)
-- Name: pk_vendor_legal_siup; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_legal_siup ON t_vendor_legal_siup USING btree (t_vendor_legal_siup_id);


--
-- TOC entry 2333 (class 1259 OID 25715)
-- Name: pk_vendor_sdm; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_sdm ON t_vendor_sdm USING btree (t_vendor_sdm_id);


--
-- TOC entry 2336 (class 1259 OID 25716)
-- Name: pk_vendor_teknis_alat; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_teknis_alat ON t_vendor_teknis_alat USING btree (t_vendor_teknis_alat_id);


--
-- TOC entry 2282 (class 1259 OID 25717)
-- Name: pk_vendor_teknis_komoditi; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_teknis_komoditi ON t_vendor_teknis_komoditi USING btree (t_vendor_teknis_komoditi_id);


--
-- TOC entry 2315 (class 1259 OID 25718)
-- Name: pk_vendor_teknis_pengalaman; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_teknis_pengalaman ON t_vendor_teknis_pengalaman USING btree (t_vendor_teknis_pengalaman_id);


--
-- TOC entry 2318 (class 1259 OID 25719)
-- Name: pk_vendor_teknis_sertifikat; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_teknis_sertifikat ON t_vendor_teknis_sertifikat USING btree (t_vendor_teknis_sertifikat_id);


--
-- TOC entry 2321 (class 1259 OID 25720)
-- Name: pk_vendor_teknis_tambahan; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX pk_vendor_teknis_tambahan ON t_vendor_teknis_tambahan USING btree (t_vendor_teknis_tambahan_id);


--
-- TOC entry 2347 (class 1259 OID 33479)
-- Name: t_undangan_t_undangan_id_idx; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX t_undangan_t_undangan_id_idx ON t_undangan USING btree (t_undangan_id);


--
-- TOC entry 2359 (class 1259 OID 82610)
-- Name: workflow_end_status_id; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX workflow_end_status_id ON sw_transition USING btree (workflow_id, end_status_id);


--
-- TOC entry 2356 (class 1259 OID 82603)
-- Name: workflow_id; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX workflow_id ON sw_status USING btree (workflow_id);


--
-- TOC entry 2360 (class 1259 OID 82609)
-- Name: workflow_start_status_id; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE INDEX workflow_start_status_id ON sw_transition USING btree (workflow_id, start_status_id);


--
-- TOC entry 2364 (class 1259 OID 82622)
-- Name: workflow_status_id; Type: INDEX; Schema: eproc; Owner: eproc
--

CREATE UNIQUE INDEX workflow_status_id ON sw_metadata USING btree (workflow_id, status_id, key);


--
-- TOC entry 2365 (class 2606 OID 25721)
-- Name: auth_assignment_item_name_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_assignment
    ADD CONSTRAINT auth_assignment_item_name_fkey FOREIGN KEY (item_name) REFERENCES auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2367 (class 2606 OID 25726)
-- Name: auth_item_child_child_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_item_child
    ADD CONSTRAINT auth_item_child_child_fkey FOREIGN KEY (child) REFERENCES auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2368 (class 2606 OID 25731)
-- Name: auth_item_child_parent_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_item_child
    ADD CONSTRAINT auth_item_child_parent_fkey FOREIGN KEY (parent) REFERENCES auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2366 (class 2606 OID 25736)
-- Name: auth_item_rule_name_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY auth_item
    ADD CONSTRAINT auth_item_rule_name_fkey FOREIGN KEY (rule_name) REFERENCES auth_rule(name) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- TOC entry 2369 (class 2606 OID 25741)
-- Name: menu_parent_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_parent_fkey FOREIGN KEY (parent) REFERENCES menu(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- TOC entry 2372 (class 2606 OID 25746)
-- Name: p_master_city_fk_master_region_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_city
    ADD CONSTRAINT p_master_city_fk_master_region_fkey FOREIGN KEY (p_master_region_id) REFERENCES p_master_region(p_master_region_id);


--
-- TOC entry 2374 (class 2606 OID 25751)
-- Name: p_master_region_fk_master_country_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY p_master_region
    ADD CONSTRAINT p_master_region_fk_master_country_fkey FOREIGN KEY (p_master_country_id) REFERENCES p_master_country(p_master_country_id);


--
-- TOC entry 2370 (class 2606 OID 25756)
-- Name: t_company_category_fk_master_category_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_company_category
    ADD CONSTRAINT t_company_category_fk_master_category_fkey FOREIGN KEY (p_master_category_id) REFERENCES p_master_category(p_master_catagory_id);


--
-- TOC entry 2371 (class 2606 OID 25761)
-- Name: t_company_category_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_company_category
    ADD CONSTRAINT t_company_category_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2373 (class 2606 OID 25766)
-- Name: t_contact_person_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_contact_person
    ADD CONSTRAINT t_contact_person_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2418 (class 2606 OID 49840)
-- Name: t_evaluasi_vendor_t_vendor_company_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_evaluasi_vendor
    ADD CONSTRAINT t_evaluasi_vendor_t_vendor_company_id_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2419 (class 2606 OID 49845)
-- Name: t_evaluasi_vendor_t_vendor_teknis_komoditi_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_evaluasi_vendor
    ADD CONSTRAINT t_evaluasi_vendor_t_vendor_teknis_komoditi_id_fkey FOREIGN KEY (t_vendor_teknis_komoditi_id) REFERENCES t_vendor_teknis_komoditi(t_vendor_teknis_komoditi_id);


--
-- TOC entry 2416 (class 2606 OID 33474)
-- Name: t_undangan_user_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_undangan
    ADD CONSTRAINT t_undangan_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user"(id);


--
-- TOC entry 2407 (class 2606 OID 25771)
-- Name: t_user_unit_fk_master_unit_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_user_unit
    ADD CONSTRAINT t_user_unit_fk_master_unit_fkey FOREIGN KEY (p_master_unit_id) REFERENCES p_master_unit(p_master_unit_id);


--
-- TOC entry 2408 (class 2606 OID 25776)
-- Name: t_user_unit_fk_user_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_user_unit
    ADD CONSTRAINT t_user_unit_fk_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user"(id);


--
-- TOC entry 2409 (class 2606 OID 25781)
-- Name: t_userdata_internal_fk_user_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_userdata_internal
    ADD CONSTRAINT t_userdata_internal_fk_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user"(id);


--
-- TOC entry 2382 (class 2606 OID 25786)
-- Name: t_vendor_company_fk_user_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company
    ADD CONSTRAINT t_vendor_company_fk_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user"(id);


--
-- TOC entry 2378 (class 2606 OID 25791)
-- Name: t_vendor_company_site_fk_master_city_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company_site
    ADD CONSTRAINT t_vendor_company_site_fk_master_city_fkey FOREIGN KEY (p_master_city_id) REFERENCES p_master_city(p_master_city_id);


--
-- TOC entry 2379 (class 2606 OID 25796)
-- Name: t_vendor_company_site_fk_master_country_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company_site
    ADD CONSTRAINT t_vendor_company_site_fk_master_country_fkey FOREIGN KEY (p_master_country_id) REFERENCES p_master_country(p_master_country_id);


--
-- TOC entry 2380 (class 2606 OID 25801)
-- Name: t_vendor_company_site_fk_master_region_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company_site
    ADD CONSTRAINT t_vendor_company_site_fk_master_region_fkey FOREIGN KEY (p_master_region_id) REFERENCES p_master_region(p_master_region_id);


--
-- TOC entry 2381 (class 2606 OID 25806)
-- Name: t_vendor_company_site_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_company_site
    ADD CONSTRAINT t_vendor_company_site_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2410 (class 2606 OID 25811)
-- Name: t_vendor_kepengurusan_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_kepengurusan
    ADD CONSTRAINT t_vendor_kepengurusan_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2411 (class 2606 OID 25816)
-- Name: t_vendor_kepengurusan_p_master_city_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_kepengurusan
    ADD CONSTRAINT t_vendor_kepengurusan_p_master_city_id_fkey FOREIGN KEY (p_master_city_id) REFERENCES p_master_city(p_master_city_id);


--
-- TOC entry 2412 (class 2606 OID 25821)
-- Name: t_vendor_kepengurusan_p_master_region_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_kepengurusan
    ADD CONSTRAINT t_vendor_kepengurusan_p_master_region_id_fkey FOREIGN KEY (p_master_region_id) REFERENCES p_master_region(p_master_region_id);


--
-- TOC entry 2383 (class 2606 OID 25826)
-- Name: t_vendor_keu_laporan_fk_master_currency_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_laporan
    ADD CONSTRAINT t_vendor_keu_laporan_fk_master_currency_fkey FOREIGN KEY (fk_master_currency) REFERENCES p_master_currency(p_master_currency_id);


--
-- TOC entry 2384 (class 2606 OID 25831)
-- Name: t_vendor_keu_laporan_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_laporan
    ADD CONSTRAINT t_vendor_keu_laporan_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2385 (class 2606 OID 25836)
-- Name: t_vendor_keu_modal_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_modal
    ADD CONSTRAINT t_vendor_keu_modal_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2386 (class 2606 OID 41642)
-- Name: t_vendor_keu_modal_valuta_dasar_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_modal
    ADD CONSTRAINT t_vendor_keu_modal_valuta_dasar_fkey FOREIGN KEY (valuta_dasar) REFERENCES p_master_currency(p_master_currency_id);


--
-- TOC entry 2387 (class 2606 OID 41647)
-- Name: t_vendor_keu_modal_valuta_disetor_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_modal
    ADD CONSTRAINT t_vendor_keu_modal_valuta_disetor_fkey FOREIGN KEY (valuta_disetor) REFERENCES p_master_currency(p_master_currency_id);


--
-- TOC entry 2388 (class 2606 OID 25841)
-- Name: t_vendor_keu_rekening_fk_master_currency_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_rekening
    ADD CONSTRAINT t_vendor_keu_rekening_fk_master_currency_fkey FOREIGN KEY (p_master_currency_id) REFERENCES p_master_currency(p_master_currency_id);


--
-- TOC entry 2389 (class 2606 OID 25846)
-- Name: t_vendor_keu_rekening_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_keu_rekening
    ADD CONSTRAINT t_vendor_keu_rekening_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2421 (class 2606 OID 49899)
-- Name: t_vendor_komoditi_harga_p_master_currency_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_komoditi_harga
    ADD CONSTRAINT t_vendor_komoditi_harga_p_master_currency_id_fkey FOREIGN KEY (p_master_currency_id) REFERENCES p_master_currency(p_master_currency_id);


--
-- TOC entry 2420 (class 2606 OID 49894)
-- Name: t_vendor_komoditi_harga_t_vendor_teknis_komoditi_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_komoditi_harga
    ADD CONSTRAINT t_vendor_komoditi_harga_t_vendor_teknis_komoditi_id_fkey FOREIGN KEY (t_vendor_teknis_komoditi_id) REFERENCES t_vendor_teknis_komoditi(t_vendor_teknis_komoditi_id);


--
-- TOC entry 2390 (class 2606 OID 25851)
-- Name: t_vendor_legal_akta_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_akta
    ADD CONSTRAINT t_vendor_legal_akta_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2391 (class 2606 OID 25856)
-- Name: t_vendor_legal_domisili_fk_master_city_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_domisili
    ADD CONSTRAINT t_vendor_legal_domisili_fk_master_city_fkey FOREIGN KEY (p_master_city_id) REFERENCES p_master_city(p_master_city_id);


--
-- TOC entry 2392 (class 2606 OID 25861)
-- Name: t_vendor_legal_domisili_fk_master_country_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_domisili
    ADD CONSTRAINT t_vendor_legal_domisili_fk_master_country_fkey FOREIGN KEY (p_master_country_id) REFERENCES p_master_country(p_master_country_id);


--
-- TOC entry 2393 (class 2606 OID 25866)
-- Name: t_vendor_legal_domisili_fk_master_region_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_domisili
    ADD CONSTRAINT t_vendor_legal_domisili_fk_master_region_fkey FOREIGN KEY (p_master_region_id) REFERENCES p_master_region(p_master_region_id);


--
-- TOC entry 2394 (class 2606 OID 25871)
-- Name: t_vendor_legal_domisili_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_domisili
    ADD CONSTRAINT t_vendor_legal_domisili_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2395 (class 2606 OID 25876)
-- Name: t_vendor_legal_ijinlain_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_ijinlain
    ADD CONSTRAINT t_vendor_legal_ijinlain_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2396 (class 2606 OID 25881)
-- Name: t_vendor_legal_npwp_fk_master_city_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_npwp
    ADD CONSTRAINT t_vendor_legal_npwp_fk_master_city_fkey FOREIGN KEY (p_master_city_id) REFERENCES p_master_city(p_master_city_id);


--
-- TOC entry 2397 (class 2606 OID 25886)
-- Name: t_vendor_legal_npwp_fk_master_region_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_npwp
    ADD CONSTRAINT t_vendor_legal_npwp_fk_master_region_fkey FOREIGN KEY (p_master_region_id) REFERENCES p_master_region(p_master_region_id);


--
-- TOC entry 2398 (class 2606 OID 25891)
-- Name: t_vendor_legal_npwp_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_npwp
    ADD CONSTRAINT t_vendor_legal_npwp_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2399 (class 2606 OID 25896)
-- Name: t_vendor_legal_siup_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_legal_siup
    ADD CONSTRAINT t_vendor_legal_siup_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2413 (class 2606 OID 25901)
-- Name: t_vendor_sdm_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_sdm
    ADD CONSTRAINT t_vendor_sdm_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2414 (class 2606 OID 25906)
-- Name: t_vendor_teknis_alat_fk_master_jenis_alat_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_alat
    ADD CONSTRAINT t_vendor_teknis_alat_fk_master_jenis_alat_fkey FOREIGN KEY (p_master_jenis_alat_id) REFERENCES p_master_jenis_alat(p_master_jenis_alat_id);


--
-- TOC entry 2415 (class 2606 OID 25911)
-- Name: t_vendor_teknis_alat_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_alat
    ADD CONSTRAINT t_vendor_teknis_alat_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2375 (class 2606 OID 25916)
-- Name: t_vendor_teknis_komoditi_fk_master_comodity_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_komoditi
    ADD CONSTRAINT t_vendor_teknis_komoditi_fk_master_comodity_fkey FOREIGN KEY (p_master_comodity_id) REFERENCES p_master_comodity(p_master_comodity_id);


--
-- TOC entry 2376 (class 2606 OID 25921)
-- Name: t_vendor_teknis_komoditi_fk_master_pemasok_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_komoditi
    ADD CONSTRAINT t_vendor_teknis_komoditi_fk_master_pemasok_fkey FOREIGN KEY (p_master_pemasok_id) REFERENCES p_master_pemasok(p_master_pemasok_id);


--
-- TOC entry 2377 (class 2606 OID 25926)
-- Name: t_vendor_teknis_komoditi_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_komoditi
    ADD CONSTRAINT t_vendor_teknis_komoditi_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2400 (class 2606 OID 25931)
-- Name: t_vendor_teknis_pengalaman_fk_master_currency_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_pengalaman
    ADD CONSTRAINT t_vendor_teknis_pengalaman_fk_master_currency_fkey FOREIGN KEY (p_master_currency_id) REFERENCES p_master_currency(p_master_currency_id);


--
-- TOC entry 2401 (class 2606 OID 25936)
-- Name: t_vendor_teknis_pengalaman_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_pengalaman
    ADD CONSTRAINT t_vendor_teknis_pengalaman_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2402 (class 2606 OID 25941)
-- Name: t_vendor_teknis_sertifikat_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_sertifikat
    ADD CONSTRAINT t_vendor_teknis_sertifikat_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2403 (class 2606 OID 25946)
-- Name: t_vendor_teknis_tambahan_fk_master_city_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_tambahan
    ADD CONSTRAINT t_vendor_teknis_tambahan_fk_master_city_fkey FOREIGN KEY (p_master_city_id) REFERENCES p_master_city(p_master_city_id);


--
-- TOC entry 2404 (class 2606 OID 25951)
-- Name: t_vendor_teknis_tambahan_fk_master_country_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_tambahan
    ADD CONSTRAINT t_vendor_teknis_tambahan_fk_master_country_fkey FOREIGN KEY (p_master_country_id) REFERENCES p_master_country(p_master_country_id);


--
-- TOC entry 2405 (class 2606 OID 25956)
-- Name: t_vendor_teknis_tambahan_fk_master_region_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_tambahan
    ADD CONSTRAINT t_vendor_teknis_tambahan_fk_master_region_fkey FOREIGN KEY (p_master_region_id) REFERENCES p_master_region(p_master_region_id);


--
-- TOC entry 2406 (class 2606 OID 25961)
-- Name: t_vendor_teknis_tambahan_fk_vendor_company_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_vendor_teknis_tambahan
    ADD CONSTRAINT t_vendor_teknis_tambahan_fk_vendor_company_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


--
-- TOC entry 2417 (class 2606 OID 33496)
-- Name: t_verifikasi_vendor_t_vendor_company_id_fkey; Type: FK CONSTRAINT; Schema: eproc; Owner: eproc
--

ALTER TABLE ONLY t_verifikasi_vendor
    ADD CONSTRAINT t_verifikasi_vendor_t_vendor_company_id_fkey FOREIGN KEY (t_vendor_company_id) REFERENCES t_vendor_company(t_vendor_company_id);


-- Completed on 2016-10-03 08:56:48 WIB

--
-- PostgreSQL database dump complete
--

