insert into users values('yassinsamy', 'Yassin', 'Samy', 'student', '$2y$10$p.EJEItskvmre0JCeRy4jetQtLYYQbZKbIrIcxjivaWHbIJhQ0vva');
insert into users values('ahmedyasser', 'Ahmed', 'Yasser', 'student', '$2y$10$zeL3ZJ0nXlK88NEgJ.UvJON15g0U6K0eH6NF5w0OsXpiJP0RLpGUe');
insert into users values('amelhassan', 'Amel', 'Hassan', 'lecturer', '$2y$10$LVwL4sESCWRwYMyf2RDvVO9EGKH96wKmTZ9mionJ1FlBgaiDrzm5e');
insert into users values('mohamedali', 'Mohamed', 'Ali', 'lecturer', '$2y$10$iom0HKHUW.8HbY0Csu1pdOmfIZanV0ISlYLyu0e/oGOgMQcDWtPPO');
insert into users values('nadayasser', 'Nada', 'Yasser', 'ta', '$2y$10$TQkIVxmukIKq9TkRlZTlE.gYpSd42oLexsh6Y2ZTZPejq7kcU0PHm');
insert into users values('ramyreda', 'Ramy', 'Reda', 'ta', '$2y$10$diMy4W9jOx86eTuqeQsT8eRkisJjmnrLJcVgeTrAgwwEJy19v5bUW');

insert into courses values('databases', 'amelhassan');
insert into courses values('databases 2', 'amelhassan');
insert into courses values('HCI', 'mohamedali');
insert into courses values('datamining', 'mohamedali');

insert into students_take_courses values ('yassinsamy', 'databases');
insert into students_take_courses values ('yassinsamy', 'datamining');
insert into students_take_courses values ('yassinsamy', 'databases 2');
insert into students_take_courses values ('yassinsamy', 'HCI');
insert into students_take_courses values ('ahmedyasser', 'datamining');
insert into students_take_courses values ('ahmedyasser', 'databases');
insert into students_take_courses values ('ahmedyasser', 'databases 2');

insert into grades values ('databases', 'yassinsamy', 'Assignment 1', '14/15');
insert into grades values ('databases', 'yassinsamy', 'Assignment 2', '14/15');
insert into grades values ('databases', 'yassinsamy', 'Project', '13/15');
insert into grades values ('databases', 'yassinsamy', 'Quiz 1', '15/15');
insert into grades values ('databases', 'yassinsamy', 'Quiz 2', '0/15');


insert into grades values ('datamining', 'yassinsamy', 'Assignment 1', '10/15');
insert into grades values ('datamining', 'yassinsamy', 'Assignment 2', '12/15');
insert into grades values ('datamining', 'yassinsamy', 'Project', '14/15');
insert into grades values ('datamining', 'yassinsamy', 'Quiz 1', '13/15');
insert into grades values ('datamining', 'yassinsamy', 'Quiz 2', '15/15');

insert into grades values ('HCI', 'yassinsamy', 'Assignment 1', '10/15');
insert into grades values ('HCI', 'yassinsamy', 'Assignment 2', '12/15');
insert into grades values ('HCI', 'yassinsamy', 'Project', '14/15');
insert into grades values ('HCI', 'yassinsamy', 'Quiz 1', '13/15');
insert into grades values ('HCI', 'yassinsamy', 'Quiz 2', '15/15');

insert into ta_teach_course ('nadayasser', 'databases');
insert into ta_teach_course ('nadayasser', 'datamining');
insert into ta_teach_course ('ramyreda', 'HCI');
insert into ta_teach_course ('ramyreda', 'databases 2');

