-- versions
ALTER TABLE `versions`
ADD COLUMN `game`  int(11) NULL FIRST ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`game_index`, `id`);