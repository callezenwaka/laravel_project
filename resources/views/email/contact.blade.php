
<h2>New Message From contact Form</h2>

Name: {{ $name }}<br>

E-mail: {{ $email }}<br>

Subject: {{ $title }}<br>

Message:<br> {{strip_tags($message_body) }}