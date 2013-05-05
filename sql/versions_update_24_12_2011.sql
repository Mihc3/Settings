-- Copyright (c) Settings (https://github.com/Mihapro/Settings) --
-- versions
ALTER TABLE `versions`
ADD COLUMN `game` int(11) NOT NULL DEFAULT '0',
DROP PRIMARY KEY,
ADD PRIMARY KEY (`game`, `id`);