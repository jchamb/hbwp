#!/bin/sh

# Remote server info
remoteUser=fxstage
remoteHost=webpagefxstage.com

# DB Info
dbUser=fxstage_foley
dbPass=986#TUTxW~ZX
dbHost=localhost
dbName=fxstage_foley


# Backup options
backupName=/home/fxstage/backup/"$dbName".sql
downloadName=~/sites/foley/database/project.sql


uploadsDir=/home/fxstage/deploy/foley/current/www/content/uploads
uploadsBackup=/home/fxstage/deploy/foley/current/www/content/uploads.tar
uploadsDownload=~/sites/foley/www/content/uploads.tar

# Login to remote computer and run backup.
echo "Logging into $remoteHost"
ssh -l "$remoteUser" "$remoteHost" "

       # Run the mysql backup
       echo "Running MySQL backup.  This may take awhile…"
       mysqldump -u"$dbUser" -p"$dbPass" --opt -h"$dbHost" "$dbName" > "$backupName"
       echo "Backup complete."

       cd "$uploadsDir"/..
       echo "Create Uploads Archive."
       tar -cvf uploads.tar uploads/


       # Close the session
       exit;
"

# Copy the new database backup from remote host to current computer.
echo "Downloading $backupName to $downloadName"
scp "$remoteUser"@"$remoteHost":"$backupName" "$downloadName"
echo "Download complete."


echo "Loading to Local..."
vagrant ssh -c '
    mysql -u root < /vagrant/database/migration_scripts/drop.sql
    mysql -u root < /vagrant/database/migration_scripts/init.sql
    mysql -u root project < /vagrant/database/project.sql

    echo "Migrating URLS..."
    php /vagrant/database/migration_scripts/migrate.php
'


echo "Downloading $uploadsBackup to $uploadsDownload"
scp "$remoteUser"@"$remoteHost":"$uploadsBackup" "$uploadsDownload"
echo "Download complete."

echo "Extracting Uploads."
tar -xvf "$uploadsDownload" -C ~/sites/foley/www/content
echo "Extracting Complete."
echo "All Done."