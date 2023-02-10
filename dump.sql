create sequence users_id_seq
    as integer;

alter sequence users_id_seq owner to dbuser;

create sequence opinions_id_seq
    as integer;

alter sequence opinions_id_seq owner to dbuser;

create sequence restaurants_id_seq
    as integer;

alter sequence restaurants_id_seq owner to dbuser;

create table if not exists users
(
    id_user  integer default nextval('users_id_seq'::regclass) not null
    primary key
    unique,
    name     varchar(100)                                      not null,
    surname  varchar(100)                                      not null,
    email    varchar(255)                                      not null,
    password varchar(255)                                      not null
    );

alter table users
    owner to dbuser;

alter sequence users_id_seq owned by users.id_user;

create table if not exists restaurants
(
    id_restaurant integer default nextval('restaurants_id_seq'::regclass) not null
    primary key
    constraint restaurants_id_key
    unique,
    name          varchar(100)                                            not null
    );

alter table restaurants
    owner to dbuser;

alter sequence restaurants_id_seq owned by restaurants.id_restaurant;

create table if not exists opinions
(
    id_opinion    integer default nextval('opinions_id_seq'::regclass) not null,
    description   text                                                 not null,
    created_at    date                                                 not null,
    id_restaurant integer                                              not null
    constraint opinions_restaurants_id_restaurant_fk
    references restaurants
    on update cascade on delete cascade,
    id_user       integer                                              not null
    constraint opinions_users_id_user_fk
    references users
    on update cascade on delete cascade
    );

alter table opinions
    owner to dbuser;

alter sequence opinions_id_seq owned by opinions.id_opinion;

create table if not exists sessions
(
    id_session  serial
    primary key,
    id_user     integer not null
    constraint sessions_users_id_user_fk
    references users
    on update cascade on delete cascade,
    login_time  timestamp,
    logout_time timestamp
);

alter table sessions
    owner to dbuser;

create or replace view all_restaurant(id_restaurant, name) as
SELECT restaurants.id_restaurant,
       restaurants.name
FROM restaurants;

alter table all_restaurant
    owner to dbuser;

create or replace function uuid_nil() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_nil() owner to dbuser;

create or replace function uuid_ns_dns() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_dns() owner to dbuser;

create or replace function uuid_ns_url() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_url() owner to dbuser;

create or replace function uuid_ns_oid() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_oid() owner to dbuser;

create or replace function uuid_ns_x500() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_x500() owner to dbuser;

create or replace function uuid_generate_v1() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v1() owner to dbuser;

create or replace function uuid_generate_v1mc() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v1mc() owner to dbuser;

create or replace function uuid_generate_v3(namespace uuid, name text) returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v3(uuid, text) owner to dbuser;

create or replace function uuid_generate_v4() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v4() owner to dbuser;

create or replace function uuid_generate_v5(namespace uuid, name text) returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v5(uuid, text) owner to dbuser;

insert into opinions (id_opinion, description, created_at, id_restaurant, id_user)
values  (11, 'dobre jedzenie', '2023-02-08', 3, 3),
        (12, 'złe jedzenie', '2023-02-09', 3, 3),
        (13, '12321', '2023-02-08', 2, 3),
        (14, '12321', '2023-02-08', 2, 3),
        (15, 'dobra sliwka', '2023-02-08', 2, 3),
        (16, '123', '2023-02-08', 3, 3),
        (17, 'dobra sliweczka', '2023-02-08', 2, 3),
        (18, 'dobra sliwunia', '2023-02-08', 2, 3),
        (19, 'elo', '2023-02-08', 2, 3);

insert into restaurants (id_restaurant, name)
values  (2, 'Śliwka'),
        (3, 'Pizza'),
        (4, 'Smacznie i tanio'),
        (5, 'Zapiekanki'),
        (6, 'Lody'),
        (7, 'GoodLood');

insert into sessions (id_session, id_user, login_time, logout_time)
values  (1, 3, '2023-02-08 14:54:07.000000', '2023-02-08 15:14:39.000000'),
        (2, 3, '2023-02-08 15:06:40.000000', '2023-02-08 15:14:39.000000'),
        (3, 3, '2023-02-08 15:14:46.000000', '2023-02-08 15:14:48.000000'),
        (4, 3, '2023-02-08 15:15:04.000000', '2023-02-08 15:15:09.000000'),
        (5, 3, '2023-02-08 15:16:06.000000', '2023-02-08 15:24:59.000000'),
        (6, 3, '2023-02-08 15:25:18.000000', '2023-02-08 15:25:31.000000'),
        (7, 3, '2023-02-08 15:38:07.000000', '2023-02-08 15:38:09.000000'),
        (8, 3, '2023-02-08 15:38:40.000000', '2023-02-08 15:38:43.000000'),
        (9, 3, '2023-02-08 15:40:01.000000', '2023-02-08 15:56:07.000000'),
        (10, 3, '2023-02-08 15:56:17.000000', null),
        (11, 3, '2023-02-08 16:28:48.000000', null),
        (12, 3, '2023-02-08 17:01:50.000000', null),
        (13, 3, '2023-02-08 17:32:51.000000', null),
        (14, 3, '2023-02-08 18:12:18.000000', null),
        (15, 3, '2023-02-08 18:49:02.000000', null),
        (16, 3, '2023-02-08 19:32:54.000000', null);

insert into users (id_user, name, surname, email, password)
values  (3, 'Tomasz', 'Rolek', 'tomasz.rolek.19@gmail.com', '22e0d511a6eac3369aca3a8b820c0ef89ca7a3f0');

