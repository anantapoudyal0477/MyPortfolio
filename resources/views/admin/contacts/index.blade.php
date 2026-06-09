@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
.inbox {
    display: flex;
    height: 80vh;
    border: 1px solid #e5e5e5;
    border-radius: 10px;
    overflow: hidden;
    font-family: Arial;
}

.list {
    width: 35%;
    overflow-y: auto;
    border-right: 1px solid #e5e5e5;
    background: #fafafa;
}

.item {
    padding: 14px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}

.item:hover {
    background: #f1f3f4;
}

.active {
    background: #e8f0fe;
}

.name {
    font-weight: bold;
    font-size: 14px;
}

.preview {
    flex: 1;
    padding: 20px;
}

.placeholder {
    color: #999;
    text-align: center;
    margin-top: 50px;
}

.mail-title {
    font-size: 20px;
    margin-bottom: 10px;
}

.mail-meta {
    color: #666;
    font-size: 13px;
    margin-bottom: 20px;
}

.mail-body {
    white-space: pre-line;
}
</style>

<div class="inbox">

    {{-- LEFT LIST --}}
    <div class="list">
        @foreach($contacts as $contact)
            <div class="item" data-id="{{ $contact->id }}">
                <div class="name">{{ $contact->name }}</div>
            </div>
        @endforeach
    </div>

    {{-- RIGHT PREVIEW --}}
    <div class="preview" id="preview">
        <div class="placeholder">Select a message</div>
    </div>

</div>

{{-- REPLY MODAL --}}
<div id="replyModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5);">
    <div style="background:white; width:500px; margin:10% auto; padding:20px; border-radius:10px;">

        <h3>Send Reply</h3>

        <input type="hidden" id="contact_id">

        <label>Email</label>
        <input id="reply_email" readonly style="width:100%; padding:8px; margin-bottom:10px;">

        <label>Subject</label>
        <input id="reply_subject" style="width:100%; padding:8px; margin-bottom:10px;">

        <label>Message</label>
        <textarea id="reply_message" rows="6" style="width:100%; padding:8px;"></textarea>

        <button onclick="sendReply()" style="background:green;color:white;padding:10px;border:none;margin-top:10px;">
            Send
        </button>

        <button onclick="closeReplyModal()" style="margin-left:10px;">
            Cancel
        </button>

    </div>
</div>

<script>
const items = document.querySelectorAll('.item');
const preview = document.getElementById('preview');

items.forEach(item => {
    item.addEventListener('click', function () {

        items.forEach(i => i.classList.remove('active'));
        this.classList.add('active');

        let id = this.dataset.id;

        fetch(`/admin/contacts/${id}`)
            .then(res => res.json())
            .then(data => {

                preview.innerHTML = `
                    <div class="mail-title">${data.subject}</div>
                    <div class="mail-meta">
                        From: ${data.name} (${data.email}) <br>
                        Date: ${data.date}
                    </div>
                    <hr>
                    <div class="mail-body">${data.message}</div>

                    <button onclick="openReplyModal(${data.id}, '${data.email}', '${data.subject}')"
                        style="margin-top:20px;background:#1a73e8;color:white;padding:10px;border:none;border-radius:5px;">
                        Reply
                    </button>
                `;
            });
    });
});

function openReplyModal(id, email, subject) {
    document.getElementById('replyModal').style.display = 'block';
    document.getElementById('contact_id').value = id;
    document.getElementById('reply_email').value = email;
    document.getElementById('reply_subject').value = "Re: " + subject;
}

function closeReplyModal() {
    document.getElementById('replyModal').style.display = 'none';
}

function sendReply() {
    fetch(`/admin/contacts/${document.getElementById('contact_id').value}/reply`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            email: document.getElementById('reply_email').value,
            subject: document.getElementById('reply_subject').value,
            message: document.getElementById('reply_message').value
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        closeReplyModal();
    });
}
</script>

@endsection