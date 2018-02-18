# Simple Data Entry Web Page

This website will allow one to manage bookings. The data management includes create, update, delete.  Login is included along with manager mappings.  Tests are included.  The technology includes a Frontend with ReactJS and Bootstrap, and a Backend with Java Spring and a MySQL Database.


##  Run

Run the app using the run.sh script.  
It basically runs "mvn spring-boot:run"
The app will be available at http://localhost:8092. The initial login to view test data is james/password12345

```
shell% ./run.sh
```

### Adjust Settings

* The application port setting can be found under:  src/main/resources/application.properties
* MySQL settings (port, login) can be found under:  src/main/resources/application.properties
* A new manger can be added to MySQL using these scripts:  scripts/add_manager.sh
* MySQL DDL and DML scripts can be found under:  scripts/

## Test

The test.sh script will run backend Java /Spring tests, and then run Frontend tests using phantomJS and ReactJS.TestUtils.

```
shell% ./test.sh
```

* PhantomJS must be installed and in the Unix PATH

### CLI Access to Spring API

To get CLI Access to the Spring API, one must first login using curl with cookie-jar:

```
shell% curl --user james:password12345 --cookie-jar ./cookies http://localhost:8092/
shell% curl --cookie cookies "http://localhost:8092/api/bookings/search/findByMonthDepartureAndYearDeparture?month=12&year=1900"
```
### AWS

Install on AWS EC2 using:
```
# install git
shell% sudo yum install git -y
# install Java 8 with JDK
shell% sudo yum install java-1.8.0-openjdk-devel -y
# install maven
shell% sudo wget http://repos.fedorapeople.org/repos/dchen/apache-maven/epel-apache-maven.repo -O /etc/yum.repos.d/epel-apache-maven.repo
shell% sudo sed -i s/\$releasever/6/g /etc/yum.repos.d/epel-apache-maven.repo
shell% sudo yum install -y apache-maven
# set Java-8 for maven
shell% sudo /usr/sbin/alternatives --config java
shell% sudo /usr/sbin/alternatives --config javac
# get code
shell% https://github.com/jpizagno/bookingbootstrap.git
shell% cd bookingbootstrap/react
# edit src/main/resources/application.properties for ip addresses, and MySQL information
# run application
shell% ./run.sh
```


