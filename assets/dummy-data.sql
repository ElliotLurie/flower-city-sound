INSERT INTO Page (title, blurb, body, last_modified) VALUES ('Queen', 'British band', 'We are the champions!', 'Now');
INSERT INTO Artist (id, genres, year, active) VALUES (last_insert_rowid(), 'pop', 1970, 0);

INSERT INTO Page (title, blurb, body, last_modified) VALUES ('Freddie Mercury', 'British man', 'I am the champion!', 'Now');
INSERT INTO Artist (id, genres, year, active) VALUES (last_insert_rowid(), 'pop', 1970, 0);
INSERT INTO MemberOfGroup (group_id, member_id) VALUES (1, 2);

INSERT INTO Page (title, blurb, body, last_modified) VALUES ('RIT Global Village Pavillion', 'College venue', 'Requires prior approval and registration', 'Now');
INSERT INTO Venue (id, open, year) VALUES (last_insert_rowid(), 1, 2025);
