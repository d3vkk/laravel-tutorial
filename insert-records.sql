INSERT INTO users (name,email,email_verified_at,password,remember_token,created_at,updated_at) VALUES('user','user@gmail.com','','$2y$10$c.7RqOdewEpk/OVmuEDvw..i3jVcNQPJ6wFIuC5IFpxzQQ/sjylqG','','2020-02-10 13:48:14','2020-02-10 13:48:14');

INSERT INTO users (name,email,email_verified_at,password,remember_token,created_at,updated_at) VALUES('john','john@gmail.com','','$2y$10$CmLY9x3HTyhUy0HGKvjbh.pZX5/GaF1MXgEtf.mIIg599Rgpyhhwq','','2020-02-12 07:12:52','2020-02-12 07:12:52');



INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post One (Updated)','This is Post One (Updated)','2020-02-12 10:25:31','2020-02-12 11:41:03','2','laravel6_1581503131.png');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Three','This is Post Three','2020-01-23 08:27:17','2020-01-23 08:27:17','1','laravel6_1581502590.png');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Four','This is Post Four','2020-01-23 08:27:17','2020-01-23 08:27:17','1','laravel6_1581502590.png');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Five','This is Post Five','2020-01-23 08:27:17','2020-01-23 08:27:17','1','laravel6_1581502590.png');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Six','This is Post Six','2020-01-23 08:27:17','2020-01-23 08:27:17','1','laravel6_1581502590.png');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Seven','This is Post Seven','2020-01-23 08:27:17','2020-01-23 08:27:17','1','laravel6_1581502590.png');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Eight','This is Post Eight','2020-02-12 10:49:58','2020-02-12 10:49:58','2','vue2_1581504598.jpg');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Two','This is Post Two','2020-02-12 11:27:44','2020-02-12 11:27:44','2','vue2_1581506864.jpg');

INSERT INTO posts (title,body,created_at,updated_at,user_id,cover_image) VALUES('Post Nine (Without Image Upload)','This is Post Nine (Without Image Upload)','2020-02-12 11:40:37','2020-02-12 11:44:01','2','noimage.png');

SELECT * FROM database.table WHERE column = 'column_name'
