USE clwdd;
CREATE TABLE IF NOT EXISTS entry (
	entry_id INT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(30) NOT NULL,
	email_address VARCHAR(30) NOT NULL,
	message_subject TEXT NOT NULL,
	message LONGTEXT NOT NULL,
	PRIMARY KEY (entry_id)
);