###########################################################
#
# Dockerfile for Varden
#
###########################################################


# Setting the base to php 5.6
FROM codenvy/php56_apache2
RUN sudo apt-get update
RUN sudo apt-get -y install php5-mysql git wget zip
# ADD /src/index.php /var/www/html/
ADD dbdump/varden_dump.sql /docker-entrypoint-initdb.d

# Maintainer
MAINTAINER Jørgen

#### Begin setup ####

# Change working directory
WORKDIR "/src"

# RUN sudo git clone https://github.com/jorjoh/Varden.git 
COPY ./ /var/www/html/
RUN sudo wget http://134.213.218.27/test/uploads.zip
# ADD uploads.zip /var/html/www/frontend/
RUN sudo unzip uploads.zip -d /var/www/html/frontend/

# Env variables
ENV SERVER_PORT 80

# Expose 3000
EXPOSE 80
