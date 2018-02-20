ALTER ROLE john
  SET search_path
   TO example_schema, public;

ALTER DATABASE board_games
  SET search_path
   TO example_schema, public;


ALTER DEFAULT PRIVILEGES
   IN SCHEMA example_name
GRANT SELECT
   ON TABLES  -- without the ALL keyword, GRANTs also to views
   TO readonly_user;
