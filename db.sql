create table cidade
(
    id   int auto_increment
        primary key,
    nome varchar(200) not null
);

create table bairro
(
    id        int          not null
        primary key,
    nome      varchar(200) null,
    cidade_id int          null,
    constraint cidade_id
        foreign key (cidade_id) references cidade (id)
            on update cascade on delete cascade
);

create table cliente
(
    id            int auto_increment
        primary key,
    primeiro_nome varchar(40)     not null,
    segundo_nome  varchar(100)    null,
    genero        enum ('F', 'M') not null,
    id_bairro     int             not null,
    constraint id_bairro
        foreign key (id_bairro) references bairro (id)
            on update cascade on delete cascade
);

create table material
(
    id        int auto_increment
        primary key,
    nome      varchar(200) not null,
    descricao text         null,
    valor     float        not null
);

create table servico
(
    id        int auto_increment
        primary key,
    nome      varchar(200) not null,
    descricao text         null
);

create table tipo_equipamento
(
    id   int auto_increment
        primary key,
    nome varchar(20) not null
);

create table equipamento
(
    id            int auto_increment
        primary key,
    nome          varchar(30) not null,
    dt_fabricacao timestamp   null,
    serial        varchar(30) null,
    id_cliente    int         not null,
    id_tipo       int         null,
    constraint id_tipo
        foreign key (id_tipo) references tipo_equipamento (id)
            on update cascade on delete cascade
);

create table cliente_equipamento
(
    id             int auto_increment
        primary key,
    id_equipamento int not null,
    id_cliente     int not null,
    constraint client_id
        foreign key (id_cliente) references cliente (id)
            on update cascade on delete cascade,
    constraint id_equipamento
        foreign key (id_equipamento) references equipamento (id)
            on update cascade on delete cascade
);

create table ordem_servico
(
    id             int auto_increment
        primary key,
    dt_entrada     timestamp default current_timestamp() not null on update current_timestamp(),
    dt_saida       timestamp                             null,
    valor_total    float                                 null,
    id_servico     int                                   not null,
    descricao      text                                  null,
    id_equipamento int                                   not null,
    id_material    int                                   not null,
    constraint id_equi
        foreign key (id_equipamento) references equipamento (id)
            on update cascade on delete cascade,
    constraint id_material
        foreign key (id_material) references material (id)
            on update cascade on delete cascade,
    constraint id_servico
        foreign key (id_servico) references servico (id)
            on update cascade on delete cascade
);

