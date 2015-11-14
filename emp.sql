/*==============================================================*/
/* Database name:  CONCEPTUALDATAMODEL_1                        */
/* DBMS name:      MySQL 3.23                                   */
/* Created on:     13.06.2007 23:35:42                          */
/*==============================================================*/


drop index EMP_DESC_FK on DESCUENTOS;

drop index EMP_CAR_FK on EMPLEADOS;

drop table if exists CARGO;

drop table if exists DESCUENTOS;

drop table if exists EMPLEADOS;

drop table if exists PED_EMP;

drop table if exists PLANILLA;

/*==============================================================*/
/* Table: CARGO                                                 */
/*==============================================================*/
create table if not exists CARGO
(
   ID_CARGO                       int                            not null,
   CARGO                          varchar(50)                    not null,
   DESCRIPCION                    varchar(200),
   SUELDO_BASICO                  numeric(10,2),
   ANTIGUEDAD                     numeric(10,2),
   OTROS                          numeric(10,2),
   DESCUENTOS                     numeric(10,2),
   OBSERVACIONES                  varchar(200),
   primary key (ID_CARGO)
);

/*==============================================================*/
/* Table: DESCUENTOS                                            */
/*==============================================================*/
create table if not exists DESCUENTOS
(
   ID_DESCUENTO                   int                            not null,
   ID_EMPLEADO                    int,
   CONCEPTO_DESCUENTO             varchar(150),
   MONTO_DESCUENTO                numeric(10,2),
   OBSERVACION_DESCUENTO          varchar(200),
   FECHA_DESCUENTO                date,
   primary key (ID_DESCUENTO)
);

/*==============================================================*/
/* Index: EMP_DESC_FK                                           */
/*==============================================================*/
create index EMP_DESC_FK on DESCUENTOS
(
   ID_EMPLEADO
);

/*==============================================================*/
/* Table: EMPLEADOS                                             */
/*==============================================================*/
create table if not exists EMPLEADOS
(
   ID_EMPLEADO                    int                            not null,
   ID_CARGO                       int,
   NOMBRE_EMP                     varchar(50),
   APELLIDO_EMP                   varchar(50),
   DIRECCION_EMP                  varchar(100),
   TELEFONO_EMP                   varchar(30),
   OBSERVACION_EMP                varchar(230),
   primary key (ID_EMPLEADO)
);

/*==============================================================*/
/* Index: EMP_CAR_FK                                            */
/*==============================================================*/
create index EMP_CAR_FK on EMPLEADOS
(
   ID_CARGO
);

/*==============================================================*/
/* Table: PED_EMP                                               */
/*==============================================================*/
create table if not exists PED_EMP
(
   COD_PED                        int,
   NOMBRE_EMPLEADO                varchar(150)
);

/*==============================================================*/
/* Table: PLANILLA                                              */
/*==============================================================*/
create table if not exists PLANILLA
(
   ID_PLANILLA                    int,
   NOMBRE_COMPLETO                varchar(100),
   MONTO_SALARIO                  numeric(10,2),
   OTROS_INGRESOS                 numeric(10,2),
   DESCUENTOS                     numeric(10,2),
   LIQUIDO                        numeric(10,2),
   OBSERVACIONES_P                varchar(200),
   FECHA_PLANILLA                 date
);

