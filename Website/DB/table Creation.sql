
create table Users(
username varchar(20) primary key,
first_name varchar(20),
last_name varchar(20),
title varchar(20),
password varchar(256)
);
create table Lecturers(
username varchar(20),
foreign key (username) references Users (username),
primary key (username)
);

create table Teacher_Assistants(
username varchar(20),
foreign key (username) references Users (username),
primary key (username)
);

create table Students(
username varchar(20),
foreign key (username) references Users (username),
primary key (username)
);
create table Courses (
title varchar(20) primary key,
lecturer varchar(20),
foreign key(lecturer) references Lecturers (username)
);
create table Grades(
course_title varchar(20),
foreign key (course_title) references Courses (title),
student varchar(20),
foreign key (student) references Students (username),
grade_title varchar(20),
grade varchar(20)
);
create table Students_take_Courses(
username varchar(20),
foreign key (username) references Students (username),
course varchar(20),
foreign key (course) references Courses (title)
);
create table ta_teach_Courses (
ta varchar (20),
foreign key (ta) references Teacher_Assistants(username),
course varchar (20),
foreign key (course) references Courses (title)
)