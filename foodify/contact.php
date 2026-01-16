<?php
// public/contact.php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../app/config/database.php';

$db = new Database();
$conn = $db->connect();

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (!$name || !$email || !$subject || !$message) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $stmt = $conn->prepare("
            INSERT INTO contact_messages (name, email, subject, message)
            VALUES (:name, :email, :subject, :message)
        ");
        $stmt->execute([
            ':name'    => htmlspecialchars($name),
            ':email'   => htmlspecialchars($email),
            ':subject' => htmlspecialchars($subject),
            ':message' => htmlspecialchars($message)
        ]);

        $success = "Thank you for contacting Foodify. We’ll get back to you shortly.";
    }
}
?>

<section class="contact-hero">
    <h1>Contact Foodify</h1>
    <p>We’d love to hear from you</p>
</section>

<section class="contact-section">
    <div class="contact-container">

        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>
                Have questions about orders, partnerships, or vendor registration?
                Reach out to us — our team is always ready to help.
            </p>

            <ul>
                <li><strong>Email:</strong> support@foodify.com</li>
                <li><strong>Phone:</strong> +977-98XXXXXXX</li>
                <li><strong>Location:</strong> Kathmandu Valley, Nepal</li>
            </ul>
        </div>

        <form method="POST" class="contact-form">
            <?php if ($error): ?>
                <div class="form-error"><?= $error ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="form-success"><?= $success ?></div>
            <?php endif; ?>

            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="email" placeholder="Your Email Address" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" placeholder="Your Message" required></textarea>

            <button type="submit">Send Message</button>
        </form>

    </div>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
