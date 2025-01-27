PRAGMA foreign_keys = ON;

CREATE TABLE Page (
  id INT NOT NULL PRIMARY KEY,
  bio TEXT NOT NULL,
  external_links TEXT,
  last_modified TEXT NOT NULL,
  sources TEXT
);

CREATE TABLE Artist (
  id INT NOT NULL PRIMARY KEY,
  genres TEXT,
  publishers TEXT,
  FOREIGN KEY (id) REFERENCES Page (id)
);

CREATE TABLE Event (
  id INT NOT NULL PRIMARY KEY,
  time TEXT,
  type TEXT CHECK (type IN ('concert', 'meet')),
  FOREIGN KEY (id) REFERENCES Page (id)
);

CREATE TABLE Venue (
  id INT NOT NULL PRIMARY KEY,
  address TEXT,
  hours TEXT,
  FOREIGN KEY (id) REFERENCES Page (id)
);

CREATE TABLE MemberOfGroup (
  group_id INT NOT NULL,
  member_id INT NOT NULL,
  FOREIGN KEY (group_id) REFERENCES Artist (id),
  FOREIGN KEY (member_id) REFERENCES Artist (id),
  PRIMARY KEY (group_id, member_id)
);

CREATE TABLE ArtistAtEvent (
  artist_id INT NOT NULL,
  event_id INT NOT NULL,
  FOREIGN KEY (artist_id) REFERENCES Artist (id),
  FOREIGN KEY (event_id) REFERENCES Event (id),
  PRIMARY KEY (artist_id, event_id)
);

CREATE TABLE EventAtVenue (
  event_id INT NOT NULL,
  venue_id INT NOT NULL,
  FOREIGN KEY (event_id) REFERENCES Event (id),
  FOREIGN KEY (venue_id) REFERENCES Venue (id),
  PRIMARY KEY (event_id, venue_id)
);
