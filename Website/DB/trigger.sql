CREATE TRIGGER `insert_users` AFTER INSERT ON `users`
 FOR EACH ROW begin
if NEW.title like 's%' then insert into students values (NEW.username);
ELSEIF NEW.title like 't%' then insert into teacher_assistants values( NEW.username);
ELSE insert into lecturers values( NEW.username);
end if;
end