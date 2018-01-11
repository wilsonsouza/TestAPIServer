
Developer time was of 2:00h.
Is needed is installed apache server and php to run.


1. POST user
   Name        user
   Description insert new record when user name not found.
   Parameters  json composite {'name': <string>, 'email': <string>, 'phone': <string>, 'birth': <string>}
   Call        http or https  ://ip_or_site_name/user
   Return      json composite {'error_or_success': <message>}

2. GET user/{email}
   Name        user
   Description lookup by user email.
   Parameters  {email}
   Call        http or https  ://ip_or_site_name/user/{email}
   Return      json composite {'name': <string>, 'email': <string>, 'phone': <string>, 'birth': <string>}
