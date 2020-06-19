drop table if exists Song;
drop table if exists Album;
drop table if exists Genre;
drop table if exists Artist;

create table if not exists Song (
    song_id int(11) not null auto_increment,
    filename varchar(255) not null,
    title varchar(255) not null,
    dataformat varchar(25) not null,
    track_number int(3),
    playtime_second float,
    
    album_id int(11) null,
    genre_id int(11) not null,  
    artist_id int(11) null,
    primary key (song_id)
);

create table if not exists Album (
    album_id int(11) not null auto_increment,
    name varchar(255) not null,
    year year(4),

    artist_id int(11) not null,
    primary key (album_id)
);

create table if not exists Genre (
    genre_id int(11) not null auto_increment,
    name varchar(20) not null,
    code int(3) not null,

    primary key (genre_id)
);

create table if not exists Artist (
    artist_id int(11) not null auto_increment,
    name varchar(255) not null,

    primary key (artist_id)
);

-- add foreign key (album_id) references Album(album_id)
-- add foreign key (genre_id) references Genre(genre_id)
-- add foreign key (artist_id) references Artist(artist_id)