#!/bin/bash

# Run Sass after the sync folders have been mounted
cd /var/www/cronkeep.com/src/public/;
screen -S sass -d -m sudo -u www-data /usr/local/bin/sass \
	--watch sass:css \
	--style expanded \
	--unix-newlines \
	--sourcemap=none | logger -tsass
