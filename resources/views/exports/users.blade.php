<table>
    <thead>
    <tr>
        <th>Tc</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Telefon</th>
        <th>Email</th>
        <th>Durum</th>
        <th>Sınıf</th>
        <th>Adres</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->tc }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->info->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->info->status == 1 ? 'Aktif' : 'Pasif' }}</td>
            <td>{{ $user->info->group->title }}</td>
            <td>{{ $user->info->address }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
