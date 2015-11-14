create table if not exists BOTELLONES
(
   CODIGO_BOTELLON                numeric(40,0)                  not null,
   CODIGO_CLIENTE                 numeric(30,0)                  not null,
   NUMERO_BOTELLON                numeric(30,0)                  not null,
   OBSERVACION_ENTREGA            varchar(250),
   EMPLEADO_ENTREGA            varchar(250),
   FECHA_SUS                      date                           not null,
   primary key (CODIGO_BOTELLON)
);


create table if not exists CAMBIOBOTELLON
(
   CODIGO_CBOTELLON              numeric(40,0)                  not null,
   CODIGO_CLIENTE                numeric(30,0)                  not null,
   NUMERO_BOTELLON               varchar(250),
   OBSERVACION_CAMBIO            varchar(250),
   EMPLEADO_CAMBIO               varchar(250),
   FECHA_CAMBIO                      date                           not null,
   primary key (CODIGO_CBOTELLON)
);

