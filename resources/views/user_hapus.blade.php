<body>
    <h2>Apakah Anda yakin ingin menghapus user {{$user->name}}?</h2>
    <form action="{{ route('user.hapus', $user->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
    </form>
    <a href="{{ route('/user') }}">Batal</a>
</body>