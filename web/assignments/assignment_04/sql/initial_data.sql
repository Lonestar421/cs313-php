INSERT INTO person (username, password)
VALUES
('grant', 'grant');

INSERT INTO game (title, duration, number_of_players, description, links)
VALUES
('Walk the Plank', 15, 5, 'Wacky game of pushing!', 'https://'),
('Coup', 15, 8, 'Bluffing game', 'https://'),
('BANG: The Dice Game', 20, 6, 'Battles in the wild west', 'https://');

INSERT INTO game_type (name, description)
VALUES
('Social Deduction', 'Players try to find out who each other are.'),
('Party Game', 'Light humored game that is quick to learn and play.');

INSERT INTO favorite_games (person_id, game_id)
VALUES
(1, 1),
(1, 2),
(1, 3);

INSERT INTO games_and_types (game_type_id, game_id)
VALUES
(2, 1),
(1, 2),
(1, 3),
(2, 3);
