<h1>{{$email['title']}}</h1>
<p>
    Verifikasi pada link berikut
    <button type="button" class="btn btn-primary">
        <a href="{{route('register-verifying', ['id' => $email['id'], 'date' => $email['date'], 'hash' => $email['hash']])}}.">
            Verifikasi Email
        </a>
    </button>
</p>