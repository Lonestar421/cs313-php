CREATE TABLE person
(
  person_id SERIAL PRIMARY KEY,
  username TEXT NOT NULL,
  password TEXT NOT NULL
);

CREATE TABLE game
(
  game_id SERIAL PRIMARY KEY,
  title TEXT NOT NULL,
  duration INTEGER NOT NULL,
  number_of_players INTEGER NOT NULL,
  description TEXT NOT NULL,
  links TEXT NOT NULL
);

CREATE TABLE game_type
(
  game_type_id SERIAL PRIMARY KEY,
  name TEXT NOT NULL,
  description TEXT NOT NULL
);

CREATE TABLE favorite_games
(
  person_id INTEGER NOT NULL REFERENCES person (person_id),
  game_id INTEGER NOT NULL REFERENCES game (game_id),
  PRIMARY KEY (person_id, game_id)
);

CREATE TABLE games_and_types
(
  game_type_id INTEGER NOT NULL REFERENCES game_type (game_type_id),
  game_id INTEGER NOT NULL REFERENCES game (game_id),
  PRIMARY KEY (game_type_id, game_id)
);
