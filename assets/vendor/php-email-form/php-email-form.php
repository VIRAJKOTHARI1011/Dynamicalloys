<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $messages = [];
    public $smtp = [];
    public $ajax = false;

    public function add_message($value, $label, $priority = 0) {
        $this->messages[] = [
            'label' => $label,
            'value' => $value,
            'priority' => $priority
        ];
    }

    public function send() {
        $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
        $headers .= "Reply-To: {$this->from_email}\r\n";
        $message = "";

        foreach ($this->messages as $msg) {
            $message .= "{$msg['label']}: {$msg['value']}\n";
        }

        if (!empty($this->smtp)) {
            // Use SMTP settings (needs a library like PHPMailer if advanced)
            return 'SMTP sending is not implemented in this sample.';
        } else {
            return mail($this->to, $this->subject, $message, $headers);
        }
    }
}
?>
