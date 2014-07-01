#!/bin/sh
mysql -u root < /vagrant/database/migration_scripts/drop.sql
mysql -u root < /vagrant/database/migration_scripts/init.sql
mysql -u root project < /vagrant/database/project.sql