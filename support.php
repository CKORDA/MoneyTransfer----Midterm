<!DOCTYPE html>
<html>
<head>
    <title><?="FAQ and Support Page"?></title>
</head>
<?=
require_once('pageStyle.html');
require_once('menu.html');
?>
<style>
.answer {
            margin-bottom: 20px;
            display: none;
        }
</style>
<body>
	<h1><?='Frequently Asked Questions'?></h1>
	<div class="faq-container">
        <div class="faq-item">
            <div class="question" onclick="toggleAnswer(1)"><?='How does this application work?'?></div>
            <div class="answer">
                <p><?='It runs off of php, databases, and a few other things in order for the user to see what you\'re seeing right now!'?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="question" onclick="toggleAnswer(2)"><?='Is this application secure?'?></div>
            <div class="answer">
                <p><?='At the moment...no BUT we are working on that as we speak. SO DON\'T ACTUALLY TRY SENDING ANYTHING YET'?></p>
            </div>
        </div>
		
		<div class="faq-item">
            <div class="question" onclick="toggleAnswer(2)"><?='How do we make sure that the money is being sent to the right place?'?></div>
            <div class="answer">
                <p><?='There is a request message that pops up to ensure that the user is certain that they want to send money. There is also a notification
				that pops up in the recipient\'s notifications to ensure that they want to recieve money.'?></p>
            </div>
        </div>

        <!-- Add as needed -->

    </div>
	
	<h1><?='Support'?></h1>
	<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $userName = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $file = 'contact.txt';
        $data = "Name: $userName\nEmail: $email\nMessage: $message\n\n";
        file_put_contents($file, $data, FILE_APPEND);

        echo '<p>Thank you for your message. We will get back to you soon!</p>';
    }
    ?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name"><?='Name:'?></label>
        <input type="text" id="name" name="name" required>

        <label for="email"><?='Email:'?></label>
        <input type="email" id="email" name="email" required>

        <label for="message"><?='Message:'?></label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Submit">
		
    </form>

    <script>
        function toggleAnswer(index) {
            var answer = document.getElementsByClassName('answer')[index - 1];
            answer.style.display = (answer.style.display === 'none') ? 'block' : 'none';
        }
    </script> 
</body>
</html>