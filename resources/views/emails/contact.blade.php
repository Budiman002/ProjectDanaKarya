<x-mail::message>
# New Contact Form Submission

You have received a new message from the DanaKarya contact form.

**From:** {{ $contactData['name'] }}
**Email:** {{ $contactData['email'] }}
**Subject:** {{ $contactData['subject'] }}

---

**Message:**

{{ $contactData['message'] }}

---

You can reply directly to this email to respond to {{ $contactData['name'] }}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
