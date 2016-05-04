###########################################################
#
# Dockerfile for varden
#
###########################################################

# Setting the base to php 5.6
FROM codenvy/php56_apache2
RUN sudo apt-get -y install php5-mysql
ADD /index.php /var/www/html/

# Maintainer
MAINTAINER Jørgen Johansen

#### Begin setup ####

# Installs git
# Clone our private GitHub Repository
RUN git clone https://github.com/jorjoh/Varden.git /Varden/

# Bundle app source
COPY / /var/www/html/

# Change working directory
WORKDIR "/src"

# Env variables
ENV SERVER_PORT 80

# Expose 3000
EXPOSE 80

