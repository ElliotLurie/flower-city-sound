PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Venue;
DROP TABLE IF EXISTS Artist;
DROP TABLE IF EXISTS Page;
DROP TABLE IF EXISTS MemberOfGroup;
DROP TABLE IF EXISTS Event;
DROP TABLE IF EXISTS ArtistAtEvent;
DROP TABLE IF EXISTS EventAtVenue;

CREATE TABLE Page (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  body TEXT NOT NULL,
  external_links TEXT,
  last_modified TEXT NOT NULL,
  sources TEXT,
  thumbnail BLOB,
  title TEXT NOT NULL UNIQUE
);

CREATE TABLE Photo (
  page_id INT NOT NULL,
  caption TEXT NOT NULL,
  credits TEXT NOT NULL,
  data BLOB NOT NULL,
  FOREIGN KEY (page_id) REFERENCES Page (id),
  PRIMARY KEY (page_id)
);

CREATE TABLE Artist (
  id INT NOT NULL PRIMARY KEY,
  genres TEXT,
  labels TEXT,
  publishers TEXT,
  types TEXT,
  year_disbanded INT,
  year_founded INT NOT NULL,
  FOREIGN KEY (id) REFERENCES Page (id)
);

CREATE TABLE MemberOfGroup (
  group_id INT NOT NULL,
  member_id INT NOT NULL,
  FOREIGN KEY (group_id) REFERENCES Artist (id),
  FOREIGN KEY (member_id) REFERENCES Artist (id),
  PRIMARY KEY (group_id, member_id)
);

CREATE TABLE Event (
  id INT NOT NULL PRIMARY KEY,
  date_start TEXT NOT NULL,
  date_end TEXT,
  entry_fee REAL,
  genres TEXT,
  time_start TEXT,
  time_end TEXT,
  type TEXT CHECK (type IN ('concert', 'meet')),
  FOREIGN KEY (id) REFERENCES Page (id)
);

CREATE TABLE ArtistAtEvent (
  artist_id INT NOT NULL,
  event_id INT NOT NULL,
  FOREIGN KEY (artist_id) REFERENCES Artist (id),
  FOREIGN KEY (event_id) REFERENCES Event (id),
  PRIMARY KEY (artist_id, event_id)
);

CREATE TABLE Venue (
  id INT NOT NULL PRIMARY KEY,
  access_features TEXT,
  address TEXT,
  age TEXT,
  contact TEXT,
  food INT,
  genres TEXT,
  hours TEXT,
  stage_size TEXT,
  space_type CHECK (space_type IN ('indoors', 'covered', 'outdoors')),
  year_closed INT,
  year_opened INT NOT NULL,
  FOREIGN KEY (id) REFERENCES Page (id)
);

CREATE TABLE EventAtVenue (
  event_id INT NOT NULL,
  venue_id INT NOT NULL,
  FOREIGN KEY (event_id) REFERENCES Event (id),
  FOREIGN KEY (venue_id) REFERENCES Venue (id),
  PRIMARY KEY (event_id, venue_id)
);
