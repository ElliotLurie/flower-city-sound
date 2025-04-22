DELETE FROM Page;
DELETE FROM Artist;
DELETE FROM MemberOfGroup;
DELETE FROM Venue;

INSERT INTO Page (title, body, last_modified) VALUES ('Queen', 'We are the champions!', '3');
INSERT INTO Artist (id, genres, year_founded, year_disbanded) VALUES (last_insert_rowid(), 'pop', 1970, 1991);

INSERT INTO Page (title, body, last_modified) VALUES ('Freddie Mercury', 'I am the champion!', '2');
INSERT INTO Artist (id, genres, year_founded, year_disbanded) VALUES (last_insert_rowid(), 'pop', 1970, 1991);
INSERT INTO MemberOfGroup (group_id, member_id) VALUES (1, 2);

INSERT INTO Page (title, body, last_modified) VALUES ('RIT Parking Lot', 'No registration required :D', '1');
INSERT INTO Venue (id, year_opened) VALUES (last_insert_rowid(), 1960);

INSERT INTO Page (title, body, last_modified) VALUES ('RIT Global Village Pavillion', 'Requires prior approval and registration', '0');
INSERT INTO Venue (id, year_opened) VALUES (last_insert_rowid(), 2000);
INSERT INTO Photo (page_id, caption, credits, data) VALUES ((SELECT MAX (id) FROM Page), 'Parking lot', 'Some guy', readfile('assets/images/placeholder_img.jpg'));
