/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2008                    */
/* Created on:     31/01/2020 09:32:14                          */
/*==============================================================*/


if exists (select 1
            from  sysindexes
           where  id    = object_id('APPARTENIR')
            and   name  = 'APPARTENIR2_FK'
            and   indid > 0
            and   indid < 255)
   drop index APPARTENIR.APPARTENIR2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('APPARTENIR')
            and   name  = 'APPARTENIR_FK'
            and   indid > 0
            and   indid < 255)
   drop index APPARTENIR.APPARTENIR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('APPARTENIR')
            and   type = 'U')
   drop table APPARTENIR
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CHIENS')
            and   name  = 'AVOIR_MERE_FK'
            and   indid > 0
            and   indid < 255)
   drop index CHIENS.AVOIR_MERE_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CHIENS')
            and   name  = 'AVOIR_FK'
            and   indid > 0
            and   indid < 255)
   drop index CHIENS.AVOIR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CHIENS')
            and   type = 'U')
   drop table CHIENS
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CONCOURS')
            and   type = 'U')
   drop table CONCOURS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PARTICIPER')
            and   name  = 'PARTICIPER2_FK'
            and   indid > 0
            and   indid < 255)
   drop index PARTICIPER.PARTICIPER2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PARTICIPER')
            and   name  = 'PARTICIPER_FK'
            and   indid > 0
            and   indid < 255)
   drop index PARTICIPER.PARTICIPER_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PARTICIPER')
            and   type = 'U')
   drop table PARTICIPER
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PROPRIETAIRES')
            and   type = 'U')
   drop table PROPRIETAIRES
go

/*==============================================================*/
/* Table: APPARTENIR                                            */
/*==============================================================*/
create table APPARTENIR (
   PROP_ID              int                  not null,
   CHIEN_ID             int                  not null,
   DATE_VENTE           datetime             null,
   constraint PK_APPARTENIR primary key (PROP_ID, CHIEN_ID)
)
go

/*==============================================================*/
/* Index: APPARTENIR_FK                                         */
/*==============================================================*/
create index APPARTENIR_FK on APPARTENIR (
PROP_ID ASC
)
go

/*==============================================================*/
/* Index: APPARTENIR2_FK                                        */
/*==============================================================*/
create index APPARTENIR2_FK on APPARTENIR (
CHIEN_ID ASC
)
go

/*==============================================================*/
/* Table: CHIENS                                                */
/*==============================================================*/
create table CHIENS (
   CHIEN_ID             int                  not null,
   CHIEN_DECES          datetime             null,
   CHIEN_NOM            varchar(20)          null,
   CHIEN_MATRICULE      numeric(6)           null,
   CHIEN_RACE           varchar(20)          null,
   CHIEN_NAISSANCE      datetime             null,
   CHIEN_SEXE           char(1)              null,
   CHIEN_ACHAT          datetime             null,
   CHIEN_PERE_ID        numeric(4)           null,
   CHIEN_MERE_ID        numeric(5)           null,
   constraint PK_CHIENS primary key nonclustered (CHIEN_ID)
)
go

/*==============================================================*/
/* Index: AVOIR_FK                                              */
/*==============================================================*/
create index AVOIR_FK on CHIENS (
CHIEN_PERE_ID ASC
)
go

/*==============================================================*/
/* Index: AVOIR_MERE_FK                                         */
/*==============================================================*/
create index AVOIR_MERE_FK on CHIENS (
CHIEN_MERE_ID ASC
)
go

/*==============================================================*/
/* Table: CONCOURS                                              */
/*==============================================================*/
create table CONCOURS (
   CONC_ID              int                  not null,
   CONC_TYPE            varchar(30)          null,
   CONC_VILLE           varchar(30)          null,
   CONC_DATE            datetime             null,
   constraint PK_CONCOURS primary key nonclustered (CONC_ID)
)
go

/*==============================================================*/
/* Table: PARTICIPER                                            */
/*==============================================================*/
create table PARTICIPER (
   CHIEN_ID             int                  not null,
   CONC_ID              int                  not null,
   constraint PK_PARTICIPER primary key (CHIEN_ID, CONC_ID)
)
go

/*==============================================================*/
/* Index: PARTICIPER_FK                                         */
/*==============================================================*/
create index PARTICIPER_FK on PARTICIPER (
CHIEN_ID ASC
)
go

/*==============================================================*/
/* Index: PARTICIPER2_FK                                        */
/*==============================================================*/
create index PARTICIPER2_FK on PARTICIPER (
CONC_ID ASC
)
go

/*==============================================================*/
/* Table: PROPRIETAIRES                                         */
/*==============================================================*/
create table PROPRIETAIRES (
   PROP_ID              int                  not null,
   PROP_NOM             varchar(30)          null,
   PROP_ADRESSE         varchar(100)         null,
   constraint PK_PROPRIETAIRES primary key nonclustered (PROP_ID)
)
go

