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

