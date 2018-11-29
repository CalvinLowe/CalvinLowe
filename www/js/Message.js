/**
 * A class for representing a contact form message.
 */
class Message {

	/**
	 * Construct a message object.
	 * @param {string} name 
	 * @param {string} email 
	 * @param {string} subject 
	 * @param {string} message 
	 */
	constructor(name, email, subject, message) {
		this.name = name;
		this.email = email;
		this.subject = subject;
		this.message = message;
		
	}

	send(url) {
		var data = {"name": this.name, "email": this.email, "subject": this.subject, "message": this.message};

		return fetch(url, {
			method: "POST", // *GET, POST, PUT, DELETE, etc.
			mode: "cors", // no-cors, cors, *same-origin
			cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
			credentials: "same-origin", // include, same-origin, *omit
			headers: {
				"Content-Type": "application/json; charset=utf-8",
				//"Content-Type": "application/x-www-form-urlencoded",
			},
			redirect: "follow", // manual, *follow, error
			referrer: "no-referrer", // no-referrer, *client
			body: JSON.stringify(data), // body data type must match "Content-Type" header
		})
		.then(response => response.json()); // parses response to JSON
	}
}