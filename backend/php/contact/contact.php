<?PHP
/**
 * Creates an contact for entry in the database.
 * @author Calvin Lowe <calvin@calvinlowe.com>
 */

session_start();

// Includes
include("inc/config.php");
include("class/Entry.php");

// Database values
$db_host = DB_HOST;
$db_name = DB_NAME;
$db_username = DB_USERNAME;
$db_password = DB_PASSWORD;

// Create database connection
$db = new MyPDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);

// Get the json data from the form body
$json = file_get_contents('php://input');

// Call the form validator
if (isset($json)) {
    $error = validateRegistrationForm($json, $db);
}

function validateRegistrationForm($json, $db) {

    // Convert the json form data to an array
    $data = json_decode($json, true);

    // Variables for JSON encoding
    $response = array('response' => 'failure',
              'message' => 'error',
    );

    // Check if all data fields are set.
    if (!$data['name']) {
		$response['response'] = 'failure';
        $response['message'] = 'Please enter your name.';
	} else if (!$data['email']) {
		$response['response'] = 'Failure';
        $response['message'] = 'Please enter your email address.';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$response['response'] = 'Failure';
		$response['message'] = 'Please enter a valid email address.';
	} else if (!$data['subject']) {
		$response['response'] = 'failure';
		$response['message'] = 'Please enter a subject for your message';
	} else if (!$data['message']) {
		$response['response'] = 'failure';
		$response['message'] = 'Please enter your message';
    } else {
		
        // No errors set all variables
        // Cleans validates and assign variables from the $data array
        // Set the session variables so other that variables can be accessed outside of this function
		// and in other files.
		$name = filter_var($data['name'], FILTER_SANITIZE_STRING);
		$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($data['subject'], FILTER_SANITIZE_STRING);
        $message = filter_var($data['message'], FILTER_SANITIZE_STRING);
		
		// Create entry object
		$entry = new Entry($db);

		// Insert values into entry
		$entry->insert($name, $email, $subject, $message);
		// TODO: Send email

		// Set the successful response message
		$response['response'] = 'Success';
		$response['message'] = 'Message sent.';
	}

	// Send the response to the client
	echo json_encode($response);

	// disconnect the database & exit
	$db = null;
	exit();
}
?>