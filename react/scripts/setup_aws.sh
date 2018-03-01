#!/bin/bash

# install git
#sudo yum install git -y
# install Java 8 with JDK
 sudo yum install java-1.8.0-openjdk-devel -y
# install maven
sudo wget http://repos.fedorapeople.org/repos/dchen/apache-maven/epel-apache-maven.repo -O /etc/yum.repos.d/epel-apache-maven.repo
sudo sed -i s/\$releasever/6/g /etc/yum.repos.d/epel-apache-maven.repo
sudo yum install -y apache-maven
# set Java-8 for maven
sudo /usr/sbin/alternatives --config java
sudo /usr/sbin/alternatives --config javac
