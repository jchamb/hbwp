###########################################################
#     Initial Update
###########################################################
exec { "apt-get update":
  command => "/usr/bin/apt-get update"
}

###########################################################
#     Hosts File
###########################################################
file { "/etc/hosts":
  ensure  => file,
  mode    => 644,
  source  => "/vagrant/config/hosts",
}


###########################################################
#     Mail Setup
###########################################################
package { "sendmail":
  ensure => present,
  require => Exec["apt-get update"],
}

file { "/etc/mail/sendmail.conf":
  ensure  => file,
  mode    => 644,
  source  => "/vagrant/config/sendmail.conf",
  require => Package["sendmail"],
}

###########################################################
#     Apache
###########################################################
package { "apache2":
  ensure => present,
  require => Exec["apt-get update"],
}

file { "/etc/apache2/envvars":
  ensure  => file,
  mode    => 644,
  source  => "/vagrant/config/apache-envvars",
  require => Package["apache2"],
  notify  => Service["apache2"],
}

file { "/etc/apache2/sites-available/default":
  ensure  => file,
  mode    => 644,
  source  => "/vagrant/config/apache-default-site",
  require => Package["apache2"],
  notify  => Service["apache2"],
}

exec { "a2enmod rewrite":
  command => "/usr/sbin/a2enmod rewrite",
  require => Package["apache2"],
  notify  => Service["apache2"],
}

exec { "a2enmod env":
  command => "/usr/sbin/a2enmod env",
  require => Package["apache2"],
  notify  => Service["apache2"],
}

service { "apache2":
  ensure => running,
  require => Package["apache2"],
}

file { "/var/www":
  ensure => link,
  mode => 0777,
  target => "/vagrant/www",
  notify => Service["apache2"],
  force  => true,
}

###########################################################
#     PHP
###########################################################
package { "php5":
  ensure => present,
  require => Exec["apt-get update"],
}

package { "libapache2-mod-php5":
  ensure => present,
  require => [ Package["php5"], Package["apache2"] ],
  notify => Service["apache2"],
}

package { "php5-curl":
  ensure => present,
  require => Package["libapache2-mod-php5"],
  notify => Service["apache2"],
}

file { "/etc/php5/apache2/php.ini":
  ensure => file,
  mode   => 644,
  source => "/vagrant/config/php.ini",
  require => [ Package["php5"], Package["apache2"] ],
  notify => Service["apache2"],
}

###########################################################
#     MySQL
###########################################################
package {"mysql-server":
  ensure => present,
  require => Exec["apt-get update"],
}

file { "/etc/mysql/my.cnf":
  ensure  => file,
  mode    => 644,
  source  => "/vagrant/config/mysql-my.cnf",
  require => Package["mysql-server"],
  notify  => Service["mysql"],
}

service { "mysql":
  ensure    => running,
  require   => Package["mysql-server"],
}

package { "php5-mysql":
  ensure => present,
  require => [ Package["php5"], Package["mysql-server"] ],
  notify => [ Service["apache2"], Service["mysql"] ],
}

###########################################################
#     PHPMyAdmin
###########################################################

package { "phpmyadmin":
  ensure => present,
  require => [ Package["php5-mysql"] ],
  notify => [ Service["apache2"], Service["mysql"] ],
}

file { "/etc/apache2/conf.d/phpmyadmin.conf":
  ensure => link,
  target => "/etc/phpmyadmin/apache.conf",
  require => Package['phpmyadmin'],
  notify => Service["apache2"],
}

file { "/etc/phpmyadmin/config.inc.php":
  ensure  => file,
  mode    => 644,
  source  => "/vagrant/config/phpmyadmin-config.inc.php",
  require => [ Package["phpmyadmin"] ],
  notify => [ Service["apache2"], Service["mysql"] ],
}

###########################################################
#     MySQL Database Scripts
###########################################################
exec{ "initialize database":
  command => "/usr/bin/mysql -u root < /vagrant/database/migration_scripts/init.sql",
  require => Service["mysql"],
}

file { "/home/vagrant/dump.sh":
  ensure => link,
  target => "/vagrant/database/migration_scripts/dump.sh",
}

file { "/home/vagrant/load.sh":
  ensure => link,
  target => "/vagrant/database/migration_scripts/load.sh",
}
