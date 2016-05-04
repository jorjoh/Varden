###########################################################
#
# Dockerfile for varden
#
###########################################################

# Setting the base to php 5.6
FROM codenvy/php56_apache2
RUN sudo apt-get -y install php5-mysql
ADD /src/index.php /var/www/html/

# Maintainer
MAINTAINER Geir Gåsodden

#### Begin setup ####

# Installs git

# Bundle app source
COPY src/ /var/www/html/

# Change working directory
WORKDIR "/src"

# Env variables
ENV SERVER_PORT 80

# Expose 3000
EXPOSE 80

