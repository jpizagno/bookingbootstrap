provider "aws" {
  access_key = "${var.access_key}"  # from variables.tf
  secret_key = "${var.secret_key}" # from variables.tf
  region     = "${var.region}"  # from variables.tf
}

resource "aws_security_group" "bind_ec2_db_2" {
  name        = "bind_ec2_db_2"
  description = "allow 3306 to EC2 to DB insnace to User"
  vpc_id      = "${var.vpc_id}"

  ingress {
    from_port   = 8092
    to_port     = 8092
    protocol    = "tcp"
    cidr_blocks = ["${var.user_ip_address}/32"]
  }

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["${var.user_ip_address}/32"]
  }

  ingress {
    from_port   = 3306
    to_port     = 3306
    protocol    = "tcp"
    cidr_blocks = ["${var.user_ip_address}/32"]
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "tcp"
    cidr_blocks     = ["0.0.0.0/0"]
  }
}

# inclucde DB here as well, so Terraform does not delete it
resource "aws_db_instance" "default" {
  allocated_storage    = 20  #  GBytes, minimum is 20 GB
  storage_type         = "gp2"  #  "gp2" (general purpose SSD)
  engine               = "mysql"
  engine_version       = "5.6.39"
  instance_class       = "db.t2.micro"
  name                 = "${var.mysql_db_name}"
  username             = "${var.mysql_user_name}"
  password             = "${var.mysql_password}"
  port                 = "3306"
  db_subnet_group_name = "default"
  parameter_group_name = "default.mysql5.6"
  publicly_accessible =  "false"
  vpc_security_group_ids = ["${aws_security_group.bind_ec2_db_2.id}"]
}

resource "aws_instance" "example_jim" {
  ami = "${lookup(var.amis, var.region)}"   
  instance_type = "t2.micro"
  key_name = "${var.key_name}" 
}


output "aws_instance.example_jim.private_ip" {
  value = "${aws_instance.example_jim.private_ip}"
}

output "aws_security_group.bind_ec2_db_2.id" {
  value = "${aws_security_group.bind_ec2_db_2.id}"
}
