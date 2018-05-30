# Simple Data Entry Web Page

This website will allow one to manage bookings. The data management includes create, update, delete.  Login is included along with manager mappings.  Tests are included.  The technology includes a Frontend with ReactJS and Bootstrap, and a Backend with Java Spring and a MySQL Database.


##  Run

Do not run the app locally. Always run (for tests as well) in a Docker environment.

The run docker images
```
shell% ./docker_build.sh
shell% ./docker_run.sh  # wait a few minutes for container to start running Spring-Boot
```

### Adjust Settings

* The application port setting can be found under:  src/main/resources/application.properties
* MySQL settings (port, login) can be found under:  src/main/resources/application.properties
* A new manger can be added to MySQL using these scripts:  scripts/add_manager.sh
* MySQL DDL and DML scripts can be found under:  scripts/

## Test

The test.sh script will run backend Java /Spring tests, and then run Frontend tests using phantomJS and ReactJS.TestUtils.
The script in scripts/setup_aws_all.sh must be run first.

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
shell% vi src/main/resources/application.properties # add MySQL user/password/url information
shell% source ./scripts/setup_aws.sh
```
The run docker images
```
shell% ./docker_build.sh
shell% ./docker_run.sh  # wait a few minutes for container to start running Spring-Boot
```

