New enquiry from the 3HDS website

Name: {!! $contact->name !!}
Email: {!! $contact->email !!}
Needs: {!! $contact->subject !!}

{!! $contact->message !!}

--
Reply to this email to answer {!! $contact->name !!} directly.
View all enquiries: {{ route('admin.contacts.index') }}
