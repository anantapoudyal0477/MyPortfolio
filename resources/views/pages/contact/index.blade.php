@extends('layouts.app')

@section('content')
    <style>
        :root {
            --ink: #1a1714;
            --ink-muted: #6b6460;
            --paper: #faf8f5;
            --border: rgba(26, 23, 20, 0.10);
            --accent: #c9773a;
            --accent-light: #f0e0cf;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            font-size: 14px;
            outline: none;
            transition: border 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: var(--accent);
        }

        button {
            background: var(--accent);
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        button:hover {
            opacity: 0.85;
        }
    </style>

    <section style="max-width: 700px; margin: 0 auto; padding: 4rem 2rem;">

        <h1
            style="
        font-family: 'Cormorant Garamond', serif;
        font-size: 48px;
        font-weight: 300;
        margin-bottom: 10px;
    ">
            Contact Me
        </h1>

        <p style="color: var(--ink-muted); margin-bottom: 30px;">
            Have a project in mind or just want to say hello? Send a message.
        </p>

        <form id="contactFormID" method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div style="margin-bottom: 16px;">
                <label>Name</label>
                <input type="text" name="name" placeholder="Your name" required>
            </div>

            <div style="margin-bottom: 16px;">
                <label>Email</label>
                <input type="email" name="email" placeholder="Your email" required>
            </div>

            <div style="margin-bottom: 16px;">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label>Message</label>
                <textarea name="message" rows="6" placeholder="Write your message..." required></textarea>
            </div>

            <button type="submit">Send Message →</button>
        </form>

    </section>

<script>
    let contactForm = document.getElementById('contactFormID');

    contactForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(contactForm);

        fetch(contactForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(async response => {
            let data = await response.json();

            if (!response.ok) {
                throw data;
            }

            return data;
        })
        .then(data => {
            alert(data.message);
            contactForm.reset();
        })
        .catch(error => {
            console.error(error);

            if (error.errors) {
                alert(Object.values(error.errors).flat().join("\n"));
            } else {
                alert('Something went wrong. Please try again.');
            }
        });
    });
</script>
@endsection
