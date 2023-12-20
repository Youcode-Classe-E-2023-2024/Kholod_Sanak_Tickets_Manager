create table tag
(
    id_tag  int auto_increment
        primary key,
    libelle varchar(255) not null
);

create table user
(
    id_user      int auto_increment
        primary key,
    username     varchar(255) not null,
    user_email   varchar(255) not null,
    password     varchar(255) not null,
    user_picture longblob     not null
);

create table ticket
(
    id_ticket   int auto_increment
        primary key,
    title       varchar(255) not null,
    description varchar(500) not null,
    priority    varchar(255) not null,
    status      varchar(255) not null,
    date_ticket varchar(50)  not null,
    due_date    varchar(50)  not null,
    assignee    varchar(255) not null,
    user_id     int          null,
    constraint ticket_ibfk_1
        foreign key (user_id) references user (id_user)
);

create table comment
(
    id_cmt    int auto_increment
        primary key,
    comment   varchar(500) not null,
    ticket_id int          null,
    user_id   int          null,
    constraint comment_ibfk_1
        foreign key (ticket_id) references ticket (id_ticket),
    constraint comment_ibfk_2
        foreign key (user_id) references user (id_user)
);

create index ticket_id
    on comment (ticket_id);

create index user_id
    on comment (user_id);

create index user_id
    on ticket (user_id);

create table ticket_tag
(
    ticket_id int not null,
    tag_id    int not null,
    primary key (ticket_id, tag_id),
    constraint ticket_tag_ibfk_1
        foreign key (ticket_id) references ticket (id_ticket),
    constraint ticket_tag_ibfk_2
        foreign key (tag_id) references tag (id_tag)
);

create index tag_id
    on ticket_tag (tag_id);

create table user_ticket
(
    user_id   int not null,
    ticket_id int not null,
    primary key (user_id, ticket_id),
    constraint user_ticket_ibfk_1
        foreign key (user_id) references user (id_user),
    constraint user_ticket_ibfk_2
        foreign key (ticket_id) references ticket (id_ticket)
);

create index ticket_id
    on user_ticket (ticket_id);

