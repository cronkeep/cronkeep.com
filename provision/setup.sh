#!/bin/bash
#
# Copyright 2014 Bogdan Ghervan
# 
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

echo "Provisioning virtual machine..."

echo "Installing application stack..."
apt-get update
apt-get install -y apache2 libapache2-mod-php5 screen git

echo "Configuring virtual host..."
cp /var/www/cronkeep.com/provision/virtual-host.conf /etc/apache2/sites-available/cronkeep.com.conf
a2ensite cronkeep.com
a2enmod rewrite
service apache2 reload

echo "Installing Composer..."
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
composer install

echo "Installing Sass..."
gem install sass
screen -S sass -d -m sass --watch /var/www/cronkeep.com/src/public/sass:/var/www/cronkeep.com/src/public/css \
	--style expanded \
	--unix-newlines \
	--sourcemap=none

echo "Finished provisioning."
