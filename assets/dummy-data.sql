INSERT INTO Page (title, body, last_modified) VALUES ('Queen', 'We are the champions!', '3');
INSERT INTO Artist (id, genres, year_founded, year_disbanded) VALUES (last_insert_rowid(), 'pop', 1970, 1991);

INSERT INTO Page (title, body, last_modified) VALUES ('Freddie Mercury', 'I am the champion!', '2');
INSERT INTO Artist (id, genres, year_founded, year_disbanded) VALUES (last_insert_rowid(), 'pop', 1970, 1991);
INSERT INTO MemberOfGroup (group_id, member_id) VALUES (1, 2);

INSERT INTO Page (title, body, last_modified) VALUES ('RIT Global Village Pavillion', 'Requires prior approval and registration', '1');
INSERT INTO Venue (id, year_opened) VALUES (last_insert_rowid(), 2000);
