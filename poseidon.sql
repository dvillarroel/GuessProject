/*==============================================================*/
/* Database name:  MODELO_POSEIDON                              */
/* DBMS name:      MySQL 3.23                                   */
/* Created on:     04/10/2006 13:45:00                          */
/*==============================================================*/


drop index RELATIONSHIP_8_FK on DETALLE_PEDIDO;

drop index RELATIONSHIP_9_FK on DETALLE_PEDIDO;

drop index EMP_USR_FK on EMPLEADO;

drop index CLIEN_EQUI_FK on EQUIPO;

drop index RELATIONSHIP_7_FK on PEDIDO;

drop index USER_PEDIDO_FK on PEDIDO;

drop table if exists CLIENTE;

drop table if exists COSTOS;

drop table if exists DETALLE_PEDIDO;

drop table if exists EMPLEADO;

drop table if exists EQUIPO;

drop table if exists PEDIDO;

drop table if exists PRODUCTO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table if not exists CLIENTE
(
   CODIGO_CLIENTE                 numeric(40,0)                  not null,
   CI_CLIENTE                     numeric(30,0)                  not null,
   NOMBRE_CLIENTE                 varchar(30)                    not null,
   APELLIDO_PATERNO               varchar(30)                    not null,
   APELLIDO_MATERNO               varchar(45),
   DIRECCION_CLIENTE              varchar(40)                    not null,
   TELEFONO_CLIENTE               numeric(15,0),
   E_MAIL                         varchar(25),
   FECHA_SUS                      date                           not null,
   ESTADO                         varchar(30),
   OBSERVACIONES_CLIENTE          varchar(100),
   primary key (CODIGO_CLIENTE)
);

/*==============================================================*/
/* Table: COSTOS                                                */
/*==============================================================*/
create table if not exists COSTOS
(
   ID_COSTO                       integer                        not null,
   COD_USUARIO                    numeric(30,0),
   TIPO_COSTO                     varchar(150)                   not null,
   MONTO_COSTO                    numeric(10,2) zerofill         not null,
   FECHA_COSTO                    date                           not null,
   primary key (ID_COSTO)
);

/*==============================================================*/
/* Table: DETALLE_PEDIDO                                        */
/*==============================================================*/
create table if not exists DETALLE_PEDIDO
(
   CANTIDAD                       numeric(30,0)                  not null,
   MONTO                          numeric(30,2)                  not null,
   PRECIO_UNITARIO                numeric(30,2)                  not null,
   COD_DP                         numeric(30,0)                  not null,
   COD_PEDIDO                     numeric(30,0)                  not null,
   COD_PRODUCTO                   numeric(30,0)                  not null,
   COD_EQUIPO                     numeric(30,0),
   primary key (COD_DP)
);

/*==============================================================*/
/* Index: RELATIONSHIP_8_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_8_FK on DETALLE_PEDIDO
(
   COD_PEDIDO
);

/*==============================================================*/
/* Index: RELATIONSHIP_9_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_9_FK on DETALLE_PEDIDO
(
   COD_PRODUCTO
);

/*==============================================================*/
/* Table: EMPLEADO                                              */
/*==============================================================*/
create table if not exists EMPLEADO
(
   CI                             numeric(30,0)                  not null,
   COD_USUARIO                    numeric(30,0)                  not null,
   NOMBRE_EMP                     varchar(30)                    not null,
   APELLIDOP                      varchar(30)                    not null,
   APELLIDOM                      varchar(30)                    not null,
   DIRECCION_CLIENTE              varchar(40)                    not null,
   CARGO                          varchar(30)                    not null,
   primary key (CI)
);

/*==============================================================*/
/* Index: EMP_USR_FK                                            */
/*==============================================================*/
create index EMP_USR_FK on EMPLEADO
(
   COD_USUARIO
);

/*==============================================================*/
/* Table: EQUIPO                                                */
/*==============================================================*/
create table if not exists EQUIPO
(
   COD_EQUIPO                     numeric(30,0)                  not null,
   CODIGO_CLIENTE                 numeric(40,0)                  not null,
   TIPO_DE_EQUIPO                 varchar(50)                    not null,
   CONDICION_ENTREGA              varchar(50)                    not null,
   TIPO_GARANTIA                  varchar(50),
   PRECIO_EQUIPO                  numeric(15,0),
   FECHA_REGISTRO_EQUIPO          date                           not null,
   OBSERVACIONES_EQUIPO           varchar(100)                   not null,
   PROPIEDAD_EQUIPO               varchar(30),
   primary key (COD_EQUIPO)
);

/*==============================================================*/
/* Index: CLIEN_EQUI_FK                                         */
/*==============================================================*/
create index CLIEN_EQUI_FK on EQUIPO
(
   CODIGO_CLIENTE
);

/*==============================================================*/
/* Table: PEDIDO                                                */
/*==============================================================*/
create table if not exists PEDIDO
(
   COD_PEDIDO                     numeric(30,0)                  not null,
   COD_USUARIO                    numeric(30,0)                  not null,
   CODIGO_CLIENTE                 numeric(40,0)                  not null,
   FECHA                          date                           not null,
   MONTO_TOTAL                    numeric(30,2)                  not null,
   ESTADO                         varchar(30)                    not null,
   OBSERVACIONES_PEDIDO           varchar(200),
   primary key (COD_PEDIDO)
);

/*==============================================================*/
/* Index: RELATIONSHIP_7_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_7_FK on PEDIDO
(
   CODIGO_CLIENTE
);

/*==============================================================*/
/* Index: USER_PEDIDO_FK                                        */
/*==============================================================*/
create index USER_PEDIDO_FK on PEDIDO
(
   COD_USUARIO
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table if not exists PRODUCTO
(
   COD_PRODUCTO                   numeric(30,0)                  not null,
   NOMBRE_PRODUCTO                varchar(30)                    not null,
   PRECIO_UNITARIO                numeric(30,2)                  not null,
   N_EQUIPO                       varchar(10)                    not null,
   OBSERVACIONES_PRODUCTO         varchar(200),
   ESTADO_PRODUCTO                varchar(30),
   primary key (COD_PRODUCTO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table if not exists USUARIO
(
   COD_USUARIO                    numeric(30,0)                  not null,
   LOGIN                          varchar(30)                    not null,
   PASS                           varchar(30)                    not null,
   ESTADO                         varchar(30)                    not null,
   primary key (COD_USUARIO)
);

