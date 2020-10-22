/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2008                    */
/* Created on:     30/01/2020 13:09:38                          */
/*==============================================================*/


if exists (select 1
            from  sysindexes
           where  id    = object_id('AVOIR')
            and   name  = 'AVOIR2_FK'
            and   indid > 0
            and   indid < 255)
   drop index AVOIR.AVOIR2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('AVOIR')
            and   name  = 'AVOIR_FK'
            and   indid > 0
            and   indid < 255)
   drop index AVOIR.AVOIR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('AVOIR')
            and   type = 'U')
   drop table AVOIR
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CLASSES')
            and   name  = 'ATTRIBUER2_FK'
            and   indid > 0
            and   indid < 255)
   drop index CLASSES.ATTRIBUER2_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CLASSES')
            and   type = 'U')
   drop table CLASSES
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('ELEVES')
            and   name  = 'APPARTENIR_FK'
            and   indid > 0
            and   indid < 255)
   drop index ELEVES.APPARTENIR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('ELEVES')
            and   type = 'U')
   drop table ELEVES
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('MATIERE')
            and   name  = 'ENSEIGNER_FK'
            and   indid > 0
            and   indid < 255)
   drop index MATIERE.ENSEIGNER_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('MATIERE')
            and   type = 'U')
   drop table MATIERE
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PROFESSEUR')
            and   type = 'U')
   drop table PROFESSEUR
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('SALLES_DE_COURS')
            and   name  = 'ATTRIBUER_FK'
            and   indid > 0
            and   indid < 255)
   drop index SALLES_DE_COURS.ATTRIBUER_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('SALLES_DE_COURS')
            and   type = 'U')
   drop table SALLES_DE_COURS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('SUIVRE')
            and   name  = 'SUIVRE2_FK'
            and   indid > 0
            and   indid < 255)
   drop index SUIVRE.SUIVRE2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('SUIVRE')
            and   name  = 'SUIVRE_FK'
            and   indid > 0
            and   indid < 255)
   drop index SUIVRE.SUIVRE_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('SUIVRE')
            and   type = 'U')
   drop table SUIVRE
go

/*==============================================================*/
/* Table: AVOIR                                                 */
/*==============================================================*/
create table AVOIR (
   MAT_ID               numeric(2)           not null,
   ELEVE_ID             int                  not null,
   NOTE                 decimal(2,2)         null,
   constraint PK_AVOIR primary key (MAT_ID, ELEVE_ID)
)
go

/*==============================================================*/
/* Index: AVOIR_FK                                              */
/*==============================================================*/
create index AVOIR_FK on AVOIR (
MAT_ID ASC
)
go

/*==============================================================*/
/* Index: AVOIR2_FK                                             */
/*==============================================================*/
create index AVOIR2_FK on AVOIR (
ELEVE_ID ASC
)
go

/*==============================================================*/
/* Table: CLASSES                                               */
/*==============================================================*/
create table CLASSES (
   CLASSE_NUM           decimal(2,0)         not null,
   SALLE_NUM            decimal(2,0)         not null,
   constraint PK_CLASSES primary key nonclustered (CLASSE_NUM)
)
go

/*==============================================================*/
/* Index: ATTRIBUER2_FK                                         */
/*==============================================================*/
create index ATTRIBUER2_FK on CLASSES (
SALLE_NUM ASC
)
go

/*==============================================================*/
/* Table: ELEVES                                                */
/*==============================================================*/
create table ELEVES (
   ELEVE_ID             int                  not null,
   CLASSE_NUM           decimal(2,0)         not null,
   ELEVE_NOM            varchar(20)          null,
   ELEVE_PRENOM         varchar(20)          null,
   constraint PK_ELEVES primary key nonclustered (ELEVE_ID)
)
go

/*==============================================================*/
/* Index: APPARTENIR_FK                                         */
/*==============================================================*/
create index APPARTENIR_FK on ELEVES (
CLASSE_NUM ASC
)
go

/*==============================================================*/
/* Table: MATIERE                                               */
/*==============================================================*/
create table MATIERE (
   MAT_ID               numeric(2)           not null,
   PROF_ID              numeric(2)           not null,
   MAT_LIBELLE          varchar(30)          null,
   constraint PK_MATIERE primary key nonclustered (MAT_ID)
)
go

/*==============================================================*/
/* Index: ENSEIGNER_FK                                          */
/*==============================================================*/
create index ENSEIGNER_FK on MATIERE (
PROF_ID ASC
)
go

/*==============================================================*/
/* Table: PROFESSEUR                                            */
/*==============================================================*/
create table PROFESSEUR (
   PROF_ID              numeric(2)           not null,
   PROF_NOM             varchar(30)          null,
   constraint PK_PROFESSEUR primary key nonclustered (PROF_ID)
)
go

/*==============================================================*/
/* Table: SALLES_DE_COURS                                       */
/*==============================================================*/
create table SALLES_DE_COURS (
   SALLE_NUM            decimal(2,0)         not null,
   CLASSE_NUM           decimal(2,0)         null,
   constraint PK_SALLES_DE_COURS primary key nonclustered (SALLE_NUM)
)
go

/*==============================================================*/
/* Index: ATTRIBUER_FK                                          */
/*==============================================================*/
create index ATTRIBUER_FK on SALLES_DE_COURS (
CLASSE_NUM ASC
)
go

/*==============================================================*/
/* Table: SUIVRE                                                */
/*==============================================================*/
create table SUIVRE (
   MAT_ID               numeric(2)           not null,
   CLASSE_NUM           decimal(2,0)         not null,
   NBR_HEURE_FIXE       decimal(2,0)         null,
   constraint PK_SUIVRE primary key (MAT_ID, CLASSE_NUM)
)
go

/*==============================================================*/
/* Index: SUIVRE_FK                                             */
/*==============================================================*/
create index SUIVRE_FK on SUIVRE (
MAT_ID ASC
)
go

/*==============================================================*/
/* Index: SUIVRE2_FK                                            */
/*==============================================================*/
create index SUIVRE2_FK on SUIVRE (
CLASSE_NUM ASC
)
go

